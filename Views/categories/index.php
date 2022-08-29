<h1 class="h1 my-6">Catégories</h1>

<div class="row justify-content-center">
    <?php foreach ($categories as $category) : ?>

        <div class="m-2 py-4">
            <div class="p-1">
                <h2><a href="/categories/categorie/<?= $category->id ?>"><?= $category->nom ?></a></h2>
            </div>
        </div>

    <?php endforeach; ?>
</div>