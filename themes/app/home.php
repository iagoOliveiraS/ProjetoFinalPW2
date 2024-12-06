<?php
    echo $this->layout("_theme");
?>

<script type="module" src="<?= url("themes/app/assets/js/home.js"); ?>" async> </script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?= url("themes/app/assets/css/home.css"); ?>">
</head>
<body>
<div class="main">
<dialog open>
<div class="container-profile">
        <div class="photo">
                <img id="photo" alt="user-photo">
                <form id="form-photo">
                <input type="file" id="photo" name="photo">
                <input type="submit" value="Atualizar Foto"></du>
                </form>
            </div>
            <div class="info">
                <h2>Informações de usuário</h2>
                <div class="container-info"> 
            </div>

        </div>
</dialog>
</div>
</div>
</body>
</html>
