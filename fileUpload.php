<head>
<link rel="stylesheet" type="text/css" href="css/Ad.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<?php // -----------------find////////////////////
require_once 'Buisness/dbconfig.php';
require_once 'Buisness/Ad.cls.php';
require_once 'Buisness/Subcategory.cls.php';
require_once 'Buisness/Images.cls.php';

$msq = "";
// if pressed upload
if (isset($_POST['upload'])) {
    // the path to store the uploaded image
    $target = "images/".basename($_FILES['image']['name']);
    
    // connect to the database
    $db = mysqli_connect("localhost","root","","mydb");
    
    // get all the sumited data from the form
    $image=($_FILES['image']['name']);
    $text = $_POST['text'];
    
    $sql = "INSERT INTO images(ImagePath, fk_ad_id)VALUES ('$image','$text')";
    mysqli_query($db, $sql); 
    // stores the submitted data into the database table: images
    
    // move of the uploaded file to the folder "images"
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $msg = "Image uploaded successfully";
    }else{
        $msg = "There was a problem uploading image";
    }
}

?>

<html>
<body>
<div id = "content">
<?php 
if (isset($_POST['display'])) {
// connect to the database
$db = mysqli_connect("localhost","root","","mydb");
$sql = "Select * from Images";
$result = mysqli_query($db, $sql);
while ($row = mysqli_fetch_array($result)){
    echo "<div id='img_div'>";
    echo "<img src ='images/".$row['ImagePath']."' >"; 
    echo "<p>".$row['fk_ad_id']."</p>";
    echo "</div>";
}
}
?>
    <form method = 'post' action = 'fileUpload.php' enctype = 'multipart/form-data'>
   	 <input type = "hidden" name = "size" value = "100000">
    <div>
    	<input type = "file" name = "image">
    </div>
    <div>
    	<input type = "text" name = "text" placeholder = "Choose add">
    </div>
    <div>
    	<input type = "submit" name = "upload" value = "Upload file">
    </div>
    </form>
</div>

  <form method = 'post' action = '#' enctype = 'multipart/form-data'>
    <table class='tb_al1'> <tr><td class ='td_ai1' colspan = '2' > Display add images:  </td></tr>
<tr><td>Image id :  </td><td>
     <?php 
         $image = new Images();
          echo "<select name = 'cboImageId'>";
          foreach ($image->getPk_image_id($connectionId) as $element) {
          echo "<option value= '" . $element . "'>$element</option>";
      }
        echo "</select>";
        ?>
</td></tr></table>
    <div>
    	<input type = "submit" name = "display" value = "Display file">
    </div>
    </form>
</div>
</body>
</html>