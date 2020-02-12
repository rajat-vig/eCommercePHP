<?php

#DATABASE CONSTANTS
$DB_HOST = 'localhost';
$DB_PORT = '8080';
$DB_DATABASE = 'eCommercePHP';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';

#USER CONSTANTS
$RQ_USERID = 'user_id';
$RQ_USERNAME = 'user_name';
$RQ_EMAIL = 'email';
$RQ_PASSWORD = 'password';
$RQ_SHIPPING_ADDRESS = 'shipping_address';

#GENERAL
$TRUE = true;
$FALSE = false;
$NULL = null;

#USER MODEL CONSTANTS
$USER_RETRIEVED_SUCCESSFULLY = 'User information retrieved successfully';
$USER_RETRIEVING_ERROR = 'User information doesn\'t exist';
$USERS_RETRIEVED_SUCCESSFULLY = 'All users retrieved successfully';
$USERS_RETRIEVING_ERROR = 'Something went wrong while retrieving all users';
$USER_CREATED_SUCCESSFULLY = 'New user created successfully';
$USER_CREATION_ERROR = 'Error in creating new user';
$USER_UPDATED_SUCCESSFULLY = 'User details updated successfully';
$USER_UPDATION_ERROR = 'Error in updating user';
$USER_DELETED_SUCCESSFULLY = 'User deleted successfully';
$USER_DELETION_ERROR = 'User can\'t be deleted';

#PRODUCT CONSTANTS
$RQ_PRODUCTID = 'product_id';
$RQ_PRODUCTNAME = 'product_name';
$RQ_DESCRIPTION = 'description';
$RQ_IMAGE_URL = 'image_url';
$RQ_PRICE = 'price';
$RQ_SHIPPING_COST = 'shipping_cost';

#PRODUCT MODEL CONSTANTS
$PRODUCT_RETRIEVED_SUCCESSFULLY = 'Product information retrieved successfully';
$PRODUCT_RETRIEVING_ERROR = 'Product information doesn\'t exist';
$PRODUCTS_RETRIEVED_SUCCESSFULLY = 'All products retrieved successfully';
$PRODUCTS_RETRIEVING_ERROR = 'Something went wrong while retrieving all products';
$PRODUCT_CREATED_SUCCESSFULLY = 'New product created successfully';
$PRODUCT_CREATION_ERROR = 'Error in creating new product';
$PRODUCT_UPDATED_SUCCESSFULLY = 'Product details updated successfully';
$PRODUCT_UPDATION_ERROR = 'Error in updating product';
$PRODUCT_DELETED_SUCCESSFULLY = 'Product deleted successfully';
$PRODUCT_DELETION_ERROR = 'Product can\'t be deleted';

#CART CONSTANTS
$RQ_QUANTITY = 'quantity';

#CART MODEL CONSTANTS
$CART_RETRIEVED_SUCCESSFULLY = 'Cart products retrieved successfully';
$CART_RETRIEVING_ERROR = 'Something went wrong while retrieving products from cart';
$PRODUCT_ADDED_SUCCESSFULLY = 'Product added to cart';
$PRODUCT_ADDING_ERROR = 'Error in adding product to cart';
$CART_UPDATED_SUCCESSFULLY = 'Product details updated successfully';
$CART_UPDATION_ERROR = 'Error in updating product';
$PRODUCT_REMOVED_SUCCESSFULLY = 'Product deleted from cart';
$PRODUCT_REMOVING_ERROR = 'Product can\'t be deleted';

#COMMENT CONSTANTS
$RQ_COMMENTID = 'comment_id';
$RQ_COMMENT_RATING = 'rating';
$RQ_COMMENT_TEXT = 'text';
?>