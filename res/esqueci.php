<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Vaccinare</title>
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">

</head>

<body class="">
    <form class="form-signin col-sm-3 mx-auto " style="margin-top: 8%;" method="post">
        <div class="">
            

            <h1 class="h3 mb-3 font-weight-normal text-center">Redefinir sua senha</h1>
            <p class="mb-3 h5">Para redefinir sua senha, insira o seu endereço de email:</p>
            <label for="email" class="sr-only">Endereço de email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Endereço de email" required autofocus>

        </div>
        
        
        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Redefinir</button>
        
    </form>

    
        <div class="col-sm-4 mx-auto mt-5">
            <p>Foi enviado um email com as instrunçoes para redefinir a senha para o email: <span class="text-danger"> <?= $_POST["email"] ?> </span> caso ele esteja registrado no sistema. </p>
            <a href="login.php">Voltar</a>
        </div>
}
?>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>
</body>

</html>