@extends('layouts.app')

@section('contents')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">
            <a href="{{ route('admin.edit-section.index') }}" class="text-decoration-none">{{ __('Edit Section') }}</a>
        </h1>

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __("About Me") }}</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.campur.aboutme.update', ['id' => $sectionprofiles->first()->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            @foreach ($sectionprofiles as $sectionprofile)
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control-file" name="image" id="image" accept="image/*">
                                    <small class="form-text text-muted">Jika tidak ingin mengganti gambar, kosongkan saja.</small>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value='{{ $sectionprofile->name }}'>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value='{{ $sectionprofile->phone }}'>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value='{{ $sectionprofile->email }}'>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value='{{ $sectionprofile->address }}'>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="6" class="form-control">{{ $sectionprofile->description }}</textarea>
                                </div>
                            @endforeach
                            <div class="text-center">
                                <button class="btn btn-secondary px-5 bg-dark hover:text-gray-500 rounded" type="submit">Save Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Your edit has been saved',
                showConfirmButton: true,
                timer: 2000
            })
        </script>
    @endif
@endpush
