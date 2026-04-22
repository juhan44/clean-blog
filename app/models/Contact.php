<?php
declare(strict_types=1);

class Contact
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function saveMessage(array $data): bool
    {
        $sql = "INSERT INTO contacts (name, email, phone, message) VALUES (:name, :email, :phone, :message)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }
}