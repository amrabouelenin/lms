<?php

namespace Drupal\workflow_notifications\Plugin\QueueWorker;

use Drupal\Core\Queue\QueueWorkerBase;

/**
 * process mail to the scheduled entities.
 *
 * @QueueWorker(
 *   id = "workflow_scheduled_entity_mail",
 *   title = @Translation("Workflow mail trigger for scheduled entities."),
 *   cron = {"time" = 60},
 * )
 */
class ScheduleMailQueue extends QueueWorkerBase {

  /**
   * {@inheritdoc}
   */
  public function processItem($notification) {
    $day = $notification->days ? $notification->days : 0;
    if (!empty($day)) {
      $start_time = strtotime("+" . $day . " days 12:00:00 am");
      $end_time = strtotime("+" . $day . " days 11:59:59 pm");
      _workflow_notifications_send_mail_to_all($start_time, $end_time, $notification);
    }
  }
}
