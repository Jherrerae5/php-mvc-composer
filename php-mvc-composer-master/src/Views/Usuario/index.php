<h1>Lista de Usuarios Creados</h1>

<div class="form-horizontal">
    <div class="form-group">
        <div class="col-md-1" style="color: dimgray">
            Opciones
        </div>
        <a type="button"  class="btn btn-primary" href='/Usuario/Nuevo'>Nuevo</a>
        <a type="button" class="btn btn-success" href='/Usuario/API'>API</a>
        <input type="text" name="Campo1" value="<?= htmlspecialchars($mymodel->Campo1) ?>">
    </div>
</div>

<table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mymodel->listaIndex as $oElemento): ?>
        <tr>
            <td><?= $oElemento->username ?></td>
            <td><?= $oElemento->password ?></td>
            <td><?= $oElemento->nombre ?></td>
            <td><?= $oElemento->apellido ?></td>
            <td>
                <a href="/Usuario/Editar?id=<?= $oElemento->username ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="/Usuario/Eliminar?id=<?= $oElemento->username ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
