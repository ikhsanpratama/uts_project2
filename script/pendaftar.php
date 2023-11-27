<?

require_once "../conf/db.php";

try{
    $query  =   "SELECT * from t_pendaftar";
    $sql    =   $koneksi->prepare($query);
    $sql->execute();

    $data   =   array();
    while($baris = $sql->fetch(PDO::FETCH_ASSOC)){
        array_push($data,$baris);
    }
    echo json_encode($data);
}catch (PDOException $error){
    die("Tidak dapat memuat database $db_name ". $error->getMessage());
}