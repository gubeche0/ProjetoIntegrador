<?php if(!class_exists('Rain\Tpl')){exit;}?>    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title text-center my-3">Gestão de Exemplares</h1>
            </div>
            <div class="panel-body">
                <?php $counter1=-1; $newvar1=App\Page::getErros(); if( isset($newvar1) && ( is_array($newvar1) || $newvar1 instanceof Traversable ) && sizeof($newvar1) ) foreach( $newvar1 as $key1 => $value1 ){ $counter1++; ?>

                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                    </div>
                <?php } ?>

                <?php $counter1=-1; $newvar1=App\Page::getSuccess(); if( isset($newvar1) && ( is_array($newvar1) || $newvar1 instanceof Traversable ) && sizeof($newvar1) ) foreach( $newvar1 as $key1 => $value1 ){ $counter1++; ?>

                    <div class="alert alert-success" role="alert">
                        <?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                    </div>
                <?php } ?>

                
                <form>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="query" name="query" placeholder="Pesquisar Exemplar">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary" type="button" id="button-addon2">Pesquisar</button>
                        </div>
                    </div>
                </form>

                
                        
                      
                
                <a href="/exemplares/create">Novo exemplar</a>
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Codigo De Barras</th>
                            <th>Livro</th>
                            <th>Status</th>
                            <th>Situação</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter1=-1;  if( isset($exemplares) && ( is_array($exemplares) || $exemplares instanceof Traversable ) && sizeof($exemplares) ) foreach( $exemplares as $key1 => $value1 ){ $counter1++; ?>

                        <tr>
                            <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php if( $value1['emprestimo'] ){ ?>Emprestado<?php }else{ ?>Disponivel<?php } ?></td>
                            <td>
                                <!-- <a class="text-dark" href='#'><i class="fas fa-info" aria-hidden="true"></i> Info</a> | -->
                                <a class="text-dark" href='/exemplares/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/edit'><i class="fas fa-edit" aria-hidden="true"></i> Editar</a> |
                                <a class="text-dark" href="#" onclick="excluir(<?php echo htmlspecialchars( $value1['id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><i class="fas fa-trash" aria-hidden="true"></i> Excluir</a></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <nav>
                    <ul class="pagination justify-content-end">
                            <li class='page-item <?php if( $page == 1 ){ ?>disabled<?php } ?>'>
                                <a class="page-link" href='/exemplares?page=<?php echo htmlspecialchars( $page - 1, ENT_COMPAT, 'UTF-8', FALSE ); ?>&query=<?php echo htmlspecialchars( $query, ENT_COMPAT, 'UTF-8', FALSE ); ?>'>Anterior</a>
                            </li>
                        <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

                            <li class="page-item <?php if( $page == $value1['text'] ){ ?> active <?php } ?>"><a class='page-link' href='<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                        <?php } ?>

                        <li class='page-item <?php if( count($pages) <= $page ){ ?>disabled<?php } ?>'>
                            <a class="page-link" href='/exemplares?page=<?php echo htmlspecialchars( $page + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?>&query=<?php echo htmlspecialchars( $query, ENT_COMPAT, 'UTF-8', FALSE ); ?>'>Proximo</a>
                        </li>
                        
                    </ul>
                </nav>
                
            </div>
        </div>
    </div>
    <script src="/res/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script> -->
    <script>
        // $("#query").quicksearch('table tbody tr')
        function excluir(id){
            var resposta = confirm("Deseja deletar o exemplar???");
            
            if(resposta == true){
                window.location.href = '/exemplares/' + id + '/delete';
            }
        }
    </script>