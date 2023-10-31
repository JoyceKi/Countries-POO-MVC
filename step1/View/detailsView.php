<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails</title>
</head>
<body>
    <main>
        <table class="table table-bordered">
      
            <thead>
            <?php foreach ( $pays as $unPays) { ?>
                <tr>
                    <th colspan="5"><?=$unPays['pays']?></th>
                </tr>
                <?php
                }
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
        <a href="../View/countriesView.php" class="btn" >Retour</a>
    </main>
    
</body>
</html>