<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\Pegawai;
use Carbon\Carbon;

class AbsenController extends Controller
{
    public function index()
    {
        return view('pages.absen');
    }

    public function absen(Request $request)
    {
        $request->validate([
            'nip' => 'required|numeric',
        ]);

        $pegawai = Pegawai::where('nip', $request->input('nip'))->first();

        if (!$pegawai) {
            return redirect()->back()->withErrors(['NIP tidak ditemukan']);
        }

        $currentDateTime = Carbon::now('Asia/Jakarta');
        $formattedDateTime = $currentDateTime->format('d-m-Y H:i:s');
        $currentDate = $currentDateTime->toDateString();

        $absen = Absen::where('pegawai_id', $pegawai->id)
                      ->whereDate('created_at', $currentDate)
                      ->first();

        if ($absen) {
            if (is_null($absen->out)) {
                $absen->out = $currentDateTime;
                $absen->save();
                return redirect()->back()->with('success', "Berhasil absen keluar hari ini pada tanggal {$formattedDateTime}");
            } else {
                return redirect()->back()->withErrors(["Anda sudah absen keluar hari ini pada tanggal {$absen->date} {$absen->out}"]);
            }
        } else {
            $absen = new Absen();
            $absen->pegawai_id = $pegawai->id;
            $absen->date = $currentDate;
            $absen->in = $currentDateTime;
            $absen->save();

            return redirect()->back()->with('success', "Berhasil absen masuk hari ini pada tanggal {$formattedDateTime}");
        }
    }
}