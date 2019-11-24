<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "proyek2";
$con = mysqli_connect($server, $username, $password) or die("<h1>Koneksi Mysqli Error : </h1>" .   mysqli_connect_error());
mysqli_select_db($con, $database) or die("<h1>Koneksi Kedatabase Error : </h1>" . mysqli_error($con));

@$operasi = $_GET['operasi'];

switch    ($operasi) {

case "view":
$query_tampil_transaksi = mysqli_query($con,"SELECT t.idtransaksi, b.namabarang, u.username, t.qty, t.hsb FROM barang as b INNER JOIN transaksi as t ON b.kodebarang = t.idbarang INNER JOIN user as u ON u.iduser = t.iduser") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil_transaksi)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;


case "delete":
@$idtransaksi = $_GET['idtransaksi'];
$query_delete_transaksi = mysqli_query($con, "DELETE FROM transaksi WHERE idtransaksi ='$idtransaksi'");
if ($query_delete_transaksi) {
echo "Data Berhasil Dihapus";
}
else {
echo mysqli_error($con);
}

break;


default:
break;

}
?>