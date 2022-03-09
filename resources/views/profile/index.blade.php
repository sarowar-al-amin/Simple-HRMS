{{-- It's working... You stupid --}}
{{-- It's working!! --}}
@extends('adminlte::page')

@section('title', 'Profile')


@section('content_header')
    <h1>Profile</h1>
@stop

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">About Me</h3>
                            <h6 class="theme-color lead">A Lead UX &amp; UI designer</h6>
                            <p>I <mark>design and develop</mark> services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores. My passion is to design digital user experiences through the bold interface and meaningful interactions.</p>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Expertise Area :</label>
                                        <p>{{ $user->expertise_area }}</p>
                                    </div>
                                    <div class="media">
                                        <label>Designation </label>
                                        <p>{{ $user->designation }}</p>
                                    </div>
                                    <div class="media">
                                        <label>Employe Id:</label>
                                        <p>{{ $user->id }}</p>
                                    </div>
                                    <div class="media">
                                        <label>Employee Type :</label>
                                        <p>{{ $user->employee_type }}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="media">
                                        <label>E-mail : </label>
                                        <p> {{ $user->email}}</p>
                                    </div>
                                    <div class="media">
                                        <label>Phone</label>
                                        <p>820-885-3321</p>
                                    </div>
                                    <div class="media">
                                        <label>Skype</label>
                                        <p>skype.0404</p>
                                    </div>
                                    <div class="media">
                                        <label>Level :</label>
                                        <p>{{ $user->level }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="No image to show">
                        </div>
                    </div>
                </div>
                {{-- <div class="counter">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="500" data-speed="500">500</h6>
                                <p class="m-0px font-w-600">Happy Clients</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="150" data-speed="150">150</h6>
                                <p class="m-0px font-w-600">Project Completed</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="850" data-speed="850">850</h6>
                                <p class="m-0px font-w-600">Photo Capture</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="190" data-speed="190">190</h6>
                                <p class="m-0px font-w-600">Telephonic Talk</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos atque, necessitatibus at adipisci beatae ea tenetur, quisquam accusantium sequi suscipit, ducimus facilis modi a perspiciatis optio labore perferendis doloribus magni.
    </div>
    {{-- <div class="card-body">
        Go to Hell!!!
    </div> --}}
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    {{-- @livewireStyles --}}
@stop

@section('js')

@stop

