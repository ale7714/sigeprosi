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
	alert(id);
	nuevoCalendario(id);
}
function addCliente(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
        //alert(rowCount);
	for (var j=0;j<7;j++){
		//alert(table.rows[0].cells[0].innerHTML);
		//alert(rowCount);
		var row = table.insertRow(rowCount+j-1);
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
	if (id==1 && nbotones==1)	alert("La planificacion debe contener al menos una actividad asociada");
	else	var respuesta=confirm("Esta seguro que desea eliminar este cliente ?");
	if (respuesta)	for (var j=0;j<7;j++)	table.deleteRow(((id-1)*6));
	for(var j=id-1;j<nbotones;j++)	botonesEliminar[j].id=j+1;
}

var idP = 0;

function addProfesor(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
        //alert(rowCount);
	for (var j=0;j<3;j++){
		//alert(table.rows[0].cells[0].innerHTML);
		//alert(rowCount);
		var row = table.insertRow(rowCount+j-1);
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
						//newcell.align = "left";
						break;
			}
		}
	}
	var botonesEliminar = document.getElementsByName("eliminarProfesor");
	var nbotones = botonesEliminar.length;
	botonesEliminar[nbotones-1].id=nbotones;
	idP++;
}

function deleteProfesor(idP) {
	var table = document.getElementById("tableProfesor");
	var botonesEliminar = document.getElementsByName("eliminarProfesor");
	var nbotones = botonesEliminar.length;
       // alert(nbotones);
	if (idP==1 && nbotones==1)	alert("La planificacion debe contener al menos una actividad asociada");
	else	var respuesta=confirm("Esta seguro que desea eliminar este profesor ?");
	if (respuesta)	for (var j=0;j<3;j++)	table.deleteRow(((idP-1)*3));
	for(var j=idP-1;j<nbotones;j++)	botonesEliminar[j].id=j+1;
}

function deleteActividad(id) {
	var table = document.getElementById("tableActividad");
	var botonesEliminar = document.getElementsByName("eliminarActividad");
	var nbotones = botonesEliminar.length;
	if (id==1 && nbotones==1)	alert("La planificacion debe contener almenos una actividad asociada"); 
	else	var respuesta=confirm("Esta seguro que desea eliminar esta actividad de su planificacion ?");
	if (respuesta)	for (var j=0;j<7;j++)	table.deleteRow(((id-1)*7));
	for(var j=id-1;j<nbotones;j++)	botonesEliminar[j].id=j+1;
}

function nuevoCalendario(id) {
	Calendar.setup({
	  inputField    : "cal-field-"+id,
	  button        : "cal-button-"+id,
	  align         : "Tr"
	});
}
function initialize() {
	id++;
	nuevoCalendario(id);
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
	var nSemanas=semanas.length;
	for(var i=0;i<nSemanas;i++){
		puntos[i].style.border = "blue";
		semanas[i].style.border = "blue";
		descripcion[i].style.border = "blue";
		fechas[i].style.border = "blue";
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
	}
	error=error+"\n\t Rellene los campos que resaltan en rojo.";
	if (!booleano)	alert(error);
    return booleano;
} 

function validarProyecto() {
	document.getElementById("nombreProy").style.border = "red";
	document.getElementById("solicitud").style.border = "red";
    var error="Se han presentado errores en el llenado de los datos del proyecto.\n\n Por favor siga las siguientes instrucciones para solventarlo:\n";
	var booleano=true;
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
	var nombres=document.getElementsByName("nombre[]");
	var apellidos=document.getElementsByName("apellido[]");
	var correos=document.getElementsByName("email[]");
	var tels=document.getElementsByName("tlf[]");
	var roles=document.getElementsByName("rol[]");
	var usbids=document.getElementsByName("usbid[]");
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
		if (correos[i].value == "ejemplo@usb.ve" || !(/\w(@usb\.ve){1}$/.test(correos[i].value))){
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
		
		if (usbids[i].value == "ejemplo@usb.ve" || !(/\w(@usb\.ve){1}$/.test(usbids[i].value))) {
				correos[i].style.border = "medium solid red";
				booleano=false;
				boolCorreo=false;
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