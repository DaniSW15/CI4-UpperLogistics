<?= $this->include('layouts/nav.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6 sm:py-8 lg:py-10">
        <h1 class="text-center text-3xl font-bold tracking-tight text-gray-900">Detalles del Artículo</h1>
        <div class="flex items-center justify-center">
            <a href="<?= base_url('/') ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 mr-4">
                Volver al listado de artículos
            </a>
            &nbsp;
            <a href="<?= base_url('/article/edit/' . $article['id']) ?>" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mt-4">
                Editar artículo
            </a>
        </div>



        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-3xl mx-auto mt-4">
            <!-- Contenedor principal -->
            <!-- Imagen del artículo -->
            <p class="text-3xl font-bold mb-2"><?= esc($article['meta_title']) ?></p>
            <p class="text-gray-700 mb-2"><strong>Descripción:</strong> <?= esc($article['description']) ?></p>
            <div class="w-1/3 mr-4">
                <img src="<?= base_url('uploads/' . $article['image']) ?>" alt="<?= esc($article['title']) ?>" class="w-full h-auto rounded">
            </div>
            <div class="flex items-center justify-center mb-8">
                <!-- Detalles del artículo -->
                <div class="w-2/3">
                    <p class="text-gray-700 mb-2"><strong>Titulo:</strong> <?= esc($article['title']) ?></p>
                    <p class="text-gray-700 mb-4"><?= esc($article['meta_description']) ?></p>
                    <p class="text-gray-700 mb-2"><strong>Contenido del artículo:</strong> <?= esc($article['article_content']) ?></p>
                    <p class="text-gray-700 mb-2"><strong>Fecha de publicación:</strong> <?= esc($article['publish_date']) ?></p>
                </div>
            </div>
            <a href="<?= base_url('/article/delete/' . $article['id']) ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4 mr-4">
                Eliminar artículo
            </a>
        </div>

    </div>
</main>

<?= $this->include('layouts/footer.php') ?>