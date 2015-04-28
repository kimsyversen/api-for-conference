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
			'category' => 'professional',
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
			'start_time' => Carbon::create(2015, 05, 04, 11, 15, 01),
			'end_time' => Carbon::create(2015, 05, 04, 12, 00, 00),
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
			'start_time' => Carbon::create(2015, 05, 04, 11, 15, 01),
			'end_time' => Carbon::create(2015, 05, 04, 12, 00, 00),
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
			'start_time' => Carbon::create(2015, 05, 04, 12, 00, 01),
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
			'description' => 'Inge Fottland ble tilsatt som prosjektdirektør for campusutvikling ved NTNU i 2004 og ble også engasjert som prosjektdirektør for NTNU 2020 hvor NTNU, HiST, SiT og Trondheim kommune gikk inn i et felles prosjekt. Dette prosjektet hadde eget prosjektstyre og medarbeidere fra disse organisasjonene. Dette prosjektet varte til 2008. Inge Fottland har hatt ansvar for campusutvikling ved NTNU fram til våren 2013. Fra høsten 2011 ble Inge Fottland også konstituert som studiedirektør. Fra våren 2013 ble han ansatt i fast stilling som studiesjef. Før det var han administrerende direktør i et konsulentselskap som spesialiserte seg i sykehusplanlegging og prosjektering. Fra 1992-2002 var Inge Fottland administrerende direktør/prosjektdirektør for planlegging og utbygging av St. Olavs Hospital i Trondheim. Dette er et fullt integrert universitetssykehus hvor klinisk pasientbehandling er integrert med forskning og utdanning. Han har også vært direktør for helse- og sosialtjenester for Sør-Trøndelag fylkeskommune. Inge Fottland har hatt verv i UNESCO, ILO, EU og Nordisk Ministerråd. I tillegg har han undervist i den videregående skolen fra 1974 -1985 på allmennfaglig studieretning  i naturfagene, samfunnskunnskap og sosialøkonomi.',
		]);


		Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Pause',
			'description' => '',
			'location' => '',
			'category' => 'break',
			'target_audience' => '',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 04, 15, 00, 01),
			'end_time' => Carbon::create(2015, 05, 04, 15, 15, 00),
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












		//Neste dag


		$session_18 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Plenum: Social Media and Co-learning',
			'description' => 'Vi gjør oppmerksom på at foredraget vil bli holdt på engelsk.',
			'location' => 'Auditorium EL 5',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 9, 00, 01),
			'end_time' => Carbon::create(2015, 05, 05, 10, 00, 00),
		]);


		Speaker::create([
			'session_id' => $session_18->id,
			'first_name' => 'Howard',
			'last_name' => ' Rheingold',
			'affiliation' => 'Rheingold University',
			'title' => 'Regional Director',
			'description' => 'Rehingold omtales som den første innbyggeren på Internett. Rheingolds spesialområde er hvordan kommunikasjonsteknologi virker inn på samfunnet sosialt, politisk og kulturelt. Han er spesielt interessert i hvordan dette påvirker læring og utdanning, og er en av verdens mest inviterte talere på konferanser om dette temaet. Rheingold har undervist på universitet som Stanford og Berkeley innen sine spesialområder.',
		]);


		$session_19 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Pause',
			'description' => '',
			'location' => '',
			'category' => 'break',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 10, 00, 01),
			'end_time' => Carbon::create(2015, 05, 05, 10, 30, 00),
		]);





		//Spor

		$session_20 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Digital eksamen. Fra behov til gjennomføring',
			'description' => 'Det medisinske fakultetet, UiO, hadde tidligere vanlige, essaypregete skole-eksamener. I en ekstern evaluering av studiet og eksamen ble det påvist at denne eksamensformen hadde både lav content validity, sampling validity og reliabilitet. Det ble da satt i gang en stor reform av eksamen med innføring blant annet av OSCE-eksamener og digitale eksamener. Digital eksamen ved med.fak. har således et pedagogisk fundament, ikke et logistisk. I foredraget gjøres det rede for denne bakgrunnen, hvordan digital eksamen ble bygd opp for å svare på de eksamenspedagogiske utfordringene, kvalitetssikringstiltak før og etter eksamen, digital sensur og kort om veien videre: nasjonale prøver, gjenbruk, kobling formative/summative prøver, digital evaluering av praktiske prøver (OSCE), håndtering av flerspråklige eksamenssett.',
			'location' => 'Auditorium EL 5',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 10, 30, 01),
			'end_time' => Carbon::create(2015, 05, 05, 11, 15, 00),
		]);

		Speaker::create([
			'session_id' => $session_20->id,
			'first_name' => 'Per',
			'last_name' => ' Grøttum',
			'affiliation' => 'Det medisinske fakultet, Universitetet i Oslo',
			'title' => 'Professor i medisinsk informatikk ved Seksjon for medisinsk informatikk',
			'description' => 'Rehingold omtales som den første innbyggeren på Internett. Rheingolds spesialområde er hvordan kommunikasjonsteknologi virker inn på samfunnet sosialt, politisk og kulturelt. Han er spesielt interessert i hvordan dette påvirker læring og utdanning, og er en av verdens mest inviterte talere på konferanser om dette temaet. Rheingold har undervist på universitet som Stanford og Berkeley innen sine spesialområder.',
		]);



		$session_21 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Juridiske aspekter ved digital eksamen',
			'description' => 'Jegersberg er juridisk rådgiver i IT-direktørens stab på Universitetets senter for informasjonsteknologi ved UiO, med hovedarbeidsområder innenfor IT og personvern. Innledningen hennes tar utgangspunkt i en juridisk rapport som ble skrevet våren 2014 av en arbeidsgruppe med jurister på oppdrag fra Ekspertgruppen for digital vurdering og eksamen. Rapporten belyser og gjennomgår juridiske utfordringer knyttet til gjennomføringen av digital vurdering og eksamen Hele sektoren må forberede seg på en ny hverdag med digitalisering av læremidler, undervisning og vurderingsformer, og dette betyr at vi alle må tilpasse oss nye juridiske problemstillinger. De fleste problemstillingene eksisterer allerede, men digitaliseringen krever at vi tar nye gjennomganger og ser på dem i et annet lys enn tidligere. Stikkord: Bruk av utstyr - eget og institusjonens, administrative spørsmål om blant annet lagring og innsyn, rettigheter, plikter, ansvar, krav til autentisering, monitorering, plagiatkontroll og skytjeneste.',
			'location' => 'Auditorium EL 5',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 10, 30, 01),
			'end_time' => Carbon::create(2015, 05, 05, 11, 15, 00),
		]);

		Speaker::create([
			'session_id' => $session_21->id,
			'first_name' => 'Maren',
			'last_name' => ' Jegersberg,',
			'affiliation' => 'Universitetet i Oslo',
			'title' => 'Juridisk rådgiver',
			'description' => '',
		]);


		$session_22 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Digital tilstand 2014, fra undervisning til læring - et spørsmål om utdanningsledelse?',
			'description' => 'Presentasjonen vil gi et oversiktsbilde av den digitale tilstanden i UH-sektoren med utgangspunkt i den nasjonale kvantitative undersøkelsen Digital tilstand 2014. Undersøkelsen ser nærmere på en del forhold knyttet til bruk, tilrettelegging for bruk og betingelser for bruk av teknologi i undervisning. Undersøkelsen ble i 2014 gjennomført for 3. gang, og gir dermed et godt grunnlag for å beskrive både tilstanden, utviklingstrekk og utfordringer knyttet til dagens tilstand. Stikkord: strategier og handlingsplaner, virkemidler, holdninger, undervisnings- og læringsaktiviteter, teknologibruk',
			'location' => 'Auditorium EL 6',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 10, 30, 01),
			'end_time' => Carbon::create(2015, 05, 05, 11, 15, 00),
		]);

		Speaker::create([
			'session_id' => $session_22->id,
			'first_name' => 'Hilde Anite',
			'last_name' => ' Ørnes,',
			'affiliation' => 'Norgesuniversitetet',
			'title' => 'Seniorrådgiver i Norgesuniversitetet og prosjektleder for undersøkelsen Digital tilstand 2014',
			'description' => '',
		]);




		$session_23 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Digitalisering for kvalitet - Hva må gjøres?',
			'description' => '',
			'location' => 'Auditorium EL 6',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 10, 30, 01),
			'end_time' => Carbon::create(2015, 05, 05, 11, 15, 00),
		]);

		Speaker::create([
			'session_id' => $session_23->id,
			'first_name' => 'Jon',
			'last_name' => ' Lanestedt,',
			'affiliation' => 'Norgesuniversitetet',
			'title' => 'Seniorrådgiver',
			'description' => '',
		]);



		$session_24 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Lunsj',
			'description' => '',
			'location' => '',
			'category' => 'social',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 11, 15, 01),
			'end_time' => Carbon::create(2015, 05, 05, 12, 00, 00),
		]);


		$session_25 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Kreativ pedagogikk med teknologi i høyere utdanning',
			'description' => 'Hva skjer når studentene finner all inspirasjon på nett? Instrumentalundervisningen har allerede opplevd dette paradigmeskiftet. Vi har gått fra å være mesterlærere til å bli akademiske VJ. I min undervisningspraksis leter jeg etter nye muligheter for læring. Hva skjer når vi digitaliserer pensum og egen praksis? Mye undervisningspraksis er basert på behaviorisme og kognitivisme, men hva skjer når det digitale sprenger rammene og åpner for høyeffektiv sosialkonstruktivistisk læring og konnektivisme? Med utgangspunkt i WOWmodellen vil jeg vise hvordan jeg gradvis utvikler eksisterende metoder, jobber for individuell integrering i egen praksis og sammen med studentene jobber videre mot en kollektiv integrering av teknologi i læring.',
			'location' => 'Auditorium EL 5',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 12, 00, 01),
			'end_time' => Carbon::create(2015, 05, 05, 12, 45, 00),
		]);

		Speaker::create([
			'session_id' => $session_25->id,
			'first_name' => 'Lage',
			'last_name' => ' Thune Myrberget',
			'affiliation' => 'Westerdals ACT Oslo',
			'title' => 'Høyskolelektor',
			'description' => '',
		]);


		$session_26 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Nasjonale støttetjenester og verktøykasse',
			'description' => '',
			'location' => 'Auditorium EL 6',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 12, 00, 01),
			'end_time' => Carbon::create(2015, 05, 05, 12, 45, 00),
		]);

		Speaker::create([
			'session_id' => $session_26->id,
			'first_name' => 'Frode',
			'last_name' => ' Arntsen',
			'affiliation' => 'Bibsys',
			'title' => 'Direktør',
			'description' => 'Variert operativ tjeneste i Luftforsvaret, senest fra Luftkrigsskolen der han frem til 2001 var leder for en av fagavdelingene. Fra 2001 - 2003 var han rådgiver i Mercuri Urval med fokus på lederrekruttering, utvelgelse og utviklingsprosesser. Fra 2003 til august 2011 ledet han NTNUs etter- og videreutdanningsvirksomhet (NTNU VIDERE), med tilbud til bedrifter og enkeltpersoner. Startet hos BIBSYS 1. sep 2011.',
		]);

		Speaker::create([
			'session_id' => $session_26->id,
			'first_name' => 'Thorleif',
			'last_name' => ' Hallén',
			'affiliation' => 'UNINETT',
			'title' => 'Seniorrådgiver, Tjenester & leveranser',
			'description' => '',
		]);

		Speaker::create([
			'session_id' => $session_26->id,
			'first_name' => 'Kjetil',
			'last_name' => ' Knarlag',
			'affiliation' => 'NTNU',
			'title' => 'Prosjektleder',
			'description' => 'Kjetil er Universells leder. Han har utdanning i pedagogikk og samfunnsvitenskap med hovedfag i politisk historie. Han har i tillegg etterutdanning i universell utforming ved UMB og NTNU. Han har arbeidet 6 år som rådgiver for studenter med funksjonsnedsettelser ved NTNU, og har etablert og utviklet pådriverenheten fra starten i 2003. Han er en mye brukt foredragsholder innen temaene inkludering og universell utforming av læringsmiljø.',
		]);


		$session_27 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Pause',
			'description' => '',
			'location' => '',
			'category' => 'break',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 12, 45, 01),
			'end_time' => Carbon::create(2015, 05, 05, 13, 00, 00),
		]);



		$session_28 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Ideelt digitalt læringsmiljø',
			'description' => '',
			'location' => 'Auditorium EL 5',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 13, 00, 01),
			'end_time' => Carbon::create(2015, 05, 05, 13, 45, 00),
		]);

		Speaker::create([
			'session_id' => $session_28->id,
			'first_name' => 'Magnus',
			'last_name' => 'Aarskaug Rud',
			'affiliation' => 'Altund',
			'title' => '',
			'description' => 'Magnus Aarskaug Rud studerer industriell matematikk ved Institutt for matematiske fag (IMF). Magnus tar for seg kvaliteten på øvingsopplegget ved utvalgte emner. E-post: magnurud@stud.ntnu.no  Mobil: 975 98 733',
		]);





		$session_29 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Eksisterer den "digitale" studenten? Om studenters prioriteringer og personlige ressurser',
			'description' => 'Studenters bruk av tid og innsats i studiene har blitt diskutert både i forskning og i massemediene. I de fleste publiseringene har fokuset vært på å gi lærere anbefalinger om hvordan de kan bruke teknologi for å forbedre studenters "tilnærming til læring". En fersk studie fra 2014 av studenters arbeidsmåter og ressursbruk har derimot vist at digitale verktøy spiller kun en underordnet rolle i studenters hverdag, og at det er optimaliseringen av personlige ressurser som står i fokus for studentene. Det kan altså spørres om den "digitale" studenten virkelig eksisterer og hva man faktisk klarer å oppnå med digitaliseringen av undervisningen. Stikkord for tema/problemstillinger: Personlige ressurser, optimalisering, digital student, teknologi i undervisning',
			'location' => 'Auditorium EL 5',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 13, 00, 01),
			'end_time' => Carbon::create(2015, 05, 05, 13, 45, 00),
		]);

		Speaker::create([
			'session_id' => $session_29->id,
			'first_name' => 'Katja',
			'last_name' => 'Hakel',
			'affiliation' => 'NTNU',
			'title' => 'Universitetslektor ved Program for lærerutdanning',
			'description' => '',
		]);





		$session_30 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Opphavsrett - erfaringer som viser utfordringer – Faglærerperspektiv',
			'description' => '',
			'location' => 'Auditorium EL 6',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 13, 00, 01),
			'end_time' => Carbon::create(2015, 05, 05, 13, 45, 00),
		]);

		Speaker::create([
			'session_id' => $session_30->id,
			'first_name' => 'Magnus H.',
			'last_name' => 'Sandberg',
			'affiliation' => 'NTNU, Institutt for sosiologi og statsvitenskap',
			'title' => 'Universitetslektor',
			'description' => '',
		]);




		$session_31 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'DelRett hjelper deg – opphavsrett og undervisning',
			'description' => 'DelRett tilbyr en samlende tjeneste for opphavsrettslige spørsmål rettet mot grunnopplæringen og høyere utdanning, med det formål å stimulere til økt bruk av digitale læringsressurser. Dette gjør vi ved å besvare typiske spørsmål om opphavsrett og undervisning. Lurer du på om du kan bruke Spotify i undervisningen eller legge ut opptak av forelesninger i læringsplattformen? Du finner svar på DelRett.no Stikkord: Opphavsrett. Undervisning. Deling. Gjenbruk. Klarering.',
			'location' => 'Auditorium EL 6',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 13, 00, 01),
			'end_time' => Carbon::create(2015, 05, 05, 13, 45, 00),
		]);

		Speaker::create([
			'session_id' => $session_31->id,
			'first_name' => 'Hilde S.',
			'last_name' => 'Gaard',
			'affiliation' => 'Norgesuniversitet',
			'title' => 'Rådgiver',
			'description' => '',
		]);


		$session_32 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Pause',
			'description' => '',
			'location' => '',
			'category' => 'break',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 13, 45, 01),
			'end_time' => Carbon::create(2015, 05, 05, 14, 00, 00),
		]);



		$session_33 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Plenum: The Power of Personalized Learning in Higher Education',
			'description' => 'Keynote description: In a digital world, it becomes possible to measure data to discover exactly how lessons, apps, or games really help drive student understanding. Soon, education companies that create the tools and textbooks students use will have to prove how much they actually improve learning. This means publishers will create ever more effective materials to compete in the marketplace, students will get better outside-of class materials, and professors will have ever more insight into student progress. Jose Ferreira, founder and CEO of leading adaptive company Knewton, will explain the impact of the shift from print to digital learning materials in higher education.',
			'location' => 'Auditorium EL 5',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 14, 00, 01),
			'end_time' => Carbon::create(2015, 05, 05, 14, 45, 00),
		]);

		Speaker::create([
			'session_id' => $session_33->id,
			'first_name' => 'Jose',
			'last_name' => 'Ferreira',
			'affiliation' => 'Knewton',
			'title' => 'Administrerende direktør',
			'description' => '',
		]);





		$session_34 = Session::create([
			'conference_id' => $conferenceId,
			'title' => 'Avslutning',
			'description' => '',
			'location' => 'Auditorium EL 5',
			'category' => 'professional',
			'target_audience' => 'All',
			'confirmed' => true,
			'start_time' => Carbon::create(2015, 05, 05, 14, 45, 01),
			'end_time' => Carbon::create(2015, 05, 05, 15, 00, 00),
		]);

		Speaker::create([
			'session_id' => $session_34->id,
			'first_name' => 'Berit J.',
			'last_name' => 'Kjelstad',
			'affiliation' => 'NTNU',
			'title' => 'Prorektor',
			'description' => 'Berit Kjeldstad er Prorektor for utdanning og læringskvalitet ved NTNU. Kjeldstad ble førsteamanuensis ved Fysisk institutt i 1992 innen fagområdet energi- og miljøfysikk, og ble professor i 2001. I januar 2006 ble Kjeldstad instituttleder ved Institutt for fysikk. Siden 1993 har hun arbeidet med problemstillinger knyttet til UV-stråling fra sola, atmosfærefysikk og klima, og har bl.a. 10 års erfaring fra Norges forskningsråd innen klimaprogrammet. Kjelstad ble prorektor for utdanning i 2009.',
		]);
	}
}