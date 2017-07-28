var video = document.getElementById('media2');
var b;
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

    caption_make: function(){
      a = Math.random();
      var make_p = document.createElement('p');
      document.getElementById("captions_p").appendChild(make_p);
      b = a + "make_p";
      make_p.setAttribute('id',b);
      console.log(b);
    },

    caption_show: function(){
            console.log(this.color);
            document.getElementById(b).style.display="block";
            document.getElementById(b).style.position="relative";
            document.getElementById(b).setAttribute('class',this.animation);
            document.getElementById(b).style.top= this.x + 'px';
            document.getElementById(b).style.left=this.y + 'px';
            document.getElementById(b).style.fontSize=this.size + 'px';
            document.getElementById(b).style.color=this.color;
            document.getElementById(b).style.animationDelay=this.delay;
            document.getElementById(b).innerHTML = this.contents;
            document.getElementById(b).style.fontStyle=this.font;
          },
        caption_hide: function(){
            if(b){
                document.getElementById(b).style.display="none";
            }else{
              return;
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
    // console.log(this.url);
  },
  sticker_show: function(){
      if (video.currentTime >= this.startTime && video.currentTime < this.endTime)
        $('#effect_3').css('display','block');
        $('#effect_3').attr('class', this.animation);
        $('#effect_3').css('top', this.x + 'px').css('left', this.y + 'px');
        $('#effect_3').css('width',this.width).css('height',this.height);
        $('#effect_3').css('webkit-animation-delay', this.delay + 's');
        document.getElementById("effect_3").src = this.url;
    },
    sticker_hide: function(){
      $('#effect_3').css('display', 'none');
    }

};
