<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestão Livros IFRS</title>
    <link rel="shortcut icon" href="/res/ifrs.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">

</head>

<body>

    <div id="erros">
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

    </div>
    
    <form class="form-signin col-sm-3 mx-auto " style="margin-top: 8%;" method="post" action="/login">
        <div class="text-center">
            <img class="mb-4" src="/res/if-logo.png" alt="Logo do IFRS" width="100" />

            <h1 class="h3 mb-3 font-weight-normal">Login</h1>
            <label for="email" class="sr-only">Endereço de email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Endereço de email" required autofocus>
            <label for="pass" class="sr-only">Senha</label>
            <input type="password" id="pass" name="pass" class="form-control" placeholder="Senha" required>
            <div class=" form-group text-justify mt-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="lembrar" name="lembrar" >
                    <label class="custom-control-label" for="lembrar">Continuar Logado</label>

                </div>
            </div>
        </div>
        
        <a href="#" class="ml-1">Esqueci a senha</a>
        <button class="btn btn-lg btn btn-success btn-block mt-3" type="submit">Entrar</button>
        
    </form>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>
</body>

</html>