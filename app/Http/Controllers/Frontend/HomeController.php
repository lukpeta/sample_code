<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Interfaces\BlogRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\CommentRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\DescriptionRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\PartnerRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\SlideRepositoryInterface;
use App\Repositories\Eloquent\SettingRepository;
use App\Services\InpostService;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(SettingRepository              $settingRepository,
                                SlideRepositoryInterface       $slideRepository,
                                CommentRepositoryInterface     $commentRepository,
                                PartnerRepositoryInterface     $partnerRepository,
                                BlogRepositoryInterface        $blogRepository,
                                DescriptionRepositoryInterface $descriptionRepository,
                                InpostService                  $inpostService
    )
    {
        $this->settingRepository = $settingRepository;
        $this->slideRepository = $slideRepository;
        $this->commentRepository = $commentRepository;
        $this->partnerRepository = $partnerRepository;
        $this->blogRepository = $blogRepository;
        $this->descriptionRepository = $descriptionRepository;
        $this->inpostService = $inpostService;
    }

    public function index(): View
    {
        $settings = $this->settingRepository->findBy('key', 'global');

        return view('frontend.home', [
            'popup' => $settings?->value['popup'],
            'popupContent' => $settings?->value['popup_content'],
            'comments' => $this->commentRepository->all(['*'], 'id', 'desc', [], true, true),
            'partners' => $this->partnerRepository->all(['*'], 'id', 'desc', [], false, true),
            'blogs' => $this->blogRepository->all(['*'], 'id', 'desc', [], true, true),
            'splashes' => $this->slideRepository->all(['*'], 'position', 'asc', [], true, true),
            'description_values' => $this->descriptionRepository->all(['*'], 'id', 'desc', [], false, false)
        ]);
    }

    public function tracking(Request $request): View
    {
        return view('frontend.tracking', [
            'tracking' => isset($request->tracking) ? $this->inpostService->getTracking($request->tracking) : null
        ]);
    }

    
}
