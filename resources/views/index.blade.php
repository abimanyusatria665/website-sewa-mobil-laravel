@extends('layout.layout')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('./img/civic.avif') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('./img/civic-2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('./img/civic-3.png') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="content-1">
        <div class="container">
            <div class="row mt-5 py-5">
                <div class="col-6 left">
                    <img src="{{ asset('./img/lambo.webp') }}" alt="" class="about-img">
                </div>
                <div class="col-6 right">
                    <h1 class="title-1">About Us</h1>
                    <p class="about-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt in rem, quisquam
                        animi perspiciatis aliquam dolore commodi minus eius sequi inventore neque mollitia aspernatur nisi
                        eaque nulla, quas reprehenderit modi est saepe deleniti quibusdam. Blanditiis quibusdam quia vero
                        quae modi sit. In amet minus, accusamus, nulla fuga voluptatem quaerat quod quam nobis esse iste
                        dignissimos vero a? Quaerat, adipisci repudiandae. Labore dolores nihil ipsa. Dolorum incidunt
                        cupiditate blanditiis recusandae tempore. Tempora laborum eius, inventore id a debitis sequi
                        molestias maiores dolorem nihil sapiente doloribus reprehenderit iste, voluptates at tenetur</p>
                </div>
            </div>
        </div>
    </div>
    <div class="content-2">
        <div class="container">
            <div class="text-center pt-4">
                <h1 class="title-2">
                    Rent Our Cars
                </h1>
            </div>
            <div class="row py-5 justify-content-around">
                @foreach ($data as $item)
                    <div class="card bg-1" style="width: 18rem;">
                        <img src="{{ asset('./images/' . $item->image) }}" class="card-img-top" alt="..."
                            style="margin-top : 20px; border-radius : 5%;">
                        <div class="card-body">
                            <h5 class="card-title text-white">{{ $item->name }}</h5>
                            <p class="card-text text-white">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                            <a href="/rent/create" class="btn bg-2 text-white">Rent</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
