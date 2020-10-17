<?php
    include "model/conexao.php";


?>

<html>
  <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <title>CRUD - Chamados</title>
      <link rel="stylesheet" href="css/style.css">
      <script src="https://kit.fontawesome.com/9eb0318087.js" crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="container ">
      <h1>Chamados</h1>

      <br>
      <!-- Botão Modal Cadastro-->
      <div class="container">
          <div class="pull-right" id="btnAdc">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#adcModal"><i class="fas fa-plus"></i>
             Adicionar
            </button>
          </div>
      </div>

      <br>

    <!-- MODAL CADASTRO-->
    <div class="modal fade" id="adcModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cadastrar Chamado</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="frmNovo" name="frmNovo" method="POST" action="model/insChamado.php" enctype="multipart/form-data" data-toggle="validator">
                        <div class="form-group">
                            <label for="lblNum"><b>Número do Chamado</b></label>
                            <input type="text" class="form-control col-md-12 border border-dark" id="txtNumero" name="txtNumero" placeholder="Digite o Número do chamado" required>
                        </div>
                        <div class="form-group">
                            <label for="lblDescricao"><b>Descrição</b></label>
                            <input type="text" class="form-control col-md-12 border border-dark" id="txtDescricao" name="txtDescricao" placeholder="Digite a Descrição" required>
                        </div>
                        <div class="form-group">
                            <label for="lblVersao"><b>Versão</b></label>
                            <input type="text" class="form-control col-md-12 border border-dark" id="txtVersao" name="txtVersao" placeholder="Digite a versão" required>
                        </div>
                        <label for="lblAdm"><b>Corrigido? </b></label><br>
                          <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="txtCorrigido" id="txtCorrigido" value="0" />
                          <label class="form-check-label" for="inlineCheckbox1">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="txtCorrigido" id="txtCorrigido" value="1" />
                          <label class="form-check-label" for="inlineCheckbox2">Não</label>
                        </div>
                        <div class="modal-footer">
                      <div class="form-group row">
                        <div class="col-sm-10">
                          <input type="submit" name="CadastrarChamado" id="CadastrarChamado" value="Salvar" class="btn btn-success">
                        </div>
                      </div>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- TABELA COM OS DADOS -->
          <table class="table table-dark">
              <tr>
                  <th>ID</th>
                  <th>Número</th>
                  <th>Descrição</th>
                  <th>Versão</th>
                  <th>Corrigido</th>
                  <th colspan="2" width="40" class="text-center">OPERAÇÕES</th>
              </tr>
              <?php
              $result = Connection::SelectDB('SELECT * FROM chamados;');
        foreach($result as $linha) {
              ?>
                  <tr>
                      <td><?php echo $linha ['id'] ?></td>
                      <td> <?php echo $linha['numero'] ?></td>
                      <td> <?php echo $linha['descricao'] ?></td>
                      <td> <?php echo $linha['versao'] ?></td>
                      <td> <?php if($linha['corrigido'] == 0)
                                   echo "Sim";
                                   else echo "Não";
                      ?></td>
                      <td>
                         <button type="button" id="btEdit" class="btn btn-outline-warning" value='Editar' data-toggle="modal" data-target="#editarChamadosModal<?php echo $linha ['id'] ?>" > <i class="fas fa-pencil-alt"></i></button>
                      </td>
                      <td>
                          <button id="btRem" class="btn btn-outline-danger" value='Remover' data-toggle="modal" data-target="#delChamadosModal<?php echo $linha ['id'] ?>" > <i class="fas fa-eraser"></i></button>
                      </td>
                  </tr>
              <?php }?>
          </table>

<br>


    <!-- MODAL REMOVER-->
    <?php foreach($result as $linha) {?>
            <div class="modal fade" id="delChamadosModal<?php echo $linha['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-danger text-white">
                    DELETAR CHAMADO
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="frmDelEnder" name="frmEdtEnder" method="GET" action="model/delChamados.php" enctype="multipart/form-data" data-toggle="validator">
                    Você tem certeza que deseja remover o Chamado?
                    <br><br>
                    <div class="form-group">
                      <span class="text-xl font-weight-bold">ID:  </span>
                      <span class="text-xl font-weight-normal"><?php echo $linha['id'] ?></span>
                      <input type="hidden" id="txtId" name="txtId" value="<?php echo $linha['id']?>">
                    </div>
                    <div class="form-group">
                       <span class="text-xl font-weight-bold">Descricao:  </span>
                       <span class="text-xl font-weight-normal"><?php echo $linha['descricao'] ?></span>
                   </div>
                    <br>
                          <div class="modal-footer">
                        <div class="form-group row">
                            <input type="submit" name="DeletarChamado" id="DeletarChamado" value="Sim" class="btn btn-danger">
                            <input type="submit" name="CancelarChamado" id="CancelarChamado" value="Não" class="btn btn-success">
                        </div>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
            </div> <?php } ?>

            <!-- MODAL EDITAR-->
            <?php foreach($result as $linha) {?>
                    <div class="modal fade" id="editarChamadosModal<?php echo $linha['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Chamado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form id="frmEdtChamado" name="frmEdtChamado" method="POST" action="model/edtChamado.php" enctype="multipart/form-data" data-toggle="validator">
                              <div class="form-group">
                                 <label for="lblId">ID: <?php echo $linha ['id'] ?>
                                 <input type="hidden" id="id" name="id" value="<?php echo $linha ['id'] ?>" >
                             </div>
                             <div class="form-group">
                                <label for="lblNum"><b>Número do Chamado</b></label>
                                <input type="text" class="form-control col-md-12 border border-dark" id="txtNumero" name="txtNumero" value="<?php echo $linha['numero']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="lblDescricao"><b>Descrição</b></label>
                                <input type="text" class="form-control col-md-12 border border-dark" id="txtDescricao" name="txtDescricao" value="<?php echo $linha['descricao']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="lblVersao"><b>Versão</b></label>
                                <input type="text" class="form-control col-md-12 border border-dark" id="txtVersao" name="txtVersao" value="<?php echo $linha['versao']?>" required>
                            </div>
                            <label for="lblAdm"><b>Corrigido? </b></label><br>
                              <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="txtCorrigido" id="txtCorrigido" value="0" <?php echo ($linha['corrigido'] == 0) ? "checked" : null; ?> />
                              <label class="form-check-label" for="inlineCheckbox1">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="txtCorrigido" id="txtCorrigido" value="1" <?php echo ($linha['corrigido'] == 1) ? "checked" : null; ?> />
                              <label class="form-check-label" for="inlineCheckbox2">Não</label>
                            </div>
                                  <div class="modal-footer">
                                <div class="form-group row">
                                  <div class="col-sm-10">
                                    <input type="submit" name="EditarChamado" id="EditarChamado" value="Salvar" class="btn btn-outline-success">
                                  </div>
                                </div>
                                </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div> <?php } ?>

                    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
      
  </body>
</html>