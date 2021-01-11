<?php

namespace Drupal\lms_common;
use Symfony\Component\HttpFoundation\Request;

/**
 * Enacapsulate functions that can be used under nominations during enrolment or post enrolment prcess
 */

class Nominations {

	/**
	 * @var \Drupal\Core\Config\ConfigFactoryInterface
	 */

	/**
   * Returns list of accepted nominations for specific course schedule
   */
	public function get_accepted_nominations($schedule_id){
	  $nominations_listing = array();
	  $nominations = \Drupal::entityTypeManager()
	  ->getStorage('node')
	  ->loadByProperties(['type' => 'nomination', 'field_course_schedule_batch' => $schedule_id,
	  	  'field_enrollment_status' =>  'enrollment_process_qdg_administration_approved']);
	  if(!empty($nominations)){
	    $last_number = 0;
	    foreach ( $nominations as $nomination ) {
	      $uid = $nomination->get('field_employee_name')->getValue()[0]['target_id'];
	      $user = \Drupal\user\Entity\User::load($uid);
	      if (is_null($user)) {

	      }
	      $nominations_listing [$uid] = "<a href = '/user/".$uid."'> QID:". $user->getUsername() ."<br>". $user->get('field_full_name')->value . "</a>";
	    }
	  }
	  return $nominations_listing;
	}
	
   /**
   * check if this employee has been nominated before in this course
   * @employee_id user id
   * @schedule_id target_id of schedule
   */
	public function employee_nominated_before_in_schedule($employee_id, $schedule_id) {
 		$nodes = \Drupal::entityTypeManager()
	  	->getStorage('node')
	  	->loadByProperties(['type' => 'nomination', 'field_course_schedule_batch' => $schedule_id, 'field_employee_name' => $employee_id]);
	  if(!empty($nodes)){
	  	return true;
	  }
	  else return false;
	}

   /**
   * check if this employee has an ITP plan before
   * @employee_id user id
   * @itp_year target_id of schedule
   */
	public function employee_has_itp_plan_already($employee_id, $itp_year) {
 		$nodes = \Drupal::entityTypeManager()
	  	->getStorage('node')
	  	->loadByProperties(['type' => 'itp', 'field_itp_year' => $itp_year, 'field_employee_name' => $employee_id]);
	  if(!empty($nodes)){
	  	return true;
	  }
	  else return false;
	}

}
