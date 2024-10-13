@extends('layout.layout-admin')
@section('contents')
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Product</h4>
                    </div>
                    @if (Session::get('fail'))
                        <div class="alert alert-danger py-1 text-center" role="alert">
                            <p style="font-size:  20px">
                                {{ Session::get('fail') }}
                            </p>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('car.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="col-xl-12 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">Car Image</label>
                                            <input type="file" class="form-control" value="{{ $data->image }}"
                                                id="basicInput" name="image" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">Product
                                            Name</label>
                                        <input type="text" class="form-control" id="basicInput" name="name"
                                            placeholder="Enter The Product Name" value="{{ $data->name }}" />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="helpInputTop">Price</label>
                                        <input type="number" class="form-control" id="helpInputTop" name="price"
                                            placeholder="Enter The Product Price" value="{{ $data->price }}" />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <button class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
