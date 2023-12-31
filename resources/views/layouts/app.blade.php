<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"/>

        <script src="/codemirror/lib/codemirror.js"></script>
        <link rel="stylesheet" href="/codemirror/lib/codemirror.css">
        <link rel="stylesheet" href="/codemirror/theme/dracula.css">
        <script src="/codemirror/lib/codemirror.js"></script>
        <script src="/codemirror/mode/xml/xml.js"></script>
        <script src="/codemirror/mode/htmlmixed/htmlmixed.js"></script>
        <script src="/codemirror/mode/css/css.js"></script>
        <script src="/codemirror/mode/htmlembedded/htmlembedded.js"></script>
        <script src="/codemirror/mode/xml/xml.js"></script>
        <script src="/codemirror/addon/search/search.js"></script>
        <script src="/codemirror/addon/search/searchcursor.js"></script>
        <script src="/codemirror/addon/search/jump-to-line.js"></script>
        <script src="/codemirror/addon/dialog/dialog.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">


{{--            <!-- Page Heading -->--}}
{{--            @if (isset($header))--}}
{{--                <header class="bg-white shadow">--}}
{{--                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                        {{ $header }}--}}
{{--                    </div>--}}
{{--                </header>--}}
{{--            @endif--}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
