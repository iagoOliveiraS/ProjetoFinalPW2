const formLogin = document.querySelector(".login-information");
formLogin.addEventListener("submit", (e) => {
    e.preventDefault();

    const email = document.querySelector('.email').value;
    const password = document.querySelector('.password').value;

    const userData = {
        email: email,
        password: password
    };

    fetch('http://localhost/ProjetoPW2/api/users/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json' // Informa que está enviando JSON
        },
        body: JSON.stringify(userData)
    }).then((response) => {
        response.json().then((data) => {
            if (data.type == "error") {
                showToast(data.message);
                return;
            }
            localStorage.setItem("userAuth", JSON.stringify(data.user));
            setTimeout(() => {
                window.location.href = "http://localhost/ProjetoPW2/app";
            }, 3000);
        })
    })
});