@import url("https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js")
function add(block, amount) {
    document.getElementById('blockType').value = block;
    document.getElementById('addToCart').submit();    
}

function remove(index) {
    document.getElementById('index').value = index;
    document.getElementById('remover').submit(); 
}