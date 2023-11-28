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

                <?php echo form_open(route_to('admin.units.update', $unit->id), hidden: ['_method' =>'PUT']); ?>

                <?php echo $this->include('/Admin/Units/_form') ?>

                
                <?php echo form_close(); ?>
              
            </div>
        </div>
<?php echo $this->endSection(); ?>




<!-- Scripts da Página Admin -->
<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url('assets-admin/mask/app.js');?>"> </script>
<script src="<?php echo base_url('assets-admin/mask/jquery.mask.min.js'); ?>"> </script>


<?php echo $this->endSection(); ?>
