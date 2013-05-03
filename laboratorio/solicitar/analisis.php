<?php 
include_once("../../login/check.php"); 
$titulo="Solicitud de nuevo Analisis de Laboratorio";
$folder="../../";
$idpaciente=$_GET['id'];
include_once '../../class/paciente.php';
include_once("../../funciones/funciones.php");
$anombre="tipolaboratorio";
include_once '../../class/'.$anombre.'.php';
${$anombre}=new $anombre;
$tipolabo=todolista(${$anombre}->mostrarTodo(),"idtipolaboratorio","nombre","");

$paciente=new paciente;
$p=array_shift($paciente->mostrar($idpaciente));


include("../../cabecerahtml.php"); 
?>
<script language="javascript" type="text/javascript" src="../../js/laboratorio/solicitanuevo.js"></script>
<?php include("../../cabecera.php");?>
<?php include("../../lateral.php");?>
<div class="contenido">

<fieldset>
<legend>Datos del Analisis</legend>
<a href="nuevo.php" class="botoncorrecto">Seleccionar Paciente</a>
<form action="guardasolicita.php" method="post">
  <input type="hidden" name="idpaciente" value="<?php echo $idpaciente; ?>">
<table class="tabla">
   <tr><td>Paciente:</td><td class="resaltar"><?php echo $p['apep'] ?> <?php echo $p['apem'] ?> <?php echo $p['nombre'] ?></td><td>C.I.</td><td class="resaltar"><?php echo $p['ci'] ?></td></tr>
</table>
  <table class="tablareg2 ">
    <tr>
     <td><?php campos("Fecha Examen","fechaexamen","date",date("Y-m-d"),1); ?></td>
    </tr>
    <tr>
      <td><?php campos("Tipo Laboratorio","tipolaboratorio","select",$tipolabo,0,array("size"=>count($tipolabo)+1),"",1);?>
      </td>
      <td>
      		<div id="divtipoanalisis" style="vertical-align:top;"></div>
        	<div id="lista">
          	<table class="tablalistado"><tr class="cabecera"><td>Nombre</td><td>Precio</td></tr></table>
        	</div><hr />
          	<?php campos("Precio","precio","text","0",1,array("readonly"=>"readonly","class"=>"der"),"",1); ?>
      </td>
    </tr>
    <tr>
    	
		<td colspan="2"><?php campos("Observación","obs","textarea","",1,array("rows"=>5,"cols"=>50)); ?></td>
    </tr>
    <tr>
      <td><?php campos("Guardar","","submit","",1); ?></td>
    </tr>
  </table>
</fieldset>
</form>
</div>
<?php include("../../piepagina.php");?>