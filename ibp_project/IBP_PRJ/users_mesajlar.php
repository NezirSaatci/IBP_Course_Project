<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Uye Ekrani</title>

    
    
</head>
<body>

    


    <form action="">
        <input type="button" onClick="location.href='users_mesajlar.php'" value="Mesajlari Goruntule" />
    </form>

    <button onclick="window.location.href = 'user.php';" style="position: fixed; top: 10px; right: 10px;">
        Uye Sayfasına Dön
    </button>

    

    <h2> Mesajlariniz</h2>

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





$sql = "SELECT messages.id,messages.content,admins.username,users.username FROM admins
INNER JOIN messages ON admins.id = messages.sender_id AND users
INNER JOIN messages ON users.id = messages.reciever_id";
  
    
    
    $result = $conn->query($sql);
                
                
              if ($result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {

                        if($row['messages.reciever_id']===$_SESSION['acc_id'])
                        {

                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['admins.username'] . "</td>";   
                            echo "<td>" . $row['content'] . "</td>";
                            echo "</tr> <br> ";

                        }


                    }
                } else {
                    echo "<tr><td colspan='4'>Ürün bulunamadı</td></tr>";
                }



                




    

    $sql = "SELECT messages.id,messages.sender_id,reciever_id,sender_type,admins.id,users.id FROM admins
    INNER JOIN messages ON admins.id = messages.admin_id";
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
    

</body>
</html>