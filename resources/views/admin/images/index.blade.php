@extends('admin.layouts.admin')

@section('title', 'Images')

@push('styles')
    <style>
        .img-small {
            height: 2.5em;
            border-radius: 5px;
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Path</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($images as $image)
                        <tr>
                            <th scope="row">{{ $image->id }}</th>
                            <td>
                                <a href="{{ image_url($image->file) }}" target="_blank">
                                    <img src="{{ image_url($image->file) }}" class="img-small rounded" alt="{{ $image->name }}">
                                </a>
                            </td>
                            <td>{{ $image->name }}</td>
                            <td><a href="{{ image_url($image->file) }}" target="_blank">{{ $image->file }}</a></td>
                            <td>
                                <a href="{{ route('admin.images.edit', $image) }}" class="mx-1"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.images.destroy', $image) }}" class="mx-1" data-confirm="delete"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $images->links() }}

            <a class="btn btn-primary" href="{{ route('admin.images.create') }}"><i class="fas fa-plus"></i> Create</a>
        </div>
    </div>
@endsection
