<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
    <title>Urun Ekrani</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            position: fixed;
            top: 10px;
            right: 10px;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="radio"] {
            margin: 0 5px;
        }

        input[type="text"] {
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>

</head>
<body>

    <button onclick="window.location.href = 'admin_paneli.php';" style="position: fixed; top: 10px; right: 10px;">
        Admin Sayfasına Dön
    </button>

    
    <h2> Duyurular </h2>

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

    if($conn= mysqli_connect($servername,$dbusername,$dbpassword,$dbname))
    {

    }
    else
    {
    echo "bağlanmadı";

    }

    $sql2="SELECT announcements.id,announcements.title,announcements.content,admins.username FROM admins
    INNER JOIN announcements ON admins.id = announcements.admin_id";
    $result2=$conn->query($sql2);

    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";   
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['content'] . "</td>";
            echo "</tr> <br> ";
        }
    } else {
        echo "<tr><td colspan='4'>Ürün bulunamadı</td></tr>";
    }


    ?>
    <h2> Duzenle</h2>

    
    <form method="post" action="duyurularin_düzenlenmesi.php">
        
        <label for="düzenleme">düzenleme   :</label>
        <input type="radio" name="duyuru_islem" value="düzenleme">

        <label for="silme">silme  :</label>
        <input type="radio" name="duyuru_islem" value="silme">

        <label for="ekleme">ekleme   :</label>
        <input type="radio" name="duyuru_islem" value="ekleme"> 
        
        <br/> 
        <br/> 
        <label for="id">Bilgileri ile islem yapilacak duyurunun id'si  :</label>
        <input type="text" id="güncellenecek_duyurunun_id" name="güncellenecek_duyurunun_id" ><br><br>

        <label for="name">Yeni Basligi  :</label>
        <input type="text" id="duyurunun_yeni_basligi" name="duyurunun_yeni_basligi" ><br><br>


        <label for="name">Yeni Icerigi  :</label>
        <input type="text" id="duyurunun_yeni_icerigi" name="duyurunun_yeni_icerigi" ><br><br>
        
        <input type="submit" value="Uygula   ">
    </form>

    

</body>
</html>