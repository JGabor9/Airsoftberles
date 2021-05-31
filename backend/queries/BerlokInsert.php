<?php

namespace queries;

class BerlokInsert extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Bérlő hozzáfűzés";
        $this->sql = "  INSERT INTO berlok
        (id,berloNev,telefonszam,szemelyigaz,irszam,lakhely,cim)
        VALUES
        ('?','?',?,?,'?','?');";
        $this->typesString = "issiiss";
        $this->paramVariables = [
            $params["iD"],
            $params["berloNev"],
            $params["telefonszam"],
            $params["szemelyigaz"],
            $params["irszam"],
            $params["lakhely"],
            $params["cim"]
        ];
    }
}