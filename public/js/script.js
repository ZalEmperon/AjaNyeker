document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.cart-check');
    const selectedItems = document.getElementById('selected-items');
    const selectedTotal = document.getElementById('selected-total');
    const selectedGrandTotal = document.getElementById('selected-grand-total');

    function updateSummary() {
        let totalItems = 0;
        let totalPrice = 0;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const harga = parseInt(checkbox.getAttribute('data-harga'));
                const jumlah = parseInt(checkbox.getAttribute('data-jumlah'));
                totalItems += jumlah;
                totalPrice += harga * jumlah;
            }
        });

        // Update Order Summary
        selectedItems.textContent = totalItems;
        selectedTotal.textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
        selectedGrandTotal.textContent = `Rp ${(totalPrice - 20000).toLocaleString('id-ID')}`; // Kurangi Tax
    }

    // Event Listener untuk Checkbox
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSummary);
    });

    // Inisialisasi pertama kali
    updateSummary();
});

document.querySelector('.submittor').addEventListener('click', function(e) {
    e.preventDefault(); 

    const selectedItems = [];
    
    document.querySelectorAll('.cart-check:checked').forEach(checkbox => {
        selectedItems.push({
            id_sepatu: checkbox.dataset.id_sepatu, // Retrieve data-id_sepatu from checkbox
            jumlah_produk: checkbox.dataset.jumlah, // Retrieve data-jumlah from checkbox
            ukuran_sepatu: checkbox.dataset.ukuran, // Retrieve data-ukuran from checkbox
            varian_sepatu: checkbox.dataset.varian, // Retrieve data-varian from checkbox
        });
    });

    if (selectedItems.length === 0) {
        alert("Please select at least one item.");
        return;
    }

    const selectedItemsInput = document.getElementById('selected-items-input');
    selectedItemsInput.value = JSON.stringify(selectedItems); 

    document.getElementById('checkout-form').submit();
});
