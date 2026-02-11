<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return <<<HTML
<header>
<h1>Тестовое задание</h1>
</header>
HTML;
});
