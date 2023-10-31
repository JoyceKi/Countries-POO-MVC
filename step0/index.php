<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries POO Exercice</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <h1>Liste des pays</h1>
        <div class="countriesList">
            <?php
            try {
                $db = new PDO('mysql:host=localhost; dbname=countries; port=3306; charset=utf8', 'root', '');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            $req = $db->prepare('SELECT * FROM countries');
            $req->execute();
            while ($country = $req->fetch()) { ?>
                <a href='index.php' class='btn'><?= $country['label'] ?></a>
            <?php
            }
            $req->closeCursor();
            ?>
        </div>
    </main>
</body>
</html>



