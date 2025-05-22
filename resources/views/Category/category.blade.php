<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Custom styles for the table */
        .table-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 30px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.8s ease-out;
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            background-color: #fff;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            font-size: 1.8rem;
            font-weight: bold;
            text-align: center;
            border-bottom: none;
        }

        .card-body {
            padding: 30px;
        }

        .table {
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff;
        }

        .table thead th {
            background-color: #343a40;
            color: white;
            text-transform: uppercase;
            font-weight: 600;
            padding: 15px;
            border: none;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
            transform: scale(1.01);
        }

        .table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            border: none;
        }

        .category-image {
            max-width: 80px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .category-image:hover {
            transform: scale(1.1);
        }

        .no-image {
            color: #6c757d;
            font-style: italic;
        }

        .btn-primary,
        .btn-danger {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-right: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-danger:hover {
            background-color: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-container {
            margin: 20px 30px;
            display: flex;
            gap: 10px;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .table-container {
                margin: 20px;
                padding: 20px;
            }

            .table thead th,
            .table tbody td {
                font-size: 0.85rem;
                padding: 10px;
            }

            .btn-primary,
            .btn-danger {
                padding: 6px 12px;
                font-size: 0.8rem;
            }

            .category-image {
                max-width: 60px;
            }

            .card-header {
                font-size: 1.5rem;
                padding: 15px;
            }

            .card-body {
                padding: 20px;
            }

            .btn-container {
                margin: 10px 20px;
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>

<body>
    <div class="table-container">
        <div class="card">
            <div class="card-header">
                Category List
            </div>
            <div class="card-body">
                <div class="btn-container">
                    <a href="{{ route('category.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i>
                        Create Category</a>
                    <a href="{{ route('products.index') }}" class="btn btn-primary"><i class="bi bi-box-seam"></i>
                        Product List</a>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($category as $item)
                            <tr>
                                <td scope="row">{{ $item->id }}</td>
                                <td>
                                    {{ $item->name }}
                                    @if ($item->image)
                                        {{-- <div>
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                                class="category-image">
                                        </div> --}}
                                        {{-- @else
                                        <span class="no-image">No Image</span> --}}
                                    @endif
                                </td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->status }}</td>
                                <td class="action-buttons">
                                    <a href="{{ route('category.edit', $item->id) }}" class="btn btn-primary">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('category.destroy', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No categories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
