<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url(['css', 'home.css']) ?>">
    <link rel="stylesheet" href="<?= base_url(['css', 'main.css']) ?>">


    <title>TheServices - Portal de serviços em Teresina</title>
</head>

<body>
    <div class="container" id="app">

        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top menu">
            <div class="container-fluid menu-container">
                <a class="navbar-brand" href="<?= base_url('/') ?>">THEservices</a>

                <div class="drop-box">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span><?= session()->get("user_name") ?> </span><img src="<?= base_url(['img', 'bust_man.png']) ?>" width="35" width="35" alt="bust man">
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?= base_url(['atualizar-perfil']) ?>">Perfil</a></li>
                                    <li>
                                        <a class="dropdown-item" aria-current="page" href="<?= base_url(['novo-servico']) ?>">Novo Serviço</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" aria-current="page" href="<?= base_url(['meus-servicos']) ?>">Meus Serviços</a>
                                    </li>
                                <li><a class="dropdown-item" href="<?= base_url(['logout']) ?>">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

        </nav>