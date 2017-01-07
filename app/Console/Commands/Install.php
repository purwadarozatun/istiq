<?php

namespace App\Console\Commands;

use App\Enum\UserStatus;
use DB;
use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install {--database} {--silent} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fresh install application';

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
    public function handle()
    {
        $this->setDatabaseConnection($this->option('database'));

        if ($this->option('force')) {
            $this->info('Force drop tables...');
            $this->forceDropTableMySql();
        }

        $this->info('Running migration...');
        $this->call('migrate:refresh');

        $this->info('Import predefined permissions...');
        $this->call('laravolt:acl:sync-permission');

        $this->info('Create superadmin account...');
        app(config('auth.providers.users.model'))->create([
            'name'     => 'root',
            'email'    => $this->ask('Email', 'root@laravolt.app'),
            'password' => bcrypt($this->ask('Password', 'password')),
            'status'   => UserStatus::ACTIVE,
        ]);

        if (in_array(app()->environment(), ['development', 'local'])) {
            if ($this->confirm('Run seeder ?', true)) {
                $this->info('Seeding...');
                $this->call('db:seed');
            }
        }
    }

    public function ask($question, $default = null)
    {
        if ($this->option('silent')) {
            return $default;
        }

        return parent::ask($question, $default);
    }

    public function confirm($question, $default = false)
    {
        if ($this->option('silent')) {
            return $default;
        }

        return parent::confirm($question, $default);
    }


    protected function forceDropTableMySql()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $db = DB::connection()->getDatabaseName();
        $tables = DB::select(DB::raw("select * from information_schema.tables where table_schema = '$db'"));

        foreach ($tables as $table) {
            if ($table->TABLE_TYPE == 'BASE TABLE') {
                DB::statement('DROP TABLE '.$table->TABLE_NAME);
                $this->info('Drop table '.$table->TABLE_NAME);
            } else {
                DB::statement('DROP VIEW '.$table->TABLE_NAME);
                $this->info('Drop view '.$table->TABLE_NAME);
            }
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    protected function setDatabaseConnection($database)
    {
        $database = $database ? $database : env('DB_CONNECTION');
        \Config::set('database.default', $database);
        $database != env('DB_CONNECTION') ? \DB::purge(env('DB_CONNECTION')) : null;
    }
}
