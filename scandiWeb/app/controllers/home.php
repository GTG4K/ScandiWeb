<?php

class Home extends Controller
{

    function index()
    {
        $data['Product'] = $this->loadModel("Product");

        $this->view("home", $data);
    }

    function massDelete(){
        $product = $this->loadModel("Product");

        $product->massDelete($_POST);
    }
}
