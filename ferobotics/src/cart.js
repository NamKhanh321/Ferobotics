document.addEventListener('DOMContentLoaded', () => {
    let progress = document.getElementById("progressbar");
    if (progress) {
        let totalHeight = document.body.scrollHeight - window.innerHeight;
        window.onscroll = function () {
            let progressHeight = (window.pageYOffset / totalHeight) * 100;
            progress.style.height = progressHeight + "%";
        };
    }

   
    function updateTotal() {
        let totalPrice = 0;
        const items = document.querySelectorAll('.item');

        items.forEach(item => {
            const price = parseFloat(item.getAttribute('data-price'));
            const quantity = parseInt(item.querySelector('.quantity-num').value);
            totalPrice += price * quantity;
        });

        document.getElementById('total-price').textContent = totalPrice.toLocaleString('vi-VN') + ' ₫';
    }

    updateTotal();

    function updateTotalSale() {
        let totalSale = 0;
        const items = document.querySelectorAll('.item');

        items.forEach(item => {
            if (item.hasAttribute('data-price-sale')) {
                const price = parseFloat(item.getAttribute('data-price-sale'));
                const quantity = parseInt(item.querySelector('.quantity-num').value);
                totalSale += price * quantity;

            }
        });

        document.getElementById('total-sale').textContent = totalSale.toLocaleString('vi-VN') + ' ₫';
    }

    function updateTotalall() {
        let totalPrice = 0;
        const items = document.querySelectorAll('.item');

        items.forEach(item => {
            const price = parseFloat(item.getAttribute('data-price'));
            const quantity = parseInt(item.querySelector('.quantity-num').value);
            totalPrice += price * quantity;
        });

        // Cộng thêm 50,000 vào tổng giá
        totalPrice += 50000;

        document.getElementById('total').textContent = totalPrice.toLocaleString('vi-VN') + ' ₫';
    }

    updateTotalall()
    updateTotalSale();
    const quantityInputs = document.querySelectorAll('.quantity-num');
    quantityInputs.forEach(input => {
        input.addEventListener('change', updateTotal);
        const items = document.querySelectorAll('.item');

        items.forEach(item => {
            if (item.hasAttribute('data-price-sale')) {
                updateTotalSale();
            }
        });
    });
    const decreaseButtons = document.querySelectorAll('.decrease-btn');
    const increaseButtons = document.querySelectorAll('.increase-btn');
    const quantityForms = document.querySelectorAll('.quantity-form');

    decreaseButtons.forEach(button => button.addEventListener('click', (event) => {
        event.preventDefault();
        const form = button.closest('.quantity-form');
        const quantityInput = form.querySelector('.quantity-num');
        if (quantityInput.value > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
            form.submit();
        }
    }));

    increaseButtons.forEach(button => button.addEventListener('click', (event) => {
        event.preventDefault();
        const form = button.closest('.quantity-form');
        const quantityInput = form.querySelector('.quantity-num');
        quantityInput.value = parseInt(quantityInput.value) + 1;
        form.submit();
    }));

    function deleteButton(event) {
        const form = event.target.closest('form');
        const formData = new FormData(form);

        fetch('cart.php', {
            method: 'POST',
            body: formData
        }).then(response => response.text())
            .then(data => {
                location.reload();
            });
    }

    const deleteButtons = document.querySelectorAll('.delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', deleteButton);
    });
});
function showAlert() {
    Swal.fire({
        title: 'THÔNG BÁO',
        text: 'Đơn hàng sẽ sớm giao đến địa chỉ vui lòng thanh toán khi nhận hàng',
        icon: 'success',
        showConfirmButton: false,
        timer: 1800,
        customClass: {
            popup: 'roboto-regular'
        }
    });
}
function showErrorAlert() {
    Swal.fire({
        title: 'THÔNG BÁO',
        text: 'Vui lòng đăng nhập!',
        icon: 'error',
        timer: 1500,
        customClass: {
            popup: 'roboto-regular'
        }
    });
}


