use db_gym;

-- Inserção na tabela `users`
INSERT INTO users (name, email, password, photo) VALUES 
('João Silva', 'joao@gmail.com', 'senha123', NULL),
('Maria Oliveira', 'maria@gmail.com', 'senha456', NULL),
('Carlos Santos', 'carlos@gmail.com', 'senha789', NULL);

-- Inserção na tabela `personal_trainers`
INSERT INTO personal_trainers (name, specialty) VALUES 
('Fernanda Costa', 'Musculação'),
('Ricardo Lima', 'CrossFit'),
('Ana Paula', 'Yoga'),
('Gabriel Souza', 'Cardio'),
('Mariana Alves', 'Pilates');

-- Inserção na tabela `plans`
INSERT INTO plans (name, description, price) VALUES 
('Plano Mensal', 'Acesso ilimitado durante 30 dias', 100.00),
('Plano Anual', 'Acesso ilimitado durante 365 dias', 1000.00);

-- Inserção na tabela `exercises`
INSERT INTO exercises (name, muscle_group) VALUES 
('Supino Reto', 'Peito'),
('Rosca Direta', 'Bíceps'),
('Desenvolvimento Militar', 'Ombros'),
('Flexão de Braço', 'Peito'),
('Prancha Abdominal', 'Core'),
('Agachamento', 'Pernas'),
('Levantamento Terra', 'Costas'),
('Afundo', 'Pernas'),
('Cadeira Extensora', 'Pernas'),
('Leg Press', 'Pernas');

-- Inserção na tabela `workouts`
-- Treino A: Superior, Treino B: Inferior
INSERT INTO workouts (user_id, workout_type) VALUES 
(1, 'A'), (1, 'B'),
(2, 'A'), (2, 'B'),
(3, 'A'), (3, 'B');

-- Inserção na tabela `exercises_workout`
-- Treino A: Superior
INSERT INTO exercises_workout (workout_id, exercise_id) VALUES 
(1, 1), (1, 2), (1, 3), (1, 4), (1, 5), -- João Silva
(3, 1), (3, 2), (3, 3), (3, 4), (3, 5), -- Maria Oliveira
(5, 1), (5, 2), (5, 3), (5, 4), (5, 5); -- Carlos Santos

-- Treino B: Inferior
INSERT INTO exercises_workout (workout_id, exercise_id) VALUES 
(2, 6), (2, 7), (2, 8), (2, 9), (2, 10), -- João Silva
(4, 6), (4, 7), (4, 8), (4, 9), (4, 10), -- Maria Oliveira
(6, 6), (6, 7), (6, 8), (6, 9), (6, 10); -- Carlos Santos

-- Inserção na tabela `days_workout`
-- Cada usuário treina todos os dias alternando entre A e B
INSERT INTO days_workout (user_id, day_of_week, workout_id) VALUES 
(1, 'Segunda-feira', 1), (1, 'Terça-feira', 2),
(1, 'Quarta-feira', 1), (1, 'Quinta-feira', 2),
(1, 'Sexta-feira', 1), (1, 'Sábado', 2),

(2, 'Segunda-feira', 3), (2, 'Terça-feira', 4),
(2, 'Quarta-feira', 3), (2, 'Quinta-feira', 4),
(2, 'Sexta-feira', 3), (2, 'Sábado', 4),

(3, 'Segunda-feira', 5), (3, 'Terça-feira', 6),
(3, 'Quarta-feira', 5), (3, 'Quinta-feira', 6),
(3, 'Sexta-feira', 5), (3, 'Sábado', 6);
