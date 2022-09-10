<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Category : Shooter
        $game = new Game();
        $game->category_id = 1;
        $game->title = "Counter-Strike: Global Offensive";
        $game->price = 35000;
        $game->thumbnail = "csgo.jpg";
        $game->slides = "csgo_1.jpg,csgo_2.jpg,csgo_3.jpg,csgo_4.jpg";
        $game->description = "Counter-Strike: Global Offensive (CS: GO) expands upon the team-based action gameplay that it pioneered when it was launched 19 years ago. CS: GO features new maps, characters, weapons, and game modes.";
		$game->save();

        $game = new Game();
        $game->category_id = 1;
        $game->title = "Apex Legends";
        $game->price = 0;
        $game->thumbnail = "apex.jpg";
        $game->slides = "apex_1.jpg,apex_2.jpg,apex_3.jpg,apex_4.jpg";
        $game->description = "Apex Legends is the award-winning, free-to-play Hero Shooter from Respawn Entertainment. Master an ever-growing roster of legendary characters with powerful abilities, and experience strategic squad play and innovative gameplay.";
		$game->save();

        $game = new Game();
        $game->category_id = 1;
        $game->title = "PUBG: Battlegrounds";
        $game->price = 109000;
        $game->thumbnail = "pubg.jpg";
        $game->slides = "pubg_1.jpg,pubg_2.jpg,pubg_3.jpg,pubg_4.jpg";
        $game->description = "Play PUBG: BATTLEGROUNDS for free. Land on strategic locations, loot weapons and supplies, and survive to become the last team standing across various, diverse Battlegrounds.";
		$game->save();

        $game = new Game();
        $game->category_id = 1;
        $game->title = "DOOM";
        $game->price = 265000;
        $game->thumbnail = "doom.jpg";
        $game->slides = "doom_1.jpg,doom_2.jpg,doom_3.jpg,doom_4.jpg";
        $game->description = "Now includes all three premium DLC packs (Unto the Evil, Hell Followed, and Bloodfall), maps, modes, and weapons, as well as all feature updates including Arcade Mode, Photo Mode, and the latest Update 6.66, which brings further multiplayer improvements.";
		$game->save();

        $game = new Game();
        $game->category_id = 1;
        $game->title = "Call of Duty: Black Ops III";
        $game->price = 799000;
        $game->thumbnail = "cod.jpg";
        $game->slides = "cod_1.jpg,cod_2.jpg,cod_3.jpg,cod_4.jpg";
        $game->description = "Call of Duty®: Black Ops III Zombies Chronicles Edition includes the full base game plus the Zombies Chronicles content expansion.";
        $game->save();
		//End category

        //Category : Open World
        $game = new Game();
        $game->category_id = 2;
        $game->title = "Stardew Valley";
        $game->price = 115000;
        $game->thumbnail = "stardew.jpg";
        $game->slides = "stardew_1.jpg,stardew_2.jpg,stardew_3,stardew_4.jpg";
        $game->description = "You've inherited your grandfather's old farm plot in Stardew Valley. Armed with hand-me-down tools and a few coins, you set out to begin your new life. Can you learn to live off the land and turn these overgrown fields into a thriving home?";
		$game->save();

        $game = new Game();
        $game->category_id = 2;
        $game->title = "Subnautica";
        $game->price = 139000;
        $game->thumbnail = "subnautica.jpg";
        $game->slides = "subnautica_1.jpg,subnautica_2.jpg,subnautica_3,subnautica_4.jpg";
        $game->description = "Descend into the depths of an alien underwater world filled with wonder and peril. Craft equipment, pilot submarines and out-smart wildlife to explore lush coral reefs, volcanoes, cave systems, and more - all while trying to survive.";
		$game->save();

        $game = new Game();
        $game->category_id = 2;
        $game->title = "The Forest";
        $game->price = 109000;
        $game->thumbnail = "forest.jpg";
        $game->slides = "forest_1.jpg,forest_2.jpg,forest_3,forest_4.jpg";
        $game->description = "As the lone survivor of a passenger jet crash, you find yourself in a mysterious forest battling to stay alive against a society of cannibalistic mutants. Build, explore, survive in this terrifying first person survival horror simulator.";
		$game->save();

        $game = new Game();
        $game->category_id = 2;
        $game->title = "Grand Theft Auto V";
        $game->price = 139000;
        $game->thumbnail = "gta.jpg";
        $game->slides = "gta_1.jpg,gta_2.jpg,gta_3,gta_4.jpg";
        $game->description = "Grand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, as well as the chance to experience the game running at 60 frames per second.";
		$game->save();

        $game = new Game();
        $game->category_id = 2;
        $game->title = "Valheim";
        $game->price = 109000;
        $game->thumbnail = "valheim.jpg";
        $game->slides = "valheim_1.jpg,valheim_2.jpg,valheim_3,valheim_4.jpg";
        $game->description = "A brutal exploration and survival game for 1-10 players, set in a procedurally-generated purgatory inspired by viking culture. Battle, build, and conquer your way to a saga worthy of Odin's patronage!";
        $game->save();
		//End category

        //Category : Sport
        $game = new Game();
        $game->category_id = 3;
        $game->title = "FIFA 22";
        $game->price = 659000;
        $game->thumbnail = "fifa.jpg";
        $game->slides = "fifa_1.jpg,fifa_2.jpg,fifa_3,fifa_4.jpg";
        $game->description = "Powered by Football™, EA SPORTS™ FIFA 22 brings the game even closer to the real thing with fundamental gameplay advances and a new season of innovation across every mode.";
		$game->save();

        $game = new Game();
        $game->category_id = 3;
        $game->title = "NBA 2K22";
        $game->price = 659000;
        $game->thumbnail = "nba.jpg";
        $game->slides = "nba_1.jpg,nba_2.jpg,nba_3,nba_4.jpg";
        $game->description = "NBA 2K22 puts the entire basketball universe in your hands. Anyone, anywhere can hoop in NBA 2K22.";
		$game->save();

        $game = new Game();
        $game->category_id = 3;
        $game->title = "F1 2020";
        $game->price = 249000;
        $game->thumbnail = "f1.jpg";
        $game->slides = "f1_1.jpg,f1_2.jpg,f1_3,f1_4.jpg";
        $game->description = "F1® 2020 allows you to create your F1® team for the very first time and race alongside the official teams and drivers. Alternatively, challenge your friends in new split-screen with casual race options for more relaxed racing.";
		$game->save();

        $game = new Game();
        $game->category_id = 3;
        $game->title = "Eleven Table Tennis";
        $game->price = 109000;
        $game->thumbnail = "ett.jpg";
        $game->slides = "ett_1.jpg,ett_2.jpg,ett_3,ett_4.jpg";
        $game->description = "We're obsessed with creating the most realistic VR table tennis simulator the world has ever seen. After 5 years and countless hours of hard work, we believe that we have accomplished that goal";
		$game->save();

        $game = new Game();
        $game->category_id = 3;
        $game->title = "PIPE";
        $game->price = 69000;
        $game->thumbnail = "pipe.jpg";
        $game->slides = "pipe_1.jpg,pipe_2.jpg,pipe_3,pipe_4.jpg";
        $game->description = "PIPE is a physics based BMX experience built for the BMX community designed to simulate realistic BMX motion. Perform over 50 aerial stunts, grind any corner, send big airs in the PIPE!";
        $game->save();
		//End category

        //Category : Card Game
        $game = new Game();
        $game->category_id = 4;
        $game->title = "UNO";
        $game->price = 99000;
        $game->thumbnail = "uno.jpg";
        $game->slides = "uno_1.jpg,uno_2.jpg,uno_3,uno_4.jpg";
        $game->description = "UNO makes its return with new exciting features! Match cards by color or value and play action cards to change things up. Race against others to empty your hand before everyone else in Classic play or customize your experience with House Rules.";
		$game->save();

        $game = new Game();
        $game->category_id = 4;
        $game->title = "Yu-Gi-Oh! Master Duel";
        $game->price = 0;
        $game->thumbnail = "yugioh.jpg";
        $game->slides = "yugioh_1.jpg,yugioh_2.jpg,yugioh_3,yugioh_4.jpg";
        $game->description = "The definitive digital edition of the competitive card game that has been evolving for over 20 years! Duel at the highest level against Duelists all over the world.";
		$game->save();

        $game = new Game();
        $game->category_id = 4;
        $game->title = "Tabletop Simulator";
        $game->price = 135000;
        $game->thumbnail = "tabletop.jpg";
        $game->slides = "tabletop_1.jpg,tabletop_2.jpg,tabletop_3,tabletop_4.jpg";
        $game->description = "Tabletop Simulator is the only simulator where you can let your aggression out by flipping the table! There are no rules to follow: just you, a physics sandbox, and your friends. Make your own online board games or play the thousands of community created mods.";
		$game->save();

        $game = new Game();
        $game->category_id = 4;
        $game->title = "Inscryption";
        $game->price = 119000;
        $game->thumbnail = "inscryption.jpg";
        $game->slides = "inscryption_1.jpg,inscryption_2.jpg,inscryption_3,inscryption_4.jpg";
        $game->description = "Inscryption is an inky black card-based odyssey that blends the deckbuilding roguelike, escape-room style puzzles, and psychological horror into a blood-laced smoothie. Darker still are the secrets inscrybed upon the cards...";
		$game->save();

        $game = new Game();
        $game->category_id = 4;
        $game->title = "Stacklands";
        $game->price = 39000;
        $game->thumbnail = "stack.jpg";
        $game->slides = "stack_1.jpg,stack_2.jpg,stack_3,stack_4.jpg";
        $game->description = "Stacklands is a village builder where you stack cards to collect food, build structures, and fight creatures. For example, dragging a Villager card on top of a Berry Bush card will spawn Berry cards which the villagers can eat to survive.";
        $game->save();
        //End category
        
        //Category : Horror
        $game = new Game();
        $game->category_id = 5;
        $game->title = "Phasmophobia";
        $game->price = 89000;
        $game->thumbnail = "phasmo.jpg";
        $game->slides = "phasmo_1.jpg,phasmo_2.jpg,phasmo_3,phasmo_4.jpg";
        $game->description = "Phasmophobia is a 4 player online co-op psychological horror. Paranormal activity is on the rise and it's up to you and your team to use all the ghost hunting equipment at your disposal in order to gather as much evidence as you can.";
        $game->save();

        $game = new Game();
        $game->category_id = 5;
        $game->title = "Dead by Daylight";
        $game->price = 135000;
        $game->thumbnail = "dbd.jpg";
        $game->slides = "dbd_1.jpg,dbd_2.jpg,dbd_3,dbd_4.jpg";
        $game->description = "Dead by Daylight is a multiplayer (4vs1) horror game where one player takes on the role of the savage Killer, and the other four players play as Survivors, trying to escape the Killer and avoid being caught and killed.";
        $game->save();

        $game = new Game();
        $game->category_id = 5;
        $game->title = "Pacify";
        $game->price = 39000;
        $game->thumbnail = "pacify.jpg";
        $game->slides = "pacify_1.jpg,pacify_2.jpg,pacify_3,pacify_4.jpg";
        $game->description = "There is reportedly an evil inside that house. Something about an old funeral parlor offering a last chance to talk to their dead loved ones. Plus something about lights, laughter, a girl, missing people, etc. Take a team, and check the place out.";
        $game->save();

        $game = new Game();
        $game->category_id = 5;
        $game->title = "The Quarry";
        $game->price = 659000;
        $game->thumbnail = "quarry.jpg";
        $game->slides = "quarry_1.jpg,quarry_2.jpg,quarry_3,quarry_4.jpg";
        $game->description = "When the sun goes down on the last night of summer camp, nine teenage counselors are plunged into an unpredictable night of horror accompanied by blood-drenched locals and creatures hunting with unimaginable choices you must make to help them survive.";
        $game->save();

        $game = new Game();
        $game->category_id = 5;
        $game->title = "MADiSON";
        $game->price = 159000;
        $game->thumbnail = "madison.jpg";
        $game->slides = "madison_1.jpg,madison_2.jpg,madison_3,madison_4.jpg";
        $game->description = "MADiSON is a first person psychological horror game that delivers an immersive and terrifying experience. With the help of an instant camera, connect the human world with the beyond, take pictures and develop them by yourself.";
        $game->save();

        $games = Game::all();
        foreach ($games as $item) {
            $item->slug = Str::slug($item->title, '-');
            $item->save();
        }
    }
}
