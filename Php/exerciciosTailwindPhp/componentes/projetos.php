<?php 
$projetos = [
    [
        "título" => "React",
        "finalizado" => true,
        "ano" => 2024,
        "descricao" => "Comecei a estudar React em 2024, e foi a biblioteca mais top que conheci no front-end. A forma como ela organiza os componentes e facilita a criação de interfaces modernas mudou totalmente minha maneira de programar.",
        "stack" => ["PHP", "HTML", "CSS", "JS"],
        "alt" => "React Logo",
        "img" => "img/react.png"
    ],
    [
        "título" => "PHP",
        "finalizado" => true,
        "ano" => 2025,
        "descricao" => "Comecei a programar com PHP em 2025. Foi minha porta de entrada para o desenvolvimento back-end e me ajudou a entender a lógica por trás dos servidores, requisições e manipulação de dados. Simples, poderoso e amplamente usado.",
        "stack" => ["PHP", "MySQL", "HTML", "CSS"],
        "alt" => "PHP Logo",
        "img" => "img/php.png"
    ],
    [
        "título" => "Tailwind CSS",
        "finalizado" => true,
        "ano" => 2024,
        "descricao" => "Conheci o Tailwind CSS em 2024 e ele revolucionou meu jeito de escrever estilos. Com utilitários diretos na marcação, consegui agilidade e padronização visual em meus projetos de forma muito mais simples e eficiente.",
        "stack" => ["PHP", "Tailwind", "JS", "React"],
        "alt" => "Tailwind CSS Logo",
        "img" => "img/tailwind.png"
    ],
    [
        "título" => "C#",
        "finalizado" => false,
        "ano" => 2025,
        "descricao" => "Atualmente estou estudando C#. Estou explorando sua sintaxe robusta, orientação a objetos e potencial para aplicações desktop, web e APIs com .NET. Ainda estou no início, mas já percebo o quanto essa linguagem é poderosa e versátil.",
        "stack" => ["C#", ".NET", "OOP", "RUST"],
        "alt" => "C# Logo",
        "img" => "img/csharp.png"
    ]
];
?>

<?php foreach($projetos as $projeto): ?>

<div class="bg-slate-800 rounded-lg p-3 flex items-center">
    <div class= "w-1/5 flex items-center justify-center">
        <img src="<?= $projeto['img']?>" class="h-24 w-24" alt="<?= $projeto['alt']?>">
    </div>
                <div class="w-4/5 space-y-3">
                    <div class="flex gap-3 justify-between">
                        <h3 class="font-semibold text-xl">
                            <?=$projeto['finalizado'] ? '✅' : '⛔'?>
                            <?= $projeto['título']?>
                            <?php if ($projeto['finalizado']):?>
                                <span class="text-xs text-gray-400 opacity-50 italic">(finalizado em <?=$projeto['ano']?>)</span>
                            <?php else: ?>
                                <span class="text-sm text-gray-400 opacity-50 italic">(Em Desenvolvimento)</span>
                            <?php endif;?>
                        </h3>
                        <div class="space-x-1">
                            <?php 
                                $colors = ["fuchsia", "lime", "sky", "rose",];
                                foreach($projeto["stack"] as $posicao => $programingLanguage): 
                            ?>
                                <span class="bg-<?=$colors[$posicao]?>-400 text-<?=$colors[$posicao]?>-700 rounded-lg px-4 py-1 font-semibold text-xs">
                                <?=$programingLanguage?>
                            </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <p class="leading-6">
                        <?=$projeto["descricao"]?>
                    </p>
                 </div>
</div>

<?php endforeach; ?>