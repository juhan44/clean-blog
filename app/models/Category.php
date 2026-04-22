<?php
    class Category {
        private PDO $db;

     public function __construct(PDO $db) {
            $this->db = $db;
        }

    public function getAll(): array {
    $sql = "SELECT c.*, COUNT(p.id) as post_count 
            FROM categories c 
            LEFT JOIN posts p ON c.id = p.category_id 
            GROUP BY c.id 
            ORDER BY c.name ASC";
    
    $stmt = $this->db->query($sql);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
    public function delete(int $id): self {
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $this; // Dôležité pre reťazenie
    }
    public function create(array $data): bool {
            $sql = "INSERT INTO categories (name, slug, description) 
                    VALUES (:name, :slug, :description)";
        
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                'name'        => $data['name'],
                'slug'        => $data['slug'],
                'description' => $data['description']
            ]);
        }
}
