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
                console.log("null");
                return;
              }else{
                console.log("hide"+this.id);
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
          document.getElementById(this.id).style.top= this.x + 'px';
          document.getElementById(this.id).style.left=this.y + 'px';
          document.getElementById(this.id).style.fontSize=this.size + 'px';
          document.getElementById(this.id).style.color=this.color;
          document.getElementById(this.id).style.animationDelay=this.delay;
          document.getElementById(this.id).innerHTML = this.contents;
          document.getElementById(this.id).style.fontStyle=this.font;

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
        document.getElementById(this.id).style.top= this.x + 'px';
        document.getElementById(this.id).style.left=this.y + 'px';
        document.getElementById(this.id).style.width = this.width + 'px';
        document.getElementById(this.id).style.height = this.height + 'px';
        document.getElementById(this.id).style.animationDelay=this.delay;
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
