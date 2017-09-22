<?php
$view_date = "<th>&emsp;&emsp;&emsp;</th>";
//日本語曜日の配列作成
$week_day_jp = array("(日)","(月)","(火)","(水)","(木)","(金)","(土)");

//14日間　２週間先まで
for($j=1; $j<=31; $j++){
  $interview_date =strtotime("+".$j." day");
  // $interview_date = date('Y-m-d', mktime(0, 0, 0, date('n'), date('j') + $j, date('Y')));
  $week_day_num = date('w',$interview_date);//曜日のnumを取得
  $interview_date_s = date('m/d',$interview_date);
    if($week_day_num == 0){
      $view_date .= '<th class="sunday">'.$interview_date_s.'<br>'.$week_day_jp[$week_day_num].'</th>';
    }elseif($week_day_num == 6){
      $view_date .= '<th class="saturday">'.$interview_date_s.'<br>'.$week_day_jp[$week_day_num].'</th>';
    }else{
    $view_date .= '<th>'.$interview_date_s.'<br>'.$week_day_jp[$week_day_num].'</th>';
    }
}

//フォーム出力
$view_form = "";
$target_date_time = '08:00:00';
$interview_date = date('Y-m-d', mktime(0, 0, 0, date('n'), date('j'), date('Y')));
$interview_date_time = $interview_date." ".$target_date_time;

//明日の8時にプラス30分、1日づつプラスして、14日間出力
//明日の8時にプラス60分、1日づつプラスして、14日間出力
//以下24時迄繰り返し
$interview_date_time_tommorow = date("Y-m-d H:i:s",strtotime($interview_date_time . "+1 day"));
for($j=0; $j<15; $j++){
  $view_form .= "<tr>";
  $target_plus_minute = 60 * $j;
  $target_ingerview_date_time = date("Y-m-d H:i",strtotime($interview_date_time_tommorow . "+".$target_plus_minute." minutes"));

  $time_for_header = explode(" ",$target_ingerview_date_time);
  $view_form .= '<th>'.$time_for_header[1].'</th>';
    for($i=0; $i<32; $i++){
      $target_ingerview_date_time2 = date("Y-m-d H:i:s",strtotime($target_ingerview_date_time . "+".$i." day"));

      //すでに予約が入っている時間はdisableそうでなければ予約可
      // if(in_array($target_ingerview_date_time2,$reserve_time_list)){
      // $view_form .= '<td class="text-center"><input class="icr" group="time_check" type="checkbox" name="interview_date_time_reserves[]" value="'.$target_ingerview_date_time2.'" id="'.$target_ingerview_date_time2.'" disabled="disabled"><label class="lcr-disable" for="'.$target_ingerview_date_time2.'"><span class="not_reserve"><i class="glyphicon glyphicon-remove"></i></span></label></td>';
      // }else{

      $view_form .= '<td><input class="icr" type="checkbox" group="time_check" name="reserve_times[]" value="'.$target_ingerview_date_time2.'" id="'.$target_ingerview_date_time2.'"><label class="lcr" for="'.$target_ingerview_date_time2.'"><span class="reserve">予約可</span></label></td>';
      }
    }
  $view_form .= '</tr>';
?>
<thead class="scrollHead">
    <tr>{!! $view_date !!}</tr>
</thead>
<tbody class="scrollBody">
    {!! $view_form !!}
</tbody>