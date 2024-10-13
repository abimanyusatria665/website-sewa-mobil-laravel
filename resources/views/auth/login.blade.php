<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="auth.css">
</head>

<body>
    <div class="container-fluid">
        <div class="container row justify-content-around">
            <div class="col-6 mt-5 offset-3 bg-1 card-1 py-4">
                <h1 class="title-1 text-white text-center">
                    Login
                </h1>
                <form action="{{ route('login.post') }}" method="POST" class="col-8 offset-2">
                    @csrf
                    <label for="email" class="text-white">
                        <h4>Email</h4>
                    </label>
                    <input type="text" name="email" id="email" placeholder="User@gmail.com"
                        class="form-control">
                    <label for="password" class="text-white mt-3">
                        <h4>Password</h4>
                    </label>
                    <input type="password" name="password" id="" placeholder="Password"
                        class="form-control mb-3">
                    <a href="/register" class="text-white">Dont Have Account? Register Here</a>
                    <button type="submit" class="btn btn-success col-12 bg-2 text-white mt-4">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
