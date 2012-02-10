<?php 
	include_once "class/class.fachadainterfaz.php";
?>

<div id="main_column">

    <div class="section_w700">

        <h2>Editar Solicitud Nro  <?php echo strtoupper($_GET['nro'])?></h2>
	    
			<?php $nro = $_GET['nro'];
				  $email = $_GET['mail'];
				  $fachada = fachadaInterfaz::getInstance();
				  $solicitud = $fachada->consultarSolicitud($email,$nro);
				  $telefonos = $fachada->cargarTelefSolicitud($solicitud['nro']);
				  $status = $solicitud["estado"];
				
				if (!isset ($_GET['error'])){
   			        $_GET['error'] = null;
                   }
			    if ($_GET['error']=="camposVacios"){
                    echo '<span style="color: red;">Debe llenar todos los campos obligatorios</span>';
                }
                else if ($_GET['error']=="solicExist"){
                    echo '<span style="color: red;">La solicitud ya se encuentra registrada.</span>';
                }
                else if ($_GET['error']=="formatoTlf"){
                    echo '<span style="color: red;">El formato del teléfono es inválido.</span>';
                }
                else if ($_GET['error']=="Unidad"){
                    echo '<span style="color: red;">Debe seleccionar una Unidad.</span>';
                }
                else if ($_GET['error']=="formatoCorreo"){
                    echo '<span style="color: red;">El formato de correo es inválido.</span>';
                }
				else if ($_GET['error']=="modificar"){
                    echo '<span style="color: red;">Ocurrio un error al modificar los datos de la solicitud.</span>';
                }else {
                    echo '(*) Datos obligatorios.';
                }
			?>


    </div>        
    <div class="margin_bottom_20"></div>

    <div class="section_w700">

        <form name="formaSolicitud" action="editaSolicitud.php" method="post">
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="email"><b>*E-mail:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Correo electrónico" type="text" id="email" name="email" value="<?php print $solicitud["email"]?>" disabled="disabled"/></td>
            </tr>

                <tr>
                    <td align="right"><b>*UnidadUSB:</b>
                </td>
                <td align="left">
                <select name="department">
                    <option value="<?php print $solicitud["nombreUnidadAdministrativa"]?>" selected="selected"><?php print $solicitud["nombreUnidadAdministrativa"]?></option>
					<option value="Apoyo Logistico"> Apoyo Logistico </option>
                    <option value="ArteVision"> ArteVision </option>
                    <option value="Asesoria Juridica"> Asesoria Juridica </option> 
                    <option value="Asociacion de Amigos"> Asociacion de Amigos </option>
                    <option value="Asociacion de Egresados"> Asociacion de Egresados </option>
                    <option value="Asociacion de Jovenes Empresarios"> Asociacion de Jovenes Empresarios </option>
                    <option value="Asociacion de Profesores (APUSB)"> Asociacion de Profesores (APUSB) </option>
                    <option value="Asociacion de Profesores Jubilados (APJUSB)"> Asociacion de Profesores Jubilados (APJUSB) </option>
                    <option value="Asociacion de Trabajadores (ATAUSIBO)"> Asociacion de Trabajadores (ATAUSIBO) </option>
                    <option value="Auditoria Interna"> Auditoria Interna </option>
                    <option value="Biblioteca"> Biblioteca </option>
                    <option value="Biblioteca (Litoral)"> Biblioteca (Litoral) </option>
                    <option value="Bolivarium"> Bolivarium </option>
                    <option value="Bomberos Voluntarios USB"> Bomberos Voluntarios USB </option>
                    <option value="Caja de Ahorros de los Empleados (CAUSIBO)"> Caja de Ahorros de los Empleados (CAUSIBO) </option>
                    <option value="Caja de Ahorros del Personal Academico (CAPAUSB)"> Caja de Ahorros del Personal Academico (CAPAUSB) </option>
                    <option value="Centro de Documentacion y Archivo (CENDA)"> Centro de Documentacion y Archivo (CENDA) </option>
                    <option value="Centro de Estudiantes"> Centro de Estudiantes </option>
                    <option value="Centro de Ingenieria de Superficie"> Centro de Ingenieria de Superficie </option>
                    <option value="Centro de Investigaciones Educativas"> Centro de Investigaciones Educativas </option>
                    <option value="Centro Iglu-Caribe"> Centro Iglu-Caribe </option>
                    <option value="Comision de Opinion Estudiantil"> Comision de Opinion Estudiantil </option>
                    <option value="Comision de Planificacion"> Comision de Planificacion </option>
                    <option value="Comision de Planta Fisica"> Comision de Planta Fisica </option>
                    <option value="Comision Electoral"> Comision Electoral </option>
                    <option value="Consejo de Apelaciones"> Consejo de Apelaciones </option>
                    <option value="Consejo Directivo"> Consejo Directivo </option>
                    <option value="Consejo Superior"> Consejo Superior </option>
                    <option value="Contraloria Interna"> Contraloria Interna </option>
                    <option value="Coordinacion de Administracion de Turismo y Hoteleria"> Coordinacion de Administracion de Turismo y Hoteleria </option>
                    <option value="Coordinacion de Alimentos"> Coordinacion de Alimentos </option>
                    <option value="Coordinacion de Arquitectura"> Coordinacion de Arquitectura </option>
                    <option value="Coordinacion de Biologia"> Coordinacion de Biologia </option>
                    <option value="Coordinacion de Ciencias Aplicadas e Ingenieria"> Coordinacion de Ciencias Aplicadas e Ingenieria </option>
                    <option value="Coordinacion de Ciencias Aplicadas (Litoral)"> Coordinacion de Ciencias Aplicadas (Litoral) </option>
                    <option value="Coordinacion de Ciencias de los Alimentos"> Coordinacion de Ciencias de los Alimentos </option>
                    <option value="Coordinacion de Ciencias Politicas"> Coordinacion de Ciencias Politicas </option>
                    <option value="Coordinacion de Cursos en Cooperacion"> Coordinacion de Cursos en Cooperacion </option>
                    <option value="Coordinacion de Desarrollo del Ambiente"> Coordinacion de Desarrollo del Ambiente </option>
                    <option value="Coordinacion de Doctorado en Ingenieria"> Coordinacion de Doctorado en Ingenieria </option>
                    <option value="Coordinacion de Extension Universitaria"> Coordinacion de Extension Universitaria </option>
                    <option value="Coordinacion de Extension Universitaria (Litoral)"> Coordinacion de Extension Universitaria (Litoral) </option>
                    <option value="Coordinacion de Filosofia"> Coordinacion de Filosofia </option>
                    <option value="Coordinacion de Fisica"> Coordinacion de Fisica </option>
                    <option value="Coordinacion de Gerencia de Empresas"> Coordinacion de Gerencia de Empresas </option>
                    <option value="Coordinacion de Ingenieria de Computacion"> Coordinacion de Ingenieria de Computacion </option>
                    <option value="Coordinacion de Ingenieria de Materiales"> Coordinacion de Ingenieria de Materiales </option>
                    <option value="Coordinacion de Ingenieria de Produccion"> Coordinacion de Ingenieria de Produccion </option>
                    <option value="Coordinacion de Ingenieria de Sistemas"> Coordinacion de Ingenieria de Sistemas </option>
                    <option value="Coordinacion de Ingenieria Electrica"> Coordinacion de Ingenieria Electrica </option>
                    <option value="Coordinacion de Ingenieria Electronica"> Coordinacion de Ingenieria Electronica </option>
                    <option value="Coordinacion de Ingenieria Geofisica"> Coordinacion de Ingenieria Geofisica </option>
                    <option value="Coordinacion de Ingenieria Mecanica"> Coordinacion de Ingenieria Mecanica </option>
                    <option value="Coordinacion de Ingenieria Quimica"> Coordinacion de Ingenieria Quimica </option>
                    <option value="Coordinacion de Licenciatura en Quimica"> Coordinacion de Licenciatura en Quimica </option>
                    <option value="Coordinacion de Linguistica Aplicada"> Coordinacion de Linguistica Aplicada </option>
                    <option value="Coordinacion de Literatura Latinoamericana"> Coordinacion de Literatura Latinoamericana </option>
                    <option value="Coordinacion del Nucleo"> Coordinacion del Nucleo </option>
                    <option value="Coordinacion de Matematicas"> Coordinacion de Matematicas </option>
                    <option value="Coordinacion de Planificacion e Ingenieria de Recursos Hidraulicos"> Coordinacion de Planificacion e Ingenieria de Recursos Hidraulicos </option>
                    <option value="Coordinacion de Postgrado en Ciencias Biologicas"> Coordinacion de Postgrado en Ciencias Biologicas </option>
                    <option value="Coordinacion de Postgrado en Ciencias de los Alimentos y Nutricion"> Coordinacion de Postgrado en Ciencias de los Alimentos y Nutricion </option>
                    <option value="Coordinacion de Postgrado en Ciencias Politicas"> Coordinacion de Postgrado en Ciencias Politicas </option>
                    <option value="Coordinacion de Postgrado en Desarrollo y Ambiente"> Coordinacion de Postgrado en Desarrollo y Ambiente </option>
                    <option value="Coordinacion de Postgrado en Educacion"> Coordinacion de Postgrado en Educacion </option>
                    <option value="Coordinacion de Postgrado en Estadistica"> Coordinacion de Postgrado en Estadistica </option>
                    <option value="Coordinacion de Postgrado en Filosofia"> Coordinacion de Postgrado en Filosofia </option>
                    <option value="Coordinacion de Postgrado en Ingenieria de Materiales"> Coordinacion de Postgrado en Ingenieria de Materiales </option>
                    <option value="Coordinacion de Postgrado en Ingenieria de Sistemas"> Coordinacion de Postgrado en Ingenieria de Sistemas </option>
                    <option value="Coordinacion de Postgrado en Ingenieria Electrica"> Coordinacion de Postgrado en Ingenieria Electrica </option>
                    <option value="Coordinacion de Postgrado en Ingenieria Electronica"> Coordinacion de Postgrado en Ingenieria Electronica </option>
                    <option value="Coordinacion de Postgrado en Ingenieria Empresarial"> Coordinacion de Postgrado en Ingenieria Empresarial </option>
                    <option value="Coordinacion de Postgrado en Ingenieria Mecanica"> Coordinacion de Postgrado en Ingenieria Mecanica </option>
                    <option value="Coordinacion de Postgrado en Ingenieria Quimica"> Coordinacion de Postgrado en Ingenieria Quimica </option>
                    <option value="Coordinacion de Postgrado en Literatura"> Coordinacion de Postgrado en Literatura </option>
                    <option value="Coordinacion de Postgrado en Musica"> Coordinacion de Postgrado en Musica </option>
                    <option value="Coordinacion de Postgrado (Litoral)"> Coordinacion de Postgrado (Litoral) </option>
                    <option value="Coordinacion de Psicologia"> Coordinacion de Psicologia </option>
                    <option value="Coordinacion de Relaciones con la Comunidad"> Coordinacion de Relaciones con la Comunidad </option>
                    <option value="Coordinacion de Transporte Urbano"> Coordinacion de Transporte Urbano </option>
                    <option value="Coordinacion de Urbanismo"> Coordinacion de Urbanismo </option>
                    <option value="Decanato de Estudios de Postgrado"> Decanato de Estudios de Postgrado </option>
                    <option value="Decanato de Estudios Generales"> Decanato de Estudios Generales </option>
                    <option value="Decanato de Estudios Profesionales"> Decanato de Estudios Profesionales </option>
                    <option value="Decanato de Estudios Tecnologicos"> Decanato de Estudios Tecnologicos </option>
                    <option value="Decanato de Extension Universitaria"> Decanato de Extension Universitaria </option>
                    <option value="Decanato de Investigacion y Desarrollo"> Decanato de Investigacion y Desarrollo </option>
                    <option value="Departamento de Administracion de Personal"> Departamento de Administracion de Personal </option>
                    <option value="Departamento de Administracion y Almacen"> Departamento de Administracion y Almacen </option>
                    <option value="Departamento de Admision y Control de Estudios"> Departamento de Admision y Control de Estudios </option>
                    <option value="Departamento de Admision y Control de Estudios (Litoral)"> Departamento de Admision y Control de Estudios (Litoral) </option>
                    <option value="Departamento de Adquisicion y Reproduccion"> Departamento de Adquisicion y Reproduccion </option>
                    <option value="Departamento de Adquisicion y Reproduccion (Litoral)"> Departamento de Adquisicion y Reproduccion (Litoral) </option>
                    <option value="Departamento de Archivo y Estadistica (Litoral)"> Departamento de Archivo y Estadistica (Litoral) </option>
                    <option value="Departamento de Atencion al Usuario"> Departamento de Atencion al Usuario </option>
                    <option value="Departamento de Bienes Nacionales"> Departamento de Bienes Nacionales </option>
                    <option value="Departamento de Bioingenieria"> Departamento de Bioingenieria </option>
                    <option value="Departamento de Biologia Celular"> Departamento de Biologia Celular </option>
                    <option value="Departamento de Biologia Celular y Organismos"> Departamento de Biologia Celular y Organismos </option>
                    <option value="Departamento de Biologia de Organismos"> Departamento de Biologia de Organismos </option>
                    <option value="Departamento de Ciencias de la Tierra"> Departamento de Ciencias de la Tierra </option>
                    <option value="Departamento de Ciencias de los Materiales"> Departamento de Ciencias de los Materiales </option>
                    <option value="Departamento de Ciencias Economicas y Administrativas"> Departamento de Ciencias Economicas y Administrativas </option>
                    <option value="Departamento de Ciencias Politicas"> Departamento de Ciencias Politicas </option>
                    <option value="Departamento de Ciencias Sociales"> Departamento de Ciencias Sociales </option>
                    <option value="Departamento de Ciencia y Tecnologia del Comportamiento"> Departamento de Ciencia y Tecnologia del Comportamiento </option>
                    <option value="Departamento de Compras y Suministro"> Departamento de Compras y Suministro </option>
                    <option value="Departamento de Compras y Suministros"> Departamento de Compras y Suministros </option>
                    <option value="Departamento de Computacion (Litoral)"> Departamento de Computacion (Litoral) </option>
                    <option value="Departamento de Computacion y Tecnologia de la Informacion"> Departamento de Computacion y Tecnologia de la Informacion </option>
                    <option value="Departamento de Computo Cientifico y Estadistica"> Departamento de Computo Cientifico y Estadistica </option>
                    <option value="Departamento de Contabilidad"> Departamento de Contabilidad </option>
                    <option value="Departamento de Conversion y Transporte de Energia"> Departamento de Conversion y Transporte de Energia </option>
                    <option value="Departamento de Correspondencia"> Departamento de Correspondencia </option>
                    <option value="Departamento de Desarrollo de Personal"> Departamento de Desarrollo de Personal </option>
                    <option value="Departamento de Dise#o, Arquitectura y Artes Plasticas"> Departamento de Dise#o, Arquitectura y Artes Plasticas </option>
                    <option value="Departamento de Ejecucion"> Departamento de Ejecucion </option>
                    <option value="Departamento de Electronica y Circuitos"> Departamento de Electronica y Circuitos </option>
                    <option value="Departamento de Estudios Ambientales"> Departamento de Estudios Ambientales </option>
                    <option value="Departamento de Filosofia"> Departamento de Filosofia </option>
                    <option value="Departamento de Finanzas"> Departamento de Finanzas </option>
                    <option value="Departamento de Finanzas (Litoral)"> Departamento de Finanzas (Litoral) </option>
                    <option value="Departamento de Fisica"> Departamento de Fisica </option>
                    <option value="Departamento de Formacion General (Litoral)"> Departamento de Formacion General (Litoral) </option>
                    <option value="Departamento de Formacion General y Ciencias Basicas"> Departamento de Formacion General y Ciencias Basicas </option>
                    <option value="Departamento de Gestion del Capital Humano"> Departamento de Gestion del Capital Humano </option>
                    <option value="Departamento de Idiomas"> Departamento de Idiomas </option>
                    <option value="Departamento de Informacion y Documentacion"> Departamento de Informacion y Documentacion </option>
                    <option value="Departamento de Informacion y Medios"> Departamento de Informacion y Medios </option>
                    <option value="Departamento de Ingenieria Electrica"> Departamento de Ingenieria Electrica </option>
                    <option value="Departamento de Ingenieria y Mantenimiento"> Departamento de Ingenieria y Mantenimiento </option>
                    <option value="Departamento de Ingenieria y Mantenimiento (Litoral)"> Departamento de Ingenieria y Mantenimiento (Litoral) </option>
                    <option value="Departamento de Lengua y Literatura"> Departamento de Lengua y Literatura </option>
                    <option value="Departamento de Matematicas Puras y Aplicadas"> Departamento de Matematicas Puras y Aplicadas </option>
                    <option value="Departamento de Mecanica"> Departamento de Mecanica </option>
                    <option value="Departamento de Musica"> Departamento de Musica </option>
                    <option value="Departamento de Planificacion Urbana"> Departamento de Planificacion Urbana </option>
                    <option value="Departamento de Planta Fisica"> Departamento de Planta Fisica </option>
                    <option value="Departamento de Procesos Biologicos y Bioquimicos"> Departamento de Procesos Biologicos y Bioquimicos </option>
                    <option value="Departamento de Procesos y Sistemas"> Departamento de Procesos y Sistemas </option>
                    <option value="Departamento de Produccion de Impresos"> Departamento de Produccion de Impresos </option>
                    <option value="Departamento de Quimica y Procesos"> Departamento de Quimica y Procesos </option>
                    <option value="Departamento de Recursos Humanos"> Departamento de Recursos Humanos </option>
                    <option value="Departamento de Recursos Humanos (Litoral)"> Departamento de Recursos Humanos (Litoral) </option>
                    <option value="Departamento de Redes"> Departamento de Redes </option>
                    <option value="Departamento de Registro y Control Administrativo"> Departamento de Registro y Control Administrativo </option>
                    <option value="Departamento de Registro y Control Financiero"> Departamento de Registro y Control Financiero </option>
                    <option value="Departamento de Relaciones Laborales"> Departamento de Relaciones Laborales </option>
                    <option value="Departamento de Seguridad y Servicios"> Departamento de Seguridad y Servicios </option>
                    <option value="Departamento de Servicios Audiovisuales"> Departamento de Servicios Audiovisuales </option>
                    <option value="Departamento de Servicios de Red"> Departamento de Servicios de Red </option>
                    <option value="Departamento de Servicios Generales"> Departamento de Servicios Generales </option>
                    <option value="Departamento de Servicios Telefonicos"> Departamento de Servicios Telefonicos </option>
                    <option value="Departamento de Servicos Generales"> Departamento de Servicos Generales </option>
                    <option value="Departamento de Soporte de Operaciones y Sistemas"> Departamento de Soporte de Operaciones y Sistemas </option>
                    <option value="Departamento de Tecnologia de Procesos Biologicos y Bioquimicos"> Departamento de Tecnologia de Procesos Biologicos y Bioquimicos </option>
                    <option value="Departamento de Tecnologia de Servicios"> Departamento de Tecnologia de Servicios </option>
                    <option value="Departamento de Tecnologia Industrial"> Departamento de Tecnologia Industrial </option>
                    <option value="Departamento de Tecnologia Informatica"> Departamento de Tecnologia Informatica </option>
                    <option value="Departamento de Termodinamica y Fenomenos de Transferencia"> Departamento de Termodinamica y Fenomenos de Transferencia </option>
                    <option value="Departamento de Tesoreria"> Departamento de Tesoreria </option>
                    <option value="Departamento de Urbanismo"> Departamento de Urbanismo </option>
                    <option value="Direccion de Administracion"> Direccion de Administracion </option>
                    <option value="Direccion de Administracion de Programas Academicos"> Direccion de Administracion de Programas Academicos </option>
                    <option value="Direccion de Administracion (Litoral)"> Direccion de Administracion (Litoral) </option>
                    <option value="Direccion de Admision y Control de Estudios"> Direccion de Admision y Control de Estudios </option>
                    <option value="Direccion de Apoyo e Informacion Academica"> Direccion de Apoyo e Informacion Academica </option>
                    <option value="Direccion de Asuntos Publicos"> Direccion de Asuntos Publicos </option>
                    <option value="Direccion de Biblioteca"> Direccion de Biblioteca </option>
                    <option value="Direccion de Bienestar Social"> Direccion de Bienestar Social </option>
                    <option value="Direccion de Cooperacion y Relaciones Interinstitucionales"> Direccion de Cooperacion y Relaciones Interinstitucionales </option>
                    <option value="Direccion de Cultura"> Direccion de Cultura </option>
                    <option value="Direccion de Deportes"> Direccion de Deportes </option>
                    <option value="Direccion de Desarrollo Estudiantil"> Direccion de Desarrollo Estudiantil </option>
                    <option value="Direccion de Desarrollo Estudiantil (Litoral)"> Direccion de Desarrollo Estudiantil (Litoral) </option>
                    <option value="Direccion de Desarrollo Profesoral"> Direccion de Desarrollo Profesoral </option>
                    <option value="Direccion de Extension Universitaria"> Direccion de Extension Universitaria </option>
                    <option value="Direccion de Finanzas"> Direccion de Finanzas </option>
                    <option value="Direccion de Gestion del Capital Humano"> Direccion de Gestion del Capital Humano </option>
                    <option value="Direccion de Informacion Academica"> Direccion de Informacion Academica </option>
                    <option value="Direccion de Ingenieria de la Informacion"> Direccion de Ingenieria de la Informacion </option> 
                    <option value="Direccion de Investigacion"> Direccion de Investigacion </option>
                    <option value="Direccion de Investigacion (Litoral)"> Direccion de Investigacion (Litoral) </option>
                    <option value="Direccion de Mantenimiento"> Direccion de Mantenimiento </option>
                    <option value="Direccion de Planificacion y Desarrollo"> Direccion de Planificacion y Desarrollo </option>
                    <option value="Direccion de Planta Fisica"> Direccion de Planta Fisica </option>
                    <option value="Direccion de Programacion Docente"> Direccion de Programacion Docente </option>
                    <option value="Direccion de Recursos Humanos"> Direccion de Recursos Humanos </option>
                    <option value="Direccion de Relaciones Internacionales"> Direccion de Relaciones Internacionales </option>
                    <option value="Direccion de Seguridad Integral"> Direccion de Seguridad Integral </option>
                    <option value="Direccion de Servicios"> Direccion de Servicios </option>
                    <option value="Direccion de Servicios Estudiantiles"> Direccion de Servicios Estudiantiles </option>
                    <option value="Direccion de Servicios Multimedia"> Direccion de Servicios Multimedia </option>
                    <option value="Direccion de Servicios Telematicos"> Direccion de Servicios Telematicos </option>
                    <option value="Direccion General del Nucleo Universitario del Litoral"> Direccion General del Nucleo Universitario del Litoral </option>
                    <option value="Division de Ciencias Biologicas"> Division de Ciencias Biologicas </option>
                    <option value="Division de Ciencias Fisicas y Matematicas"> Division de Ciencias Fisicas y Matematicas </option>
                    <option value="Division de Ciencias Sociales y Humanidades"> Division de Ciencias Sociales y Humanidades </option>
                    <option value="Division de Ciencias y Tecnologias Administrativas e Industriales"> Division de Ciencias y Tecnologias Administrativas e Industriales </option>
                    <option value="Fondo de Pensiones y Jubilaciones"> Fondo de Pensiones y Jubilaciones </option>
                    <option value="FUNINDES"> FUNINDES </option>
                    <option value="GUIA"> GUIA </option>
                    <option value="Instituto de Altos Estudios de America Latina"> Instituto de Altos Estudios de America Latina </option>
                    <option value="Instituto de Estudios Avanzados (IDEA)"> Instituto de Estudios Avanzados (IDEA) </option>
                    <option value="Instituto de Estudios del Conocimiento (INESCO)"> Instituto de Estudios del Conocimiento (INESCO) </option>
                    <option value="Instituto de Estudios Regionales y Urbanos"> Instituto de Estudios Regionales y Urbanos </option>
                    <option value="Instituto de Estudios Regionales y Urbanos (IERU)"> Instituto de Estudios Regionales y Urbanos (IERU)</option> 
                    <option value="Instituto de Recursos Naturales Renovables"> Instituto de Recursos Naturales Renovables </option>
                    <option value="Instituto de Recursos Naturales Renovables (IRNR)"> Instituto de Recursos Naturales Renovables (IRNR)</option> 
                    <option value="Instituto de Tecnologia y Ciencias Marinas (INTECMAR)"> Instituto de Tecnologia y Ciencias Marinas (INTECMAR) </option>
                    <option value="Laboratorio A"> Laboratorio A </option>
                    <option value="Laboratorio B"> Laboratorio B </option>
                    <option value="Laboratorio C"> Laboratorio C </option>
                    <option value="Laboratorio D"> Laboratorio D </option>
                    <option value="Laboratorio E"> Laboratorio E </option>
                    <option value="Laboratorio F"> Laboratorio F </option>
                    <option value="Laboratorio de Conversion y Energia Mecanica"> Laboratorio de Conversion y Energia Mecanica </option>
                    <option value="Laboratorio de Dinamica de Maquinas"> Laboratorio de Dinamica de Maquinas </option>
                    <option value="Laboratorio de Evaluacion Nutricional"> Laboratorio de Evaluacion Nutricional </option>
                    <option value="Laboratorio de Fisica Nuclear"> Laboratorio de Fisica Nuclear </option>
                    <option value="Laboratorio de Maquinas Electricas"> Laboratorio de Maquinas Electricas </option>
                    <option value="Laboratorio de Modelos y Prototipos"> Laboratorio de Modelos y Prototipos </option>
                    <option value="Laboratorio de Resonancia Magnetica"> Laboratorio de Resonancia Magnetica </option>
                    <option value="Nomina de Jubilados"> Nomina de Jubilados </option>
                    <option value="Nomina de Pensionados"> Nomina de Pensionados </option>
                    <option value="Nomina de Sobrevivientes"> Nomina de Sobrevivientes </option>
                    <option value="Oficina de Informacion y Secretaria"> Oficina de Informacion y Secretaria </option>
                    <option value="Oficina de Ingenieria"> Oficina de Ingenieria </option>
                    <option value="Oficina de Prensa"> Oficina de Prensa </option>
                    <option value="Oficina de Presupuesto"> Oficina de Presupuesto </option>
                    <option value="Oficina de Registro y Control Financiero"> Oficina de Registro y Control Financiero </option>
                    <option value="Oficina de Relaciones Internacionales"> Oficina de Relaciones Internacionales </option>
                    <option value="Oficina de Relaciones Publicas"> Oficina de Relaciones Publicas </option>
                    <option value="Parque Tecnologico Sartenejas"> Parque Tecnologico Sartenejas </option>
                    <option value="Programa de Gerencia"> Programa de Gerencia </option>
                    <option value="Programa de Igualdad de Oportunidades"> Programa de Igualdad de Oportunidades </option>
                    <option value="Programa de Medios Audiovisuales"> Programa de Medios Audiovisuales </option>
                    <option value="Programa de Registro y Control (Planta Fisica)"> Programa de Registro y Control (Planta Fisica) </option>
                    <option value="Programas Especiales"> Programas Especiales </option>
                    <option value="Rectorado"> Rectorado </option>
                    <option value="Revista Perfiles"> Revista Perfiles </option>
                    <option value="Seccion de Actividades y Organizacion Estudiantil"> Seccion de Actividades y Organizacion Estudiantil </option>
                    <option value="Seccion de Corresponencia"> Seccion de Corresponencia </option>
                    <option value="Seccion de Salud"> Seccion de Salud </option>
                    <option value="Secretaria"> Secretaria </option>
                    <option value="Secretaria del Consejo Academico"> Secretaria del Consejo Academico </option>
                    <option value="Secretaria del Consejo Directivo"> Secretaria del Consejo Directivo </option>
                    <option value="Servicio de Comedores"> Servicio de Comedores </option>
                    <option value="Servicio Medico"> Servicio Medico </option>
                    <option value="Sindicato de Obreros"> Sindicato de Obreros </option>
                    <option value="Sindicato de Obreros de la USB"> Sindicato de Obreros de la USB </option>
                    <option value="Sociedad Galileana"> Sociedad Galileana </option>
                    <option value="SUTES"> SUTES </option>
                    <option value="Taller de Multimedia"> Taller de Multimedia </option>
                    <option value="Unidad de Apoyo Administrativo"> Unidad de Apoyo Administrativo </option>
                    <option value="Unidad de Apoyo Logistico"> Unidad de Apoyo Logistico </option>
                    <option value="Unidad de Auditoria Interna"> Unidad de Auditoria Interna </option>
                    <option value="Unidad de Gestion Ambiental"> Unidad de Gestion Ambiental </option>
                    <option value="Unidad de Laboratorios"> Unidad de Laboratorios </option>
                    <option value="Unidad de Programas Especiales"> Unidad de Programas Especiales </option>
                    <option value="Unidad Educativa USB"> Unidad Educativa USB </option>
                    <option value="Vice-Rectorado Academico"> Vice-Rectorado Academico </option>
                    <option value="Vice-Rectorado Administrativo"> Vice-Rectorado Administrativo </option>
                </select>
                </td>
            </tr>

            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Cuántas personas ,aproximadamente,<br/>serían beneficiadas por el sistema?</b></LABEL> :</td>
                           <td><input title="Numero de personas afectadas" type="text" name="personas" id="personas" value="<?php print $solicitud["nroAfectados"]?>" maxlength="7" onkeypress="return onlyNumbers(event)"/></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*Planteamiento del problema:</b><br/>(Máx. 500 caracteres)</LABEL></td>
                    <td><textarea name="planteamiento" id="planteamiento" title="Información referente al problema" rows="10" cols="40" onkeypress="return contadorCaracteres(event)"><?php print $solicitud["planteamiento"]?></textarea></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Dispone de Recursos tecnológicos?<br/>De ser así indique cuáles</b><br/>(Máx. 500 caracteres)</LABEL> </td>
                    <td><textarea name="recursos" id="recursos" title="computadora, servidor, conexión a internet, etc." rows="5" cols="40" onkeypress="return contadorCaracteres(event)"><?php print $solicitud["tecnologia"]?></textarea></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Dispone de tiempo libre <br/> para dedicárselo al sistema?</b><br/>(Máx. 500 caracteres) </LABEL> </td>
                    <td><textarea name="tiempolibre" id="tiempolibre" title="Información acerca de su tiempo libre" rows="5" cols="40" onkeypress="return contadorCaracteres(event)"><?php print $solicitud["tiempo"]?></textarea></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Por qué cree usted que es necesario<br/>desarrollar un SI para su problema? </b><br/>(Máx. 500 caracteres)</LABEL> </td>
                    <td><textarea name="justificacion" id="justificacion" title="" rows="5" cols="40" onkeypress="return contadorCaracteres(event)"><?php print $solicitud["justificacion"]?></textarea></td>
            </tr>
			<tr>
				<?php
					  echo '<td colspan="2"><table id="tablaTel" border="0" width=100%>';
					  $i = 0;
					  $j = sizeof($telefonos);
					  while($i < $j){
					     echo '<tr><td align="right"><LABEL for="surname" width=35.3%><b>*Teléfono:</b></LABEL> </td>
							<td width=64.7%><select name="codigo[]" id="codigo[]">
									<option value="'.substr($telefonos[$i],0,4).'" selected="selected">'.substr($telefonos[$i],0,4).'</option>
									<option value="0212">0212</option>
									<option value="0412">0412</option>
									<option value="0414">0414</option>
									<option value="0424">0424</option>
									<option value="0416">0416</option>
									<option value="0426">0426</option>
							</select>-<input title="Ingrese su número de teléfono" type="text" name="tlf[]" id="tlf[]" value="'.substr($telefonos[$i],4,11).'" maxlength="7" size="7" onkeypress="return onlyNumbers(event)"/></td></tr>';
					   $i++;
					  }
					  echo '</table></td>';
				?>
            </tr>

			
			
            <tr>
                    <td>
						<input type="hidden" name="submitRegistration" value="true"/>
					</td>
					
                    <td colspan="2">
							<input type="submit" id="enviar" name="enviar" value="Guardar" alt="Guardar" class="submitbutton" title="Guardar cambios" />
                    </td>
            </tr>
			

        </table>
        </form>

        <h3> </h3>
<?php 

if (isset($_POST["department"]) && isset($_POST["tlf"])){
	$tel = $_POST["tlf"];
    $area = $_POST["codigo"];
    if ( $tel[0]=="" || $_POST["personas"]=="" || $_POST["planteamiento"]=="" || $_POST["recursos"]==""
      	|| $_POST["tiempolibre"]=="" || $_POST["justificacion"]=="") 	{			
        header("Location: ../principal.php?content=editaSolicitud&nro=".$nro."&email=".$email."&error=camposVacios");
    }else{
	   if($_POST["department"] == ""){
            header("Location: ../principal.php?content=editaSolicitud&nro=".$nro."&email=".$email."&error=Unidad");
        }else{
			$i = 0;
			$j = sizeof($tel);
			while( $i < $j) {
			  if($tel[$i]!=""){
					if(strlen($tel[$i]) !=7){
					       header("Location: ../principal.php?content=editaSolicitud&nro=".$nro."&email=".$email."&error=formatoTlf");
			  }} else if($tel[$i]==""){
					       header("Location: ../principal.php?content=editaSolicitud&nro=".$nro."&email=".$email."&error=formatoTlf");			  
			  }
			  $i++;
			}
            $unidadUSB = $_POST["department"];
			
				//echo "<script language=’JavaScript’>      alert(‘JavaScript dentro de PHP’);     </script>";
				$fachada = fachadaInterfaz::getInstance();
				if(($fachada->actualizarSolicitud($nro,$_POST["planteamiento"],$_POST["justificacion"],$email, $_POST["tiempolibre"], $_POST["recursos"],$_POST["personas"],$unidadUSB, $status,$tel,$area,$telefonos))==0)
				{
				  // header("Location: ../principal.php?content=solicitudExitosa&numero=".$numero."&mail=".$email);
				}
		}
	}
} 
?>

    </div>  

    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->

<div class="side_column_w200">

    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>