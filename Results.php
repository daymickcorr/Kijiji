<head>
<link rel="stylesheet" type="text/css" href="css/Ad.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<?php // -----------------find////////////////////
require_once 'Buisness/dbconfig.php';
require_once 'Buisness/Ad.cls.php';
require_once 'Buisness/Subcategory.cls.php';

$addDesc = $_GET["txtKeywordSearch"];


if (isset($_GET["btnSearchKey"]))
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
            echo "<br /><tr  class = 'tr_ad2'><td class = 'td_ad1' rowspan ='2'><div class='pAds'>";
            echo "<img src='".$element->getImages().
            "' alt='".$element->getImages()." not found' />";
            echo "</div></td ><td><a href='Ad.php?id=".$element->getPk_ad_id()."'>".$element->getAd_description()."</a></td>";
            echo "<td>".$element->getAd_price()."</td><td>".$element->getAd_reg_date()."</td><td>".$element->getAd_exp_date()."</td></tr>";
            echo "<tr class = 'tr_ad3'><td>".$element->getAd_title() ."</td><td colspan = '3'> </td> </tr>";
        }
        }
        echo Ad::footer();
}    




?>