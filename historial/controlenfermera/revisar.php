<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Notas de Control de Enfermera";
$folder="../../";

extract($_GET);

$a2nombre="historialinterno";
include_once '../../class/'.$a2nombre.'.php';
${$a2nombre}=new $a2nombre;
$hist=array_shift(${$a2nombre}->mostrar($idhistorialinterno));

$a1nombre="paciente";
include_once '../../class/'.$a1nombre.'.php';
${$a1nombre}=new $a1nombre;
$pac=array_shift(${$a1nombre}->mostrar($hist['idpaciente']));

$a3nombre="especialidad";
include_once '../../class/'.$a3nombre.'.php';
${$a3nombre}=new $a3nombre;
$espe=todolista(${$a3nombre}->mostrarTodo(),"idespecialidad","nombre,descripcion"," - ");

$a4nombre="medico";
include_once '../../class/'.$a4nombre.'.php';
${$a4nombre}=new $a4nombre;
$med=todolista(${$a4nombre}->mostrarTodo(),"idmedico","paterno,materno,nombre"," ");

include_once("../../class/medicamento.php");
include_once("../../class/tipofarmacia.php");
$medicamento=new medicamento;
$tipofarmacia=new tipofarmacia;
$medicamentos=array();
foreach($medicamento->mostrarTodo() as $medica){
	$medica['nombre'];
	$tf=array_shift($tipofarmacia->mostrar($medica['idtipofarmacia']));
	$medicamentos[$medica['idmedicamento']]=$medica['nombre']." - ".$tf['nombre'];
	
}
if($hist['alta']){
	$alta=array("readonly"=>"readonly");	
	$altas=array("disabled"=>"disabled");
}else{
	$alta=array();	
	$altas=array();
}
include_once("../../cabecerahtml.php");
?>
<script language="javascript" type="text/javascript">var id=<?php echo $idhistorialinterno?>;</script>
<script language="javascript" type="text/javascript" src="../../js/historial/controlenfermera.js"></script>
<?php include_once("../../cabecera.php");?>
<?php include_once("../../lateral.php");?>
<div class="contenido">
<form action="actualizar.php" method="post">
<fieldset>
	<legend><?php echo $titulo;?></legend>
    <table class="tablareg">
    	<?php campos("","idhistorialinterno","hidden",$idhistorialinterno);?>
    	<tr><td>Nombre</td><td class="resaltar"><?php echo $pac['apep']?> <?php echo $pac['apem']?> <?php echo $pac['nombre']?></td><td>CI</td><td class="resaltar"><?php echo $pac['ci']?></td><td>Fecha Nac</td><td class="resaltar"><?php echo fecha2str($pac['fecnac'])?></td><td>Edad</td><td class="resaltar"><?php echo calcularEdad($pac['fecnac'])?></td></tr>
		<tr><td>Estado Civil</td><td class="resaltar"><?php echo $pac['estcivil']?></td><td>Ocupación</td><td class="resaltar"><?php echo $pac['ocup']?></td><td>Teléfono</td><td class="resaltar"><?php echo $pac['telefono']?></td></tr>
        <tr><td>Teléfono Referencia</td><td class="resaltar"><?php echo $pac['reffono']?></td></tr>
        <tr><td>Dirección</td><td class="resaltar" colspan="10"><?php echo $pac['direccion']?></td></tr>
    </table>
    
</fieldset>

<fieldset>
	<legend>Notas de Control de Enfermera</legend>
    <hr />
    <table class="tablalistado">
    	<th><tr class="cabecera"><td width="150">Fecha Hora Medicación</td><td>Datos</td><td>Descripción de Sintomas Obs.</td></tr></th>
        <tr>
        	<td style="vertical-align:top">
				<?php campos("Fecha","fechacontrol","date",hoy(0),0,array_merge($alta,array()),"",1);?><br />
				<?php campos("Hora","horacontrol","time",date("H:i:s"),0,array_merge($alta,array("style"=>"width:100px")),"",1);?><br />
                <?php campos("Medicación","medicacion","text","",0,array_merge($alta,array("size"=>"30","maxlength"=>"100")),"",1);?></td>
            <td style="vertical-align:top">
				<?php campos("Vomito","vomito","text","",0,array_merge($alta,array("size"=>10)),"",1);?><br />
                <?php campos("Orina","orina","text","",0,array_merge($alta,array("size"=>10)),"",1);?><br />
                <?php campos("Depost","depost","text","",0,array_merge($alta,array("size"=>10)),"",1);?></td>
            <td><?php campos("","descripcion","textarea","",0,array_merge($alta,array("cols"=>30,"rows"=>10,"placeholder"=>"Ingrese su Control de Enfermera")));?></td>
            <?php if($hist['alta']==0){?>
            <td><a href="" class="botoninfo" id="guardarm">>></a></td>
            <?php }?>
        </tr>
    </table>
    <a href="ver.php?id=<?php echo $idhistorialinterno?>" class="botonerror">Impresión Control de Enfermera</a>
    <table id="resultado" class="tablalistado">
    </table>
      	
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>