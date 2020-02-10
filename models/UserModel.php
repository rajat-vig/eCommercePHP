<?php
require __DIR__.'/BaseModel.php';
class UserModel extends BaseModel {
    public $userId;
    public $userName;
    public $email;
    public $password;
    public $shippingAddress;
}
?>