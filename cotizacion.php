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
        <form id="frmCotizacion">
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
             <label for="t_inmueble" style="color: #005a66; font-weight: bold;">Tipo de inmueble:</label>
             <select id="t_inmueble" name="t_inmueble" class="form-control">
              <option selected>Seleccionar</option>
              <option value="casa habitación">Casa habitación</option>
              <option value="oficina">Oficina</option>
              <option value="otros">etc</option>
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
              <label for="t_servicio" style="color: #005a66; font-weight: bold;">Tipo de servicio:</label>
              <input type="text" class="form-control" id="t_servicio" name="t_servicio" required>            
            </div>
            
          </div>
        </form>
      </div>
      <div class="card-footer " >
        <div class="float-right btn_registro"> 
          <a href="index.php" class="btn btn-danger">Cancelar</a>
          <button type="button" class="btn btn-primary" onclick="guardar()">Solicitar</button>
        </div>
        <img src="load-verde.gif" border="0" id="load" width="30" style="display:none;" />
      </div>
    </div>
  </div>
 </div>
</div>


<script>
function guardar(){
  $(".btn_registro").hide();
  $("#load").show();
  var datos= $('#frmCotizacion').serialize();
  $.get('api.php',datos+'&p=CONEXIA&accion=insertCotizacion').done(function(data) {
    var decodedData = JSON.parse(data);
    if(decodedData.error == false){   
      location.href ="?Modulo=Gracias";
      $(".btn_registro").show();
      $('#error').hide();
    }else if(decodedData.error == true){
      $('#error').html(decodedData.mensaje);
		  $('#error').show('Fast');
      $("#load").hide();
      $(".btn_registro").show();
    }
  });
}


</script>