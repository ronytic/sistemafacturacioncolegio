<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/factura.php");
$factura=new factura;
$fact=$factura->mostrarTodoRegistro("FechaFactura BETWEEN '$FechaDesde' and '$FechaHasta' ",1,"Nfactura");
?>
<script type="text/javascript">
var TituloDocumento="Libro de Ventas <?php echo date("d-m-Y");?>";
</script>
<a href="#" class="btn btn-primary btn-xs" id="exportarexcel">Exportar a Excel</a>
<a href="#" class="btn btn-primary btn-xs" id="exportarexcel1">Exportar a Excel</a>
<table class="table table-bordered table-striped table-hover table-condensed" id="tablaexportar">
<thead>
    <tr>
        <th width="50"><small>ESPECIFICACION</small>	                     </small></th>
        <th width="50"><small>N                                             </small></th>
        <th width="100"><small>FECHA DE LA FACTURA                           </small></th>
        <th width="50"><small>N DE LA FACTURA                               </small></th>
        <th width="150"><small>N DE AUTORIZACION                             </small></th>
        <th width="50"><small>ESTADO                                        </small></th>
        <th width="150"><small>NIT/CI CLIENTE                                </small></th>
        <th width="150"><small>NOMBRE O RAZON SOCIAL                         </small></th>
        <th width="150"><small>IMPORTE TOTAL DE LA VENTA                     </small></th>
        <th width="150"><small>IMPORTE ICE/IEHD/TASAS                        </small></th>
        <th width="150"><small>EXPORTACIONES Y OPERACIONES EXENTAS           </small></th>
        <th width="150"><small>VENTAS GRAVADAS A TASA CERO                   </small></th>
        <th width="150"><small>SUBTOTAL                                      </small></th>
        <th width="150"><small>DESCUENTOS, BONIFICACIONES Y REBAJAS OTORGADAS</small></th>
        <th width="150"><small>IMPORTE BASE PARA DEBITO FISCAL               </small></th>
        <th width="150"><small>DEBITO FISCAL                                 </small></th>
        <th width="150"><small>CODIGO DE CONTROL                             </small></th>
    </tr>
</thead>

<?php
$i=0;
$TotalBs=0;
$Cancelado=0;
$MontoDevuelto=0;
foreach($fact as $f){$i++;
    /*echo "<pre>";
    print_r($f);
    echo "</pre>";*/
    if($f['Estado']=="Valido"){
        $Nit=$f['Nit'];
        $NombreFactura=mb_strtoupper($f['Factura'],"utf8");
        $TotalBs=($f['TotalBs']);
        $CodigoControl=$f['CodigoControl'];
    }else{
        $Nit="0";
        $NombreFactura="ANULADO";
        $TotalBs=0;
        $CodigoControl="";
    }
  ?>
    <tr class="<?php echo $f['Estado']=="Anulado"?'danger"':''?>">
        <td align="right">3</td>
        <td align="right"><?php echo $i;?></td>
        <td align="right"><?php echo date("d/m/Y",strtotime($f['FechaFactura']))?></td>
        <td align="right"><?php echo $f['NFactura']?></td>
        <td align="right"><?php echo $f['NumeroAutorizacion']?></td>
        <td align="center"><?php echo $f['Estado']=="Valido"?'V':'A'?></td>
        <td align="right"><?php echo $Nit?></td>
        <td><?php echo $NombreFactura?></td>
        <td align="right"><?php echo number_format($TotalBs,2,'.',"")?></td>
        <td align="right"><?php echo number_format(0,2,'.',"")?></td>
        <td align="right"><?php echo number_format(0,2,'.',"")?></td>
        <td align="right"><?php echo number_format(0,2,'.',"")?></td>
        <td align="right"><?php echo number_format($TotalBs,2,'.',"")?></td>
        <td align="right"><?php echo number_format(0,2,'.',"")?></td>
        <td align="right"><?php echo number_format($TotalBs,2,'.',"")?></td>
        <td align="right"><?php echo number_format($TotalBs*0.13,2,'.',"")?></td>
        <td><?php echo $CodigoControl?></td>
      </tr>
  <?php
}
?>
</table>
