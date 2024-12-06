import HttpClientBase from './HttpClientBase.js';

// Exemplo de classe concreta implementando a base
export class HttpUser extends HttpClientBase {
    constructor() {
        // URL base ajustada
        super('http://localhost/ProjetoPW2/api/users');
    }

    // Método para listar todos os personal trainers
    async getAllUsers() {
        return this.get('/');
    }

    async getUsersByName(userName) {
        return this.get(`/${userName}`);
    }
}
