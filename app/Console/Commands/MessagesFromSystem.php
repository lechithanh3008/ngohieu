<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Visit;
use App\Classes;
use App\DonHang;

class MessagesFromSystem extends Command
{
	protected $signature = 'nvn:check-abandonded-cart';

	protected $description = 'Check abandonded cart and send mail to customer schedule';

    public function handle()
    {
        //
        $date = date("Y-m-d H:i:s");
		$t = strtotime($date);
		$time = $t - (env('CHECK_ABANDONDED') * 60);
		$date = date("Y-m-d H:i:s", $time);

        $dhs = DonHang::where('trangthai', 0)->whereDate('created_at', '<=', $date)->get();
        foreach ($dhs as $key => $dh) {
        	$dh->trangthai = 1;
        	$dh->save();

        	Classes::SendMail($dh, 'cancel-order');
        }

        if(env('CHECK_ABANDONDED1') != 0)
        {
            $time = $t - (env('CHECK_ABANDONDED1') * 60);
            $date = date("Y-m-d H:i:s", $time);

            $time1 = $time - (10 * 60);         // Before $time 10 minutes = Interval of Cron job
            $date1 = date("Y-m-d H:i:s", $time1);

            $dhs = DonHang::where('trangthai', 1)->whereDate('created_at', '<=', $date)
                                                ->whereDate('created_at', '>', $date1)
                                                ->get();
            foreach ($dhs as $key => $dh) {
                Classes::SendMail($dh, 'cancel-order1');
            }
        }

        if(env('CHECK_ABANDONDED2') != 0)
        {
            $time = $t - (env('CHECK_ABANDONDED2') * 60);
            $date = date("Y-m-d H:i:s", $time);

            $time1 = $time - (10 * 60);         // Before $time 10 minutes = Interval of Cron job
            $date1 = date("Y-m-d H:i:s", $time1);

            $dhs = DonHang::where('trangthai', 1)->whereDate('created_at', '<=', $date)
                                                ->whereDate('created_at', '>', $date1)
                                                ->get();
            foreach ($dhs as $key => $dh) {
                Classes::SendMail($dh, 'cancel-order2');
            }
        }
    }
}