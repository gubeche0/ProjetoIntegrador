<!doctype html>
<html lang="en">

<head>
    <title>Vaccinare</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-inverse navbar-expand-xl navbar-dark bg-secondary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Vaccinare</a>

            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="Criancas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fas fa-user"></i> Crianças</a>
                        <div class="dropdown-menu" aria-labelledby="Criancas">
                            <a class="dropdown-item" href="listarcriancas.php"><i class="fas fa-list"></i> Listar</a>
                            <a class="dropdown-item" href="cadcrianca.php"><i class="fas fa-plus"></i> Adicionar</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="Vacinas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fa fa-syringe" style="color:white;"></i> Vacinas</a>
                        <div class="dropdown-menu" aria-labelledby="Vacinas">
                            <a class="dropdown-item" href="listvacina.php"><i class="fas fa-list"></i> Listar</a>
                            <a class="dropdown-item" href="cadvacina.php"><i class="fas fa-plus"></i> Adicionar</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sair.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </li>
                </ul>



            </div>

        </div>
    </nav>

    <div class="container">
        
        <form action="cadvacina.php" method="post">

            

            <div class="form-group row">
                <label for="cor" class="col-sm-2 col-form-label">Criança:</label>
                <div class="col-sm-10">
                    <select name="crianca" id="crianca" class="form-control">
                      
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="cor" class="col-sm-2 col-form-label">Vacina:</label>
                <div class="col-sm-10">
                    <select name="tipo" id="tipo" class="form-control">
                        
                    </select>
                </div>
            </div>


            <div class="form-group row">

                <label for="nome" class="col-sm-2 col-form-label">Lote:</label>
                <div class="col-sm-10">

                    <input type="text" name="lote" id="lote" class="form-control" placeholder="lote" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="data" class="col-sm-2 col-form-label">Data:</label>
                <div class="col-sm-10">
                    <input type="date" id="data" name="data" class="form-control" required>
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