<?php

class ExerciseRequirementsTableSeeder extends Seeder {

	public function run()
    {
        DB::table('ExerciseRequirements')->delete();
        

        ExerciseRequirement::create(array(
        	'exerciseID' => 1,
            'descriptionHTML' => "Koden måste ha körts utan fel (meddelandet <tt><span class='green'>Körning klar.</span></tt> måste visas i utdatafönstret).",
        	'requirementMetEval' => 'requirementMet = codeRunnerController.codeRunStatus == codeRunnerController.CODE_RUN_SUCCESS;'
        ));

        ExerciseRequirement::create(array(
            'exerciseID' => 1,
            'descriptionHTML' => "Koden måste innehålla en beräkning (minst två tal inuti en <code>print()</code>-sats).",
            'requirementMetEval' => 'requirementMet = /print\(.*\d+/.test( editor.getValue() ) ;'
        ));

        ExerciseRequirement::create(array(
            'exerciseID' => 2,
            'descriptionHTML' => "Koden måste ha körts utan fel (meddelandet <tt><span class='green'>Körning klar.</span></tt> måste visas i utdatafönstret).",
            'requirementMetEval' => 'requirementMet = codeRunnerController.codeRunStatus == codeRunnerController.CODE_RUN_SUCCESS;'
        ));

        ExerciseRequirement::create(array(
            'exerciseID' => 2,
            'descriptionHTML' => "Rad 1 i utdatafönstret måste innehålla dagens datum i formatet D/M ÅÅÅÅ.",
            'requirementMetEval' => '
                var correctDate = new Date();
                var correctDayOfMonth = correctDate.getDate();
                var correctMonth = correctDate.getMonth()+1;
                var correctYear = correctDate.getFullYear();
                var userCode = codeRunnerController.getOutputFromLatestRun();
                var userCodeLines = userCode.split("\n");
                var correctString = sprintf("%d/%d %d", correctDayOfMonth, correctMonth, correctYear);
                requirementMet = userCodeLines[0] == correctString;
            '
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 2,
            'descriptionHTML' => "Rad 2 i utdatafönstret måste innehålla dagens datum i formatet ÅÅÅÅ-MM-DD.",
            'requirementMetEval' => '
                var correctDate = new Date();
                var correctDayOfMonth = correctDate.getDate();
                var correctMonth = correctDate.getMonth()+1;
                var correctYear = correctDate.getFullYear();
                var userCode = codeRunnerController.getOutputFromLatestRun();
                var userCodeLines = userCode.split("\n");
                var correctString = sprintf("%d-%\'02d-%\'02d", correctYear, correctMonth, correctDayOfMonth);
                requirementMet = userCodeLines[1] == correctString;
            '
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 3,
            'descriptionHTML' => "Koden måste ha körts utan fel (meddelandet <tt><span class='green'>Körning klar.</span></tt> måste visas i utdatafönstret).",
            'requirementMetEval' => 'requirementMet = codeRunnerController.codeRunStatus == codeRunnerController.CODE_RUN_SUCCESS;'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 3,
            'descriptionHTML' => "Koden måste med en <code>fillRect</code>-instruktion fylla hela Canvasen med svart färg.",
            'requirementMetEval' => 'requirementMet = ((editor.getValue().replace(/ /g, "") == "myCanvas.fillRect(0,0,1000,1000);") ||
            (editor.getValue().replace(/ /g, "") == "myCanvas.fillRect(0,0,1000,1000)"));'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 4,
            'descriptionHTML' => "Rad 5 ska innehålla kod som ritar den återstående linjen som krävs för att bilda en triangel i figuren.",
            'requirementMetEval' => '
            var correctLine = "myCanvas.lineTo(20,20)";
            var userLine = editor.getValue().split("\n")[4];
            requirementMet = (userLine.replace(/ /g, "") == correctLine) || (userLine.replace(/ /g, "") == correctLine+";");
            '
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 5,
            'descriptionHTML' => "<tt>minutesForOneKM</tt> måste existera. Variabeln ska innehålla värdet för Linas tid för en kilometer i minuter som ett tal.",
            'requirementMetEval' => 'requirementMet = (codeRunnerController.getUserVariableValueFromLatestRun("minutesForOneKM") === 4.5) ;'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 5,
            'descriptionHTML' => "<tt>averageSpeedInKMH</tt> måste existera. Variabeln ska innehålla värdet för Linas tid i kilometer i timmen som ett tal.",
            'requirementMetEval' => 'requirementMet = (codeRunnerController.getUserVariableValueFromLatestRun("averageSpeedInKMH") === 60/4.5) ;'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 6,
            'descriptionHTML' => "Det måste finnas en funktion som heter <code>printSum</code>.",
            'requirementMetEval' => 'requirementMet = (codeRunnerController.getUserVariableIndexFromLatestRun("printSum") != -1)'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 6,
            'descriptionHTML' => "<code>printSum(1, 2)</code> ska skriva ut värdet <tt>3</tt>.",
            'requirementMetEval' => 'requirementMet = (codeRunnerController.getOutputFromLatestRun().split("\n")[0] == 3)'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 6,
            'descriptionHTML' => "<code>printSum(3.5, -4)</code> ska skriva ut värdet <tt>-0.5</tt>.",
            'requirementMetEval' => 'requirementMet = (codeRunnerController.getOutputFromLatestRun().split("\n")[1] == -0.5)'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 7,
            'descriptionHTML' => "Det måste finnas en funktion som heter <tt>celsiusToFahrenheit</tt>.",
            'requirementMetEval' => 'requirementMet = (codeRunnerController.getUserVariableIndexFromLatestRun("celsiusToFahrenheit") != -1)'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 7,
            'descriptionHTML' => "<code>celsiusToFahrenheit(10)</code> ska returnera 50.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("celsiusToFahrenheit"));
            var r = celsiusToFahrenheit(10);
            requirementMet = (r == 50);'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 7,
            'descriptionHTML' => "<code>celsiusToFahrenheit(0)</code> ska returnera 32.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("celsiusToFahrenheit"));
            var r = celsiusToFahrenheit(0);
            requirementMet = (r == 32);'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 7,
            'descriptionHTML' => "<code>celsiusToFahrenheit()</code> kommer anropas med ett hemligt värde på argumentet och förväntas returnera det korrekta resultatet.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("celsiusToFahrenheit"));
            var r = celsiusToFahrenheit(-40);
            requirementMet = (r == -40);'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 8,
            'descriptionHTML' => "Det måste finnas en funktion som heter <tt>abs()</tt>.",
            'requirementMetEval' => 'requirementMet = (codeRunnerController.getUserVariableIndexFromLatestRun("abs") != -1)'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 8,
            'descriptionHTML' => "Om argumentet till <tt>abs()</tt> är positivt ska det returnera tillbaka talet. Testar med ett okänt värde.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("abs"));
            var r = abs(1337);
            requirementMet = (r == 1337);'
        ));
         ExerciseRequirement::create(array(
            'exerciseID' => 8,
            'descriptionHTML' => "Om argumentet till <tt>abs()</tt> är 0 ska det returnera 0.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("abs"));
            var r = abs(0);
            requirementMet = (r == 0);'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 8,
            'descriptionHTML' => "Om argumentet till <tt>abs()</tt> är negativt ska det returnera tillbaka den positiva versionen av talet. Testar med ett okänt värde.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("abs"));
            var r = abs(-1338);
            requirementMet = (r == 1338);'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 9,
            'descriptionHTML' => "Det måste finnas en funktion som heter <tt>isLeapYear()</tt>.",
            'requirementMetEval' => 'requirementMet = (codeRunnerController.getUserVariableIndexFromLatestRun("isLeapYear") != -1)'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 9,
            'descriptionHTML' => "<tt>isLeapYear(2000)</tt> ska returnera <code><strong>true</strong></code>.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("isLeapYear"));
            var r = isLeapYear(2000);
            requirementMet = (r === true);'        
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 9,
            'descriptionHTML' => "<tt>isLeapYear(2001)</tt> ska returnera <code><strong>false</strong></code>.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("isLeapYear"));
            var r = isLeapYear(2001);
            requirementMet = (r === false);'        
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 9,
            'descriptionHTML' => "<tt>isLeapYear(2004)</tt> ska returnera <code><strong>true</strong></code>.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("isLeapYear"));
            var r = isLeapYear(2004);
            requirementMet = (r === true);'        
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 9,
            'descriptionHTML' => "<tt>isLeapYear(2100)</tt> ska returnera <code><strong>false</strong></code>.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("isLeapYear"));
            var r = isLeapYear(2100);
            requirementMet = (r === false);'        
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 9,
            'descriptionHTML' => "<tt>isLeapYear()</tt> testas med två hemliga värden och förväntas ge korrekt resultat.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("isLeapYear"));
            var r = isLeapYear(133700);
            requirementMet = (r === false);
            var r = isLeapYear(133600);
            requirementMet = (requirementMet && r === true);'      
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 10,
            'descriptionHTML' => "Det måste finnas en funktion som heter <tt>isPalindrome()</tt>.",
            'requirementMetEval' => 'requirementMet = (codeRunnerController.getUserVariableIndexFromLatestRun("isPalindrome") != -1)'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 10,
            'descriptionHTML' => "<tt>isPalindrome(\"robban\")</tt> ska returnera <code><strong>false</strong></code>",
            'requirementMetEval' => ';
            function length(word) { return word.length; }
            function first(word) { return word.slice(0,1); }
            function last(word) { return word.slice(-1); }
            function middle(word) { return word.slice(1,-1); }
            eval(codeRunnerController.getUserVariableValueFromLatestRun("isPalindrome"));

            var r = isPalindrome("robban");
            requirementMet = (r === false);'             
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 10,
            'descriptionHTML' => "<tt>isPalindrome(\"nitalarbralatin\")</tt> ska returnera <code><strong>true</strong></code>",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("isPalindrome"));
            function length(word) { return word.length; }
            function first(word) { return word.slice(0,1); }
            function last(word) { return word.slice(-1); }
            function middle(word) { return word.slice(1,-1); }
            eval(codeRunnerController.getUserVariableValueFromLatestRun("isPalindrome"));

            var r = isPalindrome("nitalarbralatin");
            requirementMet = (r === true);'             
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 10,
            'descriptionHTML' => "<tt>isPalindrome()</tt> testas med två hemliga värden och förväntas ge korrekt resultat.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("isPalindrome"));
            function length(word) { return word.length; }
            function first(word) { return word.slice(0,1); }
            function last(word) { return word.slice(-1); }
            function middle(word) { return word.slice(1,-1); }
            eval(codeRunnerController.getUserVariableValueFromLatestRun("isPalindrome"));

            var r = isPalindrome("madaminedenimadam");
            requirementMet = (r === true);
            var r = isPalindrome("incorrect");
            requirementMet = (requirementMet && r === false);'      
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 11,
            'descriptionHTML' => "Det måste finnas en funktion som heter <tt>stringCountdown()</tt>.",
            'requirementMetEval' => 'requirementMet = (codeRunnerController.getUserVariableIndexFromLatestRun("stringCountdown") != -1)'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 11,
            'descriptionHTML' => "<tt>stringCountdown(10)</tt> ska returnera strängen <tt>\"109876543210\"</tt>.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("stringCountdown"));
            var r = stringCountdown(10);
            requirementMet = (r === "109876543210");'        
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 11,
            'descriptionHTML' => "<tt>stringCountdown()</tt> anropas med ett hemligt värde och förväntas ge korrekt resultat.</code>.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("stringCountdown"));
            var r = stringCountdown(42);
            requirementMet = (r === "4241403938373635343332313029282726252423222120191817161514131211109876543210");'        
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 12,
            'descriptionHTML' => "Det måste finnas en funktion som heter <tt>collatzSequence()</tt>.",
            'requirementMetEval' => 'requirementMet = (codeRunnerController.getUserVariableIndexFromLatestRun("collatzSequence") != -1)'
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 12,
            'descriptionHTML' => "<tt>collatzSequence(11)</tt> ska returnera strängen <tt>\"11,34,17,52,26,13,40,20,10,5,16,8,4,2,1,\"</code>.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("collatzSequence"));
            var r = collatzSequence(11);
            requirementMet = (r === "11,34,17,52,26,13,40,20,10,5,16,8,4,2,1,");'        
        ));
        ExerciseRequirement::create(array(
            'exerciseID' => 12,
            'descriptionHTML' => "<tt>collatzSequence()</tt> sanropas med ett hemligt värde och förväntas ge korrekt resultat.",
            'requirementMetEval' => 'eval(codeRunnerController.getUserVariableValueFromLatestRun("collatzSequence"));
            var r = collatzSequence(1337);
            requirementMet = (r === "1337,4012,2006,1003,3010,1505,4516,2258,1129,3388,1694,847,2542,1271,3814,1907,5722,2861,8584,4292,2146,1073,3220,1610,805,2416,1208,604,302,151,454,227,682,341,1024,512,256,128,64,32,16,8,4,2,1,");'        
        ));
    }
    
}
?>