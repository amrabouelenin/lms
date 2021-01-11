<?php

namespace Drupal\lms_common;
use Symfony\Component\HttpFoundation\Request;

/**
 * Enacapsulate functions that can be used under schedules or scheduling process
 */

class Schedules {

	/**
	 * @var \Drupal\Core\Config\ConfigFactoryInterface
	 */

  /**
   * return the new schedule code to be used for new schedule
   * @course_nid  nid of the course that has unified code for coruse
   */
	public function get_new_schedule_id($course_nid) {
	  // Retrieve an array which contains the path pieces.
	  $request = Request::createFromGlobals();
	  $current_path = $request->getPathInfo();
	  //$current_path = \Drupal::service('path.current')->getPath();
	  $path_args = explode('/', $current_path);
    //print_r($path_args);
	  if ($path_args[1] == 'node' &&  $path_args[2] == 'add' && !empty(@$_GET["edit"]['field_course_name']['widget'][0]['target_id'])) {
	    //print_r($course_nid->toArray()["field_course_name"][0]['target_id']); exit();
	    //$course_nid = $course_nid->toArray()["field_course_name"][0]['target_id'];
	    $node = \Drupal::entityTypeManager()->getStorage('node')->load($course_nid);
      $course_code = $node->get('field_course_id')->getValue()[0]['value'];
	    //print_r($node->toArray());exit();
	    //$course_code = $node->toArray()['field_course_id'][0]['value'];//$node->get('field_course_id')->getValue()[0]['value'];
	    //print 'amr'. $course_code; exit();
	    $last_id = $this->get_last_schedule_id($course_nid);
	    if (is_null(($last_id))) {
	      $last_id = 1;
	    }
	    $new_schedule_id = $course_code . '_' . $last_id;
	    \Drupal::service('logger.factory')->get('content')->info('calling get_new_schedule_id' . $new_schedule_id);	
	    return $new_schedule_id;   
	  }
	  else if ($path_args[1] == 'node' &&  $path_args[3] == 'edit'){
	    $node = \Drupal::entityTypeManager()->getStorage('node')->load($path_args[2] );
	    return $node->get('title')->getValue()[0]['value'];
	  }

	}
  
  /**
   * return last schedule id for specific course
   * @course_nid  nid of the course that has unified code for coruse
   */
	public function get_last_schedule_id($course_nid) {

 		$nodes = \Drupal::entityTypeManager()
	  	->getStorage('node')
	  	->loadByProperties(['type' => 'course_schedule', 'field_course_name' => $course_nid]);
	  if(!empty($nodes)){
	    $last_number = 0;
	    $counter = 0;
	    foreach ($nodes as $node) {
	      $schedule_code = $node->get('title')->getValue()[0]['value'];
	      $arr_schdule_code = explode('_', $schedule_code);
	      if (is_numeric(@$arr_schdule_code[1]) && @$arr_schdule_code[1] >= $last_number && !is_numeric(@$arr_schdule_code[2]) ) {
	        $last_number = $arr_schdule_code[1]+1;
	      }
	      elseif (is_numeric(@$arr_schdule_code[2]) && @$arr_schdule_code[2] >= $last_number) {
	        $last_number = $arr_schdule_code[2]+1;
	      }
	      $counter++;
	    }
	    \Drupal::service('logger.factory')->get('content')->info('calling get_last_schedule_id' . $last_number);	 

	    return $last_number;
	  }
	}
  
  /*
   * return days for course
   */
  public function get_days_for_course($schedule_id) {
  	$attendance_dates = array();
 		$schedules = \Drupal::entityTypeManager()
	  	->getStorage('node')
	  	->loadByProperties(['type' => 'course_schedule', 'nid' => $schedule_id]);
	  foreach ($schedules as $schedule) {
	    //print_r($schedule->get('field_sessions_dates')->getValue());
	    $dates_times = $schedule->get('field_sessions_dates')->referencedEntities(); 
			foreach ($dates_times as $date_time) {
				//print_r(); exit();
				$attendance_dates [$date_time->id()] = date('D,  M-j-Y', $date_time->get('field_session_date')->getValue()[0]['value']);
			}

	  }
	  //$attendance_dates [] = t('Overall Attendance');
    return $attendance_dates;
  }

}