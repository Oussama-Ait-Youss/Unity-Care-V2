<?php
// 1. AJOUT : On inclut la classe Database pour pouvoir l'utiliser
require_once __DIR__ . '/../Config/Database.php';

abstract class BaseRepository
{
    protected PDO $pdo;
    protected string $table;

    // 2. CHANGEMENT : On retire "PDO $pdo" des parenthèses
    public function __construct()
    {
        // 3. CHANGEMENT : On récupère la connexion via le Singleton
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM {$this->table} WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query(
            "SELECT * FROM {$this->table}"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM {$this->table} WHERE id = :id"
        );
        return $stmt->execute(['id' => $id]);
    }
}