<?php
class Category
{private $pk_category_id;
private $cat_description;
private $fk_lan_id;
    
function __construct($pk_category_id=null,$cat_description=null,$fk_lan_id=null){
    $this->pk_category_id=$pk_category_id;
    $this->cat_description=$cat_description;
    $this->fk_lan_id=$fk_lan_id;
}
public function getPk_category_id()
    {
        return $this->pk_category_id;
    }
    public function getCat_description()
    {
        return $this->cat_description;
    }
    public function setPk_category_id($pk_category_id)
    {
        $this->pk_category_id = $pk_category_id;
    }
    public function setCat_description($cat_description)
    {
        $this->cat_description = $cat_description;
    }
    public function getFk_lan_id()
    {
        return $this->fk_lan_id;
    }
    public function setFk_lan_id($fk_lan_id)
    {
        $this->fk_lan_id = $fk_lan_id;
    }
    static function header(){
        $str= "<table border='1'><tr>";
        $str="$str<th>pk_category_id </th><th>cat_description </th><th>fk_lan_id </th></tr>";
        return $str;
    }
    static function footer(){
        return "</table>";
    }
    function __toString(){
        return "<tr><td>$this->pk_category_id</td><td>$this->cat_description</td><td>$this->fk_lan_id</td></tr>";
    }

    function create($connectionId){
        $pk_category_id = $this->pk_category_id;
        $cat_description = $this->cat_description;
        $fk_lan_id = $this->fk_lan_id;
        $sqlStmt = "INSERT INTO category 
       VALUES ('$pk_category_id','$cat_description','$fk_lan_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function update($connectionId){
        $pk_category_id = $this->pk_category_id;
        $cat_description = $this->cat_description;
        $fk_lan_id = $this->fk_lan_id;
        $sqlStmt = "UPDATE category
        SET cat_description=('$cat_description'),fk_lan_id=('$fk_lan_id')
        WHERE pk_category_id =('$pk_category_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function delete($connectionId){
        $pk_category_id = $this->pk_category_id;
        $sqlStmt = "DELETE FROM category
       WHERE pk_category_id=('$pk_category_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
  
    function find($connectionId){
        
        $pk_category_id = $this->pk_category_id;
        $sqlStmt = "SELECT * FROM category WHERE pk_category_id=$pk_category_id";
        $result = $connectionId->query($sqlStmt);
        $temp  = new Category();
        foreach ($result as $row){
            $temp->pk_category_id = $row["pk_category_id"];
            $temp->cat_description = $row["cat_description"];
            $temp->fk_lan_id = $row["fk_lan_id"];
        }
        return $temp;
    }
    
    function getAll($connectionId){
        $idx=0;
        foreach ($connectionId->query("Select * from category") as $row ){
            $category = new Category();
            $category->pk_category_id = $row["pk_category_id"];
            $category->cat_description = $row["cat_description"];
            $category->fk_lan_id = $row["fk_lan_id"];
            $arr[$idx++]= $category;
        }
        return $arr;
    }
}
?>