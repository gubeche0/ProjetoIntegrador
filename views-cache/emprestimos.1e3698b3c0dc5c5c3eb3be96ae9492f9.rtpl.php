<?php if(!class_exists('Rain\Tpl')){exit;}?>    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title text-center my-3">Gestão de Emprestimos</h1>
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

                
                        
                      
                
                <a href="/emprestimos/create">Novo Emprestimo</a>
                <table class="table table-striped table-bordered table-hover" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th>#Id</th>
                            <th>Aluno</th>
                            <th>Livro</th>
                            <th>Codigo</th>
                            <th>Data Emprestimo</th>
                            <th>Período de entrega</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter1=-1;  if( isset($emprestimos) && ( is_array($emprestimos) || $emprestimos instanceof Traversable ) && sizeof($emprestimos) ) foreach( $emprestimos as $key1 => $value1 ){ $counter1++; ?>

                        <tr>
                            <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["aluno"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["livro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["codigo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["dataregistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["periodo_entrega"], ENT_COMPAT, 'UTF-8', FALSE ); ?> Anos</td>
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
            var resposta = confirm("Deseja deletar o emprestimo???");
            
            if(resposta == true){
                window.location.href = '/emprestimos/' + id + '/delete';
            }
        }
        
    </script>
</body>

</html>