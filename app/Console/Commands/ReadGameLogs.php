<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Parsers\LogReader;
use App\Player;
use App\Game;
use App\KillingMode;
use App\PlayerKillsGamer;

class ReadGameLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'read-game-log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read logs of game into folder game_logs in public dir';

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

        $path = public_path(implode(DIRECTORY_SEPARATOR, ['game_logs', '']));
        
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $logs = array_filter(scandir($path), function ($f) { return !in_array($f, ['.', '..']); });
        $reader = new LogReader;

        foreach ($logs as $log) {
            
            $reader->setFilePath($path . $log);
            $game = Game::getOrCreateByHash($reader->getHashFile());

            if ($game->wasRecentlyCreated) {
                foreach ($reader->extract() as $event) {
                    extract($event);
                    $killer = Player::getOrCreateByName($killer);
                    $killed = Player::getOrCreateByName($killed);
                    $killingMode = KillingMode::getOrCreateByName($mod);
                    PlayerKillsGamer::firstOrCreate([
                        'game_id' => $game->getKey(),
                        'killer_player_id' => $killer->getKey(),
                        'killed_player_id' => $killed->getKey(),
                        'mode_id' => $killingMode->getKey(),
                        'time' => $time_of_game,
                    ]);
                } // loop log
            }

        } // loop logs

    }
}
