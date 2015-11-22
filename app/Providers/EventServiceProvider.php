<?php

namespace Prego\Providers;

use Prego\Collaboration;
use Auth;
use Mail;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Prego\Events\SomeEvent' => [
            'Prego\Listeners\EventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        Collaboration::saved( function($collaboration)
        {
            $data = [
                'username' => Auth::user()->username,
                'project_name' => session('project_name')
            ];
            $subject = 'Call For Collaboration';
            $user    = session('user_email');


            Mail::send('emails.collaborate', $data, function($message) use ($user, $subject){
                $message->from('no-reply@prego.com', 'Prego');
                $message->to($user)
                        ->subject($subject);
            });
        });
    }
}
