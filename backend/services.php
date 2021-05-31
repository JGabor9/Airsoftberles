<?php
return [
    "berlokinsert" => function ($params){
        (new \queries\BerlokInsert($params))->render();
    },
    "fegyversorozatszam" => function ($params){
        (new \queries\FegyverekSorozatszam($params))->render();
    },
    "fegyverek" => function ($params){
        (new \queries\Fegyverek($params))->render();
    },
    "berlok" => function ($params){
        (new \queries\Berlok($params))->render();
    },
    "berles" => function ($params){
        (new \queries\Berles($params))->render();
    },
    "tipusok" => function ($params){
        (new \queries\Tipusok($params))->render();
    },
    "paramsError" => function ($params){
        (new \core\ParamsError($params))->render();
    },
    "loginUser" => function ($params){
        (new \queries\LoginUser($params))->login();
    },
    "logoutUser" => function ($params){
        (new \queries\LogoutUser($params))->logout();
    },
    "getUser" => function ($params){
        (new \queries\GetUser($params))->getUser();
    }
];