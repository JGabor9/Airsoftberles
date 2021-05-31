<?php
namespace queries;

class Fegyverek extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Fegyverek";
        $this->sql = "SELECT * FROM fegyverek";
        $this->columns = [
            "id" => "id",
            "fegyverNev" => "Fegyver neve",
            "sorozatSzam" => "Fegyver sorozatszáma",
            "bpm" => "Golyó/perc",
            "bulletVelocity" => "Lövedék sebesség",
            "tipusId" => "Tipus"
        ];

    }

}