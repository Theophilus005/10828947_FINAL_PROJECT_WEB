/* User Lottie Icon */

var userLottie = lottie.loadAnimation({
    container: document.getElementById('user-lottie'),
    renderer: 'svg',
    loop: true,
    autoplay: false,
    path: 'lottie/user.json'
  })

  /* Facebook Lottie Icon */
  var facebookLottie = lottie.loadAnimation({
    container: document.getElementById('facebook'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'lottie/facebookLottie.json'
  })

  /* Twitter Lottie Icon */
  var twitterLottie = lottie.loadAnimation({
    container: document.getElementById('twitter'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'lottie/twitterLottie.json'
  })

  /* Instagram Lottie Icon */
  var instagramLottie = lottie.loadAnimation({
    container: document.getElementById('instagram'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'lottie/instagramLottie.json'
  })

  /* WhatsApp Lottie Icon */
  var whatsAppLottie = lottie.loadAnimation({
    container: document.getElementById('whatsApp'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'lottie/whatsAppLottie.json'
  })
    
  /*Telegram Lottie Icon */ 
  var telegramLottie = lottie.loadAnimation({
    container: document.getElementById('telegram'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'lottie/telegramLottie.json'
  })

  /* Background Lottie Image */
  var backgroundLottie = lottie.loadAnimation({
    container: document.getElementById('background-lottie'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'lottie/backgroundLottie.json',
    rendererSettings: {
      preserveAspectRatio: 'xMidYMid slice',
    }
  })

   /*Menu Lottie Icon */ 
  var menuLottie = lottie.loadAnimation({
    container: document.getElementById('menu-lottie'),
    renderer: 'svg',
    loop: true,
    autoplay: false,
    path: 'lottie/menuLottie.json'
  })


  /* Controls */
const navLinks = document.querySelectorAll('.navlinks ul li a');
const menu = document.getElementById('menu-lottie');

navLinks.forEach(link=> {
  link.addEventListener('mouseover', ()=> {
    userLottie.play();
  })

  link.addEventListener('mouseout', ()=> {
    userLottie.stop();
  })

  menu.addEventListener('click', ()=> {
    menuLottie.play();
  
    menuLottie.addEventListener('loopComplete', ()=> {
    menuLottie.pause();
  })

  })
})