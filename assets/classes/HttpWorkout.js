import HttpClientBase from './HttpClientBase.js';

// Exemplo de classe concreta implementando a base
export class HttpWorkout extends HttpClientBase {
    constructor() {
        // URL base ajustada
        super('http://localhost/ProjetoPW2/api/workouts');
    }

    // Método para buscar exercício por ID
    async getWorkoutById(userId) {
        return this.get(`/user/${userId}`);
    }
}
