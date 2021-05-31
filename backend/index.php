<?php
session_start();

ini_set("display_errors", "off");

require_once "core/config.php";
require_once "autoload.php";

(new \core\App())->start();