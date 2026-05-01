<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('email', 'admin@pixelpop.it')->first();
        $editor = User::where('email', 'editor@pixelpop.it')->first();

        $authorOne = new Author();
        $authorOne->user_id = $admin->id;
        $authorOne->name = 'Ilaria Motta';
        $authorOne->email = 'ilaria@pixelpop.it';
        $authorOne->slug = Str::slug($authorOne->name);
        $authorOne->bio = 'Autrice appassionata di videogiochi, cultura pop giapponese, manga e narrazioni interattive. Su Pixel Pop cura approfondimenti tra psicologia, game design e immaginario pop.';
        $authorOne->avatar_image = null;
        $authorOne->save();

        $authorTwo = new Author();
        $authorTwo->user_id = $editor->id;
        $authorTwo->name = 'Redazione Pixel Pop';
        $authorTwo->email = 'redazione@pixelpop.it';
        $authorTwo->slug = Str::slug($authorTwo->name);
        $authorTwo->bio = 'La redazione di Pixel Pop racconta notizie, tendenze e approfondimenti dal mondo gaming, anime, manga e cultura pop giapponese.';
        $authorTwo->avatar_image = null;
        $authorTwo->save();

        $authorThree = new Author();
        $authorThree->user_id = null;
        $authorThree->name = 'Mika Tanaka';
        $authorThree->email = 'mika.tanaka@pixelpop.it';
        $authorThree->slug = Str::slug($authorThree->name);
        $authorThree->bio = 'Scrittrice specializzata in cultura giapponese contemporanea, quartieri pop di Tokyo, eventi otaku e tendenze legate ad anime e manga.';
        $authorThree->avatar_image = null;
        $authorThree->save();

        $authorFour = new Author();
        $authorFour->user_id = null;
        $authorFour->name = 'Kenji Arcade';
        $authorFour->email = 'kenji.arcade@pixelpop.it';
        $authorFour->slug = Str::slug($authorFour->name);
        $authorFour->bio = 'Collaboratore esterno dedicato a retrogaming, sale giochi, pixel art e cultura arcade tra passato e presente.';
        $authorFour->avatar_image = null;
        $authorFour->save();
    }
}
