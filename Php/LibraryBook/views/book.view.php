<?php

$averageRating = 0;
if (!empty($comments)) {
    $sumRating = 0;
    foreach($comments as $comment) {
        $sumRating += (int)$comment->rating;
    }
    $averageRating = $sumRating / count($comments);
    $averageRating = round($averageRating, 1);
}
?>

<div class="p-2 rounded border-stone-800 border-2 bg-stone-900 mt-6">
    <div class="flex">
        <div class="w-1/3">
            image
        </div>
        <div class="space-y-1">
            <a href="/book?id=<?= $book->id ?>" class="font-semibold hover:underline"><?= $book->title ?></a>
            <div class="text-xs italic"><?= $book->author ?></div>
            <div class="text-xs italic"><?php for ($i = 1; $i <= (int)$averageRating; $i++) { ?>⭐<?php } ?><?= (int)$averageRating ?> Reviews</div>
        </div>
    </div>
    <div class="text-sm mt-2">
        <?= $book->description ?>
    </div>
</div>

<h2>Comments:</h2>
<div class="grid grid-cols-4 gap-4">
    <div class="col-span-3 gap-4 grid">
        <?php if (empty($comments)): ?>
            <div class="p-6 rounded border-stone-800 border-2 bg-stone-900 text-center">
                <p class="text-stone-400 italic">No comments yet. Be the first to share your thoughts!</p>
            </div>
        <?php else: ?>
            <?php foreach ($comments as $comment): ?>
                <div class=" flex flex-col p-4 rounded border-stone-800 border-2 bg-stone-900 hover:bg-stone-800 transition-colors">
                    <p class="text-stone-300 leading-relaxed mb-3">
                        <?= ucfirst(htmlspecialchars($comment->comment)) ?>
                    </p>
                    <div class="flex items-center gap-2">
                        <div class="flex items-center gap-1">
                            <?php
                            $rating = (int)$comment->rating;
                            for ($i = 1; $i <= 5; $i++): ?>
                                <span class="text-lg <?= $i <= $rating ? 'text-yellow-400' : 'text-stone-600' ?>">
                                    <?= $i <= $rating ? '⭐' : '☆' ?>
                                </span>
                            <?php endfor; ?>
                        </div>
                        <span class="text-xs text-stone-400 font-semibold">
                            <?= $rating ?>/5
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php if(auth()): ?>
    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">
            Add a comment about this book
        </h1>
        <form class="p-4 space-y-4" method="post" action="/avaliation-create">
                <?php if ($validations = flash()->get('validations_avaliation')): ?>
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
            <input type="hidden" name="book_id" value="<?= $book->id ?>">
                <label class="text-stone-400 mb-1" for="comment">
                    Comment
                </label> 
                <textarea name="comment" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"></textarea>
            </div>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="rating">
                    Rating
                </label>
                <select name="rating" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </div>
            <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-2 rounded-md border-2 hover:bg-stone-800">
                Save comment
            </button>
        </form>
    </div>
    <?php endif; ?>
</div>




