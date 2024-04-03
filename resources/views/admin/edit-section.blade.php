@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Section') }}</h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <a href="{{ route('admin.edit-section.index') }}">
                                    {{ __('Edit Section') }}
                                </a>
                            </h6>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.edit-section.update', $socials->first()->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            @foreach ($socials as $social)
                                <div class="container mb-3">
                                    <label for="linkedin">Linkedin</label>
                                    <input type="text" class="form-control rounded" id="linkedin" name="linkedin"
                                        value='{{ $social->linkedin }}'>
                                </div>
                                <div class="container mb-3">
                                    <label for="github">Github</label>
                                    <input type="text" class="form-control rounded" id="github" name="github"
                                        value='{{ $social->github }}'>
                                </div>
                                <div class="container mb-3">
                                    <label for="whatsapp">Whatsapp</label>
                                    <input type="text" class="form-control rounded" id="whatsapp" name="whatsapp"
                                        value='{{ $social->whatsapp }}'>
                                </div>
                                <div class="container mb-3">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" class="form-control rounded" id="twitter" name="twitter"
                                        value='{{ $social->twitter }}'>
                                </div>
                                <div class="container mb-3">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" class="form-control rounded" id="instagram" name="instagram"
                                        value='{{ $social->instagram }}'>
                                </div>
                                <div class="container mb-3">
                                    <label for="gmail">Gmail</label>
                                    <input type="text" class="form-control rounded" id="gmail" name="gmail"
                                        value='{{ $social->gmail }}'>
                                </div>
                                <div class="m-4" align="center">
                                    <button class="btn btn-secondary px-12 bg-dark hover:text-gray-500 rounded"
                                        type="submit">{{ __('Save Edit') }}</button>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

@endsection
