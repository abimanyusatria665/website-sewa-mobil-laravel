@extends('layout.layout-admin')
@section('contents')
    @if (Session::get('success'))
        <div class="alert alert-success py-1 text-center" role="alert">
            <p style="font-size: 20px">
                {{ Session::get('success') }}
            </p>
        </div>
    @endif
    @if (Session::get('fail'))
        <div class="alert alert-danger py-1 text-center" role="alert">
            <p style="font-size: 20px">
                {{ Session::get('fail') }}
            </p>
        </div>
    @endif
    <div class="row" id="table-head">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Rent Data</h1>
                    <a href="/rent/create" class="btn btn-primary">Rent New Car</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Car Name</th>
                                <th>Subtotal</th>
                                <th>Should Be Returned</th>
                                <th>Status</th>
                                <th>Penalty</th>
                                <th>Total Time</th>
                                <th>Total Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $rent)
                                @foreach ($rent->rentDetails as $detail)
                                    <tr>
                                        <td>{{ $loop->parent->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('images/' . $detail->car->image) }}" alt="Car Image"
                                                style="width: 200px;">
                                        </td>
                                        <td>{{ $detail->car->name }}</td>
                                        <td>Rp {{ number_format($detail->sub_total, 0, ',', '.') }}</td>
                                        <td>{{ $detail->should_be_returned }}</td>
                                        <td>
                                            @if ($detail->status == 0)
                                                Rented
                                            @else
                                                Returned
                                            @endif
                                        </td>
                                        <td>Rp{{ number_format($detail->penalty, 0, ',', '.') }}</td>
                                        <td>{{ $rent->total_time }} Hours</td>
                                        <td>Rp{{ number_format($rent->total_price, 0, ',', '.') }}</td>
                                        <td class="d-flex">
                                            {{-- <a href="/car/edit/{{ $rent->id }}" class="btn btn-warning">Edit</a> --}}
                                            @if ($detail->status == 0)
                                                <form action="/rent/return/{{ $rent->id }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success mt-3">Return</button>
                                                </form>
                                            @else
                                                <span class="btn btn-secondary mt-3">Returned</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
