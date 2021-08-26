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
                    <li class="breadcrumb-item active">Detail</li>
                    @else
                    <li class="breadcrumb-item"><a href="{{ 'home' }}">Home</a></li>
                    <li class="breadcrumb-item active">Daily Report</li> 
                    <li class="breadcrumb-item"><a href="/report">Task Report</a></li>
                    <li class="breadcrumb-item active">Detail</li>
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
                        <h3 class="card-title">Report Detail</h3>
                    </div>
                    <div class="card-body">      
                            <div class="form-group row">
                                <label for="nik" class="col-sm-2 col-form-label"><b>NIK</b></label>
                                <div class="col-sm-10">
                                    <input name="nik" type="text" readonly class="form-control-plaintext" id="nik" value="{{ $report->nik }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="task" class="col-sm-2 col-form-label"><b>Tugas</b></label>
                                <div class="col-sm-10">
                                    <input name="task" type="text" readonly class="form-control-plaintext" id="task" value="{{ $report->task }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label"><b>Deskripsi Tugas</b></label>
                                <div class="col-sm-10">
                                    <textarea name="description" type="text" readonly class="form-control-plaintext" id="description" rows="8">{{ $report->description }}</textarea>
                                </div>
                            </div>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary float-right"><b>Kembali</b></a>      
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