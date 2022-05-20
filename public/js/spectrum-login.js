var methods = {
    app: function () {
        document.addEventListener("DOMContentLoaded", function () {
            spetsnaz.login();
        });
    },
    sel: function (a) {
        return document.querySelector(a);
    },
    show: function (a) {
        a.style.display = "block";
    },
    hide: function (a) {
        a.style.display = "none";
    },
    elem: function (a) {
        return document.getElementById(a);
    },
    eclass: function (a) {
        return document.getElementsByClassName(a)[0];
    },
};

var spetsnaz = {
    resetContent: function () {
        var content = methods.eclass("content");

        while (content.firstChild) {
            content.removeChild(content.firstChild);
        }
    },
    renderContent: function (path) {
        moonlightHelper.get(path, {}, (response, status) => {
            methods.sel("html").innerHTML = response;
        });
    },
    login: function () {
        var form = methods.elem("users");

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            var email = methods.sel('input[name="email"]').value;
            var password = methods.sel('input[name="password"]').value;
            var token = methods.sel('input[name="_token"]').value;

            moonlightHelper.post(
                "/user/login",
                { email: email, password: password, _token: token },
                (response, status) => {
                    console.log(response);

                    if (response != "error") {
                        spetsnaz.loginMessage(false);
                        spetsnaz.renderContent("/dashboard");
                    } else spetsnaz.loginMessage(true);
                }
            );
        });
    },
    loginMessage: function (error) {
        var message = methods.elem("login-" + (error ? "error" : "ok"));

        if (!error) methods.hide(methods.elem("login-error"));

        message.innerHTML = error ? "Conexion incorrecta" : "Cargando...";
        methods.show(message);
    },
};
window.onload = methods.app();
