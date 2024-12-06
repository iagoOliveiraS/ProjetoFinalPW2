<?php

ob_start();

require  __DIR__ . "/../vendor/autoload.php";

// os headers abaixo são necessários para permitir o acesso a API
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header('Access-Control-Allow-Credentials: true'); // Permitir credenciais
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

use CoffeeCode\Router\Router;

$route = new Router(url(),":");

$route->namespace("Source\App\Api");

/* USERS */

$route->group("/users");

$route->get("/", "Users:listUsers");
$route->get("/user/{userName}", "Users:listUsersByName");
$route->post("/","Users:createUser");
$route->post("/login","Users:loginUser");
$route->post("/update","Users:updateUser");
$route->post("/photo","Users:updatePhoto");
$route->get("/me","Users:getUser");
$route->get("/photo","Users:getPhoto");
$route->post("/set-password","Users:setPassword");

$route->group("null");

/* FAQS */

$route->group("/faqs");

$route->get("/","Faqs:listFaqs");

$route->group("null");

/* EXERCISES */

$route->group("/exercises");

$route->get("/","Exercises:listAll");
$route->get("/exercise/{exerciseId}","Exercises:getById");
$route->delete("/exercise/{exerciseId}","Exercises:delete");
$route->post("/insert","Exercises:insert");
$route->post("/update/{exerciseId}","Exercises:update");
$route->get("/list-by-group/group/{muscleGroup}","Exercises:listByGroup");

$route->group("null");

/* Personais */

$route->group("/personais");

$route->get("/","Personais:listAll");
$route->get("/personal/{personalId}","Personais:getById");
$route->post("/insert","Personais:insert");
$route->delete("/personal/{personalId}","Personais:deletePersonal");
$route->post("/update/{IdUpdate}","Personais:update");
$route->get("/list-by-group/group/{muscleGroup}","Exercises:listByGroup");

$route->group("null");

/* Treinos */

$route->group("/workouts");

$route->get("/", "Workouts:listAll"); // Lista todos os treinos
$route->get("/user/{userId}", "Workouts:getByUserId"); // Lista treinos de um usuário específico
// $route->get("/workout/{workoutId}", "Workouts:getById"); // Detalhes de um treino específico
// $route->delete("/workout/{workoutId}", "Workouts:deleteWorkout"); // Deleta um treino específico
// $route->post("/insert", "Workouts:createWorkout"); // Cria um novo treino
// $route->post("/update/{workoutId}", "Workouts:updateWorkout"); // Atualiza um treino específico

$route->group("null");




$route->dispatch();


/** ERROR REDIRECT */
if ($route->error()) {
    header('Content-Type: application/json; charset=UTF-8');
    http_response_code(404);

    echo json_encode([
        "errors" => [
            "type " => "endpoint_not_found",
            "message" => "Não foi possível processar a requisição"
        ]
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

ob_end_flush();


// EXERCICIOS ROTAS PARA TESTAR:
// Lista todos os exercicios: GET http://localhost/ProjetoPW2/api/exercises/
// Lista um especifico: GET http://localhost/ProjetoPW2/api/exercises/exercise/1
// Lista os exercicios de um grupo expecifico GET http://localhost/ProjetoPW2/api/exercises/list-by-group/group/superior
// Deleta: DELETE http://localhost/ProjetoPW2/api/exercises/exercise/1
// Inserir: POST http://localhost/ProjetoPW2/api/exercises/insert
// Update: POST http://localhost/ProjetoPW2/api/exercises/update/3


// PERSONAL ROTAS PARA TESTAR:
// Lista personal especifico: GET http://localhost/ProjetoPW2/api/personais/personal/1
// Lista todos os personais: GET http://localhost/ProjetoPW2/api/personais/
// Deleta o personal especifico: DELETE http://localhost/ProjetoPW2/api/personais/personal/1
// insere um personal: POST http://localhost/ProjetoPW2/api/personais/insert
// Updade: PUT http://localhost/ProjetoPW2/api/personais/personal/{personalId}/name/{name}/specialty/{specialty}