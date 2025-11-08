<?php

namespace Database\Seeders;

use App\Models\Cicle;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         $this->seedCicles();
         $this->command->info('Cicles creats!');
 

         $this->seedUsers();
         $this->command->info('Usuaris creats!');
 

         $this->seedStudents();
         $this->command->info('Estudiants creats');
        
       
    }

    private function seedUsers():void{

        DB::table('users')->delete();
    
        $user = new User();
            $user->name = 'admin';
            $user->email = 'admin@admin.cat';
            $user->password = bcrypt('admin1234');
            $user->save();

        $user = new User();
            $user->name = 'alumne';
            $user->email = 'alumne@alumne.cat';
            $user->password = bcrypt('alumne1234');
            $user->save();
    }
    //Creem per defecte un Cicle i un Student per a probar que el programa funcioni correctament
    public function seedCicles(): void
    {
        DB::table('cicles')->delete();

        $cicle = new Cicle();
            $cicle->code = 'DAW';
            $cicle->name = 'Desenvolupament d\'Aplicacions Web';
            $cicle->description = 'Cicle formatiu dedicat al desenvolupament d\'aplicacions web.';
            $cicle->num_courses = 2;
            $cicle->image = 'daweb.jpg';
            $cicle->save();
    }

    public function seedStudents(): void
    {
        DB::table('students')->delete();

        $student = new Student();
            $student->name = 'Gerard Aguilar';
            $student-> email = 'gerard@example.com';
            $student-> address = 'Carrer Principal, 42';
            $student->birth_date = '1996-09-09'; 
            $student->phone_number ='689171221';
            $student->user_id = 1; 
            $student->cicle_id = 1; 
            $student-> created_at = now();
            $student->updated_at = now();
            $student->save();

    }
}



