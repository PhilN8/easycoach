<?php

spl_autoload_register('AutoLoader');

function AutoLoader($className)
{
    $fullPath = __DIR__ . "\\backend\\" .  $className . ".php";

    // echo $fullPath . "<br>";
    if (file_exists($fullPath))
        require $fullPath;
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}
