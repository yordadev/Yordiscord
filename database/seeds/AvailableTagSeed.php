<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvailableTagSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Developers',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Featured',
            'listed' => false,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Software Developers',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Web Developers',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'e-Commerce',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Anime',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Gaming',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Roblox',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Roleplay',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Economy',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Meme',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Stream',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Social',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Fun',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Music',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'API',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Emotes',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Support Server',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Giveaway',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'DnD',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'LFG',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Ring of Elysium',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Overwatch',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Rocket League',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'OSU!',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Minecraft',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'League of Legends',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Warframe',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Diablo III',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'CSGO',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Fortnite',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'PUBG',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'DOTA 2',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Starcraft 2',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Factorio',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Rust',
            'listed' => true,
            'list_user' => 1
        ]);

        DB::table('available_tags')->insert([
            'tag_id' => 'tag_'.uniqid(),
            'tag'    => 'Apex Legends',
            'listed' => true,
            'list_user' => 1
        ]);

    }
}
