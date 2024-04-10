<html lang="en"><head>
    <meta charset="UTF-8">


  <style>
  html,
  body {
    font-size: 24px;
  }

  .main-container {
    width: 100%;
    height: 100vh;
    display: flex;
    flex-flow: column;
    justify-content: center;
    align-items: center;
  }

  .check-container {
    width: 6.25rem;
    height: 7.5rem;
    display: flex;
    flex-flow: column;
    align-items: center;
    justify-content: space-between;
  }
  .check-container .check-background {
    width: 100%;
    height: calc(100% - 1.25rem);
    background: linear-gradient(to bottom right, #5de593, #41d67c);
    box-shadow: 0px 0px 0px 65px rgba(255, 255, 255, 0.25) inset, 0px 0px 0px 65px rgba(255, 255, 255, 0.25) inset;
    transform: scale(0.84);
    border-radius: 50%;
    animation: animateContainer 0.75s ease-out forwards 0.75s;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
  }
  .check-container .check-background svg {
    width: 65%;
    transform: translateY(0.25rem);
    stroke-dasharray: 80;
    stroke-dashoffset: 80;
    animation: animateCheck 0.35s forwards 1.25s ease-out;
  }
  .check-container .check-shadow {
    bottom: calc(-15% - 5px);
    left: 0;
    border-radius: 50%;
    background: radial-gradient(closest-side, #49da83, transparent);
    animation: animateShadow 0.75s ease-out forwards 0.75s;
  }

  @keyframes animateContainer {
    0% {
      opacity: 0;
      transform: scale(0);
      box-shadow: 0px 0px 0px 65px rgba(255, 255, 255, 0.25) inset, 0px 0px 0px 65px rgba(255, 255, 255, 0.25) inset;
    }
    25% {
      opacity: 1;
      transform: scale(0.9);
      box-shadow: 0px 0px 0px 65px rgba(255, 255, 255, 0.25) inset, 0px 0px 0px 65px rgba(255, 255, 255, 0.25) inset;
    }
    43.75% {
      transform: scale(1.15);
      box-shadow: 0px 0px 0px 43.334px rgba(255, 255, 255, 0.25) inset, 0px 0px 0px 65px rgba(255, 255, 255, 0.25) inset;
    }
    62.5% {
      transform: scale(1);
      box-shadow: 0px 0px 0px 0px rgba(255, 255, 255, 0.25) inset, 0px 0px 0px 21.667px rgba(255, 255, 255, 0.25) inset;
    }
    81.25% {
      box-shadow: 0px 0px 0px 0px rgba(255, 255, 255, 0.25) inset, 0px 0px 0px 0px rgba(255, 255, 255, 0.25) inset;
    }
    100% {
      opacity: 1;
      box-shadow: 0px 0px 0px 0px rgba(255, 255, 255, 0.25) inset, 0px 0px 0px 0px rgba(255, 255, 255, 0.25) inset;
    }
  }
  @keyframes animateCheck {
    from {
      stroke-dashoffset: 80;
    }
    to {
      stroke-dashoffset: 0;
    }
  }
  @keyframes animateShadow {
    0% {
      opacity: 0;
      width: 100%;
      height: 15%;
    }
    25% {
      opacity: 0.25;
    }
    43.75% {
      width: 40%;
      height: 7%;
      opacity: 0.35;
    }
    100% {
      width: 85%;
      height: 15%;
      opacity: 0.25;
    }
  }
  .text-container {
    text-align: center;
    line-height: 11px;
}
  </style>




  </head>
  <body translate="no">
    <div class="main-container">
        <div class="check-container">
            <div class="check-background">
                <svg viewBox="0 0 65 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 25L27.3077 44L58.5 7" stroke="white" stroke-width="13" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <div class="check-shadow"></div>
        </div>
        <div class="text-container">
            <h2>Congratulations!</h2>
            <p>Your booking has been confirmed.</p>
        </div>
    </div>
    <script>
        // Wait for 4 seconds before redirecting
        setTimeout(function() {
            // Redirect to the index page
            window.location.href = "/";
        }, 3000); // 4000 milliseconds = 4 seconds
    </script>
</body>
</html>
