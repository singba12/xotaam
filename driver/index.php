<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tableau de Bord avancé pour Hotam, avec personnalisation, analytique et notifications en temps réel.">
    <title>Xotaam-Transport</title>
    <link rel="icon" href="logo-top1.ico" type="image/x-icon">

    <!-- Feuilles de style et bibliothèques -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Open Graph et SEO -->
    <meta property="og:title" content="Tableau de Bord Premium - Hotam">
    <meta property="og:description" content="Une solution avancée pour la gestion de chauffeurs et de courses.">
    <meta property="og:image" content="/src/xotaam-logo.ico">
    <meta property="og:type" content="website">

    <style>
    /* Variables CSS */
:root {
    --primary-color: #007bff; /* Bleu classique */
    --secondary-color: #212529; /* Gris anthracite */
    --accent-color: #ffc107; /* Jaune doré pour attirer l’attention */
    --background-color: #f8f9fa; /* Gris clair */
    --text-color: #212529; /* Texte principal */
    --border-color: #dee2e6; /* Couleur des bordures */
    --hover-color: #e9ecef; /* Couleur au survol */
    --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Styles de base */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: var(--background-color);
    margin: 0;
    padding: 0;
    color: var(--text-color);
    overflow-x: hidden; /* Empêche le débordement horizontal */
}

/* Barre d'en-tête */
.header-bar {
    background-color: var(--secondary-color);
    color: white;
    padding: 1rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    box-shadow: var(--shadow);
    z-index: 1000;
    max-width: 100%;
    box-sizing: border-box;
}

.header-bar .logo img {
    height: 40px;
}

.header-bar .user-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.header-bar .default-icon {
    font-size: 50px;
    color: #333;
}

/* Tableau de bord */
.dashboard {
    margin: 135px auto 0;
    width: 90%;
    max-width: 1200px;
    background-color: white;
    border-radius: 10px;
    box-shadow: var(--shadow);
    padding: 2rem;
    text-align: center;
    display: center
}

/* Tableaux */
table {
    width: 100%;
    text-align: center;
    border-collapse: collapse;
    margin: none;
    box-shadow: var(--shadow);
    font-size: 12px;
    font-weight: bolder
}

table th, table td {
    padding: 15px;
    border: 1px solid var(--border-color);
}

table th {
    background-color: var(--primary-color);
    color: white;
    font-weight: bold;
}

table tbody tr:hover {
    background-color: var(--hover-color);
}

/* Boutons */
.btn-primary {
    background-color: var(--primary-color);
    border: none;
    color: white;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-primary:active {
    background-color: #003f7f;
}

#driver-look {
    background-color: var(--accent-color);
    color: white;
    font-size: 1.5rem;
    border: none;
    border-radius: 10px;
    padding: 0.5rem 1.5rem;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

#driver-look:hover {
    background-color: #d39e00;
    transform: scale(1.05);
}

#driver-look:active {
    background-color: #b68900;
}

/* Bascule (Toggle Switch) */
.toggle-switch {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 25px;
    max-width: 100%;
    box-sizing: border-box;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: red;
    transition: 0.4s;
    border-radius: 25px;
}

.slider:before {
    position: absolute;
    content: "";
    height: 19px;
    width: 19px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: 0.4s;
    border-radius: 50%;
}

input:checked + .slider {
    background-color: green;
}

input:checked + .slider:before {
    transform: translateX(25px);
}

input[type="checkbox"] {
    isolation: isolate; /* Prévenir tout effet indésirable sur d'autres éléments */
}

/* Responsivité */
@media (max-width: 768px) {
    .dashboard {
        padding: 1rem;
    }
    .header-bar {
        padding: 1rem;
    }
}
.dropdown-item {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 5px;
    background-color:#c82333
}
.dropdown-item:hover {
    background-color: grey; /* Rouge foncé */
    transform: scale(1.05);
}
	</style>

</head>
<body>
    <div class="header-bar">
        <div class="user-info">
        <!-- Icône de profil -->
        <img id="profile-picture" src="profile-picture.jpg" alt="Photo de profil" onerror="this.style.display='none'; document.getElementById('default-icon').style.display='block';">
        <i id="default-icon" class="fas fa-user-circle default-icon" style="display:none;"></i>

        <!-- Menu hamburger -->
			<div class="dropdown">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="menuButton" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="fas fa-bars"></i>
				</button>
				<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="menuButton">
					<li>
						<p style="margin: 0; padding: 10px;" id="name">INCONNU</p>
					</li>
					<li>
						<button class="dropdown-item btn btn-sm btn-danger" id="logout-btn">Déconnexion</button>
					</li>
				</ul>
			</div>
		</div>
        
        <div class="toggle-switch">
            <label class="switch">
                <input type="checkbox" id="availability-toggle">
                <span class="slider"></span>
            </label>
        </div>
        <div>
            <p id="current-balance" class="mb-0">Solde : 10000F</p>
            <button class="btn btn-primary" id="withdraw-btn">Retirer</button>
        </div>
    </div>

    <div class="dashboard">
        <h3>Notifications</h3>
        <p id="newCourseNotification">Aucune nouvelle course pour le moment.</p>

        <h3>Liste des Chauffeurs</h3>
        <table id='drivers-table'>
            <thead>
                <tr>
					 <th style="width: 30%;">Identité</th>
                     <th style="width: 65%;">Numéro</th>
                    <th style="width: 5%;">Courses</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
	<!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script type="module" src="https://www.gstatic.com/firebasejs/9.17.1/firebase-app.js"></script>
	<script type="module" src="https://www.gstatic.com/firebasejs/9.17.1/firebase-auth.js"></script>
	<script type="module" src="https://www.gstatic.com/firebasejs/9.17.1/firebase-database.js"></script>
	<script type="module" src="https://www.gstatic.com/firebasejs/9.17.1/firebase-firestore.js"></script>
	
	<script src="auths.js" type="module"></script>
    
</body>
</html>
