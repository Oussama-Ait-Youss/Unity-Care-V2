<?php
require_once __DIR__ . "/User.php";

class Doctor extends User {
    private $firstName;
    private $lastName;
    private $specialization;
    private $phone;
    private $departmentId;

    public function __construct($id, $username, $password, $email, $firstName, $lastName, $specialization, $phone, $departmentId) {
        parent::__construct($id, $username, $password, $email, 'doctor');

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->specialization = $specialization;
        $this->phone = $phone;
        $this->departmentId = $departmentId;
    }

    public function getRole(): string {
        return 'doctor';
    }

    public function getFullName(): string {
        return "Dr. " . $this->firstName . " " . $this->lastName;
    }
    public function getSpecialization(){
        return $this->specialization;
    }
    public function getPhone(){
        return $this->phone;
    }

}