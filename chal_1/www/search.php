<?php

require 'MyDB.php';

$sql = "SELECT id, username, description FROM users";
if (isset($_REQUEST['username'])) { 
	$sql .= " WHERE username LIKE '%{$_REQUEST['username']}%'";
}
$ret = $db->query($sql); 
$err = $db->lastErrorCode();
$msg = $db->lastErrorMsg();

?>

<?php if ($err != 0) { ?>
<div class='w3-container'>
<p>Last Error Code: <span class='w3-text-yellow'><?= $err ?></span></p>
<p>Last Error Message: <span class='w3-text-yellow'><?= $msg ?></span></p>
<p>Your Query: <span class='w3-text-yellow'><?= $sql ?></p>
</div>
<?php } else { ?>

<table class='w3-grey w3-table-all'>
<thead>
	<tr>
		<th>Id</th>
		<th>Username</th>
		<th>Description</th>
	</tr>
</thead>
<tbody>

<?php
if ($err === 0) {
while ($row = $ret->fetchArray(SQLITE3_ASSOC) ) { ?>
<tr>
	<td><?= $row['id'] ?></td>
	<td><?= $row['username'] ?></td>
	<td><?= $row['description'] ?></td>
</tr>
<?php }
}
}

?>

</tbody>
</table>
