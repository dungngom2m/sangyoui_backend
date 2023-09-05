<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GenerateModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate models from tables in database';

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
     * @return int
     */
    public function handle()
    {
        $tables = DB::select('SHOW TABLES');
        $this->info('Created:');

        foreach ($tables as $stt => $item) {
            $table_name = head($item);
            $exclude_table = [
                "staffs",
                "migrations",
                "websockets_statistics_entries",
                "failed_jobs",
                "personal_access_tokens"
            ];

            if (!in_array($table_name, $exclude_table)) {
                // turn table_name into ModelNamesF
                $model = Str::singular($table_name);
                $model = ucwords($model, '_');
                $model = str_replace('_', '', $model);

                Artisan::call('krlove:generate:model ' . $model
                    . ' --namespace=App\\\Models --output-path=./Models --table-name=' . $table_name
                    . ' --base-class-name=App\\\Models\\\BaseModel --no-interaction');
                $this->info("\t" . ($stt) . ": " . $model);
            }
        }
    }
}
