<?php

namespace App;

use Mail;
use Session;
/**
 * 
 */
class Classes
{
	public static function toB26($num) 
	{
		$b26 = '';
		do {
			$val = ($num % 26) ?: 26;
			$num = ($num - $val) / 26;
			$b26 = chr($val + 64) . ($b26 ?: '');
		} while (0 < $num);
		while (strlen($b26) < 6) {
			$b26 = 'Z' . $b26;
		}

		return $b26;
	}

	public static function fromB26($text)
	{
		$num = 0;
		$text = strtoupper($text);
		$i = strlen($text) - 1;
		$tem = 1;
		while ($i >= 0) {
			$val = ord(substr($text, $i, 1)) - 64;
			$num += $tem * $val;
			$tem *= 26;
			$i--;
		}
		return $num;
	}

	public static function slugify($str)
	{
	  	$str = mb_strtolower($str);
	    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
	    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
	    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
	    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
	    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
	    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
	    $str = preg_replace('/(đ)/', 'd', $str);
	    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
	    $str = preg_replace('/([\s]+)/', '-', $str);

	  // remove unwanted characters
	  $str = preg_replace('~[^-\w]+~', '', $str);

	  // remove duplicate -
	  $str = preg_replace('~-+~', '-', $str);

	  // trim
	  $str = trim($str, '-');

	  if (empty($str)) {
	    return 'n-a';
	  }

	  return $str;
	}

	public static function updateDotEnv($key, $newValue, $delim='"')
	{
	    $path = base_path('.env');
	    // get old value from current env
	    $oldValue = env($key);


	    // was there any change?
	    if ($oldValue === $newValue) {
	        return;
	    }

	    if(!$oldValue || $oldValue == "" || strpos($oldValue, ' ') !== true)
	    	$newValue = '"'.$newValue.'"';

	    // rewrite file content with changed data
	    if (file_exists($path)) {
	        // replace current value with new value 
	        file_put_contents(
	            $path, str_replace(
	                [$key.'='.$oldValue, $key.'='.$delim.$oldValue.$delim, '""'], 
	                [$key.'='.$newValue, $key.'='.$delim.$newValue.$delim, ''], 
	                file_get_contents($path)
	            )
	        );
	    }
	}

	public static function formatBytes($bytes, $precision = 2) { 
	    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

	    $bytes = max($bytes, 0); 
	    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
	    $pow = min($pow, count($units) - 1); 

	    // Uncomment one of the following alternatives
	    $bytes /= pow(1024, $pow);
	    // $bytes /= (1 << (10 * $pow)); 

	    return round($bytes, $precision) . ' ' . $units[$pow]; 
	} 

	public static function SendMail(DonHang $donhang, $loai = 'new-order')
	{
		$mau = MauMail::where('loai', $loai)->first();
		if(!$mau || !$mau->mail)
			return;
		$body = $mau->mail;
		$keys = array('@customer-name', '@store-name', '@ship-add', '@id-order', '@date-order', '@link-order', '@tracking-code', '@item-list', '@total-payment');

		$add = $donhang->ho.' '.$donhang->ten.' '.$donhang->sdt.'<br/>'.
			$donhang->diachi.' '.$donhang->diachi2.'<br/>'.
			$donhang->tinh;
		if($donhang->bang()->count() > 0) $add .= ' '.$donhang->bang()->first()->ten;
		$add .= ' '.$donhang->zip.'<br/>'.$donhang->dat_nuoc()->first()->ten;

		$list = '<table style="width: 100%">';
		$cts = $donhang->chi_tiet()->get();
		foreach ($cts as $key => $ct) {
			$sp = $ct->san_pham()->first();
			$list .= '<tr><td><img style="height: 100px" src="'.$sp->anh.'"></td>';
			$list .= '<td><a href="'.env('APP_URL').'/detail/'.$sp->slug.'.html">'.$sp->tensp.'</a><br/><small>'.$ct->loai.' | '.$ct->mau.' | '.$ct->co.'</small></td>';
			$list .= '<td>'.$ct->soluong.' x '.env('CURRENCY').$ct->gia.'</td></tr>';
		}
		$list .= '</table>';

		$values = array($donhang->ho.' '.$donhang->ten, 
			env('APP_NAME'),
			$add,
			$donhang->id,
			$donhang->created_at,
			env('APP_URL').'/order/'.$donhang->id,
			$donhang->mavandon,
			$list,
			env('CURRENCY').$donhang->tongtien);
		$body = str_replace($keys, $values, $body);

		Mail::send([], compact('donhang', 'mau', 'body'), function ($message) use ($donhang, $mau, $body) {
            $message->to($donhang->email)
            ->subject($mau->tieude)
            ->setBody($body, 'text/html'); // for HTML rich messages
        });
	}

}



?>