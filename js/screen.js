  <script>
         var prefix = 'orientation' in screen ? '' :
                      'mozOrientation' in screen ? 'moz' :
                      'msOrientation' in screen ? 'ms' :
                      null;

         if (prefix === null) {
            document.getElementById('so-unsupported').classList.remove('hidden');

            ['lock-button', 'unlock-button'].forEach(function(elementId) {
               document.getElementById(elementId).setAttribute('disabled', 'disabled');
            });
         } else {
            var select = document.getElementById('orientation-type');
            var orientationElem = document.getElementById('orientation');
            var onChangeHandler;

            var Fullscreen = {
               launch: function(element) {
                  if(element.requestFullscreen) {
                     element.requestFullscreen();
                  } else if(element.mozRequestFullScreen) {
                     element.mozRequestFullScreen();
                  } else if(element.webkitRequestFullscreen) {
                     element.webkitRequestFullscreen();
                  } else if(element.msRequestFullscreen) {
                     element.msRequestFullscreen();
                  }
               },
               exit: function() {
                  if(document.exitFullscreen) {
                     document.exitFullscreen();
                  } else if(document.mozCancelFullScreen) {
                     document.mozCancelFullScreen();
                  } else if(document.webkitExitFullscreen) {
                     document.webkitExitFullscreen();
                  } else if (document.msExitFullscreen) {
                     document.msExitFullscreen();
                  }
               }
            };

            // Determine what version of the API is implemented
            if ('orientation' in screen && 'angle' in screen.orientation) {
               // The browser supports the new version of the API

               // Show the properties supported by the new version
               var newProperties = document.getElementsByClassName('new-api');
               for(var i = 0; i < newProperties.length; i++) {
                  newProperties[i].classList.remove('hidden');
               }

               document.getElementById('lock-button').addEventListener('click', function (event) {
                  event.preventDefault();
                  Fullscreen.launch(document.documentElement);
                  screen.orientation.lock(select.value);
               });

               document.getElementById('unlock-button').addEventListener('click', function (event) {
                  event.preventDefault();
                  Fullscreen.exit();
                  screen.orientation.unlock();
               });

               var angleElem = document.getElementById('angle');
               onChangeHandler = function() {
                  orientationElem.textContent = screen.orientation.type;
                  angleElem.textContent = screen.orientation.angle;
               };
               screen.orientation.addEventListener('change', onChangeHandler);
               onChangeHandler();
            } else {
               // The browser supports the old version of the API, so the user is informed of that
               document.getElementById('soo-supported').classList.remove('hidden');

               // Remove the options that aren't available in the old version of the API
               var unavailableOptions = [
                  document.querySelector('#orientation-type option[value="any"]'),
                  document.querySelector('#orientation-type option[value="natural"]')
               ];
               for(var i = 0; i < unavailableOptions.length; i++) {
                  unavailableOptions[i].parentElement.removeChild(unavailableOptions[i]);
               }

               document.getElementById('lock-button').addEventListener('click', function (event) {
                  event.preventDefault();
                  Fullscreen.launch(document.documentElement);

                  setTimeout(function () {
                     screen[prefix + (prefix === '' ? 'l' : 'L') + 'ockOrientation'](select.value);
                  }, 1);
               });
               document.getElementById('unlock-button').addEventListener('click', function (event) {
                  event.preventDefault();
                  screen[prefix + (prefix === '' ? 'u' : 'U') + 'nlockOrientation']();
                  Fullscreen.exit();
               });

               onChangeHandler = function() {
                  var orientationProperty = prefix + (prefix === '' ? 'o' : 'O') + 'rientation';
                  orientationElem.textContent = screen[orientationProperty];
               };
               screen.addEventListener(prefix + 'orientationchange', onChangeHandler);
               onChangeHandler();
            }
         }
      </script>