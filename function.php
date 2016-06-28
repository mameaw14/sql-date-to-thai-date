<?php

function convert_date($date){
	return array((int)substr($date, 6, 2),(int)substr($date, 4, 2),(int)substr($date, 0, 4));
}

function thaidate($datearr_start,$datearr_end=null){
	$thai_month_arr=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน", "กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");                   
	$day_start = $datearr_start[0];
	$month_start = $thai_month_arr[$datearr_start[1]-1];
	$year_start = $datearr_start[2]+543;
	if(!$datearr_end){
	return $day_start.' '.$month_start.' '.$year_start;
	}

	$day_end = $datearr_end[0];
	$month_end = $thai_month_arr[$datearr_end[1]-1];
	$year_end = $datearr_end[2]+543;
	if($year_start!=$year_end){
		return $day_start.' '.$month_start.' '.$year_start.' - '.$day_end.' '.$month_end.' '.$year_end;
	}
	if($month_start!=$month_end){
		return $day_start.' '.$month_start.' - '.$day_end.' '.$month_end.' '.$year_end;
	}
	return $day_start.' - '.$day_end.' '.$month_end.' '.$year_end;
}

function thai_date_event($date_start,$date_end=null){
	$date_start = convert_date($date_start);
	if($date_end) $date_end = convert_date($date_end);
	return thaidate($date_start,$date_end);
}
