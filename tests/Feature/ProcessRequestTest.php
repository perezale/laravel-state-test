<?php

namespace Tests\Feature;

use App\Models\States\ProcessRequest\Enqueued;
use App\Models\States\ProcessRequest\Pending;
use App\Models\States\ProcessRequest\Processing;
use App\ProcessRequest;
use Spatie\ModelStates\Exceptions\TransitionNotFound;
use Tests\TestCase;
use Symfony\Component\Process\Process;

class ProcessRequestTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFactory()
    {
        $processRequest = factory(\App\ProcessRequest::class)->create();
        $this->assertCount(1, ProcessRequest::all());
    }

    public function testDefaultTransitionIsPending()
    {
        $processRequest = factory(\App\ProcessRequest::class)->create();
        $this->assertInstanceOf(Pending::class, $processRequest->state);
    }

    public function testTransitionFromPendingToEnqueued()
    {
        $processRequest = factory(\App\ProcessRequest::class)->create();
        $this->assertInstanceOf(Pending::class, $processRequest->state);
        $processRequest->transitionTo(Enqueued::class);
        $this->assertInstanceOf(Enqueued::class, $processRequest->state);
    }

    public function testWontTransitionFromPendingToProcessing()
    {
        $processRequest = factory(\App\ProcessRequest::class)->create();
        $this->assertInstanceOf(Pending::class, $processRequest->state);
        $this->expectException(TransitionNotFound::class);
        $processRequest->transitionTo(Processing::class);
    }
}
