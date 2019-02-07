<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
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


    <h1 class="text-center"><?php echo htmlspecialchars( $aluno["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>
    <div class="row py-4 mb-5">
        <div class="col-md-6">

            <dl class="row">
                <dt class="col-sm-3 text-right">Nome:</dt>
                <dd class="col-sm-9"><?php echo htmlspecialchars( $aluno["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></dd>
                <dt class="col-sm-3 text-right">Email:</dt>
                <dd class="col-sm-9"><?php echo htmlspecialchars( $aluno["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></dd>
            </dl>
        </div>
        <div class="col-md-6">
            <dl class="row">
                <dt class="col-sm-3 text-right">Matricula:</dt>
                <dd class="col-sm-9"><?php echo htmlspecialchars( $aluno["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?></dd>
                <dt class="col-sm-3 text-right">Curso:</dt>
                <dd class="col-sm-9"><?php echo htmlspecialchars( $curso["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></dd>
            </dl>
        </div>
    </div>

    <h2 class="text-center mt-3 mb-5">Historico de empréstimos</h2>
    <div>
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Codigo De Barras</th>
                    <th>Livro</th>
                    <th>Data de emprestimo</th>
                    <th>Data de devolução</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter1=-1;  if( isset($emprestimos) && ( is_array($emprestimos) || $emprestimos instanceof Traversable ) && sizeof($emprestimos) ) foreach( $emprestimos as $key1 => $value1 ){ $counter1++; ?>

                    <tr class=<?php if( $value1['ativo'] == 1 ){ ?>"ativo"<?php }else{ ?>"inativo"<?php } ?>>
                        <td><?php echo htmlspecialchars( $value1["codigo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["livro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars( $value1["dataregistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td class="text-center"><?php if( $value1['dataentrega'] == 0 ){ ?>-<?php }else{ ?> <?php echo htmlspecialchars( $value1['dataentrega'], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?></td>
                        <td class="text-center"><?php if( $value1['dataentrega'] != 0 ){ ?>Inativo<?php }else{ ?>Ativo <?php } ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
    crossorigin="anonymous"></script>


<script type="text/javascript" src="/res/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/res/js/additional-methods.min.js"></script>
<script type="text/javascript" src="/res/js/localization/messages_pt_BR.js"></script>
<script type="text/javascript" src="/res/js/validacao.js"></script>

</body>

</html>