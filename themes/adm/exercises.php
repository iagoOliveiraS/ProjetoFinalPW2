<?php

echo $this->layout("_theme");

?>
<script type="module" src="<?= url("themes/adm/assets/js/exercises.js"); ?>" async> </script>

<div class="main">
<!-- Seção de Exercícios -->
<section id="schedule" class="content-section">
            <h3>Exercícios</h3>
            <ul class="exercise-list">
            </ul>
</section>

<dialog id="modal" class="modal">
    <h3>Atualizar Exercícios</h3>
    <form id="updateForm">
        <input type="hidden" id="exerciseId">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>
        <label for="muscle_group">Grupo Muscular:</label>
        <input type="text" id="muscle_group" name="muscle_group" required>
        <button type="submit" class="btn-update">Atualizar</button>
    </form>
</dialog>
</div>