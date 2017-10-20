<?php
class Subcategory
{private $pk_subCat_id;
private $subCat_description;
private $fk_category_id;
    
function __construct($pk_subCat_id=null,$subCat_description=null,$fk_category_id=null){
    $this->pk_subCat_id=$pk_subCat_id;
    $this->subCat_description=$subCat_description;
    $this->fk_category_id=$fk_category_id;
}
public function getPk_subCat_id()
    {
        return $this->pk_subCat_id;
    }
    public function getSubCat_description()
    {
        return $this->subCat_description;
    }
    public function setPk_subCat_id($pk_subCat_id)
    {
        $this->pk_subCat_id = $pk_subCat_id;
    }
    public function setSubCat_description($subCat_description)
    {
        $this->subCat_description = $subCat_description;
    }
    public function getFk_category_id()
    {
        return $this->fk_category_id;
    }
    public function setFk_category_id($fk_category_id)
    {
        $this->fk_category_id = $fk_category_id;
    }
    static function header(){
        $str= "<table border='1'><tr>";
        $str="$str<th>pk_subCat_id </th><th>subCat_description </th><th>fk_category_id </th></tr>";
        return $str;
    }
    static function footer(){
        return "</table>";
    }
    function __toString(){
        return "<tr><td>$this->pk_subCat_id</td><td>$this->subCat_description</td><td>$this->fk_category_id</td></tr>";
    }

    function create($connectionId){
        $pk_subCat_id = $this->pk_subCat_id;
        $subCat_description = $this->subCat_description;
        $fk_category_id = $this->fk_category_id;
        $sqlStmt = "INSERT INTO subcategory 
       VALUES ('$pk_subCat_id','$subCat_description','$fk_category_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function update($connectionId){
        $pk_subCat_id = $this->pk_subCat_id;
        $subCat_description = $this->subCat_description;
        $fk_category_id = $this->fk_category_id;
        $sqlStmt = "UPDATE subcategory
        SET subCat_description=('$subCat_description'),fk_category_id=('$fk_category_id')
        WHERE pk_subCat_id =('$pk_subCat_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function delete($connectionId){
        $pk_subCat_id = $this->pk_subCat_id;
        $sqlStmt = "DELETE FROM subcategory
       WHERE pk_subCat_id=('$pk_subCat_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function find($connectionId){
        $pk_subCat_id = $this->pk_subCat_id;
        $sqlStmt = "SELECT * FROM subcategory WHERE pk_subCat_id=$pk_subCat_id";
        $result = $connectionId->query($sqlStmt);
        $temp  = new subcategory();
        foreach ($result as $row){
            $temp->pk_subCat_id = $row["pk_subCat_id"];
            $temp->subCat_description = $row["subCat_description"];
            $temp->fk_category_id = $row["fk_category_id"];
        }
        return $temp;
    }
    
    function getAll($connectionId){
        $idx=0;
        foreach($connectionId->query("select * from subcategory") as $row){
           $subCategory = new Subcategory();
           $subCategory->pk_subCat_id= $row["pk_subCat_id"];
           $subCategory->subCat_description = $row["subCat_description"];
           $subCategory->fk_category_id = $row["fk_category_id"];
           $arr[$idx++] = $subCategory; 
        }
        return $arr;
    }
}
?>