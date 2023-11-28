<?php echo $this->extend('Site/Layout/main'); ?>


<!-- Sessão de Titulo de página -->

<?php echo $this->section('title'); ?>

    <?php echo $title ?? ''; ?>

<?php echo $this->endSection(); ?>




<!-- Sessão de Estila da página -->

<?php echo $this->section('css'); ?>

<?php echo $this->endSection(); ?>
 



<?php echo $this->section('content'); ?>


<section class="home" id="home">

    <div class="image">
        <img src="<?php echo base_url('assets-site/') ?>image/home-img.svg" alt="">
    </div>

    <div class="content">
        <h3>Fique seguro, Fique saudável</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem sed autem vero? Magnam, est laboriosam!</p>
        <a href="#" class="btn"> contact us <span class="fas fa-chevron-right"></span> </a>
    </div>

</section>


<section class="services" id="services">

    <h1 class="heading"> Nossos <span>Serviços</span> </h1>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-notes-medical"></i>
            <h3>free checkups</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-ambulance"></i>
            <h3>24/7 ambulance</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-user-md"></i>
            <h3>expert doctors</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-pills"></i>
            <h3>medicines</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-procedures"></i>
            <h3>bed facility</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-heartbeat"></i>
            <h3>total care</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

    </div>

</section>


<section class="about" id="about">

    <h1 class="heading"> <span>Sobre</span> Nós </h1>

    <div class="row">

        <div class="image">
            <img src="<?php echo base_url('assets-site/') ?>image/about-img.svg" alt="">
        </div>

        <div class="content">
            <h3>Nós cuidamos da sua vida saudável</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure ducimus, quod ex cupiditate ullam in assumenda maiores et culpa odit tempora ipsam qui, quisquam quis facere iste fuga, minus nesciunt.</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus vero ipsam laborum porro voluptates voluptatibus a nihil temporibus deserunt vel?</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

    </div>

</section>


<section class="doctors" id="doctors">

    <h1 class="heading"> Nossos <span>Funcionarários</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="<?php echo base_url('assets-site/') ?>image/doc-1.jpg" alt="">
            <h3>john deo</h3>
            <span>expert doctor</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <img src="<?php echo base_url('assets-site/') ?>image/doc-2.jpg" alt="">
            <h3>john deo</h3>
            <span>expert doctor</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <img src="<?php echo base_url('assets-site/') ?>image/doc-3.jpg" alt="">
            <h3>john deo</h3>
            <span>expert doctor</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <img src="<?php echo base_url('assets-site/') ?>image/doc-4.jpg" alt="">
            <h3>john deo</h3>
            <span>expert doctor</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <img src="<?php echo base_url('assets-site/') ?>image/doc-5.jpg" alt="">
            <h3>john deo</h3>
            <span>expert doctor</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <img src="<?php echo base_url('assets-site/') ?>image/doc-6.jpg" alt="">
            <h3>john deo</h3>
            <span>expert doctor</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

    </div>

</section>


<section class="book" id="book">

    <h1 class="heading"> <span>Depoimentos</span> </h1>    

    <div class="row">

        <div class="image">
            <img src="<?php echo base_url('assets-site/') ?>image/book-img.svg" alt="">
        </div>

        <form action="">
            <h3>Escreva seu Depoimento</h3>
            <input type="text" placeholder="Nome Completo" class="box">
            <input type="text" placeholder="Telefone" class="box">
            <input type="email" placeholder="Seu Email" class="box">
            <input type="date" class="box">
            <textarea rows="4" cols="50" placeholder="Reclamações, Sugestões, Satisfações" class="box"></textarea>
            <input type="submit" value="Enviar" class="btn">
        </form>

    </div>

</section>


<section class="review" id="review">
    
    <h1 class="heading"> Nossos <span>Clientes</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="<?php echo base_url('assets-site/') ?>image/pic-1.png" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sapiente nihil aperiam? Repellat sequi nisi aliquid perspiciatis libero nobis rem numquam nesciunt alias sapiente minus voluptatem, reiciendis consequuntur optio dolorem!</p>
        </div>

        <div class="box">
            <img src="<?php echo base_url('assets-site/') ?>image/pic-2.png" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sapiente nihil aperiam? Repellat sequi nisi aliquid perspiciatis libero nobis rem numquam nesciunt alias sapiente minus voluptatem, reiciendis consequuntur optio dolorem!</p>
        </div>

        <div class="box">
            <img src="<?php echo base_url('assets-site/') ?>image/pic-3.png" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sapiente nihil aperiam? Repellat sequi nisi aliquid perspiciatis libero nobis rem numquam nesciunt alias sapiente minus voluptatem, reiciendis consequuntur optio dolorem!</p>
        </div>

    </div>

</section>


<?php echo $this->endSection(); ?>




<!-- Sessão de scripts  -->

<?php echo $this->section('scripts'); ?>


<?php echo $this->endSection(); ?>
