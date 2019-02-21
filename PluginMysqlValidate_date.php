<?php
class PluginMysqlValidate_date{
  public function validate_less_or_equal($field, $form, $data = array()){
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    if(wfArray::get($form, "items/$field/is_valid") && strlen(wfArray::get($form, "items/$field/post_value"))){
      if(strtotime(wfArray::get($form, "items/$field/post_value")) > strtotime(wfArray::get($form, "items/".$data->get('field')."/post_value"))){
        $form = wfArray::set($form, "items/$field/is_valid", false);
        $form = wfArray::set($form, "items/$field/errors/", __('?label_1 is after ?label_2', array('?label_1' => wfArray::get($form, "items/$field/label"), '?label_2' => wfArray::get($form, "items/".$data->get('field')."/label"))));
      }
    }
    return $form;
  }
}