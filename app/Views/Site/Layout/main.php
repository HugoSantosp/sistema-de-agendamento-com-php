<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica | <?php echo $this->renderSection('title') ?> </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?php echo base_url('assets-site/')?>css/style.css">
   
    <?php echo $this->renderSection('css') ?>

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> medcare. </a>

    <nav class="navbar">
        <a href="/">home</a>
        <a href="#services">Serviços</a>
        <a href="#about">Sobre Nós</a>
        <a href="#doctors">Funcionários</a>
        <a href="#book">Depoimentos</a>
        <a href="#review">Review</a>
        <a href="<?php echo route_to('schedules.new') ?>">Agendamento</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</header>


<?php echo $this->renderSection('content') ?>


<!-- footer section starts  -->
<section class="footer">

    <div class="box-container">


        <div class="box">
            <h3>Acessos Rápidos</h3>
            <a href="/"> <i class="fas fa-chevron-right"></i> Home </a>
            <a href="#services"> <i class="fas fa-chevron-right"></i> Serviços </a>
            <a href="#about"> <i class="fas fa-chevron-right"></i> Sobre Nós </a>
            <a href="#doctors"> <i class="fas fa-chevron-right"></i> Funcionários </a>
            <a href="#book"> <i class="fas fa-chevron-right"></i> Depoimentos </a>
            <a href="#review"> <i class="fas fa-chevron-right"></i> Reviews </a>
            <a href="<?php echo route_to('schedules.new') ?>"> <i class="fas fa-chevron-right"></i> Agendamento </a>
        </div>

        <div class="box">
            <h3>Fale Conosco</h3>
            <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
            <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
            <a href="#"> <i class="fas fa-envelope"></i> shaikhanas@gmail.com </a>
            <a href="#"> <i class="fas fa-envelope"></i> anasbhai@gmail.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> mumbai, india - 400104 </a>
        </div>

        <div class="box">
            <h3>Nossas redes</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
        </div>

    </div>

    <div class="credit"> Desenvolvido por <span>Hugo Santos </span> | Anchor Soluções </div>

</section>
<!-- footer section ends -->



<!-- custom js file link  -->
<script src="<?php echo base_url('assets-site/')?>js/script.js"></script>

<?php echo $this->renderSection('scripts'); ?> 


<script>
    const setParameters = (object) => {
        return (new URLSearchParams(object)).toString();
    }

    const setHeadersRequest = () => {
        return {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
        }
    }


    const showErrorMessage = (message) => {
        boxErrors.innerHTML = '';
        return `<div>${message}</div>`;
    }
</script>

</body>
</html>