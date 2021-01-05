<?php

namespace App\Http\Controllers\Api;

use App\Models\Fortress;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;

class FortressController extends Controller
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
        $users = $this->userRepository->showLastSevenDays(Fortress::class);
        $count = $this->userRepository->showLastSevenDaysCount(Fortress::class);

        if ($count === 7)
        {
            return response()->json(["fortress" => $users]);
        }

        return response()->json(["fortress" => 'Няма данни за последните 7 дни.']);
    }
}
