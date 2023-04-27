@extends('layouts.main')

@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{ route('profil.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $user->name) }}">
                    </div>
                    <div class="mb-3">
                        <label for="registered_ninja" class="form-label">Registered Ninja</label>
                        <input type="text" class="form-control" id="registered_ninja" name="registered_ninja"
                            value="{{ old('registered_ninja', $user->registered_ninja) }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $user->email) }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Village</label>
                        <input type="text" class="form-control" id="village" name="village"
                            value="{{ old('email', $user->village) }}">
                    </div>

                    <div class="mb-3">
                        <label for="height" class="form-label">Height</label>
                        <input type="text" class="form-control" id="height" name="height"
                            value="{{ old('height', $user->height) }}">
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">weight</label>
                        <input type="text" class="form-control" id="weight" name="weight"
                            value="{{ old('weight', $user->weight) }}">
                    </div>

                    <div class="mb-3">
                        <label for="ninja_rank" class="form-label">Ninja Rank</label>
                        <select class="form-select" aria-label="Default select example" name="ninja_rank" id="ninja_rank"
                            value="{{ old('ninja_rank', $user->ninja_rank) }}">
                            <option value="Genin">Genin</option>
                            <option value="Chunin">Chunin</option>
                            <option value="Jounin">Jounin</option>
                            <option value="Hokage">Hokage</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date_birth" class="form-label">Date Birth</label>
                        <input type="date" class="form-control" id="date_birth" name="date_birth"
                            value="{{ old('date_birth', $user->date_birth) }}">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="age" name="age"
                            value="{{ old('age', $user->age) }}">
                    </div>
                    <div class="mb-3">
                        <label for="mission_succes" class="form-label">Assignments Complete</label>
                        <input type="text" class="form-control" id="mission_succes" name="mission_succes"
                            value="{{ old('mission_succes', $user->mission_succes) }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" id="image" name="image"
                            value="{{ old('mission_succes', $user->image) }}">
                    </div>



                    <button type="submit" class="btn btn-primary mb-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
