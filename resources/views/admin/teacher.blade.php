@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Guru dan Staff'],
        ]
    ])
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-end mb-3">
                <a href="{{ route('admin.teacher.add') }}" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i>Tambah guru
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
                <form id="searchForm" class="input-group mb-3 mb-md-0 w-100" style="max-width: 360px;" role="search">
                    <input id="searchInput" type="search" class="form-control" placeholder="Cari nama atau pelajaran..." aria-label="Search">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </form>
                <div class="d-flex align-items-center justify-content-end">
                    <select class="form-select me-2" id="priorityFilter">
                        <option value="">Semua Jabatan</option>
                        <option value="0">Kepala Sekolah</option>
                        <option value="1">Wakil Kepala Sekolah</option>
                        <option value="2">Guru</option>
                        <option value="3">Staff</option>
                        <option value="4">Lainnya</option>
                    </select>
                    <select class="form-select" id="sortSelect">
                        <option value="created_at|desc">Terbaru</option>
                        <option value="created_at|asc">Terlama</option>
                        <option value="priority|desc">Jabatan &uarr;</option>
                        <option value="priority|asc">Jabatan &darr;</option>
                        <option value="name|asc">A-Z</option>
                        <option value="name|desc">Z-A</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row g-3" id="teacherContainer">
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center" id="pagination"></ul>
            </nav>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('js/alert.js') }}"></script>
<script>
    $(function(){
        var currentPage = 1;
        var perPage     = 12;

        function loadTeachers() {
            var search   = $('#searchInput').val(),
                priority = $('#priorityFilter').val();
                sort     = $('#sortSelect').val();

            $.getJSON("{{ route('api.admin.teacher.index') }}", {
                search:  search,
                sort:    sort,
                priority: priority,
                page:    currentPage,
                perPage: perPage
            })
            .done(function(res){
                var $row = $('#teacherContainer').empty();
                if (!res.data.length) {
                    $row.append(
                    '<div class="col-12"><div class="alert alert-warning">Tidak ada data guru dan staff.</div></div>'
                    );
                } else {
                    $.each(res.data, function(_, t) {
                        $row.append(`<div class="col-md-6 col-lg-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <a href="/guru/${t.id}" class="d-flex flex-column align-items-center text-center text-decoration-none">
                                        <img src="/storage/${t.photo}" class="rounded-circle mb-3" width="100" height="100" style="object-fit: cover;">
                                        <h5 class="card-title mb-1">${t.name}</h5>
                                    </a>
                                    <small class="text-muted mb-1">${t.nip}</small>
                                    <p class="text-muted mb-1">${t.position=='Lainnya'?'-':t.position}</p>
                                    <p class="text-muted mb-3">${t.subject}</p>
                                    <div class="d-flex justify-content-center gap-2 mt-auto">
                                        <a href="/admin/guru/${t.id}" class="btn btn-outline-warning btn-sm"><i class="bi bi-pen me-1"></i>Edit</a>
                                        <button class="btn btn-outline-danger btn-sm btn-delete" data-id="${t.id}"><i class="bi bi-trash me-1"></i>Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>`);
                    });
                }

                var $p = $('#pagination').empty();
                var prevDisabled = res.prev_page_url ? '' : 'disabled';
                $p.append('<li class="page-item '+prevDisabled+'"><a class="page-link" href="#" data-page="'+(res.current_page-1)+'">&laquo;</a></li>');
                for (var i = 1; i <= res.last_page; i++) {
                    var active = i === res.current_page ? 'active' : '';
                    $p.append('<li class="page-item '+active+'"><a class="page-link" href="#" data-page="'+i+'">'+i+'</a></li>');
                }
                var nextDisabled = res.next_page_url ? '' : 'disabled';
                $p.append('<li class="page-item '+nextDisabled+'"><a class="page-link" href="#" data-page="'+(res.current_page+1)+'">&raquo;</a></li>');
            })
            .fail(function(xhr){
                showAlert('danger', xhr.responseJSON?.error || 'Gagal memuat data.');
            });
        }

        loadTeachers();

        $('#searchForm').on('submit', function(e){
            e.preventDefault();
            currentPage = 1;
            loadTeachers();
        });
        $('#sortSelect').on('change', function(){
            currentPage = 1;
            loadTeachers();
        });
        $('#priorityFilter').on('change', function(){
            currentPage = 1;
            loadTeachers();
        });
        $('#pagination').on('click', 'a.page-link', function(e){
            e.preventDefault();
            var p = +$(this).data('page');
            if (p >= 1) {
                currentPage = p;
                loadEvents();
            }
        });

        $('#teacherContainer').on('click', '.btn-delete', function(){
            if (!confirm('Yakin akan menghapus?')) return;
            var id = $(this).data('id');
            $.ajax({
                url: '/api/admin/teacher/'+id,
                method: 'POST',
                data: { _method: 'DELETE' },
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            })
            .done(function(){
                showAlert('success', 'Guru berhasil dihapus.');
                loadTeachers();
            })
            .fail(function(xhr){
                showAlert('danger', xhr.responseJSON?.error || 'Gagal menghapus.');
            });
        });
    });
</script>
@endsection