<?

class SectionTableSeeder extends Seeder {

	public function run()
    {
        DB::table('sections')->delete();

        /*
        Section::create(array(
            'sectionID' => 1,
            'lessonID' => 1,
            'orderInLesson' => 1,
            'contentsHTML' => '<p>Nu är det din tur att prova. Det här är den första övningen som jag kommer ge dig.</p>
            <p>Övningarna går till såhär att du får en del instruktioner som du ska följa och skriva kod efter. När du skrivit koden får du köra den och
            titta på resultatet i Utdatarutan.</p>
            <p>Under kodrutan ser du vilka krav lösningen måste uppfylla. Om du tycker att din lösning uppfyller kraven trycker du på knappen <span class="icon-ok"></span>.</p>
            <p>För den här övningen behöver du bara beräkna något och skriva ut resultatet, precis som du just har sett.</p>',
            'code' => 'print(5)',
            ));
        */
        
        Section::create(array(
        	'sectionID' => 100,
        	'lessonID' => 1,
        	'orderInLesson' => 1,
        	'contentsHTML' => '<p>Välkommen! Kul att du vill lära dig programmering. Hoppas att du sitter ner ordentligt, för jag har mycket att lära dig.</p>
            <p>Om du vill anteckna något jag har sagt, kan du öppna antecknings&shy;blocket med knappen <span class="icon-edit"></span> här nere.</p>
            <p>Kurserna här på <i>Kodknackaren</i> är indelade i lektioner, som i sin tur är indelade i avsnitt. Kicka på knappen 
            <span class="icon-right-outline"></span> för att fortsätta till nästa avsnitt.</p>',
            'beforeSectionLoadedEval' => '
                $("#section-middle").hide();
                $("#section-right").hide();
                $("#lesson-nr").hide();
                $("#lesson-name").hide();
                $("#lesson-progress-box").hide();
                $("#section-contents").hide();
                $("#knacke-small").hide();
                $("#previous-section-button").prop("disabled", true);
                $("#sections-div").hide();
                
                $("#knacke-big").show();
                $("#knacke-big").animate({left: 0, top: 0, opacity: 0}, 1000, function() {
                    $("#knacke-big").hide(); //otherwise will be invisible over buttons
                    $("#knacke-small").show(100, function() {
                        $("#lesson-nr").fadeIn(1000, function() {
                            $("#lesson-name").fadeIn(1000, function() {
                                $("#section-contents").fadeIn(1000, function() {
                                    $("#sections-div").fadeIn(1000, function() {
                                        $("#lesson-progress-box").fadeIn(1000, function() {
                                            setTimeout(
                                                function() { 
                                                    if (sectionController.currentSection === 0) {
                                                        $("#next-section-button").addClass("animated shake", 1000, function() { 
                                                           $("#next-section-button").removeClass("animated shake", 1000); 
                                                        });
                                                    } 
                                                }
                                            , 3000 );
                                        });
                                    });
                                });
                            });
                        });
                    });
                });
            '
        ));
        Section::create(array(
            'sectionID' => 101,
            'lessonID' => 1,
            'orderInLesson' => 2,
            'contentsHTML' => '<p>Fundera lite kring teknikprylarna du använder hemma. Du eller någon i familjen har säkert en mobiltelefon eller en iPad hemma, och du sitter just nu framför en dator.
            Vi kan till och med titta på saker som mikrovågnsugnar, tvättmaskiner, kaffebryggare...</p>
            <p>Alla dessa prylar fungerar för att någon har programmerat dem. Och du som programmerare har själv möjlighet att skapa saker som finns i prylarna
            från början. Nya spel till datorn, nya appar till mobilen... visst låter det spännande?</p>',
            'showImage' => 'gadgets.jpg',
        ));
        Section::create(array(
            'sectionID' => 102,
            'lessonID' => 1,
            'orderInLesson' => 3,
            'contentsHTML' => '<p>Programmering handlar om <i>att ge väldigt specifika instruktioner till en väldigt dum, men väldigt effektiv maskin</i>.</p>
            <p>Här är ett exempel. Låtsas att datorn är en maskin med fötter, och vi vill lära den att springa.</p>
            <ul>
            <li>För att lära den springa måste vi först lära den att börja gå.</li>
            <li>För att lära den att börja gå måste vi lära den att ta ett steg.</li>
            <li>För att lära den att ta ett steg måste vi säga till den att höja foten, flytta den framför den andra och sänka ner den.</li>
            </ul>',
            'showImage' => 'atat.jpg'
        ));
        Section::create(array(
            'sectionID' => 103,
            'lessonID' => 1,
            'orderInLesson' => 4,
            'contentsHTML' => '<p>Datorn förstår såklart inte svenska eller engelska, så vi måste använda oss av ett <strong>programmerings&shy;språk</strong>
            för att kunna prata med datorn.</p>
            <p>När man programmerar skriver man text i filer som kallas <strong>källkod</strong>. Beroende på vilket programmeringsspråk man använder
            måste man följa olika regler för vad man får lov att skriva, ungefär som grammatik i svenska eller engelska.</p>
            <p>Dessa regler kallas för <strong>syntax</strong>. Om syntaxen är giltig, kan datorn köra koden, men det är ingen garanti för att den förstår vad vi menar.</p>',
            'showImage' => 'programmer.jpg'
        ));
        Section::create(array(
            'sectionID' => 104,
            'lessonID' => 1,
            'orderInLesson' => 5,
            'contentsHTML' => '<p>Det finns fem typer av "grundinstruktioner" som datorn kan förstå utan att vi behöver vidare förklara dem. Dessa finns i nästan alla
            programmerings&shy;språk.</p>
            <p>Alla spel du nånsin spelat, alla appar du har använt, kan förklaras för datorn på ett lättare och lättare sätt så att du bara har kombinationer av dessa
            grundinstruktioner kvar!</p>
            <p>Vi ska titta på dessa grundinstruktioner i tur och ordning. Den första är en tråkig, men tyvärr viktig sådan: <i>vi kan få datorn att beräkna något</i>.</p>',
            'showImage' => 'math.jpg'
        ));
        Section::create(array(
            'sectionID' => 105,
            'lessonID' => 1,
            'orderInLesson' => 6,
            'contentsHTML' => '<p>I mittenrutan ser du vår fina programmerings&shy;modul. Det är här du kommer få göra dina programmeringsövningar framöver.</p>
            <p>Som jag sa kunde vi få datorn att beräkna något. Ta en titt på uttrycket i kodrutan och kör koden genom att trycka på <span class="icon-play green"></span>.</p>',
            'code' => '13 + 37',
            'afterSectionLoadedEval' => '
                $("#next-section-button").prop("disabled", true); 
                $("#run-code-button").on( "click", sectionController.nextSection );
                setTimeout(function() { 
                    if (sectionController.currentSection == 5) {
                        $("#editor").addClass("animated flash", 1000, function() { $("#editor").removeClass("animated pulse", 2000); });
                    }
                }, 
                3000 );
                setTimeout(function() { 
                    if (sectionController.currentSection == 5) {
                        $("#run-code-button").addClass("animated flash", 1000, function() { $("#run-code-button").removeClass("animated pulse", 2000); });
                    }
                }, 
                5000 );
            '
        ));
        Section::create(array(
            'sectionID' => 106,
            'lessonID' => 1,
            'orderInLesson' => 7,
            'contentsHTML' => '<p>Till höger ser du en panel märkt "Utdata", och det är här beräkningens resultat skulle ha dykt upp. Det verkar som om programmet har körts
            ...men vart har beräkningens resultat tagit vägen?</p>
            <p>(Tryck på <span class="icon-right-outline"></span> för att fortsätta)</p>',
            'code' => 'SAME',
            'afterSectionLoadedEval' => '
                setTimeout(function() { 
                    if (sectionController.currentSection === 7) {
                        $("#run-output").addClass("animated flash", 2000, function() { 
                            $("#run-output").removeClass("animated flash", 1000); 
                        })
                    }
                }, 3000 );
        '
        ));
        Section::create(array(
            'sectionID' => 107,
            'lessonID' => 1,
            'orderInLesson' => 8,
            'contentsHTML' => '<p>Svaret är att datorn har gjort beräkningen "i bakgrunden" men vi har inte sagt till den att vi vill få ut resultatet.<br/>
            För att få den att <strong>skriva ut</strong> resultatet (alltså visa det på skärmen) använder vi en instruktion som heter <code>print()</code>.</p>
            <p>Inuti parenteserna talar vi om vad det är vi vill skriva ut. Titta i kodrutan igen, där du ser att jag har omslutit beräkningen med en <code>print()</code>
            -instruktion. Klicka på <span class="icon-play green"></span> för att köra den nya koden.</p>',
            'code' => 'print(13 + 37)',
            'afterSectionLoadedEval' => '
                $("#next-section-button").prop("disabled", true);
                $("#run-code-button").on( "click", sectionController.nextSection );
             '
        ));
        Section::create(array(
            'sectionID' => 108,
            'lessonID' => 1,
            'orderInLesson' => 9,
            'contentsHTML' => '<p>Sedärja! Om du inte har ändrat på uträkningen som jag fyllde i från början ska du nu se att programmet har skrivit ut talet <tt>50</tt>, vilket
            är just summan av talen 13 och 37.</p>
            <p>Att kunna skriva ut något är den andra grundinstruktionen som du kan göra i de flesta programmeringsspråk.</p>
            <p>Ja, just det, jag sa att <i>programmet</i> har skrivit ut något. <i>Du har just skrivit ditt första program!</i><br/>
            Det här programmet gör kanske inte något häftigt just nu - det enda den gör är att det beräknar något och skriver ut resultatet.<br/>
            Men allt har ju sin början, och vi kan inte skapa mer avancerade spel och appar om vi inte kan grunderna.</p>',
            'code' => 'SAME',
        ));
        Section::create(array(
            'sectionID' => 109,
            'lessonID' => 1,
            'orderInLesson' => 10,
            'contentsHTML' => '<p>Nu är det din tur att prova. Det här är den första övningen som jag kommer ge dig.</p>
            <p>Övningarna går till så att du får en del instruktioner som du ska följa och skriva kod efter. När du skrivit koden får du köra den och
            titta på resultatet i Utdatarutan.</p>
            <p>Under kodrutan ser du vilka krav lösningen måste uppfylla. Om du tycker att din lösning uppfyller kraven trycker du på knappen <span class="icon-ok"></span>.</p>
            <p>För den här övningen behöver du bara beräkna något och skriva ut resultatet, precis som du just har sett.</p>',
            'code' => 'EMPTY',
        ));
        Section::create(array(
            'sectionID' => 110,
            'lessonID' => 1,
            'orderInLesson' => 11,
            'contentsHTML' => '<p>Nu kanske du är frestad att prova skriva ut ditt namn inom parenteserna istället för ett tal. Vad händer om vi kör den här koden?</p>
            <p>(Du kan ersätta <tt>Robban</tt> med ditt egna namn eller någon annan text om du vill.)</p>',
            'code' => 'print(Robban)',
            'afterSectionLoadedEval' => '
                $("#next-section-button").prop("disabled", true);
                $("#run-code-button").on( "click", sectionController.nextSection );'
        ));
        Section::create(array(
            'sectionID' => 111,
            'lessonID' => 1,
            'orderInLesson' => 12,
            'contentsHTML' => '<p>Ajdå, det där gick inte så bra, eller? Den <span class="red">röda</span> texten talar om att programmet har stött på ett fel under tiden som det det kördes,
            alltså ett <strong>körtidsfel</strong>. Vi kommer i ett senare kapitel titta närmare på vad detta betyder.</p>
            Vi ska senare få reda på vad det här meddelandet betyder.</p>',
            'code' => 'SAME',
        ));
        Section::create(array(
            'sectionID' => 112,
            'lessonID' => 1,
            'orderInLesson' => 13,
            'contentsHTML' => '<p>Lösningen är att omsluta namnet inom citattecken. Såhär:</p>',
            'code' => 'print("Robban")',
            'afterSectionLoadedEval' => '
                $("#next-section-button").prop("disabled", true);
                $("#run-code-button").on( "click", sectionController.nextSection );'
        ));
        Section::create(array(
            'sectionID' => 113,
            'lessonID' => 1,
            'orderInLesson' => 14,
            'contentsHTML' => '<p>Jag nämnde tidigare att vi använder oss av olika programmeringsspråk för att kunna prata med datorn.<br/>
            I den här kursen använder vi en variant av ett språk som heter <strong>Javascript</strong>.</p>
            <p>Det finns ett annat programmeringsspråk som heter Java, men detta är <i>helt annorlunda</i> än Javascript.</p>
            <p>Javascript är ganska enkelt att lära sig som nybörjare men vi kan ändå göra mycket med det, som att rita och ändra på innehållet i en
            hemsida. Faktum är att hela den här läromodulen som du ser framför dig är skapad i Javascript!</p>',
            'code' => 'SAME'
        ));
        Section::create(array(
            'sectionID' => 114,
            'lessonID' => 1,
            'orderInLesson' => 15,
            'contentsHTML' => '<p>Det första programmerare brukar göra när de lär sig ett nytt programmeringsspråk är att de skriver det minsta
            möjliga programmet som faktiskt gör något - så som att skriva ut text till skärmen. Detta är precis vad du har gjort i de föregående
            avsnitten.</p>
            <p>Av tradition brukar programmerare skriva ut texten <tt>Hello, world!</tt> som deras första program, så dessa simpla program brukar
            kallas för <strong>Hello, world-program</strong>.</p>',
            'code' => 'print("Hello, world!")'
        ));
        Section::create(array(
            'sectionID' => 115,
            'lessonID' => 1,
            'orderInLesson' => 16,
            'contentsHTML' => '
            <p>Innan vi avslutar den här första lektionen måste jag nämna några saker till om utskrifter:</p>
            <p>Om vi skriver två utskrifter efter varandra förväntar vi oss att utskrifterna hamnar på nya rader, eller?</p>',
            'code' => 'print("rad 1")
print("borde vara rad 2?")',
            'afterSectionLoadedEval' => '
                $("#next-section-button").prop("disabled", true);
                $("#run-code-button").on( "click", sectionController.nextSection );'
        ));
        Section::create(array(
            'sectionID' => 116,
            'lessonID' => 1,
            'orderInLesson' => 17,
            'contentsHTML' => '
            <p><code>print()</code> lägger alla utskrifter efter varandra, så det här var inte vad vi ville.</p>
            <p>Vi fixar detta genom att använda oss av en annan funktion som heter <code>println()</code>. <tt>ln</tt>
            står för <i>line break</i>, alltså radbrytning.</p>
            <p>När vi kör en <code>println()</code>-funktion skapas en radbrytning efter den senaste utskriften så att
            nästa utskrift hamnar på en ny rad.</p>',
            'code' => 'println("rad 1")
print("rad 2")',
            'afterSectionLoadedEval' => '
                $("#next-section-button").prop("disabled", true);
                $("#run-code-button").on( "click", sectionController.nextSection );'
        ));
        Section::create(array(
            'sectionID' => 117,
            'lessonID' => 1,
            'orderInLesson' => 18,
            'contentsHTML' => '
            <p>Sådär, det ser bättre ut.</p>
            <p>Även om de flesta programmeringsspråk har <code>print()</code>-funktioner är dessa inte standard i Javascript.</p>
            <p>Däremot innehåller Javascript en kul funktion, <code>alert()</code> som skapar en dialogruta för att fånga användarens uppmärksamhet.</p>',
            'code' => 'alert("Hallå där!")',
            'afterSectionLoadedEval' => '
                $("#next-section-button").prop("disabled", true);
                $("#run-code-button").on( "click", sectionController.nextSection );'
        ));
        Section::create(array(
            'sectionID' => 118,
            'lessonID' => 1,
            'orderInLesson' => 19,
            'contentsHTML' => '
            <p><code>print()</code>-satser i Javascript, som i de flesta satser vi ska få se, struntar i eventuella mellanslag om de inte står inom
            citattecken. Ta en titt på satserna som står i kodmodulen. Alla tre funkar lika fint.</p>
            <p>När du programmerar kan du använda den stil som passar dig bäst. Vill du ha kompakt, men något mer oläsbar kod - välj den första
            stilen.<br/>
            Vill du hellre ha något mer läsbart, men som tar mer plats, välj någon av de andra stilarna.</p>',
            'code' => 'println(1+1)
println(1 + 1)
println( 1 + 1 )',
        ));
        Section::create(array(
            'sectionID' => 119,
            'lessonID' => 1,
            'orderInLesson' => 20,
            'contentsHTML' => '
            <p>När det gäller matten finns det tre saker jag måste nämna också. Den ena är att det finns fyra grundläggande <strong>operationer</strong> (beräkningstyper) vi kan göra:</p>
            <ul>
                <li><code>+</code> för addition,</li>
                <li><code>-</code> för subtraktion,</li>
                <li><code>*</code> för multiplikation,</li>
                <li>och <code>/</code> för divsion.</li>
            </ul>
            <p>Tecknen som symboliserar en beräkning (<code>+</code>, <code>-</code>, <code>*</code> och <code>/</code>) kallas med ett finare ord för
            <strong>operatorer</strong>. Talen som de utför beräkningarna med kallas för <strong>operander</strong>.</p>
            <p><strong>OBS:</strong> Det finns en operator <code>^</code> i Javascript, men detta betyder inte "upphöjt med"
            utan något helt annat.<br/>
            Det finns också en operator <code>%</code>, som inte har något med procent att göra. Vi återkommer till denna senare.</p>',
            'code' => 'SAME',
        ));
        Section::create(array(
            'sectionID' => 120,
            'lessonID' => 1,
            'orderInLesson' => 21,
            'contentsHTML' => '
            <p>Nästa sak är att precis som i vanlig matte kan vi använda oss av parenteser för att ändra på ordningen som saker och ting beräknas i, eller <strong>prioritetsordningen</strong>.</p>
            <p><i>PEMDAS</i> är en bra tumregel för att komma ihåg prioriteringsordningen:</p>
            <ul>
                <li>Först beräknas <u>P</u>ar<u>e</u>nteser</li>
                <li>Därefter beräknas <u>M</u>ultiplikationer och <u>D</u>ivisioner,</li>
                <li>och slutligen <u>A</u>dditioner och <u>S</u>ubtraktioner.</li>
                <li>Om två delar av ett matematiskt uttryck har samma prioritet beräknas det från vänster till höger.</li>
            </ul>
            <p>Ta en titt på uttrycken som står i kodmodulen. Vad tror du skrivs ut?</p>',
            'code' => 'println( 1-2+3 )
println( 1-2*3 )
println( 3*5+6 )
println( 3*(5+6) )',
        ));
       Section::create(array(
            'sectionID' => 121,
            'lessonID' => 1,
            'orderInLesson' => 22,
            'contentsHTML' => '
            <p>På svenska använder vi kommatecken för att avskilja decimalerna i ett decimaltal. Javascript följer dock den amerikanska standarden med decimalpunkt istället.</p>
            <p>Du får dock inget körfel för att ha använt dig av kommatecken eftersom de också har en viss betydelse för Javascript. När man programmerar gäller det att hålla tungan rätt i mun!</p>',
            'code' => 'print( 1.3 * 3.7 )',
            'afterSectionLoadedEval' => '
                $("#next-section-button").prop("disabled", true);
                $("#run-code-button").on( "click", sectionController.nextSection );'
        ));
        Section::create(array(
            'sectionID' => 122,
            'lessonID' => 1,
            'orderInLesson' => 23,
            'contentsHTML' => '
            <p>Om du körde koden från det förra avsnittet har du nu fått en konstig utskrift. 1,3 gånger 3,7 ska ju bli exakt 4,81. Varför skriver datorn ut
            <tt>4,810000000000005</tt>?</p>
            <p>Det visar sig att datorn är inte duktig på att beräkna vissa decimaltal. I de fallen kommer vi en bit över eller under det egentliga resultatet.
            Tyvärr finns det inget enkelt sätt att komma runt detta på i Javascript.</p> ',
            'code' => 'SAME',
        ));
         Section::create(array(
            'sectionID' => 123,
            'lessonID' => 1,
            'orderInLesson' => 24,
            'contentsHTML' => '<p>Till sist vill jag prata lite om <span class="definition" title="Reglerna i ett språk som talar om ordningen på &quot;orden&quot; och hur grammatiken (strukturen på programmet) ska se ut."">
            syntaxen</span>. Minns du vad det ordet betydde? Håll muspekaren över ord som är
            understrukna med prickar för att få en påminnelse om deras betydelser.</p>
            <p>Kodmodulen här på sidan har möjlighet att kolla så att syntaxen stämmer redan innan du har kört programmet. När du ser en liten röd ruta med
            ett kryss på betyder det att du har ett syntaxfel. Du måste fixa alla syntaxfel innan du kan köra program här på Kodknackaren.<br/>
            Tyvärr är alla felmeddelanden just nu på engelska.</p>
            <p>När du försöker lösa syntaxfelen är det viktigt att du löser det översta felet först, eftersom Javascript-tolken lätt blir förvirrad
            med koden som kommer senare. I exemplet till höger har jag glömt det avslutande citattecknet. Tolken varnar för ett fel på första raden och två
            fel på nästa rad.</p>
            ',
            'code' => 'println("Hallå
)'
        ));
         Section::create(array(
            'sectionID' => 124,
            'lessonID' => 1,
            'orderInLesson' => 25,
            'contentsHTML' => '<p>Genom att bara lägga till ett citattecken försvann alla tre felen automagiskt. Även om strukturen av den här
            <code>print()</code>-satsen ser konstig ut är det fortfarande ett giltigt program eftersom mellanslagen ju inte spelade någon roll.</p>
            ',
            'code' => 'println("Hallå"
)'
        ));
        Section::create(array(
            'sectionID' => 125,
            'lessonID' => 1,
            'orderInLesson' => 26,
            'contentsHTML' => '<p>Du kanske har lagt märke till att det som återstod var ett litet kursivt <i>i</i>, som betyder <i>information</i>.
            Det här talar om att det finns saker som går att förbättra i programmets syntax, men det går att köra programmet som det är.</p>
            <p>I de fallen vi har tittat på hittills handlar det om att tolken vill att vi ska avsluta raden med ett semikolon <code>;</code>.
            I mångra programmeringsspråk måste man avsluta vissa rader med ett semikolon för att tala om var en sats slutar och nästa börjar, om man
            vill skriva flera på samma rad.</p>
            <p>Det är inte rekommenderat att du skriver som i exemplet till höger. Däremot är det en god vana att alltid avsluta sina satser med semikolon.</p>
            ',
            'code' => 'println("En rad utan avslutande semikolon.")
println(1); print(2);'
        ));
        Section::create(array(
            'sectionID' => 126,
            'lessonID' => 1,
            'orderInLesson' => 27,
            'contentsHTML' => '
            <p>Här kommer nästa övning. Du ska skriva ett program som skriver ut ett valfritt datum på två sätt:</p>

            <ul>
                <li>Först ska du skriva ut datumet i den svenska standarden <i>dag/månad år</i></li>
                <li>Sedan ska du skriva ut datumet i den internationella standarden <i>ÅÅÅÅ-MM-DD</i></li>
            </ul>

            <p>Exempel:<br/>
            <tt>25/1 2013</tt><br/>
            <tt>2013-01-25</tt><br/>
            (Notera nollan i det andra exemplet.)</p>

            <p>(Dagens datum kan du hitta om du klickar på klockan i datorns startfält (Windows) eller menyraden (Mac OS X).</p>
            ',
            'code' => 'EMPTY',
        ));
        Section::create(array(
            'sectionID' => 127,
            'lessonID' => 1,
            'orderInLesson' => 28,
            'contentsHTML' => '<p>Då var du klar med din första programmerings&shy;lektion! Hur känns det?<br/>
            Du har fått veta vad programmering är och några exempel på hur riktig kod kan se ut.</p> 
            <p>I nästa lektion ska vi titta på några exempel på hur vi kan använda oss av programmering. Vi kan nämligen använda våra instruktioner
            till att få datorn att måla!</p>',
            'showImage' => 'knacke_thumbsup.png'
        ));
        Section::create(array(
            'sectionID' => 200,
            'lessonID' => 2,
            'orderInLesson' => 1,
            'contentsHTML' => '<p>Välkommen till lektion två. I den här lektionen ska vi skoja till det lite genom att få datorn att måla
            med hjälp av några enkla kommandon. Vi ska titta lite på hur datorn ser på former och färger.</p>',
            'showImage' => 'computerartist.gif'
        ));
        Section::create(array(
            'sectionID' => 201,
            'lessonID' => 2,
            'orderInLesson' => 2,
            'contentsHTML' => '<p>På webben brukar man skapa hemsidor med hjälp av ett språk som heter <strong>HTML</strong> (<i>Hypertext Markup Language</i>).
            Det är inget programmeringsspråk i sig, men tillsammans med Javascript kan man få intressanta resultat.<br/>
            Javascript är det som gör sidorna <i>dynamiska</i>, alltså att vi kan få sidorna att bete sig olika för varje gång vi besöker dem och beroende på vad
            vi gör med dem. Kodknackaren är ett ypperligt exempel på detta.</p>
            <p>I den senaste versionen av HTML tillkom ett så kallat Canvas-element (canvas betyder målarduk). En Canvas är inget annat än ett område på sidan som
            med du med hjälp av Javascript kan rita vad du vill på.</p>',
            'showImage' => 'computerartist.gif',
        ));
        Section::create(array(
            'sectionID' => 202,
            'lessonID' => 2,
            'orderInLesson' => 3,
            'contentsHTML' => '<p>Här är kodmodulen igen. Vi har fixat en Canvas som vi kan leka med. Du hittar den om du klickar på fliken Rityta.</p>',
            'code' => 'EMPTY',
            'afterSectionLoadedEval' => '
                $("#canvas-li").on("click", sectionController.nextSection);
                $("#next-section-button").prop("disabled", true);                
                setTimeout(function() { 
                    if (sectionController.currentSection === 2) {
                        $("#canvas-li").addClass("animated flash", 2000, function() { 
                            $("#canvas-li").removeClass("animated flash", 1000); 
                        })
                    }
                }, 3000 );
            '
        ));
        Section::create(array(
            'sectionID' => 203,
            'lessonID' => 2,
            'orderInLesson' => 4,
            'contentsHTML' => '<p>När man skapar hemsidor i HTML kan man få en Canvas med lite kod som talar om dess namn, bredd och höjd. Lyckligtvis
            behöver du inte bry dig om detta i kodmodulen eftersom vi bara fokuserar på Javascript-biten här.</p>
            <p>Canvasen här på ritytemodulen heter <code>myCanvas</code>. Det spelar ingen roll vad den heter egentligen, men skulle vi haft två Canvas-element
            på sidan måste datorn veta till vilken av dem som den ska rita på.</p>
            <p><code>myCanvas</code> har exakt bredden 1000 pixlar (bildpunkter). Du ser dock bara en bit av bredden, så du kan justera hur stor del av den du kan se 
            genom att dra i den streckade linjen. Dessutom är den 1000 pixlar hög.</p>',
            'beforeSectionLoadedEval' => '',
            'code' => 'EMPTY',
        ));

        Section::create(array(
            'sectionID' => 204,
            'lessonID' => 2,
            'orderInLesson' => 5,
            'contentsHTML' => '<p>Innan vi kan börja skicka instruktioner till <code>myCanvas</code> ska jag passa på att nämna lite om dess koordinatsystem.</p>
            <p>Du kanske minns från matten att vi kan använda oss av <tt>x</tt>- och <tt>y</tt>-värden för att tala om var någonting befinner sig på en graf.
            På samma sätt kan vi tala om för datorn var den ska börja och sluta rita i en Canvas.</p>
            <p>Det finns dock ett par små krux: i matten är origo, alltså punkten (0, 0), i "mitten" av grafen, men för en Canvas är det det övra vänstra 
            hörnet som gäller.<br/>
            Detta innebär också att positiva <tt>y</tt>-värden är "neråt" i Canvasen.</p>',
            'showimage' => 'coordinates.png',
        ));

        Section::create(array(
            'sectionID' => 205,
            'lessonID' => 2,
            'orderInLesson' => 6,
            'contentsHTML' => '<p>Alla instruktioner som vi kan skicka till <code>myCanvas</code> har följande format:</p>
            <p><code>myCanvas.<strong>instruktion</strong>( 
                    extra information 1, 
                    extra information 2, 
                    ...)</code></p>
            <p>Verkar det konstigt? Vad menar jag med "extra information"? Jo, om du ber mig till exempel rita en rektangel exakt måste du ge mig fyra 
            saker; antingen ger du mig koordinaterna för det övre vänstra hörnet på rektangeln (alternativ 1 i bilden) och koordinaterna för det nedra högra hörnet, eller så
            ger du mig koordinaterna för det övre vänstra hörnet samt en bredd och höjd på rektangeln (alternativ 2).</p>
            <p>Oavsett vilket sätt vi väljer kan vi inte bara tala om för datorn att "rita en rektangel" - den behöver mer information än så.</p>',
            'showImage' => 'rectangles.png',
        ));
        Section::create(array(
            'sectionID' => 206,
            'lessonID' => 2,
            'orderInLesson' => 7,
            'contentsHTML' => '
            <p>Canvas har en instruktion <code>strokeRect()</code> som skapar en rektangel åt oss. Här har man valt det andra sättet jag nämnde, att man
            börjar med <tt>x</tt>- och <tt>y</tt>-koordinater för det övre vänstra hörnet och sedan anger bredden och höjden på rektangeln.</p>
            <p>I kodmodulen ser du ett exempel på hur detta kan se ut. I det här fallet har jag skickat den
            "extra informationen" att rektangeln ska börja i punkten (10, 10), och att den ska vara 200 pixlar bred och 100
            pixlar hög.</p>
            <p>Kör koden för att se vad som händer.</p>',
            'code' => 'myCanvas.strokeRect(10, 10, 200, 100);',
            'afterSectionLoadedEval' => '
                $("#next-section-button").prop("disabled", true);
                $("#run-code-button").on( "click", function() { $("#next-section-button").prop("disabled", false); } );'
        ));

        Section::create(array(
            'sectionID' => 207,
            'lessonID' => 2,
            'orderInLesson' => 8,
            'contentsHTML' => '<p>Om vi byter ut <code>strokeRect</code> mot <code>fillRect</code> fyller vi rektangeln istället:</p>',
            'code' => 'myCanvas.fillRect(10, 10, 200, 100);',
            'afterSectionLoadedEval' => '
                $("#next-section-button").prop("disabled", true);
                $("#run-code-button").on( "click", function() { $("#next-section-button").prop("disabled", false); } );'
        ));

        Section::create(array(
            'sectionID' => 208,
            'lessonID' => 2,
            'orderInLesson' => 9,
            'contentsHTML' => '<p>Övning: Vad ska stå på informationstalen för att fylla hela Canvasen?</p>',
            'code' => 'myCanvas.fillRect( , , , );',
        ));

        /*
        Section::create(array(
            'sectionID' => 209,
            'lessonID' => 2,
            'orderInLesson' => 8,
            'contentsHTML' => '<p>Tänk på att du bör gå tillbaka om </p>',
            'code' => 'myCanvas.fillRect( , , , );',
        ));
        */

        Section::create(array(
            'sectionID' => 210,
            'lessonID' => 2,
            'orderInLesson' => 10,
            'contentsHTML' => '<p>Det visar sig tyvärr att vanliga linjer är krångligare att göra än rektanglar i Canvas.<br/>
            För att rita en linje behöver vi nämligen hela fyra rader kod!</p>
            <p>Du ser dessa fyra raderna i kodrutan. Jag ska försöka förklara vad de gör:</p>
            <ul>
                <li><code>beginPath()</code> skapar en "väg" av punkter som vi kan binda samman.</li>
                <li><code>moveTo()</code> flyttar en osynlig markör till de angivna koordinaterna. Detta blir vår startpunkt för linjen.</li>
                <li><code>lineTo()</code> lägger till en punkt med de angivna koordinaterna till vår väg. Detta blir vår slutpunkt.</li>
                <li><code>stroke()</code> är raden som faktiskt ritar ut linjen (genom att knyta samman linjerna på vår väg).</li>
            </ul>
            ',
            'code' => 'myCanvas.beginPath();
myCanvas.moveTo(50,50);
myCanvas.lineTo(150,150);
myCanvas.stroke();',
            'afterSectionLoadedEval' => '
                $("#next-section-button").prop("disabled", true);
                $("#run-code-button").on( "click", function() { $("#next-section-button").prop("disabled", false); } );'
        ));
        Section::create(array(
            'sectionID' => 211,
            'lessonID' => 2,
            'orderInLesson' => 11,
            'contentsHTML' => '<p>För att rita fler linjer som är sammanknutna behöver vi bara upprepa vår <code>lineTo()</code>-instruktion.<br/>
            Följande kod ritar en L-formad figur:</p>',
            'code' => 'myCanvas.beginPath();       // skapa en ny väg
myCanvas.moveTo(20,20);     // skapa en startpunkt
myCanvas.lineTo(20,100);    // lägg till en ny punkt till vägen
myCanvas.lineTo(70,100);    // lägg till en ny punkt till vägen
myCanvas.stroke();          // knyt samman alla punkterna på vägen'
        ));
        Section::create(array(
            'sectionID' => 212,
            'lessonID' => 2,
            'orderInLesson' => 12,
            'contentsHTML' => '<p>La du märke till att jag blandade svenska i koden i det föregående avsnittet? Hur kommer det sig att interpretatorn 
            inte klagade på att det var ogiltig kod?</p>
            <p>Svaret är att jag använde mig av dubbla snedstreck (<code>//</code>) innan den svenska texten. Detta kallas för en <strong>kommentar</strong>.</p>
            <p>Datorn struntar i all text som står efter kommentartecken, så vi kan använda dem för att beskriva vår kod.<br/>
            Detta är ett bra sätt att påminna dig om vad du har gjort, så när tittar på din kod efter en vecka, månad eller år vet du precis vad koden gör.
            Eller varför inte låta den förklara koden för någon annan programmerare?</p>
            <p>Kommentarer finns i två smaker, som du kan se i kodrutan till höger.</p>',
            'code' => 'myCanvas.beginPath(); // Den här kommentaren sträcker sig bara till radens slut

/*
    Det här är en kommentar som sträcker sig från det inledande /* 
    till det avslutande * / (utan mellanslag mellan * och /).
    Den här kommentarstypen används oftast för längre, mer 
    beskrivande  texter som talar om vad koden gör utan att man 
    behöver titta i koden för specifika detaljer. 
    Oftast brukar man  skriva kommentarerna på engelska.
Exempelvis:

The following code draws an L-shaped figure with the
coordinates (20, 20), (20, 100) and (70, 100).
*/
myCanvas.beginPath();       // skapa en ny väg
myCanvas.moveTo(20,20);     // skapa en startpunkt
myCanvas.lineTo(20,100);    // lägg till en ny punkt till vägen
myCanvas.lineTo(70,100);    // lägg till en ny punkt till vägen
myCanvas.stroke();          // knyt samman alla punkterna på vägen och dra linje
'
        ));
        Section::create(array(
            'sectionID' => 213,
            'lessonID' => 2,
            'orderInLesson' => 13,
            'contentsHTML' => '<p>Övning: Vad ska stå på rad 5 för att vi ska få en triangel av det hela?</p>',
            'code' => 'myCanvas.beginPath();       // skapa en ny väg
myCanvas.moveTo(20,20);     // skapa en startpunkt
myCanvas.lineTo(20,100);    // lägg till en ny punkt till vägen
myCanvas.lineTo(70,100);    // lägg till en ny punkt till vägen
// din kod här
myCanvas.stroke();          // knyt samman alla punkterna på vägen och dra linje
'
        ));
        Section::create(array(
            'sectionID' => 214,
            'lessonID' => 2,
            'orderInLesson' => 14,
            'contentsHTML' => '<p>Om vi byter ut instruktionen <code>stroke()</code> mot <code>fill()</code>
            fyller vi allt utrymme som begränsas av vår väg. Med andra ord får vi en ifylld triangel:</p>',
            'code' => 'myCanvas.beginPath();  
myCanvas.moveTo(20,20);  
myCanvas.lineTo(20,100); 
myCanvas.lineTo(70,100); 
myCanvas.lineTo(20,20);
myCanvas.fill();'
        ));
        Section::create(array(
            'sectionID' => 215,
            'lessonID' => 2,
            'orderInLesson' => 15,
            'contentsHTML' => '<p>Om du vill skapa flera linjer som inte är sammanbundna måste du stänga den gamla. Detta gör du
            antingen genom instruktionen <code>closePath()</code> eller skapa en ny väg med <code>beginPath()</code>,
            det vill säga kalla på <code>beginPath()</code> igen:</p>',
            'code' => 'myCanvas.beginPath(); 
myCanvas.moveTo(0,75);
myCanvas.lineTo(250,75);
myCanvas.stroke();
myCanvas.closePath(); // behövs ej här, men kan vara bra

myCanvas.beginPath();
myCanvas.moveTo(50,0);
myCanvas.lineTo(150,130); 
myCanvas.stroke();'
        ));
        Section::create(array(
            'sectionID' => 216,
            'lessonID' => 2,
            'orderInLesson' => 16,
            'contentsHTML' => '<p>Med hjälp av något som heter <code>lineWidth</code> kan vi ange tjockleken på linjerna. Det här är
            ingen instruktion utan ett värde som talar om att alla nästkommande linjer (när <code>stroke()</code> körs) får den 
            tjockleken som vi sätter.<br/>
            Ta en titt på koden för att se hur vi sätter värdet.</p>',
            'code' => 'myCanvas.beginPath(); 
myCanvas.moveTo(0,75);
myCanvas.lineTo(250,75);
myCanvas.lineWidth = 5;
myCanvas.stroke();

myCanvas.beginPath();
myCanvas.moveTo(50,0);
myCanvas.lineTo(150,130); 
myCanvas.lineWidth = 3;
myCanvas.stroke();'
        ));
        Section::create(array(
            'sectionID' => 217,
            'lessonID' => 2,
            'orderInLesson' => 17,
            'contentsHTML' => '<p>Nu när vi har program som sträcker sig över flera rader kod, kan det vara bra att titta till
            i utdatafönstret så att vi inte har fått några fel. Även om vi tror att resultatet ser rätt ut är det inte säkert att
            vi inte förvirrat datorn någonstans.</p>
            <p>Tyvärr kan vår kodtolk för närvarande inte avgöra vilken rad felet uppstod på, bara vad det var för typ av fel.
            I sådana fall får du dela upp programmet i bitar som du vet fungerar, och sedan lägga till en rad med kod i taget tills du hittar
            felet.<br/>
            Vi kommer titta på bättre felsökningstekniker senare.</p> ',
            'code' => 'myCanvas.beginPath(); 
myCanvas.moveTo(0,75);
myCanvas.lineTo(250,75); 
myCanvas.lineWidth = 5; 
myCanvas.stroke();

myCanvas.beginPath();
myCanvas.moveTo(50,0);
myCanvas.lineToo(150,130); // <-- stavfel
myCanvas.lineWidth = 3;
myCanvas.stroke();'
        ));
        Section::create(array(
            'sectionID' => 218,
            'lessonID' => 2,
            'orderInLesson' => 18,
            'contentsHTML' => '<p>Att rita en cirkel är också lite krångligt. Vi börjar och slutar med samma sätt som vi gjorde linjerna på,
            det vill säga <code>beginPath()</code> och <code>stroke()</code>. Däremellan kommer en ny instruktion, <code>arc()</code>.</p>
            <p><code>arc()</code> ritar en väg i form av en cirkelbåge (vilket är vad arc betyder). För att den ska kunna göra sitt job behöver
            den inte mindre än 5 extra bitar information.</p>
            <p>I tur och ordning är dessa x- och y-koordinaterna för mittpunkten, sedan radien, sedan mellan vilka vinklar som bågen ska vara.</p>
            <p>En cirkel är en cirkelbåge mellan 0 och 360 grader. Dock räknar datorn inte med grader utan något som heter radianer. Du kommer få läsa
            mer om detta i matten på gymnasiet. Det enda du behöver veta är att den sista bitarna information ska vara <code>0</code> och 
            <code>2 * Math.PI</code> om du vill ha en hel cirkel.</p>',
            'code' => 'myCanvas.beginPath(); 
// skapar en cirkel med mittkoordinaterna (50, 50) och radien 25 pixlar
myCanvas.arc(50, 50, 25, 0, 2 * Math.PI); 
myCanvas.lineWidth = 5; 
myCanvas.stroke();'
        ));
        Section::create(array(
            'sectionID' => 219,
            'lessonID' => 2,
            'orderInLesson' => 19,
            'contentsHTML' => '<p>Vi kan få datorn att "rita" ut text med teckensnitt som vi har installerade på datorn. Detta gör vi i två steg:</p>
            <p>Först sätter vi värdet på <code>myCanvas.font</code> till en textsträng som innehåller storleken och namnet på
            teckensnittet. Namnet måste stavas exakt så som det är installerat på datorn.</p>
            <p>Därefter anropar vi instruktionen <code>fillText()</code> med det som vi vill skriva ut samt koordinaterna för det <strong>nedre vänstra hörnet</strong>
            av den första bokstaven. Vi kan även skicka med ett tredje tal som anger den maximala bredden på texten. Detta får effekten att den "trycker ihop"
            text när den inte får plats på bredden.</p>
            <p>Som du kanske har gissat finns det även en <code>strokeText()</code>-instruktion som ritar ut konturerna på texten.</p>',
            'code' => 'myCanvas.font = "20px Arial";
myCanvas.fillText("Hallå där!", 50, 50);

myCanvas.font = "25px Verdana";
myCanvas.fillText("Den här texten blir ihopknölad", 50, 100, 120);

myCanvas.font = "30px Comic Sans MS";
myCanvas.strokeText("Konturerad text", 50, 200);'
        ));
        Section::create(array(
            'sectionID' => 220,
            'lessonID' => 2,
            'orderInLesson' => 20,
            'contentsHTML' => '<p>För att sätta lite färg på tillvaron behöver jag nämna lite om ...färger.</p>
            <p>Det finns många olika sätt man kan representera färger på för datorn. I grund och botten handlar det om att varje färg - eller rättare sagt
            varje nyans - har en viss sifferkod.</p>',
            'showImage' => 'color_wheel_pencils.jpg'
        ));
        Section::create(array(
            'sectionID' => 221,
            'lessonID' => 2,
            'orderInLesson' => 21,
            'contentsHTML' => '<p>I HTML har man gjort det något lättare för sig genom att ge vardagliga namn åt 140 färger, som till exempel
            <code>red</code> för röd, <code>khaki</code> för <font color="khaki">khakibrun</font> och så vidare. En komplett lista på alla färger som finns definierade med namn
            kan du till exempel hitta <a href="http://www.w3schools.com/cssref/css_colornames.asp" target="_blank">här</a>.</p>
            <p>För att sätta färger kan vi ange dem antingen som fyllnadsfärg (<code>fillStyle</code>) eller konturfärg (<code>strokeStyle</code>). Vi kan
            också kombinera dessa med <code>fillText()</code> eller <code>fillRect()</code> och <code>strokeRect()</code> eller <code>strokeText()</code> för 
            snygga skuggor på rektanglar respektive texter.</p>
            <p>Kom ihåg att dessa är värden så vi sätter dem med samma <span class="definition" title="Reglerna i ett språk som talar om ordningen på &quot;orden&quot; och hur grammatiken (strukturen på programmet) ska se ut."">syntax</span> 
            som vi använde för att sätta tjockleken på våra linjer. Och glöm inte att dessa är textsträngar så vi behöver ha med citattecken.</p>',
            'code' => 'myCanvas.strokeStyle = "Tomato";
myCanvas.fillStyle = "Thistle";
myCanvas.font = "40px Arial";
myCanvas.strokeText("Hallå där!", 50, 50);
myCanvas.fillText("Hallå där!", 48, 48);'
        ));
        Section::create(array(
            'sectionID' => 222,
            'lessonID' => 2,
            'orderInLesson' => 22,
            'contentsHTML' => '<p>Om vi vill ha en exakt nyans kan vi använda oss av en så kallad RGB-trippel. RGB står för <i>red, green, blue</i> och
            talar alltså om hur stora andelar rött, grönt och blått vi ska blanda för att få den önskade färgen.</p>
            <p>Dessa värden går från 0-255, där 255 är alltså maximalt värde för färgerna. Svart är avsaknad av färg och representeras av trippeln
            (0, 0, 0). Vitt är en blandning av alla färger, så den har trippeln (255, 255, 255).</p>
            <p>För att sätta färger med en RGB-trippel använder vi strängen <code>"rgb( , , )"</code> som du ser i kodmodulen.</p>',
            'code' => 'myCanvas.fillStyle = "rgb(200, 100, 0)";
myCanvas.fillRect(50,50,200,200);'
        ));
        Section::create(array(
            'sectionID' => 223,
            'lessonID' => 2,
            'orderInLesson' => 23,
            'contentsHTML' => '<p>Man kan också använda sig av RGBA, där A:et står för "alpha". Alpha betyder i det här sammanhanget något i stil med 
            "ogenomskinlighet". Värdet är ett decimaltal mellan 0 och 1. Ju lägre värdet är, desto mer "genomskinlig" är färgen.</p>',
            'code' => 'myCanvas.fillStyle = "rgb(200,0,0)";
myCanvas.fillRect(10, 10, 55, 50);

myCanvas.fillStyle = "rgba(0, 0, 200, 0.5)";
myCanvas.fillRect(30, 30, 55, 50);'
        ));
        Section::create(array(
            'sectionID' => 224,
            'lessonID' => 2,
            'orderInLesson' => 24,
            'contentsHTML' => '<p>Ytterliggare ett sätt att ange färger på är RGB med så kallad hexadecimal kod. Detta sätt används oftast när man sätter
            färger på hemsidor. </p>
            <p>Det här är inget som du behöver bry dig om just nu, men här kommer ett försök till en förklaring:<br/>
            Principen är den samma som i RGB, men istället för tal mellan 0 och 255 skriver man detta på ett "datormatte"sätt där talen går 0-9, sedan
            A, B, C, D, E, F. Talet 10 för datorn är det samma som 16 för oss på vårt "normala" räknesätt. Talet 255 motsvaras altså av FF.</p>
            <p><a href="http://www.w3schools.com/tags/ref_colornames.asp" target="_blank">Här</a> är länken med namnet på färgerna igen. I kolumnen "HEX" kan du se
            vad de har för hexadecimala koder.</p>',
            'code' => 'myCanvas.fillStyle = "#FF0000"; // röd
myCanvas.fillRect(10, 10, 50, 50);

myCanvas.fillStyle = "#00FF00"; // blå
myCanvas.fillRect(10, 100, 50, 50);

myCanvas.fillStyle = "#0000FF"; // grön
myCanvas.fillRect(10, 200, 50, 50);

myCanvas.fillStyle = "#666666"; // 50% grå
myCanvas.fillRect(10, 300, 50, 50);'
        ));
        Section::create(array(
            'sectionID' => 225,
            'lessonID' => 2,
            'orderInLesson' => 25,
            'contentsHTML' => '<p>Med hjälp av färgtoningar, <i>gradients</i> på engelska, kan vi skapa ännu häftigare effekter.<br/>
            Du behöver inte bry dig om koden här, men om du är intresserad kan du försöka analysera vad den gör.</p>
            <p>Exemplet fungerar inte just nu, men resultatet ska bli såhär:</p>
            <img src="images/lessons/canvas_ex.png"/>',
            'code' => '// Create gradients
var lingrad = myCanvas.createLinearGradient(0,0,0,150);
lingrad.addColorStop(0, "#00ABEB");
lingrad.addColorStop(0.5, "#fff");
lingrad.addColorStop(0.5, "#26C000");
lingrad.addColorStop(1, "#fff");

var lingrad2 = myCanvas.createLinearGradient(0,50,0,95);
lingrad2.addColorStop(0.5, "#000");
lingrad2.addColorStop(1, "rgba(0,0,0,0)");

// assign gradients to fill and stroke styles
myCanvas.fillStyle = lingrad;
myCanvas.strokeStyle = lingrad2;

// draw shapes
myCanvas.fillRect(10,10,130,130);
myCanvas.strokeRect(50,50,50,50);'
        ));
        Section::create(array(
            'sectionID' => 226,
            'lessonID' => 2,
            'orderInLesson' => 26,
            'contentsHTML' => '<p>Det finns hur mycket som helst att säga om Canvas. Vi kan skapa kod som roterar och flyttar på saker.
            Vi kan animera saker. Vi kan lägga in bilder från datorn och lägga på effekter.</p>
            <p>I en senare lektion ska vi se hur vi kan kombinera vårt målarbräde med lite annan kod för att skapa ett enkelt spel. Men det var
            allt om Canvas för den här gången.</p>',
            'showImage' => 'knacke_thumbsup.png'
        ));



        Section::create(array(
            'sectionID' => 300,
            'lessonID' => 3,
            'orderInLesson' => 1,
            'contentsHTML' => '<p>Datorer är inte särskilt smarta, men en sak som de är bra på är att komma ihåg saker. I den här lektionen ska
            vi titta lite på hur vi kan spara undan data och ta fram den när vi behöver den igen. Välkommen till lektion 3.</p>',
            'showImage' => 'brain.jpg'
        ));
        Section::create(array(
            'sectionID' => 301,
            'lessonID' => 3,
            'orderInLesson' => 2,
            'contentsHTML' => '<p>Du kanske minns att jag i den förra lektionen pratade om värden som vi sparar undan så att alla våra nästkommande
            figurer får samma färg, tjocklek eller vad det nu kan vara.</p>
            <p>För att förstå hur detta fungerar måste vi ställa oss frågan: vad är ett värde egentligen? Om du tittar på koden i kodrutan ser du två
            <code>print()</code>-satser. Vad skrivs ut när du kör koden?</p>',
            'code' => 'println( 1 + 1 );
println("1 + 1");',
            'afterSectionLoadedEval' => '
                $("#next-section-button").prop("disabled", true);
                $("#run-code-button").on( "click", sectionController.nextSection );'
        ));
        Section::create(array(
            'sectionID' => 302,
            'lessonID' => 3,
            'orderInLesson' => 3,
            'contentsHTML' => '<p>Det verkar som om att citattecknen har en speciell betydelse för datorn. När kodtolken ser citattecknen säger den
            tolkar den det som står inuti som <i>text</i>, oavsett om det råkar befinna sig tal eller en beräkning inuti dem eller inte.</p>
            <p>Datorn "beräknar" alltså saker olika beroende på vad de har för <strong>värden</strong>.<br/>
            Begreppet värde hör ihop med något som kallas för <strong>typer</strong>. Vi säger att värden som <code>42</code> och <code>13.37</code>
            tillhör typen "tal" och text som <tt>"Robban"</tt> och <tt>"Kalle Anka"</tt> tillhör en typ som kallas för <strong>(text-)strängar</strong>.</p>
            <p><code>1 + 1</code> beräknar datorn som ett värde av 2, tillhörandes taltypen. <code>"1 + 1"</code> däremot är ett värde av en strängtyp.</p>',
            'code' => 'SAME',
        ));
        Section::create(array(
            'sectionID' => 303,
            'lessonID' => 3,
            'orderInLesson' => 4,
            'contentsHTML' => '<p>Vi kan ta reda på vad ett värde har för typ genom att skicka det till instruktionen <code>typeof()</code>.</p>
            <p>Observera att om vi vill skriva ut detta måste vi skicka hela anropet som "extra information" till våra <code>print()</code>-satser.</p>',
            'code' => 'println( typeof( 1 + 1 ) );
println( typeof("1 + 1") );',
        ));
        Section::create(array(
            'sectionID' => 304,
            'lessonID' => 3,
            'orderInLesson' => 5,
            'contentsHTML' => '<p>Detta bekräftar vad jag sa tidigare, att <code>1 + 1</code> har ett värde av taltyp och <code>"1 + 1"</code>
            har ett värde av strängtyp.</p>
            <p>Att veta vad ett värde har för typ är mycket viktigt eftersom det är en vanlig källa till fel! Ta en titt på koden i kodmodulen. Vad
            skrivs ut?</p>',
            'code' => 'println( 1 + 1 );
println( "1" + "1" );',
        ));
        Section::create(array(
            'sectionID' => 305,
            'lessonID' => 3,
            'orderInLesson' => 6,
            'contentsHTML' => '<p>Till och med vår bekanta <code>+</code>-<span class="definition" title="Tecken som symboliserar en beräkning, exempelvis +, -, * och /.">operator</span>
            gör saker annorlunda beroende på vad som står (eller rättare sagt vilka typer) som finns på båda sidorna om tecknet.</p>
            <p>Regeln är att om minst en av <span class="definition" title="De värden som en operator \"beräknar\" saker med">operanderna</span> är en sträng,
            så kommer resultatet bli en ihopslagning av operanderna som om de vore strängar.<br/>
            Om operanderna på båda sidorna om <code>+</code>-tecknet är tal utför datorn vanlig addition iställlet.</p>',
            'code' => 'SAME',
        ));
        Section::create(array(
            'sectionID' => 306,
            'lessonID' => 3,
            'orderInLesson' => 7,
            'contentsHTML' => '<p>Så vad har det här med värden att göra med datorns minne? Jo, alla beräkningar vi gör, alla utskrifter, målningar på
            skärmen och så vidare har med värden att göra.<br/>
            Men många av dessa värden återkommer gång på gång. Visst vore det bättre om vi beräknade
            ett värde en gång, och sedan återanvände resultatet istället för att göra beräkningarna på nytt?</p>
            <p>Det är här något som kallas för <strong>variabler</strong> kommer in. En variabel är inget annat än <i>en namngiven plats i datorns minne</i>,
            en låda med ett namn på som vi kan stoppa något i.</p>',
        ));
        Section::create(array(
            'sectionID' => 307,
            'lessonID' => 3,
            'orderInLesson' => 8,
            'contentsHTML' => '<p>Det här är syntaxen för att skapa en variabel: vi använder ordet <code><strong>var</strong></code> följt av vad vi vill döpa variabeln till. 
            Därefter kommer ett likhetstecken <code>=</code> följt av värdet som variabeln ska ha.</p>
            <p>Koden i kodrutan skapar två variabler: en variabel med namnet <tt>fullName</tt> och en med namnet <tt>age</tt>. Vi ger <tt>fullName</tt> värdet av en
            sträng och <tt>age</tt> värdet av ett tal.</p>',
            'code' => 'var fullName = "Homer Simpson";
var age = 42;'
        ));
        Section::create(array(
            'sectionID' => 308,
            'lessonID' => 3,
            'orderInLesson' => 9,
            'contentsHTML' => '<p>Den här figuren illustrerar vad det är vi har gjort. <tt>fullName</tt> är ett minnesutrymme som "pekar på" värdet
            <tt>"Homer Simpson"</tt> och <tt>age</tt> något som pekar på värdet 42.</p>',
            'showImage' => 'var1.png'
        ));
        Section::create(array(
            'sectionID' => 309,
            'lessonID' => 3,
            'orderInLesson' => 10,
            'contentsHTML' => '<p>Vi kan nu skriva ut värdet på våra variabler genom att skicka dem till <code>print()</code>. Observera att när vi
            skickar variablerna ska vi inte använda oss av citattecken. Kan du gissa varför?</p>
            <p>Det är alltså skillnad på att skriva ut värdet av variabeln <tt>fullName</tt> (som är strängen <tt>"Homer Simpson"</tt>) och en sträng
            som har värdet <tt>"fullName"</tt>.',
            'code' => 'var fullName = "Homer Simpson";
print(fullName);   // skriver ut Homer Simpson
print("fullName"); // skriver ut fullName'
        ));
        Section::create(array(
            'sectionID' => 310,
            'lessonID' => 3,
            'orderInLesson' => 11,
            'contentsHTML' => '<p>I den första lektionen stötte du på den här koden. Nu kan du säkert gissa varför den blev fel:</p>
            <p>Svaret är att vi har inte skapat någon variabel som heter <tt>robban</tt>, så vi får felet att <tt>robban</tt> inte har definierats.</p>',
            'code' => 'print(robban)'
        ));
        Section::create(array(
            'sectionID' => 311,
            'lessonID' => 3,
            'orderInLesson' => 12,
            'contentsHTML' => '<p>När du namnger variabler finns det en del saker du bör tänka på:</p>
            <ul>
                <li>Ge variablerna vettiga namn som talar om vad de används till.</li>
                <li>Variabelnamn får inte innehålla mellanslag, så för att avskilja ord gör man första bokstaven
                i varje nytt ord till stor bokstav (<tt>fullName</tt>), eller separerar orden med understreck (<tt>full_name</tt>).</li>
                <li>Variabelnamn får inte vara (men kan bestå av) nyckelord som <code><strong>var</strong></code>. Nyckelord har lila text i kodmodulen, så om
                du råkar döpa dina variabler till ett nyckelord kommer du troligen få ett felkryss.</li>
                <li>Variabelnamn är känsliga för stora och små bokstäver. <tt>age</tt> är inte samma variabel som <tt>Age</tt>. Man brukar oftast
                döpa variabelnamn med små inledande bokstäver.</li>
            </ul>',
            'code' => 'EMPTY'
        ));
        Section::create(array(
            'sectionID' => 312,
            'lessonID' => 3,
            'orderInLesson' => 13,
            'contentsHTML' => '<p>Det fina med variabler är alltså att vi kan <i>namnge våra beräkningar</i> när vi löser problem, ungefär som
            en smart miniräknare.</p>
            <p>Låt oss säga att vi vill lösa ett matteproblem. <i>Om ett hekto godis kostar 5 kronor, och Olle vill köpa 3 hekto, vad får han
            betala sammanlagt?</i> En enkel ekvation kanske, men vi löser det steg för steg med hjälp av variabler. </p>
            <p>Lägg märke till att på rad 3 skapar jag en variabel <tt>totalPrice</tt> vars värde beror på de två tidigare variablerna. Detta sätt 
            visar vad det är för värden vi har med i vår beräkning. </p>',
            'code' => 'var pricePerHecto = 5;
var hectoToBuy = 3;
var totalPrice = pricePerHecto * hectoToBuy;
print("The total price is " + totalPrice + " kr.");'
        ));
        Section::create(array(
            'sectionID' => 313,
            'lessonID' => 3,
            'orderInLesson' => 14,
            'contentsHTML' => '<p>Nu är det din tur. Försök att lösa följande matteproblem:</p>
            <p><i>Lina cyklar en kilometer på 4 minuter och 30 sekunder. Vad är hennes medelhastighet i kilometer/timme?</i></p>
            <p>Till din hjälp har du några variabler som du kan fylla i värdet på.</p>',
            'code' => 'var minutesForOneKM = ;
var minutesInOneHour = ;
var averageSpeedInKMH = ;
print("Lina\'s average speed is " + averageSpeedInKMH + " km/h.");'
        ));
        Section::create(array(
            'sectionID' => 314,
            'lessonID' => 3,
            'orderInLesson' => 15,
            'contentsHTML' => '<p>Om vi vill byta ut innehållet i en variabel sätter vi bara ett nytt värde på den. Detta kallas för en
            <strong>uppdatering</strong> av värdet.</p>
            <p>Vi behöver inte skriva dit <code><strong>var</strong></code> när vi uppdaterar värdet på en variabel, bara när vi skapar en ny.</p>',
            'code' => 'var age = 42;
age = 15;'
        ));
        Section::create(array(
            'sectionID' => 315,
            'lessonID' => 3,
            'orderInLesson' => 16,
            'contentsHTML' => '<p>Effekten av detta kan vi rita med följande figur. <tt>age</tt> "pekade på" något som har värdet 42.
            Nu "pekar" den på något som har värdet 15.</p>',
            'showImage' => 'var2.png'
        ));
        Section::create(array(
            'sectionID' => 316,
            'lessonID' => 3,
            'orderInLesson' => 17,
            'contentsHTML' => '<p>Javascript är ett så kallat <strong>dynamiskt typat språk</strong>. Det innebär att vi kan ändra på
            inte bara variablernas värden utan även deras typer.</p>
            <p>Koden i kodmodulen fungerar, men det rekommenderas inte att du gör såhär eftersom det kan uppstå sideffekter som vi såg
            kunde hända när vi har värden av olika typer.</p>',
            'code' => 'var age = 42;
age = "Homer Simpson";'
        ));
        Section::create(array(
            'sectionID' => 317,
            'lessonID' => 3,
            'orderInLesson' => 18,
            'contentsHTML' => '<p>Det är viktigt att förstå att likhetstecknet som vi använder för tilldelning av värden <i><u>inte</u></i>
            betyder lika med! Likhet har en speciell betydelse inom programmering, som vi ska titta på senare.</p>
            <p>I matten gäller till exempel att om x = y, så gäller detta "för alltid". Men i programmeringen är variabler - just det - variabla,
            alltså föränderliga. Med andra ord, om likheten var sann i ett ögonblick behöver det inte betyda att det är sant i nästa!</p>
            <p>När du har en rad kod som <code>age = 42</code> är det bättre att säga att vi <strong>tilldelar</strong>, eller ger, värdet <tt>42</tt>
            till variabeln <tt>age</tt>.</p>',
            'code' => 'var age = 42;
var ageCopy = age; // age_copy och age är nu lika
println("age: " + age);      
println("ageCopy; " + ageCopy); 

age = 37;          // inte längre lika!!
println("age: " + age);      
println("ageCopy; " + ageCopy);'
        ));
        Section::create(array(
            'sectionID' => 318,
            'lessonID' => 3,
            'orderInLesson' => 19,
            'contentsHTML' => '<p>Om vi vill uppdatera variabler av taltypen finns det en kortare <span class="definition" title="Reglerna i ett språk som talar om ordningen på &quot;orden&quot; och hur grammatiken (strukturen på programmet) ska se ut.">
            syntax</span> som vi kan använda när värdet beror på variabelns egna värde.</p>',
            'code' => 'var x = 10;
x += 10; // samma som x = x + 10
x -= 10; // samma som x = x - 10
x *= 10; // samma som x = x * 10
x /= 10; // samma som x = x / 10'
        ));
        Section::create(array(
            'sectionID' => 319,
            'lessonID' => 3,
            'orderInLesson' => 20,
            'contentsHTML' => '<p>Att öka en variabels värde med 1 är en vanlig operation. Detta kallar man vanligtvis för <strong>inkrementering</strong>.<br/>
            Att minska en variabels värde med 1 kallas för <strong>dekrementering</strong>.</p>
            <p>Javascript har en jättekort syntax för att inkrementera eller dekrementera en variabel:</p>',
            'code' => 'var x = 10;
x++; // läs in värdet och öka med 1
++x; // öka med 1 och läs in värdet

x--; // läs in värdet och minska med 1
--x; // minska med 1 och läs in värdet
'
        ));
        Section::create(array(
            'sectionID' => 320,
            'lessonID' => 3,
            'orderInLesson' => 21,
            'contentsHTML' => '<p>För att förstå skillnaden på om vi sätter tecknen före eller efter variabeln kan vi titta på följande kod:</p>',
            'code' => 'var x = 10;
y = x++;
// y får värdet av x, sedan inkrementeras x
println("x: " + x + ", y: " + y); // x: 11, y: 10

var x = 10;
y = ++x;
// x inkrementeras, sedan får y det nya värdet
println("x: " + x + ", y: " + y); // x: 11, y: 11
'
        ));
        Section::create(array(
            'sectionID' => 321,
            'lessonID' => 3,
            'orderInLesson' => 22,
            'contentsHTML' => '<p>Det finns en instruktion <code>prompt()</code> som kan läsa in data som användaren har skrivit in. Denna går hand i
            hand med variabler - om vi sparar det inlästa värdet slipper vi fråga användaren varje gång vi ska använda oss av det.</p>
            <p>Strängen som vi skickar med till instruktionen är ett meddelande som visas för användaren.</p>
            <p><i>Just nu fungerar inte inläsningen av data till kodmodulen</i>, men med "riktig" Javascript fungerar följande kod.</p>',
            'code' => 'var fullName = prompt("What is your name?");
println(fullName);'
        ));
        Section::create(array(
            'sectionID' => 322,
            'lessonID' => 3,
            'orderInLesson' => 23,
            'contentsHTML' => '<p>Vi återkommer till variabler när vi ska prata om funktioner och objekt i senare kapitel. I grund och botten
            är det enda du behöver veta det jag har tjatat om, att variabler är inget annat än namngivna värden någonstans i datorns minne.</p>
            <p>I nästa lektion ska vi titta på hur vi kan strukturera upp våra program på ett snyggare sätt och kunna återanvända kod, utan
            att klippa och klistra en massa. Vi ses!</p>',
            'showImage' => 'knacke_thumbsup.png'
        ));


        Section::create(array(
            'sectionID' => 400,
            'lessonID' => 4,
            'orderInLesson' => 1,
            'contentsHTML' => '<p>De program du har skrivit än så länge har varit linjära, det vill säga att programmets flöde är som en rak linje som
            vi läser uppifrån och ned. Från och med den här lektionen ska vi titta på program där flödet kan hoppa lite hur som helst.<br/>
            Vad kan det vara bra för, tro?</p>
            <p>Välkommen till lektion 4.</p>',
            'showImage' => 'kk1.png'
        ));
        Section::create(array(
            'sectionID' => 401,
            'lessonID' => 4,
            'orderInLesson' => 2,
            'contentsHTML' => '
            <p>Httills har vi skapat ganska små program, men i "riktiga" program och spel kan det finnas uppemot
            tusentals eller miljontals rader kod, så vi behöver ett sätt att dela upp programmet i mer lätthanterliga bitar.</p>
            <p>Vi har faktiskt redan sett exempel på "uppdelning av kod", även om du inte har vetat det just då. När vi skriver instruktioner
            som <code>print()</code> innebär det att någon har skrivit en bit kod gör något vi vill åstadkomma. Vi vill köra den här koden, och 
            vi bryr oss inte om <i>hur</i> den fungerar, bara <i>att</i> den gör det.</p>',
            'showImage' => 'function2.png'
        ));
        Section::create(array(
            'sectionID' => 402,
            'lessonID' => 4,
            'orderInLesson' => 3,
            'contentsHTML' => '<p>Låt oss säga att du skriver ett program som hanterar tangent&shy;tryckningar för att styra en karaktär i ett skjutspel. Din klasskompis
            tycker att din kod verkar fungera bra, så han eller hon vill återanvända denna för att styra en bil i ett racingspel istället.</p>
            <p>Istället för att kopiera eller klistra in koden vill vi ha något som "pekar på" den ursprungliga koden. Den som läser koden till det nya spelet
            tänker: "jaha, den här koden hanterar de tangent&shy;tryckningar", men han eller hon behöver inte veta detaljerna för hur den gör det utan kan snabbt  
            läsa vidare till mer intressanta delar.</p>',
            'showImage' => 'reuse.png'
        ));
        Section::create(array(
            'sectionID' => 403,
            'lessonID' => 4,
            'orderInLesson' => 4,
            'contentsHTML' => '<p>Vi vill alltså ha något som dels gör att vi kan återanvända kod, dels få det resultat vi behöver, och dels inte behöva bry 
            oss om detaljerna.<br/>
            Detta är precis vad något som kallas för <strong>funktioner</strong> gör. En funktion är helt 
            enkelt en <i>namngiven bit kod som utför något</i>.</p>
            <p>Funktioner är något som tar emot "indata", gör något med den och skapar "utdata" - ungefär som när vi bakar. Ingredienserna är vår
            "indata" - funktionen är ugnen och den färdiga kakan är vår utdata.</p>
            <p>Alla instruktioner som vi har sett hittills som har parenteser <tt>()</tt> inblandade har varit funktioner. Det enklaste exemplet på
            en funktion som vi tittat på är <code>print()</code> - den tar helt enkelt något värde (indata) och skriver ut det (utdata).</p>'
            ,
            'showImage' => 'function.jpg'
        ));
        Section::create(array(
            'sectionID' => 404,
            'lessonID' => 4,
            'orderInLesson' => 5,
            'contentsHTML' => '<p>Utdata behöver inte betyda att vi skriver ut något, utan det kan vara ett värde av en komplicerad beräkning, eller också
            att vi får något utritat på skärmen.<br/>
            När vi använder ordet utdata i funktions&shy;sammanhang gäller det att vara lite försiktig: det som vi får ut av funktionen måste gå att
            använda som indata till en annan funktion. Exempelvis ritar funktionen <code>strokeRect()</code> ut något, men vi kan inte använda oss
            av resultatet av detta som indata till en annan funktion, som till exempel <code>print()</code>.</p>',
            'showImage' => 'function.jpg'

        ));
        Section::create(array(
            'sectionID' => 405,
            'lessonID' => 4,
            'orderInLesson' => 6,
            'contentsHTML' => '<p>Ett ord till som vi måste veta är det som jag kallade för "extra information" i lektionen med Canvas. Innan kallade jag detta för indata, men
            det mer korrekta ordet heter av någon anledning <strong>argument</strong>.</p>
            <p>Argument är alltså indata till funktioner som de behöver göra för att utföra något.<br/>
            I exempelvis följande kod är <code>typeof()</code> funktionen och talet <tt>42</tt> ett argument.</p>',
            'code' => 'typeof( 42 );'
        ));
        Section::create(array(
            'sectionID' => 406,
            'lessonID' => 4,
            'orderInLesson' => 7,
            'contentsHTML' => '<p>Vi har även sett exempel på att vi kan <strong>sätta samman</strong> funktioner: resultatet (utdatan) av en
            funktion blir indata i nästa. Låt oss analysera kodraden som vi använde för att skriva ut typen av talet <tt>42</tt>:</p>
            <p><code>print( typeof(42) );</code></p>

            <p>Vi har alltså satt samman funktionerna <code>print()</code> och <code>typeof()</code> och det som händer är följande:</p>
            <ol>
                <li>Vi skickar argumentet <tt>42</tt> till funktionen <code>typeof()</code>.</li>
                <li><code>typeof()</code> utför något och ger ett resultat - utdatan blir strängen <tt>"number"</tt>.</li>
                <li>Utdatan, alltså strängen <tt>"number"</tt> skickas som argument till funktionen <code>print()</code>.</li>
                <li><code>print()</code> utför något och ger ett resultat.</li>
                <li>Resultet skrivs ut i utdatamodulen.</li>
                <li>Nu kan programmet fortsätta dess körning på rad 2 (om det hade funnits något där). Oj, vilken resa!</li>
            </ol>',
             'showImage' => 'function3.png'

        ));
        Section::create(array(
            'sectionID' => 407,
            'lessonID' => 4,
            'orderInLesson' => 8,
            'contentsHTML' => '<p>Okej, så hur fungerar funktioner då? Någonstans i koden för Javascript-tolken har vi något som kallas 
            <strong>funktions&shy;definitioner</strong>. Det är dessa som talar om vad som ska hända när vi kallar på, eller rättare sagt <strong>
            anropar</strong> funktionen.</p>
            <p>Vi kan skapa våra egna funktions&shy;definitioner också. En funktions&shy;definition har en lite märklig syntax som består av ett "huvud"
             och en "kropp".
             <br/>"Huvudet" består av nyckelordet <code><strong>function</strong></code> följt av ett namn och ett par parenteser.
            Parenteserna kan innahålla något som vi återkommer till snart.<br/>
            "Kroppen" består av ett par måsvingeklamrar <code>{ }</code> och mellan dessa
            skriver vi koden som vi vill ska köras när vi anropar funktionen.</p>
            <p>Måsvingeklamrar får du i Windows genom att hålla inne tangenten Alt Gr och trycka på 7 eller 9 i sifferraden eller
            på Mac genom att hålla inne Alt och Shift samtidigt som du trycker på 8 eller 9.</p>
            <p>Här är ett exempelt på en funktion <code>printLyrics()</code> som skriver ut de första två raderna i texten till <i>Blinka 
            lilla stjärna</i> på engelska.</p>
',
            'code' => 'function printLyrics() {
    println("Twinkle, twinkle little star");
    println("How I wonder where you are.");
}',
          'afterSectionLoadedEval' => '
                $("#next-section-button").prop("disabled", true); 
                $("#run-code-button").on( "click", sectionController.nextSection );'
        ));

        Section::create(array(
            'sectionID' => 408,
            'lessonID' => 4,
            'orderInLesson' => 9,
            'contentsHTML' => '<p>Om du körde koden i det föregåede avsnittet märkte du kanske att inget skrevs ut. Varför det?</p>
            <p>Jo, vi har <i>definierat</i> funktionen men glömt att <i>anropa</i> den. Med andra ord: vi har lärt datorn att den kan göra
            något nytt (skriva ut texten till <i>Blinka lilla stjäna</i>) men vi har inte sagt åt den att den ska göra det just nu.</p>
            <p>Syntaxen för att anropa funktionen är precis likadan som alla andra funktioner vi har sett hittills - det är bara att skriva
            funktionsnamnet följt av parenteser.</p>
            <p>Jag har lagt till funktionsanropet längst ner i den här koden, så om du kör koden nu så borde den fungera.</p>',
            'code' => 'function printLyrics() {
    println("Twinkle, twinkle little star");
    println("How I wonder where you are.");
}

printLyrics();'
        ));
        Section::create(array(
            'sectionID' => 409,
            'lessonID' => 4,
            'orderInLesson' => 10,
            'contentsHTML' => '<p>När vi vet att en funktion fungerar så sa vi ju att vi inte behövde bry oss om detaljerna. Det är väldigt
            vanligt att man döljer nyttiga funktioner som ofta används i andra filer än de som är specifika för programmet man håller på med.</p>
            <p>Det kan vi inte göra i kodmodulen eftersom vi endast har en fil uppe, men däremot kan vi dölja funktionens kropp. Detta gör du
            med den lilla pilen som står bredvid radnumret (ettan).</p>',
            'code' => 'function printLyrics() {
    println("Twinkle, twinkle little star");
    println("How I wonder where you are.");
}

printLyrics();',
        ));
        Section::create(array(
            'sectionID' => 410,
            'lessonID' => 4,
            'orderInLesson' => 11,
            'contentsHTML' => '<p>Du kan också placera funktionsanropet före definitionen om du tycker att det känns snyggare:</p>',
            'code' => 'printLyrics();

function printLyrics() {
    println("Twinkle, twinkle little star");
    println("How I wonder where you are.");
}',
        ));
        Section::create(array(
            'sectionID' => 411,
            'lessonID' => 4,
            'orderInLesson' => 12,
            'contentsHTML' => '<p>Det föregående exemplet visade också att vi kan låta en funktion anropa en annan: vår egna funktion
            <code>printLyrics()</code> kunde anropa den inbyggda funktionen <code>println()</code>.</p>
            <p>Men vi kan också skapa funktioner som anropar våra egna funktioner. I det här exemplet anropar vi <code>printLyricsTwice()</code>
            som anropar <code>printLryics()</code> som anropar <code>print()</code>.</p>
            <p>Du kan säkert gissa vad det är vi behöver göra för att få programmet att skriva ut texten fyra gånger.</p>',
            'code' => '
function printLyrics() {
    println("Twinkle, twinkle little star");
    println("How I wonder where you are.");
}

function printLyricsTwice() {
    printLyrics();
    printLyrics();
}

printLyricsTwice();
'
        ));
        Section::create(array(
            'sectionID' => 412,
            'lessonID' => 4,
            'orderInLesson' => 13,
            'contentsHTML' => '<p>Programmering handlar mycket om problemlösning. Från att försöka lösa ett stort problem (skapa ett spel eller en app) kan vi
            dela upp det till mindre och mindre delproblem (funktioner) tills vi har något som kan lösas med våra grundinstruktioner.</p>
            <p>Funktioner som <code>printLyricsTwice()</code> <strong>kapslar in</strong> en viss kod som löser ett problem så att vi kan återanvända koden
            i framtida program utan en massa kopiera-och-klistra in.</p>
            <p>Men <code>printLyricsTwice()</code> är onödigt specifik: problemet som den löser är att bara den skriver  ut texten till <i>Blinka lilla stjärna</i>
            två gånger. Vore det inte bättre om vi kunda ha en funktion som kan skriva ut <i>vad som helst</i> två gånger?</p>',
            'code' => 'SAME'
        ));
        Section::create(array(
            'sectionID' => 413,
            'lessonID' => 4,
            'orderInLesson' => 14,
            'contentsHTML' => '<p>Detta är motivationen till att införa något som kallas för <strong>parametrar</strong>. En parameter är en
            variabel som bara existerar inom funktionens räckvidd, alltså mellan måsvingeklamrarna.<br/>
            Men i och med att variabler lagrar något betyder det att vi kan "peka på" värdet utan att vi behöver veta vad det är!</p>
            <p>Här är ett konkret exempel på en generalisering av det föregående problemet. Istället för att skriva ut en specifik text två gånger
            kan vi med hjälp av <code>printTwice()</code> skriva ut vad som helst två gånger.</p>
            <p>Syntaxen för att skapa en parameter är helt enkelt att man knuffar in ett variabelnamn mellan parenteserna. Sedan fungerar det precis
            som vanliga variabler.</p>
            <p>Vi säger att vi anropar funktionen med ett argument som har värdet <tt>"hello"</tt>. Inuti <code>printTwice()</code> tilldelas detta
            värde parametern <tt>whatToPrint</tt> som alltså fungerar som en variabel.</p>',
            'code' => '
function printTwice( whatToPrint ) {
    println( whatToPrint );
    println( whatToPrint );
}


printTwice("hello");
'
        ));
        Section::create(array(
            'sectionID' => 414,
            'lessonID' => 4,
            'orderInLesson' => 15,
            'contentsHTML' => '<p>Det är viktigt att förstå att variabler är <strong>lokala</strong> till det sammanhang som de skapats i. Funktioner
            är som små öar, som inte har någon vetskap om varandra och måste kommunicera med hjälp av båtar (argument och parametrar).</p>
            <p>Följande exempel är ganska likt det från det föregående men med skillnaden att vårt argument är en variabel i det här fallet som heter 
            <tt>fullName</tt>.</p> <p>Inuti <code>printTwice()</code> finns det ingenting som heter <tt>fullName</tt>, och utanför funktionen finns det heller 
            inget som heter <tt>whatToPrint</tt>.</p>',
            'code' => '
function printTwice( whatToPrint ) {
    println( whatToPrint );
    println( whatToPrint );
}

var fullName = "Eric Cartman";
printTwice(fullName);

println(whatToPrint); // Error: whatToPrint is not defined
'
        ));
        Section::create(array(
            'sectionID' => 415,
            'lessonID' => 4,
            'orderInLesson' => 16,
            'contentsHTML' => '<p>Det är viktigt att förstå att variabler är <strong>lokala</strong> till det sammanhang som de skapats i. Funktioner
            är som små öar, som inte har någon vetskap om varandra och måste kommunicera med hjälp av båtar (argument och parametrar).</p>
            <p>Följande exempel är ganska likt det från det föregående men med skillnaden att vårt argument är en variabel i det här fallet som heter 
            <tt>fullName</tt>.</p> <p>Inuti <code>printTwice()</code> finns det ingenting som heter <tt>fullName</tt>, och utanför funktionen finns det heller 
            inget som heter <tt>whatToPrint</tt>.</p>',
            'code' => '
function printTwice( whatToPrint ) {
    println( whatToPrint );
    println( whatToPrint );
}

var fullName = "Eric Cartman";
printTwice(fullName);

println(whatToPrint); // Error: whatToPrint is not defined
'
        ));
        Section::create(array(
            'sectionID' => 416,
            'lessonID' => 4,
            'orderInLesson' => 17,
            'contentsHTML' => '<p>Övningsdags. I den här övningen ska du öva på syntaxen för att skriva en funktion och anropa den.<br/>
             Du ska skriva en funktion <code>printSum</code> som tar emot två parametrar och skriver ut värdet på summan av dem med en 
             radbrytning efteråt.<br/>
            Du kan testa funktionen med olika värden, men för rättningens skull måste du testa med exakt de värden som
            står i kravlistan som argument.</p>',
            'code' => '// glöm inte att skapa parametrar inuti parenteserna
function printSum( , ) { 
    // skriv funktionskroppen här
}

// anropa funktionen med 1 och 2 som argument
// anropa nu funktionen med 3.5 och -4 som argument
'
        ));
        Section::create(array(
            'sectionID' => 417,
            'lessonID' => 4,
            'orderInLesson' => 18,
            'contentsHTML' => '<p>Istället för att skriva ut något är det vanligare att man låter funktioner beräkna något och skicka "ut"
            informationen till de anropade funktionerna eller delen av programmet som inte är i någon funktion.</p>
            <p>Låt oss säga att vi har ett program som gör någon komplicerad beräkning i en funktion. Vi ville ju kunna använda oss av funktionen
            men inte bry oss om vad den gjorde, så vi vill inte ha en massa utskrifter från funktionen om inte vi själva ber om det.</p>
            <p>Därför låter vi funktionen <strong>returnera</strong> det beräknade värdet som vi vill ha ut så att vi kan använda det i någon annan
            funktion eller skriva ut det i huvuddelen av vårt program.</p>
            <p>För att få ut ett värde ur en funktion använder vi nyckelordet <strong><code>return</code></strong> följt av ett uttryck som ska returneras. Ett uttryck kan vara något så enkelt
            som ett värde eller variabel, eller något mer komplicerat matematiskt uttryck. När programmet når <strong><code>return</code></strong>-satsen
            hoppar flödet tillbaka till funktionen som anropade den aktuella funktionen, eller till huvuddelen av vårtt program om vi inte befann oss i någon funktion.</p>
            <p>Här är ett exempel på en funktion <code>sum()</code> som är en omskrivning av <code>printSum()</code> från övningen i det förra avsnittet.
            Funktionen returnerar summan av de två parametrar <tt>a</tt> och <tt>b</tt> som den får in. <br/>
            Det är ett löjligt exempel eftersom vi lika gärna skulle kunna skriva <tt>a + b</tt> direkt i den anropande delen, men exemplet är till för
            att visa syntaxen med <strong><code>return</code></strong>-satsen.</p>',
            'code' => '
function sum(a, b) {
    var s = a + b;
    return s;
}
// eller helt enkelt
function sum(a, b) {
    return a + b;
}

print(sum(3, 5));
'
        ));
        Section::create(array(
            'sectionID' => 418,
            'lessonID' => 4,
            'orderInLesson' => 19,
            'contentsHTML' => '<p>Övning: Skriv en funktion <code>celsiusToFahrenheit()</code> som tar ett tal som parameter. Talet är ett
            värde på en temperatur i enheten celsius. Funktionen ska returnera den angivna temperaturen i den amerikanska enheten fahrenheit. </p>
            <p>Formeln för omvandlingen är följande:</p>
            <img src="images/lessons/fahrenheit.png"/>
            <p>Du kan välja själv om du vill returnera det beräknade värdet direkt eller om du behöver några mellanliggande variabler.</p>
            <p>Koden som testar funktionen kommer automatiskt att skicka argument till funktionen, så du behöver inte skriva något extra i
            kodmodulen. Däremot kan det vara bra att testa funktionen med de exempelvärden som står i kravlistan för att se att du får förväntat svar.</p>',
            'code' => 'function celsiusToFahrenheit( ) {

    return 
}
'
        ));
        Section::create(array(
            'sectionID' => 419,
            'lessonID' => 4,
            'orderInLesson' => 20,
            'contentsHTML' => '<p>De funktionerna som vi har tittat på hittills har varit matematiska sådana som är ganska tråkiga. Men det finns också
            funktioner som kan göra saker med annat, exempelvis strängar.</p>
            <p>Strängar är något som man kallar för objekt i Javascript. Vad detta betyder kommer jag gå in på senare, men just nu kan du se det som att
            de, förutom att de är värden, också har funktioner som vi kan anropa "på" själva värdet. I dessa fall kallas funktionerna för metoder.</p>
            <p>Syntaxen för metodanrop är värdet (eller variabeln) följt av en punkt, följt av den vanliga syntaxen för funktionsanrop.</p>
            <p>Låter det här bekant? Du gjorde metodanrop när du arbetade med <tt>myCanvas</tt>!</p>
            <p>Här är ett exempel på en metod <code>toUpperCase()</code> som arbetar på strängar. Den tar det ursprungliga värdet på strängen och returnerar
            en ny sträng där alla bokstäver är STORA bokstäver ur den ursprungliga strängen.</p>',
            'code' => 'var fullName = "Robert Sebescen";
var fullNameUpper = fullName.toUpperCase();
print(fullNameUpper);
'
        ));
        Section::create(array(
            'sectionID' => 420,
            'lessonID' => 4,
            'orderInLesson' => 21,
            'contentsHTML' => '<p>Innan vi avslutar den här lektionen måste jag lära dig ytterliggare ett nytt ord. I matten använder vi ordet
            "beräkning" när det handlar om få ett resultat med uttryck och tal. Men när vi utför något i programmeringen där vi vill få ett värde säger
            vi att vi <strong>evaluarar</strong> det.</p>
            <p>Det låter till exempel konstigt att säga att vi "beräknar" värdet av <code>"kalle" + "anka"</code> eftersom båda är strängar, så ingen
            addition utförs i vanlig mening. Det är bättre att säga att vi evaluerar uttrycket.</p>
            <p>Evaluering är alltså ett mer generellt begrepp som täcker in strängar, funktioner, sammansättningar av olika slag och en massa annat.</p>'
        ));
        Section::create(array(
            'sectionID' => 421,
            'lessonID' => 4,
            'orderInLesson' => 22,
            'contentsHTML' => '<p>Precis som för Canvas finns det hur mycket som helst att säga om funktioner. Jag förstår om du tycker att det
            känns svårt med alla nya ord, och det är kanske inte så tydligt vad vi behöver funktioner till just nu och hur vi skickar data hit och dit.</p>
            <p>Men om ett tag lossnar nog isberget och när du förstår funktioner är du på god väg till att bli en bra programmerare.</p>
            <p>Orkar du en lektion till? :) I nästa lektion ska vi titta på program som inte gör samma sak varje gång vi kör dem. Vad kan de vara bra för, tro?
            En hel del, faktiskt.</p>',
            'showImage' => 'knacke_thumbsup.png'
        ));
        
        Section::create(array(
            'sectionID' => 500,
            'lessonID' => 5,
            'orderInLesson' => 1,
            'contentsHTML' => '<p>Jag nämnde att det finns fem typer av grundinstruktioner som datorn kan förstå i de flesta programmeringsspråk
            utan att vi behöver skriva kod för dem. Vi har lärt oss tre sådana än så länge: indata, utdata och matematiska beräkningar.</p>
            <p>I den här lektionen ska vi titta på den fjärde typen av instruktioner, som är att datorn kan utföra olika saker beroende på vad
            som händer när vi kör våra program.</p>',
            'showImage' => 'inverted-tree.gif'
        ));
        Section::create(array(
            'sectionID' => 501,
            'lessonID' => 5,
            'orderInLesson' => 2,
            'contentsHTML' => '<p>De program vi har tittat på hittills gör i stort sett samma sak varje gång vi kör dem. Detta är önskvärt i
            vissa fall, men inte när vi har saker som spel: vi vill ju att datorn ska reagera på våra musklick och knapptryckningar och
            inte göra det den känner för.</p>
            ',
            'showImage' => 'inverted-tree.gif'
        ));
        Section::create(array(
            'sectionID' => 502,
            'lessonID' => 5,
            'orderInLesson' => 3,
            'contentsHTML' => '<p>Rent allmänt kan vi säga att om X är sant vill vi att Y ska hända. Detta X är ett påståenden, vilket vi ju vet
            är något som kan vara sant eller falskt.</p>
            <p>Låt oss säga att X är påståendet <i>Det regnar idag.</i> Vi vet att det här är ett påstående eftersom det är något som kan vara sant eller
            falskt, och inte en fråga eller något annat.</p>
            <p>Vi kan nu utöka vårt påstående med vad som ska hända om det är sant eller inte sant: <i>Om det regnar idag, så ska jag ta med mitt paraply
            till skolan.</p>',
            'showImage' => 'inverted-tree.gif'
        ));
        Section::create(array(
            'sectionID' => 503,
            'lessonID' => 5,
            'orderInLesson' => 4,
            'contentsHTML' => '<p>När vi programmerar med påståenden brukar vi uttrycka dem som jämförelser.<br/>
            I kodmodulen ser du hur <strong>jämförelse&shy;operatorerna</strong> skrivs i Javascript. Jag tror att du känner igen dessa från matten.</p>',
            'code' => 'x < y    // mindre än
x <= y  // mindre än eller lika med
x > y   // större än
x >= y  // större än eller lika med
x == y  // lika med
x != y  // inte lika med'
        ));
        Section::create(array(
            'sectionID' => 504,
            'lessonID' => 5,
            'orderInLesson' => 5,
            'contentsHTML' => '<p>Det visar sig att dessa påståenden är också värden. Det betyder att vi kan behandla dem som vilka andra värden som helst,
            alltså skriva ut dem och spara undan dem som variabler.</p>
            <p>Dessa värden evaluerar datorn till att vara <code><strong>true</strong></code> (sanna) eller <code><strong>false</strong></code> (falska).<br/>
            <code><strong>true</strong></code> och <code><strong>false</strong></code> är speciella värden för Javascript. De tillhör typen <tt>boolean</tt> så 
            vi säger att de är <strong>booleska</strong>, efter matematikern George Boole.</p>
            <p>Vad skriver följande program ut?</p>',
            'code' => 'var x = 10;

println( x == 10 );
println( typeof(x == 10) );
println( x < 10 );
println( x <= 10 );

var y = 5;
var guess = y < x;
print( guess );
'
        ));
        Section::create(array(
            'sectionID' => 505,
            'lessonID' => 5,
            'orderInLesson' => 6,
            'contentsHTML' => '<p>Jag hoppas nu att du har insett skillnaden på likhet (<code>==</code>) och tilldelning (<code>=</code>). Det första
            är ett booleskt värde, alltså något som har värdet av sant eller falskt.<br/>
            Tilldelning å andra sidan, är något som egentligen inte borde ha något värde, så det bordet inte gå att skriva ut en tilldelning. Men
            Javascript tolkar detta som att vi vill skriva ut värdet av det som står till höger om likhetstecknet.</p>
            <p>Detta är en extremt vanlig källa till att buggar uppstår. Se upp med detta!</p>',
            'code' => 'var x = 5;
var y = 3;
println( x == y ); // false
println( x = y );  // borde ge fel, men skriver ut 3 och x får värdet 3 som bieffekt!
'
        ));
        Section::create(array(
            'sectionID' => 506,
            'lessonID' => 5,
            'orderInLesson' => 7,
            'contentsHTML' => '<p>Kom ihåg att de booleska värdena <code><strong>true</strong></code> och <code><strong>false</strong></code> inte är
            strängar så de skrivs utan citattecken!</p>',
            'code' => 'println( typeof( true ) ); // boolean
println( typeof( false ) );
println( typeof( 5 != 3 ))

var guess = true;
var flag = ( 10 > 0);
println(guess);
'
        ));
        Section::create(array(
            'sectionID' => 507,
            'lessonID' => 5,
            'orderInLesson' => 8,
            'contentsHTML' => '<p>Okej, jag har pratat om påståenden och hur de är representerade i programmerings&shy;världen. Men vad har vi för 
            nytta av dem?</p>
            <p>Jo, vi kan få program att göra vissa saker eller hoppa över saker om vissa villkor är sanna (eller falska).</p>
            <p>Ett exempel är tangenthantering i spel: "om uppåtpilen är nedtryckt, gå framåt med karaktären". Vi vill alltså inte köra koden
            som får karaktären att gå bakåt eller åt sidan. Vi måste ju ha med dem i programmet för att hantera de andra tangenttryckningarna
            så vi kan inte bara ta bort koden.</p>'
        ));
        Section::create(array(
            'sectionID' => 508,
            'lessonID' => 5,
            'orderInLesson' => 9,
            'contentsHTML' => '<p>Den simplaste formen av villkorssatser vi kan skriva är <code><strong>if</strong></code>-sats. Syntaxen kan du
            se i exemplet i kodrutan.</p>
            <p>Det handlar alltså helt enkelt om att skriva ett villkor, och vad som ska hända om villkoret är sant. Om villkoret är falskt hoppar
            programmets flöde till den första raden efter den avslutande måsvinge&shy;klamren.</p>
            <p>Prova att byta värden på <tt>x</tt> till ett negativt tal för att se vad som händer.</p>',
            'code' => 'var x = 5;
if (x >= 0) {
    println("x is positive");
}
println("Outside the if");'
        ));
        Section::create(array(
            'sectionID' => 509,
            'lessonID' => 5,
            'orderInLesson' => 10,
            'contentsHTML' => '<p>När vi skriver villkorssatser kollar vi alltid efter sanna påståenden, så exemplet från det förra avsnittet
            är samma som det här. Kodtolken lägger alltså automatiskt till kontrollen <code>== <strong>true</strong></code>.</p>',
            'code' => 'var x = 5;
if ((x >= 0) == true) {
    println("x is positive");
}
println("Outside the if");'
        ));
        Section::create(array(
            'sectionID' => 510,
            'lessonID' => 5,
            'orderInLesson' => 11,
            'contentsHTML' => '<p>Det här betyder att om vi redan har ett booleskt värde eller variabel i villkoret behöver vi inte
            lägga till kontrollen <code>== <strong>true</strong></code>.</p>',
            'code' => 'var guess = true;
if (guess) { // samma sak som  if (guess == true)
    // do something
}
println("Outside the if");'
        ));
        Section::create(array(
            'sectionID' => 511,
            'lessonID' => 5,
            'orderInLesson' => 12,
            'contentsHTML' => '<p>Strikt talat bör värden av olika typer inte vara lika - att jämföra strängar med tal är som att jämföra
            äpplen med bilar. Trtos det fungerar följande kod - detta är också en mycket vanlig källa till fel.</p>',
            'code' => 'if (5 == "5") {
    println("Uhh... shouldn\'t be here.");
}
println("Outside the if");'
        ));
        Section::create(array(
            'sectionID' => 512,
            'lessonID' => 5,
            'orderInLesson' => 13,
            'contentsHTML' => '<p>Ett ännu mer vanligt fel är att Javascript tolkar saker och ting som inte är <tt>0</tt>, <strong><code>false</strong></strong></code>
            och några få andra undantag som sanna!</p>',
            'code' => 'if ("donald duck") {
    println("Uhh... shouldn\'t be here.");
}
println("Outside the if");'
        ));
        Section::create(array(
            'sectionID' => 513,
            'lessonID' => 5,
            'orderInLesson' => 14,
            'contentsHTML' => '<p>Lösningen på dessa problem är att vi gör strikta jämförelser. Vi lägger helt enkelt
            bara till ett likhetstecken till våra jämförelse&shy;operatorerna som har med likheter att göra (<code>===</code> och <code>!==</code>).</p>',
            'code' => 'if (5 === "5") {
    println("I will not be printed.");
}
println("Outside the if");'
        ));
        Section::create(array(
            'sectionID' => 514,
            'lessonID' => 5,
            'orderInLesson' => 15,
            'contentsHTML' => '<p>Om vi vill tala om vad som ska hända när villkoret är falskt, lägger vi till en <code><strong>else</strong></code>-sats.</p>
            <p>Ändra gärna på värdet av <tt>x</tt> och se vad som händer.</p>',
            'code' => 'var x = 5;
if (x >= 0) {
    println("x is positive");
}
else {
    println("x is negative");
}
println("Outside the if-else");'
        ));
        Section::create(array(
            'sectionID' => 515,
            'lessonID' => 5,
            'orderInLesson' => 16,
            'contentsHTML' => '<p>Om vi vill testa efter flera villkor kan vi göra på två sätt. Antingen <strong>nästlar</strong> vi villkors&shy;satser inuti varandra:</p>
            <p>I det här exemplet gör jag en nästling i <strong><code>else</code></strong>-satsen men det finns inget som hindrar oss från att lägga nästlade satser i
            <strong><code>if</code></strong>-satser istället.</p>',
            'code' => 'var x = 10;
var y = 5;

if (x == y) { // alt. ===
    println("x and y are equal");
}
else {
    if (x > y) {
        println("x is greater than y");
    }
    else {
        println("x is less than y");
    }
}
println("Outside the if-else");'
        ));
        Section::create(array(
            'sectionID' => 516,
            'lessonID' => 5,
            'orderInLesson' => 17,
            'contentsHTML' => '<p>Nästlade satser kan snabbt bli jobbiga att läsa. Ett snyggare sätt att lösa detta på är <code><strong>else if</strong></code>-satser.</p>
            <p>En block med villkorssatser måste alltid bestå av en <strong><code>if</code></strong>, men de kan ha hur många <code><strong>else if</strong></code>-satser som
            helst, och högst en <code><strong>else</strong></code>-sats.</p>
            <p>Det första villkoret som uppfylls är det som körs, så i ett block med flera förgreningar kommer alltid exakt en förgrening att köras.</p>',
            'code' => 'var x = 10;
var y = 5;

if (x == y) { // alt. ===
    println("x and y are equal");
}
else if (x > y) {
    println("x is greater than y");
}
else {
    println("x is less than y");
}
'
        ));
        Section::create(array(
            'sectionID' => 517,
            'lessonID' => 5,
            'orderInLesson' => 18,
            'contentsHTML' => '<p>I den här övningen ska du skriva en funktion <code>abs()</code> som returnerar absolut&shy;värdet (även kallat <i>beloppet</i>)
            av ett tal.</p>
            <p>Absolutvärdet av ett tal är helt enkelt talet utan tecken, så positiva tal som  42 förblir positiva 42, och negativa tal som -5 ska bli 
            positiva (5).</p>',
            'code' => '
function abs( ? ) {
    if ( ? ) {
        return ?;
    }
    else {
        return ?;
    }
}
'
        ));
        Section::create(array(
            'sectionID' => 518,
            'lessonID' => 5,
            'orderInLesson' => 19,
            'contentsHTML' => '<p>Förutom de vanliga matematiska operatorerna <tt>+</tt>, <tt>-</tt>, <tt>*</tt> och <tt>/</tt> finns det en till
            operator som kallas för <strong>modulus&shy;operatorn</strong>. Olyckligtvis skriver man den som ett procenttecken <code>%</code>
            i Javascript, men den har inget med procent att göra.</p>
            <p>Det modulusoperatorn gör är att den tittar på <i>resten</i> som uppstår när två tal divideras med varandra. Exempelvis är <tt>7 % 3</tt>
            lika med 1 eftersom vi får 1 över när vi delar 7 med 3 (kvoten blir såklart 2).</p>
            <p>Vi kan använda oss av modulus för att kontrollera om ett tal är jämnt eller udda. Jämna tal har ju den egenskapen att de får resten 0
            när de divideras med 2.</p>',
            'code' => '
function isOddOrEven( n ) {
    if ( n % 2 === 0 ) {
        println(n + " is even");
    }
    else {
        println(n + " is odd");
    }
}

isOddOrEven( 1337 );
isOddOrEven( 42 );
'
        ));
        Section::create(array(
            'sectionID' => 519,
            'lessonID' => 5,
            'orderInLesson' => 20,
            'contentsHTML' => '<p>Vi kan också använda oss av modulusoperatorn för att ta reda på den sista siffran i ett heltal.</p>
            <p>Kan du se varför följande funktion fungerar?</p>',
            'code' => '
function lastDigitOf( n ) {
    return n % 10;
}

println( lastDigitOf(1337) );
'
        ));
        Section::create(array(
            'sectionID' => 520,
            'lessonID' => 5,
            'orderInLesson' => 21,
            'contentsHTML' => '<p>Vi har tidigare sett att funktioner kan anropa varandra, men det visar sig att vi även kan få
            funktioner att anropa sig själva! Detta kallas för <strong>rekursion</strong>, och om du har sett filmen <i>Inception</i>
            kan du säkert gissa hur det fungerar.</p>
            <p>En rekursiv funktion måste ha ett <strong>basfall</strong> som returnerar något för att funktionen inte ska hålla på i all
            evighet (i verkligheten får vi dock ett fel efter en stund för att datorn får slut på minne).</p>
            <p>Funktionen <code>countdown()</code> till höger räknar ner från parametern <tt>n</tt> till 1 och därefter skriver ut texten
            "Blastoff!"<br/>
            Vad som händer är att vi först tittar om vi nått basfallet, att <tt>n</tt> är lika med 0, och i så fall skriver ut texten. Men
            eftersom vi anropar <code>countdown()</code> med argumentet 5 är detta ju falskt, så vi hamnar i <strong><code>else</code></strong>-satsen.<br/>
            Här skriver vi ut värdet på talet, och anropar funktionen <code>countdown()</code>, alltså sig självt, med argumentet som är
            <tt>n-1</tt>. Och så håller vi på tills vi nått basfallet. Häftigt, va? :)</p>',
            'code' => '
function countdown( n ) {
    if (n === 0) {
        println("Blastoff!");
    }
    else {
        println(n);
        countdown(--n);
    }
}

countdown(5);
'
        ));
        Section::create(array(
            'sectionID' => 521,
            'lessonID' => 5,
            'orderInLesson' => 22,
            'contentsHTML' => '<p>Vi kan kombinera villkor genom att använda oss av de <strong>logiska</strong> operatorerna
            som är helt enkelt orden "och", "eller" och "inte" i kodform.<br/>
            Ordet "och" heter <code>&&</code> på Javascript-språk, "eller" heter <code>||</code> och "inte" heter <code>!</code>.</p>',
            'code' => '
// returnerar sant om n är mellan 0 och 10
function between0And10( n ) {
    if (x >= 0 && x <= 10)
        return true;
    else
        return false;
}
// eller helt enkelt 
function between0And10( n ) {
    return (x >= 0 && x <= 10);
}

// returnerar sant om n är jämnt eller större än 10
function isEvenOrGreaterThan10(n) {
    return (n % 2 === 0 || n > 10);
}

// returnerar sant om n inte är mindre än 0
function isPositive() {
    return !(n < 0); // samma som n >= 0
}
'
        ));
        Section::create(array(
            'sectionID' => 522,
            'lessonID' => 5,
            'orderInLesson' => 23,
            'contentsHTML' => '<p>Skottår (<i>leap year</i> på engelska) är år som har 366 dagar istället för de vanliga 365. Reglerna för att bestämma om 
            ett år är skottår eller inte är följande:</p>
            <ul>
                <li>År som är jämnt delbara med 4 år skottår, exempelvis år 32 och 2012. Med undantag för...</li>
                <li>...år som är jämnt delbara med 100 men inte 400 är alltså inte skottår. Exempelvis är åren 2000, 2016 och 2400 skottår men inte 1900 och 2100.</li>
            </ul>
            <p>Skriv en funktion <code>isLeapYear()</code> som tar emot en parameter <tt>year</tt> och returnerar sant om året är skottår, annars falskt.</p>
',
            'code' => 'function isLeapYear (?) {

}'
        ));
        Section::create(array(
            'sectionID' => 523,
            'lessonID' => 5,
            'orderInLesson' => 24,
            'contentsHTML' => '<p>Här är en lite längre uppgift som är värd hela 50 poäng. Förhoppningsvis ska den kännas rolig, och inte för svår.</p>
            <p>Vi säger att ett ord är ett <strong>palindrom</strong> om det kan läsas likadant framlänges som baklänges. Här bortser vi från stora och små
            bokstäver, samt mellanslag. "Anna" är ett palindrom, likaså frasen "ni talar bra latin".</p>
            <p>I kodmodulen har jag skapat fyra små funktioner som har med ord att göra - du behöver inte bry dig om hur de fungerar mer än att de gör det de ska,
            så dessa ska du inte röra på. Du ser deras beskrivningar i kommentarerna, men om du är osäker kan 
            du testa dem med lite <code>print()</code>-satser så att du förstår vad de gör.</p>
            <p>Däremot ska du implementera funktionen <code>isPalindrome()</code> som avgör om ett ord, alltså en sträng är ett palindrom. Du kan anta att
            strängarna som skickas är skrivna med små bokstäver och inte har mellanslag eller några konstiga tecken.</p>
',
            'code' => '
// returns the number of characters (letters) of the given word
// e.g. "robban" -> 6
function length( word ) {
    return word.length;
}

// returns the first character (letter) of the given word
// e.g. "robban" -> "r"
function first( word ) {
    return word.slice(0,1);
}

// returns the last character (letter) of the given word
// e.g. "robban" -> "n"
function last( word ) {
    return word.slice(-1);
}

// returns the given word with the first and last characters removed
// e.g. "robban" -> "obba"
function middle( word ) {
    return word.slice(1, -1);
}

// din kod här 
'
        ));
        Section::create(array(
            'sectionID' => 524,
            'lessonID' => 5,
            'orderInLesson' => 25,
            'contentsHTML' => '<p>I den här lektionen fick du se exempel på de sista typerna av grundinstruktioner: att vi kan få program
            att utföra olika saker beroende på vad som är sant eller falskt, och hur vi med vissa metoder kan få datorn att upprepa sig själv.</p>
            <p>Därför kan vi säga redan nu att vi kan göra alla möjliga slags program eftersom vi redan täckt alla fem grund&shy;instruktionerna!<br/>
            Men såklart vill vi ju snygga till koden och lära oss roligare saker som att rita saker på skärmen för att skapa spel och appar, eller
            hantera saker som musklick och tangent&shy;tryckningar.</p>
            <p>Med andra ord har vi fortfarande mycket att lära oss. I nästa lektion ska vi titta mer på upprepningar och hur vi kan skriva dem på
            mer lättförståeliga sätt så att vi inte behöver bli snurriga i skallen med rekursion.</p> 
',
            'showImage' => 'knacke_thumbsup.png'
        ));
        Section::create(array(
            'sectionID' => 600,
            'lessonID' => 6,
            'orderInLesson' => 1,
            'contentsHTML' => '<p>Vi har tittat på två sätt att få datorn att upprepa saker: det ena var att vi skapade funktioner som "delade
            upp" arbetsbördan i mindre delear. Det andra var rekursion, som handlade om att vi har bara en funktion, men som anropar sig själv
            tills vi når ett basfall.</p> 

            <p>Problemet med det första sättet är att vår kod blir snabbt ganska lång med en massa funktionsanrop, och om vi bestämmer oss för
            att ändra på hur många gånger vi ska upprepa vår sak måste vi gå in i koden och ändra på en massa ställen.<br/>
            Rekursion är bättre men kan ge huvudvärk i mer komplicerade fall om vi försöker följa programmets flöde. Dessutom är inget av sätten
            ett bra alternativ om vi inte vet hur många gånger något ska upprepas, som exempelvis knapptryckningar i spel.</p>
',
            'showImage' => 'corkscrew.jpg'
        ));
        Section::create(array(
            'sectionID' => 601,
            'lessonID' => 6,
            'orderInLesson' => 1,
            'contentsHTML' => '<p>Vi behöver alltså ett kort men effektivt sätt att uttrycka upprepade händelser på. Till vår räddning har vi
            något som kallas <strong>loopar</strong> (ibland kallat <i>slingor</i>).</p>
            <p>En loop är en kombination av tre saker: en bit kod som är det vi ska upprepa (självklart), ett begynnelse&shy;tillstånd och ett
            villkor.</p>
            <p>Idén är att vi upprepar koden så länge som villkoret är sant (eller falskt). När vi når den sista raden i koden kontrolleras villkoret,
            och om det då fortfarande är sant hoppar flödet till den första raden av koden som vi skulle upprepa.</p>
            <p>Det där med begynnelset&shy;illstånd är lite svårt att förklara just nu, men det kommer nog klarna när du får se på kodexempel.</p>
',
            'showImage' => 'loop.png'
        ));
        Section::create(array(
            'sectionID' => 602,
            'lessonID' => 6,
            'orderInLesson' => 2,
            'contentsHTML' => '<p>Den simplaste formen av loopar vi kan skriva är <code><strong>while</strong></code>-loopen. While betyder
            "så länge som", så den här typen av loopen uttrycker att vi vill köra något "så länge som" ett villkor gäller.</p>
            <p>Loopen består precis som <code><strong>if</strong></code>-satsen av ett huvud och en kropp. I huvudet placerar vi vårt
            villkor, och i kroppen det vi vill ska upprepas.</p>
            <p>I exemplet till höger har jag skrivit en loop som gör en utskrift 10 gånger. För att hålla reda på hur många gånger vi har skrivit
            ut använder jag en variabel <tt>times</tt> vars värde sätts till 0 innan loopen.</p>
            <p>Loopens villkor är att köra så länge som <tt>times</tt> är mindre än 10. I loopens kropp måste vi se till att detta fall faktiskt kommer
            uppstå genom att inkrementera variabeln varje gång vi skriver ut något.</p>
            <p>När koden körs första gången tittar alltså villkoret på om <tt>times</tt>, det vill säga 0, är mindre än 10. Detta är sant, så loopens
            kropp körs, där vi skriver ut och inkrementerar <tt>times</tt>. Sedan kontrolleras villkoret, som nu är <tt>1 &lt; 10</tt>, vilket är
            sant så loopens kropp körs.</p>
            <p>Så håller det på tills <tt>times</tt> är lika med 9. Den här gången inkrementerar vi <tt>x</tt> så att det får värdet 10, men den här gången
            är villkoret falskt (10 är inte mindre än 10), så loopens kropp hoppas över och vi fortsätter på raden efter loopens kropp.</p>
',
            'code' => 'var times = 0;
while (times < 10) {
    println("Hello");
    times++;
}
println("Finished");
'
        ));
        Section::create(array(
            'sectionID' => 603,
            'lessonID' => 6,
            'orderInLesson' => 4,
            'contentsHTML' => '<p>Det är väldigt viktigt att villkoret någon gång blir falskt så att loopen kan avslutas.<br/>
            Om vi tar bort satsen som inkrementerar <code>times</code> kommer villkoret vara sant förevigt och programmet fortsätta
            att skriva ut <tt>Hello</tt> i all evighet (eller rättare sagt, tills din dator blir överhettad och dör, så gör inte detta).</p>
            <p>Om du märker att du fått en sådan här <strong>oändlig loop</strong> här på Kodknackaren kan du avsluta kodkörningen genom att trycka på
            <span class="icon-stop red"/> för att stoppa programmets körning.</p>
',
            'code' => 'var times = 0;
while (times < 10) {
    println("Hello");
}
println("Finished");
'
        ));
        Section::create(array(
            'sectionID' => 604,
            'lessonID' => 6,
            'orderInLesson' => 5,
            'contentsHTML' => '<p>I den här övningen ska du skriva en funktion <code>stringCountdown()</code> som tar ett heltal <tt>n</tt>
            som parameter. Funktionen ska returnera en sträng med alla tal från <tt>n</tt> till 0, exempelvis</p>
            <code>countdown(10)</code> ska returnera strängen <tt>"109876543210"</tt>.</p>
            <p>I kodmodulen har jag redan definierat en variabel åt dig som du kan använda för att bygga upp retursträngen på. Om du behöver
            kan du definiera fler hjälpvariabler.</p>
',
            'code' => 'function stringCountdown(n) {
    // the string that will be returned.
    var returnString = "";  // start with an empty string
    
    while( ? ) {
        ?
    }
    return returnString;
}'
        ));
        Section::create(array(
            'sectionID' => 605,
            'lessonID' => 6,
            'orderInLesson' => 6,
            'contentsHTML' => '<p>Loopar som upprepar saker ett visst antal gånger följer alltid samma mönster: vi har ett starttillstånd,
            ett villkor och något som ska hända för att vi till slut ska avsluta loopen.</p>
            <p>Starttillståndet och inkrementeringen av variablerna känns onödiga att ha som extra rader, så därför finns det en annan sorts 
            loop som kallas för <strong><code>for</code></strong>-loopen där båda dessa, samt villkoret finns på samma rad.</p>
            <p>Syntaxen är som följer:</p>
            <code><strong>for</strong> (starttillstånd; villkor; inkrementering) {
    // satser
}</code>
            <p>I kodmodulen ser du hur vi kan räkna från 0 till 100 med hjälp av en <strong><code>for</code></strong>-loop:</p>
',
            'code' => 'for (var count = 0; count <= 100; count++) {
    println(i);
}'
        ));
        Section::create(array(
            'sectionID' => 606,
            'lessonID' => 6,
            'orderInLesson' => 7,
            'contentsHTML' => '<p>När jag säger inkrementering i dessa fallen menar jag inte bara en ökning med ett utan en ökning eller minskning
            som kan vara hur stor eller liten som helst, så länge den inte är noll för då får vi ju en oändlig loop.</p>
            <p>Här är ett program som räknar från 100 till 0 i steg om 10:</p>
',
            'code' => 'for (var i = 100; i >= 0; i -= 10) {
    println(i);
}'
        ));
        Section::create(array(
            'sectionID' => 607,
            'lessonID' => 6,
            'orderInLesson' => 8,
            'contentsHTML' => '<p>Här är ett exempel på ett fall där vi kan använda oss av nästlade loopar.</p>
            <p>Funktionen <code>printTriangle()</code> tar emot ett heltal <tt>height</tt> och ritar ut en triangel med asterisker (<tt>*</tt>) som
            har höjden <tt>height</tt>.</p>
            <p>Den yttre loopen håller reda på vid vilken rad (höjd) vi befinner oss i för tillfället. Den körs så länge <tt>row</tt> är mindre
            än eller lika med höjden vi skulle ha, alltså <tt>height</tt>.</p>
            <p>Den inre loopen håller reda på vilken stjärna vi ska skriva ut i raden. Den körs så länge <code>star &lt; row</code>, och eftersom <tt>row</tt>
            får ett nytt värde för varje varv i den yttre loopen får vi det resultat vi vill ha.</p>
            <p>Vi måste lägga till en radbrytning när den inre loopen har körts klart så att vi kan påbörja nästa i triangeln rad när <tt>row</tt> fått ett nytt värde.</p>
',
            'code' => '
function printTriangle(height) {
    for (var row = 1; row <= height; row++) {
        for (var star = 0; star < row; star++) {
            print("*");
        }
        println("");
    }
}

printTriangle(5);'
        ));
        Section::create(array(
            'sectionID' => 608,
            'lessonID' => 6,
            'orderInLesson' => 9,
            'contentsHTML' => '<p>De loopar vi har sett sådana att vi har uttryckt dem som "kör så länge detta är sant". Men det finns också tillfällen
            där vi vill köra loopen ett antal gånger som vi inte vet, och sedan bryta när något villkor gäller istället.</p>
            <p>Det visar sig faktiskt vara ett av användnings&shy;områdena för oändliga loopar som vi såg tidigare. Eller nästan: vid en första anblick
            verkar den här loopen oändlig på grund av villkoret <code><tt>true</tt></code> (som ju alltid är sant, förstås). Men på grund av att vi
            har med en <code><tt>break</tt></code>-sats inuti ett villkor finns det en chans att vi någon gång kommer ur loopen.</p>
            <p>Koden frågar användaren efter någon indata som den sedan bara skriver ut på skärmen. Om användaren skriver in <tt>exit</tt>
            bryts loopen.</p> 
            <p><strong>Exemplet fungerar inte just nu</strong></p>',
            'code' => '
while (true) {
    var input = prompt("Enter somtething");
    if (input == "exit") {
        break;
    }
    else {
        println("You typed: " + input);
    }
}'
        ));
       Section::create(array(
            'sectionID' => 609,
            'lessonID' => 6,
            'orderInLesson' => 10,
            'contentsHTML' => '<p>Collatz\' problem är ett välkänt problem inom matten som utgår ifrån en räknelek. Reglerna i leken är som följer:</p>
            <ol>
                <li>Du ger mig (datorn) ett positivt heltal <tt>n</tt>.</li>
                <li>Om <tt<n</tt> är jämnt, dividera det med 2 för att få ett nytt tal.<br/>
                Om <tt>n</tt> är udda, multiplicera det med 3 och lägg till 1 för att få ett nytt tal.</li>
                <li>Upprepa steg två tills du nått talet 1.</li>
            </ol>
            <p>Collatz förmodade att oavsett vilket <tt>n</tt> vi skickar in får vi alltid 1 till slut om man följer reglerna ovan. Men efter snart 100 år
            har man ännu inte lyckats bevisa att detta är sant.</p>
            <p>Du ska skriva en funktion <tt>collatzSequence()</tt> som tar emot en parameter <tt>n</tt> och returnerar talsekvensen som uppstår om man följer
            reglerna ovan som en komma-separerad lista.</p>
            <p>Exempelvis ger leken med <tt>n=5</tt> talföljden 5, 16, 8, 4, 2, 1. Du ska alltså då returnera strängen <tt>"5,16,8,4,2,1,"</tt>.</p>
            <p>Du får använda dig av vilken looptyp du vill och strukturera loopen hur du vill, bara funktionen räturnerar rätt värde på strängen</p>',
            'code' => 'function collatzSequence( n ) {
    var returnString = "";

    return returnString;
}'
        ));
        Section::create(array(
            'sectionID' => 610,
            'lessonID' => 6,
            'orderInLesson' => 11,
            'contentsHTML' => '<p>Otroligt! Efter sex lektioner har du klarat alla övningarna än så länge. Du är redan på väg att bli en god programmerare.</p>
            <p>Allt som du har lärt dig hittills är faktiskt tillräckligt för att vi ska kunna bygga upp ett litet spel, vilket du ska få se i nästa lektion.
            Där kommer vi blanda allt möjligt: villkors&shy;satser, loopar, indata från användaren och grafik.</p>
            <p>Låter det spännande? Vi ses där!</p>',
            'showImage' => 'knacke_thumbsup.png'
        ));
        Section::create(array(
            'sectionID' => 611,
            'lessonID' => 7,
            'orderInLesson' => 1,
            'contentsHTML' => '<p>Hämta Robert.</p>',
            'showImage' => 'knacke_thumbsup.png'
        ));
    }
}

?>