<p>Thêm bài viết</p>
<table border="1" width="100%" style="border-collapse: collapse;">
 <form method="POST" action="modules/quanlybaiviet/xuly.php" enctype="multipart/form-data">
	  <tr>
	  	<td>Tên bài viết</td>
	  	<td><input type="text" name="tenbai"></td>
	  </tr>

	   <tr>
	  	<td>Hình ảnh</td>
	  	<td><input type="file" name="hinhanh"></td>
	  </tr>
	  <tr>
	  	<td>Tóm tắt</td>
	  	<td><textarea rows="10"  name="tomtat" style="resize: none"></textarea></td>
	  </tr>
	   <tr>
	  	<td>Nội dung</td>
	  	<td><textarea rows="10"  name="noidung" style="resize: none"></textarea></td>
	  </tr>
	  <tr>
	    <td>Danh mục bài viết</td>
	    <td>
	    	<select name="danhmucbv">
	    		<?php
	    		$sql_danhmucbv = "SELECT * FROM tbl_danhmucbv ORDER BY id_danhmucbv DESC";
	    		$query_danhmucbv = mysqli_query($mysqli,$sql_danhmucbv);
	    		while($row_danhmuc = mysqli_fetch_array($query_danhmucbv)){
	    		?>
	    		<option value="<?php echo $row_danhmuc['id_danhmucbv'] ?>"><?php echo $row_danhmuc['tendanhmucbv'] ?></option>
	    		<?php
	    		} 
	    		?>
	    	</select>
	    </td>
	  </tr>
	  <tr>
	    <td>Tình trạng</td>
	    <td>
	    	<select name="tinhtrang">
	    		<option value="1">Kích hoạt</option>
	    		<option value="0">Ẩn</option>
	    	</select>
	    </td>
	  </tr>
	   <tr>
	    <td colspan="2"><input type="submit" name="thembaiviet" value="Thêm bài viết"></td>
	  </tr>
 </form>
</table>