import HttpClientBase from './HttpClientBase.js';

// Exemplo de classe concreta implementando a base
export class HttpPersonal extends HttpClientBase {
    constructor() {
        // URL base ajustada
        super('http://localhost/ProjetoPW2/api/personais');
    }

    // Método para listar todos os personal trainers
    async getAllPersonals() {
        return this.get('/');
    }

    // Método para buscar personal trainer por ID
    async getPersonalById(personalId) {
        return this.get(`/personal/${personalId}`);
    }

    // Método para criar um novo personal trainer
    async createPersonal(personalData) {
        return this.post('/insert', personalData);
    }

    // Método para atualizar um personal trainer
    async updatePersonal(IdUpdate) {
        return this.post(`/update/${IdUpdate}`);
    }

    // Método para deletar um personal trainer
    async deletePersonal(personalId) {
        return this.delete(`/personal/${personalId}`);
    }
}
