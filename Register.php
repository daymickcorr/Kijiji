<?php
require_once 'Buisness/dbconfig.php';
require_once 'Buisness/Member.cls.php';
require_once 'Buisness/memeberType_test.php';
require_once 'Buisness/Adress.cls.php';
?>

<?php 
    if(isset($_POST["id"])){
    //member needs adress
    $adress = new Adress();
    $adress->setAdd_adress($_POST["adress"]);
    $adress->setAdd_city($_POST["city"]);
    $adress->setAdd_state($_POST["state"]);
    $adress->setPk_add_zip($_POST["zip"]);
    $adress->create($connectionId);
    
    $member = new Member();
    $member->setPk_mem_id($_POST["id"]);
    $member->setMem_phone($_POST["phone"]);
    $member->setMem_password($_POST["password"]);
    $member->setMem_name($_POST["name"]);
    $member->setMem_email($_POST["email"]);
    $member->setFk_memType_id($_POST["type"]);
    $member->setFk_add_zip($adress->getPk_add_zip());
    $member->create($connectionId);
    
    }
?>

<form method="post">
</form>