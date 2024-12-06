import {
    getBackendUrl,
    getBackendUrlApi,
    getFirstName,
    showToast
} from "./../../../_shared/functions.js";

import {
    userAuth
} from "./../../../_shared/globals.js";

fetch(getBackendUrlApi("users/me"), {
    method: "GET",
    headers: {
        token: userAuth.token
    }
}).then((response) => {
    response.json().then((data) => {
        const imgPhoto = document.querySelector("#photo")
        imgPhoto.setAttribute("src", getBackendUrl(data.user.photo));

        if (data.error) {
            setTimeout(() => {
                window.location.href = getBackendUrl();
            }, 3000);
        }

const formPhoto = document.querySelector("#form-photo");
formPhoto.addEventListener("submit", (e) => {
    e.preventDefault();
    fetch(getBackendUrlApi("users/photo"), {
        method: "POST",
        body: new FormData(formPhoto),
        headers: {
            token: userAuth.token
        }
    }).then((response) => {
       
        response.json().then((data) => {
            if(data.error) {
                console.log(data.error.message);
                return;
            }
            console.log("Foto atualizada com sucesso!");
           
            const imgPhoto = document.querySelector("#photo")
            imgPhoto.setAttribute("src", getBackendUrl(data.user.photo));
            userAuth.photo = data.user.photo;
            localStorage.setItem("userAuth", JSON.stringify(userAuth));
        });
    });
})
})});
