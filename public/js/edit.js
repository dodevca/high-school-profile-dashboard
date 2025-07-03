async function saveData() {
    const form = document.querySelector('#edit-form');
    const data = new FormData(form);
            
    try {
        const res = await fetch(form.action, {
            method: form.method,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: data
        });
        const json = await res.json();

        if (res.ok) {
            showAlert('success', json.message);
        } else if (res.status === 422) {
            showAlert('danger', Object.values(json.errors).flat());
        } else {
            showAlert('danger', json.error || 'Something went wrong');
        }
    } catch (err) {
        showAlert('#alert-container', 'danger', 'Kesalahan jaringan, coba lagi.');
    }
}