@extends('layouts.app')

@section('title')
Phizza Hut | {{auth()->user()->name}}'s Transaction History
@endsection()

@section('content')
<div class="container">
    @foreach ($data as $transac)
        <a href="{{ route('view_transac_detail', $transac->created_at) }}">
            <div id="transac_bar" class="card-header rounded">
                <label class="transac-history">Transaction at {{ $transac->created_at }}</label><br>
            </div>
        </a>
    @endforeach
</div>
<input id="jmlh_transac" value="{{ $data->count() }}" class="d-none">
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        var countTransac =  $("#jmlh_transac").val();
        for ( var x = 0 ; x < countTransac; x++) {
            if((x % 2) == 0) {
                document.getElementById(transac_bar).classList.add("bg-color-red");
            }
            else {
                document.getElementById(transac_bar).classList.add("bg-color-red");
            }
        }
    });
</script>
@endsection