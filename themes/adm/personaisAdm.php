<?php

echo $this->layout("_theme");

?>
<script type="module" src="<?= url("themes/adm/assets/js/personaisAdm.js"); ?>" async> </script>

<div class="main">
<section id="trainers" class="content-section">
            <h3>Personais</h3>
            <ul class="trainer-list">
            </ul>
        </section>

        <dialog id="modal" class="modal">
    <h3>Atualizar Personal</h3>
    <form id="updateForm">
        <input type="hidden" id="personalId">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>
        <label for="specialty">Especialidade:</label>
        <input type="text" id="specialty" name="specialty" required>
        <button type="submit" class="btn-update">Atualizar</button>
    </form>
</dialog>

</div>
</div>


