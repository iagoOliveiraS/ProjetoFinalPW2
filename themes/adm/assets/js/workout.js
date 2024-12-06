import  {
    HttpWorkout
} from "../../../../assets/classes/HttpWorkout.js";

import  {
    HttpUser
} from "../../../../assets/classes/HttpUser.js";

const apiWorkout = new HttpWorkout();
const apiUser = new HttpUser();

// Função chamada quando o usuário digita no campo de pesquisa
async function searchUsers() {
    const searchInput = document.getElementById('searchInput');
    const suggestionsList = document.getElementById('suggestionsList');
    const query = searchInput.value.trim();

    // Verifica se o usuário digitou pelo menos 3 caracteres
    if (query.length < 3) {
        suggestionsList.style.display = 'none'; // Oculta a lista se menos de 3 caracteres
        return;
    }

    try {
        // Chama a API para obter os usuários com o nome que contém o valor digitado
        const response = await getUsersByName(query);

        // Verifica se há resultados
        if (response.length > 0) {
            // Limpa a lista de sugestões
            suggestionsList.innerHTML = '';

            // Adiciona cada sugestão de usuário à lista
            response.forEach(user => {
                const li = document.createElement('li');
                li.textContent = user.name; // Altere conforme a estrutura do seu retorno de dados
                li.onclick = () => selectUser(user); // Quando o usuário clicar, a função selectUser será chamada
                suggestionsList.appendChild(li);
            });

            // Exibe a lista de sugestões
            suggestionsList.style.display = 'block';
        } else {
            suggestionsList.style.display = 'none'; // Se não houver resultados, oculta a lista
        }
    } catch (error) {
        console.error('Erro ao buscar usuários:', error);
    }
}

// Função para fazer a requisição para obter os usuários
async function getUsersByName(query) {
    // Substitua a URL abaixo pela sua URL de API
    const response = await fetch(`/api/users?name=${query}`);
    const data = await response.json();
    return data; // Retorna a lista de usuários encontrada na resposta
}

// Função chamada quando o usuário clica em uma sugestão
function selectUser(user) {
    // Preenche o campo de pesquisa com o nome do usuário selecionado
    document.getElementById('searchInput').value = user.name;

    // Aqui você pode fazer outras ações com o usuário selecionado, como mostrar o treino ou outras informações
    console.log('Usuário selecionado:', user);
    
    // Oculta a lista de sugestões
    document.getElementById('suggestionsList').style.display = 'none';
}
