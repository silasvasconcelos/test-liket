<?php

use Illuminate\Database\Seeder;
use App\KillingMode;

class KillingModes extends Seeder
{
    private $modes = [
        1 => 'MOD_UNKNOWN',
        2 => 'MOD_SHOTGUN',
        3 => 'MOD_GAUNTLET',
        4 => 'MOD_MACHINEGUN',
        5 => 'MOD_GRENADE',
        6 => 'MOD_GRENADE_SPLASH',
        7 => 'MOD_ROCKET',
        8 => 'MOD_ROCKET_SPLASH',
        9 => 'MOD_PLASMA',
        10 => 'MOD_PLASMA_SPLASH',
        11 => 'MOD_RAILGUN',
        12 => 'MOD_LIGHTNING',
        13 => 'MOD_BFG',
        14 => 'MOD_BFG_SPLASH',
        15 => 'MOD_WATER',
        16 => 'MOD_SLIME',
        17 => 'MOD_LAVA',
        18 => 'MOD_CRUSH',
        19 => 'MOD_TELEFRAG',
        20 => 'MOD_FALLING',
        21 => 'MOD_SUICIDE',
        22 => 'MOD_TARGET_LASER',
        23 => 'MOD_TRIGGER_HURT',
        24 => 'MOD_NAIL',
        25 => 'MOD_CHAINGUN',
        26 => 'MOD_PROXIMITY_MINE',
        27 => 'MOD_KAMIKAZE',
        28 => 'MOD_JUICED',
        29 => 'MOD_GRAPPLE',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            \DB::beginTransaction();
            foreach ($this->modes as $id => $mode) {
                KillingMode::updateOrCreate(compact('id'), compact('id', 'mode'));
            }
            \DB::commit();
        }
        catch (\Execption $e) {
            \DB::rollBack();
            $this->command->error($e->getMessage());
        }
    }
}
