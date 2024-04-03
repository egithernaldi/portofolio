@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Section') }}</h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __("Edit Portofolio") }}</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.campur.portofolio.update', ['id' => $portofolios->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __('Title') }}</label>
                                <input type="text" name="title" id="title" class="form-control" value='{{ $portofolios->title }}' required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea name="description" id="description" class="form-control" rows="3" required>{{ $portofolios->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">{{ __('Image') }}</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">{{ __('Category') }}</label>
                                <input type="text" name="category" id="category" class="form-control" value='{{ $portofolios->category }}' required>
                            </div>
                            <div class="mb-3">
                                <label for="detail" class="form-label">{{ __('Detail') }}</label>
                                <input type="file" name="detail" id="detail" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label">{{ __('URL') }}</label>
                                <input type="text" name="url" id="url" class="form-control" value='{{ $portofolios->url }}' required>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-secondary px-12 bg-dark hover:text-gray-500 rounded" type="submit">Save edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
