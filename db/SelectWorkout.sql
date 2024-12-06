SELECT 
                u.name AS Usuario,
                dw.day_of_week AS Dia_da_Semana,
                w.workout_type AS Tipo_Treino,
                e.name AS Exercicio,
                e.muscle_group AS Grupo_Muscular
            FROM 
                users u
            JOIN 
                days_workout dw ON u.id = dw.user_id
            JOIN 
                workouts w ON dw.workout_id = w.id
            JOIN 
                exercises_workout ew ON w.id = ew.workout_id
            JOIN 
                exercises e ON ew.exercise_id = e.id
            WHERE 
                u.id = 2
            ORDER BY 
                FIELD(dw.day_of_week, 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'),
                w.workout_type