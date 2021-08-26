@extends('layouts.body')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ 'home' }}">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if (session('sukses'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('sukses') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif (session('gagal'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
          {{ session('gagal') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="row">
          <div class="col-md-7 mx-auto">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ $user->getAvatar() }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                <p class="text-muted text-center">{{ $user->role }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <i class="fas fa-venus-mars mr-1"></i>
                    <b>Jenis Kelamin</b> 
                    <p class="float-right">
                    @if ($user->gender == 'P') Perempuan 
                    @elseif ($user->gender == 'L') Laki-laki 
                    @else ... 
                    @endif
                  </p>
                  </li>
                  <li class="list-group-item">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    <b>Alamat</b> 
                    <p class="float-right">
                    @if ($user->alamat == NULL)
                        ...
                    @else
                    {{ $user->alamat }}
                    @endif
                  </p>
                  </li>
                  <li class="list-group-item">
                    <i class="fas fa-envelope mr-1"></i>
                    <b>Email</b> 
                    <p class="float-right">
                    @if ($user->email == NULL)
                        ...
                    @else
                    {{ $user->email }}
                    @endif
                    </p>
                  </li>
                </ul>
                <div class="row float-right">
                  <a href="/profile/{{ Auth::user()->id }}/edit" class="btn btn-warning"><b>Edit Profil</b></a>
                </div>
                <div class="row">
                  <a href="/profile/{{ Auth::user()->id }}/changepassword" class="btn btn-info"><b>Ganti Password</b></a>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  @endsection