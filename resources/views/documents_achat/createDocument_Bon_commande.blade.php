{{-- @extends('layouts.app2') --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Commande</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-8 text-center">FORMULAIRE DE COMMANDE</h1>

        <form class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Numéro de commande :</label>
                        <input type="text" name="" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date :</label>
                        <div class="flex space-x-2">
                            <input type="number" placeholder="JJ" class="w-16 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <span class="self-center">/</span>
                            <input type="number" placeholder="MM" class="w-16 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <span class="self-center">/</span>
                            <input type="number" placeholder="AAAA" class="w-20 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tél. :</label>
                        <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nom :</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Adresse :</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 h-20 resize-none"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email :</label>
                        <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <!-- Items Table -->
            <div class="mt-8">
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-300 px-4 py-3 text-left font-medium text-gray-700">DÉSIGNATION</th>
                                <th class="border border-gray-300 px-4 py-3 text-center font-medium text-gray-700 w-24">QUANTITÉ</th>
                                <th class="border border-gray-300 px-4 py-3 text-center font-medium text-gray-700 w-32">PRIX UNITAIRE</th>
                                <th class="border border-gray-300 px-4 py-3 text-center font-medium text-gray-700 w-32">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody id="itemsTable">
                            <tr>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="text" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" step="0.01" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" step="0.01" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center bg-gray-50" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="text" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" step="0.01" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" step="0.01" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center bg-gray-50" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="text" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" step="0.01" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" step="0.01" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center bg-gray-50" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="text" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" step="0.01" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" step="0.01" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center bg-gray-50" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="text" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" step="0.01" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" step="0.01" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center bg-gray-50" readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 flex justify-end">
                    <button type="button" onclick="addRow()" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Ajouter une ligne
                    </button>
                </div>
            </div>

            <!-- Payment and Summary Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                <div class="space-y-6">
                    <!-- Payment Method -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Méthode de paiement :</label>
                        <div class="space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="payment_method" value="espece" class="form-radio text-blue-600">
                                <span class="ml-2">Espèce</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="payment_method" value="cb" class="form-radio text-blue-600">
                                <span class="ml-2">CB</span>
                            </label>
                        </div>
                    </div>

                    <!-- Delivery Method -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Moyen de Livraison :</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Follow-up Number -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Numéro de suivie :</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Notes -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NOTES :</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 h-24 resize-none"></textarea>
                    </div>
                </div>

                <div class="space-y-4">
                    <!-- Financial Summary -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sous-total :</label>
                        <input type="number" step="0.01" id="subtotal" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50" readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Taxe TVA :</label>
                        <input type="number" step="0.01" id="tva" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="calculateTotal()">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Promo :</label>
                        <input type="number" step="0.01" id="promo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="calculateTotal()">
                    </div>

                    <div class="bg-green-50 p-3 rounded-md border border-green-200">
                        <label class="block text-lg font-semibold text-gray-700 mb-1">Total :</label>
                        <input type="number" step="0.01" id="total" class="w-full px-3 py-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 bg-white text-lg font-semibold" readonly>
                    </div>

                    <!-- Signature Section -->
                    <div class="mt-6 space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Date :</label>
                                <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">À :</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Signature :</label>
                            <div class="w-full h-24 border-2 border-dashed border-gray-300 rounded-md flex items-center justify-center bg-gray-50">
                                <span class="text-gray-400 text-sm">Zone de signature</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center mt-8">
                <button type="submit" class="px-8 py-3 bg-green-600 text-white text-lg font-semibold rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Soumettre la commande
                </button>
            </div>
        </form>
    </div>

    <script>
        function calculateRow(element) {
            const row = element.closest('tr');
            const quantity = parseFloat(row.cells[1].querySelector('input').value) || 0;
            const unitPrice = parseFloat(row.cells[2].querySelector('input').value) || 0;
            const totalCell = row.cells[3].querySelector('input');

            totalCell.value = (quantity * unitPrice).toFixed(2);
            calculateSubtotal();
        }

        function calculateSubtotal() {
            const rows = document.querySelectorAll('#itemsTable tr');
            let subtotal = 0;

            rows.forEach(row => {
                const totalInput = row.cells[3].querySelector('input');
                const total = parseFloat(totalInput.value) || 0;
                subtotal += total;
            });

            document.getElementById('subtotal').value = subtotal.toFixed(2);
            calculateTotal();
        }

        function calculateTotal() {
            const subtotal = parseFloat(document.getElementById('subtotal').value) || 0;
            const tva = parseFloat(document.getElementById('tva').value) || 0;
            const promo = parseFloat(document.getElementById('promo').value) || 0;

            const total = subtotal + tva - promo;
            document.getElementById('total').value = total.toFixed(2);
        }

        function addRow() {
            const table = document.getElementById('itemsTable');
            const newRow = table.insertRow();

            newRow.innerHTML = `
                <td class="border border-gray-300 px-4 py-3">
                    <input type="text" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1">
                </td>
                <td class="border border-gray-300 px-4 py-3">
                    <input type="number" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                </td>
                <td class="border border-gray-300 px-4 py-3">
                    <input type="number" step="0.01" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                </td>
                <td class="border border-gray-300 px-4 py-3">
                    <input type="number" step="0.01" class="w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center bg-gray-50" readonly>
                </td>
            `;
        }

        // Set today's date as default
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            const dateInputs = document.querySelectorAll('input[type="date"]');
            dateInputs.forEach(input => {
                if (!input.value) input.value = today;
            });
        });
    </script>
</body>
</html>
