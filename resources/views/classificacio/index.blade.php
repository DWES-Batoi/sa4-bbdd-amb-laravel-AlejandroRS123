<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Classificació
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4">

            <div id="alerta"
                 class="hidden mb-4 p-4 border border-green-300 bg-green-50 text-green-700 rounded-lg text-sm animate-fade-in-out">
                Classificació actualitzada en temps real ✅
            </div>

            <div class="bg-white dark:bg-gray-800 shadow rounded overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr class="text-left border-b">
                            <th class="font-mold text-gray-700 dark:text-gray-300">Pos</th>
                            <th class="font-semibold text-gray-700 dark:text-gray-300">Equip</th>
                        </tr>
                    </thead>

                    <tbody id="classificacio-tbody">
                        @foreach($equips as $equip)
                            <tr data-equip-id="{{ $equip->id }}" class="border-b hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="font-semibold">
                                    {{ $posicions[$equip->id] ?? '-' }}
                                </td>
                                <td>
                                    {{ $equip->nom }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        console.log('监听页面加载，准备监听 classificacio-delta...');
        
        // Escuchar el evento
        window.addEventListener('classificacio-delta', (ev) => {
            console.log('🔔 Evento classificacio-delta recibido:', ev.detail);
            
            // Mostrar alerta
            const alerta = document.getElementById('alerta');
            if (alerta) {
                alerta.classList.remove('hidden');
                setTimeout(() => {
                    alerta.classList.add('hidden');
                }, 3000);
            }

            // Aplicar colores a los equipos
            (ev.detail || []).forEach(item => {
                const row = document.querySelector(`[data-equip-id="${item.equip_id}"]`);
                if (!row) return;
                
                // Limpiar clases anteriores
                row.classList.remove('puja', 'baixa');
                
                // Aplicar nueva clase según delta
                if (item.delta > 0) {
                    row.classList.add('puja');
                } else if (item.delta < 0) {
                    row.classList.add('baixa');
                }
            });
        });
        
        console.log('✅ Listener de classificacio-delta configurado');
    </script>

    <style>
        .puja  { 
            background-color: #d1fae5; 
            animation: highlight 1.5s ease-in-out 2;
        }
        
        .baixa { 
            background-color: #fee2e2; 
            animation: highlight 1.5s ease-in-out 2;
        }
        
        @keyframes highlight {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
    </style>
</x-app-layout>