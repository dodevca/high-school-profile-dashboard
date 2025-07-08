@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Jurusan'],
        ]
    ])
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-end mb-3">
                <a href="{{ route('admin.major.add') }}" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i>Tambah jurusan
                </a>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-4">
                <form id="searchForm" class="input-group mb-3 mb-md-0 w-100" style="max-width: 360px;" role="search">
                    <input id="searchInput" name="search" type="search" class="form-control" placeholder="Cari jurusan...">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </form>
                <div class="d-flex align-items-center">
                    <select id="sortSelect" class="form-select">
                        <option value="name|asc">A-Z</option>
                        <option value="name|desc">Z-A</option>
                        <option value="created_at|desc">Terbaru</option>
                        <option value="created_at|asc">Terlama</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div id="majorContainer" class="row"></div>
            <nav>
                <ul id="pagination" class="pagination justify-content-center"></ul>
            </nav>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('js/alert.js') }}"></script>
<script>
$(function(){
    var currentPage = 1;
    var perPage = 10;

    function loadMajors() {
        var search = $('#searchInput').val();
        var sort   = $('#sortSelect').val();

        $.getJSON("{{ route('api.admin.major.index') }}", {
            search: search,
            sort: sort,
            page: currentPage,
            perPage: perPage
        }).done(function(res){
            var $cont = $('#majorContainer').empty();
            if (!res.data.length) {
                $cont.append('<div class="col-12"><div class="alert alert-warning">Tidak ada jurusan.</div></div>');
            } else {
                res.data.forEach(function(item){
                    var card = `
                        <div class="col-lg-12 mb-3">
                            <div class="card shadow-sm">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <a href="/admin/jurusan/${item.id}" class="d-flex align-items-center text-decoration-none">
                                        <img src="${item.image_url || '/images/placeholder.webp'}" class="rounded me-3" width="72" height="72" alt="Jurusan image">
                                        <div>
                                            <h5 class="mb-1">${item.name}</h5>
                                            <div class="text-muted small d-flex flex-wrap gap-3">
                                                <span><i class="bi bi-calendar me-1"></i>${item.opened_at}</span>
                                                <span><i class="bi bi-people me-1"></i>${item.student_count} Siswa</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="d-flex gap-2">
                                        <a href="/admin/jurusan/${item.id}/edit" class="btn btn-outline-primary btn-sm"><i class="bi bi-pen"></i> Edit</a>
                                        <button class="btn btn-outline-danger btn-sm btn-delete" data-id="${item.id}"><i class="bi bi-trash"></i> Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    $cont.append(card);
                });
            }
            // pagination
            var $p = $('#pagination').empty();
            var prevDisabled = res.prev_page_url ? '' : 'disabled';
            $p.append('<li class="page-item '+prevDisabled+'"><a class="page-link" href="#" data-page="'+(res.current_page-1)+'">&lt;</a></li>');
            for (var i=1; i<=res.last_page; i++) {
                var active = i===res.current_page ? 'active' : '';
                $p.append('<li class="page-item '+active+'"><a class="page-link" href="#" data-page="'+i+'">'+i+'</a></li>');
            }
            var nextDisabled = res.next_page_url ? '' : 'disabled';
            $p.append('<li class="page-item '+nextDisabled+'"><a class="page-link" href="#" data-page="'+(res.current_page+1)+'">&gt;</a></li>');
        }).fail(function(xhr){
            showAlert('danger', xhr.responseJSON?.error || 'Gagal memuat jurusan.');
        });
    }

    loadMajors();

    $('#searchForm').on('submit', function(e){ e.preventDefault(); currentPage=1; loadMajors(); });
    $('#sortSelect').on('change', function(){ currentPage=1; loadMajors(); });
    $('#pagination').on('click', 'a.page-link', function(e){
        e.preventDefault();
        var p = +$(this).data('page');
        if (p>=1 && p!==currentPage) { currentPage = p; loadMajors(); }
    });

    $('#majorContainer').on('click', '.btn-delete', function(){
        if (!confirm('Yakin akan menghapus jurusan ini?')) return;
        var id = $(this).data('id');
        $.ajax({
            url: '/api/admin/major/'+id,
            method: 'POST',
            data: {_method:'DELETE'},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        }).done(function(){ showAlert('success','Jurusan berhasil dihapus.'); loadMajors(); })
          .fail(function(xhr){ showAlert('danger', xhr.responseJSON?.error||'Gagal menghapus.'); });
    });
});
</script>
@endsection