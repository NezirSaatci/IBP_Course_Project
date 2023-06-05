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

        input[type="radio"] {
            margin: 0 5px;
        }

        label {
            display: inline-block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 200px;
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

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>

</head>
<body>

    <button onclick="window.location.href = 'admin_paneli.php';" style="position: fixed; top: 10px; right: 10px;">
        Admin Sayfasına Dön
    </button>

    
    <h2> Üyeler </h2>

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

    $sql2="SELECT * FROM users";
    $result2=$conn->query($sql2);

    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";   
            echo "<td>" . $row['password'] . "</td>";
            echo "</tr> <br> ";
        }
    } else {
        echo "<tr><td colspan='4'>Ürün bulunamadı</td></tr>";
    }


    ?>
    <h2> Duzenle</h2>

    
    <form method="post" action="üyelerin_düzenlenmesi.php">
        
        <label for="düzenleme">düzenleme   :</label>
        <input type="radio" name="üye_islem" value="düzenleme">

        <label for="silme">silme  :</label>
        <input type="radio" name="üye_islem" value="silme">

        <label for="ekleme">ekleme   :</label>
        <input type="radio" name="üye_islem" value="ekleme"> 
        
        <br/> 
        <br/> 
        <label for="id">Bilgileri ile islem yapilacak üyenin id'si  :</label>
        <input type="text" id="güncellenecek_üyenin_id" name="güncellenecek_üyenin_id" ><br><br>

        <label for="name">Yeni Adi  :</label>
        <input type="text" id="üyenin_yeni_adi" name="üyenin_yeni_adi" ><br><br>


        <label for="name">Yeni Sifresi  :</label>
        <input type="text" id="üyenin_yeni_sifresi" name="üyenin_yeni_sifresi" ><br><br>
        
        <input type="submit" value="Giriş Yap   ">
    </form>

    

</body>
</html>