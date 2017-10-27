<?php // -----------------find////////////////////
require_once 'Buisness/dbconfig.php';
require_once 'Buisness/Ad.cls.php';
require_once 'Buisness/Subcategory.cls.php';

$min_price = $_GET["min_price_search"];
$max_price = $_GET["max_price_search"];
$adId = $_GET["cboSearchAdId"];
$subcatId = $_GET["cboSearchSubcatId"];
$subcatDesc = $_GET["txtKeywordSearch"];


if (isset($_GET["btnGoAddId"]))
{
   /////////////////  ID ////////////////////
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
 ////////////////////////  Subcat ID ////////////////////
    $t1 = new Ad(1,"","","","",$subcatId);
    $isFound =$t1->find_subcat($connectionId);
    echo "The Ad with the id: ".$t1->getFk_subCat_id().
    " is found successfully <br />";
    echo Ad::header();
    echo $isFound;
    echo Ad::footer();
}
else if (isset($_GET["btnSearchKey"]))
{
    $t1 = new Ad(1,"","","","",$subcatId);
    $isFound =$t1->search_keyword($connectionId);
    echo "The Ad with the keywords: ".$subcatDesc.
    " is found successfully <br />";
    echo Ad::header();
    foreach ($isFound as $element)
    {
        if($element->getAdIds($connectionId)!=NULL)
        {
            /////////// display multiple ///////////
            echo $element;
        }
    }
    echo Ad::footer();
}    

function search_keyword($connectionId)  // copied to ad
{
    $keywords = $subcatDesc;
    //$keywords = 'car, toy';
    $idx = 0;  ///
    $result = array();
    $keyword_tokens = explode(',', $keywords);
    $sql = '';
    foreach($keyword_tokens as $keyword) {
        $keyword = mysqli_real_escape_string(trim($keyword));
        if (!empty($sql)) $sql .= " UNION ";
        $sql .= "SELECT * FROM ad WHERE ad_description LIKE'%$keyword%'";
        foreach ($connectionId->query($sql) as $oneRec) {///
            $arrKey[$idx++] = $oneRec["ad_description"];///
        }///
        return $arrKey;///
    }
}
/////////////////////////  Subcategory - cancelled //////////////////////
  /* { $t1 = new Subcategory(1,$subcatDesc);
    $subcatId = $t1->getSubcID($connectionId);
    $t2 = new Ad(1,"","","","",$subcatID);
   // echo "The Ad in the Subcategory: ".$subcatId.", ".$subcatDesc.", is found successfully <br />";
    $isFound =$t2->find_subcatId($connectionId);

    echo Ad::header();
    {
        if($element->getAdIds($connectionId)!=NULL)
        {
            /////////// display multiple ///////////
            echo $element;
        }
    }
    echo Ad::footer();}*/

/////////////////////////PRICE/////////////////////////////////////////
{
    if ($min_price!=""&&$max_price!="")
    {  $t3 = new Ad("","","","","","","",$min_price);
    $t4 = new Ad("","","","","","","",$max_price);
    echo "The Ad with price more ".$t3->getAd_price()." and less ".$t4->getAd_price().
    " is found successfully <br />";
    $ads = $t3->min_Price($connectionId);
    $ads = $t4->max_Price($connectionId);
    echo Ad::header();
    foreach ($ads as $element)
    {
      if($element->getAdIds($connectionId)!=NULL)
       {
/////////// display multiple ///////////
    echo $element;
    } 
  }
    echo Ad::footer();
    }
    
    else if ($min_price!=""&&$max_price=="")
    { $t3 = new Ad("","","","","","","",$min_price);
    $ads = $t3->min_Price($connectionId);
    echo "The Ad with price >: ".$t3->getAd_price().
    " is found successfully <br />";
    echo Ad::header();
    foreach ($ads as $element)
    {
        if($element->getAdIds($connectionId)!=NULL)
        {
            /////////// display multiple ///////////
            echo $element;
        }
    }
    echo Ad::footer();
    }
    
    else if ($min_price==""&&$max_price!="")
    { $t3 = new Ad("","","","","","","",$max_price);
    $ads = $t3->max_Price($connectionId);
    echo "The Ad with price <: ".$t3->getAd_price().
    " is found successfully <br />";
    echo Ad::header();
    foreach ($ads as $element)
    {
        if($element->getAdIds($connectionId)!=NULL)
        {
            /////////// display multiple ///////////
            echo $element;
        }
    }
    echo Ad::footer();
    }
    else {    }
}


?>