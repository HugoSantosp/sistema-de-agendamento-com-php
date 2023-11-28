<?php echo $this->extend('Admin/Layout/main'); ?>


<!-- Sessão de Titulo de página -->

<?php echo $this->section('title'); ?>

    <?php echo $title ?? ''; ?>

<?php echo $this->endSection(); ?>



<!-- Sessão de Estila da página -->


<?php echo $this->section('css'); ?>


<?php echo $this->endSection(); ?>



<!-- Sessão de Conteudo da página -->


<?php echo $this->section('content'); ?>

<h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>

<?php echo $this->endSection(); ?>




<!-- Sessão de scripts  -->


<?php echo $this->section('scripts'); ?>



<?php echo $this->endSection(); ?>
