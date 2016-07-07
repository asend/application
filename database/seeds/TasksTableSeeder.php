<?php

use Illuminate\Database\Seeder;
use App\Task;
class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->delete();

        $tasks=new Task();
        $tasks->name='Laravel Basics';
        $tasks->status='Complete';
        $tasks->save();

        $tasks=new Task();
        $tasks->name='Laravel Advanced';
        $tasks->status='Incomplete';
        $tasks->save();

        $tasks=new Task();
        $tasks->name='Laravel Expert';
        $tasks->status='Incomplete';
        $tasks->save();
    }
}
