
    <section class="google-map p-0">
      <div style="width:100%"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15052.875040549912!2d-99.1631368!3d19.4029518!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x266c2558a0840fb8!2sServigue!5e0!3m2!1ses-419!2smx!4v1601415086825!5m2!1ses-419!2smx" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
      <script src="assets/js/google-map.js"></script>

      
      <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
    </section>

    <section class="contact-layout1 pb-100">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="contact-panel__info bg-gray mb-30">
              <div class="contact-panel__block">
                <h5 class="contact-panel__block__title">Nuestra Ubicación</h5>
                <ul class="contact-panel__block__list list-unstyled">
                  <li>Monclova No. 60 A, Col. Roma Sur, Del. Cuauhtémoc, Ciudad de México, CP 06760.</li>
                </ul>
              </div>
              <div class="contact-panel__block">
                <h5 class="contact-panel__block__title">Opciones de contacto</h5>
                <ul class="contact-panel__block__list list-unstyled">
                  <li><a href="mailto:contacto@gservigue.com"></a>Correo Electrónico: contacto@gservigue.com</li>
                  <li><a href="tel:5578270017"></a>Cotizaciones: 5578270017</li>
                  <li><a href="tel:5578270016 "></a>Recursos Humanos: 5578270016</li>
                </ul>
              </div>
              <div class="contact-panel__block">
                <h5 class="contact-panel__block__title">Horario de Oficina</h5>
                <ul class="contact-panel__block__list list-unstyled">
                  <li>Lunes - Viernes</li>
                  <li>08:00 AM - 05:00 PM</li>
                </ul>
              </div>
              <a href="?Modulo=Cotizacion" class="btn btn__primary btn__block">
                <i class="icon-arrow-right"></i><span>Solicitar presupuesto</span>
              </a>
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-7 offset-lg-1">
            <form method="post" action="assets/php/contact.php" id="contactForm" class="contact-panel__form mb-30">
              <div class="row">
                <div class="col-sm-12">
                  <h4 class="contact-panel__title">Contáctanos</h4>
                  <p class="contact-panel__desc mb-40">Tienes alguna duda o sugerencia con respecto a nuestros servicios, ponte en contacto con nosotros y uno de nuestros asesores lo contactará lo más pronto posible.</p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nombre" id="contact-name" name="contact-name" required>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Correo Electrónico" id="contact-email" name="contact-email" required>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Teléfono" id="contact-Phone" name="contact-phone" required>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Asunto" id="contact-subject" name="contact-subject" required>
                  </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Comentario" id="contact-messgae" name="contact-messgae" required></textarea>
                  </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <button type="submit" class="btn btn__secondary btn__lg">
                    <i class="icon-arrow-right"></i><span>Envíar Mensaje</span>
                  </button>
                  <div class="contact-result"></div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

