function add(block, amount) {
    document.getElementById('blockType').value = block;
    document.getElementById('addToCart').submit();    
}

function remove(index) {
    document.getElementById('index').value = index;
    document.getElementById('remover').submit(); 
}