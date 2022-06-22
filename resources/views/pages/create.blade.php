@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Guestbook</h1>
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
                            <h3 class="card-title">List table Guestbook</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="/add-guest" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class=" row mb-3">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fname">
                                    </div>
                                </div>
                                @error('fname')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class=" row mb-3">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="lname">
                                    </div>
                                </div>
                                @error('lname')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class=" row mb-3">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Organization</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="organization">
                                    </div>
                                </div>
                                @error('organization')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class=" row mb-3">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                </div>
                                @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="row mb-3">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Province</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="provinsi" name="province"
                                            aria-label="Default select example" required>
                                            @forelse ($provinsi as $item)
                                                <option value="{{ $item->kode }}">{{ $item->nama }}</option>
                                            @empty
                                                <option disabled>Province empty</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                @error('province')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="row mb-3">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">City</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="city" id="kota"
                                            aria-label="Default select example" required>
                                            @forelse ($provinsi as $item)
                                                <option value="{{ $item->kode }}">{{ $item->nama }}</option>
                                            @empty
                                                <option disabled>City empty</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                @error('city')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class=" row mb-3">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                </div>
                                @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="d-flex justify-content-end pt-2"><a href="/home"
                                        class="btn btn-warning mx-2 ">Kembali</a><button class="btn btn-primary"
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
    <!-- /.content -->
@endsection
@push('scripts')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(function() {
                $('#provinsi').on('change', function() {
                    let kode_provinsi = $('#provinsi').val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getCity') }}",
                        data: {
                            kode_provinsi: kode_provinsi
                        },
                        cache: false,
                        success: function(msg) {
                            $('#kota').html(msg);
                        },
                        error: function(data) {
                            console.log('Error: ', data);
                        }
                    })
                })
            })
        })
    </script>
@endpush
