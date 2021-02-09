<?php
/**
 * Article
 */
class Article {

/**
 * Get all articles
 * 
 * @param object $conn Database connection
 * 
 * @return array Associative array of all articles
 */
    public static function getAll($conn) {
        $sql = "SELECT *
        FROM article
        ORDER BY published_at;";

    $results = $conn->query($sql);

    return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByID($conn, $id, $columns = '*') {
        $sql = "SELECT $columns
        FROM article
        WHERE id = :id";

        $stmt = $conn->prepare( $sql );

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
}