## 🏥 Unity Care Clinic – Backoffice V2

## 📌 Description du projet

**Unity Care Clinic V2** est une application web PHP 8 orientée objet (OOP) permettant la gestion complète du parcours patient :

* Authentification sécurisée
* Gestion des rôles (Admin, Doctor, Patient)
* Rendez-vous médicaux
* Prescriptions et médicaments
* Statistiques
* Sécurité Web (XSS, CSRF, SQL Injection)

Cette version étend les fonctionnalités de la V1 avec une architecture plus robuste, sécurisée et évolutive.

---

## 🛠️ Stack Technique

* **Langage** : PHP 8 (OOP)
* **Base de données** : MySQL (PDO)
* **Serveur** : Apache
* **Conteneurisation** : Docker / Docker Compose
* **Frontend** : HTML, CSS, JavaScript (AJAX)
* **Sécurité** : Sessions PHP, CSRF Token, password_hash
* **Gestion de projet** : Jira / Trello
* **Hébergement** : InfinityFree

---

## 👥 Rôles & Accès

| Rôle    | Accès                                     |
| ------- | ----------------------------------------- |
| Admin   | Gestion globale + statistiques            |
| Doctor  | Consultations, prescriptions, rendez-vous |
| Patient | Prise de rendez-vous, prescriptions       |

Chaque page protégée vérifie :

* Connexion active (`$_SESSION`)
* Rôle autorisé (RBAC)

---

## 🔐 Sécurité Implémentée

* Hashage des mots de passe (`password_hash`, `password_verify`)
* Protection XSS (échappement des outputs)
* Protection CSRF (token sur tous les formulaires)
* Requêtes préparées PDO (anti SQL Injection)
* Sessions sécurisées PHP

---

## 📂 Structure du Projet

```bash
unity-care-clinic/
│
├── app/
│   ├── Controllers/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Admin.php
│   │   ├── Doctor.php
│   │   ├── Patient.php
│   │   ├── Appointment.php
│   │   ├── Prescription.php
│   │   └── Medication.php
│   ├── Core/
│   │   ├── Database.php
│   │   ├── BaseModel.php
│   │   ├── Auth.php
│   │   ├── Validator.php
│   │   └── CSRF.php
│   └── Router/
│
├── public/
│   ├── index.php
│   ├── assets/
│   └── views/
│
├── config/
│   └── config.php
│
├── database/
│   └── unity_care.sql
│
├── docker/
│   ├── Dockerfile
│   └── docker-compose.yml
│
├── README.md
└── .env
```

---

## ⚙️ Installation en Local avec Docker

### 1️⃣ Prérequis

* Docker
* Docker Compose
* Git

---

### 2️⃣ Cloner le projet

```bash
git clone https://github.com/your-username/unity-care-clinic.git
cd unity-care-clinic
```

---

### 3️⃣ Lancer les conteneurs

```bash
docker-compose up -d --build
```

---

### 4️⃣ Accéder à l’application

* Application :
  👉 [http://localhost:80](http://localhost:80)
* Base de données (MySQL) :

  * Host : `db`
  * User : `root`
  * Password : `root`
  * Database : `UnityClinic_CLI`

---

### 5️⃣ Importer la base de données

```bash
docker exec -i unitycare_db mysql -uroot -proot UnityClinic_CLI < database/unity_care.sql
```

---

## 🌍 Déploiement sur InfinityFree

### 1️⃣ Préparer le projet

* Supprimer les fichiers Docker
* Mettre à jour `config/config.php` :

```php
define('DB_HOST', 'sqlXXX.infinityfree.com');
define('DB_NAME', 'your_db_name');
define('DB_USER', 'your_db_user');
define('DB_PASS', 'your_db_password');
```

---

### 2️⃣ Upload des fichiers

* Uploader tout le contenu dans `/htdocs`
* Importer `unity_care.sql` via **phpMyAdmin**

---

### 3️⃣ Configuration importante

* PHP version : **8.x**
* Sessions activées
* `display_errors = OFF` en production

---

## 🔑 Comptes de Test

| Rôle    | Email                                           | Mot de passe |
| ------- | ----------------------------------------------- | ------------ |
| Admin   | [admin@clinic.com](mailto:admin@clinic.com)     | admin123     |
| Doctor  | [doctor@clinic.com](mailto:doctor@clinic.com)   | doctor123    |
| Patient | [patient@clinic.com](mailto:patient@clinic.com) | patient123   |


---

## 📊 Statistiques Disponibles

* Rendez-vous par statut
* Rendez-vous par médecin
* Évolution mensuelle
* Médicaments les plus prescrits

---

## 📐 UML & Documentation

* Diagramme de classes UML
* Diagramme de cas d’utilisation
* ERD (Entity Relationship Diagram)
* Script SQL avec données de test

---

## 📅 Gestion du Projet

* Planification via **Jira**
* Sprints organisés par User Stories
* Suivi des tâches et bugs

---

## 🎯 Objectifs pédagogiques

* Architecture PHP OOP propre
* Sécurité Web
* Gestion des rôles (RBAC)
* Bonnes pratiques (DRY, SOLID)
* Maîtrise PDO & Sessions

---

## 👨‍💻 Auteur

**Ait Youss Oussama - YouCode - Youssoufia (Compus)**
Projet réalisé dans le cadre de l’évaluation Back-End PHP OOP


