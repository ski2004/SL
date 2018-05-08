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

    public function queryAll($sql){
        $rs = $this->db->prepare($sql);
        $rs->execute();
        $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
        return $rows ;
    }

    public function get($table , $where=[] , $field=[]){
        
        $value = [] ;
        $WHERE = [] ;
        $FIELDS = [] ;
        foreach($field as $k=>$v){
            $FIELDS[]= $v ;
        }
        foreach($where as $k=>$v){
            $WHERE[]= $k."=:".$k ;
            $value[":".$k]= $v;
        }
        $sql =(count($FIELDS)===0)? " SELECT * FROM $table " : " SELECT ".join(",",$FIELDS)." FROM $table "  ;
        $sql =(count($WHERE)===0)? $sql : $sql. " WHERE ".join(" AND ",$WHERE) ; 
        $sql .= " ORDER BY id ASC " ;

        $rs = $this->db->prepare($sql);
        $rs->execute($value);
        $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
        return $rows ;
    }

    public function update($table=null , $field=[] , $where=[] ){
        
        try{
            switch(true){
                case ($table === null):
                case (count($field)===0):
                case (count($where)===0):
                    return false ;
            }
            $SET= [] ;
            $value = [] ;
            $WHERE = [] ;
            foreach($field as $k=>$v){
                $SET[]= $k."=?" ;
                $value[]= $v ;
            }
            foreach($where as $k=>$v){
                $WHERE[]= $k."=?" ;
                $value[]= $v ;
            }
    
            $sql = " UPDATE $table SET ".join(",",$SET)." WHERE ".join(",",$WHERE)." " ;
            // echo $sql; 
            $rs = $this->db->prepare($sql);
            $rs->execute($value);
            return  $rs->rowCount() ;
        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function insert($table=null , $field=[] ){
        
        try{
            switch(true){
                case ($table===null):
                case (count($field)===0):
                    return false ;
            }

            $key = [] ;
            $value = [] ;
            $inject = [] ;
            foreach($field as $k=>$v){
                $key[]= $k ;
                $inject[]= "?" ;
                $value[]= $v ;
            }


            $sql = " INSERT INTO $table (".join(',',$key).") VALUES(".join(',',$inject).")" ;
            // echo $sql; 
            $rs = $this->db->prepare($sql);
            $rs->execute($value);
            return  $rs->rowCount() ;
        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function del($table=null , $where=[] ){
        
        try{
            switch(true){
                case ($table===null):
                case (count($where)===0):
                    return false ;
            }
            $WHERE = [] ;
            $value = [] ;
            foreach($where as $k=>$v){
                $WHERE[]= $k."=:".$k ;
                $value[":".$k]= $v;
            }
            $sql = " DELETE FROM $table WHERE ".join(',',$WHERE) ;
            // echo $sql; 
            $rs = $this->db->prepare($sql);
            $rs->execute($value);
            return  $rs->rowCount() ;
        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }


}

