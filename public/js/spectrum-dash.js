var methods = {
    app: function(){
        document.addEventListener('DOMContentLoaded', function(){
            spetsnaz.dashboard();
            spetsnaz.bans();
        });
    },
    sel: function(a){
        return document.querySelector(a);
    },
    tag: function(a){
        return document.getElementsByTagName(a)[0];
    },
    set: function(a, b, c){
        a.setAttribute(b, c);
    },
    psh: function(a, b){
        a.appendChild(b);
    },
    text: function(a, t){
        return a.innerHMTL = t;
    },
    show: function(a){
        a.style.display = 'block';
    },
    hide: function(a){
        a.style.display = 'none';
    },
    elem: function(a){
        return document.getElementById(a);
    },
    eclass: function(a){
        return document.getElementsByClassName(a)[0];
    },
    create: function(a){
        return document.createElement(a);
    }
}

var spetsnaz = {
    dashboard: function(){
        if (methods.eclass('dashboard-box') == null) 
            return;

        setInterval(function(){
            moonlightHelper.get('/api/balancers', {}, (response, status) => {
                if (response == null)
                    return;

                methods.eclass('balancer-list').innerHTML = response;
            });

            moonlightHelper.get('/api/dashboard', {}, (response, status) => {
                if (response == null)
                    return;

                var json = JSON.parse(response);
                var perform = json.spectrum;   

                methods.elem('request-graphic').classList = spetsnaz.progress('request', perform.RequestGraphic);
                methods.elem('attack-graphic').classList = spetsnaz.progress('attack', perform.AttackGraphic);
                methods.elem('flood-graphic').classList = spetsnaz.progress('flood', perform.FloodGraphic);

                methods.sel('s-requests-today').innerHTML = perform.TodayRequests;
                methods.sel('s-attacks-today').innerHTML = perform.TotalAttacks;
                methods.sel('s-floods-today').innerHTML = perform.TotalFloods;

                methods.sel('s-attacks').innerHTML = perform.TodayAttacks;
                methods.sel('s-floods').innerHTML = perform.TodayFloods;
                methods.sel('balancers-count').innerHTML = perform.BalancerCount;
                methods.sel('balancers-connections').innerHTML = perform.BalancerConnections;
            });
        }, 10000);
    },
    bans: function(){
        if (methods.eclass('list-bans') == null) 
            return;

        document.querySelectorAll('.list-bans span').forEach(function(button){
            button.addEventListener("click", function(e){
                moonlightHelper.post('/api/delete', {ban: this.getAttribute('id').replace('ban-', '')}, (response, status) => {
                    console.log(response);
                    spetsnaz.notification('Has eliminado un objetivo de la lista. Los cambios pueden tardar en aparecer hasta 30 segundos.');
                    methods.hide(methods.eclass(this.getAttribute('id')));
                }); 
            });
        });
    },
    notification: function(text){
        var box = methods.eclass('center-box');
        var notif = methods.eclass('notification');

        notif.innerHTML = text;
        methods.show(box);

        setTimeout(function(){
            methods.hide(box);
        }, 5000);
    },
    progress: function(graphic, value){
        if (graphic == null || value == null)
            return;

        methods.sel('#'+ graphic +'-graphic span').innerHTML = value + '%';
        return 'progress-circle '+ ((value > 50) ? 'over50' : '') + ' p'+ value;
    }
}

window.onload = methods.app();