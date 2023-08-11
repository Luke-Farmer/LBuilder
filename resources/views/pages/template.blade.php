<html lang="en">
    <head>
        <title>{{ $page->seo_title }}</title>
        <meta name="description" content="{{ $page->seo_description }}">
        <meta property="og:title" content="{{ $page->seo_title }}" />
        <meta property="og:description" content="{{ $page->seo_description }}" />
        <meta property="og:image" content="{{ $page->seo_image }}" />
    </head>
    <body>
        <style>
            {{ $page->page_css }}
        </style>
        <main>
            {!! $page->content !!}
        </main>
        <script>
            {{ $page->page_js }}
        </script>
    </body>
</html>
