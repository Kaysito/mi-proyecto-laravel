<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistema Corporativo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans flex h-screen overflow-hidden">

    <aside class="w-64 bg-gray-900 text-white flex flex-col">
        <div class="h-16 flex items-center justify-center border-b border-gray-800">
            <h1 class="text-xl font-bold uppercase tracking-wider">Mi Empresa</h1>
        </div>
        <nav class="flex-1 overflow-y-auto py-4">
            <div class="px-4 py-2 text-xs text-gray-400 uppercase font-bold tracking-wider">Seguridad</div>
            <a href="{{ route('perfil.index') }}" class="block px-6 py-2 text-sm hover:bg-gray-800 transition"><i class="fas fa-id-badge mr-2"></i> Perfil</a>
            <a href="{{ route('modulo.index') }}" class="block px-6 py-2 text-sm hover:bg-gray-800 transition"><i class="fas fa-cubes mr-2"></i> Módulo</a>
            <a href="{{ route('permisos.index') }}" class="block px-6 py-2 text-sm hover:bg-gray-800 transition"><i class="fas fa-key mr-2"></i> Permisos-Perfil</a>
            <a href="{{ route('usuarios.index') }}" class="block px-6 py-2 text-sm hover:bg-gray-800 transition"><i class="fas fa-users mr-2"></i> Usuarios</a>

            <div class="px-4 py-2 mt-4 text-xs text-gray-400 uppercase font-bold tracking-wider">Principal 1</div>
            <a href="{{ route('p1.1.index') }}" class="block px-6 py-2 text-sm hover:bg-gray-800 transition">Principal 1.1</a>
            <a href="{{ route('p1.2.index') }}" class="block px-6 py-2 text-sm hover:bg-gray-800 transition">Principal 1.2</a>

            <div class="px-4 py-2 mt-4 text-xs text-gray-400 uppercase font-bold tracking-wider">Principal 2</div>
            <a href="{{ route('p2.1.index') }}" class="block px-6 py-2 text-sm hover:bg-gray-800 transition">Principal 2.1</a>
            <a href="{{ route('p2.2.index') }}" class="block px-6 py-2 text-sm hover:bg-gray-800 transition">Principal 2.2</a>
        </nav>
        <div class="p-4 border-t border-gray-800">
            <a href="{{ route('login') }}" class="block w-full text-center text-red-400 hover:text-red-300"><i class="fas fa-sign-out-alt mr-2"></i> Salir</a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-screen">
        <header class="h-16 bg-white shadow flex items-center px-6 justify-between z-10">
            <div class="text-sm text-gray-500 font-medium">
                <i class="fas fa-home mr-2"></i> @yield('breadcrumb')
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold">A</div>
                <span class="ml-2 text-sm font-semibold text-gray-700">Admin</span>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </div>
    </main>
</body>
</html>