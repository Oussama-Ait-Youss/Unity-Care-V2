<?php
require_once __DIR__ . "/../core/BaseModel.php";

class Prescription extends BaseModel {
    private $id;
    private $date;
    private $doctorId;
    private $patientId;
    private $medicationId;
    private $dosageInstructions;

    public function __construct($id, $date, $doctorId, $patientId, $medicationId, $dosageInstructions) {
        $this->id = $id;
        $this->date = $date;
        $this->doctorId = $doctorId;
        $this->patientId = $patientId;
        $this->medicationId = $medicationId;
        $this->dosageInstructions = $dosageInstructions;
    }

    // --- Getters ---
    public function getId() { return $this->id; }
    public function getDate() { return $this->date; }
    public function getDoctorId() { return $this->doctorId; }
    public function getPatientId() { return $this->patientId; }
    public function getMedicationId() { return $this->medicationId; }
    public function getDosageInstructions() { return $this->dosageInstructions; }
}