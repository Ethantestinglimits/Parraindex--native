<?php
include "./include/config.php";

//$json = json_decode(file_get_contents(".\\assets\\personnes.json"), true);
//$pm = $json["members"][0];



try {
    $PDO = new PDO("sqlite:./databases/database.db");
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $PDO->prepare("SELECT * FROM pm");

    $statement->execute();

    $pm_list = $statement->fetchAll();


    if (!empty($_GET)) {
        $id = $_GET["id"];
        $statement = $PDO->prepare("SELECT * FROM pm WHERE id = :id");

        $statement->execute(
            [
                'id' => $id
            ]
        );

        $pm = $statement->fetch();
    }
    else {
        $statement = $PDO->prepare("SELECT * FROM pm WHERE id = :id");

        $statement->execute(
            [
                'id' => 1
            ]
        );

        $pm = $statement->fetch();
    }
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
    die();
}

if ($pm["birthday"] === null) {
    $age = "undefined";
}
else {
    $tz = new DateTimeZone('Europe/Brussels');
    $age = DateTime::createFromFormat('d/m/Y', $pm["birthday"], $tz)
        ->diff(new DateTime('now', $tz))
        ->y;
}


?>

<?php
include_once 'header.php'
?>

    <!-- Parraindex -->
    <div class="flex row text-white">

        <!-- Partie gauche -->
        <div class="flex column" id="div-info">
            <div class="flex row">
                <div class="flex column align-items-center w-45">
                    <div class="ma-1 justify-content-center">
                        <p><?= "#" . $pm["id"] . " " . $pm["prenom"] . " " . $pm["nom"] ?></p>
                    </div>
                    <img src="assets/images/parrains/<?= $pm["id"] ?>.png" alt="photo" id="picture-pm" class="border sec-2">
                    <span class="span"></span>
                    <div class="ma-1 flex row">
                        <?php
                        foreach (explode(";",$pm["type"]) as $type) {
                            echo '<p class="mx-1 px-1 ' . (isset($typeToColors[$type]) ? $typeToColors[$type] : "black") . '">' . strtoupper($type) . '</p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="flex column justify-content-center w-55">
                    <div class="ma-1 box-title">
                        <h1>Description</h1>
                    </div>
                    <div class="mx-2">
                        <p>
                            <?= $pm["description"] ?>
                        </p>
                    </div>
                    <br>
                    <div class="ma-1 box-text">
                        <p><?= $age ?> ans, <?= $pm["area"] ?></p>
                    </div>
                    <div class="ma-1 box-title">
                        <h1>Weakness</h1>
                    </div>
                    <div class="mx-2 w-fit">
                        <?php
                        foreach (explode(";",$pm["weakness"]) as $weakness) {
                            echo '<p class="px-1 ' . (isset($typeToWeakness[$weakness]) ? $typeToWeakness[$weakness] : "black") . '">' . strtoupper($weakness) . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="flex column ml-3">
                <div class="ma-1 box-title">
                    <h1>Pioux</h1>
                </div>
                <div class="flex ovf mx-2" id="style-2">
                        <?php
                        if (isset($pm["pioux"])) {
                            foreach (explode(";", $pm["pioux"]) as $p_id) {

                                $statement = $PDO->prepare("SELECT * FROM pioux WHERE id = :p_id");

                                $statement->execute(array(":p_id" => $p_id));

                                $piou = $statement->fetch();

                                echo '<div class="flex p-card ma-2">' . '<img src="assets/images/pioux/' . $piou["id"] . '.png" alt="photo" id="picture-pioux" class="w-20 mr-05 sec-1 border">' .'<p class="mr-05 no-wrap">' . $piou["prenom"] . "<br>" . $piou["nom"] . "<br>" . $piou["username"] . "" . '</p>' . '</div>';
                            }
                        } else {
                            echo '<p>?????</p>';
                        }
                        if (isset($pm["hpioux"])) {
                            foreach (explode(";", $pm["hpioux"]) as $p_id) {

                                $statement = $PDO->prepare("SELECT * FROM pioux WHERE id = :p_id");

                                $statement->execute(array(":p_id" => $p_id));

                                $piou = $statement->fetch();

                                echo '<div class="flex p-card ma-2">' . '<img src="assets/images/pioux/' . $piou["id"] . '.png" alt="photo" id="picture-piou" class="w-20 mr-05 sec-1 border">' .'<p class="mr-05 no-wrap">' . $piou["prenom"] . "<br>" . $piou["nom"] . "<br>" . $piou["username"] . "" . '</p>' . '</div>';
                            }
                        } else {
                            echo '<p>?????</p>';
                        }
                        ?>
                </div>
                <div class="ma-1 box-title">
                    <h1>Vieux</h1>
                </div>
                <div class="flex ovf mx-2" id="style-2">
                        <?php
                        if ($pm["vieux"]) {
                            foreach (explode(";", $pm["vieux"]) as $v_id) {

                                $statement = $PDO->prepare("SELECT * FROM vieux WHERE id = :v_id");

                                $statement->execute(array(":v_id" => $v_id));

                                $vieu = $statement->fetch();

                                echo '<div class="flex p-card ma-2">' . '<img src="assets/images/vieux/' . $vieu["id"] . '.png" alt="photo" id="picture-vieu" class="w-20 mr-05 sec-1 border">' .'<p class="mr-05 no-wrap">' . $vieu["prenom"] . "<br>" . $vieu["nom"] . "<br>" . $vieu["username"] . "" . '</p>' . '</div>';
                            }
                        } else {
                            echo '<p>?????</p>';
                        }
                        ?>
                </div>
            </div>
        </div>

        <!-- Partie droite -->
        <div class="flex column justify-content-center align-items-center" id="div-search-list">
            <div class="flex column justify-content-center align-items-center">
                <div class="flex column align-items-center ma-1 box-text">
                    <p>Liste Parrains</p>
                    <br>
                    <div id="div-list">
                        <form method="GET">
                            <select class="text-white" size="10" multiple name="id">
                                <?php
                                foreach ($pm_list as $member) {
                                    if (json_decode($member["data"], true)["active"] === true) {
                                        echo '<option value="' . $member["id"] . '">' . "#" . json_decode($member["data"], true)["number"] . " " . $member["prenom"] . " " . $member["nom"] . '</option>';
                                    } else {
                                        echo '<option value="' . "???????" . '">' . "#" . json_decode($member["data"], true)["number"] . " " . "???????" . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <button type="submit">Valider</button>
                        </form>
                    </div>
                </div>
                <div class="search-bar">
                    <form method="GET">
                        <input type="search" placeholder="Recherche" name="name"/>
                        <label>
                            <input type="submit" value="">
                            <i class="fas fa-search"></i>
                        </label>
                    </form>
                </div>
                <div class="ma-1 box-text">
                    <p>Stats posses</p>
                </div>
            </div>
        </div>
    </div>

<?php
include_once 'footer.php'
?>