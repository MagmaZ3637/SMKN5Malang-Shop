function testnotif(title, text, img, toURL) {
    console.log('kirim berhasil')
    const notif = new Notification(title, {
        body: text,
    });

    notif.onclick = function () {
        window.location.href = toURL
    };
}
