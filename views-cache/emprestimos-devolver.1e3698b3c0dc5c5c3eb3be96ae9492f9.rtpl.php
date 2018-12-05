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

    <form method="post" id="form" onsubmit="if(!livro) return false">
        
        <div class="form-row" id="livro-row">
            <div class="col">
                <div class="form-group row">

                    <label for="nome" class="col-sm-2 col-form-label">Codigo de barras:</label>
                    <div class="col-sm-10">

                        <input type="number" name="exemplar" id="exemplar" class="form-control" placeholder="Codigo de barras"
                            value="" autofocus>
                        <label id="exemplar-error" class="is-invalid text-danger" for="exemplar" style="display: none;">Este
                            campo é requerido.</label>
                    </div>
                </div>
                <input type="hidden" id="idEmprestimo" name="idEmprestimo">
                <input type="hidden" id="idExemplar" name="idExemplar">

                <div class="form-group row">

                    <label for="nome" class="col-sm-2 col-form-label">Nome do livro:</label>
                    <div class="col-sm-10">

                        <input type="text" name="nomeLivro" id="nomeLivro" class="form-control" placeholder="Nome do Livro"
                            disabled value="">
                    </div>
                </div>
                <div class="form-group row">

                    <label for="nome" class="col-sm-2 col-form-label">Volume do livro:</label>
                    <div class="col-sm-10">

                        <input type="text" name="volumeLivro" id="volumeLivro" class="form-control" placeholder="Volume do Livro"
                            disabled value="">
                    </div>
                </div>
                <div class="form-group row">

                    <label for="nome" class="col-sm-2 col-form-label">Autor do livro:</label>
                    <div class="col-sm-10">

                        <input type="text" name="autorLivro" id="autorLivro" class="form-control" placeholder="Autor do Livro"
                            disabled>
                    </div>
                </div>
                <div class="form-group row">

                    <label for="nome" class="col-sm-2 col-form-label">Status do livro:</label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="statusLivro" name="statusLivro" checked>
                            <label class="custom-control-label" for="statusLivro">Utilizavel</label>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-2">

                <img id="fotoLivro" src="" class="img-thumbnail">
            </div>
        </div>

        <h2 class="text-center my-4">Aluno</h2>
        <div class="form-group row">

            <label for="nome" class="col-sm-2 col-form-label">Nome do Aluno:</label>
            <div class="col-sm-10">

                <input type="text" name="aluno" id="aluno" class="form-control" placeholder="Nome do Aluno" disabled>
            </div>
        </div>
        <div class="form-group row">

            <label for="nome" class="col-sm-2 col-form-label">Matricula do Aluno:</label>
            <div class="col-sm-10">

                <input type="text" name="matricula" id="matricula" class="form-control" placeholder="Matricula do Aluno"
                    disabled>
            </div>
        </div>

        <div class="form-group row">

            <label for="nome" class="col-sm-2 col-form-label">Data do emprestimo:</label>
            <div class="col-sm-10">

                <input type="date" name="data" id="data" class="form-control" disabled>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
    crossorigin="anonymous"></script>

<script type="text/javascript" src="/res/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/res/js/additional-methods.min.js"></script>
<script type="text/javascript" src="/res/js/localization/messages_pt_BR.js"></script>



<script>
    var livro = false;
    $(document).ready(function () {

        $(window).keydown(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });

        $("#exemplar").change(function () {
            $.ajax({
                method: "POST",
                url: "/api/exemplares/info",
                data: {
                    id: this.value
                },
                dataType: "json",

            }).done(function (e) {
                console.log(e);
                if (e.status) {
                    $("#exemplar-error").hide();
                    $("#nomeLivro").val(e.livro.nome);
                    $("#volumeLivro").val(e.livro.volume);
                    $("#autorLivro").val(e.livro.autor);


                    if (e.emprestado) {
                        livro = true;
                        $("#aluno").val(e.emprestimo.aluno);
                        $("#matricula").val(e.emprestimo.matricula);
                        $("#data").val(e.emprestimo.dataregistro.split(" ")[0]);
                        $("#exemplar").removeClass("is-invalid");
                        $("#exemplar").addClass("is-valid");
                        $("#idEmprestimo").val(e.emprestimo.id);
                        $("#idExemplar").val(e.livro.id);
                    } else {
                        $("#exemplar-error").html("Livro não emprestado!");
                        $("#exemplar-error").show();
                        $("#exemplar").removeClass("is-valid");
                        $("#exemplar").addClass("is-invalid");

                        $("#aluno").val("");
                        $("#matricula").val("");
                        $("#data").val("");
                        livro = false;
                    }

                    if (e.livro.urlfoto) {
                        $("#fotoLivro").attr('src', '/res/img/livros_capas/' + e.livro.urlfoto);
                    }
                } else {
                    livro = false;
                    $("#exemplar-error").html("Livro Não cadastrado!");
                    $("#exemplar-error").show();
                    $("#exemplar").removeClass("is-valid");
                    $("#exemplar").addClass("is-invalid");

                    $("#nomeLivro").val("");
                    $("#volumeLivro").val("");
                    $("#autorLivro").val("");
                    $("#fotoLivro").attr('src', "");

                    $("#aluno").val("");
                    $("#matricula").val("");
                    $("#data").val("");
                }
            });

        });



    });


</script>

</body>

</html>