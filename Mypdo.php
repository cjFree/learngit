<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mypdo{
    
    protected $conn = null;
    public function __construct()
    {
        if (!$this->conn){
            $dsn = "mysql:host=127.0.0.1;dbname=test";
            $this->conn = new PDO($dsn,'root','');
        }
    }
    
    /**
     * pdo操作
     */
    public function putToDb($data){
        $sql = 'insert into `right` (right_name,right_explain,right_module) values ';
        $param = [];
        $string = '';
        foreach ($data as $key=>$value){
            $string .= "(:right_name{$key},:right_explain{$key},:right_module{$key}),";
            $param[":right_name{$key}"] = $value['right_name'];
            $param[":right_explain{$key}"] = $value['right_explain'];
            $param[":right_module{$key}"] = $value['right_module'];
        }
        $sql .= rtrim($string,',');
        $pdo_ment = $this->conn->prepare($sql);
       
        var_dump($pdo_ment->execute($param));
        
    }
}

$obj = new Mypdo();


$data = [
    ['right_name'=>'哈哈哈','right_explain'=>'映日荷花别样红','right_module'=>'接天莲叶无穷碧'],
    ['right_name'=>'江南好','right_explain'=>'日出江花红胜火','right_module'=>'春来江水绿如蓝']
];

$obj->putToDb($data);

