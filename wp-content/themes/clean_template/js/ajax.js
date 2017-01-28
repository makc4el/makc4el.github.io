jQuery(function($){
// AJAX registration
    $('#submit_registration').click(function(e){
        e.preventDefault();
        $('.error_registration').remove();

        // JS VALIDATION FORM
        var form = document.forms["registration"];
        var fname = form["fname"];
        var lname = form["lname"];
        var country = form["country"];
        var phone = form["phone"];
        var username = form["fname"];
        var password = form["password"];
        var email = form["email"];

        var fields={};
        var err=0;
        for (var i=0; i<form.length; i++){
            if(form[i].className!=="selectric-input"){
                fields[form[i].name]=form[i].value;
            }

            if (form[i].localName=='input' && form[i].className!=="selectric-input"){
                if (form[i].value == "") {
                    err++;
                    form[i].style.borderColor = "red";
                }
            }
        }
        fname.oninput = function() {
            fname.style.borderColor = "#9c94bf";
        };
        lname.oninput = function() {
            lname.style.borderColor = "#9c94bf";
        };
        phone.oninput = function() {
            phone.style.borderColor = "#9c94bf";
        };
        username.oninput = function() {
            username.style.borderColor = "#9c94bf";
        };
        password.oninput = function() {
            password.style.borderColor = "#9c94bf";
        };
        email.oninput = function() {
            email.style.borderColor = "#9c94bf";
        };
        var data = {
            'action': 'registration',
            'fields' : fields
        };
        // beforeSend — срабатывает перед отправкой запроса
        // error — если произошла ошибка
        // success — если ошибок не возникло
        // complete — срабатывает по окончанию запроса
        if(err==0){
            $.ajax({
                url:ajaxurl, // обработчик
                data:data, // данные
                type:'POST', // тип запроса
                beforeSend:function (data) {
                    $('#submit_registration a').text('Loading');
                },
                complete:function (data) {
                    $('#submit_registration a').text('CONTINUE');
                },
                success:function(data){
                    if( data=='Registration complete.' ) {
                        console.log('SUCCES');
                    } else {
                        var response= JSON.parse(data);
                        for (var i=0; i<response.length; i++){
                            var li = document.createElement('li');
                            li.className = "error_registration";
                            li.innerHTML = response[i];
                            var ul= document.getElementById('main_ul');
                            ul.appendChild(li);
                        }
                        console.log(response);
                    }
                }
            });
        }else {
            var li = document.createElement('li');
            li.className = "error_registration";
            li.innerHTML = ' Please fix the errors and try again.';
            var ul= document.getElementById('main_ul');
            ul.appendChild(li);
        }

    });


    // AJAX authorization
    $('#submit_authorization').click(function(e){
        e.preventDefault();
        $('.error_authorization').remove();

        // JS VALIDATION FORM
        var form = document.forms["loginform"];
        var login = form["login"];
        var pwd = form["pwd"];

        var fields={};
        var err=0;
        for (var i=0; i<form.length; i++){
            fields[form[i].name]=form[i].value;

            if (form[i].localName=='input'){
                if (form[i].value == "") {
                    err++;
                    form[i].style.borderColor = "red";
                }
            }
        }
        login.oninput = function() {
            login.style.borderColor = "#9c94bf";
        };
        pwd.oninput = function() {
            pwd.style.borderColor = "#9c94bf";
        };

        var data = {
            'action': 'myauthorization',
            'fields' : fields
        };
        // beforeSend — срабатывает перед отправкой запроса
        // error — если произошла ошибка
        // success — если ошибок не возникло
        // complete — срабатывает по окончанию запроса
        if(err==0){
            $.ajax({
                url:ajaxurl, // обработчик
                data:data, // данные
                type:'POST', // тип запроса
                beforeSend:function (data) {
                    $('#submit_authorization a').text('Loading');
                },
                complete:function (data) {
                    $('#submit_authorization a').text('CONTINUE');
                },
                success:function(data){
                    console.log(data);
                    if( data=='authorization complete.' ) {
                        console.log('SUCCES');
                    } else {
                        var li = document.createElement('li');
                        li.className = "error_authorization";
                        li.innerHTML = data;
                        var ul= document.getElementById('main_ul');
                        ul.appendChild(li);
                    }

                }
            });
        }else {
            var li = document.createElement('li');
            li.className = "error_registration";
            li.innerHTML = ' Please fix the errors and try again.';
            var ul= document.getElementById('main_ul');
            ul.appendChild(li);
        }

    });
    //start PLANING
    $("#start_planing").click(function (e) {
        e.preventDefault();
        localStorage.removeItem("id_package");
        localStorage.setItem("id_package", id_package);
        window.location = url_redirect_start_planing;
        var data = {
            'action': 'start_planing',
            'id_package' : id_package
        };
        $.ajax({
            url:ajaxurl, // обработчик
            data:data, // данные
            type:'POST', // тип запроса
            success:function(data){
                // console.log(data);
            }
        });



    });


});