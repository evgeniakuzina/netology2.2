<?php

if (!empty($_FILES) && array_key_exists('test', $_FILES)) {
	
	$name = $_FILES['test']['name'];
	move_uploaded_file($_FILES['test']['tmp_name'], "uploads/$name");
	$files = scandir('uploads');
	
	$testNames = [];
	for ($i = 2; $i < count($files); $i++) {
		
		$json = file_get_contents(__DIR__ . "/uploads/$files[$i]");
		$data = json_decode($json, true);
		$testNames[] = $data[0]["name"];
	}

	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Загруженные формы</title>
</head>
<body>
	<ul>
		<?php for ($i = 0; $i < count($testNames); $i++) { ?>
		<li><?php echo($i+1 . '-' . $testNames[$i]); ?></li>
		<?php } ?>
	</ul>
</body>
</html>

