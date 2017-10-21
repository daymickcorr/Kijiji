<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/Kijiji/securimage/securimage.php';
 
$securimage = new Securimage();


if (isset($_POST["captcha_code"])){
if ($securimage->check($_POST['captcha_code']) == false) {
    // the code was incorrect
    // you should handle the error so that the form processor doesn't continue
    // or you can use the following code if there is no validation or you do not know how
    echo "The security code entered was incorrect.<br /><br />";
    echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
    exit;
    
}
}

//test2




require_once 'Buisness/dbconfig.php';
require_once 'Buisness/Member.cls.php';

//client validation of form means make the verifications on javascript




try{
    
    $connectionId = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
    //echo "You are connected to $dbname database";
    
    if(isset($_POST["email"])){
        $member = new Member();
        $member->setMem_email($_POST["email"]);
        $member->setMem_password($_POST["password"]);
        $authMember = $member->authentificate($connectionId);
        $_SESSION["id"] = $authMember->getPk_mem_id();
        echo $_SESSION["id"];
        /*
        echo "<hr/>";
        echo $member->header();
        echo $authMember;
        echo $member->footer();
        echo "<hr/>";
        */
    }
    
    
    
    
    //$member->setPk_mem_id(21);
    
    /*
    $member->setMem_name("Mickey Corriveau");
    $member->setMem_phone("5143861919");
    $member->setFk_add_zip("H2N1V6");
    $member->setFk_memType_id(1);
    */
    //$member->create($connectionId);
    
   
    
    
    //$members = $member->getAll($connectionId);
    /*
    $member->setMem_password("test");
    $member2 = new Member();
    $member2->setMem_password("test");
    echo $member;
    echo "<br/>";
    echo $member2;
    */
    
    /*
    foreach ($members as $element){
        if($element->getFk_memType_id() == 3)
    }
    */
        
    // ne pas prendre le
    /*
    echo $member->header();
    foreach ($members as $element){
        echo $element;
    }
    echo $member->footer();
    */
    
}catch(Exception $ex){
    Echo "Connection error with database";
}
?>
<script type="text/javascript">
/*
function validate(){
	var pass = document.getElementById("pass").value;
	var passConf  = document.getElementById("passConf").value;
	//alert(pass);
	//alert(passConf);
	if(pass != passConf){
	
	return false;
	}

	return true;
	
}
*/
</script>
<body>
<form method="post">
<table name="Login" border="1">
	<tr><td>Email : </td><td><input type="email" required="required" name="email"></td></tr>
	<tr><td>Password : </td><td><input id="pass" type="Password" required="required" name="password"></td></tr>
	<tr><td>Confirmation : </td><td><input id="passConf" type="Password" required="required"></td></tr>
</table>



<img id="captcha" src="/Kijiji/securimage/securimage_show.php" alt="CAPTCHA Image" />
<br/>
<input type="text" name="captcha_code" size="10" maxlength="6" required="required" />
<a href="#" onclick="document.getElementById('captcha').src = '/Kijiji/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
<br/>
<!--  <input type="submit" name="submit" value="Login" onclick="return validate()"/>-->
<input type="submit" name="submit" value="Login" />
<input type="reset" name="reset" value="Clear" />
</form>
</body>