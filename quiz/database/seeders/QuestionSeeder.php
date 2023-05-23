<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allUsers = User::All();
        $this->create_all($allUsers[$allUsers->count()-1]);
    }

    public function question_create($user_id, $category_id, $name){
        Question::factory()->create([
            'name' => $name,
            'question1' => "Milyen gyakran tapasztalod ezt a tünetet?",
            'question1_points' => "1",
            'question2' => "Van negatív hatása:",
            'question2_points' => "1",
            'question3' => "Mit gondolsz mióta van ez a tünet jelen az életedben?",
            'question3_points' => "1",
            'question4' => "Írj ide néhány emléket a tünettel kapcsolatban!",
            'question5' => "Írd ide mások észrevételeit:",
            'user_id' => $user_id,
            'category_id' => $category_id,
        ]);
    }

    public function create_all($user_id){
        $this->question_create($user_id,1,"Könnyen elterelhető a figyelmed");
        $this->question_create($user_id,1,"Úgy tűnik mintha nem figyelnél");
        $this->question_create($user_id,1,"Rendszerezési/szervezési nehézségek");
        $this->question_create($user_id,1,"A figyelem lekötésének nehézségei");
        $this->question_create($user_id,1,"Hibázol");
        $this->question_create($user_id,1,"Nehézségek az utasításokkal");
        $this->question_create($user_id,1,"Bonyolult feladatok kerülése");
        $this->question_create($user_id,1,"Elhagysz dolgokat");
        $this->question_create($user_id,1,"Feledékeny vagy");

        $this->question_create($user_id,2,"Babrálás (fidgeting)");
        $this->question_create($user_id,2,"Gyakran hagyod el a helyed");
        $this->question_create($user_id,2,"Nyugtalannak érzed magad");
        $this->question_create($user_id,2,"Kikapcsolódási nehézségek");
        $this->question_create($user_id,2,"Mindig csinálni akarsz valamit");
        $this->question_create($user_id,2,"Sokat beszélsz");
        $this->question_create($user_id,2,"Válaszok hangos bemondása");
        $this->question_create($user_id,2,"Félbeszakítasz másokat");
        $this->question_create($user_id,2,"Problémák a várakozással");

        $this->question_create($user_id,3,"Nem tipikus érzelmi reakciók");
        $this->question_create($user_id,3,"Alvászavar");
        $this->question_create($user_id,3,"Szenzoros érzékenység");
        $this->question_create($user_id,3,"Szociális kellemetlenség");
        $this->question_create($user_id,3,"Elutasításra érzékeny diszfória");
        $this->question_create($user_id,3,"Az időérzék hiánya");
        $this->question_create($user_id,3,"Hiperfókusz");
    }

}
