<?php
namespace Drupal\psr4_form\Form;


class FormExample extends \Drupal\cool\BaseForm {

  static public function getId() {
    return 'psr4_form';
  }

  static public function build() {
    $form = parent::build();
    $form['my_textfield'] = array(
      '#type' => 'textfield',
      '#title' => t('My textfield'),
    );
    return $form;
  }

  static public function validate($form, &$form_state) {
    if (empty($form_state['values']['my_textfield'])) {
      form_set_error('my_textfield', 'You did not enter anything.');
    }
  }

  static public function submit($form, &$form_state) {
    drupal_set_message(t('You entered <strong>%text</strong>', array('%text' => $form_state['values']['my_textfield'])));
  }
}