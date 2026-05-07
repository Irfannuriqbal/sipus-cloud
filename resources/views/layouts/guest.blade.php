<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased" style="background: linear-gradient(135deg, var(--corporate-navy) 0%, #0f2a3e 100%); min-height: 100vh; display: flex; flex-direction: column;">
        <!-- Navbar -->
        <nav class="w-full" style="background: linear-gradient(90deg, var(--corporate-navy) 0%, #1a3a52 100%); box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); backdrop-filter: blur(10px);">
            <div class="container-fluid px-4 py-4">
                <div class="flex items-center justify-between">
                    <a href="/" class="flex items-center gap-2 text-white" style="text-decoration: none; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        <i class="bi bi-shield-check" style="font-size: 28px; color: var(--corporate-orange);"></i>
                        <span style="font-weight: 700; font-size: 20px; letter-spacing: -0.5px;">SIPUS</span>
                    </a>
                    <div class="flex gap-4">
                        @guest
                            <a href="{{ route('login') }}" class="text-white" style="text-decoration: none; font-size: 15px; padding: 10px 20px; border-radius: 8px; transition: all 0.3s ease; font-weight: 500;" onmouseover="this.style.backgroundColor='rgba(255,255,255,0.15)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.backgroundColor='transparent'; this.style.transform='translateY(0)'">Masuk</a>
                            <a href="{{ route('register') }}" class="text-white" style="text-decoration: none; font-size: 15px; padding: 10px 20px; border-radius: 8px; background: rgba(253, 126, 20, 0.2); transition: all 0.3s ease; font-weight: 500; border: 1px solid rgba(253, 126, 20, 0.4);" onmouseover="this.style.backgroundColor='rgba(253, 126, 20, 0.3)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.backgroundColor='rgba(253, 126, 20, 0.2)'; this.style.transform='translateY(0)'">Daftar</a>
                        @else
                            <a href="/" class="text-white" style="text-decoration: none; font-size: 15px; padding: 10px 20px; border-radius: 8px; transition: all 0.3s ease; font-weight: 500;" onmouseover="this.style.backgroundColor='rgba(255,255,255,0.15)'" onmouseout="this.style.backgroundColor='transparent'">Kembali</a>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div style="flex: 1; display: flex; align-items: center; justify-content: center; padding: 60px 20px;">
            <!-- Auth Form Container -->
            <div class="w-full" style="max-width: 450px;">
                <div style="background: white; border-radius: 16px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2); overflow: hidden; border-top: 6px solid var(--corporate-teal); padding: 48px 40px;">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
