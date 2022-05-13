Redovisning
==========================
### Kmom01 - Ramverk
  #### _Berätta kort om dina förkunskaper och tidigare erfarenheter kring objektorientering._
  *Jag har stött på det i arbetet tidigare och fick anställning som utvecklare i juni 2021, sen dess har jag arbetat i php, objektorienterad php, med symfony och mysql/mariadb sen dess. Känner dock fortfarande att jag är junior på det, men kan mer nu än för ett år sen.*
  #### _Berätta kort om PHPs modell för klasser och objekt. Vilka är de grunder man behöver veta/förstå för att kunna komma igång och skapa sina första klasser?_
  *Konceptet är som följande: En klass är en mall för objekten. t.ex. Frukt, eller Bil, eller hus. Objekten i sin tur är instanser som bygger på mallen, t.ex. en Apelsin är en frukt och har egenskaperna och funktionerna definerade i Frukt-klassen, samma sak med en BMW och dess relation till Bil-klassen.*
  #### _Reflektera kort över den kodbas, koden, strukturen som användes till uppgiften me/report, hur uppfattar du den?_
  *Den är mindre komplicerad än tidigare moment, inte heller helt "kompatibelt" i den bemärkelsen att mycket kunde användas, försökte ett par ggr men kändes som det blev för komplicerat att rensa och anpassa att jag gick mer efter genomgångsvideosarna ist. Känslan, något jag går mycket efter, är att den inte verkar allt för oförstålig.*
  #### _Med tanke på artikeln “PHP The Right Way”, vilka delar in den finner du extra intressanta och värdefulla? Är det några särskilda områden som du känner att du vill veta mer om? Lyft fram några delar av artikeln som du känner mer värdefulla._
  *Jag kikade övergripande och skummade genom första delarna, gick dock inte ner i detalj eller lade för mycket lästid. Jag kände dock att jag borde läsa den mycket närmare iom att jag faktiskt jobbar med det. Ska se om jag kan få tid till det närmaste tiden. Har inget direkt att lyfta fram om det men tycker ändå att det verkar bra att den är community-driven, dvs som open-source, det gör den mer aktuell än hur det hade varit annars. Alla kan bidra etc.*
  #### _Vilken är din TIL för detta kmom?_
  *Att man kan starta en mini-webb-server direkt i terminalen, det var smidigt! (det var dock inte lika enkelt att döda processen om man startat den i bakgrunden).*

### Kmom02 - Objektorientering
  #### _Förklara kort de objektorienterade konstruktionerna arv, komposition, interface och trait och hur de används i PHP._
  *Arv är när en klass ärver en annan, det innebär att allt från första klassen blir tillgängligt för den som ärver så den inte behöver ha samma metoder. Komposition är en annan typ av relation. När klass B ärver klass A är den en klass A, men när i komposition har klass A en klass B, som t.ex. att en bil har en motor, där bil är klass A och motor klass B.*
  *Interface är en spec över vilka metoder alla klasser som implementerar interfacet lovar att ha. Interfacet talar om för anropare vad klasserna som följer det har att erbjuda.*
  *Ett trait är en typ av funktion/metod som flera klasser kan använda sig av, som gemensamma moduler. Om flera klasser har nytta av att använda en metod som hämtar data från extern länk, då kan man använda ett gemensamt trait ist för att uppfinna hjulet i varje klass.*
  #### _Berätta om din implementation från uppgiften. Hur löste du uppgiften, är du nöjd/missnöjd, vilken förbättringspotential ser du i din koden och dina klasser?_
  *Jag fann uppgiften helt otroligt överjävligt enorm till att börja med. Grunden i min lösning är att jag skapade en klass Deck, som innehåller klassen Card. Det är decken som har ordning på suits å valörer å sånt, card har bara koll på att den har en suite, en valör och en färg.*
  *Jag började göra en klass för playerHands, men tiden räckte inte till, det fick bli en vanlig deck.*
  *Jag är dock väldigt nöjd med hur mina metoder för att bygga upp de olika decksen, när man t.ex. dra kort etc*
  *Tycker dock det var lite kasst att man fick lägga tid på att designa korten med css då det tog viktig tid från det som denna kursen eg. handlar om.*
  *Det finns mycket man kan göra i min klass för att förbättra, man kan bryta ner metoderna ner och göra de mindre och simplare samt skapa en klass för händerna.*
  #### _Berätta hur det kändes att modellera ett kortspel med flödesdiagram och psuedokod. Var det något som du tror stödjer dig i din problemlösning och tankearbete för att strukturera koden kring en applikation?_
  *Skippade denna biten då det blev för mycket, efter förslag från Mos i discord. Hela momentet var för stort och han sa att vi skulle skjuta på den biten.*
  *Kan dock ändå säga att pseudo-kod och konceptualisering är ändå bra då PO:s och kunder inte pratar programmering, man måste beskriva applikationen på ett bra sätt som även de förstår, då är pseudokod riktigt bra.*
  #### _Vilken är din TIL för detta kmom?_
  *Sessions-hanteringen tror jag att jag lärde mig, men det var riktigt krångligt. Sen lärde jag mig också att en redirekt kan hjälpa i de fall där man vill ta med sig datan in i adressfältet.*

### Kmom03 - Kortspel 21
  #### _Berätta hur det kändes att modellera ett kortspel med flödesdiagram och psuedokod. Var det något som du tror stödjer dig i din problemlösning och tankearbete för att strukturera koden kring en applikation?_
  *Jag tror absolut att det är användbart. Vi gör något liknande på jobbet när vi ska skapa någon funktion eller större grej (även mindre), att man specar ner vad man vill ha för funktioner och regler för dessa, så man slipper ha dem i huvudet och kan gå tillbaka och checka av på listan etc.*
  *Jag tror att ett diagram specifikt och lite pseudokod är bra verktyg för att kommunicera med folk som inte är utvecklare eller så tekniska, bara för att förklara vilket flöde och bekräfta att man är på samma spår kring hur det man utvecklar ska bli i slutändan. Sen är det viktigt att det är en levande del,*
  *dvs att man uppdaterar allteftersom (det gjorde jag förvisso inte här i efterhand, men det berodde på tidsfrist å hur stor uppgiften var.*
  #### _Berätta om din implementation från uppgiften. Hur löste du uppgiften, är du nöjd/missnöjd, vilken förbättringspotential ser du i din koden, dina klasser och applikationen som helhet?_
  *Jag hade lite ambitiösare planer först, att man skulle färkoda poängen för att visa om man får stanna eller om man är busted men det fungerade inte som jag ville när man skulle tänka på att ess är 1 eller 14, å ville inte fastna i smådetaljer som eg bara är nice-to-have, struntade därför i det.*
  *Jag valde i slutändan att ha en klass för kontrollern, en klass för deck, en för kort och en för Hand. Funderade på om jag skulle bryta ut mer kod ur kontrollern men tycker ändå att hanteringen av allt kan vara där.*
  *När jag var klar med koden började jag använda php-storms inbyggda funktion som är att "break out method", även om de metoderna hamnade i controllern tycker jag ändå att de passar bättre där än i de andra klasserna.*
  *Jag är överlag nöjd med hur det blev, även om det inte, designmässigt, blev någon höjdare.*
  #### _Vilken är din känsla för att koda i ett ramverk som Symfony, så här långt in i kursen?_
  *Syomfony verkar trevligt, har inte haft några direkta problem med ramverket som så, det har snarare varit storleken på uppgifterna och hur komplexa de blir i förhållandevis till hur mycket hjälp man fick att komma igång.*
  *Vet att vi har symfony på sina ställen på jobbet också, men är inte så insatt i exakt var utan bara sett det i förbifarten. Har inga negativa känslor om det.*
  #### _Vilken är din TIL för detta kmom?_
  *Det är inte någon specifik sak utan att jag börjar få mer kläm på twig-filer, hur de hanterar saker och ting (och inte hanterar, som argument till funktioner, vad jag kunde finna iaf (sökte bara en stund), men även hur sessionerna fungerar lite närmare.*


### Kmom04 - Unittestande
  #### _Berätta hur du upplevde att skriva kod som testar annan kod med PHPUnit och hur du upplever phpunit rent allmänt._
  *Jag gillar det skarpt. När jag skrev koden saknade jag testerna då jag skriver mycket tester i mitt jobb. Var speciellt svårt att testa de olika vinnar-utfallen manuellt, när man t.ex. ville specifikt ha ett ess och fick fortsätta tills man fick det, var ju otroligt mycket enklare med tester, vilket jag kände på mig, men ville vänta tills vi fick hjälp med uppsättningen i just vår miljö.*
  *Är redigt imponerad av täckningsrapporten, den hjälper ju även till att visa vilka scenarios man ev. missat, mycket bra verktyg, ska visa folk det på jobbet tänkte jag.*
  #### _Hur väl lyckades du med kodtäckningen av din kod, lyckades du nå mer än 90% kodtäckning?_
  *Jag har 4 klasser + kontrollern, skippade kontrollern men har 100% täckning på huvudklasserna, är riktigt nöjd med det.*
  #### _Upplever du din egen kod som “testbar kod” eller finns det delar i koden som är mer eller mindre testbar och finns det saker som kan göras för att förbättra kodens testbarhet?_
  *Då jag, som jag nämnde ovan, skriver en del tester på jobbet har jag alltid tester i åtanke när jag skapar metoder, jag tänker alltid att det jag skriver ska gå testa. Nu började jag ju förvisso med en stor kontroller som var omöjlig att testa men det var enkelt att bryta ut det som skulle bli game-klassen när jag hade ett fungerande koncept.*
  *Card-, deck- och hand-klasserna var oerhört lätta att testa då jag hållt metoderna väldigt simpla i dem och försökte hålla metoderna till enfunktionella så att säga.*
  #### _Valde du att skriva om delar av din kod för att förbättra den eller göra den mer testbar, om så berätta lite hur du tänkte._
  *Ja, jag skapade en game-klass av stora delar av kontrollern för att kunna testa det. T.ex. hur man tog fram vinnaren ville jag verkligen testa då det var ett helvete att göra manuellt. Visste även att jag hade en bugg där. När jag skrivit testet failade det men jag visste att det skulle gå genom eg, så jag kikade på metoden, fixade den, fick grönt test å gick vidare till nästa scenario, då faila det, då insåg jag att jag fick skriva om metoden helt vilket rensade bort en hel del rader och komplexitet, blev riktigt bra tillslut!*
  *För att göra kod testbar ska man anta att man blir dement när man stänger ner datorn och behöver läsa på vad metoderna gör igen, på så vis tvingas man skriva små och enkla metoder och därmed även testbar kod. Det är iaf så jag tänker.*
  #### _Fundera över om du anser att testbar kod är något som kan identifiera “snygg och ren kod”._
  *Ja, definitivt, det hjälper till att hålla metoderna små och lätta att arbeta med. Det är dock inte allt som gör det, man måste även namnge sakerna på ett läsbart och logiskt sätt, för en person som inte nödvändigtvis är utvecklare själv.*
  #### _Vilken är din TIL för detta kmom?_
  *Att man kan få fram en täckningsrapport med phpunit, det var riktigt användbart!*

### Kmom05 - ORM/Databas
  #### _Gick det bra att jobba igenom övningen med Symfony och Doctrine. Något särskilt du tänkte/reagerade på under övningen?_
  *Det gick sådär i början. Började nämligen med mariadb iom att vi haft det i tidigare kurser och övningen fungerade inte, den saknade entity-biten, så det gick inte följa den. När jag sen växlade över till sqlite fungerade det, å noterade direkt vad som saknats i den andra. Kan dock tycka att sqlite i detta fallet duger gott.*
  *Utöver det gick det fint. Hade lite problem med updatering av boken, id:t klagades det på hela tiden, trots att det skickades med, tills jag satte den inputen i formuläret till "hidden", ingen aning om varför det skulle få det fungera men det gjorde det (#haxx0r).*
  #### _Berätta om din applikation och hur du tänkte när du byggde upp den. Tänkte du något speciellt på användargränssnittet? Gick det bra att jobba med ORM i CRUD eller vad anser du om det?_
  *Jag utgick från övningens metoder, när jag lade in dem i report-projektet valde jag ist att ändra begreppet "product" till book och sen såg jag till att alla fungerade som det skulle.*
  *Därefter var det bara att skapa twigs, fylla på dem med data och börja pussla. Det gick fint att använda kunskap och lösningar från tidigare moment vilket gjorde arbetet, när jag väl kom över problemen jag hade med övningen ovan, flöt på väldigt bra.*
  *Först gjorde jag en sida med länkar till de olika funktionerna men kom snabbt på att det inte är så en sida bör fungera. Förstod inte heller först varför ni ville ha en tabell med böckerna men det myntet föll ner tillslut. Innan jag skapade detalj-sidorna om varje bok hade jag all info på "alla böcker"-sidan, sen var det bara att flytta in det till undersidor jag länkade till ist.*
  *Därefter snyggade jag till det med knappar och liknande för de olika funktionerna. Tänkte först ha dem inne på varje bokdetaljssida men det blev bättre i översikten. Höll det simpelt.*
  #### _Berätta om du gjorde (delar av) extrauppgiften med användare och login._
  *Valde att inte göra den nu, men kommer snegla på den efter kursen är slut då jag har ett projekt där jag vill använda mig av den funktionaliteten.*
  #### _Vad är din uppfattning om ORM så här långt och relatera gärna till andra sätt att jobba med applikationskod mot databaser?_
  *Jag kan se fördelen i organisationer där utvecklarna inte kan sql och man vill ha de två språktyperna isär, men utöver det föredrar jag att ha det som vi har det på jobbet, sql:en direkt i koden, man har mycekt mer kontroll då..*
  *Vi kör dock med datamappers etc för att segrera funktionaliteten och hålla isär saker å ting.*
  *Det var dock oerhört smidigt att den skapade alla filer för sidan, twigs, kontroller, klasser etc, riktigt smutt, det gillade jag skarpt! Det kommer jag def använda i mitt sidoprojekt sen :)*
  #### _Vilken är din TIL för detta kmom?_
  *Hur doctrine fungerar i den bemärkelsen att den kan skapa mycket av koden automatiskt, mycket av den vanliga koden som ändå alltid är på ett visst sätt, som grunden i kontrollern, klasserna med setters å getters etc. Mycket smidigt! Man får ju även start på routen å liknande.*

### Kmom06 - Automatiserad test
  #### _Hur uppfattade du verktyget phpmetrics och fann du några särskilda bitar mer värdefulla än andra? Var det några särskilda metrics eller bilder du uppskattade?._
  *Oerhört bra verktyg!*  
  *Det mest värdefulla här tycker jag är html-rapporten, jag gillar det oerhört mycket, smidigt att generera samt lätt att gå genom.*  
  *Violations var nice, där kan man se om man gjort något knas med eller liknande. Även coupling å det var intressant. Relations var väl det jag inte fann så givande.*
  #### _Berätta hur det gick att integrera med Scrutinizer och vilken är din första känsla av verktyget och dess badges? Vilken kodtäckning och kodkvalitet fick du efter första bygget?_
  *Det gick bra, men config-filen fungerade inte alls. När jag integrera den först hade jag ingen config, då fungerade det, men sen när jag skulle använda den som mos gav oss fungerade det inte, den började då testa vendor å all annan skit som gav riktigt låga poäng..*
  *Jag luskade fram den configen som användes när det gick, å kombinerade dem, då gick det bättre, coverage vill den dock inte sammarbeta med, men jag vet att jag har 100% testtäckning.*
  *Badges, ja, det är väl smidigt men jag ser det eg. som "floskler" som är bra för investerare, den som använder sidan skiter i hur kodkvaliten ser ut, bara det fungerar som det ska, å den som skriver koden är ju inte på sidan och ser dem ändå, den vet ju hur koden är.*  
  *Mitt första bygge gav ett betyg på 9.93.. Fick den till 10.0 när jag fick ordning på configen. Även om coverage är helt galet snett.*
  #### _Hur är din egen syn på kodkvalitet, berätta lite om den? Tror du man kan man påvisa kodkvalitet i någon viss mån med badges eller vad tror du?_
  *Jag tycker det är oerhört viktigt. Brukar tänka att jag ska skriva koden så lättläst att om jag blir dement innan nästa gång jag såg ser den igen ska jag ändå kunna förstå den. Det ska även vara lätt att testa så man kan lita på det.*
  *När jag gått genom dessa frågor och uppgiften kom jag på en viktig sak för kodkvaliten, verktygen vi har arbetat med här är ju bra när man är klar med grejjerna. Dock är det bättre att ha en bra IDE, jag sitter i phpstorm och den varnar mig om jag gör något som inte är bra kod, den säger t.ex. till att deklarera en variabel å sen direkt returnera den är sämre än att bara returnera det man sätter variabeln till. Det är otroligt hjälpsamt. Tror inte jag hade fått lika bra kod i notepad. Men man ska använda så mycket verktyg man kan, för att kunna fokusera på själva funktionerna som ens app / sida ska göra.*
  #### _Vilken är din TIL för detta kmom?_
  *Hur man får fram en rapport med phpmetrics och hur man kopplar scrutinizer till git.*

### Kmom10 - Slutprojekt
  #### _För varje krav du implementerat, dvs 1-3, 4, 5, 6, skriver du ett textstycke om ca 5-10 meningar där du beskriver hur du löste kravet._
  ### _Struktur och innehåll_
  *Inga konstigheter här, lade upp routes till /proj och /proj/about och fyllde på med länkar och text. Värt att nämna om about är dock att enda sättet jag fick länkar till phpmetrics och phpdocs var att flytta de mapparna till public-mappen, innan dess ville de inte. Lade även in lite css-stuff så de hamnar på rad horisontellt.*
  ### _Databas med ORM_
  *Skapade en db med orm enligt övningen i momentet och det gick fint. Hade lite bök med att book-övningsdatat inte ville hålla sig i en separat db, så de ligger numera i samma db fast olika tabeller.*
  *För reset-delen tänkte jag först åbrokalla migrate-biten men den skapar ju nya filer varje gång så det gick inte, slutade med att jag skapade metod som skapar en sql, sen gick jag in i databasen med DBeaver och kopierade de befintliga raderna som sql insert och klistrade in i metoden, när jag sen anropar den routen som i sin tur anropar metoden återställs databasen genom att den först töms och sen insertas datat. Fungerar fint! Lade även till en popup där man får bekräfta, på samma sätt som delete-knappen för varje objekt.*
  ### _Utseende och användbarhet_
  *Här kopierade jag css:filen från grundsidan samt base-twiggen, sen tog jag bort det som inte var relevant och justerade font, färger och lite hur knapparna ser ut.*
  *Projekt-delen fick mer av ett mörkt tema, det är ganska likt reportsidan men tyckte designen var så bra att jag ändå vill göra något liknande här. Är nöjd med designen, det är trots allt inte en designkurs detta.*
  ### _Kodstil_
  *Koden har klarat phpcs utan problem från start.*
  ### _Linters_
  *Phpmd: Den klagar på att jag borde ha mindre än 10 metoder i projektkontrollern, har därför validerat att alla metoder där är routes som faktiskt behövs, ser därför inget sätt att få ner antalet och är nöjd med hur den ser ut*
  *Phpstan: Den hade klagan på massa massa filer som inte hade med projektet att göra, mest med övningar. Jag lade in "ignore next line"-kommentarer där den klagar så det blir grönt å fint. Kollade genom vad den klagade på för projektet, vilket var oftast relaterat till automatiskt genererade symfony-rader, vilket jag känner var något jag inte ville lägga energi på. Tog mig dock tid att kolla på varje påpekan.*
  ### _Enhetstestning & Kodtäckning_
  *Projektsidan är förhållandevis enkel gällande metoder, nästan bara setters å getters, supersimpelt att testa. Den sidan tillsammans med game har 100% testtäckning.*
  ### _Dokumentation_
  *Inga konstigheter här, phpstorm hjälper till, räcker med att jag skriver slash-stjärna-stjärna och den fyller på med resten, simpelt. Gick bra. Var lite krångligt att länka till sidan som sagt men det löste sig när jag flyttade outputen till public-mappen, ändrade även configen så detta sker varje gång man kör composer phpdoc.*
  ### _Metrics_
  *Den har 2 varningar som jag inte väljer att bry mig om, de säger "Stable Abstractions Principle" och google hjälper inte så mycket, bollat lite med Mos i discord också. Eftersom det endast är de 2 förutom nästa grej och sidan har bra score väljer jag att ignorera dem.*
  *Den ger ett fel, den kallar projektcontroller.php ett "god object", det beror på att den har 13 metoder, en udda gräns då alla är rättfärdiga routes-metoder, väljer därför att ignorera detta med. Inga andra fel, har bra score.*
  ### _Git repo och GitHub/Lab_
  *Inga konstigheter här, skickade upp regelbundet till mitt repo, fungerar fint.*
  ### _Scrutinizer_
  *Scrutinizer gav mig ett score på 10.0 för det jag skicka upp, den har dock problem med testandet men det verkar bero på något på servern, den klagar på att en mapp på servern inte finns. Vet att testningen av det vi ska testa är väldigt bra täckt ignorerar jag det.*
  #### _Skriv ett allmänt stycke om hur projektet gick att genomföra. Problem/lösningar/strul/enkelt/svårt/snabbt/lång tid, etc. Var projektet lätt eller svårt? Tog det lång tid? Vad var svårt och vad gick lätt? Var det ett bra och rimligt projekt för denna kursen?_
  *Det gick bra. Jag utgick från vad vi gjort precis innan och tog det lugnt och metodiskt. Jag hade tänkt att göra det jag gjorde som ett litet projekt efter kursen men såg möjlighet att få göra det nu ist. Tänkte från början använda prisjakts api men insåg att jag då måste skicka upp loginuppgifter till publika platser (github / studentservern), vilket inte är ok med tanke på att jag har avtal med prisjakt om access dit. Gjorde därför det enklaste jag kunde komma på för att åstakomma det jag ville ha sidan för, att man har en lista på däckmodeller som man lätt kan använda för att söka fram bra priser på, sen kommer jag lägga in fler däck efter kursen men konceptet av vad jag vill ha finns där. Jag undvek att göra kortspel då jag inte ville fastna i den komplicerade logiken som 21-övningen krävde, har ändå visat att jag klarar det bra genom den övningen så kände att jag inte behövde göra det igen.*
  *Är osäker på om jag tycker det är ett rimligt avslut på kursen. Vissa moment var ju betydligt tyngre än slutprojektet, men så har det ju varit i andra kurser också. Det gick betydligt lättare att göra projektet efter alla momenten, det tog inte ens bråkdelen av samma tid som t.ex. orm-momentet. Hade lite problem med att få sortering av listan att fungera, eget krav, men det var mitt fel, jag hade felsökningssorteringsanrop efter när jag sorterat rätt, så den nollade sorteringen.*
  #### _Avsluta med ett sista stycke med dina tankar om kursen och vad du anser om materialet och handledningen (ca 5-10 meningar). Ge feedback till lärarna och förslå eventuella förbättringsförslag till kommande kurstillfällen. Är du nöjd/missnöjd? Kommer du att rekommendera kursen till dina vänner/kollegor? På en skala 1-10, vilket betyg ger du kursen?_
  *Jag tycker kursen var bra, iaf övningarna, även om vissa av dem var helt enorma och borde skalas ner. Det jag tycker hade varit en bättre ide för kursen är att utgå från den kodbas man gjorde i php-kursen, där man inte körde objektorienterat, då hade man tydligt sett skillnad på kod man började med i en annan kurs å sen få se den växa till något bättre och mer objektorienterat. Det hade varit guld! Annars har jag lärt mig mycket, har t.ex. tagit med mig coverage-biten till jobbet och är riktigt imponerad av phpmetrics etc. Jag arbetar ju med php dagligen vilket kanske gett mig lite försprång här men har ändå lärt mig massa.*
  *Jag rekommenderar lätt kurspaketen jag har läst hos er till folk kring mig, är överlag väldigt nöjd med hur allt fungerat och engagemanget från lärarna, även utanför deras arbetstid, vilket har underlättat för mig som sällan pluggar på dagtid.*
  *Kursen får 7 av 10 från mig, övningarna kunde förbättras lite, vara mer som artiklarna i början var, där man kan följa uppbyggnaden av koden där man förklarar varje del, inte bara mos som sitter å kopierar sig genom övningarna. Övningarna kunde dessutom varit mer knutna till uppgifterna som i tidigare kurser.*