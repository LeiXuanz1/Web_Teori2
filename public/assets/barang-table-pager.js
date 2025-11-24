(function(){
    // Pagination and realtime search for barang table
    const allRows = Array.from(document.querySelectorAll('#barangTable tbody .data-row'));
    const rowsPerPageSelect = document.getElementById('rowsPerPage');
    const prevBtn = document.getElementById('prevPage');
    const nextBtn = document.getElementById('nextPage');
    const pageIndicator = document.getElementById('pageIndicator');
    const searchInput = document.querySelector('input[name="search"]');

    if (!rowsPerPageSelect || !prevBtn || !nextBtn || !pageIndicator || allRows.length === 0) return;

    let currentPage = 1;
    let rowsPerPage = parseInt(rowsPerPageSelect.value,10) || 5;
    // visibleRows is the current filtered list (subset of allRows)
    let visibleRows = allRows.slice();

    function render(){
        const total = visibleRows.length;
        const totalPages = Math.max(1, Math.ceil(total / rowsPerPage));
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;

        // hide all first
        allRows.forEach(r => r.style.display = 'none');

        const start = (currentPage -1) * rowsPerPage;
        const end = start + rowsPerPage;
        visibleRows.slice(start, end).forEach(r => r.style.display = 'table-row');

        pageIndicator.textContent = currentPage + ' / ' + totalPages;
        prevBtn.disabled = currentPage <= 1;
        nextBtn.disabled = currentPage >= totalPages;
    }

    function applyFilter(term){
        term = (term || '').trim().toLowerCase();
        if (!term) {
            visibleRows = allRows.slice();
        } else {
            visibleRows = allRows.filter(r => {
                // only check the Nama Barang column (td index 1)
                const nameCell = r.querySelectorAll('td')[1];
                const nameText = nameCell ? nameCell.textContent.trim().toLowerCase() : '';
                return nameText.indexOf(term) !== -1;
            });
        }
        currentPage = 1;
        render();
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
        const totalPages = Math.max(1, Math.ceil(visibleRows.length / rowsPerPage));
        if (currentPage < totalPages) { currentPage++; render(); }
    });

    // realtime search handling
    if (searchInput) {
        // prevent Enter from submitting the form (we use realtime filter)
        searchInput.addEventListener('keydown', function(e){
            if (e.key === 'Enter') {
                e.preventDefault();
            }
        });

        // input event for realtime filtering
        searchInput.addEventListener('input', function(e){
            applyFilter(e.target.value);
        });
    }

    // initial render
    render();
})();
