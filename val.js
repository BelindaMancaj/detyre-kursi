    
    function ValidateEmail(inputText)
    {
    var mailformat = /^([A-Za-z0-9_\-\.])+\@([fti.edu])+\.(al)$/;
    if(inputText.value.match(mailformat))
    {
    
    document.form1.email.focus();
    return true;
    }
    else
    {
    alert("Ju mund te regjistroheni vetem me email e FTI!");
    document.form1.email.focus();
    return false;
    }
    }

            function CheckPassword(inputtxt) 
        { 
        var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,20}$/;
        if(inputtxt.value.match(passw)) 
        { 
        return true;
        }
        else
        { 
            alert('Fjalekalimi juaj duhet te jete mbi 5 karaktere i gjate');
        return false;
        }
        }

        function openForm() {
            document.getElementById("f").style.display = "block";
          }