<?php
session_start();
require_once 'Buisness/dbconfig.php';
require_once 'Buisness/Category.cls.php';
require_once 'Buisness/Subcategory.cls.php';
$interfaceLanguage= $_SESSION["language"];

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
	           echo "<a href='PostAd.php?subCategory=".$subElement->getPk_subCat_id()."'>".$subElement->getSubCat_description()."</a>";
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
<link rel="stylesheet" type="text/css" href="css/index.css">