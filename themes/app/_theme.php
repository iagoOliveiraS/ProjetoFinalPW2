<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
    <link rel="stylesheet" href="<?= url("themes/app/assets/css/theme.css"); ?>">
    <link rel="stylesheet" href="<?= url("themes/app/assets/css/mainClient.css"); ?>">
</head>
<body>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Side Menu</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
        <div class="perfil">
        <!-- <img src="../../img/perfil.jpg" alt="" srcset=""> -->
        <h2>Nome do Usuario</h2>
        </div>
        <h3>log out</h3>
    </header>
    <div class="dropdown">
        <button class="dropbtn">Mais</button>
        <div class="dropdown-content">
            <a href="#">perfil</a>
            <a href="#">ver meu treino</a>
            <a href="#">Personais</a>
            <a href="#">Exercicios</a>
        </div>
    </div>
    
    <main>
        <?php
           echo $this->section("content");
        ?>
    </main>

</body>