<?php


namespace app\controllers;

use app\controllers\DbActionsController;

class HomeController
{

    public $getNotes;
    public function __construct()
    {
        $this->getNotes = new DbActionsController();
    }

    public function index()
    {
        $this->loadStandardTemplate();
    }

    private function loadStandardTemplate()
    {
        require_once(DIR_STANDARD . "/view/HeaderView.php");
        $arr = $this->getNotes->get();
        require_once(DIR_STANDARD . "/view/HomeView.php");
        require_once(DIR_STANDARD . "/view/FooterView.php");
    }
}
