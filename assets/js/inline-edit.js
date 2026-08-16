// Inline Edit Mode - Ctrl+T to enable, Ctrl+S to save
(function(){
    let editMode = false;
    let passwordFile = 'data/.edit_password.json';
    
    // Load stored password or use default
    function getPassword(callback) {
        fetch(passwordFile + '?t=' + Date.now())
            .then(r => r.ok ? r.json() : Promise.resolve({password: '2026'}))
            .then(data => callback(data.password || '2026'))
            .catch(() => callback('2026'));
    }
    
    // Save password
    function savePassword(pwd, callback) {
        fetch('assets/save_password.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({password: pwd})
        })
        .then(r => r.json())
        .then(data => callback(data.success))
        .catch(() => callback(false));
    }
    
    // Show password modal
    function showPasswordModal(callback) {
        const overlay = document.createElement('div');
        overlay.id = 'edit-auth-overlay';
        overlay.style.cssText = 'position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.6);z-index:99999;display:flex;align-items:center;justify-content:center;font-family:Inter,sans-serif;';
        
        const modal = document.createElement('div');
        modal.style.cssText = 'background:#fff;padding:32px;border-radius:24px;max-width:420px;width:calc(100% - 40px);box-shadow:0 30px 80px rgba(0,0,0,.3);';
        
        modal.innerHTML = `
            <h3 style="margin:0 0 8px;font-size:20px;color:#0f5c4d;">Tahrirlash rejimi</h3>
            <p style="margin:0 0 20px;color:#68736e;font-size:14px;">Parolni kiriting</p>
            <input type="password" id="edit-password-input" placeholder="Parol" 
                style="width:100%;padding:14px;border:1px solid #dce5e1;border-radius:14px;font-size:15px;margin-bottom:12px;box-sizing:border-box;">
            <div id="edit-error" style="color:#8b3030;font-size:13px;margin-bottom:12px;display:none;"></div>
            <button id="edit-confirm-btn" 
                style="width:100%;padding:14px;background:#0f5c4d;color:#fff;border:none;border-radius:14px;font-size:15px;font-weight:700;cursor:pointer;">Davom etish →</button>
            <button id="edit-cancel-btn" 
                style="width:100%;padding:12px;background:#f4f6f4;color:#68736e;border:none;border-radius:14px;font-size:14px;margin-top:8px;cursor:pointer;">Bekor qilish</button>
        `;
        
        overlay.appendChild(modal);
        document.body.appendChild(overlay);
        
        const input = document.getElementById('edit-password-input');
        const confirmBtn = document.getElementById('edit-confirm-btn');
        const cancelBtn = document.getElementById('edit-cancel-btn');
        const errorDiv = document.getElementById('edit-error');
        
        input.focus();
        
        function close() {
            overlay.remove();
        }
        
        function checkPassword() {
            const enteredPwd = input.value;
            getPassword(storedPwd => {
                if (enteredPwd === storedPwd) {
                    close();
                    callback(true);
                } else {
                    errorDiv.textContent = 'Parol noto\'g\'ri!';
                    errorDiv.style.display = 'block';
                    input.value = '';
                    input.focus();
                }
            });
        }
        
        confirmBtn.onclick = checkPassword;
        cancelBtn.onclick = () => { close(); callback(false); };
        input.onkeydown = e => {
            if (e.key === 'Enter') checkPassword();
            if (e.key === 'Escape') { close(); callback(false); }
        };
    }
    
    // Show change password modal
    function showChangePasswordModal() {
        const overlay = document.createElement('div');
        overlay.id = 'edit-change-overlay';
        overlay.style.cssText = 'position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.6);z-index:99999;display:flex;align-items:center;justify-content:center;font-family:Inter,sans-serif;';
        
        const modal = document.createElement('div');
        modal.style.cssText = 'background:#fff;padding:32px;border-radius:24px;max-width:420px;width:calc(100% - 40px);box-shadow:0 30px 80px rgba(0,0,0,.3);';
        
        modal.innerHTML = `
            <h3 style="margin:0 0 8px;font-size:20px;color:#0f5c4d;">Yangi parol o'rnatish</h3>
            <p style="margin:0 0 20px;color:#68736e;font-size:14px;">Yangi parol kiriting va tasdiqlang</p>
            <input type="password" id="new-password-1" placeholder="Yangi parol" 
                style="width:100%;padding:14px;border:1px solid #dce5e1;border-radius:14px;font-size:15px;margin-bottom:12px;box-sizing:border-box;">
            <input type="password" id="new-password-2" placeholder="Yangi parolni tasdiqlang" 
                style="width:100%;padding:14px;border:1px solid #dce5e1;border-radius:14px;font-size:15px;margin-bottom:12px;box-sizing:border-box;">
            <div id="change-error" style="color:#8b3030;font-size:13px;margin-bottom:12px;display:none;"></div>
            <button id="change-confirm-btn" 
                style="width:100%;padding:14px;background:#0f5c4d;color:#fff;border:none;border-radius:14px;font-size:15px;font-weight:700;cursor:pointer;">Saqlash</button>
            <button id="change-cancel-btn" 
                style="width:100%;padding:12px;background:#f4f6f4;color:#68736e;border:none;border-radius:14px;font-size:14px;margin-top:8px;cursor:pointer;">Bekor qilish</button>
        `;
        
        overlay.appendChild(modal);
        document.body.appendChild(overlay);
        
        const input1 = document.getElementById('new-password-1');
        const input2 = document.getElementById('new-password-2');
        const confirmBtn = document.getElementById('change-confirm-btn');
        const cancelBtn = document.getElementById('change-cancel-btn');
        const errorDiv = document.getElementById('change-error');
        
        input1.focus();
        
        function close() {
            overlay.remove();
        }
        
        function confirmChange() {
            const pwd1 = input1.value;
            const pwd2 = input2.value;
            
            if (!pwd1 || pwd1.length < 1) {
                errorDiv.textContent = 'Parol bo\'sh bo\'lishi mumkin emas!';
                errorDiv.style.display = 'block';
                return;
            }
            
            if (pwd1 !== pwd2) {
                errorDiv.textContent = 'Parollar mos kelmadi!';
                errorDiv.style.display = 'block';
                input2.value = '';
                input2.focus();
                return;
            }
            
            savePassword(pwd1, success => {
                if (success) {
                    alert('Parol muvaffaqiyatli o\'zgartirildi!');
                    close();
                } else {
                    errorDiv.textContent = 'Xatolik yuz berdi. Qayta urinib ko\'ring.';
                    errorDiv.style.display = 'block';
                }
            });
        }
        
        confirmBtn.onclick = confirmChange;
        cancelBtn.onclick = close;
        input2.onkeydown = e => {
            if (e.key === 'Enter') confirmChange();
            if (e.key === 'Escape') close();
        };
    }
    
    // Enable edit mode on page
    function enableEditMode() {
        if (editMode) return;
        editMode = true;
        
        // Add visual indicator
        const indicator = document.createElement('div');
        indicator.id = 'edit-mode-indicator';
        indicator.style.cssText = 'position:fixed;bottom:20px;right:20px;background:#0f5c4d;color:#fff;padding:12px 18px;border-radius:99px;font-size:13px;font-weight:700;z-index:99998;box-shadow:0 10px 30px rgba(15,92,77,.3);display:flex;align-items:center;gap:8px;';
        indicator.innerHTML = '✏️ Tahrirlash rejimi <span style="opacity:.7">Ctrl+S saqlash</span>';
        document.body.appendChild(indicator);
        
        // Make all text content editable
        document.querySelectorAll('h1,h2,h3,h4,h5,h6,p,span,a,li,td,th,label').forEach(el => {
            if (!el.closest('#edit-mode-indicator, .no-edit, nav, footer')) {
                el.setAttribute('data-original-content', el.innerHTML);
                el.contentEditable = 'true';
                el.style.outline = '2px dashed rgba(15,92,77,.3)';
                el.style.borderRadius = '4px';
            }
        });
        
        // Make inputs editable
        document.querySelectorAll('input:not([type="hidden"]),textarea').forEach(el => {
            el.setAttribute('data-original-value', el.value);
            el.style.outline = '2px dashed rgba(15,92,77,.3)';
            el.style.borderRadius = '4px';
        });
        
        // Add change password button
        const changeBtn = document.createElement('button');
        changeBtn.textContent = '🔑 Parolni o\'zgartirish';
        changeBtn.style.cssText = 'position:fixed;bottom:70px;right:20px;background:#174f45;color:#fff;padding:10px 16px;border:none;border-radius:99px;font-size:12px;font-weight:700;z-index:99998;cursor:pointer;box-shadow:0 8px 20px rgba(23,79,69,.2);';
        changeBtn.onclick = showChangePasswordModal;
        document.body.appendChild(changeBtn);
        
        console.log('Tahrirlash rejimi yoqildi');
    }
    
    // Save changes
    function saveChanges() {
        if (!editMode) {
            alert('Avval Ctrl+T bosib tahrirlash rejimini yoqing!');
            return;
        }
        
        const changes = [];
        
        // Collect changed content
        document.querySelectorAll('[contenteditable="true"]').forEach(el => {
            const original = el.getAttribute('data-original-content');
            const current = el.innerHTML;
            if (original !== current) {
                changes.push({
                    type: 'content',
                    selector: getElementSelector(el),
                    original: original,
                    current: current
                });
            }
        });
        
        // Collect changed inputs
        document.querySelectorAll('input:not([type="hidden"]),textarea').forEach(el => {
            const original = el.getAttribute('data-original-value');
            const current = el.value;
            if (original !== current) {
                changes.push({
                    type: 'input',
                    selector: getElementSelector(el),
                    original: original,
                    current: current
                });
            }
        });
        
        if (changes.length === 0) {
            alert('Hech qanday o\'zgarish yo\'q.');
            return;
        }
        
        // Send to server
        fetch('assets/save_inline.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({changes: changes, page: window.location.pathname})
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                alert('O\'zgarishlar saqlandi! (' + changes.length + ' ta)');
                // Update original values
                document.querySelectorAll('[contenteditable="true"]').forEach(el => {
                    el.setAttribute('data-original-content', el.innerHTML);
                });
                document.querySelectorAll('input:not([type="hidden"]),textarea').forEach(el => {
                    el.setAttribute('data-original-value', el.value);
                });
            } else {
                alert('Xatolik: ' + (data.error || 'Noma\'lum xatolik'));
            }
        })
        .catch(e => {
            alert('Server bilan bog\'lanishda xatolik: ' + e.message);
        });
    }
    
    // Get unique selector for element
    function getElementSelector(el) {
        if (el.id) return '#' + el.id;
        if (el.className) {
            const tag = el.tagName.toLowerCase();
            const classes = el.className.split(' ').filter(c => c).join('.');
            return tag + '.' + classes;
        }
        return el.tagName.toLowerCase();
    }
    
    // Keyboard shortcuts
    document.addEventListener('keydown', e => {
        // Ctrl+T - Enable edit mode
        if (e.ctrlKey && e.key === 't') {
            e.preventDefault();
            if (!editMode) {
                showPasswordModal(success => {
                    if (success) enableEditMode();
                });
            }
        }
        
        // Ctrl+S - Save changes
        if (e.ctrlKey && e.key === 's') {
            e.preventDefault();
            saveChanges();
        }
    });
    
    console.log('Inline Edit Module loaded. Press Ctrl+T to enable edit mode.');
})();
