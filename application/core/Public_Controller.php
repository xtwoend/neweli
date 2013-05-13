<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Public_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->template->set_theme('frontend');
    }
}