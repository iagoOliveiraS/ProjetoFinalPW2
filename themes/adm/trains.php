<?php

echo $this->layout("_theme");

?>

<script type="module" src="<?= url("themes/adm/assets/js/workout.js"); ?>" async> </script>

<div class="main">
     <!-- Seção de Treinos -->
      <!-- Seção de Treinos -->
    <section id="search">
        <h3>Pesquisar Treino</h3>
        <form id="searchWorkout">
            <input type="text" id="searchInput" placeholder="Nome do usuário" oninput="searchUsers()" autocomplete="off">
            <button type="submit">Pesquisar</button>
        </form>

        <ul id="suggestionsList" style="display: none; list-style-type: none; padding-left: 0; margin-top: 10px;">
            <!-- Sugestões de usuários aparecerão aqui -->
        </ul>
    </section>
</div>