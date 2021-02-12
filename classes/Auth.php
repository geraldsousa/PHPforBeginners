<?php

/**
 * Authentication
 * 
 * Login and out
 */
class Auth {

    /**
     * Return use authentication status
     * 
     * @return boolean True if logged in, False if not
     */
    public static function isLoggedIn() {
        return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
    }
    
    /**
     * Require user to be loggin in, stopping with unauthorizid message if not logged in
     * 
     * @return void
     */
    public static function requireLogin() {
        if (! static::isLoggedIn()) {
            die("Unauthorized!");
        }
    }

    /**
     * Login using the session
     * 
     * @return void
     */
    public static function login() {

        session_regenerate_id(true);

        $_SESSION['is_logged_in'] = true;
    }

    /**
     * Logout
     * 
     * @return void
     */
    public static function logout() {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {

            $params = session_get_cookie_params();
            setcookie(
                session_name(), 
                '', 
                time() - 42000,
                $params["path"], 
                $params["domain"],
                $params["secure"], 
                $params["httponly"]);

        }
        session_destroy();
    }
}