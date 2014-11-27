<?php

error_reporting(E_ALL);

register_shutdown_function("fatal_handler");

function fatal_handler()
{
    $error = error_get_last();

    if ($error !== null) {
        print_r($error);
    }
}

require_once  'Route.php';
require_once  'Shell.php';
require_once  'routes.php';
