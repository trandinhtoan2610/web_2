
        const wrapper=document.querySelector('.wrapper');
        const loginLink=document.querySelector('.login-link');
        const registerLink=document.querySelector('.register-link');
        const title=document.querySelector('.title');
        const btn_register = document.getElementById("btn-register");
        const txtHint = document.getElementById("txtHint");                          
        registerLink.addEventListener('click',()=>{
            wrapper.classList.add('active');
        });
        loginLink.addEventListener('click',()=>{
            wrapper.classList.remove('active');
        });

        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            var message = document.getElementById("confirmMessage");
            if(password == '' || confirmPassword==''){
                message.innerHTML = "";
            } else if (password == confirmPassword) {
                message.innerHTML = "Mật khẩu trùng khớp";
                message.style.color = "green";
                btn_register.disabled = false;
            } else {
                message.innerHTML = "Mật khẩu không trùng khớp";
                message.style.color = "red";
                btn_register.disabled = true;
            }
            if(document.getElementById("txtUser").value == "" || txtHint.innerHTML.trim() !== ""){
                btn_register.disabled = true;
            }  
        }

        function showHint(str) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                txtHint.innerHTML = this.responseText;
                if(document.getElementById("txtUser").value !== "" && document.getElementById("password").value !== "" && document.getElementById("confirm_password").value !== "" ){
                if( txtHint.innerHTML.trim() === "" && document.getElementById("password").value === document.getElementById("confirm_password").value){
                    btn_register.disabled = false;
                }else btn_register.disabled = true;
            } else btn_register.disabled = true;
                }
            };
            xmlhttp.open("GET", "./controller/register.php?q=" + str, true);
            xmlhttp.send();
        }
       
            
       
      $(document).ready(function () {
        // Function to get id based on name
        function getIdByName(arr, name) {
          for (var i = 0; i < arr.length; i++) {
            if (arr[i].full_name === name) {
              return arr[i].id;
            }
          }
          return null;
        }

        //Lấy tỉnh thành
        $.getJSON(
          "https://esgoo.net/api-tinhthanh/1/0.htm",
          function (data_tinh) {
            if (data_tinh.error == 0) {
              $.each(data_tinh.data, function (key_tinh, val_tinh) {
                $("#tinh").append(
                  '<option value="' +
                    val_tinh.full_name +
                    '">' +
                    val_tinh.full_name +
                    "</option>"
                );
              });
              $("#tinh").change(function (e) {
                var tentinh = $(this).val();
                var idtinh = getIdByName(data_tinh.data, tentinh);
                //Lấy quận huyện
                $.getJSON(
                  "https://esgoo.net/api-tinhthanh/2/" + idtinh + ".htm",
                  function (data_quan) {
                    if (data_quan.error == 0) {
                      $("#quan").html('<option value="0">Quận Huyện</option>');
                      $("#phuong").html('<option value="0">Phường Xã</option>');
                      $.each(data_quan.data, function (key_quan, val_quan) {
                        $("#quan").append(
                          '<option value="' +
                            val_quan.full_name +
                            '">' +
                            val_quan.full_name +
                            "</option>"
                        );
                      });
                      //Lấy phường xã
                      $("#quan").change(function (e) {
                        var tenquan = $(this).val();
                        var idquan = getIdByName(data_quan.data, tenquan);
                        $.getJSON(
                          "https://esgoo.net/api-tinhthanh/3/" +
                            idquan +
                            ".htm",
                          function (data_phuong) {
                            if (data_phuong.error == 0) {
                              $("#phuong").html(
                                '<option value="0">Phường Xã</option>'
                              );
                              $.each(
                                data_phuong.data,
                                function (key_phuong, val_phuong) {
                                  $("#phuong").append(
                                    '<option value="' +
                                      val_phuong.full_name +
                                      '">' +
                                      val_phuong.full_name +
                                      "</option>"
                                  );
                                }
                                );
                            }
                          }
                        );
                      });
                    }
                  }
                );
              });
            }
          }
        );
      });
