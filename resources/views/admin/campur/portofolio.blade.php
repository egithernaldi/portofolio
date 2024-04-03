@extends('layouts.app')

@section('contents')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">{{ __('Skills') }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('Skills') }}</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-table me-1"></i>
                                {{ __("Skills") }}
                            </div>
                            <div>
                                <a href="{{ route('admin.campur.portofolio.create') }}" class="btn btn-primary">{{ __('Add Portofolio') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{ __('No') }}</th>
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th>{{ __('Category') }}</th>
                                        <th>{{ __('Detail') }}</th>
                                        <th>{{ __('URL') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($portofolio as $portofolio)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('storage/portofolio/' . $portofolio->image) }}" class="img-fluid" style="max-width: 90px;" alt="">
                                        </td>
                                        <td>{{ $portofolio->title }}</td>
                                        <td>{{ $portofolio->description }}</td>
                                        <td>{{ $portofolio->category }}</td>
                                        <td>
                                            <img src="{{ asset('storage/portofolio/' . $portofolio->detail) }}" class="img-fluid" style="max-width: 90px;" alt="">
                                        </td>
                                        <td>{{ $portofolio->url }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.campur.portofolio.edit', $portofolio->id) }}" class="btn btn-primary btn-sm active"><i class="fas fa-edit"></i></a>
                                                
                                                <!-- Delete Form -->
                                                <form action="{{ route('admin.campur.portofolio.destroy', $portofolio->id) }}" method="post" onsubmit="return confirm('{{ __('Yakin Hapus data?') }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm active" type="submit"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

@push('after-script')
@if ($message = Session::get('successdelete'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ __("Portofolio deleted successfully!") }}',
            showConfirmButton: true,
            timer: 2000
        })
    </script>
@endif
@if ($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ __("Portofolio Created successfully!") }}',
            showConfirmButton: true,
            timer: 2000
        })
    </script>
@endif
@endpush
