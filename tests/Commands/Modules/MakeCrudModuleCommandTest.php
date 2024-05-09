<?php

namespace Milwad\LaravelCrod\Tests\Commands\Modules;

use Illuminate\Support\Facades\File;
use Milwad\LaravelCrod\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class MakeCrudModuleCommandTest extends TestCase
{
    /**
     * Test crud files created successfully.
     */
    #[Test]
    public function crud_files_created_successfully(): void
    {
        $this->artisan('crud:make-module', ['module_name' => 'Product'])
            ->expectsQuestion('Do you want something extra?', 0)
            ->assertSuccessful()
            ->expectsOutput('Crud files successfully generated...');

        $this->ensureCrudFileCreated();
    }

    /**
     * Test crud files created successfully with seeder.
     */
    #[Test]
    public function crud_files_created_successfully_with_seeder(): void
    {
        $this->artisan('crud:make-module', ['module_name' => 'Product'])
            ->expectsQuestion('Do you want something extra?', 1)
            ->expectsQuestion('Do you want something extra?', 0)
            ->assertSuccessful()
            ->expectsOutput('Crud files successfully generated...');

        $this->ensureCrudFileCreated();

        // Ensure seeder exists
        $this->assertFileExists(base_path('Modules/Product/Database/Seeders/ProductSeeder.php'));
    }

    /**
     * Test crud files created successfully with factory.
     */
    #[Test]
    public function crud_files_created_successfully_with_factory(): void
    {
        $this->artisan('crud:make-module', ['module_name' => 'Product'])
            ->expectsQuestion('Do you want something extra?', 2)
            ->expectsQuestion('Do you want something extra?', 0)
            ->assertSuccessful()
            ->expectsOutput('Crud files successfully generated...');

        $this->ensureCrudFileCreated();

        // Ensure factory exists
        $this->assertFileExists(base_path('Modules/Product/Database/Factories/ProductFactory.php'));
    }

    /**
     * Test crud files created successfully with repository.
     */
    #[Test]
    public function crud_files_created_successfully_with_repository(): void
    {
        $this->artisan('crud:make-module', ['module_name' => 'Product'])
            ->expectsQuestion('Do you want something extra?', 3)
            ->expectsQuestion('Do you want something extra?', 0)
            ->assertSuccessful()
            ->expectsOutput('Crud files successfully generated...');

        $this->ensureCrudFileCreated();

        // Ensure repository exists
        $this->assertFileExists(base_path('Modules/Product/Repositories/ProductRepo.php'));
    }

    /**
     * Test crud files created successfully with service.
     */
    #[Test]
    public function crud_files_created_successfully_with_service(): void
    {
        $this->artisan('crud:make-module', ['module_name' => 'Product'])
            ->expectsQuestion('Do you want something extra?', 4)
            ->expectsQuestion('Do you want something extra?', 0)
            ->assertSuccessful()
            ->expectsOutput('Crud files successfully generated...');

        $this->ensureCrudFileCreated();

        // Ensure service exists
        $this->assertFileExists(base_path('Modules/Product/Services/ProductService.php'));
    }

    /**
     * Test crud files created successfully with tests.
     */
    #[Test]
    public function crud_files_created_successfully_with_tests(): void
    {
        $this->artisan('crud:make-module', ['module_name' => 'Product'])
            ->expectsQuestion('Do you want something extra?', 5)
            ->expectsQuestion('Do you want something extra?', 0)
            ->assertSuccessful()
            ->expectsOutput('Crud files successfully generated...');

        $this->ensureCrudFileCreated();

        // Ensure tests exists
        $this->assertFileExists(base_path('Modules/Product/Tests/Feature/ProductTest.php'));
        $this->assertFileExists(base_path('Modules/Product/Tests/Unit/ProductTest.php'));
    }

    /**
     * Test crud files created successfully with customize_from_config_file.
     */
    #[Test]
    public function crud_files_created_successfully_with_customize_from_config_file(): void
    {
        config()->set([
            'laravel-crod.modules.module_namespace' => 'modules',
            'laravel-crod.modules.model_path' => 'Models',
            'laravel-crod.modules.migration_path' => 'Database\Migrations\Test',
            'laravel-crod.modules.controller_path' => 'Http\Controllers\Test',
            'laravel-crod.modules.request_path' => 'Http\Requests\Test',
            'laravel-crod.modules.view_path' => 'Resources\Views\Test',
            'laravel-crod.modules.service_path' => 'Services\Test',
            'laravel-crod.modules.repository_path' => 'Repositories\Test',
            'laravel-crod.modules.feature_test_path' => 'Tests\Feature\Test',
            'laravel-crod.modules.unit_test_path' => 'Tests\Unit\Test',
            'laravel-crod.modules.provider_path' => 'Providers\Test',
            'laravel-crod.modules.factory_path' => 'Database\Factories\Test',
            'laravel-crod.modules.seeder_path' => 'Database\Seeders\Test',
            'laravel-crod.modules.route_path' => 'Routes\Test',
            'laravel-crod.repository_namespace' => 'Repository'
        ]);

        $this->artisan('crud:make-module', ['module_name' => 'Product'])
            ->expectsQuestion('Do you want something extra?', 1)
            ->expectsQuestion('Do you want something extra?', 2)
            ->expectsQuestion('Do you want something extra?', 3)
            ->expectsQuestion('Do you want something extra?', 4)
            ->expectsQuestion('Do you want something extra?', 5)
            ->expectsQuestion('Do you want something extra?', 0)
            ->assertSuccessful()
            ->expectsOutput('Crud files successfully generated...');

        // Ensure model exists
        $this->assertFileExists(base_path("modules/Product/Models/Product.php"));

        // ensure migration exists
        $this->migrationExists('create_products_table', 'Modules/Product/Database/Migrations/Test');

        // Ensure controller exists
        $this->assertFileExists(base_path('modules/Product/Http/Controllers/Test/ProductController.php'));

        // Ensure requests exists
        $this->assertFileExists(base_path('modules/Product/Http/Requests/Test/ProductStoreRequest.php'));
        $this->assertFileExists(base_path('modules/Product/Http/Requests/Test/ProductUpdateRequest.php'));

        // Ensure views exists
        $this->assertFileExists(base_path('modules/Product/Resources/Views/Test/index.blade.php'));
        $this->assertFileExists(base_path('modules/Product/Resources/Views/Test/create.blade.php'));
        $this->assertFileExists(base_path('modules/Product/Resources/Views/Test/edit.blade.php'));

        // Ensure tests exists
        $this->assertFileExists(base_path('modules/Product/Tests/Feature/Test/ProductTest.php'));
        $this->assertFileExists(base_path('modules/Product/Tests/Unit/Test/ProductTest.php'));

        // Ensure service exists
        $this->assertFileExists(base_path('modules/Product/Services/Test/ProductService.php'));

        // Ensure repository exists
        $this->assertFileExists(base_path('modules/Product/Repositories/Test/ProductRepository.php'));

        // Ensure factory exists
        $this->assertFileExists(base_path('modules/Product/Database/Factories/Test/ProductFactory.php'));

        // Ensure seeder exists
        $this->assertFileExists(base_path('modules/Product/Database/Seeders/Test/ProductSeeder.php'));
    }

    /**
     * Ensure the crud files successfully created.
     */
    protected function ensureCrudFileCreated(): void
    {
        // Ensure model exists
        $this->assertFileExists(base_path('Modules/Product/Entities/Product.php'));

        // Ensure migration exists
        $this->migrationExists('create_products_table');

        // Ensure controller exists
        $this->assertFileExists(base_path('Modules/Product/Http/Controllers/ProductController.php'));

        // Ensure requests exists
        $this->assertFileExists(base_path('Modules/Product/Http/Requests/ProductStoreRequest.php'));
        $this->assertFileExists(base_path('Modules/Product/Http/Requests/ProductUpdateRequest.php'));

        // Ensure views exists
        $this->assertFileExists(base_path('Modules/Product/Resources/Views/index.blade.php'));
        $this->assertFileExists(base_path('Modules/Product/Resources/Views/create.blade.php'));
        $this->assertFileExists(base_path('Modules/Product/Resources/Views/edit.blade.php'));
    }

    /**
     * Check migration file exists.
     */
    protected function migrationExists(string $mgr, string $path = 'Modules/Product/Database/Migrations/'): bool
    {
        $path = base_path($path);
        $files = scandir($path);

        foreach ($files as &$value) {
            $pos = strpos($value, $mgr);
            if ($pos !== false) {
                return true;
            }
        }

        return false;
    }
}