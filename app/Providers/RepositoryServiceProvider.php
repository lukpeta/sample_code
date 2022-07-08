<?php

namespace App\Providers;

use App\Repositories\Eloquent\BlogRepository;
use App\Repositories\Eloquent\CommentRepository;
use App\Repositories\Eloquent\CompanyPackageRepository;
use App\Repositories\Eloquent\CountryRepository;
use App\Repositories\Eloquent\DescriptionRepository;
use App\Repositories\Eloquent\Interfaces\BlogRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\CommentRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\CompanyPackageRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\CountryRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\DescriptionRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\PackageRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\PackageTypeRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\PageRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\ParcelRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\PartnerRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\PaymentRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\ProvinceRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\SettingRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\ShippedParcelRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\SlideRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\UploadFileRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\UserCodeRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\UserCompanySettingRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\UserLoginHistoryRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\UserRepositoryInterface;
use App\Repositories\Eloquent\PackageRepository;
use App\Repositories\Eloquent\PackageTypeRepository;
use App\Repositories\Eloquent\PageRepository;
use App\Repositories\Eloquent\ParcelRepository;
use App\Repositories\Eloquent\PartnerRepository;
use App\Repositories\Eloquent\PaymentRepository;
use App\Repositories\Eloquent\ProvinceRepository;
use App\Repositories\Eloquent\SettingRepository;
use App\Repositories\Eloquent\ShippedParcelRepository;
use App\Repositories\Eloquent\SlideRepository;
use App\Repositories\Eloquent\UploadFileRepository;
use App\Repositories\Eloquent\UserCodeRepository;
use App\Repositories\Eloquent\UserCompanySettingRepository;
use App\Repositories\Eloquent\UserLoginHistoryRepository;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(DescriptionRepositoryInterface::class, DescriptionRepository::class);
        $this->app->bind(PackageRepositoryInterface::class, PackageRepository::class);
        $this->app->bind(PackageTypeRepositoryInterface::class, PackageTypeRepository::class);
        $this->app->bind(ParcelRepositoryInterface::class, ParcelRepository::class);
        $this->app->bind(PartnerRepositoryInterface::class, PartnerRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
        $this->app->bind(ProvinceRepositoryInterface::class, ProvinceRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(ShippedParcelRepositoryInterface::class, ShippedParcelRepository::class);
        $this->app->bind(SlideRepositoryInterface::class, SlideRepository::class);
        $this->app->bind(UploadFileRepositoryInterface::class, UploadFileRepository::class);
        $this->app->bind(UserCodeRepositoryInterface::class, UserCodeRepository::class);
        $this->app->bind(UserCompanySettingRepositoryInterface::class, UserCompanySettingRepository::class);
        $this->app->bind(UserLoginHistoryRepositoryInterface::class, UserLoginHistoryRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
        $this->app->bind(CompanyPackageRepositoryInterface::class, CompanyPackageRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
