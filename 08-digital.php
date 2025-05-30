<?php //include header
include('partial/header.php'); ?>

<section class="page-section block-animate-write">
    <div class="container">
    </div>
</section>

<section class="py-sm-5">
    <div class="container">
        <div class="row login">
            <div class="col-sm-12 col-md-6">
                <div class="title-section rounded">
                    <h2>Comenzar</h2>
                    <p class="p-sm-3">Para comenzar con la gestión de tu 08 digital, necesitamos tu dirección de email..</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 offset-md-1">
                <form action="_save/save_login.php" method="POST" class="bg-white" id="form_login">

                    <div class="row form-group">    
                        <div class="col-md-12">
                        <label class="text-black small" for="email">Correo electrónico</label> 
                        <input type="email" name="email" id="email2" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                        <label class="text-black small" for="pass1">Contraseña</label> 
                        <input type="password" name="password" id="pass3" class="form-control">
                        </div>
                    </div>

                    

                    <div class="row form-group pt-4 pb-2">
                        
                        <div class="col-md-12">
                        <input type="submit" value="Iniciar sesión" class="btn btn-primary btn-md text-white br-30">
                        </div>
                    </div>

                    <div id="reg-check" class="small"></div>
        
                </form>

                <script>
                $(document).ready(function(){
                    $('#form_login').submit(function(){
                        $.ajax({
                            type: 'POST',
                            url: $(this).attr('action'),
                            data: $(this).serialize(),
                            success: function(data) {
                                $('#reg-check').html(data);
                            }
                        })
                        return false;
                    }); 
                }); 
                </script>
            
            </div>
        </div>
    </div>
</section>

<?php //include footer
 include('partial/footer-sm.php'); ?>