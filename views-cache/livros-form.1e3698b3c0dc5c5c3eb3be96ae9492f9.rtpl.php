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

            <form method="post" enctype="multipart/form-data" id="form">
                    
                    <div class="form-group row">
        
                        <label for="nome" class="col-sm-2 col-form-label">ISBN:</label>
                        <div class="col-sm-10">
        
                            <input type="text" name="isbn" id="isbn" class="form-control" placeholder="ISBN" required value='<?php if( isset($livro) ){ ?><?php echo htmlspecialchars( $livro["isbn"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>' <?php if( isset($livro) ){ ?>readonly<?php }else{ ?>autofocus<?php } ?>>
                        </div>
                    </div> 
                    
                    <div class="form-group row">
        
                        <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
                        <div class="col-sm-10">
        
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required value='<?php if( isset($livro) ){ ?><?php echo htmlspecialchars( $livro["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>' <?php if( !isset($livro) ){ ?>autofocus<?php } ?>>
                        </div>
                    </div> 

                    <div class="form-group row">
        
                        <label for="nome" class="col-sm-2 col-form-label">Volume:</label>
                        <div class="col-sm-10">
        
                            <input type="text" name="volume" id="volume" class="form-control" placeholder="Volume" required value='<?php if( isset($livro) ){ ?><?php echo htmlspecialchars( $livro["volume"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>'>
                        </div>
                    </div> 

                    <div class="form-group row">
        
                        <label for="nome" class="col-sm-2 col-form-label">Autor:</label>
                        <div class="col-sm-10">
        
                            <input type="text" name="autor" id="autor" class="form-control" placeholder="autor" required value='<?php if( isset($livro) ){ ?><?php echo htmlspecialchars( $livro["autor"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="categoria" class="col-sm-2 col-form-label">Categoria:</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="categoria" id="categoria">
                                <?php $counter1=-1;  if( isset($categorias) && ( is_array($categorias) || $categorias instanceof Traversable ) && sizeof($categorias) ) foreach( $categorias as $key1 => $value1 ){ $counter1++; ?>

                                    <option value="<?php echo htmlspecialchars( $value1['id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( isset($livro) && $livro['categoria'] == $value1['id'] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
        
                        <label for="nome" class="col-sm-2 col-form-label">Foto do livro:</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="foto">Escolher arquivo</label>
                              </div>
                            
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

    <script type="text/javascript" src="/res/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/res/js/additional-methods.min.js"></script>
    <script type="text/javascript" src="/res/js/localization/messages_pt_BR.js"></script>
    <script type="text/javascript" src="/res/js/validacao.js"></script>
</body>

</html>