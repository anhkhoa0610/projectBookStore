// Usage: Add class "add-to-cart-btn" and data-book-id="{{ $book->book_id }}" to your add-to-cart buttons

document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const bookId = this.getAttribute('data-book-id');
        fetch(`/cart/add/${bookId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Đã thêm vào giỏ hàng!');
                // Optionally update cart count here
            } else {
                alert(data.message || 'Có lỗi xảy ra!');
            }
        })
        .catch(() => alert('Có lỗi xảy ra!'));
    });
});

// Example JS for updating quantity
function updateCartQuantity(cartId, newQuantity) {
    fetch(`/api/cart/${cartId}`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        },
        body: JSON.stringify({ quantity: newQuantity })
    })
    .then(res => res.json())
    .then(data => {
        if (!data.success) {
            alert(data.message || 'Cập nhật số lượng thất bại!');
        }
    });
}