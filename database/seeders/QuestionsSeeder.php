<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $questions = array(
            array('id' => '1','testnumber' => 't1','questionnumber' => '1','questiontext' => 'Which of the following is true about php.ini file?','points' => '1'),
            array('id' => '3','testnumber' => 't1','questionnumber' => '2','questiontext' => 'Which of the following type of variables are special variables that hold references to resources external to PHP (such as database connections)?','points' => '2'),
            array('id' => '4','testnumber' => 't1','questionnumber' => '3','questiontext' => 'Which of the following magic constant of PHP returns current line number of the file?','points' => '3'),
            array('id' => '7','testnumber' => 't1','questionnumber' => '4','questiontext' => 'Which of the following array represents an array containing one or more arrays?','points' => '1'),
            array('id' => '8','testnumber' => 't1','questionnumber' => '5','questiontext' => 'Which of the following function sorts an array in reverse order?','points' => '2'),
            array('id' => '9','testnumber' => 't1','questionnumber' => '6','questiontext' => 'Which of the following function returns selected parts of an array?','points' => '3'),
            array('id' => '10','testnumber' => 't1','questionnumber' => '7','questiontext' => 'Which of the following function is used to check if a file exists or not?','points' => '1'),
            array('id' => '11','testnumber' => 't1','questionnumber' => '8','questiontext' => 'Which of the following is an associative array of variables passed to the current script via HTTP cookies?','points' => '2'),
            array('id' => '12','testnumber' => 't1','questionnumber' => '9','questiontext' => 'Which of the following is correct about preg_match() function?','points' => '3'),
            array('id' => '13','testnumber' => 't1','questionnumber' => '10','questiontext' => ' Can you create a class in PHP?','points' => '1'),
            array('id' => '14','testnumber' => 't2','questionnumber' => '1','questiontext' => 'Inside which HTML element do we put the JavaScript?','points' => '2'),
            array('id' => '15','testnumber' => 't2','questionnumber' => '2','questiontext' => 'What is the correct JavaScript syntax to change the content of the HTML element below?
          
          <p. id="demo">This is a demonstration.</p.>','points' => '3'),
            array('id' => '16','testnumber' => 't2','questionnumber' => '3','questiontext' => 'Where is the correct place to insert a JavaScript?','points' => '1'),
            array('id' => '17','testnumber' => 't2','questionnumber' => '4','questiontext' => 'What is the correct syntax for referring to an external script called "xxx.js"?','points' => '2'),
            array('id' => '18','testnumber' => 't2','questionnumber' => '5','questiontext' => 'The external JavaScript file must contain the <script> tag.','points' => '3'),
            array('id' => '19','testnumber' => 't2','questionnumber' => '6','questiontext' => 'How do you write "Hello World" in an alert box?','points' => '1'),
            array('id' => '20','testnumber' => 't2','questionnumber' => '7','questiontext' => 'How do you create a function in JavaScript?','points' => '2'),
            array('id' => '21','testnumber' => 't2','questionnumber' => '8','questiontext' => 'How do you call a function named "myFunction"?','points' => '3'),
            array('id' => '22','testnumber' => 't2','questionnumber' => '9','questiontext' => 'How to write an IF statement in JavaScript?','points' => '1'),
            array('id' => '23','testnumber' => 't2','questionnumber' => '10','questiontext' => 'How to write an IF statement for executing some code if "i" is NOT equal to 5?','points' => '2'),
            array('id' => '24','testnumber' => 't2','questionnumber' => '11','questiontext' => 'How does a WHILE loop start?','points' => '3')
          );
        
          for ($i=0; $i < count($questions); $i++) { 
            DB::table('questions')->insert([
                'id'=>$questions[$i]['id'],
                'testnumber'=>$questions[$i]['testnumber'],
                'questionnumber'=>$questions[$i]['questionnumber'],
                'questiontext'=>$questions[$i]['questiontext'],
                'points'=>$questions[$i]['points']
            ]);
          }

    }
}
