var tourSubmitFunc = function(e,v,m,f){
			if(v === -1){
				$.prompt.prevState();
				return false;
			}
			else if(v === 1){
				$.prompt.nextState();
				return false;
			}
},
tourStates = [
	{
		title: 'Välkommen!',
		html: 'Det här är en kort guide som visar hur läromiljön i Kod&shy;knackaren fungerar.',
		buttons: { 'Nästa': 1 },
		focus: 0,
		submit: tourSubmitFunc
	},
	{
		html: 'Som du kanske märkt är läromiljön är indelad i tre delar. I den här vänstra delen kommer du få instruktioner från Knacke, vår maskot.',
		buttons: { 'Nästa': 1 },
		focus: 0,
		position: { container: '#lesson-contents', x: 0, y: 60, width: 300, arrow: 'tc' },
		submit: tourSubmitFunc
	},
	{
		html: 'Knacke håller reda på vilken lektion du befinner dig i, så när du startar Kodknackaren nästa gång kommer du tillbaka till lektionen du var på senast. Skulle du vilja backa till en tidigare lektion kan du göra det med den här menyn.',
		buttons: { 'Backa': -1, 'Nästa': 1 },
		focus: 1,
		position: { container: '#section-left-right', x: -100, y: 60, width: 300, arrow: 'tc' },
		submit: tourSubmitFunc
	},
	{
		html: 'Den här mätaren visar hur långt du har kommit och hur många övningar du har kvar i den här lektionen.',
		buttons: { 'Backa': -1, 'Nästa': 1 },
		focus: 1,
		position: { container: '#progress-div', x: 0, y: 60, width: 300, arrow: 'tc' },
		submit: tourSubmitFunc
	},
	{
		html: 'I den här stora gula rutan skriver du din kod.',
		buttons: { 'Backa': -1, 'Nästa': 1 },
		focus: 1,
		position: { container: '#editor', x: 100, y: 100, width: 300, arrow: 'bc' },
		submit: tourSubmitFunc
	},
	{
		html: 'För att köra din kod trycker du på den här knappen. När du har kört programmet minst en gång kommer rättningsknappen nedan bli aktiverad.',
		buttons: { 'Backa': -1, 'Nästa': 1 },
		focus: 1,
		position: { container: '#run-code', x: -100, y: 60, width: 300, arrow: 'tc' },
		submit: tourSubmitFunc
	},
	{
		html: 'De här andra knapparna kan hjälpa dig med redigeringen av din kod. Om du använt ord&shy;behand&shy;lings&shy;program som Word känner du säkert igen vad de gör. Håll musen över en knapp för att se dess be&shy;skriv&shy;ning och ett kortkommando som du kan använda istället för att klicka på knappen, så sparar du tid.',
		buttons: { 'Backa': -1, 'Nästa': 1 },
		focus: 1,
		position: { container: '#editor-menu', x: 0, y: 60, width: 400, arrow: 'tc' },
		submit: tourSubmitFunc
	},
	{
		html: 'Om programmet gör något, så som att visa text, kommer du se det i den här högra spalten.',
		buttons: { 'Backa': -1, 'Nästa': 1 },
		focus: 1,
		position: { container: '#run-output', x: -200, y: 60, width: 300, arrow: 'rm' },
		submit: tourSubmitFunc
	},
	{
		html: 'Om du känner dig nöjd med resultatet trycker du på den här knappen. Det som händer är att din kod kommer köras mot ett antal testfall som avgör om din kod fungerar eller inte.',
		buttons: { 'Backa': -1, 'Nästa': 1 },
		focus: 1,
		position: { container: '#grade-code-button', x: 0, y: -200, width: 300, arrow: 'bl' },
		submit: tourSubmitFunc
	},
	{
		html: 'Resultatet av rättningen kommer du se i rutan nedan. Om koden är godkänd får du fortsätta till nästa instruktion. Vissa övningar ger dig också poäng och låser upp medaljer. ',
		buttons: { 'Backa': -1, 'Nästa': 1 },
		focus: 1,
		position: { container: '#grading-box', x: 80, y: 10, width: 500, arrow: 'lt' },
		submit: tourSubmitFunc
	},
	{
		html: 'Vissa av övningarna är extra kluriga. Skulle du fastna kan du trycka på den här knappen för att byta några poäng mot en ledtråd.',
		buttons: { 'Backa': -1, 'Nästa': 1 },
		focus: 1,
		position: { container: '#hint-button', x: -50, y: -180, width: 300, arrow: 'bc' },
		submit: tourSubmitFunc
	},
	{
		html: 'Det var allt! Är du redo att bli den näste Kodknackaren?',
		buttons: { 'Backa': -1, 'Jag är redo!': 2 },
		focus: 1,
		submit: tourSubmitFunc
	}
];
$.prompt(tourStates);
