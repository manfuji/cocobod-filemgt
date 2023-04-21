@extends('layouts.app')

@section('content')
@include('layouts.partials.alert')
    <div class="container">
        <div class="container-fluid py-4">
  
            <div class="card px-3 py-3">
              <div class="d-lg-flex">
                <div>
                <h5 class="mb-0">All Medical Records</h5>
             
                </div>
                <div class="ms-auto my-auto mt-lg-0 mt-4 mb-2">
                <div class="ms-auto my-auto">
                <button class="btn bg-gradient-primary btn-sm mb-0 mr-2"  data-bs-toggle="modal" data-bs-target="#newEmp" style="margin-right: 5px;">+&nbsp; New Record</a>
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
            
                <table class="table table-flush dataTable-table" id="medicals-list">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Full Name</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                 <tbody></tbody>
                </table>
              </div>
            </div>
    </div>
<style>
  #canvas_container{
    overflow: scroll;
    height: 500px;
  }

  .info-bottom{
    border-bottom: 1px solid #d7d7d7;
  }

  .info-bottom p:last-child{
    margin-bottom: 0px;
    margin-bottom: 0.5rem;
  }

  .buttons-closure{
    width: 50%;
    margin: auto;
  }
</style>
    {{-- Modal --}}
<div class="modal fade" id="newEmp" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog mt-lg-10">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add Record</h5>
        <i class="material-icons ms-3">add</i>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <form action="{{route('medical.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="input-group input-group-static mb-4 my-3">
                <label for="exampleFormControlSelect1" class="ms-0">Select Employee</label>
                <select class="form-control" name="employee_id" id="exampleFormControlSelect1">
                    @foreach ($employees as $employee)
                    <option value="{{$employee->id}}">{{$employee->first_name.' '.$employee->last_name}}</option>
                    @endforeach 
                 
                </select>
              </div>
            <div class="input-group input-group-dynamic my-3">
              <label class="form-label">Title</label>
              <input class="form-control" type="text" name="title" pattern="^[a-zA-Z]+$" onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="input-group input-group-dynamic my-3">
              <label class="form-label">Description</label>
              <input class="form-control" type="text" name="description" onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
              <div class="input-group input-group-static mb-4 my-3">
                <input type="date" name="date" class="form-control" id="">
              </div>
              <div class="input-group input-group-static mb-4 my-3">
                <input type="file" name="document" class="form-control" id="">
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
      <h5 class="modal-title" id="ModalLabel">Edit MedicalRecords</h5>
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

<div class="modal fade" id="view_mod" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog mt-lg-10" style="--bs-modal-width: 700px">
    <div class="modal-content" >
      <div class="modal-header">
      <h5 class="modal-title" id="ModalLabel">View Medical Record</h5>
      <i class="material-icons ms-3">add</i>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <div id="view_allHere">
          
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function () {
    $('#medicals-list').DataTable({
        ajax: {
          url:"medicals/all",
        },
        columns: [
            { data: 'Id' },
            { data: 'Full Name' },
            { data: 'Title' },
            { data: 'Description' },
            { data: 'Id',
             render:function(data,type,row,meta){
              return `<button class="btn" data-bs-toggle="tooltip" data-bs-original-title="Preview product"  onclick="showRecord(${data})">
                        <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                        </button>
                        <button class="btn" onclick="fetchRecords(${data})" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                        <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                        </button>
                        <button class="btn" onclick="deleteRecords(${data})" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                          <i class="material-icons text-secondary position-relative text-lg">delete</i>
                        </button>`;
             } },
        ],
    });
});

function showRecord(id){
  console.log(id)
  $.ajax({
    url:`medical/${id}/edit`,
    data:{id},
    success:function(res){
      console.log(res)
      var html = `<div class="row">`;
       html += `<div class="info-bottom">
            <p class="mb-0">Title</p>
            <p><strong>${res['title']}</strong></p>
          </div>`;
          
          html += `<div class="info-bottom">
            <p>Description</p>
            <p class="mb-0"><strong>${res['description']}</strong></p>
          </div>`;
          html += ``;
          html += `<div class="info-bottom"><p>Date</p><p class="mb-0"><strong>${res['date']}</strong></p>`
            html += `</div>`;
            html += `<div><a href='./private/documents/${res['documents']}' class='btn btn-outline-primary my-2' download>Download</a></div>`;
            html +=    `<div id="my_pdf_viewer mt">
                        <div id="canvas_container">
                            <canvas id="pdf_renderer"></canvas>
                        </div>
                        <div class="buttons-closure">
                          <div class="input-group mt-1">
                            <input type="text" class="form-control border border-dark" onkeypress="ofPageNumberSet(event)" id="current_page" placeholder="0" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
                            <button class="btn btn-outline-primary mb-0" id="go_previous" onclick="previousPage()" type="button">Previous</button>
                            <button class="btn btn-outline-primary mb-0" onclick="nextPage()" type="button">Next</button>
                          </div>
                          </div>
                        <div class="input-group mt-1" id="zoom_controls">  
                            <button class="btn" id="zoom_in">+</button>
                            <button class="btn" id="zoom_out">-</button>
                        </div>
                    </div></div>`;
            html += `</div>`;

            $('#view_mod').modal('show');
            
           document.getElementById('view_allHere').innerHTML= html;
           callPdf(`./private/documents/${res['documents']}`)
    }
  })
}

function deleteRecords(id){
  $.ajax({
    url:`medical/${id}/delete`,
    data:{id},
    method:'GET',
    success:function(res){
    if(res['message'] == 'success')
    $('#datatable-basic').DataTable().ajax.reload();
    new swal("Good job!", "You clicked the button!", "success");
    },
    error:function(error){
      if(res['message'] == 'failed')
      new swal("Sorry", "Unable to complete", "error");
    }
  })
}

function fetchRecords(id){
  console.log(id)
  $.ajax({
    url:`medical/${id}/edit`,
    data:{id},
    success:function(res){
      var html = `<form action="medical/${id}/edit" method="post" enctype="multipart/form-data">
                    @csrf`;
       html += `<div class="input-group input-group-dynamic my-3">
            <input class="form-control" type="text" placeholder="Title" name="title" value="${res['title']}" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>`;

          html += `<div class="input-group input-group-dynamic my-3">
            <input class="form-control" type="text" placeholder="description" value="${res['description']}" name="description" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>`;
          html +=  `<div class="input-group input-group-static mb-4 my-3">
              <select class="form-control" placeholder="Department" name="department" value="${res['department']}" id="exampleFormControlSelect1">
                <option value="Finance Department">Finance Department</option>
                <option value="MIS">MIS</option>
                <option value="Human Resource">Human Resource</option>
              </select>
            </div>`;
          html += `<div class="input-group input-group-static mb-4 my-3">
              <input type="date" name="date"  value="${res['date']}" class="form-control" id="">
            </div>`;
            html += `<div class="input-group input-group-static mb-4 my-3">
                <input type="file" name="document" class="form-control" id="" accept=".pdf">
              </div>`
            html += `<button type="submit" class="btn btn-primary">Submit</button>`;
            html += `</form>`;

            $('#EditEmp').modal('show');
            
           document.getElementById('allHere').innerHTML= html;
           callPdf(`./private/documents/${res['documents']}`)
    },
    error:function(error){
      if(error['responseJSON']['message'] == 'This action is unauthorized.')
      new swal("Sorry", "This action is unauthorized", "error");
    }
  })
}
</script>
<script>

var myState = {
          pdf: null,
          currentPage: 1,
          zoom: 1
      }
function callPdf(pdf_link){
console.log(pdf_link)
pdfjsLib.getDocument(pdf_link).then((pdf) => {

myState.pdf = pdf;
          render();
});
}

function render() {
          myState.pdf.getPage(myState.currentPage).then((page) => {
        
              var canvas = document.getElementById("pdf_renderer");
              var ctx = canvas.getContext('2d');
    
              var viewport = page.getViewport(myState.zoom);

              canvas.width = viewport.width;
              canvas.height = viewport.height;
        
              page.render({
                  canvasContext: ctx,
                  viewport: viewport
              });
          });
      }

function previousPage(){
if(myState.pdf == null|| myState.currentPage == 1) 
  return;

    myState.currentPage -= 1;
    document.getElementById("current_page").value = myState.currentPage;
    render();
}

function nextPage(){
   if(myState.pdf == null || myState.currentPage > myState.pdf._pdfInfo.numPages) 
  return;
        
  myState.currentPage += 1;
  document.getElementById("current_page").value = myState.currentPage;
  render();
}

function ofPageNumberSet(e){
if(myState.pdf == null) return;

// Get key code
var code = (e.keyCode ? e.keyCode : e.which);

// If key code matches that of the Enter key
if(code == 13) {
    var desiredPage = document.getElementById('current_page').valueAsNumber;
                      
    if(desiredPage >= 1 && desiredPage <= myState.pdf._pdfInfo.numPages) {
        myState.currentPage = desiredPage;
        document.getElementById("current_page").value = desiredPage;
        render();
    }
}
}

function zoomIn(){
  document.getElementById('zoom_in')
  .addEventListener('click', (e) => {
  if(myState.pdf == null) return;
  myState.zoom += 0.5;

  render();
});
}

// 

function zoomOut(){
  document.getElementById('zoom_out')
  .addEventListener('click', (e) => {
  if(myState.pdf == null) return;
  myState.zoom -= 0.5;
   
  render();
});
}

</script>
@endsection