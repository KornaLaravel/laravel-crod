<?php

namespace Milwad\LaravelCrod\Tests;

use Milwad\LaravelCrod\Tests\Traits\MakeCrudTestTrait;

class MakeCrudTest extends BaseTest
{
    use MakeCrudTestTrait;

    private string $name = 'Product';
    private string $question = 'Do you want something extra?';
    private string $command = 'crud:make';

    /**
     * Test check all files create when user run command 'crud:make'.
     *
     * @return void
     */
    public function test_check_to_create_files_with_command_crud_make()
    {
        $this->artisan($this->command, ['name' => $this->name])
            ->expectsQuestion($this->question, 5);

        $this->checkAllToModelIsCreatedWithOriginalName();
        $this->checkAllToMigrationIsCreatedWithOriginalName();
        $this->checkAllToControllerIsCreatedWithOriginalName();
        $this->checkAllToRequestIsCreatedWithOriginalName($this->name);
//        $this->checkAllToViewIsCreatedWithOriginalName($this->name);
    }

    /**
     * Test check all files create when user run command 'crud:make' with option seeder.
     *
     * @return void
     */
    public function test_check_to_create_files_with_command_crud_make_with_option_seeder()
    {
        $this->artisan($this->command, ['name' => $this->name])
            ->expectsQuestion($this->question, 0)
            ->assertFailed();

        $this->checkAllToModelIsCreatedWithOriginalName();
        $this->checkAllToMigrationIsCreatedWithOriginalName();
        $this->checkAllToControllerIsCreatedWithOriginalName();
        $this->checkAllToRequestIsCreatedWithOriginalName($this->name);
//        $this->checkAllToViewIsCreatedWithOriginalName($this->name);
//        $this->checkAllToServiceIsCreatedWithOriginalName();
//        $this->checkAllToRepositoryIsCreatedWithOriginalName();
//        $this->checkAllToTestsIsCreatedWithOriginalName();
//        $this->checkAllToSeederIsCreatedWithOriginalName();
    }

    /**
     * Test check all files create when user run command 'crud:make' with option service.
     *
     * @return void
     */
    public function test_check_to_create_files_with_command_crud_make_with_option_service()
    {
        $this->artisan($this->command, ['name' => $this->name])
            ->expectsQuestion($this->question, 3)
            ->assertFailed();

        $this->checkAllToModelIsCreatedWithOriginalName();
        $this->checkAllToMigrationIsCreatedWithOriginalName();
        $this->checkAllToControllerIsCreatedWithOriginalName();
        $this->checkAllToRequestIsCreatedWithOriginalName($this->name);
//        $this->checkAllToViewIsCreatedWithOriginalName($this->name);
//        $this->checkAllToServiceIsCreatedWithOriginalName();
    }

    /**
     * Test check all files create when user run command 'crud:make' with option repository.
     *
     * @return void
     */
    public function test_check_to_create_files_with_command_crud_make_with_option_repository()
    {
        $this->artisan($this->command, ['name' => $this->name])
            ->expectsQuestion($this->question, 3)
            ->assertFailed();

        $this->checkAllToModelIsCreatedWithOriginalName();
        $this->checkAllToMigrationIsCreatedWithOriginalName();
        $this->checkAllToControllerIsCreatedWithOriginalName();
        $this->checkAllToRequestIsCreatedWithOriginalName($this->name);
//        $this->checkAllToViewIsCreatedWithOriginalName($this->name);
//        $this->checkAllToRepositoryIsCreatedWithOriginalName();
    }

    /**
     * Test check all files create when user run command 'crud:make' with option factory.
     *
     * @return void
     */
    public function test_check_to_create_files_with_command_crud_make_with_option_factory()
    {
        $this->artisan($this->command, ['name' => $this->name])
            ->expectsQuestion($this->question, 1)
            ->assertFailed();

        $this->checkAllToModelIsCreatedWithOriginalName();
        $this->checkAllToMigrationIsCreatedWithOriginalName();
        $this->checkAllToControllerIsCreatedWithOriginalName();
        $this->checkAllToRequestIsCreatedWithOriginalName($this->name);
//        $this->checkAllToViewIsCreatedWithOriginalName($this->name);
    }

    /**
     * Test check all files create when user run command 'crud:make' with ies name.
     *
     * @return void
     */
    public function test_check_to_create_files_with_command_crud_make_with_ies_name()
    {
        $this->name = 'Category';
        $this->artisan($this->command, ['name' => $this->name])
            ->expectsQuestion($this->question, 5);

        $this->checkAllToModelIsCreatedWithOriginalName();
//        $this->checkAllToMigrationIsCreatedWithOriginalName(); TODO: Fixed
        $this->checkAllToControllerIsCreatedWithOriginalName();
        $this->checkAllToRequestIsCreatedWithOriginalName($this->name);
//        $this->checkAllToViewIsCreatedWithOriginalName('Category');
    }

    /**
     * Test check all files create when user run command 'crud:make' with ies name with options.
     *
     * @return void
     */
    public function test_check_to_create_files_with_command_crud_make_with_ies_name_with_options()
    {
        $this->name = 'Category';
        $this->artisan($this->command, ['name' => $this->name])
//            ->expectsQuestion($this->question, 0)
//            ->expectsQuestion($this->question, 1)
//            ->expectsQuestion($this->question, 2)
//            ->expectsQuestion($this->question, 3)
//            ->expectsQuestion($this->question, 4)
            ->expectsQuestion($this->question, 5)
            ->assertFailed();

        $this->checkAllToModelIsCreatedWithOriginalName();
        $this->checkAllToControllerIsCreatedWithOriginalName();
        $this->checkAllToRequestIsCreatedWithOriginalName($this->name);
//        $this->checkAllToViewIsCreatedWithOriginalName('Category');
        $this->checkAllToMigrationIsCreatedWithOriginalName();

//        // Options Checks
//        $this->checkAllToSeederIsCreatedWithOriginalName();
//        $this->checkAllToFactoryIsCreatedWithOriginalName();
//        $this->checkAllToRepositoryIsCreatedWithOriginalName();
//        $this->checkAllToServiceIsCreatedWithOriginalName();
//        $this->checkAllToTestsIsCreatedWithOriginalName();
    }
}
