<?php
require_once 'dbconfig.php';
require_once 'Member.cls.php';
try{
$connectionId = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
echo "You are connected to $dbname <br />";
// -----------------create
$t1 = new Member(135,'Margarett Tetcher', '514-3162003', 'margo@gmail.com',1234,2,'H3L1B4');
$isInserted =$t1->create($connectionId);
if ($isInserted==true) 
    echo "The Member with the id: ".$t1->getPk_mem_id().
    " is added successfully <br />";
else 
    $arr = $connectionId->errorInfo();
    echo $arr[2]."<br />";
 // -----------------update
    $t2 = new Member(135,'Margarett Tetcher', '514-3162003', 'margarett@gmail.com',1234,2,'H3L1B4' );
    $isUpdated =$t2->update($connectionId);
    if ($isUpdated==true)
        echo "The Member with the id: ".$t2->getPk_mem_id().
        " is updated successfully <br />";
   else
        $arr = $connectionId->errorInfo();
        echo $arr[2]."<br />";
// -----------------remove
        $t3 = new Member(135, ' ', ' ', ' ',1234,2,' ');
//$t3 = 3;
$isRemoved =$t3->delete($connectionId);
if ($isRemoved==true)
    echo "The Member with the id: ".$t3->getPk_mem_id().
    " is removed successfully <br />";
else
   $arr = $connectionId->errorInfo();
   echo $arr[2]."<br />";

// -----------------find
$t4 = new Member(134);
$isFound =$t4->find($connectionId);
//echo $isFound;

echo "The Member with the id: ".$t4->getPk_mem_id().
" is found successfully <br />";
echo Member::header();
echo $isFound;
echo Member::footer();
}

catch (Exception $exception){
    echo "Error, you are not connected <br />";
}
?>