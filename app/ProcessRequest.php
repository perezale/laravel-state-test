<?php

namespace App;

use App\Models\States\ProcessRequest\Completed;
use App\Models\States\ProcessRequest\Enqueued;
use App\Models\States\ProcessRequest\Error;
use App\Models\States\ProcessRequest\Pending;
use App\Models\States\ProcessRequest\Processed;
use App\Models\States\ProcessRequest\Processing;
use App\Models\States\ProcessRequest\ProcessRequestState;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;

class ProcessRequest extends Model
{
    use HasStates;

    protected function registerStates(): void
    {
        $this
            ->addState('state', ProcessRequestState::class)
            ->allowTransition(Pending::class, Enqueued::class)
            ->allowTransition(Enqueued::class, Processing::class)
            ->allowTransition(Processing::class, Processed::class)
            ->allowTransition(Processed::class, Completed::class)
            ->allowTransition([Pending::class, Enqueued::class, Processing::class, Processed::class], Error::class)
            ->default(Pending::class);
    }
}
