<?php
if(isset($_POST["listBook"])){
	$data = $_POST["listBook"];
	$fp = fopen("testing.csv", "w");
	// fwrite($fp, $data);
	fwrite($fp,"isbn;kategori\n");
	for($i=0;$i<count($data);$i++){
		fwrite($fp, $data[$i]."\n");
	}
	fclose($fp);
	echo("sukses Tambah Buku");
	#$python = shell_exec("DCF.py");
	#echo $python;
}

if(isset($_POST["listUser"])){
	$data = $_POST["listUser"];
	$fp = fopen("testing.csv", "w");
	// fwrite($fp, $data);
	fwrite($fp,"user_id;negara;provinsi;usia\n");
	for($i=0;$i<count($data);$i++){
		fwrite($fp, $data[$i]."\n");
	}
	fclose($fp);
	echo("sukses tambah User");
	#$python = shell_exec("DCF.py");
	#echo $python;
}

if(isset($_POST["listRating"])){
	$data = $_POST["listRating"];
	$fp = fopen("testing.csv", "w");
	// fwrite($fp, $data);
	fwrite($fp,"user_id;item_id;rating\n");
	for($i=0;$i<count($data);$i++){
		fwrite($fp, $data[$i]."\n");
	}
	fclose($fp);
	echo("sukses tambah Rating");
	#$python = shell_exec("DCF.py");
	#echo $python;
}

?>