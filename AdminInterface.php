<?php 
require_once 'Buisness/dbconfig.php';
require_once 'Buisness/Language.cls.php';
require_once 'Buisness/Ad.cls.php';
require_once 'Buisness/Member.cls.php';
require_once 'Buisness/Category.cls.php';
require_once 'Buisness/Subcategory.cls.php';
?>

<form action="#" method="get">
<table> <tr><td> Operations with members:  </td></tr>
<tr><td>Member id :  </td><td>
     <?php 
         $memb = new Member();
          echo "<select name = 'cboMemberId'>";
        foreach ($memb->getPk_mem_id1($connectionId) as $element) {
          echo "<option value= '" . $element . "'>$element</option>";
      }
        echo "</select>";
        ?>
<input type="text" name="memberId" /></td></tr>
<tr><td>Name : </td><td><input type="text" name ="memberName" /></td></tr>
<tr><td>Phone : </td><td><input type="text" name ="memPhone" /></td></tr>
<tr><td>Email :</td><td><input type="text" name ="memEmail" /></td></tr>
<tr><td>Password :</td><td><input type="text" name ="password" /></td></tr>
<tr><td>Type :



</td><td><input type="text" name ="memType" /></td></tr>
<tr><td>Zip :</td><td><input type="text" name ="memZip" /></td></tr>
<tr><td>Status : </td><td><input type="text" name ="memStatus" /></td></tr>
</table><br/>

<input type="submit" name="memop" value="Add" /><br/>
<input type="submit" name="memop" value="Update" /><br/>
<input type="submit" name="memop" value="Delete" />
</form>

<?php
if (isset($_GET["memop"])){
    $memberId=$_GET["memberId"];
    $memberName=$_GET["memberName"];
    $memPhone=$_GET["memPhone"];
    $memEmail=$_GET["memEmail"];
    $password=$_GET["password"];
    $memType=$_GET["memType"];
    $memZip=$_GET["memZip"];
    $memStatus=$_GET["memStatus"];
  
    switch($_GET["memop"]){
        case "Add" : addOneRow();break;
        case "Update" : updOneRow($memberId,$address);break;
        case "Delete" : delOneRow();break;
    }
}

function addOneRow(){
    "Processing add one memeber<br/>";
    global $connectId;
    global $memberId;
    global $memberName;
    global $memPhone;
    global $memEmail;
    global $password;
    global $memType;
    global $memZip;
    global $memStatus;
    $sqlStmt="insert into member values ($memberId,
             '$memberName','$memPhone','$memEmail',
        $password,'$memType','$memZip','$memStatus')";
             $queryId=mysqli_query($connectId, $sqlStmt);
             if ($queryId==true)
                 " One member is added successfully <br/>";
             else
                 echo mysqli_error($connectId)."<br/>";}

   function updOneRow($memberId,$password){
    " Processing update one row<br/>";
    global $connectId;
    $sqlStmt="update member set password='$password'
             where memberId=$memberId";
    $queryId=mysqli_query($connectId, $sqlStmt);
    if ($queryId==true)
        if (mysqli_affected_rows($conectId)>=1)
            " One member is updated successfully <br/>";
        else
            " No changes in the database <br/>";
        else
            echo mysqli_error($connectId)."<br/>";
}

function delOneRow(){
    " Processing delete one member<br/>";
}
?>


