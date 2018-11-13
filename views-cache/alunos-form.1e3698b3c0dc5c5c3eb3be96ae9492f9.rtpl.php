<?php if(!class_exists('Rain\Tpl')){exit;}?>    
    <div class="container">
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

            <form method="post">

                    <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label">Matricula:</label>
                        <div class="col-sm-10">
        
                            <input type="number" name="matricula" id="matricula" class="form-control" placeholder="Matricula" required <?php if( isset($aluno) ){ ?>readonly<?php }else{ ?>autofocus<?php } ?> value=<?php if( isset($aluno) ){ ?><?php echo htmlspecialchars( $aluno["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>""<?php } ?>>
                        </div>
                    </div>
            
                    <div class="form-group row">
        
                        <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
                        <div class="col-sm-10">
        
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required <?php if( isset($aluno) ){ ?>autofocus<?php } ?> value='<?php if( isset($aluno) ){ ?><?php echo htmlspecialchars( $aluno["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>'>
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control" required value=<?php if( isset($aluno) ){ ?><?php echo htmlspecialchars( $aluno["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>""<?php } ?>>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="curso" class="col-sm-2 col-form-label">Curso:</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="curso" id="curso">
                                <option value="1" <?php if( isset($aluno) && $aluno['idcurso'] == 1 ){ ?>selected<?php } ?>>Técnico em informática para internet</option>
                                <option value="2" <?php if( isset($aluno) && $aluno['idcurso'] == 2 ){ ?>selected<?php } ?>>Técnico em Agropecuária</option>
                                <option value="3" <?php if( isset($aluno) && $aluno['idcurso'] == 3 ){ ?>selected<?php } ?>>Técnico em Viticultura e Enologia</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    
        
                    <div class="form-group row">
                        <input name="salvar" id="salvar" class="btn btn-primary col" type="submit" value="Salvar">
                        <input name="cancelar" id="cancelar" class="btn btn-danger col ml-1" type="reset" value="Cancelar">
                    </div>

                    
        
        
                </form>
       
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>
</body>

</html>