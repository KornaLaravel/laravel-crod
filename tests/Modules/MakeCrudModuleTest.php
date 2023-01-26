<?php

namespace Milwad\LaravelCrod\Tests\Modules;

use Milwad\LaravelCrod\Tests\BaseTest;

class MakeCrudModuleTest extends BaseTest
{
    /**
     * @var string
     */
    private string $name = 'Product';

    /**
     * @var string
     */
    private string $command = "crud:make-module";

    /**
     * @var string|null
     */
    private ?string $module;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->module = config('laravel-crod.modules.module_namespace') ?? 'Modules';
    }

    /**
     * Test check all files create when user run command 'crud:make'.
     *
     * @test
     * @return void
     */
    public function check_to_create_files_with_command_crud_make()
    {
        $this->artisan($this->command, [
            'module_name' => $this->name,
        ]);

        $this->checkAllToModelIsCreatedWithOriginalName();
//        $this->checkAllToMigrationIsCreatedWithOriginalName();
//        $this->checkAllToControllerIsCreatedWithOriginalName();
//        $this->checkAllToRequestIsCreatedWithOriginalName();
//        $this->checkAllToViewIsCreatedWithOriginalName();
    }

    /**
     * @return void
     */
    private function checkAllToModelIsCreatedWithOriginalName(): void
    {
        $modelFolderName = config('laravel-crod.modules.model_path') ?? 'Entities';
        $filename = base_path("$this->module\\$this->name\\$modelFolderName\\$this->name.php");

        $this->assertEquals(1, file_exists($filename));
        $this->assertEquals($this->name, basename($filename, '.php'));
    }
}