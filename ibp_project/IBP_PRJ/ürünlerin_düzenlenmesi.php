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


    if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['ürün_islem']) && isset($_POST['güncellenecek_ürünün_id']) && isset($_POST['ürünün_yeni_adi']) && isset($_POST['ürünün_yeni_ucreti'])) {
        // Kullanıcı adını ve şifreyi alın
        $ürün_islem = $_POST['ürün_islem'];
        $güncellenecek_ürünün_id = $_POST['güncellenecek_ürünün_id'];
        $ürünün_yeni_adi = $_POST['ürünün_yeni_adi'];
        $ürünün_yeni_ucreti = $_POST['ürünün_yeni_ucreti'];


        if($ürün_islem=="düzenleme")
        {
            
            $sorgu="SELECT * FROM products";
            $verial = mysqli_query($conn, $sorgu);

            while($satir = mysqli_fetch_array($verial))
	    {

        if ($güncellenecek_ürünün_id === $satir["id"]) {


            //$sq_kod_l=$conn->prepare("UPDATE products SET username=$ürünün_yeni_adi AND password='$ürünün_yeni_ucreti' WHERE id='$güncellenecek_ürünün_id'");
            //$sq_kod_l->execute();
            //echo "calisiyor";

            $sq_kod_l = $conn->prepare("UPDATE products SET name=?, price=? WHERE id=?");
            $sq_kod_l->bind_param("sss", $ürünün_yeni_adi, $ürünün_yeni_ucreti, $güncellenecek_ürünün_id);
            $sq_kod_l->execute();


            header("Location: ürünlerin_siralanmasi.php");
        }
	    }
        }
        if($ürün_islem=="silme")
        {
            
            $sorgu="SELECT * FROM products";
            $verial = mysqli_query($conn, $sorgu);

            while($satir = mysqli_fetch_array($verial))
	    {

        if ($güncellenecek_ürünün_id === $satir["id"]) {


            //$sq_kod_l=$conn->prepare("UPDATE products SET username=$ürünün_yeni_adi AND password='$ürünün_yeni_ucreti' WHERE id='$güncellenecek_ürünün_id'");
            //$sq_kod_l->execute();
            //echo "calisiyor";




            $sq_kod_3 = $conn->prepare("DELETE FROM products WHERE id=?");
            $sq_kod_3->bind_param("s",$güncellenecek_ürünün_id);
            $sq_kod_3->execute();


            header("Location: ürünlerin_siralanmasi.php");
        }
	    }
        }
        if($ürün_islem=="ekleme")
        {
            
            $sql = "INSERT INTO products (name, price) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $ürünün_yeni_adi, $ürünün_yeni_ucreti);
            $stmt->execute();
	

            


            header("Location: ürünlerin_siralanmasi.php");
        
	    
        }
        
        
        
     

    }

   




?>