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
 * Form controller class
 *
 * @see https://docs.civicrm.org/dev/en/latest/framework/quickform/
 */
class CRM_Defaulteventmessages_Form_Settings extends CRM_Core_Form {
  public function buildQuickForm() {
    // get current settings to pre-fill
    $config = CRM_Defaulteventmessages_Config::singleton();
    $current_values = $config->getSettings();

    $this->add(
      'checkbox',
      'defaulteventmessages_activated',
      E::ts('Activate Default template')
    );
    // add form elements
    $this->addElement(
      'select',
      'defaulteventmessages_event_template',
      E::ts("Default Event Message Template"), CRM_Defaulteventmessages_Utils::get_event_templates(),
      ['class' => 'crm-select2'],
      TRUE
    );

    // submit
    $this->addButtons(array(
      array(
        'type'      => 'submit',
        'name'      => E::ts('Save'),
        'isDefault' => TRUE,
      ),
    ));

    // set default values
    $this->setDefaults($current_values);

    parent::buildQuickForm();
  }

  /**
   * @return void
   */
  public function postProcess() {
    $config = CRM_Defaulteventmessages_Config::singleton();
    $values = $this->exportValues();
    $settings = $config->getSettings();
    foreach ($this->getSettingsInForm() as $name) {
      $settings[$name] = CRM_Utils_Array::value($name, $values, NULL);
    }
    $config->setSettings($settings);

    parent::postProcess();
  }

  /**
   * get the elements of the form
   * used as a filter for the values array from post Process
   * @return array
   */
  protected function getSettingsInForm() {
    return array(
      'defaulteventmessages_activated',
      'defaulteventmessages_event_template',
    );
  }

}
