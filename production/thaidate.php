<?php
// กำหนดค่า Timezone ให้ตรงกับประเทศไทย
date_default_timezone_set('Asia/Bangkok');

// ฟังก์ชันแปลงเดือนและวันเป็นภาษาไทย
function thai_date($date) {
    $thai_month_arr = array(
        1 => 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
        'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
    );
    
    $thai_day_arr = array(
        'Sunday' => 'วันอาทิตย์',
        'Monday' => 'วันจันทร์',
        'Tuesday' => 'วันอังคาร',
        'Wednesday' => 'วันพุธ',
        'Thursday' => 'วันพฤหัสบดี',
        'Friday' => 'วันศุกร์',
        'Saturday' => 'วันเสาร์'
    );

    // แปลงวันที่เป็นภาษาไทย
    $day = $thai_day_arr[date('l', strtotime($date))];
    $month = $thai_month_arr[date('n', strtotime($date))];
    $year = date('Y', strtotime($date)) + 543; // แปลงเป็น พ.ศ.
    $day_number = date('d', strtotime($date));

    return "$day ที่ $day_number $month พ.ศ. $year";
}

// แสดงวันที่ปัจจุบันในรูปแบบภาษาไทย
//echo thai_date(date('Y-m-d')); // ผลลัพธ์ตัวอย่าง: วันจันทร์ ที่ 09 กันยายน พ.ศ. 2567
?>