<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          
        $ilaria = Author::where('email', 'ilaria@pixelpop.it')->first();
        $redazione = Author::where('email', 'redazione@pixelpop.it')->first();
        $mika = Author::where('email', 'mika.tanaka@pixelpop.it')->first();
        $kenji = Author::where('email', 'kenji.arcade@pixelpop.it')->first();

        $anime = Category::where('slug', 'anime')->first();
        $manga = Category::where('slug', 'manga')->first();
        $videogiochi = Category::where('slug', 'videogiochi')->first();
        $jCulture = Category::where('slug', 'j-culture')->first();
        $recensioni = Category::where('slug', 'recensioni')->first();
        $approfondimenti = Category::where('slug', 'approfondimenti')->first();
        $eventi = Category::where('slug', 'eventi')->first();
        $retrogaming = Category::where('slug', 'retrogaming')->first();
        $indieGames = Category::where('slug', 'indie-games')->first();
        $otakuLife = Category::where('slug', 'otaku-life')->first();

        // ARTICOLO 1
        $articleOne = new Article();
        $articleOne->title = 'Il ritorno della cultura arcade nel gaming moderno';
        $articleOne->slug = Str::slug($articleOne->title);
        $articleOne->subtitle = 'Pixel, neon e nostalgia: perché l’estetica arcade continua a funzionare.';
        $articleOne->content = 'Negli ultimi anni molti videogiochi hanno riscoperto il linguaggio visivo dell’arcade: colori saturi, interfacce immediate, pixel art e colonne sonore elettroniche. Non si tratta solo di nostalgia, ma di una scelta estetica capace di rendere l’esperienza più riconoscibile e coinvolgente. Il fascino arcade funziona perché comunica velocemente: pochi elementi visivi, feedback chiari e una forte identità grafica.';
        $articleOne->cover_image = null;
        $articleOne->is_published = true;
        $articleOne->published_at = now()->subDays(8);
        $articleOne->author_id = $kenji->id;
        $articleOne->save();

        $articleOne->categories()->attach([
            $videogiochi->id,
            $retrogaming->id,
            $approfondimenti->id,
        ]);

        // ARTICOLO 2
        $articleTwo = new Article();
        $articleTwo->title = 'Anime stagionali: come scegliere cosa guardare senza perdersi';
        $articleTwo->slug = Str::slug($articleTwo->title);
        $articleTwo->subtitle = 'Tra simulcast, hype e consigli online, orientarsi tra le nuove uscite può essere complicato.';
        $articleTwo->content = 'Ogni stagione porta con sé decine di nuovi anime. Per scegliere cosa guardare può essere utile partire dal genere, dallo studio di animazione, dal manga originale o semplicemente dal tipo di esperienza che si cerca: azione, comfort, mistero o racconto emotivo. L’importante è non farsi guidare solo dall’hype, ma costruire una propria piccola selezione sostenibile.';
        $articleTwo->cover_image = null;
        $articleTwo->is_published = true;
        $articleTwo->published_at = now()->subDays(7);
        $articleTwo->author_id = $redazione->id;
        $articleTwo->save();

        $articleTwo->categories()->attach([
            $anime->id,
            $jCulture->id,
            $otakuLife->id,
        ]);

        // ARTICOLO 3
        $articleThree = new Article();
        $articleThree->title = 'Manga e videogiochi: due linguaggi sempre più vicini';
        $articleThree->slug = Str::slug($articleThree->title);
        $articleThree->subtitle = 'Dalla narrazione episodica ai personaggi iconici, manga e videogiochi condividono molte strategie.';
        $articleThree->content = 'Manga e videogiochi sembrano mondi diversi, ma spesso costruiscono coinvolgimento attraverso meccanismi simili: progressione, identificazione, cliffhanger, ritmo visivo e caratterizzazione forte dei personaggi. Entrambi lavorano sull’attesa e sulla ricompensa, alternando momenti di scoperta a momenti di tensione narrativa.';
        $articleThree->cover_image = null;
        $articleThree->is_published = true;
        $articleThree->published_at = now()->subDays(6);
        $articleThree->author_id = $ilaria->id;
        $articleThree->save();

        $articleThree->categories()->attach([
            $manga->id,
            $videogiochi->id,
            $approfondimenti->id,
        ]);

        // ARTICOLO 4
        $articleFour = new Article();
        $articleFour->title = 'Akihabara oggi: tra sale giochi, anime store e cultura pop';
        $articleFour->slug = Str::slug($articleFour->title);
        $articleFour->subtitle = 'Un viaggio nell’immaginario otaku tra quartieri, negozi specializzati e luoghi simbolo.';
        $articleFour->content = 'Akihabara è spesso raccontata come capitale dell’immaginario otaku. Tra sale giochi, negozi di elettronica, merchandise, figure e manga store, il quartiere è diventato un simbolo globale della cultura pop giapponese. Oggi però Akihabara non è solo nostalgia o collezionismo: è anche turismo, identità urbana e racconto visivo del Giappone contemporaneo.';
        $articleFour->cover_image = null;
        $articleFour->is_published = true;
        $articleFour->published_at = now()->subDays(5);
        $articleFour->author_id = $mika->id;
        $articleFour->save();

        $articleFour->categories()->attach([
            $jCulture->id,
            $anime->id,
            $manga->id,
            $otakuLife->id,
        ]);

        // ARTICOLO 5
        $articleFive = new Article();
        $articleFive->title = 'Cozy games e bisogno di calma: perché ci attirano così tanto';
        $articleFive->slug = Str::slug($articleFive->title);
        $articleFive->subtitle = 'Non solo estetica carina: i cozy games rispondono a un bisogno preciso di ritmo, controllo e sicurezza.';
        $articleFive->content = 'I cozy games propongono esperienze lente, ripetitive e rassicuranti. Il loro successo non dipende soltanto dai colori pastello o dai personaggi teneri, ma anche dalla possibilità di abitare spazi digitali prevedibili, controllabili e poco giudicanti. In un panorama videoludico spesso competitivo, questi giochi offrono una forma diversa di coinvolgimento.';
        $articleFive->cover_image = null;
        $articleFive->is_published = true;
        $articleFive->published_at = now()->subDays(4);
        $articleFive->author_id = $ilaria->id;
        $articleFive->save();

        $articleFive->categories()->attach([
            $videogiochi->id,
            $indieGames->id,
            $approfondimenti->id,
        ]);

        // ARTICOLO 6
        $articleSix = new Article();
        $articleSix->title = 'Eventi otaku in Italia: cosa cercano davvero i fan';
        $articleSix->slug = Str::slug($articleSix->title);
        $articleSix->subtitle = 'Fiere, cosplay, manga, videogiochi e community: gli eventi pop sono sempre più spazi sociali.';
        $articleSix->content = 'Gli eventi dedicati alla cultura pop giapponese non sono solo luoghi dove comprare gadget o incontrare creator. Sono spazi di appartenenza, riconoscimento e condivisione. Il cosplay, le aree gaming, gli stand manga e gli incontri tematici creano un’esperienza collettiva che va oltre il semplice consumo culturale.';
        $articleSix->cover_image = null;
        $articleSix->is_published = true;
        $articleSix->published_at = now()->subDays(3);
        $articleSix->author_id = $redazione->id;
        $articleSix->save();

        $articleSix->categories()->attach([
            $eventi->id,
            $jCulture->id,
            $otakuLife->id,
        ]);

        // ARTICOLO 7
        $articleSeven = new Article();
        $articleSeven->title = 'Recensione demo: quando pochi minuti bastano per incuriosire';
        $articleSeven->slug = Str::slug($articleSeven->title);
        $articleSeven->subtitle = 'Una buona demo non mostra tutto: lascia intuire il potenziale.';
        $articleSeven->content = 'Una demo efficace non deve necessariamente spiegare ogni sistema di gioco. A volte bastano atmosfera, ritmo, feedback dei comandi e una direzione artistica chiara per lasciare una forte impressione. Il punto non è completare l’esperienza, ma far nascere una domanda: voglio vedere cosa succede dopo?';
        $articleSeven->cover_image = null;
        $articleSeven->is_published = true;
        $articleSeven->published_at = now()->subDays(2);
        $articleSeven->author_id = $redazione->id;
        $articleSeven->save();

        $articleSeven->categories()->attach([
            $videogiochi->id,
            $recensioni->id,
            $indieGames->id,
        ]);

        // ARTICOLO 8 - BOZZA
        $articleEight = new Article();
        $articleEight->title = 'Bozza: il fascino dei JRPG tra viaggio, party e crescita';
        $articleEight->slug = Str::slug($articleEight->title);
        $articleEight->subtitle = 'Un approfondimento ancora in lavorazione sul perché i JRPG continuano a essere così riconoscibili.';
        $articleEight->content = 'Questo articolo è ancora in bozza e servirà per testare la differenza tra contenuti pubblicati e contenuti non visibili nel frontend pubblico.';
        $articleEight->cover_image = null;
        $articleEight->is_published = false;
        $articleEight->published_at = null;
        $articleEight->author_id = $ilaria->id;
        $articleEight->save();

        $articleEight->categories()->attach([
            $videogiochi->id,
            $manga->id,
            $approfondimenti->id,
        ]);
    }
}
