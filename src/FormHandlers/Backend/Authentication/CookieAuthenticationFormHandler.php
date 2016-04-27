<?php

/**
 * @file
 * Contains CookieAuthenticationFormHandler.
 */

namespace Drupal\integration_couchdb\FormHandlers\Backend\Authentication;

use Drupal\integration_ui\AbstractForm;

/**
 * Class CookieAuthenticationFormHandler.
 *
 * @package Drupal\integration_couchdb\Backend\Authentication
 */
class CookieAuthenticationFormHandler extends AbstractForm {

  /**
   * {@inheritdoc}
   */
  public function form(array &$form, array &$form_state, $op) {
    $configuration = $this->getConfiguration($form_state);
    $form['username'] = [
      '#title' => t('Username'),
      '#type' => 'textfield',
      '#default_value' => $configuration->getComponentSetting('authentication_handler', 'username'),
      '#required' => FALSE,
    ];
    $form['password'] = [
      '#title' => t('Password'),
      '#type' => 'textfield',
      '#default_value' => $configuration->getComponentSetting('authentication_handler', 'password'),
      '#required' => FALSE,
    ];
    $form['loginpath'] = [
      '#title' => t('Login path'),
      '#type' => 'textfield',
      '#default_value' => $configuration->getComponentSetting('authentication_handler', 'loginpath'),
      '#required' => FALSE,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function formSubmit(array $form, array &$form_state) {
    $configuration = $this->getConfiguration($form_state);
    $input = $form_state['input']['authentication_handler_configuration'];
    $configuration->setComponentSetting('authentication_handler', 'username', $input['username']);
    $configuration->setComponentSetting('authentication_handler', 'password', $input['password']);
    $configuration->setComponentSetting('authentication_handler', 'loginpath', $input['loginpath']);
  }

  /**
   * {@inheritdoc}
   */
  public function formValidate(array $form, array &$form_state) {

  }

}
