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
    <button class="btn bg-gradient-primary btn-sm mb-0 mr-2"  data-bs-toggle="modal" data-bs-target="#newEmp" style="margin-right: 5px;">+&nbsp; New Employee</a>
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
          <th>First Name</th>
          <th>Last Name</th>
          <th>Other Name</th>
          <th>Email</th>
          <th>Department</th>
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
          <form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="input-group input-group-dynamic my-3">
            <label class="form-label">First Name</label>
            <input class="form-control" type="text" name="first_name" onfocus="focused(this)" onfocusout="defocused(this)" pattern="^[a-zA-Z]+$">
          </div>
          <div class="input-group input-group-dynamic my-3">
            <label class="form-label">Last Name</label>
            <input class="form-control" type="text" name="last_name" onfocus="focused(this)" onfocusout="defocused(this)" pattern="^[a-zA-Z]+$">
          </div>
          <div class="input-group input-group-dynamic my-3">
            <label class="form-label">Other Name</label>
            <input class="form-control" type="text" name="other_name" onfocus="focused(this)" onfocusout="defocused(this)" pattern="^[a-zA-Z]+$">
          </div>
          <div class="input-group input-group-dynamic my-3">
            <label class="form-label">Email</label>
            <input class="form-control" type="email" name="email" onfocus="focused(this)" onfocusout="defocused(this)" >
          </div>
            <div class="input-group input-group-static mb-4 my-3">
              <label for="exampleFormControlSelect1" class="ms-0">Select Employee</label>
              <select class="form-control" name="department" id="exampleFormControlSelect1">
                @foreach ($departments as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="input-group input-group-static mb-4 my-3">
              <input type="date" name="start_date" class="form-control" id="">
            </div>
            <div class="input-group input-group-static mb-4 my-3">
              <input type="file" name="profile" class="form-control" id="" accept="image/.jpg,.jpeg,.png">
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
<style>
  .frame{
    width: 200px;
    height: 200px;
    background: #7b809a;
    border-radius: 50%;
    display: grid;
    justify-content: center;
    overflow: hidden;
  }
</style>
{{-- Edit --}}
<div class="modal fade" id="EditEmp" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog mt-lg-10" style="--bs-modal-width: 700px"> 
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>


  $(document).ready(function () {
    $('#products-list').DataTable({
        ajax: {
          url:"employees/all",
        },
        columns: [
            { data: 'Id' },
            { data: 'First Name' },
            { data: 'Last Name' },
            { data: 'Other Name' },
            { data: 'Email' },
            { data: 'Department' },
            { data: 'Id',
             render:function(data,type,row,meta){
              return `<button class="btn" onclick="showEmployee(${data})"class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                        </button>
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
    url:`employees/${id}/edit`,
    data:{id},
    success:function(res){
      console.log(res)
        var html = `<form action="employees/${id}/edit" method="post" enctype="multipart/form-data">
                    @csrf`;
        html += `<div class='row'>`;
        html+=`<div class="col-8">`;
       
       html += `<div class="input-group input-group-dynamic my-3">
            <input class="form-control" type="text" placeholder="First Name" name="first_name" value="${res['employee']['first_name']}" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>`;
          html +=  `<div class="input-group input-group-dynamic my-3">
            <input class="form-control" type="text" placeholder="Last Name" name="last_name"  value="${res['employee']['last_name']}" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>`;

          html += `<div class="input-group input-group-dynamic my-3">
            <input class="form-control" type="text" name="other_name" placeholder="Other Name" value="${res['employee']['other_name']}" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>`;
          html += `<div class="input-group input-group-dynamic my-3">
            <input class="form-control" type="email" placeholder="Email" value="${res['employee']['email']}" name="email" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>`;
          html +=  `<div class="input-group input-group-static mb-4 my-3">
              <select class="form-control" placeholder="Department" name="department" value="${res['employee']['department']}" id="exampleFormControlSelect1">`;
                for(let a of res['departments']){
            html += `<option value="${a['id']}">${a['name']}</option>`;  
                }
             html += `</select></div>`;
          html += `<div class="input-group input-group-static mb-4 my-3">
              <input type="date" name="start_date"  value="${res['employee']['start_date']}" class="form-control" id="">
            </div>`;

            html += `<button type="submit" class="btn btn-primary">Submit</button>`;
           
            html += `</div>`;
            html += `<div class='col-4'>`;
            html += `<div class='frame'>`
            html += `<img src="./private/image/${res['employee']['image']}" id="preview" style="width:200px;height:200px;"/>`;
            html += `</div>`;
            html += `<div class="input-group input-group-static mb-4 my-3">
              <input type="file" name="profile" id="profile_pic" onchange="previewImage(event)" class="form-control" id="" accept="image/.jpg,.jpeg,.png">
            </div>`;
            html += `</form>`;
            html += `</div></div>`;

            $('#EditEmp').modal('show');
            
           document.getElementById('allHere').innerHTML= html;
    },
    error:function(error){
      if(error['responseJSON']['message'] == 'This action is unauthorized.')
      new swal("Sorry", "This action is unauthorized", "error");
    }
  })
}


  
  </script>
  <script>
function previewImage(event){
  console.log("e",event)
  const [file] = event['target']['files'];
  if(file){
    var preview = document.getElementById('preview');
    preview.src = URL.createObjectURL(file)
  }
}

function showEmployee(id){
  
  console.log(id)
  $.ajax({
    url:`employees/${id}/show`,
    data:{id},
    success:function(res){
      console.log(res)
        var html = `<form action="employees/${id}/edit" method="post" enctype="multipart/form-data">
                    @csrf`;
        html += `<div class='row'>`;
        html+=`<div class="col-8">`;
       
       html += `<div class="input-group input-group-dynamic my-3">
            <input class="form-control" type="text" placeholder="First Name" name="first_name" value="${res[0]['first_name']}" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>`;
          html +=  `<div class="input-group input-group-dynamic my-3">
            <input class="form-control" type="text" placeholder="Last Name" name="last_name"  value="${res[0]['last_name']}" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>`;

          html += `<div class="input-group input-group-dynamic my-3">
            <input class="form-control" type="text" name="other_name" placeholder="Other Name" value="${res[0]['other_name']}" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>`;
          html += `<div class="input-group input-group-dynamic my-3">
            <input class="form-control" type="email" placeholder="Email" value="${res[0]['email']}" name="email" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>`;
          html +=  `<div class="input-group input-group-static mb-4 my-3">
              <select class="form-control" placeholder="Department" name="department" value="${res[0]['department']}" id="exampleFormControlSelect1">
                <option value="Finance Department">Finance Department</option>
                <option value="MIS">MIS</option>
                <option value="Human Resource">Human Resource</option>
              </select>
            </div>`;
          html += `<div class="input-group input-group-static mb-4 my-3">
              <input type="date" name="start_date"  value="${res[0]['start_date']}" class="form-control" id="">
            </div>`;

            html += `<button type="submit" class="btn btn-primary">Submit</button>`;
           
            html += `</div>`;
            html += `<div class='col-4'>`;
            html += `<div class='frame'>`
            html += `<img src="./private/image/${res[0]['image']}" id="preview" style="width:200px;height:200px;"/>`;
            html += `</div>`;
            html += `<div class="input-group input-group-static mb-4 my-3">
              <input type="file" name="profile" id="profile_pic" onchange="previewImage(event)" class="form-control" id="" accept="image/.jpg,.jpeg,.png">
            </div>`;
            html += `</form>`;
            html += `</div></div>`;

            $('#EditEmp').modal('show');
            
           document.getElementById('allHere').innerHTML= html;
    }
  })
}

  </script>

@endsection