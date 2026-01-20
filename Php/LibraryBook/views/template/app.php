<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back End</title>
    <link rel="stylesheet" href="../../src/output.css">
</head>
<body class="bg-stone-950 text-stone-200">
    <header class="bg-stone-900">
        <nav class="mx-auto max-w-screen-lg flex justify-between py-4 px-4 lg:px-0">
            <div class="font-bold text-xl tracking-wide">
                <a href="http://localhost:3000">Book Wise</a>
            </div>
            <ul class="flex space-x-4 font-bold">
                <li><a href="/" class="text-emerald-600">Explore</a></li>
                <?php if(auth()): ?>
                    <li><a href="/my-books" class="text-emerald-600">My Books</a></li>
                <?php endif; ?>
            </ul>
            <ul>
                <?php if(auth()): ?>
                    <li>
                        <a href="/logout" class="hover:underline">Hi, <?= auth()->name ?>!</a>
                    </li>
                <?php else: ?>
                    <li><a href="/login" class="hover:underline">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main class="mx-auto max-w-screen-lg space-y-6 mt-6">
        <?php if($message = flash()->get('message')): ?>
            <div class="border-green-800 bg-green-900 text-green-400 px-4 py-1 rounded-md border-2 text-sm font-bold">
                <?= $message?>
            </div>
        <?php endif; ?>
        <?php require "views/{$view}.view.php"; ?>
    </main>
</body>
</html>
