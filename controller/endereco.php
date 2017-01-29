<?php

    function __autoload($class)
    {
        if(file_exists('../model/'.$class.'.php'))
            require_once('../model/'.$class.'.php');
        if(file_exists('../dao/'.$class.'.php'))
            require_once('../model/'.$class.'.php');
        if(file_exists('../util/'.$class.'.php'))
            require_once('../util/'.$class.'.php');
    }

    if(isset($_GET['cep'])
    {
        $cep = trim($_GET['cep']);
        $json = new ConsumoApi()->get();
        echo $json;
        die();
    }



 ?>