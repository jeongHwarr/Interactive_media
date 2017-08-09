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
//delay : 애니메이션 지연 시간, 단위: ms
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
      $("#captions_p").append(make_p);
      make_p.setAttribute('id',this.id);

    },

//Caption효과 보여주는 함수
    caption_show: function(){
          document.getElementById(this.id).style.display= "block";
          document.getElementById(this.id).style.position="absolute";
          document.getElementById(this.id).setAttribute('class',this.animation);
          document.getElementById(this.id).style.top= this.y + 'px';
          document.getElementById(this.id).style.left=this.x + 'px';
          document.getElementById(this.id).style.fontSize=this.size + 'px';
          document.getElementById(this.id).style.color=this.color;
          document.getElementById(this.id).style.animationDuration=this.delay+'s';
          document.getElementById(this.id).innerHTML = this.contents;
          document.getElementById(this.id).style.fontStyle=this.font;
          document.getElementById(this.id).style.width=100 + 'px';

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

  //startTime,endTime : Sticker 효과 시작시간과 끝시간 지정
  //x,y : Sticker 효과 영상속 좌표지정
  //animation : 애니메이션 효과이름
  //width : Sticker 가로길이. 단위 :px
  //height : Sticker 세로길이. 단위 :px
  //delay : 애니메이션 지연 시간, 단위: ms
  //url : 삽입이미지에 대한 URL주소
  //id : Caption 하나당 고유 ID

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
    $("#sticker_d").append(make_p);
    make_p.setAttribute('id',this.id);
  },

//sticker 효과 보여주는 함수
  sticker_show: function(){
        document.getElementById(this.id).style.display="block";
        document.getElementById(this.id).style.position="absolute";
        document.getElementById(this.id).setAttribute('class',this.animation);
        document.getElementById(this.id).style.top= this.y + 'px';
        document.getElementById(this.id).style.left=this.x + 'px';
        document.getElementById(this.id).style.width = this.width + 'px';
        document.getElementById(this.id).style.height = this.height + 'px';
        document.getElementById(this.id).style.animationDuration=this.delay +'s';
        document.getElementById(this.id).src = this.url;
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

              //css크기와 video크기 비교
               var scaleX = video.videoWidth / $("#media2").outerWidth();
               var scaleY = video.videoHeight / $("#media2").outerHeight();

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

        function Make_sticker_effect(){
          console.log("Make_sticker_effect");
            for (var i = 0; i < stickers_session_data.length; i++){
              console.log(s_id);
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

              //css크기와 video크기 비교
              var scaleX = video.videoWidth / $("#media2").outerWidth();
              var scaleY = video.videoHeight / $("#media2").outerHeight();

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

      //CaptionEffect 미리보기를 위한 clickEvent
      $("#caption_make_effects").click(function(){

       var caption_context = $("#context_captions").val();
       var caption_animation = $("#animation_captions").val();
       var caption_font_size = $("#font_size_captions").val();
       var caption_delay = $("#delay_captions").val();
       var caption_color = $("#color_captions").val();
       var caption_font_family = $("#font_name_captions").val();

       $("#caption_example_id").html(caption_context);
       $("#caption_example_id").attr('class',caption_animation);
       $("#caption_example_id").css('fontSize',caption_font_size);
       $("#caption_example_id").css('animationDuration',caption_delay+'s');
       $("#caption_example_id").css('color',caption_color);
       $("#caption_example_id").css('font-family',caption_font_family);
      });

      //StickerEffect 미리보기를 위한 clickEvent
      $("#sticker_make_effects").click(function(){

       var sticker_img = $("#option_stickers").val();
       var sticker_animation = $("#animation_stickers").val();
       var sticker_width = $("#width_stickers").val();
       var sticker_height = $("#height_stickers").val();
       var sticker_delay = $("#delay_stickers").val();

         $("#sticker_example_id").attr('src',sticker_img);
         $("#sticker_example_id").attr('class',sticker_animation);
         $("#sticker_example_id").css('width',sticker_width +'px');
         $("#sticker_example_id").css('height',sticker_height + 'px');
         $("#sticker_example_id").css('animationDuration',sticker_delay+'s');

      });
