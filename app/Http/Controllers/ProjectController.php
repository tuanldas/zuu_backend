<?php

namespace App\Http\Controllers;

use App\UseCase\Projects\ProjectUseCaseInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

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
