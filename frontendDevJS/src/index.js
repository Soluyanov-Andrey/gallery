import "./index.scss"

class User {

    constructor(name) {
      this.name = name;
    }
  
    sayHi() {
      alert(this.name);
    }
  
  }
  
  // Использование:
  let user = new User("Иван");
  user.sayHi();
