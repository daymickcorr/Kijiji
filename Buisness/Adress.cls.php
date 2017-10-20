<?php
class Adress
{private $pk_add_zip;
private $add_city;
private $add_state;
private $add_adress;
    
function __construct($pk_add_zip=null,$add_city=null,$add_state=null,$add_adress=null){
    $this->pk_add_zip=$pk_add_zip;
    $this->add_city=$add_city;
    $this->add_state=$add_state;
    $this->add_adress=$add_adress;
}
public function getPk_add_zip()
    {
        return $this->pk_add_zip;
    }
    public function getAdd_city()
    {
        return $this->add_city;
    }
    public function setPk_add_zip($pk_add_zip)
    {
        $this->pk_add_zip = $pk_add_zip;
    }
    public function setAdd_city($add_city)
    {
        $this->add_city = $add_city;
    }
    public function getAdd_state()
    {
        return $this->add_state;
    }
    public function setAdd_state($add_state)
    {
        $this->add_state = $add_state;
    }
    public function getAdd_adress()
    {
        return $this->add_adress;
    }
    public function setAdd_adress($add_adress)
    {
        $this->add_adress = $add_adress;
    }
    static function header(){
        $str= "<table border='1'><tr>";
        $str="$str<th>pk_add_zip </th><th>add_city </th><th>add_state </th><th>add_adress </th></tr>";
        return $str;
    }
    static function footer(){
        return "</table>";
    }
    function __toString(){
        return "<tr><td>$this->pk_add_zip</td><td>$this->add_city</td><td>$this->add_state</td><td>$this->add_adress</td></tr>";
    }

    function create($connectionId){
        $pk_add_zip = $this->pk_add_zip;
        $add_city = $this->add_city;
        $add_state = $this->add_state;
        $add_adress = $this->add_adress;
        $sqlStmt = "INSERT INTO adress 
       VALUES ('$pk_add_zip','$add_city','$add_state','$add_adress')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function update($connectionId){
        $pk_add_zip = $this->pk_add_zip;
        $add_city = $this->add_city;
        $add_state = $this->add_state;
        $add_adress = $this->add_adress;
        $sqlStmt = "UPDATE adress
        SET add_city=('$add_city')
        WHERE pk_add_zip =('$pk_add_zip')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function delete($connectionId){
        $pk_add_zip = $this->pk_add_zip;
        $sqlStmt = "DELETE FROM adress
       WHERE pk_add_zip=('$pk_add_zip')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function find($connectionId){
        
        $pk_add_zip = $this->pk_add_zip;
        $sqlStmt = "SELECT * FROM adress WHERE pk_add_zip='$pk_add_zip'";
        $result = $connectionId->query($sqlStmt);
        $temp  = new Adress();
        foreach ($result as $row){
            $temp->pk_add_zip = $row["pk_add_zip"];
            $temp->add_city = $row["add_city"];
            $temp->add_state = $row["add_state"];
            $temp->add_adress = $row["add_adress"];
        }
        return $temp;
    }
    
}
?>