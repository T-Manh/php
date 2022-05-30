<?php
	$sql_lietke_danhmucbv = "SELECT * FROM tbl_danhmucbv ORDER BY stt DESC";
	$query_lietke_danhmucbv = mysqli_query($mysqli,$sql_lietke_danhmucbv);
?>
<p>Liệt kê danh mục bài viết</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
  	<th>Id</th>
    <th>Tên danh mục</th>
  	<th>Quản lý</th>
  
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_danhmucbv)){
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmucbv'] ?></td>
   	<td>
   		<a href="modules/quanlydanhmucbaiviet/xuly.php?iddanhmucbv=<?php echo $row['id_danhmucbv'] ?>">Xoá</a> | <a href="?action=quanlydanhmucbaiviet&query=sua&iddanhmucbv=<?php echo $row['id_danhmucbv'] ?>">Sửa</a> 
   	</td>
   
  </tr>
  <?php
  } 
  ?>
 
</table>