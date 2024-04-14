<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/registerPage.css">
    <title>Cadastro</title>
</head>
<body>
<div class="container">
    <img src="../img/wardiere inc..png">
    <h1>Cadastrar Usuário</h1>
    <form id="formInsert">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name">
        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email">
        <label for="password">Senha:</label>
        <input type="text" id="password" name="password">
        <button type="submit">Cadastrar</button>
        <a href="login.php">Voltar</a>
    </form>
</div>
</body>
</html>