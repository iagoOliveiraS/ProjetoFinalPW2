<?php

echo $this->layout("_theme");

?>

<script type="module" src="<?= url("themes/adm/assets/js/forms.js"); ?>" async> </script>

<div class="main">
    <!-- Seção de Cadastro (Exercícios e Personais) -->
    <section id="reports" class="content-section">
            <h3>Cadastro de Exercícios e Personais</h3>
            
            <!-- Formulário de Cadastro de Exercício -->
            <div class="form-container">
                <h4>Cadastrar Exercício</h4>
                <form action="" class="exercise-form">
                    <label for="exercise_name">Nome do Exercício</label>
                    <input type="text" id="exercise_name" name="exercise_name" placeholder="Ex.: Supino Reto" required>

                    <label for="muscle_group">Grupo Muscular</label>
                    <input type="text" id="muscle_group" name="muscle_group" placeholder="Ex.: Peito" required>

                    <button type="submit">Cadastrar Exercício</button>
                </form>
            </div>

            <!-- Formulário de Cadastro de Personal -->
            <div class="form-container">
                <h4>Cadastrar Personal</h4>
                <form class="personal-form">
                    <label for="personal_name">Nome do Personal</label>
                    <input type="text" id="personal_name" name="personal_name" placeholder="Ex.: João Silva" required>

                    <label for="specialty">Especialidade</label>
                    <input type="text" id="specialty" name="specialty" placeholder="Ex.: Musculação" required>

                    <button type="submit">Cadastrar Personal</button>
                </form>
            </div>
        </section>
</div>