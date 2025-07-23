<?php 
$projetos = [
    [
        "título" => "Meu portifolio",
        "finalizado" => false,
        "ano" => 2021,
        "descricao" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam rem, ut perferendis neque vitae amet! Porro officiis assumenda nemo ad nobis modi quo optio fuga illum esse deleniti inventore, sint hic reiciendis laborum est odit possimus voluptatibus itaque? Hic laborum sit error mollitia. Cum quisquam incidunt ad voluptate numquam blanditiis!",
        "stack" => ["PHP", "HTML", "CSS", "JS"],
        "alt" => "",
        "img" => ""
    ]
];
?>

<?php foreach($projetos as $projeto): ?>

<div class="bg-slate-800 rounded-lg p-3 flex items-center">
    <div class= "w-1/5 flex items-center justify-center">
        <img src="<?= $projeto['img']?>" class="h-10" alt="<?= $projeto['alt']?>">
    </div>
                <div class="w-4/5 space-y-3">
                    <div class="flex gap-3 justify-between">
                        <h3 class="font-semibold text-xl">
                            <?php if ($projeto['finalizado']):?> ✅ <?php endif;?>
                            <?= $projeto['título']?>
                            <?php if ($projeto['finalizado']):?>
                                <span class="text-xs text-gray-400 opacity-50 italic">(finalizado em 2024)</span>
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
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus rerum nemo tempora voluptas sit repudiandae pariatur, aliquam autem eos excepturi quia facilis debitis magnam qui culpa aliquid quasi et enim cum non eum ullam deserunt iusto! Ratione debitis incidunt, nulla optio nobis fugit possimus magni quasi aliquam, placeat quidem architecto.
                    </p>
                 </div>
</div>

<?php endforeach; ?>