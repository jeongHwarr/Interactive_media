
//Session 클래스
class Session extends Map {
   set(id, value) {
     if ( typeof value === 'object' ) value= JSON.stringify(value);
     sessionStorage.setItem(id, value);
   }
   get(id) {
     const value = sessionStorage.getItem(id);
     try {
       return JSON.parse(value);
     } catch(e) {
       return value;
     }
   }
 }

//Session 클래스를 이용하기 위한 변수 session
 const session = new Session();
