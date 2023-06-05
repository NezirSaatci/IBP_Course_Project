<?php

session_start();

$servername = "localhost"; // MySQL sunucu adı
    $dbname = "proje4"; // Veritabanı adı
    $dbusername = "root"; // Veritabanı kullanıcı adı
    $dbpassword = ""; // Veritabanı şifresi

if($conn= mysqli_connect($servername,$dbusername,$dbpassword,$dbname))
{
    
}
else
{
    echo "bağlanmadı";

}


    if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['users_old_pasword']) && isset($_POST['users_new_password'])&& isset($_POST['users_new_password_confirm'])) {
        // Kullanıcı adını ve şifreyi alın
        $old_password = $_POST['users_old_pasword'];
        $new_password = $_POST['users_new_password'];
        $new_password_confirm = $_POST['users_new_password_confirm'];


        if ($new_password !== $new_password_confirm) {
            echo 'Şifreler uyuşmuyor';
        }
        else
        {
            
            $sorgu3=$conn->prepare("UPDATE users SET password='$new_password' WHERE password='$old_password' ");
            $sorgu3->execute();

            //$sql_querry = "insert into adminler (KullanıcıAdı, Sifresi) values ($registerUsername, $registerPassword)";
            echo 'buraya giriyor ';

        }
        
        
        
        // Burada kullanıcı adı ve şifreyi kullanarak yapmak istediğiniz işlemleri gerçekleştirebilirsiniz
        
        // Örnek: Giriş bilgilerini kontrol etme
        
    



$sorgu="SELECT * FROM admins";
$verial = mysqli_query($conn, $sorgu);
while($satir = mysqli_fetch_array($verial))
	{
        

       if ($username === $satir["username"] && $password === $satir["password"]) {

        $_SESSION["acc_id"]=$satir["id"];
        $_SESSION["acc_username"]=$username;

      echo 'Giriş başarılı! <br><br>';
           echo "  kullanıcı_adı   ".$satir["username"]."   Sifresi   " . $satir["password"]."";
            header("Location: admin_paneli.php");
            
        }
       
	}
       
	}



?>