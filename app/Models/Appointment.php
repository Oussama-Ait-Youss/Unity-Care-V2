<?php
require_once __DIR__ . "/../core/BaseModel.php";

class Appointment extends BaseModel {
    private $id;
    private $date;
    private $time;
    private $doctorId;
    private $patientId;
    private $reason;
    private $status;

    public function __construct($id, $date, $time, $doctorId, $patientId, $reason, $status = 'scheduled') {
        $this->id = $id;
        $this->date = $date;
        $this->time = $time;
        $this->doctorId = $doctorId;
        $this->patientId = $patientId;
        $this->reason = $reason;
        $this->status = $status;
    }

    // --- Méthodes Métier (Business Logic) ---
    public function cancel() {
        $this->status = 'cancelled';
    }

    public function markAsDone() {
        $this->status = 'done';
    }

    // --- Getters ---
    public function getId() { return $this->id; }
    public function getDate() { return $this->date; }
    public function getTime() { return $this->time; }
    public function getDoctorId() { return $this->doctorId; }
    public function getPatientId() { return $this->patientId; }
    public function getReason() { return $this->reason; }
    public function getStatus() { return $this->status; }
}