function updateCartCount() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let badge = document.getElementById('cart-count');
    if (badge) badge.innerText = cart.length;
}
updateCartCount();