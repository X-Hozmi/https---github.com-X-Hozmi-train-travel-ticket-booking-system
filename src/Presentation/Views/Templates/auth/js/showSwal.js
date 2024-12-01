document.addEventListener('DOMContentLoaded', () => {
    const userButton = document.getElementById('show-swal');

    userButton.onclick = handleLogout;
});

async function handleLogout() {
    Swal.fire({
        icon: 'success',
        title: 'ANJAY DI CLICK BEJIR',
    });
}