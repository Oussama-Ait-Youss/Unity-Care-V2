<?php

spl_autoload_register(function ($class) {
    // 1. Project-specific namespace prefix
    $prefix = 'App\\';

    // 2. Base directory for the namespace prefix
    // Since this file is in app/core, we go up one level to get to 'app/'
    $base_dir = __DIR__ . '/../';

    // 3. Does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // 4. Get the relative class name
    $relative_class = substr($class, $len);

    // 5. Replace the namespace prefix with the base directory, replace namespace
    //    separators with directory separators, and append with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // 6. If the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});