<?php
require_once 'dbconfig.php';
require_once 'Adress.cls.php';
try{
$connectionId = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
echo "You are connected to $dbname <br />";
// -----------------create
$t1 = new Adress('H7R5V7', 'Laval', 'QC','40avenue');
$isInserted =$t1->create($connectionId);
if ($isInserted==true) 
    echo "The Adress with the id: ".$t1->getPk_add_zip().
    " is added successfully <br />";
else 
    $arr = $connectionId->errorInfo();
    echo $arr[2]."<br />";
 // -----------------update
$t2 = new Adress('H7R5V7', 'Lasalle', 'QC','40avenue' );
    $isUpdated =$t2->update($connectionId);
    if ($isUpdated==true)
        echo "The Adress with the id: ".$t2->getPk_add_zip().
        " is updated successfully <br />";
   else
        $arr = $connectionId->errorInfo();
        echo $arr[2]."<br />";
// -----------------remove
        $t3 = new Adress('H7R5V7', ' ', ' ', ' ');
//$t3 = 3;
$isRemoved =$t3->delete($connectionId);
if ($isRemoved==true)
    echo "The Adress with the id: ".$t3->getPk_add_zip().
    " is removed successfully <br />";
else
   $arr = $connectionId->errorInfo();
   echo $arr[2]."<br />";

// -----------------find
$t4 = new Adress('H7T1W2');
$isFound =$t4->find($connectionId);
//echo $isFound;

echo "The Adress with the id: ".$t4->getPk_add_zip().
" is found successfully <br />";
echo Adress::header();
echo $isFound;
echo Adress::footer();
}

catch (Exception $exception){
    echo "Error, you are not connected <br />";
}
?>