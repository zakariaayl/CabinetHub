@extends('layouts.app2')
@section('content')
<body class="bg-gray-50 p-8">
    <div class="max-w-4xl mx-auto bg-white p-12 rounded-lg shadow-lg">

        <div class="flex justify-between items-start mb-12">
            <div>
                <h1 class="text-4xl font-bold tracking-wider text-gray-900">CABINETHUB</h1>
            </div>
            <div class="text-right">
                <div class="text-sm text-gray-600 mb-2">#<input type="text" value="1024" class="border-0 border-b border-gray-300 focus:border-gray-500 focus:outline-none bg-transparent text-right w-16"></div>
            </div>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">FACTURÉ À :</label>
                    <input type="text" placeholder="une certaine entreprise" class="w-full px-0 py-1 border-0 border-b border-gray-300 focus:border-gray-500 focus:outline-none bg-transparent">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">PAYER À :</label>
                    <div class="space-y-2">
                        <input type="text" placeholder="CabinetHub" class="w-full px-0 py-1 border-0 border-b border-gray-300 focus:border-gray-500 focus:outline-none bg-transparent">
                        <input type="text" placeholder="123 Anywhere St., Any City" class="w-full px-0 py-1 border-0 border-b border-gray-300 focus:border-gray-500 focus:outline-none bg-transparent">
                        <input type="text" placeholder="123 456 7890 (adresse)" class="w-full px-0 py-1 border-0 border-b border-gray-300 focus:border-gray-500 focus:outline-none bg-transparent">
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Banque</label>
                        <input type="text" placeholder="quelque banque" class="w-full px-0 py-1 border-0 border-b border-gray-300 focus:border-gray-500 focus:outline-none bg-transparent">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">nom du compte</label>
                        <input type="text" placeholder="CabinetHubCompte" class="w-full px-0 py-1 border-0 border-b border-gray-300 focus:border-gray-500 focus:outline-none bg-transparent">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">BSB</label>
                        <input type="text" placeholder="000 000" class="w-full px-0 py-1 border-0 border-b border-gray-300 focus:border-gray-500 focus:outline-none bg-transparent">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">nombre du compte</label>
                        <input type="text" placeholder="0000 0000" class="w-full px-0 py-1 border-0 border-b border-gray-300 focus:border-gray-500 focus:outline-none bg-transparent">
                    </div>
                </div>
            </div>
        </div>


        <div class="mb-8">
            <table class="w-full">
                <thead>
                    <tr class="border-b-2 border-gray-900">
                        <th class="text-left py-3 font-semibold text-gray-900">DESCRIPTION</th>
                        <th class="text-center py-3 font-semibold text-gray-900 w-24">TAUX</th>
                        <th class="text-center py-3 font-semibold text-gray-900 w-20">HEURES</th>
                        <th class="text-right py-3 font-semibold text-gray-900 w-32">MONTANT</th>
                    </tr>
                </thead>
                <tbody id="servicesTable">
                    <tr class="border-b border-gray-200">
                        <td class="py-4">
                            <input type="text" value="Plan de contenu" class="w-full border-0 focus:outline-none bg-transparent">
                        </td>
                        <td class="py-4 text-center">
                            <input type="text" min="$0/hr" value="$50/hr" class="w-full border-0 focus:outline-none bg-transparent text-center" onchange="calculateRow(this)">
                        </td>
                        <td class="py-4 text-center">
                            <input type="number" min="0" value="4" class="w-full border-0 focus:outline-none bg-transparent text-center" onchange="calculateRow(this)">
                        </td>
                        <td class="py-4 text-right">
                            <input type="text"  value="$200.00" class="w-full border-0 focus:outline-none bg-transparent text-right" readonly>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="py-4">
                            <input type="text" value="Copy Writing" class="w-full border-0 focus:outline-none bg-transparent">
                        </td>
                        <td class="py-4 text-center">
                            <input type="text" min="$0/hr" value="$50/hr" class="w-full border-0 focus:outline-none bg-transparent text-center" onchange="calculateRow(this)">
                        </td>
                        <td class="py-4 text-center">
                            <input type="number" min="0" value="2" class="w-full border-0 focus:outline-none bg-transparent text-center" onchange="calculateRow(this)">
                        </td>
                        <td class="py-4 text-right">
                            <input type="text" value="$100.00" class="w-full border-0 focus:outline-none bg-transparent text-right" readonly>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="py-4">
                            <input type="text" value="Website Design" class="w-full border-0 focus:outline-none bg-transparent">
                        </td>
                        <td class="py-4 text-center">
                            <input type="text"  min="$0/hr" value="$50/hr" class="w-full border-0 focus:outline-none bg-transparent text-center" onchange="calculateRow(this)">
                        </td>
                        <td class="py-4 text-center">
                            <input type="number" min="0" value="5" class="w-full border-0 focus:outline-none bg-transparent text-center" onchange="calculateRow(this)">
                        </td>
                        <td class="py-4 text-right">
                            <input type="text" value="$250.00" class="w-full border-0 focus:outline-none bg-transparent text-right" readonly>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="py-4">
                            <input type="text" value="Website Development" class="w-full border-0 focus:outline-none bg-transparent">
                        </td>
                        <td class="py-4 text-center">
                            <input type="text"  min="$0/hr" value="$100/hr" class="w-full border-0 focus:outline-none bg-transparent text-center" onchange="calculateRow(this)">
                        </td>
                        <td class="py-4 text-center">
                            <input type="number" min="0" value="5" class="w-full border-0 focus:outline-none bg-transparent text-center" onchange="calculateRow(this)">
                        </td>
                        <td class="py-4 text-right">
                            <input type="text" value="$500.00" class="w-full border-0 focus:outline-none bg-transparent text-right" readonly>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="py-4">
                            <input type="text" value="SEO" class="w-full border-0 focus:outline-none bg-transparent">
                        </td>
                        <td class="py-4 text-center">
                            <input type="text"  min="$0/hr" value="$50/hr" class="w-full border-0 focus:outline-none bg-transparent text-center" onchange="calculateRow(this)">
                        </td>
                        <td class="py-4 text-center">
                            <input type="number" min="0" value="4" class="w-full border-0 focus:outline-none bg-transparent text-center" onchange="calculateRow(this)">
                        </td>
                        <td class="py-4 text-right">
                            <input type="text" value="$200.00" class="w-full border-0 focus:outline-none bg-transparent text-right" readonly>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-4">
                <button type="button" onclick="addServiceRow()" class="px-4 py-2 bg-gray-900 text-white text-sm rounded hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Ajouter un service
                </button>
            </div>
        </div>


        <div class="flex justify-end">
            <div class="w-80">
                <div class="space-y-3">
                    <div class="flex justify-between py-2 border-b border-gray-200">
                        <span class="text-gray-700">Sub Total</span>
                        <span id="subtotal" class="font-medium">$1,250.00</span>
                    </div>

                    <div class="flex justify-between py-2 border-b border-gray-200">
                        <span class="text-gray-700">Package Discount (30%)</span>
                        <div class="flex items-center">
                            <input type="number" id="discountPercent" value="30" min="0" max="100" class="w-16 text-right border-0 border-b border-gray-300 focus:border-gray-500 focus:outline-none bg-transparent mr-1" onchange="calculateDiscount()">
                            <span class="text-gray-700">%</span>
                            <span id="discountAmount" class="ml-4 font-medium">$375.00</span>
                        </div>
                    </div>

                    <div class="flex justify-between py-4 border-b-2 border-gray-900">
                        <span class="text-xl font-bold text-gray-900">TOTAL</span>
                        <span id="finalTotal" class="text-xl font-bold text-gray-900">$875.00</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-12 pt-8 border-t border-gray-200">
            <div class="text-sm text-gray-600 leading-relaxed">
                <p class="mb-2">
                    Le paiement est requis dans un délai de 14 jours ouvrables à compter de la date de la facture. Veuillez envoyer le paiement à
                    <a href="mailto:hello@reallygreatsite.com" class="text-blue-600 underline hover:text-blue-800">hello@reallygreatsite.com</a>.
                </p>
                <p>Merci pour votre confiance.</p>
            </div>
        </div>


        <div class="mt-12 flex justify-center space-x-4">
            <button type="button" onclick="window.print()" class="px-6 py-3 bg-gray-900 text-white font-semibold rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500">
                Imprimer la facture
            </button>
            <button type="button" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Envoyer par email
            </button>
        </div>
    </div>

    <script>
        function calculateRow(element) {
            const row = element.closest('tr');
            const rateInput = row.cells[1].querySelector('input');
            const hoursInput = row.cells[2].querySelector('input');
            const amountInput = row.cells[3].querySelector('input');

            // Extract numeric value from rate (remove $, /hr, etc.)
            const rateText = rateInput.value.replace(/[$\/hr]/g, '');
            const rate = parseFloat(rateText) || 0;
            const hours = parseFloat(hoursInput.value) || 0;

            const amount = rate * hours;
            amountInput.value = '$' + amount.toFixed(2);

            calculateSubtotal();
        }

        function calculateSubtotal() {
            const rows = document.querySelectorAll('#servicesTable tr');
            let subtotal = 0;

            rows.forEach(row => {
                const amountInput = row.cells[3].querySelector('input');
                const amountText = amountInput.value.replace('$', '');
                const amount = parseFloat(amountText) || 0;
                subtotal += amount;
            });

            document.getElementById('subtotal').textContent = '$' + subtotal.toFixed(2);
            calculateDiscount();
        }

        function calculateDiscount() {
            const subtotalText = document.getElementById('subtotal').textContent.replace('$', '');
            const subtotal = parseFloat(subtotalText) || 0;
            const discountPercent = parseFloat(document.getElementById('discountPercent').value) || 0;

            const discountAmount = (subtotal * discountPercent) / 100;
            const finalTotal = subtotal - discountAmount;

            document.getElementById('discountAmount').textContent = '$' + discountAmount.toFixed(2);
            document.getElementById('finalTotal').textContent = '$' + finalTotal.toFixed(2);
        }

        function addServiceRow() {
            const table = document.getElementById('servicesTable');
            const newRow = table.insertRow();
            newRow.className = 'border-b border-gray-200';

            newRow.innerHTML = `
                <td class="py-4">
                    <input type="text" placeholder="Nouveau service" class="w-full border-0 focus:outline-none bg-transparent">
                </td>
                <td class="py-4 text-center">
                    <input type="text"  min="$0/hr" placeholder="$50/hr" class="w-full border-0 focus:outline-none bg-transparent text-center" onchange="calculateRow(this)">
                </td>
                <td class="py-4 text-center">
                    <input type="number" min="0" value="0" class="w-full border-0 focus:outline-none bg-transparent text-center" onchange="calculateRow(this)">
                </td>
                <td class="py-4 text-right">
                    <input type="text" value="$0.00" class="w-full border-0 focus:outline-none bg-transparent text-right" readonly>
                </td>
            `;
        }


        document.addEventListener('DOMContentLoaded', function() {
            calculateSubtotal();
        });
    </script>

    <style>
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background: white !important;
            }
        }
    </style>
</body>
</html>
@endsection
