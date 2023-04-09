<?php

namespace Modules\Projects\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Modules\Projects\UseCases\ProjectUseCaseInterface;

class ProjectController extends Controller
{

    private ProjectUseCaseInterface $projectUseCase;

    public function __construct(ProjectUseCaseInterface $projectUseCase)
    {
        $this->projectUseCase = $projectUseCase;
    }

    public function getProjects(): JsonResponse
    {
        $projects = $this->projectUseCase->getProjectsByUserUUid(Auth::user()->uuid);
        return response()->json($projects);
    }
}
