<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./CSS/main.css" rel="stylesheet" type="text/css">
    <title>Management Tool</title>
</head>
<body>
<header>
        <section id="section1">
            <div id="header1">MANAGEMENT TOOL</div>
            <div id="logo"><img src="./Images/logo.png" alt="logo" height="60" ></div>
        </section>
    </header>
        <nav class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="project.php">Projects</a></li>
                <li><a href="planning.php">Planning</a></li>
            </ul>
        </nav>
<body>
    <section>
    <?php
// Fonction pour générer un calendrier de rendez-vous
function genererCalendrier($annee, $mois)
{
    // Tableau des jours de la semaine
    $joursSemaine = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    
    // Nombre de jours dans le mois donné
    $nombreJours = cal_days_in_month(CAL_GREGORIAN, $mois, $annee);
    
    // Premier jour du mois donné
    $premierJour = date('N', strtotime($annee . '-' . $mois . '-01'));
    
    // Tableau multidimensionnel pour stocker les rendez-vous
    $rendezVous = array();
    
    // Boucle pour générer les jours du calendrier
    for ($jour = 1; $jour <= $nombreJours; $jour++) {
        $jourSemaine = $joursSemaine[($jour + $premierJour - 2) % 7];
        $rendezVous[$jour][$jourSemaine] = array();
    }
    
    // Exemple de rendez-vous ajouté au calendrier
    $rendezVous[5]['Mercredi'][] = 'Réunion d/équipe';
    $rendezVous[10]['Vendredi'][] = 'Préparation du Sprint';
    $rendezVous[15]['Lundi'][] = 'Appel Client';
    
    // Retourne le tableau des rendez-vous
    return $rendezVous;
}

// Exemple d'utilisation
$annee = 2023;
$mois = 6;
$calendrier = genererCalendrier($annee, $mois);

// Affichage du calendrier de rendez-vous
echo "<h2>Calendrier de rendez-vous - $mois/$annee</h2>";
echo "<table>";
echo "<tr><th>Jour</th><th>Lundi</th><th>Mardi</th><th>Mercredi</th><th>Jeudi</th><th>Vendredi</th><th>Samedi</th><th>Dimanche</th></tr>";
foreach ($calendrier as $jour => $semaine) {
    echo "<tr>";
    echo "<td>$jour</td>";
    foreach ($semaine as $jourSemaine => $rendezVous) {
        echo "<td>";
        foreach ($rendezVous as $rdv) {
            echo "$rdv<br>";
        }
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>

    </section>
</body>
</html>