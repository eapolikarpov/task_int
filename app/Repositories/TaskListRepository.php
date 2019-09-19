<?php


namespace App\Repositories;

use App\User;
use App\TaskList;

class TaskListRepository
{
    public function forUser(User $user)
    {
        return TaskList::where('user_id',$user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
