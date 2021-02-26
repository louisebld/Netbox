<?php
if (isset($_POST['telechargerpost'])) {


$donnepost = $_SESSION['donnepost'];
$nomcommu = $_POST['commu'] . ".zip";

$zip = new ZipArchive();

foreach ($donnepost as $key => $value) {

if($zip->open("PostCommu.zip", ZipArchive::CREATE)) {

	$zip->addFile("images/post/" . $value['image'], $value['image']);

	}

}
	$zip->close();

	header('Content-transfert-Encoding: binary');
	header('Content-Disposition: attachment; filename="PostCommu.zip"');
	header('Content-Length: ' . filesize('PostCommu.zip'));

readfile('PostCommu.zip');
unlink("PostCommu.zip");
exit();



}