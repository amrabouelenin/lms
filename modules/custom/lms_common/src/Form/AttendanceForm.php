<?php

namespace Drupal\lms_common\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configuration form definition for tattendance.
 */
class AttendanceForm extends FormBase {

  /**
   * Returns a unique string identifying the form.
   *
   * The returned ID should be a unique string that can be a valid PHP function
   * name, since it's used in hook implementation names such as
   * hook_form_FORM_ID_alter().
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'trainee_attendance_form';
  }
  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    // prepare the required params
    $current_path = \Drupal::service('path.current')->getPath();
    $path_args = explode('/', $current_path);
    $schedule_id = $path_args[3];
    
    // title of the attendance form setting
    $title = "";
    $schedules = \Drupal::entityTypeManager()
    ->getStorage('node')
    ->loadByProperties(['type' => 'course_schedule', 'nid' => $schedule_id]);
    if(!empty($schedules)){
      foreach ( $schedules as $schedule ) {
        $title = $schedule->get('title')->getValue()[0]['value'] ; 
        $course_nid =$schedule->get('field_course_name')->getValue()[0]['target_id'] ;
        $course = \Drupal::entityTypeManager()->getStorage('node')->loadByProperties(['type' => 'course', 'nid' => $course_nid]);
      }
    }
    // Print $schedule_id; exit();
    // Set the title of the form
    $title = $course[$course_nid]->get('title')->getValue()[0]['value'] ." / ".$title ;
    $url = \Drupal\Core\Url::fromURI('internal:/node/'. $schedule_id);
    $form['#title'] = $link = \Drupal::service('link_generator')->generate($title, $url);
    // Get the accepted nominations ti set the attendance accordingly
    $nominations   = \Drupal::service('lms_common.nominations')->get_accepted_nominations($schedule_id);
    $schedule_days = \Drupal::service('lms_common.schedules')->get_days_for_course($schedule_id);
    $table_header  = array_merge(array($this->t('Attendance / Nominations')), $schedule_days);
    $table_header['total_attendance'] = t('Overall Attendance');
    $form['attendance'] = array(
      '#type' => 'table',
      '#header' => $table_header,
    );
    #Number of rows is the number of nominations
    $number_of_rows = count($nominations);
    $number_of_cols = count($table_header)-1;
    // Prepare nominations rows
    $i = 1;
    foreach ($nominations as $key=> $nomination ) {
      $i++;
    }
    // Prepare the status select list in all cells
    foreach ($nominations as $uid => $nomination) {
      $markup = "<a href = 'user/1'>". $nomination ."</a>";
      $form['attendance'][$uid][]['nomination'] = [
        '#type' => 'markup',
        '#markup' => $markup,
        '#weight' => 1,            
      ];
      foreach ($schedule_days as $session_date_id => $day) {
      
        $default_status = 0;
        $get_day_status_record = \Drupal::service('lms_common.attendance')->get_day_attendnace_status_for_emplpyee($uid, $session_date_id, $schedule_id);
        if(is_numeric(@$get_day_status_record->pid)) {
          $default_status = $get_day_status_record->attendance_status;
        }
        $form['attendance'][$uid][$session_date_id]['status'] =  [
          '#type' => 'select',
          '#title' => $this
            ->t('Attendance Status'),
          '#options' => [
            '0' => $this
              ->t('Absent'),
            '1' => $this
              ->t('Present'),
            ],
            '#default_value' => $default_status,
        ];
      }
      // at the end of every row prepare overall status widget
      $form['attendance'][$uid][$number_of_cols]['attendace_form_overall_status'] =  [
        '#type' => 'select',
        '#title' => $this
          ->t('Total attendnace'),
        '#options' => [
          '0' => $this
            ->t('Absent'),
          '1' => $this
            ->t('Present'),
          '2' => $this
            ->t('incomplete'),
        ],
        '#prefix'     => '<span class="select_status"'.$i.'>',
        '#suffix'     => '</span>',
        '#default_value' => \Drupal::service('lms_common.attendance')->get_total_attendnace_status_for_emplpyee($uid, $schedule_id),

      ];
      $form['attendance'][$uid][$number_of_cols]['auto_status'] =  [
        '#type' => 'checkbox',
        '#title' => $this
          ->t('Auto calculated'),
        '#options' => [
          '1' => $this
            ->t('Automatic'),
          '0' => $this
            ->t('Absent'),
        ],
        '#default_value' => 0,
      ];
    }
    // Group submit handlers in an actions element with a key of "actions" so
    // that it gets styled correctly, and so that other modules may add actions
    // to the form. This is not required, but is convention.
    $form['actions'] = array('#type' => 'actions');
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Save changes'),
      '#tableselect' => TRUE,
    );
    return $form;
  }
  /**
   * Validate the title and the checkbox of the form
   * 
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   * 
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);

    /*$title = $form_state->getValue('title');
      $accept = $form_state->getValue('accept');

      if (strlen($title) < 10) {
        // Set an error for the form element with a key of "title".
        $form_state->setErrorByName('title', $this->t('The title must be at least 10 characters long.'));
      }

      if (empty($accept)){
        // Set an error for the form element with a key of "accept".
        $form_state->setErrorByName('accept', $this->t('You must accept the terms of use to continue'));
      }
    */
  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // prepare the required params
    $current_path = \Drupal::service('path.current')->getPath();
    $path_args = explode('/', $current_path);
    $schedule_id = $path_args[3];

    $attendnace_values = $form_state->getValues()['attendance'];
    $database = \Drupal::database();
    foreach ($attendnace_values as $uid => $employee_attendance) {
      array_pop($employee_attendance);
      foreach ($employee_attendance as $session_date_id => $value) {
        $fields = array(
          'session_date_id' => $session_date_id,
          'schedule_id' => $schedule_id,
          'uid' => $uid,
          'attendance_status' => $value['status'],
        );
        // check if there is record before
        $check = \Drupal::service('lms_common.attendance')->get_day_attendnace_status_for_emplpyee($uid, $session_date_id, $schedule_id);
        
        // check if there is a record for this day, in that case do an update
        if (is_numeric(@$check->pid)) {
          // the process update query in the table
          $query = $database->update('attendance_data')
            ->fields(['attendance_status' => $value['status']]);
          // prepare the updare conditions
          $andGroup = $query->andConditionGroup()
            ->condition('session_date_id', $session_date_id)
            ->condition('uid', $uid)
            ->condition('schedule_id', $schedule_id);
          // run the update cmd
          $result = $query->condition($andGroup)->execute();
          // if there is return results then it is an update process
          if (is_numeric($result))
            drupal_set_message(t('Updated the Attendance Sheet for the schedule'), 'status');
          else drupal_set_message(t('no update happen'), 'status');
        }
        else {
          $database->insert('attendance_data')
            ->fields($fields)
            ->execute();
          drupal_set_message(t('New Attendance Sheet has been inserted for the schedule'), 'status');

        }
      }
      
    }

        // handle the full attendance record
        // save new attendance if there is no attednance node has been created for that course schedule and for that employee\
    $schedule = \Drupal::entityTypeManager()->getStorage('node')->load($schedule_id);
    $course_name_id = $schedule->get('field_course_name')->getValue()[0]['target_id'];
    foreach ($attendnace_values as $uid => $employee_attendance) {
      $attendance_status = end($employee_attendance)['attendace_form_overall_status'];
      \Drupal::service('lms_common.attendance')->saveupdate_attendance_node($uid, $schedule_id, $course_name_id, $attendance_status);
          
    }
  } 

}