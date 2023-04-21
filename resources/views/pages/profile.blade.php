@extends('layouts.app')

@section('content')
    @include('layouts.partials.alert')
    <div class="container">
        <div class="container-fluid py-4">

            <div class="card px-3 py-3">
                <form action="{{ route('profile.update', $profile->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <div class="input-group input-group-dynamic my-3 is-filled">
                                <label class="form-label">First Name</label>
                                <input class="form-control" type="text" name="firstname"
                                    value="{{ $profile->first_name }}" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="input-group input-group-dynamic my-3 is-filled">
                                <label class="form-label">Last Name</label>
                                <input class="form-control" type="text" name="lastname" value="{{ $profile->last_name }}"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="input-group input-group-dynamic my-3 is-filled">
                                <label class="form-label">Other Name</label>
                                <input class="form-control" type="text" name="othername"
                                    value="{{ $profile->other_name }}" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="input-group input-group-dynamic my-3 is-filled">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" name="email" value="{{ $profile->email }}"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="input-group input-group-dynamic my-3 is-filled">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" value=""
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="frame">
                                <img id="preview" src="./private/image/{{ $profile->image }}" alt=""
                                    style="width:200px;height:200px;background:grey;">
                            </div>
                            <div class="input-group input-group-static mb-4 my-3 is-filled">
                                <input type="file" onchange="previewImage(event)" name="profile" class="form-control"
                                    id="" accept="image/.jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function previewImage(event) {
            console.log("e", event)
            const [file] = event['target']['files'];
            if (file) {
                var preview = document.getElementById('preview');
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
