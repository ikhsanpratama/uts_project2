<?
require_once "../conf/db.php";
$id     =    $_POST['id'];
try{

    $query  =   "DELETE from t_pendaftar WHERE id = $id";
    $sql    =   $koneksi->prepare($query);
    $sql->execute();

    echo "Hapus Data Sukses!";
}catch (PDOException $error){
    die("Hapus Data Gagal : ". $error->getMessage());
}