/*!
* Animate.css
* https://daneden.github.io/animate.css/
* Copyright (c) 2016 Daniel Eden
* Released under The MIT License (MIT)
* https://github.com/daneden/animate.css
*/

//startTime,endTime : Caption 효과 시작시간과 끝시간 지정
//x,y : Caption 효과 영상속 좌표지정
//animation : 애니메이션 효과이름
//size : Caption fontSize, 단위 :px
//delay : 애니메이션 한번의 지속 시간, 단위 :s
//color : Caption color
//font : Caption fontfamily
//contents : Caption내용
//id : Caption 하나당 고유 ID

var captionEffect = {

    startTime:0, //s
    endTime:0,   //e
    x:0, //x
    y:0, //y
    animation:"", //a
    size:0,
    delay:0,
    color:"",
    font:"",
    contents:"",
    id:0,
    angle:0,
    opacity:0,

    myfunction_c_basic: function(s,e,x,y,a){
      this.startTime = s;
      this.endTime = e;
      this.x = x;
      this.y = y;
      this.animation = a;
    },

    myfunction_c_size: function(x){
      this.size = x;
    },
    myfunction_c_delay: function(x){
      this.delay = x;
    },
    myfunction_c_color: function(x){
      this.color = x;
    },
    myfunction_c_font: function(x){
      this.font = x;
    },
    myfunction_c_contents: function(x){
      this.contents = x;
    },
    myfunction_c_id: function(x){
      this.id = x;
    },
    myfunction_c_angle: function(x){
      this.angle = x;
    },
    myfunction_c_opacity: function(x){
      this.opacity = x;
    },

//효과적용 시간외의 범위에서 Caption효과 숨기는 함수
    caption_hide: function(){
          var check = document.getElementById(this.id);
              if (check=== null){
                return;
              }else{
                document.getElementById(this.id).style.display="none";
                   }
    },

//Caption을 만들기 위해  ID존재 유무를 확인하는 함수(Caption_make 전단계)
    caption_id_check: function(){
        var check = document.getElementById(this.id);
      if(check=== null){
          this.caption_make();
      }else{
        return;
      }
    },

//Caption효과 만드는 함수
    caption_make: function(){
      var make_p = document.createElement('div');
      $(".captions_p").append(make_p);
      make_p.setAttribute('id',this.id);
    },

//Caption효과 보여주는 함수
    caption_show: function(){
          document.getElementById(this.id).style.display= "block";
          document.getElementById(this.id).style.position="absolute";
          document.getElementById(this.id).setAttribute('class',this.animation);
          document.getElementById(this.id).style.top= this.y + 'px';
          document.getElementById(this.id).style.left=this.x + 'px';
          document.getElementById(this.id).style.fontSize=this.size * scale + 'px';
          document.getElementById(this.id).style.color=this.color;
          document.getElementById(this.id).style.animationDuration=this.delay+'s';
          document.getElementById(this.id).innerHTML = this.contents;
          document.getElementById(this.id).style.fontFamily=this.font;
          document.getElementById(this.id).style.width=100 + 'px';
          document.getElementById(this.id).style.opacity = this.opacity;
          document.getElementById(this.id).style.transform = "rotate("+this.angle+"deg)";
    },

//비디오 플레이 상태에서 caption 효과 보여주는 함수
    caption_reveal: function(){
            var check = document.getElementById(this.id);
                   if (check=== null){
                           return;
                     }else{
                      document.getElementById(this.id).style.display="block";
                              }
                           },

//비디오 정지상태에서 caption 효과 감추는 함수
     caption_borrow: function(){
           var check = document.getElementById(this.id);
                 if (check=== null){
                        return;
                   }else{
                       document.getElementById(this.id).style.display="none";
                       }
                     }
     };

     //caption 만드는 메인 함수
     function Make_caption_effect(){
          for (var i = 0; i<captions_session_data.length; i++){
              //session 데이터 변환
              var c_start_t = captions_session_data[i]['startTime']/1000;
              var c_end_t = captions_session_data[i]['endTime']/1000;
              var c_x = captions_session_data[i]['pos_x'];
              var c_y = captions_session_data[i]['pos_y'];
              var c_animation = captions_session_data[i]['animation'];
              var c_size = captions_session_data[i]['size'];
              var c_delay = captions_session_data[i]['delay'];
              var c_color = captions_session_data[i]['color'];
              var c_font = captions_session_data[i]['font'];
              var c_contents = captions_session_data[i]['contents'];
              var c_id = i + "caption";
              var c_angle = captions_session_data[i]['angle'];
              var c_opacity = captions_session_data[i]['opacity'];

               //css크기와 video크기 비교
              var scaleX = video.videoWidth / $("#media2").outerWidth();
              var scaleY = video.videoHeight / $("#media2").outerHeight();

              //전체화면시 effect 크기 조정
              scale = Math.sqrt($("#media2").outerWidth() * $("#media2").outerHeight()/138528);

              //x, y 변환
              caption_x = (c_x - 0.5)/scaleX;
              caption_y = (c_y - 0.5)/scaleY;

              //효과적용외의 시간 Caption 숨기기
              if(video.currentTime < c_start_t || video.currentTime > c_end_t){
                  captionEffect.myfunction_c_id(c_id);
                  captionEffect.caption_hide();
              }

              //효과적용시간에 Caption 만들기
              else if(video.currentTime >= c_start_t && video.currentTime <= c_end_t){
                     captionEffect.myfunction_c_basic(c_start_t, c_end_t, caption_x, caption_y, c_animation);
                     captionEffect.myfunction_c_size(c_size);
                     captionEffect.myfunction_c_delay(c_delay);
                     captionEffect.myfunction_c_color(c_color);
                     captionEffect.myfunction_c_font(c_font);
                     captionEffect.myfunction_c_contents(c_contents);
                     captionEffect.myfunction_c_id(c_id);
                     captionEffect.myfunction_c_angle(c_angle);
                     captionEffect.myfunction_c_opacity(c_opacity);

                     captionEffect.caption_id_check();
                     captionEffect.caption_show();

               //비디오 상태 확인후, 정지상태면 효과 None, 플레이 상태면 효과 Block
               if(!video.paused){
                 captionEffect.caption_reveal();
               }else{
                 captionEffect.caption_borrow();
                     }
               }
             }
           }

         //CaptionEffect 미리보기를 위한 clickEvent
         $("#caption_make_effects").click(function(){
           var caption_context = $("#context_captions").val();
           var caption_animation = $("#animation_captions").val();
           var caption_font_size = $("#font_size_captions").val();
           var caption_delay = $("#delay_captions").val();
           var caption_color = $("#color_captions").val();
           var caption_font_family = $("#font_name_captions").val();
           var caption_angle = $("#Angle_captions").val();
           var caption_opacity = $("#opacity_captions").val();

           $("#caption_example_id").html(caption_context);
           $("#caption_example_id").attr('class',caption_animation);
           $("#caption_example_id").css('fontSize',caption_font_size);
           $("#caption_example_id").css('animationDuration',caption_delay+'s');
           $("#caption_example_id").css('color',caption_color);
           $("#caption_example_id").css('font-family',caption_font_family);
           $("#caption_example_id").css({'transform' : 'rotate('+ caption_angle +'deg)'});
           $("#caption_example_id").fadeTo(1000, caption_opacity);
         });

         //caption_opacity tab에서 opacity가 적용되지 않는 특정 효과를 선택했을때 입력값을 제한
        $("#animation_captions").change(function (){
        var select = this.value;
        if(select=="animated infinite bounceOut" || select== "animated infinite fadeIn" || select== "animated infinite bounceIn"
          || select== "animated infinite rotateIn" || select== "animated infinite rotateInDownLeft" || select== "animated infinite rotateInDownRight"
          || select== "animated infinite rotateInUpLeft" || select== "animated infinite rotateInUpRight" || select== "animated infinite rotateOut"
          || select== "animated infinite flash" || select== "animated infinite hinge" || select== "animated infinite zoomOutUp"
          || select== "animated infinite zoomOutRight" || select== "animated infinite zoomOutLeft" || select== "animated infinite zoomOutDown"
          || select== "animated infinite zoomOut" || select== "animated infinite flipInX" || select== "animated infinite flipInY"
          || select== "animated infinite flipOutX" || select== "animated infinite flipOutY")
        {
          $("#opacity_captions").removeAttr('disabled');
          $("#opacity_captions").attr('disabled','disabled');
        }else if(select=="animated infinite shake" || select== "animated infinite swing" || select== "animated infinite rubberBand"
                || select== "animated infinite bounce" || select== "animated infinite jello" || select== "animated infinite wobble"
                || select== "animated infinite tada" || select== "animated infinite pulse" || select== "animated infinite flip")
        {
          $("#opacity_captions").removeAttr('disabled');
          $("#opacity_captions").prop('disabled', false);
        }
      });
