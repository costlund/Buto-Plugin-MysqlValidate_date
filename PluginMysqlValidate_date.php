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
    if(wfArray::get($form, "items/$field/is_valid") && strlen(wfArray::get($form, "items/$field/post_value"))){
      if(strtotime(wfArray::get($form, "items/$field/post_value")) > strtotime(wfArray::get($form, "items/".$data->get('field')."/post_value"))){
        $form = wfArray::set($form, "items/$field/is_valid", false);
        $form = wfArray::set($form, "items/$field/errors/", $this->i18n->translateFromTheme('?label_1 is after ?label_2', array('?label_1' => wfArray::get($form, "items/$field/label"), '?label_2' => wfArray::get($form, "items/".$data->get('field')."/label"))));
      }
    }
    return $form;
  }
}