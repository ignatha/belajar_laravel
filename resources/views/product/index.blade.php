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

{{-- detail --}}
<dialog id="my_modal_1" class="modal">
  <div class="modal-box">
    <div class="flex gap-x-2">
        <span>ID : </span>
        <span id="id_product"></span>
    </div>
    <div class="flex gap-x-2">
        <span>Name : </span>
        <span id="name_product"></span>
    </div>
    <div class="flex gap-x-2">
        <span>Price : </span>
        <span id="price_product"></span>
    </div>
    <div class="flex gap-x-2">
        <span>Stock : </span>
        <span id="stock_product"></span>
    </div>
    <div class="modal-action">
        <form method="dialog">
          <!-- if there is a button in form, it will close the modal -->
          <button class="btn">Close</button>
        </form>
      </div>
  </div>
</dialog>

{{-- edit --}}
<dialog id="modal_edit" class="modal">
    <div class="modal-box">
      <div class="w-full">
        <form id="product_edit" class="w-full gap-4 flex flex-col">
            <div class="w-full">
                <label class="input input-bordered flex items-center gap-2">
                    <input type="text" class="grow" id="edit_name_product" name="name" placeholder="name" />
                </label>
            </div>
            <div class="w-full">
                <label class="input input-bordered flex items-center gap-2">
                    <input type="text" class="grow" id="edit_price_product" name="price" placeholder="price" />
                </label>
            </div>
            <div class="w-full">
                <label class="input input-bordered flex items-center gap-2">
                <input type="text" class="grow" name="stock" id="edit_stock_product" placeholder="stock" />
                </label>
            </div>
            <input type="hidden" name="_id" id="_id" value="" />
            <div class="w-full">
                <input type="submit" class="btn btn-accent">
            </div>
        </form>
      </div>
      <div class="modal-action">
          <form method="dialog">
            <!-- if there is a button in form, it will close the modal -->
            <button class="btn">Close</button>
          </form>
        </div>
    </div>
  </dialog>
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
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const getDetail = (id) => {

            const modal = document.getElementById('my_modal_1')

            $.ajax({
            url: '/product/detail/' + id, // Ganti dengan endpoint kamu
            method: 'GET',
            success: function (response) {
                // Misalnya response berisi HTML atau string

                document.getElementById('id_product').innerHTML = response.id
                document.getElementById('name_product').innerHTML = response.name
                document.getElementById('price_product').innerHTML = response.price
                document.getElementById('stock_product').innerHTML = response.stock
                modal.showModal()
            },
            error: function (error) {
                console.log(error)
            }
            });
    }

    const showModalEdit = (id) => {
        const modal = document.getElementById('modal_edit')

        $.ajax({
            url: '/product/detail/' + id, // Ganti dengan endpoint kamu
            method: 'GET',
            success: function (response) {
                // Misalnya response berisi HTML atau string

                document.getElementById('edit_name_product').value = response.name
                document.getElementById('edit_price_product').value = response.price
                document.getElementById('edit_stock_product').value = response.stock
                document.getElementById('_id').value = response.id
                modal.showModal()
            },
            error: function (error) {
                console.log(error)
            }
            });
    }

    const formEdit =  document.getElementById('product_edit')

    formEdit.addEventListener('submit',(e)=>{
        e.preventDefault();
        const id = document.getElementById('_id').value;
        const form = $(this)

        $.ajax({
            url: '/product/edit/'+id, // Ganti dengan endpoint kamu
            method: 'PUT',
            data : form.serialize(),
            success: function (response) {
                console.log(response)
            },
            error: function (error) {
                console.log(error)
            }
        });

    })

</script>
@endsection
