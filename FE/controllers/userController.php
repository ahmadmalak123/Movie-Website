<script>
        function LoginFrm(){
            let un=document.getElementById("tfun").value;
            console.log(un);
            let pass=document.getElementById("tfpass").value;
            console.log(pass);
            if ((un=="")||(pass=="")){
                alert("Please fill in the username and password");
            } else {
                document.getElementById("login-frm").submit();
            }
        }
        function ResetFrm(){
            document.getElementById("tfun").value="";
            document.getElementById("tfpass").value="";
        }
    </script>