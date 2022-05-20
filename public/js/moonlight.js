var moonlightHelper = {};
moonlightHelper.h = function(){
    if (typeof XMLHttpRequest !== 'undefined'){
        return new XMLHttpRequest();
    }
    var vs=["MSXML2.XmlHttp.6.0", "MSXML2.XmlHttp.5.0", "MSXML2.XmlHttp.4.0", "MSXML2.XmlHttp.3.0", "MSXML2.XmlHttp.2.0", "Microsoft.XmlHttp"];
    var h;
    for(var i = 0;i<vs.length;i++){
        try{
            h=new ActiveXObject(versions[i]);
            break;
        } catch (e) {}
    }
    return h;
};
moonlightHelper.send = function(url,callback,method,data,async){
    if(async === undefined){
        async = true;
    }
    var h = moonlightHelper.h();
    h.open(method, url, async);
    h.onreadystatechange = function() {
        if(this.readyState == 4)
            callback(h.responseText, h.status);
    };
    if(method=='POST'){
        h.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    }
    h.send(data);
};
moonlightHelper.get = function(url,data,callback,async){
    var query = [];
    for(var key in data) {
        query.push(encodeURIComponent(key)+'='+encodeURIComponent(data[key]));
    }
    moonlightHelper.send(url+(query.length ? '?' + query.join('&') : ''), callback, 'GET', null, async);
};
moonlightHelper.post = function(url, data, callback, async) {
    var q = [];
    for(var key in data) {
        q.push(encodeURIComponent(key)+"="+encodeURIComponent(data[key]));
    }
    moonlightHelper.send(url, callback, 'POST', q.join('&'), async);
};