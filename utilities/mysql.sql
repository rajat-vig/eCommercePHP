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
