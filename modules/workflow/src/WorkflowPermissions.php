<?php

namespace Drupal\workflow;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\workflow\Entity\Workflow;

/**
 * Provides dynamic permissions for workflows of different types.
 */
class WorkflowPermissions {

  use StringTranslationTrait;

  /**
   * Returns an array of workflow type permissions.
   *
   * @return array
   *   The workflow type permissions.
   *   @see \Drupal\user\PermissionHandlerInterface::getPermissions()
   */
  public function workflowTypePermissions() {
    $perms = [];
    // Generate workflow permissions for all workflow types.
    foreach (Workflow::loadMultiple() as $type) {
      $perms += $this->buildPermissions($type);
    }
    return $perms;
  }

  /**
   * Returns a list of workflow permissions for a given workflow type.
   *
   * @param \Drupal\workflow\Entity\Workflow $type
   *   The workflow type.
   *
   * @return array
   *   An associative array of permission names and descriptions.
   */
  protected function buildPermissions(Workflow $type) {
    $type_id = $type->id();
    $type_params = ['%type_name' => $type->label()];

    return [
      // D7->D8-Conversion of the 'User 1 is special' permission (@see NodePermissions::bypass node access).
      "bypass $type_id workflow_transition access" => [
        'title' => $this->t('%type_name: Bypass transition access control', $type_params),
        'description' => $this->t('View, edit and delete all transitions regardless of permission restrictions.'),
        'restrict access' => TRUE,
      ],
      // D7->D8-Conversion of 'participate in workflow' permission to "create $type_id transition" (@see NodePermissions::create content).
      "create $type_id workflow_transition" => [
        'title' => $this->t('%type_name: Participate in workflow', $type_params),
        'description' => $this->t("Role is enabled to create state transitions. (Determines transition-specific permission on the workflow admin page.
          <i> Warning: For better control, uncheck the 'Authenticated user', and manage the permissions per separate role.</i>)"),
      ],
      // D7->D8-Conversion of 'schedule workflow transitions' permission to "schedule $type_id transition" (@see NodePermissions::create content).
      "schedule $type_id workflow_transition" => [
        'title' => $this->t('%type_name: Schedule state transition', $type_params),
        'description' => $this->t('Role is enabled to schedule state transitions.'),
      ],
      // D7->D8-Conversion of 'workflow history' permission on Workflow settings to "access $type_id overview" (@see NodePermissions::access content overview).
      "access own $type_id workflow_transion overview" => [
        'title' => $this->t('%type_name: Access Workflow history tab of own content', $type_params),
        'description' => $this->t('Role is enabled to view the "Workflow state transition history" tab on own entity.'),
      ],
      "access any $type_id workflow_transion overview" => [
        'title' => $this->t('%type_name: Access Workflow history tab of any content', $type_params),
        'description' => $this->t('Role is enabled to view the "Workflow state transition history" tab on any entity.'),
      ],
      // D7->D8-Conversion of 'show workflow transition form' permission. @see #1893724
      "access $type_id workflow_transition form" => [
        'title' => $this->t('%type_name: Access the Workflow state transition form on entity view page', $type_params),
        'description' => $this->t('Role is enabled to view a "Workflow state transition" block/widget and add a state transition on the entity page.'),
      ],
    ];
  }

}
