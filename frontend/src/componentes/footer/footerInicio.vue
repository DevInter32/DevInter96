<template>
  <footer class="mt-5">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-about wow fadeInUp">
            <!--<img class="logo-footer" src="assets/img/logo.png" alt="logo-footer" data-at2x="assets/img/logo.png">-->
            <h3 class="logo">MiPaginaWeb</h3>
            <p>
              Nos encargamos de ofrecer el mejor servicio de hosting a todos
              nuestros clientes que nos contratan
            </p>
          </div>
          <div class="col-md-4 offset-md-1 footer-contact wow fadeInDown">
            <h3>Contacto</h3>
            <p><i class="fas fa-map-marker-alt"></i> Florida Av Las Palmas</p>
            <p><i class="fas fa-phone"></i> Telefono: +1 888-888-888</p>
            <p>
              <i class="fas fa-envelope"></i> Email:
              <a href="mailto:miemail@email.com">miemail@email.com</a>
            </p>
            <p><i class="fab fa-skype"></i> Skype: mi_skype</p>
          </div>
          <div class="col-md-4 footer-links wow fadeInUp">
            <div class="row">
              <div class="col">
                <h3 class="text-md-center">Links</h3>
              </div>
            </div>
            <div class="row nav">
              <div class="col-md-6 mx-auto text-md-center">
                <p>
                  <a class="scroll-link" href="#" data-id="inicio">Inicio</a>
                </p>
                <p><a href="#" data-id="acerca_de">Acerca de</a></p>
                <p><a href="#" data-id="servicios">Servicios</a></p>
              </div>
              <div class="col-md-6 mx-auto text-md-center">
                <p><a href="#" data-id="contacto">Contacto</a></p>
                <p><a href="contenido.html">Contenido</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-6 footer-copyright">
            &copy;Copyright 2019 - maden by me
          </div>
          <div class="col-md-6 footer-social d-flex justify-content-center">
            <div>
              <a href="#"><i class="icon-facebook-f"></i></a>
              <a href="#"><i class="icon-twitter"></i></a>
              <a href="#"><i class="icon-google-plus"></i></a>
              <a href="#"><i class="icon-instagram"></i></a>
              <a href="#"><i class="icon-pinterest"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<style>
footer {
  background: linear-gradient(
    47deg,
    rgba(0, 0, 0, 1) 0%,
    rgba(9, 80, 126, 1) 100%
  );
}

.footer-top {
  padding: 60px 0;
  text-align: left;
  color: #fff;
}
.footer-contact p {
  word-wrap: break-word;
}

.footer-bottom {
  padding: 15px 0 17px 0;

  text-align: left;
  color: #fff;
}

.footer-top a {
  text-decoration: none;
}

.footer-social {
  padding-top: 3px;
  text-align: right;
}

.footer-social a {
  font-size: 30px;
  color: #fff;
  text-decoration: none;
  padding: 14px;
}
</style>

<script>
export default {
  name: "footerInicio",
};
</script>