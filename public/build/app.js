"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.concat.js */ "./node_modules/core-js/modules/es.array.concat.js");
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_number_to_fixed_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.number.to-fixed.js */ "./node_modules/core-js/modules/es.number.to-fixed.js");
/* harmony import */ var core_js_modules_es_number_to_fixed_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_number_to_fixed_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_parse_float_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.parse-float.js */ "./node_modules/core-js/modules/es.parse-float.js");
/* harmony import */ var core_js_modules_es_parse_float_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_parse_float_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_parse_int_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.parse-int.js */ "./node_modules/core-js/modules/es.parse-int.js");
/* harmony import */ var core_js_modules_es_parse_int_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_parse_int_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/es.string.replace.js */ "./node_modules/core-js/modules/es.string.replace.js");
/* harmony import */ var core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _styles_app_css__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./styles/app.css */ "./assets/styles/app.css");
/* harmony import */ var chart_js_auto__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! chart.js/auto */ "./node_modules/chart.js/auto/auto.js");









// import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */



// Navigation Active 

// DarkMode
document.addEventListener('DOMContentLoaded', function () {
  var themeToggle = document.getElementById('theme-toggle');
  var rootElement = document.documentElement;
  var darkModeClass = 'dark';
  var toggleIcon = themeToggle.querySelector('span');
  var sunIcon = themeToggle.querySelector('.fa-sun');
  var moonIcon = themeToggle.querySelector('.fa-moon');

  // Initialiser le thème en fonction des préférences utilisateur
  if (localStorage.getItem('theme') === 'dark' || !('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    rootElement.classList.add(darkModeClass);
    toggleIcon.classList.add('translate-x-6');
    sunIcon.classList.add('hidden');
    sunIcon.classList.remove('block');
    moonIcon.classList.remove('hidden');
    moonIcon.classList.add('block');
  } else {
    rootElement.classList.remove(darkModeClass);
    toggleIcon.classList.remove('translate-x-6');
    sunIcon.classList.remove('hidden');
    sunIcon.classList.add('block');
    moonIcon.classList.add('hidden');
    moonIcon.classList.remove('block');
  }
  themeToggle.addEventListener('click', function () {
    if (rootElement.classList.contains(darkModeClass)) {
      rootElement.classList.remove(darkModeClass);
      localStorage.setItem('theme', 'light');
      toggleIcon.classList.remove('translate-x-6');
      sunIcon.classList.remove('hidden');
      sunIcon.classList.add('block');
      moonIcon.classList.add('hidden');
      moonIcon.classList.remove('block');
    } else {
      rootElement.classList.add(darkModeClass);
      localStorage.setItem('theme', 'dark');
      toggleIcon.classList.add('translate-x-6');
      sunIcon.classList.add('hidden');
      sunIcon.classList.remove('block');
      moonIcon.classList.remove('hidden');
      moonIcon.classList.add('block');
    }
  });
});

// start: Chart
var labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
var labels2 = ['Factures', 'Devis'];
new chart_js_auto__WEBPACK_IMPORTED_MODULE_10__["default"](document.getElementById('line-chart'), {
  type: 'line',
  data: {
    labels: labels,
    datasets: [{
      label: 'My First Dataset',
      data: [65, 59, 80, 81, 56, 55, 40],
      fill: false,
      borderColor: 'rgb(75, 192, 192)',
      tension: 0.1
    }]
  },
  options: {
    scales: {
      x: {
        beginAtZero: true
      },
      y: {
        beginAtZero: true
      }
    }
  }
});

// new Chart(document.getElementById('pie-chart'), {
//     type: 'pie',
//     data: {
//         labels: labels2,
//         datasets: [{
//             label: 'My First Dataset',
//             data: [65, 35],
//             fill: false,
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 0.2)',
//             ],
//             borderColor: [
//                 'rgba(255, 99, 132, 1)',
//                 'rgba(54, 162, 235, 1)',
//                 'rgba(255, 206, 86, 1)',
//             ],
//             tension: 0.1
//         }]
//     },
//     options: {
//         scales: {
//             x: {
//                 beginAtZero: true
//             },
//             y: {
//                 beginAtZero: true
//             }
//         }
//     } 
// });

// new Chart(document.getElementById('bar-chart'), {
//     type: 'bar',
//     data: {
//         labels: labels,
//         datasets: [{
//             label: 'My First Dataset',
//             data: [65, 59, 80, 81, 56, 55, 40, 15, 37, 98, 44, 56],
//             fill: false,
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(255, 159, 64, 0.2)',
//                 'rgba(255, 205, 86, 0.2)',
//                 'rgba(75, 192, 192, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(153, 102, 255, 0.2)',
//                 'rgba(201, 203, 207, 0.2)'
//               ],
//               borderColor: [
//                 'rgb(255, 99, 132)',
//                 'rgb(255, 159, 64)',
//                 'rgb(255, 205, 86)',
//                 'rgb(75, 192, 192)',
//                 'rgb(54, 162, 235)',
//                 'rgb(153, 102, 255)',
//                 'rgb(201, 203, 207)'
//               ],
//             tension: 0.1
//         }]
//     },
//     options: {
//         scales: {
//             x: {
//                 beginAtZero: true
//             },
//             y: {
//                 beginAtZero: true
//             }
//         }
//     } 
// });

// function generateNDays(n) {
//     const data = []
//     for(let i=0; i<n; i++) {
//         const date = new Date()
//         date.setDate(date.getDate()-i)
//         data.push(date.toLocaleString('en-US', {
//             month: 'short',
//             day: 'numeric'
//         }))
//     }
//     return data
// }
// function generateRandomData(n) {
//     const data = []
//     for(let i=0; i<n; i++) {
//         data.push(Math.round(Math.random() * 10))
//     }
//     return data
// }
// end: Chart

// Ajout des lignes de devis

var tvaRate = 0.20; // 20% 
var remiseRate = 0.15; // 15% à partir de 1000€

function updateDevisTotals() {
  var totalHT = 0;
  var totalTTC = 0;
  document.querySelectorAll('#lignesDevis tr').forEach(function (row) {
    var prixHTField = row.querySelector('input[name$="[prix_ht]"]');
    var prixTTCField = row.querySelector('input[name$="[prix_ttc]"]');
    var quantiteField = row.querySelector('input[name$="[quantite]"]');
    if (prixHTField && prixTTCField && quantiteField) {
      var prixHT = parseFloat(prixHTField.value) || 0;
      var prixTTC = parseFloat(prixTTCField.value) || 0;
      totalHT += prixHT;
      totalTTC += prixTTC;
    }
  });
  var totalTVA = totalTTC - totalHT;
  var remise = 0;
  if (totalHT > 1000) {
    remise = totalHT * remiseRate;
    totalTTC -= remise;
  }
  document.querySelector('input[name$="[total_ht]"]').value = totalHT.toFixed(2);
  document.querySelector('input[name$="[total_ttc]"]').value = totalTTC.toFixed(2);
  document.querySelector('input[name$="[total_tva]"]').value = totalTVA.toFixed(2);
  document.querySelector('input[name$="[remise]"]').value = remise.toFixed(2);
}
document.getElementById('add-ligne').addEventListener('click', function () {
  var collectionHolder = document.querySelector('#lignesDevis');
  var prototype = collectionHolder.dataset.prototype;
  var newIndex = collectionHolder.children.length;
  var newForm = prototype.replace(/__name__/g, newIndex);
  var tempDiv = document.createElement('div');
  tempDiv.innerHTML = newForm;
  var newRow = document.createElement('tr');
  var produitField = tempDiv.querySelector('select');
  var quantiteField = tempDiv.querySelector('input[name$="[quantite]"]');
  var prixHTField = tempDiv.querySelector('input[name$="[prix_ht]"]');
  var prixTTCField = tempDiv.querySelector('input[name$="[prix_ttc]"]');
  if (produitField && quantiteField && prixHTField && prixTTCField) {
    newRow.innerHTML = "\n            <td class=\"border-y border-black p-4 text-left\">".concat(produitField.outerHTML, "</td>\n            <td class=\"border-y border-black p-4 text-left\">").concat(quantiteField.outerHTML, "</td>\n            <td class=\"border-y border-black p-4 text-left\">").concat(prixHTField.outerHTML, "</td>\n            <td class=\"border-y border-black p-4 text-left\">").concat(prixTTCField.outerHTML, "</td>\n        ");
    collectionHolder.appendChild(newRow);
    var newProduitField = newRow.querySelector('select');
    var newQuantiteField = newRow.querySelector('input[name$="[quantite]"]');
    var newPrixHTField = newRow.querySelector('input[name$="[prix_ht]"]');
    var newPrixTTCField = newRow.querySelector('input[name$="[prix_ttc]"]');

    // Function to update prices
    var updatePrices = function updatePrices() {
      var selectedOption = newProduitField.selectedOptions[0];
      var prixUnitaireHT = parseFloat(selectedOption.getAttribute('data-prix-ht')) || 0;
      var quantite = parseInt(newQuantiteField.value) || 0;
      var prixTotalHT = prixUnitaireHT * quantite;
      var prixTotalTTC = prixTotalHT * (1 + tvaRate);
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
document.querySelectorAll('select[name$="[produit]"], input[name$="[quantite]"]').forEach(function (field) {
  field.addEventListener('change', updateDevisTotals);
  field.addEventListener('input', updateDevisTotals);
});

// Initial calculation of totals
updateDevisTotals();

/***/ }),

/***/ "./assets/styles/app.css":
/*!*******************************!*\
  !*** ./assets/styles/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_modules_es_array_concat_js-node_modules_core-js_modules_es_array-ee365a","assets_styles_app_css-assets_styles_app_css-assets_styles_app_css"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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eUJBQXlCLENBQUM7SUFDM0QsSUFBSSxDQUFDdEMsYUFBYSxFQUFFcUMsT0FBTyxDQUFDQyxLQUFLLENBQUMsMEJBQTBCLENBQUM7SUFDN0QsSUFBSSxDQUFDeEMsV0FBVyxFQUFFdUMsT0FBTyxDQUFDQyxLQUFLLENBQUMseUJBQXlCLENBQUM7SUFDMUQsSUFBSSxDQUFDdkMsWUFBWSxFQUFFc0MsT0FBTyxDQUFDQyxLQUFLLENBQUMsMEJBQTBCLENBQUM7RUFDaEU7QUFDSixDQUFDLENBQUM7O0FBRUY7QUFDQW5GLFFBQVEsQ0FBQ3dDLGdCQUFnQixDQUFDLHNEQUFzRCxDQUFDLENBQUNDLE9BQU8sQ0FBQyxVQUFTMkMsS0FBSyxFQUFFO0VBQ3RHQSxLQUFLLENBQUNuRixnQkFBZ0IsQ0FBQyxRQUFRLEVBQUVvQyxpQkFBaUIsQ0FBQztFQUNuRCtDLEtBQUssQ0FBQ25GLGdCQUFnQixDQUFDLE9BQU8sRUFBRW9DLGlCQUFpQixDQUFDO0FBQ3RELENBQUMsQ0FBQzs7QUFFRjtBQUNBQSxpQkFBaUIsQ0FBQyxDQUFDOzs7Ozs7Ozs7OztBQ3hSbkIiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zdHlsZXMvYXBwLmNzcz82YmU2Il0sInNvdXJjZXNDb250ZW50IjpbIi8vIGltcG9ydCAnLi9ib290c3RyYXAuanMnO1xyXG4vKlxyXG4gKiBXZWxjb21lIHRvIHlvdXIgYXBwJ3MgbWFpbiBKYXZhU2NyaXB0IGZpbGUhXHJcbiAqXHJcbiAqIFRoaXMgZmlsZSB3aWxsIGJlIGluY2x1ZGVkIG9udG8gdGhlIHBhZ2UgdmlhIHRoZSBpbXBvcnRtYXAoKSBUd2lnIGZ1bmN0aW9uLFxyXG4gKiB3aGljaCBzaG91bGQgYWxyZWFkeSBiZSBpbiB5b3VyIGJhc2UuaHRtbC50d2lnLlxyXG4gKi9cclxuaW1wb3J0ICcuL3N0eWxlcy9hcHAuY3NzJztcclxuaW1wb3J0IENoYXJ0IGZyb20gJ2NoYXJ0LmpzL2F1dG8nO1xyXG5cclxuLy8gTmF2aWdhdGlvbiBBY3RpdmUgXHJcblxyXG5cclxuLy8gRGFya01vZGVcclxuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignRE9NQ29udGVudExvYWRlZCcsIGZ1bmN0aW9uKCkge1xyXG5jb25zdCB0aGVtZVRvZ2dsZSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0aGVtZS10b2dnbGUnKTtcclxuY29uc3Qgcm9vdEVsZW1lbnQgPSBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQ7XHJcbmNvbnN0IGRhcmtNb2RlQ2xhc3MgPSAnZGFyayc7XHJcbmNvbnN0IHRvZ2dsZUljb24gPSB0aGVtZVRvZ2dsZS5xdWVyeVNlbGVjdG9yKCdzcGFuJyk7XHJcbmNvbnN0IHN1bkljb24gPSB0aGVtZVRvZ2dsZS5xdWVyeVNlbGVjdG9yKCcuZmEtc3VuJyk7XHJcbmNvbnN0IG1vb25JY29uID0gdGhlbWVUb2dnbGUucXVlcnlTZWxlY3RvcignLmZhLW1vb24nKTtcclxuXHJcbi8vIEluaXRpYWxpc2VyIGxlIHRow6htZSBlbiBmb25jdGlvbiBkZXMgcHLDqWbDqXJlbmNlcyB1dGlsaXNhdGV1clxyXG5pZiAobG9jYWxTdG9yYWdlLmdldEl0ZW0oJ3RoZW1lJykgPT09ICdkYXJrJyB8fCBcclxuICAgICghKCd0aGVtZScgaW4gbG9jYWxTdG9yYWdlKSAmJiB3aW5kb3cubWF0Y2hNZWRpYSgnKHByZWZlcnMtY29sb3Itc2NoZW1lOiBkYXJrKScpLm1hdGNoZXMpKSB7XHJcbiAgICByb290RWxlbWVudC5jbGFzc0xpc3QuYWRkKGRhcmtNb2RlQ2xhc3MpO1xyXG4gICAgdG9nZ2xlSWNvbi5jbGFzc0xpc3QuYWRkKCd0cmFuc2xhdGUteC02Jyk7XHJcbiAgICBzdW5JY29uLmNsYXNzTGlzdC5hZGQoJ2hpZGRlbicpO1xyXG4gICAgc3VuSWNvbi5jbGFzc0xpc3QucmVtb3ZlKCdibG9jaycpO1xyXG4gICAgbW9vbkljb24uY2xhc3NMaXN0LnJlbW92ZSgnaGlkZGVuJyk7XHJcbiAgICBtb29uSWNvbi5jbGFzc0xpc3QuYWRkKCdibG9jaycpO1xyXG59IGVsc2Uge1xyXG4gICAgcm9vdEVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZShkYXJrTW9kZUNsYXNzKTtcclxuICAgIHRvZ2dsZUljb24uY2xhc3NMaXN0LnJlbW92ZSgndHJhbnNsYXRlLXgtNicpO1xyXG4gICAgc3VuSWNvbi5jbGFzc0xpc3QucmVtb3ZlKCdoaWRkZW4nKTtcclxuICAgIHN1bkljb24uY2xhc3NMaXN0LmFkZCgnYmxvY2snKTtcclxuICAgIG1vb25JY29uLmNsYXNzTGlzdC5hZGQoJ2hpZGRlbicpO1xyXG4gICAgbW9vbkljb24uY2xhc3NMaXN0LnJlbW92ZSgnYmxvY2snKTtcclxufVxyXG5cclxudGhlbWVUb2dnbGUuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbigpIHtcclxuICAgIGlmIChyb290RWxlbWVudC5jbGFzc0xpc3QuY29udGFpbnMoZGFya01vZGVDbGFzcykpIHtcclxuICAgIHJvb3RFbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoZGFya01vZGVDbGFzcyk7XHJcbiAgICBsb2NhbFN0b3JhZ2Uuc2V0SXRlbSgndGhlbWUnLCAnbGlnaHQnKTtcclxuICAgIHRvZ2dsZUljb24uY2xhc3NMaXN0LnJlbW92ZSgndHJhbnNsYXRlLXgtNicpO1xyXG4gICAgc3VuSWNvbi5jbGFzc0xpc3QucmVtb3ZlKCdoaWRkZW4nKTtcclxuICAgIHN1bkljb24uY2xhc3NMaXN0LmFkZCgnYmxvY2snKTtcclxuICAgIG1vb25JY29uLmNsYXNzTGlzdC5hZGQoJ2hpZGRlbicpO1xyXG4gICAgbW9vbkljb24uY2xhc3NMaXN0LnJlbW92ZSgnYmxvY2snKTtcclxuICAgIH0gZWxzZSB7XHJcbiAgICByb290RWxlbWVudC5jbGFzc0xpc3QuYWRkKGRhcmtNb2RlQ2xhc3MpO1xyXG4gICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oJ3RoZW1lJywgJ2RhcmsnKTtcclxuICAgIHRvZ2dsZUljb24uY2xhc3NMaXN0LmFkZCgndHJhbnNsYXRlLXgtNicpO1xyXG4gICAgc3VuSWNvbi5jbGFzc0xpc3QuYWRkKCdoaWRkZW4nKTtcclxuICAgIHN1bkljb24uY2xhc3NMaXN0LnJlbW92ZSgnYmxvY2snKTtcclxuICAgIG1vb25JY29uLmNsYXNzTGlzdC5yZW1vdmUoJ2hpZGRlbicpO1xyXG4gICAgbW9vbkljb24uY2xhc3NMaXN0LmFkZCgnYmxvY2snKTtcclxuICAgIH1cclxufSk7XHJcbn0pO1xyXG5cclxuLy8gc3RhcnQ6IENoYXJ0XHJcbmNvbnN0IGxhYmVscyA9IFsnSmFudWFyeScsICdGZWJydWFyeScsICdNYXJjaCcsICdBcHJpbCcsICdNYXknLCAnSnVuZScsICdKdWx5JywgJ0F1Z3VzdCcsICdTZXB0ZW1iZXInLCAnT2N0b2JlcicsICdOb3ZlbWJlcicsICdEZWNlbWJlciddO1xyXG5jb25zdCBsYWJlbHMyID0gWydGYWN0dXJlcycsICdEZXZpcyddO1xyXG5cclxubmV3IENoYXJ0KGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdsaW5lLWNoYXJ0JyksIHtcclxuICAgIHR5cGU6ICdsaW5lJyxcclxuICAgIGRhdGE6IHtcclxuICAgICAgICBsYWJlbHM6IGxhYmVscyxcclxuICAgICAgICBkYXRhc2V0czogW3tcclxuICAgICAgICAgIGxhYmVsOiAnTXkgRmlyc3QgRGF0YXNldCcsXHJcbiAgICAgICAgICBkYXRhOiBbNjUsIDU5LCA4MCwgODEsIDU2LCA1NSwgNDBdLFxyXG4gICAgICAgICAgZmlsbDogZmFsc2UsXHJcbiAgICAgICAgICBib3JkZXJDb2xvcjogJ3JnYig3NSwgMTkyLCAxOTIpJyxcclxuICAgICAgICAgIHRlbnNpb246IDAuMVxyXG4gICAgICAgIH1dXHJcbiAgICAgIH0sXHJcbiAgICAgIG9wdGlvbnM6IHtcclxuICAgICAgICBzY2FsZXM6IHtcclxuICAgICAgICAgICAgeDoge1xyXG4gICAgICAgICAgICAgICAgYmVnaW5BdFplcm86IHRydWVcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgeToge1xyXG4gICAgICAgICAgICAgICAgYmVnaW5BdFplcm86IHRydWVcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgIH0gXHJcbn0pO1xyXG5cclxuLy8gbmV3IENoYXJ0KGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdwaWUtY2hhcnQnKSwge1xyXG4vLyAgICAgdHlwZTogJ3BpZScsXHJcbi8vICAgICBkYXRhOiB7XHJcbi8vICAgICAgICAgbGFiZWxzOiBsYWJlbHMyLFxyXG4vLyAgICAgICAgIGRhdGFzZXRzOiBbe1xyXG4vLyAgICAgICAgICAgICBsYWJlbDogJ015IEZpcnN0IERhdGFzZXQnLFxyXG4vLyAgICAgICAgICAgICBkYXRhOiBbNjUsIDM1XSxcclxuLy8gICAgICAgICAgICAgZmlsbDogZmFsc2UsXHJcbi8vICAgICAgICAgICAgIGJhY2tncm91bmRDb2xvcjogW1xyXG4vLyAgICAgICAgICAgICAgICAgJ3JnYmEoMjU1LCA5OSwgMTMyLCAwLjIpJyxcclxuLy8gICAgICAgICAgICAgICAgICdyZ2JhKDU0LCAxNjIsIDIzNSwgMC4yKScsXHJcbi8vICAgICAgICAgICAgICAgICAncmdiYSgyNTUsIDIwNiwgODYsIDAuMiknLFxyXG4vLyAgICAgICAgICAgICBdLFxyXG4vLyAgICAgICAgICAgICBib3JkZXJDb2xvcjogW1xyXG4vLyAgICAgICAgICAgICAgICAgJ3JnYmEoMjU1LCA5OSwgMTMyLCAxKScsXHJcbi8vICAgICAgICAgICAgICAgICAncmdiYSg1NCwgMTYyLCAyMzUsIDEpJyxcclxuLy8gICAgICAgICAgICAgICAgICdyZ2JhKDI1NSwgMjA2LCA4NiwgMSknLFxyXG4vLyAgICAgICAgICAgICBdLFxyXG4vLyAgICAgICAgICAgICB0ZW5zaW9uOiAwLjFcclxuLy8gICAgICAgICB9XVxyXG4vLyAgICAgfSxcclxuLy8gICAgIG9wdGlvbnM6IHtcclxuLy8gICAgICAgICBzY2FsZXM6IHtcclxuLy8gICAgICAgICAgICAgeDoge1xyXG4vLyAgICAgICAgICAgICAgICAgYmVnaW5BdFplcm86IHRydWVcclxuLy8gICAgICAgICAgICAgfSxcclxuLy8gICAgICAgICAgICAgeToge1xyXG4vLyAgICAgICAgICAgICAgICAgYmVnaW5BdFplcm86IHRydWVcclxuLy8gICAgICAgICAgICAgfVxyXG4vLyAgICAgICAgIH1cclxuLy8gICAgIH0gXHJcbi8vIH0pO1xyXG5cclxuLy8gbmV3IENoYXJ0KGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdiYXItY2hhcnQnKSwge1xyXG4vLyAgICAgdHlwZTogJ2JhcicsXHJcbi8vICAgICBkYXRhOiB7XHJcbi8vICAgICAgICAgbGFiZWxzOiBsYWJlbHMsXHJcbi8vICAgICAgICAgZGF0YXNldHM6IFt7XHJcbi8vICAgICAgICAgICAgIGxhYmVsOiAnTXkgRmlyc3QgRGF0YXNldCcsXHJcbi8vICAgICAgICAgICAgIGRhdGE6IFs2NSwgNTksIDgwLCA4MSwgNTYsIDU1LCA0MCwgMTUsIDM3LCA5OCwgNDQsIDU2XSxcclxuLy8gICAgICAgICAgICAgZmlsbDogZmFsc2UsXHJcbi8vICAgICAgICAgICAgIGJhY2tncm91bmRDb2xvcjogW1xyXG4vLyAgICAgICAgICAgICAgICAgJ3JnYmEoMjU1LCA5OSwgMTMyLCAwLjIpJyxcclxuLy8gICAgICAgICAgICAgICAgICdyZ2JhKDI1NSwgMTU5LCA2NCwgMC4yKScsXHJcbi8vICAgICAgICAgICAgICAgICAncmdiYSgyNTUsIDIwNSwgODYsIDAuMiknLFxyXG4vLyAgICAgICAgICAgICAgICAgJ3JnYmEoNzUsIDE5MiwgMTkyLCAwLjIpJyxcclxuLy8gICAgICAgICAgICAgICAgICdyZ2JhKDU0LCAxNjIsIDIzNSwgMC4yKScsXHJcbi8vICAgICAgICAgICAgICAgICAncmdiYSgxNTMsIDEwMiwgMjU1LCAwLjIpJyxcclxuLy8gICAgICAgICAgICAgICAgICdyZ2JhKDIwMSwgMjAzLCAyMDcsIDAuMiknXHJcbi8vICAgICAgICAgICAgICAgXSxcclxuLy8gICAgICAgICAgICAgICBib3JkZXJDb2xvcjogW1xyXG4vLyAgICAgICAgICAgICAgICAgJ3JnYigyNTUsIDk5LCAxMzIpJyxcclxuLy8gICAgICAgICAgICAgICAgICdyZ2IoMjU1LCAxNTksIDY0KScsXHJcbi8vICAgICAgICAgICAgICAgICAncmdiKDI1NSwgMjA1LCA4NiknLFxyXG4vLyAgICAgICAgICAgICAgICAgJ3JnYig3NSwgMTkyLCAxOTIpJyxcclxuLy8gICAgICAgICAgICAgICAgICdyZ2IoNTQsIDE2MiwgMjM1KScsXHJcbi8vICAgICAgICAgICAgICAgICAncmdiKDE1MywgMTAyLCAyNTUpJyxcclxuLy8gICAgICAgICAgICAgICAgICdyZ2IoMjAxLCAyMDMsIDIwNyknXHJcbi8vICAgICAgICAgICAgICAgXSxcclxuLy8gICAgICAgICAgICAgdGVuc2lvbjogMC4xXHJcbi8vICAgICAgICAgfV1cclxuLy8gICAgIH0sXHJcbi8vICAgICBvcHRpb25zOiB7XHJcbi8vICAgICAgICAgc2NhbGVzOiB7XHJcbi8vICAgICAgICAgICAgIHg6IHtcclxuLy8gICAgICAgICAgICAgICAgIGJlZ2luQXRaZXJvOiB0cnVlXHJcbi8vICAgICAgICAgICAgIH0sXHJcbi8vICAgICAgICAgICAgIHk6IHtcclxuLy8gICAgICAgICAgICAgICAgIGJlZ2luQXRaZXJvOiB0cnVlXHJcbi8vICAgICAgICAgICAgIH1cclxuLy8gICAgICAgICB9XHJcbi8vICAgICB9IFxyXG4vLyB9KTtcclxuXHJcbi8vIGZ1bmN0aW9uIGdlbmVyYXRlTkRheXMobikge1xyXG4vLyAgICAgY29uc3QgZGF0YSA9IFtdXHJcbi8vICAgICBmb3IobGV0IGk9MDsgaTxuOyBpKyspIHtcclxuLy8gICAgICAgICBjb25zdCBkYXRlID0gbmV3IERhdGUoKVxyXG4vLyAgICAgICAgIGRhdGUuc2V0RGF0ZShkYXRlLmdldERhdGUoKS1pKVxyXG4vLyAgICAgICAgIGRhdGEucHVzaChkYXRlLnRvTG9jYWxlU3RyaW5nKCdlbi1VUycsIHtcclxuLy8gICAgICAgICAgICAgbW9udGg6ICdzaG9ydCcsXHJcbi8vICAgICAgICAgICAgIGRheTogJ251bWVyaWMnXHJcbi8vICAgICAgICAgfSkpXHJcbi8vICAgICB9XHJcbi8vICAgICByZXR1cm4gZGF0YVxyXG4vLyB9XHJcbi8vIGZ1bmN0aW9uIGdlbmVyYXRlUmFuZG9tRGF0YShuKSB7XHJcbi8vICAgICBjb25zdCBkYXRhID0gW11cclxuLy8gICAgIGZvcihsZXQgaT0wOyBpPG47IGkrKykge1xyXG4vLyAgICAgICAgIGRhdGEucHVzaChNYXRoLnJvdW5kKE1hdGgucmFuZG9tKCkgKiAxMCkpXHJcbi8vICAgICB9XHJcbi8vICAgICByZXR1cm4gZGF0YVxyXG4vLyB9XHJcbi8vIGVuZDogQ2hhcnRcclxuXHJcbi8vIEFqb3V0IGRlcyBsaWduZXMgZGUgZGV2aXNcclxuXHJcbmNvbnN0IHR2YVJhdGUgPSAwLjIwOyAvLyAyMCUgXHJcbmNvbnN0IHJlbWlzZVJhdGUgPSAwLjE1OyAvLyAxNSUgw6AgcGFydGlyIGRlIDEwMDDigqxcclxuXHJcbmZ1bmN0aW9uIHVwZGF0ZURldmlzVG90YWxzKCkge1xyXG4gICAgbGV0IHRvdGFsSFQgPSAwO1xyXG4gICAgbGV0IHRvdGFsVFRDID0gMDtcclxuXHJcbiAgICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcjbGlnbmVzRGV2aXMgdHInKS5mb3JFYWNoKGZ1bmN0aW9uKHJvdykge1xyXG4gICAgICAgIGNvbnN0IHByaXhIVEZpZWxkID0gcm93LnF1ZXJ5U2VsZWN0b3IoJ2lucHV0W25hbWUkPVwiW3ByaXhfaHRdXCJdJyk7XHJcbiAgICAgICAgY29uc3QgcHJpeFRUQ0ZpZWxkID0gcm93LnF1ZXJ5U2VsZWN0b3IoJ2lucHV0W25hbWUkPVwiW3ByaXhfdHRjXVwiXScpO1xyXG4gICAgICAgIGNvbnN0IHF1YW50aXRlRmllbGQgPSByb3cucXVlcnlTZWxlY3RvcignaW5wdXRbbmFtZSQ9XCJbcXVhbnRpdGVdXCJdJyk7XHJcbiAgICAgICAgaWYgKHByaXhIVEZpZWxkICYmIHByaXhUVENGaWVsZCAmJiBxdWFudGl0ZUZpZWxkKSB7XHJcbiAgICAgICAgICAgIGNvbnN0IHByaXhIVCA9IHBhcnNlRmxvYXQocHJpeEhURmllbGQudmFsdWUpIHx8IDA7XHJcbiAgICAgICAgICAgIGNvbnN0IHByaXhUVEMgPSBwYXJzZUZsb2F0KHByaXhUVENGaWVsZC52YWx1ZSkgfHwgMDtcclxuICAgICAgICAgICAgdG90YWxIVCArPSBwcml4SFQ7XHJcbiAgICAgICAgICAgIHRvdGFsVFRDICs9IHByaXhUVEM7XHJcbiAgICAgICAgfVxyXG4gICAgfSk7XHJcblxyXG4gICAgY29uc3QgdG90YWxUVkEgPSB0b3RhbFRUQyAtICh0b3RhbEhUKTtcclxuXHJcbiAgICBsZXQgcmVtaXNlID0gMDtcclxuICAgIGlmICh0b3RhbEhUID4gMTAwMCkge1xyXG4gICAgICAgIHJlbWlzZSA9IHRvdGFsSFQgKiByZW1pc2VSYXRlO1xyXG4gICAgICAgIHRvdGFsVFRDIC09IHJlbWlzZTtcclxuICAgIH1cclxuXHJcbiAgICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdpbnB1dFtuYW1lJD1cIlt0b3RhbF9odF1cIl0nKS52YWx1ZSA9IHRvdGFsSFQudG9GaXhlZCgyKTtcclxuICAgIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJ2lucHV0W25hbWUkPVwiW3RvdGFsX3R0Y11cIl0nKS52YWx1ZSA9IHRvdGFsVFRDLnRvRml4ZWQoMik7XHJcbiAgICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdpbnB1dFtuYW1lJD1cIlt0b3RhbF90dmFdXCJdJykudmFsdWUgPSB0b3RhbFRWQS50b0ZpeGVkKDIpO1xyXG4gICAgZG9jdW1lbnQucXVlcnlTZWxlY3RvcignaW5wdXRbbmFtZSQ9XCJbcmVtaXNlXVwiXScpLnZhbHVlID0gcmVtaXNlLnRvRml4ZWQoMik7XHJcbn1cclxuXHJcbmRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdhZGQtbGlnbmUnKS5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKCkge1xyXG4gICAgY29uc3QgY29sbGVjdGlvbkhvbGRlciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNsaWduZXNEZXZpcycpO1xyXG4gICAgY29uc3QgcHJvdG90eXBlID0gY29sbGVjdGlvbkhvbGRlci5kYXRhc2V0LnByb3RvdHlwZTtcclxuICAgIGNvbnN0IG5ld0luZGV4ID0gY29sbGVjdGlvbkhvbGRlci5jaGlsZHJlbi5sZW5ndGg7XHJcbiAgICBjb25zdCBuZXdGb3JtID0gcHJvdG90eXBlLnJlcGxhY2UoL19fbmFtZV9fL2csIG5ld0luZGV4KTtcclxuXHJcbiAgICBjb25zdCB0ZW1wRGl2ID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnZGl2Jyk7XHJcbiAgICB0ZW1wRGl2LmlubmVySFRNTCA9IG5ld0Zvcm07XHJcbiAgICBcclxuICAgIGNvbnN0IG5ld1JvdyA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ3RyJyk7XHJcblxyXG4gICAgY29uc3QgcHJvZHVpdEZpZWxkID0gdGVtcERpdi5xdWVyeVNlbGVjdG9yKCdzZWxlY3QnKTsgICAgICAgICAgIFxyXG4gICAgY29uc3QgcXVhbnRpdGVGaWVsZCA9IHRlbXBEaXYucXVlcnlTZWxlY3RvcignaW5wdXRbbmFtZSQ9XCJbcXVhbnRpdGVdXCJdJyk7XHJcbiAgICBjb25zdCBwcml4SFRGaWVsZCA9IHRlbXBEaXYucXVlcnlTZWxlY3RvcignaW5wdXRbbmFtZSQ9XCJbcHJpeF9odF1cIl0nKTtcclxuICAgIGNvbnN0IHByaXhUVENGaWVsZCA9IHRlbXBEaXYucXVlcnlTZWxlY3RvcignaW5wdXRbbmFtZSQ9XCJbcHJpeF90dGNdXCJdJyk7XHJcblxyXG4gICAgaWYgKHByb2R1aXRGaWVsZCAmJiBxdWFudGl0ZUZpZWxkICYmIHByaXhIVEZpZWxkICYmIHByaXhUVENGaWVsZCkge1xyXG4gICAgICAgIG5ld1Jvdy5pbm5lckhUTUwgPSBgXHJcbiAgICAgICAgICAgIDx0ZCBjbGFzcz1cImJvcmRlci15IGJvcmRlci1ibGFjayBwLTQgdGV4dC1sZWZ0XCI+JHtwcm9kdWl0RmllbGQub3V0ZXJIVE1MfTwvdGQ+XHJcbiAgICAgICAgICAgIDx0ZCBjbGFzcz1cImJvcmRlci15IGJvcmRlci1ibGFjayBwLTQgdGV4dC1sZWZ0XCI+JHtxdWFudGl0ZUZpZWxkLm91dGVySFRNTH08L3RkPlxyXG4gICAgICAgICAgICA8dGQgY2xhc3M9XCJib3JkZXIteSBib3JkZXItYmxhY2sgcC00IHRleHQtbGVmdFwiPiR7cHJpeEhURmllbGQub3V0ZXJIVE1MfTwvdGQ+XHJcbiAgICAgICAgICAgIDx0ZCBjbGFzcz1cImJvcmRlci15IGJvcmRlci1ibGFjayBwLTQgdGV4dC1sZWZ0XCI+JHtwcml4VFRDRmllbGQub3V0ZXJIVE1MfTwvdGQ+XHJcbiAgICAgICAgYDtcclxuICAgICAgICBjb2xsZWN0aW9uSG9sZGVyLmFwcGVuZENoaWxkKG5ld1Jvdyk7XHJcblxyXG4gICAgICAgIGNvbnN0IG5ld1Byb2R1aXRGaWVsZCA9IG5ld1Jvdy5xdWVyeVNlbGVjdG9yKCdzZWxlY3QnKTtcclxuICAgICAgICBjb25zdCBuZXdRdWFudGl0ZUZpZWxkID0gbmV3Um93LnF1ZXJ5U2VsZWN0b3IoJ2lucHV0W25hbWUkPVwiW3F1YW50aXRlXVwiXScpO1xyXG4gICAgICAgIGNvbnN0IG5ld1ByaXhIVEZpZWxkID0gbmV3Um93LnF1ZXJ5U2VsZWN0b3IoJ2lucHV0W25hbWUkPVwiW3ByaXhfaHRdXCJdJyk7XHJcbiAgICAgICAgY29uc3QgbmV3UHJpeFRUQ0ZpZWxkID0gbmV3Um93LnF1ZXJ5U2VsZWN0b3IoJ2lucHV0W25hbWUkPVwiW3ByaXhfdHRjXVwiXScpO1xyXG5cclxuICAgICAgICAvLyBGdW5jdGlvbiB0byB1cGRhdGUgcHJpY2VzXHJcbiAgICAgICAgY29uc3QgdXBkYXRlUHJpY2VzID0gKCkgPT4ge1xyXG4gICAgICAgICAgICBjb25zdCBzZWxlY3RlZE9wdGlvbiA9IG5ld1Byb2R1aXRGaWVsZC5zZWxlY3RlZE9wdGlvbnNbMF07XHJcbiAgICAgICAgICAgIGNvbnN0IHByaXhVbml0YWlyZUhUID0gcGFyc2VGbG9hdChzZWxlY3RlZE9wdGlvbi5nZXRBdHRyaWJ1dGUoJ2RhdGEtcHJpeC1odCcpKSB8fCAwO1xyXG4gICAgICAgICAgICBjb25zdCBxdWFudGl0ZSA9IHBhcnNlSW50KG5ld1F1YW50aXRlRmllbGQudmFsdWUpIHx8IDA7XHJcbiAgICAgICAgICAgIGNvbnN0IHByaXhUb3RhbEhUID0gcHJpeFVuaXRhaXJlSFQgKiBxdWFudGl0ZTtcclxuICAgICAgICAgICAgY29uc3QgcHJpeFRvdGFsVFRDID0gcHJpeFRvdGFsSFQgKiAoMSArIHR2YVJhdGUpO1xyXG4gICAgICAgICAgICBuZXdQcml4SFRGaWVsZC52YWx1ZSA9IHByaXhUb3RhbEhULnRvRml4ZWQoMik7XHJcbiAgICAgICAgICAgIG5ld1ByaXhUVENGaWVsZC52YWx1ZSA9IHByaXhUb3RhbFRUQy50b0ZpeGVkKDIpO1xyXG4gICAgICAgICAgICB1cGRhdGVEZXZpc1RvdGFscygpO1xyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgIC8vIEF0dGFjaCBldmVudCBsaXN0ZW5lcnNcclxuICAgICAgICBuZXdQcm9kdWl0RmllbGQuYWRkRXZlbnRMaXN0ZW5lcignY2hhbmdlJywgdXBkYXRlUHJpY2VzKTtcclxuICAgICAgICBuZXdRdWFudGl0ZUZpZWxkLmFkZEV2ZW50TGlzdGVuZXIoJ2lucHV0JywgdXBkYXRlUHJpY2VzKTtcclxuICAgIH0gZWxzZSB7XHJcbiAgICAgICAgY29uc29sZS5lcnJvcignVW5hYmxlIHRvIGZpbmQgb25lIG9yIG1vcmUgZmllbGRzIGluIHRoZSBwcm90b3R5cGUnKTtcclxuICAgICAgICBpZiAoIXByb2R1aXRGaWVsZCkgY29uc29sZS5lcnJvcignUHJvZHVpdCBmaWVsZCBub3QgZm91bmQnKTtcclxuICAgICAgICBpZiAoIXF1YW50aXRlRmllbGQpIGNvbnNvbGUuZXJyb3IoJ1F1YW50aXRlIGZpZWxkIG5vdCBmb3VuZCcpO1xyXG4gICAgICAgIGlmICghcHJpeEhURmllbGQpIGNvbnNvbGUuZXJyb3IoJ1ByaXggSFQgZmllbGQgbm90IGZvdW5kJyk7XHJcbiAgICAgICAgaWYgKCFwcml4VFRDRmllbGQpIGNvbnNvbGUuZXJyb3IoJ1ByaXggVFRDIGZpZWxkIG5vdCBmb3VuZCcpO1xyXG4gICAgfVxyXG59KTtcclxuXHJcbi8vIEF0dGFjaCBldmVudCB0byBleGlzdGluZyBwcm9kdWN0IGZpZWxkc1xyXG5kb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCdzZWxlY3RbbmFtZSQ9XCJbcHJvZHVpdF1cIl0sIGlucHV0W25hbWUkPVwiW3F1YW50aXRlXVwiXScpLmZvckVhY2goZnVuY3Rpb24oZmllbGQpIHtcclxuICAgIGZpZWxkLmFkZEV2ZW50TGlzdGVuZXIoJ2NoYW5nZScsIHVwZGF0ZURldmlzVG90YWxzKTtcclxuICAgIGZpZWxkLmFkZEV2ZW50TGlzdGVuZXIoJ2lucHV0JywgdXBkYXRlRGV2aXNUb3RhbHMpO1xyXG59KTtcclxuXHJcbi8vIEluaXRpYWwgY2FsY3VsYXRpb24gb2YgdG90YWxzXHJcbnVwZGF0ZURldmlzVG90YWxzKCk7XHJcbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyJdLCJuYW1lcyI6WyJDaGFydCIsImRvY3VtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsInRoZW1lVG9nZ2xlIiwiZ2V0RWxlbWVudEJ5SWQiLCJyb290RWxlbWVudCIsImRvY3VtZW50RWxlbWVudCIsImRhcmtNb2RlQ2xhc3MiLCJ0b2dnbGVJY29uIiwicXVlcnlTZWxlY3RvciIsInN1bkljb24iLCJtb29uSWNvbiIsImxvY2FsU3RvcmFnZSIsImdldEl0ZW0iLCJ3aW5kb3ciLCJtYXRjaE1lZGlhIiwibWF0Y2hlcyIsImNsYXNzTGlzdCIsImFkZCIsInJlbW92ZSIsImNvbnRhaW5zIiwic2V0SXRlbSIsImxhYmVscyIsImxhYmVsczIiLCJ0eXBlIiwiZGF0YSIsImRhdGFzZXRzIiwibGFiZWwiLCJmaWxsIiwiYm9yZGVyQ29sb3IiLCJ0ZW5zaW9uIiwib3B0aW9ucyIsInNjYWxlcyIsIngiLCJiZWdpbkF0WmVybyIsInkiLCJ0dmFSYXRlIiwicmVtaXNlUmF0ZSIsInVwZGF0ZURldmlzVG90YWxzIiwidG90YWxIVCIsInRvdGFsVFRDIiwicXVlcnlTZWxlY3RvckFsbCIsImZvckVhY2giLCJyb3ciLCJwcml4SFRGaWVsZCIsInByaXhUVENGaWVsZCIsInF1YW50aXRlRmllbGQiLCJwcml4SFQiLCJwYXJzZUZsb2F0IiwidmFsdWUiLCJwcml4VFRDIiwidG90YWxUVkEiLCJyZW1pc2UiLCJ0b0ZpeGVkIiwiY29sbGVjdGlvbkhvbGRlciIsInByb3RvdHlwZSIsImRhdGFzZXQiLCJuZXdJbmRleCIsImNoaWxkcmVuIiwibGVuZ3RoIiwibmV3Rm9ybSIsInJlcGxhY2UiLCJ0ZW1wRGl2IiwiY3JlYXRlRWxlbWVudCIsImlubmVySFRNTCIsIm5ld1JvdyIsInByb2R1aXRGaWVsZCIsImNvbmNhdCIsIm91dGVySFRNTCIsImFwcGVuZENoaWxkIiwibmV3UHJvZHVpdEZpZWxkIiwibmV3UXVhbnRpdGVGaWVsZCIsIm5ld1ByaXhIVEZpZWxkIiwibmV3UHJpeFRUQ0ZpZWxkIiwidXBkYXRlUHJpY2VzIiwic2VsZWN0ZWRPcHRpb24iLCJzZWxlY3RlZE9wdGlvbnMiLCJwcml4VW5pdGFpcmVIVCIsImdldEF0dHJpYnV0ZSIsInF1YW50aXRlIiwicGFyc2VJbnQiLCJwcml4VG90YWxIVCIsInByaXhUb3RhbFRUQyIsImNvbnNvbGUiLCJlcnJvciIsImZpZWxkIl0sInNvdXJjZVJvb3QiOiIifQ==