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
        
                        <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
                        <div class="col-sm-10">
        
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required value='<?php if( isset($curso) ){ ?><?php echo htmlspecialchars( $curso["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>' autofocus>
                        </div>
                    </div>
                    
                    <div class="form-group row">
        
                        <label for="nome" class="col-sm-2 col-form-label">Abreviacao:</label>
                        <div class="col-sm-10">
        
                            <input type="text" name="abreviacao" id="abreviacao" class="form-control" placeholder="Abreviacao" required value='<?php if( isset($curso) ){ ?><?php echo htmlspecialchars( $curso["abreviacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>'>
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