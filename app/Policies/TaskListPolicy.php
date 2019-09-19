<?php

namespace App\Policies;

use App\User;
use App\TaskList;
use App\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskListPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function destroy(User $user, TaskList $taskList)
    {
        return $user->id === $taskList->user_id;
    }

}
