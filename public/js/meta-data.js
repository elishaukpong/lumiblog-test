/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/meta-data.js ***!
  \***********************************/
document.getElementById('meta-button').addEventListener('click', function (e) {
  e.preventDefault();

  if (document.getElementsByClassName('meta-data').length > 2) {
    e.target.remove();
    return;
  }

  document.getElementById('meta').innerHTML += "\n                            <div class=\"flex my-5 meta-data\">\n                                <input id=\"title\" class=\"rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mx-2 inline-block mt-1 w-full\" type=\"text\" name=\"meta_name[]\" placeholder=\"Meta Title\" required/>\n                                <input id=\"title\" class=\"rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mx-2 inline-block mt-1 w-full\" type=\"text\" name=\"meta_content[]\" placeholder=\"Meta Description\" required />\n                            </div>";
});
/******/ })()
;