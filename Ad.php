<?php
require_once 'Buisness/Ad.cls.php';
require_once 'Buisness/dbconfig.php';
require_once 'Buisness/Images.cls.php';
$id = 17;
if(isset($_GET["id"])){
$id = $_GET["id"];
}
?>

<head>
<link rel="stylesheet" type="text/css" href="css/Ad.css">
</head>
<?php 
    $image = new Images();
    $images = $image->getAll($connectionId);
    
    foreach ($images as $element){
        if($element->getFk_ad_id() == $id){
            echo "<div class='image'>";
            echo "<img src='".$element->getImagePath()."' alt='".$element->getImagePath()." not found'/>";
            echo "</div>";
        }
    }
?>

<?php 
    $ad = new Ad();
    $ad->setPk_ad_id($id);
    $ad = $ad->find($connectionId);
    
    echo $ad->header();
    echo $ad;
    echo $ad->footer();
?>