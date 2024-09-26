<x-filament-panels::page>
    <div
        x-data="{
            generatePDF() {
                const element = document.getElementById('pdf-content');
                html2pdf().from(element).save('user-profile.pdf');
            }
        }"
        x-load-js="[
            @js(\Filament\Support\Facades\FilamentAsset::getScriptSrc('custom-script')),
            'https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js'
        ]"
    >
        <div class="mb-4">
            <x-filament::button
                type="button"
                x-on:click="generatePDF"
            >
                Télécharger le PDF
            </x-filament::button>
        </div>

        <div id="pdf-content" class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Profil Utilisateur</h1>
            </div>

            <div class="space-y-4">
                <div class="flex items-center border-b pb-2">
                    <span class="text-gray-600 font-semibold w-1/3">Nom:</span>
                    <span class="text-gray-800">test</span>
                </div>
                <div class="flex items-center border-b pb-2">
                    <span class="text-gray-600 font-semibold w-1/3">Email:</span>
                    <span class="text-gray-800">t</span>
                </div>
                <!-- Ajoutez d'autres champs utilisateur ici -->
            </div>

            <div class="mt-8 text-center text-sm text-gray-500">
                <p>Ce document a été généré le {{ now()->format('d/m/Y à H:i') }}</p>
            </div>
        </div>
    </div>
</x-filament-panels::page>
