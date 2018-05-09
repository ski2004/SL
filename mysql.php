<?php

class MySql 
{
    // PDO instance
    public $db;



    protected $dbhost ="127.0.0.1" ;
    // protected $dbhost ="192.168.1.96" ;
    protected $dbUser = "root" ;
    protected $dbPass = "";
    // protected $dbPass = "123123";
    protected $dbName = "example" ;

    public function __construct()
    {
        $this->db  = new mysqli($this->dbhost, $this->dbUser, $this->dbPass , $this->dbName);
        $this->db->set_charset("utf8");
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function refValues($arr){
        if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
        {
            $refs = array();
            foreach($arr as $key => $value)
                $refs[$key] = &$arr[$key];
            return $refs;
        }
        return $arr;
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
            $WHERE[]= $k."=?" ;
            $value[]= $v;
        }
        $sql =(count($FIELDS)===0)? " SELECT * FROM $table " : " SELECT ".join(",",$FIELDS)." FROM $table "  ;
        $sql =(count($WHERE)===0)? $sql : $sql. " WHERE ".join(" AND ",$WHERE) ; 
        $sql .= " ORDER BY id ASC " ;

        $rs = $this->db->prepare($sql);
        
        if(count($value)>0){
            array_unshift( $value , str_repeat('s',count($value) ));
            call_user_func_array(array($rs, 'bind_param'), $this->refValues($value));
        }
        $rs->execute();
        /* Fetch result to array */
        $res = $rs->get_result();
        $data = [] ;
        while($row = $res->fetch_assoc()){
            $data[]=$row ;
        }
        return $data ;
    }

    public function update($table=null , $field=[] , $where=[] ){
        
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
        
        $rs = $this->db->prepare($sql);
        if(count($value)>0){
            array_unshift( $value , str_repeat('s',count($value) ));
            call_user_func_array(array($rs, 'bind_param'), $this->refValues($value));
        }
        $rs->execute();

        return  $rs->affected_rows ;
        
    }

    public function insert($table=null , $field=[] ){
        
    
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
        if(count($value)>0){
            array_unshift( $value , str_repeat('s',count($value) ));
            // print_r($value);
            call_user_func_array(array($rs, 'bind_param'), $this->refValues($value));
        }
        $rs->execute();
        
        return  $rs->affected_rows ;

    }

    public function del($table=null , $where=[] ){
        
        
        switch(true){
            case ($table===null):
            case (count($where)===0):
                return false ;
        }
        $WHERE = [] ;
        $value = [] ;
        foreach($where as $k=>$v){
            $WHERE[]= $k."=?" ;
            $value[]= $v;
        }
        $sql = " DELETE FROM $table WHERE ".join(' AND ',$WHERE) ;
        // echo $sql;        
        $rs = $this->db->prepare($sql);
        if(count($value)>0){
            array_unshift( $value , str_repeat('s',count($value) ));
            // print_r($value );
            call_user_func_array(array($rs, 'bind_param'), $this->refValues($value));
        }
        $rs->execute();
        // print_r($rs);
        return  $rs->affected_rows ;
    }

    public function close(){
        mysqli_close($this->db);
    }


}

