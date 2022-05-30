<?php
	$sql_sua_danhmucbv = "SELECT * FROM tbl_danhmucbv WHERE id_danhmucbv='$_GET[iddanhmucbv]' LIMIT 1";
	$query_sua_danhmucbv = mysqli_query($mysqli,$sql_sua_danhmucbv);
?>
<p>Sửa danh mục bài viết</p>
<table border="1" width="50%" style="border-collapse: collapse;">
 <form method="POST" action="modules/quanlydanhmucbaiviet/xuly.php?iddanhmucbv=<?php echo $_GET['iddanhmucbv'] ?>">
 	<?php
 	while($dong = mysqli_fetch_array($query_sua_danhmucbv)) {
 	?>
	  <tr>
	  	<td>Tên danh mục</td>
	  	<td><input type="text" value="<?php echo $dong['tendanhmucbv'] ?>" name="tendanhmucbv"></td>
	  </tr>
	  <tr>
	    <td>Thứ tự</td>
	    <td><input type="text" value="<?php echo $dong['stt'] ?>" name="stt"></td>
	  </tr>
	   <tr>
	    <td colspan="2"><input type="submit" name="suadanhmucbaiviet" value="Sửa danh mục bài viết"></td>
	  </tr>
	  <?php
	  } 
	  ?>

 </form>
</table>