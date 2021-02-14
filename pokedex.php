<?php
    $json = json_decode(file_get_contents(".\\assets\\personnes.json"), true);
    $pm = $json["members"][0];
    if (!empty($_GET)) {
        foreach ($json["members"] as $member) {
            if ($member["name"] === $_GET["name"]) {
                $pm = $member;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <title>Parraindex</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/gif/jpg" href="https://image.winudf.com/v2/image/bmV0LmFudGFmdW5ueS5wb2tlbW9uZ28uZ3VpZGUuZXhwZXJ0X2ljb25fMTUwNjAyMjk4NF8wOTc/icon.png?w=170&fakeurl=1"/>

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="styles/pokedex.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

</head>

<body class="bg-purple">

<main>
    <div class="logo">
        <img src="https://beta.adalab.es/f-online-pokemon-veronicabautista/static/media/logo.799db9c7.png" height="100%" alt="logo"/>
    </div>

    <!-- Parraindex -->
    <div class="flex row text-white">

        <!-- Partie gauche -->
        <div class="flex column" id="div-info">
            <div class="flex row">
                <div class="flex column align-items-center w-60">
                    <div class="ma-1 box-text">
                        <p><?= $pm["name"] ?></p>
                    </div>
                    <img src="assets/images/flo.png" alt="photo" id="picture-pm">
                    <div class="ma-1 box-text">
                        <p>type: <?php
                            foreach($pm["type"] as $type) {
                                echo $type . " ";
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="flex column align-items-center justify-content-center w-40">
                    <div class="ma-1 box-text">
                        <p>Description</p>
                    </div>
                    <div>
                        <p><?= $pm["description"] ?></p>
                    </div>
                    <br>
                    <div class="ma-1 box-text">
                        <p><?= $pm["age"] ?>, <?= $pm["sexe"] ?></p>
                    </div>
                    <div class="ma-1 box-text">
                        <p>weakness:
                            <?php
                            foreach($pm["weakness"] as $weakness) {
                                echo $weakness . " ";
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex column align-items-center">
                <div class="ma-1 box-text">
                    <p>Pioux</p>
                </div>
                <div>
                    <p>
                        <?php
                        foreach($pm["pioux"] as $piou) {
                            echo $piou["name"] . " " . $piou["username"]. "<br>";
                        }
                        ?>
                    </p>
                </div>
                <div class="ma-1 box-text">
                    <p>Vieux</p>
                </div>
                <div>
                    <p>
                        <?php
                        foreach($pm["vieux"] as $vieu) {
                            echo $vieu["name"] . " " . $vieu["username"]. "<br>";
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Partie droite -->
        <div class="flex column align-items-center justify-content-center border" id="div-search-list">
            <div class="flex column align-items-center justify-content-center">
                <form method="GET">
                    <input type="search" placeholder="Recherche" name="name"/>
                    <button type="submit">Ok</button>
                </form>
                <div class="flex column align-items-center ma-1 box-text">
                    <p>Liste Parrains</p>
                    <br>
                    <div id="div-list">
                        <form method="GET">
                            <select class="text-white" size="10" multiple name="name">
                                <?php
                                    foreach ($json["members"] as $member) {
                                        echo '<option value="' . $member["name"] . '">' . $member["name"] . '</option>';
                                    }
                                ?>
                            </select>
                            <button type="submit">Valider</button>
                        </form>
                        </div>
                </div>
                <div class="ma-1 box-text">
                    <p>Stats posses</p>
                </div>
            </div>
        </div>
    </div>
</main>
</body>