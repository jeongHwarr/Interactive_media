/*!
* Animate.css
* https://daneden.github.io/animate.css/
* Copyright (c) 2016 Daniel Eden
* Released under The MIT License (MIT)
* https://github.com/daneden/animate.css
*/

var stickerEffect ={

  startTime:0, //s
  endTime:0,   //e
  x:0, //x
  y:0, //y
  animation:"", //a
  width:0,
  height:0,
  delay:0,
  url:"",
  id:0,
  angle:0,
  opacity:0,

  //startTime,endTime : Sticker 효과 시작시간과 끝시간 지정
  //x,y : Sticker 효과 영상속 좌표지정
  //animation : 애니메이션 효과이름
  //width : Sticker 가로길이. 단위 :px
  //height : Sticker 세로길이. 단위 :px
  //delay : 애니메이션 한번의 지속 시간, 단위 :s
  //url : 삽입이미지에 대한 URL주소
  //id : Sticker 하나당 고유 ID
  //angle : Sticker의 각도 조절
  //opacity : Sticker의 알파값조정으로 투명도 조절

  myfunction_s_basic: function(s,e,x,y,a){
    this.startTime = s;
    this.endTime = e;
    this.x = x;
    this.y = y;
    this.animation = a;
  },
  myfunction_s_width: function(x){
    this.width =x ;
  },
  myfunction_s_height: function(x){
    this.height = x;
  },
  myfunction_s_delay: function(x){
    this.delay = x;
  },
  myfunction_s_url: function(x){
    this.url = x;
  },
  myfunction_s_id: function(x){
    this.id = x;
  },
  myfunction_s_angle: function(x){
    this.angle = x;
  },
  myfunction_s_opacity: function(x){
    this.opacity = x;
  },


//효과적용 시간외의 범위에서 sticker효과 숨기는 함수
  sticker_hide: function(){
        var check = document.getElementById(this.id);
            if (check=== null){
              return;
            }else{
              document.getElementById(this.id).style.display="none";
                 }
  },

//sticker를 만들기 위해  ID존재 유무를 확인하는 함수(sticker_make 전단계)
  sticker_id_check: function(){
      var check = document.getElementById(this.id);
    if(check=== null){
        this.sticker_make();
    }else{
      return;
    }
  },

//sticker 효과 만드는 함수
  sticker_make: function(){
    var make_p = document.createElement('img');
    $(".sticker_d").append(make_p);
    make_p.setAttribute('id',this.id);
  },

//sticker 효과 보여주는 함수
  sticker_show: function(){
        document.getElementById(this.id).style.display="block";
        document.getElementById(this.id).style.position="absolute";
        document.getElementById(this.id).setAttribute('class',this.animation);
        document.getElementById(this.id).style.top= this.y + 'px';
        document.getElementById(this.id).style.left=this.x + 'px';
        document.getElementById(this.id).style.width = this.width * scale + 'px';
        document.getElementById(this.id).style.height = this.height * scale + 'px';
        document.getElementById(this.id).style.animationDuration=this.delay +'s';
        document.getElementById(this.id).src = this.url;
        document.getElementById(this.id).style.opacity = this.opacity;
        document.getElementById(this.id).style.transform = "rotate("+this.angle+"deg)";
      },

//비디오 플레이 상태에서 caption 효과 보여주는 함수
  sticker_reveal: function(){
          var check = document.getElementById(this.id);
                 if (check=== null){
                         return;
                   }else{
                    document.getElementById(this.id).style.display="block";
                            }
                         },

//비디오 정지상태에서 caption 효과 감추는 함수
  sticker_borrow: function(){
         var check = document.getElementById(this.id);
               if (check=== null){
                      return;
                 }else{
                     document.getElementById(this.id).style.display="none";
                     }
   }
      };


  //sticker 만드는 메인 함수
  function Make_sticker_effect(){
      for (var i = 0; i < stickers_session_data.length; i++){
        //session 데이터 변환
          var s_start_t = stickers_session_data[i]['startTime']/1000;
          var s_end_t = stickers_session_data[i]['endTime']/1000;
          var s_x = stickers_session_data[i]['pos_x'];
          var s_y = stickers_session_data[i]['pos_y'];
          var s_animation = stickers_session_data[i]['animation'];
          var s_width = stickers_session_data[i]['width'];
          var s_height = stickers_session_data[i]['height'];
          var s_delay = stickers_session_data[i]['delay'];
          var s_url = stickers_session_data[i]['url'];
          var s_id = i + "sticker";

          var s_angle = stickers_session_data[i]['angle'];
          var s_opacity = stickers_session_data[i]['opacity'];
          //css크기와 video크기 비교
          var scaleX = video.videoWidth / $("#media2").outerWidth();
          var scaleY = video.videoHeight / $("#media2").outerHeight();

          //전체화면시 effect 크기 조정
          scale = Math.sqrt($("#media2").outerWidth() * $("#media2").outerHeight()/138528);

          //x, y 변환
          sticker_x = (s_x - 0.5)/scaleX;
          sticker_y = (s_y - 0.5)/scaleY;

          //효과적용외의 시간 Sticker 숨기기
          if(video.currentTime < s_start_t || video.currentTime > s_end_t){
                     stickerEffect.myfunction_s_id(s_id);
                     stickerEffect.sticker_hide();
             }
         //효과적용시간에 Sticker 만들기
         else if(video.currentTime >= s_start_t && video.currentTime <= s_end_t){
                     stickerEffect.myfunction_s_basic(s_start_t, s_end_t, sticker_x, sticker_y , s_animation);
                     stickerEffect.myfunction_s_width(s_width);
                     stickerEffect.myfunction_s_height(s_height);
                     stickerEffect.myfunction_s_delay(s_delay);
                     stickerEffect.myfunction_s_url(s_url);
                     stickerEffect.myfunction_s_id(s_id);
                     stickerEffect.myfunction_s_angle(s_angle);
                     stickerEffect.myfunction_s_opacity(s_opacity);

                     stickerEffect.sticker_id_check();
                     stickerEffect.sticker_show();

                 //비디오 상태 확인후, 정지상태면 효과 None, 플레이 상태면 효과 Block
                 if(!video.paused){
                       stickerEffect.sticker_reveal();
                 }else{
                       stickerEffect.sticker_borrow();
                       }
                  }
                }
            }

    //StickerEffect 미리보기를 위한 clickEvent
    $("#sticker_make_effects").click(function(){
           var sticker_img = $("#option_stickers").val();
           var sticker_animation = $("#animation_stickers").val();
           var sticker_width = $("#width_stickers").val();
           var sticker_height = $("#height_stickers").val();
           var sticker_delay = $("#delay_stickers").val();
           var sticker_angle = $("#Angle_stickers").val();
           var sticker_opacity = $("#opacity_stickers").val();

           $("#sticker_example_id").attr('src',sticker_img);
           $("#sticker_example_id").attr('class',sticker_animation);
           $("#sticker_example_id").css('width',sticker_width +'px');
           $("#sticker_example_id").css('height',sticker_height + 'px');
           $("#sticker_example_id").css('animationDuration',sticker_delay+'s');
           $("#sticker_example_id").css({'transform' : 'rotate('+ sticker_angle +'deg)'});
           $("#sticker_example_id").fadeTo(1000, sticker_opacity);
     });

     //sticker_opacity tab에서 opacity가 적용되지 않는 특정 효과를 선택했을때 입력값을 제한
    $("#animation_stickers").change(function (){
    var select = this.value;
    if(select=="animated infinite bounceOut" || select== "animated infinite fadeIn" || select== "animated infinite bounceIn"
      || select== "animated infinite rotateIn" || select== "animated infinite rotateInDownLeft" || select== "animated infinite rotateInDownRight"
      || select== "animated infinite rotateInUpLeft" || select== "animated infinite rotateInUpRight" || select== "animated infinite rotateOut"
      || select== "animated infinite flash" || select== "animated infinite hinge" || select== "animated infinite zoomOutUp"
      || select== "animated infinite zoomOutRight" || select== "animated infinite zoomOutLeft" || select== "animated infinite zoomOutDown"
      || select== "animated infinite zoomOut" || select== "animated infinite flipInX" || select== "animated infinite flipInY"
      || select== "animated infinite flipOutX" || select== "animated infinite flipOutY")
    {
      $("#opacity_stickers").removeAttr('disabled');
      $("#opacity_stickers").attr('disabled','disabled');
    }else if(select=="animated infinite shake" || select== "animated infinite swing" || select== "animated infinite rubberBand"
            || select== "animated infinite bounce" || select== "animated infinite jello" || select== "animated infinite wobble"
            || select== "animated infinite tada" || select== "animated infinite pulse" || select== "animated infinite flip")
    {
      $("#opacity_stickers").removeAttr('disabled');
      $("#opacity_stickers").prop('disabled', false);
    }
  }).change(function(){ //sticker_angle tab에서 angle이 적용되지 않는 특정 효과를 선택했을때 입력값을 제한
    var select = this.value;
    if(select=="animated infinite bounceIn" || select== "animated infinite rotateIn" || select== "animated infinite rotateInDownLeft" || select== "animated infinite rotateInDownRight"
      || select== "animated infinite rotateInUpLeft" || select== "animated infinite rotateInUpRight" || select== "animated infinite shake" || select== "animated infinite rubberBand"
      || select== "animated infinite bounce" || select== "animated infinite hinge" || select== "animated infinite jello" || select== "animated infinite wobble"
      || select== "animated infinite tada" || select== "animated infinite pulse" || select== "animated infinite flip" || select== "animated infinite flipInX"
      || select== "animated infinite flipInY" || select== "animated infinite flipOutX" || select== "animated infinite flipOutY" )
    {
      $("#Angle_stickers").removeAttr('disabled');
      $("#Angle_stickers").attr('disabled','disabled');
    }else{
      $("#Angle_stickers").removeAttr('disabled');
      $("#Angle_stickers").attr('disabled', false);
    }
  });
