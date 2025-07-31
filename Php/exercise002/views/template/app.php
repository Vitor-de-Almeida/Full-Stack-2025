<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back End</title>
    <link rel="stylesheet" href="../../src/output.css>
</head>
<body class="bg-stone-950 text-stone-200">
    <header class="bg-stone-900">
        <nav class="mx-auto max-w-screen-lg flex justify-between py-4">
            <div class="font-bold text-xl tracking-wide">
                Book Wise
            </div>
            <ul class="flex space-x-4 font-bold">
                <li><a href="/" class="text-emerald-600">Explorar</a></li>
                <li><a href="/meus-livros.php" class="hover:underline">Meus livros</a></li>
            </ul>
            <ul>
                <li><a href="/login" class="hover:underline">Login</a></li>
            </ul>
        </nav>
    </header>
    <main class="mx-auto max-w-screen-lg space-y-6">
        <form class="w-full flex space-x-2 mt-6">
            <input type="text" class="border-stone-800 border-2 rounded-md bg-stone-900 text-base focus:outline-none px-2 py-1" placeholder="Pesquisar">
            <button type="submit">🔎</button>
        </form>
        <!-- Lista de Livros -->
        <section class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <?php var_dump($view); ?>;
        </section>
    </main>
</body>
</html>