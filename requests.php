<h1>Requests</h1>

<?php 
//TODO: More form checking here.
if(isset($_POST['submit']) && str_replace(" ", "", $_POST['name']) != NULL){
	$reqentry = $_POST['name'] . "," . $_POST['cat'] . "," . $_POST['subcat'] . "," . "Alex" . "," . date("F / j / Y g:i a") . "\n";

	//$file_data = "Stuff you want to add\n";
	$reqentry .= file_get_contents('../wad/requests.csv');
	//TODO: Replace csv path with global variable.
	file_put_contents('../wad/requests.csv', $reqentry);

	echo "<h2>Your request has been added: " . $_POST['name'] . "<h2>";
	//echo "<p>" . $reqentry . "</p>";
} 
?>

<table>
	<tr><td>Title</td><td>Category</td><td>Sub-Category</td><td>Requester</td><td>Date/Time-Requested</td></tr>

	<tr><form action="requests.php" method="post"><td><input name="name" type='text'></td><td><select name="cat"><option>audio</option><option>video</option><option>other</option></select></td><td><select name="subcat"><option>album</option><option>single</option><option>movie</option><option>show</option><option>other</option></select></td><td></td><td></td><td><button name="submit" type="submit">Request</button></td></form></tr>

<?php
// CSV Format
// 
// title, category, subcategory, namethatrequested, daterequested
//
// example:
// Yeezus, audio, album, Alex, {date&time}
//

$csv = array_map('str_getcsv', file('../wad/requests.csv'));

//echo $csv[0][0];

foreach($csv as $a1){
	echo "\t<tr>";
	foreach($a1 as $a2){
		echo "<td>" . $a2 . "</td>";
	}

	echo "<td><a href=" . "\"upload.php?z='" . /*str_replace(" ", "", */$a1[0]/*)*/ . "'\">Upload This</a></td></tr>\n";
}
?>
</table>
