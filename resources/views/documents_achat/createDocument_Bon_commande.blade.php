<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Commande</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-8 text-center">FORMULAIRE DE COMMANDE</h1>

        <form id="orderForm" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Numéro de commande :</label>
                        <input type="text" name="N_commande" id="N_commande" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date :</label>
                        <div class="flex space-x-2">
                            <input type="number" name="JJ" id="JJ" placeholder="JJ" class="w-16 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <span class="self-center">/</span>
                            <input type="number" name="MM" id="MM" placeholder="MM" class="w-16 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <span class="self-center">/</span>
                            <input type="number" name="AAAA" id="AAAA" placeholder="AAAA" class="w-20 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tél. :</label>
                        <input type="tel" name="tel" id="tel" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nom :</label>
                        <input type="text" name="nom" id="nom" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Adresse :</label>
                        <textarea name="addresse" id="addresse" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 h-20 resize-none"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email :</label>
                        <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>

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
                                    <input name="designation[]" type="text" class="designation w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" name="quantite[]" class="quantite w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input name="prix_unit[]" type="number" step="0.01" class="prix_unit w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                                </td>
                                <td class="border border-gray-300 px-4 py-3">
                                    <input type="number" name="total[]" step="0.01" class="total w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center bg-gray-50" readonly>
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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                <div class="space-y-6">
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

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Moyen de Livraison :</label>
                        <input type="text" name="delivery_method" id="delivery_method" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Numéro de suivie :</label>
                        <input type="text" name="tracking_number" id="tracking_number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NOTES :</label>
                        <textarea name="notes" id="notes" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 h-24 resize-none"></textarea>
                    </div>
                </div>

                <div class="space-y-4">
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

                    <div class="mt-6 space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Date :</label>
                                <input type="date" name="signature_date" id="signature_date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">À :</label>
                                <input type="text" name="signature_location" id="signature_location" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
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

            <div class="flex justify-center gap-4 mt-8">
                <button type="button" onclick="generatePDF()" class="px-8 py-3 bg-red-600 text-white text-lg font-semibold rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                     Générer PDF
                </button>
                <button type="button" onclick="exportJSON()" class="px-8 py-3 bg-blue-600 text-white text-lg font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Exporter JSON
                </button>
                <button type="submit" class="px-8 py-3 bg-green-600 text-white text-lg font-semibold rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Soumettre
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
                    <input name="designation[]" type="text" class="designation w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1">
                </td>
                <td class="border border-gray-300 px-4 py-3">
                    <input type="number" name="quantite[]" class="quantite w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                </td>
                <td class="border border-gray-300 px-4 py-3">
                    <input name="prix_unit[]" type="number" step="0.01" class="prix_unit w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center" onchange="calculateRow(this)">
                </td>
                <td class="border border-gray-300 px-4 py-3">
                    <input type="number" name="total[]" step="0.01" class="total w-full border-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded px-2 py-1 text-center bg-gray-50" readonly>
                </td>
            `;
        }

        function extractFormData() {
            const formData = {};


            formData.orderNumber = document.getElementById('N_commande').value;
            formData.date = {
                day: document.getElementById('JJ').value,
                month: document.getElementById('MM').value,
                year: document.getElementById('AAAA').value,
                formatted: `${document.getElementById('JJ').value}/${document.getElementById('MM').value}/${document.getElementById('AAAA').value}`
            };
            formData.phone = document.getElementById('tel').value;
            formData.name = document.getElementById('nom').value;
            formData.address = document.getElementById('addresse').value;
            formData.email = document.getElementById('email').value;


            formData.items = [];
            const rows = document.querySelectorAll('#itemsTable tr');
            rows.forEach(row => {
                const designation = row.querySelector('.designation').value;
                const quantity = row.querySelector('.quantite').value;
                const unitPrice = row.querySelector('.prix_unit').value;
                const total = row.querySelector('.total').value;

                if (designation || quantity || unitPrice) {
                    formData.items.push({
                        designation: designation,
                        quantity: parseFloat(quantity) || 0,
                        unitPrice: parseFloat(unitPrice) || 0,
                        total: parseFloat(total) || 0
                    });
                }
            });



            const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
            formData.paymentMethod = paymentMethod ? paymentMethod.value : '';


            formData.deliveryMethod = document.getElementById('delivery_method').value;
            formData.trackingNumber = document.getElementById('tracking_number').value;
            formData.notes = document.getElementById('notes').value;


            formData.financial = {
                subtotal: parseFloat(document.getElementById('subtotal').value) || 0,
                tva: parseFloat(document.getElementById('tva').value) || 0,
                promo: parseFloat(document.getElementById('promo').value) || 0,
                total: parseFloat(document.getElementById('total').value) || 0
            };


            formData.signature = {
                date: document.getElementById('signature_date').value,
                location: document.getElementById('signature_location').value
            };

            return formData;
        }

        function generatePDF() {
            const data = extractFormData();
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();


            doc.setFillColor(76, 85, 58);
            doc.rect(0, 0, 210, 25, 'F');


            doc.setTextColor(255, 255, 255);
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(16);


            doc.setDrawColor(255, 255, 255);
            doc.setLineWidth(0.8);
            doc.circle(25, 12, 4, 'S');


            const centerX = 25, centerY = 12, radius = 4;
            for (let i = 0; i < 8; i++) {
                const angle = (i * Math.PI) / 4;
                const x1 = centerX + (radius - 1) * Math.cos(angle);
                const y1 = centerY + (radius - 1) * Math.sin(angle);
                const x2 = centerX + radius * Math.cos(angle);
                const y2 = centerY + radius * Math.sin(angle);
                doc.line(x1, y1, x2, y2);
            }


            doc.text('CABINETHUB', 32, 16);


            doc.setFont('helvetica', 'normal');
            doc.setFontSize(10);
            doc.text('@REALLYGREATSITE', 210 - 20, 10, { align: 'right' });
            doc.text(`${data.phone}`, 210 - 20, 18, { align: 'right' });

            doc.setFillColor(240, 240, 240);
            doc.rect(0, 25, 210, 25, 'F');


            doc.setTextColor(118, 138, 93); image
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(28);
            doc.text('BON DE COMMANDE', 105, 42, { align: 'center' });
doc.setTextColor(0, 0, 0);
            doc.setFont('helvetica', 'normal');
            doc.setFontSize(12);
            let y = 65;

            doc.text(`Numéro de commande: ${data.orderNumber}`, 20, y);
            doc.text(`Date: ${data.date.formatted}`, 120, y);
            y += 10;

            doc.text(`Nom: ${data.name}`, 20, y);
            doc.text(`Téléphone: ${data.phone}`, 120, y);
            y += 10;

            doc.text(`Email: ${data.email}`, 20, y);
            y += 10;

            doc.text(`Adresse: ${data.address}`, 20, y);
            y += 20;


            const tableColumns = ['Désignation', 'Quantité', 'Prix Unit.', 'Total'];
            const tableRows = data.items.map(item => [
                item.designation,
                item.quantity.toString(),
                `€${item.unitPrice.toFixed(2)}`,
                `€${item.total.toFixed(2)}`
            ]);

            doc.autoTable({
                startY: y,
                head: [tableColumns],
                body: tableRows,
                theme: 'striped',
                headStyles: { fillColor: [66, 139, 202] }
            });

            y = doc.lastAutoTable.finalY + 20;


            doc.text(`Sous-total: €${data.financial.subtotal.toFixed(2)}`, 120, y);
            y += 8;
            doc.text(`TVA: €${data.financial.tva.toFixed(2)}`, 120, y);
            y += 8;
            doc.text(`Promo: €${data.financial.promo.toFixed(2)}`, 120, y);
            y += 8;
            doc.setFontSize(14);
            doc.setFont('helvetica', 'bold');
            doc.text(`Total: €${data.financial.total.toFixed(2)}`, 120, y);

            
            doc.setFontSize(12);
            doc.setFont('helvetica', 'normal');
            y += 20;

            if (data.paymentMethod) {
                doc.text(`Méthode de paiement: ${data.paymentMethod}`, 20, y);
                y += 8;
            }

            if (data.deliveryMethod) {
                doc.text(`Livraison: ${data.deliveryMethod}`, 20, y);
                y += 8;
            }

            if (data.trackingNumber) {
                doc.text(`Numéro de suivi: ${data.trackingNumber}`, 20, y);
                y += 8;
            }

            if (data.notes) {
                doc.text('Notes:', 20, y);
                y += 6;
                const splitText = doc.splitTextToSize(data.notes, 170);
                doc.text(splitText, 20, y);
                y += splitText.length * 5;
            }
            y += 20;
            doc.text(`Date: ${data.signature.date}`, 20, y);
            doc.text(`Lieu: ${data.signature.location}`, 120, y);
            y += 20;
            doc.text('Signature:', 20, y);
            doc.rect(20, y + 5, 80, 30);

            const filename = `commande_${data.orderNumber || 'new'}_${new Date().toISOString().split('T')[0]}.pdf`;
            doc.save(filename);
        }

        function exportJSON() {
            const data = extractFormData();
            const jsonString = JSON.stringify(data, null, 2);

            const blob = new Blob([jsonString], { type: 'application/json' });
            const url = URL.createObjectURL(blob);

            const a = document.createElement('a');
            a.href = url;
            a.download = `order_data_${new Date().toISOString().split('T')[0]}.json`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);

            URL.revokeObjectURL(url);
        }


        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();


            const dateInputs = document.querySelectorAll('input[type="date"]');
            dateInputs.forEach(input => {
                if (!input.value) input.value = today.toISOString().split('T')[0];
            });


            document.getElementById('JJ').value = today.getDate().toString().padStart(2, '0');
            document.getElementById('MM').value = (today.getMonth() + 1).toString().padStart(2, '0');
            document.getElementById('AAAA').value = today.getFullYear();
        });


        document.getElementById('orderForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const data = extractFormData();
            console.log('Form Data:', data);
            alert('Données du formulaire extraites! Consultez la console pour voir les données.');
        });
    </script>
</body>
</html>
