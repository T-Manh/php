<?php
	session_start();
	include('../../admincp/config/config.php');
	//them so luong

	if(isset($_GET['cong'])){
		$id=$_GET['cong'];
		
		foreach($_SESSION['giohang'] as $cart_item){
			if($cart_item['id_sanpham']!=$id){
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id_sanpham'=>$cart_item['id_sanpham'],'soluongmua'=>$cart_item['soluongmua'],'dongia'=>$cart_item['dongia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				$_SESSION['giohang'] = $product;
			}else{
				$tangsoluong = $cart_item['soluongmua'] + 1;
				if($cart_item['soluongmua']<=99){
					
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id_sanpham'=>$cart_item['id_sanpham'],'soluongmua'=>$tangsoluong,'dongia'=>$cart_item['dongia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				}else{
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id_sanpham'=>$cart_item['id_sanpham'],'soluongmua'=>$cart_item['soluongmua'],'dongia'=>$cart_item['dongia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				}
				$_SESSION['giohang'] = $product;
			}
			
		}
		header('Location:../../index.php?quanly=giohang');
	}
	//tru so luong
	if(isset($_GET['tru'])){
		$id=$_GET['tru'];
		foreach($_SESSION['giohang'] as $cart_item){
			if($cart_item['id_sanpham']!=$id){
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id_sanpham'=>$cart_item['id_sanpham'],'soluongmua'=>$cart_item['soluongmua'],'dongia'=>$cart_item['dongia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				$_SESSION['giohang'] = $product;
			}else{
				$tangsoluong1 = $cart_item['soluongmua'] - 1;
				if($cart_item['soluongmua']>1){
					
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id_sanpham'=>$cart_item['id_sanpham'],'soluongmua'=>$tangsoluong1,'dongia'=>$cart_item['dongia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				}else{
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id_sanpham'=>$cart_item['id_sanpham'],'soluongmua'=>$cart_item['soluongmua'],'dongia'=>$cart_item['dongia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				}
				$_SESSION['giohang'] = $product;
			}
			
		}
		header('Location:../../index.php?quanly=giohang');
	}
	//xoa san pham
	if(isset($_SESSION['giohang'])&&isset($_GET['xoa'])){
		$id=$_GET['xoa'];
		foreach($_SESSION['giohang'] as $cart_item){

			if($cart_item['id_sanpham']!=$id){
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id_sanpham'=>$cart_item['id_sanpham'],'soluongmua'=>$cart_item['soluongmua'],'dongia'=>$cart_item['dongia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
			}

		$_SESSION['giohang'] = $product;
		header('Location:../../index.php?quanly=giohang');
		}
	}
	//xoa tat ca
	if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
		unset($_SESSION['giohang']);
		header('Location:../../index.php?quanly=giohang');
	}
	//them sanpham vao gio hang
	if(isset($_POST['themgiohang'])){
		//session_destroy();
		$id=$_GET['idsanpham'];
		$soluong=1;
		$sql ="SELECT * FROM tbl_sanpham WHERE id_sanpham='".$id."' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($query);
		if($row){
			$new_product=array(array('tensanpham'=>$row['tensanpham'],'id_sanpham'=>$id,'soluongmua'=>$soluong,'dongia'=>$row['dongia'],'hinhanh'=>$row['hinhanh'],'masp'=>$row['masp']));
			//kiem tra session gio hang ton tai
			if(isset($_SESSION['giohang'])){
				$found = false;
				foreach($_SESSION['giohang'] as $cart_item){
					//neu du lieu trung
					if($cart_item['id_sanpham']==$id){
						$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id_sanpham'=>$cart_item['id_sanpham'],'soluongmua'=>$soluong+1,'dongia'=>$cart_item['dongia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
						$found = true;
					}else{
						//neu du lieu khong trung
						$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id_sanpham'=>$cart_item['id_sanpham'],'soluongmua'=>$cart_item['soluong'],'dongia'=>$cart_item['dongia'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
					}
				}
				if($found == false){
					//lien ket du lieu new_product voi product
					$_SESSION['giohang']=array_merge($product,$new_product);
				}else{
					$_SESSION['giohang']=$product;
				}
			}else{
				$_SESSION['giohang'] = $new_product;
			}

		}
		header('Location:../../index.php?quanly=giohang');
		
	}
	
	
	
?>