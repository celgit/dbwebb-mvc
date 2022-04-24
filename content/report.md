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
  #### _FRÅGA_
  *SVAR.*
  #### _FRÅGA_
  *SVAR.*
  #### _FRÅGA_
  *SVAR.*
  #### _FRÅGA_
  *SVAR.*
  #### _FRÅGA_
  *SVAR.*

### Kmom06 - Automatiserad test
  #### _FRÅGA_
  *SVAR.*
  #### _FRÅGA_
  *SVAR.*
  #### _FRÅGA_
  *SVAR.*
  #### _FRÅGA_
  *SVAR.*
  #### _FRÅGA_
  *SVAR.*

### Kmom10 - Slutprojekt
  #### _FRÅGA_
  *SVAR.*
  #### _FRÅGA_
  *SVAR.*
  #### _FRÅGA_
  *SVAR.*
  #### _FRÅGA_
  *SVAR.*
  #### _FRÅGA_
  *SVAR.*