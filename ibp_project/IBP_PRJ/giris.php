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


    if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['username']) && isset($_POST['password'])) {
        // Kullanıcı adını ve şifreyi alın
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        
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

    $sorgu1="SELECT * FROM users";
$verial1 = mysqli_query($conn, $sorgu1);
while($satir = mysqli_fetch_array($verial1))
	{
       

        if ($username === $satir["username"] && $password === $satir["password"]) {

            $_SESSION['acc_id']=$satir["id"];
        $_SESSION['acc_username']=$username;
            echo 'Giriş başarılı! <br><br>';
            echo "  kullanıcı_adı   ".$satir["username"]."   Sifresi   " . $satir["password"]."";
            header("Location: user.php");
        }
       
	}



    }
   
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register-username']) && isset($_POST['register-password']) && isset($_POST['confirm-password'])) {
        $registerUsername = $_POST['register-username'];
        $registerPassword = $_POST['register-password'];
        $confirmPassword = $_POST['confirm-password'];

        if ($registerPassword !== $confirmPassword) {
            echo 'Şifreler uyuşmuyor';
        }
        else
        {
            
            $sorgu3=$conn->prepare("INSERT INTO users(username,password) VALUES ('$registerUsername', '$registerPassword')");
            $sorgu3->execute();

            //$sql_querry = "insert into adminler (KullanıcıAdı, Sifresi) values ($registerUsername, $registerPassword)";
            header("Location: giris_ekrani.html");

        }
    }

    
    




//echo "31";


?>