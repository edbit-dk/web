# Mouritz Auktioner lol
Mouritz.com Praktisk Web opgave fra SDE

<br>
###Niveau

Rutineret - [Underforståede krav til opgaven](http://www.cvkweb.dk/wi/doku.php?id=hovedforlob:praktiskweb:underforstaedekrav)

<br>
###Fokus
I denne opgave, for Mouritz.com skal du lade dig inspirere af eksisterende auktions-sites, såsom qxl.dk, lauritz.com mfl. Læg mærke til brugervenlighed og brugeroplevelse, og brug de elementer du finder gode og relevante. Tilpas gerne med egne ideer, men tænk hele tiden over hvordan du vil argumentere over for kunde.

En grafiker vil på et senere tidspunkt assistere Mouritz.com vedrørende deres grafiske profil og udtryk, så din primære opgave på dette stadie er at designe interaktions-delen, så den er så brugervenlig og smidig som muligt.

Sitet skal selvfølgelig have et logo og nogle pæne menuer, men undlad at bruge for meget tid på Photoshop og grafisk layout/udtryk.

Sørg for at holde fokus på navigation, brugervenlighed og brugeroplevelse. Tænk hele tiden over, hvordan du kan gøre interaktionen nemmest mulig for brugeren. Brug gerne elementer som JQuery UI til at højne brugervenligheden, men undlad at bruge det….bare for at bruge det!. Overvej om det kan hjælpe brugeren, og implementer det kun, hvis det giver mening i den sammenhæng.

<br>
###Krav
Udover selve opgaven er der følgende krav:

* Der afleveres et databasediagram lavet i Dia i roden af websitet
* Der afleveres et mockup lavet i Prototyper i roden af websitet
* Der skal være client side validering på alle forms.
* Der skal være server side validering på alle forms.
* Der skal være tilbagemelding på det man foretager sig (UI beskeder).
* Der skal bruges mysqli

<br>
##Opgave
###Introduktion

Som kunde skal Mouritz.com have designet og programmeret deres ny auktions-site.

Din opgave er at planlægge, designe og programmere interaktions-delen af sitet fra start til slut.

Mouritz.com er meget opmærksomme på brugervenlighed og ønsker et auktions-site, som ingen brugere vil være i tvivl om, hvordan de skal benytte.

På Mouritz.com skal man kunne oprette sig som bruger, logge ind, hvorefter man har adgang til at købe, sælge og kommentere på produkter/auktioner.

###Udførelse af opgaven

Det er vigtigt at du gør dig nogle overvejelser omkring de enkelte undersider og layout af databasen, FØR du går i gang med at kode. Tænk grundigt over strukturen og relationerne imellem dine tabeller, så du så tidligt som muligt kan tage højde for eventuelle problematikker i forhold til kategori-inddeling, bud på auktioner, start og sluttidspunkter osv.

En god ide vil være at tegne de enkelte sider på et stykke papir og notere hvilken funktionalitet de skal indeholde. Tegn samtidig dit database-layout, det vil give dig et meget bedre overblik over eventuelle udfordringer.

Selvom det kan være svært at forudse, så forsøg at lave en lille tidsplan, del opgaven op i små underopgaver, og dan dig et overblik over hvornår du regner med at være færdig med de enkelte punkter i opgaven. Det vil hjælpe dig til at fokusere på udførsel, fremfor om du er foran eller bagud.

Vigtigst af alt….hold hovedet koldt! …brug ikke tid på at stresse, det betaler sig aldrig!

###Forside

Forsiden skal indeholde en overskuelig oversigt/menu over produktkategorierne. Find 5 passende kategorier, efter eget valg. Der skal være et søgefelt, med mulighed for at søge efter produktnavn på igangværende auktioner. Tænk over hvordan du præsenterer søgeresultater for brugeren.

På forsiden skal også vises de tre nyeste auktioner, samt de tre auktioner der er tættest på at slutte. Overvej nøje hvordan du vælger at præsentere auktionerne på forsiden. De skal både være indbydende og indeholde relevante oplysninger.
Auktioner

Det skal være muligt at se auktionerne for hver enkelt produktkategori. Auktionerne skal præsenteres i en god og overskuelig liste for brugeren. Benyt internettet til at finde inspiration til, hvordan andre web sites har valgt at gøre det. Det skal være muligt at vælge en auktion som man ønsker at se detaljer om / byde på.

Listen skal som minimum indeholde følgende:

* Overskrift
* Startdato for auktionen
* Slutdato for auktionen
* De første 80 karakterer af beskrivelsen
* Navnet på brugeren der har oprettet auktionen
* Lille billede (hvis der er et tilknyttet auktionen)

###Auktionsdetaljer

Denne side skal vise detaljerne om den auktion som brugeren har valgt. Det skal være muligt at se de afgivne bud samt navnet på brugeren der har afgivet det. Derudover skal det højeste bud være fremhævet. De relevante detaljer om varen skal vises på siden så man ikke er i tvivl om, hvad det er man byder på.

Det skal være muligt at byde på varen, hvis man er logget ind. Enten i form af et bud, som er højere end de eksisterende bud eller også ved at købe varen med ”Køb nu”-prisen. Hvis ”Køb nu”-prisen bydes vinder man automatisk auktionen.

###Opret auktion

Når man er logget ind som bruger skal man have mulighed for at oprette en auktion. Her skal det som minimum være muligt at udfylde følgende:

* Billede
* Produktkategori
* Overskrift/Produktnavn
* Beskrivelse
* Startdato for auktionen
* Slutdato for auktionen
* Startpris
* ”Køb nu”-pris.

###Opret bruger

For at kunne byde på auktionerne skal man være logget ind som en bruger. Opret bruger formularen skal som minimum indeholde følgende:

* Email
* Navn
* Adresse
* Post nr
* By
* Tlf
* Brugernavn
* Kodeord