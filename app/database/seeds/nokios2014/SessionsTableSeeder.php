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

	}

}