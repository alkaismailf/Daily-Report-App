<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class apiController extends Controller
{
    // Coba API
    public function getReport()
    {
        $report = Report::all();
        return response()->json($report, 200);
    }

    public function addReport(Request $request)
    {
        $add_report = new Report;
        $add_report->nik = $request->nik;
        $add_report->task = $request->task;
        $add_report->description = $request->description;
        $add_report->save();

        return response([
            'status' => 'OK',
            'message' => 'Report berhasil ditambahkan.',
            'data' => $add_report
        ], 200);
    }

    public function updateReport(Request $request, $id)
    {
        // cek data terlebih dahulu
        $cek_report = Report::firstWhere('id_report', $id);
        if ($cek_report) {
            // jika ada datanya
            $add_report = Report::find($id);
            $add_report->nik = $request->nik;
            $add_report->task = $request->task;
            $add_report->description = $request->description;
            $add_report->save();

            return response([
                'status' => 'OK',
                'message' => 'Report berhasil ditambahkan.',
                'data' => $add_report
            ], 200);
        } else {
            // jika tidak ada
            return response([
                'status' => 'Not Found',
                'message' => 'ID Report tidak ditemukan.'
            ], 404);
        }
        
    }

    public function deleteReport($id)
    {
        // cek data terlebih dahulu
        $cek_report = Report::firstWhere('id', $id);
        if ($cek_report) {
            // jika ada datanya
            Report::destroy($id);

            return response([
                'status' => 'OK',
                'message' => 'Data telah dihapus',
            ], 200);
        } else {
            // jika tidak ada
            return response([
                'status' => 'Not Found',
                'message' => 'ID Report tidak ditemukan.'
            ], 404);
        }
        
    }
}
