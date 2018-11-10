<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>

<head>
    <title>Gestão Livros IFRS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/res/ifrs.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-inverse navbar-expand-xl navbar-dark mb-4" style="background-color: green;">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/res/if2.png" height="30" class="d-inline-block align-top">
                IFRS
            </a>

            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    
                    <li class=<?php if( $page == '/alunos' ){ ?> "nav-item dropdown active" <?php }else{ ?> 'nav-item dropdown' <?php } ?>>
                        <a class="nav-link dropdown-toggle" href="#" id="alunos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i> Alunos</a>
                        <div class="dropdown-menu" aria-labelledby="alunos">
                            <a class="dropdown-item" href="/alunos"><i class="fas fa-list"></i> Listar</a>
                            <a class="dropdown-item" href="/alunos/create"><i class="fas fa-plus"></i> Adicionar</a>
                        </div>
                    </li>

                    <li class=<?php if( $page == '/livros' ){ ?> "nav-item dropdown active" <?php }else{ ?> 'nav-item dropdown' <?php } ?>>
                        <a class="nav-link dropdown-toggle" href="#" id="livros" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i> Livros</a>
                        <div class="dropdown-menu" aria-labelledby="livros">
                            <a class="dropdown-item" href="#"><i class="fas fa-list"></i> Listar</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-plus"></i> Adicionar</a>
                        </div>
                    </li>

                    <li class=<?php if( $page == '/emprestimos' ){ ?> "nav-item dropdown active" <?php }else{ ?> 'nav-item dropdown' <?php } ?>>
                        <a class="nav-link dropdown-toggle" href="#" id="livros" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i> Empréstimos</a>
                        <div class="dropdown-menu" aria-labelledby="livros">
                            <a class="dropdown-item" href="#"><i class="fas fa-list"></i> Listar</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-plus"></i> Adicionar</a>
                        </div>
                    </li>
                    <li class="nav-item">

                    <li class=<?php if( $page == '/categorias' ){ ?> "nav-item dropdown active" <?php }else{ ?> 'nav-item dropdown' <?php } ?>>
                        <a class="nav-link dropdown-toggle" href="#" id="livros" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i> Categorias</a>
                        <div class="dropdown-menu" aria-labelledby="livros">
                            <a class="dropdown-item" href="#"><i class="fas fa-list"></i> Listar</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-plus"></i> Adicionar</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
