<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:livewire {component}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command untuk membuat controller, model, migration, dan view untuk CRUD';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $model_name = \Str::studly($this->argument('component'));

        \Artisan::call("livewire:make {$this->argument('component')}.create");
        $this->info("Component {$this->argument('component')} create successfully created!");

        \Artisan::call("livewire:make {$this->argument('component')}.edit");
        $this->info("Component {$this->argument('component')} edit successfully created!");

        \Artisan::call("livewire:make {$this->argument('component')}.index");
        $this->info("Component {$this->argument('component')} index successfully created!");

        \Artisan::call("livewire:make {$this->argument('component')}.show");
        $this->info("Component {$this->argument('component')} show successfully created!");

        \Artisan::call("make:model {$model_name} -msf");
        $this->info("{$model_name} migrations, controller, factory, request successfully created! 😍");

        \Artisan::call("make:datatable {$this->argument('component')}.table {$model_name}");
        $this->info("Component {$this->argument('component')} table successfully created!");

        $this->info("Happy Ngoding Bro! 😍");
    }
}
