<?php
class PluginMysqlValidate_date{
  private $i18n;
  function __construct() {
    wfPlugin::includeonce('i18n/translate_v1');
    $this->i18n = new PluginI18nTranslate_v1();
    $this->i18n->path = '/plugin/mysql/validate_date/i18n';
  }
  public function validate_less_or_equal($field, $form, $data = array()){
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    if(wfArray::get($form, "items/$field/is_valid") && wfPhpfunc::strlen(wfArray::get($form, "items/$field/post_value"))){
      if(strtotime(wfArray::get($form, "items/$field/post_value")) > strtotime(wfArray::get($form, "items/".$data->get('field')."/post_value"))){
        $form = wfArray::set($form, "items/$field/is_valid", false);
        $form = wfArray::set($form, "items/$field/errors/", $this->i18n->translateFromTheme('?label_1 is after ?label_2', array('?label_1' => wfArray::get($form, "items/$field/label"), '?label_2' => wfArray::get($form, "items/".$data->get('field')."/label"))));
      }
    }
    return $form;
  }
  public function validate_first_day_in_month($field, $form, $data = array()){
    $form = new PluginWfArray($form);
    if($form->get("items/$field/is_valid")){
      if( date('d', strtotime($form->get("items/$field/post_value"))) !='01'){
        $form->set("items/$field/is_valid", false);
        $form->set("items/$field/errors/", $this->i18n->translateFromTheme('?label_1 must be first day in a month.', array('?label_1' => $form->get("items/$field/label"))));
      }
    }
    return $form->get();
  }
  public function validate_last_day_in_month($field, $form, $data = array()){
    $form = new PluginWfArray($form);
    if($form->get("items/$field/is_valid") && $form->get("items/$field/post_value")){
      if( date('Y-m-t', strtotime($form->get("items/$field/post_value"))) != $form->get("items/$field/post_value")){
        $form->set("items/$field/is_valid", false);
        $form->set("items/$field/errors/", $this->i18n->translateFromTheme('?label_1 must be last day in a month.', array('?label_1' => $form->get("items/$field/label"))));
      }
    }
    return $form->get();
  }
}