let toolTipTargets = document.getElementsByClassName('tooltip-text');

Array.from(toolTipTargets).forEach(function(element) {
    element.addEventListener('mouseenter', showToolTip);
    element.addEventListener('mouseout', removeToolTip);
});


function showToolTip(event)
{
    let tooltipElem = document.createElement('div');
    tooltipElem.className = 'tooltip';
    tooltipElem.id = 'tool-text';
    tooltipElem.innerHTML = event.target.dataset.text;
    document.body.append(tooltipElem);

    let coords = event.target.getBoundingClientRect();

    let left = coords.left + (event.target.offsetWidth - tooltipElem.offsetWidth) / 2;
    if (left < 0) left = 0;

    let top = coords.top - tooltipElem.offsetHeight - 5;
    if (top < 0) {
        top = coords.top + target.offsetHeight + 5;
    }

    tooltipElem.style.left = left + 'px';
    tooltipElem.style.top = top + 'px';

}

function removeToolTip(event)
{
    let toolTip = document.getElementById('tool-text');
    toolTip.remove();
}
