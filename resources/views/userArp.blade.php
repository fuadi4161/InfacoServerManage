@extends('layouts.master')

@section('title', 'Tambah User')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ '/home' }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>IP</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            @foreach ($data as $u)
                            @if ($u['dynamic'] == 'false')
                            <tbody>
                              <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                   
                                    ID : {{ $u['.id'] }}
                                   
                                </td>
                                <td>
                                   
                                    Username : {{ $u['comment'] }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-danger">Hapus</a>
                                </td>
                              </tr>
                            </tbody>
                            @endif
                            @endforeach
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
    
@endsection