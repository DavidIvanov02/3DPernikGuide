<?php

namespace App\Http\Controllers\Api;

use App\Models\Museum;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;

class MuseumController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return JsonResponse
     */
    public function index()
    {
        $users = $this->userRepository->showLastSevenDays(Museum::class);
        $count = $this->userRepository->showLastSevenDaysCount(Museum::class);

        if ($count === 7)
        {
            return response()->json(["museum" => $users]);
        }

        return response()->json(["museum" => 'Няма данни за последните 7 дни.']);
    }
}
