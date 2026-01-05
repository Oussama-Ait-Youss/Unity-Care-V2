<?php
require_once __DIR__ . "/User.php";

class Patient extends User {
    private $firstName;
    private $lastName;
    private $gender;
    private $dateOfBirth;
    private $phone;
    private $address;

    public function __construct($id, $username, $password, $email, $firstName, $lastName, $gender, $dateOfBirth, $phone, $address) {
        parent::__construct($id, $username, $password, $email, 'patient');

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->dateOfBirth = $dateOfBirth;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function getRole(): string {
        return 'patient';
    }

    public function getFullName(): string {
        return $this->firstName . " " . $this->lastName;
    }

    public function getAge(): int {
        $dob = new DateTime($this->dateOfBirth);
        $now = new DateTime();
        $interval = $now->diff($dob);
        return $interval->y;
    }
}