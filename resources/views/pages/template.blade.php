<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $page->seo_title }}</title>
        <meta name="description" content="{{ $page->seo_description }}">
        <meta property="og:title" content="{{ $page->seo_title }}" />
        <meta property="og:description" content="{{ $page->seo_description }}" />
        <meta property="og:image" content="{{ $page->seo_image }}" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="robots" content="index, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <style>
            {!! $navigation->css !!}
            {!! $footer->css !!}
            @foreach(App\Models\Component::all() as $componentData)
                @if(str_contains($page->content, '[[' . $componentData->title . ']]'))
                    {!! $componentData->css !!}
                @endif
            @endforeach
            {!! $page->page_css !!}
        </style>
        <main>
            {!! $navigation->content !!}
            @php
                $explodedContent = $page->content;
                foreach (App\Models\Component::all() as $componentData) {
                    $explodedContent = str_replace('[[' . $componentData->title . ']]', $componentData->content, $explodedContent);
                }
            @endphp
            {!! $explodedContent !!}
            {!! $footer->content !!}
        </main>
        <script>
            {!! $navigation->js !!}
            @foreach(App\Models\Component::all() as $componentData)
                @if(str_contains($page->content, '[[' . $componentData->title . ']]'))
                    {!! $componentData->js !!}
                @endif
            @endforeach
            {!! $page->page_js !!}
            {!! $footer->js !!}
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
