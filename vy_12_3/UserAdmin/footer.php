<script>
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

    let productPic = document.getElementById("user_pic");
	let inputFile = document.getElementById("input_file");


	inputFile.onchange = function(){
		productPic.src = URL.createObjectURL(inputFile.files[0]);
	}

    </script>
</main>
</body>