// AJAX registration
jQuery(function($){
    // alert(1);
    $('#submit').click(function(e){
        e.preventDefault();

        // JS VALIDATION FORM
        var form = document.forms["registration"];
        var fname = form["fname"];
        var lname = form["lname"];
        var country = form["country"];
        var phone = form["phone"];
        var username = form["username"];
        var password = form["password"];

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
                    $('#submit a').text('Loading');
                },
                complete:function (data) {
                    $('#submit a').text('CONTINUE');
                },
                success:function(data){
                    if( data=='Registration complete.' ) {

                        // console.log(data);
                        console.log('SUCCES');
                        //$('#true_loadmore').text(load_more_text).before(data); // вставляем новые посты
                        //current_page++; // увеличиваем номер страницы на единицу
                        //if (current_page == max_pages) $("#true_loadmore").remove(); // если последняя страница, удаляем кнопку
                    } else {
                        console.log(data);
                    }
                }
            });
        }





    });
});