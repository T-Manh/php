<?php
include('../../config/config.php');

$tendanhmucbv = $_POST['tendanhmucbv'];
$stt = $_POST['stt'];

if(isset($_POST['themdanhmucbaiviet'])){
	//them
	$sql_them = "INSERT INTO tbl_danhmucbv(tendanhmucbv,stt) VALUE('".$tendanhmucbv."','".$stt."')";
	mysqli_query($mysqli,$sql_them);
	header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');

}
elseif(isset($_POST['suadanhmucbaiviet'])){
	//sua
	$sql_update = "UPDATE tbl_danhmucbv SET tendanhmucbv='".$tendanhmucbv."',stt='".$stt."' WHERE id_danhmucbv='$_GET[iddanhmucbv]'";
	mysqli_query($mysqli,$sql_update);
	header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
}else{

	$id=$_GET['iddanhmucbv'];
	$sql_xoa = "DELETE FROM tbl_danhmucbv WHERE id_danhmucbv='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
}

?>