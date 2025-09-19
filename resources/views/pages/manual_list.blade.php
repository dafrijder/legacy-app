<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>

    <div class="brand-page">
        <h1>{{ $brand->name }}</h1>

        <div class="popular-manual-list">
            <h3>{{ __('introduction_texts.popular_manuals') }}</h3>
            <p>#. {{ __('introduction_texts.popular_manuals_name') }} - {{ __(key: 'introduction_texts.popular_manuals_visits') }}</p>
            <ol>
            @for ($i = 0; $i < 5 && $i < count($sortedManuals); $i++)
                <li>{{ $sortedManuals[$i]->name }} - {{ $sortedManuals[$i]->visit_count }}</li>
            @endfor
            </ol>
        </div>

        <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>
        <p>{{ __('introduction_texts.viewed_text') }} {{ $brand->name }}: {{ $totalVisits }}</p>


        <div class="manual-list">
            @foreach ($manuals as $manual)
                <li>
                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
                    ({{$manual->filesize_human_readable}})
                    
                {{-- @if ($manual->locally_available)
                    
                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
                    ({{$manual->filesize_human_readable}})
                    
                @else
                    <a href="{{ $manual->url }}" target="new" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
                @endif --}}
                </li>

            @endforeach
        </div>
    </div>
</x-layouts.app>
