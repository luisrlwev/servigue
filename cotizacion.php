<div class="container">
  <div class="row" style="margin-top:70px; margin-bottom:70px;">
    <div class="col-md-12 col-xs-12">
      <div class="card text-center">
        <div class="card-header" style="background-color: #005a66; color: white; font-weight: 600;">
          FORMULARIO DE COTIZACIÓN
        </div>
        <div class="card-body">
          <div class="alert alert-danger" id="error" role="alert" style="display:none;"></div>
          <div class="alert alert-success" id="ok" role="alert" style="display:none;"></div>
          <form method="post" action="assets/php/cotizacion.php" id="cotizacionForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nombre" style="color: #005a66; font-weight: bold;">Nombre de atención</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
              </div>
              <div class="form-group col-md-6">
                <label for="tel" style="color: #005a66; font-weight: bold;">Télefono</label>
                <input type="number" class="form-control" id="telefono" name="telefono" required>
              </div>
              <div class="form-group col-md-6">
                <label for="email" style="color: #005a66; font-weight: bold;">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group col-md-6">
                <label for="t-inmueble" style="color: #005a66; font-weight: bold;">Tipo de inmueble:</label>
                <select id="t-inmueble" name="t-inmueble" class="form-control">
                  <option selected>Seleccionar</option>
                  <option value="Casa Habitación">Casa habitación</option>
                  <option value="Oficina">Oficina</option>
                  <option value="Otros">Otros</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="ubicacion" style="color: #005a66; font-weight: bold;">Ubicación:</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
              </div>
              <div class="form-group col-md-4">
                <label for="medida" style="color: #005a66; font-weight: bold;">Metros cuadrados</label>
                <input type="text" class="form-control" id="medida" name="medida" required>
              </div>
              <div class="form-group col-md-4">
                <label for="t-servicio" style="color: #005a66; font-weight: bold;">Tipo de servicio:</label>
                <input type="text" class="form-control" id="t-servicio" name="t-servicio" required>
              </div>
            </div>
        </div>
        <div class="card-footer ">
          <div class="float-right btn_registro">
            <a href="index.php" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary">Solicitar</button>
          </div>
          <div class="cotizacion-result"></div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>