<?php echo $this->extend('Admin/Layout/main'); ?>


<!-- Titulo Dinâminco da Página Admin -->
<?php echo $this->section('title'); ?>

    <?php echo $title ?? ''; ?>

<?php echo $this->endSection(); ?>



<!-- Estilização da Página Admin -->
<?php echo $this->section('css'); ?>
<link href="<?php echo base_url('assets-admin/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php echo $this->endSection(); ?>



<!-- Conteudo da Página Admin -->
<?php echo $this->section('content'); ?>

                 <!--    <h1 class="h3 mb-0 text-gray-800" ><?php echo $title; ?></h1> -->

                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                        <h1 class="h3 mb-0 text-gray-800" ><?php echo $title; ?></h1>
                             <a href="<?php echo route_to('admin.services.new') ?>" class=" btn btn-success btn-sm  float-right ">Nova Unidade</a>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">

                                <?php echo $services; ?>
                                
                            </div>
                        </div>
                    </div>
<?php echo $this->endSection(); ?>




<!-- Scripts da Página Admin -->
<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url('assets-admin/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets-admin/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets-admin/') ?>js/demo/datatables-demo.js"></script>
<?php echo $this->endSection(); ?>
