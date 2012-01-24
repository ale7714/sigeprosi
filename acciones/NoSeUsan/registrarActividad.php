
<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	registrarActividad.php
	*/
    include_once "../class/class.Trimestre.php";
	include_once "../class/class.Actividad.php";
	include_once "../class/class.BusquedaConCondicion.php";
	include_once "../class/fBaseDeDatos.php";
	$anio=substr($_POST["fecha"],0,4);
	$mes=substr($_POST["fecha"],5,2);
	$mesInt=(int)$mes;
	$meses=array('xxx','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
	if($mesInt < 4){	
		$mesInt=1;
		$mesFinInt=3;
	}else	if($mesInt < 8){ 
				$mesInt=4;	
				$mesFinInt=3;
			}else{ 
				$mesInt=9;	
				$mesFinInt=12;
			}
	$nombre[0] = "trimestre";
	$columnas[0] = "id";
	$parametros[0] = "anio";
	$valores[0] = $anio;
	$parametros[1] = "mesInicio";
	$valores[1] = $meses[$mesInt];
	$parametros[2] = "mesFin";
	$valores[2] = $meses[$mesFinInt];;
	$simbolo = "=";
	
	$idTrimestreC = new BusquedaConCondicion ($nombre, $columnas, $parametros, $valores, $simbolo, "AND", NULL);
	$bd = new fBaseDeDatos();
	$consulta = $bd->search($idTrimestreC);
	$id=mysql_fetch_array($consulta);
	if($id != NULL) $idTrimestre=$id["id"];
	else{	
		$trimestre = new trimestre($valores[0],$valores[1],$valores[2]);
		if($trimestre->insertar()==0){
		echo 'exito';
		}else echo'ERROR';
		$consulta = $bd->search($idTrimestreC);
		$id=mysql_fetch_array($consulta);
		$idTrimestre=$id["id"];
	}
	
	$registro = new actividad($_POST["nombre"],$_POST["fecha"],$_POST["descripcion"],$_POST["puntos"],$idTrimestre);
	if($registro->insertar()==0){
		echo 'exito';
		
		
		//$numero = $basesolicitud->buscarUltimaSolicitud();
		header("Location: ../contents/registroActividad.php");
		//echo 'Solicitud exitosa: ';
		//echo $email;
		//echo $unidadUSB;
		//echo $nameproy;
		//echo '! ';
		//echo ' <a href="login.php" style="color:#FFFFFF;"><strong>Regresar a la p?gina de inicio</strong></a></p>';
	}else{
		echo 'mal hecho';
	}
            
               
    
    
?>