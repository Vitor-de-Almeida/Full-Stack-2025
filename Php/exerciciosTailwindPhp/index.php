<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="src/output.css">
</head>
<body class="bg-slate-900 text-gray-200">
    <header class="mx-auto max-w-screen-lg px-3 py-6 flex items-center justify-between">
        <div class="font-bold text-xl text-cyan-600">
            Meu portfolio ...
        </div>
        <div class="">
            <ul class="flex gap-x-3 font-medium">
                <li><a href="#projetos" class="hover:underline">Projetos</a></li>
                <li><a href="" class="hover:underline">Github</a></li>
                <li><a href="" class="hover:underline">Linkedin</a></li>
                <li><a href="" class="hover:underline">Twitter</a></li>
            </ul>
        </div>
    </header>
    <main class="mx-auto max-w-screen-lg min-h-20 px-3 py-6">
        <section class="flex gap-x-3 border-b-2">
            <div class="w-2/3">
                <h1 class="text-3xl font-bold">
                    Oi, meu nome é Vitor.
                </h1>
                <p class="text-xl leading-6 mt-6">
                    Falando um pouco sobre mim, sou dev... programo em react e tailwindcss.
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem, voluptates!
                </p>
                <ul class="flex gap-x-3 mt-3">
                    <li><a href="#">
                        <img class="h-8 hover:animate-bounce" src="img/twitter.png" alt="Twitter Icon">
                    </a></li>
                    <li><a href="#">
                        <img class="h-8 hover:animate-bounce" src="img/facebook.png" alt="Facebook Icon">
                    </a></li>
                    <li><a href="#">
                        <img class="h-8 hover:animate-bounce" src="img/linkedin.png" alt="Linkedin Icon">
                    </a></li>
                    <li><a href="#">
                        <img class="h-8 hover:animate-bounce" src="img/youtube.png" alt="Youtube Icon">
                    </a></li>
                </ul>
                
            </div>
            <div class="w-1/3 flex items-center justify-center">
                <div>
                    <img class="h-40 -mt-2 hover:animate-bounce" src="img/avatar.svg" alt="Foto Vitor Renan">
                </div>
            </div>
        </section>
        <section class="space-y-3 py-6" id="projetos">
            <h2 class="text-2xl font-bold flex-col">
                Meus projetos
            </h2>
           
            <div class="bg-slate-800 rounded-lg p-3 flex items-center">
                <div class= "w-1/5">Foto do projeto</div>
                <div class="w-4/5 space-y-3">
                    <div class="flex gap-3 justify-between">
                        <h3 class="font-semibold text-xl">
                            ✅ Projeto 1 <span class="text-xs text-gray-400 opacity-50 italic">(finalizado em 2024)</span>
                        </h3>
                        <div>
                            <span class="bg-fuchsia-400 text-fuchsia-700 rounded-lg px-4 py-1 font-semibold text-xs">PHP</span>
                            <span class="bg-lime-400 text-lime-900 rounded-lg px-4 py-1 font-semibold text-xs">HTML</span>
                            <span class="bg-sky-400 text-sky-900 rounded-lg px-4 py-1 font-semibold text-xs">JAVASCRIPT</span>
                            <span class="bg-rose-400 text-rose-900 rounded-lg px-4 py-1 font-semibold text-xs">CSS</span>
                        </div>
                    </div>
                    <p class="leading-6">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus rerum nemo tempora voluptas sit repudiandae pariatur, aliquam autem eos excepturi quia facilis debitis magnam qui culpa aliquid quasi et enim cum non eum ullam deserunt iusto! Ratione debitis incidunt, nulla optio nobis fugit possimus magni quasi aliquam, placeat quidem architecto.
                    </p>
                </div>
            </div>
        </section>
    </main>
    <footer class="mx-auto max-w-screen-lg min-h-20">
        <div class="border-t border-gray-600 pt-6 px-3 text-gray-400 text-sm">
            <p>© Copyright 2025. Construído por Vitor Renan de Almeida.</p>
        </div>
    </footer>
</body>
</html>