<h1 class="text-stone-400 font-bold">My Books:</h1>

<div class="grid grid-cols-4 gap-4">
    <div class="col-span-3 gap-4">
        <div class="grid grid-cols-4 gap-4">
        <?php foreach ($books as $book): ?>
            <div class="p-2 rounded border-stone-800 border-2 bg-stone-900">
            <div class="flex">
                <div class="w-1/3">
                    image
                </div>
                <div class="w-2/3">
                    <a href="/book?id=<?= $book->id ?>" class="font-semibold hover:underline"><?= $book->title ?></a>
                    <div class="text-xs italic"><?= $book->author ?></div>
                    <div class="text-xs italic"> <?= $book->release_year ?></div>
                </div>
            </div>
            <div class="text-sm mt-2 text-justify">
                <?= $book->description ?>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
    </div>
    <div>
        <div class="border border-stone-700 rounded">
            <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">
                Register a new Book
            </h1>
            <form class="p-4 space-y-4" method="post" action="/book-create">
                    <?php if ($validations = flash()->get('validations_my-books')): ?>
                                <div class="px-4 py-1">
                                    <div class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 my-2 rounded-md border-2">
                                                Errors:
                                                <?php foreach ($validations as $validation): ?>
                                        <div class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 my-2 rounded-md border-2">
                                            <?=$validation?>
                                        </div>
                                    <?php endforeach; ?>
                                    </div>
                                </div>
                <?php endif; ?>
                <div class="flex flex-col">
                    <label class="text-stone-400 mb-1" for="title">
                        Title
                    </label> 
                    <input type="text" name="title" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
                </div>
                <div class="flex flex-col">
                    <label class="text-stone-400 mb-1" for="author">
                        Author
                    </label> 
                    <input type="text" name="author" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
                </div>
                <div class="flex flex-col">
                    <label class="text-stone-400 mb-1" for="description">
                        Description
                    </label> 
                    <input type="text" name="description" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
                </div>
                <div class="flex flex-col">
                    <label class="text-stone-400 mb-1" for="release_year">
                        Starting Year
                    </label>
                    <select name="release_year" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
                        <?php for ($i = 1800; $i <= date('Y'); $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-2 rounded-md border-2 hover:bg-stone-800">
                    Register a new book
                </button>
            </form>
        </div>
    </div>
</div>