<?php include 'includes/header.php'; ?>

<section class="section">
    <div class="container">
        <span class="section-label">Checkout</span>
        <h2 class="section-title">Your <em>Cart</em></h2>
        <p class="section-sub">Review your items before placing your order</p>

        <div style="display:grid; grid-template-columns:1fr 340px; gap:30px; align-items:start;">
            <div class="cart-box">
                <div class="cart-box-head">🛍️ Items in your cart</div>
                <div id="cart-items"></div>
            </div>
            <div class="cart-summary">
                <div class="cart-total-label">Order Total</div>
                <div class="cart-total-num" id="cart-total">KSh 0</div>
                <hr class="divider">
                <button onclick="checkout()" class="btn-red" style="width:100%; padding:16px; font-size:0.95rem; text-align:center;">
                    ✅ Place Order
                </button>
                <a href="shop.php" class="btn-outline-light">← Continue Shopping</a>
            </div>
        </div>
    </div>
</section>

<script>
function loadCart() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let container = document.getElementById('cart-items');
    let total = 0;

    if (cart.length === 0) {
        container.innerHTML = `<div class="empty-cart">
            <span class="empty-icon">🛒</span>
            <p style="font-size:1.1rem; margin-bottom:6px; color:#333; font-weight:500;">Your cart is empty</p>
            <p style="font-size:0.85rem; margin-bottom:20px;">Browse the shop and add some items!</p>
            <a href="shop.php" class="btn-dark">Start Shopping</a>
        </div>`;
        document.getElementById('cart-total').innerText = 'KSh 0';
        return;
    }

    let html = `<table class="cart-tbl"><thead><tr><th>Item</th><th>Price</th><th>Remove</th></tr></thead><tbody>`;
    cart.forEach((item, index) => {
        html += `<tr>
            <td><strong>${item.name}</strong></td>
            <td style="color:#C8102E; font-weight:600; font-size:1rem;">KSh ${Number(item.price).toLocaleString()}</td>
            <td><button class="btn-danger-sm" onclick="removeItem(${index})">🗑 Remove</button></td>
        </tr>`;
        total += parseFloat(item.price);
    });
    html += '</tbody></table>';
    container.innerHTML = html;
    document.getElementById('cart-total').innerText = 'KSh ' + total.toLocaleString();
}

function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    loadCart();
    updateCartCount();
}

function checkout() {
    if ((JSON.parse(localStorage.getItem('cart')) || []).length === 0) {
        alert('Your cart is empty!');
        return;
    }
    alert('🎉 Order placed successfully! Asante sana!');
    localStorage.removeItem('cart');
    loadCart();
    updateCartCount();
}

loadCart();
</script>

<?php include 'includes/footer.php'; ?>