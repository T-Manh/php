<p>Liệt kê đơn hàng</p>
<?php
	$sql_lietke_dh = "SELECT * FROM tbl_giohang,tbl_taikhoan WHERE tbl_giohang.id_taikhoan=tbl_taikhoan.id_taikhoan ORDER BY tbl_giohang.id_giohang DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
  	<th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Tình trạng</th>
    <th>Ngày đặt</th>
  	<th>Quản lý</th>
  
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['mathanhtoan'] ?></td>
    <td><?php echo $row['tentaikhoan'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td>
    	<?php if($row['tinhtrangthanhtoan']==1){
    		echo 'Đơn hàng mới';
    	}else{
    		echo 'Đã xem';
    	}
    	?>
    </td>
    <td><?php echo $row['ngaythanhtoan'] ?></td>
   	<td>
   		<a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['mathanhtoan'] ?>">Xem đơn hàng</a> 
   	</td>
   
  </tr>
  <?php
  } 
  ?>
 
</table>