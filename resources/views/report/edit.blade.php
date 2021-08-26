@extends('layouts.body')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daily Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @if (\Auth::user()->role == 'pegawai')
                    <li class="breadcrumb-item"><a href="{{ 'home' }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/report">Task Report</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                    @else
                    <li class="breadcrumb-item"><a href="{{ 'home' }}">Home</a></li>
                    <li class="breadcrumb-item active">Daily Report</li> 
                    <li class="breadcrumb-item"><a href="/report">Task Report</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                    @endif     
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Report</h3>
                
                    </div>
                    <div class="card-body">      
                        <form action="/report/{{ $report->id_report }}/update" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nik" class="form-label"><b>Nomor Induk Karyawan (NIK)</b></label>
                                <input name="nik" type="text" class="form-control" id="nik" value="{{ $report->nik }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="task" class="form-label"><b>Tugas</b></label>
                                <input name="task" type="text" class="form-control" id="task" value="{{ $report->task }}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label"><b>Deskripsi Tugas</b></label>
                                <textarea name="description" class="form-control" id="description" rows="8">{{ $report->description }}</textarea>
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