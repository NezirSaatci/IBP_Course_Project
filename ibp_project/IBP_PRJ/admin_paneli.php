<!DOCTYPE html>
<html>
<head>
    <title>Uye Ekrani</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            display: inline-block;
            margin-bottom: 10px;
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
            margin: 4px 2px;
            cursor: pointer;
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
    </style>

    
    
</head>
<body>
    
    <h1> Admin Paneli</h1>
    
        
    <form action="">
        <input type="button" onClick="location.href='üyelerin_siralanmasi.php'" value="Uyeleri Goruntule " />
    </form>

    <form action="">
        <input type="button" onClick="location.href='ürünlerin_siralanmasi.php'" value="Urunleri Goruntule" />
    </form>


    <form action="">
        <input type="button" onClick="location.href='duyurularin_siralanmasi.php'" value="Mesajlari Goruntule" />
    </form>


    <form action="">
        <input type="button" onClick="location.href='duyurularin_siralanmasi.php'" value="Duyurulari Goruntule" />
    </form>




    <button onclick="window.location.href = 'giris_ekrani.html';" style="position: fixed; top: 10px; right: 10px;">
        Giriş Sayfasına Dön
    </button>

    

    

    <?php



    ?>
    

</body>
</html>