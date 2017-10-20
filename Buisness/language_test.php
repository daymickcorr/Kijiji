<?php
require_once 'dbconfig.php';
require_once 'Language.cls.php';
try{
$connectionId = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
echo "You are connected to $dbname <br />";
// -----------------create
$t1 = new Language(3, 'Spanish');
$isInserted =$t1->create($connectionId);
if ($isInserted==true) 
    echo "The Language with the id: ".$t1->getPk_lan_id().
    " is added successfully <br />";
else 
    $arr = $connectionId->errorInfo();
    echo $arr[2]."<br />";
 // -----------------update
    $t2 = new Language(3, 'Portugeese');
    $isUpdated =$t2->update($connectionId);
    if ($isUpdated==true)
        echo "The Language with the id: ".$t2->getPk_lan_id().
        " is updated successfully <br />";
        else
            $arr = $connectionId->errorInfo();
            echo $arr[2]."<br />";
// -----------------remove
$t3 = new Language(3, ' ');
//$t3 = 3;
$isRemoved =$t3->delete($connectionId);
if ($isRemoved==true)
    echo "The Language with the id: ".$t3->getPk_lan_id().
    " is removed successfully <br />";
else
   $arr = $connectionId->errorInfo();
   echo $arr[2]."<br />";

// -----------------find
$t4 = new Language(1);
$isFound =$t4->find($connectionId);
//echo $isFound;

echo "The Language with the id: ".$t4->getPk_lan_id().
" is found successfully <br />";
echo Language::header();
echo $isFound;
echo Language::footer();
}

catch (Exception $exception){
    echo "Error, you are not connected <br />";
}
?>