<?php
/**
 * Return use authentication status
 * 
 * @return boolean True if logged in, False if not
 */
function isLoggedIn() {
    return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
}
?>