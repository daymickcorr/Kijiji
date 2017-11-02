<?php 
require_once 'Buisness/dbconfig.php';
require_once 'Buisness/Language.cls.php';
require_once 'Buisness/Ad.cls.php';
require_once 'Buisness/Member.cls.php';
require_once 'Buisness/Category.cls.php';
require_once 'Buisness/Subcategory.cls.php';
?>

<head>
<link rel="stylesheet" type="text/css" href="css/Ad.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<form action="#" method="get">
<table class='tb_al1'> <tr><td class ='td_ai1' colspan = '2' > Operations with members:  </td></tr>
<tr><td>Member id :  </td><td>
     <?php 
         $memb = new Member();
          echo "<select name = 'cboMemberId'>";
          foreach ($memb->getPk_mem_id1($connectionId) as $element) {
          echo "<option value= '" . $element . "'>$element</option>";
      }
        echo "</select>";
        ?>
</td></tr>
<tr><td>Name : </td><td><input type="text" name ="memberName"  /></td></tr>
<tr><td>Phone : </td><td><input type="text" name ="memPhone" /></td></tr>
<tr><td>Email :</td><td><input type="text" name ="memEmail" /></td></tr>
<tr><td>Password :</td><td><input type="text" name ="password" /></td></tr>
<tr><td>Type :</td><td>
<select name = 'cboType'><option value= '1'>admin</option>
<option value= '2'>member</option>
<option value= '3'>employee</option></select></td></tr>
<tr><td>Zip :</td><td><input type="text" name ="memZip" /></td></tr>
<tr><td>Status : </td><td>
<select name = 'cboStatus'><option value= '1'>active</option>
<option value= '2'>non-active</option></select></td></tr>
<tr><td colspan = '2'>
<input type="submit" name="memop" value="Add" />&nbsp&nbsp&nbsp
<input type="submit" name="memop" value="Update" />&nbsp&nbsp&nbsp
<input type="submit" name="memop" value="Delete" />&nbsp&nbsp&nbsp </td></tr>
</table><br/>

</form>

<?php
if (isset($_GET["memop"])){
    $memberId=$_GET["cboMemberId"];
    $memberName=$_GET["memberName"];
    $memPhone=$_GET["memPhone"];
    $memEmail=$_GET["memEmail"];
    $password=$_GET["password"];
    $memType=$_GET["cboType"];
    $memZip=$_GET["memZip"];
    $memStatus=$_GET["cboStatus"];
  
    switch($_GET["memop"]){
        case "Add" : addOneRow();break;
        case "Update" : updOneRow($memberId,$password);break;
        case "Delete" : delOneRow();break;
    }
}

function addOneRow(){
    "Processing add one memeber<br/>";
  //  global $connectionId;
    global $memberName;
    global $memPhone;
    global $memEmail;
    global $password;
    global $cboType;
    global $memZip;
    global $cboStatus;
    $sqlStmt="insert into member values ('$memberName','$memPhone','$memEmail',
        '$password',$cboType,'$memZip',$cboStatus)";
             $queryId=mysqli_query($connectionId,
                 $sqlStmt);
             if ($queryId==true)
                 " One member is added successfully <br/>";
             else
                 echo mysqli_error($connectionId)."<br/>";}

   function updOneRow($memberId,$password){
    " Processing update one row<br/>";
  //  global $connectionId;
    $sqlStmt="update member set password='$password'
             where memberId=$memberId";
    $queryId=mysqli_query($connectionId, $sqlStmt);
    if ($queryId==true)
        if (mysqli_affected_rows($conectId)>=1)
            " One member is updated successfully <br/>";
        else
            " No changes in the database <br/>";
        else
            echo mysqli_error($connectionId)."<br/>";
}

function delOneRow(){
    " Processing delete one member<br/>";
}
?>


