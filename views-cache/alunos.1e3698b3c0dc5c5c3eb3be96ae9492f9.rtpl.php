<?php if(!class_exists('Rain\Tpl')){exit;}?>    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title text-center my-3">Gestão de Alunos</h1>
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

                

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="query" name="query" placeholder="Pesquisar Alunos">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary" type="button" id="button-addon2">Pesquisar</button>
                        </div>
                    </div>

                
                        
                      
                <p class="float-right">
                    <a class="text-right" href="#">Opções Avançada</a>
                </p>
                <a href="/alunos/create">Novo Aluno</a>
                <table class="table table-striped table-bordered table-hover" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Matricula</th>
                            <th>Nome</th>
                            <th>Curso</th>
                            <th>Email</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter1=-1;  if( isset($alunos) && ( is_array($alunos) || $alunos instanceof Traversable ) && sizeof($alunos) ) foreach( $alunos as $key1 => $value1 ){ $counter1++; ?>

                        <tr>
                            <td><?php echo htmlspecialchars( $value1["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["curso"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                                
                                <a class="text-dark" href='/alunos/<?php echo htmlspecialchars( $value1["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/edit'><i class="fas fa-edit" aria-hidden="true"></i> Editar</a> |
                                <a class="text-dark" href="#" onclick="excluir(<?php echo htmlspecialchars( $value1['matricula'], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><i class="fas fa-trash" aria-hidden="true"></i> Excluir</a></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/res/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
    
    <script>
        $("#query").quicksearch('table tbody tr')
        function excluir(id){
            var resposta = confirm("Deseja deletar a criança???");
            
            if(resposta == true){
                window.location.href = '/alunos/' + id + '/delete';
            }
        }
        
    </script>
</body>

</html>