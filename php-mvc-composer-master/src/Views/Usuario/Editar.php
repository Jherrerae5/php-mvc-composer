<!-- V_editarUsuario.php -->
<div class="container">
    <form method="POST" action="/Usuario/Editar?id=<?= htmlspecialchars($mymodel->username) ?>">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($mymodel->username) ?>" readonly>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?= htmlspecialchars($mymodel->password) ?>" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($mymodel->nombre) ?>" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="<?= htmlspecialchars($mymodel->apellido) ?>" required>
        </div>
        <a class="btn btn-default" href='/Usuario'><i class="fa-solid fa-angles-left"></i>&nbsp;Atras</a>
        <button type="submit" class="btn btn-primary">Guardar&nbsp;<i class="fa-solid fa-floppy-disk"></i></button>
    </form>
    <?php if (isset($mensajeError)): ?>
        <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($mensajeError) ?>
        </div>
    <?php endif; ?>
</div>
