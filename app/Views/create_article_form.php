<?= $this->include('layouts/nav.php') ?>

<?php if (session()->has('errors')) : ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-1 mb-4 rounded">
        <ul class="list-disc pl-4">
            <?php foreach (session('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-3xl mx-auto mt-4">
    <p class="text-center text-3xl font-bold">Crear un nuevo artículo</p>
</div>

<form action="<?= base_url('/article/create') ?>" method="post" enctype="multipart/form-data" class="
    bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4
    max-w-3xl mx-auto mt-4
">
    <div class="grid grid-cols-1 gap-4">
        <!-- Row 1: Meta Title & Meta Description -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="meta_title" class="block text-gray-700 text-sm font-bold mb-2">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="meta_description" class="block text-gray-700 text-sm font-bold mb-2">Meta Description</label>
                <textarea name="meta_description" id="meta_description" required class="resize-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
        </div>

        <!-- Row 2: Title, Description & Image -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" name="title" id="title" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="description" id="description" required class="resize-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                <input type="file" name="image" id="image" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
        </div>

        <!-- Row 3: Article Content -->
        <div class="mb-4">
            <label for="article_content" class="block text-gray-700 text-sm font-bold mb-2">Article Content</label>
            <textarea name="article_content" id="article_content" required class="resize-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>

        <!-- Row 4: Publish Date -->
        <div class="mb-4">
            <label for="publish_date" class="block text-gray-700 text-sm font-bold mb-2">Publish Date</label>
            <input type="date" name="publish_date" id="publish_date" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

    </div>

    <!-- Submit Button -->
    <div class="flex items-center justify-between mt-4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear artículo</button>
        <a href="<?= base_url('/') ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancelar</a>
    </div>
</form>


<?= $this->include('layouts/footer.php') ?>