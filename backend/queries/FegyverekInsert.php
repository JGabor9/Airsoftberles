<?php
namespace queries;

class FegyverekInsert extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Fegyverek hozzáfűzés";
        $this->sql = "  INSERT INTO fegyverek
        (fegyverNev,sorozatSzam,bpm,bulletVelocity,tipusId)
        VALUES
        ('?',?,?,?,?)";
        $this->typesString = "siiii";
        $this->paramVariables = [
            $params["fegyvernev"],
            $params["sorozatszam"],
            $params["bpm"],
            $params["bulletvelocity"],
            $params["tipusid"]
        ];
    }
}