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
$query_tampil_user = mysqli_query($con,"SELECT * FROM user") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil_user)) {
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
@$alamat = $_GET['alamat'];
@$level = $_GET['level'];
@$username = $_GET['username'];
@$password = md5($_GET['password']);
@$notel = $_GET['notel'];
@$notel = $_GET['password'];

$query_insert_data = mysqli_query($con, "INSERT INTO user VALUES('','$alamat','$level','$username','$password','$notel')");
if ($query_insert_data) {
echo "Data Berhasil Disimpan";
}
else {
echo "Maaf Insert Ke Dalam Database Error" . mysqli_error($con);
}

break;

case "get_user_by_id":
@$iduser = $_GET['iduser'];
$query_tampil_user = mysqli_query($con, "SELECT * FROM user WHERE iduser='$iduser'") or die (mysqli_error($con));
$data_array = array();
$data_array = mysqli_fetch_assoc($query_tampil_user);
echo "[" . json_encode ($data_array) . "]";

break;

case "update":
@$iduser = $_GET['iduser'];
@$alamat = $_GET['alamat'];
@$level = $_GET['level'];
@$username = $_GET['username'];
@$password = $_GET['password'];
@$notel = $_GET['notel'];

$query_update_user = mysqli_query($con, "UPDATE user SET alamat='$alamat', level='$level', username='$username', password='$password',notel='$notel' WHERE iduser='$iduser'");
if ($query_update_user) {
echo "Update Data Berhasil";
}
else {
echo mysqli_error($con);
}

break;

case "delete":
@$iduser = $_GET['iduser'];
$query_delete_user = mysqli_query($con, "DELETE FROM user WHERE iduser='$iduser'");
if ($query_delete_user) {
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