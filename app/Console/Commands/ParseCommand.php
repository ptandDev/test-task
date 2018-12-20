<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ParseController;

class ParseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Парсер новинок с www.lostfilm.tv/new/';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ParseController $parser)
    {
        $this->info('Подождите, это займет некоторое время...');

        $result = $parser->run();

        if ($result) $this->info('Данные успешно сохранены');
        else $this->error('Произошла ошибка при сохранение данных');
    }
}
