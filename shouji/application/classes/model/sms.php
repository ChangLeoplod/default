<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Sms extends ORM {

    protected  $_table_name = 'sms_msg';

  
    public static function getSms()
    {
        $sms = ORM::factory('sms')->where(msgtype,'=','reg_msgcode')->find()->as_array();
        
        return $sms  ;
    }

}