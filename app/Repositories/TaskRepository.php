<?php


namespace App\Repositories;

use App\TaskList;
use App\User;
use App\Task;

class TaskRepository
{
    public function forUser(User $user)
    {
        return Task::where('user_id',$user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
    public function forTaskList(TaskList $taskList)
    {
        return  Task::where('task_list_id', $taskList->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
