<?php

namespace Drupal\lms_common\Ajax;

use Drupal\Core\Ajax\CommandInterface;

/**
 * Class SaveNomination.
 */
class SaveNomination implements CommandInterface {

  /**
   * Render custom ajax command.
   *
   * @return ajax
   *   Command function.
   */
  public function render() {
    return [
      'command' => 'nomination',
      'message' => 'My Awesome Message',
    ];
  }

}
