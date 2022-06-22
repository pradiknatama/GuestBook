@extends('layouts.dashboard')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Change Password</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ url('/profil/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class=" row mb-3">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ $user->name }}"  autocomplete="name">
                                    </div>
                                </div>
                                @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class=" row mb-3">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                    </div>
                                </div>
                                @error('current_password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class=" row mb-3">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                    </div>
                                </div>
                                @error('new_password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class=" row mb-3">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Confrim Password</label>
                                    <div class="col-sm-10">
                                        <input id="new_confirm_password" type="password" class="form-control"
                                            name="new_confirm_password" autocomplete="current-password">
                                    </div>
                                </div>
                                @error('new_confirm_password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="d-flex justify-content-end pt-2">
                                        <button class="btn btn-primary"
                                        type="submit">Simpan</button></div>

                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection
