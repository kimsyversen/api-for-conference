<?php namespace database\seeds\laeringsfestivalen;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Sessions\Session;
use Uninett\Eloquent\Speakers\Speaker;

class SessionsTableSeeder extends  \Seeder {

	public function run()
	{
		$this->createSessionsNokios(1);
	}

	private function createSessionsNokios($conferenceId)
	{
		Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Registrering i Elektrobygget på Gløshaugen, NTNU',
			'description' => '',
			'location' => 'Elektrobygget',
			'category' => 'other',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 9, 00, 00),
			'end_time' => Carbon::create(2015, 05, 04, 10, 00, 00),
		]);

		Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Strindens promenadeorkester',
			'description' => 'Velkommen v/ prorektor for utdanning: Berit J. Kjelstad, NTNU',
			'location' => 'Auditorium EL 5',
			'category' => 'social',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 10, 00, 01),
			'end_time' => Carbon::create(2015, 05, 04, 10, 45, 00),
		]);

		Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Pause',
			'description' => '',
			'location' => '',
			'category' => 'break',
			'target_audience' => '',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 10, 45, 01),
			'end_time' => Carbon::create(2015, 05, 04, 11, 15, 00),
		]);

		//SPOR 1: Auditorium EL 5

		$session_1 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Utvikling av læringsinnhold i samarbeid med studentene',
			'description' => 'Tema/problemstillinger: Hvordan kombinere pedagogikk og behov med teknologi. Praktisk gjennomføring: hvordan lage et tilrettelagt og gjennomførbart verktøy. Hvordan få til et aktivt teamarbeid med studenter og fagstab.',
			'location' => 'Auditorium EL 5',
			'category' => 'professional',
			'target_audience' => '',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 10, 45, 01),
			'end_time' => Carbon::create(2015, 05, 04, 11, 15, 00),
		]);

		Speaker::create([
			'session_id' => $session_1->id,
			'first_name' => 'Cecilie',
			'last_name' => 'Haraldseid',
			'affiliation' => 'Det samfunnsvitenskapelige fakultet, Universitetet i Stavanger',
			'title' => 'Universitetslektor ved Institutt for helsefag',
			'description' => 'Cecilie Haraldseid er vinner av regionsfinalen Forsker Grand Prix. Hun har utviklet nytt innhold på et nettbrett som studentene på sykepleierutdanningen ved UiS kan bruke til å trene på ferdigheter med. Innholdet på det spesielle nettbrettet, utviklet hun sammen med tredjeklassestudenter på sykepleien. På forhånd hadde hun intervjuet studentene, og fått vite at de ønsket å få flere kritiske spørsmål underveis i en læringsprosess. Sammen med faglige- og tekniske eksperter utarbeidet Haraldseid en rekke oppgaver studentene kan løse på nettbrettet. Hun skal videre i sitt forskningsarbeid studere hvordan bruk av denne type teknologi påvirker læringsprosessen til studentene.',
		]);


		//SPOR 2: Auditorium EL 6

		$session_2 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Bruk av digitale verktøy i høyere utdanning. Må det være ildsjelenes arena?  Presentasjon av «uDig»',
			'description' => 'uDig er et fleksibelt kompetanseutviklingsprogram som er rettet inn mot det brede lag av undervisere ved UiT Norges arktiske universitet. Programmet er nettbasert med tilbud om workshops underveis og tar sikte på å kombinere teknologisk mestring, didaktisk refleksjon og praksisforankring. De første 4 moduler settes i gang i februar 2015 og omhandler: 1) Digitale læremidler i Fronter, 2) Bruk av video i undervisning, 3) Nettbaserte diskusjoner og webmøter i undervisning og 4) Studentaktive læringsformer. Programmet er utviklet av Ressurssenter for utdanning, læring og teknologi (Result) ved UiT. Stikkord: - kompetanseutvikling, digitale verktøy, didaktisk refleksjon, ildsjeler, studentaktiv læring',
			'location' => 'Auditorium EL 6',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 10, 45, 01),
			'end_time' => Carbon::create(2015, 05, 04, 11, 15, 00),
		]);

		Speaker::create([
			'session_id' => $session_2->id,
			'first_name' => 'Vibeke',
			'last_name' => 'Flytkjær',
			'affiliation' => 'UiT Norges arktiske universitet',
			'title' => 'Seniorrådgiver ved Ressurssenter for undervisning, læring og teknologi',
			'description' => '',
		]);



		$session_3 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Utstillerseminar',
			'description' => '"Hvordan møter lærebokforlag de endrede behovene for læring og kompetanseheving i utdanning og i arbeidslivet?" Kunnskap er lettere tilgjengelig enn noen gang. Verktøy og virkemidler for effektiv og bedre læring har aldri vært bedre enn i dag. Studievanene er varierte og fleksible. I arbeidslivet er behovet for fortløpende kompetanseheving akutt. Den raske teknologiske utviklingen endrer måten vi både jobber, lever og lærer. Dagens studenter blir flere, men kjøper likevel færre bøker enn før. Dette krever at norske lærebokforlag må tenke helt nytt rundt hvordan kvalitetssikret kunnskap skal formidles og settes sammen på en måte som er tilpasset morgendagens behov. Gyldendal Akademisk har satset digitalt i over 10 år. Vi jobber i tett dialog med fagmiljøene og studentene i å utvikle nyttige, digitale løsninger for både UH-sektoren og arbeidslivet. Stikkord: livslang læring, brukermedvirkning, kvalitetssikret innhold, studentaktive metoder, læring som prosess, kompetanseutvikling, faglig samarbeid, brukerorientert utvikling',
			'location' => 'Auditorium EL 5',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 12, 05, 01),
			'end_time' => Carbon::create(2015, 05, 04, 12, 35, 00),
		]);


		$session_4 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Demonstrasjon – Rom for lek',
			'description' => 'Rom for lek er IKT-senterets lab for utvikling av ny praksis med en leken tilnærming til teknologi og læring. Målet er å utforske teknologier som 3D-printing, dataspill, koding, nettbrett, og Virtual Reality/Augmented Reality, og spre eksempler og erfaringer. Rom for lek er fysisk plassert i Oslo, men vi bringer gjerne utvalgt teknologi til konferanser og arrangementer i skole-Norge. Gruppetider: 12.05 - 12.25, 12.30 - 12.50, 12.55 - 13.15',
			'location' => 'Rom G138',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 12, 05, 01),
			'end_time' => Carbon::create(2015, 05, 04, 12, 35, 00),
		]);


		$session_5 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Lunsj',
			'description' => '',
			'location' => '',
			'category' => 'social',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 12, 30, 01),
			'end_time' => Carbon::create(2015, 05, 04, 13, 15, 00),
		]);





		$session_6 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Fremtidens klasserom gjør studenter mer engasjerte',
			'description' => 'Hvordan kan et rom støtte måten studenter jobber på? UiT Norges arktiske universitet har i flere år utviklet rom som er grunnlaget for fremtidens klasserom. Våre "FutureLab" er mer enn teknologi plassert i et rom - den er også en modell for hvordan å skape aktivitet på rommet og utprøving av moderne undervisningsmetoder. Vi har erfart at modellen lykkes og at studenter blir mer engasjerte. Vi vil dele erfaringene våre med å bygge fremtidens klasserom med deg, og sammen kan vi inspirere hverandre til å lage et enda bedre konsept. Stikkord: Teknologisk og pedagogisk utvikling, gruppearbeid, sosial og faglig aktivitet, studenter',
			'location' => 'Auditorium EL 5',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 13, 15, 01),
			'end_time' => Carbon::create(2015, 05, 04, 14, 00, 00),
		]);

		Speaker::create([
			'session_id' => $session_6->id,
			'first_name' => 'Nora',
			'last_name' => 'MacLaren',
			'affiliation' => 'Norges arktiske universitet',
			'title' => 'Overingeniør',
			'description' => '',
		]);





		$session_7 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Digital undervisning og omvendt klasserom',
			'description' => 'Erfaringer med problembasert læring og bruk av digitale læringsverktøy i store emner med mye teori med praktisk retting, kan ofte være vanskelig å forholde seg til uten at man selv benytter seg av denne i praksis. I emnet TDT4140 Programvareutvikling ved IDI, NTNU, ble alle forelesninger videofilmet våren 2014. Tilbakemeldinger om forelesningene og noe dårlig oppmøte på disse, gjorde at det våren 2015 ble gjort store omlegginger i hvordan emnet ble undervist. Emnet har i vår vært bortimot forelesningsfri, og har i stedet hatt gruppe- og problembaserte case/øvingsoppgaver i en form av omvendt klasserom, dvs. en mye mer aktiv læring. Emnet har ca 320 studenter og foredraget vil i kortform presentere noen erfaringer fra bruk av teknologi i forberedelser og gjennomføring, gjennomføringen av omvendt klasserom med tilbakemeldinger fra studenter og læringsassistenter, hvilke utfordringer som kom, og hva som bør forbedres. Carl-Fredrik Sørensen har våren 2015, hatt hovedansvaret for to emner i 4. og 8. semester med henholdsvis 320 og 70 studenter. Stikkord: Omvendt klasserom, problembasert/gruppebasert/aktiv læring, bruk av videoer, store emners pedagogikk',
			'location' => 'Auditorium EL 6',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 13, 15, 01),
			'end_time' => Carbon::create(2015, 05, 04, 14, 00, 00),
		]);

		Speaker::create([
			'session_id' => $session_7->id,
			'first_name' => 'Carl Fredrik',
			'last_name' => 'Sørensen',
			'affiliation' => 'Institutt for datateknikk og informasjonsvitenskap, NTNU',
			'title' => 'Førstelektor',
			'description' => '',
		]);


		$session_8 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Innovativ Utdanning ved NTNU',
			'description' => 'Hva gjøres ved NTNU i 2015 for å tilrettelegge innovative, digitale tjenester for studenter og faglærere? Litt hva, hvorfor og hvordan, på ca 1200 sekunder.',
			'location' => 'Auditorium EL 6',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 13, 15, 01),
			'end_time' => Carbon::create(2015, 05, 04, 14, 00, 00),
		]);

		Speaker::create([
			'session_id' => $session_8->id,
			'first_name' => 'Tore',
			'last_name' => ' Indreråk',
			'affiliation' => 'NTNU',
			'title' => 'Prosjektleder IT i Utdanningen',
			'description' => '',
		]);


		$session_9 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Pause',
			'description' => '',
			'location' => '',
			'category' => 'break',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 14, 00, 01),
			'end_time' => Carbon::create(2015, 05, 04, 14, 15, 00),
		]);



		$session_10 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Digital studieteknikk - å lære i det 21.århundre',
			'description' => 'Digitale verktøy endrer tradisjonelle studieteknikk og gir nye læringsmuligheter. Studenter og lærer har mange metoder og verktøy å velge i for å holde orden på enorme mengder informasjon og nye læringsteknikker. Riktig bruk av metoder og verktøy gir betydelig merverdi i læringsarbeidet. Stikkord for tema/problemstillinger: Digital studieteknikk, lære å lære, informasjonskompetanse, læringsteknikk, digitale verktøy',
			'location' => 'Auditorium EL 5',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 14, 15, 01),
			'end_time' => Carbon::create(2015, 05, 04, 15, 00, 00),
		]);

		Speaker::create([
			'session_id' => $session_10->id,
			'first_name' => 'Marianne',
			'last_name' => ' Hagelia',
			'affiliation' => 'Høgskulen i Volda',
			'title' => 'Høgskolelektor ved Seksjon for medie- og kommunikasjonsteknologi',
			'description' => '',
		]);





		$session_11 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Organisering av støttetjenester – spiller det noen rolle?',
			'description' => 'Debatten om organisering av støttetjenester har vært med oss lenge. Over tid har vi sett mange ulike modeller. Spiller det egentlig noen rolle hvordan disse tjenestene er organisert? Og hva betyr organiseringen for de tjenester som kan tilbys? Med utgangspunkt i organiseringen av støttetjenester ved UiT – Norges arktiske universitet - prøver vi å belyse disse spørsmålene. Stikkord: støttetjenester – organiseringsmodeller – støttetjenestens arbeidsfelt',
			'location' => 'Auditorium EL 6',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 14, 15, 01),
			'end_time' => Carbon::create(2015, 05, 04, 15, 00, 00),
		]);

		Speaker::create([
			'session_id' => $session_11->id,
			'first_name' => 'Jan',
			'last_name' => ' Alexandersen',
			'affiliation' => 'UiT Norges arktiske universitet',
			'title' => 'Seniorrådgiver ved Ressurssenter for undervisning, læring og teknologi',
			'description' => '',
		]);



		$session_12 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Endringskompetanse for bedre læringsstøtte',
			'description' => '',
			'location' => 'Auditorium EL 6',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 14, 15, 01),
			'end_time' => Carbon::create(2015, 05, 04, 15, 00, 00),
		]);

		Speaker::create([
			'session_id' => $session_12->id,
			'first_name' => 'Inge',
			'last_name' => ' Fottland',
			'affiliation' => 'NTNU',
			'title' => 'Avdelingsdirektør',
			'description' => 'nge Fottland ble tilsatt som prosjektdirektør for campusutvikling ved NTNU i 2004 og ble også engasjert som prosjektdirektør for NTNU 2020 hvor NTNU, HiST, SiT og Trondheim kommune gikk inn i et felles prosjekt. Dette prosjektet hadde eget prosjektstyre og medarbeidere fra disse organisasjonene. Dette prosjektet varte til 2008. Inge Fottland har hatt ansvar for campusutvikling ved NTNU fram til våren 2013. Fra høsten 2011 ble Inge Fottland også konstituert som studiedirektør. Fra våren 2013 ble han ansatt i fast stilling som studiesjef. Før det var han administrerende direktør i et konsulentselskap som spesialiserte seg i sykehusplanlegging og prosjektering. Fra 1992-2002 var Inge Fottland administrerende direktør/prosjektdirektør for planlegging og utbygging av St. Olavs Hospital i Trondheim. Dette er et fullt integrert universitetssykehus hvor klinisk pasientbehandling er integrert med forskning og utdanning. Han har også vært direktør for helse- og sosialtjenester for Sør-Trøndelag fylkeskommune. Inge Fottland har hatt verv i UNESCO, ILO, EU og Nordisk Ministerråd. I tillegg har han undervist i den videregående skolen fra 1974 -1985 på allmennfaglig studieretning  i naturfagene, samfunnskunnskap og sosialøkonomi.',
		]);



		$session_13 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Studenter vil ha video',
			'description' => 'Erfaringer med videobasert undervisning i MOOC og Flipped Classroom. Nohr er fag ansvarlig for "IKT for lærere – Innføring i IKT". I dette foredraget deler Nohr sine erfaringer med videobasert undervisning. Han underviste Norges største MOOC basert på studiepoengproduksjon høsten 2014 og har de siste to årene undervist 600 campus studenter basert på Flipped Clasroom metoden. Våren 2014 fulførte han masteroppgaven "Hvordan opplever studenter lærerens egenproduserte video som læringsressurs?" (http://bit.ly/m2mmaster) Foredraget vil være en kombinasjon vitenskapelig begrunning for bruk av video i undervisningen og praktiske tips til hvordan selv lage egenproduserte videoer som studentene vil ha. Stikkord for tema/problemstillinger Videobasert undervisning, Flipped Clasroom, MOOC, Læringsstiler, praktiske tips',
			'location' => 'Auditorium EL 5',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 15, 15, 01),
			'end_time' => Carbon::create(2015, 05, 04, 16, 00, 00),
		]);

		Speaker::create([
			'session_id' => $session_13->id,
			'first_name' => 'Magnus',
			'last_name' => ' Nohr',
			'affiliation' => 'Høgskolen i Østfold',
			'title' => 'Førstekonsulent, IT-drift avdeling lærerutdanning',
			'description' => '',
		]);

		$session_14 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Paneldebatt',
			'description' => '',
			'location' => 'Auditorium EL 6',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 15, 15, 01),
			'end_time' => Carbon::create(2015, 05, 04, 16, 00, 00),
		]);



		$session_15 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Utstillerseminar, Interactive Norway',
			'description' => 'Erfaringer med videobasert undervisning i MOOC og Flipped Classroom. Nohr er fag ansvarlig for "IKT for lærere – Innføring i IKT". I dette foredraget deler Nohr sine erfaringer med videobasert undervisning. Han underviste Norges største MOOC basert på studiepoengproduksjon høsten 2014 og har de siste to årene undervist 600 campus studenter basert på Flipped Clasroom metoden. Våren 2014 fulførte han masteroppgaven "Hvordan opplever studenter lærerens egenproduserte video som læringsressurs?" (http://bit.ly/m2mmaster) Foredraget vil være en kombinasjon vitenskapelig begrunning for bruk av video i undervisningen og praktiske tips til hvordan selv lage egenproduserte videoer som studentene vil ha. Stikkord for tema/problemstillinger Videobasert undervisning, Flipped Clasroom, MOOC, Læringsstiler, praktiske tips',
			'location' => 'Auditorium EL 5',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 16, 05, 01),
			'end_time' => Carbon::create(2015, 05, 04, 16, 35, 00),
		]);

		Speaker::create([
			'session_id' => $session_15->id,
			'first_name' => 'Anita',
			'last_name' => ' Gustavsen Haarberg',
			'affiliation' => 'Interactive Norway',
			'title' => 'Leder Utdanning',
			'description' => 'Interactive Norway tilbyr interaktive løsninger som inspirerer og engasjerer både i klasse- og møterom. I denne presentasjonen vil vi vise eksempler på interaktivitet i forelesningen, og hvordan man kan kombinere bruk av de interaktive tavlene, SMART og Prowise, med mobile enheter. Vi vil også vise eksempler for bruk i AEC (Architecture, Engineering og Construction) segmentet. Bruken av detaljerte tegninger, 3D verktøy og andre bransjespesifikke applikasjoner. Kom og se en ny og spennende måte å gjøre dette på.',
		]);



		$session_16 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Utstillerseminar, Canvas by Instructure',
			'description' => 'Canvas by Instructure is the learning management system that makes teaching and learning easier. Its customisable platform and built-in features provide teachers and students with modern tools and resources that truly integrate with multimedia. Innledningen blir holdt på engelsk',
			'location' => 'Auditorium EL 6',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 16, 05, 01),
			'end_time' => Carbon::create(2015, 05, 04, 16, 35, 00),
		]);

		Speaker::create([
			'session_id' => $session_16->id,
			'first_name' => 'Mr. Bas',
			'last_name' => ' Ten Holter',
			'affiliation' => 'Canvas',
			'title' => 'Regional Director',
			'description' => 'Canvas by Instructure is the learning management system that makes teaching and learning easier. Its customisable platform and built-in features provide teachers and students with modern tools and resources that truly integrate with multimedia.',
		]);





		$session_17 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Middag med Teach-meet',
			'description' => '',
			'location' => 'Thon Hotel Prinsen',
			'category' => 'social',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 19, 00, 01),
			'end_time' => Carbon::create(2015, 05, 04, 23, 00, 00),
		]);










		Session::create([
			'conference_id' => $conferenceId,
			'title' => '',
			'description' => '',
			'location' => '',
			'category' => '',
			'target_audience' => '',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 9, 00, 00),
			'end_time' => Carbon::create(2015, 05, 04, 10, 00, 01),
		]);






		Session::create([
			'conference_id' => $conferenceId,
			'title' => '',
			'description' => '',
			'location' => '',
			'category' => '',
			'target_audience' => '',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 9, 00, 00),
			'end_time' => Carbon::create(2015, 05, 04, 10, 00, 01),
		]);
	}
}