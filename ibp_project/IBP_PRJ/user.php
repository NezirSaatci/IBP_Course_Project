<!DOCTYPE html>
<html>
<head>
    <title>Uye Ekrani</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 30px;
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

        input[type="button"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .message-container {
            margin-top: 30px;
            text-align: center;
        }
    </style>
    
</head>
<body>

    
    
        
    <form action="">
        <input type="button" onClick="location.href='sifre_guncelleme.html'" value="Sifreni Guncelle" />

    </form>

    <form action="">
        <input type="button" onClick="location.href='users_mesajlar.php'" value="Mesajlari Goruntule" />
    </form>

    <button onclick="window.location.href = 'giris_ekrani.html';" style="position: fixed; top: 10px; right: 10px;">
        Giriş Sayfasına Dön
    </button>

    

    

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

//$sql = "SELECT announcements.id,announcements.title,announcements.content,admins.username FROM admins
//INNER JOIN announcements ON admins.id = announcements.admin_id";
  
    
    
  //  $result = $conn->query($sql);
                
                
    //            if ($result->num_rows > 0) {
      //              while ($row = $result->fetch_assoc()) {
        //                echo "<tr>";
          //              echo "<td>" . $row['id'] . "</td>";
            //            echo "<td>" . $row['username'] . "</td>";   
              //          echo "<td>" . $row['title'] . "</td>";
                //        echo "<td>" . $row['content'] . "</td>";
                  //      echo "</tr> <br> ";
    //                }
      //          } else {
        //            echo "<tr><td colspan='4'>Ürün bulunamadı</td></tr>";
          //      }


           //     echo "</tr> <br> "; echo "</tr> <br> "; echo "</tr> <br> ";
                
                
                
    

    
    ?>

    <h2> Urunler </h2>

    <?php

    if($conn= mysqli_connect($servername,$dbusername,$dbpassword,$dbname))
    {

    }
    else
    {
    echo "bağlanmadı";

    }

    $sql2="SELECT * FROM products";
    $result2=$conn->query($sql2);

    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";   
            echo "<td>" . $row['price'] . "</td>";
            echo "</tr> <br> ";
        }
    } else {
        echo "<tr><td colspan='4'>Ürün bulunamadı</td></tr>";
    }


    ?>

    <h2> Duyurular </h2>

    <?php

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
    

</body>
</html>