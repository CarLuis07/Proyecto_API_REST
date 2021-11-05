<?php
 class conectar{
     protected $dbh;

    protected function conexion(){

        try{
            $conectar= $this->dbh= new PDO("mysql:host=34.68.196.220;dbname=g1_20", "G1_20","fVl9pd2E");
            return $conectar;
        }catch(exception $e){
    print "ERROR: ".$e->getmessage() . "<br/>";
    die();}}
 
public function set_names(){
    return $this->dbh->query("SET NAMES 'utf8'");
}}