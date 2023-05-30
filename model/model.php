<?php

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=localhost;dbname=mydatabase", "username", "password");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }

    public function createUser($userData) {
        $query = $this->db->prepare('INSERT INTO users (name, email) VALUES (:name, :email)');
        $query->bindParam(':name', $userData['name']);
        $query->bindParam(':email', $userData['email']);
        return $query->execute();
    }

    public function updateUser($id, $userData) {
        $query = $this->db->prepare('UPDATE users SET name = :name, email = :email WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->bindParam(':name', $userData['name']);
        $query->bindParam(':email', $userData['email']);
        return $query->execute();
    }

    public function deleteUser($id) {
        $query = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function getUserById($id) {
        $query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllUsers() {
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
