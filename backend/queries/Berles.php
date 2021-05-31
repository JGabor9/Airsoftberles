<?php
namespace queries;

class Berles extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Berles";
        $this->sql = "SELECT * FROM berles;";
        $this->columns = [
            "id" => "id",
            "fegyverId" => "Fegyver id",
            "berloId" => "Bérlő id",
            "berbeadasDatuma" => "Bérbeadás Dátuma",
            "visszahozasDatuma" => "Visszaadás Dátuma",
            "berletiDij" => "Bérleti Díj"
        ];

    }

}