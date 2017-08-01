/*!
 * Waves v0.7.5
 * http://fian.my.id/Waves
 *
 * Copyright 2014-2016 Alfiana E. Sibuea and other contributors
 * Released under the MIT license
 * https://github.com/fians/Waves/blob/master/LICENSE
 */

 //문자열을 스타일의 형태로 바꾸어 리턴
function convertStyle(styleObj) {
    var style = '';
    for (var prop in styleObj) {
        if (styleObj.hasOwnProperty(prop)) {
            style += (prop + ':' + styleObj[prop] + ';');
        }
    }
    return style;
}
/* 파동효과 리터널 객체형태로 구현
   wave는 ripple이라는 div를 계속 중첩해서 올리면서 파동효과를 만들어냄.
   속성값은 ripple이라는 div의 특성을 변화시킴.
   이 객체는 속성값, set함수, show, hide로 구성
 */
var WaveEffect = {

    // x,y : ripple의 생성 위치 -> 단위는 px
    // duration : ripple이 제거되는 시간 -> DB에서는 ms단위로 저장하고, UI상에서는 s단위로 저장
    // delay : ripple이 사라지는 시간(화면에서 보여지지 않는 시간) -> 단위는 duration과 동일
    // transition : ripple 생성될때 마다 변화하는 정도를 나타냄 -> 단위는 px
    // color : ripple의 백그라운드 색깔을 의미 -> UI나 DB에서는 특정 인덱스를 클릭하므로 색상을 정할 수 있도록 함.

    x:0, y:0,
    duration: 1000, delay: 300,
    scale: 0.05,
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

    //리플을 만들어내는 함수
    show: function(element) {
        element = element || this;

        //리플 생성
        var ripple = document.createElement('div');
        ripple.className = 'waves-ripple waves-rippling';
        element.appendChild(ripple);

        //리플 속성을 현재 객체의 정보를 이용해서 설정
        var relativeX = this.x;
        var relativeY = this.y;
        var scale     = 'scale(' + element.clientWidth * this.scale + ')';
        var translate = 'translate(' + this.transition_x + 'px, ' + this.transition_y + 'px)';
        var color = this.color;
        var rippleStyle = {
            top: relativeY + 'px',
            left: relativeX + 'px',
            background: color,
        };
        var duration = this.duration;

        // 리플에 추가적인 데이터를 같이 날려보냄
        ripple.setAttribute('data-hold', Date.now());
        ripple.setAttribute('data-x', relativeX);
        ripple.setAttribute('data-y', relativeY);
        ripple.setAttribute('data-scale', scale);
        ripple.setAttribute('data-translate', translate);

        //스타일 적용 전에 변화를 중지시킴
        ripple.classList.add('waves-notransition');
        //위에서 지정한 고정적인 스타일을 적용 (x, y, color)
        ripple.setAttribute('style', convertStyle(rippleStyle));
        //고정적인 스타일 적용이후 transition 스타일 적용 (scale, duration, translate)
        ripple.classList.remove('waves-notransition');

        //transition1 : scale 변화, translate 변화 (다양한 웹브라우저 호환)
        rippleStyle['-webkit-transform']  = scale + ' ' + translate;
        rippleStyle['-moz-transform'] = scale + ' ' + translate;
        rippleStyle['-ms-transform'] = scale + ' ' + translate;
        rippleStyle['-o-transform'] = scale + ' ' + translate;
        rippleStyle.transform = scale + ' ' + translate;

        //transition2 : 점점 투명해지게 변화 (영상에 방해가 되지 않기 위해 1)
        rippleStyle.opacity = '1';

        //transition3 : duration 변화 (다양한 웹브라우저 호환)
        rippleStyle['-webkit-transition-duration'] = duration + 'ms';
        rippleStyle['-moz-transition-duration']    = duration + 'ms';
        rippleStyle['-o-transition-duration']      = duration + 'ms';
        rippleStyle['transition-duration']         = duration + 'ms';

        //위의 transition 변화 역시 style로 설정
        ripple.setAttribute('style', convertStyle(rippleStyle));

    },

    //모든 리플을 삭제하는 함수
    hide: function(element) {
        element = element || this;
        var ripples = element.getElementsByClassName('waves-rippling');
        for (var i = 0, len = ripples.length; i < len; i++) {
            //각각의 리플을 제거하는 함수
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
    //리플 제거
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

//외부에서 waveEffect를 사용하기 위한 함수
function makeWaveEffect(e) {
    var element = getWavesWaveEffectElement(e);
    if (element !== null) {
      //show와 hide를 같이 쓰는 이유는 show가 만들어지고 나서 hide가 발생하지 않는다면 중첩되서 화면이 보이지 않음
      WaveEffect.show(element);
      WaveEffect.hide(element);
    }
}

//파동효과를 적용시킬 HTML element를 찾아야함
function getWavesWaveEffectElement(e) {
    var element = null;
    var target = e;
    //상위태그를 계속검색하는데 waves-effect라는 태그가 나오면 중지함.
    //즉, 상위태그에 waves-effect라는 태그가 없으면 동작하지 않음.
    while (target.parentElement) {
        if (target.classList.contains('waves-effect')) {
            element = target;
            break;
        }
        target = target.parentElement;
    }
    return element;
}

function setWaveEffect(data) {
  $("#media2").bind("timeupdate", function(){
    for (var i = 0; i < data.length; i++){
       //session 데이터 변환
       var start_t = data[i]['startTime']/1000;
       var end_t = data[i]['endTime']/1000;
       var x = data[i]['pos_x'];
       var y = data[i]['pos_y'];
       var duration = data[i]['duration'];
       var delay = data[i]['delay'];
       var scale = data[i]['scale']/1000;
       var trans_x = data[i]['trans_x'];
       var trans_y = data[i]['trans_y'];
       var color = data[i]['color'];

       //css크기와 video크기 비교
       var scaleX = this.videoWidth / $("#media2").outerWidth();
       var scaleY = this.videoHeight / $("#media2").outerHeight();

       //x, y 변환
       x = (x - 0.5)/scaleX;
       y = (y - 0.5)/scaleY;
       
       if(this.currentTime >= start_t && this.currentTime<end_t){
          WaveEffect.setLocation(x,y);
          WaveEffect.setColor(color);
          WaveEffect.setScale(scale);
          WaveEffect.setTransition(trans_x, trans_y);
          makeWaveEffect($(".waves-box")[0]);
        }
      }
   });
}
