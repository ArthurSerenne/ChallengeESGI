// import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';
import Chart from 'chart.js/auto';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');


// start: Chart
new Chart(document.getElementById('order-chart'), {
    type: 'line',
    data: {
        labels: generateNDays(7),
        datasets: [
            {
                label: 'Active',
                data: generateRandomData(7),
                borderWidth: 1,
                fill: true,
                pointBackgroundColor: 'rgb(59, 130, 246)',
                borderColor: 'rgb(59, 130, 246)',
                backgroundColor: 'rgb(59 130 246 / .05)',
                tension: .2
            },
            {
                label: 'Completed',
                data: generateRandomData(7),
                borderWidth: 1,
                fill: true,
                pointBackgroundColor: 'rgb(16, 185, 129)',
                borderColor: 'rgb(16, 185, 129)',
                backgroundColor: 'rgb(16 185 129 / .05)',
                tension: .2
            },
            {
                label: 'Canceled',
                data: generateRandomData(7),
                borderWidth: 1,
                fill: true,
                pointBackgroundColor: 'rgb(244, 63, 94)',
                borderColor: 'rgb(244, 63, 94)',
                backgroundColor: 'rgb(244 63 94 / .05)',
                tension: .2
            },
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

function generateNDays(n) {
    const data = []
    for(let i=0; i<n; i++) {
        const date = new Date()
        date.setDate(date.getDate()-i)
        data.push(date.toLocaleString('en-US', {
            month: 'short',
            day: 'numeric'
        }))
    }
    return data
}
function generateRandomData(n) {
    const data = []
    for(let i=0; i<n; i++) {
        data.push(Math.round(Math.random() * 10))
    }
    return data
}
// end: Chart

// Ajout des lignes de devis

        const tvaRate = 0.20; // 20% 
        const remiseRate = 0.15; // 15% à partir de 1000€

        function updateDevisTotals() {
            let totalHT = 0;
            let totalTTC = 0;

            document.querySelectorAll('#lignesDevis tr').forEach(function(row) {
                const prixHTField = row.querySelector('input[name$="[prix_ht]"]');
                const prixTTCField = row.querySelector('input[name$="[prix_ttc]"]');
                const quantiteField = row.querySelector('input[name$="[quantite]"]');
                if (prixHTField && prixTTCField && quantiteField) {
                    const prixHT = parseFloat(prixHTField.value) || 0;
                    const prixTTC = parseFloat(prixTTCField.value) || 0;
                    totalHT += prixHT;
                    totalTTC += prixTTC;
                }
            });

            const totalTVA = totalTTC - (totalHT);

            let remise = 0;
            if (totalHT > 1000) {
                remise = totalHT * remiseRate;
                totalTTC -= remise;
            }

            document.querySelector('input[name$="[total_ht]"]').value = totalHT.toFixed(2);
            document.querySelector('input[name$="[total_ttc]"]').value = totalTTC.toFixed(2);
            document.querySelector('input[name$="[total_tva]"]').value = totalTVA.toFixed(2);
            document.querySelector('input[name$="[remise]"]').value = remise.toFixed(2);
        }

        document.getElementById('add-ligne').addEventListener('click', function() {
            const collectionHolder = document.querySelector('#lignesDevis');
            const prototype = collectionHolder.dataset.prototype;
            const newIndex = collectionHolder.children.length;
            const newForm = prototype.replace(/__name__/g, newIndex);

            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = newForm;
            
            const newRow = document.createElement('tr');

            const produitField = tempDiv.querySelector('select');           
            const quantiteField = tempDiv.querySelector('input[name$="[quantite]"]');
            const prixHTField = tempDiv.querySelector('input[name$="[prix_ht]"]');
            const prixTTCField = tempDiv.querySelector('input[name$="[prix_ttc]"]');

            if (produitField && quantiteField && prixHTField && prixTTCField) {
                newRow.innerHTML = `
                    <td class="border-y border-black p-4 text-left">${produitField.outerHTML}</td>
                    <td class="border-y border-black p-4 text-left">${quantiteField.outerHTML}</td>
                    <td class="border-y border-black p-4 text-left">${prixHTField.outerHTML}</td>
                    <td class="border-y border-black p-4 text-left">${prixTTCField.outerHTML}</td>
                `;
                collectionHolder.appendChild(newRow);

                const newProduitField = newRow.querySelector('select');
                const newQuantiteField = newRow.querySelector('input[name$="[quantite]"]');
                const newPrixHTField = newRow.querySelector('input[name$="[prix_ht]"]');
                const newPrixTTCField = newRow.querySelector('input[name$="[prix_ttc]"]');

                // Function to update prices
                const updatePrices = () => {
                    const selectedOption = newProduitField.selectedOptions[0];
                    const prixUnitaireHT = parseFloat(selectedOption.getAttribute('data-prix-ht')) || 0;
                    const quantite = parseInt(newQuantiteField.value) || 0;
                    const prixTotalHT = prixUnitaireHT * quantite;
                    const prixTotalTTC = prixTotalHT * (1 + tvaRate);
                    newPrixHTField.value = prixTotalHT.toFixed(2);
                    newPrixTTCField.value = prixTotalTTC.toFixed(2);
                    updateDevisTotals();
                };

                // Attach event listeners
                newProduitField.addEventListener('change', updatePrices);
                newQuantiteField.addEventListener('input', updatePrices);
            } else {
                console.error('Unable to find one or more fields in the prototype');
                if (!produitField) console.error('Produit field not found');
                if (!quantiteField) console.error('Quantite field not found');
                if (!prixHTField) console.error('Prix HT field not found');
                if (!prixTTCField) console.error('Prix TTC field not found');
            }
        });

        // Attach event to existing product fields
        document.querySelectorAll('select[name$="[produit]"], input[name$="[quantite]"]').forEach(function(field) {
            field.addEventListener('change', updateDevisTotals);
            field.addEventListener('input', updateDevisTotals);
        });

        // Initial calculation of totals
        updateDevisTotals();

// document.getElementById('add-ligne').addEventListener('click', function() {
//     const collectionHolder = document.querySelector('#lignesDevis');
//     const prototype = collectionHolder.dataset.prototype;
//     const newIndex = collectionHolder.children.length;
//     const newForm = prototype.replace(/__name__/g, newIndex);
//     const item = document.createElement('li');
//     item.innerHTML = newForm;
//     collectionHolder.appendChild(item);
// });