<form class="w-full flex space-x-2 mt-6 px-4 lg:px-0">
    <input type="text" name="search" class="border-stone-800 border-2 rounded-md bg-stone-900 text-base focus:outline-none px-2 py-1" placeholder="Search">
    <button type="submit">🔎</button>
</form>

<section class="grid gap-4 mx-4 md:mx-2 lg:mx-0 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 auto-rows-auto">
    <?php foreach ($books as $book): ?>
        <div class="p-2 rounded border-stone-800 border-2 bg-stone-900">
            <div class="flex">
                <div class="w-1/3">
                    image
                </div>
                <div class="space-y-1">
                    <a href="/book?id=<?= $book->id ?>" class="font-semibold hover:underline"><?= $book->title ?></a>
                    <div class="text-xs italic"><?= $book->author ?></div>
                    <div class="text-xs italic"> ⭐⭐⭐⭐⭐3 Reviews</div>
                </div>
            </div>
            <div class="text-sm mt-2 text-justify">
                <?= $book->description ?>
            </div>
        </div>
    <?php endforeach; ?>
</section>
