function addData() {
    var form = document.getElementById('add-form');
    if (!form) return;
    var data = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: data
    })
    .then(async function(response) {
        const json = await response.json();
        return { ok: response.ok, status: response.status, json: json };
    })
    .then(function(res) {
        if (res.ok) {
            showAlert('success', res.json.message || 'Data berhasil ditambahkan.');
        } else if (res.status === 422) {
            var errs = [];
            for (var key in res.json.errors) {
                errs = errs.concat(res.json.errors[key]);
            }
            showAlert('danger', errs);
        } else {
            showAlert('danger', res.json.error || 'Terjadi kesalahan.');
        }
    })
    .catch(function(err) {
        console.error(err);
        showAlert('danger', 'Terjadi kesalahan jaringan, silakan coba lagi.');
    });
}