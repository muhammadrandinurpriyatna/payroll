@extends('layouts.dashboard', [
    'menuActive' => 'user'
])

@section('css')
    <style>
        #data_wrapper{
            background-color: white;
            padding: 1rem;
            border-radius: 8px;
            backdrop-filter: saturate(200%) blur(6px);
            border: 1px solid #e0e6ed;
            box-shadow: 18px 20px 10.3px -23px rgba(0, 0, 0, 0.15);
        }
    </style>
@endsection

@section('content')
    <div class="row my-3">
        @include('components.error-message')
    </div>
    <div class="row my-3">
        <div class="col-md-4">
            <a href="{{ route('user.add') }}" class="btn bg-primary">Add User</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <table id="data" class="table style-3 dt-table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@section('before-body-end')
    <script>
        const table = $('#data').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" + "<'table-responsive'tr>" + "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_ (with total _TOTAL_ total data entries)",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "pageLength": 10,
            "lengthMenu": [[5, 10, 20, 50, 100, -1], [5, 10, 20, 50, 100, 'All']],
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": true,
            "processing":true,
            "bServerSide": true,
            "ajax":{
                url: "{{ route('user.data') }}",
                type: "GET",
            },
            columnDefs: [
                {
                    "targets": 0,
                    "sortable": false,
                    'orderable': false,
                    "render": function(data, type, row, meta){
                        return meta.row + 1;
                    }
                },
                {
                    "targets": 1,
                    "render": function(data, type, row, meta){
                        return row.name;
                    }
                },
                {
                    "targets": 2,
                    "render": function(data, type, row, meta){
                        return row.email;
                    }
                },
                {
                    "targets": 3,
                    "render": function(data, type, row, meta){
                        return row.role;
                    }
                },
            ]
        });
    </script>
@endsection