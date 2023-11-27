<?

$db_hostname    =   "localhost";
$db_user        =   "root";
$db_pass        =   "";
$db_name        =   "crud_api";
$db_port        =   3306;

try {
    $koneksi    =   new PDO('mysql:host=localhost;dbname=crud_api', $db_user, $db_pass);
} catch (PDOException $e) {
    echo $koneksi->getMessage();
}