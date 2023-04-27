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
                                    <th>REGISTERED NINJA</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->registered_ninja }}</td>
                                </tr>
                                <tr>
                                    <th>EMAIL</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>VILLAGE</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->village }}</td>
                                </tr>
                                <tr>
                                    <th>HEIGHT</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->height }}</td>
                                </tr>
                                <tr>
                                    <th>WEIGHT</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->weight }}</td>
                                </tr>
                                <tr>
                                    <th>NINJA RANK</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->ninja_rank }}</td>
                                </tr>
                                <tr>
                                    <th>DATE OF BIRTH</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->date_birth }}</td>
                                </tr>
                                <tr>
                                    <th>AGE</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>ASSIGNMENT COMPLETE</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->mission_succes }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center bg-dark" style="width: 19rem;">
                    <img src="{{ asset('storage//public/profil/' . auth()->user()->image) }}"
                        class="img rounded mx-auto d-block mt-3" alt="" width="250px">
                    <div class="card-body">

                        <a href="{{ route('profil.edit', auth()->user()->id) }}" class="btn btn-primary">EDIT PROFIL
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
