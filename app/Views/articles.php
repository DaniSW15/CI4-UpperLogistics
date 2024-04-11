<?= $this->include('layouts/nav.php') ?>
<main>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6 sm:py-8 lg:py-10">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Listado de Artículos</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
            <?php if (empty($articles)) : ?>
                <p class="text-center text-gray-700">No hay artículos disponibles.</p>
            <?php else : ?>
                <?php foreach ($articles as $article) : ?>
                    <a href="<?= base_url('/article/detalis/' . $article['id']) ?>" class="bg-white rounded-lg overflow-hidden shadow-md transition duration-300 ease-in-out hover:bg-orange-300">
                        <img src="<?= base_url('uploads/' . $article['image']) ?>" alt="<?= esc($article['title']) ?>" class="w-full h-auto rounded">
                        <div class="p-4">
                            <h2 class="text-xl font-bold mb-2"><?= esc($article['meta_title']) ?></h2>
                            <p class="text-gray-700 mb-2"><?= esc($article['meta_description']) ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</main>
<?= $this->include('layouts/footer.php') ?>