<?php 
class DateHelper extends AppHelper {
    function dateDiff($dt1, $dt2, $timeZone = 'GMT')
    {
        $tZone = new DateTimeZone($timeZone);
        $dt1 = new DateTime($dt1, $tZone);
        $dt2 = new DateTime($dt2, $tZone);
     
        $ts1 = $dt1->format('Y-m-d H:i:s');
        $ts2 = $dt2->format('Y-m-d H:i:s');
     
        $diff = abs(strtotime($ts1)-strtotime($ts2));
     
        $diff_days = round($diff / (3600 * 24));
        $left_hours = $diff % (3600 * 24);
        $diff_hours = round($left_hours / 3600);
        $left_minutes = $left_hours % 3600;
        $diff_minutes = round($left_minutes / 60);

        return array($diff_days, $diff_hours, $diff_minutes);
    }
}
?>
