var video = document.getElementById('media2');
var b;
var c;
var h;

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

  sticker_make: function(){
    a = Math.random();
    var make_d = document.createElement('div');
    document.getElementById("sticker_d").appendChild(make_d);
    c = a + "make_d";
    make_d.setAttribute('id',c);

    var make_i = document.createElement("img");
    document.getElementById(c).appendChild(make_i);
    h = a + "make_i";
    make_i.setAttribute('id',h);

  },


  sticker_show: function(){

      console.log(this.x);
      console.log(this.y);
      console.log(this.width);
      console.log(this.url);
        document.getElementById(c).style.display="block";
        document.getElementById(c).style.position="relative";
        document.getElementById(c).setAttribute('class',this.animation);
        document.getElementById(c).style.top= this.x + 'px';
        document.getElementById(c).style.left=this.y + 'px';
        document.getElementById(c).style.width = this.width + 'px';
        document.getElementById(c).style.height = this.height + 'px';
        document.getElementById(c).style.animationDelay=this.delay;
        document.getElementById(h).src = this.url;
  
      },

      sticker_hide: function(){
            if(c){
                document.getElementById(c).style.display="none";
            }else{
              return;
            }
          }
      };
