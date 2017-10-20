<?php
class Language
{private $pk_lan_id;
private $lan_type;
    
function __construct($pk_lan_id=null,$lan_type=null){
    $this->pk_lan_id=$pk_lan_id;
    $this->lan_type=$lan_type;
}
    public function getPk_lan_id()
    {
        return $this->pk_lan_id;
    }
    public function getLan_type()
    {
        return $this->lan_type;
    }
    public function setPk_lan_id($pk_lan_id)
    {
        $this->pk_lan_id = $pk_lan_id;
    }
    public function setLan_type($lan_type)
    {
        $this->lan_type = $lan_type;
    }
    static function header(){
        $str= "<table border='1'><tr>";
        $str="$str<th>pk_lan_id </th><th>lan_type </th></tr>";
        return $str;
    }
    static function footer(){
        return "</table>";
    }
    function __toString(){
        return "<tr><td>$this->pk_lan_id</td><td>$this->lan_type</td></tr>";
    }

    function create($connectionId){
        $pk_lan_id = $this->pk_lan_id;
        $lan_type = $this->lan_type;
        $sqlStmt = "INSERT INTO language 
       VALUES ('$pk_lan_id','$lan_type')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function update($connectionId){
        $pk_lan_id = $this->pk_lan_id;
        $lan_type = $this->lan_type;
        $sqlStmt = "UPDATE language
        SET lan_type=('$lan_type')
        WHERE pk_lan_id=('$pk_lan_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function delete($connectionId){
        $pk_lan_id = $this->pk_lan_id;
        $sqlStmt = "DELETE FROM language
       WHERE pk_lan_id=('$pk_lan_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function find($connectionId){
        
        $pk_lan_id = $this->pk_lan_id;
        $sqlStmt = "SELECT * FROM language WHERE pk_lan_id=$pk_lan_id";
        $result = $connectionId->query($sqlStmt);
        $temp  = new Language();
        foreach ($result as $row){
            $temp->pk_lan_id = $row["pk_lan_id"];
            $temp->lan_type = $row["lan_type"];
        }
        return $temp;
    }
    
    function getAll($connectionId){
        $idx=0;
        foreach ($connectionId->query("select * from language") as $row){
            $language = new Language();
            $language->pk_lan_id = $row["pk_lan_id"];
            $language->lan_type = $row["lan_type"];
            $arr[$idx++] = $language;
        }
        return $arr;
    }
}
?>