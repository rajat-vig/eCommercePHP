CREATE TABLE `eCommercePHP`.`user` ( 
    `user_id` INT NOT NULL AUTO_INCREMENT , 
    `user_name` VARCHAR(255) NOT NULL , 
    `email` VARCHAR(255) NOT NULL , 
    `password` VARCHAR(255) NOT NULL , 
    `purchasing_history` INT NOT NULL , 
    `shipping_address` VARCHAR(255) NOT NULL , 
    PRIMARY KEY (`user_id`), 
    UNIQUE (`user_name`), 
    UNIQUE (`email`)
    ) 
ENGINE = InnoDB;

"ALTER TABLE `user` DROP `purchasing_history`;"

CREATE TABLE `eCommercePHP`.`product` ( 
    `product_id` INT NOT NULL AUTO_INCREMENT , 
    `description` VARCHAR(255) NOT NULL , 
    `image_url` VARCHAR(255) NOT NULL , 
    `price` DECIMAL NOT NULL , 
    `shipping_cost` DECIMAL NOT NULL , 
    PRIMARY KEY (`product_id`)
    ) 
ENGINE = InnoDB;

ALTER TABLE product ADD COLUMN product_name VARCHAR(255) AFTER product_id; 
-- UNIQUE & NOT NULL


ALTER TABLE `product` CHANGE `price` `price` DECIMAL(10,2) NOT NULL;
ALTER TABLE `product` CHANGE `shipping_cost` `shipping_cost` DECIMAL(10,2) NOT NULL;


CREATE TABLE cart (
    user_id int,
    product_id int,
    quantity int NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (product_id) REFERENCES product(product_id)
);

CREATE TABLE `eCommercePHP`.`comment` ( 
    `comment_id` INT NOT NULL AUTO_INCREMENT ,
    `user_id` INT NOT NULL ,
    `product_id` INT NOT NULL , 
    `rating` FLOAT NOT NULL , 
    `text` VARCHAR(255) NOT NULL , 
    PRIMARY KEY (`comment_id`),
    FOREIGN KEY (`user_id`) REFERENCES user(`user_id`),
    FOREIGN KEY (`product_id`) REFERENCES product(`product_id`)
    ) 
ENGINE = InnoDB;


CREATE TABLE `eCommercePHP`.`image` ( 
    `comment_id` INT NOT NULL ,
    `image_url` VARCHAR(255) NOT NULL , 
    FOREIGN KEY (`comment_id`) REFERENCES comment(`comment_id`)
    ) 
ENGINE = InnoDB;

CREATE TABLE `eCommercePHP`.`order` ( 
    `order_id` VARCHAR(255) NOT NULL ,
    `user_id` INT NOT NULL ,
    `product_id` INT NOT NULL , 
    `quantity` FLOAT NOT NULL , 
    `price` VARCHAR(255) NOT NULL ,
    `date` DATETIME NOT NULL, 
    FOREIGN KEY (`user_id`) REFERENCES user(`user_id`),
    FOREIGN KEY (`product_id`) REFERENCES product(`product_id`)
    ) 
ENGINE = InnoDB;

ALTER TABLE `order` CHANGE `order_id` `order_id` INT(255) NOT NULL;
