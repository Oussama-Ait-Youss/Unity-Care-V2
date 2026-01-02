<?php
require_once __DIR__ . "/User.php";

class Admin extends User {

    public function __construct($id, $username, $password, $email) {
        parent::__construct($id, $username, $password, $email, 'admin');
    }

    public function getRole(): string {
        return 'admin';
    }
}