<?
 require_once "../conf/db.php";

 $nama_depan    =   $_POST['nama_depan'];
 $nama_belakang =   $_POST['nama_belakang'];
 $email         =   $_POST['email'];
 $password      =   SHA1($_POST['password']);
 $photo         =   $_FILES['photo']['name'];
 $photo_tmp     =   $_FILES['photo']['tmp_name'];
 $path          =   "photo/";
 $username      =   $nama_depan."_".$nama_belakang;


 if(!empty($_POST['id'])){
    try{
        $id     =   $_POST['id'];
        move_uploaded_file($photo_tmp, '../photo/'.$photo);
        $query  =   "UPDATE t_pendaftar SET nama_depan = '$nama_depan', nama_belakang = '$nama_belakang', email = '$email', username = '$username', password = '$password', photo = '$path$photo' WHERE id = $id";
        $sql    =   $koneksi->prepare($query);
        $sql->execute();

        echo "Update Data Sukses!";
    }catch (PDOException $error){
        die("Update Data Gagal : ". $error->getMessage());
    }
 }else{
     try{
         move_uploaded_file($photo_tmp, '../photo/'.$photo);
         $query  =   "INSERT INTO t_pendaftar(nama_depan, nama_belakang, email, username, password, photo) VALUES ('$nama_depan','$nama_belakang','$email','$username','$password','$path$photo')";
         $sql    =   $koneksi->prepare($query);
         $sql->execute();

         echo "Tambah Data Sukses!";
     }catch (PDOException $error){
         die("Tambah Data Gagal : ". $error->getMessage());
     }
 }