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
                    <li class="breadcrumb-item"><a href="/profile">User Profile</a></li>   
                    <li class="breadcrumb-item active">User Profile</li>   
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Profil</h3>
                
                    </div>
                    <div class="card-body">      
                        <form action="/profile/{{ Auth::user()->id }}/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nik" class="form-label"><b>Nomor Induk Karyawan (NIK)</b></label>
                                <input name="nik" type="text" class="form-control" id="nik" value="{{ Auth::user()->nik }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label"><b>Nama Lengkap</b></label>
                                <input name="name" type="text" class="form-control" id="name" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label"><b>Jenis Kelamin</b></label>
                                <select name="gender" class="form-control" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="L" @if(Auth::user()->gender == 'L') selected @endif>Laki-laki</option>
                                    <option value="P" @if(Auth::user()->gender == 'P') selected @endif>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label"><b>Alamat</b></label>
                                <textarea name="alamat" class="form-control" id="alamat" rows="3">{{ Auth::user()->alamat }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"><b>Email</b></label>
                                <input name="email" type="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label"><b>Foto Profil</b></label>
                                <input name="avatar" type="file" class="form-control" id="avatar" value="{{ Auth::user()->avatar }}">
                            </div>
                            <button type="submit" class="btn btn-warning float-right ml-2"><b>Update</b></button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary float-right"><b>Kembali</b></a>
                        </form>  
                    </div>
                    <!-- /.card-body -->
                    
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->  
            </div>
        </div>
    </div>
</section> 
@endsection 