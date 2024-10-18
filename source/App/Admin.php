<?php

namespace Source\App;

use League\Plates\Engine;

class Admin
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/adm","php");
    }

    public function home ()
    {
        //echo "<h1>Eu sou a Home...</h1>";
        echo $this->view->render("home",[]);
    }

    public function clients ()
    {
        //echo "<h1>Eu sou a clients...</h1>";
        echo $this->view->render("clients",[]);
    }

    public function personaisAdm ()
    {
        //echo "<h1>Eu sou a clients...</h1>";
        echo $this->view->render("personaisAdm",[]);
    }

    public function exercises ()
    {
        //echo "<h1>Eu sou a clients...</h1>";
        echo $this->view->render("exercises",[]);
    }

    public function trains ()
    {
        //echo "<h1>Eu sou a clients...</h1>";
        echo $this->view->render("trains",[]);
    }

    public function forms ()
    {
        //echo "<h1>Eu sou a clients...</h1>";
        echo $this->view->render("forms",[]);
    }

    public function screenTV() : void
    {
        echo $this->view->render("screenTV",[]);
    }

}