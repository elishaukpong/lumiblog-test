let deleteTargets = document.getElementsByClassName('delete');

Array.from(deleteTargets).forEach(function(element) {
    element.addEventListener('click', submitDelete);
});

function submitDelete(e){
    e.preventDefault();

    let deleteElement = document.getElementById('delete');
    deleteElement.action = e.target.href;

    deleteElement.submit();
}
