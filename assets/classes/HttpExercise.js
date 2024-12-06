import HttpClientBase from './HttpClientBase.js';

// Exemplo de classe concreta implementando a base
export class HttpExercise extends HttpClientBase {
    constructor() {
        // URL base ajustada
        super('http://localhost/ProjetoPW2/api/exercises');
    }

    // Método para listar todos os exercícios
    async getAllExercises() {
        return this.get('/');
    }

    // Método para buscar exercício por ID
    async getExerciseById(exerciseId) {
        return this.get(`/exercise/${exerciseId}`);
    }

    // Método para buscar exercícios por grupo muscular
    async getExercisesByGroup(muscleGroup) {
        return this.get('/list-by-group',{muscleGroup});
    }

    // Método para criar um novo exercício
    async createExercise(exerciseData) {
        return this.post('/insert', exerciseData);
    }

    // Método para atualizar um exercício
    async updateExercise(exerciseData) {
        return this.post(`/exercise`, exerciseData);
    }

    // Método para deletar um exercício
    async deleteExercise(exerciseId) {
        return this.delete(`/exercise/${exerciseId}`);
    }
}
