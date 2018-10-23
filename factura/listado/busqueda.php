<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/factura.php");
$factura=new factura;
$fact=$factura->mostrarTodoRegistro("FechaFactura BETWEEN '$FechaDesde' and '$FechaHasta' and Estado LIKE '$Estado' and Nit LIKE '$Nit%'",1,"FechaFactura,Nfactura,Nit,Factura,TotalBs");
?>
<table class="table table-bordered table-striped table-hover">
<thead>
    <tr>
        <th>N</th>
        <th>Factura A</th>
        <th>Nit</th>
        <th>Fecha de Factura</th>
        <th>Nº Factura</th>
        <th>Total</th>
        <th>Pagado</th>
        <th>Cambio</th>
        <th>Estado</th>
        <th></th>
    </tr>
</thead>

<?php
$i=0;
$TotalBs=0;
$Cancelado=0;
$MontoDevuelto=0;
foreach($fact as $f){$i++;
    $datos[$i]['codfactura']=$f['codfactura'];
    $datos[$i]['FechaFactura']=date("d/m/Y",strtotime($f['FechaFactura']));
    $datos[$i]['nombre']=$f['nombre'];
    $datos[$i]['Nit']=$f['Nit'];
    $datos[$i]['total']=$f['total'];
    $datos[$i]['pagado']=$f['pagado'];
    $datos[$i]['devolucion']=$f['devolucion'];
    $datos[$i]['NFactura']=$f['NFactura'];
    $datos[$i]['Estado']=$f['Estado'];
    $TotalBs+=$f['TotalBs'];
    $Cancelado+=$f['Cancelado'];
    $MontoDevuelto+=$f['MontoDevuelto'];
  ?>
  <tr class="<?php echo $f['Estado']=="Anulado"?'danger"':''?>">
    <td><?php echo $i;?></td>
    <td><?php echo $f['Factura']?></td>
    <td><?php echo $f['Nit']?></td>
    <td><?php echo date("d/m/Y",strtotime($f['FechaFactura']))?></td>
    <td><?php echo $f['NFactura']?></td>
    <td class="text-right"><?php echo number_format($f['TotalBs'],2,".","")?></td>
    <td class="text-right"><?php echo number_format($f['Cancelado'],2,".","")?></td>
    <td class="text-right"><?php echo number_format($f['MontoDevuelto'],2,".","")?></td>
    <td>
        <select name="Estado" class="form-control Estado" rel="<?php echo $f['CodFactura']?>">
                <option value="Valido" <?php echo $f['Estado']=="Valido"?'selected="selected"':''?>>Valido</option>
                <option value="Anulado" <?php echo $f['Estado']=="Anulado"?'selected="selected"':''?>>Anulado</option>
                </select>
    
    </td>
    <td><a href="../../impresion/factura/facturasinqr.php?codfactura=<?php echo $f['CodFactura']?>" target="_blank" class="btn btn-info">Ver Factura</a></td>
  </tr>
  <?php
    
}
//listadotabla(array("nombre"=>"Factura A","nit"=>"Nit","fechaventa"=>"Fecha de Factura","NFactura"=>"Nº Factura","total"=>"Total","pagado"=>""),$datos,1,"","","",array("../../impresion/factura/facturaticket.php"=>"Ver Factura"),"","_blank");
?>
<tfoot>
    <tr>
        <th colspan="5" class="text-right"><strong>Total</strong></th>
        <th class="text-right"><?php echo number_format($TotalBs,2,".","")?></th>
        <th class="text-right"><?php echo number_format($Cancelado,2,".","")?></th>
        <th class="text-right"><?php echo number_format($MontoDevuelto,2,".","")?></th>
    </tr>
</tfoot>
</table>