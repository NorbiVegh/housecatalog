<?php
// add_house.php

// Skontroluj, či je formulár odoslaný na pridanie nového domu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Zahrň súbor pre pripojenie k databáze
    include "db_connection.php";

    // Získaj dáta z formulára
    $title = $_POST['title'];
    $price = $_POST['price'];
    $bedrooms = $_POST['bedrooms'];
    $area = $_POST['area'];
    $description = $_POST['description'];

    // Spracovanie nahraných obrázkov
    if ($_FILES['house_image']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['house_image']['tmp_name'];
        $photo_filename = time() . '_' . $_FILES['house_image']['name'];
        $photo_path = "img/" . $photo_filename;
        move_uploaded_file($tmp_name, $photo_path);

        // Získaj úplnú URL adresu obrázka vrátane "http://localhost/webrodan/"
        $photo_url = "http://localhost/webrodan/" . $photo_path;
    } else {
        // Nastav predvolenú cestu obrázka, ak žiadny obrázok nie je nahraný
        $photo_path = "img/room-1.jpg"; // Nahraď svojím názvom a umiestnením predvoleného obrázka
        $photo_url = "http://localhost/webrodan/" . $photo_path;
    }

    // Vlož nový dom do databázy
    $insert_query = "INSERT INTO home_offers (title, price, bedrooms, area, description, photo_path) 
                     VALUES ('$title', '$price', '$bedrooms', '$area', '$description', '$photo_url')";
    mysqli_query($conn, $insert_query);

    // Presmeruj späť na manage_home_offers.php po vložení
    header("Location: manage_home_offers.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <!-- Pridaj svoje meta tagy, odkazy a ďalšie elementy hlavičky -->
    <title>Pridať dom</title>
    <link rel="stylesheet" href="style1.css"> <!-- Odkaz na tvoj CSS súbor -->
    <style>
        /* Dodatočné CSS štýly */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .home-offer {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }

        .home-offer img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .confirm-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .confirm-form input,
        .confirm-form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .confirm-form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-right: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .confirm-form button.cancel-btn {
            background-color: #f44336;
        }

        .confirm-form button:hover {
            background-color: #45a049;
        }

        .go-back-btn {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .go-back-btn:hover {
            background-color: #007095;
        }

        /* Vlastné štýly pre formulár pre pridanie domu */
        .add-house-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .add-house-form input,
        .add-house-form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .add-house-form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-right: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            /* Pridaj odsadenie dole */
            padding-bottom: 10px;
        }

        .add-house-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Pridať nový dom</h2>
        <!-- Pridaj formulár pre pridanie domov -->
        <form class="add-house-form" method="post" action="save_house.php" enctype="multipart/form-data">
            <label for="title">Názov:</label>
            <input type="text" name="title" required>

            <label for="price">Cena:</label>
            <input type="text" name="price" required>

            <label for="bedrooms">Izby:</label>
            <input type="text" name="bedrooms" required>

            <label for="area">Plocha:</label>
            <input type="text" name="area" required>

            <label for="description">Popis:</label>
            <textarea name="description" rows="4" required></textarea>

            <!-- Pridaj pole pre nahranie obrázka -->
            <div>
                <label for="house_image">Obrázok domu:</label>
                <input type="file" name="house_image" id="house_image" required>
            </div>

            <!-- Sem pridaj svoje tlačidlo na odoslanie formulára -->
            <button type="submit">Uložiť</button>
        </form>

        <!-- Tlačidlo Späť -->
        <button class="go-back-btn" onclick="goBack()">Naspäť</button>
    </div>

    <script>
        // JavaScriptový kód pre návrat na adminstranka.php
        function goBack() {
            window.location.href = 'adminstranka.php';
        }
    </script>
</body>

</html>
