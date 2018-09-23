<?php
    session_start();

    // Load normal Libraries:
    $GLOBALS['extensions'] = array();

    // Auto load all Extensions and Classic Library essentials.
    spl_autoload_register(function($class) 
    {
        if (file_exists('lib/' . $class . '.php'))
            require_once "lib/" . $class . ".php";
        else
        {
            foreach ($GLOBALS['extensions'] as $extension)
                if (file_exists('lib/extensions/' . (isset($extension) ? $extension . '/' : '') . $class . '.php'))
                    require_once 'lib/extensions/' . (isset($extension) ? $extension . '/' : '') . $class . '.php';
        }

    });
?>