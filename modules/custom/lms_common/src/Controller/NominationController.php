<?php

namespace Drupal\lms_common\Controller;

use Drupal\Core\Controller\ControllerBase;
use \Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\node\Entity\Node;
use Drupal\workflow\Entity\WorkflowTransition;
use Drupal\workflow\Entity\WorkflowTransitionInterface;

/**
 * Class NominationController.
 */
class NominationController extends ControllerBase {

  /**
   * Save_nomination.
   *
   * @return string
   *   Return Hello string.
   */
  public function save_nomination() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: save_nomination')
    ];
  }
  /**
   * Save_nomination_ajax.
   *
   * @return string
   *   Return Hello string.
   */
  public function save_nomination_ajax($uid, $course_id, $course_schedule_id) {
    
    if(self::check_user_registered_before($uid, $course_id, $course_schedule_id))
      $build = array( 'status' => 'no');
    elseif (self::create_nomination_node($uid, $course_id, $course_schedule_id)) {    
      $build = array( 'status' => 'ok');
    }
    else {
      $build = array( 'status' => 'no');
      
    }
    // This is the important part, because will render only the TWIG template.
    return new JsonResponse($build); 
  }


  /**
   * check if the user registered in this course schedule or not
   *
   * @return string
   *   Return Hello string.
   */
  private function create_nomination_node($uid, $course_id, $course_schedule_id) {
    // check if the user registered in this course schedule
    // check if the user registered and attend in this course before
    $node = Node::create(['type' => 'nomination' , 
            'title' => 'Welcome',
            'field_course_schedule_batch' => ['target_id' => $course_schedule_id], 
            'field_course_name' => ['target_id' => $course_id], 
            'field_employee_name' => ['target_id' => $uid], 
            'status' => 1, 
            ]);
    $node->field_enrollment_status->value = 'enrollment_process_pending_direct_manager_approval';
    $node->enforceIsNew();
    $node->save();
    drupal_set_message( "You have been registered for the course. An Email has been sent to your Manager for approval!\n");
    if (is_numeric($node->id()))
      return true;
    else return false;
  }


  /**
   * check if the user registered in this course schedule or not
   *
   * @return bool
   *   Return true
   */
  public static function check_user_registered_before($uid, $course_id, $course_schedule_id) {
    // check if the user registered in this course schedule
    // check if the user registered and attend in this course before
    // user can apply if he had applied before and was rejected
    $connection = \Drupal::database();
    $result = $connection->queryRange("select node_field_data.uid as uid,  node__field_enrollment_status.* from node__field_enrollment_status inner join node_field_data on (entity_id= nid)  inner join node__field_course_name using (entity_id) where  node_field_data.uid = :uid and node__field_course_name.field_course_name_target_id =:course_id and field_enrollment_status_value not in  (:states[])",0,10, [':uid' => $uid,':course_id' => $course_id, ':states[]' => ['enrollment_process_direct_manager_disapproved', 'enrollment_process_qdg_administration_disapproved']]);  
    // Execute the statement
    $results = false;
    foreach ( $result as $record) {
      //$results [] = $record->uid;
      if(is_numeric($record->uid))
        $results = true;
    }
    return $results; 
  }

}
