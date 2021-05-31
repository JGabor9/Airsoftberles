<?php
namespace queries;

class FegyverekSorozatszam extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Fegyverek";
        $this->sql = "SELECT id, CONCAT(fegyverNev,' (',sorozatSzam,') ') fegyverek FROM fegyverek
        ORDER BY id";
        $this->columns = [
            "id" => "id",
            "fegyverek" => "fegyversorozatszam"
        ];

    }

}