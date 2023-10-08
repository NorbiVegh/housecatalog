<?php
// save_house.php

// Zahrň súbor pre pripojenie k databáze
include "db_connection.php";

// Skontroluj, či je formulár odoslaný a je poskytnutý súbor s obrázkom
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["house_image"]["name"])) {
    // Získaj dáta z formulára
    $title = $_POST['title'];
    $price = $_POST['price'];
    $bedrooms = $_POST['bedrooms'];
    $area = $_POST['area'];
    $description = $_POST['description'];

    // Spracovanie nahrávania obrázka
    $target_dir = "";
    $imageFileType = strtolower(pathinfo($_FILES["house_image"]["name"], PATHINFO_EXTENSION));
    $target_file = $target_dir . basename($_FILES["house_image"]["name"]);
    $uploadOk = 1;

    // Skontroluj, či je súbor obrázkom
    $check = getimagesize($_FILES["house_image"]["tmp_name"]);
    if ($check !== false) {
        echo "Súbor je obrázok - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Súbor nie je obrázok.";
        $uploadOk = 0;
    }

    // Skontroluj veľkosť súboru
    if ($_FILES["house_image"]["size"] > 500000) {
        echo "Prepáčte, váš súbor je príliš veľký.";
        $uploadOk = 0;
    }

    // Povol len určité formáty súborov
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Prepáčte, sú povolené len súbory JPG, JPEG, PNG a GIF.";
        $uploadOk = 0;
    }

    // Skontroluj, či bol nastavený $uploadOk na 0 z dôvodu chyby
    if ($uploadOk == 0) {
        echo "Prepáčte, váš súbor nebol nahraný.";
    } else {
        // Ak je všetko v poriadku, skopíruj súbor do cieľového adresára
        if (move_uploaded_file($_FILES["house_image"]["tmp_name"], $target_file)) {
            echo "Súbor " . htmlspecialchars(basename($_FILES["house_image"]["name"])) . " bol úspešne nahraný.";
            // Vlož nové detaily domu do databázy
            $insert_query = "INSERT INTO home_offers (title, price, bedrooms, area, description, photo_path) 
                             VALUES ('$title', '$price', '$bedrooms', '$area', '$description', '$target_file')";
            mysqli_query($conn, $insert_query);

            // Presmeruj späť na manage_home_offers.php po vložení
            header("Location: manage_home_offers.php");
            exit;
        } else {
            echo "Prepáčte, vyskytla sa chyba pri nahrávaní vášho súboru.";
        }
    }
} else {
    // Spracuj prípad, ak používateľ neodoslal obrázok alebo došlo k chybe pri nahrávaní súboru
    echo "Chyba: Chýba obrázok.";
}
?>
