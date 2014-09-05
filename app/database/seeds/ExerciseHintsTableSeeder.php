<?php

class ExerciseHintsTableSeeder extends Seeder {

	public function run()
    {
    	DB::table('hints')->delete();
    	
    	Hint::create(array(
    		'exerciseID' => 3,
            'hintCost' => 5,
            'hintHTML' => "Kom ihåg att Canvasen sträcker sig över ett område som du inte ser."
    	));
        Hint::create(array(
            'exerciseID' => 3,
            'hintCost' => 5,
            'hintHTML' => "Canvasens bredd och höjd är 1000 pixlar."
        ));
        Hint::create(array(
            'exerciseID' => 4,
            'hintCost' => 5,
            'hintHTML' => "Slutpunktens koordinater är densamma som startpunktens."
        ));
        Hint::create(array(
            'exerciseID' => 5,
            'hintCost' => 10,
            'hintHTML' => "4 minuter och 30 sekunder är inte samma sak som 4,3 minuter."
        ));
        Hint::create(array(
            'exerciseID' => 5,
            'hintCost' => 5,
            'hintHTML' => "Medelhastigheten får du genom att ta antalet minuter i en timme och delar med hur lång tid det tar för henne att nå en kilometer."
        ));
        Hint::create(array(
            'exerciseID' => 8,
            'hintCost' => 5,
            'hintHTML' => "Funktionen returnerar positiva tal oförändrade, så <code><strong>if</strong></code> behöver bara returnera parametern."
        ));
        Hint::create(array(
            'exerciseID' => 8,
            'hintCost' => 10,
            'hintHTML' => "Har du fastnat på den negativa biten? Det finns två sätt att \"göra\" negativa tal positiva. Om din parameter heter <tt>n</tt> 
            kan du ta <tt>-n</tt>. Exempelvis blir -(-5) lika med 5 (eftersom \"minus och minus blir plus\"). Det andra sättet är att multiplicera
            <tt>n</tt> med <tt>-1</tt>."
        ));
        Hint::create(array(
            'exerciseID' => 10,
            'hintCost' => 10,
            'hintHTML' => "Är den tomma strängen <code>\"\"</code> ett palindrom? Är ett ord med en bokstav ett palindrom?" 
        ));
        Hint::create(array(
            'exerciseID' => 10,
            'hintCost' => 5,
            'hintHTML' => "Vad händer om du anropar <code>middle()</code> med ett ord som är två bokstäver långt? Eller den tomma strängen?" 
        ));
        Hint::create(array(
            'exerciseID' => 10,
            'hintCost' => 15,
            'hintHTML' => "Försök nu att tänka rekursivt: Om första och sista bokstaven i ett ord är samma, när är ordet ett palindrom?" 
        ));
    	Hint::create(array(
            'exerciseID' => 10,
            'hintCost' => 15,
            'hintHTML' => "Ordet är ett palindrom om första och sista bokstaven är samma, och om mittendelen är ett palindrom. Vi har funktioner
            som kan ta reda på den första respektive sista bokstaven i ett ord, och vi har även en funktion som kan hitta mittendelen av ett ord..." 
        ));	
        Hint::create(array(
            'exerciseID' => 11,
            'hintCost' => 5,
            'hintHTML' => "Starttillståndet får du ju via parametern <tt>n</tt> så du behöver inte skapa någon ny variabel." 
        ));
        Hint::create(array(
            'exerciseID' => 11,
            'hintCost' => 5,
            'hintHTML' => "Villkoret ska vara att vi kör så länge <tt>x</tt> är större än eller lika med 0." 
        ));
        Hint::create(array(
            'exerciseID' => 12,
            'hintCost' => 5,
            'hintHTML' => "Du kan kontrollera om <tt>n</tt> är ett jämnt tal med villkoret <code>n % 2 === 0</code>." 
        ));
        Hint::create(array(
            'exerciseID' => 12,
            'hintCost' => 5,
            'hintHTML' => "Du behöver en loop som körs så länge <code>n != 1</code>." 
        ));
        Hint::create(array(
            'exerciseID' => 12,
            'hintCost' => 5,
            'hintHTML' => "Varje varv i loopen lägger du till <code>n + \",\"</code> i <tt>returnString</tt> innan du kontrollerar om det är jämnt eller udda." 
        ));
    }
}

?>