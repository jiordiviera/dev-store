<x-filament-panels::page>
    <div
        x-data="{
            generatePDF() {
                const content = document.getElementById('pdf-content');
                const opt = {
                    margin: 10,
                    filename: 'profil_utilisateur.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                };

                html2pdf().from(content).set(opt).save();
            }
        }"
        x-init="
            if (typeof html2pdf === 'undefined') {
                const script = document.createElement('script');
                script.src = 'https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js';
                script.onload = () => console.log('html2pdf loaded');
                document.head.appendChild(script);
            }
        "
    >
        <div class="mb-6 flex justify-center">
            <x-filament::button
                type="button"
                x-on:click="generatePDF"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105"
            >
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Télécharger le PDF
                </span>
            </x-filament::button>
        </div>

        <div id="pdf-content" class="bg-white p-8 rounded-lg shadow-lg max-w-2xl mx-auto border border-gray-200">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Profil Utilisateur</h1>
                <div class="w-20 h-1 bg-indigo-500 mx-auto"></div>
            </div>

            <div class="space-y-6">
                <div class="flex items-center border-b border-gray-200 pb-4">
                    <span class="text-gray-600 font-semibold w-1/3">Nom:</span>
                    <span class="text-gray-800 font-medium">{{ $record->name }}</span>
                </div>
                <div class="flex items-center border-b border-gray-200 pb-4">
                    <span class="text-gray-600 font-semibold w-1/3">Email:</span>
                    <span class="text-gray-800 font-medium">{{ $record->email }}</span>
                </div>
                <!-- Ajoutez d'autres champs utilisateur ici -->
            </div>

            <div class="mt-10 text-center text-sm text-gray-500">
                <p>Ce document a été généré le {{ now()->format('d/m/Y à H:i') }}</p>
                <p class="mt-2">© {{ date('Y') }} Votre Entreprise. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</x-filament-panels::page>
