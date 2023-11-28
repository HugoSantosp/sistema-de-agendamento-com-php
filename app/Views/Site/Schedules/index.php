<?php echo $this->extend('Site/Layout/main'); ?>


<!-- Sessão de Titulo de página -->

<?php echo $this->section('title'); ?>

    <?php echo $title ?? ''; ?>

<?php echo $this->endSection(); ?>




<!-- Sessão de Estila da página -->

<?php echo $this->section('css'); ?>

<?php echo $this->endSection(); ?>
 



<?php echo $this->section('content'); ?>

<section class="services-schadules" id="services">

        <h1 class="heading-schedules"> Realize seu <span>Agendamento</span> </h1>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-user"></i>
                <h3>Autentique-se</h3>
                <p>Faça o Login ou Cadastre-se</p>
            </div>

            <div class="box">
                <i class="fas fa-building"></i>
                <h3>Escolha Unidade</h3>
                <p>Onde Gostaria de Ser Atendido ? </p>
            </div>

            <div class="box">
                <i class="fas fa-user-md"></i>
                <h3>Profissional</h3>
                <p>Com quem Gostaria de Ser Atendido ? </p>
            </div>

            <div class="box">
                <i class="fas fa-calendar"></i>
                <h3>Escolha uma Data</h3>
                <p>Escolha a melhor data e horário para o atendimento.</p>
            </div>

            <div class="box">
                <i class="fas fa-check"></i>
                <h3>Confirme</h3>
                <p>Certifique-se de que seus dados forma totalmente preenchidos.</p>
            </div>

            <div class="box">
            <!--  <i class="fas fa-heartbeat"></i> -->
                <h3>tudo pronto ?</h3>
                <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p> -->
                <a href="<?php echo route_to('schedules.new'); ?>" class="btn"> Criar Agendamento <span class="fas fa-chevron-right"></span> </a>
            </div> 

        </div>


</section>

<?php echo $this->endSection(); ?>




<!-- Sessão de scripts  -->

<?php echo $this->section('scripts'); ?>


<?php echo $this->endSection(); ?>
