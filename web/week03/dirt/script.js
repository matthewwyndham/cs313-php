var newScript = document.createElement('script');
newScript.type = 'text/javascript';
newScript.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js';
document.getElementsByTagName('head')[0].appendChild(newScript);

function add(block, amount) {
    document.getElementById('blockType').value = block;
    document.getElementById('addToCart').submit();    
}

function remove(index) {
    document.getElementById('index').value = index;
    document.getElementById('remover').submit(); 
}