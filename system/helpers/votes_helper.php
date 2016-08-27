<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**Votes用辅助函数*/

/**根据开始日期和结束日期计算是否已经开始*/
if ( ! function_exists('cal_if_start')) {
		function cal_if_start($start_date,$end_date) {
			$start_date_whole = intval(substr($start_date,0,4).substr($start_date,5,2).substr($start_date,8,2));
			
			$end_date_whole = intval(substr($end_date,0,4).substr($end_date,5,2).substr($end_date,8,2));
			
			$current_date_whole = intval(date('Y').date('m').date('d'));
			
			$opened = 'false';
			if ($current_date_whole >= $start_date_whole && $current_date_whole <= $end_date_whole) {
				$opened = 'true';
			}
			
			return $opened;
		}
}