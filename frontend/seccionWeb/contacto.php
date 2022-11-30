<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">CONTÁCTENOS</h2>
            <h3 class="section-subheading " style="color:aliceblue;">Tienes dudas o sugerencias por favor escribenos tu opinión es importante.</h3>
        </div>
        <!-- * * * * * * * * * * * * * * *-->
        <!-- * * SB Forms Contact Form * *-->
        <!-- * * * * * * * * * * * * * * *-->
        <!-- This form is pre-integrated with SB Forms.-->
        <!-- To make this form functional, sign up at-->
        <!-- https://startbootstrap.com/solution/contact-forms-->
        <!-- to get an API token!-->
        <form class="crud-form" id="contactForm" >
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input class="form-control"  name="nombre" type="text" placeholder="Se requiere un nombre *" data-sb-validations="required"  />
                        <div class="invalid-feedback" data-sb-feedback="name:required">Se requiere un nombre.</div>
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input class="form-control"  name="correo"  type="email" placeholder="Se requiere un email *" data-sb-validations="required,email" />
                        <div class="invalid-feedback" data-sb-feedback="email:required">Se requiere un email.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">El correo no es válido.</div>
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input class="form-control"  name="telefono" type="tel" placeholder="Se requiere un número de teléfono *" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="phone:required">Se requiere un número de teléfono.</div>
                    </div>



                    <!--CAMPOS OCULTOS -->
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="asunto" value="Interesado">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="dominioOrigen" value="hotelcasadepiedra.com">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="giroDominio" value="Servicio de hotel">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="categoriaProspecto" value="Prospecto">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="estadoSistema" value="Activo">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="conversacion" value="Bitácora de conversación">
                    </div>
                    <!--FIN CAMPOS OCULTOS -->

                </div>

                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea class="form-control" name="mensaje"placeholder="Se requiere un mensaje *" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Se requiere un mensaje.</div>
                    </div>
                </div>
            </div>
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center text-white mb-3">
                    <div class="fw-bolder">¡Envío del formulario exitoso!</div> 
                    <!-- Para activar este formulario, regístrese en
                    <br />
                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a> -->
                </div>
            </div>
            <!-- Submit error message-->
            <!---->
            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error al enviar
                message!</div></div>
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase " id="submitButton" type="submit">Enviar Mensaje</button></div>
        </form>
    </div>
</section>