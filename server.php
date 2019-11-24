<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "proyek2";
$con = mysqli_connect($server, $username, $password) or die("<h1>Koneksi Mysqli Error : </h1>" .   mysqli_connect_error());
mysqli_select_db($con, $database) or die("<h1>Koneksi Kedatabase Error : </h1>" . mysqli_error($con));

@$operasi = $_GET['operasi'];

switch    ($operasi) {

case "barang1":
$querybarang1 = mysqli_query($con,"SELECT * FROM barang WHERE jenisbarang = 'MD'") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($querybarang1)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "barang2":
$querybarang2 = mysqli_query($con,"SELECT * FROM barang WHERE jenisbarang = 'MP'") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($querybarang2)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "barang3":
$querybarang3 = mysqli_query($con,"SELECT * FROM barang WHERE jenisbarang = 'M'") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($querybarang3)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;


case "view":
$query_tampil_barang = mysqli_query($con,"SELECT * FROM barang") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil_barang)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "cari":
$query_tampil_user = mysqli_query($con,"SELECT * FROM user") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil_user)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "insert":
@$kodebarang = $_GET['kodebarang'];
@$namabarang = $_GET['namabarang'];
@$stok = $_GET['stok'];
@$hargabeli = $_GET['hargabeli'];
@$hargajual = $_GET['hargajual'];
@$jenisbarang = $_GET['jenisbarang'];
$query_insert_data = mysqli_query($con, "INSERT INTO barang (kodebarang,namabarang,stok,hargajual,hargabeli,jenisbarang)   VALUES('$kodebarang','$namabarang','$stok','$hargajual','$hargabeli','$jenisbarang')");
if ($query_insert_data) {
echo "Data Berhasil Disimpan";
}
else {
echo "Maaf Insert Ke Dalam Database Error" . mysqli_error($con);
}

break;

case "get_barang_by_kd":
@$kodebarang = $_GET['kodebarang'];
$query_tampil_biodata = mysqli_query($con, "SELECT * FROM barang WHERE kodebarang='$kodebarang'") or die (mysqli_error($con));
$data_array = array();
$data_array = mysqli_fetch_assoc($query_tampil_biodata);
echo "[" . json_encode ($data_array) . "]";

break;

case "update":
@$kodebarang = $_GET['kodebarang'];
@$namabarang = $_GET['namabarang'];
@$stok = $_GET['stok'];
@$hargajual = $_GET['hargajual'];
@$hargabeli = $_GET['hargabeli'];
@$jenisbarang = $_GET['jenisbarang'];

$query_update_barang = mysqli_query($con, "UPDATE barang SET namabarang='$namabarang', stok='$stok',hargajual='$hargajual',hargabeli='$hargabeli',jenisbarang='$jenisbarang' WHERE kodebarang='$kodebarang'");
if ($query_update_barang) {
echo "Update Data Berhasil";
}
else {
echo mysqli_error($con);
}

break;

case "delete":
@$kodebarang = $_GET['kodebarang'];
$query_delete_biodata = mysqli_query($con, "DELETE FROM barang WHERE kodebarang='$kodebarang'");
if ($query_delete_biodata) {
echo "Data Berhasil Dihapus";
}
else {
echo mysqli_error($con);
}

break;

case "login":
@$iduser = $_GET['iduser'];
$query_tampil_biodata = mysqli_query($con, "SELECT * FROM user WHERE iduser='$iduser'") or die (mysqli_error($con));
	$data_array = array();
$data_array = mysqli_fetch_assoc($query_tampil_biodata);
echo "[" . json_encode ($data_array) . "]";

break;

default:
break;

}
?>