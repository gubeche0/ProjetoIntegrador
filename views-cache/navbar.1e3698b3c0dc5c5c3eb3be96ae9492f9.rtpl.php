<?php if(!class_exists('Rain\Tpl')){exit;}?><nav class="navbar navbar-inverse navbar-expand-xl navbar-dark mb-4" style="background-color: green;">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/res/img/if2.png" height="30" class="d-inline-block align-top">
                IFRS
            </a>

            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    
                    <li class=<?php if( $page == 'alunos' ){ ?>"nav-item dropdown active" <?php }else{ ?>'nav-item dropdown' <?php } ?>>
                        <a class="nav-link dropdown-toggle" href="#" id="alunos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i> Alunos</a>
                        <div class="dropdown-menu" aria-labelledby="alunos">
                            <a class="dropdown-item" href="/alunos"><i class="fas fa-list"></i> Listar</a>
                            <a class="dropdown-item" href="/alunos/create"><i class="fas fa-plus"></i> Adicionar</a>
                        </div>
                    </li>

                    <li class=<?php if( $page == 'livros' ){ ?>"nav-item dropdown active" <?php }else{ ?>'nav-item dropdown' <?php } ?>>
                        <a class="nav-link dropdown-toggle" href="#" id="livros" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i> Livros</a>
                        <div class="dropdown-menu" aria-labelledby="livros">
                            <a class="dropdown-item" href="/livros"><i class="fas fa-list"></i> Listar</a>
                            <a class="dropdown-item" href="/livros/create"><i class="fas fa-plus"></i> Adicionar</a>
                        </div>
                    </li>

                    <li class=<?php if( $page == 'exemplares' ){ ?>"nav-item dropdown active" <?php }else{ ?>'nav-item dropdown' <?php } ?>>
                        <a class="nav-link dropdown-toggle" href="#" id="livros" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i> Exemplares</a>
                        <div class="dropdown-menu" aria-labelledby="livros">
                            <a class="dropdown-item" href="/exemplares"><i class="fas fa-list"></i> Listar</a>
                            <a class="dropdown-item" href="/exemplares/create"><i class="fas fa-plus"></i> Adicionar</a>
                        </div>
                    </li>

                    <li class=<?php if( $page == 'emprestimos' ){ ?>"nav-item dropdown active" <?php }else{ ?>'nav-item dropdown' <?php } ?>>
                        <a class="nav-link dropdown-toggle" href="#" id="emprestimos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i> Empréstimos</a>
                        <div class="dropdown-menu" aria-labelledby="emprestimos">
                            <a class="dropdown-item" href="/emprestimos"><i class="fas fa-list"></i> Listar</a>
                            <a class="dropdown-item" href="/emprestimos/create"><i class="fas fa-plus"></i> Adicionar</a>
                            <a class="dropdown-item" href="/emprestimos/devolver"><i class="fas fa-minus"></i> Devolver</a>
                        </div>
                    </li>
                    <li class="nav-item">

                    
                    <li class=<?php if( $page == 'outros' ){ ?>"nav-item dropdown active" <?php }else{ ?>'nav-item dropdown' <?php } ?>>
                        <a class="nav-link dropdown-toggle" href="#" id="outros" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i> Outros</a>
                        <div class="dropdown-menu" aria-labelledby="outros">
                            <a class="dropdown-item" href="#">Configurações</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/categorias">Categorias</a>
                            <a class="dropdown-item" href="/cursos">Cursos</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>