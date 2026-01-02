<?php
require_once __DIR__ . "/../core/BaseModel.php";

class Medication extends BaseModel {
    private $id;
    private $name;
    private $instructions;

    public function __construct($id, $name, $instructions) {
        $this->id = $id;
        $this->name = $name;
        $this->instructions = $instructions;
    }

    // --- Getters ---
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getInstructions() { return $this->instructions; }
}