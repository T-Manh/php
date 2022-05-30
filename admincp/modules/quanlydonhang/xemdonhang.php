<p>Xem đơn hàng</p>
<?php
	if(isset($_GET['code'])){
		$code_cart = $_GET['code'];
		$sql_update ="UPDATE tbl_giohang SET tinhtrangthanhtoan=0 WHERE tbl_giohang.mathanhtoan='".$code_cart."'";
		$query = mysqli_query($mysqli,$sql_update);
		//header('Location:../../index.php?action=quanlydonhang&query=lietke');
	} 
	$code = $_GET['code'];
	$sql_lietke_dh = "SELECT * FROM tbl_chitietgiohang,tbl_sanpham WHERE tbl_chitietgiohang.id_sanpham=tbl_sanpham.id_sanpham AND 
  tbl_chitietgiohang.mathanhtoan='".$code."' ORDER BY tbl_chitietgiohang.id_chitietgiohang DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
  	<th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>
  
  
  </tr>
  <?php
  $i = 0;
  $tongtien = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  	$i++;
  	$thanhtien = $row['dongia']*$row['soluongmua'];
  	$tongtien += $thanhtien ;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['mathanhtoan'] ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo number_format($row['dongia'],0,',','.').'vnđ' ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
   	
  </tr>
  <?php
  } 
  ?>
  <tr>
  	<td colspan="6">
   		<p>Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
   	</td>
   
  </tr>
 
</table>