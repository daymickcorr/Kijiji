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
    
    $db = mysqli_connect("localhost","root","","mydb");    ///added
      $isFound =$ad->search_keyword($connectionId);
    echo "The result of search by keywords: ".$addDesc. " <br />";
    echo Ad::header();
    foreach ($isFound as $element)
    {
        if($element->getAdIds($connectionId)!=NULL)
        {
            
            echo "<br /><tr  class = 'tr_ad2'><td class = 'td_ad1' rowspan ='2'><div class='ad_image'>";
         /*   echo "<img src='".$element->getImages().
            "' alt='".$element->getImages()." not found' />";*/
            $var_Id = $element->getPk_ad_id();    ///added
            $sql = ("Select distinct ImagePath from Images where fk_ad_id = $var_Id");
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($result)){
                //     echo "<div id='img_div'>";
                echo "<a href='Ad.php?id=".$element->getPk_ad_id()."'>"."<img src ='images/".$row['ImagePath']."' >";
                //     echo "<p>".$row['fk_ad_id']."</p>";
                //     echo "</div>";   ///added
            }
            echo "</div></td ><td><a href='Ad.php?id=".$element->getPk_ad_id()."'>".$element->getAd_description()."</a></td>";
            echo "<td>".$element->getAd_price()."</td><td>".$element->getAd_reg_date()."</td><td>".$element->getAd_exp_date()."</td></tr>";
            echo "<tr class = 'tr_ad3'><td>".$element->getAd_title() ."</td><td colspan = '3'> </td> </tr>";
        }
        }
        echo Ad::footer();
}    

?>