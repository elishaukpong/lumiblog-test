/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/auto-complete.js ***!
  \***************************************/
//***************INITIALIZATIONS***************//
var autocompleteInput = document.getElementById('autocomplete');
var res = document.getElementById("result"); //***************EVENTS***************//

autocompleteInput.addEventListener('keyup', respondToKeyUp);
autocompleteInput.addEventListener('blur', respondToBlur);
window.addEventListener('scroll', respondToScroll); //***************LISTENERS***************//

function respondToScroll(e) {
  if (window.pageYOffset > 0) {
    res.innerHTML = '';
    res.className = "";
  }
}

function respondToBlur(e) {
  setTimeout(function () {
    res.innerHTML = '';
    res.className = "";
  }, 1000);
}

function respondToKeyUp(e) {
  if (!e.target.value) {
    return;
  }

  if (e.which == 13) {
    window.location = '/blog?search=' + e.target.value;
  }

  res.className = "bg-gray-900 p-4 rounded mt-2 text-white w-2/12 fixed";
  res.innerHTML = '';
  var list = '';
  fetch('/suggest?search=' + e.target.value).then(function (response) {
    return response.json();
  }).then(function (data) {
    Array.from(data).forEach(function (term) {
      list += "<a href=\"".concat(term.url, "\">\n                            <li class=\"py-2 border-gray-50 border-b-1\">\n                                ").concat(term.title, "\n                            </li>\n                        </a>");
    });
    res.innerHTML = '<ul>' + list + '</ul>';
    return true;
  })["catch"](function (err) {
    console.warn('Something went wrong.', err);
    return false;
  });
}
/******/ })()
;