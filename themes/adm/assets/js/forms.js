import  {
    HttpPersonal
} from "../../../../assets/classes/HttpPersonal.js";

import  {
    HttpExercise
} from "../../../../assets/classes/HttpExercise.js";

const apiPersonal = new HttpPersonal()
const apiExercise = new HttpExercise()

const formExercicio = document.querySelector('.exercise-form')
const formPersonal = document.querySelector('.personal-form')
formExercicio.addEventListener('submit', (e) => {
    e.preventDefault(); // Evita o comportamento padrão do formulário (recarregar a página)

    // Coleta os dados do formulário
    const name = document.getElementById('exercise_name').value;
    const muscle_group = document.getElementById('muscle_group').value;

    console.log(name)
    
    const exerciseData = {
        name: name,
        muscle_group: muscle_group
    };

    try{
        apiExercise.createExercise(exerciseData)
        console.log('Exercício cadastrado com sucesso!')
        formExercicio.reset()
    } catch (error){
        console.error('Erro na requisição:', error);
    }


    // // Envia os dados usando fetch com método POST
    // fetch('http://localhost/ProjetoPW2/api/exercises/insert', {
    //     method: 'POST',
    //     headers: {
    //         'Content-Type': 'application/json' // Informa que está enviando JSON
    //     },
    //     body: JSON.stringify(exerciseData)
    // })
    // .then(response => response.json())
    // .then(exercise => {
    //     console.log(exercise)
    // })
})

 formPersonal.addEventListener('submit', (e) => {
    e.preventDefault(); // Evita o comportamento padrão do formulário (recarregar a página)

    // Coleta os dados do formulário
    const name = document.getElementById('personal_name').value;
    const specialty = document.getElementById('specialty').value;

    console.log(name)
    
    const personalData = {
        name: name,
        specialty: specialty
    };

    try {
        apiPersonal.createPersonal(personalData)
        console.log('Exercício cadastrado com sucesso!')
        formPersonal.reset()
    } catch (error) {
        console.error('Erro na requisição:', error);
    }

    // fetch('http://localhost/ProjetoPW2/api/personais/insert', {
    //     method: 'POST',
    //     headers: {
    //         'Content-Type': 'application/json' // Informa que está enviando JSON
    //     },
    //     body: JSON.stringify(personalData)
    // })
    // .then(response => response.json())
    // .then(personal => {
    //     console.log(personal)
    // })
 });


