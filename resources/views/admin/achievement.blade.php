@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Prestasi'],
        ]
    ])
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-end mb-3">
                <a href="{{ route('admin.achievement.add') }}" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i>Tambah baru
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
                        placeholder="Cari pengumuman..."
                        aria-label="Search">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </form>
                <div class="d-flex align-items-center mt-3 mt-md-0">
                    <select id="categoryFilter" class="form-select me-3">
                        <option value="">Semua Kategori</option>
                        <option value="Murid">Murid</option>
                        <option value="Guru">Guru</option>
                        <option value="Sekolah">Sekolah</option>
                        <option value="Ekstrakulikuler">Ekstrakurikuler</option>
                    </select>
                    <select id="levelFilter" class="form-select me-3">
                        <option value="">Semua Tingkat</option>
                        <option value="Sekolah">Sekolah</option>
                        <option value="Kecamatan">Kecamatan</option>
                        <option value="Kabupaten">Kabupaten</option>
                        <option value="Provinsi">Provinsi</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Internasional">Internasional</option>
                    </select>
                    <select id="sortSelect" class="form-select">
                        <option value="created_at|desc">Terbaru</option>
                        <option value="created_at|asc">Terlama</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Judul</th>
                                    <th>Dicapai Oleh</th>
                                    <th>Kategori</th>
                                    <th>Tingkat</th>
                                    <th>Perolehan</th>
                                    <th>Tanggal</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="achievementsContainer">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-0">
                    <nav>
                        <ul class="pagination justify-content-center mb-0" id="pagination"></ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('js/alert.js') }}"></script>
<script>
$(function(){
    var currentPage = 1,
        perPage     = 10;

    function loadAchievements(){
        var search   = $('#searchInput').val(),
            category = $('#categoryFilter').val(),
            level    = $('#levelFilter').val();
            sort     = $('#sortSelect').val();


        $.getJSON("{{ route('api.admin.achievement.index') }}", {
            search:   search,
            sort:     sort,
            category: category,
            level:    level,
            page:     currentPage,
            perPage:  perPage
        })
        .done(function(res){
            var $tb = $('#achievementsContainer').empty();
            if(!res.data.length){
                $tb.append(
                    '<tr><td colspan="7" class="text-center">Tidak ada prestasi.</td></tr>'
                );
            } else {
                res.data.forEach(function(item){
                    $tb.append('<tr>\
                        <td>'+item.title+'</td>\
                        <td>'+item.achieved_by+'</td>\
                        <td>'+item.category+'</td>\
                        <td>'+item.level+'</td>\
                        <td>'+item.rank+'</td>\
                        <td>'+item.achieved_at+'</td>\
                        <td class="text-end">\
                        <a href="/admin/prestasi/'+item.id+'" class="btn btn-outline-warning btn-sm me-2"><i class="bx bx-edit-alt"></i></a>\
                        <button class="btn btn-outline-danger btn-sm btn-delete" data-id="'+item.id+'"><i class="bx bx-trash"></i></button>\
                        </td>\
                    </tr>');
                });
            }

            var $p = $('#pagination').empty(),
                prevDisabled = res.prev_page_url? '' : 'disabled';
            $p.append('<li class="page-item '+prevDisabled+'"><a class="page-link" href="#" data-page="'+(res.current_page-1)+'">&laquo;</a></li>');
            for(var i=1;i<=res.last_page;i++){
                $p.append('<li class="page-item '+(i===res.current_page?'active':'')+'">'
                    +'<a class="page-link" href="#" data-page="'+i+'">'+i+'</a></li>');
            }
            var nextDisabled = res.next_page_url? '' : 'disabled';
            $p.append('<li class="page-item '+nextDisabled+'"><a class="page-link" href="#" data-page="'+(res.current_page+1)+'">&raquo;</a></li>');
        })
        .fail(function(xhr){
            showAlert('danger', xhr.responseJSON?.error||'Gagal memuat prestasi.');
        });
    }

    loadAchievements();

    $('#searchForm').on('submit', function(e){
        e.preventDefault();
        currentPage = 1;
        loadAchievements();
    });
    $('#categoryFilter, #levelFilter').on('change', function(){
        currentPage = 1;
        loadAchievements();
    });
    $('#sortSelect').on('change', function(){
        currentPage = 1;
        loadAchievements();
    });
    $('#pagination').on('click','a.page-link', function(e){
        e.preventDefault();
        var p = +$(this).data('page');
        if(p>=1) { currentPage = p; loadAchievements(); }
    });
    $('#achievementsContainer').on('click','.btn-delete', function(){
        if(!confirm('Yakin menghapus prestasi ini?')) return;
        var id = $(this).data('id');
        $.ajax({
            url: '/api/admin/achievement/'+id,
            method: 'POST',
            data: {_method:'DELETE'},
            headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        })
        .done(function(){
            showAlert('success','Prestasi dihapus.');
            loadAchievements();
        })
        .fail(function(xhr){
            showAlert('danger', xhr.responseJSON?.error||'Gagal menghapus.');
        });
    });
});
</script>
@endsection
