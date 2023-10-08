<?php
// Zahrň súbor pre pripojenie k databáze
include "db_connection.php";

// Skontroluj, či je formulár odoslaný na aktualizáciu domov ponúk
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['home_id'])) {
    // Získaj odoslané dáta z formulára
    $home_id = $_POST['home_id'];
    $updated_price = $_POST['updated_price'];
    $updated_bedrooms = $_POST['updated_bedrooms'];
    $updated_area = $_POST['updated_area'];
    $updated_description = $_POST['updated_description'];

    // Skontroluj, či je nahratý nový súbor s obrázkom
    if (isset($_FILES['updated_photo']) && $_FILES['updated_photo']['error'] === UPLOAD_ERR_OK) {
        // Spracuj nahrávanie obrázka a aktualizuj cestu k obrázku v databáze
        $target_dir = 'img/';
        $image_name = $_FILES['updated_photo']['name'];
        $target_path = $target_dir . basename($image_name);

        // Presuň nahratý obrázok do cieľového adresára
        if (move_uploaded_file($_FILES['updated_photo']['tmp_name'], $target_path)) {
            // Aktualizuj ponuku domu v databáze vrátane cesty k obrázku
            $update_query = "UPDATE home_offers SET price = '$updated_price', bedrooms = '$updated_bedrooms', area = '$updated_area', description = '$updated_description', photo_path = '$target_path' WHERE id = '$home_id'";
            mysqli_query($conn, $update_query);
        } else {
            // Ak sa vyskytla chyba pri nahrávaní obrázka, zobraz chybové hlásenie
            echo "Chyba pri nahrávaní obrázka.";
        }
    } else {
        // Ak žiadny nový súbor s obrázkom nie je nahraný, aktualizuj ponuku domu bez aktualizácie cesty k obrázku
        $update_query = "UPDATE home_offers SET price = '$updated_price', bedrooms = '$updated_bedrooms', area = '$updated_area', description = '$updated_description' WHERE id = '$home_id'";
        mysqli_query($conn, $update_query);
    }
}
?>

