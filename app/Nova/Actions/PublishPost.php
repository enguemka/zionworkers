<?php

namespace App\Nova\Actions;

use App\Mail\SeriesUpdated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class PublishPost extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            $model->update([
                'published_at' => Carbon::now()
            ]);

            $series = $model->serie;
            $subscriptions = $series->subscriptions;
            $recipients = [];

            foreach ($subscriptions as $subscription) {
                $user = $subscription->user;
                if(isset($user->email_verified_at)) {
                    $recipients[] = $user->email;
                }
            }

            foreach ($recipients as $email) {
                Mail::to($email)->queue(new SeriesUpdated($model));
            }
        }

        return Action::message('Post published!');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
