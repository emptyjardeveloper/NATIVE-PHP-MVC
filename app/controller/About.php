<?php

class About extends Controller{
    private $data;
    public function index($param = ""){
            $data = array(
                $param,
            );
            
            $this->view('templates/header', $data);
            $this->view('content/about');
            $this->view('templates/footer');
    }
}

?>