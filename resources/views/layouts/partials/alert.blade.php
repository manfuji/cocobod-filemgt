@if ($message = Session::get('success'))
<div class="container-fluid">
    <div class="alert alert-success alert-dismissible fade show" style="color: white" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text"><strong>Success!</strong> {{$message}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif

@if($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" style="color: white" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>Error!</strong> {{$message}}</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif