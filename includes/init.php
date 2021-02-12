<?php
/**
 * Initializations
 * 
 * Register an autoloader, start or resume sessions etc.
 */
spl_autoload_register(function($class) {
    require "classes/{$class}.php";
});

session_start();