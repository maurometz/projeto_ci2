<?php
    $usuario = $this->session->userdata("usuario_logado");
    // if(!$usuario) {
    //     redirect("/");
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Listagem de Membros da Staff</h1>
            <div class="row">
                <h3> <?= $comissaotecnica->num_rows(); ?> registro(s) </h3>
            </div>

            <?php echo form_open('usuario/pesquisaS', 'method="get'); ?>
            <table>
                <tr>
                    <td><input placeholder="Nome do staff" type="text" name="nome"> </td>
                    <td><input type="submit" value="Pesquisar"> </td>
                </tr>
            </table>

            <!-- <?php if ($usuario["tipo"]=="adm") { ?> -->
            <a href="<?php echo base_url('usuario/exportaP'); ?>" class="link blue float-right">Exportar Staff</a>
            <!-- <?php } ?> -->

        <?php if ($comissaotecnica->num_rows() > 0) { ?>
            <table class="table table-striped">
                <thead>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Apelido</th>
                            <th>Função</th>
                            <th>Gênero<th>
                            <th>Dias de Contrato</th>  
                            <th>Anos de Experiência</th>
                            <!-- <?php if ($usuario["tipo"]=="adm") { ?> -->
                            <th>Ações<th>
                            <!-- <?php } ?> -->
                </thead>
                <tbody>
                    <?php foreach($comissaotecnica -> result() as $cadastroS) { ?>
                    <tr>
                            <td><?= $cadastroS->id ?> Id</td>
                            <td><?= $cadastroS->nome ?></td>
                            <td><?= $cadastroS->apelido ?></td>
                            <td><?= $cadastroS->funcao ?></td>
                            <td><?= $cadastroS->genero ?></td>
                            <td><?= $cadastroS->email ?></td>
                            <td><?= $cadastroS->diasContrato ?></td>
                            <td><?= $cadastroS->anosExperiencia ?></td>
                            <!-- <?php if ($usuario["tipo"]=="adm") { ?> -->
                            <td><?= anchor("usuario/editarS/$cadastroS->id", "Editar") ?> 
                            <a href="#" class='confirma_exclusao' 
                            data-id="<?= $cadastroS->id ?>" 
                            data-nome="<?= $cadastroS->nome ?>" />Excluir</a> </td>
                            <!-- <?php } ?> -->
                    </tr>
                  <?php  } ?>
                </tbody>
            </table>
            <?php
                echo $this->pagination->create_links();
            ?>

        <?php } ?>

        </div>

        <!-- <?= anchor("usuario/excluirS/$cadastroS->id", "Excluir") ?></td> -->

        <div class="modal fade" id="modal_confirmation">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Confirmação de Exclusão</h4>
        </div>
        <div class="modal-body">
            <p> Deseja realmente excluir o registro <strong><span id="nome_exclusao"></span></strong>?</p>
        </div>    
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"> Agora não </button>
            <button type="button" class="btn btn-danger" id="btn_excluir"> Sim, confirmar. </button>
        </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <script>
        var base_url = "<?=base_url(); ?>";
            $(function(){
                $('.confirma_exclusao').on('click', function(e){
                    e.preventDefault();
                    var nome = $(this).data('nome');
                    var id = $(this).data('id');

                    $('#modal_confirmation').data('nome', nome);
                    $('#modal_confirmation').data('id', id);
                    $('#modal_confirmation').modal('show');
                });

            $('#modal_confirmation').on('show.bs.modal', function(){
                var nome = $(this).data('nome');
                $('nome_exclusao').text(nome);
            });
            $('#btn_excluir').click(function(){
                var id = $('#modal_confirmation').data('id');
                document.location.href = base_url + "usuario/excluirS/" + id;
            });
        });
                
                </script>                    
    
</body>
</html>