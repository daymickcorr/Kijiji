<?php
session_start();
require_once 'Buisness/dbconfig.php';
require_once 'Buisness/Images.cls.php';
require_once 'Buisness/Ad.cls.php';
require_once 'Buisness/Payement.cls.php';

if(!isset($selectedPayement)){
    $selectedPayement = new Payement();
}

//session_start() - Démarre une nouvelle session ou reprend une session existante
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

if(isset($_POST["post"])){
    echo Payement::header();
    echo $selectedPayement;
    echo Payement::footer();
    /*
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
*/
}

if(isset($_FILES["images"])){
    //echo implode(',', $_FILES["images"]);
    //Créer un dossier 'fichiers/1/'
    $path = 'Images/'.$_SESSION["id"].'/';
    mkdir($path , 0777, true);
    //Créer un identifiant difficile à deviner
    $nom = md5(uniqid(rand(), true));
    $image = new Images();
    $image->setImagePath($path.$nom.$_FILES["images"]["type"]);
    $image->setFk_ad_id($fk_ad_id);
    $image->create($connectionId);
    
    move_uploaded_file($_FILES["images"]['tmp_name'], $nom.$_FILES["images"]["type"]);
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
						<td><input type="button" name="pay" value="<?php echo $element->getPk_pay_id()?>"></td>
					</tr>
				</th>
			</table>
		</div>
		<?php }?>
		</td>
</tr>
<tr>
	<td>Images</td>
	<td><input type="file" name="images"><td>
</tr>
</table>
<input type="submit" name="post" value="Post Ad"/>
</form>