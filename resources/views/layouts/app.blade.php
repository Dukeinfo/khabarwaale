<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style type="text/css" rel='stylesheet'>
            .shimmer {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            }

            @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
            }

            /* ------Card css ------ */
                            .br {
                border-radius: 8px;  
                }
                .w80 {
                width: 80%;
                }
                .card {
                border: 2px solid #fff;
                box-shadow:0px 0px 10px 0 #a9a9a9;
                padding: 30px 40px;
                width: 80%;
                margin: 50px auto;
                }
                .wrapper {
                width: 0px;
                animation: fullView 0.5s forwards cubic-bezier(0.250, 0.460, 0.450, 0.940);
                }
                .profilePic {
                height: 65px;
                width: 65px;
                border-radius: 50%;
                }
                .comment {
                height: 10px;
                background: #777;
                margin-top: 20px;
                }

                @keyframes fullView {
                100% {
                    width: 100%;
                }
                }


                .animate {
                animation : shimmer 2s infinite linear;
                background: linear-gradient(to right, #eff1f3 4%, #e2e2e2 25%, #eff1f3 36%);
                    background-size: 1000px 100%;
                }

                @keyframes shimmer {
                0% {
                    background-position: -1000px 0;
                }
                100% {
                    background-position: 1000px 0;
                }
                }
        </style>
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
