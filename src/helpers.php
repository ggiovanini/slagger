<?php
if (!function_exists('dd')) {
    function dd(...$errors)
    {
        foreach ($errors AS $error) {
            dump($error);
        }
        die();
    }
}

if (!function_exists('dump')) {
    function dump(...$errors)
    {
        foreach ($errors AS $error) {
            echo "<pre>\n";
            var_dump($error);
            echo "</pre>";
        }
    }
}
