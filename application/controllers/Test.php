<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Base.php");

class Test extends Base {

	public function __construct()
        {
                parent::__construct();
     	
        }

    public function index(){
        phpinfo();
    }
}