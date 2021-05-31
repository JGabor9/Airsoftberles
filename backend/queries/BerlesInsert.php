<?php

namespace queries;

class BerlesInsert extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Berles hozzáfűzés";
        $this->sql = "INSERT INTO berles
        (id,fegyverId,berloId,berbeadasDatuma,visszahozasDatuma,berletiDij)
        VALUES
        (?,?,?,?,?,?);;
        $this->typesString = "iiiiid";
        $this->paramVariables = [
            $params["id"],
            $params["fegyverId"],
            $params["berloId"],
            $params["berbeadasDatuma"],
            $params["visszahozasDatuma"],
            $params["berletiDij"]
        ];
        $this->columns = [];
    }