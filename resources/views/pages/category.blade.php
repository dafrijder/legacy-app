<x-layouts.app>
    
    <?php
    $size = count($categories);
    $columns = 3;
    $chunk_size = ceil($size / $columns);
    ?>
    <div class="container">
        <div class="row">
            @foreach($categories->chunk($chunk_size) as $chunk)
                        <div class="col-md-4">

                            <ul>
                                @foreach($chunk as $category)

                                    <?php
                                    $current_first_letter = strtoupper(substr($category->name, 0, 1));

                                    if (!isset($header_first_letter) || (isset($header_first_letter) && $current_first_letter != $header_first_letter)) {
                                        echo '</ul>
                                        <h2 class="alphabet-header" id="' . $current_first_letter . '">' . $current_first_letter . '</h2>
                                        <ul>';
                                    }
                                    $header_first_letter = $current_first_letter
                                    ?>

                                    <li>
                                        <a href="/categories/{{ $category->id }}/{{ $category->getNameUrlEncodedAttribute() }}/">{{ $category->name }}</a>
                                        {{-- <a href="#">{{ $category->name }}</a> --}}
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
</x-layouts.app>