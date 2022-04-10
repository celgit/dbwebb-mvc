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

### Kmom03 - Enhetstestning
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

### Kmom04 - Autentisering
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