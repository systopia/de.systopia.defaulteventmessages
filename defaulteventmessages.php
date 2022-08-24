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

require_once 'defaulteventmessages.civix.php';
// phpcs:disable
use CRM_Defaulteventmessages_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function defaulteventmessages_civicrm_config(&$config) {
  _defaulteventmessages_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function defaulteventmessages_civicrm_install() {
  _defaulteventmessages_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function defaulteventmessages_civicrm_postInstall() {
  _defaulteventmessages_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function defaulteventmessages_civicrm_uninstall() {
  _defaulteventmessages_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function defaulteventmessages_civicrm_enable() {
  _defaulteventmessages_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function defaulteventmessages_civicrm_disable() {
  _defaulteventmessages_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function defaulteventmessages_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _defaulteventmessages_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function defaulteventmessages_civicrm_entityTypes(&$entityTypes) {
  _defaulteventmessages_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_post().
 *
 * @ink https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_post/
 */
function defaulteventmessages_civicrm_post($op, $objectName, $objectId, &$objectRef) {
  // only react for Email Entity update and edit
  if ($objectName == "Event" && $op == "create") {
    // need to check/verify if Event is
    if ($objectRef->is_template) {
      // noting to do here! We don't need to create eventmessages for event templates!
      return;
    }
    if (!CRM_Defaulteventmessages_Utils::is_active()) {
      // if we are not activated again nothing to do here
      return;
    }
    $new_event_id = $objectRef->id;
    $event_template_id = CRM_Defaulteventmessages_Utils::get_configured_template_id();
    // copy Event Message Rules and Settings from template!
    CRM_Eventmessages_Logic::copyRules($event_template_id, $new_event_id);
    CRM_Eventmessages_Logic::copySettings($event_template_id, $new_event_id);
  }

}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function defaulteventmessages_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function defaulteventmessages_civicrm_navigationMenu(&$menu) {
//  _defaulteventmessages_civix_insert_navigation_menu($menu, 'Mailings', [
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ]);
//  _defaulteventmessages_civix_navigationMenu($menu);
//}
