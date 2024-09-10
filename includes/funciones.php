<?
date_default_timezone_set ("America/Mexico_City");
//Utilerias
$fecha_hora=date("Y-m-d H:i:s");
$fechahora=date("Y-m-d H:i:s");
$fecha_actual=date("Y-m-d");
//Valida cadena de fecha
function validaStrFecha($fecha,$ano=false){
	if(!$ano){
		if( (is_numeric($fecha)) && (strlen((string)$fecha)==2) ){
			return true;
		}else{
			return false;
		}
	}else{
		if( (is_numeric($fecha)) && (strlen((string)$fecha)==4) ){
			return true;
		}else{
			return false;
		}
	}
}
//Encripta contrase–a
function contrasena($contrasena){
	return md5($contrasena);
}
//Valida c—digo postal
function validarCP($cp){
	if( (is_numeric($cp)) && (strlen($cp)==5) ){
		return true;
	}else{
		return false;
	}
}
//Valida teléfono
function validarTelefono($telefono){
	if( (is_numeric($telefono)) && (strlen($telefono)==10) ){
		return true;
	}else{
		return false;
	}
}
//Validar email
function validarEmail($email){
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}
//Formatear cadenas
function limpiaStr($v,$base=false,$m=false){
 if($m){
 	$v =  mb_convert_case($v, MB_CASE_UPPER, "UTF-8");
 }else{
	$v =  mb_convert_case($v, MB_CASE_TITLE, "UTF-8");
 }
 if($base){
	 //$v = str_replace(array('\r\n', '\r', '\n'), '<br />', $v );
	 $v = mysql_real_escape_string(strip_tags($v));
 }
 return  $v;
}
//Funcion para escapar
function escapar($cadena,$numerico=false){
	if($numerico){
		if(is_numeric($cadena)){
			return mysql_real_escape_string($cadena);
		}else{
			return false;
		}
	}else{
		return mysql_real_escape_string(strip_tags($cadena));
	}
}
//Fecha para base de datos
function fechaBase($fecha){
	list($mes,$dia,$anio)=explode("/",$fecha);

	$dia=(string)(int)$dia;
	return $anio."-".$mes."-".$dia;
}
//Fecha para inputs de tipo fecha con datos de base de datos
function fechaInput($fecha){
	list($anio,$mes,$dia)=explode("-",$fecha);

	//$dia=(string)(int)$dia;
	return $mes."-".$dia."-".$anio;
}
//Fecha para inputs de tipo fecha con datos de base de datos
function fechaInput2($fecha){
	list($anio,$mes,$dia)=explode("-",$fecha);

	//$dia=(string)(int)$dia;
	return $mes."/".$dia."/".$anio;
}
//Para mostrar fecha
function fechaSinHora($fecha){
	return $fecha=substr($fecha,0,11);
}
//Fecha sin hora
function fechaLetra($fecha){

	list($anio,$mes,$dia)=explode("-",$fecha);
	switch($mes){
	case 1:
	$mest="Ene";
	break;
	case 2:
	$mest="Feb";
	break;
	case 3:
	$mest="Mar";
	break;
	case 4:
	$mest="Abr";
	break;
	case 5:
	$mest="May";
	break;
	case 6:
	$mest="Jun";
	break;
	case 7:
	$mest="Jul";
	break;
	case 8:
	$mest="Ago";
	break;
	case 9:
	$mest="Sep";
	break;
	case 10:
	$mest="Oct";
	break;
	case 11:
	$mest="Nov";
	break;
	case 12:
	$mest="Dic";
	break;

	}
	$dia=(string)(int)$dia;
	return $dia." ".$mest." ".$anio;
}

function fechaLetraDos($fecha){

	list($anio,$mes,$dia)=explode("-",$fecha);
	switch($mes){
	case 1:
	$mest="Ene";
	break;
	case 2:
	$mest="Feb";
	break;
	case 3:
	$mest="Mar";
	break;
	case 4:
	$mest="Abr";
	break;
	case 5:
	$mest="May";
	break;
	case 6:
	$mest="Jun";
	break;
	case 7:
	$mest="Jul";
	break;
	case 8:
	$mest="Ago";
	break;
	case 9:
	$mest="Sep";
	break;
	case 10:
	$mest="Oct";
	break;
	case 11:
	$mest="Nov";
	break;
	case 12:
	$mest="Dic";
	break;

	}
	$dia=$dia;
	return $dia."/".$mest."/".$anio;
}

function fechaLetraTres($fecha){

	list($anio,$mes,$dia)=explode("-",$fecha);
	switch($mes){
	case 1:
	$mest="Enero";
	break;
	case 2:
	$mest="Febrero";
	break;
	case 3:
	$mest="Marzo";
	break;
	case 4:
	$mest="Abril";
	break;
	case 5:
	$mest="Mayo";
	break;
	case 6:
	$mest="Junio";
	break;
	case 7:
	$mest="Julio";
	break;
	case 8:
	$mest="Agosto";
	break;
	case 9:
	$mest="Septiembre";
	break;
	case 10:
	$mest="Octubre";
	break;
	case 11:
	$mest="Noviembre";
	break;
	case 12:
	$mest="Diciembre";
	break;

	}
	$dia=$dia;
	return $dia." de ".$mest." del ".$anio;
}

//Obtener el mes
function soloMes($mes){

	switch($mes){
	case 1:
	$mest="Enero";
	break;
	case 2:
	$mest="Febrero";
	break;
	case 3:
	$mest="Marzo";
	break;
	case 4:
	$mest="Abril";
	break;
	case 5:
	$mest="Mayo";
	break;
	case 6:
	$mest="Junio";
	break;
	case 7:
	$mest="Julio";
	break;
	case 8:
	$mest="Agosto";
	break;
	case 9:
	$mest="Septiembre";
	break;
	case 10:
	$mest="Octubre";
	break;
	case 11:
	$mest="Noviembre";
	break;
	case 12:
	$mest="Diciembre";
	break;

	}
	return $mest;
}



function acentos($cadena){
    $originales =  'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'AAAAAAACEEEEIIIIDNOOOOOOUUUUYbsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    return utf8_encode($cadena);
}



function devuelveFechaHora($fecha_hora){


$data = explode(' ', $fecha_hora);

return fechaLetraDos($data[0]).' · '.substr($data[1], 0,5);



}
function horaVista($hora) {

	return	date('h:i:s a', strtotime($hora));

}

function titulosWeb($cadena) {
	return ucwords(mb_strtolower($cadena, 'UTF-8'));
}
