const formUser = document.querySelector('#formInsert')
formUser.addEventListener('submit', (e) => {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    console.log(name)
    
    const userData = {
        name: name,
        email: email,
        password: password,
    };


    // Envia os dados usando fetch com método POST
    fetch('http://localhost/ProjetoPW2/api/users', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json' // Informa que está enviando JSON
        },
        body: JSON.stringify(userData)
    })
    .then(response => response.json())
    .then(user => {
        console.log(user)
    })

})
