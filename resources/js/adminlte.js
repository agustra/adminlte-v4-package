// Import CSS
import '../css/adminlte.scss';

// Import Bootstrap
import 'bootstrap';

// Import AdminLTE
import 'admin-lte';

// Import libraries
import Swal from 'sweetalert2';
import Toastify from 'toastify-js';
import { OverlayScrollbars } from 'overlayscrollbars';

// Make libraries globally available
window.Swal = Swal;
window.Toastify = Toastify;
window.OverlayScrollbars = OverlayScrollbars;

// ===== GLOBAL TOAST FUNCTION =====
window.showToast = function(message, type = 'info') {
    const config = {
        success: {
            color: 'linear-gradient(to right, #00b09b, #96c93d)',
            icon: '✔️'
        },
        info: {
            color: 'linear-gradient(to right, #17a2b8, #5bc0de)',
            icon: 'ℹ️'
        },
        warning: {
            color: 'linear-gradient(to right, #ffc107, #ffea00)',
            icon: '⚠️'
        },
        error: {
            color: 'linear-gradient(to right, #dc3545, #ff6f61)',
            icon: '❌'
        }
    };
    
    const { color, icon } = config[type] || config.info;
    const iconStyle = 'background-color: rgba(255, 255, 255, 0.8); border-radius: 50%; padding: 5px; font-size: 13px;';
    
    Toastify({
        text: `<span style="${iconStyle}">${icon}</span> ${message}`,
        duration: 3000,
        close: true,
        gravity: 'bottom',
        position: 'right',
        escapeMarkup: false,
        style: { background: color, color: '#fff' }
    }).showToast();
};

// ===== DARK MODE FUNCTIONALITY =====
function initializeDarkMode() {
    // Set initial theme from localStorage
    const theme = localStorage.getItem('adminlte-theme') || 'light';
    if (theme === 'dark') {
        document.documentElement.setAttribute('data-bs-theme', 'dark');
    }
    
    // Theme toggle functionality
    document.addEventListener('click', function(e) {
        if (e.target.closest('[data-lte-toggle="theme"]')) {
            e.preventDefault();
            const currentTheme = document.documentElement.getAttribute('data-bs-theme') || 'light';
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            document.documentElement.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('adminlte-theme', newTheme);
            updateThemeIcons(newTheme);
        }
    });
    
    function updateThemeIcons(theme) {
        const darkIcon = document.querySelector('[data-lte-icon="dark"]');
        const lightIcon = document.querySelector('[data-lte-icon="light"]');
        
        if (darkIcon && lightIcon) {
            if (theme === 'dark') {
                darkIcon.style.display = 'none';
                lightIcon.style.display = 'inline';
            } else {
                darkIcon.style.display = 'inline';
                lightIcon.style.display = 'none';
            }
        }
    }
    
    // Set initial icon state
    updateThemeIcons(theme);
}

// ===== OVERLAY SCROLLBARS =====
function initializeOverlayScrollbars() {
    const sidebarWrapper = document.querySelector('.sidebar-wrapper');
    const isMobile = window.innerWidth <= 992;
    
    if (sidebarWrapper && !isMobile) {
        OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
                theme: 'os-theme-light',
                autoHide: 'leave',
                clickScroll: true
            }
        });
    }
}

// ===== SWEETALERT2 CONFIG =====
function configureSweetAlert() {
    Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-primary me-2',
            cancelButton: 'btn btn-secondary'
        },
        buttonsStyling: false
    });
}

// ===== DOM READY INITIALIZATION =====
document.addEventListener('DOMContentLoaded', function() {
    initializeDarkMode();
    initializeOverlayScrollbars();
    configureSweetAlert();
});