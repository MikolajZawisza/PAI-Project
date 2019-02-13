<?php

require_once("AppController.php");
require_once(__DIR__.'/../model/UserMapper.php');


class DeleteController extends AppController
{
    private $mapper = null;

    public function __construct()
    {
        parent::__construct();
        $this->mapper = new UserMapper();
    }



    public function deletexpedition():void
    {
        if(!isset($_SESSION['zalogowany'])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}FoodProductBase/?page=index");
            exit();
        }

        $id_exped = $_GET['id_expedition'];
        $this->mapper->deleteExpedition($id_exped);

        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}FoodProductBase/?page=usermenu");
        exit();
    }
}