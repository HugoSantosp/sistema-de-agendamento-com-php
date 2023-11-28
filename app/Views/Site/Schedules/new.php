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
                        <i class="fas fa-building"></i>
                        <h3>Escolha Sua Unidade</h3>
                        <h3><?php echo $units; ?></h3>
                        
                </div>

                <div class="box d-none" id="mainBoxServices" >
                        <i class="fas fa-user-md"></i>
                        <h3>Escolha o Serviço</h3>
                    <div id="boxServices">
                        
                    </div>
                        
                </div>

                <div class="box d-none" id="BoxMonths" >
                        <i class="fas fa-calendar"></i>
                        <h3>Escolha o Mês</h3>
                       
                    <div id="boxMonthes">
                    <?php echo $months; ?>
                    </div> 
                        
                </div>
                
 
        </div>
       

</section>

<section class="services-schadules">
    <div class="box-container">
                

        <div class="box">
            <i class="fas fa-calendar-day"></i>
                    

                <?php echo $calendar; ?>
            </div> 

            <div class="box">

             <section class="home-schedule">

                <div class="image-schedule">
                    <img src="<?php echo base_url('assets-site/') ?>image/Insurance-pana.svg" alt="">
                </div>

                <div class="content-schedule">
                    <h3>tudo pronto ?</h3>
                        <a href="<?php echo route_to('schedules.new'); ?>" class="btn"> Criar Agendamento <span class="fas fa-chevron-right"></span> </a> 
                </div>

            </section>

           
        </div>
</section>

<?php echo $this->endSection(); ?>




<!-- Sessão de scripts  -->

<?php echo $this->section('scripts'); ?>

<script>
  const URL_GET_SERVICES = '<?php echo route_to('get.unit.services') ?>';
  const URL_GET_CALENDAR = '<?php echo route_to('get.calendar') ?>';
  const mainBoxServices = document.getElementById('mainBoxServices');
  const boxServices = document.getElementById('boxServices');
  const boxMonths = document.getElementById('BoxMonths');
  const units = document.getElementsByName('unit_id');



  let unitId =  null;
  let month =  null;
  let serviceId = null;
  let chosenMontho = null;
  let chosenDay = null;
  let chosenHour = null;

  const getservices = async () => {

    let url = URL_GET_SERVICES + '?' + setParameters({unit_id: unitId});
    const response = await fetch(url, {
        method: 'get',
        headers: setHeadersRequest()
    });


            const data = await response.json();
            boxServices.innerHTML = data.services;

            console.log(data);

            const elementService = document.getElementsByName('service');
            elementService.forEach(function(radio) {
                radio.addEventListener('change', function() {

                    serviceId = this.id ?? null
                    chosenMontho = this.value ?? null
                    console.log(serviceId + ' / ' + chosenMontho);
                    
                    serviceId !== '' ? boxMonths.classList.remove('d-none') : boxMonths.classList.add('d-none')
                    
                });
            });          
                
};




    const elementMonth = document.getElementsByName('months');
        elementMonth.forEach(function(radio) {
                radio.addEventListener('change', function() {

                monthsId = radio.id ?? null
                monthsName = radio.value ?? null
                console.log(monthsId + ' / ' + monthsName);
                    getCalendar();
                });
        });
    

 
const getCalendar = async (month) => {
    let url = URL_GET_CALENDAR + '?' + setParameters({ month: month });
    const response = await fetch(url, {
        method: 'get',
        headers: setHeadersRequest()
    });


    const data = await response.json();

    console.log(data);

  };



const getBtnDay = document.getElementsByName('button-day');
var contador = 0; 
for (var i = 0; i < getBtnDay.length; i++) {
    getBtnDay[i].addEventListener('click', function() {
        if (this.disabled) {
       
        } else {
            contador++;     
                console.log(contador, 'clicou')
                if((contador % 2) == 0)
                {
                    this.classList.remove('btn-chosen');
                    this.classList.add('btn');
                }else
                {
                    this.classList.remove('btn');
                    this.classList.add('btn-chosen');
                }
                if(contador == 10)
                {
                    contador = 0;
                }
                
            }

    });
}
    

  
        units.forEach(element => {
        element.addEventListener('click', (event) => {
            mainBoxServices.classList.remove('d-none');
            unitId = element.value;

            getservices();
        });
  });



 
   
  


</script>

<?php echo $this->endSection(); ?>
