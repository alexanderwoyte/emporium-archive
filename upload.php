<h1>Upload File</h1>
<h4>'.zip', '.tar' and '.rar' files only, please.</h4>

<?php

if(isset($_POST['submit'])){
	//Display success or fail message and then die() before the form reprints.
	$target_dir = "../wad/uploads/";
	$fileType = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));

	//The file record = name(from GET), lowercased and despaced with the original type that is also lowercased.
	$target_file = $target_dir . strtolower(str_replace("'", "", str_replace(" ", "", $_GET['z']))) . "." . $fileType;


	if($fileType != "zip" && $fileType != "tar" && $fileType != "rar"){
		//TODO: Improve this with an error handling function or something.
		echo "Error, bad file type: ." . $fileType;
		die();
	}

	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file. " . $target_file;
	}

	//Now remove the old record in requests and add a new one into uploaded.

	die();
}

if(!isset($_POST['submit']) && !isset($_GET['z'])){
	//TODO: redirect somewhere or error or something.
}

$csv = array_map('str_getcsv', file('../wad/requests.csv'));

//echo $csv[0][0];

foreach($csv as $a1){
        foreach($a1 as $a2){
		if("'" . $a1[0] . "'" == $_GET['z']){
			$upname = $a1[0];
			$upcat = $a1[1];
			$upsub = $a1[2];

			break;
		}
        }
}

echo "<h3>" . $upname . "</h3>";
echo "<h4>Category: " . $upcat . "</h4>";
echo "<h4>Sub-Category: " . $upsub . "</h4>";
?>

<form method="post" enctype="multipart/form-data">
	<input name="file" type="file">
	<button name="submit" type="submit">Upload</button>
</form>

