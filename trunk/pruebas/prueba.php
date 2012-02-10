<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My First Grid</title>

<link rel="stylesheet" type="text/css" media="screen" href="jscripts/css/ui-lightness/jquery-ui-1.8.17.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="jscripts/css/ui.jqgrid.css" />

<style type="text/css">
html, body {
    margin: 0;
    padding: 0;
    font-size: 75%;
}
</style>

<script src="jscripts/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="jscripts/js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="jscripts/js/jquery.jqGrid.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){ 
  $("#list").jqGrid({
    url:'server2.php',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['id','USBID','Nombre', 'Apellido'],
    colModel :[ 
      {name:'id', index:'id', width:40 },
      {name:'correoUSB', index:'correoUSB', width:150}, 
      {name:'nombre', index:'nombre', width:200}, 
      {name:'apellido', index:'apellido', width:200, align:'right'}, 
    ],
    pager: '#pager',
    rowNum:10,
    rowList:[10,20,30],
    sortname: 'invid',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    caption: 'Usuarios',
  }).navGrid('#pager1',{
     edit:false,
     add: false,
     del: false
 }); 
}); 
</script>
</head>
<body>
<?php require_once "class/class.listaUsuarios.php"; ?>
<table id="list"><tr><td/></tr></table> 
<div id="pager"></div> 
</body>
</html>