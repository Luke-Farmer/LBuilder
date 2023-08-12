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
            {!! $page->page_css !!}
        </style>
        <main>
            {!! $page->content !!}
        </main>
        <script>
            {!! $page->page_js !!}
        </script>
    </body>
</html>
