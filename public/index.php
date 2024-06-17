<?php

use app\controllers\MainController;
define("DIR_PUBLIC", __DIR__ . "/css");
require_once("../vendor/autoload.php");
require_once "../app/config.php";


$controller = new MainController();
$controller = $controller->load();

?>