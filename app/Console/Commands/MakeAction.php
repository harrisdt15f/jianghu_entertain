<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

/**
 * Class MakeAction
 * @package App\Console\Commands
 */
class MakeAction extends GeneratorCommand
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:action {name} {--r}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '生成Action --r 生成对应的Request文件';

    /**
     * @var string $type
     */
    protected $type = 'Action';
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path('template/stubs').'/Action.stub';
    }

    /**
     * @param mixed $rootNamespace RootNamespace.
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace):string
    {
        return $rootNamespace.'\Http\SingleActions';
    }

    /**
     * @param mixed $stub Stub.
     * @param mixed $name Name.
     * @return string
     */
    protected function replaceClass($stub, $name):string
    {

        $stub = $this->replaceCustomizeSetting($stub);

        return parent::replaceClass($stub, $name);
    }

    /**
     * @param mixed $stub Stub.
     * @param mixed $name Name.
     * @return GeneratorCommand
     */
    protected function replaceNamespace(&$stub, $name):object
    {
        return parent::replaceNamespace($stub, $name);
    }

    /**
     * @param string $stub Stub.
     * @return string
     */
    protected function replaceCustomizeSetting(string $stub) :string
    {
        return $stub;
    }

    /**
     * @return boolean|void|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException Exception.
     */
    public function handle()
    {
        if (substr($this->argument('name'), -6) !== 'Action') {
            $this->error('Action 命名不符合规范!');
            return false;
        }
        if ($this->option('r')) {
            $this->createRequest();
        }
        return parent::handle();
    }

    /**
     * 创建request
     * @return void
     */
    private function createRequest()
    {
        $this->call('make:request', [
            'name' => substr($this->argument('name'), 0, -6).'Request',
        ]);
    }
}
