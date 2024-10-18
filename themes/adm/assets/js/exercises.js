import {
    showDataForm,
     getBackendUrlApi, getBackendUrl, showToast //showDataSelect
} from "./../../../_shared/functions.js";

//modalService.style.display = "flex";
let exercises = fetch(`http://localhost/ProjetoPW2/api/exercises`).then((response) => {
    response.json()
        .then((exercises) => {
            //console.log(personais);
            exercises.forEach((exercise) => {
                //console.log(p.id, p.name);
                const ul = document.querySelector(".exercise-list")
                const newLi = document.createElement("li");
                newLi.innerHTML = ` 
                Exercicio: ${exercise.name} 
                (Grupo Muscular: ${exercise.muscle_group}) 
                - <button class="btnDelete" data-id="${exercise.id}">Delete</button>
                -<button class="btnUpdate" data-id="${exercise.id}">Alterar</button>`;
                ul.appendChild(newLi);
                
            
            });
            const btnDelete = document.querySelectorAll('.btnDelete');
            btnDelete.forEach((button) => {
                button.addEventListener('click', (e) => {
                    const IdDelete = e.target.getAttribute('data-id');
                    Delete(IdDelete, e); // Passa o Id e o evento
                });
            });
            const btnUpdate = document.querySelectorAll('.btnUpdate');
            btnUpdate.forEach((button) => {
               button.addEventListener('click', (e) => {
                const IdUpdate = e.target.getAttribute('data-id');
                UpdateExercise(IdUpdate, e); // Passa o Id e o evento
                });
               })
        
    });

     function Delete(IdDelete, e) {
        fetch(`http://localhost/ProjetoPW2/api/exercises/exercise/${IdDelete}`, {
            method: "DELETE",
        })
        .then((response) => {
            e.target.parentElement.remove();
        })
    }

    function UpdateExercise(IdUpdate, e) {
        // Exibe o diálogo
        const modal = document.getElementById('modal');
        modal.showModal();
    
        // A partir do botão clicado, acessamos o elemento pai (li) que contém os dados do exercício
        const exerciseElement = e.target.closest("li"); // Obtém o <li> pai do botão
        const exerciseText = exerciseElement.innerText; // Obtém o texto do <li>
    
        // Extrai o nome e o grupo muscular usando expressões regulares
        const nameMatch = exerciseText.match(/Nome:\s*(.*)$/); // Corrigido: exerciseText
        const muscleMatch = exerciseText.match(/\(Grupo Muscular:\s*(.*)\)/); // Corrigido: exerciseText
    
        // Verifica se os dados foram extraídos corretamente
        const exerciseName = nameMatch ? nameMatch[1].trim() : '';
        const exerciseMuscle = muscleMatch ? muscleMatch[1].trim() : '';
    
        // Define os valores nos inputs
        document.querySelector("#exerciseId").value = IdUpdate; // Armazena o ID oculto
        document.querySelector("#name").value = exerciseName; // Preenche o nome
        document.querySelector("#muscle_group").value = exerciseMuscle; // Preenche o grupo muscular
    
        // Lida com o envio do formulário
        document.getElementById("updateForm").onsubmit = function(event) {
            event.preventDefault(); // Previne o comportamento padrão de envio do formulário
    
            // Coleta os dados do formulário
            const updatedExerciseData = {
                exerciseId: document.querySelector("#exerciseId").value, // Corrigido: exerciseId
                name: document.querySelector("#name").value.trim(), // Usa trim para remover espaços
                muscle_group: document.querySelector("#muscle_group").value.trim() // Usa trim para remover espaços
            };
    
            // Debugging: verificar valores antes de enviar
            console.log("Dados a serem enviados:", updatedExerciseData);
    
            // Faz a chamada para atualizar os dados no servidor
            fetch(`http://localhost/ProjetoPW2/api/exercises/update/${IdUpdate}`, { // Corrigido para exercicios
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json' // Informa que está enviando JSON
                },
                body: JSON.stringify(updatedExerciseData) // Corrigido: updatedExerciseData
            })
            .then(response => response.json())
            .then(responseData => {
                if (responseData.type === 'success') {
                    // Atualiza a lista de exercícios após a atualização
                    exerciseElement.innerHTML = `Nome: ${updatedExerciseData.name} (Grupo Muscular: ${updatedExerciseData.muscle_group}) - <button class="btnDelete" data-id="${updatedExerciseData.exerciseId}">Delete</button> / <button class="btnUpdate" data-id="${updatedExerciseData.exerciseId}">Alterar</button>`;
    
                    // Limpa os inputs
                    document.querySelector("#exerciseId").value = '';
                    document.querySelector("#name").value = '';
                    document.querySelector("#muscle_group").value = '';
    
                    // Fecha o diálogo após a atualização
                    modal.close();
                } else {
                    alert(responseData.message); // Mostra mensagem de erro
                    console.log(responseData.message);
                }
            })
        };
    }
    
     });
