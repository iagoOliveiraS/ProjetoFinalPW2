<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo da Academia</title>
    <link rel="stylesheet" href="<?= url("themes/adm/assets/css/theme.css");?>">
    <script type="module" src="<?= url("themes/adm/assets/js/theme.js"); ?>" async> </script>
    <script type="module" src="<?= url("themes/_shared/functions.js"); ?>" async> </script>
    <script type="module" src="<?= url("themes/_shared/globals.js"); ?>" async> </script>
</head>

<body>
<div class="sidenav">
        <div class="logo">
            <h1>AcademiaAdmin</h1>
        </div>
        <a href="<?= url("admin/clientes");?>" class="btnClientes"> Clientes</a>
        <a href="<?= url("admin/treinos");?>" class="btnTreinos"> Treinos</a>
        <a href="<?= url("admin/personais");?>" class="btnPersonais"> Personais</a>
        <a href="<?= url("admin/exercicios");?>" class="btnexercicios"> Exercícios</a>
        <a href="<?= url("admin/cadastro");?>" class="btnCadastro"> Cadastro</a>
        <a href="<?= url("admin/TV");?>" class="btnMostrar"> Mostrar TV</a>
        <a href="<?= url("admin/");?>" class="btnInicio"> Inicio</a>
    </div>
</div>
    <main>
        <?php
           echo $this->section("content");
        ?>
    </main>

