<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");
        $query = $db->prepare("SELECT * FROM gebruikers");
        $query->execute();
    } catch (PDOException $e) {
        die("Error!: " . $e->getMessage());
    }
?>