<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ProductRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(NotFoundHttpException::class, function () {
        //     return response()->json(['error' => 'Resource not found'], 404);
        // });

        // $this->app->bind(ModelNotFoundException::class, function () {
        //     return response()->json(['error' => 'Model not found'], 404);
        // });

        // $this->app->bind(ValidationException::class, function ($exception) {
        //     return response()->json([
        //         'error' => 'Validation failed',
        //         'messages' => $exception->errors(),
        //     ], 422);
        // });

        // $this->app->bind(HttpResponseException::class, function ($exception) {
        //     return response()->json([
        //         'error' => 'HTTP error occurred',
        //         'message' => $exception->getMessage(),
        //     ], $exception->getStatusCode());
        // });
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
