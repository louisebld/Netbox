<?php


if (isset($_POST['rejoindrecommu'])) {

	$iduser = $_SESSION['id'];
	$idcommu = $_POST['idcommu'];

if (!estdanscommu($iduser, $idcommu)) {

	joincommu($iduser, $idcommu);

	header("Location:index.php?page=communaute");

}

	}


if (isset($_POST['telechargerpost'])) {





$nomcommu = $_POST['commu'] . ".zip";

$zip = new ZipArchive();
if($zip->open("bruh.zip", ZipArchive::CREATE)) {

	$zip->addFile("images/commu.png");

	// foreach ($donnepost as $key => $value) {

	// 	echo $value['image'];
	// 	$zip->addFile("images/post" . $value['image']);

	// }



	$zip->close();

	header('Content-transfert-Encoding: binary');
	header('Content-Disposition: attachment; filename="bruh.zip"');
	header('Content-Length: ' . filesize('bruh.zip'));

readfile('bruh.zip');
unlink("bruh.zip");
exit();


}
}

