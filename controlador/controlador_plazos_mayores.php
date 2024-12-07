<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Actividades</title>
    
                    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
        }
    </style>
    <style>
    button {
        background-color: #007BFF; /* Color azul */
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 10px;
        cursor: pointer;
        border-radius: 5px; /* Bordes redondeados */
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3; /* Más oscuro al pasar el cursor */
    }

    button:active {
        background-color: #004080; /* Más oscuro al hacer clic */
        transform: scale(0.98); /* Efecto de "presión" */
    }
</style>
<style>
        .image-container {
            display: flex;
            justify-content: space-between; /* Coloca las imágenes en extremos opuestos */
            align-items: center; /* Centra verticalmente las imágenes */
            margin: 20px; /* Añade espacio alrededor del contenedor */
            position: relative; /* Permite mover los elementos dentro del contenedor */
            top: -40px; /* Ajusta la posición hacia arriba */
        }

        .image-container img {
            max-width: 80px; /* Ajusta el tamaño máximo de las imágenes */
            height: auto; /* Mantén la proporción de las imágenes */
        }
    </style>

</head>
<body>
    <div class="image-container">
        <img src="../public/inicio/img/upea.jpg" alt="UPEA">
        <img src="../public/inicio/img/sistemas.jpg" alt="Sistemas">      
    </div>

    <h1></h1>
    <table>
        <thead >
            <tr>
                <th>    
                    <label for="startDate">Publicacion del DBC en el SICOES y la convocatoria en la Mesa de partes:</label>
                    <input type="date" id="startDate" required>

                    <button onclick="generateTable()">Generar Tabla</button>
                    

                </th>
            </tr>
        </thead>
    </table>



    <table id="activityTable">
        <thead>
            <tr>
                <th>Actividad</th>
                <th>Fecha Final</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se llenará la tabla dinámicamente -->
        </tbody>
    </table>

    <script>
        // Feriados internos
        const holidays = [
            new Date("2023-01-01"), // Ejemplo: 1 de enero año nuevo
            new Date("2023-01-02"),  // Ejemplo: 2 de enero Fereado de año nuevo
            new Date("2023-01-22"),  //22 de enero dia del Estado Plurinacional
            new Date("2023-01-23"), //23 de enero Feriado de dia del Estado Plurinacional
            new Date("2023-02-20"), //20 de febrero carnaval
            new Date("2023-02-21"), // 21 de febrero carnaval
            new Date("2023-04-07"), //7 de abril Viernes Santo
            new Date("2023-05-01"), // 1 de mayo Dia del Trabajo
            new Date("2023-06-08"), // 8 de Junio Corpus Christi
            new Date("2023-06-21"), // 21 de junio Año nuevo Aymara
            new Date("2023-08-06"), // 6 de Agosto dia de la independencia 
            new Date("2023-08-07"), // 7 de Agosto Feriado de Dia de la Independencia 
            new Date("2023-11-02"), // 2 de noviembre Dia de Todos los Difuntos 
            new Date("2023-12-25"), // 25 de deciembre Navidad

            new Date("2024-01-01"), // Ejemplo: 1 de enero año nuevo
            new Date("2024-01-22"), //22 de enero dia del Estado Plurinacional
            new Date("2024-02-12"), //12 de febrero carnaval
            new Date("2024-02-13"), // 13 de febrero carnaval
            new Date("2024-03-29"), //29 de Marzo Viernes Santo
            new Date("2024-05-01"), // 1 de mayo Dia del Trabajo
            new Date("2024-05-30"), // 30 de Mayo Corpus Christi
            new Date("2024-06-21"), // 21 de junio Año nuevo Aymara
            new Date("2024-08-06"), // 6 de Agosto dia de la independencia 
            new Date("2024-11-02"), // 2 de noviembre Dia de Todos los Difuntos 
            new Date("2024-12-25"), // 25 de deciembre Navidad

            new Date("2025-01-01"),// Ejemplo: 1 de enero año nuevo
            new Date("2025-01-22"), //22 de enero dia del Estado Plurinacional
            new Date("2025-03-03"), //03 de Marzo carnaval
            new Date("2025-03-04"), // 04 de Marzo carnaval
            new Date("2025-04-18"), //18 de abril Viernes Santo
            new Date("2025-05-01"), // 1 de mayo Dia del Trabajo
            new Date("2025-06-19"), // 19 de Junio Corpus Christi
            new Date("2025-06-21"), // 21 de junio Año nuevo Aymara
            new Date("2025-08-06"), // 6 de Agosto dia de la independencia 
            new Date("2025-11-02"), // 2 de noviembre Dia de Todos los Difuntos 
            new Date("2025-11-03"), // 3 de vacaciones de Dia de Todos los Difuntos 
            new Date("2025-12-25"),  // 25 de deciembre Navidad

            new Date("2026-01-01"), // Ejemplo: 1 de enero año nuevo
            new Date("2026-01-22"),  //22 de enero dia del Estado Plurinacional
            new Date("2026-02-16"), //16 de febrero carnaval
            new Date("2026-02-17"), //17 de febrero carnaval
            new Date("2026-04-03"), //3 de abril Viernes Santo
            new Date("2026-05-01"), // 1 de mayo Dia del Trabajo
            new Date("2026-06-04"), // 4 de Junio Corpus Christi
            new Date("2026-06-21"), // 21 de junio Año nuevo Aymara
            new Date("2026-08-06"), // 6 de Agosto dia de la independencia 
            new Date("2026-11-02"), // 2 de noviembre Dia de Todos los Difuntos 
            new Date("2026-12-25"), // 25 de deciembre Navidad

            new Date("2027-01-01"), // Ejemplo: 1 de enero año nuevo
            new Date("2027-01-22"),  //22 de enero dia del Estado Plurinacional
            new Date("2027-02-08"), //08 de febrero carnaval
            new Date("2027-02-09"), //09 de febrero carnaval
            new Date("2027-03-26"), //26 de abril Viernes Santo
            new Date("2027-05-01"), // 1 de mayo Dia del Trabajo
            new Date("2027-05-27"), // 27 de mayo Corpus Christi
            new Date("2027-06-21"), // 21 de junio Año nuevo Aymara
            new Date("2027-08-06"), // 6 de Agosto dia de la independencia 
            new Date("2027-11-02"), // 2 de noviembre Dia de Todos los Difuntos 
            new Date("2027-12-25"), // 25 de deciembre Navidad

            new Date("2028-01-01"), // Ejemplo: 1 de enero año nuevo
            new Date("2028-01-22"),  //22 de enero dia del Estado Plurinacional
            new Date("2028-02-28"), //28 de febrero carnaval
            new Date("2028-04-13"), //13 de marzo Viernes Santo
            new Date("2028-05-01"), // 1 de mayo Dia del Trabajo
            new Date("2028-06-15"), // 15 de Junio Corpus Christi
            new Date("2028-06-21"), // 21 de junio Año nuevo Aymara
            new Date("2028-08-06"), // 6 de Agosto dia de la independencia 
            new Date("2028-11-02"), // 2 de noviembre Dia de Todos los Difuntos 
            new Date("2028-12-25"), // 25 de deciembre Navidad

            new Date("2029-01-01"), // Ejemplo: 1 de enero año nuevo
            new Date("2029-01-22"),  //22 de enero dia del Estado Plurinacional
            new Date("2029-02-12"), //12 de febrero carnaval
            new Date("2029-03-29"), //29 de marzo Viernes Santo
            new Date("2029-05-01"), // 1 de mayo Dia del Trabajo
            new Date("2029-05-31"), // 8 de Junio Corpus Christi
            new Date("2029-06-21"), // 21 de junio Año nuevo Aymara
            new Date("2029-08-06"), // 6 de Agosto dia de la independencia 
            new Date("2029-11-02"), // 2 de noviembre Dia de Todos los Difuntos 
            new Date("2029-12-25"), // 25 de deciembre Navidad

            new Date("2030-01-01"), // Ejemplo: 1 de enero año nuevo
            new Date("2030-01-22"),  //22 de enero dia del Estado Plurinacional
            new Date("2030-02-28"), //28 de febrero carnaval
            new Date("2030-03-01"), // 01 de marzo carnaval
            new Date("2030-03-29"), //29 de marzo Viernes Santo
            new Date("2030-05-01"), // 1 de mayo Dia del Trabajo
            new Date("2030-06-20"), // 20 de Junio Corpus Christi
            new Date("2030-06-21"), // 21 de junio Año nuevo Aymara
            new Date("2030-08-06"), // 6 de Agosto dia de la independencia 
            new Date("2030-11-02"), // 2 de noviembre Dia de Todos los Difuntos 
            new Date("2030-12-25"), // 25 de deciembre Navidad
        ];

        // Lista de actividades y sus plazos en días laborables
        const activities = [
            { name: "Apertura de Propuestas (Fecha limite)", workDays: 9 },
            { name: "informe de Evalucion y recomendacion de Adjudicacion o Declaratoria Desierta (Fecha limite)", workDays: 3 },
            { name: "Adjudicacion o Declaratoria Desierta (fecha limite)", workDays: 1 },
            { name: "Notificacion de la adjudicacion o declaratoria desierta (fecha limite) ", workDays: 1 },
            { name: "Presentacion de documentos para suscripcion de contrato (fecha limite) ", workDays: 8 },
            { name: "suscripcion de contrato (fecha limite) ", workDays: 3 }
        ];

        function calculateEndDate(startDate, workDays, holidays) {
            let currentDate = new Date(startDate);
            let daysAdded = 0;

            while (daysAdded < workDays) {
                currentDate.setDate(currentDate.getDate() + 1);

                // Verificar si el día es fin de semana
                const dayOfWeek = currentDate.getDay();
                const isWeekend = (dayOfWeek === 0 || dayOfWeek === 6);

                // Verificar si el día es festivo
                const isHoliday = holidays.some(holiday => holiday.toISOString().split('T')[0] === currentDate.toISOString().split('T')[0]);

                // Si no es fin de semana ni festivo, contar el día
                if (!isWeekend && !isHoliday) {
                    daysAdded++;
                }
            }

            return currentDate;
        }

        function generateTable() {
            const startDate = new Date(document.getElementById('startDate').value);

             if (isNaN(startDate)) {
        // Mostrar la notificación usando PNotify
        $(function() {
            new PNotify({
                title: "ERROR",
                type: "error",
                text: "Por favor, seleccione una fecha",
                styling: "bootstrap3",
            });
        });
        return;
    }
            

            const tableBody = document.querySelector("#activityTable tbody");
            tableBody.innerHTML = ""; // Limpiar tabla antes de generar

            let currentStartDate = startDate;

            // Generar filas para cada actividad
            activities.forEach(activity => {
                const endDate = calculateEndDate(currentStartDate, activity.workDays, holidays);
                const row = document.createElement("tr");

                // Crear columna para la actividad
                const activityCell = document.createElement("td");
                activityCell.textContent = activity.name;

                // Crear columna para la fecha final
                const endDateCell = document.createElement("td");
                endDateCell.textContent = endDate.toLocaleDateString();

                // Agregar celdas a la fila
                row.appendChild(activityCell);
                row.appendChild(endDateCell);

                // Agregar fila al cuerpo de la tabla
                tableBody.appendChild(row);

                // La próxima actividad empieza desde la fecha final actual
                currentStartDate = endDate;
            });
        }
        
    </script>
    
    <script>
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);

        }, 0);
    </script>
</body>
</html>




