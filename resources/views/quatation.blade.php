@extends('layout.main')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Quotation for {{ $prescription->title }}</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Drug ID</th>
                        <th scope="col">Drug Name</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prescription->drugs as $drug)
                        <tr>
                            <td>{{ $drug->id }}</td>
                            <td>{{ $drug->name }}</td>
                            <td>{{ $drug->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{ route('acceptQuotation', $prescription->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Accept Quotation</button>
            </form>
        </div>
    </div>
</div>
@endsection