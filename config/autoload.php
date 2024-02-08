<?php

/*Autoload system. 
Check if the class exists in the various folders (models, controllers, views, utils) and include it with require_once.
*/

spl_autoload_register(function($className) {
    if (file_exists('utils/' . $className . '.php')) {
        require_once 'utils/' . $className . '.php';
    }

    if (file_exists('models/' . $className . '.php')) {
        require_once 'models/' . $className . '.php';
    }

    if (file_exists('controllers/' . $className . '.php')) {
        require_once 'controllers/' . $className . '.php';
    }

    if (file_exists('views/' . $className . '.php')) {
        require_once 'views/' . $className . '.php';
    }
    
});