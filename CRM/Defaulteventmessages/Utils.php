<?php
/*-------------------------------------------------------+
| SYSTOPIA Defaulteventmessages                          |
| Copyright (C) 2022 SYSTOPIA                            |
| Author: P. Batroff (batroff@systopia.de)               |
+--------------------------------------------------------+
| This program is released as free software under the    |
| Affero GPL license. You can redistribute it and/or     |
| modify it under the terms of this license which you    |
| can read by viewing the included agpl.txt or online    |
| at www.gnu.org/licenses/agpl.html. Removal of this     |
| copyright header is strictly prohibited without        |
| written permission from the original author(s).        |
+--------------------------------------------------------*/


use CRM_Defaulteventmessages_ExtensionUtil as E;

/**
 * Utils / Helper Class
 */
class CRM_Defaulteventmessages_Utils {

  /**
   * get all event templates and map them as id -> title
   *
   * @return array
   * @throws API_Exception
   * @throws \Civi\API\Exception\UnauthorizedException
   */
  public static function get_event_templates() {
    $events = \Civi\Api4\Event::get()
      ->addSelect('id', 'title')
      ->addWhere('is_template', '=', TRUE)
      ->execute();
    $event_template_mapping = [];
    foreach ($events as $event) {
      $event_template_mapping[$event['id']] = $event['title'];
    }
    return $event_template_mapping;
  }

  /**
   * @return mixed
   */
  public static function get_configured_template_id() {
    $config = CRM_Defaulteventmessages_Config::singleton();
    return $config->getSetting('defaulteventmessages_event_template');
  }

  /**
   * @return mixed
   */
  public static function is_active() {
    $config = CRM_Defaulteventmessages_Config::singleton();
    return $config->getSetting('defaulteventmessages_activated');
  }
}
