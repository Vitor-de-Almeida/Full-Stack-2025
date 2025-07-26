  <?php 
    $itens = [
        ['href' => '#', 'class' => 'h-8 hover:animate-bounce', 'src' => 'img/twitter.png', 'alt' => 'Twitter Icon'],
        ['href' => '#', 'class' => 'h-8 hover:animate-bounce', 'src' => 'img/facebook.png', 'alt' => 'Facebook Icon'],
        ['href' => '#', 'class' => 'h-8 hover:animate-bounce', 'src' => 'img/linkedin.png', 'alt' => 'Linkedin Icon'],
        ['href' => 'https://www.youtube.com/', 'class' => 'h-8 hover:animate-bounce', 'src' => 'img/youtube.png', 'alt' => 'Youtube Icon']
    ];
  ?>

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
                    <?php foreach($itens as $item): ?>
                        <li>
                            <a href="<?= $item['href']?>" target="_blank">
                                <img class="<?= $item['class']?>" src="<?= $item['src']?>" alt="<?= $item['alt']?>">
                            </a>
                        </li>
                    <?php endforeach; ?>
                    <li>
                        <a href="#">
                                <img class="h-8 hover:animate-bounce" src="img/twitter.png" alt="Twitter Icon">
                        </a>
                    </li>
                    
                </ul>
                
            </div>
            <div class="w-1/3 flex items-center justify-center">
                <div>
                    <img class="h-40 -mt-2 hover:animate-bounce" src="img/avatar.svg" alt="Foto Vitor Renan">
                </div>
            </div>
        </section>