<div class="container-fluid">


<?php if (session()->has('info') ) { ?>
    <script>
              Toast = Swal.mixin({
                  toast: true,
                 
                });
                Toast.fire({
                    position: 'top-end',
                   showConfirmButton: false,
                   timer: 3000,
                    icon: 'info',
                    title: '<?php echo session('info'); ?>'
                }) 

    </script>
<?php } ?>


<?php if (session()->has('success') ) { ?>
    <script>
              Toast = Swal.mixin({
                  toast: true,
                 
                });
                Toast.fire({
                    position: 'top-end',
                   showConfirmButton: false,
                   timer: 3000,
                    icon: 'success',
                    title: '<?php echo session('success'); ?>'
                }) 

    </script>
<?php } ?>


<?php if (session()->has('danger') ) { ?>
    <script>
              Toast = Swal.mixin({
                  toast: true,
                 
                });
                Toast.fire({
                    position: 'top-end',
                   showConfirmButton: false,
                   timer: 3000,
                    icon: 'danger',
                    title: '<?php echo session('danger'); ?>'
                }) 

    </script>
<?php } ?>




<?php if (session()->has('warning') ) { ?>
    <script>
              Toast = Swal.mixin({
                  toast: true,
                 
                });
                Toast.fire({
                    position: 'top-end',
                   showConfirmButton: false,
                   timer: 3000,
                    icon: 'warning',
                    title: '<?php echo session('warning'); ?>'
                }) 

    </script>
<?php } ?>
</div>