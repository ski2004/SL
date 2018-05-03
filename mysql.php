<?php

class MySql 
{
    // PDO instance
    public $db;



    protected $dbhost ="127.0.0.1" ;
    protected $dbUser = "root" ;
    protected $dbPass = "";
    protected $dbName = "example" ;

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:dbname=$this->dbName;host=$this->dbhost", $this->dbUser);
            $this->db->exec("SET CHARACTER SET utf8");
        }
        catch (PDOException $e) {
            throw new SmartyException('Mysql Resource failed: ' . $e->getMessage());
        }
       
    }

   
    public function get($table , $where=null , $field=null){

        $sql = ($field !== null)? "SELECT  $field  FROM  $table " : " SELECT * FROM $table " ;
        $sql = ($where !== null)? $sql."WHERE $where " : $sql  ;

        $rs = $this->db->prepare($sql);
        $rs->execute();
        $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
        return $rows ;
    }

    public function update($table , $field , $where=null ){
        
        try{
            switch(true){
                case ($where === null):
                case (count($field)===0):
                    return false ;
            }
            $SET= [] ;
            foreach($field as $k=>$v){
                $SET[]= $k."=".$this->db->quote($v) ;
            }
    
            $sql = " UPDATE $table SET ".join(",",$SET)." WHERE $where " ;
            echo $sql; 
            $rs = $this->db->prepare($sql);
            $rs->execute();
            return  $rs->rowCount() ;
        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function insert($table , $field ){
        
        try{
            switch(true){
                case (count($field)===0):
                    return false ;
            }
            $key = [] ;
            $value = [] ;

            foreach($field as $k=>$v){
                $key[]= $k ;
                $value[]= $v ;
            }


            $sql = " INSERT INTO $table (".join(',',$key).") VALUES(".join(',',$value).")" ;
            echo $sql; 
            $rs = $this->db->prepare($sql);
            $rs->execute();
            return  $rs->rowCount() ;
        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

}

