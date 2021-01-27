document.getElementById("defaultOpen").click();

function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

//Login
// function validation()
//            {
//                var id=document.f1.user.value;
//                var ps=document.f1.pass.value;
//                if(id.length=="" && ps.length=="") {
//                    alert("User Name and Password fields are empty");
//                    return false;
//                }
//                else
//                {
//                    if(id.length=="") {
//                        alert("User Name is empty");
//                        return false;
//                    }
//                    if (ps.length=="") {
//                    alert("Password field is empty");
//                    return false;
//                    }
//                }
//            }
