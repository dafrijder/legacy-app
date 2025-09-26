<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $category->id }}/{{ $category->getNameUrlEncodedAttribute() }}/" alt="Brands for '{{$category->name}}'" title="Brands for '{{$category->name}}'">{{ $category->name }}</a></li>
    </x-slot:breadcrumb>

    <div class="category-page">
        <h1>{{ $category->name }}</h1>

        <p>{{ __('introduction_texts.type_list', ['category'=>$category->name]) }}</p>


        <div class="manual-list">
            @foreach ($brands as $brand)
                <div>
                    <a class="btn btn-outline-dark ml-2" href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a>
                </div>

            @endforeach
        </div>
    </div>
</x-layouts.app>