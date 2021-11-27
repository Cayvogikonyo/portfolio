// Contact Form
function validateForm(event) {
    event.preventDefault();
    var name = document.forms["myForm"]["name"].value;
    var email = document.forms["myForm"]["email"].value;
    var subject = document.forms["myForm"]["subject"].value;
    var comments = document.forms["myForm"]["comments"].value;
    var token = document.forms["myForm"]["_token"].value;
    document.getElementById("error-msg").style.opacity = 0;
    document.getElementById('error-msg').innerHTML = "";
    if (name == "" || name == null) {
        document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Name*</div>";
        fadeIn();

        return false;
    }
    if (email == "" || email == null) {
        document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Email*</div>";
        fadeIn();
        return false;
    }
    if (subject == "" || subject == null) {
        document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Subject*</div>";
        fadeIn();
        return false;
    }
    if (comments == "" || comments == null) {
        document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Comments*</div>";
        fadeIn();
        return false;
    }

    let data = {
        _token: token,
        name: name,
        email: email,
        subject: subject,
        message: comments,
    }

    // axios.post(route('contactus'), data)
    // .then((response) => {
    //     alert();
    //     if (response.status == 200) {

    //         document.getElementById("simple-msg").innerHTML = this.responseText;
    //         document.forms["myForm"]["name"].value = "";
    //         document.forms["myForm"]["email"].value = "";
    //         document.forms["myForm"]["subject"].value = "";
    //         document.forms["myForm"]["comments"].value = "";  
    //     }
    // })
    // .catch(() => {
        
    //     axios.post(route('log-js-error'), logData).then((response) => {
    //         console.log("Error Logged: Success");
    //     }).catch(err => {
    //         console.log(err);
    //     })  
    // })
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("simple-msg").innerHTML = this.response;
            document.forms["myForm"]["name"].value = "";
            document.forms["myForm"]["email"].value = "";
            document.forms["myForm"]["subject"].value = "";
            document.forms["myForm"]["comments"].value = "";
        }else{
            // axios.post(route('log-js-error'), logData).then((response) => {
            //     console.log("Error Logged: Success");
            // }).catch(err => {
            //     console.log(err);
            // })  
        }
    };
    xhttp.open("POST","/contactus", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("name=" + name + "&email=" + email + "&subject=" + subject + "&message=" + comments+ "&_token="+token);
    return false;
}
  function fadeIn() {
    var fade = document.getElementById("error-msg");
    var opacity = 0;
    var intervalID = setInterval(function () {
        if (opacity < 1) {
            opacity = opacity + 0.5
            fade.style.opacity = opacity;
        } else {
            clearInterval(intervalID);
        }
    }, 200);
}