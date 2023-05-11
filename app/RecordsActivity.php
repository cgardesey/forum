<?php
/**
 * Created by PhpStorm.
 * User: Cyril
 * Date: 6/6/2019
 * Time: 5:01 PM
 */

namespace App;


trait RecordsActivity
{

    /**
     * @param $event
     * @return string
     * @throws \ReflectionException
     */
    protected static function bootRecordsActivity()
    {
        self::created(function ($thread) {
            $thread->recordActivity('created');
        });
    }

    protected function getActivityType($event): string
    {
        $type = strtolower((new \ReflectionClass($this))->getShortName());
        return "{$event}_{$type}";
    }

    protected function recordActivity($event)
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $this->getActivityType($event),
        ]);
    }

    public function activity()
    {
        return $this->morphMany('App\Activity', 'subject');
    }
}