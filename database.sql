# NAME: THEOPHILUS ADDO
# ID: 10828947

# Creating and selecting the database 
CREATE DATABASE `project3`;
USE `project3`;

# Creating users table
CREATE TABLE `users`(
`id` INT PRIMARY KEY AUTO_INCREMENT,
`username` VARCHAR(255),
`email` VARCHAR(255),
`password` VARCHAR(255)
);

# Creating default account
INSERT INTO `users`(`username`, `email`, `password`) VALUES ("Theophilus Addo", "theophilito@gmail.com", "c21f969b5f03d33d43e04f8f136e7682");

# Creating shops table
CREATE TABLE `shops`(
`shop_id` INT PRIMARY KEY AUTO_INCREMENT,
`email` VARCHAR(255),
`shop_name` VARCHAR(255),
`momo` VARCHAR(255)
);

# Creating default shop
INSERT INTO `shops`(`email`, `shop_name`, `momo`) VALUES("theophilito@gmail.com", "Theophilus Shop", "0269307266"); 

# Creating orders table
CREATE TABLE `orders`(
`order_id` INT PRIMARY KEY,
`buyer_name` VARCHAR(255),
`number` INT,
`product` VARCHAR(255),
`location` VARCHAR(255),
`contact` VARCHAR(255),
`price` VARCHAR(255),
`date` VARCHAR(255),
`seller_email` VARCHAR(255)
);

# Inserting default orders
INSERT INTO `orders` VALUES(12345, "Theophilus Addo", 5, "Radio", "Awoshie", "0269307266", "20", "19/05/2021 02:05", "theophilito@gmail.com");
INSERT INTO `orders` VALUES(12346, "Ampofo Smith", 5, "Black shoe", "Kasoa", "0245265879", "20", "05/10/2021 10:15", "theophilito@gmail.com");

# Creating products table
CREATE TABLE `products`(
`product_id` INT PRIMARY KEY AUTO_INCREMENT,
`email` VARCHAR(255),
`product_name` VARCHAR(255),
`description` VARCHAR(255),
`product_price` VARCHAR(255),
`number` INT,
`img_link` VARCHAR(255),
`product_status` VARCHAR(255)
);

# Inserting default products
INSERT INTO `products` VALUES(72755, "theophilito@gmail.com", "Black shoe", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat provident magnam rerum corrupti quae, neque totam expedita vero dolorum aliquid quas, sint repellat fugiat dicta repellendus, ullam dolores animi aut.", "20", 5, "uploads/72755.jpg", "Active");
INSERT INTO `products` VALUES(44596, "theophilito@gmail.com", "Radio", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat provident magnam rerum corrupti quae, neque totam expedita vero dolorum aliquid quas, sint repellat fugiat dicta repellendus, ullam dolores animi aut.", "20", 5, "uploads/44596.jpg", "Active");
INSERT INTO `products` VALUES(53414, "theophilito@gmail.com", "Watch", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat provident magnam rerum corrupti quae, neque totam expedita vero dolorum aliquid quas, sint repellat fugiat dicta repellendus, ullam dolores animi aut.", "20", 5, "uploads/53414.jpg", "Active");
INSERT INTO `products` VALUES(3639, "theophilito@gmail.com", "Headset", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat provident magnam rerum corrupti quae, neque totam expedita vero dolorum aliquid quas, sint repellat fugiat dicta repellendus, ullam dolores animi aut.", "20", 5, "uploads/3639.jpg", "Active");
INSERT INTO `products` VALUES(45064, "theophilito@gmail.com", "Movie", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat provident magnam rerum corrupti quae, neque totam expedita vero dolorum aliquid quas, sint repellat fugiat dicta repellendus, ullam dolores animi aut.", "20", 5, "uploads/45064.jpg", "Active");
INSERT INTO `products` VALUES(59937, "theophilito@gmail.com", "Black shoe", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat provident magnam rerum corrupti quae, neque totam expedita vero dolorum aliquid quas, sint repellat fugiat dicta repellendus, ullam dolores animi aut.", "20", 5, "uploads/59937.jpg", "Active");
INSERT INTO `products` VALUES(6413, "theophilito@gmail.com", "Watch", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat provident magnam rerum corrupti quae, neque totam expedita vero dolorum aliquid quas, sint repellat fugiat dicta repellendus, ullam dolores animi aut.", "100", 5, "uploads/6413.jpg", "Active");
INSERT INTO `products` VALUES(63143, "theophilito@gmail.com", "Black shoe", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat provident magnam rerum corrupti quae, neque totam expedita vero dolorum aliquid quas, sint repellat fugiat dicta repellendus, ullam dolores animi aut.", "20", 5, "uploads/72755.jpg", "Active");
INSERT INTO `products` VALUES(17206, "theophilito@gmail.com", "New", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat provident magnam rerum corrupti quae, neque totam expedita vero dolorum aliquid quas, sint repellat fugiat dicta repellendus, ullam dolores animi aut.", "20", 1, "uploads/17206.jpg", "Active");
INSERT INTO `products` VALUES(89457, "theophilito@gmail.com", "Black Slippers", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat provident magnam rerum corrupti quae, neque totam expedita vero dolorum aliquid quas, sint repellat fugiat dicta repellendus, ullam dolores animi aut.", "30", 6, "uploads/89457.jpg", "Active");
INSERT INTO `products` VALUES(39976, "theophilito@gmail.com", "Necklace", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat provident magnam rerum corrupti quae, neque totam expedita vero dolorum aliquid quas, sint repellat fugiat dicta repellendus, ullam dolores animi aut.", "20", 5, "uploads/39976.jpg", "Active");
INSERT INTO `products` VALUES(58044, "theophilito@gmail.com", "Hand band", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat provident magnam rerum corrupti quae, neque totam expedita vero dolorum aliquid quas, sint repellat fugiat dicta repellendus, ullam dolores animi aut.", "30", 6, "uploads/58044.jpg", "Active");
INSERT INTO `products` VALUES(8069, "theophilito@gmail.com", "White shoes", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat provident magnam rerum corrupti quae, neque totam expedita vero dolorum aliquid quas, sint repellat fugiat dicta repellendus, ullam dolores animi aut.", "20", 5, "uploads/8069.jpg", "Active");
INSERT INTO `products` VALUES(16907, "theophilito@gmail.com", "Designer Shoe", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat provident magnam rerum corrupti quae, neque totam expedita vero dolorum aliquid quas, sint repellat fugiat dicta repellendus, ullam dolores animi aut.", "20", 5, "uploads/16907.jpg", "Active");
INSERT INTO `products` VALUES(30505, "theophilito@gmail.com", "Sneaker", "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat provident magnam rerum corrupti quae, neque totam expedita vero dolorum aliquid quas, sint repellat fugiat dicta repellendus, ullam dolores animi aut.", "120", 3, "uploads/30505.jpg", "Active");
