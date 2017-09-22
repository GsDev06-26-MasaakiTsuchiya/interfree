@extends('layouts.app')

@section('content')

@foreach($interview_infos as $interview_info)

<!-- <?php echo('<pre>'); ?>
<?php var_dump($interview_infos); ?>
<?php echo('</pre>'); ?> -->
{{ $interview_info['interview_id'] }}
:
{{ $interview_info['interviewee_name'] }}
<br>
@endforeach



@endsection
