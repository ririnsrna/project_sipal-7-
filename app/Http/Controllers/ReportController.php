<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\peminjaman_model;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getReport()
    {
        $peminjam = null;
        $total = null;
        return view('report/report', compact('peminjam', 'total'));
    }

    public function postReport(Request $request)
    {
        $peminjam = peminjaman_model::whereBetween('created_at', [$request->start_date . ' 00:00:00', $request->end_date . ' 23:59:59'])->get();

        // Mencetak laporan pada web, pdf, atau excel
        if ($request->button == "submit") {
            $awal = $request->start_date;
            $akhir = $request->end_date;
            $countPeminjam = $peminjam->count();
            return view('report.report', compact('peminjam', 'countPeminjam', 'awal', 'akhir'));
        } else if ($request->button == "pdf") {
            $awal = $request->start_date;
            $akhir = $request->end_date;
            $countPeminjam = $peminjam->count();

            if ($awal == $akhir) {
                $filename = 'report-' . $akhir . '.pdf';
                $tanggal = $akhir;
            } else {
                $filename = 'report-' . $awal . '---' . $akhir . '.pdf';
                $tanggal = $awal . ' --- ' . $akhir;
            }

            $pdf = PDF::loadView('report.laporanPDF', compact('peminjam', 'countPeminjam', 'tanggal'));

            return $pdf->download($filename);
        }

        return view('report.report', compact('peminjam'));
    }
}
