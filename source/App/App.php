<?php

namespace Source\App;

use League\Plates\Engine;

class App
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/app","php");
    }

    public function home ()
    {
        //echo "<h1>Eu sou a Home...</h1>";
        echo $this->view->render("home",[]);
    }

    public function profile ()
    {
        //echo "<h1>Eu sou a Home...</h1>";
        echo $this->view->render("profile",[]);
    }

    public function start ()
    {
        //echo "<h1>Eu sou a Home...</h1>";
        echo $this->view->render("mainClient",[]);
    }

}