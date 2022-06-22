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
                            <a href="/add-guest" class="btn btn-primary mb-3">Add Guestbook</a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Organization</th>
                                        <th>Address</th>
                                        <th>Province</th>
                                        <th>City</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($guest as $row)
                                        <tr>
                                            <td>{{ $row->f_name }}</td>
                                            <td>{{ $row->l_name }}</td>
                                            <td>{{ $row->organization }}</td>
                                            <td>{{ $row->address }}</td>
                                            <td>{{ $row->prov->nama }}</td>
                                            <td>{{ $row->kota->nama }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td class="project-actions ">
                                                <form action="/guest/{{ $row->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a class="btn btn-info btn-sm" href="/guest/{{ $row->id }}/detail">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Detail
                                                    </a>

                                                    <button class="btn btn-danger btn-sm delete-confirm"
                                                        data-name="{{ $row->f_name }}" type="submit"><i
                                                            class="fas fa-trash">
                                                        </i>
                                                        Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">No data Guest</td>
                                        </tr>
                                    @endforelse
                            </table>
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
@push("scripts")
  <<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script type="text/javascript">
  
  $('.delete-confirm').click(function(event) {
    var form =  $(this).closest("form");
    var f_name = $(this).data("f_name");
    event.preventDefault();
    swal({
        title: `Delete Guestbook ?`,
        text: "This data will be deleted",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((result) => {
      if (result) {
        form.submit();
      }
    });
});
  </script>
@endpush