<?php
require_once 'Buisness/dbconfig.php';
require_once 'Buisness/Member.cls.php';
require_once 'Buisness/MemeberType.cls.php';
require_once 'Buisness/Adress.cls.php';
?>

<?php 
    if(isset($_POST["zip"])){
    //member needs adress
    $adress = new Adress();
    $adress->setAdd_adress($_POST["adress"]);
    $adress->setAdd_city($_POST["city"]);
    $adress->setAdd_state($_POST["state"]);
    $adress->setPk_add_zip($_POST["zip"]);
    $result = $adress->create($connectionId);
    if(!$result){
       echo $connectionId->errorInfo()[2];
    }
    
    $member = new Member();
    //$member->setPk_mem_id($_POST["id"]);
    $member->setMem_phone($_POST["phone"]);
    $member->setMem_password($_POST["password"]);
    $member->setMem_name($_POST["name"]);
    $member->setMem_email($_POST["email"]);
    $member->setFk_memType_id("2");
    $member->setFk_add_zip($adress->getPk_add_zip());
    $result = $member->create($connectionId);
    if(!$result){
        echo $connectionId->errorInfo()[2];
    }
    }
?>

<form method="post">
	<table>
		<tr>
			<td>
				Name:
			</td>
			<td>
				<input type="text" name="name"/>
			</td>
		</tr>
		<tr>
			<td>
				Phone:
			</td>
			<td>
				<input type="text" name="phone"/>
			</td>
		</tr>
		<tr>
			<td>
				Email:
			</td>
			<td>
				<input type="email" name="email"/>
			</td>
		</tr>
		<tr>
			<td>
				Password:
			</td>
			<td>
				<input type="password" name="password"/>
			</td>
		</tr>
		<tr>
			<td>
				Zip:
			</td>
			<td>
				<input type="text" name="zip"/>
			</td>
		</tr>
		<tr>
			<td>
				State:
			</td>
			<td>
				<input type="text" name="state"/>
			</td>
		</tr>
		<tr>
			<td>
				City:
			</td>
			<td>
				<input type="text" name="city"/>
			</td>
		</tr>
		<tr>
			<td>
				Adress:
			</td>
			<td>
				<input type="text" name="adress"/>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="Register"/>
			</td>
			<td>
				<input type="reset" value="Clear" />
			</td>
		</tr>
	</table>
</form>