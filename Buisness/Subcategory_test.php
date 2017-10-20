<?php
require_once 'dbconfig.php';
require_once 'Subcategory.cls.php';
try{
$connectionId = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
echo "You are connected to $dbname <br />";
// -----------------create
$t1 = new Subcategory(2010, 'archidees', 208);
$isInserted =$t1->create($connectionId);
if ($isInserted==true) 
    echo "The Subcategory with the id: ".$t1->getPk_subCat_id().
    " is added successfully <br />";
else 
    $arr = $connectionId->errorInfo();
    echo $arr[2]."<br />";
 // -----------------update
    $t2 = new Subcategory(2010, 'archidees', 209);
    $isUpdated =$t2->update($connectionId);
    if ($isUpdated==true)
        echo "The Subcategory with the id: ".$t2->getPk_subCat_id().
        " is updated successfully <br />";
   else
        $arr = $connectionId->errorInfo();
        echo $arr[2]."<br />";
// -----------------remove
$t3 = new Subcategory(2010, 'archidees', 209);
$isRemoved =$t3->delete($connectionId);
if ($isRemoved==true)
    echo "The Subcategory with the id: ".$t3->getPk_subCat_id().
    " is removed successfully <br />";
else
   $arr = $connectionId->errorInfo();
   echo $arr[2]."<br />";

// -----------------find
$t4 = new Subcategory(2009);
$isFound =$t4->find($connectionId);
//echo $isFound;

echo "The Subcategory with the id: ".$t4->getPk_subCat_id().
" is found successfully <br />";
echo Subcategory::header();
echo $isFound;
echo Subcategory::footer();
}

catch (Exception $exception){
    echo "Error, you are not connected <br />";
}
?>