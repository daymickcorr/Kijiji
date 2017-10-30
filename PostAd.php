<?php
session_start();
require_once 'Buisness/Images.cls.php';

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
$ad = new Ad();
$ad->setAd_description($_POST["description"]);
$ad->setAd_exp_date();
$ad->setAd_price($_POST["price"]);
$ad->setAd_reg_date(date("Y/m/d"));
$ad->setAd_tit($_POST["title"]);
$ad->setFk_mem_id($_SESSION["id"]);
$ad->setFk_pay_id($_POST["pay"]);
$ad->setFk_subCat_id($subCat);
$ad->setLanguage($_SESSION["language"]);
$ad->create($connectionId);
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
		<div class="payement">
			<table>
				<th>
					<tr>
						<td>Free</td>
					</tr>
					<tr>
						<td>Duration <br/><hr/><br/> 10 Days</td>
					</tr>
					<tr>
						<td>0$</td>
					</tr>
					<tr>
						<td>0 Images</td>
					</tr>
					<tr>
						<td><input type="button" onclick="" value="Select"></td>
					</tr>
				</th>
			</table>
		</div>
		<div class="payement">
			<table>
				<th>
					<tr>
						<td>Standard</td>
					</tr>
					<tr>
						<td>Duration <br/><hr/><br/> 90 Days</td>
					</tr>
					<tr>
						<td>5$</td>
					</tr>
					<tr>
						<td>1 Image</td>
					</tr>
					<tr>
						<td><input type="button" onclick="" value="Select"></td>
					</tr>
				</th>
			</table>
		</div>
		<div class="payement">
		<table>
				<th>
					<tr>
						<td>Paid</td>
					</tr>
					<tr>
						<td>Duration <br/><hr/><br/> 120 Days</td>
					</tr>
					<tr>
						<td>8$</td>
					</tr>
					<tr>
						<td>5 Images</td>
					</tr>
					<tr>
						<td><input type="button" onclick="" value="Select"></td>
					</tr>
				</th>
			</table>
		</div>
		<div class="payement">
		<table>
				<th>
					<tr>
						<td>Premium</td>
					</tr>
					<tr>
						<td>Duration <br/><hr/><br/> 180 Days</td>
					</tr>
					<tr>
						<td>12$</td>
					</tr>
					<tr>
						<td>10 Images</td>
					</tr>
					<tr>
						<td><input type="button" onclick="" value="Select"></td>
					</tr>
				</th>
			</table>
		</div>
	<td>
</tr>
<tr>
	<td>Images</td>
	<td><input type="file" name="images"><td>
</tr>
</table>
<input type="submit" name="post" value="Post Ad"/>
</form>