<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

     <?php $__env->slot('introduction_text', null, []); ?> 
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100"><?php echo e(__('introduction_texts.homepage_line_1')); ?></p>
        <p><?php echo e(__('introduction_texts.homepage_line_2')); ?></p>
        <p><?php echo e(__('introduction_texts.homepage_line_3')); ?></p>
     <?php $__env->endSlot(); ?>

    <h1>
         <?php $__env->slot('title', null, []); ?> 
            <?php echo e(__('misc.all_brands')); ?>

         <?php $__env->endSlot(); ?>
    </h1>


    <?php
    $size = count($brands);
    $columns = 3;
    $chunk_size = ceil($size / $columns);
    ?>

    <div class="container">

        <div class="name">
            <h3><?php echo e($name); ?></h3>

            <ol>
                <?php for($i = 0; $i < 10 && $i < count($sortedManuals); $i++): ?>
                    <li><?php echo e($brands->where('id', $sortedManuals[$i]->brand_id)->first()->name); ?>: <?php echo e($sortedManuals[$i]->name); ?> - <?php echo e($sortedManuals[$i]->visit_count); ?></li>
                <?php endfor; ?>
            </ol>
        </div>

        <h2>Alle merken</h2>
        <p>Ga naar letter:</p>
        <div class="alphabet-nav" id="alphabetNav"></div>
        <button id="reset" class="btn btn-outline-dark ml-2">reset</button>

        <a class="btn btn-outline-dark ml-2" href="<?php echo e(route('categories')); ?>">Sorteer op Categorieën</a>

        <!-- Example row of columns -->
        <div class="row">

            <?php $__currentLoopData = $brands->chunk($chunk_size); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">

                    <ul>
                        <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php
                            $current_first_letter = strtoupper(substr($brand->name, 0, 1));

                            if (!isset($header_first_letter) || (isset($header_first_letter) && $current_first_letter != $header_first_letter)) {
                                echo '</ul>
                                <h2 class="alphabet-header" id="' . $current_first_letter . '">' . $current_first_letter . '</h2>
                                <ul>';
                            }
                            $header_first_letter = $current_first_letter
                            ?>

                            <li>
                                <a href="/<?php echo e($brand->id); ?>/<?php echo e($brand->getNameUrlEncodedAttribute()); ?>/"><?php echo e($brand->name); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                </div>
                <?php
                unset($header_first_letter);
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </div>

<script>
  const nav = document.getElementById("alphabetNav");

  // Loop van A tot Z
  const letters = [];
  for (let i = 65; i <= 90; i++) {
    const letter = String.fromCharCode(i);

    // Check of er een header met dit id bestaat
    if (document.getElementById(letter)) {
      letters.push(letter);
    }
  }

  // Voeg de letters toe met streepjes ertussen
  letters.forEach((letter, index) => {
    const link = document.createElement("a");
    link.href = "#" + letter;
    link.textContent = letter;
    nav.appendChild(link);

    // Voeg een streepje toe als het niet de laatste letter is
    if (index < letters.length - 1) {
      const dash = document.createTextNode(" - ");
      nav.appendChild(dash);
    }
  });

  //als je op de letter klikt, laat alleen de merken zien die met die letter beginnen andere niet
    nav.addEventListener("click", function(event) {
        if (event.target.tagName === "A") {
        event.preventDefault();
        const selectedLetter = event.target.textContent;
    
        // Verberg alle merken
        const allHeaders = document.querySelectorAll(".alphabet-header");
        allHeaders.forEach(header => {
            header.style.display = "none";
            let nextElement = header.nextElementSibling;
            while (nextElement && !nextElement.classList.contains("alphabet-header")) {
            nextElement.style.display = "none";
            nextElement = nextElement.nextElementSibling;
            }
        });
    
        // Toon alleen de merken die met de geselecteerde letter beginnen
        const selectedHeader = document.getElementById(selectedLetter);
        if (selectedHeader) {
            selectedHeader.style.display = "block";
            let nextElement = selectedHeader.nextElementSibling;
            while (nextElement && !nextElement.classList.contains("alphabet-header")) {
            nextElement.style.display = "block";
            nextElement = nextElement.nextElementSibling;
            }
        }
        }
    });
    document.getElementById("reset").addEventListener("click", function() {
        // Toon alle merken
        const allHeaders = document.querySelectorAll(".alphabet-header");
        allHeaders.forEach(header => {
            header.style.display = "block";
            let nextElement = header.nextElementSibling;
            while (nextElement && !nextElement.classList.contains("alphabet-header")) {
            nextElement.style.display = "block";
            nextElement = nextElement.nextElementSibling;
            }
        });
    });
</script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\legacy-app\resources\views/pages/homepage.blade.php ENDPATH**/ ?>