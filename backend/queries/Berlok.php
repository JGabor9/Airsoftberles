<?php
namespace queries;

class Berlok extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Berlok";
        $this->sql = "SELECT * FROM berlok;";
        $this->columns = [
            "id" => "id",
            "berloNev" => "Bérlő neve",
            "accesslevel" => "Hozzáférési szint",
            "jelszo" => "Jelszava",
            "telefonszam" => "Telefonszáma",
            "szemelyigaz" => "Személyi igazolványszáma",
            "irszam" => "Irányítószáma",
            "lakhely" => "Lakhelye",
            "cim" => "Címe"
        ];

    }

}