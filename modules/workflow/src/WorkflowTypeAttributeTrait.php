<?php

namespace Drupal\workflow;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\workflow\Entity\Workflow;

/**
 * Wrapper methods for Workflow* objects
 *
 * Using this trait will add getWorkflow(), getWorkflowID() and setWorkflow()
 * methods to the class.
 *
 * @ingroup workflow
 */
trait WorkflowTypeAttributeTrait {

  /**
   * The machine_name of the attached Workflow.
   *
   * @var string
   */
  protected $wid = '';

  /**
   * The attached Workflow.
   * It must explicitly be defined, and not be public, to avoid errors
   * when exporting with json_encode().
   *
   * @var Workflow
   */
  protected $workflow = NULL;

  /**
   * @param Workflow $workflow
   */
  public function setWorkflow(Workflow $workflow) {
    $this->wid = '';
    $this->workflow = NULL;
    if ($workflow) {
      $this->wid = $workflow->id();
      $this->workflow = $workflow;
    }
  }

  /**
   * Returns the Workflow object of this object.
   *
   * @return Workflow
   *   Workflow object.
   */
  public function getWorkflow() {
    if (!empty($this->workflow)) {
      return $this->workflow;
    }

    /** @noinspection PhpAssignmentInConditionInspection */
    if ($wid = $this->getWorkflowId()) {
      $this->workflow = Workflow::load($wid);
    }
    return $this->workflow;
  }

  /**
   * Sets the Workflow ID of this object.
   *
   * @return object
   */
  public function setWorkflowId($wid) {
    $this->wid = $wid;
    $this->workflow = NULL;
    return $this;
  }

  /**
   * Returns the Workflow ID of this object.
   *
   * @return string
   *   Workflow Id.
   */
  public function getWorkflowId() {
    /** @var ContentEntityBase $this */
    if (!empty($this->wid)) {
      return $this->wid;
    }

    $value = $this->get('wid');
    if (is_string($value)) {
      $this->wid = $value;
    }
    elseif (is_object($value)) {
      $wid = isset($value->getValue()[0]['target_id']) ? $value->getValue()[0]['target_id'] : '';
      // or: $this->set('wid', $wid);
      $this->wid = $wid; // in WorkflowTransition.
    }
    else {
      workflow_debug(__FILE__, __FUNCTION__, __LINE__, '', '');
    }

    return $this->wid;
  }

}
