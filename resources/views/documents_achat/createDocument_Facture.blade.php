@extends('layouts.app2')
@section('content')
<body class="bg-gray-50 p-8 ">
    <div class="max-w-4xl mx-auto bg-white mt-20 p-12 rounded-lg shadow-lg">

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
       function generateExactInvoicePDF() {
    const data = extractInvoiceData();
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    const black = [0, 0, 0];
    const gray700 = [55, 65, 81];
    const gray600 = [75, 85, 99];
    const gray300 = [209, 213, 219];
    const gray200 = [229, 231, 235];

    doc.setFont('helvetica', 'bold');
    doc.setFontSize(39);
    doc.setTextColor(...black);
    doc.text('CABINETHUB', 20, 25);

    doc.setFont('helvetica', 'normal');
    doc.setFontSize(11);
    doc.setTextColor(...gray600);
    doc.text('#', 175, 20);
    doc.text(data.invoiceNumber, 180, 20);

    let y = 50;


    doc.setFont('helvetica', 'bold');
    doc.setFontSize(9);
    doc.setTextColor(...gray700);
    doc.text('FACTURÉ À :', 20, y);
    y += 8;


    doc.setFont('helvetica', 'normal');
    doc.setTextColor(...gray600);
    doc.text(data.billedTo, 20, y);
    doc.setDrawColor(...gray300);
    doc.setLineWidth(0.5);
    doc.line(20, y + 2, 95, y + 2);
    y += 20;

    doc.setFont('helvetica', 'bold');
    doc.setTextColor(...gray700);
    doc.text('PAYER À :', 20, y);
    y += 8;

    doc.setFont('helvetica', 'normal');
    doc.setTextColor(...gray600);
    doc.text('CabinetHub', 20, y);
    doc.line(20, y + 2, 95, y + 2);
    y += 10;

    doc.text(data.paymentAddress.line1, 20, y);
    doc.line(20, y + 2, 95, y + 2);
    y += 10;

    doc.text(data.paymentAddress.line2, 20, y);
    doc.line(20, y + 2, 95, y + 2);

    y = 50;
    const col1X = 110;
    const col2X = 155;
    doc.setFont('helvetica', 'normal');
    doc.setFontSize(9);
    doc.setTextColor(...gray600);
    doc.text('Banque', col1X, y);
    doc.text('nom du compte', col2X, y);
    y += 8;

    doc.setTextColor(...gray600);
    doc.text(data.bankDetails.bank, col1X, y);
    doc.line(col1X, y + 2, col1X + 40, y + 2);
    doc.text(data.bankDetails.account, col2X, y);
    doc.line(col2X, y + 2, col2X + 35, y + 2);
    y += 20;


    doc.setTextColor(...gray600);
    doc.text('BSB', col1X, y);
    doc.text('nombre du compte', col2X, y);
    y += 8;

    doc.text(data.bankDetails.bsb, col1X, y);
    doc.line(col1X, y + 2, col1X + 25, y + 2);
    doc.text(data.bankDetails.accountNumber, col2X, y);
    doc.line(col2X, y + 2, col2X + 30, y + 2);

    y = 130;
    doc.setFont('helvetica', 'bold');
    doc.setFontSize(10);
    doc.setTextColor(...black);
    doc.text('DESCRIPTION', 20, y);
    doc.text('TAUX', 115, y, { align: 'center' });
    doc.text('HEURES', 145, y, { align: 'center' });
    doc.text('MONTANT', 175, y, { align: 'right' });

    doc.setDrawColor(...black);
    doc.setLineWidth(1);
    doc.line(20, y + 4, 190, y + 4);
    y += 15;

    doc.setFont('helvetica', 'normal');
    doc.setFontSize(10);
    data.services.forEach((service, index) => {
        doc.setTextColor(...black);
        doc.text(service.description, 20, y);
        doc.setTextColor(...gray600);
        doc.text(service.rate, 115, y, { align: 'center' });
        doc.text(service.hours.toString(), 145, y, { align: 'center' });
        doc.text(service.amount, 175, y, { align: 'right' });
        doc.setDrawColor(...gray200);
        doc.setLineWidth(0.5);
        doc.line(20, y + 4, 190, y + 4);

        y += 15;
    });

    y += 35;
    const summaryStartX = 120;
    const summaryEndX = 190;
    doc.setFont('helvetica', 'normal');
    doc.setFontSize(10);
    doc.setTextColor(...gray700);
    doc.text('Sub Total', summaryStartX, y);
    doc.setFont('helvetica', 'bold');
    doc.setTextColor(...black);
    doc.text(data.financial.subtotal, summaryEndX, y, { align: 'right' });
    doc.setDrawColor(...gray200);
    doc.setLineWidth(0.5);
    doc.line(summaryStartX, y + 4, summaryEndX, y + 4);
    y += 15;
    doc.setFont('helvetica', 'normal');
    doc.setTextColor(...gray700);
    doc.text(`Package Discount (${data.financial.discountPercent}%)`, summaryStartX, y);
    doc.setFont('helvetica', 'bold');
    doc.setTextColor(...black);
    doc.text(data.financial.discountAmount, summaryEndX, y, { align: 'right' });
    doc.setDrawColor(...gray200);
    doc.setLineWidth(0.5);
    doc.line(summaryStartX, y + 4, summaryEndX, y + 4);
    y += 15;
    doc.setFont('helvetica', 'bold');
    doc.setFontSize(14);
    doc.setTextColor(...black);
    doc.text('TOTAL', summaryStartX, y);
    doc.text(data.financial.total, summaryEndX, y, { align: 'right' });
    doc.setDrawColor(...black);
    doc.setLineWidth(1);
    doc.line(summaryStartX, y + 4, summaryEndX, y + 4);
    y += 25;
    doc.setDrawColor(...gray200);
    doc.setLineWidth(0.5);
    doc.line(20, y, 190, y);
    y += 10;
    doc.setFont('helvetica', 'normal');
    doc.setFontSize(9);
    doc.setTextColor(...gray600);

    const footerText1 = "Le paiement est requis dans un délai de 14 jours ouvrables à compter de la date de la facture. Veuillez envoyer le paiement à";
    const footerText2 = "hello@reallygreatsite.com.";
    const footerText3 = "Merci pour votre confiance.";

    const splitText1 = doc.splitTextToSize(footerText1, 170);
    doc.text(splitText1, 20, y);
    y += splitText1.length * 4 + 2;
    doc.setTextColor(37, 99, 235);
    doc.text(footerText2, 20, y);
    y += 6;

    doc.setTextColor(...gray600);
    doc.text(footerText3, 20, y);
    const filename = `facture_${data.invoiceNumber}_${new Date().toISOString().split('T')[0]}.pdf`;
    doc.save(filename);
}

function extractInvoiceData() {
    const invoiceNumberElement = document.querySelector('input[value="1024"]');
    const invoiceNumber = invoiceNumberElement?.value || '1024';
    const billedToElement = document.querySelector('input[placeholder="une certaine entreprise"]');
    const billedTo = billedToElement?.value || 'une certaine entreprise';
    const services = [];
    const serviceRows = document.querySelectorAll('#servicesTable tr');

    serviceRows.forEach(row => {
        const cells = row.querySelectorAll('td');
        if (cells.length >= 4) {
            const descInput = cells[0]?.querySelector('input');
            const rateInput = cells[1]?.querySelector('input');
            const hoursInput = cells[2]?.querySelector('input');
            const amountInput = cells[3]?.querySelector('input');

            const description = descInput?.value?.trim();
            if (description) {
                services.push({
                    description: description,
                    rate: rateInput?.value || '$50/hr',
                    hours: parseInt(hoursInput?.value) || 0,
                    amount: amountInput?.value || '$0.00'
                });
            }
        }
    });
    const subtotal = document.getElementById('subtotal')?.textContent || '$1,250.00';
    const discountAmount = document.getElementById('discountAmount')?.textContent || '$375.00';
    const discountPercent = document.getElementById('discountPercent')?.value || '30';
    const total = document.getElementById('finalTotal')?.textContent || '$875.00';
    const paymentAddress = {
        line1: document.querySelector('input[placeholder="123 Anywhere St., Any City"]')?.value || '123 Anywhere St., Any City',
        line2: document.querySelector('input[placeholder="123 456 7890 (adresse)"]')?.value || '123 456 7890 (adresse)'
    };
    const bankDetails = {
        bank: document.querySelector('input[placeholder="quelque banque"]')?.value || 'quelque banque',
        account: document.querySelector('input[placeholder="CabinetHubCompte"]')?.value || 'CabinetHubCompte',
        bsb: document.querySelector('input[placeholder="000 000"]')?.value || '000 000',
        accountNumber: document.querySelector('input[placeholder="0000 0000"]')?.value || '0000 0000'
    };

    return {
        invoiceNumber,
        billedTo,
        services,
        financial: {
            subtotal,
            discountPercent,
            discountAmount,
            total
        },
        paymentAddress,
        bankDetails
    };
}
function addExactPDFButton() {
    const buttonContainer = document.querySelector('.mt-12.flex.justify-center.space-x-4');

    if (buttonContainer && !document.querySelector('#exactPdfButton')) {
        const pdfButton = document.createElement('button');
        pdfButton.id = 'exactPdfButton';
        pdfButton.type = 'button';
        pdfButton.className = 'px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500';
        pdfButton.textContent = 'Télécharger PDF';
        pdfButton.onclick = generateExactInvoicePDF;

        buttonContainer.appendChild(pdfButton);
    }
}
document.addEventListener('DOMContentLoaded', addExactPDFButton);
        function calculateRow(element) {
            const row = element.closest('tr');
            const rateInput = row.cells[1].querySelector('input');
            const hoursInput = row.cells[2].querySelector('input');
            const amountInput = row.cells[3].querySelector('input');
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
