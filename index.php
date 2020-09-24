<html>

<head>
  <meta charset="utf-8" />
  <title>Reserva Hotel</title>

  <!-- Bootstrap início -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Bootstrap fim -->

  <!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

  <script src="app.js"></script>

</head>

<body>
  <header>
    <nav class="bg-info navbar navbar-expand-xl navbar-light">
      <div class="container">
        <a href="index.php" class="navbar-brand d-none d-md-block"><img src="hotel.png" width="40"></a>
        <div class="w-75">
          <h2 style="text-align: center;">Sistema Hotel</h2>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navHamburger">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navHamburger">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a href="index.php" class="nav-link">Novo Registro</a>
            </li>

            <li class="nav-item">
              <a href="registros.php" class="nav-link">Registros</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

  </header>
  <form action="processa_envio.php" method="post">
    <div class="container">

      <div class="row">
        <div class="col p-4 mt-5">
          <h1 class="display-4"> Novo Registro</h1>
        </div>
      </div>


      <div class="row mb-2">

        <div class="col-md-3">
          <input name="nome" type="text" class="form-control" placeholder="Nome Reservante" />
        </div>
        <div class="col-md-3">
          <input name="cpf" type="text" class="form-control" placeholder="CPF(Apenas Números)" onkeypress="onlyNumbers(event)" />
        </div>

        <div class="col-md-2">
          <select name="ano" class="form-control">
            <option value="">Ano</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
          </select>
        </div>
        <div class="col-md-2">
          <select name="mes" class="form-control">
            <option value="">Mês</option>
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
        <div class="col-md-2">
          <input name="dia" type="text" class="form-control" placeholder="Dia" onkeypress="onlyNumbers(event)" />
        </div>


      </div>
      <div class="row">


        <div class="col-md-4">
          <select name="apartamento" class="form-control" id="apartamento" onchange="codAP()">
            <option value="">Selecionar Apartamento</option>
            <option value="ap1">Apartamento 1</option>
            <option value="ap2">Apartamento 2</option>
            <option value="ap3">Apartamento 3</option>
            <option value="ap4">Apartamento 4</option>
            <option value="ap5">Apartamento 5</option>
          </select>
        </div>

        <div class="col-md-2">
          <input readonly name="valordiaria" type="text" class="form-control" placeholder="Valor Diária" id="valordiaria" />
        </div>

        <div class="col-md-2">
          <input name="qtddiarias" type="text" class="form-control" placeholder="Qtd. Diárias" id="qtddiarias" onkeyup="calcValorTotal()" onkeypress="onlyNumbers(event)" />
        </div>

        <div class="col-md-3">
          <input readonly name="total" type="text" class="form-control" placeholder="Valor Total" id="valortotal" />
        </div>
        <div class="col-md-1 d-flex justify-content-end">
          <button type="submit" class="btn btn-info text-light">
            <i class="fas fa-plus"></i>
          </button>
        </div>
      </div>

    </div>
  </form>
  <?php
  if (isset($_GET['retorno']) and $_GET['retorno'] == 'erro') { ?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#erromodal').modal('show');
    });
</script>
 <?php } elseif(isset($_GET['retorno']) and $_GET['retorno'] == 'sucesso') { ?>
  <script type="text/javascript">
    $(window).on('load',function(){
        $('#sucessomodal').modal('show');
    });
</script>
  <?php } ?>

<!-- Modal de erro -->
<div class="modal fade" id="erromodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Registro incompleto!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Por favor, preencha todos os campos para prosseguir com o registro
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">fechar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="sucessomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success " id="exampleModalLabel">Sucesso!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Registro realizado com sucesso
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">fechar</button>
      </div>
    </div>
  </div>
</div>
 
</body>

</html>