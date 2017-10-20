<?php
require_once 'dbconfig.php';
require_once 'MemeberType.cls.php';
try{
$connectionId = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
echo "You are connected to $dbname <br />";
// -----------------create
$t1 = new MemeberType(4, 'owner');
$isInserted =$t1->create($connectionId);
if ($isInserted==true) 
    echo "The MemberType with the id: ".$t1->getPk_memType_id().
    " is added successfully <br />";
else 
    $arr = $connectionId->errorInfo();
    echo $arr[2]."<br />";
 // -----------------update
$t2 = new MemeberType(4, 'creator');
    $isUpdated =$t2->update($connectionId);
    if ($isUpdated==true)
        echo "The MemberType with the id: ".$t2->getPk_memType_id().
        " is updated successfully <br />";
   else
        $arr = $connectionId->errorInfo();
        echo $arr[2]."<br />";
// -----------------remove
$t3 = new MemeberType(4, ' ');
//$t3 = 3;
$isRemoved =$t3->delete($connectionId);
if ($isRemoved==true)
    echo "The MemberType with the id: ".$t3->getPk_memType_id().
    " is removed successfully <br />";
else
   $arr = $connectionId->errorInfo();
   echo $arr[2]."<br />";

// -----------------find
$t4 = new MemeberType(1);
$isFound =$t4->find($connectionId);
//echo $isFound;

echo "The MemberType with the id: ".$t4->getPk_memType_id().
" is found successfully <br />";
echo MemeberType::header();
echo $isFound;
echo MemeberType::footer();
}

catch (Exception $exception){
    echo "Error, you are not connected <br />";
}
?>