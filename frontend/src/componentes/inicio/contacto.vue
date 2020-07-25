<template>
  <div class="container mx-auto mt-5">
    <div class="row">
      <!--panel-body-login-1-->
      <div id="panel-login1" class="col-lg-7">
        <div class="card">
          <div class="card-header">Contacto</div>

          <div class="card-body">
            <p>Ponte en contacto por aquí</p>

            <form
              action="modules/contacto/enviar-correo.php"
              onsubmit="return validacion()"
              method="post"
            >
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="glyphicon glyphicon-user"></i>
                </span>
                <input
                  type="text"
                  id="input-nombre"
                  class="form-control"
                  name="nombre"
                  placeholder="Nombre"
                  aria-describedby="basic-addon1"
                />
              </div>
              <br />

              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="glyphicon glyphicon-chevron-right"></i>
                </span>
                <input
                  type="text"
                  id="input-apellido"
                  class="form-control"
                  name="apellido"
                  placeholder="Apellido"
                  aria-describedby="basic-addon1"
                />
              </div>
              <br />

              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="glyphicon glyphicon-envelope"></i>
                </span>
                <input
                  type="text"
                  id="input-correo"
                  class="form-control"
                  name="email"
                  placeholder="Correo"
                  aria-describedby="basic-addon1"
                />
              </div>
              <br />

              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="glyphicon glyphicon-phone"></i>
                </span>
                <input
                  type="text"
                  id="input-telefono"
                  class="form-control"
                  name="telefono"
                  placeholder="Telefono"
                  aria-describedby="basic-addon1"
                />
              </div>
              <br />

              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="glyphicon glyphicon-edit"></i>
                </span>
                <textarea
                  id="input-mensaje"
                  class="form-control"
                  name="mensaje"
                  placeholder="Mensaje"
                  aria-describedby="basic-addon1"
                  style="margin: 0px; height: 85px;"
                ></textarea>
              </div>
              <br />

              <button class="btn btn-primary" id="btn" type="submit">Enviar</button>
            </form>
            <br />
            <div id="message-form-validation"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-1 col-0"></div>
      <!--.panel-login-1-->
      <!--panel-login-2-->
      <div id="panel-login2" class="panel panel-default panel-login2 col-lg-4 card">
        <div class="panel-body">
          <h4>Quienes somos</h4>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
            ornare, leo nec sodales convallis, odio nibh venenatis nisl, at
            tempor erat nulla ac urna. Donec varius sit amet augue at laoreet.
            Ut venenatis justo nec quam sodales, ac fringilla dui fermentum.
            Pellentesque eu rhoncus dui, dignissim efficitur augue. Quisque vel
            tellus eu nisl vehicula iaculis et ac justo. Phasellus vestibulum
            felis dignissim ligula faucibus venenatis. Integer gravida neque
            aliquet lacus sollicitudin commodo.
          </p>
          <h4>Contacto</h4>
          <p>
            ¿Tienes dudas sobre DevInter?. Contáctanos y dinos tus preguntas o
            problemas de la plataforma y en 24 a 48 horas seras respondido por
            un experto de DevInter por correo.
          </p>

          <!--<h4>Siguenos</h4>
          <a href="#facebook"><i class="socicon socicon-facebook"></i></a>
          <a href="#twitter"><i class="socicon socicon-twitter"></i></a>
          <a href="#google "><i class="socicon socicon-googleplus"></i></a>
          <br>-->

          <div id="footer-copyright">
            <span class="logoL1">Dev</span>
            <span class="logoL2">Inter</span>
            <b>Copyright 2016</b>
          </div>
        </div>
      </div>
      <!--.panel-login-2-->
    </div>
  </div>
</template>

<script>
export default {
  name: "Contacto"
};
</script>

<style scoped>
.panel-login2 {
  margin-top: 5%;
  border-radius: 5px;
  padding: 2%;
  border: 2px solid black;
}
</style>
