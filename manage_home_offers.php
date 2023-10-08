<?php

include "db_connection.php";

// Skontroluj, či je formulár odoslaný na aktualizáciu ponuky domov
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['home_id'])) {
    // Skontroluj, či je formulár odoslaný na odstránenie ponuky domu
    if (isset($_POST['remove_home_offer'])) {
        $home_id = $_POST['home_id'];
        // Odstráň ponuku domu z databázy
        $delete_query = "DELETE FROM home_offers WHERE id = '$home_id'";
        mysqli_query($conn, $delete_query);
    } else {
        // Formulár je odoslaný na aktualizáciu ponuky domu
        $home_id = $_POST['home_id'];
        $updated_title = $_POST['updated_title'];
        $updated_price = $_POST['updated_price'];
        $updated_bedrooms = $_POST['updated_bedrooms'];
        $updated_area = $_POST['updated_area'];
        $updated_description = $_POST['updated_description'];

        // Aktualizuj ponuku domu v databáze
        $update_query = "UPDATE home_offers SET 
                         title = '$updated_title',
                         price = '$updated_price', 
                         bedrooms = '$updated_bedrooms', 
                         area = '$updated_area', 
                         description = '$updated_description' 
                         WHERE id = '$home_id'";
        mysqli_query($conn, $update_query);
    }

    // Presmeruj späť na manage_home_offers.php po aktualizácii alebo odstránení
    header("Location: manage_home_offers.php");
    exit;
}

// Získať ponuky domov z databázy
function fetchHomeOffers()
{
    global $conn;
    $sql = "SELECT * FROM home_offers";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Získať ponuky domov
$home_offers = fetchHomeOffers();

?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <!-- Pridaj svoje meta tagy, odkazy a ďalšie elementy hlavičky -->
    <title>Rodan Co. | Admin CMS</title>
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

        .edit-btn,
        .remove-btn {
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

        .edit-btn:hover,
        .remove-btn:hover {
            background-color: #45a049;
        }

        .confirm-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .confirm-form input {
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

        .add-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        .add-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Tlačidlo na pridanie domu -->
        <button class="add-btn" onclick="goToAddHouse()">Pridať</button>

        <!-- Zobraziť ponuky domov -->
        <?php foreach ($home_offers as $home_offer) : ?>
            <div class="home-offer" data-id="<?php echo $home_offer['id']; ?>">
                <?php
                // Generuj úplnú cestu k obrázku
                $image_path = "img/" . $home_offer['photo_path'];
                // Skontroluj, či súbor obrázka existuje
                $image_exists = file_exists($image_path);
                ?>

                <?php if ($image_exists) : ?>
                    <!-- Zobraziť obrázok, ak existuje -->
                    <img src="<?php echo $image_path; ?>" alt="Obrázok domu">
                <?php else : ?>
                    <!-- Zobraziť náhradný obrázok, ak skutočný obrázok nie je k dispozícii -->
                    <img src="img/room-1.jpg" alt="Obrázok nie je k dispozícii">
                <?php endif; ?>

                <h2><?php echo $home_offer['title']; ?></h2>
                <p>Cena(€): <?php echo $home_offer['price']; ?></p>
                <p>Izby: <?php echo $home_offer['bedrooms']; ?></p>
                <p>Plocha(m2): <?php echo $home_offer['area']; ?></p>
                <p>Popis: <?php echo $home_offer['description']; ?></p>

                <!-- Tlačidlo Upraviť -->
                <button class="edit-btn" onclick="toggleEditForm(<?php echo $home_offer['id']; ?>)">Upraviť</button>

                <!-- Tlačidlo Odstrániť -->
                <form method="post" class="remove-form" style="display: inline-block;">
                    <input type="hidden" name="home_id" value="<?php echo $home_offer['id']; ?>">
                    <!-- Pridaj nové skryté pole pre identifikáciu akcie odstránenia -->
                    <input type="hidden" name="remove_home_offer" value="1">
                    <button type="button" class="remove-btn" onclick="removeHomeOffer(<?php echo $home_offer['id']; ?>)">Odstrániť</button>
                </form>

                <!-- Tlačidlo Potvrdiť -->
                <form method="post" class="confirm-form" style="display: none;">
                    <!-- Pridaj tu svoje vstupné polia pre aktualizáciu ponuky domu -->
                    <!-- Napríklad: -->
                    <input type="hidden" name="home_id" value="<?php echo $home_offer['id']; ?>">
                    <label for="updated_title">Názov:</label>
                    <input type="text" name="updated_title" value="<?php echo $home_offer['title']; ?>">
                    <label for="updated_price">Cena:</label>
                    <input type="text" name="updated_price" value="<?php echo $home_offer['price']; ?>">
                    <label for="updated_bedrooms">Izby:</label>
                    <input type="text" name="updated_bedrooms" value="<?php echo $home_offer['bedrooms']; ?>">
                    <label for="updated_area">Plocha:</label>
                    <input type="text" name="updated_area" value="<?php echo $home_offer['area']; ?>">
                    <label for="updated_description">Popis:</label>
                    <input type="text" name="updated_description" value="<?php echo $home_offer['description']; ?>">
                    <button type="submit">Uložiť</button>
                    <button type="button" class="cancel-btn" onclick="cancelEdit(<?php echo $home_offer['id']; ?>)">Zrušiť</button>
                </form>
            </div>
        <?php endforeach; ?>

        <!-- Tlačidlo Späť -->
        <button class="go-back-btn" onclick="goBack()">Naspäť</button>
    </div>

    <script>
        // JavaScriptový kód pre prepínanie editačných a potvrdzovacích formulárov
        function toggleEditForm(homeId) {
            var homeOfferDiv = document.querySelector('.home-offer[data-id="' + homeId + '"]');
            var editForm = homeOfferDiv.querySelector('.confirm-form');
            var removeForm = homeOfferDiv.querySelector('.remove-form');
            var editBtn = homeOfferDiv.querySelector('.edit-btn');
            var removeBtn = homeOfferDiv.querySelector('.remove-btn');

            if (editForm.style.display === 'none') {
                editForm.style.display = 'block';
                removeForm.style.display = 'none';
                editBtn.style.display = 'none';
                removeBtn.style.display = 'none';
            } else {
                editForm.style.display = 'none';
                removeForm.style.display = 'inline-block';
                editBtn.style.display = 'inline-block';
                removeBtn.style.display = 'inline-block';
            }
        }

        // JavaScriptový kód pre spracovanie tlačidla Zrušiť v editačnom formulári
        function cancelEdit(homeId) {
            var homeOfferDiv = document.querySelector('.home-offer[data-id="' + homeId + '"]');
            var editForm = homeOfferDiv.querySelector('.confirm-form');
            var removeForm = homeOfferDiv.querySelector('.remove-form');
            var editBtn = homeOfferDiv.querySelector('.edit-btn');
            var removeBtn = homeOfferDiv.querySelector('.remove-btn');

            editForm.style.display = 'none';
            removeForm.style.display = 'inline-block';
            editBtn.style.display = 'inline-block';
            removeBtn.style.display = 'inline-block';
        }

        // JavaScriptový kód pre presmerovanie na adminstranka.php
        function goBack() {
            window.location.href = 'adminstranka.php';
        }

        // JavaScriptový kód pre presmerovanie na add_house.php po kliknutí na tlačidlo "Pridať"
        function goToAddHouse() {
            window.location.href = 'add_house.php';
        }

        // JavaScriptový kód pre spracovanie odoslania formulára na odstránenie ponuky domu
        function removeHomeOffer(homeId) {
            var homeOfferDiv = document.querySelector('.home-offer[data-id="' + homeId + '"]');
            var removeForm = homeOfferDiv.querySelector('.remove-form');

            // Odošli formulár pre odstránenie
            removeForm.submit();
        }
    </script>
</body>

</html>