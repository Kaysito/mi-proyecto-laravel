@extends('layouts.app')

@section('title', $title)
@section('breadcrumb', $breadcrumb)

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Gestión de {{ $title }}</h2>
        <button class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">
            <i class="fas fa-plus mr-2"></i> Agregar Nuevo
        </button>
    </div>

    <div class="mb-4 flex space-x-2">
        <input type="text" placeholder="Buscar por nombre..." class="px-4 py-2 border rounded-lg w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700"><i class="fas fa-search"></i></button>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase">Nombre</th>
                    <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase">Correo</th>
                    <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase">Estado</th>
                    <th class="py-3 px-4 border-b text-center text-xs font-semibold text-gray-600 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-4 border-b text-sm text-gray-800">Juan Pérez</td>
                    <td class="py-3 px-4 border-b text-sm text-gray-600">juan@empresa.com</td>
                    <td class="py-3 px-4 border-b"><span class="bg-green-100 text-green-800 text-xs font-bold px-2 py-1 rounded-full">Activo</span></td>
                    <td class="py-3 px-4 border-b text-center">
                        <button class="text-blue-500 hover:text-blue-700 mx-1" title="Ver Detalle"><i class="fas fa-eye"></i></button>
                        <button class="text-yellow-500 hover:text-yellow-700 mx-1" title="Editar"><i class="fas fa-edit"></i></button>
                        <button class="text-red-500 hover:text-red-700 mx-1" title="Eliminar"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-4 flex justify-between items-center text-sm text-gray-600">
        <span>Mostrando 1 a 1 de 1 registros</span>
        <div class="space-x-1">
            <button class="px-3 py-1 border rounded hover:bg-gray-100">Anterior</button>
            <button class="px-3 py-1 border rounded bg-blue-50 text-blue-600">1</button>
            <button class="px-3 py-1 border rounded hover:bg-gray-100">Siguiente</button>
        </div>
    </div>
</div>
@endsection