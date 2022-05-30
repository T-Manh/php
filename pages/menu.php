<?php

	$sql_danhmuc = "SELECT * FROM tbl_danhmucsp ORDER BY id_danhmuc DESC";
	$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);	
	$sql_danhmuc_bv = "SELECT * FROM tbl_danhmucbv ORDER BY id_danhmucbv DESC";
	$query_danhmuc_bv = mysqli_query($mysqli,$sql_danhmuc_bv);
?>
<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangky']);
	} 
?>
<div class="menu">
			<ul class="list_menu">
				<li><a href="index.php">Trang chủ</a></li>
				<li><a href="index.php?quanly=danhmuc">Danh mục sản phẩm </a> 
				<ul class="menu_con">
					<?php
						
						while($row = mysqli_fetch_array($query_danhmuc)){		
					?>
					<li style="text-transform: uppercase;"><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmucsp'] ?></a></li>
					<?php
					} 
					?>
				</ul>
			</li>
			<li><a href="index.php?quanly=danhmucbv"> Danh mục bài viết</a> 
			<ul class="menu_con">
					<?php
						
						while($row = mysqli_fetch_array($query_danhmuc_bv)){
					?>
					<li style="text-transform: uppercase;"><a href="index.php?quanly=danhmucbaiviet&id=<?php echo $row['id_danhmucbv'] ?>"><?php echo $row['tendanhmucbv'] ?></a></li>
					<?php
					} 
					?>
				</ul>
			</li>
				<li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>
				<?php
				if(isset($_SESSION['dangky'])){ 
				?>
				<li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
				<li><a href="index.php?quanly=thaydoimatkhau">Thay đổi mật khẩu</a></li>
				<?php
				}else{ 
				?>
				<li><a href="index.php?quanly=dangky">Đăng ký</a></li>
				<?php
				} 
				?>
				<li><a href="index.php?quanly=tintuc">Tin tức</a></li>
			</ul>
			<p>
				<form action="index.php?quanly=timkiem" method="POST">
					<input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
					<input type="submit" name="timkiem" value="Tìm kiếm">
				</form>
			</p>
		</div>