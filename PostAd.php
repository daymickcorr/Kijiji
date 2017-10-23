<?php
session_start();
//session_start() - Démarre une nouvelle session ou reprend une session existante
echo $_SESSION["language"];
if (isset($_SESSION["id"])){
    echo $_SESSION["id"];
}
else {
    echo "Please login first";
}

?>

<table>
<tr>
	<td>Title</td>
	<td>
		<input type="text" name="title"/>
	</td>
</tr>
<tr>
	<td>Description</td>
	<td>
		<input type="text" name="description"/>
	</td>
</tr>
<tr>
	<td></td>
	<td><td>
</tr>
</table>