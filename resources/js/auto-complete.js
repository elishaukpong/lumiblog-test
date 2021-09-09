let autocompleteInput = document.getElementById('autocomplete');
var search_terms = ['apple', 'apple watch', 'apple macbook', 'apple macbook pro', 'iphone', 'iphone 12'];

autocompleteInput.addEventListener('keyup', function(e){
    res = document.getElementById("result");
    res.innerHTML = '';

    let list = '';
    let terms = autocompleteMatch(e.target.value);
    for (i=0; i<terms.length; i++) {
        list += '<li>' + terms[i] + '</li>';
    }
    res.innerHTML = '<ul>' + list + '</ul>';

});

function autocompleteMatch(input) {
    if (input == '') {
        return [];
    }
    var reg = new RegExp(input)
    return search_terms.filter(function(term) {
        if (term.match(reg)) {
            return term;
        }
    });
}

function showResults(val) {


}
