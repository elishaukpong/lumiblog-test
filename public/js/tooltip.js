/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/tooltip.js ***!
  \*********************************/
var toolTipTargets = document.getElementsByClassName('tooltip-text');
Array.from(toolTipTargets).forEach(function (element) {
  element.addEventListener('mouseenter', showToolTip);
  element.addEventListener('mouseout', removeToolTip);
});

function showToolTip(event) {
  var tooltipElem = document.createElement('div');
  tooltipElem.className = 'tooltip';
  tooltipElem.id = 'tool-text';
  tooltipElem.innerHTML = event.target.dataset.text;
  document.body.append(tooltipElem);
  var coords = event.target.getBoundingClientRect();
  var left = coords.left + (event.target.offsetWidth - tooltipElem.offsetWidth) / 2;
  if (left < 0) left = 0;
  var top = coords.top - tooltipElem.offsetHeight - 5;

  if (top < 0) {
    top = coords.top + target.offsetHeight + 5;
  }

  tooltipElem.style.left = left + 'px';
  tooltipElem.style.top = top + 'px';
}

function removeToolTip(event) {
  var toolTip = document.getElementById('tool-text');
  toolTip.remove();
}
/******/ })()
;