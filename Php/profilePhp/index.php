<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="src/output.css">
</head>
<body class="bg-slate-900 text-gray-200">
    <?php include('./componentes/header.php'); ?>
    <main class="mx-auto max-w-screen-lg min-h-20 px-3 py-6">
        <?php include('./componentes/hero.php'); ?>

        <section class="space-y-3 py-6" id="projetos">

            <h2 class="text-2xl font-bold flex-col">Meus projetos</h2>
            
            <?php include('./componentes/projetos.php'); ?>
        </section>
    </main>
    <footer class="mx-auto max-w-screen-lg min-h-20">
        <div class="border-t border-gray-600 pt-6 px-3 text-gray-400 text-sm">
            <p>© Copyright <?=date('m/Y')?>. Construído por Vitor Renan de Almeida.</p>
        </div>
    </footer>
</body>
</html>