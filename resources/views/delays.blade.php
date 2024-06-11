<h1>Přehled eshopů s největšími prodlevami</h1>
@php
    $counter = 1
@endphp

@foreach($delayOutputs as $output)

    <h4>{{$counter}}.</h4>
    <div style='margin-left: 20px'>

        <p>id projektu: <b>{{$output['project_id']}}</b></p>

        <p>datum predposledniho zaznamu: <b>{{$output['previous_started_at']}}</b></p>

        <p>datum nejnovejsiho zaznamu: <b>{{$output['latest_started_at']}}</b></p>

        <p>časová prodleva: <b>{{$output['delay']}}</b></p>
    </div>
    @php $counter++; @endphp
@endforeach
