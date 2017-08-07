var video = document.getElementById('media2');

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

    caption_hide: function(){
          var check = document.getElementById(this.id);
              if (check=== null){
                return;
              }else{
                document.getElementById(this.id).style.display="none";
                   }
    },

    caption_id_check: function(){
        var check = document.getElementById(this.id);
      if(check=== null){
          this.caption_make();
      }else{
        return;
      }
    },

    caption_make: function(){
      var make_p = document.createElement('div');
      $("#captions_p").append(make_p);
      make_p.setAttribute('id',this.id);

    },

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

    caption_reveal: function(){
            var check = document.getElementById(this.id);
                   if (check=== null){
                           return;
                     }else{
                      document.getElementById(this.id).style.display="block";
                              }
                           },

     caption_borrow: function(){
           var check = document.getElementById(this.id);
                 if (check=== null){
                        return;
                   }else{
                       document.getElementById(this.id).style.display="none";
                       }
     }
     };

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

  sticker_hide: function(){
        var check = document.getElementById(this.id);
            if (check=== null){
              return;
            }else{
              document.getElementById(this.id).style.display="none";
                 }
  },

  sticker_id_check: function(){
      var check = document.getElementById(this.id);
    if(check=== null){
        this.sticker_make();
    }else{
      return;
    }
  },

  sticker_make: function(){
    var make_p = document.createElement('img');
    $("#sticker_d").append(make_p);
    make_p.setAttribute('id',this.id);
  },

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

  sticker_reveal: function(){
          var check = document.getElementById(this.id);
                 if (check=== null){
                         return;
                   }else{
                    document.getElementById(this.id).style.display="block";
                            }
                         },

  sticker_borrow: function(){
         var check = document.getElementById(this.id);
               if (check=== null){
                      return;
                 }else{
                     document.getElementById(this.id).style.display="none";
                     }
   }
      };
