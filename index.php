<?php
require_once 'Buisness/dbconfig.php';
require_once 'Buisness/Language.cls.php';
require_once 'Buisness/Ad.cls.php';
require_once 'Buisness/Category.cls.php';
require_once 'Buisness/Subcategory.cls.php';
$interfaceLanguage = "1";


if(isset($_GET["interfaceLanguage"])){
    $interfaceLanguage = $_GET["interfaceLanguage"];
}


?>

<head>
<link rel="stylesheet" type="text/css" href="css/index.css">
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
</head>
<body>


<div id="menu">
	<?php 
	$language = new Language();
	$languages = $language->getAll($connectionId);
	
	foreach ($languages as $element){
	    echo "<a href='index.php?interfaceLanguage=".$element->getPk_lan_id()."'>".$element->getLan_type()."</a>&nbsp";
	}
	
	?>
	<br/>
	<a href="Register.php">Register</a>
	<a href="Login.php">Login</a>
	<a href="PostAd.php">Post Ad</a>
	
</div>


<br/>

<div id="payedAds">
	<?php 
	$ad = new Ad();
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
            
	}
	//echo $ad->footer();
	
	?>
</div>

<br/>
<?php //////////////////////////////////Search part///////////////////////////////////test ?>
<div id="search">
Search
<form action="Results.php" method="get">

<div >Enter minimum price:
<input type="text" name = "min_price_search" >  </input></div >
<div >Enter maximum price:
<input type="text" name = "max_price_search" >  </input></div>

	<table>
	<tr><td colspan="2">Choose search option</td></tr>
        <tr>
            <td>Search by Add ID:</td>
            <td>
                <?php 
                    $AdId = new Ad();
                    echo "<select name = 'cboSearchAdId'>";
                    foreach ($AdId->getAdIds($connectionId) as $element) {
                        echo "<option value= '" . $element . "'>$element</option>";
                    }
                    echo "</select>";
                ?>
    		</td>
    		<td><input type="submit" name="btnGoAddId" value="Go"/></td>
    		 </tr>
    		 <tr>
    		 <td>Search by Subcat ID:</td>
    		 
            <td>
                <?php 
                    $scId = new Ad();
                    echo "<select name = 'cboSearchSubcatId'>";
                    foreach ($scId->getSubcatIds($connectionId) as $element) {
                        echo "<option value= '" . $element . "'>$element</option>";
                    }
                    echo "</select>";
                ?>
    		</td>
    		<td><input type="submit" name="btnGoSubcatId" value="Go"/></td>
    		</tr>
    		 <tr>
    		  <td>Search by Subcategory Name:</td>
    		 <td>
                <?php 
                    $sc = new Subcategory();
                    echo "<select name = 'cboSearchSubcatDesc'>";
                    foreach ($sc->getSubcatDesc($connectionId) as $element) {
                        echo "<option value= '" . $element . "'>$element</option>";
                    }
                    echo "</select>";
                ?>
    		</td>
    		<td><input type="submit" name="btnGoSubcatDesc" value="Go"/></td>
		</tr>		
	</table>
</form>
</div>





<br/>

<div id="Category">
	<?php  
	$category = new Category();
	$categories = $category->getAll($connectionId);
	
	$subCategory = new Subcategory();
	$subCategories = $subCategory->getAll($connectionId);
	
	foreach ($categories as $element){
	    if($element->getFk_lan_id() == $interfaceLanguage){
	       echo "<div class='category'>";
	       echo "<hr/>";
	       echo "<b>";
	       echo "<div style='text-align:center;'>";
	       echo $element->getCat_description();
	       echo "</div>";
	       echo "</b>";
	       echo "<hr/>";
	       echo "<ul>";
	       foreach ($subCategories as $subElement){
	           if($subElement->getFk_category_id() == $element->getPk_category_id()){
	           echo "<div class='subCategory'>";
	           echo "<li>";
	           echo "<a href='Results.php?subCategory=".$subElement->getPk_subCat_id()."'>".$subElement->getSubCat_description()."</a>";
	           echo "</li>";
	           echo "<br/>";
	           echo "</div>";
	           }
	       }
	       echo "</ul>";
	       echo "</div>";
	    }
	    else{
	        //echo "not good language";
	    }
	}
	?>
</div>

</body>
