// Filter input harga dan stok - hanya angka saja
document.querySelectorAll('input[pattern="[0-9]+"]').forEach(input => {
    input.addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
});
