document.addEventListener("DOMContentLoaded", () => {
    if (!("Notification" in window)) {
        console.log("This browser does not support notifications.");
        alert("This browser does not support notifications. try to change another web browser")
        return;
    }
    if (Notification.permission !== 'default') {
        return;
    }
    Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {
            toast('success', 'Notifikasi Diizinkan', 'Anda akan mendapatkan pemberitahuan tentang status item, stock, dll')
        } else {
            toast('error', 'Notifikasi Ditolak', 'Anda tidak akan mendapatkan pemberitahuan tentang status item, stock, dll')
        }
    });
});

function toast(type, judul, message) {
    const container = document.querySelector(".toast-container");

    const colors = {
        success: "#1fdd06",
        warning: "#d4e709",
        info: "#0983e7",
        error: "#fa0000"
    };

    const icons = {
        success: `
            <svg width="28" height="28" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <path d="m9 11 3 3L22 4"></path>
            </svg>
        `,
        warning: `
            <svg width="28" height="28" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" x2="12" y1="8" y2="12"></line>
                <line x1="12" x2="12.01" y1="16" y2="16"></line>
            </svg>
        `,
        info: `
            <svg width="28" height="28" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M12 16v-4"></path>
                <path d="M12 8h.01"></path>
            </svg>
        `,
        error: `
            <svg width="28" height="28" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="m15 9-6 6"></path>
                <path d="m9 9 6 6"></path>
            </svg>
        `
    };

    const div = document.createElement("div");
    div.className = "toast";
    div.style.background = colors[type] ?? colors.error;

    div.innerHTML = `
        <div>${icons[type] ?? icons.error}</div>
        <div>
            <div class="font-bold text-lg">${judul}</div>
            <div class="text-sm">${message}</div>
        </div>
    `;

    container.appendChild(div);

    // Hapus setelah animasi selesai (5 detik)
    setTimeout(() => {
        div.remove();
    }, 5000);
}
