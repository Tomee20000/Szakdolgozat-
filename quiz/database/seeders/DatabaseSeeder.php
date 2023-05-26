<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => "admin",
            'email' => "admin@admin.hu" ,
            'password' => '$2y$10$RrxCi0C51k4gw//geznBoOKLgJB9TjupjUHNuiAjVyP1b2S1OuOH6', // password
        ]);

        Category::factory()->create([
            'name' => "Figyelemmel kapcsolatos tünetek",
            'color' => "#0C4B6C",
            'cover_image_path' =>"images/adhd5.png",
        ]);

        Category::factory()->create([
            'name' => "Hiperaktív tünetek",
            'color' => "#5F0429",
            'cover_image_path' =>"images/adhd2.png",
        ]);

        Category::factory()->create([
            'name' => "Nem hivatalos tünetek",
            'color' => "#B45904",
            'cover_image_path' =>"images/adhd4.png",
        ]);

        $users = User::All();

        foreach ($users as $user) {
            $this->question_create($user->id,1,"Könnyen elterelhető a figyelmed");
            $this->question_create($user->id,1,"Úgy tűnik mintha nem figyelnél");
            $this->question_create($user->id,1,"Rendszerezési/szervezési nehézségek");
            $this->question_create($user->id,1,"A figyelem lekötésének nehézségei");
            $this->question_create($user->id,1,"Hibázol");
            $this->question_create($user->id,1,"Nehézségek az utasításokkal");
            $this->question_create($user->id,1,"Bonyolult feladatok kerülése");
            $this->question_create($user->id,1,"Elhagysz dolgokat");
            $this->question_create($user->id,1,"Feledékeny vagy");

            $this->question_create($user->id,2,"Babrálás (fidgeting)");
            $this->question_create($user->id,2,"Nagy a mozgásigényed");
            $this->question_create($user->id,2,"Nyugtalannak érzed magad");
            $this->question_create($user->id,2,"Kikapcsolódási nehézségek");
            $this->question_create($user->id,2,"Mindig csinálni akarsz valamit");
            $this->question_create($user->id,2,"Sokat beszélsz");
            $this->question_create($user->id,2,"Válaszok hangos bemondása");
            $this->question_create($user->id,2,"Félbeszakítasz másokat");
            $this->question_create($user->id,2,"Problémák a várakozással");

            $this->question_create($user->id,3,"Érzelmi szabályozási zavarok");
            $this->question_create($user->id,3,"Alvászavar");
            $this->question_create($user->id,3,"Szenzoros érzékenység");
            $this->question_create($user->id,3,"Szociális kellemetlenség");
            $this->question_create($user->id,3,"Elutasításra érzékeny diszfória (RSD)");
            $this->question_create($user->id,3,"Az időérzék hiánya");
            $this->question_create($user->id,3,"Hiperfókusz");
        }
    }

    public function question_create($user_id, $category_id, $name){
        Question::factory()->create([
            'name' => $name,
            //'cover_image_path' => "",
            'question1' => "Milyen gyakran tapasztalod ezt a tünetet?",
            'question1_points' => "1",
            'question2' => "Van negatív hatása:",
            'question2_points' => "0",
            'question3' => "Mit gondolsz mióta van ez a tünet jelen az életedben?",
            'question3_points' => "1",
            'question4' => "Írj ide néhány emléket a tünettel kapcsolatban!",
            'question5' => "Írd ide mások észrevételeit:",
            'user_id' => $user_id,
            'category_id' => $category_id,
        ]);
    }


}
