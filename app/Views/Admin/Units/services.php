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
                             <a href="<?php echo route_to('admin.units') ?>" class=" btn btn-secondery btn-sm  float-right ">Voltar</a>
                        </div>
                        
                        <div class="card-body">
                            <?php echo form_open(route_to('admin.units.services.store', $unit->id), hidden:['_method' => 'PUT']) ?>
                                    <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                                    <button type="button" id="btnToogleAll" class="btn btn-sm btn-primary mt-1 badge-primary mb-1 ">Marcar Todos</button>

                                    <?php echo $servicesOptions;  ?>
                            <?php echo form_close()?>
                        </div>
                    </div>
<?php echo $this->endSection(); ?>




<!-- Scripts da Página Admin -->
<?php echo $this->section('scripts'); ?>


<script>
document.getElementById('btnToogleAll').addEventListener('click', () => {
    
    const services =  document.getElementsByName('services[]');
    services.forEach(element => {
        element.checked = !element.checked
    })
    

})




</script>



<?php echo $this->endSection(); ?>
