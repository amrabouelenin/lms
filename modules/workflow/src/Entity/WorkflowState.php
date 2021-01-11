<?php

namespace Drupal\workflow\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\Core\Config\Entity\ConfigEntityInterface;
use Drupal\Core\Entity\Entity;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\workflow\WorkflowTypeAttributeTrait;

/**
 * Workflow configuration entity to persistently store configuration.
 *
 * @ConfigEntityType(
 *   id = "workflow_state",
 *   label = @Translation("Workflow state"),
 *   label_singular = @Translation("Workflow state"),
 *   label_plural = @Translation("Workflow states"),
 *   label_count = @PluralTranslation(
 *     singular = "@count Workflow state",
 *     plural = "@count Workflow states",
 *   ),
 *   module = "workflow",
 *   static_cache = TRUE,
 *   translatable = FALSE,
 *   handlers = {
 *     "access" = "Drupal\workflow\WorkflowAccessControlHandler",
 *     "list_builder" = "Drupal\workflow_ui\Controller\WorkflowStateListBuilder",
 *     "form" = {
 *        "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *      }
 *   },
 *   config_prefix = "state",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "weight" = "weight",
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "module",
 *     "wid",
 *     "weight",
 *     "sysid",
 *     "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/config/workflow/workflow/{workflow_type}",
 *     "collection" = "/admin/config/workflow/workflow/{workflow_type}/states",
 *   },
 * )
 */
class WorkflowState extends ConfigEntityBase {

  /*
   * Add variables and get/set methods for Workflow property.
   */
  use WorkflowTypeAttributeTrait;

  /**
   * The machine name.
   *
   * @var string
   */
  public $id;

  /**
   * The human readable name.
   *
   * @var string
   */
  public $label;

  /**
   * The weight of this Workflow state.
   *
   * @var int
   */
  public $weight;

  /**
   * @var int
   */
  public $sysid = 0;
  public $status = 1;

  /**
   * The module implementing this object, for config_export.
   *
   * @var string
   */
  protected $module = 'workflow';

  /**
   * CRUD functions.
   */

  /**
   * Constructor.
   *
   * @param array $values
   * @param string $entityType
   *   The name of the new State. If '(creation)', a CreationState is generated.
   */
  public function __construct(array $values = [], $entityType = 'workflow_state') {
    // Please be aware that $entity_type_id and $entityType are different things!
    $sid = isset($values['id']) ? $values['id'] : '';

    // Keep official name and external name equal. Both are required.
    // @todo: still needed? test import, manual creation, programmatic creation, etc.
    if (!isset($values['label']) && $sid) {
      $values['label'] = $sid;
    }

    // Set default values for '(creation)' state.
    if ($sid == WORKFLOW_CREATION_STATE_NAME) {
      $values['sysid'] = WORKFLOW_CREATION_STATE;
      $values['weight'] = WORKFLOW_CREATION_DEFAULT_WEIGHT;
      // Do not translate the machine_name.
      $values['label'] = t('Creation');
    }
    parent::__construct($values, $entityType);
  }

  /**
   * {@inheritdoc}
   */
  public function save($create_creation_state = TRUE) {
    // Create the machine_name for new states.
    // N.B.: Keep machine_name in WorkflowState and ~ListBuilder aligned.
    $sid = $this->id();
    $wid = $this->getWorkflowId();
    $label = $this->label();

    // Set the workflow-including machine_name.
    if ($sid == WORKFLOW_CREATION_STATE_NAME) {
      // Set the initial sid.
      $sid = implode('_', [$wid, $sid]);
      $this->set('id', $sid);
    }
    elseif (empty($sid)) {
      if ($label) {
        $transliteration = \Drupal::service('transliteration');
        $value = $transliteration->transliterate($label, LanguageInterface::LANGCODE_DEFAULT, '_');
        $value = strtolower($value);
        $value = preg_replace('/[^a-z0-9_]+/', '_', $value);
        $sid = implode('_', [$wid, $value]);
      }
      else {
        workflow_debug(__FILE__, __FUNCTION__, __LINE__);  // @todo D8-port: still test this snippet.
        $sid = 'state_' . $this->id();
        $sid = implode('_', [$wid, $sid]);
      }
      $this->set('id', $sid);
    }

    return parent::save();
  }

  /**
   * Get all states in the system, with options to filter, only where a workflow exists.
   *
   * @_deprecated WorkflowState::getStates() ==> WorkflowState::loadMultiple()
   *
   * {@inheritdoc}
   *
   * @param $wid
   *   The requested Workflow ID.
   * @param bool $reset
   *   An option to refresh all caches.
   *
   * @return WorkflowState[]
   *   An array of cached states, keyed by state_id.
   */
  public static function loadMultiple(array $ids = NULL, $wid = '', $reset = FALSE) {
    $states = parent::loadMultiple();
    usort($states, ['Drupal\workflow\Entity\WorkflowState', 'sort'] );

    // Filter onl Wid, if requested, E.g., by Workflow->getStates().
    // Set the ID as array key.
    $result = [];
    foreach ($states as $state) {
      /** @var  WorkflowState $state */
      if ((!$wid) || ($wid == $state->getWorkflowId())) {
        $result[$state->id()] = $state;
      }
    }
    return $result;
  }

  /**
   * {@inheritdoc}
   */
  public static function sort(ConfigEntityInterface $a, ConfigEntityInterface $b) {
    /** @var WorkflowState $a */
    /** @var WorkflowState $b */
    $a_wid = $a->getWorkflowId();
    $b_wid = $b->getWorkflowId();
    if ($a_wid == $b_wid) {
      $a_weight = $a->getWeight();
      $b_weight = $b->getWeight();
      return ($a_weight < $b_weight) ? -1 : 1;
    }
    return ($a_wid < $b_wid) ? -1 : 1;
  }

  /**
   * Deactivate a Workflow State, moving existing content to a given State.
   *
   * @param int $new_sid
   *   The state ID, to which all affected entities must be moved.
   */
  public function deactivate($new_sid) {

    $current_sid = $this->id();
    $force = TRUE;

    // Notify interested modules. We notify first to allow access to data before we zap it.
    // - re-parents any entity that we don't want to orphan, whilst deactivating a State.
    // - delete any lingering entity to state values.
    // \Drupal::moduleHandler()->invokeAll('workflow', ['state delete', $current_sid, $new_sid, NULL, $force]);
    // Invoke the hook.
    \Drupal::moduleHandler()->invokeAll('entity_' . $this->getEntityTypeId() . '_predelete', [$this, $current_sid, $new_sid]);

    // Re-parent any entity that we don't want to orphan, whilst deactivating a State.
    // TODO D8-port: State should not know about Transition: move this to Workflow->DeactivateState.
    if ($new_sid) {
      // A candidate for the batch API.
      // @TODO: Future updates should seriously consider setting this with batch.

      $user = \Drupal::currentUser(); // We can use global, since deactivate() is a UI-only function.
      $comment = t('Previous state deleted');

      foreach (_workflow_info_fields() as $field_info) {
        $entity_type_id = $field_info->getTargetEntityTypeId();
        $field_name = $field_info->getName(); // @todo: overwrites key?

        $result = [];
        // CommentForm's are not re-parented upon Deactivate WorkflowState.
        if ($entity_type_id != 'comment') {
          $query = \Drupal::entityQuery($entity_type_id);
          $query->condition($field_name, $current_sid, '=');
          $result = $query->execute();
        }

        foreach ($result as $entity_id) {
          $entity = \Drupal::entityTypeManager()->getStorage($entity_type_id)->load($entity_id);
          $transition = WorkflowTransition::create([$current_sid, 'field_name' => $field_name]);
          $transition->setTargetEntity($entity);
          $transition->setValues($new_sid, $user->id(), \Drupal::time()->getRequestTime(), $comment, TRUE);
          $transition->force($force);

          // Execute Transition, invoke 'pre' and 'post' events, save new state in Field-table, save also in workflow_transition_history.
          // For Workflow Node, only {workflow_node} and {workflow_transition_history} are updated. For Field, also the Entity itself.
          // Execute transition and update the attached entity.
          $new_sid = $transition->executeAndUpdateEntity($force);
        }
      }
    }

    // Delete the transitions this state is involved in.
    $workflow = Workflow::load($this->getWorkflowId());
    /** @var WorkflowInterface $workflow */
    /** @var WorkflowTransitionInterface $transition */
    foreach ($workflow->getTransitionsByStateId($current_sid, '') as $transition) {
      $transition->delete();
    }
    foreach ($workflow->getTransitionsByStateId('', $current_sid) as $transition) {
      $transition->delete();
    }

    // Delete the state. -- We don't actually delete, just deactivate.
    // This is a matter up for some debate, to delete or not to delete, since this
    // causes name conflicts for states. In the meantime, we just stick with what we know.
    // If you really want to delete the states, use workflow_cleanup module, or delete().
    $this->status = FALSE;
    $this->save();

    // Clear the cache.
    self::loadMultiple([], 0, TRUE);
  }

  /**
   * Property functions.
   */

  /**
   * {@inheritdoc}
   */
  public function getWeight() {
    return $this->weight;
  }

  /**
   * Returns the Workflow object of this State.
   *
   * @return bool
   *   TRUE if state is active, else FALSE.
   */
  public function isActive() {
    return (bool) $this->status;
  }

  /**
   * Checks if the given state is the 'Create' state.
   *
   * @return bool
   */
  public function isCreationState() {
    return $this->sysid == WORKFLOW_CREATION_STATE;
  }

  /**
   * Determines if the Workflow Form must be shown.
   *
   * If not, a formatter must be shown, since there are no valid options.
   *
   * @param \Drupal\Core\Entity\EntityInterface $entity
   * @param string $field_name
   * @param \Drupal\Core\Session\AccountInterface $account
   * @param bool $force
   *
   * @return bool
   *   TRUE = a form (a.k.a. widget) must be shown; FALSE = no form, a formatter must be shown instead.
   */
  public function showWidget(EntityInterface $entity, $field_name, AccountInterface $account, $force) {
    $options = $this->getOptions($entity, $field_name, $account, $force);
    $count = count($options);
    // The easiest case first: more then one option: always show form.
    if ($count > 1) {
      return TRUE;
    }
    // #2226451: Even in Creation state, we must have 2 visible states to show the widget.
    // // Only when in creation phase, one option is sufficient,
    // // since the '(creation)' option is not included in $options.
    // // When in creation state,
    // if ($this->isCreationState()) {
    // return TRUE;
    // }
    return FALSE;
  }

  /**
   * Returns the allowed transitions for the current state.
   *
   * @param \Drupal\Core\Entity\EntityInterface|null $entity
   *   The entity at hand. May be NULL (E.g., on a Field settings page).
   * @param string $field_name
   * @param \Drupal\Core\Session\AccountInterface|null $account
   * @param bool|false $force
   *
   * @return \Drupal\workflow\Entity\WorkflowConfigTransition[]
   *   An array of id=>transition pairs with allowed transitions for State.
   */
  public function getTransitions(EntityInterface $entity = NULL, $field_name = '', AccountInterface $account = NULL, $force = FALSE) {
    $transitions = [];

    if (!$workflow = $this->getWorkflow()) {
      // No workflow, no options ;-)
      return $transitions;
    }
    // Load a User object, since we cannot add Roles to AccountInterface.
    if (!$user = workflow_current_user($account)) {
      // In some edge cases, no user is provided.
      return $transitions;
    }

    // @todo: Keep below code aligned between WorkflowState, ~Transition, ~TransitionListController
    /**
     * Get permissions of user, adding a Role to user, depending on situation.
     */
    // Determine if user is owner of the entity.
    $is_owner = WorkflowManager::isOwner($user, $entity);

    // Check allow-ability of state change if user is not superuser (might be cron)
    $type_id = $this->getWorkflowId();
    if ($user->hasPermission("bypass $type_id workflow_transition access")) {
      // Superuser is special. And $force allows Rules to cause transition.
      $force = TRUE;
    }

    if ($is_owner) {
      $user->addRole(WORKFLOW_ROLE_AUTHOR_RID);
    }

    /**
     * Get the object and its permissions.
     */
    /** @var WorkflowConfigTransition[] $transitions */
    /** @var Workflow $workflow */
    $transitions = $workflow->getTransitionsByStateId($this->id(), '');

    /**
     * Determine if user has Access.
     */
    // Use default module permissions.
    foreach ($transitions as $key => $transition) {
      if (!$transition->isAllowed($user, $force)) {
        unset($transitions[$key]);
      }
    }
    // Let custom code add/remove/alter the available transitions,
    // using the new drupal_alter.
    // Modules may veto a choice by removing a transition from the list.
    // Lots of data can be fetched via the $transition object.
    $context = [
      'entity' => $entity, // ConfigEntities do not have entity attached
      'field_name' => $field_name, // or field.
      'user' => $user, // user may have the custom role AUTHOR.
      'workflow' => $workflow,
      'state' => $this,
      'force' => $force,
    ];
    \Drupal::moduleHandler()->alter('workflow_permitted_state_transitions', $transitions, $context);

    /**
     * Determine if user has Access.
     */
    // As of 8.x-1.x, below hook() is removed, in favour of above alter().
    // Let custom code change the options, using old_style hook.
    // Above drupal_alter() calls hook_workflow_permitted_state_transitions_alter() only once.
//    foreach ($transitions as $transition) {
//      $to_sid = $transition->to_sid;
//      $permitted = [];
//
//      // We now have a list of config_transitions. Check each against the Entity.
//      // Invoke a callback indicating that we are collecting state choices.
//      // Modules may veto a choice by returning FALSE.
//      // In this case, the choice is never presented to the user.
//      if (!$force) {
//        // @todo: D8-port: simplify interface for workflow_hook. Remove redundant context.
//        $permitted = \Drupal::moduleHandler()->invokeAll('workflow', ['transition permitted', $transition, $user]);
//      }
//
//      // If vetoed by a module, remove from list.
//      if (in_array(FALSE, $permitted, TRUE)) {
//        unset($transitions[$transition->id()]);
//      }
//    }

    return $transitions;
  }

  /**
   * Returns the allowed values for the current state.
   *
   * @param object $entity
   *   The entity at hand. May be NULL (E.g., on a Field settings page).
   * @param string $field_name
   * @param \Drupal\Core\Session\AccountInterface|null $account
   * @param bool $force
   *
   * @return array
   *   An array of sid=>label pairs.
   *   If $this->id() is set, returns the allowed transitions from this state.
   *   If $this->id() is 0 or FALSE, then labels of ALL states of the State's
   *   Workflow are returned.
   */
  public function getOptions($entity, $field_name, AccountInterface $account = NULL, $force = FALSE) {
    $options = [];

    // Define an Entity-specific cache per page load.
    static $cache = [];

    $entity_id = ($entity) ? $entity->id() : '';
    $entity_type_id = ($entity) ? $entity->getEntityTypeId() : '';
    $current_sid = $this->id();

    // Get options from page cache, using a non-empty index (just to be sure).
    $entity_index = (!$entity) ? 'x' : $entity_id;
    if (isset($cache[$entity_type_id][$entity_index][$force][$current_sid])) {
      $options = $cache[$entity_type_id][$entity_index][$force][$current_sid];
      return $options;
    }

    $workflow = $this->getWorkflow();
    if (!$workflow) {
      // No workflow, no options ;-)
      $options = [];
    }
    elseif (!$current_sid) {
      // If no State ID is given, we return all states.
      // We cannot use getTransitions, since there are no ConfigTransitions
      // from State with ID 0, and we do not want to repeat States.
      /** @var WorkflowState $state */
      /** @var Workflow $workflow */
      foreach ($workflow->getStates() as $state) {
        $options[$state->id()] = html_entity_decode(t('@label', ['@label' => $state->label()]));
      }
    }
    else {
      $transitions = $this->getTransitions($entity, $field_name, $account, $force);
      foreach ($transitions as $transition) {
        // Get the label of the transition, and if empty of the target state.
        // Beware: the target state may not exist, since it can be invented
        // by custom code in the above drupal_alter() hook.
        if (!$label = $transition->label()) {
          $to_state = $transition->getToState();
          $label = $to_state ? $to_state->label() : '';
        }
        $to_sid = $transition->to_sid;
        $options[$to_sid] = html_entity_decode(t('@label', ['@label' => $label]));
      }

      // Save to entity-specific cache.
      $cache[$entity_type_id][$entity_index][$force][$current_sid] = $options;
    }

    return $options;
  }

  /**
   * Returns the number of entities with this state.
   *
   * @return int
   *   Counted number.
   *
   * @todo: add $options to select on entity type, etc.
   */
  public function count() {
    $count = 0;
    $sid = $this->id();

    foreach ($fields = _workflow_info_fields() as $field_info) {
      $field_name = $field_info->getName();
      $query = \Drupal::entityQuery($field_info->getTargetEntityTypeId());
      // @see #2285983 for using SQLite on D7.
      $count += $query
        ->condition($field_name, $sid, '=')
        ->count() // We only need the count.
        ->execute();
    }

    return $count;
  }

}
