<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./CSS/main.css" rel="stylesheet" type="text/css">
   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <!-- extension Jquery Waypoints -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
   
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
    <main>
        <section>

            <section>
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Recherche">
                    <select name="sort">
                        <option value="id">ID</option>
                        <option value="login">Login</option>
                        <option value="mail">Mail</option>
                    </select>
                    <input type="submit" value="Filtrer">
                </form>

                <?php
                // Connexion à la base de données
                $conn = new mysqli("localhost", "root", "", "eval");

                // Vérification de la connexion
                if ($conn->connect_error) {
                    die("La connexion à la base de données a échoué : " . $conn->connect_error);
                }

                // Requête de récupération des utilisateurs
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
                $sql = "SELECT * FROM user WHERE id LIKE '%$search%' OR login LIKE '%$search%' OR mail LIKE '%$search%' ORDER BY $sort";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Affichage des utilisateurs
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Login</th><th>Mail</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['login'] . "</td><td>" . $row['mail'] . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Aucun utilisateur trouvé.";
                }

                // Fermeture de la connexion à la base de données
                $conn->close();
                ?>

            </section>


            <section class="formulaire">

                <form method="POST" action="insert.php">
                    <input type="text" name="login" placeholder="Login" required>
                    <input type="password" name="pwd" placeholder="Mot de passe" required>
                    <input type="email" name="mail" placeholder="Adresse e-mail" required>
                    <input type="submit" value="Ajouter">
                </form>
            </section>
            <script src="./JS/index.js"></script>
    </main>
    <footer></footer>
</body>

</html>