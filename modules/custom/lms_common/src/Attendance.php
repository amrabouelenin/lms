<?php

namespace Drupal\lms_common;
use Symfony\Component\HttpFoundation\Request;

/**
 * Enacapsulate functions that can be used under focal point entities 
 */

class Attendance {

	/**
	 * return the record in database in case the employee has attendnance record
	 */
	public function get_day_attendnace_status_for_emplpyee($uid, $session_date_id, $schedule_id) {
		$database = \Drupal::database();
		$result = $database->query("SELECT * FROM {attendance_data} WHERE 
			uid = :uid and session_date_id = :session_date_id and schedule_id = :schedule_id",
			[':uid' => $uid, ':session_date_id' => $session_date_id, ':schedule_id' => $schedule_id]);
		$record = $result->fetchObject();
		return($record);
	}

	/**
	 * return the record in database in case the employee has attendnance record
	 */
	public function get_total_attendnace_status_for_emplpyee($uid, $schedule_id) {
		$nodes = \Drupal::entityTypeManager()
	    ->getStorage('node')
	    ->loadByProperties([
	      'field_course_schedule_batch' => $schedule_id,
	      'field_employee_name' => $uid,
	      'type' => 'attendance',
	  ]);
	  if(!empty($nodes)){
	    foreach ( $nodes as $node ) {
	      return $node->get('field_attendance_status')->getValue()[0]['value'];
	    }
	  }
	}
	/**
	 * save attendance of the cheet one raw
	 */
	public function saveupdate_attendance_node($uid, $schedule_id, $course_name_id, $attendance_status) {
	  
	  $nodes = \Drupal::entityTypeManager()
	    ->getStorage('node')
	    ->loadByProperties([
	      'field_course_schedule_batch' => $schedule_id,
	      'field_employee_name' => $uid,
	      'type' => 'attendance',
	  ]);
	  if(!empty($nodes)){
	    foreach ( $nodes as $node ) {
	      // update attendance status
	      $node->set('field_course_schedule_batch', $schedule_id);
	      $node->set('field_course_name', $course_name_id);
	      $node->set('field_attendance_status', $attendance_status);
	      $node->save();
	      drupal_set_message(t('updated total attendance record'), 'status');
	      return $node;
	    }
	  }
	  else {
	    $attendance_node = \Drupal\node\Entity\Node::create(['type' => 'attendance' , 
	      'field_course_name'           => ['target_id' => $course_name_id],
	      'field_course_schedule_batch' => ['target_id' => $schedule_id],
	      'field_attendance_status'     => ['value' => $attendance_status],
	      'field_employee_name'         => ['target_id' => $uid],
	      'status'                      => 1,
	      'uid'                         => \Drupal::currentUser()->id(),
	    ]);

	    $attendance_node->enforceIsNew();
	    $attendance_node ->save();
	    drupal_set_message(t('created new attendance reocrd for total'), 'status');
	    //print "it is working fine"; exit();
	    return $attendance_node; 
	  }
	}
}