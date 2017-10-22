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
    // get Subcat Desc
    function getSubcatDesc($connectionId) {
        $idx = 0;
        $sqlStmt = "SELECT distinct subCat_description FROM subcategory ORDER BY subCat_description";
        foreach ($connectionId->query($sqlStmt) as $oneRec) {
            $arrSCId[$idx++] = $oneRec["subCat_description"];
        }
        return $arrSCId;
    }
    function getSubcID($connectionId)
    {
        $idx = 0;
        $subCat_description = $this->subCat_description;
        $sqlStmt = "SELECT pk_subCat_id FROM subcategory where subCat_description ='$subCat_description'";
        foreach ($connectionId->query($sqlStmt) as $oneRec) {
            $temp = new Subcategory();
            $temp->pk_subCat_id = $oneRec["pk_subCat_id"];
            $arr[$idx++] = $temp;
            //$SCId[$idx++] = $oneRec["pk_subCat_id"];
        }
        return $arr;
    }
    /*   function find_subcat($connectionId){
        //suposed to be unique
        $fk_subCat_id = $this->fk_subCat_id;
        $sqlStmt = "SELECT * FROM ad WHERE fk_subCat_id=$fk_subCat_id";
        $result = $connectionId->query($sqlStmt);
        $temp  = new Ad();
        foreach ($result as $row){
            $temp->ad_description = $row["ad_description"];
            $temp->ad_exp_date = $row["ad_exp_date"];
            $temp->ad_reg_date = $row["ad_reg_date"];
            $temp->fk_mem_id = $row["fk_mem_id"];
            $temp->fk_pay_id = $row["fk_pay_id"];
            $temp->fk_subCat_id = $row["fk_subCat_id"];
            $temp->pk_ad_id = $row["pk_ad_id"];
            $temp->ad_price = $row["ad_price"];
            $temp->ad_title = $row["ad_title"];
        }
        return $temp;
    }
    }*/
}
?>