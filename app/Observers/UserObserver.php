<?php

namespace App\Observers;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Log;

class UserObserver
{
    public function creating(User $user){
        Log::info("Creating Observer method is firing ".$user); //storage\logs\laravel.log a ai log msg ta dekha jai
    }

    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //We need to add a Mr text before user's name when registered
//        $user->name = "Mr. " . $user->name;
//        $user->save();

        $title = 'New User ' . $user->name . ' Created successfully';
        $description = 'New User ' . $user->name . ' Created. Created - ' . $user->created_at->diffForHumans();

        Post::create([
            'title'       => $title,
            'description' => $description,
            'user_id'     => $user->id,
            'category_id' => 1
        ]);

        Log::info("Created Observer method is firing ".$user); //storage\logs\laravel.log a ai log msg ta dekha jai
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
//        $title = 'User ' . $user->name . ' Updated successfully';
//        $description = 'User ' . $user->name . ' Updated. Updated time - ' . $user->updated_at->diffForHumans();
//
//        Post::create([
//            'title'       => $title,
//            'description' => $description,
//            'user_id'     => $user->id,
//            'category_id' => 1,
//        ]);
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
