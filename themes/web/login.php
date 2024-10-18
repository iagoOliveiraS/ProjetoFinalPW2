<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu login</title>
    <link rel="stylesheet" href="themes/web/assets/css/login.css">
    <script type="text/javascript" src="<?= url("themes/web/assets/js/login.js"); ?>" async> </script>
</head>
<body>
    <div class="container">
        <img src="img/logo.png">
        <h1>Faça seu login</h1>
        <form class="login-information">
        <input type="email" placeholder="E-mail" class="email">
        <input type="password" placeholder="Password" class="password">
        <button type="submit">Entrar</button>
        </form>
        <a href="<?= url("/"); ?>"><h2>Voltar ao inicio</h2></a>
    </div>
</body>
</html>