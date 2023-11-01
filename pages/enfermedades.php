<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetGanado - Enfermedades</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="../images/logo.png" type="image/png">
    <style>
#ovinoHeader,
#vacunoHeader {
    color: #1877F2;
    margin-bottom: 20px;
}

#ovinoSearch,
#vacunoSearch {
    width: 100%;
    max-width: 300px;
    margin-bottom: 20px;
}

#ovinoEnfermedades,
#vacunoEnfermedades {
    margin-top: 20px;
}

.list-group-item {
    margin-bottom: 10px;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.list-group-item h4 {
    color: #333;
}

.list-group-item p {
    color: #555;
}

    </style>
</head>
<body>

<?php include('../includes/menu.php'); ?> 

<div class="container mt-4">
    <h2>Enfermedades en Ovinos</h2>
    <input class="form-control mb-2" id="ovinoSearch" type="text" placeholder="Buscar por nombre o síntomas">
    <ul class="list-group" id="ovinoEnfermedades">
    <li class="list-group-item">
            <h4>Fiebre Aftosa</h4>
            <p><strong>Síntomas:</strong> Fiebre, ampollas en la boca y las patas.</p>
            <p><strong>Cura:</strong> Cuarentena y vacunación.</p>
        </li>

        <li class="list-group-item">
            <h4>Mastitis</h4>
            <p><strong>Síntomas:</strong> Inflamación de las ubres, leche con sangre.</p>
            <p><strong>Cura:</strong> Antibióticos y cuidado de las ubres.</p>
        </li>

        <li class="list-group-item">
            <h4>Anaplasmosis</h4>
            <p><strong>Síntomas:</strong> Fiebre alta, pérdida de peso.</p>
            <p><strong>Cura:</strong> Antibióticos y control de garrapatas.</p>
        </li>

        <li class="list-group-item">
            <h4>Neumonía Bovina</h4>
            <p><strong>Síntomas:</strong> Tos, dificultad para respirar.</p>
            <p><strong>Cura:</strong> Tratamiento con antibióticos.</p>
        </li>

        <li class="list-group-item">
            <h4>Brucelosis</h4>
            <p><strong>Síntomas:</strong> Abortos, infertilidad.</p>
            <p><strong>Cura:</strong> Vacunación y cuarentena.</p>
        </li>

        <li class="list-group-item">
            <h4>Leptospirosis</h4>
            <p><strong>Síntomas:</strong> Fiebre, letargo, ictericia.</p>
            <p><strong>Cura:</strong> Antibióticos.</p>
        </li>

        <li class="list-group-item">
            <h4>Enfermedad de las Mucosas</h4>
            <p><strong>Síntomas:</strong> Mucosas inflamadas, pérdida de apetito.</p>
            <p><strong>Cura:</strong> Tratamiento sintomático.</p>
        </li>

        <li class="list-group-item">
            <h4>Tuberculosis Bovina</h4>
            <p><strong>Síntomas:</strong> Tos, pérdida de peso.</p>
            <p><strong>Cura:</strong> Cuarentena y sacrificio en casos graves.</p>
        </li>

        <li class="list-group-item">
            <h4>Enfermedad de la Lengua Azul</h4>
            <p><strong>Síntomas:</strong> Inflamación de la lengua y encías.</p>
            <p><strong>Cura:</strong> Vacunación.</p>
        </li>

        <li class="list-group-item">
            <h4>Tristeza Parasitaria Bovina</h4>
            <p><strong>Síntomas:</strong> Anemia, debilidad.</p>
            <p><strong>Cura:</strong> Tratamiento antiparasitario.</p>
        </li>
    </ul>
</div>

<div class="container mt-4">
    <h2>Enfermedades en Vacunos</h2>
    <input class="form-control mb-2" id="vacunoSearch" type="text" placeholder="Buscar por nombre o síntomas">
    <ul class="list-group" id="vacunoEnfermedades">
    <li class="list-group-item">
            <h4>Gastroenteritis Verminosa</h4>
            <p><strong>Síntomas:</strong> Diarrea, pérdida de peso.</p>
            <p><strong>Cura:</strong> Desparasitación y tratamiento sintomático.</p>
        </li>

        <li class="list-group-item">
            <h4>Pododermatitis Contagiosa Ovina</h4>
            <p><strong>Síntomas:</strong> Cojera, inflamación en las pezuñas.</p>
            <p><strong>Cura:</strong> Cuarentena y tratamiento antibiótico.</p>
        </li>

        <li class="list-group-item">
            <h4>Aborto Enzootico de las Ovejas</h4>
            <p><strong>Síntomas:</strong> Abortos frecuentes.</p>
            <p><strong>Cura:</strong> Control de garrapatas y cuarentena.</p>
        </li>

        <li class="list-group-item">
            <h4>Queratoconjuntivitis Ovina</h4>
            <p><strong>Síntomas:</strong> Ojos llorosos, conjuntivitis.</p>
            <p><strong>Cura:</strong> Tratamiento ocular y control de moscas.</p>
        </li>

        <li class="list-group-item">
            <h4>Enfermedad del Casco</h4>
            <p><strong>Síntomas:</strong> Cojera, dolor en los cascos.</p>
            <p><strong>Cura:</strong> Tratamiento del casco y cuarentena.</p>
        </li>

        <li class="list-group-item">
            <h4>Fascioliasis Hepática</h4>
            <p><strong>Síntomas:</strong> Pérdida de peso, anemia.</p>
            <p><strong>Cura:</strong> Desparasitación y tratamiento hepático.</p>
        </li>

        <li class="list-group-item">
            <h4>Pulmonía Ovina</h4>
            <p><strong>Síntomas:</strong> Tos, dificultad para respirar.</p>
            <p><strong>Cura:</strong> Tratamiento antibiótico y cuarentena.</p>
        </li>

        <li class="list-group-item">
            <h4>Enfermedad de la Cabeza Hinchada</h4>
            <p><strong>Síntomas:</strong> Inflamación de la cabeza y cuello.</p>
            <p><strong>Cura:</strong> Drenaje y tratamiento antibiótico.</p>
        </li>

        <li class="list-group-item">
            <h4>Enterotoxemia en Ovinos</h4>
            <p><strong>Síntomas:</strong> Convulsiones, muerte súbita.</p>
            <p><strong>Cura:</strong> Vacunación y tratamiento sintomático.</p>
        </li>

        <li class="list-group-item">
            <h4>Estomatitis Vesicular</h4>
            <p><strong>Síntomas:</strong> Úlceras en la boca y labios.</p>
            <p><strong>Cura:</strong> Tratamiento sintomático.</p>
        </li>
    </ul>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function filterEnfermedades(keyword, containerId) {
        const enfermedades = document.getElementById(containerId).getElementsByTagName("li");
        for (let i = 0; i < enfermedades.length; i++) {
            const enfermedad = enfermedades[i];
            const texto = enfermedad.textContent || enfermedad.innerText;
            if (texto.toLowerCase().indexOf(keyword.toLowerCase()) > -1) {
                enfermedad.style.display = "";
            } else {
                enfermedad.style.display = "none";
            }
        }
    }

    document.getElementById("ovinoSearch").addEventListener("keyup", function () {
        filterEnfermedades(this.value, "ovinoEnfermedades");
    });

    document.getElementById("vacunoSearch").addEventListener("keyup", function () {
        filterEnfermedades(this.value, "vacunoEnfermedades");
    });
</script>

</body>
</html>
