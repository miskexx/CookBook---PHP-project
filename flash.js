        // počká 3 vteřiny a pak zprávu schová
    setTimeout(function() {
        var flash = document.getElementById('flash-message');
        if (flash) {
            flash.style.opacity = '0';
            setTimeout(() => flash.remove(), 500); // počkej na fade-out a pak element smaž
        }
    }, 3000); // 3000 ms = 3 sekundy
