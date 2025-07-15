@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Galeri'],
        ]
    ])
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-end mb-3">
                <a href="{{ route('admin.gallery.add') }}" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i>Tambah album
                </a>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
                <form id="searchForm" class="input-group mb-3 mb-md-0 w-100" style="max-width: 360px;" role="search">
                    <input id="searchInput" name="search" type="search" class="form-control" placeholder="Cari album...">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </form>
                <div class="d-flex align-items-center">
                    <select id="sortSelect" class="form-select">
                        <option value="created_at|desc">Terbaru</option>
                        <option value="created_at|asc">Terlama</option>
                        <option value="title|asc">A-Z</option>
                        <option value="title|desc">Z-A</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div id="galleryContainer" class="row"></div>
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

    function loadGalleries() {
        var search = $('#searchInput').val();
        var sort   = $('#sortSelect').val();

        $.getJSON("{{ route('api.admin.gallery.index') }}", {
            search: search,
            sort: sort,
            page: currentPage,
            perPage: perPage
        }).done(function(res){
            var $cont = $('#galleryContainer').empty();
            if (!res.data.length) {
                $cont.append('<div class="col-12"><div class="alert alert-warning">Tidak ada album.</div></div>');
            } else {
                res.data.forEach(function(item){
                    var card = `
                        <div class="col-lg-12 mb-3">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <a href="/galeri/${item.id}-${item.slug}" class="d-flex align-items-center text-decoration-none">
                                        <img src="/storage/${item.thumbnail}" class="rounded me-3" width="72" height="72" style="object-fit: cover;">
                                        <div>
                                            <h5 class="mb-1">${item.title}</h5>
                                            <div class="text-muted small d-flex align-items-center gap-2">
                                                <span>${item.created_at}</span>
                                                <span class="badge text-bg-secondary">${item.totalImages} gambar</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="d-flex gap-2">
                                        <a href="/admin/galeri/${item.id}" class="btn btn-outline-warning btn-sm">
                                            <i class="bx bx-edit-alt"></i> Edit
                                        </a>
                                        <button class="btn btn-outline-danger btn-sm btn-delete" data-id="${item.id}">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    $cont.append(card);
                });
            }

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
            showAlert('danger', xhr.responseJSON?.error || 'Gagal memuat album.');
        });
    }

    loadGalleries();

    $('#searchForm').on('submit', function(e){ e.preventDefault(); currentPage=1; loadGalleries(); });
    $('#sortSelect').on('change', function(){ currentPage=1; loadGalleries(); });
    $('#pagination').on('click', 'a.page-link', function(e){
        e.preventDefault();
        var p = +$(this).data('page');
        if (p>=1 && p!==currentPage) { currentPage = p; loadGalleries(); }
    });

    $('#galleryContainer').on('click', '.btn-delete', function(){
        if (!confirm('Yakin akan menghapus album ini?')) return;
        var id = $(this).data('id');
        $.ajax({
            url: '/api/admin/gallery/'+id,
            method: 'POST',
            data: {_method:'DELETE'},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        }).done(function(){ showAlert('success','Album berhasil dihapus.'); loadGalleries(); })
        .fail(function(xhr){ showAlert('danger', xhr.responseJSON?.error||'Gagal menghapus.'); });
    });
});
</script>
@endsection