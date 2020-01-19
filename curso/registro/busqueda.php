<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/curso.php");
$curso = new curso;
$cursos = $curso->mostrarTodoRegistro(" Nombre LIKE '$Nombre%'", 1, "Orden");
?>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>N</th>
            <th>Nombre</th>
            <th>Abreviado</th>
            <th>Orden</th>
            <th>Monto Cuota</th>
            <th width="100"></th>
        </tr>
    </thead>

    <?php
    $i = 0;
    foreach ($cursos as $c) {
        $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $c['Nombre'] ?></td>
            <td><?php echo $c['Abreviado'] ?></td>
            <td><?php echo $c['Orden'] ?></td>

            <td class="text-right"><?php echo number_format($c['MontoCuota'], 2, ".", "") ?></td>


            <td><a href="modificar.php?CodCurso=<?php echo $c['CodCurso'] ?>" class="btn btn-info modificar" title="Modificar"><i class="fa fa-pencil"></i></a>
                <a href="eliminar.php?CodCurso=<?php echo $c['CodCurso'] ?>" class="btn btn-danger eliminar" title="Eliminar"><i class="fa fa-trash"></i></a></td>
        </tr>
    <?php

    }

    ?>

</table>