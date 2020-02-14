<?php

namespace App\Models\States\ProcessRequest;

use Spatie\ModelStates\State;

abstract class ProcessRequestState extends State
{
    public static $states =[
        Pending::class,
        Enqueued::class,
        Processing::class,
        Processed::class,
        Completed::class,
        Error::class,
    ];
}

