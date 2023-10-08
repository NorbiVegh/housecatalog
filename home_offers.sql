CREATE TABLE home_offers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  location VARCHAR(255) NOT NULL,
  type VARCHAR(100) NOT NULL,
  bedrooms INT NOT NULL,
  bathrooms INT NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  photo_path VARCHAR(255) NOT NULL,
  area DECIMAL(10, 2) NOT NULL,
  description TEXT NOT NULL
);

CREATE TABLE home_details (
  id INT AUTO_INCREMENT PRIMARY KEY,
  home_id INT NOT NULL,
  description TEXT NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  photo_path VARCHAR(255) NOT NULL,
  FOREIGN KEY (home_id) REFERENCES home_offers(id) ON DELETE CASCADE
);

INSERT INTO home_offers (title, photo_path, price, area, bedrooms, description)
VALUES ('Merkur 2', 'room-1.jpg', 1590.00, 168.6, 4, 'Moderný 4 izbový rodinný dom s množstvom úložného priestoru, spálňou na prízemí a priestrannou galériou'),
       ('Bungalow 215', 'room-2.jpg', 1290.00, 94.2, 4, 'Jednoduchý bungalov na úzky pozemok, s valbovou strechou a vonkajším priestorom so záhradou.'),
       ('Bungalow 167', 'room-3.jpg', 1390.00, 150.4, 5, 'Jednoduchý 5-izbový rodinný dom s valbovou strechou, parkovacím miestom a záhradou pred domom');



