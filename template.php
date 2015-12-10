<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */
 
/**
* Implements hook_form_FORM_ID_alter().
*/

function bccgb2_form_user_login_block_alter(&$form) {
	
  $form['name']['#size'] = 16;
  $form['pass']['#size'] = 16;
  // Remove the links provided by Drupal.
  unset($form['links']);
  
  // Set a weight for form actions so other elements can be placed
  // beneath them.
  $form['actions']['#weight'] = 5;
  
  // Shorter, inline request new password link.
  $form['actions']['request_password'] = array(
    '#markup' => l(t('Lost password'), 'user/password', array('attributes' => array('title' => t('Request new password via e-mail.')))),
  );
  

	
  // New sign up link, with 'cuter' text.
  if (variable_get('user_register', USER_REGISTER_VISITORS_ADMINISTRATIVE_APPROVAL)) {
    $form['signup'] = array(
      '#markup' => l(t("Become a member"), 'membership', array('attributes' => array('id' => 'create-new-account', 'title' => t('Create a new user account.')))),
      '#weight' => 10,
    );
  }
}

function bccgb2_preprocess_html(&$variables) {
  drupal_add_css(path_to_theme() . '/css/ie-lte-8.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 8', '!IE' => FALSE), 'preprocess' => FALSE, 'weight' => 115));
  drupal_add_css(path_to_theme() . '/css/ie-lte-7.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE, 'weight' => 115));
  drupal_add_css(path_to_theme() . '/css/ie-6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE, 'weight' => 115));
}
