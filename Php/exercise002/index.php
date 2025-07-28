<?php

$livros = [
    ['id' => 1, 'titulo' => 'O Senhor dos Anéis', 'autor' => 'J.R.R. Tolkien', 'descricao' => 'Uma aventura épica na Terra Média.'],
    ['id' => 2, 'titulo' => 'Dom Casmurro', 'autor' => 'Machado de Assis', 'descricao' => 'A história de Bentinho e Capitu.'],
    ['id' => 3, 'titulo' => '1984', 'autor' => 'George Orwell', 'descricao' => 'Um romance distópico sobre vigilância e controle.'],
    ['id' => 4, 'titulo' => 'O Pequeno Príncipe', 'autor' => 'Antoine de Saint-Exupéry', 'descricao' => 'Uma fábula sobre amizade e amor.'],
    ['id' => 5, 'titulo' => 'Harry Potter e a Pedra Filosofal', 'autor' => 'J.K. Rowling', 'descricao' => 'O começo da jornada de Harry no mundo da magia.'],
    ['id' => 6, 'titulo' => 'A Revolução dos Bichos', 'autor' => 'George Orwell', 'descricao' => 'Uma sátira sobre o totalitarismo.'],
    ['id' => 7, 'titulo' => 'Cem Anos de Solidão', 'autor' => 'Gabriel García Márquez', 'descricao' => 'A saga da família Buendía em Macondo.'],
    ['id' => 8, 'titulo' => 'A Metamorfose', 'autor' => 'Franz Kafka', 'descricao' => 'A transformação de Gregor Samsa em inseto.'],
    ['id' => 9, 'titulo' => 'O Hobbit', 'autor' => 'J.R.R. Tolkien', 'descricao' => 'A aventura de Bilbo Bolseiro.']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back End</title>
    <link rel="stylesheet" href="src/output.css">
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
            <!-- Livro -->
            <?php foreach ($livros as $livro): ?>
                <div class="p-2 rounded border-stone-800 border-2 bg-stone-900">
                    <div class="flex">
                        <div class="w-1/3">
                            imagem
                        </div>
                        <div class="space-y-1">
                            <a href="/livro.php?id=<?=$livro['id']?>" class="font-semibold hover:underline"><?=$livro['titulo']?></a>
                            <div class="text-xs italic"><?=$livro['autor']?></div>
                            <div class="text-xs italic"> ⭐⭐⭐⭐⭐3 Avaliações</div>
                        </div>
                    </div>
                    <div class="text-sm mt-2">
                        <?=$livro['descricao']?>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
</body>
</html>