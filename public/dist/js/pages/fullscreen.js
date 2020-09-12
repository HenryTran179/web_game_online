
    /* Get the element you want displayed in fullscreen */ 
    var elem = document.getElementById("game");
    
    /* Function to open fullscreen mode */
    function openFullscreen() {
      /* If fullscreen mode is available, show the element in fullscreen */
      if (
        document.fullscreenEnabled || /* Standard syntax */
        document.webkitFullscreenEnabled || /* Chrome, Safari & Opera */
        document.mozFullScreenEnabled || /* Firefox */
        document.msFullscreenEnabled /* IE/Edge */
      ) {
       
        /* Show the element in fullscreen */
        elem.webkitRequestFullscreen();
        if (elem.requestFullscreen) {
          elem.requestFullscreen(); /* Standard syntax */
        } else if (elem.mozRequestFullScreen) { /* Firefox */
          elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
          elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { /* IE/Edge */
          elem.msRequestFullscreen();
        }
        
      }
    }