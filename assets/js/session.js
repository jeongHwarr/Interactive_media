
//Session 클래스
class Session extends Map {

   set(id, value) {
     if ( typeof value === 'object' ) {
       value= JSON.stringify(value);
     }
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

   add(id, value){
     const object = session.get(id);
     const key = Object.keys(object);// find key value;
     var object_value = object[key]; //get object_value (array)
     object_value.push(value); //array push
     session.set(id, {[key] : object_value});
   }

   modify(id, index, value){
     const object = session.get(id);
     const key = Object.keys(object);// find key value;
     var object_value = object[key]; //get object_value (array)
     if(index in object_value){ //checking index exisist in array
       object_value[index]=value; //change array value using index
       session.set(id, {[key] : object_value});
     }
     else{console.log("session.modify Error! : Invalid index");}
   }

   remove(id, index){
     const object = session.get(id);
     const key = Object.keys(object);// find key value;
     var object_value = object[key];//get object_value (array)
     object_value.splice(index,1);//array remove using index
     session.set(id, {[key] : object_value});
   }
 }

//Session 클래스를 이용하기 위한 변수 session
 const session = new Session();
