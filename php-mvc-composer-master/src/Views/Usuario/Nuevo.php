<!-- V_nuevoUsuario.php -->
<div class="container">
    <form method="POST" action="/Usuario/Nuevo">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>
        <a class="btn btn-default" href='/Usuario'><i class="fa-solid fa-angles-left"></i>&nbsp;Atras</a>
        <button type="submit" class="btn btn-primary">Guardar&nbsp;<i class="fa-solid fa-floppy-disk"></i></button>
    </form>

    <!-- Mostrar mensaje de error -->
    <?php if (!empty($mensajeError)): ?>
        <div class="alert alert-danger mt-3">
            <?= htmlspecialchars($mensajeError) ?>
        </div>
    <?php endif; ?>
</div>
