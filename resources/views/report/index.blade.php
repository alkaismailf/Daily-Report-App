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
                    <li class="breadcrumb-item active">Task Report</li>
                    @else
                    <li class="breadcrumb-item"><a href="{{ 'home' }}">Home</a></li>
                    <li class="breadcrumb-item active">Daily Report</li> 
                    <li class="breadcrumb-item active">Task Report</li> 
                    @endif     
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        @if (session('sukses'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('sukses') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Daily Report Pegawai</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-row align-items-center ml-3 mt-2">
                        <div class="col-4">
                            <!-- Date range -->
                            <label>Date range:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                                </div>
                                <input type="text" class="form-control float-right" id="reservation">
                            </div>
                        </div>
                        <div class="col-8">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success float-right mt-4 mr-3" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus mr-1"></i>
                                <b>Tambah data</b>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>No.</th>
                                    <th>NIK</th>
                                    <th>Task</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_report as $i => $report)
                                <tr>
                                    <td class="text-center">{{ $i+1 }}</td>
                                    <td class="text-center">{{ $report->nik }}</td>
                                    <td>{{ $report->task }}</td>
                                    <td class="text-center">{{ date('d/m/Y', strtotime($report->created_at)) }}</td>
                                    <td class="text-center">
                                        <a href="/report/{{ $report->id_report }}/detail" class="btn btn-secondary btn-sm">detail</a>
                                        <a href="/report/{{ $report->id_report }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="/report/{{ $report->id_report }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan dihapus?')"><i class="far fa-trash-alt"></i></a>       
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    Data Daily Reporting Pegawai
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah report baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/report/create" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nik" class="form-label">Nomor Induk Karyawan</label>
                        <input name="nik" type="text" class="form-control" id="nik" aria-describedby="emailHelp" value="{{ Auth::user()->nik }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="task" class="form-label">Tugas</label>
                        <input name="task" type="text" class="form-control" id="task">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Tugas</label>
                        <textarea name="description" class="form-control" id="description" rows="10"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Close</b></button>
                <button type="submit" class="btn btn-primary"><b>Submit</b></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection