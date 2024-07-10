<div>
    <div id="badge" class="w-80 h-[500px] bg-white rounded-2xl shadow-2xl overflow-hidden relative mx-auto">
        <!-- Header -->
        <div class="h-32 bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-200 relative">
            <div class="absolute top-4 left-4 flex items-center">
                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mr-3 border-2 border-green-700 shadow-lg">
                    <img src="/api/placeholder/72/72" alt="Logo" class="object-cover h-16 w-16 rounded-full">
                </div>
                <div class="text-green-800">
                    <h1 class="text-2xl font-bold leading-tight">OSMIUM</h1>
                    <p class="text-sm font-semibold">FOOTBALL CLUB YAOUNDÉ II</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="p-6">
            <div class="flex justify-center -mt-16">
                <div class="w-36 h-36 rounded-full overflow-hidden border-4 border-white shadow-xl">
                    <img src="/api/placeholder/144/144" alt="Member" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="text-center mt-4">
                <h2 class="text-xl font-bold text-green-800">NGONO Christelle</h2>
                <p class="text-sm text-green-700 font-semibold mt-1">CARTE DE MEMBRE</p>
            </div>

            <div class="mt-6 flex justify-center">
                <img src="/api/placeholder/100/100" alt="QR Code" class="w-24 h-24 shadow-md rounded">
            </div>

            <div class="mt-4 text-center text-sm text-green-700">
                <p class="font-semibold">ID CARD : 202400123</p>
                <p class="font-semibold">SAISON 2024 - 2025</p>
            </div>
        </div>
    </div>
    <button
        wire:click="generatePDF"
        class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full"
    >
        Générer PDF Haute Qualité
    </button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
        function generatePDF() {
            const { jsPDF } = window.jspdf;
            const badge = document.getElementById('badge');

            html2canvas(badge, { scale: 2, logging: false, useCORS: true }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF({
                    orientation: 'portrait',
                    unit: 'mm',
                    format: 'a4'
                });

                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save("badge_OSMIUM_HQ.pdf");
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            window.addEventListener('generate-pdf', generatePDF);
        });
    </script>
</div>
