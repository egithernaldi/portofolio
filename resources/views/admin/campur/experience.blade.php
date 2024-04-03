@extends('layouts.app')

@section('contents')


    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">{{ __('Edit Experience') }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('Edit Experience') }}</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-table me-1"></i>
                                {{ __("Edit Experience") }}
                            </div>
                            <div>
                                <a href="{{ route('admin.campur.experience.create') }}" class="btn btn-primary">{{ __('Add Experience') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{ __('No') }}</th>
                                        <th>{{ __('Position') }}</th>
                                        <th>{{ __('From') }}</th>
                                        <th>{{ __('To') }}</th>
                                        <th>{{ __('Place') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th>{{ __('Action') }}</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($experience as $experience)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $experience->position }}</td>
                                        <td>{{ $experience->from }}</td>
                                        <td>{{ $experience->to }}</td>
                                        <td>{{ $experience->place }}</td>
                                        <td>{{ $experience->description }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="{{ route('admin.campur.experience.edit', $experience->id) }}" class="btn btn-primary btn-sm active"><i class="fas fa-edit"></i></a>

                                                <form action="{{ route('admin.campur.experience.destroy', $experience->id) }}" method="post" onsubmit="return confirm('{{ __('Yakin Hapus data?') }}')">
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
