<?php

class Database
{
    private $hostname = 'localhost';
    private $username = 'root';
    private $pass = '';
    private $dbname = 'webbanhang';
    private $conn = NUll;
    private $result = NULL;
    protected $table = '';

    public function __construct()
    {
        $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
        if (!$this->conn) {
            echo 'ket noi that bai';
            exit();
        } else {
            mysqli_set_charset($this->conn, 'utf8');

        }
    }

    public function connect()
    {
        return $this->conn;
    }

    public function execute($sql)
    {
        $this->result = mysqli_query($this->conn, $sql);
        return $this->result;
    }

    public function getData()
    {

        if ($this->result) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }

    public function getAllData()
    {
        $sql = "SELECT * FROM $this->table";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }

    public function getDataId($id,$nameColumnId)
    {
        $sql = "SELECT * FROM $this->table WHERE $nameColumnId = '$id'";
        $this->execute($sql);
        if ($this->num_rows() > 0) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }

    public function num_rows()
    {
        if ($this->result) {
            $num = mysqli_num_rows($this->result);
        } else {
            $num = 0;
        }
        return $num;
    }

    public function inserData($dataInsert)
    {
        $columInsert = '';
        $valueInsert = '';
        $index = 1;
        foreach ($dataInsert as $column => $value) {
            $columInsert .= $column;
            $valueInsert .= "'" . $value . "'";

            if ($index < count($dataInsert)) {
                $columInsert .= ',';
                $valueInsert .= ',';
            }

            $index += 1;
        }
        $sql = "INSERT INTO $this->table  ($columInsert) VALUES  ($valueInsert)  ";
        return $this->execute($sql);
    }

    public function updateData($condition,$dataUpdate)
    {
        $arrIdUpdate = [];
        $stringSqlUpdate = '' ;
        $result = $this->searchData($condition);

        foreach ($result as $value){
            $arrIdUpdate[] = $value['id'];
        }
        $conditionUpdate     =   implode(',',$arrIdUpdate);

        $index = 1;
        foreach ($dataUpdate as $column => $value) {
            $stringSqlUpdate .=  $column." = '".$value."' ," ;
        }

        $stringSqlUpdate = substr($stringSqlUpdate, 0, -1);

        $sql = "UPDATE $this->table SET $stringSqlUpdate WHERE id IN ($conditionUpdate)";
        return $this->execute($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = '$id'";
        return $this->execute($sql);
    }

    public function searchData($dataSearch=[],$order= [])
    {
        if(count($dataSearch ) > 0) {
            $condition = '';
            $indexSearch = 1;
            foreach ($dataSearch as $column => $where) {
                if ($indexSearch > 1) {
                    $condition = $condition . " AND ";
                }
                $condition .= $column . ' ' . $where[0] . ' \'' . $where[1] . '\'';
                $indexSearch++;
            }
        }else{
            $condition = ' 1 '; //  lấy tất cả (select * ...)
        }

        //xử lý order by
        $stringSqlOrderBy = '' ;
        if(count($order)>0){
            $stringSqlOrderBy .= ' ORDER BY ' ;
            // input : ['created_at' => 'DESC', 'last_activity' => 'ASC' ]
            foreach ($order as $column => $value) {
                $stringSqlOrderBy .=  $column."  ".$value." ," ;
            }
            $stringSqlOrderBy = substr($stringSqlOrderBy, 0, -1);
            //output : ORDER BY created_at DESC, last_activity  ASC ;

        }

        $sql = "SELECT * FROM $this->table WHERE " . $condition.$stringSqlOrderBy;
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = [];
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }

}