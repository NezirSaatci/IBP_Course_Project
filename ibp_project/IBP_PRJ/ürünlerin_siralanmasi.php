<!DOCTYPE html>
<html>
<head>
    <title>Urun Ekrani</title>

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

        form {
            text-align: center;
            margin-top: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
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

    
    <h2> Ürünler </h2>

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
    <h2> Duzenle</h2>

    
    <form method="post" action="ürünlerin_düzenlenmesi.php">
        
        <label for="düzenleme">düzenleme   :</label>
        <input type="radio" name="ürün_islem" value="düzenleme">

        <label for="silme">silme  :</label>
        <input type="radio" name="ürün_islem" value="silme">

        <label for="ekleme">ekleme   :</label>
        <input type="radio" name="ürün_islem" value="ekleme"> 
        
        <br/> 
        <br/> 
        <label for="id">Bilgileri ile islem yapilacak ürünün id'si  :</label>
        <input type="text" id="güncellenecek_ürünün_id" name="güncellenecek_ürünün_id" ><br><br>

        <label for="name">Yeni Adi  :</label>
        <input type="text" id="ürünün_yeni_adi" name="ürünün_yeni_adi" ><br><br>


        <label for="name">Yeni Fiyati  :</label>
        <input type="text" id="ürünün_yeni_ucreti" name="ürünün_yeni_ucreti" ><br><br>
        
        <input type="submit" value="Uygula   ">
    </form>

    

</body>
</html>