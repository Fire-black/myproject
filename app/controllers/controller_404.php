<?php

class controller_404 extends Controller
{

    function index()
    {
        $this->view->generate('404.php');
    }

}