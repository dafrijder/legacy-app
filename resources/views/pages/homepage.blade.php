<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>


    <?php
    $size = count($brands);
    $columns = 3;
    $chunk_size = ceil($size / $columns);
    ?>

    <div class="container">

        <div class="name">
            <h3>{{$name}}</h3>

            <ol>
                @for ($i = 0; $i < 10 && $i < count($sortedManuals); $i++)
                    <li>{{$brands->where('id', $sortedManuals[$i]->brand_id)->first()->name}}: {{ $sortedManuals[$i]->name }} - {{ $sortedManuals[$i]->visit_count }}</li>
                @endfor
            </ol>
        </div>

        <h2>Alle merken</h2>
        <p>Ga naar letter:</p>
        <div class="alphabet-nav" id="alphabetNav"></div>
        <button id="reset" class="btn btn-outline-dark ml-2">reset</button>

        <a class="btn btn-outline-dark ml-2" href="{{ route('categories') }}">Sorteer op Categorieën</a>

        <!-- Example row of columns -->
        <div class="row">

            @foreach($brands->chunk($chunk_size) as $chunk)
                <div class="col-md-4">

                    <ul>
                        @foreach($chunk as $brand)

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
                                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <?php
                unset($header_first_letter);
                ?>
            @endforeach

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

</x-layouts.app>
