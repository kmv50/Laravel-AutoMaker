<?php
namespace AutoMake\Laravel;

use Illuminate\Console\Command;
use AutoMake\Laravel\TemplateMaker;

class TemplateCommand extends Command
{

    protected $signature = 'autoMake:template';


    protected $description = 'Genera un template apartir de AdminLTE';

    public function handle()
    {
        $templateManager = new TemplateMaker();
        $templateManager->MakeTemplateJS();
        $this->info('JS scaffolding generated successfully.');
    }
}
