<?php

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


    if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['üye_islem']) && isset($_POST['güncellenecek_üyenin_id']) && isset($_POST['üyenin_yeni_adi']) && isset($_POST['üyenin_yeni_sifresi'])) {
        // Kullanıcı adını ve şifreyi alın
        $üye_islem = $_POST['üye_islem'];
        $güncellenecek_üyenin_id = $_POST['güncellenecek_üyenin_id'];
        $üyenin_yeni_adi = $_POST['üyenin_yeni_adi'];
        $üyenin_yeni_sifresi = $_POST['üyenin_yeni_sifresi'];
    }


        if($üye_islem=="düzenleme")
        {
            
            $sorgu="SELECT * FROM users";
            $verial = mysqli_query($conn, $sorgu);

            while($satir = mysqli_fetch_array($verial))
	    {

        if ($güncellenecek_üyenin_id === $satir["id"]) {


            //$sq_kod_l=$conn->prepare("UPDATE users SET username=$üyenin_yeni_adi AND password='$üyenin_yeni_sifresi' WHERE id='$güncellenecek_üyenin_id'");
            //$sq_kod_l->execute();
            //echo "calisiyor";

            $sq_kod_l = $conn->prepare("UPDATE users SET username=?, password=? WHERE id=?");
            $sq_kod_l->bind_param("sss", $üyenin_yeni_adi, $üyenin_yeni_sifresi, $güncellenecek_üyenin_id);
            $sq_kod_l->execute();


            header("Location: üyelerin_siralanmasi.php");
        }
	    }
        }
        if($üye_islem=="silme")
        {
            
            $sorgu="SELECT * FROM users";
            $verial = mysqli_query($conn, $sorgu);

            while($satir = mysqli_fetch_array($verial))
	    {

        if ($güncellenecek_üyenin_id == $satir["id"]) {


            //$sq_kod_l=$conn->prepare("UPDATE users SET username=$üyenin_yeni_adi AND password='$üyenin_yeni_sifresi' WHERE id='$güncellenecek_üyenin_id'");
            //$sq_kod_l->execute();
            //echo "calisiyor";

         //   $sq_kod_l_messages = $conn->prepare("DELETE FROM messages WHERE sender_id = ? AND senders_type = 'admin'");
         //   $sq_kod_l_messages->bind_param("s", $güncellenecek_üyenin_id);
         //   $sq_kod_l_messages->execute();

         //   $sq_kod_2_messages = $conn->prepare("DELETE FROM messages WHERE receiver_id = ? AND senders_type = 'user'");
         //   $sq_kod_2_messages->bind_param("s", $güncellenecek_üyenin_id);
         //   $sq_kod_2_messages->execute();

    

            $sq_kod = $conn->prepare("DELETE FROM users WHERE id=?");
            $sq_kod->bind_param("s",$güncellenecek_üyenin_id);
            $sq_kod->execute();


            header("Location: üyelerin_siralanmasi.php");     
            echo "sad";
        }
	    }
        }
        if($üye_islem=="ekleme")
        {
            
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $üyenin_yeni_adi, $üyenin_yeni_sifresi);
            $stmt->execute();
	

            


            header("Location: üyelerin_siralanmasi.php");
        
	    
        }
        
        
        // Burada kullanıcı adı ve şifreyi kullanarak yapmak istediğiniz işlemleri gerçekleştirebilirsiniz
        
        // Örnek: Giriş bilgilerini kontrol etme
        
    
   

    

    echo "dad";

//echo "31";


?>