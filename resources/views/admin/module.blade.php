@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Modul'],
        ]
    ])
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-end mb-3">
                <a href="{{ route('admin.module.add') }}" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i>Tambah modul
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
                <form id="searchForm" class="input-group mb-3 mb-md-0 w-100" style="max-width: 360px;" role="search">
                    <input id="searchInput" type="search" class="form-control" placeholder="Cari judul atau pelajaran..." aria-label="Search">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </form>
                <div class="d-flex align-items-center justify-content-end">
                    <select id="majorFilter" class="form-select me-2">
                        <option value="">Semua Jurusan</option>
                        @foreach($majors as $major)
                            <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                    <select id="sortSelect" class="form-select">
                        <option value="created_at|desc">Terbaru</option>
                        <option value="created_at|asc">Terlama</option>
                        <option value="grade_level|asc">Kelas &uarr;</option>
                        <option value="grade_level|desc">Kelas &darr;</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Judul</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th>Semester</th>
                                    <th>Pelajaran</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="modulesContainer">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer border-0 bg-white">
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

    function loadModules(){
        var search   = $('#searchInput').val(),
            major_id = $('#majorFilter').val();
            sort     = $('#sortSelect').val();

        $.getJSON("{{ route('api.admin.module.index') }}", {
            search:   search,
            sort:     sort,
            major_id: major_id,
            page:     currentPage,
            perPage:  perPage
        })
        .done(function(res){
            var $tb = $('#modulesContainer').empty();
            if(!res.data.length){
                $tb.append(
                    '<tr><td colspan="9" class="text-center">Tidak ada modul.</td></tr>'
                );
            } else {
                res.data.forEach(function(item){
                    $tb.append('<tr>\
                        <td><a href="/modul/'+item.major_code+'/'+item.id+'">'+item.title+'</a></td>\
                        <td><a href="/modul/'+item.major_code+'">'+ (item.major ?? '-') +'</a></td>\
                        <td>'+item.grade_level+'</td>\
                        <td>'+item.semester+'</td>\
                        <td>'+item.subject+'</td>\
                        <td class="text-end">\
                            <a href="/admin/modul/'+item.id+'" class="btn btn-outline-warning btn-sm me-2"><i class="bx bx-edit-alt"></i></a>\
                            <button class="btn btn-outline-danger btn-sm btn-delete" data-id="'+item.id+'"><i class="bx bx-trash"></i></button>\
                        </td>\
                        </tr>'
                    );
                });
            }
            
            var $p = $('#pagination').empty(),
                prevDisabled = res.prev_page_url? '' : 'disabled';
            $p.append('<li class="page-item '+prevDisabled+'"><a class="page-link" href="#" data-page="'+(res.current_page-1)+'">&laquo;</a></li>');
            for(var i=1;i<=res.last_page;i++){
                $p.append('<li class="page-item '+(i===res.current_page?'active':'')+'"><a class="page-link" href="#" data-page="'+i+'">'+i+'</a></li>');
            }
            var nextDisabled = res.next_page_url? '' : 'disabled';
            $p.append('<li class="page-item '+nextDisabled+'"><a class="page-link" href="#" data-page="'+(res.current_page+1)+'">&raquo;</a></li>');
        })
        .fail(function(xhr){
            showAlert('danger', xhr.responseJSON?.error||'Gagal memuat modul.');
        });
    }

    loadModules();

    $('#searchForm').on('submit', function(e){
        e.preventDefault();
        currentPage = 1;
        loadModules();
    });
    $('#sortSelect').on('change', function(){
        currentPage = 1;
        loadModules();
    });
    $('#majorFilter').on('change', function(){
        currentPage = 1;
        loadModules();
    });
    $('#pagination').on('click','a.page-link', function(e){
        e.preventDefault();
        var p = +$(this).data('page');
        if(p>=1) currentPage = p, loadModules();
    });
    $('#modulesContainer').on('click','.btn-delete', function(){
        if(!confirm('Yakin hapus modul?')) return;
        var id = $(this).data('id');
        $.ajax({
            url: '/api/admin/module/'+id,
            method: 'POST',
            data: { _method: 'DELETE' },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        })
        .done(function(){
            showAlert('success','Modul dihapus.');
            loadModules();
        })
        .fail(function(xhr){
            showAlert('danger', xhr.responseJSON?.error||'Gagal menghapus.');
        });
    });
});
</script>
@endsection