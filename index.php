<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";

/**
 * BOOTSTRAP
 */

use CoffeeCode\Router\Router;
use Source\Core\Session;

$session = new Session();
$route = new Router(url(), ":");
$route->namespace("Source\App");

/*
 * LOGIN ROUTES
 */
$route->group(null);
$route->get("/", "LoginController:index");
$route->get("/entrar", "LoginController:index");
$route->post("/entrar", "LoginController:login");


/*
 * ADMIN ROUTES
 */
$route->group("/app");
$route->get("/", "AppController:home");
$route->get("/sair", "AppController:logout");




$route->get("/novo-cliente", "AppController:newCostumer");
$route->get("/lista-cliente", "AppController:listCostumer");
$route->get("/editar-cliente", "AppController:listCostumer");
$route->get("/buscar-cliente", "AppController:searchCostumer");
$route->get("/historico-cliente/{IDcode}", "AppController:historicalCostumer");

$route->post("/novo-cliente", "AppController:newCostumer");
$route->post("/edit-cliente", "AppController:newCostumer");
$route->post("/delete-cliente", "AppController:newCostumer");

$route->get("/mensalidade", "AppController:monthly");
$route->post("/mensalidade-payment", "AppController:monthly");

$route->get("/lista-presenca", "AppController:listPoint");
$route->get("/lista-book", "AppController:listBook");
$route->post("/lista-presenca/confirmar", "AppController:listPoint");
/**
 * USERS
 */ 
$route->group("/users");
$route->get("/profile", "UserController:profile");
$route->post("/profile", "UserController:profile");

$route->get("/index", "UserController:index");
$route->post("/create", "UserController:create");
$route->post("/delete", "UserController:delete");

/**
 * CONFIG
 */
$route->group("/config");
$route->get("/", "ConfigController:index");

$route->get("/modalidade", "ConfigController:modality");
$route->post("/modalidade-payment", "ConfigController:modality");

$route->get("/planos", "ConfigController:plans");
$route->post("/planos", "ConfigController:plans");
$route->post("/planos/update", "ConfigController:plans");
$route->post("/teste", "ConfigController:teste");
    
$route->get("/employee", "ConfigController:employee");
$route->post("/employee", "ConfigController:employee");


/*
 * ERROR ROUTES
 */
$route->group("/alerta");
$route->get("/{errcode}", "AppController:error");
/**
 * ROUTE
 */
$route->dispatch();

/**
 * ERROR REDIRECT
 */
if ($route->error()) {
    $route->redirect("/alerta/{$route->error()}");
}

ob_end_flush();