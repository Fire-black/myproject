<?php

function dd($a)
{
    var_dump($a); die();
}


require_once ('core/controller.php');
require_once ('core/model.php');
require_once ('core/view.php');
require_once ('core/route.php');
require_once ('core/db.php');

Route::start();

