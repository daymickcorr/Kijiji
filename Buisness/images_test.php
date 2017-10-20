<?php
require_once 'dbconfig.php';
require_once 'Images.cls.php';
try{
$connectionId = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
echo "You are connected to $dbname <br />";
// -----------------create
$t1 = new Images(11026, 'C:image11026_1.jpg', 20025);
$isInserted =$t1->create($connectionId);
if ($isInserted==true) 
    echo "The Images with the id: ".$t1->getPk_image_id().
    " is added successfully <br />";
else 
    $arr = $connectionId->errorInfo();
    echo $arr[2]."<br />";
 // -----------------update
    $t2 = new Images(11026, 'C:image11026_2.jpg', 20025);
    $isUpdated =$t2->update($connectionId);
    if ($isUpdated==true)
        echo "The Images with the id: ".$t2->getPk_image_id().
        " is updated successfully <br />";
   else
        $arr = $connectionId->errorInfo();
        echo $arr[2]."<br />";
// -----------------remove
        $t3 = new Images(11026, 'C:image11026_1.jpg', 20025);
$isRemoved =$t3->delete($connectionId);
if ($isRemoved==true)
    echo "The Images with the id: ".$t3->getPk_image_id().
    " is removed successfully <br />";
else
   $arr = $connectionId->errorInfo();
   echo $arr[2]."<br />";

// -----------------find
$t4 = new Images(11025);
$isFound =$t4->find($connectionId);
//echo $isFound;

echo "The Image with the id: ".$t4->getPk_image_id().
" is found successfully <br />";
echo Images::header();
echo $isFound;
echo Images::footer();
}

catch (Exception $exception){
    echo "Error, you are not connected <br />";
}
?>