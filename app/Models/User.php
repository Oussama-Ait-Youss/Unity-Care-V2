<?php
// FIX 1: Include the correct parent class file
require_once __DIR__ . "/../core/BaseModel.php";

abstract class User extends BaseModel {
    protected $id;
    protected $username;
    protected $password;
    protected $email;
    protected $role;
    // Properties for relations
    protected $patient_id;
    protected $doctor_id;
    protected $created_at;

    public function __construct($id, $username, $password, $email, $role = null) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
    }


    abstract public function getRole(): string;


    public function verifyPassword(string $password): bool {
        return password_verify($password, $this->password);
    }

    //Setters
    public function setEmail($email) {
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }
        $this->email = $email;
    }

    public function setUsername($username) {
        if (strlen($username) < 3) {
            throw new Exception("Username is too short");
        }
        $this->username = $username;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
}