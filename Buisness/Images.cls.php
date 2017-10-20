<?php
class Images
{private $pk_image_id;
private $ImagePath;
private $fk_ad_id;
    
function __construct($pk_image_id=null,$ImagePath=null,$fk_ad_id=null){
    $this->pk_image_id=$pk_image_id;
    $this->ImagePath=$ImagePath;
    $this->fk_ad_id=$fk_ad_id;
}
public function getPk_image_id()
    {
        return $this->pk_image_id;
    }
    public function getImagePath()
    {
        return $this->ImagePath;
    }
    public function setPk_image_id($pk_image_id)
    {
        $this->pk_image_id = $pk_image_id;
    }
    public function setImagePath($ImagePath)
    {
        $this->ImagePath = $ImagePath;
    }
    public function getFk_ad_id()
    {
        return $this->fk_ad_id;
    }
    public function setFk_ad_id($fk_ad_id)
    {
        $this->fk_ad_id = $fk_ad_id;
    }
    static function header(){
        $str= "<table border='1'><tr>";
        $str="$str<th>pk_image_id </th><th>ImagePath </th><th>fk_ad_id </th></tr>";
        return $str;
    }
    static function footer(){
        return "</table>";
    }
    function __toString(){
        return "<tr><td>$this->pk_image_id</td><td>$this->ImagePath</td><td>$this->fk_ad_id</td></tr>";
    }

    function create($connectionId){
        $pk_image_id = $this->pk_image_id;
        $ImagePath = $this->ImagePath;
        $fk_ad_id = $this->fk_ad_id;
        $sqlStmt = "INSERT INTO images 
       VALUES ('$pk_image_id','$ImagePath','$fk_ad_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function update($connectionId){
        $pk_image_id = $this->pk_image_id;
        $ImagePath = $this->ImagePath;
        $fk_ad_id = $this->fk_ad_id;
        $sqlStmt = "UPDATE images
        SET ImagePath=('$ImagePath'),fk_ad_id=('$fk_ad_id')
        WHERE pk_image_id =('$pk_image_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function delete($connectionId){
        $pk_image_id = $this->pk_image_id;
        $sqlStmt = "DELETE FROM images
       WHERE pk_image_id=('$pk_image_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function find($connectionId){
        
        $pk_image_id = $this->pk_image_id;
        $sqlStmt = "SELECT * FROM images WHERE pk_image_id=$pk_image_id";
        $result = $connectionId->query($sqlStmt);
        $temp  = new Images();
        foreach ($result as $row){
            $temp->pk_image_id = $row["pk_image_id"];
            $temp->ImagePath = $row["ImagePath"];
            $temp->fk_ad_id = $row["fk_ad_id"];
        }
        return $temp;
    }
    
    function getAll($connection_Id){
        $idx=0;
        foreach($connection_Id->query("select * from images") as $row){
            $image = new Images();
            $image->pk_image_id = $row["pk_image_id"];
            $image->ImagePath = $row["ImagePath"];
            $image->fk_ad_id = $row["fk_ad_id"];
            $arr[$idx++] = $image;
        }
        return $arr;
    }
}
?>