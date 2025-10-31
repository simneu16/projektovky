(function(){
    'use strict';

    function escapeHtml(s){
        return String(s || '').replace(/[&<>"']/g, c=>({ '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;' }[c]));
    }

    function buildProfileMarkup(name){
        const svgIcon = `<svg class="profile-svg" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
            <path d="M12 12c2.7 0 4.9-2.2 4.9-4.9S14.7 2.2 12 2.2 7.1 4.4 7.1 7.1 9.3 12 12 12zm0 2.2c-3.3 0-9.8 1.7-9.8 5v1.7h19.6V19.2c0-3.3-6.5-5-9.8-5z"/>
        </svg>`;

        return `
            <div class="profile-wrap">
                <button id="profileBtn" class="profile-btn" aria-haspopup="true" aria-expanded="false" type="button">
                    <span class="profile-icon">${svgIcon}</span>
                    <span class="profile-name">${escapeHtml(name)}</span>
                    <span class="profile-caret">▾</span>
                </button>

                <div id="profileDropdown" class="profile-dropdown" role="menu" aria-hidden="true">
                    <a href="html/profile.html" class="profile-item" role="menuitem">Zobraziť profil</a>
                    <button id="logoutBtn" class="profile-item logout" role="menuitem">Odhlásiť sa</button>
                </div>
            </div>
        `;
    }

    function initAuthUI(){
        const auth = document.getElementById('authLinkContainer');
        if (!auth) return;

        // keep original login link href if any
        const existingA = auth.querySelector('a');
        const loginHref = existingA ? existingA.getAttribute('href') : 'html/login.html';

        const userStr = sessionStorage.getItem('user') || localStorage.getItem('user');
        if (!userStr) {
            auth.innerHTML = `<a href="${loginHref}">Prihlásenie</a>`;
            return;
        }

        let user;
        try {
            user = JSON.parse(userStr);
        } catch (e) {
            console.error('Invalid user data in storage', e);
            auth.innerHTML = `<a href="${loginHref}">Prihlásenie</a>`;
            return;
        }

        const name = user.name || ((user.firstname || '') + ' ' + (user.lastname || '')).trim() || user.login || 'Používateľ';
        auth.innerHTML = buildProfileMarkup(name);

        const btn = document.getElementById('profileBtn');
        const dd = document.getElementById('profileDropdown');
        const logoutBtn = document.getElementById('logoutBtn');

        function closeDropdown(){
            if (!dd) return;
            dd.style.display = 'none';
            dd.setAttribute('aria-hidden', 'true');
            if (btn) btn.setAttribute('aria-expanded', 'false');
        }
        function openDropdown(){
            if (!dd) return;
            dd.style.display = 'block';
            dd.setAttribute('aria-hidden', 'false');
            if (btn) btn.setAttribute('aria-expanded', 'true');
        }

        btn.addEventListener('click', function(e){
            e.stopPropagation();
            if (dd.style.display === 'block') closeDropdown(); else openDropdown();
        });

        // close when clicking outside
        document.addEventListener('click', function(){
            closeDropdown();
        });

        // keyboard accessibility: Esc closes
        document.addEventListener('keydown', function(e){
            if (e.key === 'Escape') closeDropdown();
        });

        logoutBtn.addEventListener('click', function(){
            sessionStorage.removeItem('user');
            localStorage.removeItem('user');
            // reload to update UI on same page
            window.location.reload();
        });
    }

    // auto init on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAuthUI);
    } else {
        initAuthUI();
    }
})();