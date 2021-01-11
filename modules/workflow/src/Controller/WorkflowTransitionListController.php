<?php

namespace Drupal\workflow\Controller;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Datetime\DateFormatter;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Entity\Controller\EntityListController;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Render\RendererInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\views\Views;
use Drupal\workflow\Entity\WorkflowManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for Workflow routes.
 */
class WorkflowTransitionListController extends EntityListController implements ContainerInjectionInterface {

  /**
   * The date formatter service.
   *
   * @var \Drupal\Core\Datetime\DateFormatter
   */
  protected $dateFormatter;

  /**
   * The renderer service.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * Constructs an object.
   *
   * @param \Drupal\Core\Datetime\DateFormatter $date_formatter
   *   The date formatter service.
   * @param \Drupal\Core\Render\RendererInterface $renderer
   *   The renderer service.
   */
  public function __construct(DateFormatter $date_formatter, RendererInterface $renderer) {
    // These parameters are taken from some random other controller.
    $this->dateFormatter = $date_formatter;
    $this->renderer = $renderer;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('date.formatter'),
      $container->get('renderer')
    );
  }

  /**
   * Generates an overview table of older revisions of a node,
   * but only if WorkflowHistoryAccess::access() allows it.
   *
   * @param EntityInterface $node
   *   A node object.
   * @return array An array as expected by drupal_render().
   * An array as expected by drupal_render().
   */
  public function historyOverview(EntityInterface $node = NULL) {
    $form = [];

    /*
     * Get data from parameters.
     */

    // @todo D8-port: make Workflow History tab happen for every entity_type.
    // For workflow_tab_page with multiple workflows, use a separate view. See [#2217291].
    // @see workflow.routing.yml, workflow.links.task.yml, WorkflowTransitionListController.
    //    workflow_debug(__FILE__, __FUNCTION__, __LINE__);  // @todo D8-port: still test this snippet.
    // ATM it only works for Nodes and Terms.
    // This is a hack. The Route should always pass an object.
    // On view tab, $entity is object,
    // On workflow tab, $entity is id().
    // Get the entity for this form.
    if (!$entity = workflow_url_get_entity($node)) {
      return $form;
    }

    /*
     * Get derived data from parameters.
     */
    if (!$field_name = workflow_get_field_name($entity, workflow_url_get_field_name())) {
      return $form;
    }

    /*
     * Step 1: generate the Transition Form.
     */
    // Add the WorkflowTransitionForm to the page.
    $form = WorkflowManager::getWorkflowTransitionForm($entity, $field_name);

    /*
     * Step 2: generate the Transition History List.
     */
    $view = NULL;
    $moduleHandler = \Drupal::service('module_handler');
    if ($moduleHandler->moduleExists('views')){
      $view = Views::getView('workflow_entity_history');
    }
    if (is_object($view) && $view->storage->status()) {
      // Add the history list from configured Views display.
      $args = [$entity->id()];
      $view->setArguments($args);
      $view->setDisplay('workflow_history_tab');
      $view->preExecute();
      $view->execute();
      $form['table'] = $view->buildRenderable();
    }
    else {
      // @deprecated. Use the Views display above.
      // Add the history list from programmed WorkflowTransitionListController.
      $entity_type = 'workflow_transition';
      // $form = $this->listing('workflow_transition');
      $list_builder = $this->entityTypeManager()->getListBuilder($entity_type);
      // Add the Node explicitly, since $list_builder expects a Transition.
      $list_builder->workflow_entity = $entity;
      $form += $list_builder->render();

    }

    /*
     * Finally: sort the elements (overriding their weight).
     */
    // $form['#weight'] = 10;
    $form['actions']['#weight'] = 100;
    $form['table']['#weight'] = 201;

    return $form;
  }

}
