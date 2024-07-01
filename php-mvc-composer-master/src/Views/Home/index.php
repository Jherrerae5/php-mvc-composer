<h1>Welcome to Simple PHP MVC Starter!</h1>

<ul>
    <?php foreach ($listaIndex as $oElemento) : ?>
        <li><?= $oElemento->name ?> (<?= $oElemento->publishedYear ?>)</li>
    <?php endforeach; ?>
</ul>