<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function getLatestTwoLogs()
    {
        $logs = Log::whereNotNull('finished_at')
            ->orderBy('project_id')
            ->orderBy('started_at', 'desc')
            ->get()
            ->groupBy('project_id')
            ->map(function ($log) {
                return $log->take(2);
            });

        return $logs;
    }
}
