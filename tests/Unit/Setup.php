<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

class Setup extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function db_create()
    {
        Artisan::call(
            'migrate',
            array(
                '--path' => 'database/migrations'
            )
        );
    }

    public function db_seed()
    {
        Artisan::call('db:seed');
    }

    public function db_finish()

    {
        Artisan::call(
            'migrate:rollback',
            array(
                '--path' => 'database/migrations'
            )
        );
        assertTrue(true);

        $array = array(
            0 =>
            array(
                'questiontext' => 'Where is the correct place to insert a JavaScript?',
                'points' => 3,
                'answers' =>
                array(
                    0 =>
                    array(
                        'answertext' => 'The <head> section',
                        'answercolor' => 'white',
                    ),
                    1 =>
                    array(
                        'answertext' => 'Both the <head> section and the <body> section are correct ',
                        'answercolor' => 'aqua',
                    ),
                    2 =>
                    array(
                        'answertext' => 'The <body> section',
                        'answercolor' => 'white',
                    ),
                ),
            ),
            1 =>
            array(
                'questiontext' => 'How does a WHILE loop start?',
                'points' => 3,
                'answers' =>
                array(
                    0 =>
                    array(
                        'answertext' => 'while i = 1 to 10',
                        'answercolor' => 'white',
                    ),
                    1 =>
                    array(
                        'answertext' => 'while (i <= 10; i++)',
                        'answercolor' => 'white',
                    ),
                    2 =>
                    array(
                        'answertext' => 'while (i <= 10)',
                        'answercolor' => 'aqua',
                    ),
                ),
            ),
            2 =>
            array(
                'questiontext' => 'How do you write "Hello World" in an alert box?',
                'points' => 2,
                'answers' =>
                array(
                    0 =>
                    array(
                        'answertext' => 'alertBox("Hello World");',
                        'answercolor' => 'white',
                    ),
                    1 =>
                    array(
                        'answertext' => 'alert("Hello World");',
                        'answercolor' => 'aqua',
                    ),
                    2 =>
                    array(
                        'answertext' => 'msg("Hello World");',
                        'answercolor' => 'white',
                    ),
                    3 =>
                    array(
                        'answertext' => 'msgBox("Hello World");',
                        'answercolor' => 'white',
                    ),
                ),
            ),
            3 =>
            array(
                'questiontext' => 'How do you call a function named "myFunction"?',
                'points' => 3,
                'answers' =>
                array(
                    0 =>
                    array(
                        'answertext' => 'call function myFunction()',
                        'answercolor' => 'white',
                    ),
                    1 =>
                    array(
                        'answertext' => 'myFunction()',
                        'answercolor' => 'aqua',
                    ),
                    2 =>
                    array(
                        'answertext' => 'call myFunction()',
                        'answercolor' => 'white',
                    ),
                ),
            ),
            4 =>
            array(
                'questiontext' => 'How do you create a function in JavaScript?',
                'points' => 1,
                'answers' =>
                array(
                    0 =>
                    array(
                        'answertext' => 'function:myFunction()',
                        'answercolor' => 'white',
                    ),
                    1 =>
                    array(
                        'answertext' => 'function = myFunction()',
                        'answercolor' => 'yellow',
                    ),
                    2 =>
                    array(
                        'answertext' => 'function myFunction()',
                        'answercolor' => 'lightgreen',
                    ),
                ),
            ),
            5 =>
            array(
                'questiontext' => 'The external JavaScript file must contain the <script> tag.',
                'points' => 2,
                'answers' =>
                array(
                    0 =>
                    array(
                        'answertext' => 'False',
                        'answercolor' => 'lightgreen',
                    ),
                    1 =>
                    array(
                        'answertext' => 'True',
                        'answercolor' => 'yellow',
                    ),
                ),
            ),
            6 =>
            array(
                'questiontext' => 'What is the correct JavaScript syntax to change the content of the HTML element below?
                    
                    <p. id="demo">This is a demonstration.</p.>',
                'points' => 3,
                'answers' =>
                array(
                    0 =>
                    array(
                        'answertext' => 'document.getElement("p").innerHTML = "Hello World!"',
                        'answercolor' => 'yellow',
                    ),
                    1 =>
                    array(
                        'answertext' => '#demo.innerHTML = "Hello World!";',
                        'answercolor' => 'white',
                    ),
                    2 =>
                    array(
                        'answertext' => 'document.getElementById("demo").innerHTML = "Hello World!"; ',
                        'answercolor' => 'lightgreen',
                    ),
                    3 =>
                    array(
                        'answertext' => 'document.getElementByName("p").innerHTML = "Hello World!";',
                        'answercolor' => 'white',
                    ),
                ),
            ),
            7 =>
            array(
                'questiontext' => 'What is the correct syntax for referring to an external script called "xxx.js"?',
                'points' => 3,
                'answers' =>
                array(
                    0 =>
                    array(
                        'answertext' => '<script name="xxx.js">',
                        'answercolor' => 'white',
                    ),
                    1 =>
                    array(
                        'answertext' => '<script src="xxx.js">',
                        'answercolor' => 'aqua',
                    ),
                    2 =>
                    array(
                        'answertext' => '<script href="xxx.js">',
                        'answercolor' => 'white',
                    ),
                ),
            ),
            8 =>
            array(
                'questiontext' => 'How to write an IF statement in JavaScript?',
                'points' => 2,
                'answers' =>
                array(
                    0 =>
                    array(
                        'answertext' => 'if i == 5 then',
                        'answercolor' => 'white',
                    ),
                    1 =>
                    array(
                        'answertext' => 'if i = 5 then',
                        'answercolor' => 'yellow',
                    ),
                    2 =>
                    array(
                        'answertext' => 'if i = 5',
                        'answercolor' => 'white',
                    ),
                    3 =>
                    array(
                        'answertext' => 'if (i == 5)',
                        'answercolor' => 'lightgreen',
                    ),
                ),
            ),
            9 =>
            array(
                'questiontext' => 'Inside which HTML element do we put the JavaScript?',
                'points' => 3,
                'answers' =>
                array(
                    0 =>
                    array(
                        'answertext' => '<script>',
                        'answercolor' => 'lightgreen',
                    ),
                    1 =>
                    array(
                        'answertext' => '<javascript>',
                        'answercolor' => 'yellow',
                    ),
                    2 =>
                    array(
                        'answertext' => '<scripting>',
                        'answercolor' => 'white',
                    ),
                    3 =>
                    array(
                        'answertext' => '<js>',
                        'answercolor' => 'white',
                    ),
                ),
            ),
            10 =>
            array(
                'questiontext' => 'How to write an IF statement for executing some code if "i" is NOT equal to 5?',
                'points' => 3,
                'answers' =>
                array(
                    0 =>
                    array(
                        'answertext' => 'if (i != 5) ',
                        'answercolor' => 'lightgreen',
                    ),
                    1 =>
                    array(
                        'answertext' => 'if (i <> 5)',
                        'answercolor' => 'white',
                    ),
                    2 =>
                    array(
                        'answertext' => 'if i <> 5',
                        'answercolor' => 'yellow',
                    ),
                    3 =>
                    array(
                        'answertext' => 'if i =! 5 then',
                        'answercolor' => 'white',
                    ),
                ),
            ),
        );

        $array1 = array(
            0 =>
            array(
                0 => 3,
                1 => 2,
                2 => 3,
            ),
            1 =>
            array(
                0 => 11,
                1 => 3,
                2 => 3,
            ),
            2 =>
            array(
                0 => 6,
                1 => 2,
                2 => 2,
            ),
            3 =>
            array(
                0 => 8,
                1 => 2,
                2 => 3,
            ),
            4 =>
            array(
                0 => 7,
                1 => 2,
                2 => 0,
            ),
            5 =>
            array(
                0 => 5,
                1 => 2,
                2 => 0,
            ),
            6 =>
            array(
                0 => 2,
                1 => 1,
                2 => 0,
            ),
            7 =>
            array(
                0 => 4,
                1 => 2,
                2 => 3,
            ),
            8 =>
            array(
                0 => 9,
                1 => 2,
                2 => 0,
            ),
            9 =>
            array(
                0 => 1,
                1 => 2,
                2 => 0,
            ),
            10 =>
            array(
                0 => 10,
                1 => 3,
                2 => 0,
            ),
        );
    }
}
