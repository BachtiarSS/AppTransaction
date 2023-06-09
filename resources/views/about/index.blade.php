@extends('layouts.main')

@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-5" style="width: 32rem;">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>NAMA</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->name }}</td>
                                </tr>
                                <tr>
                                    <th>VILLAGE</th>
                                    <th>:</th>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam inventore
                                    </td>
                                </tr>
                                <tr>
                                    <th>NINJA RANK</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->Domisili }}</td>
                                </tr>
                                <tr>
                                    <th>REGISTERED NINJA</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->Job }}</td>
                                </tr>
                                <tr>
                                    <th>DATE OF BIRTH</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>AGE</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>ZODIAC</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>HEIGHT</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>WEIGHT</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>BLOOD TYPE</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>FAVORITE FOODS</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>HOBBY</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>ASSIGNMENT COMPLETE</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="width: 25rem;">
                    <div class="card-body">

                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" class="img-fluid-thumbnail"
                            alt="" width="200px">
                        <div class="d-grid gap-2 col-10 mx-auto">
                            <a href="{{ route('category.index') }}" class="btn btn-dark stretched-link">EDIT</a>
                            <a href="{{ route('category.index') }}" class="btn btn-info stretched-link">UPDATE</a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
