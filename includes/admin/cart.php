<?php include 'includes/header.php'; ?>

<div class="container my-5">
    <h2 class="mb-4">🛒 Your Cart</h2>
    <div id="cart-items"></div>
    <div class="text-end mt-3">
        <h4>Total: <span class="cart-total" id="cart-total">KSh 0</span></h4>
        <button class="btn btn-primary btn-lg mt-3" onclick="checkout()">Checkout</button>
    </div>
</div>

<script>
function loadCart() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let html = '<table class="table cart-table"><thead><tr><th>Item</th><th>Price</th><th>Action</th></tr></thead><tbody>';
    let total = 0;
    cart.forEach((item, index) => {
        html += `<tr>
            <td>${item.name}</td>
            <td>KSh ${item.price}</td>
            <td><button class="btn btn-sm btn-danger" onclick="removeItem(${index})">Remove</button></td>
        </tr>`;
        total += parseFloat(item.price);
    });
    html += '</tbody></table>';
    document.getElementById('cart-items').innerHTML = cart.length ? html : '<p>Your cart is empty.</p>';
    document.getElementById('cart-total').innerText = 'KSh ' + total.toFixed(2);
}

function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    loadCart();
}

function checkout() {
    alert('Order placed successfully! Asante! 🎉');
    localStorage.removeItem('cart');
    loadCart();
}

loadCart();
</script>

<?php include 'includes/footer.php'; ?>