<?php

namespace App\Services;

use App\Http\Requests\GetProjectTaskRequest;
use \App\Models\Project;
use \App\Models\ProjectTask;



class ProjectService
{
    /**
     * @param array $data
     * @return mixed
     */
    public function projectCreate(array $data)
    {
        return Project::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool|int
     */

    public function projectUpdate(Project $project,array $data)
    {
        return $project->update($data);
    }

    /**
     * @param int $id
     * @return bool|mixed|null
     */
    public function projectDelete(Project $project)
    {
        return $project->delete();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function projectGet()
    {
        return Project::query()->get();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function projectTaskCreate(array $data)
    {
        if (!isset($data["priority"])){
            $min_priority=ProjectTask::query()->orderBy("priority","ASC")->first()?->priority;
            $data["priority"]=!is_null($min_priority)? $min_priority-1  : 0;
        }
        return ProjectTask::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool|int
     */

    public function projectTaskUpdate(ProjectTask $task,array $data)
    {
        return $task->update($data);
    }

    /**
     * @param int $id
     * @return bool|mixed|null
     */
    public function projectTaskDelete(ProjectTask $task)
    {
        return $task->delete();
    }

    /**
     * @param GetProjectTaskRequest $request
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function projectTaskGet(GetProjectTaskRequest $request)
    {
        $tasks=ProjectTask::query()->with("project");
        if ($request->project_id){
            $tasks->where("project_id",$request->project_id);
        }
        return $tasks
            ->orderBy("priority","DESC")
            ->get();
    }

    public function changeOrders(array $data)
    {
        // get rows and change priority by order
        //for example array []
        $priority=count($data);
        foreach ($data as $datum){
            $task=ProjectTask::query()->find($datum);
            $task->priority=$priority;
            $task->save();
            $priority--;
        }

        return true;
    }

}
