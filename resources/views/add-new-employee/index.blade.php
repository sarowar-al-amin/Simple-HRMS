{{-- It's working!! --}}
@extends('adminlte::page')

@section('title', 'Add New Enployee')


@section('content_header')
    <h1 align="center"> Add A New Employee </h1>
@stop

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div style="padding-top:50px;">
            <form action="{{url('/insert/new-employee')}}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                @csrf
                @if ((auth()->user() && auth()->user()->role === 'Admin'))
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Employee ID</label>
                        <input type="text" name="employee_id" class="form-control" id="validationCustom01" placeholder="Employee ID" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">User Email</label>
                        <input type="email" class="form-control" id="validationCustom02" name="email" placeholder="email" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">Username</label>
                        <div class="input-group has-validation">
                          {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                          <input type="text" class="form-control" id="validationCustomUsername" name="name" placeholder="name" required>
                          <div class="invalid-feedback">
                            Enter the username.
                          </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                @else
                    <h2 align="center">You are unauthorized to access this page</h2>
                @endif
            </form>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    {{-- @livewireStyles --}}
@stop

@section('js')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
@stop

