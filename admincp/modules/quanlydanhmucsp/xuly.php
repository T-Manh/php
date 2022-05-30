<?php
include('../../config/config.php');

$tenloaisp = $_POST['tendanhmucsp'];
$stt = $_POST['stt'];
if(isset($_POST['themdanhmuc'])){
	//them
	$sql_them = "INSERT INTO tbl_danhmucsp(tendanhmucsp,stt) VALUE('".$tenloaisp."','".$stt."')";
	mysqli_query($mysqli,$sql_them);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}elseif(isset($_POST['suadanhmuc'])){
	//sua
	$sql_update = "UPDATE tbl_danhmucsp SET tendanhmucsp ='".$tenloaisp."',stt='".$stt."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
	mysqli_query($mysqli,$sql_update);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}else{

	$id=$_GET['iddanhmuc'];
	$sql_xoa = "DELETE FROM tbl_danhmucsp WHERE id_danhmuc='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}

?>