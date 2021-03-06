<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <title>Parraindex</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/gif/jpg"
          href="https://image.winudf.com/v2/image/bmV0LmFudGFmdW5ueS5wb2tlbW9uZ28uZ3VpZGUuZXhwZXJ0X2ljb25fMTUwNjAyMjk4NF8wOTc/icon.png?w=170&fakeurl=1"/>

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="styles/pokedex.css"/>
    <link rel="stylesheet" href="styles/colors.css"/>
    <link rel="stylesheet" href="styles/menu.scss"/>

    <!-- Hover Effect -->
    <link rel="stylesheet" href="styles/hover.css"/>

    <!-- SCRIPT -->
    <link rel="script" href="script/menu.js"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

    <!-- Icônes importées depuis fontawesome -->
    <script src="https://kit.fontawesome.com/01082152f6.js" crossorigin="anonymous"></script>

</head>
<body class="bg-purple">

<main>

    <div class="flex column text-white">
        <nav class="flex">
            <img src="assets/icons/android-chrome-192x192.png" id="w-nav">

            <ul class="flex">
                <li><i class="fas fa-home"></i></li>
                <li><i class="fas fa-address-book"></i></li>
                <li><i class="fas fa-tree"></i></li>
                <li><i class="fas fa-user-check"></i></li>
            </ul>

        </nav>

        <div style="display: none">
            <h1>Login</h1>
            <form action="" method="post">
                <div>

                </div>
                <div>

                </div>
                <div>

                </div>
            </form>
        </div>

        <div class="flex column justify-content-center align-items-center">
            <div class="flex column align-items-center ma-1 py-1 menu-box hvr-grow">
                <a href="pokedex.php" class="flex column align-items-center text-white">
                <img src="assets/images/interface/pokedex.png">
                <h1>Parraindex</h1>
                </a>
            </div>

            <span class="span"></span>

            <div class="flex row justify-content-center align-items-center ma-1">
                <div class="flex column justify-content-center align-items-center flex-g menu-box sec-2 hvr-grow">
                    <img src="assets/images/interface/caninos.png" class="w-60">
                    <p>?</p>
                </div>
                <div class="flex column justify-content-center align-items-center flex-g menu-box sec-2 hvr-grow">
                    <img src="assets/images/interface/constelation.png" class="w-60">
                    <p>Généalogie </p>
                </div>
                <div class="flex column justify-content-center align-items-center flex-g menu-box sec-2 hvr-grow">
                    <img src="assets/images/interface/iconeparrain.png" class="w-60">
                    <p>Owned</p>
                </div>
            </div>
        </div>
    </div>

</main>

</body>
</html>