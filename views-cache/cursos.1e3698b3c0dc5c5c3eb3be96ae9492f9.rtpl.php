<?php if(!class_exists('Rain\Tpl')){exit;}?>    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title text-center my-3">Gestão de Cursos</h1>
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

                <form action="" method="get">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="query" name="query" placeholder="Pesquisar Curso">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary" type="button" id="button-addon2">Pesquisar</button>
                        </div>
                    </div>

                </form>
                        
                      
                <p class="float-right">
                    <a class="text-right" href="#">Opções Avançada</a>
                </p>
                <a href="/cursos/create">Novo Curso</a>
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#ID</th>
                            <th>Nome</th>
                            <th>Abreviacao</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter1=-1;  if( isset($curso) && ( is_array($curso) || $curso instanceof Traversable ) && sizeof($curso) ) foreach( $curso as $key1 => $value1 ){ $counter1++; ?>

                        <tr>
                            <td>#<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["abreviacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                                <!-- <a class="text-dark" href='#'><i class="fas fa-info" aria-hidden="true"></i> Info</a> | -->
                                <a class="text-dark" href='/cursos/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/edit'><i class="fas fa-edit" aria-hidden="true"></i> Editar</a> |
                                <a class="text-dark" href="#" onclick="excluir(<?php echo htmlspecialchars( $value1['id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><i class="fas fa-trash" aria-hidden="true"></i> Excluir</a></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    <script src="/res/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
    <script>
        $("#query").quicksearch('table tbody tr')
        function excluir(id){
            var resposta = confirm("Deseja deletar o Curso???");
            
            if(resposta == true){
                window.location.href = '/cursos/' + id + '/delete';
            }
        }
    </script>