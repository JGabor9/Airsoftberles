<?php
//POST
//login()
/*
query=loginUser
email=admin@ab.hu
password=admin
*/


namespace queries;

class LoginUser {
    protected $params;
    protected $status;
    protected $title;
    protected $rows;
    protected $columns;
    protected $sql;
    protected $typesString;
    protected $paramVariables;
    protected $password;

    public function __construct($params){
        $this->params = $params;
        $this->title = "Login";
        $this->sql = "SELECT * FROM berlok
                WHERE telefonszam = ?";
        $this->typesString = "s";
        $this->paramVariables = [$params["telefonszam"]];
        $this->password = $params["password"];
        $this->columns = [];
    }

    public function login(){
        $connection = (new \core\Connect())->connect();

        if ($connection) {
            if ($statement = mysqli_prepare($connection, $this->sql)) {
                // $autoId = $this->params["autoId"];
                // extract($this->params);
                mysqli_stmt_bind_param($statement, $this->typesString, ...$this->paramVariables);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);
                $record = mysqli_fetch_assoc($result);
                // print_r($record);
                // die;
                if ($record != null && password_verify($this->password, $record["jelszo"])) {
                    //email, password ok
                    $_SESSION["user"] = $record["berloNev"];
                    $this->status = "Ok";
                }else{
                    //nincs ilyen email, vagy nem jó a jelszó
                    $this->status = "Ok nincs ilyen jelszó vagy telefonszám";
                    unset($_SESSION["user"]);
                }


                $this->rows = [];
            }else{
                logMessage("ERROR","query error: ".mysqli_error($connection)); 
                $this->rows = [];
                $this->status = "Query Error";
            }
        }else{
            $this->status = "Connection Error";
            $this->rows = [];
        }

        (new \core\SendDataJson($this->params,  $this->status, $this->title, $this->rows, $this->columns))->sendData();

    }


}
