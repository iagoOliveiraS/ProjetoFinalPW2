create database db_gym;
use db_gym;
--
-- Table structure for table `admin`
--
DROP TABLE IF EXISTS admin;
CREATE TABLE admin (
  id int NOT NULL,
  PRIMARY KEY (id)
);

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS types;
CREATE TABLE types (
  id int NOT NULL AUTO_INCREMENT,
  description varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS questions;
CREATE TABLE questions (
  id int NOT NULL AUTO_INCREMENT,
  type_id int NOT NULL,
  question varchar(255) NOT NULL,
  answer text NOT NULL,
  PRIMARY KEY (`id`),
  KEY fk_questions_types_idx (type_id),
  CONSTRAINT fk_questions_types FOREIGN KEY (type_id) REFERENCES types (id)
);
--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  photo varchar(255),
  PRIMARY KEY (`id`)
);

-- Criação da tabela de personal trainers
CREATE TABLE personal_trainers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    specialty VARCHAR(100)
);

-- Criação da tabela de planos
CREATE TABLE plans (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL
);

-- Criação da tabela de exercícios
CREATE TABLE exercises (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    muscle_group VARCHAR(50) NOT NULL
);
-- Criação da tabela de workouts
CREATE TABLE workouts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    workout_type ENUM('A', 'B') NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Criação da tabela de exercises_workout
CREATE TABLE exercises_workout (
    id INT PRIMARY KEY AUTO_INCREMENT,
    workout_id INT,
    exercise_id INT,
    FOREIGN KEY (workout_id) REFERENCES workouts(id),
    FOREIGN KEY (exercise_id) REFERENCES exercises(id)
);

-- Criação da tabela de days_workout
CREATE TABLE days_workout (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    day_of_week ENUM('Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado') NOT NULL,
    workout_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (workout_id) REFERENCES workouts(id)
);
