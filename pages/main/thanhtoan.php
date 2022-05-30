
<?php
	session_start();
	include('../../admincp/config/config.php');
	require('../../carbon/autoload.php');
	use Carbon\Carbon;
    use Carbon\CarbonInterval;
    
	$now = Carbon::now('Asia/Ho_Chi_Minh');
	$id_taikhoan = $_SESSION['id_taikhoan'];
	$mathanhtoan = rand(0,9999);
	$insert_cart = "INSERT INTO tbl_giohang(id_taikhoan,mathanhtoan,tinhtrangthanhtoan,ngaythanhtoan) VALUE('".$id_taikhoan."','".$mathanhtoan."',1,'".$now."')";
	$cart_query = mysqli_query($mysqli,$insert_cart);
	if($cart_query){
		//them gio hang chi tiet
		foreach($_SESSION['giohang'] as $key => $value){
			$id_sanpham = $value['id_sanpham'];
			$soluong = $value['soluongmua'];
			$insert_order_details = "INSERT INTO tbl_chitietgiohang(id_sanpham,mathanhtoan,soluongmua) VALUE('".$id_sanpham."','".$mathanhtoan."','".$soluong."')";
			mysqli_query($mysqli,$insert_order_details);
			$updateSL= "UPDATE tbl_sanpham SET soluong=(soluong-$soluong) WHERE id_sanpham=$id_sanpham ";
			$query = mysqli_query($mysqli,$updateSL);
		}
		$tieude = "Đặt hàng website  thành công!";
		
	}
	unset($_SESSION['giohang']);
	header('Location:../../index.php?quanly=camon');
?>