<?php
    include "./include/config.php";

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
    <link rel="stylesheet" href="styles/pokedex.css"/>
    <link rel="stylesheet" href="styles/colors.css"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

</head>

<body class="bg-purple">

<main>

    <!-- Parraindex -->
    <div class="flex row text-white">

        <!-- Partie gauche -->
        <div class="flex column" id="div-info">
            <div class="flex row">
                <div class="flex column align-items-center w-60">
                    <div class="ma-1 box-text">
                        <p><?= "#". $pm["number"] . " " . $pm["name"] ?></p>
                    </div>
                    <img src="assets/images/<?= $idToPic[$pm["number"]] ?>.png" alt="photo" id="picture-pm" class="border">
                    <div class="ma-1 flex row">
                        <?php
                        foreach($pm["type"] as $type) {
                            echo '<p class="mx-1 px-1 ' . (isset($typeToColors[$type]) ? $typeToColors[$type] : "black") . '">' . strtoupper($type) . '</p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="flex column justify-content-center w-40">
                    <div class="ma-1 box-title">
                        <h1>Description</h1>
                    </div>
                    <div class="mx-2">
                        <p><?= $pm["description"] ?></p>
                    </div>
                    <br>
                    <div class="ma-1 box-text">
                        <p><?= $pm["age"] ?>, <?= $pm["sexe"] ?></p>
                    </div>
                    <div class="ma-1 box-title">
                        <h1>Weakness</h1>
                    </div>
                    <div class="mx-2 w-fit">
                        <?php
                        foreach($pm["weakness"] as $weakness) {
                        echo '<p class="px-1 ' . (isset($typeToWeakness[$weakness]) ? $typeToWeakness[$weakness] : "black") . '">' . strtoupper($weakness) . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="flex column">
                <div class="ma-1 box-title">
                    <h1>Pioux</h1>
                </div>
                <div class="mx-2">
                    <p>
                        <?php
                        foreach($pm["pioux"] as $piou) {
                            echo $piou["name"] . " " . $piou["username"]. "<br>";
                        }
                        ?>
                    </p>
                </div>
                <div class="ma-1 box-title">
                    <h1>Vieux</h1>
                </div>
                <div class="mx-2">
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
        <div class="flex column justify-content-center align-items-center" id="div-search-list">
            <div class="flex column justify-content-center align-items-center">
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