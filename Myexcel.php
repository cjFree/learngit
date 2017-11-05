<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Myexcel
{

    protected $conn = null;
    public function __construct()
    {
        if (!$this->conn){
            $dsn = "mysql:host=127.0.0.1;dbname=test";
            $this->conn = new PDO($dsn,'root','');
        }
    }
    
    
    
    
    public function putDataToDb($file_path)
    {
        include 'Plugs/PHPExcel.php';
        //判断文件类型
        $file_type = PHPExcel_IOFactory::identify($file_path);
        $obj_read = PHPExcel_IOFactory::createReader($file_type);
        $obj_excel = $obj_read->load($file_path);

        //当前工作表
        $obj_sheet = $obj_excel->getActiveSheet();
        //总行数
        $row_count = $obj_sheet->getHighestRow();
        //总列数
        $column = $obj_sheet->getHighestColumn();

        $data = [];
        for ($row_index = 2; $row_index <= $row_count; $row_index++) {
            //读取单元格内容
            $data[] = [
                'right_name' => $obj_sheet->getCell('B' . $row_index)->getValue(),
                'right_explain' => $obj_sheet->getCell('C' . $row_index)->getValue()
            ];
        }
        if ($data){
            $this->putToDb($data);
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
            $param[":right_module{$key}"] = "123";
        }
        $sql .= rtrim($string,',');
        $pdo_ment = $this->conn->prepare($sql);
       
        var_dump($pdo_ment->execute($param));
        
    }

}

$obj = new Myexcel();
$obj->putDataToDb('right.xlsx');


