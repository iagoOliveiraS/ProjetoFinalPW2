const dialog = document.querySelector('dialog')

let personais = fetch(`http://localhost/ProjetoPW2/api/personais`).then((response) => {
    response.json()
        .then((personais) => {
            //console.log(personais);
            personais.forEach((personal) => {
                //console.log(p.id, p.name);
                const ul = document.querySelector(".trainer-list")
                const newLi = document.createElement("li");
                newLi.innerHTML = `Personal: ${personal.name} (Especialidade: ${personal.specialty}) - <button class="btnDelete" data-id="${personal.id}">Delete</button> / <button class="btnUpdate" data-id="${personal.id}">Alterar</button>`;
                ul.appendChild(newLi);
            });

            const btnDelete = document.querySelectorAll('.btnDelete');
            const btnUpdate = document.querySelectorAll('.btnUpdate');
            btnDelete.forEach((button) => {
                button.addEventListener('click', (e) => {
                    const IdDelete = e.target.getAttribute('data-id');
                    Delete(IdDelete, e); // Passa o Id e o evento
                });
            });

            btnUpdate.forEach((button) => {
                button.addEventListener('click', (e) => {
                    const IdUpdate = e.target.getAttribute('data-id');
                    Update(IdUpdate, e); // Passa o Id e o evento
                });
            });

});

function Delete(IdDelete, e) {
    fetch(`http://localhost/ProjetoPW2/api/personais/personal/${IdDelete}`, {
        method: "DELETE",
    })
    .then((response) => {
        e.target.parentElement.remove();
    })
}});

function Update(IdUpdate, e) {
    // Exibe o diálogo
    const modal = document.getElementById('modal');
    modal.showModal();

    // A partir do botão clicado, acessamos o elemento pai (li) que contém os dados do personal
    const personalElement = e.target.closest("li"); // Obtém o <li> pai do botão
    const personalText = personalElement.innerText; // Obtém o texto do <li>

    // Extrai o nome e a especialidade usando expressões regulares
    const nameMatch = personalText.match(/Personal:\s*(.*)\s*\(/);
    const specialtyMatch = personalText.match(/\(Especialidade:\s*(.*)\)/);

    // Verifica se os dados foram extraídos corretamente
    const personalName = nameMatch ? nameMatch[1].trim() : '';
    const personalSpecialty = specialtyMatch ? specialtyMatch[1].trim() : '';

    // Define os valores nos inputs
    document.querySelector("#personalId").value = IdUpdate; // Armazena o ID oculto
    document.querySelector("#name").value = personalName; // Preenche o nome
    document.querySelector("#specialty").value = personalSpecialty; // Preenche a especialidade

    // Lida com o envio do formulário
    document.getElementById("updateForm").onsubmit = function(event) {
        event.preventDefault(); // Previne o comportamento padrão de envio do formulário

        // Coleta os dados do formulário
        const updatedPersonalData = {
            personalId: document.querySelector("#personalId").value, // ID do personal
            name: document.querySelector("#name").value.trim(), // Usa trim para remover espaços
            specialty: document.querySelector("#specialty").value.trim() // Usa trim para remover espaços
        };

        // Debugging: verificar valores antes de enviar
        console.log("Dados a serem enviados:", updatedPersonalData);

        // Faz a chamada para atualizar os dados no servidor
        fetch(`http://localhost/ProjetoPW2/api/personais/update/${IdUpdate}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json' // Informa que está enviando JSON
            },
            body: JSON.stringify(updatedPersonalData) // Envia os dados atualizados
        })
        .then(response => response.json())
        .then(responseData => {
            if (responseData.type === 'success') {
                // Atualiza a lista de personais após a atualização
                personalElement.innerHTML = `Personal: ${updatedPersonalData.name} (Especialidade: ${updatedPersonalData.specialty}) - <button class="btnDelete" data-id="${updatedPersonalData.personalId}">Delete</button> / <button class="btnUpdate" data-id="${updatedPersonalData.personalId}">Alterar</button>`;

                // Limpa os inputs
                document.querySelector("#personalId").value = '';
                document.querySelector("#name").value = '';
                document.querySelector("#specialty").value = '';

                // Fecha o diálogo após a atualização
                modal.close();
            } else {
                alert(responseData.message); // Mostra mensagem de erro
                console.log(responseData.message)
            }
        })
    };
}
