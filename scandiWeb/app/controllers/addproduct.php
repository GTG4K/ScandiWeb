<?php

class Addproduct extends Controller
{
    function index()
    {
        $this->view("add");
    }

    function new(){
        $Product = $this->loadModel("Product");

        $key_value = [];
        $POST = [];
        $DataKeys = array_keys($_POST);
        for ($i=0; $i < count($_POST); $i++) { 
            $key_value = [$DataKeys[$i], $_POST[$DataKeys[$i]]];
            array_push($POST, $key_value);
        }

        $Product->new_Product($POST);
    }
}
