function clearText(field)
{   
    if (field.defaultValue == field.value) {
        field.value = '';
        if (field.name == 'pass' && field.type == 'text') field.type = 'password';
    }
    else if (field.value == ''){
        field.value = field.defaultValue;
        field.type = 'text';
    }
        
}

function onlyNumbers(evt)
{
    var keyPressed = (evt.which) ? evt.which : event.keyCode
    return !(keyPressed > 31 && (keyPressed < 48 || keyPressed > 57));
}

function onlyAlfaNumbers(evt)
{
    var keyPressed = (evt.which) ? evt.which : event.keyCode
    return (keyPressed < 32 || (keyPressed > 47 && keyPressed < 58) || (keyPressed > 64 && keyPressed < 91) || (keyPressed > 96 && keyPressed < 123));
}

function activar(id,button) {
    if (document.getElementById(id).checked){
        document.getElementById(button).disabled = "";
    }else{
        document.getElementById(button).disabled = true;
    }
  
} 

function activar_check(id) {
    if (document.getElementById(id).checked){
        document.getElementById(id).checked = "";
    }else{
        document.getElementById(id).checked = "checked";
    }
  
} 

function activarCampo(option,campo) {
    if (option == "codigo"){
        document.getElementById(campo).disabled = true;
    }else{
        document.getElementById(campo).disabled = "";
    }
  
} 
function telefFormat(valor, mensaje, valor2, bool, evt)
{
    var keyPressed = (evt.which) ? evt.which : event.keyCode
    return !(keyPressed > 31 && (keyPressed < 48 || keyPressed > 57));
}//onkeypress="return CedulaFormat(this,'Cédula de Indentidad Invalida',-1,true,event)

function addRow(tableID) {
	var table = document.getElementById(tableID); 
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount); 
	var colCount = table.rows[0].cells.length; 
	for(var i=0; i<colCount; i++) { 
		var newcell = row.insertCell(i);
		newcell.innerHTML = table.rows[0].cells[i].innerHTML;
		//alert(newcell.childNodes[0].type);
		switch(newcell.childNodes[0].type) {
			case "text":
					newcell.childNodes[0].value = "";
					break;
			case "select-one":
					newcell.childNodes[0].selectedIndex = 0;
					/*newcell.childNodes[0].onchange = function onchange(event) { activarCampo(this.value, "tlf[]");}
					newcell.childNodes[0].name = newcell.childNodes[0].name+rowCount;
					newcell.childNodes[2].name = newcell.childNodes[2].name+rowCount;
					newcell.childNodes[2].id = newcell.childNodes[2].id+rowCount;*/
					break;
			default:
					newcell.align = "right";
					break;
		}
	}
}
var id=0;
function addActividadIteracion(tableID) {
	var table = document.getElementById(tableID); 
	var rowCount = table.rows.length;
	for (var j=0;j<2;j++){
		//alert(table.rows[0].cells[0].innerHTML);
		//alert(rowCount);
		var row = table.insertRow(rowCount+j); 
		
		var colCount = table.rows[j].cells.length; 
		//alert(table.rows[j].cells.length);
		for(var i=0; i<colCount; i++) { 
		//alert(table.rows[j].cells[i].innerHTML);
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[j].cells[i].innerHTML;
			
			switch(newcell.childNodes[0].type) {
				case "text":
						newcell.childNodes[0].value = "";
						newcell.childNodes[0].style.border = "blue";
						
						break;
				case "select-one":
						newcell.childNodes[0].selectedIndex = 0;
						newcell.childNodes[0].style.border = "blue";
						break;
				case "textarea":
						newcell.childNodes[0].value = "";
						newcell.childNodes[0].style.border = "blue";
						break;
				default:
						//newcell.childNodes[0].style.border = "blue";
						newcell.childNodes[0].align = "right";
						break;
			}
		}
	}
	
	var botonesEliminar = document.getElementsByName("eliminarActividad");
	var nbotones = botonesEliminar.length;
	botonesEliminar[nbotones-1].id=nbotones;
	botonesEliminar[nbotones-1].hidden=false;
	id++;
	var botonesCalendario = document.getElementsByName("calendario[]");
	var nbotonesCalendario = botonesCalendario.length;
	botonesCalendario[nbotonesCalendario-2].id="cal-button-"+((2*id)-1);
	botonesCalendario[nbotonesCalendario-1].id="cal-button-"+(2*id);
	
	var inputsCalendario = document.getElementsByName("fechaInicio[]");
	var ninputsCalendario = inputsCalendario.length;
	inputsCalendario[ninputsCalendario-1].id="cal-field-"+((2*id)-1);
	
	var inputsCalendarioFF = document.getElementsByName("fechaFin[]");
	var ninputsCalendarioFF = inputsCalendarioFF.length;
	inputsCalendarioFF[ninputsCalendarioFF-1].id="cal-field-"+(2*id);	
	nuevoCalendario(2*id);
	nuevoCalendario((2*id)-1);
	
	var estudiantes = document.getElementsByName("nEstudiantes[]");
	var nestudiantes = estudiantes.length;
	estudiantes[nestudiantes-1].value=0;
	estudiantes[nestudiantes-1].id="nEstudiantes-"+id;
/*
	var pgrid = document.getElementsByName("usuariosGrid-1");
	var npgrid = pgrid.length;
	pgrid[npgrid-1].id="usuariosGrid-"+id;*/
	table.deleteRow(rowCount+1);
	addElementGrid(id,tableID);
	nuevoJquery(id);
	var inputsnombre = document.getElementsByName("nombreAct[]");
	var ninputsnombre = inputsnombre.length;
	inputsnombre[ninputsnombre-1].id="nombreAct-"+id;


}
function addElementGrid(id,tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);
	var newcell = row.insertCell(0);
	newcell.innerHTML = '<table align="center"><tr><td><table id="usuariosGrid-'+id+'" ><tr><td/></tr></table><div id="usuariosPager-'+id+'" ></div> <p></p></td></tr></table>';
}
function addActividad(tableID) {
	var table = document.getElementById(tableID); 
	var rowCount = table.rows.length;
	for (var j=0;j<7;j++){
		//alert(table.rows[0].cells[0].innerHTML);
		//alert(rowCount);
		var row = table.insertRow(rowCount+j); 
		
		var colCount = table.rows[j].cells.length; 
		//alert(table.rows[j].cells.length);
		for(var i=0; i<colCount; i++) { 
		//alert(table.rows[j].cells[i].innerHTML);
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[j].cells[i].innerHTML;
			
			switch(newcell.childNodes[0].type) {
				case "text":
						newcell.childNodes[0].value = "";
						newcell.childNodes[0].style.border = "blue";
						
						break;
				case "select-one":
						newcell.childNodes[0].selectedIndex = 0;
						newcell.childNodes[0].style.border = "blue";
						break;
				case "textarea":
						newcell.childNodes[0].value = "";
						newcell.childNodes[0].style.border = "blue";
						break;
				default:
						//newcell.childNodes[0].style.border = "blue";
						newcell.childNodes[0].align = "right";
						break;
			}
		}
	}
	var botonesEliminar = document.getElementsByName("eliminarActividad");
	var nbotones = botonesEliminar.length;
	botonesEliminar[nbotones-1].id=nbotones;
	botonesEliminar[nbotones-1].hidden=false;
	id++;
	var botonesCalendario = document.getElementsByName("calendario[]");
	var nbotonesCalendario = botonesCalendario.length;
	botonesCalendario[nbotonesCalendario-1].id="cal-button-"+id;
	
	var inputsCalendario = document.getElementsByName("fecha[]");
	var ninputsCalendario = inputsCalendario.length;
	inputsCalendario[ninputsCalendario-1].id="cal-field-"+id;
	
	var inputsSemana = document.getElementsByName("semana[]");
	var ninputsSemana = inputsSemana.length;
	inputsSemana[ninputsSemana-1].id="semana-"+id;
	
	var inputsPonderaje = document.getElementsByName("puntos[]");
	var ninputsPonderaje = inputsPonderaje.length;
	inputsSemana[ninputsPonderaje-1].id="puntos-"+id;
	
	var inputsDescripcion = document.getElementsByName("descripcion[]");
	var ninputsDescripcion = inputsDescripcion.length;
	inputsDescripcion[ninputsDescripcion-1].id="descripcion-"+id;
	
	var inputsnombre = document.getElementsByName("nombreAct[]");
	var ninputsnombre = inputsnombre.length;
	inputsnombre[ninputsnombre-1].id="nombreAct-"+id;
	nuevoCalendario(id);
}
function addCliente(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
        //alert(rowCount);
	for (var j=0;j<7;j++){
		//alert(table.rows[0].cells[0].innerHTML);
		//alert(rowCount);
		var row = table.insertRow(rowCount+j);
		var colCount = table.rows[j].cells.length;
		//alert(table.rows[j].cells.length);
		for(var i=0; i < colCount; i++) {
		//alert(table.rows[j].cells[i].innerHTML);
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[j].cells[i].innerHTML;

			switch(newcell.childNodes[0].type) {
				case "text":
						newcell.childNodes[0].value = "";
						break;
				case "select-one":
						newcell.childNodes[0].selectedIndex = 0;
						break;
				default:
						newcell.align = "right";
						break;
			}
		}
	}
	var botonesEliminar = document.getElementsByName("eliminarCliente");
	var nbotones = botonesEliminar.length;
       // alert(nbotones);
	botonesEliminar[nbotones-1].id=nbotones;
	id++;	
}


function deleteCliente(id) {
	var table = document.getElementById("tableCliente");
	var botonesEliminar = document.getElementsByName("eliminarCliente");
	var nbotones = botonesEliminar.length;
	if (id==1 && nbotones==1)	alert("El proyecto debe contener al menos un cliente asociado");
	else	var respuesta=confirm("Esta seguro que desea eliminar este cliente ?");
	if (respuesta)	for (var j=0;j<7;j++)	table.deleteRow(((id-1)*7));
	for(var j=id-1;j<nbotones;j++)	botonesEliminar[j].id=j+1;
}

var idP = 0;

function addElementInput(tipo,tableID,correoProf,id) {
	var table = document.getElementById(tableID);
	var row = table.insertRow(0);
	var newcell = row.insertCell(0);
	newcell.innerHTML = '<input id="'+id+'" hidden="true" name="'+tipo+'[]" value="'+correoProf+'"/>';
}
function addElementInputVisible(tipo,tableID,correoProf,id,tipoP) {
	var table = document.getElementById(tableID);
	var row = table.insertRow(0);
	var newcell = row.insertCell(0);
	newcell.innerHTML = '<font id="font'+id+'" size="4" face="arial"><b>'+tipoP+' : '+id+'</b></font>';
	var newcell = row.insertCell(1);
	newcell.innerHTML = '<textarea rows="3" cols="17" id="'+id+'" name="'+tipo+'[]" value="'+correoProf+'"></textarea>';
}
var idPE=0;
function addProductoExtra(tipo,tableID,id) {
	idPE++;
	var table = document.getElementById(tableID);
	var row = table.insertRow(0);
	var newcell = row.insertCell(0);
	newcell.innerHTML = '<h2 id="H1'+idPE+'"></h2>';
	var newcell = row.insertCell(1);
	newcell.innerHTML = '<h2 id="H2'+idPE+'"></h2>';
	var newcell = row.insertCell(2);
	newcell.innerHTML = '<h2 id="H3'+idPE+'"></h2>';
	var row = table.insertRow(1);
	var newcell = row.insertCell(0);
	newcell.innerHTML = '<font id="font'+idPE+'" size="4" face="arial"><b>Nombre: </b></font>';
	var newcell = row.insertCell(1);
	newcell.innerHTML = '<input title="Apellido" type="text" id="input'+idPE+'" name="apellido" value="" />';
	var newcell = row.insertCell(2);
	//alert('<IMG SRC="images/ICO/Symbol-Delete.ico" width="30" height="30" type="button" onclick="eliminarPE(\''+idPE+'\')" id="eliminarActividad" name="eliminarActividad" alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=30;this.height=30">');
	newcell.innerHTML = '<IMG SRC="images/ICO/Symbol-Delete.ico" width="30" height="30" type="button" onclick="eliminarPE(\''+idPE+'\')" id="eliminar'+idPE+'" alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=30;this.height=30">';
		var row = table.insertRow(2);
	var newcell = row.insertCell(0);
	newcell.innerHTML = '<font id="fontI'+idPE+'" size="4" face="arial"><b>Descripcion: </b></font>';
	var newcell = row.insertCell(1);
	newcell.innerHTML = '<textarea id="textarea'+idPE+'" rows="3" cols="17"></textarea>';	
	addElementInputVisible('criteriosPE','listaCriterios','Complete ...','Nro '+idPE+':','Producto Extra:')
}
function eliminarPE(id){
	eliminarCriterio('Nro '+idPE+':');
	imagen = document.getElementById("H1"+id);
	if (!imagen){
		alert("El elemento selecionado no existe");
	} else {
		padre = imagen.parentNode;
		padre.removeChild(imagen);
	}
		imagen = document.getElementById("H2"+id);
	if (!imagen){
		alert("El elemento selecionado no existe");
	} else {
		padre = imagen.parentNode;
		padre.removeChild(imagen);
	}
	imagen = document.getElementById("H3"+id);
	if (!imagen){
		alert("El elemento selecionado no existe");
	} else {
		padre = imagen.parentNode;
		padre.removeChild(imagen);
	}
	imagen = document.getElementById("eliminar"+id);
	if (!imagen){
		alert("El elemento selecionado no existe");
	} else {
		padre = imagen.parentNode;
		padre.removeChild(imagen);
	}
	imagen = document.getElementById("font"+id);
	if (!imagen){
		alert("El elemento selecionado no existe");
	} else {
		padre = imagen.parentNode;
		padre.removeChild(imagen);
	}
	imagen = document.getElementById("input"+id);
	if (!imagen){
		alert("El elemento selecionado no existe");
	} else {
		padre = imagen.parentNode;
		padre.removeChild(imagen);
	}
	imagen = document.getElementById("fontI"+id);
	if (!imagen){
		alert("El elemento selecionado no existe");
	} else {
		padre = imagen.parentNode;
		padre.removeChild(imagen);
	}
		imagen = document.getElementById("textarea"+id);
	if (!imagen){
		alert("El elemento selecionado no existe");
	} else {
		padre = imagen.parentNode;
		padre.removeChild(imagen);
	}
}
function eliminarElemento(id){
	imagen = document.getElementById(id);
	if (!imagen){
		alert("El elemento selecionado no existe");
	} else {
		padre = imagen.parentNode;
		padre.removeChild(imagen);
	}
}
function eliminarCriterio(id){
	imagen = document.getElementById(id);
	if (!imagen){
		alert("El elemento selecionado no existe");
	} else {
		padre = imagen.parentNode;
		padre.removeChild(imagen);
	}
	imagen = document.getElementById("font"+id);
	if (!imagen){
		alert("El elemento selecionado no existe");
	} else {
		padre = imagen.parentNode;
		padre.removeChild(imagen);
	}
}
/*
function deleteProfesor(idP) {
	var table = document.getElementById("tableProfesor");
	var botonesEliminar = document.getElementsByName("eliminarProfesor");
	var nbotones = botonesEliminar.length;
       // alert(nbotones);
	if (idP==1 && nbotones==1)	alert("El proyecto debe contener al menos un profesor evaluador.");
	else	var respuesta=confirm("Esta seguro que desea eliminar este profesor ?");
	if (respuesta)	for (var j=0;j<3;j++)	table.deleteRow(((idP-1)*3));
	for(var j=idP-1;j<nbotones;j++)	botonesEliminar[j].id=j+1;
}*/

function deleteActividad(id) {
	var table = document.getElementById("tableActividad");
	var botonesEliminar = document.getElementsByName("eliminarActividad");
	var nbotones = botonesEliminar.length;
	if (nbotones==1)	alert("La planificacion debe contener almenos una actividad asociada"); 
	else	var respuesta=confirm("Esta seguro que desea eliminar esta actividad de su planificacion ?");
	if (respuesta)	for (var j=0;j<7;j++)	table.deleteRow(((id-1)*7));
	for(var j=id-1;j<nbotones;j++)	botonesEliminar[j].id=j+1;
	totalizarPonderacion();
}

function nuevoCalendario(id) {
	Calendar.setup({
	  inputField    : "cal-field-"+id,
	  button        : "cal-button-"+id,
	  align         : "Tr"
	});
}
var urlCompleta;
function url(u){
	urlCompleta=u;
	initializeIteracion();
}
function nuevoJquery(ids) {
	$(function(){ 
  $("#usuariosGrid-"+ids).jqGrid({
    url: String("acciones/cargarUsuariosEstudiantesEquipo.php?Equipo="+urlCompleta),
    datatype: 'xml',
    mtype: 'GET',
    colNames:['UsbID','Nombre', 'Apellido','Participa en actividad'],
    colModel :[ 
      {name:'correoUSB', index:'correoUSB', width:150}, 
      {name:'nombre', index:'nombre', width:120}, 
      {name:'apellido', index:'apellido', width:120, align:'right'}, 
	  {name:'pertenece', index:'pertenece', width:150, align:'right'}, 
    ],
    pager: String("#usuariosPager-"+ids),
    toolbar:[true,"top"],
    height: 'auto',
    rowNum:20,
    rowList:[20,40,60],
    sortname: 'invid',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    ondblClickRow: function(id){
        /*var val = jQuery(this).getRowData(id);
		var inputNE = document.getElementById("nEstudiantes-"+ids);
		if (val['pertenece']=='No') {	
			jQuery(this).setCell(id,'pertenece','Si',false,false, false);
			addElementInput('estudiantes-'+ids,'listaEstudiantes',val['correoUSB'],val['correoUSB']+'-'+ids)
			inputNE.value=parseInt(inputNE.value) +1;
		} else {
			jQuery(this).setCell(id,'pertenece','No',false,false, false);
			eliminarElemento(val['correoUSB']+'-'+ids);
			inputNE.value=parseInt(inputNE.value) -1;
		}*/
	},
    caption: 'Estudiantes',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
}
function initialize() {
	id++;
	nuevoCalendario(id);
}
function initializeIteracion() {
	id++;
	nuevoCalendario((2*id)-1);
	nuevoCalendario(2*id);
	nuevoJquery(id);
}
function desactivar(id) {
    if (document.getElementById(id).checked){
        document.getElementById(id).checked = "";
    }  
} 
function validarSolicitud() {
	var error="Se han presentado errores en el llenado de la solicitud.\n\n Por favor siga las instrucciones para solventarlo:\n";
	var booleano=true;
	//var RegExPattern =/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,10})$/;
    if ((!(/\w(@usb\.ve){1}$/.test(document.getElementById("email").value))) || (document.getElementById("email").value=="") 
		|| (document.getElementById("email").value=="ejemplo@usb.ve")){
		error=error+"\n\t Ingrese un correo electronico de la USB.";
		booleano=false;
    }
	if (document.getElementById("department").value == ""){	
		error=error+"\n\t Seleccione una Unidad Administrativa valida.";
		booleano=false;
	}
	if (document.getElementById("personas").value == ""){
		error=error+"\n\t Rellene el campo de personas afectadas del problema.";
		booleano=false;
	}
	if (document.getElementById("planteamiento").value == ""){
		error=error+"\n\t Rellene el campo de planteamiento del problema.";
		booleano=false;
	}
	if (document.getElementById("recursos").value == ""){
		error=error+"\n\t Rellene el campo de recursos tecnologicos disponibless.";
		booleano=false;
	}
	if (document.getElementById("tiempolibre").value == ""){
		error=error+"\n\t Rellene el campo de disponibilidad de tiempo.";
		booleano=false;
	}
	if (document.getElementById("justificacion").value == ""){
		error=error+"\n\t Rellene el campo de justificacion de su solicitud.";
		booleano=false;
	}
	
	if (!booleano)	alert(error);
    return booleano;
} 
function estaVacio(elemento){
//alert(elemento.type);
	switch(elemento.type) {
				case "text":
					if (elemento.value == ""){ 
						alert("Por favor complete el campo, es obligatorio.");
						elemento.focus();
					}
					break;
				case "textarea":
					if (elemento.value == ""){ 
						alert("Por favor complete el campo, es obligatorio.");
						elemento.focus();
					}
					break;
				default:
						break;
			}
}
function validarPlanificacion() {
	document.getElementById("numPlanif").style.border = "red";
	document.getElementById("planificacion_name").style.border = "red";
	document.getElementById("totalPond").style.border="red";
	var error="Se han presentado errores en el llenado de la solicitud.\n\n Por favor siga las instrucciones para solventarlo:\n";
	var booleano=true;
	if (document.getElementById("planificacion_name").value == ""){	
		document.getElementById("planificacion_name").style.border = "medium solid red";
		error=error+"\n\t Rellene la casilla de nombre de planificacion.";
		booleano=false;
	}
	if (document.getElementById("numPlanif").value == ""){
		document.getElementById("numPlanif").style.border = "medium solid red";
		error=error+"\n\t Rellene la casilla de numero de etapa";
		booleano=false;
	}
	var semanas=document.getElementsByName("semana[]");
	var puntos=document.getElementsByName("puntos[]");
	var descripcion=document.getElementsByName("descripcion[]");
	var fechas=document.getElementsByName("fecha[]");
	var nombres=document.getElementsByName("nombreAct[]");
	var nSemanas=semanas.length;
	for(var i=0;i<nSemanas;i++){
		puntos[i].style.border = "blue";
		semanas[i].style.border = "blue";
		descripcion[i].style.border = "blue";
		fechas[i].style.border = "blue";
		nombres[i].style.border = "blue";
		if (semanas[i].value == "semana"){
				//error=error+"\n\t Seleccione semanas validas para los campos Semana de cada actividad.";
				semanas[i].style.border = "medium solid red";
				//..semanas[i].style.padding="1em";
				booleano=false;
		}
		if (puntos[i].value == ""){
				//error=error+"\n\t Rellene el campo ponderacion de cada actividad.";
				puntos[i].style.border = "medium solid red";
				booleano=false;
		}
		if (descripcion[i].value == ""){
				//error=error+"\n\t Rellene el campo ponderacion de cada actividad.";
				descripcion[i].style.border = "medium solid red";
				booleano=false;
		}
		if (fechas[i].value == "Seleccione ->"){
				//error=error+"\n\t Rellene el campo ponderacion de cada actividad.";
				fechas[i].style.border = "medium solid red";
				booleano=false;
		}
		if (nombres[i].value == ""){
				nombres[i].style.border = "medium solid red";
				booleano=false;
		}
	}
	var valor=parseInt(document.getElementById("totalPond").value);
	if (valor>50){
			document.getElementById("totalPond").style.border = "medium solid red";
			booleano=false;
	}
	error=error+"\n\t Rellene los campos que resaltan en rojo.";
	if (!booleano)	alert(error);
    return booleano;
} 

function validarProyecto() {
	var booleano=true;
	document.getElementById("nombreProy").style.border = "red";
	document.getElementById("solicitud").style.border = "red";
    var error="Se han presentado errores en el llenado de los datos del proyecto.\n\n Por favor siga las siguientes instrucciones para solventarlo:\n";
	
	var profesores=document.getElementsByName("profesores[]");
	var nprofesores=profesores.length;
	//alert(nprofesores);
	if (nprofesores==0) {
	     error=error+"\n\t Debe existir al menos un profesor evaluador.";
		 booleano=false;
    }
	var boolCorreo = true;
	if (document.getElementById("nombreProy").value == "") {	
		document.getElementById("nombreProy").style.border = "medium solid red";
		error=error+"\n\t Rellene el campo del nombre del Proyecto";
		booleano=false;
	}
	if (document.getElementById("solicitud").value == ""){
		document.getElementById("solicitud").style.border = "medium solid red";
		error=error+"\n\t Seleccione la Solicitud a asociar con el Proyecto";
		booleano=false;
	}
	if (document.getElementById("etapa").value == ""){
		document.getElementById("etapa").style.border = "medium solid red";
		error=error+"\n\t Seleccione la Etapa a asociar con el Proyecto";
		booleano=false;
	}
	var nombres=document.getElementsByName("nombre[]");
	var apellidos=document.getElementsByName("apellido[]");
	var correos=document.getElementsByName("email[]");
	var tels=document.getElementsByName("tlf[]");
	var roles=document.getElementsByName("rol[]");
	var nNombres=nombres.length;
	for (var i=0;i<nNombres;i++) {
		nombres[i].style.border = "blue";
		apellidos[i].style.border = "blue";
		correos[i].style.border = "blue";
		tels[i].style.border = "blue";
		roles[i].style.border = "blue";
		if (nombres[i].value == ""){
				nombres[i].style.border = "medium solid red";
				booleano=false;
		}
		if (apellidos[i].value == ""){
				apellidos[i].style.border = "medium solid red";
				booleano=false;
		}
		var correo = correos[i].value.toLowerCase();
		if (correo == "ejemplo@usb.ve" || !(/\w(@usb\.ve){1}$/.test(correo))){
				correos[i].style.border = "medium solid red";
				booleano=false;
				boolCorreo=false;
		} 
		if (tels[i].value == "" || tels[i].length < 7){
				tels[i].style.border = "medium solid red";
				booleano=false;
		}
		if (roles[i].value == ""){
				roles[i].style.border = "medium solid red";
				booleano=false;
		}
	}
	if (!boolCorreo) {
	     error=error+"\n\t Inserte un correo electronico de la comunidad USB.";
    }
	error=error+"\n\t Rellene los campos que resaltan en rojo."
	if (!booleano)	alert(error);
    return booleano;
}
function setId(i){
	id=i;
}


function totalizarPonderacion(element){
	var inputsPonderaje = document.getElementsByName("puntos[]");
	var ninputsPonderaje = inputsPonderaje.length;
	var valor = 0;
	for (var i=0;i<ninputsPonderaje;i++) {
		var ptos=parseInt(inputsPonderaje[i].value);
		if (ptos)	valor+=ptos;
	}
	document.getElementById("totalPond").value=""+valor;
	if (valor>50) alert("Advertencia: La sumarotia de las puntuaciones del total de actividades es mayor a 50.");
}


function showHide(id) {

  if (document.getElementById(id).style.display == "none") {
    document.getElementById(id).style.display = '';
  }

  else {
    document.getElementById(id).style.display = "none";
  }

}

function showHideTC(id) {
	showHide(id);
	showHide('hide');
	showHide('add');
}

id = 0;
function addEstudiante(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
        //alert(rowCount);
	for (var j=0;j<6;j++){
		//alert(table.rows[0].cells[0].innerHTML);
		//alert(rowCount);
		var row = table.insertRow(rowCount+j);
		var colCount = table.rows[j].cells.length;
		//alert(table.rows[j].cells.length);
		for(var i=0; i < colCount; i++) {
		//alert(table.rows[j].cells[i].innerHTML);
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[j].cells[i].innerHTML;

			switch(newcell.childNodes[0].type) {
				case "text":
						newcell.childNodes[0].value = "";
						break;
				case "select-one":
						newcell.childNodes[0].selectedIndex = 0;
						break;
				default:
						newcell.align = "right";
						break;
			}
		}
	}
	var botonesEliminar = document.getElementsByName("eliminarEstudiante");
	var nbotones = botonesEliminar.length;
       // alert(nbotones);
	botonesEliminar[nbotones-1].id=nbotones;
	id++;	
}


function deleteEstudiante(id) {
	var table = document.getElementById("tableEstudiante");
	var botonesEliminar = document.getElementsByName("eliminarEstudiante");
	var nbotones = botonesEliminar.length;
	if (id==1 && nbotones==1) showHideTC("tableEstudiante");
	else	var respuesta=confirm("Esta seguro que desea eliminar este cliente ?");
	if (respuesta)	for (var j=0;j<6;j++)	table.deleteRow(((id-1)*6));
	for(var j=id-1;j<nbotones;j++)	botonesEliminar[j].id=j+1;
}

function validarEquipo() {
	var booleano=true;
	document.getElementById("nombreE").style.border = "red";
	document.getElementById("etapa").style.border = "red";
	document.getElementById("proyecto").style.border = "red";
    var error="Se han presentado errores en el llenado de los datos del proyecto.\n\n Por favor siga las siguientes instrucciones para solventarlo:\n";
	var boolCorreo = true;
	
	if (document.getElementById("nombreE").value == "") {	
		document.getElementById("nombreE").style.border = "medium solid red";
		error=error+"\n\t Rellene el campo de nombre del equipo";
		booleano=false;
	}
	if (document.getElementById("etapa").value == ""){
		document.getElementById("etapa").style.border = "medium solid red";
		error=error+"\n\t Seleccione una etapa";
		booleano=false;
	}
	if (document.getElementById("proyecto").value == ""){
		document.getElementById("proyecto").style.border = "medium solid red";
		error=error+"\n\t Seleccione un proyecto";
		booleano=false;
	}
	var nombres=document.getElementsByName("nombre[]");
	var apellidos=document.getElementsByName("apellido[]");
	var correos=document.getElementsByName("email[]");
	var carne=document.getElementsByName("carne[]");
	var nNombres=nombres.length;
	var estudiantes=document.getElementsByName("estudiantes[]");
	var nestudiantes=estudiantes.length;
	//alert(nestudiantes+nNombres);
	if ( (nestudiantes+nNombres)==1 && document.getElementById('tableEstudiante').style.display == 'none') {
	     error=error+"\n\t Debe existir al menos un estudiante en el equipo.";
		 booleano=false;
    }
	if(document.getElementById('tableEstudiante').style.display != 'none'){
		
		for (var i=0;i<nNombres;i++) {
			nombres[i].style.border = "blue";
			apellidos[i].style.border = "blue";
			correos[i].style.border = "blue";
			carne[i].style.border = "blue";
			if (nombres[i].value == ""){
					nombres[i].style.border = "medium solid red";
					booleano=false;
			}
			if (apellidos[i].value == ""){
					apellidos[i].style.border = "medium solid red";
					booleano=false;
			}
			var correo = correos[i].value.toLowerCase();
			if (correo == "ejemplo@usb.ve" || !(/\w(@usb\.ve){1}$/.test(correo))){
					correos[i].style.border = "medium solid red";
					booleano=false;
					boolCorreo=false;
			} 
			if (carne[i].value == ""){
					carne[i].style.border = "medium solid red";
					booleano=false;
			}
		}
		if (!boolCorreo) {
			 error=error+"\n\t Inserte un correo electronico de la comunidad USB.";
		}
	}
	
	error=error+"\n\t\n\t Rellene los campos que resaltan en rojo."
	if (!booleano)	alert(error);
    return booleano;
}

function validarCoordinador() {
	var booleano=true;
	var estudiantes=document.getElementsByName("estudiantes[]");
	var nestudiantes=estudiantes.length;
	var error="Se han presentado errores.\n\n Por favor siga las siguientes instrucciones para solventarlo:\n";
	//alert(nestudiantes);
	if(nestudiantes!=1) {
	     error=error+"\n\tDebe seleccionar un solo coordinador para el equipo.";
		 booleano=false;
    }
	error=error+"\n\t\n\tIntente de nuevo."
	if (!booleano)	alert(error);
    return booleano;
}
