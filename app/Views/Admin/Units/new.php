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

              <?php echo form_open(route_to('admin.units.create')); ?>



                  <div class="row">
                      <div class="form-gourp col-md-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
                        <?php  echo show_error_input('name'); ?>

                      </div>

                      <div class="form-group col-md-2">
                        <label for="phone" class="form-label">Telefone</label>
                        <input type="tel" class="form-control phone_with_ddd" name="phone"  id="phone" aria-describedby="phoneHelp">
                        <?php echo show_error_input('phone'); ?>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="coordinator" class="form-label">Coordenador</label>
                        <input type="text" class="form-control" name="coordinator"  id="coordinator" aria-describedby="coordinatorHelp">
                        <?php echo show_error_input('coordinator'); ?>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="adress" class="form-label">Endereço</label>
                        <input type="text" class="form-control" name="adress"  id="adress" aria-describedby="adressHelp">
                        <?php echo show_error_input('adress'); ?>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-gourp col-md-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email"  id="email" aria-describedby="emailHelp">
                        <?php echo show_error_input('email'); ?>
                      </div>

                      <div class="form-group col-md-2">
                        <label for="starttime" class="form-label">Início</label>
                        <input type="time" class="form-control" name="starttime"  id="starttime" aria-describedby="starttimeHelp">
                        <?php echo show_error_input('starttime'); ?>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="endtime" class="form-label">Término</label>
                        <input type="time" class="form-control" name="endtime" id="endtime" aria-describedby="endtimeHelp">
                        <?php echo show_error_input('endtime'); ?>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="servicetime" class="form-label">Tempo de Serviço</label>
                        <?php echo $timesInterval; ?>
                        <?php echo show_error_input('coordinator'); ?>
                      </div>
                  </div>

                  <div class="mb-3 form-check">
                    <?php echo form_hidden('status', 0) ;?>
                    <input type="checkbox" name="status" value="1"   class="form-check-input" id="status">
                    <label class="form-check-label" for="status">Status do Registro</label>
                  </div>

                  <button type="submit" class="btn btn-primary">Salvar</button>
                  <a href="<?php echo route_to('admin.units'); ?>" class="btn btn-secondary ">Voltar</a>



              <?php echo form_close(); ?>

            </div>
        </div>
<?php echo $this->endSection(); ?>




<!-- Scripts da Página Admin -->
<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url('assets-admin/mask/jquery.mask.min.js'); ?>"> </script>
<script src="<?php echo base_url('assets-admin/mask/app.js');?>"> </script>

<?php echo $this->endSection(); ?>
