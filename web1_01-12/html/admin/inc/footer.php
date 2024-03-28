</section>    
        </main>
		<script>
			
			// js cua phan aside menu
			function w3_open() {
  				document.getElementById("main").style.marginLeft = "15%";
  				document.getElementById("mySidebar").style.width = "15%";
  				document.getElementById("mySidebar").style.display = "block";
  				document.getElementById("openNav").style.display = 'none';
				}
			function w3_close() {
  				document.getElementById("main").style.marginLeft = "0%";
  				document.getElementById("mySidebar").style.display = "none";
  				document.getElementById("openNav").style.display = "inline-block";
			}

			let productPic = document.getElementById("product_pic");
			let inputFile = document.getElementById("input_file");


			inputFile.onchange = function(){
				productPic.src = URL.createObjectURL(inputFile.files[0]);
			}

			function warning() {
  				// Lấy tất cả các phần tử <input> trừ phần tử đầu tiên
				var inputs = document.querySelectorAll("input:not(:first-child)");

				// Kiểm tra từng phần tử <input>
				for (var i = 0; i < inputs.length; i++) {
					var inputValue = inputs[i].value;
					
					if (inputValue == 0) {
						alert("Bạn chưa điền đủ thông tin !!!");
						return;
					}
				}
				alert("Bạn đã thêm thành công !");
				window.location.href = "productAdmin.php";
			}

			//prevent refresh page
			var form = document.getElementById("formId");
			function submitForm(event){
				event.preventDefault();
			}

			//calling a function during form submission
			form.addEventListener('submit', submitForm);
			</script>
    </body>
</html>