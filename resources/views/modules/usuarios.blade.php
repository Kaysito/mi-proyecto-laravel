@extends('layouts.app')

@section('title', $title)

@section('breadcrumb')
    <span class="text-[var(--text-3)]">Seguridad</span>
    <span class="breadcrumb-sep">/</span>
    <span class="text-[var(--text-1)] font-medium">{{ $title }}</span>
@endsection

@section('content')
<div class="bg-[var(--surface-2)] rounded-xl border border-[var(--surface-4)] shadow-card p-6">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div>
            <h2 class="text-xl font-bold text-[var(--text-1)]">Gestión de {{ $title }}</h2>
            <p class="text-sm text-[var(--text-3)] mt-1">Administra los accesos y roles del sistema.</p>
        </div>
        
        <button class="flex items-center gap-2 bg-neon-dark hover:bg-neon text-white font-medium py-2 px-5 rounded-lg transition-all duration-300 shadow-neon-sm hover:shadow-neon-md border border-neon-border">
            <i class="fas fa-plus text-sm"></i> 
            <span>Agregar Nuevo</span>
        </button>
    </div>

    <div class="mb-6 flex space-x-3">
        <div class="relative w-full sm:w-1/3">
            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-[var(--text-3)] text-sm"></i>
            <input 
                type="text" 
                placeholder="Buscar por nombre o correo..." 
                class="w-full pl-10 pr-4 py-2.5 bg-[var(--surface-3)] border border-[var(--surface-4)] text-[var(--text-1)] placeholder-[var(--text-3)] rounded-lg focus:outline-none focus:border-[var(--neon-border)] focus:shadow-[0_0_0_3px_rgba(255,23,68,0.1)] transition-all text-sm"
            >
        </div>
        <button class="bg-[var(--surface-3)] text-[var(--text-2)] border border-[var(--surface-4)] px-4 py-2.5 rounded-lg hover:text-white hover:border-[var(--text-3)] transition-colors flex items-center justify-center" title="Recargar">
            <i class="fas fa-sync-alt"></i>
        </button>
    </div>

    <div class="overflow-x-auto rounded-lg border border-[var(--surface-4)]">
        <table class="min-w-full text-left text-sm whitespace-nowrap">
            <thead class="bg-[var(--surface-3)] border-b border-[var(--surface-4)]">
                <tr>
                    <th class="py-3 px-5 text-[10px] font-mono tracking-widest text-[var(--text-3)] uppercase">Usuario</th>
                    <th class="py-3 px-5 text-[10px] font-mono tracking-widest text-[var(--text-3)] uppercase">Correo Electrónico</th>
                    <th class="py-3 px-5 text-[10px] font-mono tracking-widest text-[var(--text-3)] uppercase">Estado</th>
                    <th class="py-3 px-5 text-[10px] font-mono tracking-widest text-[var(--text-3)] uppercase text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[var(--surface-4)]">
                
                <tr class="hover:bg-[var(--surface-3)] transition-colors duration-150 group">
                    <td class="py-3 px-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-[var(--surface-4)] flex items-center justify-center text-[var(--text-2)] font-mono text-xs border border-[var(--surface-3)]">
                                JP
                            </div>
                            <span class="font-medium text-[var(--text-1)]">Juan Pérez</span>
                        </div>
                    </td>
                    <td class="py-3 px-5 text-[var(--text-2)]">juan@empresa.com</td>
                    <td class="py-3 px-5">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Activo
                        </span>
                    </td>
                    <td class="py-3 px-5 text-center">
                        <div class="flex justify-center items-center gap-3 opacity-70 group-hover:opacity-100 transition-opacity">
                            <button class="text-[var(--text-3)] hover:text-[var(--text-1)] transition-colors" title="Ver Detalle">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-[var(--text-3)] hover:text-blue-400 transition-colors" title="Editar">
                                <i class="fas fa-pen-to-square"></i>
                            </button>
                            <button class="text-[var(--text-3)] hover:text-[var(--neon)] transition-colors" title="Eliminar">
                                <i class="fas fa-trash-can"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="hover:bg-[var(--surface-3)] transition-colors duration-150 group">
                    <td class="py-3 px-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-[var(--surface-4)] flex items-center justify-center text-[var(--text-2)] font-mono text-xs border border-[var(--surface-3)]">
                                MR
                            </div>
                            <span class="font-medium text-[var(--text-1)]">María Rodríguez</span>
                        </div>
                    </td>
                    <td class="py-3 px-5 text-[var(--text-2)]">maria.r@empresa.com</td>
                    <td class="py-3 px-5">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-zinc-500/10 text-zinc-400 border border-zinc-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-zinc-500"></span>
                            Inactivo
                        </span>
                    </td>
                    <td class="py-3 px-5 text-center">
                        <div class="flex justify-center items-center gap-3 opacity-70 group-hover:opacity-100 transition-opacity">
                            <button class="text-[var(--text-3)] hover:text-[var(--text-1)] transition-colors" title="Ver Detalle">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-[var(--text-3)] hover:text-blue-400 transition-colors" title="Editar">
                                <i class="fas fa-pen-to-square"></i>
                            </button>
                            <button class="text-[var(--text-3)] hover:text-[var(--neon)] transition-colors" title="Eliminar">
                                <i class="fas fa-trash-can"></i>
                            </button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="mt-5 flex flex-col sm:flex-row justify-between items-center text-sm gap-4">
        <span class="text-[var(--text-3)]">Mostrando <span class="text-[var(--text-1)] font-medium">1</span> a <span class="text-[var(--text-1)] font-medium">2</span> de <span class="text-[var(--text-1)] font-medium">2</span> registros</span>
        
        <div class="flex items-center space-x-1">
            <button class="px-3 py-1.5 rounded-md border border-[var(--surface-4)] bg-[var(--surface-2)] text-[var(--text-3)] hover:text-[var(--text-1)] hover:bg-[var(--surface-3)] transition-colors disabled:opacity-50">
                <i class="fas fa-chevron-left text-xs"></i>
            </button>
            
            <button class="px-3 py-1.5 rounded-md border border-neon-border bg-neon-muted text-[var(--neon)] font-medium transition-colors">
                1
            </button>
            
            <button class="px-3 py-1.5 rounded-md border border-[var(--surface-4)] bg-[var(--surface-2)] text-[var(--text-2)] hover:text-[var(--text-1)] hover:bg-[var(--surface-3)] transition-colors">
                2
            </button>

            <button class="px-3 py-1.5 rounded-md border border-[var(--surface-4)] bg-[var(--surface-2)] text-[var(--text-3)] hover:text-[var(--text-1)] hover:bg-[var(--surface-3)] transition-colors">
                <i class="fas fa-chevron-right text-xs"></i>
            </button>
        </div>
    </div>

</div>
@endsection