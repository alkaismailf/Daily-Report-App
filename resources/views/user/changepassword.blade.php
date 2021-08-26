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
                    <li class="breadcrumb-item active">Ganti Password</li>   
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
                        <h3 class="card-title">Ganti Password</h3>
                
                    </div>
                    <div class="card-body">      
                        <form action="/profile/{{ Auth::user()->id }}/updatepassword" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="password" class="form-label"><b>Password</b></label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Password sekarang">
                            </div>
                            <div class="mb-3">
                                <label for="password-baru" class="form-label"><b>Password Baru</b></label>
                                <input name="password-baru" type="password" class="form-control" id="password-baru" placeholder="Ketik password baru">
                            </div>
                            <div class="mb-3">
                                <label for="password-baru-confirm" class="form-label"><b>Konfirmasi Password Baru</b></label>
                                <input name="password-baru-confirm" type="password" class="form-control" id="password-baru-confirm" placeholder="Ketik ulang password baru">
                            </div>

                            <button type="submit" class="btn btn-warning float-right ml-2"><b>Ganti</b></button>
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