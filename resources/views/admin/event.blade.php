@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Agenda'],
        ]
    ])
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-end mb-3">
                <a href="{{ route('admin.event.add') }}" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i>Buat agenda
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
                <form id="searchForm" class="input-group mb-3 mb-md-0 w-100" style="max-width: 360px;" role="search">
                    <input id="searchInput" type="search" class="form-control" placeholder="Cari agenda..." aria-label="Search">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </form>
                <div class="d-flex align-items-center justify-content-end">
                    <select id="typeFilter" class="form-select me-2">
                        <option value="">Semua Jenis</option>
                        <option value="Internal">Internal</option>
                        <option value="External">Eksternal</option>
                    </select>
                    <select id="sortSelect" class="form-select">
                        <option value="start_time|asc">Mendatang</option>
                        <option value="start_time|desc">Terbaru</option>
                        <option value="start_time|asc">Terlama</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row" id="eventContainer">
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
    var currentPage = 1,
        perPage     = 10;

    function loadEvents() {
        var search = $('#searchInput').val(),
            type   = $('#typeFilter').val();
            sort   = $('#sortSelect').val();

        $.getJSON("{{ route('api.admin.event.index') }}", {
            search:  search,
            sort:    sort,
            type: type,
            page:    currentPage,
            perPage: perPage
        })
        .done(function(res){
            var $list = $('#eventContainer').empty();
            if (!res.data.length) {
                $list.append(
                    '<div class="col-12"><div class="alert alert-warning">Tidak ada agenda.</div></div>'
                );
            } else {
                res.data.forEach(function(item){
                    var typeBadge = item.type == 'External' ? '<span class="badge text-bg-secondary">Eksternal</span>' : '<span class="badge text-bg-secondary">Internal</span>';
                    var card = '\
                    <div class="col-lg-12 mb-3">\
                        <div class="card">\
                            <div class="card-body">\
                                <div class="d-flex flex-wrap align-items-center justify-content-between">\
                                    <div class="d-flex flex-column">\
                                        <a href="/agenda/' + item.id + '" class="text-dark text-decoration-none">\
                                                <h5 class="mb-2">'+ item.title +'</h5>\
                                                <div class="badge bg-info text-light mb-2">'+ item.start_time +'</div>\
                                                <div class="badge bg-primary text-light mb-2">'+ item.end_time +'</div>\
                                                <div class="d-flex gap-3 text-muted small">\
                                                <div class="d-flex align-items-center gap-2">\
                                                    <div>'+ item.created_at +'</div>\
                                                    ' + typeBadge + '\
                                                </div>\
                                            </div>\
                                        </a>\
                                    </div>\
                                    <div class="d-flex gap-2 mt-3 mt-md-0">\
                                        <a href="/admin/agenda/'+item.id+'" class="btn btn-outline-warning btn-sm"><i class="bx bx-edit-alt me-2"></i>Edit</a>\
                                        <button class="btn btn-outline-danger btn-sm btn-delete" data-id="'+item.id+'"><i class="bx bx-trash"></i></button>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>';

                    $list.append(card);
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

    loadEvents();

    $('#searchForm').on('submit', function(e){
        e.preventDefault();
        currentPage = 1;
        loadEvents();
    });
    $('#sortSelect').on('change', function(){
        currentPage = 1;
        loadEvents();
    });
    $('#typeFilter').on('change', function(){
        currentPage = 1;
        loadEvents();
    });
    $('#pagination').on('click', 'a.page-link', function(e){
        e.preventDefault();
        var p = +$(this).data('page');
        if (p >= 1) {
            currentPage = p;
            loadEvents();
        }
    });

    $('#eventContainer').on('click', '.btn-delete', function(){
        if (!confirm('Yakin akan menghapus?')) return;
        var id = $(this).data('id');
        $.ajax({
            url: '/api/admin/event/'+id,
            method: 'POST',
            data: { _method: 'DELETE' },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        })
        .done(function(){
            showAlert('success', 'Agenda berhasil dihapus.');
            loadEvents();
        })
        .fail(function(xhr){
            showAlert('danger', xhr.responseJSON?.error || 'Gagal menghapus.');
        });
    });
});
</script>
@endsection