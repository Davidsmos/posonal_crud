<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="card">
            <h1 class="text-center">CreateProduct</h1>
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="Slug" class="form-label">Slug</label>
                    <input type="Slug" name="slug" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="description" name="description" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="description" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="qty" class="form-label">qty</label>
                    <input type="number" name="qty" class="form-control">
                </div>

                {{-- <div class="mb-3">
                    @foreach ($categories as $item)
                        <select class="form-select" name="category_id">
                            <option selected>Choose category ID </option>
                            <option value="{{ $item->id }}">{{ $item->name }}</option>

                        </select>
                    @endforeach

                </div> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
