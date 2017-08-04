//waves 효과 세선에서 삭제하는 함수
function waves_delete(index){
  session.remove('waves_session',index);
  return waves_session_data = session.get('waves_session')['waves_session'];
}

//captions 효과 세선에서 삭제하는 함수
function captions_delete(index){
  session.remove('captions_session',index);
  return captions_session_data = session.get('captions_session')['captions_session'];
}

//stickers 효과 세선에서 삭제하는 함수
function stickers_delete(index){
  session.remove('stickers_session',index);
  return stickers_session_data = session.get('stickers_session')['stickers_session'];
}
