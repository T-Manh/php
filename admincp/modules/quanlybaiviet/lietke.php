<?php
	$sql_lietke_bv = "SELECT * FROM tbl_baiviet,tbl_danhmucbv WHERE tbl_baiviet.id_danhmucbv=tbl_danhmucbv.id_danhmucbv ORDER BY tbl_baiviet.id_baiviet DESC";
	$query_lietke_bv = mysqli_query($mysqli,$sql_lietke_bv);
?>
<p>Liệt kê danh mục bài viết</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
  	<th>Id</th>
    <th>Tên bài viết</th>
    <th>Hình ảnh</th>
    <th>Danh mục</th>
    <th>Tóm tắt</th>
    <th>Trạng thái</th>
  	<th>Quản lý</th>
  
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_bv)){
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['tenbai'] ?></td>
    <td><img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
   
    <td><?php echo $row['tendanhmucbv'] ?></td>
   
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php if($row['tinhtrang']==1){
        echo 'Kích hoạt';
      }else{
        echo 'Ẩn';
      } 
      ?>
      
    </td>
   	<td>
   		<a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>">Xoá</a> | <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>">Sửa</a> 
   	</td>
   
  </tr>
  <?php
  } 
  ?>
 
</table>