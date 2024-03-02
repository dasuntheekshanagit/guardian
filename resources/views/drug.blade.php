@extends('layout.main')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Add New Drug</h3>
        </div>
        <div class="card-body">
            <form action="/drugs" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Drug Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Add Drug</button>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h3>Existing Drugs</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drugs as $drug)
                        <tr>
                            <td>{{ $drug->name }}</td>
                            <td>{{ $drug->price }}</td>
                            <td>
                                <a href="/drugs/{{ $drug->id }}/edit" class="btn btn-primary">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <form action="/drugs/{{ $drug->id }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="zmdi zmdi-close"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection