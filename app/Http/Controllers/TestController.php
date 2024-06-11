<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Log;
use Hamcrest\Arrays\IsArray;
use Illuminate\Support\Carbon;

class TestController extends Controller
{

    //TODO udelat turoial na spusteni

    public function index()
    {
        $log = new Log();

        $projectsLogs= $log->getLatestTwoLogs();

        $delayOutputs = $this->getDelayOutput($projectsLogs);

        return view("delays",["delayOutputs"=>$delayOutputs]);
    }

    private function getDelayOutput($logs)
    {
        $project_intervals = collect();

        $logs->map(function ($log, $project) use ($project_intervals)
        {
            if(isset($log[0]->started_at) && isset($log[1]->started_at)){
                $project_intervals->push($this->delayCalculation($log, $project));
            }
        });

        $project_intervals = $project_intervals->sortByDesc('delay')->take(10);

        return $project_intervals;

    }

    private function delayCalculation($log, $project)
    {
        $latest_started_at = new Carbon($log[0]->started_at);
        $previous_started_at = new Carbon($log[1]->started_at);

        $delay = $previous_started_at->diffInMinutes($latest_started_at);

        return[
            'project_id' => $project,
            'previous_started_at' => $log[1]->started_at,
            'latest_started_at' => $log[0]->started_at,
            'delay' => $delay,
        ];
    }
}
