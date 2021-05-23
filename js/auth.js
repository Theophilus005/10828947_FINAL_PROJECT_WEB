var authLottie = lottie.loadAnimation({
    container: document.getElementById('authLottie'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: '../lottie/authLottie.json'
  })

  var loadingLottie = lottie.loadAnimation({
    container: document.getElementById('loadingLottie'),
    renderer: 'svg',
    loop: true,
    autoplay: false,
    path: '../lottie/loading.json'
  })


  /* Tweens */

  function switchAuth() {
    const currentAuth = document.getElementById('authType').innerHTML;
    const right = document.getElementById('right');
    console.log(currentAuth);
    if(currentAuth == "SIGN UP") {   
        /* Show Sign In */
      right.style.height = "75vh";
      right.innerHTML = 
      `
      <div id="sign-in-form" class="sign-in-form-space">
            
            <form action="">
                <div id="sign-in-form-div">
                <div class="sign-in-div">
                <img class="user-plus-icon" src="../icons/svgs/sign-in.svg" alt="">
                <h4 id="authType">SIGN IN</h4>
            </div>

                <!-- Email -->
                <div class="email-div">
                <p class="email-label">Email</p>
                <div class="iconInput">                
                <img class="input-icon" src="../icons/svgs/envelope.svg" alt="">
                <input class="email-field" type="text">
            </div>
            </div>

                <!-- Password -->
                <div class="password-div">
                <div class="password-label-div">
                    <p class="password-label">Password</p>
                    <p class="forgot-password">Forgot password?</p>
                </div>                
                <div class="iconInput">                
                <img class="input-icon" src="../icons/svgs/key.svg" alt="">
                <input class="password-field" type="password">
            </div>
            </div>

                <div class="null-account-div">
                <a href="#" onClick="toggleAuth()" id="toggleAuth">Don't Have An Account? Sign Up</a>
            </div>

            <input type="button" class="sign-button" value="SIGN IN">

            <div class="alt-text-div"><p class="alt-text">OR</p></div>

            <button class="google-button">
                <div class="alt-button-content-div">
                <div class="icon-background">
                    <img class="google-icon" src="../icons/google.png" alt="">
                    </div>
                    <span>Sign in with google</span>
                </div>
            </button>

            <button class="facebook-button">
                <div class="alt-button-content-div">
                <div class="icon-background">
                    <img class="google-icon" src="../icons/facebook.png" alt="">
                    </div>
                    <span>Sign in with facebook</span>
                </div>
            </button>
            </form>
        </div>
      `
    }

      else {
        right.style.height = "95vh";
      right.innerHTML = 
      `
      <div id="sign-up-form" class="sign-up-form-space">
            
      <form action="">
          <div id="sign-up-form-div">
          <div class="sign-up-div">
          <img class="user-plus-icon" src="../icons/svgs/user-plus.svg" alt="">
          <h4 id="authType">SIGN UP</h4>
      </div>
          <!-- Username -->
          <div class="name-div">
              <p class="name-label">Username</p>
              <div class="iconInput">                
              <img class="input-icon" src="../icons/svgs/user.svg" alt="">
              <input class="name-field" type="text">
          </div>
          </div>

          <!--Drop down list-->
          <div class="school-list-label-div">
              <p class="school-list-label">School</p>
          </div>
          <div class="school-list-div">
          <div class="iconInput">                
          <img class="input-icon" id="graduation-cap" src="../icons/svgs/graduation-cap.svg" alt="">
          <select name="schools" id="school-list">
           <option value="null" disabled selected>Select your school</option>
           <option value="UG">University of Ghana</option>
           <option value="KNUST">Kwame Nkrumah University of Science & Technology</option>
           <option value="UCC">University of Cape Coast</option>
           <option value="UPSA">University of Professional Studies</option>
           <option value="UEW">University of Education Winneba</option>
          </select>
      </div>
      </div>

          <!-- Email -->
          <div class="email-div">
          <p class="email-label">Email</p>
          <div class="iconInput">                
          <img class="input-icon" src="../icons/svgs/envelope.svg" alt="">
          <input class="email-field" type="text">
      </div>
      </div>

          <!-- Password -->
          <div class="password-div">
          <div class="password-label-div">
              <p class="password-label">Password</p>
          </div>
          <div class="iconInput">                
          <img class="input-icon" src="../icons/svgs/key.svg" alt="">                
          <input class="password-field" type="password">
      </div>
      </div>

      <!-- Confirm Password -->
      <div class="password-div">
          <div class="password-label-div">
              <p class="confirm-password-label">Confirm Password</p>
          </div>
          <div class="iconInput">                
          <img class="input-icon" src="../icons/svgs/key.svg" alt="">                
          <input class="confirm-password-field" type="password">
      </div>
      </div>


          <div class="null-account-div">
          <a href="#" onClick="toggleAuth()" id="toggleAuth">Already Have An Account? Sign In</a>
      </div>

      <input type="button" class="sign-button" value="SIGN UP">

      <div class="alt-text-div"><p class="alt-text">OR</p></div>

      <button class="google-button">
          <div class="alt-button-content-div">
          <div class="icon-background">
              <img class="google-icon" src="../icons/google.png" alt="">
              </div>
              <span>Sign up with google</span>
          </div>
      </button>

      <button class="facebook-button">
          <div class="alt-button-content-div">
          <div class="icon-background">
              <img class="facebook-icon" src="../icons/facebook.png" alt="">
              </div>
              <span>Sign in with facebook</span>
          </div>
      </button>
      </form>
  </div>
      `
      }
 }


 const tl = gsap.timeline({paused: true});
 tl.to('#right', {
     marginLeft: -500,
     onComplete: function() {
        switchAuth();
     }
 })
 .to('#right', {
     marginLeft: 0,
     delay: 1,
     onComplete: function() {
         loadingLottie.stop();
     }
 })


  /* Toogling Between Sign In and Sign Up forms */
  function toggleAuth() {
      loadingLottie.play();
      tl.play(0);  
  }


  /*toggleSignIn.addEventListener('click', toggleAuth);*/


  function signUp() {
    var form = document.getElementsByClassName("sign-up-form")[0];
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
           if(response == "user registered") {
               window.location = "../index.php";
           } else {
               alert(response);
           }
        }
    }
    xhr.open("POST", "../pages/php/auth.php", true);
    xhr.send(formData);
}

//Signs In a User
function signIn() {
    var form = document.getElementsByClassName("sign-in-form")[0];
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            alert(response);
           if(response == "success") {
               window.location = "../index.php";
           } else {
               alert(response);
           }
        }
    }
    xhr.open("POST", "../pages/php/auth.php", true);
    xhr.send(formData);
}