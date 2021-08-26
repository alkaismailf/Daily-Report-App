<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    // Tampilkan data
    public function index()
    {        
        $data_report = \App\Report::where('nik', Auth::user()->nik)->orderBy('created_at')->get();

        return view('report.index', ['data_report' => $data_report]);
    }

    public function indexall()
    {        
        $data_report = \App\Report::orderBy('created_at')->get();
        return view('report.indexall', ['data_report' => $data_report]);
    }

    // Proses buat data baru
    public function create(Request $request) 
    {
        \App\Report::create($request->all());
        return redirect('/report')->with('sukses', 'Data berhasil ditambahkan!');
    }

    // Tampilkan halaman detail
    public function detail($id) 
    {
        $report = \App\Report::find($id);
        return view('report.detail', ['report' => $report]);
    }

    // Tampilkan halaman edit
    public function edit($id) 
    {
        $report = \App\Report::find($id);
        return view('report.edit', ['report' => $report]);
    }

    // Proses edit/update data
    public function update(Request $request, $id) 
    {        
        $report = \App\Report::find($id);
        $report->update($request->all());
        return redirect('/report')->with('sukses', 'Data berhasil diubah!');
    }

    // Proses delete data
    public function delete($id) 
    {
        $report = \App\Report::find($id);
        $report->delete();
        return redirect('/report')->with('sukses', 'Data berhasil dihapus!');
    }

}
