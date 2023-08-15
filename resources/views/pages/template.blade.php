<html lang="en">
    <head>
        <title>{{ $page->seo_title }}</title>
        <meta name="description" content="{{ $page->seo_description }}">
        <meta property="og:title" content="{{ $page->seo_title }}" />
        <meta property="og:description" content="{{ $page->seo_description }}" />
        <meta property="og:image" content="{{ $page->seo_image }}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <style>
            @foreach(App\Models\Component::all() as $componentData)
                @if(str_contains($page->content, '[[' . $componentData->title . ']]'))
                    {!! $componentData->css !!}
                @endif
            @endforeach
            {!! $page->page_css !!}
        </style>
        <main>
            @php
                $explodedContent = $page->content;
                foreach (App\Models\Component::all() as $componentData) {
                    $explodedContent = str_replace('[[' . $componentData->title . ']]', $componentData->content, $explodedContent);
                }
            @endphp
            {!! $explodedContent !!}
        </main>
        <script>
            @foreach(App\Models\Component::all() as $componentData)
                @if(str_contains($page->content, '[[' . $componentData->title . ']]'))
                    {!! $componentData->js !!}
                @endif
            @endforeach
            {!! $page->page_js !!}
        </script>
    </body>
</html>
