@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Berita'],
        ]
    ])
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-end mb-3">
                <a href="{{ route('admin.news.add') }}" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i>Buat baru
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-4">
                <form id="searchForm" class="input-group mb-3 mb-md-0 w-100" style="max-width: 360px;" role="search">
                    <input
                        id="searchInput"
                        type="search"
                        class="form-control"
                        placeholder="Cari berita..."
                        aria-label="Search">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </form>
                <div class="d-flex align-items-center justify-content-end">
                    <select id="sortSelect" class="form-select">
                        <option value="created_at|desc">Terbaru</option>
                        <option value="created_at|asc">Terlama</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row" id="newsContainer">
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
        var perPage     = 10;

        function loadNews() {
            var search = $('#searchInput').val();
            var sort   = $('#sortSelect').val();

            $.getJSON("{{ route('api.admin.news.index') }}", {
                search:  search,
                sort:    sort,
                page:    currentPage,
                perPage: perPage
            }).done(function(res){
                var $list = $('#newsContainer').empty();
                if (res.data.length === 0) {
                    $list.append(
                        '<div class="col-12"><div class="alert alert-warning">Tidak ada berita.</div></div>'
                    );
                } else {
                    res.data.forEach(function(item){
                        var card = '\
                            <div class="col-lg-12 mb-3">\
                                <div class="card">\
                                    <div class="card-body">\
                                        <div class="d-flex flex-wrap align-items-center justify-content-between">\
                                            <div class="d-flex align-items-start">\
                                                <img src="/storage/' + item.thumbnail + '" class="me-3" style="width: 100px;height: 50px;object-fit:cover;">\
                                                <a href="/berita/' + item.slug + '" class="text-dark text-decoration-none">\
                                                    <h5 class="mb-2">'+ item.title +'</h5>\
                                                    <div class="d-flex text-muted small">\
                                                        <div class="me-3">'+ item.created_at +'</div>\
                                                    </div>\
                                                </a>\
                                            </div>\
                                            <div class="d-flex align-items-center mt-3 mt-md-0">\
                                                <a href="/admin/berita/'+item.id+'" class="btn btn-outline-warning me-2"><i class="bx bx-edit-alt me-2"></i>Edit</a>\
                                                <button class="btn btn-outline-danger btn-delete" data-id="'+item.id+'"><i class="bx bx-trash"></i></button>\
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
            }).fail(function(xhr){
                showAlert('danger', xhr.responseJSON?.error || 'Gagal memuat data.');
            });
        }

        loadNews();

        $('#searchForm').on('submit', function(e){
            e.preventDefault();
            currentPage = 1;
            loadNews();
        });
        $('#sortSelect').on('change', function(){
            currentPage = 1;
            loadNews();
        });
        $('#pagination').on('click', 'a.page-link', function(e){
            e.preventDefault();
            var p = +$(this).data('page');
            if (p >= 1) {
                currentPage = p;
                loadNews();
            }
        });
        
        $('#newsContainer').on('click', '.btn-delete', function(){
            if (!confirm('Yakin akan menghapus?')) return;
            var id = $(this).data('id');
            $.ajax({
                url: '/api/admin/news/'+id,
                method: 'POST',
                data: { _method: 'DELETE' },
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            }).done(function(){
                showAlert('success', 'Berita telah dihapus.');
                loadNews();
            }).fail(function(xhr){
                showAlert('danger', xhr.responseJSON?.error || 'Gagal menghapus.');
            });
        });
    });
</script>
@endsection