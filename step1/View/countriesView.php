<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries POO Exercice</title>
    <link rel="stylesheet" href="Public/css/normalize.css">
    <link rel="stylesheet" href="Public/css/style.css">
</head>

<body>
    <main>
        <h1>Liste des pays</h1>
        <div class="countriesList">
            <?php
            foreach ($countries as $country) { ?>
                    <a href="./Controller/details.php?pays_id=<?= $country['id_pays']?>"class="btn"><?= $country['pays'] ?><br><span class="text text-secondary " >Afficher les détails</span></a>
                <?php
                }
            ?>
        </div>
    </main>
</body>

</html>