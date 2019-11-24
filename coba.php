<?php 
include('server3.php');
$transaksi= mysqli_query($con,"SELECT * FROM barang");
?>
<select>
<?php foreach ($transaksi as $row ) {?>
	<option value="<?php echo $row['idbarang'] ?>"><?php echo $row['namabarang'] ?></option>
<?php }?>
</select>
