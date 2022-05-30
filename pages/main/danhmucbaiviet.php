<?php
	$sql_bv = "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_danhmucbv='$_GET[id]' ORDER BY id_baiviet DESC";
	$query_bv = mysqli_query($mysqli,$sql_bv);
	//get ten danh muc
	$sql_cate = "SELECT * FROM tbl_danhmucbv WHERE tbl_danhmucbv.id_danhmucbv='$_GET[id]' LIMIT 1";
	$query_cate = mysqli_query($mysqli,$sql_cate);
	$row_title = mysqli_fetch_array($query_cate);
?>
<h3>Danh mục bài viết: <span style="text-align: center;text-transform: uppercase;"><?php echo $row_title['tendanhmucbv'] ?></span></h3>

				<ul class="product_list">
					<?php
					while($row_bv = mysqli_fetch_array($query_bv)){ 
						if($row_bv['tinhtrang']==1){
					?>
					<li>
						<a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id_baiviet'] ?>">
							<img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>">
							<p class="title_product">Tên bài viết : <?php echo $row_bv['tenbai'] ?></p>

							
						</a>
						<p style="margin:10px" class="title_product"><?php echo $row_bv['tomtat'] ?></p>
					</li>
					<?php
					} }
					?>
					
				</ul>