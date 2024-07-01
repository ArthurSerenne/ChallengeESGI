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

// Ajout des lignes de devis

var tvaRate = 0.20; // 20% 
var remiseRate = 0.10; // 10% à partir de 5000€

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
  if (totalHT > 5000) {
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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Q0FBQzBCLGdCQUFnQixDQUFDLHNEQUFzRCxDQUFDLENBQUNDLE9BQU8sQ0FBQyxVQUFTMkMsS0FBSyxFQUFFO0VBQ3RHQSxLQUFLLENBQUNyRSxnQkFBZ0IsQ0FBQyxRQUFRLEVBQUVzQixpQkFBaUIsQ0FBQztFQUNuRCtDLEtBQUssQ0FBQ3JFLGdCQUFnQixDQUFDLE9BQU8sRUFBRXNCLGlCQUFpQixDQUFDO0FBQ3RELENBQUMsQ0FBQzs7QUFFRjtBQUNBQSxpQkFBaUIsQ0FBQyxDQUFDOzs7Ozs7Ozs7OztBQzdKbkIiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zdHlsZXMvYXBwLmNzcz82YmU2Il0sInNvdXJjZXNDb250ZW50IjpbIi8vIGltcG9ydCAnLi9ib290c3RyYXAuanMnO1xyXG4vKlxyXG4gKiBXZWxjb21lIHRvIHlvdXIgYXBwJ3MgbWFpbiBKYXZhU2NyaXB0IGZpbGUhXHJcbiAqXHJcbiAqIFRoaXMgZmlsZSB3aWxsIGJlIGluY2x1ZGVkIG9udG8gdGhlIHBhZ2UgdmlhIHRoZSBpbXBvcnRtYXAoKSBUd2lnIGZ1bmN0aW9uLFxyXG4gKiB3aGljaCBzaG91bGQgYWxyZWFkeSBiZSBpbiB5b3VyIGJhc2UuaHRtbC50d2lnLlxyXG4gKi9cclxuaW1wb3J0ICcuL3N0eWxlcy9hcHAuY3NzJztcclxuaW1wb3J0IENoYXJ0IGZyb20gJ2NoYXJ0LmpzL2F1dG8nO1xyXG5cclxuLy8gTmF2aWdhdGlvbiBBY3RpdmUgXHJcblxyXG5cclxuLy8gRGFya01vZGVcclxuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignRE9NQ29udGVudExvYWRlZCcsIGZ1bmN0aW9uKCkge1xyXG5jb25zdCB0aGVtZVRvZ2dsZSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0aGVtZS10b2dnbGUnKTtcclxuY29uc3Qgcm9vdEVsZW1lbnQgPSBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQ7XHJcbmNvbnN0IGRhcmtNb2RlQ2xhc3MgPSAnZGFyayc7XHJcbmNvbnN0IHRvZ2dsZUljb24gPSB0aGVtZVRvZ2dsZS5xdWVyeVNlbGVjdG9yKCdzcGFuJyk7XHJcbmNvbnN0IHN1bkljb24gPSB0aGVtZVRvZ2dsZS5xdWVyeVNlbGVjdG9yKCcuZmEtc3VuJyk7XHJcbmNvbnN0IG1vb25JY29uID0gdGhlbWVUb2dnbGUucXVlcnlTZWxlY3RvcignLmZhLW1vb24nKTtcclxuXHJcbi8vIEluaXRpYWxpc2VyIGxlIHRow6htZSBlbiBmb25jdGlvbiBkZXMgcHLDqWbDqXJlbmNlcyB1dGlsaXNhdGV1clxyXG5pZiAobG9jYWxTdG9yYWdlLmdldEl0ZW0oJ3RoZW1lJykgPT09ICdkYXJrJyB8fCBcclxuICAgICghKCd0aGVtZScgaW4gbG9jYWxTdG9yYWdlKSAmJiB3aW5kb3cubWF0Y2hNZWRpYSgnKHByZWZlcnMtY29sb3Itc2NoZW1lOiBkYXJrKScpLm1hdGNoZXMpKSB7XHJcbiAgICByb290RWxlbWVudC5jbGFzc0xpc3QuYWRkKGRhcmtNb2RlQ2xhc3MpO1xyXG4gICAgdG9nZ2xlSWNvbi5jbGFzc0xpc3QuYWRkKCd0cmFuc2xhdGUteC02Jyk7XHJcbiAgICBzdW5JY29uLmNsYXNzTGlzdC5hZGQoJ2hpZGRlbicpO1xyXG4gICAgc3VuSWNvbi5jbGFzc0xpc3QucmVtb3ZlKCdibG9jaycpO1xyXG4gICAgbW9vbkljb24uY2xhc3NMaXN0LnJlbW92ZSgnaGlkZGVuJyk7XHJcbiAgICBtb29uSWNvbi5jbGFzc0xpc3QuYWRkKCdibG9jaycpO1xyXG59IGVsc2Uge1xyXG4gICAgcm9vdEVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZShkYXJrTW9kZUNsYXNzKTtcclxuICAgIHRvZ2dsZUljb24uY2xhc3NMaXN0LnJlbW92ZSgndHJhbnNsYXRlLXgtNicpO1xyXG4gICAgc3VuSWNvbi5jbGFzc0xpc3QucmVtb3ZlKCdoaWRkZW4nKTtcclxuICAgIHN1bkljb24uY2xhc3NMaXN0LmFkZCgnYmxvY2snKTtcclxuICAgIG1vb25JY29uLmNsYXNzTGlzdC5hZGQoJ2hpZGRlbicpO1xyXG4gICAgbW9vbkljb24uY2xhc3NMaXN0LnJlbW92ZSgnYmxvY2snKTtcclxufVxyXG5cclxudGhlbWVUb2dnbGUuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbigpIHtcclxuICAgIGlmIChyb290RWxlbWVudC5jbGFzc0xpc3QuY29udGFpbnMoZGFya01vZGVDbGFzcykpIHtcclxuICAgIHJvb3RFbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoZGFya01vZGVDbGFzcyk7XHJcbiAgICBsb2NhbFN0b3JhZ2Uuc2V0SXRlbSgndGhlbWUnLCAnbGlnaHQnKTtcclxuICAgIHRvZ2dsZUljb24uY2xhc3NMaXN0LnJlbW92ZSgndHJhbnNsYXRlLXgtNicpO1xyXG4gICAgc3VuSWNvbi5jbGFzc0xpc3QucmVtb3ZlKCdoaWRkZW4nKTtcclxuICAgIHN1bkljb24uY2xhc3NMaXN0LmFkZCgnYmxvY2snKTtcclxuICAgIG1vb25JY29uLmNsYXNzTGlzdC5hZGQoJ2hpZGRlbicpO1xyXG4gICAgbW9vbkljb24uY2xhc3NMaXN0LnJlbW92ZSgnYmxvY2snKTtcclxuICAgIH0gZWxzZSB7XHJcbiAgICByb290RWxlbWVudC5jbGFzc0xpc3QuYWRkKGRhcmtNb2RlQ2xhc3MpO1xyXG4gICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oJ3RoZW1lJywgJ2RhcmsnKTtcclxuICAgIHRvZ2dsZUljb24uY2xhc3NMaXN0LmFkZCgndHJhbnNsYXRlLXgtNicpO1xyXG4gICAgc3VuSWNvbi5jbGFzc0xpc3QuYWRkKCdoaWRkZW4nKTtcclxuICAgIHN1bkljb24uY2xhc3NMaXN0LnJlbW92ZSgnYmxvY2snKTtcclxuICAgIG1vb25JY29uLmNsYXNzTGlzdC5yZW1vdmUoJ2hpZGRlbicpO1xyXG4gICAgbW9vbkljb24uY2xhc3NMaXN0LmFkZCgnYmxvY2snKTtcclxuICAgIH1cclxufSk7XHJcbn0pO1xyXG5cclxuLy8gQWpvdXQgZGVzIGxpZ25lcyBkZSBkZXZpc1xyXG5cclxuY29uc3QgdHZhUmF0ZSA9IDAuMjA7IC8vIDIwJSBcclxuY29uc3QgcmVtaXNlUmF0ZSA9IDAuMTA7IC8vIDEwJSDDoCBwYXJ0aXIgZGUgNTAwMOKCrFxyXG5cclxuZnVuY3Rpb24gdXBkYXRlRGV2aXNUb3RhbHMoKSB7XHJcbiAgICBsZXQgdG90YWxIVCA9IDA7XHJcbiAgICBsZXQgdG90YWxUVEMgPSAwO1xyXG5cclxuICAgIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJyNsaWduZXNEZXZpcyB0cicpLmZvckVhY2goZnVuY3Rpb24ocm93KSB7XHJcbiAgICAgICAgY29uc3QgcHJpeEhURmllbGQgPSByb3cucXVlcnlTZWxlY3RvcignaW5wdXRbbmFtZSQ9XCJbcHJpeF9odF1cIl0nKTtcclxuICAgICAgICBjb25zdCBwcml4VFRDRmllbGQgPSByb3cucXVlcnlTZWxlY3RvcignaW5wdXRbbmFtZSQ9XCJbcHJpeF90dGNdXCJdJyk7XHJcbiAgICAgICAgY29uc3QgcXVhbnRpdGVGaWVsZCA9IHJvdy5xdWVyeVNlbGVjdG9yKCdpbnB1dFtuYW1lJD1cIltxdWFudGl0ZV1cIl0nKTtcclxuICAgICAgICBpZiAocHJpeEhURmllbGQgJiYgcHJpeFRUQ0ZpZWxkICYmIHF1YW50aXRlRmllbGQpIHtcclxuICAgICAgICAgICAgY29uc3QgcHJpeEhUID0gcGFyc2VGbG9hdChwcml4SFRGaWVsZC52YWx1ZSkgfHwgMDtcclxuICAgICAgICAgICAgY29uc3QgcHJpeFRUQyA9IHBhcnNlRmxvYXQocHJpeFRUQ0ZpZWxkLnZhbHVlKSB8fCAwO1xyXG4gICAgICAgICAgICB0b3RhbEhUICs9IHByaXhIVDtcclxuICAgICAgICAgICAgdG90YWxUVEMgKz0gcHJpeFRUQztcclxuICAgICAgICB9XHJcbiAgICB9KTtcclxuXHJcbiAgICBjb25zdCB0b3RhbFRWQSA9IHRvdGFsVFRDIC0gKHRvdGFsSFQpO1xyXG5cclxuICAgIGxldCByZW1pc2UgPSAwO1xyXG4gICAgaWYgKHRvdGFsSFQgPiA1MDAwKSB7XHJcbiAgICAgICAgcmVtaXNlID0gdG90YWxIVCAqIHJlbWlzZVJhdGU7XHJcbiAgICAgICAgdG90YWxUVEMgLT0gcmVtaXNlO1xyXG4gICAgfVxyXG5cclxuICAgIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJ2lucHV0W25hbWUkPVwiW3RvdGFsX2h0XVwiXScpLnZhbHVlID0gdG90YWxIVC50b0ZpeGVkKDIpO1xyXG4gICAgZG9jdW1lbnQucXVlcnlTZWxlY3RvcignaW5wdXRbbmFtZSQ9XCJbdG90YWxfdHRjXVwiXScpLnZhbHVlID0gdG90YWxUVEMudG9GaXhlZCgyKTtcclxuICAgIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJ2lucHV0W25hbWUkPVwiW3RvdGFsX3R2YV1cIl0nKS52YWx1ZSA9IHRvdGFsVFZBLnRvRml4ZWQoMik7XHJcbiAgICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdpbnB1dFtuYW1lJD1cIltyZW1pc2VdXCJdJykudmFsdWUgPSByZW1pc2UudG9GaXhlZCgyKTtcclxufVxyXG5cclxuZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2FkZC1saWduZScpLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oKSB7XHJcbiAgICBjb25zdCBjb2xsZWN0aW9uSG9sZGVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2xpZ25lc0RldmlzJyk7XHJcbiAgICBjb25zdCBwcm90b3R5cGUgPSBjb2xsZWN0aW9uSG9sZGVyLmRhdGFzZXQucHJvdG90eXBlO1xyXG4gICAgY29uc3QgbmV3SW5kZXggPSBjb2xsZWN0aW9uSG9sZGVyLmNoaWxkcmVuLmxlbmd0aDtcclxuICAgIGNvbnN0IG5ld0Zvcm0gPSBwcm90b3R5cGUucmVwbGFjZSgvX19uYW1lX18vZywgbmV3SW5kZXgpO1xyXG5cclxuICAgIGNvbnN0IHRlbXBEaXYgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdkaXYnKTtcclxuICAgIHRlbXBEaXYuaW5uZXJIVE1MID0gbmV3Rm9ybTtcclxuICAgIFxyXG4gICAgY29uc3QgbmV3Um93ID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgndHInKTtcclxuXHJcbiAgICBjb25zdCBwcm9kdWl0RmllbGQgPSB0ZW1wRGl2LnF1ZXJ5U2VsZWN0b3IoJ3NlbGVjdCcpOyAgICAgICAgICAgXHJcbiAgICBjb25zdCBxdWFudGl0ZUZpZWxkID0gdGVtcERpdi5xdWVyeVNlbGVjdG9yKCdpbnB1dFtuYW1lJD1cIltxdWFudGl0ZV1cIl0nKTtcclxuICAgIGNvbnN0IHByaXhIVEZpZWxkID0gdGVtcERpdi5xdWVyeVNlbGVjdG9yKCdpbnB1dFtuYW1lJD1cIltwcml4X2h0XVwiXScpO1xyXG4gICAgY29uc3QgcHJpeFRUQ0ZpZWxkID0gdGVtcERpdi5xdWVyeVNlbGVjdG9yKCdpbnB1dFtuYW1lJD1cIltwcml4X3R0Y11cIl0nKTtcclxuXHJcbiAgICBpZiAocHJvZHVpdEZpZWxkICYmIHF1YW50aXRlRmllbGQgJiYgcHJpeEhURmllbGQgJiYgcHJpeFRUQ0ZpZWxkKSB7XHJcbiAgICAgICAgbmV3Um93LmlubmVySFRNTCA9IGBcclxuICAgICAgICAgICAgPHRkIGNsYXNzPVwiYm9yZGVyLXkgYm9yZGVyLWJsYWNrIHAtNCB0ZXh0LWxlZnRcIj4ke3Byb2R1aXRGaWVsZC5vdXRlckhUTUx9PC90ZD5cclxuICAgICAgICAgICAgPHRkIGNsYXNzPVwiYm9yZGVyLXkgYm9yZGVyLWJsYWNrIHAtNCB0ZXh0LWxlZnRcIj4ke3F1YW50aXRlRmllbGQub3V0ZXJIVE1MfTwvdGQ+XHJcbiAgICAgICAgICAgIDx0ZCBjbGFzcz1cImJvcmRlci15IGJvcmRlci1ibGFjayBwLTQgdGV4dC1sZWZ0XCI+JHtwcml4SFRGaWVsZC5vdXRlckhUTUx9PC90ZD5cclxuICAgICAgICAgICAgPHRkIGNsYXNzPVwiYm9yZGVyLXkgYm9yZGVyLWJsYWNrIHAtNCB0ZXh0LWxlZnRcIj4ke3ByaXhUVENGaWVsZC5vdXRlckhUTUx9PC90ZD5cclxuICAgICAgICBgO1xyXG4gICAgICAgIGNvbGxlY3Rpb25Ib2xkZXIuYXBwZW5kQ2hpbGQobmV3Um93KTtcclxuXHJcbiAgICAgICAgY29uc3QgbmV3UHJvZHVpdEZpZWxkID0gbmV3Um93LnF1ZXJ5U2VsZWN0b3IoJ3NlbGVjdCcpO1xyXG4gICAgICAgIGNvbnN0IG5ld1F1YW50aXRlRmllbGQgPSBuZXdSb3cucXVlcnlTZWxlY3RvcignaW5wdXRbbmFtZSQ9XCJbcXVhbnRpdGVdXCJdJyk7XHJcbiAgICAgICAgY29uc3QgbmV3UHJpeEhURmllbGQgPSBuZXdSb3cucXVlcnlTZWxlY3RvcignaW5wdXRbbmFtZSQ9XCJbcHJpeF9odF1cIl0nKTtcclxuICAgICAgICBjb25zdCBuZXdQcml4VFRDRmllbGQgPSBuZXdSb3cucXVlcnlTZWxlY3RvcignaW5wdXRbbmFtZSQ9XCJbcHJpeF90dGNdXCJdJyk7XHJcblxyXG4gICAgICAgIC8vIEZ1bmN0aW9uIHRvIHVwZGF0ZSBwcmljZXNcclxuICAgICAgICBjb25zdCB1cGRhdGVQcmljZXMgPSAoKSA9PiB7XHJcbiAgICAgICAgICAgIGNvbnN0IHNlbGVjdGVkT3B0aW9uID0gbmV3UHJvZHVpdEZpZWxkLnNlbGVjdGVkT3B0aW9uc1swXTtcclxuICAgICAgICAgICAgY29uc3QgcHJpeFVuaXRhaXJlSFQgPSBwYXJzZUZsb2F0KHNlbGVjdGVkT3B0aW9uLmdldEF0dHJpYnV0ZSgnZGF0YS1wcml4LWh0JykpIHx8IDA7XHJcbiAgICAgICAgICAgIGNvbnN0IHF1YW50aXRlID0gcGFyc2VJbnQobmV3UXVhbnRpdGVGaWVsZC52YWx1ZSkgfHwgMDtcclxuICAgICAgICAgICAgY29uc3QgcHJpeFRvdGFsSFQgPSBwcml4VW5pdGFpcmVIVCAqIHF1YW50aXRlO1xyXG4gICAgICAgICAgICBjb25zdCBwcml4VG90YWxUVEMgPSBwcml4VG90YWxIVCAqICgxICsgdHZhUmF0ZSk7XHJcbiAgICAgICAgICAgIG5ld1ByaXhIVEZpZWxkLnZhbHVlID0gcHJpeFRvdGFsSFQudG9GaXhlZCgyKTtcclxuICAgICAgICAgICAgbmV3UHJpeFRUQ0ZpZWxkLnZhbHVlID0gcHJpeFRvdGFsVFRDLnRvRml4ZWQoMik7XHJcbiAgICAgICAgICAgIHVwZGF0ZURldmlzVG90YWxzKCk7XHJcbiAgICAgICAgfTtcclxuXHJcbiAgICAgICAgLy8gQXR0YWNoIGV2ZW50IGxpc3RlbmVyc1xyXG4gICAgICAgIG5ld1Byb2R1aXRGaWVsZC5hZGRFdmVudExpc3RlbmVyKCdjaGFuZ2UnLCB1cGRhdGVQcmljZXMpO1xyXG4gICAgICAgIG5ld1F1YW50aXRlRmllbGQuYWRkRXZlbnRMaXN0ZW5lcignaW5wdXQnLCB1cGRhdGVQcmljZXMpO1xyXG4gICAgfSBlbHNlIHtcclxuICAgICAgICBjb25zb2xlLmVycm9yKCdVbmFibGUgdG8gZmluZCBvbmUgb3IgbW9yZSBmaWVsZHMgaW4gdGhlIHByb3RvdHlwZScpO1xyXG4gICAgICAgIGlmICghcHJvZHVpdEZpZWxkKSBjb25zb2xlLmVycm9yKCdQcm9kdWl0IGZpZWxkIG5vdCBmb3VuZCcpO1xyXG4gICAgICAgIGlmICghcXVhbnRpdGVGaWVsZCkgY29uc29sZS5lcnJvcignUXVhbnRpdGUgZmllbGQgbm90IGZvdW5kJyk7XHJcbiAgICAgICAgaWYgKCFwcml4SFRGaWVsZCkgY29uc29sZS5lcnJvcignUHJpeCBIVCBmaWVsZCBub3QgZm91bmQnKTtcclxuICAgICAgICBpZiAoIXByaXhUVENGaWVsZCkgY29uc29sZS5lcnJvcignUHJpeCBUVEMgZmllbGQgbm90IGZvdW5kJyk7XHJcbiAgICB9XHJcbn0pO1xyXG5cclxuLy8gQXR0YWNoIGV2ZW50IHRvIGV4aXN0aW5nIHByb2R1Y3QgZmllbGRzXHJcbmRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJ3NlbGVjdFtuYW1lJD1cIltwcm9kdWl0XVwiXSwgaW5wdXRbbmFtZSQ9XCJbcXVhbnRpdGVdXCJdJykuZm9yRWFjaChmdW5jdGlvbihmaWVsZCkge1xyXG4gICAgZmllbGQuYWRkRXZlbnRMaXN0ZW5lcignY2hhbmdlJywgdXBkYXRlRGV2aXNUb3RhbHMpO1xyXG4gICAgZmllbGQuYWRkRXZlbnRMaXN0ZW5lcignaW5wdXQnLCB1cGRhdGVEZXZpc1RvdGFscyk7XHJcbn0pO1xyXG5cclxuLy8gSW5pdGlhbCBjYWxjdWxhdGlvbiBvZiB0b3RhbHNcclxudXBkYXRlRGV2aXNUb3RhbHMoKTtcclxuIiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luXG5leHBvcnQge307Il0sIm5hbWVzIjpbIkNoYXJ0IiwiZG9jdW1lbnQiLCJhZGRFdmVudExpc3RlbmVyIiwidGhlbWVUb2dnbGUiLCJnZXRFbGVtZW50QnlJZCIsInJvb3RFbGVtZW50IiwiZG9jdW1lbnRFbGVtZW50IiwiZGFya01vZGVDbGFzcyIsInRvZ2dsZUljb24iLCJxdWVyeVNlbGVjdG9yIiwic3VuSWNvbiIsIm1vb25JY29uIiwibG9jYWxTdG9yYWdlIiwiZ2V0SXRlbSIsIndpbmRvdyIsIm1hdGNoTWVkaWEiLCJtYXRjaGVzIiwiY2xhc3NMaXN0IiwiYWRkIiwicmVtb3ZlIiwiY29udGFpbnMiLCJzZXRJdGVtIiwidHZhUmF0ZSIsInJlbWlzZVJhdGUiLCJ1cGRhdGVEZXZpc1RvdGFscyIsInRvdGFsSFQiLCJ0b3RhbFRUQyIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJmb3JFYWNoIiwicm93IiwicHJpeEhURmllbGQiLCJwcml4VFRDRmllbGQiLCJxdWFudGl0ZUZpZWxkIiwicHJpeEhUIiwicGFyc2VGbG9hdCIsInZhbHVlIiwicHJpeFRUQyIsInRvdGFsVFZBIiwicmVtaXNlIiwidG9GaXhlZCIsImNvbGxlY3Rpb25Ib2xkZXIiLCJwcm90b3R5cGUiLCJkYXRhc2V0IiwibmV3SW5kZXgiLCJjaGlsZHJlbiIsImxlbmd0aCIsIm5ld0Zvcm0iLCJyZXBsYWNlIiwidGVtcERpdiIsImNyZWF0ZUVsZW1lbnQiLCJpbm5lckhUTUwiLCJuZXdSb3ciLCJwcm9kdWl0RmllbGQiLCJjb25jYXQiLCJvdXRlckhUTUwiLCJhcHBlbmRDaGlsZCIsIm5ld1Byb2R1aXRGaWVsZCIsIm5ld1F1YW50aXRlRmllbGQiLCJuZXdQcml4SFRGaWVsZCIsIm5ld1ByaXhUVENGaWVsZCIsInVwZGF0ZVByaWNlcyIsInNlbGVjdGVkT3B0aW9uIiwic2VsZWN0ZWRPcHRpb25zIiwicHJpeFVuaXRhaXJlSFQiLCJnZXRBdHRyaWJ1dGUiLCJxdWFudGl0ZSIsInBhcnNlSW50IiwicHJpeFRvdGFsSFQiLCJwcml4VG90YWxUVEMiLCJjb25zb2xlIiwiZXJyb3IiLCJmaWVsZCJdLCJzb3VyY2VSb290IjoiIn0=