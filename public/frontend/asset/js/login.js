const registerButton = document.getElementById("register");
const loginButton = document.getElementById("login");
const container = document.getElementById("container");

registerButton.addEventListener('click', () => {
    container.classList.add('right-panel-active');
});

loginButton.addEventListener('click', () => {
    container.classList.remove('right-panel-active');
});   






    function AddRow(){
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var email = document.getElementById("email").value;
    
        if (username==""|| password==""|| email=="") {
          return false;
          }else{
          google.script.run.AddRecord(username,password,email);
          document.getElementById("page2_id1").className = "page2_id1-off";
          document.getElementById("page3_id1").className = "page3_id1";
          }
     }

    function function1(){
        document.getElementById("container").className = "container-off";
        document.getElementById("page2_id1").className = "page2_id1";
    }
    
    function function3(){ 
      document.getElementById("page3_id1").className = "page3_id1-off";
      document.getElementById("page1_id1").className = "page1_id1"; 
    }

    function hienthipasslogin() {
      const passwordInput = document.getElementById("password");
      const checkbox = document.getElementById("checkbox");
    
      if (checkbox.checked) {
        passwordInput.type = "text"; // Hiển thị mật khẩu
      } else {
        passwordInput.type = "password"; // Ẩn mật khẩu
      }
    }
    function hienthipassdk() {
      const passwordInputt = document.getElementById("passwordd");
      const checkboxx = document.getElementById("checkboxx");
    
      if (checkboxx.checked) {
        passwordInputt.type = "text"; // Hiển thị mật khẩu
      } else {
        passwordInputt.type = "password"; // Ẩn mật khẩu
      }
    }