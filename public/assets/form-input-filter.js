(function(){
    // Centralized input filtering for harga and stok using event delegation
    function sanitizeHargaValue(v){
        v = (v || '').replace(/[^0-9.]/g, '');
        const parts = v.split('.');
        if (parts.length > 1) {
            const intPart = parts.shift();
            let dec = parts.join('');
            dec = dec.substring(0,2);
            v = intPart + (dec.length ? '.' + dec : '');
        }
        if (v.startsWith('.')) v = '0' + v;
        return v;
    }

    function sanitizeStokValue(v){
        return (v || '').replace(/[^0-9]/g, '');
    }

    // Helper to insert cleaned paste text at caret
    function insertAtCaret(input, text){
        const start = input.selectionStart || 0;
        const end = input.selectionEnd || 0;
        const val = input.value || '';
        const newVal = val.slice(0, start) + text + val.slice(end);
        input.value = newVal;
        const pos = start + text.length;
        try { input.setSelectionRange(pos, pos); } catch (e) {}
    }

    // Intercept keydown (capture) to prevent forbidden keys including numpad variants
    document.addEventListener('keydown', function(e){
        const t = e.target;
        if (!t || t.tagName !== 'INPUT') return;
        const name = t.getAttribute('name');
        if (name !== 'harga' && name !== 'stok') return;

        const forbidden = ['-', 'Subtract', 'NumpadSubtract', '=', 'Equal', 'NumpadAdd'];
        if (forbidden.includes(e.key)) {
            e.preventDefault();
        }
    }, true);

    // beforeinput to prevent IME/other insertion of '-' or '='
    document.addEventListener('beforeinput', function(e){
        const t = e.target;
        if (!t || t.tagName !== 'INPUT') return;
        const name = t.getAttribute('name');
        if (name !== 'harga' && name !== 'stok') return;
        const data = e.data || '';
        if (/[-=]/.test(data)) e.preventDefault();
    }, true);

    // paste handling: clean pasted text before inserting
    document.addEventListener('paste', function(e){
        const t = e.target;
        if (!t || t.tagName !== 'INPUT') return;
        const name = t.getAttribute('name');
        if (name !== 'harga' && name !== 'stok') return;
        e.preventDefault();
        const text = (e.clipboardData || window.clipboardData).getData('text') || '';
        if (name === 'stok'){
            insertAtCaret(t, sanitizeStokValue(text));
        } else if (name === 'harga'){
            insertAtCaret(t, sanitizeHargaValue(text));
        }
    }, true);

    // input event: sanitize final value
    document.addEventListener('input', function(e){
        const t = e.target;
        if (!t || t.tagName !== 'INPUT') return;
        const name = t.getAttribute('name');
        if (name === 'stok'){
            const cleaned = sanitizeStokValue(t.value);
            if (t.value !== cleaned) t.value = cleaned;
        } else if (name === 'harga'){
            const cleaned = sanitizeHargaValue(t.value);
            if (t.value !== cleaned) t.value = cleaned;
        }
    }, true);
})();
(function(){
    function sanitizeHargaValue(v){
        // hanya digit dan titik
        v = (v || '').replace(/[^0-9.]/g, '');
        const parts = v.split('.');
        if (parts.length > 1) {
            const intPart = parts.shift();
            let dec = parts.join('');
            dec = dec.substring(0,2);
            v = intPart + (dec.length ? '.' + dec : '');
        }
        if (v.startsWith('.')) v = '0' + v;
        return v;
    }

    // Stok: hanya angka
    document.querySelectorAll('input[name="stok"]').forEach(input => {
        // prevent common key names (including numpad)
        input.addEventListener('keydown', function(e){
            const forbidden = ['-', 'Subtract', 'NumpadSubtract', '=', 'Equal', 'NumpadAdd'];
            if (forbidden.includes(e.key)) {
                e.preventDefault();
                return;
            }
        });

        // beforeinput gives more reliable prevention (paste, IME, etc.)
        input.addEventListener('beforeinput', function(e){
            const data = e.data || '';
            if (/[\-=]/.test(data)) {
                e.preventDefault();
            }
        });

        input.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        input.addEventListener('paste', function(e){
            e.preventDefault();
            const text = (e.clipboardData || window.clipboardData).getData('text') || '';
            this.value = text.replace(/[^0-9]/g, '');
        });
    });

    // Harga: hanya angka dan satu titik desimal, maksimal 2 angka desimal
    document.querySelectorAll('input[name="harga"]').forEach(input => {
        input.addEventListener('keydown', function(e){
            const forbidden = ['-', 'Subtract', 'NumpadSubtract', '=', 'Equal', 'NumpadAdd'];
            if (forbidden.includes(e.key)) {
                e.preventDefault();
                return;
            }
        });

        input.addEventListener('beforeinput', function(e){
            const data = e.data || '';
            if (/[\-=]/.test(data)) {
                e.preventDefault();
            }
        });

        input.addEventListener('input', function() {
            this.value = sanitizeHargaValue(this.value);
        });

        input.addEventListener('paste', function(e){
            e.preventDefault();
            const text = (e.clipboardData || window.clipboardData).getData('text') || '';
            this.value = sanitizeHargaValue(text);
        });
    });
})();
