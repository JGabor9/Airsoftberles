<?php
namespace queries;

class Tipusok extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Tipusok";
        $this->sql = "SELECT * FROM tipusok;";
        $this->columns = [
            "id" => "id",
            "tipus" => "Tipus",
            "tipusDijPerNap" => "Tipus napi díj"
        ];

    }

}