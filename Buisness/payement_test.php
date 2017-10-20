<?php
require_once 'dbconfig.php';
require_once 'Payement.cls.php';
try{
$connectionId = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
echo "You are connected to $dbname <br />";
// -----------------create
$t1 = new Payement(115, 12, 10,150);
$isInserted =$t1->create($connectionId);
if ($isInserted==true) 
    echo "The Payement with the id: ".$t1->getPk_pay_id().
    " is added successfully <br />";
else 
    $arr = $connectionId->errorInfo();
    echo $arr[2]."<br />";
 // -----------------update
    $t2 = new Payement(115, 12, 10,180 );
    $isUpdated =$t2->update($connectionId);
    if ($isUpdated==true)
        echo "The Payement with the id: ".$t2->getPk_pay_id().
        " is updated successfully <br />";
   else
        $arr = $connectionId->errorInfo();
        echo $arr[2]."<br />";
// -----------------remove
    $t3 = new Payement(115, 12, 10,150);
$isRemoved =$t3->delete($connectionId);
if ($isRemoved==true)
    echo "The Payement with the id: ".$t3->getPk_pay_id().
    " is removed successfully <br />";
else
   $arr = $connectionId->errorInfo();
   echo $arr[2]."<br />";

// -----------------find
$t4 = new Payement(111);
$isFound =$t4->find($connectionId);
//echo $isFound;

echo "The Payement with the id: ".$t4->getPk_pay_id().
" is found successfully <br />";
echo Payement::header();
echo $isFound;
echo Payement::footer();
}

catch (Exception $exception){
    echo "Error, you are not connected <br />";
}
?>