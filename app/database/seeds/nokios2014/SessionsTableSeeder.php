<?php namespace database\seeds\nokios2014;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Sessions\Session;

class SessionsTableSeeder extends \UninettSeeder {

	public function run()
	{
		$this->createSessionsNokios(1);
	}

	private function createSessionsNokios($conferenceId){

		$todays = Carbon::now();

		/**
		 *
		 *  First parallell sessions
		 *
		 */

		Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Kurs 1 - Prosjektveiviseren',
			'description' => 'Det er krevende å gjennomføre digitaliseringsprosjekter på en god måte og det er enda vanskeligere å dokumentere at man tar ut de forventede gevinster. God planlegging er en forutsetning for å iverksette de riktige tiltak og å sikre bedre gjennomføringsevne. Difi lanserte en ny versjon av Prosjektveiviseren.no i 2012. Kurset vil gi en innføring i hvordan prosjektmetodikk og andre virkemidler kan bidra til flere vellykkede digitaliseringsprosjekter. Prosjektveiviseren 2.0. er en anbefalt prosjektmodell for IKT prosjekter i offentlig sektor som blant annet skal styrke planlegging, styringen, kvalitet og gevinstrealisering i offentlige IKT-prosjekter. Prosjektveiviseren er basert på metodikk fra PRINCE2. PRINCE2 er en prosjektledelsesmetode som brukes over hele verden og har sertifisering som anses som beste praksis for gjennomføring av prosjekter. Metodkikken kan tilpasses alle typer prosjekter uavhengig av størrelse, bransje, organisasjonsform, geografi og kultur.',
			'location' => 'Cosmos 3A',
			'category' => 'professional',
			'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 9, 30, 1),
			'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 15, 0),
		]);

		Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Kurs 2 - Porteføljestyring',
			'description' => 'For å sikre god IKT-styring er det behov for gode rutiner og kontroll i alle ledd. Det eksisterer mange ulike «beste praksis» rammeverk som har til formål å bidra til bedre IKT-styring, men ofte med ulik innfallsvinkel.Uansett fagkompetanse internt i et prosjekt-, program-, portefølje-, eller driftsmiljø er man også avhengig klare rolle- og ansvarsdefinisjoner i linjeorganisasjonen for å sikre vellykket styring.
		Under årets NOKIOS konferanse ønsker vi å gå nærmere inn på noen av disse rammeverkene, både for å se på hvordan disse kan bidra til økt kvalitet og hvilke utfordringer man møter. I tillegg til god faglig kompetanse, gjenbruk der dette er hensiktsmessig, og kontinuerlig læring, får vi en god “Styringsmodenhet” slik at vi sikrer at utviklingen av den digitale modenheten går slik vi ønsker. Utviklingen av styringsmodenheten bør bedres i Norge, og her er eksempler på at en konsentrert innsats hjelper. DIFI har etablert et nettverk for virksomheter i offentlig sektor som sammen jobber med å utvikle god praksis. DIFI bidrar inn i dette nettverket med sikte på å spre erfaring og kompetanse mellom virksomheter i offentlig sektor.
		Før Skatteetaten, Husbanken og kommunene presenterer sine erfaringer som viser eksempler på en konsentrert innsats på dette området, vil Ingar Brauti gi en overordnet beskrivelse av porteføljestyring i forhold til forvaltning/daglig drift, en overordnet sammenheng mellom beste praksis rammeverk, samt introduksjon av fem prinsipper, og tolv praksiser i porteføljestyring i henhold til. Management of Portfolios (MoP®)',
			'location' => 'Cosmos 3B',
			'category' => 'professional',
			'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 9, 30, 1),
			'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 15, 0),
		]);


		Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Kurs 3 - Digital post',
			'description' => 'Den nye løsningen for sikker digital post til innbyggerne åpner for ordinær bruk i november. Alle statlige etater som sender post på papir til innbyggere skal ta løsningen i bruk. Regjeringen har satt klare tidsfrister, innen 1. juli 2015 skal etatene legge en plan for å ta løsningen i bruk innen første kvartal 2016. Se pressemelding fra Kommunal- og moderniseringsdepartementet. Difi inviterer til seminar om hvordan din virksomhet kan komme i gang med sikker digital post til innbyggere.',
			'location' => 'Cosmos 3C',
			'category' => 'professional',
			'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 9, 30, 1),
			'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 15, 0),
		]);


		Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Kurs 4 - Brukeren i sentrum - gode argumenter for universell utforming',
			'description' => 'Best mulig for flest mulig! I korthet er dette hva universell utforming (uu) dreier seg om. Ønsker du å øke trafikken på nettstedet ditt, hjelper det derfor å tenke uu. Kunnskapen finnes. Det handler bare om å ta den i bruk! Det er utarbeidet en standard med retningslinjer for tilgjengelig webinnhold (WCAG 2.0). Denne standarden konkretiserer hva det vil si å gjøre nettsider tilgjengelige for mennesker med nedsatt funksjonsevne. Håndhevingen av Diskriminerings- og Tilgjengelighetsloven baseres på WCAG. Oppfyller ikke nettstedet ditt retningslinjene i standarden, kan du bli bøtelagt og dømt til å rette opp feilene. Statistikk viser at hver sjette nordmann har en funksjonshemning. Microsoft har gjennomført undersøkelser som viser at en av to trenger deres tilgjengelighetsfunksjonalitet. Dette betyr at uu ikke dreier seg om å sikre gode løsninger for noen få funksjonshemmede, men om at tilgjengelige løsninger er noe vi alle kan ha glede av. Viktigere enn loven er å forstå at universell utforming gir flere og mer fornøyde brukere. Universell utforming er derfor en tankegang for deg som vil noe mer. For deg som vil sikre god brukervennlighet for alle. Erfaringen viser at dersom du sørger for god tilgjengelighet for funksjonshemmede, blir løsningene bedre og enklere å bruke for alle.',
			'location' => 'Cosmos 3D',
			'category' => 'professional',
			'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 9, 30, 1),
			'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 15, 0),
		]);



		Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Kurs 5 - Offentlige anskaffelser til det beste',
			'description' => 'Best mulig for flest mulig! I korthet er dette hva universell utforming (uu) dreier seg om. Ønsker du å øke trafikken på nettstedet ditt, hjelper det derfor å tenke uu. Kunnskapen finnes. Det handler bare om å ta den i bruk! Det er utarbeidet en standard med retningslinjer for tilgjengelig webinnhold (WCAG 2.0). Denne standarden konkretiserer hva det vil si å gjøre nettsider tilgjengelige for mennesker med nedsatt funksjonsevne. Håndhevingen av Diskriminerings- og Tilgjengelighetsloven baseres på WCAG. Oppfyller ikke nettstedet ditt retningslinjene i standarden, kan du bli bøtelagt og dømt til å rette opp feilene. Statistikk viser at hver sjette nordmann har en funksjonshemning. Microsoft har gjennomført undersøkelser som viser at en av to trenger deres tilgjengelighetsfunksjonalitet. Dette betyr at uu ikke dreier seg om å sikre gode løsninger for noen få funksjonshemmede, men om at tilgjengelige løsninger er noe vi alle kan ha glede av. Viktigere enn loven er å forstå at universell utforming gir flere og mer fornøyde brukere. Universell utforming er derfor en tankegang for deg som vil noe mer. For deg som vil sikre god brukervennlighet for alle. Erfaringen viser at dersom du sørger for god tilgjengelighet for funksjonshemmede, blir løsningene bedre og enklere å bruke for alle.',
			'location' => 'Ikke tilgjenglig',
			'category' => 'professional',
			'confirmed' => false,
			'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 9, 30, 1),
			'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 15, 0),
		]);


		Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Kurs 6 - Big data og offentlig sektor',
			'description' => 'Big data er et begrep alle som har fulgt med på diskusjoner rundt digitalisering har møtt på de siste årene. Vi vil i dette kurset gi innsikt hva som ligger i begrepet Big data og gi en overordnet beskrivelse av teknologien som ligger til grunn. Vi kommer særlig til å vise fram anvendelser av teknologien med eksempler fra både privat og offentlig sektor. Vi kjenner alle til hvordan Amazon anbefaler deg produkter på basis av hva brukere som ligner på deg har kjøpt. Hvilke offentlige virksomheter kan ha størst nytte av å tenke som Amazon?',
			'location' => 'A1',
			'category' => 'professional',
			'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 9, 30, 1),
			'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 15, 0),
		]);


		Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Kurs 7 - Hvordan ta i bruk KS SvarUt i kommuner og fylkeskommuner',
			'description' => 'Big data er et begrep alle som har fulgt med på diskusjoner rundt digitalisering har møtt på de siste årene. Vi vil i dette kurset gi innsikt hva som ligger i begrepet Big data og gi en overordnet beskrivelse av teknologien som ligger til grunn. Vi kommer særlig til å vise fram anvendelser av teknologien med eksempler fra både privat og offentlig sektor. Vi kjenner alle til hvordan Amazon anbefaler deg produkter på basis av hva brukere som ligner på deg har kjøpt. Hvilke offentlige virksomheter kan ha størst nytte av å tenke som Amazon?',
			'location' => 'Ikke tilgjenglig',
			'confirmed' => false,
			'category' => 'professional',
			'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 9, 30, 1),
			'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 15, 0),
		]);

		Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Kurs 7 - Hvordan ta i bruk KS? Svar: Ut i kommuner og fylkeskommuner',
			'description' => 'Big data er et begrep alle som har fulgt med på diskusjoner rundt digitalisering har møtt på de siste årene. Vi vil i dette kurset gi innsikt hva som ligger i begrepet Big data og gi en overordnet beskrivelse av teknologien som ligger til grunn. Vi kommer særlig til å vise fram anvendelser av teknologien med eksempler fra både privat og offentlig sektor. Vi kjenner alle til hvordan Amazon anbefaler deg produkter på basis av hva brukere som ligner på deg har kjøpt. Hvilke offentlige virksomheter kan ha størst nytte av å tenke som Amazon?',
			'location' => 'Cosmos 3A',
			'category' => 'break',
			'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 30, 1),
			'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 12, 30, 0),
		]);


		/**
		 *
		 *  Workshops
		 *
		 */

		Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Workshop 1 - EDAG - den største IT-reformen i Norge i 2014/2015',
			'description' => 'A-ordningen er navnet på den nye rapporteringsordningen til Skatteetaten (inkl. skatteoppkrever), Arbeids- og velferdsetaten (NAV) og Statistisk sentralbyrå (SSB) som innføres 1. januar 2015. A-meldingen erstatter lønns- og trekkoppgaver, terminoppgaver, årsoppgave for skattetrekk og arbeidsgiveravgift, samt skjemaer fra NAV og SSB. Flere virksomheter har nå erfaringer fra prøvedrift på A-meldingen. Her presenteres erfaringene så langt fra innføring av A-meldingen, og hvilke konsekvenser den nye A-ordningen har fra virksomhetenes perspektiv.',
			'location' => 'Cosmos 3D',
			'category' => 'professional',
			'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 12, 30, 1),
			'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 14, 00, 0),
		]);




		Session::create(array(
			'conference_id' => $conferenceId,
			'title' => 'Workshop 2 - Informasjonsdeling ',
			'description' => 'Dette er oppfølgingen av eKors workshop om Informasjonsdeling i fjor. Hva har skjedd på 12 måneder når det gjelder aktiviteter innenfor informasjonsdeling i det offentlige?

Vi tar pulsen på arbeidet med modernisering av Folkeregisteret, Brønnøysundregistrene har varslet at de satser på åpenhet ved å gjøre den autoritative kilden til åpne data og inviterer resten av offentlig sektor med på «dugnaden». Hvor vanskelig er det egentlig å åpne data og dele med andre?, hvilke konsekvenser gir dette, og for hvem? Sist men ikke minst vil vi ha gode og effektive diskusjoner i grupper som spenner over flere temaer

Formålet med workshopen er å gi deg som deltaker en mulighet til å lære og ikke minst bidra med din kompetanse til å fortsette endringsarbeidet med forenkling av informasjonsutveksling, deling av data og samhandling i det offentlige.

Workshop og gruppearbeid vil skje i grupper, og det vil kunne være forskjellig målgrupper for de forskjellige gruppearbeidene avhengig av interesseområder forretning/virksomhet, informasjon/semantikk og teknologi/applikasjon. Agenda og detaljer vil bli oppdatert kontinuerlig så følg med. Det som blir viktig i diskusjoner og dialogene er å komme med konstruktive løsningsforslag og ikke at vi skal problematisere mer av de utfordringene vi allerede vet eksisterer!',
			'location' => 'Cosmos 3A',
			'confirmed' => true,
			'category' => 'professional',
			'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 12, 30, 1),
			'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 14, 00, 0),
		));


		Session::create(array(
			'conference_id' => $conferenceId,
			'title' => 'Workshop 3 - Forenkle, forenkle, forenkle - hvor enkelt vil du ha det? ',
			'description' => 'Fra uforståelig XML til mobildialog på 10 minutter til bruk av over 400 000 virksomheter og 4 millioner mennesker. Kom og lær hvordan du kan bruke Altinn til å realisere din multikanalstrategi. En sesjon i 3 deler hvor vi viser deg hvordan du raskt kan lage enkle og effektive tjenester.

Vi starter med å presentere hvordan Altinn plattformen med sine mange funksjonsrike produkter passer inn i din virksomhetsarkitektur. Vi vil også presentere våre tanker på hvordan Altinn kan spille sammen med de andre felleskomponentene til fordel for din virksomhet.

I del 2 vil vi vise hvordan du enkelt kan lage selvbetjeningsløsninger i Altinn, og hvordan tjenestene kan gjøres portaluavhengige og med støtte for mobilitet. Enkle klienter som din virksomhet kan benytte for integrasjon mot Altinn blir også demonstrert. Del 2 avsluttes med en gjennomgang av arbeidet med å forbedre brukervennligheten i Altinn.

Til slutt vil vi, I samarbeid med våre partnere, viser gode forenklings- og digitaliseringseksempler hvor produktene i Altinn plattformen - i kombinasjon med partnerens løsning - er benyttet til næringslivets fordel. Dagens første Showcase viser hvordan Visma Consulting i samarbeid med Altinn har automatisert dialogen mellom Statens Vegvesen og interne fagsystemer hos verkstedskjeder for mottak av periodisk kjøretøykontroll (EU-kontroll). Andre Showcaset blir fremført av Håvard Tegelsrud fra Bekk Consulting AS, som viser løsningen Bekk har laget for Statens Vegvesen med integrasjon mot Altinn.',
			'location' => 'Cosmos 3C',

			'confirmed' => true,
			'category' => 'professional',
			'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 12, 30, 1),
			'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 14, 00, 0),
		));



		Session::create(array(
			'conference_id' => $conferenceId,
			'title' => 'Workshop 4 - Hvordan få effekt av virksomhetsarkitektur?',
			'description' => 'OSDF (Offentlig sektors dataforum) inviterer til workshop rundt hvordan man kan få utbytte av virksomhetsarkitektur. De siste årene har stadig flere offentlige virksomheter startet med å lage virksomhetsarkitekturer, men får vi utnyttet dette arbeidet på en god måte? I workshopen vil vi først få presentasjoner fra utvalgte offentlige og private virksomheter som har jobbet med denne over lengre tid. I lys av dette vil vi diskutere behov for samordning i forhold til bruk av teknikker, notasjoner og verktøy. Målet for workshopen er i tillegg til å spre erfaringer med beste praksis å etablere basis for innholdet i et introduksjonskurs i effektiv bruk av virksomhetsarkitektur i offentlig sektor.',
            'location' => 'Cosmos 1A',
            'confirmed' => true,
            'category' => 'professional',
            'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 12, 30, 1),
            'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 14, 00, 0),
        ));


        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Workshop 5 - Er den nasjonale beredskapen i Norge god nok til å møte krise og katastrofe?',
	        'description' => 'Ikke tilgjenglig',
	        'location' => 'Ikke tilgjenglig',
	        'confirmed' => false,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 12, 30, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 14, 00, 0),
        ));


        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Workshop 6 - Finansieringsmuligheter i IKT 2025 og EU sitt Horizon 2020-program',
	        'description' => 'Ikke tilgjenglig',
	        'location' => 'Ikke tilgjenglig',

	        'confirmed' => false,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 12, 30, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 14, 00, 0),
        ));


        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Workshop 7 - Målbilde for offentlig sektor i 2025 ',
	        'description' => 'Hvordan ser offentlig tjenesteyting ut i et 2025 perspektiv? Du inviteres med dette til en workshop hvor du kan være med å etablere et fremtidig målbilde for offentlig sektor. Vi ønsker å beskrive dette i form av scenarier. Scenarier er historier om framtida og de er et hjelpemiddel for å tenke langsiktig i en verden full av usikkerhet. Våre scenarier skal være fortellinger om hvordan offentlig tjenesteyting kan utvikle seg i et 10-15 års perspektiv, fram mot år 2025, gitt de trendene vi ser i dag.

Som deltaker i workshopen vil du få utdelt et ‘whitepaper’ som det forventes at du har satt deg inn i på forhånd. Dette dokumentet oppsummerer noe av det som finnes av rapporter og prediksjoner om framtidsscenarioer med relevans for offentlig sektor. Vi setter fokus på sosiale, politiske, miljøbestemte, økonomiske og teknologiske drivkrefter.

Det jobbes aktivt med veikart for nasjonale felleskomponenter som byggeklosser offentlige virksomheter skal dra nytte av når de utvikler sine digitale tjenester. Men hvilket målbilde styrer disse felleskomponentene mot?

Som en innledning til workshopen får vi Gartners kommentarer til dokumentet som er laget med tilleggs betraktninger om trender av betydning for samfunnsutviklingen. Vi vil også innledningsvis få betraktninger i forhold til arbeidet i Skate knyttet til felleskomponentene. Etter dette vil vi innlede til arbeid i grupper som utfordres til å presentere sine innspill i form av scenariobetraktninger, konseptuelle skisser og prinsipper av betydning for fremtiden.

Resultatene fra workshopen er tenkt brukt senere i konferansen. Vel møtt til en workshop som legger «fremtiden i våre hender»',
	        'location' => 'Cosmos 3B',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 12, 30, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 14, 00, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Workshop 8 - Personvern i skolen og barnehagen ',
	        'description' => 'Datatilsynet har i en 2-års periode jobbet aktivt med personvern i skoler og barnehager. Foreløpig resultat er en samlerapport som oppsummerer erfaringene fra dette arbeidet. Som en innledning til workshopen vil Martha og Eirin presentere Datatilsynets samlerapport fra tilsyn på skoler og barnehager, samt trekke frem konkrete funn og erfaringer fra tilsyn som kan egne seg til diskusjon i grupper. Etter dette vil deltakerne bli inndelt i mindre grupper som skal diskutere hvordan personvernet kan bedres i skole og barnehage, samt utfordres til å presentere sine innspill i form av forslag til gode rutiner. Datatilsynet ønsker å skape engasjement for å lage en nasjonal norm for personvern i skoler og barnehager. Nyttige innspill fra workshopen kan brukes i arbeidet med en slik norm.',
	        'location' => 'Living Room 1',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 12, 30, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 14, 00, 0),
        ));


        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Pause - Spekemat, ost og kjeks',
	        'description' => 'Ikke tilgjenglig',
	        'location' => 'Ikke tilgjenglig',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 14, 00, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 14, 15, 0),
        ));



        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Workshop fortsetter',
	        'description' => 'Ikke tilgjenglig',
	        'location' => 'Ikke tilgjenglig',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 14, 15, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 15, 45, 0),
        ));


        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Pause - Spekemat, ost og kjeks',
	        'description' => 'Ikke tilgjenglig',
	        'location' => 'Ikke tilgjenglig',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 15, 45, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 16, 00, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Workshop fortsetter',
	        'description' => 'Ikke tilgjenglig',
	        'location' => 'Ikke tilgjenglig',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 16, 00, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 17, 00, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Slutt',
	        'description' => 'Ikke tilgjenglig',
	        'location' => 'Ikke tilgjenglig',
	        'confirmed' => true,
	        'category' => 'break',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 17, 00, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 17, 00, 2),
        ));


        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Rockheim, Splitter Pine Tapas og Charlotte Audestad',
	        'description' => 'Rockheim',
	        'location' => 'Rockheim',

	        'confirmed' => true,
	        'category' => 'social',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 19, 00, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 23, 00, 0),
        ));


		/**
		 * NEW DAY
		 */

		$today = Carbon::now()->addDays(1);

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Registrering',
	        'description' => 'Registrer deg ved resepsjonen ved ankomst.',
	        'location' => 'Resepsjonen',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 8, 30, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 9, 30, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Åpning',
	        'description' => 'Prorektor Berit Kjeldstad ønsker velkommen og åpner konferansen.',
	        'location' => 'Cosmos 1',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 9, 30, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 00, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Halveis til framtiden - digitale trender og impulser',
	        'description' => 'Truls har skrevet en bok sammen med Adjiedj Bakaas med samme tittel som foredraget. Boka peker på 5 megatrender og gir en rekke innspill på digitale trender og impulser vil endre det meste.',
	        'location' => 'Cosmos 1',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 9, 30, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 00, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Digital kommunikasjon',
	        'description' => 'Digital kommunikasjon skal være hovedregelen i dialogen mellom offentlig sektor og innbyggerne. Vi hører om de nye digitale byggeklossene, SvarUt, kontakt- og reservasjonsregisteret og digital post til innbyggere. Disse skal inngå i den digitale grunnmuren. Hva betyr dette egentlig for innbyggerne, kommunene og statlige virksomheter? Er vi i mål med grunnmuren når disse kommer på plass? Og hvilken utvikling kan vi forvente etter dette? I samtalen vil de fire reflektere blant annet rundt disse spørsmålene, og komme inn på: Betydningen av samhandling og samarbeid mellom kommune og stat; Veikart for felleskomponenter for å sikre forutsigbarhet, fremdrift og en helhetlig tilnærming; Digital kompetanse hos ledere.',
	        'location' => 'Cosmos 1',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 9, 30, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 00, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Presentasjon av kandidater til Fyrlykt-prisen',
	        'description' => 'Presentasjon av kandidater til Fyrlykt-prisen.',
	        'location' => 'Cosmos 1',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 9, 30, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 00, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Kaffepause. Spekemat, ost og kjeks',
	        'description' => 'Det blir servert kaffe og spekemat med ost og kjeks i fellesområdet.',
	        'location' => 'Fellesområdet',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 00, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 15, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'U1 - Software Innovation: Skyløsninger',
	        'description' => 'Seminaret inneholder litt om hva cloud er, bakgrunn, skytjeneste vs. Lokal installasjon, gevinster og en rask demonstrasjon av løsningen.',
	        'location' => 'Cosmos 3C',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 15, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 45, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'U2 - EVRY: Mobile trender og løsninger for offentlig sektor',
	        'description' => 'Bruken av mobil og nettbrett øker i bedriftene, og i 2015 vil det være flere på arbeidsplassen som bruker internett gjennom mobile enheter enn gjennom ordinær PC. Antall app’er skyter i været, både bedrifts-apper og apper for privat bruk. Er sikkerheten ivaretatt? Hvordan kan EVRY gi den offentlige sektor merverdi som gjør den mobile enheten til et effektivt arbeidsverktøy? Vi vil også presentere hvordan EVRY kan levere hele livssyklusen innen mobile løsninger, fra mobiltelefoner og nettbrett samt logistikk rundt dette, til sikkerhetsløsninger, apphåndtering og kundeunike apper.

Vi har med oss Kultur- og naturreise, et prosjekt under Kartverket, Kulturrådet, Miljødirektoratet, Riksantikvaren og Riksarkivet. De vil presentere KNappen, som står for kultur- og naturreise-appen og omtales på deres nettsider http://kulturognaturreise.no. Denne appen er en demonstrator på hva et nasjonalt løft for å øke tilgangen til åpne offentlig data og lokal kunnskap om kultur og natur kan føre til. Utrustet med smarttelefon får du tilgang til aktuelle fakta og fortellinger om natur og kultur på stedet de er. Det overordnede målet er å øke kunnskap om og skape engasjement for kulturminner og naturverdier. KNappen er utviklet i samarbeid med EVRY, og kan testes her: http://kulturognaturreise.wordpress.com/2013/04/23/vil-du-vaere-med-a-teste-knappen/',
	        'location' => 'Space 3',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 15, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 45, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'U3 - Brønnøysundregistrene: Med Altinn i fremtiden',
	        'description' => 'Ingen diskripsjon',
	        'location' => 'Cosmos 1',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 15, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 45, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'U4 - Capgemini: Kunsten å lage verdiskapende, brukersentrerte digitale tjenester',
	        'description' => 'De offentlige tjenestene blir mer og mer digitale, og epoken hvor fysiske kontaktpunkter var de viktigste for å få tilgang til disse er ved veis ende. Sektorer slik som bank og finans har allerede opplevd paradigmeskiftet fra å ha fysiske tjenester til å bli så og si heldigitale.

Fra det offentlige, er Lånekassen et godt eksempel på hvordan det er mulig å modernisere og digitalisere sine tjenester ved å ha et brukersentrisk fokus og samtidig få en effektivisering og kostnadsbesparing internt.

De digitale tjenestene gir med andre ord uante muligheter for både tilbyder og bruker - og med digitalt førstevalg fra 2016, vil antall tjenester som må forholde seg til digitale kontaktpunkter økes dramatisk!

Men hvordan går man frem for å danne tjenester som bruker de digitale kontaktflatene på best mulig måte?',
	        'location' => 'Cosmos 3A',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 15, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 45, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'U5 - Telenor: Velferdsteknologi i praksis',
	        'description' => 'Værnes-regionen var tidlig ute med bruk av digitale løsninger innenfor helse og omsorg. Stjørdal og Selbu var de første kommunene som innførte løsning der velferdsteknologi ble integrert med fagsystemet og journalsystemet i kommunen. Hva er utfordringene med helse og omsorg i kommunene og hva er målet med innføring av ny teknologi? Vi får en innføring i kommunens erfaringer med løsningen.',
	        'location' => 'Living Room 1 ',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 15, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 45, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'U6 - Visma: Hvordan skape innovasjon i din virksomhet?',
	        'description' => 'Vi gir deg en innføring i hvordan du kan skape en innovasjonskultur i din organisasjon. Ragne forteller om hva vi i Visma gjør for å fange, foredle og implementere nye idèer fra egen organisasjon i forretningsutviklingen, og gir deg samtidig noen råd om prosess, verktøy og aktiviteter du kan benytte for å lykkes med å etablere en innovasjonskultur internt.',
	        'location' => 'Space 1 ',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 15, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 45, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'U7 - Kantega: Hvordan finne ut mer om brukerne dine enn brukeren selv vet',
	        'description' => 'Ingen diskripsjon',
	        'location' => 'Living Room 4',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 12, 00, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 13, 00, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Sesjon 1A Kunsten å forenkle – suksesshistorier',
	        'description' => 'Det nye slagordet er «fornye, forenkle og forbedre». I denne sesjonen setter vi fokus på hvordan digitalisering bidrar til fornying, forenkling og forbedring. Vi får flere konkrete eksempler på hva virksomheter har gjort og hva som førte til deres suksess. Situasjonen før og etter tiltaket, beskrivelse av tiltaket og læringseffekten for andre vil være sentralt i de suksesshistoriene vi får høre om.',
	        'location' => 'Cosmos 1',
	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 12, 00, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 13, 00, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Sesjon 1B Servicedesign - tjenesteutvikling med brukeren i sentrum',
	        'description' => 'Det duger ikke lenger å jobbe på «gamlemåten» når du skal utvikle dine tjenester for morgendagens brukere. Trender om forbruksmønstre og brukernes forventninger påvirker vår tjenesteutvikling. Servicedesign dreier seg om å skape gode og helhetlige opplevelser ved å sette brukeren i sentrum, i samsvar med virksomhetens strategi. I denne sesjonen setter vi søkelyset på servicedesign som fagdisiplin. Innovasjon knyttet til arbeidsprosesser og ivaretakelse av brukerbehov er noen stikkord ved tjenesteutvikling i en ny digital virkelighet. Er du og din virksomhet forberedt på fremtidens tjenesteutvikling? Hvis ikke - da må du få med deg denne sesjonen.',
	        'location' => 'Cosmos 3A',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 12, 00, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 13, 00, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Sesjon 1C Sikkerhet og beredskap',
	        'description' => 'Når vannet truer

Geografisk informasjonsteknologi er samfunnet viktigste våpen for å verne liv og verdier når naturkreftene løper løpsk. Risiko- og sårbarhetsanalyser basert på denne teknologien gir planleggere og innbyggere langt større sikkerhet og forutsigbarhet enn tidligere. Foredraget viser en rekke praktiske situasjoner hvor moderne teknologi anvendes for å hindre eller redusere skade og fare.

Én krise - flere kriseledelser – ett situasjonsbilde

Effektiv krisehåndtering krever et samspill mellom flere aktører. Samfunnet disponerer samlet sett betydelige ressurser i form av nøyaktige geodata og spesialkompetanse. Utfordringen er at ressursene er fordelt på flere etater. Er aktørene i stand til, eller villige til å samhandle og ta i bruk ressursene på tvers av sektorer ? Foredraget viser hvordan og hvorfor en komponent for geobasert krisehåndtering er under oppbygging i Oslo kommune, Forsvaret og politiet.',
	        'location' => 'Cosmos 3C',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 12, 00, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 13, 00, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Lunsj',
	        'description' => 'Det blir servert lunsj i lunsjområdet.',
	        'location' => 'Lunsjområdet',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 11, 45, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 12, 00, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Paneldebatt: Ledere i utakt - manglende digital kompetanse?',
	        'description' => 'Vi trenger større fart på endringsarbeidet og mye kan gjøres i den enkelte enhet/etat.

Hva kreves av ledere med ansvar for digitalisering?
Hvilken kompetanse må de ha?
Hvor står de i dag og hva skal til for å komme til ønsket tilstand?
Kan digitalisering outsources til leverandører og konsulenter eller må virksomhetene selv stå for dette?
Kan det tenkes at offentlig innkjøpsregime bidrar til å hindre utvikling av nødvendig kompetanse?',
	        'location' => 'Cosmos 1',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 14, 00, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 15, 00, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Pause. Frukt, grønt og dip.',
	        'description' => 'Det blir servert en liten oppkvikker i fellesområdet.',
	        'location' => 'Fellesområdet',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 15, 00, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 15, 15, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Sesjon 2A Digital post',
	        'description' => 'Vi har A-post og B-post, ja er det ikke noe som heter ePost og nå kommer D-post, nei det var digital post.
    Vi produserer dokumenter digitalt, oppbevarer dokumenter digitalt, men når de skal sendes må de veien via papir –
        dette gir vel ingen mening. Har du hørt om Difis prosjekt «Sikker digital post til innbygger» og KS KommITs «Svarut»,
        post fra kommuner og fylkeskommuner til innbyggere og virksomheter. Digipost og eBoks har tilbudt digitale postkasser i
        flere år allerede. Alle som ønsker det får selvangivelsen digitalt fra Altinn, men det er en digital meldingsboks,
        ikke en digital postboks. Må vi beholde den grønne postkassen og hvorfor fjernet DNB muligheten kundene hadde til
        å få kopi av posten i nettbanken sendt til eBoks og Digipost. Blir du med, vi samler alle til en prat, ja postbudet kommer kanskje også.',
	        'location' => 'Cosmos 3A',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 15, 15, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 16, 15, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Sesjon 2B Brukersentrerte tjenester på tvers av etatenes siloer',
	        'description' => 'Mange offentlige tjenester lager gode digitale tjenester hver for seg. Men hva skal til for at vi får til samordnede tjenester som er sentrert rundt innbyggere og næringslivets behov og som involverer flere offentlige virksomheter?

Etter en innledning om teamet får vi høre Jacob Krokstedt fra Stockholm stad som vil ha et innlegg med tittelen Med invånarnas fokus – Hur vi har jobbat med digitale tjänster på tvers av kommunala myndigheter i Stockholm. Til slutt blir det en paneldebatt med Arne Thorstensen fra Skatteetaten, Marit Mellingen, Difi og Arild Jansen, UiO.',
	        'location' => 'Cosmos 1',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 15, 15, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 16, 15, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Sesjon 2C Fra prosjekt til forvaltningv',
	        'description' => 'Overgangen fra prosjekt til forvaltning kan være stor. Hvordan kan prosjekter forberede seg på overgangen til forvaltning? Smidige metoder og å kombinere utvikling og forvaltning er tiltak som kan sikre en effektiv overgang fra prosjekt til forvaltning. I denne sesjonen vil vi fokusere på prosjekt og forvaltningsfase for Perform hos Statens Pensjonskasse, hvor utviklingsprosjektet varte fra 2008 til 2012 og systemet nå er i forvaltning. Vi vil fokusere på læringspunkter som er relevante både for små og store utviklingsprosjekt.',
	        'location' => 'Cosmos 3C',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 15, 15, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 16, 15, 0),
        ));

        Session::create(array(
	        'conference_id' => $conferenceId,
	        'title' => 'Konferansemiddag og Fyrlyktprisen',
	        'description' => 'Mat og drikke er en viktig del av den totale opplevelsen av konferansen. Det blir det servert et velsmakende 3 retters måltid bestående av
Forrett: Sukkersaltet Frøya Laks, Dillkrem, karse og marinert agurk
Hovedrett: Langbakt Indrefilet av storfe, fenikkel, stekt sopp, pac choy, amadinepotet og timiansjy
Dessert: Pasjonsfrukt panna cotta med mangokompott og sukkerbrød.',
	        'location' => 'Clarion Hotel & Congress',

	        'confirmed' => true,
	        'category' => 'professional',
	        'start_time' => Carbon::create($todays->year, $todays->month, $todays->day, 19, 30, 1),
	        'end_time' => Carbon::create($todays->year, $todays->month, $todays->day, 23, 30, 0),
        ));

	}

}