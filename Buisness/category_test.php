<?php
require_once 'dbconfig.php';
require_once 'Category.cls.php';
try{
$connectionId = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
echo "You are connected to $dbname <br />";
// -----------------create
$t1 = new Category(210, 'plants', 1);
$isInserted =$t1->create($connectionId);
if ($isInserted==true) 
    echo "The Category with the id: ".$t1->getPk_category_id().
    " is added successfully <br />";
else 
    $arr = $connectionId->errorInfo();
    echo $arr[2]."<br />";
 // -----------------update
    $t2 = new Category(210, 'plants', 2);
    $isUpdated =$t2->update($connectionId);
    if ($isUpdated==true)
        echo "The Category with the id: ".$t2->getPk_category_id().
        " is updated successfully <br />";
   else
        $arr = $connectionId->errorInfo();
        echo $arr[2]."<br />";
// -----------------remove
$t3 = new Category(210, 'plants', 2);
$isRemoved =$t3->delete($connectionId);
if ($isRemoved==true)
    echo "The Category with the id: ".$t3->getPk_category_id().
    " is removed successfully <br />";
else
   $arr = $connectionId->errorInfo();
   echo $arr[2]."<br />";

// -----------------find
$t4 = new Category(209);
$isFound =$t4->find($connectionId);
//echo $isFound;

echo "The Category with the id: ".$t4->getPk_category_id().
" is found successfully <br />";
echo Category::header();
echo $isFound;
echo Category::footer();
}

catch (Exception $exception){
    echo "Error, you are not connected <br />";
}
?>