@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Section') }}</h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __("Create Skill") }}</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.campur.skills.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="skill" class="form-label">{{ __('Skill Name') }}</label>
                                <input type="text" class="form-control" id="skill" name="skill" required>
                            </div>
                            <div class="mb-3">
                                <label for="proficient" class="form-label">{{ __('Proficient') }}</label>
                                <input type="range" value="" min="1" max="100" oninput="this.nextElementSibling.value = this.value" class="form-range" id="proficient" name="proficient" required>
                                <output style="color: orangered;">50</output>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-secondary px-12 bg-dark hover:text-gray-500 rounded" type="submit">{{ __('Create Skill') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
