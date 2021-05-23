var helpText = document.getElementById('help-text');

  const typewriter = new Typewriter(helpText, {
    loop: true,
  });

  typewriter.typeString('Intro to software engineering')
    .pauseFor(2500)
    .deleteAll()
    .typeString('Project 3')
    .pauseFor(2500)
    .deleteAll()
    .typeString('An ecommerce database driven website  ')
    .pauseFor(2500)
    .start();
