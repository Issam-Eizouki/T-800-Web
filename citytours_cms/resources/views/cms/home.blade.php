@extends('cms.layout.index')

@push('content')
    <div class="cui__layout__content">
        <div class="cui__breadcrumbs">
            <div class="cui__breadcrumbs__path">
                CMS <span> <span class="cui__breadcrumbs__arrow"></span> <strong
                    class="cui__breadcrumbs__current">Dashboard</strong>
                </span>
            </div>
        </div>
        <div class="cui__utils__content">
            <div class="table-responsive">
                <table class="table table-striped table-hover nowrap" id="tbl">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Google Id</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endpush

@push('js')
<script>
    $(function() {
        $('#tbl').DataTable({
            paging: false,
            ajax: {
                url: "{{ route('users.ajax') }}",
                dataSrc: ''
            },
            columns: [
                { data: 'email' },
                { data: 'google_id' },
                { data: 'roles[, ].name' },
            ],
            "columnDefs": [{
                "targets": 0,
                "data": function ( row, type, val, meta ) {
                  
                }
            }]
        })
    });
</script>
@endpush