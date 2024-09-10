<?
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

 include("includes/db.php");
 include("includes/funciones.php");
 include("includes/postmark.php");
 extract($_GET);

  if($_GET['p']!="CONEXIA"){
     echo json_encode(array("error"=>true, "mensaje"=>'La contraseña es incorrecta'));
     exit;
  }
 
 switch($accion):
  case 'insertCotizacion':
   if(!$nombre){

    echo json_encode(array("error"=>true, "mensaje"=>"Favor de escribir su nombre"));
    exit();
   }
   if(!validarTelefono($telefono)){
    echo json_encode(array("error"=>true, "mensaje"=>"Escriba su número de telefono"));
    exit();
   }
   if(!validarEmail($email)){
    echo json_encode(array("error"=>true, "mensaje"=>"Escriba su email correcto"));
    exit();
   }

   if(!limpiaStr($t_inmueble)){
    echo json_encode(array("error"=>true, "mensaje"=>"seleccione el tipo de inmueble."));
    exit();
   }

   if(!$ubicacion){
    echo json_encode(array("error"=>true, "mensaje"=>"Escriba su ubicación"));
    exit();
   }
   if(!$medida){
    echo json_encode(array("error"=>true, "mensaje"=>"Escriba la medida en metros cuadrados"));
    exit();
   }

   if(!$t_servicio){
    echo json_encode(array("error"=>true, "mensaje"=>"Escriba el tipo de servicios que requiere"));
    exit();
   }

   $sql_insert="INSERT INTO cotizacion (nombre, telefono, correo, tipo, ubicacion, medida, t_servicio, fechahora ) VALUES ('$nombre', '$telefono', '$email', '$t_inmueble', '$ubicacion', '$medida', '$t_servicio', '$fechahora')";
   $res = mysqli_query($db, $sql_insert);
	if($res){
      
		$titulo="Contacto desde servigue";
		$fecha=fechaLetraTres($fecha_actual);
		$despedida="¡Gracias por su atención!";
		$saludo="Estimado/a Administrador";
		$mensaje="Se ha recibido un contacto desde la página web de servigue: <br>";
		$mensaje.="Nombre del cliente: ".$nombre."<br>";
		$mensaje.="Teléfono: ".$telefono."<br>";
		$mensaje.="Email: ".$email."<br>";
		$mensaje.="Tipo de inmueble: ".$t_inmueble."<br>";
      $mensaje.="Ubicación: ".$ubicacion."<br>";
		$mensaje.="Metros cuadrados: ".$medida."<br>";
		$mensaje.="Tipo de servicio: ".$t_servicio."<br>";
		$mensaje.="Fecha y hora de contacto: ".devuelveFechaHora($fechahora);

		$html='<table class="table_full editable-bg-color bg_color_e6e6e6 editable-bg-image" bgcolor="#e6e6e6" width="100%" align="center" mc:repeatable="castellab" mc:variant="Header" cellspacing="0" cellpadding="0" border="0"> <tr> <td> <table width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto; background-color: #FFF;"> <tr> <td height="25"></td></tr><tr> <td> <table class="table1" width="520" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;"> <tr> <td> <table width="100%" align="left" border="0" cellspacing="0" cellpadding="0"> <tr> <td align="left"> <a href="#" class="editable-img"> <img editable="true" mc:edit="image001" src="https://conexia-documents.s3.us-east-2.amazonaws.com/identidad/logoAdminbooks.png" height="23" style="display: block; line-height: 0; font-size: 0; border: 0;" border="0" alt="logo"/> </a> </td></tr><tr> <td height="22"></td></tr></table> </td></tr><tr> <td mc:edit="text001" align="center" class="text_color_ffffff" style="color: #000; font-size: 30px; font-weight: 700; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;"> <div class="editable-text"> <span class="text_container"><multiline>'.$titulo.'</multiline></span> </div></td></tr><tr> <td height="30"></td></tr><tr> <td mc:edit="text002" align="center" class="text_color_ffffff" style="color: #000; font-size: 12px; font-weight: 300; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;"> <div class="editable-text"> <span class="text_container"><multiline>'.$fecha.'</multiline></span> </div></td></tr></table> </td></tr><tr> <td height="60"></td></tr></table> </td></tr><tr> <td> <table class="table1 editable-bg-color bg_color_ffffff" bgcolor="#ffffff" width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;"> <tr> <td height="60"></td></tr><tr> <td> <table class="table1" width="520" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;"> <tr> <td mc:edit="text003" align="left" class="center_content text_color_282828" style="color: #282828; font-size: 14px; font-weight: 900; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;"> <div class="editable-text"> <span class="text_container"><multiline>'.$saludo.'</multiline></span> </div></td></tr><tr> <td height="15"></td></tr><tr> <td mc:edit="text004" align="left" class="center_content text_color_282828" style="color: #282828; font-size: 14px; line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;" > <div class="editable-text" style="line-height: 2;"> <span class="text_container"><multiline>'.$mensaje.'</multiline></span> </div></td></tr><tr> <td height="40"></td></tr><tr> <td height="30"></td></tr><tr> <td> <table class="table1-2" width="270" align="left" border="0" cellspacing="0" cellpadding="0"> <tr> <td mc:edit="text003" align="left" class="center_content text_color_282828" style="color: #282828; font-size: 14px; font-weight: 700; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;" > <div class="editable-text"> <span class="text_container"><multiline>'.$despedida.'</multiline></span> </div></td></tr><tr> <td height="5"></td></tr><tr> <td mc:edit="text004" align="left" class="center_content text_color_b0b0b0" style="color: #b0b0b0; font-size: 14px; line-height: 2; font-weight: 300; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;" > <div class="editable-text" style="line-height: 2;"> <span class="text_container"> <multiline> Adminbooks Web Services </multiline> </span> </div></td></tr><tr> <td height="30"></td></tr></table> <table class="tablet_hide" width="40" align="left" border="0" cellspacing="0" cellpadding="0"> <tr> <td height="1"></td></tr></table> </td></tr></table> </td></tr><tr> <td height="30"></td></tr></table> </td></tr><tr> <td> <table class="table1" width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;"> <tr> <td height="70"></td></tr><tr> <td mc:edit="text010" align="center" class="center_content text_color_929292" style="color: #929292; font-size: 14px; line-height: 2; font-weight: 400; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;" > <div class="editable-text" style="line-height: 2;"> <span class="text_container"> <multiline> Correo generado automáticamente, desde Adminbooks<br/> Powered by <a href="https://conexia.mx" target="_blank">Conexia</a> </multiline> </span> </div></td></tr><tr> <td height="70"></td></tr></table> </td></tr></table>';
		
		$remite 			= "Robot <robot@adminbooks.mx>";
		$destino 		= "juan@gservigue.com,ivonne.servigue@gmail.com,diego@conexia.mx";
      //$destino 		= "diego@conexia.mx";
		$asunto 			= "Contacto desde Servigue";
		$mensaje_html 	= $html;
		
		$postmark = new Postmark(null,$remite);
		$postmark->to($destino);
		$postmark->subject($asunto);
		$postmark->html_message($mensaje_html);
		
		$resultado=$postmark->send();
		
		$messageid=$resultado->MessageID;
		
      echo json_encode(array("error"=>false, "mensaje"=>"Se guardo correctamente"));
      exit;
	}else{
	   echo json_encode(array("error"=>true, "mensaje"=>"Ha ocurrido un error en conexion"));
	}

  break;

  case 'getCotizacion':

       $sql_getCotizacion="SELECT * FROM cotizacion ";
       $q = mysqli_query($db,$sql_getCotizacion) or exit('Error problema persiste contacte a soporte técnico.');
       $num_usuarios = mysqli_num_rows($q);
    
       while($data = mysqli_fetch_object($q)){
        $listaUsuarios  [] = $data;
        
       }
       $dat=json_encode($listaUsuarios);
       echo json_encode(array("error"=>false, "lista"=>$dat));

  break;
 endswitch;



?>