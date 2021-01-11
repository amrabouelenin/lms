<?php

namespace Drupal\genpass;

/**
 * Provides an interface defining an constants for Genpass.
 */
interface GenpassInterface {

  /**
   * Configuration option constants for genpass_mode.
   */
  const PASSWORD_REQUIRED = 0;
  const PASSWORD_OPTIONAL = 1;
  const PASSWORD_RESTRICTED = 2;

  /**
   * Configuration option constants for genpass_display.
   */
  const PASSWORD_DISPLAY_NONE = 0;
  const PASSWORD_DISPLAY_ADMIN = 1;
  const PASSWORD_DISPLAY_USER = 2;
  const PASSWORD_DISPLAY_BOTH = 3;

}
