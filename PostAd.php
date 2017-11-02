<?php
session_start();
require_once 'Buisness/dbconfig.php';
require_once 'Buisness/Images.cls.php';
require_once 'Buisness/Ad.cls.php';
require_once 'Buisness/Payement.cls.php';

/*
if(!isset($selectedPayement)){
    $selectedPayement = new Payement();
}
*/
/*
if(isset($_POST["pay"])){
    $payement = new Payement();
    $payement->setPk_pay_id($_POST["pay"]);
    $payement = $payement->find($connectionId);

    $ad = new Ad();
    $ad->setAd_description($_POST["description"]);
    
    $ad->setAd_price($_POST["price"]);
    $ad->setAd_reg_date(date("Y/m/d"));
    $ad->setAd_exp_date(date("Y/m/d") + $payement->getPay_duration());
    $ad->setAd_tit($_POST["title"]);
    $ad->setFk_mem_id($_SESSION["id"]);
    $ad->setFk_pay_id($payement->getPk_pay_id());
    $ad->setFk_subCat_id($subCat);
    $ad->setLanguage($_SESSION["language"]);
    $ad->create($connectionId);
}
*/
//session_start() - Démarre une nouvelle session ou reprend une session existante
/*
echo $_SESSION["language"];
if (isset($_SESSION["id"])){
    echo $_SESSION["id"];
}
else {
    echo "Please login first";
}

if(isset($_GET["subCategory"])){
    $subCat = $_GET["subCategory"];
}
*/
/*
if(isset($_POST["post"])){
    echo Payement::header();
    echo $selectedPayement;
    echo Payement::footer();


$ad = new Ad();
$ad->setAd_description($_POST["description"]);

$ad->setAd_price($_POST["price"]);
$ad->setAd_reg_date(date("Y/m/d"));
$ad->setAd_exp_date();
$ad->setAd_tit($_POST["title"]);
$ad->setFk_mem_id($_SESSION["id"]);
$ad->setFk_pay_id($_POST["pay"]);
$ad->setFk_subCat_id($subCat);
$ad->setLanguage($_SESSION["language"]);
$ad->create($connectionId);
}
*/

if(isset($_FILES["images"])){
    //echo implode(',', $_FILES["images"]);
    //Créer un dossier 'fichiers/1/'
    if (!is_uploaded_file($_FILES["images"]['tmp_name'])){echo "Image Upload Failed error // " . $_FILES["images"]['error'];}
    
    if(isset($_SESSION["id"])){
        $sessionId = $_SESSION["id"];
    }
    else{$sessionId = 0;}
    
    $path = 'Images/'.$sessionId.'/';
    //echo $path;
    
    if(is_dir($path)){}
    else{
        mkdir($path , 0777, true);
    }
   // mkdir($path , 0777, true);
    //Créer un identifiant difficile à deviner
    $nom = md5(uniqid(rand(), true));
    
    $extension = pathinfo($_FILES["images"]['name'],PATHINFO_EXTENSION);
    //echo $path.$nom.".jpg";
    //echo $extension;
    //echo "File uploaded ".$_FILES["images"]['tmp_name'];
    move_uploaded_file($_FILES["images"]['tmp_name'], $path.$nom.'.'.$extension);
    
    $image = new Images();
    $image->setImagePath($path.$nom.'.'.$extension);
    
    $image->setFk_ad_id(3);
    
    $image->create($connectionId);
    
}
?>

<form method="post" enctype="multipart/form-data">

<link rel="stylesheet" type="text/css" href="css/PostAd.css"/>



<table>
<tr>
	<td>Title</td>
	<td>
		<input type="text" name="title"/>
	</td>
</tr>
<tr>
	<td>Description</td>
	<td>
		<input type="text" name="description"/>
	</td>
</tr>
<tr>
	<td>Price</td>
	<td><td>
</tr>
<tr>
	<td>Images</td>
	<td><input type="file" name="images"><td>
</tr>
<tr>
	<td>Ad Type</td>
	<td >
	<?php 
		  $payement = new Payement();
		  $payements = $payement->getAll($connectionId);
		  foreach($payements as $element){
		?>
		<div class="payement">
			<table>
				<th>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td>Package(<?php echo $element->getPk_pay_id()?>)<br/><hr/><br/> <?php echo $element->getPay_duration()?> Days</td>
					</tr>
					<tr>
						<td><?php echo $element->getPay_amount()?>$</td>
					</tr>
					<tr>
						<td><?php echo $element->getPay_pictures_amount()?> Images</td>
					</tr>
					<tr>
						<td><input type="submit" name="pay" value="<?php echo $element->getPk_pay_id()?>"></td>
					</tr>
				</th>
			</table>
		</div>
		<?php }?>
		</td>
</tr>
</table>
<!-- <input type="submit" name="post" value="Post Ad"/>  -->
</form>