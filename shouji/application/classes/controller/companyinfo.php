<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Companyinfo extends Stourweb_Controller{
    public function before()
    {
        parent::before();
    }
    public function action_contactus()
    {
        $this->display('companyinfo/contact_us');
    }
    public function action_selectus()
    {
        $this->display('companyinfo/select_us');
    }
    public function action_helpcenter()
    {
        $this->display('companyinfo/help_center');
    }
    public function action_joinus()
    {
        $this->display('companyinfo/join_us');
    }
}

