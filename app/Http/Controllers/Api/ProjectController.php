<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\ChangeOrdersRequest;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\CreateProjectTaskRequest;
use App\Http\Requests\GetProjectTaskRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\UpdateProjectTaskRequest;
use App\Services\ProjectService;
use App\Models\Project;
use App\Models\ProjectTask;

class ProjectController extends \App\Http\Controllers\Controller
{
    /**
     * @param CreateProjectRequest $request
     * @param ProjectService $service
     * @return mixed
     */
    public function createProject(CreateProjectRequest $request,ProjectService $service)
    {
        return $service->projectCreate($request->all());
    }

    /**
     * @param Project $project
     * @param UpdateProjectRequest $request
     * @param ProjectService $service
     * @return bool|int
     */
    public function updateProject(Project $project ,UpdateProjectRequest $request,ProjectService $service)
    {
        return $service->projectUpdate($project,$request->all());
    }

    /**
     * @param Project $project
     * @param ProjectService $service
     * @return bool|mixed|null
     */
    public function deleteProject(Project $project ,ProjectService $service)
    {
        return $service->projectDelete($project);
    }

    /**
     * @param ProjectService $service
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getProject(ProjectService $service)
    {
        return $service->projectGet();
    }

    /**
     * @param CreateProjectTaskRequest $request
     * @param ProjectService $service
     * @return mixed
     */
    public function createProjectTask(CreateProjectTaskRequest $request,ProjectService $service)
    {
        return $service->projectTaskCreate($request->all());
    }

    /**
     * @param ProjectTask $task
     * @param UpdateProjectTaskRequest $request
     * @param ProjectService $service
     * @return bool|int
     */
    public function updateProjectTask(ProjectTask $task,UpdateProjectTaskRequest $request,ProjectService $service)
    {
        return $service->projectTaskUpdate($task,$request->all());
    }

    public function deleteProjectTask(ProjectTask $task,ProjectService $service)
    {
        return $service->projectTaskDelete($task);
    }

    public function getProjectTask(GetProjectTaskRequest $request,ProjectService $service)
    {
        return $service->projectTaskGet($request);
    }

    public function changeOrdersProjectTask(ChangeOrdersRequest $request,ProjectService $service)
    {
        return $service->changeOrders($request->data);
    }
}
