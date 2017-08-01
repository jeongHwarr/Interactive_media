var video = document.getElementById('media2');
var new_id_c;
var new_id_s;
var c;
var new_id_image;

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
      rand_a = Math.random();
      var make_p = document.createElement('p');
      $("#captions_p").append(make_p);
      new_id_c = rand_a + "make_p";
      make_p.setAttribute('id',new_id_c);
    },

    caption_show: function(){
          document.getElementById(new_id_c).style.display="block";
          document.getElementById(new_id_c).style.position="relative";
          document.getElementById(new_id_c).setAttribute('class',this.animation);
          document.getElementById(new_id_c).style.top= this.x + 'px';
          document.getElementById(new_id_c).style.left=this.y + 'px';
          document.getElementById(new_id_c).style.fontSize=this.size + 'px';
          document.getElementById(new_id_c).style.color=this.color;
          document.getElementById(new_id_c).style.animationDelay=this.delay;
          document.getElementById(new_id_c).innerHTML = this.contents;
          document.getElementById(new_id_c).style.fontStyle=this.font;
    },

    caption_hide: function(){
          var check = document.getElementById(new_id_c);
              if (check=== null){
                      return;
              }else if(video.currentTime < this.endTime){ //비디오 현재시간이랑 DB엔드타임이랑 비교했을때 endTime이 크면 hide하면 안됨!
                      return;
              }else{
                    $("#captions_p").empty();
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
    rand_a = Math.random();
    var make_d = document.createElement('div');
    $("#sticker_d").append(make_d);
    new_id_s = rand_a + "make_d";
    make_d.setAttribute('id',new_id_s);

    var make_i = document.createElement("img");
    document.getElementById(new_id_s).appendChild(make_i);
    new_id_image = rand_a + "make_i";
    make_i.setAttribute('id',new_id_image);
  },


  sticker_show: function(){
        document.getElementById(new_id_s).style.display="block";
        document.getElementById(new_id_s).style.position="relative";
        document.getElementById(new_id_s).setAttribute('class',this.animation);
        document.getElementById(new_id_s).style.top= this.x + 'px';
        document.getElementById(new_id_s).style.left=this.y + 'px';
        document.getElementById(new_id_s).style.width = this.width + 'px';
        document.getElementById(new_id_s).style.height = this.height + 'px';
        document.getElementById(new_id_s).style.animationDelay=this.delay;
        document.getElementById(new_id_image).src = this.url;
      },
      sticker_hide: function(){
        var check = document.getElementById(new_id_s);
        if (check=== null){
          return;
        }else if(video.currentTime < this.endTime){ //비디오 현재시간이랑 DB엔드타임이랑 비교했을때 endTime이 크면 hide하면 안됨!
          return;
        }
        else{
          $("#sticker_d").empty();
            }
        }
      };
