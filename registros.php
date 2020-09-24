<?php
$avisoReadme = null;
try {
    $conexao = new PDO('mysql:host=localhost;dbname=sistema_hotel', 'root', '');

    $query = "
        SELECT * FROM `tb_registros`    
        ";


    $retorno = $conexao->query($query);
    $registros = $retorno->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
 // echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
  $avisoReadme = $e->getCode();
}


?>

<html>

<head>
    <meta charset="utf-8" />
    <title>Registros</title>

    <!-- Bootstrap início -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap fim -->

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

    <script src="app.js"></script>
    <style>
        body { overflow-x: hidden; }
    </style>

</head>

<body>
    <header>
        <nav class="bg-info navbar navbar-expand-xl navbar-light">
            <div class="container">
                <a href="index.php" class="navbar-brand d-none d-sm-block"><img src="hotel.png" width="40"></a>
                <div class="w-75">
                    <h2 style="text-align: center;">Sistema Hotel</h2>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navHamburger">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navHamburger">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Novo Registro</a>
                        </li>

                        <li class="nav-item active">
                            <a href="registros.php" class="nav-link">Registros</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <div class="row">
        <div class="col p-4 mt-5 ml-5">
            <h1 class="display-4"> Registros</h1>
        </div>

    </div>
    <nav class="sticky-top">
        <div class="bg-secondary text-light d-none d-md-block">
            <div class="ml-5">
                <div class="row">
                    <div class="col-md-2 d-none d-md-block mt-3">NOME</div>
                    <div class="col-md-2 d-none d-md-block mt-3">CPF</div>
                    <div class="col-md-1 d-none d-md-block mt-3">DATA</div>
                    <div class="col-md-1 d-none d-md-block mt-3">Ap</div>
                    <div class="col-md-1 d-none d-md-block mt-3">DIÁRIA</div>
                    <div class="col-md-1 d-none d-md-block mt-3">Nº DIÁRIAS</div>
                    <div class="col-md-1 d-none d-md-block mt-3">TOTAL</div>
                    <div class="col-md-1 d-none d-md-block mt-3">REGISTRO</div>
                    <div class="col-md-1 d-none d-md-block "></div>
                    <div class="col-md-1 d-none d-md-block "></div>
                </div>
            </div>
            <hr>
        </div>
    </nav>
    <?php 
    
    if ($avisoReadme == "1049") {
        ?>
        
        <h2 style="text-align: center;">Para pelo funcionamento do sistema, seguir as instruções contidas em </h2>
        <br>
        <h2 style="text-align: center;">"readme.md", caso nao tenha o arquivo, pode encontrar o mesmo em:</h2>
        <br>
        <h2 style="text-align: center;"><a href="https://github.com/pliniodossantos/Meu-Primeiro-Sistema">https://github.com/pliniodossantos/Meu-Primeiro-Sistema</a></h2>
        <?php
    }else{
    foreach ($registros as $key => $value){ ?>

        <div class="ml-5">
            <div class="row">
                <div class="col-md-2"><?php echo $value['nome']; ?></div>
                <div class="col-md-2"><?php echo $value['cpf']; ?></div>
                <div class="col-md-1"><?php echo $value['data']; ?></div>
                <div class="col-md-1"><?php echo $value['apartamento']; ?></div>
                <div class="col-md-1"><?php echo $value['valor_diaria']; ?></div>
                <div class="col-md-1"><?php echo $value['qtd_diarias']; ?></div>
                <div class="col-md-1"><?php echo $value['valor_total']; ?></div>
                <div class="col-md-1"><?php echo $value['id']; ?></div>
                <!-- remove edit -->
                <form action="remove.php" method="post" style="margin-bottom: 0px;">
                    <div class="col-md-1"><button type="submit" class="btn btn-info btn-sm text-light">
                            <i class="fas fa-trash-alt"></i>
                        </button></div>
                    <select name="id" style="display: none">
                        <option value="<?php echo $value['id']; ?>"></option>
                    </select>
                </form>
                <!-- btn edit -->
                <form action="edita.php" method="post" style="margin-bottom: 0px;" class="ml-1">
                    <div class="col-md-1"><button type="submit" class="btn btn-info btn-sm text-light">
                            <i class="fas fa-edit"></i>
                        </button></div>
                    <select name="id" style="display: none">
                        <option value="<?php echo $value['id']; ?>"></option>
                    </select>
                </form>

            </div>
        </div>



        <hr>

    <?php } }?>


    <?php if (isset($_GET['retornoedit'])) { ?>


        <?php
        try {
            $conexao = new PDO('mysql:host=localhost;dbname=sistema_hotel', 'root', '');

            $query = " 
    SELECT * FROM tb_registros WHERE tb_registros.id =" . $_GET['retornoedit'];



            $retorno = $conexao->query($query);
            $retornoedit = $retorno->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
        }
        foreach ($retornoedit as $key => $value) { ?>
            <script type="text/javascript">
                $(window).on('load', function() {
                    $('#editormodal').modal('show');
                });
            </script>
            <?php  $dataArray = explode('-',$value['data']);

            ?>
            <!-- Large modal -->

            <div class="modal fade bd-example-modal-lg" id="editormodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="registraedita.php" method="post">
                            <div class="">

                                <div class="">
                                    <input name="nome" type="text" class="form-control" placeholder="Nome Reservante" value="<?php echo $value['nome']; ?>" />
                                </div>
                                <div class="">
                                    <input name="cpf" type="text" class="form-control" placeholder="CPF" onkeypress="onlyNumbers(event)" value="<?php echo $value['cpf']; ?>" />
                                </div>

                                <div class="">
                                    <select name="ano" class="form-control">
                                        <option value="<?php echo$dataArray['0']?>"><?php echo$dataArray['0']?></option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                    </select>
                                </div>
                                <div class="">
                                    <select name="mes" class="form-control">
                                        <option value="<?php echo$dataArray['1'] ?>">Mês - <?php echo$dataArray['1']?></option>
                                        <option value="01">Janeiro</option>
                                        <option value="02">Fevereiro</option>
                                        <option value="03">Março</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Maio</option>
                                        <option value="06">Junho</option>
                                        <option value="07">Julho</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Setembro</option>
                                        <option value="10">Outubro</option>
                                        <option value="11">Novembro</option>
                                        <option value="12">Dezembro</option>
                                    </select>
                                </div>
                                <div class="">
                                    <input name="dia" type="text" class="form-control" value="<?php echo$dataArray['2'] ?>" placeholder="Dia" onkeypress="onlyNumbers(event)" />
                                </div>

                                <div class="">
                                    <select name="apartamento" class="form-control" id="apartamento" onchange="codAP()">
                                        <option value="<?php echo $value['apartamento']; ?>"><?php echo $value['apartamento']; ?></option>
                                        <option value="ap1">Apartamento 1</option>
                                        <option value="ap2">Apartamento 2</option>
                                        <option value="ap3">Apartamento 3</option>
                                        <option value="ap4">Apartamento 4</option>
                                        <option value="ap5">Apartamento 5</option>
                                    </select>
                                </div>

                                <div class="">
                                    <input readonly name="valordiaria" type="text" class="form-control" placeholder="Valor Diária" id="valordiaria" value="<?php echo $value['valor_diaria']; ?>" />
                                </div>

                                <div class="">
                                    <input name="qtddiarias" type="text" class="form-control" placeholder="Qtd. Diárias" id="qtddiarias" onkeyup="calcValorTotal()" onkeypress="onlyNumbers(event)" value="<?php echo $value['qtd_diarias']; ?>" />
                                </div>

                                <div class="">
                                    <input readonly name="total" type="text" class="form-control" placeholder="Valor Total" id="valortotal" value="<?php echo $value['valor_total']; ?>" />
                                </div>
                                <input type="text"  style="display: none;" name="id" value="<?php echo $_GET['retornoedit']?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fechar</button>
                                    <button type="submit" class="btn btn-dark">salvar</button>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>


    <?php  }
    } ?>

<?php if (isset($_GET['editmsg']) and $_GET['editmsg'] == 'erro') { ?>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#erroedit').modal('show');
        });
    </script>
<div class="modal fade" id="erroedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLongTitle">Erro!!! </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="text-danger font-weight-bold mr-5" style="text-decoration: underline;">Favor preencher todos os campos!</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">fechar</button>
      </div>
    </div>
  </div>
</div>

<?php } ?>
<?php if (isset($_GET['editmsg']) and $_GET['editmsg'] == 'sucesso') { ?>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#sucessoedit').modal('show');
        });
    </script>
<div class="modal fade" id="sucessoedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLongTitle">Sucesso!!! </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="text-success font-weight-bold mr-5" style="text-decoration: underline;">Modificações Realizadas com sucesso!</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">fechar</button>
      </div>
    </div>
  </div>
</div>

<?php } ?>

</body>

</html>