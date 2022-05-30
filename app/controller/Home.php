<?php

class Home extends Controller{
    private $param;
    private $model;
    private $data;

    public function index($param = ""){
        $data = array(
            $param,
            $anotherData = "Value",
        );

        $this->view('templates/header');
        $this->view('content/index', $data);
        $this->view('templates/footer');
    }
}

?>