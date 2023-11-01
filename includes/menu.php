<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">VetGanado</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="main.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="vacunosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Vacunos
                </a>
                <div class="dropdown-menu" aria-labelledby="vacunosDropdown">
                    <a class="dropdown-item" href="agregar_vacuno.php">Gestionar Vacunos</a>
                    <a class="dropdown-item" href="dosis_vacunos.php">Dosis Vacunos</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ovinosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ovinos
                </a>
                <div class="dropdown-menu" aria-labelledby="ovinosDropdown">
                    <a class="dropdown-item" href="agregar_ovino.php">Gestionar Ovinos</a>
                    <a class="dropdown-item" href="dosis_ovinos.php">Dosis Ovinos</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="enfermedades.php">Enfermedades</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profesionales.php">Profesionales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="soporte.php">Soporte</a>
            </li>
        </ul>
    </div>
</nav>
