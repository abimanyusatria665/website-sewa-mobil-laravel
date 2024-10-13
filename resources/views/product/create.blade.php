@php
    $isActive = true;
@endphp
@extends('layout.layout-admin')
@section('contents')
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                @if (Session::get('fail'))
                    <div class="alert alert-danger py-1 text-center" role="alert">
                        <p style="font-size:  20px">
                            {{ Session::get('fail') }}
                        </p>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Car</h4>
                    </div>
                    <form action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">Car Image</label>
                                        <input type="file" class="form-control" id="basicInput" name="image" />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">Car Name</label>
                                        <input type="text" class="form-control" id="basicInput" name="name"
                                            placeholder="Enter The Car Name" />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="helpInputTop">Price</label>
                                        <input type="number" class="form-control" id="helpInputTop" name="price"
                                            placeholder="Enter The Car Price" />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12 mt-2">
                                    <div class="mb-1">
                                        <button class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
