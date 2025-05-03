@extends('master.app')
@section('head')
<link rel="stylesheet" href="//cdn.datatables.net/2.3.0/css/dataTables.dataTables.min.css">
@endsection
@section('content')
<div class="p-16">

    <div class="w-full">
            <a href="{{route('product.add')}}" class="btn btn-accent">Add</a>
    </div>
    <div class="overflow-x-auto">
        <table class="table" id="tableProduct">
            <!-- head -->
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Tumbnail</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script>
<script src="//cdn.datatables.net/2.3.0/js/dataTables.min.js"></script>
<script>
    var oTable = $('#tableProduct').dataTable( {
        processing: true,
        serverSide: true,
        ajax: '{{ route('product.fetch') }}',
        columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex',  'orderable': false, 'searchable': false },
                { data: 'name', name: 'name' },
                { data: 'price', name: 'price', 'searchable': false },
                { data: 'stock', name: 'stock', 'searchable': false },
                { data: 'tumbnail', name: 'tumbnail', 'searchable': false },
                { data: 'action', name: 'action',  'orderable': false, 'searchable': false },
        ]
    } );
</script>
@endsection
