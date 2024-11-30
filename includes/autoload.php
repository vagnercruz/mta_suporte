<?php
spl_autoload_register(function ($class) {
    // Remove o namespace raiz (Src) para criar o caminho relativo
    $relativeClass = str_replace('Src\\', '', $class);

    // Substitui as barras invertidas por barras normais
    $file = __DIR__ . '/../src/' . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    } else {
        throw new Exception("Class $class not found in $file");
    }
});
