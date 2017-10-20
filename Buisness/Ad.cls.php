<?php

class Ad
{
    private $pk_ad_id;
    private $ad_description;
    private $ad_reg_date;
    private $ad_exp_date;
    private $fk_pay_id;
    private $fk_subCat_id;
    private $fk_mem_id;
    private $images = [];
    private $language;
    
/**
     * @return the $language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param field_type $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return the $images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param multitype: $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

function __construct($pk_ad_id=null,$ad_description=null,$ad_reg_date=null,
    $ad_exp_date=null,$fk_pay_id=null,$fk_subCat_id=null,$fk_mem_id=null){
    $this->pk_ad_id=$pk_ad_id;
    $this->ad_description=$ad_description;
    $this->ad_reg_date=$ad_reg_date;
    $this->ad_exp_date=$ad_exp_date;
    $this->fk_pay_id=$fk_pay_id;
    $this->fk_subCat_id=$fk_subCat_id;
    $this->fk_mem_id=$fk_mem_id;
}
public function getPk_ad_id()
    {
        return $this->pk_ad_id;
    }
    public function getAd_description()
    {
        return $this->ad_description;
    }
    public function setPk_ad_id($pk_ad_id)
    {
        $this->pk_ad_id = $pk_ad_id;
    }
    public function setAd_description($ad_description)
    {
        $this->ad_description = $ad_description;
    }
    public function getAd_reg_date()
    {
        return $this->ad_reg_date;
    }
    public function setAd_reg_date($ad_reg_date)
    {
        $this->ad_reg_date = $ad_reg_date;
    }
    public function getAd_exp_date()
    {
        return $this->ad_exp_date;
    }
    public function setAd_exp_date($ad_exp_date)
    {
        $this->ad_exp_date = $ad_exp_date;
    }
    public function getFk_pay_id()
    {
        return $this->fk_pay_id;
    }
    public function setFk_pay_id($fk_pay_id)
    {
        $this->fk_pay_id = $fk_pay_id;
    }
    public function getFk_subCat_id()
    {
        return $this->fk_subCat_id;
    }
    public function setFk_subCat_id($fk_subCat_id)
    {
        $this->fk_subCat_id = $fk_subCat_id;
    }
    public function getFk_mem_id()
    {
        return $this->fk_mem_id;
    }
    public function setFk_mem_id($fk_mem_id)
    {
        $this->fk_mem_id = $fk_mem_id;
    }
    static function header(){
        $str= "<table border='1'><tr>";
        $str="$str<th>pk_ad_id </th><th>ad_description </th><th>ad_reg_date </th><th>ad_exp_date </th><th>fk_pay_id </th><th>fk_subCat_id </th><th>fk_mem_id </th></tr>";
        return $str;
    }
    static function footer(){
        return "</table>";
    }
    function __toString(){
        return "<tr><td>$this->pk_ad_id</td><td>$this->ad_description</td><td>$this->ad_reg_date</td><td>$this->ad_exp_date</td><td>$this->fk_pay_id</td><td>$this->fk_subCat_id</td><td>$this->fk_mem_id</td></tr>";
    }

    function create($connectionId){
        $pk_ad_id = $this->pk_ad_id;
        $ad_description = $this->ad_description;
        $ad_reg_date = $this->ad_reg_date;
        $ad_exp_date = $this->ad_exp_date;
        $fk_pay_id = $this->fk_pay_id;
        $fk_subCat_id = $this->fk_subCat_id;
        $fk_mem_id = $this->fk_mem_id;
        $sqlStmt = "INSERT INTO ad VALUES ('$pk_ad_id','$ad_description','$ad_reg_date','$ad_exp_date','$fk_pay_id','$fk_subCat_id','$fk_mem_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function update($connectionId){
        $pk_ad_id = $this->pk_ad_id;
        $ad_description = $this->ad_description;
        $ad_reg_date = $this->ad_reg_date;
        $ad_exp_date = $this->ad_exp_date;
        $fk_pay_id = $this->fk_pay_id;
        $fk_subCat_id = $this->fk_subCat_id;
        $fk_mem_id = $this->fk_mem_id;
        $sqlStmt = "UPDATE ad
        SET ad_description=('$ad_description'),ad_reg_date=('$ad_reg_date'),ad_exp_date=('$ad_exp_date'),fk_pay_id=('$fk_pay_id'),fk_subCat_id=('$fk_subCat_id'),fk_mem_id=('$fk_mem_id')
        WHERE pk_ad_id =('$pk_ad_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function delete($connectionId){
        $pk_ad_id = $this->pk_ad_id;
        $sqlStmt = "DELETE FROM ad WHERE pk_ad_id=('$pk_ad_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
 
    function find($connectionId){
        //will return only last found
        //suposed to be unique
        $pk_ad_id = $this->pk_ad_id;
        $sqlStmt = "SELECT * FROM ad WHERE pk_ad_id=$pk_ad_id";
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
        }
        return $temp;
    }
    
    function getPayedAds($connectionId){
        //shows only 1 image
        $idx=0;
        foreach ($connectionId->query("select distinct pk_ad_id, ad_description, imagePath, ad_reg_date, category.fk_lan_id from Ad join Images on (images.fk_ad_id = Ad.pk_ad_id) join payement on (ad.fk_pay_id = payement.pk_pay_id) join subcategory on(ad.fk_subCat_id = subcategory.pk_subCat_id) join category on (subcategory.fk_category_id = category.pk_category_id) where pay_amount != 0 order by ad_reg_date DESC;") as $row){
            $temp = new Ad();
            
            $temp->ad_description = $row["ad_description"];
            //$temp->ad_exp_date = $row["ad_exp_date"];
            $temp->ad_reg_date = $row["ad_reg_date"];
            $temp->images = $row["imagePath"];
           // $temp->fk_mem_id = $row["fk_mem_id"];
            //$temp->fk_pay_id = $row["fk_pay_id"];
           // $temp->fk_subCat_id = $row["fk_subCat_id"];
            $temp->language = $row["fk_lan_id"];
            $temp->pk_ad_id = $row["pk_ad_id"];
            $arr[$idx++] = $temp;
        }
        return $arr;
    }
    
}
?>