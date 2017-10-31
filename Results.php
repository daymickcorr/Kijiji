<?php // -----------------find////////////////////
require_once 'Buisness/dbconfig.php';
require_once 'Buisness/Ad.cls.php';
require_once 'Buisness/Subcategory.cls.php';

/*$min_price = $_GET["min_price_search"];
$max_price = $_GET["max_price_search"];
$adId = $_GET["cboSearchAdId"];
$subcatId = $_GET["cboSearchSubcatId"];*/
$addDesc = $_GET["txtKeywordSearch"];


/*if (isset($_GET["btnGoAddId"]))
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
else */if (isset($_GET["btnSearchKey"]))
{
    
    $ad = new Ad(1,$addDesc);
  //  $isFound = $ad->getPayedAds($connectionId);
      $isFound =$ad->search_keyword($connectionId);
    echo "The result of search by keywords: ".$addDesc. " <br />";
    echo Ad::header();
    foreach ($isFound as $element)
    {
     
            
        if($element->getAdIds($connectionId)!=NULL)
        {
            echo "<tr><td rowspan = '2'><div class='pAds'>";
            echo "<img src='".$element->getImages().
            "' alt='".$element->getImages()." not found' />";
            echo "</div></td><td><a href='Ad.php?id=".$element->getPk_ad_id()."'>".$element->getAd_description()."</a></td>";
            echo "<td>".$element->getAd_price()."</td><td>".$element->getAd_reg_date()."</td><td>".$element->getAd_exp_date()."</td></tr>";
                echo "<tr><td>".$element->getAd_description() ."</td><td> </td><td> </td><td> </td> </tr>";
        }
        /*  echo "<tr><td rowspan = '2'>$this->images</td><td>$this->ad_title</td><td>$this->ad_price</td><td>$this->ad_reg_date</td><td>$this->ad_exp_date</td></tr>
           <tr><td>$this->ad_description </td><td> </td><td> </td><td> </td> </tr>";
            return $res;*/
    echo "<br /><br />";
        }
        echo Ad::footer();
}    

//Mikey code
/*$ad = new Ad();
 $ads = $ad->getPayedAds($connectionId);
 //echo $ad->header();
 foreach ($ads as $element){
 //echo $element;
 if($element->getLanguage() == $interfaceLanguage){
 echo "<div class='pAds'>";
 echo "<img src='".$element->getImages()."' alt='".$element->getImages()." not found' />";
 echo "<a href='Ad.php?id=".$element->getPk_ad_id()."'>".$element->getAd_description()."</a>";
 echo "</div>";
 }
 
 My code initial
 /*if (isset($_GET["btnSearchKey"]))
{
    $t1 = new Ad(1,$addDesc);
    $isFound =$t1->search_keyword($connectionId);
    echo "The Ad with the keywords: ".$addDesc. " is found  <br />";
   
    foreach ($isFound as $element)
    {
    echo Ad::header();

        if($element->getAdIds($connectionId)!=NULL)
        {
            echo $element;
        }
    echo Ad::footer();
    echo "<br /><br />";
        }
}    */
 


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
/*{
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
}*/


?>