<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails</title>
    <link rel="stylesheet" href="Public/css/normalize.css">
    <link rel="stylesheet" href="Public/css/style.css">
</head>
<body>
    <main>
        <table class="table table-bordered">
      
            <thead>
            <?php //foreach ( $pays as $unPays) { ?>
                <tr>
                    <th colspan="5"><?php echo $countryName['pays'];?></th>
                </tr>
                <?php
                //}
            ?>
            </thead>
           
            <tbody>
                <tr>
                <?php foreach ( $detail as $pays) { ?>
                    <th scope="col"><?=$pays['detail']?></th>
                    <?php
                    }
                ?>
                </tr>
                <tr>
                <?php foreach ( $detail as $pays) { ?>
                    <td><?=$pays['donnees']?></td>
                    <?php
                    }
                ?>
                </tr>
            </tbody>           
        </table>
        <br>
        <h2>Ajouter une information pour ce pays</h2>

        <form action="index.php?action=addCountryDetail&pays_id=<?= $pays['pays_id'] ?>" method="post">
            <label for="detail">Clé :</label>
            <input type="text" name="detail" id="detail" >
            <label for="donnees">Valeur :</label>
            <input type="text" name="donnees" id="donnees" >
            <input type="submit" name="submitBtn" value="Ajouter" >
        </form>
        <br>
        <a href="index.php" class="btn" >Retour</a>
    </main>
    
</body>
</html>