@extends('layouts.main')

@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="width: 32rem;">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->name }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->dateBirth }}</td>
                                </tr>
                                <tr>
                                    <th>Domisili</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->Domisili }}</td>
                                </tr>
                                <tr>
                                    <th>Pekerjaan</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->Job }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <th>:</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                            </thead>
                        </table>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="width: 15rem;">
                    <div class="card-body">

                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" class="img-fluid-thumbnail"
                            alt="" width="200px">

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
