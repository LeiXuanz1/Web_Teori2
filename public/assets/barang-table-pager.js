(function(){
    // Pagination for barang table moved from view
    const rows = Array.from(document.querySelectorAll('#barangTable tbody .data-row'));
    const rowsPerPageSelect = document.getElementById('rowsPerPage');
    const prevBtn = document.getElementById('prevPage');
    const nextBtn = document.getElementById('nextPage');
    const pageIndicator = document.getElementById('pageIndicator');

    if (!rowsPerPageSelect || !prevBtn || !nextBtn || !pageIndicator || rows.length === 0) return;

    let currentPage = 1;
    let rowsPerPage = parseInt(rowsPerPageSelect.value,10) || 5;

    function render(){
        const total = rows.length;
        const totalPages = Math.max(1, Math.ceil(total / rowsPerPage));
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;

        rows.forEach(r => r.style.display = 'none');

        const start = (currentPage -1) * rowsPerPage;
        const end = start + rowsPerPage;
        rows.slice(start, end).forEach(r => r.style.display = 'table-row');

        pageIndicator.textContent = currentPage + ' / ' + totalPages;
        prevBtn.disabled = currentPage <= 1;
        nextBtn.disabled = currentPage >= totalPages;
    }

    rowsPerPageSelect.addEventListener('change', function(){
        rowsPerPage = parseInt(this.value,10);
        currentPage = 1;
        render();
    });

    prevBtn.addEventListener('click', function(e){
        e.preventDefault();
        if (currentPage > 1) { currentPage--; render(); }
    });

    nextBtn.addEventListener('click', function(e){
        e.preventDefault();
        const totalPages = Math.max(1, Math.ceil(rows.length / rowsPerPage));
        if (currentPage < totalPages) { currentPage++; render(); }
    });

    // initial render
    render();
})();
