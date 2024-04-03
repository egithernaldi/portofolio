@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Section') }}</h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __("Create New Experience") }}</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.campur.experience.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="id_experience" class="form-label">Judul</label>
                                <select name="id_experience" id="id_experience" class="form-control" aria-label="Pilih Judul Pengalaman" required>
                                    <option value="" disabled selected>Pilih Judul Pengalaman</option>
                                    @foreach ($titleexperience as $title)
                                        <option value="{{$title->id}}">{{$title->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            
                            <div class="mb-3">
                                <label for="position" class="form-label">{{ __('Position') }}</label>
                                <input name="position" id="position" class="form-control" type="text" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="from" class="form-label">{{ __('From') }}</label>
                                <input type="date" name="from" id="from" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="to" class="form-label">{{ __('To') }}</label>
                                <input type="date" name="to" id="to" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="place" class="form-label">{{ __('Place') }}</label>
                                <input type="text" name="place" id="place" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="about" class="form-label">{{ __('About') }}</label>
                                <input type="text" name="about" id="about" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea name="description" id="description" class="form-control" style="white-space: pre-wrap;" rows="3" required></textarea>
                            </div>
                            
                            <div class="text-center">
                                <button class="btn btn-secondary px-12 bg-dark hover:text-gray-500 rounded" type="submit">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
