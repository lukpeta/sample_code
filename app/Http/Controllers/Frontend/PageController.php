<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Interfaces\CompanyPackageRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\DescriptionRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\PackageRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\PageRepositoryInterface;
use Illuminate\View\View;

class PageController extends Controller
{

    public function __construct(PageRepositoryInterface        $pageRepository,
                                DescriptionRepositoryInterface $descriptionRepository,
                                PackageRepositoryInterface     $packageRepository,
                                CompanyPackageRepositoryInterface $companyPackageRepository
    )
    {
        $this->pageRepository = $pageRepository;
        $this->descriptionRepository = $descriptionRepository;
        $this->packageRepository = $packageRepository;
        $this->companyPackageRepository = $companyPackageRepository;
    }

    public function privacyPolicy(): View
    {
        $txt = $this->pageRepository->findBy('slug', 'polityka-cookies', ['*'], [], true, true);
        if (!isset($txt)) return redirect()->route('home');

        return view('frontend.txt-page', [
            'keywords' => $txt->keywords,
            'descriptions' => $txt->description,
            'title' => $txt->title,
            'txt' => $txt
        ]);
    }

    public function textPage(string $slug): View
    {
        $txt = $this->pageRepository->findBy('slug', $slug, ['*'], [], true, true);
        if (!isset($txt)) return redirect()->route('home');

        return view('frontend.txt-page', [
            'txt' => $txt
        ]);
    }


    public function integration(): View
    {
        return view('frontend.integration', [
            'description_values' => $this->descriptionRepository->all()
        ]);
    }

    public function priceList(): View
    {
        return view('frontend.price-list', [
            'description_values' => $this->descriptionRepository->all(),
            'packageCompanies' => $this->companyPackageRepository->all(),
            'packages' => $this->packageRepository->all(),
        ]);
    }

    public function howWeWork(): View
    {
        return view('frontend.how-we-working', [
            'description_values' => $this->descriptionRepository->all()
        ]);
    }
}
