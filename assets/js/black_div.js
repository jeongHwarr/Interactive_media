function setBlackBox(){
  $("#media2").bind("timeupdate", function(){

    //마진을 포함한 높이와 넓이 구하기(css 영역)
    var css_height = $("#media2").outerHeight();
    var css_width = $("#media2").outerWidth();

    //비디오 넓이와 높이 구하기(video js 영상)
    var v_height = this.videoHeight;
    var v_width = this.videoWidth;

    //검은 영역의 가로 세로 높이 지정
    //30을 더하는 이유는 정확하게는 모르겠지만, 플레이하는 버튼으로 인해 변동이 생기는 것으로 추정 -> 수정필요
    black_top.style.width = css_width+"px";
    black_top.style.height = (30+(css_height-(v_height/v_width*css_width))/2)+"px";
    black_bottom.style.width = css_width+"px";
    black_bottom.style.height = (30+(css_height-(v_height/v_width*css_width))/2)+"px";
  })
}
