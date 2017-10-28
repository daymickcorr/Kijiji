<?php
require_once 'Buisness/Subcategory.cls.php';
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
    private $ad_price;
    private $ad_title;
    private $res;
    
    public function getAd_price()
    {
        return $this->ad_price;
    }

    public function getAd_tit()
    {
        return $this->ad_tit;
    }

    public function setAd_price($ad_price)
    {
        $this->ad_price = $ad_price;
    }

    public function setAd_tit($ad_tit)
    {
        $this->ad_tit = $ad_tit;
    }

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
    $ad_exp_date=null,$fk_pay_id=null,$fk_subCat_id=null, $fk_mem_id=null, $ad_price=null, $ad_title=null){
    $this->pk_ad_id=$pk_ad_id;
    $this->ad_description=$ad_description;
    $this->ad_reg_date=$ad_reg_date;
    $this->ad_exp_date=$ad_exp_date;
    $this->fk_pay_id=$fk_pay_id;
    $this->fk_subCat_id=$fk_subCat_id;
    $this->fk_mem_id=$fk_mem_id;
    $this->ad_price=$ad_price;
    $this->ad_title=$ad_title;
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
        $str="$str<th>pk_ad_id </th><th>ad_description </th><th>ad_reg_date </th><th>Expiration date </th><th>Payment </th><th>fk_subCat_id </th><th>Price </th><th>Title </th></tr>";
        return $str;
    }
    static function footer(){
        return "</table>";
    }
   
    function __toString(){
        $res="<tr><td>$this->pk_ad_id</td><td>$this->ad_description</td><td>$this->ad_reg_date</td><td>$this->ad_exp_date</td><td>$this->fk_pay_id</td><td>$this->fk_subCat_id</td><td>$this->ad_price</td><td>$this->ad_title</td></tr>";//
    return $res;
    }

    function create($connectionId){
        $pk_ad_id = $this->pk_ad_id;
        $ad_description = $this->ad_description;
        $ad_reg_date = $this->ad_reg_date;
        $ad_exp_date = $this->ad_exp_date;
        $fk_pay_id = $this->fk_pay_id;
        $fk_subCat_id = $this->fk_subCat_id;
        $fk_mem_id = $this->fk_mem_id;
        $ad_price = $this->ad_price;
        $ad_title = $this->ad_title;
        $sqlStmt = "INSERT INTO ad VALUES ('$pk_ad_id','$ad_description','$ad_reg_date','$ad_exp_date','$fk_pay_id','$fk_subCat_id','$fk_mem_id','$ad_price','$ad_title')";
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
        $ad_price = $this->ad_price;
        $ad_title = $this->ad_title;
        $sqlStmt = "UPDATE ad
        SET ad_description=('$ad_description'),ad_reg_date=('$ad_reg_date'),ad_exp_date=('$ad_exp_date'),fk_pay_id=('$fk_pay_id'),fk_subCat_id=('$fk_subCat_id'),fk_mem_id=('$fk_mem_id'),ad_price=('$ad_price'),ad_title=('$ad_title')
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
  
    function find($connectionId){  // find subcat ID, first function
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
            $temp->ad_price = $row["ad_price"];
            $temp->ad_title = $row["ad_title"];
        }
        return $temp;
    }
    //  find by subcategory subCat_id
/*      function getSubcID($connectionId)
    {
        $subCat_description = $this->subCat_description;
        $sqlStmt = "SELECT pk_subCat_id FROM subcategory where subCat_description ='$subCat_description'";
        $result = $connectionId->query($sqlStmt);
        $temp  = new Subcategory();
        foreach ($result as $row) {
            $temp->pk_subCat_id = $row["pk_subCat_id"];
            $arr[$idx++] = $temp;
            //$SCId[$idx++] = $oneRec["pk_subCat_id"];
        }
        return $arr;
    }
    }*/
    function find_subcatID($connectionId){  // train
        $idx=0;
        $fk_subCat_id = $this->fk_subCat_id;
        foreach ($connectionId->query("SELECT * FROM ad, subcategory WHERE fk_subCat_id=$fk_subCat_id and ad.fk_SubCat_Id=".
            " subcategory.pk_SubCat_Id")
             as $row){
            $temp = new Ad();
            $temp->ad_description = $row["ad_description"];
            $temp->ad_exp_date = $row["ad_exp_date"];
            $temp->ad_reg_date = $row["ad_reg_date"];
            $temp->fk_mem_id = $row["fk_mem_id"];
            $temp->fk_pay_id = $row["fk_pay_id"];
            $temp->fk_subCat_id = $row["fk_subCat_id"];
            $temp->pk_ad_id = $row["pk_ad_id"];
            $temp->ad_price = $row["ad_price"];
            $temp->ad_title = $row["ad_title"];
            $arr[$idx++] = $temp;
        }
        return $arr;
    }
    function find_subcat($connectionId){  // find by subcat ID
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
    ////////////////////////////search by keyword//////////////////////////////////////
    
    function search_keyword($connectionId)  // copied to ad
    {
        $keywords = $this->ad_description;
        echo $keywords.",Test";
        //$keywords = 'car, toy';
        $idx = 0;  ///
        $result = array();
        $keyword_tokens = explode(',', $keywords);
        $sql = '';
        if (count($keyword_tokens) ==1)
        foreach($keyword_tokens as $keyword) {
            $sql.= " ad_description LIKE'%".(trim($keyword))."%' ";
        }
        else if (count($keyword_tokens) >=2){
            foreach($keyword_tokens as $keyword) {
                $sql.= " ad_description LIKE'%".(trim($keyword))."%' OR";
                
            }
            $sql=  substr_replace($sql, "", -2); 
        }
        else if (count($keyword_tokens) >=2){
            foreach($keyword_tokens as $keyword) {
                $sql.= " ad_description LIKE'%".(trim($keyword))."%' OR";
                
            }
            $sql=  substr_replace($sql, "", -2);
        }
        echo $sql."\n";
        $sql = "SELECT * FROM ad WHERE $sql";
        foreach ($connectionId->query($sql) as $row) {///
            $temp = new Ad();
            $temp->ad_description = $row["ad_description"];
            $temp->ad_exp_date = $row["ad_exp_date"];
            $temp->ad_reg_date = $row["ad_reg_date"];
            $temp->fk_mem_id = $row["fk_mem_id"];
            $temp->fk_pay_id = $row["fk_pay_id"];
            $temp->fk_subCat_id = $row["fk_subCat_id"];
            $temp->pk_ad_id = $row["pk_ad_id"];
            $temp->ad_price = $row["ad_price"];
            $temp->ad_title = $row["ad_title"];
            $arrKey[$idx++] = $temp;
        }
        return $arrKey;
    }
    function min_Price($connectionId){
        $idx=0;
        $ad_price = $this->ad_price;
        foreach ($connectionId->query("SELECT * FROM ad WHERE ad_price>=$ad_price") as $row){
            $temp = new Ad();
            $temp->ad_description = $row["ad_description"];
            $temp->ad_exp_date = $row["ad_exp_date"];
            $temp->ad_reg_date = $row["ad_reg_date"];
            $temp->fk_mem_id = $row["fk_mem_id"];
            $temp->fk_pay_id = $row["fk_pay_id"];
            $temp->fk_subCat_id = $row["fk_subCat_id"];
            $temp->pk_ad_id = $row["pk_ad_id"];
            $temp->ad_price = $row["ad_price"];
            $temp->ad_title = $row["ad_title"];
            $arr[$idx++] = $temp;
        }
        return $arr;
    }
    function max_Price($connectionId){
        $idx=0;
        $ad_price = $this->ad_price;
        foreach ($connectionId->query("SELECT * FROM ad WHERE ad_price<=$ad_price") as $row){
            $temp = new Ad();
            $temp->ad_description = $row["ad_description"];
            $temp->ad_exp_date = $row["ad_exp_date"];
            $temp->ad_reg_date = $row["ad_reg_date"];
            $temp->fk_mem_id = $row["fk_mem_id"];
            $temp->fk_pay_id = $row["fk_pay_id"];
            $temp->fk_subCat_id = $row["fk_subCat_id"];
            $temp->pk_ad_id = $row["pk_ad_id"];
            $temp->ad_price = $row["ad_price"];
            $temp->ad_title = $row["ad_title"];
            $arr[$idx++] = $temp;
        }
        return $arr;
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
    // get Add ID
    function getAdIds($connectionId) {
        $idx = 0;
        $sqlStmt = "SELECT pk_ad_id FROM ad ORDER BY pk_ad_id";
        foreach ($connectionId->query($sqlStmt) as $oneRec) {
            $arrAdId[$idx++] = $oneRec["pk_ad_id"];
        }
        return $arrAdId;
    }
    // get Subcat ID
    function getSubcatIds($connectionId) {
        $idx = 0;
        $sqlStmt = "SELECT fk_subCat_id FROM ad ORDER BY fk_subCat_id";
        foreach ($connectionId->query($sqlStmt) as $oneRec) {
            $arrSCId[$idx++] = $oneRec["fk_subCat_id"];
        }
        return $arrSCId;
    }
    
  
}
?>