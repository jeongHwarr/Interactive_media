/*!
 * Waves v0.7.5
 * http://fian.my.id/Waves
 *
 * Copyright 2014-2016 Alfiana E. Sibuea and other contributors
 * Released under the MIT license
 * https://github.com/fians/Waves/blob/master/LICENSE
 */
function convertStyle(styleObj) {
    var style = '';
    for (var prop in styleObj) {
        if (styleObj.hasOwnProperty(prop)) {
            style += (prop + ':' + styleObj[prop] + ';');
        }
    }
    return style;
}
var WaveEffect = {
    // default ripple location
    x:0, y:0,
    // duration : remove ripple after this time(ms)
    // delay : fadeout ripple after this time(ms)
    duration: 1000, delay: 300,
    scale: 0.05,
    // move to ripple location when it is created
    transition_x:0, transition_y:0,
    color:"rgba(#ffffff, 0)",

    setLocation: function(x, y){
      this.x=x;
      this.y=y;
    },
    setDuration: function(time){
      this.duration = time;
    },
    setDelay:function(time){
      this.delay = time;
    },
    setScale:function(scale){
      this.scale = scale;
    },
    setTransition:function(x,y){
      this.transition_x=x;
      this.transition_y=y;
    },
    setColor:function(color){
      if(color==0){
        this.color="#676c6c";
      } else if(color==1){
        this.color="#7c7cf9";
      } else if(color==2){
        this.color="#f28686";
      } else{
        this.color="#a1f4b6";
      }
    },

    show: function(element) {

        element = element || this;
        // Create ripple
        var ripple = document.createElement('div');
        ripple.className = 'waves-ripple waves-rippling';
        element.appendChild(ripple);
        var relativeX = this.x; var relativeY = this.y;
        var scale     = 'scale(' + element.clientWidth * this.scale + ')';
        var translate = 'translate(' + this.transition_x + 'px, ' + this.transition_y + 'px)';
        // Attach data to element
        ripple.setAttribute('data-hold', Date.now());
        ripple.setAttribute('data-x', relativeX);
        ripple.setAttribute('data-y', relativeY);
        ripple.setAttribute('data-scale', scale);
        ripple.setAttribute('data-translate', translate);
        var color = this.color;
        // Set ripple position
        var rippleStyle = {
            top: relativeY + 'px',
            left: relativeX + 'px',
            background: color,
        };
        ripple.classList.add('waves-notransition');
        ripple.setAttribute('style', convertStyle(rippleStyle));
        ripple.classList.remove('waves-notransition');
        // Scale the ripple
        rippleStyle['-webkit-transform'] = scale + ' ' + translate;
        rippleStyle['-moz-transform'] = scale + ' ' + translate;
        rippleStyle['-ms-transform'] = scale + ' ' + translate;
        rippleStyle['-o-transform'] = scale + ' ' + translate;
        rippleStyle.transform = scale + ' ' + translate;
        rippleStyle.opacity = '1';

        var duration = this.duration;
        rippleStyle['-webkit-transition-duration'] = duration + 'ms';
        rippleStyle['-moz-transition-duration']    = duration + 'ms';
        rippleStyle['-o-transition-duration']      = duration + 'ms';
        rippleStyle['transition-duration']         = duration + 'ms';
        ripple.setAttribute('style', convertStyle(rippleStyle));
        // ripple.style.zIndex = 2147483647;
    },
    hide: function(element) {
        element = element || this;
        var ripples = element.getElementsByClassName('waves-rippling');
        for (var i = 0, len = ripples.length; i < len; i++) {
            removeRipple(element, ripples[i]);
        }
    }
};
/**
 * Hide the WaveEffect and remove the ripple. Must be
 * a separate function to pass the JSLint...
 */
function removeRipple(el, ripple) {
    // Check if the ripple still exist
    if (!ripple) {
        return;
    }
    ripple.classList.remove('waves-rippling');
    var relativeX = ripple.getAttribute('data-x');
    var relativeY = ripple.getAttribute('data-y');
    var scale     = ripple.getAttribute('data-scale');
    var translate = ripple.getAttribute('data-translate');
    var duration = WaveEffect.duration;
    var delay = WaveEffect.delay;

    // Fade out ripple after delay
    setTimeout(function() {
        var style = {
            top: relativeY + 'px',
            left: relativeX + 'px',
            opacity: '0',

            '-webkit-transition-duration': duration + 'ms',
            '-moz-transition-duration': duration + 'ms',
            '-o-transition-duration': duration + 'ms',
            'transition-duration': duration + 'ms',
            '-webkit-transform': scale + ' ' + translate,
            '-moz-transform': scale + ' ' + translate,
            '-ms-transform': scale + ' ' + translate,
            '-o-transform': scale + ' ' + translate,
            'transform': scale + ' ' + translate
        };
        ripple.setAttribute('style', convertStyle(style));
        //Remove Ripple After Duration
        setTimeout(function() {
            try {
                el.removeChild(ripple);
            } catch (e) {
                return false;
            }
        }, duration);
    }, delay);
}
function makeWaveEffect(e) {
    var element = getWavesWaveEffectElement(e);
    if (element !== null) {
      WaveEffect.show(element);
      WaveEffect.hide(element);
    }
}
function getWavesWaveEffectElement(e) {
    var element = null;
    var target = e;
    while (target.parentElement) {
        if (target.classList.contains('waves-effect')) {
            element = target;
            break;
        }
        target = target.parentElement;
    }
    return element;
}
