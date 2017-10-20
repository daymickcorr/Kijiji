<?php
class MemeberType
{private $pk_memType_id;
private $memType;
    
function __construct($pk_memType_id=null,$memType=null){
    $this->pk_memType_id=$pk_memType_id;
    $this->memType=$memType;
}
public function getPk_memType_id()
    {
        return $this->pk_memType_id;
    }
    public function getMemType()
    {
        return $this->memType;
    }
    public function setPk_memType_id($pk_memType_id)
    {
        $this->pk_memType_id = $pk_memType_id;
    }
    public function setMemType($memType)
    {
        $this->memType = $memType;
    }
    static function header(){
        $str= "<table border='1'><tr>";
        $str="$str<th>pk_memType_id </th><th>memType </th></tr>";
        return $str;
    }
    static function footer(){
        return "</table>";
    }
    function __toString(){
        return "<tr><td>$this->pk_memType_id</td><td>$this->memType</td></tr>";
    }

    function create($connectionId){
        $pk_memType_id = $this->pk_memType_id;
        $memType = $this->memType;
        $sqlStmt = "INSERT INTO memeberType 
       VALUES ('$pk_memType_id','$memType')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function update($connectionId){
        $pk_memType_id = $this->pk_memType_id;
        $memType = $this->memType;
        $sqlStmt = "UPDATE memeberType
        SET memType=('$memType')
        WHERE pk_memType_id =('$pk_memType_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function delete($connectionId){
        $pk_memType_id = $this->pk_memType_id;
        $sqlStmt = "DELETE FROM memeberType
       WHERE pk_memType_id=('$pk_memType_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function find($connectionId){
        $pk_memType_id = $this->pk_memType_id;
        $sqlStmt = "SELECT * FROM memeberType WHERE pk_memType_id=$pk_memType_id";
        $result = $connectionId->query($sqlStmt);
        $temp  = new memeberType();
        foreach ($result as $row){
            $temp->pk_memType_id = $row["pk_memType_id"];
            $temp->memType = $row["memType"];
        }
        return $temp;
    }
}
?>