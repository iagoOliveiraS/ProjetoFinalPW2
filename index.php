<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

ob_start();

$route = new Router(url(), ":");

$route->namespace("Source\App");

$route->group(null);

$route->get("/", "Web:home");
$route->get("/entrar","Web:login");
$route->get("/registrar","Web:register");
$route->get("/ops/{errcode}", "Web:error");

$route->group(null);

// Rotas amigáveis da área restrita
$route->group("/app");

$route->get("/", "App:home");
$route->get("/inicio","App:start");
$route->get("/perfil", "App:profile");
//$route->get("/carrinho", "App:cart");
$route->group(null);
// Fim do grupo app

// Rotas amigáveis da área restrita admin
$route->group("/admin");

$route->get("/", "Admin:home");
$route->get("/clientes", "Admin:clients");
$route->get("/personais", "Admin:personaisAdm");
$route->get("/exercicios", "Admin:exercises");
$route->get("/treinos", "Admin:trains");
$route->get("/cadastro", "Admin:forms");
$route->get("/TV","Admin:screenTV");
$route->group(null);

// Rotas amigáveis da área restrita admin
$route->group("/app");

$route->get("/", "App:home");
$route->get("/perfil", "App:profile");
$route->group(null);

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();