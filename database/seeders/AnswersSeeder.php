<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answers = array(
            array('id' => '1', 'testnumber' => 't1', 'questionnumber' => '1', 'answernumber' => '1', 'correctanswer' => '0', 'answertext' => 'The PHP configuration file, php.ini, is the final and most immediate way to affect PHP\'s functionality.'),
            array('id' => '2', 'testnumber' => 't1', 'questionnumber' => '1', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => 'The php.ini file is read each time PHP is initialized.'),
            array('id' => '3', 'testnumber' => 't1', 'questionnumber' => '1', 'answernumber' => '3', 'correctanswer' => '1', 'answertext' => 'Both of the above.'),
            array('id' => '4', 'testnumber' => 't1', 'questionnumber' => '1', 'answernumber' => '4', 'correctanswer' => '0', 'answertext' => 'None of the above.'),
            array('id' => '5', 'testnumber' => 't1', 'questionnumber' => '2', 'answernumber' => '1', 'correctanswer' => '0', 'answertext' => 'Strings'),
            array('id' => '6', 'testnumber' => 't1', 'questionnumber' => '2', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => 'Arrays'),
            array('id' => '7', 'testnumber' => 't1', 'questionnumber' => '2', 'answernumber' => '3', 'correctanswer' => '0', 'answertext' => 'Objects'),
            array('id' => '8', 'testnumber' => 't1', 'questionnumber' => '2', 'answernumber' => '4', 'correctanswer' => '1', 'answertext' => 'Resources'),
            array('id' => '9', 'testnumber' => 't1', 'questionnumber' => '3', 'answernumber' => '1', 'correctanswer' => '1', 'answertext' => '_LINE_'),
            array('id' => '10', 'testnumber' => 't1', 'questionnumber' => '3', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => '_FILE_'),
            array('id' => '11', 'testnumber' => 't1', 'questionnumber' => '3', 'answernumber' => '3', 'correctanswer' => '0', 'answertext' => '_FUNCTION_'),
            array('id' => '12', 'testnumber' => 't1', 'questionnumber' => '3', 'answernumber' => '4', 'correctanswer' => '0', 'answertext' => '_CLASS_'),
            array('id' => '13', 'testnumber' => 't1', 'questionnumber' => '4', 'answernumber' => '1', 'correctanswer' => '0', 'answertext' => 'Numeric Array'),
            array('id' => '14', 'testnumber' => 't1', 'questionnumber' => '4', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => 'Associative Array'),
            array('id' => '15', 'testnumber' => 't1', 'questionnumber' => '4', 'answernumber' => '3', 'correctanswer' => '1', 'answertext' => 'Multidimentional Array'),
            array('id' => '16', 'testnumber' => 't1', 'questionnumber' => '4', 'answernumber' => '4', 'correctanswer' => '0', 'answertext' => 'None of the above.'),
            array('id' => '17', 'testnumber' => 't1', 'questionnumber' => '5', 'answernumber' => '1', 'correctanswer' => '1', 'answertext' => 'rsort()'),
            array('id' => '18', 'testnumber' => 't1', 'questionnumber' => '5', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => 'sort()'),
            array('id' => '19', 'testnumber' => 't1', 'questionnumber' => '5', 'answernumber' => '3', 'correctanswer' => '0', 'answertext' => 'shuffle()'),
            array('id' => '20', 'testnumber' => 't1', 'questionnumber' => '5', 'answernumber' => '4', 'correctanswer' => '0', 'answertext' => 'reset()'),
            array('id' => '21', 'testnumber' => 't1', 'questionnumber' => '6', 'answernumber' => '1', 'correctanswer' => '0', 'answertext' => 'array_reverse()'),
            array('id' => '22', 'testnumber' => 't1', 'questionnumber' => '6', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => 'array_search()'),
            array('id' => '23', 'testnumber' => 't1', 'questionnumber' => '6', 'answernumber' => '3', 'correctanswer' => '0', 'answertext' => 'array_shift()'),
            array('id' => '24', 'testnumber' => 't1', 'questionnumber' => '6', 'answernumber' => '4', 'correctanswer' => '1', 'answertext' => 'array_slice()'),
            array('id' => '25', 'testnumber' => 't1', 'questionnumber' => '7', 'answernumber' => '1', 'correctanswer' => '0', 'answertext' => 'fopen()'),
            array('id' => '26', 'testnumber' => 't1', 'questionnumber' => '7', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => 'fread()'),
            array('id' => '27', 'testnumber' => 't1', 'questionnumber' => '7', 'answernumber' => '3', 'correctanswer' => '0', 'answertext' => 'filesize()'),
            array('id' => '28', 'testnumber' => 't1', 'questionnumber' => '7', 'answernumber' => '4', 'correctanswer' => '1', 'answertext' => 'file_exist()'),
            array('id' => '29', 'testnumber' => 't1', 'questionnumber' => '8', 'answernumber' => '1', 'correctanswer' => '0', 'answertext' => '$GLOBALS'),
            array('id' => '30', 'testnumber' => 't1', 'questionnumber' => '8', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => '$_SERVER'),
            array('id' => '31', 'testnumber' => 't1', 'questionnumber' => '8', 'answernumber' => '3', 'correctanswer' => '1', 'answertext' => '$_COOKIE'),
            array('id' => '32', 'testnumber' => 't1', 'questionnumber' => '8', 'answernumber' => '4', 'correctanswer' => '0', 'answertext' => '$_SESSION'),
            array('id' => '33', 'testnumber' => 't1', 'questionnumber' => '9', 'answernumber' => '1', 'correctanswer' => '0', 'answertext' => 'The preg_match() function searches a string specified by string for a string specified by pattern, returning true if the pattern is found, and false otherwise.'),
            array('id' => '34', 'testnumber' => 't1', 'questionnumber' => '9', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => 'The preg_match() function searches throughout a string specified by pattern for a string specified by string. The search is not case sensitive.'),
            array('id' => '35', 'testnumber' => 't1', 'questionnumber' => '9', 'answernumber' => '3', 'correctanswer' => '1', 'answertext' => 'The preg_match() function searches string for pattern, returning true if pattern exists, and false otherwise.'),
            array('id' => '36', 'testnumber' => 't1', 'questionnumber' => '9', 'answernumber' => '4', 'correctanswer' => '0', 'answertext' => 'None of the above'),
            array('id' => '37', 'testnumber' => 't1', 'questionnumber' => '10', 'answernumber' => '1', 'correctanswer' => '1', 'answertext' => 'True'),
            array('id' => '38', 'testnumber' => 't1', 'questionnumber' => '10', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => 'False'),
            array('id' => '39', 'testnumber' => 't2', 'questionnumber' => '1', 'answernumber' => '1', 'correctanswer' => '1', 'answertext' => '<script>'),
            array('id' => '40', 'testnumber' => 't2', 'questionnumber' => '1', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => '<javascript>'),
            array('id' => '41', 'testnumber' => 't2', 'questionnumber' => '1', 'answernumber' => '3', 'correctanswer' => '0', 'answertext' => '<scripting>'),
            array('id' => '42', 'testnumber' => 't2', 'questionnumber' => '1', 'answernumber' => '4', 'correctanswer' => '0', 'answertext' => '<js>'),
            array('id' => '43', 'testnumber' => 't2', 'questionnumber' => '2', 'answernumber' => '1', 'correctanswer' => '0', 'answertext' => 'document.getElement("p").innerHTML = "Hello World!"'),
            array('id' => '44', 'testnumber' => 't2', 'questionnumber' => '2', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => '#demo.innerHTML = "Hello World!";'),
            array('id' => '45', 'testnumber' => 't2', 'questionnumber' => '2', 'answernumber' => '3', 'correctanswer' => '1', 'answertext' => 'document.getElementById("demo").innerHTML = "Hello World!"; '),
            array('id' => '46', 'testnumber' => 't2', 'questionnumber' => '2', 'answernumber' => '4', 'correctanswer' => '0', 'answertext' => 'document.getElementByName("p").innerHTML = "Hello World!";'),
            array('id' => '47', 'testnumber' => 't2', 'questionnumber' => '3', 'answernumber' => '1', 'correctanswer' => '0', 'answertext' => 'The <head> section'),
            array('id' => '48', 'testnumber' => 't2', 'questionnumber' => '3', 'answernumber' => '2', 'correctanswer' => '1', 'answertext' => 'Both the <head> section and the <body> section are correct '),
            array('id' => '49', 'testnumber' => 't2', 'questionnumber' => '3', 'answernumber' => '3', 'correctanswer' => '0', 'answertext' => 'The <body> section'),
            array('id' => '50', 'testnumber' => 't2', 'questionnumber' => '4', 'answernumber' => '1', 'correctanswer' => '0', 'answertext' => '<script name="xxx.js">'),
            array('id' => '51', 'testnumber' => 't2', 'questionnumber' => '4', 'answernumber' => '2', 'correctanswer' => '1', 'answertext' => '<script src="xxx.js">'),
            array('id' => '52', 'testnumber' => 't2', 'questionnumber' => '4', 'answernumber' => '3', 'correctanswer' => '0', 'answertext' => '<script href="xxx.js">'),
            array('id' => '53', 'testnumber' => 't2', 'questionnumber' => '5', 'answernumber' => '1', 'correctanswer' => '1', 'answertext' => 'False'),
            array('id' => '54', 'testnumber' => 't2', 'questionnumber' => '5', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => 'True'),
            array('id' => '55', 'testnumber' => 't2', 'questionnumber' => '6', 'answernumber' => '1', 'correctanswer' => '0', 'answertext' => 'alertBox("Hello World");'),
            array('id' => '56', 'testnumber' => 't2', 'questionnumber' => '6', 'answernumber' => '2', 'correctanswer' => '1', 'answertext' => 'alert("Hello World");'),
            array('id' => '57', 'testnumber' => 't2', 'questionnumber' => '6', 'answernumber' => '3', 'correctanswer' => '0', 'answertext' => 'msg("Hello World");'),
            array('id' => '58', 'testnumber' => 't2', 'questionnumber' => '6', 'answernumber' => '4', 'correctanswer' => '0', 'answertext' => 'msgBox("Hello World");'),
            array('id' => '59', 'testnumber' => 't2', 'questionnumber' => '7', 'answernumber' => '1', 'correctanswer' => '0', 'answertext' => 'function:myFunction()'),
            array('id' => '60', 'testnumber' => 't2', 'questionnumber' => '7', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => 'function = myFunction()'),
            array('id' => '61', 'testnumber' => 't2', 'questionnumber' => '7', 'answernumber' => '3', 'correctanswer' => '1', 'answertext' => 'function myFunction()'),
            array('id' => '62', 'testnumber' => 't2', 'questionnumber' => '8', 'answernumber' => '1', 'correctanswer' => '0', 'answertext' => 'call function myFunction()'),
            array('id' => '63', 'testnumber' => 't2', 'questionnumber' => '8', 'answernumber' => '2', 'correctanswer' => '1', 'answertext' => 'myFunction()'),
            array('id' => '64', 'testnumber' => 't2', 'questionnumber' => '8', 'answernumber' => '3', 'correctanswer' => '0', 'answertext' => 'call myFunction()'),
            array('id' => '65', 'testnumber' => 't2', 'questionnumber' => '9', 'answernumber' => '1', 'correctanswer' => '0', 'answertext' => 'if i == 5 then'),
            array('id' => '66', 'testnumber' => 't2', 'questionnumber' => '9', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => 'if i = 5 then'),
            array('id' => '67', 'testnumber' => 't2', 'questionnumber' => '9', 'answernumber' => '3', 'correctanswer' => '0', 'answertext' => 'if i = 5'),
            array('id' => '68', 'testnumber' => 't2', 'questionnumber' => '9', 'answernumber' => '4', 'correctanswer' => '1', 'answertext' => 'if (i == 5)'),
            array('id' => '69', 'testnumber' => 't2', 'questionnumber' => '10', 'answernumber' => '1', 'correctanswer' => '1', 'answertext' => 'if (i != 5) '),
            array('id' => '70', 'testnumber' => 't2', 'questionnumber' => '10', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => 'if (i <> 5)'),
            array('id' => '71', 'testnumber' => 't2', 'questionnumber' => '10', 'answernumber' => '3', 'correctanswer' => '0', 'answertext' => 'if i <> 5'),
            array('id' => '72', 'testnumber' => 't2', 'questionnumber' => '10', 'answernumber' => '4', 'correctanswer' => '0', 'answertext' => 'if i =! 5 then'),
            array('id' => '73', 'testnumber' => 't2', 'questionnumber' => '11', 'answernumber' => '1', 'correctanswer' => '0', 'answertext' => 'while i = 1 to 10'),
            array('id' => '74', 'testnumber' => 't2', 'questionnumber' => '11', 'answernumber' => '2', 'correctanswer' => '0', 'answertext' => 'while (i <= 10; i++)'),
            array('id' => '75', 'testnumber' => 't2', 'questionnumber' => '11', 'answernumber' => '3', 'correctanswer' => '1', 'answertext' => 'while (i <= 10)')
        );

        for ($i = 0; $i < count($answers); $i++) {
            DB::table('answers')->insert([

                'testnumber' => $answers[$i]['testnumber'],
                'questionnumber' => $answers[$i]['questionnumber'],
                'answernumber' => $answers[$i]['answernumber'],
                'answertext' => $answers[$i]['answertext'],
                'points' => $answers[$i]['correctanswer'] > 0 ? ($i % 3) + 1 : 0
            ]);
        }
    }
}
