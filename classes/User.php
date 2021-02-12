<?php 

/**
 *  User Class
 * 
 *  A person or entity that can login to the site
 */
class User {

    /**
     * Unigue Identifier
     * @var int
     */
    public $id;
    /**
     * Username
     * @var string
     */
    public $username;
    /**
     * password 
     * @var string
     */
    public $password;

    /**
     * Authenticate a user by username and password
     * 
     * @param object $conn Connection to the database
     * @param string $username Username
     * @param string $password Password
     * 
     * @return boolean True if credentials are correct, NULL otherwise
     */
    public static function authenticate($conn, $username, $password) {
        $sql = "SELECT * 
                FROM user
                WHERE username = :username";
        
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

        $stmt->execute();

        if ($user = $stmt->fetch()) {
                return password_verify($password, $user->password);
        }
        
    }
}