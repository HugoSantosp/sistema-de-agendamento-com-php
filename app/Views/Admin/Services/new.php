<?php echo $this->extend('Admin/Layout/main'); ?>


<!-- Titulo Dinâminco da Página Admin -->
<?php echo $this->section('title'); ?>

    <?php echo $title ?? ''; ?>

<?php echo $this->endSection(); ?>



<!-- Estilização da Página Admin -->
<?php echo $this->section('css'); ?>

<?php echo $this->endSection(); ?>



<!-- Conteudo da Página Admin --> 
<?php echo $this->section('content'); ?>

                 <!--    <h1 class="h3 mb-0 text-gray-800" ><?php echo $title; ?></h1> -->

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h3 mb-0 text-gray-800" ><?php echo $title; ?></h1>
            </div>
            
            <div class="card-body">

              <?php echo form_open(route_to('admin.services.create')); ?>



                  <div class="row">
                      <div class="form-gourp col-md-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
                        <?php  echo show_error_input('name'); ?>

                      </div>

                  </div>

                  <div class="mb-3 form-check">
                    <?php echo form_hidden('status', 0) ;?>
                    <input type="checkbox" name="status" value="1"   class="form-check-input" id="status">
                    <label class="form-check-label" for="status">Status do Registro</label>
                  </div>

                  <button type="submit" class="btn btn-primary">Salvar</button>
                  <a href="<?php echo route_to('admin.services'); ?>" class="btn btn-secondary ">Voltar</a>



              <?php echo form_close(); ?>

            </div>
        </div>
<?php echo $this->endSection(); ?>




<!-- Scripts da Página Admin -->
<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url('assets-admin/mask/jquery.mask.min.js'); ?>"> </script>
<script src="<?php echo base_url('assets-admin/mask/app.js');?>"> </script>

<?php echo $this->endSection(); ?>
