-- Create the Database
CREATE DATABASE IF NOT EXISTS UnityClinic_V2;
USE UnityClinic_V2;

-- 1. INDEPENDENT MODULES (Must be created first)

-- Departments Table
CREATE TABLE departments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
);

CREATE TABLE patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    birth_date DATE NOT NULL,
    phone VARCHAR(20),
    address TEXT
);

CREATE TABLE doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    department_id INT,
    specialization VARCHAR(100) NOT NULL,
    FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE SET NULL
);

CREATE TABLE medications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    stock_quantity INT DEFAULT 0
);

-- 2. USER MANAGEMENT (Depends on Profiles)

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    role ENUM('admin', 'doctor', 'patient') NOT NULL,
    patient_id INT NULL,
    doctor_id INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE SET NULL,
    FOREIGN KEY (doctor_id) REFERENCES doctors(id) ON DELETE SET NULL
);

-- 3. CLINIC OPERATIONS (Appointments)

CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    appointment_date DATETIME NOT NULL,
    status ENUM('scheduled', 'completed', 'cancelled') DEFAULT 'scheduled',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
    FOREIGN KEY (doctor_id) REFERENCES doctors(id) ON DELETE CASCADE
);

-- 4. PHARMACY & RECORDS (Prescriptions)

CREATE TABLE prescriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    appointment_id INT NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (appointment_id) REFERENCES appointments(id) ON DELETE CASCADE
);

CREATE TABLE prescription_items (
    prescription_id INT NOT NULL,
    medication_id INT NOT NULL,
    dosage VARCHAR(100) NOT NULL COMMENT 'e.g. 500mg twice daily',
    quantity INT NOT NULL DEFAULT 1,

    PRIMARY KEY (prescription_id, medication_id),
    FOREIGN KEY (prescription_id) REFERENCES prescriptions(id) ON DELETE CASCADE,
    FOREIGN KEY (medication_id) REFERENCES medications(id) ON DELETE CASCADE
);


-- 1. Create Departments
INSERT INTO departments (id, name, description) VALUES 
(1, 'Cardiology', 'Heart and cardiovascular system'),
(2, 'Neurology', 'Brain and nervous system'),
(3, 'Pediatrics', 'Medical care for infants and children'),
(4, 'General Practice', 'General health and primary care');

-- 2. Create Medications (Inventory)
INSERT INTO medications (id, name, description, stock_quantity) VALUES 
(1, 'Amoxicillin', 'Antibiotic used to treat bacterial infections', 100),
(2, 'Paracetamol', 'Pain reliever and fever reducer', 500),
(3, 'Ibuprofen', 'Nonsteroidal anti-inflammatory drug', 200),
(4, 'Lisinopril', 'Treats high blood pressure', 50);

-- 3. Create Doctor Profiles (Linked to Departments)
INSERT INTO doctors (id, department_id, specialization) VALUES 
(1, 1, 'Cardiologist'), -- Dr. House
(2, 2, 'Neurologist'),  -- Dr. Strange
(3, 3, 'Pediatrician'); -- Dr. Melendez

-- 4. Create Patient Profiles
INSERT INTO patients (id, birth_date, phone, address) VALUES 
(1, '1990-05-15', '123-456-7890', '123 Baker Street'), -- John Doe
(2, '1985-08-22', '987-654-3210', '456 Ocean Drive'),  -- Sarah Smith
(3, '2015-01-10', '555-123-4567', '789 Maple Avenue'); -- Timmy Turner

-- 5. Create USERS (Logins linked to Profiles)
-- Password for everyone is: oussama123
INSERT INTO users (username, email, password, role, doctor_id, patient_id) VALUES 
-- Doctor Users
('DrHouse', 'house@test.com', '$2y$10$iBpiejl7NlCXnlC8xSzCzuIBIsHT7lbZqtsaSL7P1.wmsMWNgWQz6', 'doctor', 1, NULL),
('DrStrange', 'strange@test.com', '$2y$10$iBpiejl7NlCXnlC8xSzCzuIBIsHT7lbZqtsaSL7P1.wmsMWNgWQz6', 'doctor', 2, NULL),
-- Patient Users
('JohnDoe', 'john@test.com', '$2y$10$iBpiejl7NlCXnlC8xSzCzuIBIsHT7lbZqtsaSL7P1.wmsMWNgWQz6', 'patient', NULL, 1),
('SarahSmith', 'sarah@test.com', '$2y$10$iBpiejl7NlCXnlC8xSzCzuIBIsHT7lbZqtsaSL7P1.wmsMWNgWQz6', 'patient', NULL, 2);
-- 6. Create Appointments
INSERT INTO appointments (id, patient_id, doctor_id, appointment_date, status) VALUES
(1, 1, 1, NOW(), 'scheduled'), -- John with House (Today)
(2, 2, 2, DATE_ADD(NOW(), INTERVAL 2 DAY), 'scheduled'), -- Sarah with Strange (Future)
(3, 1, 1, DATE_SUB(NOW(), INTERVAL 10 DAY), 'completed'); -- John with House (Past)
-- 7. Create Prescriptions (For the completed appointment)
INSERT INTO prescriptions (id, appointment_id, notes) VALUES 
(1, 3, 'Patient showed signs of mild infection. Prescribed antibiotics.');
-- 8. Link Medications to Prescription
INSERT INTO prescription_items (prescription_id, medication_id, dosage, quantity) VALUES 
(1, 1, '500mg twice daily for 7 days', 1); -- Amoxicillin for John
