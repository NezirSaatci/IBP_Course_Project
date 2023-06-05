<?php


session_start();

$servertitle = "localhost"; // MySQL sunucu adı
    $dbtitle = "proje4"; // Veritabanı adı
    $dbusertitle = "root"; // Veritabanı kullanıcı adı
    $dbpassword = ""; // Veritabanı şifresi

if($conn= mysqli_connect($servertitle,$dbusertitle,$dbpassword,$dbtitle))
{
    
}
else
{
    echo "bağlanmadı";

}

include 'admin.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['duyuru_islem']) && isset($_POST['güncellenecek_duyurunun_id']) && isset($_POST['duyurunun_yeni_basligi']) && isset($_POST['duyurunun_yeni_icerigi'])) {
        // Kullanıcı adını ve şifreyi alın
        $duyuru_islem = $_POST['duyuru_islem'];
        $güncellenecek_duyurunun_id = $_POST['güncellenecek_duyurunun_id'];
        $duyurunun_yeni_basligi = $_POST['duyurunun_yeni_basligi'];
        $duyurunun_yeni_icerigi = $_POST['duyurunun_yeni_icerigi'];


        if($duyuru_islem=="düzenleme")
        {
            
            $sorgu="SELECT * FROM announcements";
            $verial = mysqli_query($conn, $sorgu);

            while($satir = mysqli_fetch_array($verial))
	    {

        if ($güncellenecek_duyurunun_id === $satir["id"]) {


            //$sq_kod_l=$conn->prepare("UPDATE announcements SET usertitle=$duyurunun_yeni_basligi AND password='$duyurunun_yeni_icerigi' WHERE id='$güncellenecek_duyurunun_id'");
            //$sq_kod_l->execute();
            //echo "calisiyor";

            $sq_kod_l = $conn->prepare("UPDATE announcements SET title=?, content=? WHERE id=?");
            $sq_kod_l->bind_param("sss", $duyurunun_yeni_basligi, $duyurunun_yeni_icerigi, $güncellenecek_duyurunun_id);
            $sq_kod_l->execute();


            header("Location: duyurularin_siralanmasi.php");
        }
	    }
        }
        if($duyuru_islem=="silme")
        {
            
            $sorgu="SELECT * FROM announcements";
            $verial = mysqli_query($conn, $sorgu);

            while($satir = mysqli_fetch_array($verial))
	    {

        if ($güncellenecek_duyurunun_id === $satir["id"]) {


            //$sq_kod_l=$conn->prepare("UPDATE announcements SET usertitle=$duyurunun_yeni_basligi AND password='$duyurunun_yeni_icerigi' WHERE id='$güncellenecek_duyurunun_id'");
            //$sq_kod_l->execute();
            //echo "calisiyor";




            $sq_kod_3 = $conn->prepare("DELETE FROM announcements WHERE id=?");
            $sq_kod_3->bind_param("s",$güncellenecek_duyurunun_id);
            $sq_kod_3->execute();


            header("Location: duyurularin_siralanmasi.php");
        }
	    }
        }
        if($duyuru_islem=="ekleme")
        {

            
            
            $sql = "INSERT INTO announcements (admin_id,title, content) VALUES (?,?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss",$_SESSION["acc_id"],$duyurunun_yeni_basligi, $duyurunun_yeni_icerigi);
            $stmt->execute();
	

            


            header("Location: duyurularin_siralanmasi.php");
        
	    
        }
        
        
        
     

    }

   




?>