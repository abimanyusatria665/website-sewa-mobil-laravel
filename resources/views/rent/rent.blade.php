@extends('layout.layout-admin')
@section('contents')
    <div class="row" id="table-head">
        <div class="col-12">
            <form action="/rent/post" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h1>Payment</h1>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="row my-5">
                        <div class="table-responsive col-12">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Car Name</th>
                                        <th>Price</th>
                                        <th>Total Days</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($car as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('./images/' . $item->image) }}" alt=""
                                                    style="width: 200px"></td>
                                            <td>{{ $item->name }}</td>
                                            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                            <td>
                                                <div class="input-group touchspin-cart">
                                                    <input class="touchspin-cart" type="number" value="0"
                                                        max="30" name="should_be_returned" />
                                                </div>
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="checkbox" name="car"
                                                    value="{{ $item->id }}" id="flexCheckDefault">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- <div class="col-4 shadow-lg py-3">
                            <h1>Customer Data</h1>
                            <br>
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="customer_name">
                            <br>
                            <label for="" class="form-label">Address</label>
                            <input type="text" class="form-control" name="customer_address">
                            <br>
                            <label for="" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="customer_phone_number">
                        </div> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
