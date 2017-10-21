<?php // -----------------find
require_once 'Buisness/dbconfig.php';
require_once 'Buisness/Ad.cls.php';


$min_price = $_GET["min_price_search"];
$max_price = $_GET["max_price_search"];
$adId = $_GET["cboSearchAdId"];
$subcatId = $_GET["cboSearchSubcatId"];

try{
    $connectionId = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
    echo "You are connected to $dbname <br />";
if (isset($_GET["btnGoAddId"]))
{
   ///  ID 
    $t1 = new Ad($adId);
$isFound =$t1->find($connectionId);
echo "The Ad with the id: ".$t1->getPk_ad_id().
" is found successfully <br />";
echo Ad::header();
echo $isFound;
echo Ad::footer();
}
else if (isset($_GET["btnGoSubcatId"]))
{
///  Subcategory
$t2 = new Ad(1,"","","","",$subcatId);
$isFound =$t2->find_subcat($connectionId);
echo "The Ad with the Subcategory: ".$t2->getFk_subCat_id().
" is found successfully <br />";
echo Ad::header();
echo $isFound;
echo Ad::footer();
}

{
    if ($min_price!=""&&$max_price!="")
    {  $t3 = new Ad("","","","","","","",$min_price);
    $t4 = new Ad("","","","","","","",$max_price);
    $isFound =$t3->min_Price($connectionId);
    $isFound =$t4->max_Price($connectionId);
    echo "The Ad with price >: ".$t3->getAd_price()."and <: ".$t4->getAd_price().
    " is found successfully <br />";
    echo Ad::header();
    echo $isFound;
    echo Ad::footer();}
    
    else if ($min_price!=""&&$max_price=="")
    {
    $t3 = new Ad("","","","","","","",$min_price);
    $isFound =$t3->min_Price($connectionId);
    echo "The Ad with price >: ".$t3->getAd_price().
    " is found successfully <br />";
    echo Ad::header();
    echo $isFound;
    echo Ad::footer();
    }
    else if ($min_price==""&&$max_price!=""){

        $t3 = new Ad("","","","","","","",$max_price);
        $isFound =$t3->max_Price($connectionId);
        echo "The Ad with price <: ".$t3->getAd_price().
        " is found successfully <br />";
        echo Ad::header();
        echo $isFound;
        echo Ad::footer();
    }
    else {    }
}
}

/*($pk_ad_id=null,$ad_description=null,$ad_reg_date=null,
    $ad_exp_date=null,$fk_pay_id=null,$fk_subCat_id=null,$fk_mem_id=null)*/
catch (SQLException $exception){
    echo "Error, you are not connected <br />";
}

?>