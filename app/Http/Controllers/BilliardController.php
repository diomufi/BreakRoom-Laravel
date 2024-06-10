<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrxTableBilliard;
use App\Models\Member;
use App\Models\TableInfo;
use App\Models\Transaction;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon;

class BilliardController extends Controller
{
    public function index()
    {
        $bookings = DB::table('trxtablebilliard')
            ->join('member', 'trxtablebilliard.id_member', '=', 'member.id_member')
            ->select('trxtablebilliard.*', 'member.Nama as Name')
            ->get();

        return view('live-booking-table', compact('bookings'));
    }

    public function stopBooking(Request $request)
    {
        $id_trxTableBilliard = $request->input('id_trxTableBilliard');

        $booking = TrxTableBilliard::find($id_trxTableBilliard);

        if ($booking) {
            $id_member = $booking->id_member;
            $date = $booking->Date;
            $time = $booking->Time;
            $id_table = $booking->id_table;

            // Menggunakan Carbon untuk mengatur zona waktu ke Asia/Jakarta
            $now = Carbon::now('Asia/Jakarta');
            $date_checkout = $now->format('Y-m-d');
            $time_checkout = $now->format('H:i:s');

            $datetime_start = new DateTime("$date $time");
            $datetime_end = new DateTime("$date_checkout $time_checkout");
            $interval = $datetime_start->diff($datetime_end);
            $seconds = $interval->days * 24 * 60 * 60 + $interval->h * 60 * 60 + $interval->i * 60 + $interval->s;

            $rate_per_hour = 35000;
            $rate_per_second = $rate_per_hour / 3600;
            $amount = $seconds * $rate_per_second;
            $amount = ceil($amount);

            $transaction = new Transaction();
            $transaction->id_member = $id_member;
            $transaction->id_trxTableBilliard = $id_trxTableBilliard;
            $transaction->Date_checkout = $date_checkout;
            $transaction->Time_checkout = $time_checkout;
            $transaction->Amount = $amount;
            $transaction->save();

            $tableinfo = TableInfo::find($id_table);
            if ($tableinfo) {
                $tableinfo->Action = 'NoAction';
                $tableinfo->save();
            }

            $booking->delete();

            Session::put('transaction_info', [
                'id_member' => $id_member,
                'id_trxTableBilliard' => $id_trxTableBilliard,
                'Date_checkout' => $date_checkout,
                'Time_checkout' => $time_checkout,
                'Amount' => $amount
            ]);

            return redirect()->route('stop-cetak');
        } else {
            return redirect()->back()->withErrors(['msg' => 'Data tidak ditemukan.']);
        }
    }

    public function cetak()
    {
        $transaction_info = Session::get('transaction_info');

        if ($transaction_info) {
            $member = Member::find($transaction_info['id_member']);
            $member_name = $member->Nama;

            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);

            $dompdf = new Dompdf($options);

            $html = view('cetak', compact('transaction_info', 'member_name'))->render();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A6', 'portrait');
            $dompdf->render();
            $dompdf->stream('struk-transaksi.pdf', ['Attachment' => false]);
        } else {
            return "Informasi transaksi tidak tersedia.";
        }
    }
}

