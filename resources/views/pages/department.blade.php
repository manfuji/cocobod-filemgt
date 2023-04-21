@extends('layouts.app')

@section('styles')
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
<style>
  #products-list_info{
    color: #7b809a;
  }
  #products-list_paginate{
    color: #7b809a;
  }
  .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
    background-color: white;
    font-size: 0.9rem;
  }
  .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    min-width: 0.9em;
    /* padding: .2em .5em; */
    background-image: linear-gradient(195deg,#ec407a,#d81b60);
    box-shadow: 0 3px 5px -1px rgb(0 0 0 / 9%), 0 2px 3px -1px rgb(0 0 0 / 7%);
    color: #fff !important;
    border: none;
    border-radius: 50%!important;
  }
  table tbody{
    font-size: .875rem!important;
  }

  table thead{
    font-size: 0.9em;
  }
</style>
@include('layouts.partials.alert')
<div class="container-fluid py-4">
  
<div class="card px-3 py-3">
  <div class="d-lg-flex">
    <div>
    <h5 class="mb-0">All Employees</h5>
 
    </div>
    <div class="ms-auto my-auto mt-lg-0 mt-4 mb-2">
    <div class="ms-auto my-auto">
    <button class="btn bg-gradient-primary btn-sm mb-0 mr-2"  data-bs-toggle="modal" data-bs-target="#newEmp" style="margin-right: 5px;">+&nbsp; New Department</a>
    {{-- <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#import">Import</button>
          <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog mt-lg-10">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
              <i class="material-icons ms-3">file_upload</i>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
                <div class="modal-body">
                <p>You can browse your computer for a file.</p>
                  <div class="input-group input-group-dynamic mb-3">
                  <label class="form-label">Browse file...</label>
                  <input type="email" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                    <div class="form-check is-filled">
                    <input class="form-check-input" type="checkbox" value="" id="importCheck" checked="">
                    <label class="custom-control-label" for="importCheck">I accept the terms and conditions</label>
                    </div>
                </div>
            <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn bg-gradient-primary btn-sm">Upload</button>
            </div>
            </div>
        </div>
     </div>
    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button> --}}
    </div>
    </div>
    </div>

    <table class="table table-flush dataTable-table" id="products-list">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
      </thead>
     <tbody></tbody>
    </table>
  </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="newEmp" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog mt-lg-10">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="ModalLabel">Add Employee</h5>
      <i class="material-icons ms-3">add</i>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form action="{{route('department.store')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="input-group input-group-dynamic my-3">
            <label class="form-label">Name</label>
            <input class="form-control" type="text" name="name" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    <div class="modal-footer">
    <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn bg-gradient-primary btn-sm">Upload</button>
    </div>
    </div>
</div>
</div>

{{-- Edit --}}
<div class="modal fade" id="EditEmp" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog mt-lg-10">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="ModalLabel">Edit Employee</h5>
      <i class="material-icons ms-3">add</i>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <div id="allHere">
          
          </div>
        </div>
      
    <div class="modal-footer">
    <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn bg-gradient-primary btn-sm">Upload</button>
    </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>


  $(document).ready(function () {
    $('#products-list').DataTable({
        ajax: {
          url:"department/all",
        },
        columns: [
            { data: 'Id' },
            { data: 'Name' },
            { data: 'Id',
             render:function(data,type,row,meta){
              return `<a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
                        <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                        </a>
                        <button class="btn" onclick="fetchEmployee(${data})"class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                        <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                        </button>
                        <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
                        <i class="material-icons text-secondary position-relative text-lg">delete</i>`;
             } },
        ],
    });
});

function fetchEmployee(id){
  console.log(id)
  $.ajax({
    url:`department/${id}/edit`,
    data:{id},
    success:function(res){
      var html = `<form action="department/${id}/edit" method="post" enctype="multipart/form-data">
                    @csrf`;
          html += `<div class="input-group input-group-static mb-4 my-3">
              <input type="text" name="name"  value="${res['name']}" class="form-control" id="">
            </div>`;

            html += `<button type="submit" class="btn btn-primary">Submit</button>`;
            html += `</form>`;

            $('#EditEmp').modal('show');
            
           document.getElementById('allHere').innerHTML= html;
    }
  })
}

  
  </script>

@endsection