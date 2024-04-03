@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Section') }}</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __("Edit Section Skills") }}</h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.campur.skills.create') }}" class="btn btn-primary btn-sm mb-3">{{ __('Add Skills') }}</a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('No') }}</th>
                                    <th>{{ __('Skills') }}</th>
                                    <th>{{ __('Proficient') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($skills as $skill)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $skill->skill }}</td>
                                        <td>{{ $skill->proficient }}%</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.campur.skills.edit', $skill->id) }}" class="btn btn-primary btn-sm active"><i class="fas fa-edit"></i></a>


                                                <form action="{{ route('admin.campur.skills.destroy', $skill->id) }}" method="post" onsubmit="return confirm('{{ __('Are you sure you want to delete this item?') }}')">
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
    </div>

    @if (session('successdelete'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ __("Skill deleted successfully!") }}',
                showConfirmButton: true,
                timer: 2000
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ __("Skill Created successfully!") }}',
                showConfirmButton: true,
                timer: 2000
            });
        </script>
    @endif
@endsection
