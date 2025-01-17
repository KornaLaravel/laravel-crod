<?php

namespace Milwad\LaravelCrod\Traits;

use Milwad\LaravelCrod\Datas\OptionData;

trait CommonTrait
{
    /**
     * Show extra option in CLI.
     *
     * @return array|string
     */
    private function extraOption(): string|array
    {
        return $this->choice('Do you want something extra?', OptionData::$options, 0);
    }

    /**
     * Extra option operation.
     *
     * @param string $name_uc
     *
     * @return void
     */
    public function extraOptionOperation(string $name_uc)
    {
        $selectOption = $this->extraOption();

        if (OptionData::$options[$selectOption] === OptionData::SEEDER_OPTION) {
            $this->makeSeeder($name_uc);
            $this->extraOptionOperation($name_uc);
        }
        if (OptionData::$options[$selectOption] === OptionData::FACTORY_OPTION) {
            $this->makeFactory($name_uc);
            $this->extraOptionOperation($name_uc);
        }
        if (OptionData::$options[$selectOption] === OptionData::REPOSITORY_OPTION) {
            $this->makeRepository($name_uc);
            $this->extraOptionOperation($name_uc);
        }
        if (OptionData::$options[$selectOption] === OptionData::SERVICE_OPTION) {
            $this->makeService($name_uc);
            $this->extraOptionOperation($name_uc);
        }
        if (OptionData::$options[$selectOption] === OptionData::TEST_OPTION) {
            $this->makeTest($name_uc);
            $this->extraOptionOperation($name_uc);
        }
    }
}
