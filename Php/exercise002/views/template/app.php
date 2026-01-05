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
                <li><a href="/meus-livros.php" class="hover:underline">My Books</a></li>
            </ul>
            <ul>
                <?php if(isset($_SESSION['authenticated'])): ?>
                    <li>
                        <a href="/logout" class="hover:underline">Hi, <?= $_SESSION['authenticated']['name'] ?>!</a>
                    </li>
                <?php else: ?>
                    <li><a href="/login" class="hover:underline">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main class="mx-auto max-w-screen-lg space-y-6">
        <?php require "views/{$view}.view.php"; ?>
    </main>
</body>
</html>
