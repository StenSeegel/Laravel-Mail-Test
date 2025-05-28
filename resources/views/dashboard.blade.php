<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-50 border border-green-200 rounded-xl dark:bg-green-900/20 dark:border-green-800 dark:text-green-200">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="p-4 mb-4 text-red-800 bg-red-50 border border-red-200 rounded-xl dark:bg-red-900/20 dark:border-red-800 dark:text-red-200">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <!-- Einfache Text Mail -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="p-4 relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Einfache Text Mail</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">Versende eine einfache Text-E-Mail</p>
                    </div>
                    <form action="/send-simple-mail" method="GET" class="mt-auto">
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 active:bg-blue-700 text-white font-semibold py-2.5 px-4 rounded-lg transition-all duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Text Mail senden
                        </button>
                    </form>
                </div>
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>

            <!-- HTML Mail -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="p-4 relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">HTML Mail</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">Versende eine formatierte HTML-E-Mail</p>
                    </div>
                    <form action="/send-html-mail" method="GET" class="mt-auto">
                        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 active:bg-green-700 text-white font-semibold py-2.5 px-4 rounded-lg transition-all duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                            HTML Mail senden
                        </button>
                    </form>
                </div>
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>

            <!-- Welcome Mail -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="p-4 relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Welcome Mail</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">Mailable-Klasse mit Blade-Template</p>
                    </div>
                    <form action="/send-welcome-mail" method="GET" class="mt-auto">
                        <button type="submit" class="w-full bg-purple-500 hover:bg-purple-600 active:bg-purple-700 text-white font-semibold py-2.5 px-4 rounded-lg transition-all duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                            Welcome Mail senden
                        </button>
                    </form>
                </div>
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>

            <!-- Mail mit Anhang -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="p-4 relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Mail mit Anhang</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">E-Mail mit angehängter Datei</p>
                    </div>
                    <form action="/send-attachment-mail" method="GET" class="mt-auto">
                        <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 active:bg-orange-700 text-white font-semibold py-2.5 px-4 rounded-lg transition-all duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-opacity-50">
                            Anhang Mail senden
                        </button>
                    </form>
                </div>
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>

            <!-- Queue Mail -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="p-4 relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Queue Mail</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">E-Mail in Queue einreihen</p>
                    </div>
                    <form action="/send-queued-mail" method="GET" class="mt-auto">
                        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 active:bg-red-700 text-white font-semibold py-2.5 px-4 rounded-lg transition-all duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                            Queue Mail senden
                        </button>
                    </form>
                </div>
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>

            <!-- Bulk Mail -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="p-4 relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Bulk Mail (BCC)</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">Eine Mail an mehrere Empfänger (BCC)</p>
                    </div>
                    <div class="mt-auto space-y-2">
                        <form action="/send-bulk-mail" method="GET">
                            <button type="submit" class="w-full bg-teal-500 hover:bg-teal-600 active:bg-teal-700 text-white font-semibold py-2 px-3 rounded-lg transition-all duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-opacity-50">
                                BCC Bulk Mail
                            </button>
                        </form>
                        <form action="/send-bulk-mail-queued" method="GET">
                            <button type="submit" class="w-full bg-cyan-500 hover:bg-cyan-600 active:bg-cyan-700 text-white font-semibold py-2 px-3 rounded-lg transition-all duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-opacity-50 text-sm">
                                Queue Bulk Mail
                            </button>
                        </form>
                    </div>
                </div>
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="p-6 relative z-10">
                <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Laravel Mail Test Umgebung</h2>
                <div class="space-y-3 text-gray-600 dark:text-gray-300">
                    <p><strong>Herd Pro Mail Service:</strong> Alle E-Mails werden lokal abgefangen und in der Herd Mail-Oberfläche angezeigt.</p>
                    <p><strong>SMTP Konfiguration:</strong> 127.0.0.1:2525 (bereits konfiguriert)</p>
                    <p><strong>Tipp:</strong> Öffne die Herd App und navigiere zum Mail-Tab, um die versendeten E-Mails zu sehen.</p>
                    <div class="mt-4 p-3 bg-green-50 dark:bg-green-900/20 rounded border border-green-200 dark:border-green-800">
                        <p class="text-sm text-green-800 dark:text-green-200">
                            <strong>Queue Setup & Commands:</strong>
                            <br>1. <code>php artisan queue:table</code> - Erstelle Queue-Tabellen
                            <br>2. <code>php artisan migrate</code> - Führe Migrationen aus
                            <br>3. <code>php artisan queue:work</code> - Starte Queue Worker
                            <br>4. <code>php artisan queue:restart</code> - Neustart des Queue Workers
                            <br>5. <code>php artisan queue:failed-table</code> - Erstelle Failed-Jobs-Tabelle
                        </p>
                    </div>
                    <div class="mt-4 p-3 bg-amber-50 dark:bg-amber-900/20 rounded border border-amber-200 dark:border-amber-800">
                        <p class="text-sm text-amber-800 dark:text-amber-200">
                            <strong>Queue Debugging:</strong>
                            <br>• Prüfe: <code>php artisan queue:monitor</code>
                            <br>• Failed Jobs: <code>php artisan queue:failed</code>
                            <br>• Aktuelle DB: <strong>{{ config('database.default') }}</strong>
                            <br>• Queue Connection: <strong>{{ config('queue.default') }}</strong>
                        </p>
                    </div>
                    <div class="mt-4 p-3 bg-blue-50 dark:bg-blue-900/20 rounded border border-blue-200 dark:border-blue-800">
                        <p class="text-sm text-blue-800 dark:text-blue-200">
                            <strong>Bulk Mail Optimierung:</strong> 
                            <br>• <strong>BCC:</strong> Eine Mail an mehrere Empfänger (SMTP-freundlich)
                            <br>• <strong>Queue:</strong> Individuelle Mails über Queue-System (verhindert SMTP-Limits)
                        </p>
                    </div>
                    <div class="mt-4 p-3 bg-yellow-50 dark:bg-yellow-900/20 rounded border border-yellow-200 dark:border-yellow-800">
                        <p class="text-sm text-yellow-800 dark:text-yellow-200">
                            <strong>Debug:</strong> Prüfe auch die Laravel Logs unter <code>storage/logs/laravel.log</code> für Mail-Events.
                        </p>
                    </div>
                </div>
            </div>
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
</x-layouts.app>
