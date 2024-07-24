function loadJS(FILE_URL,async=true){let scriptEle=document.createElement("script");scriptEle.setAttribute("src",FILE_URL);scriptEle.setAttribute("type","text/javascript");scriptEle.setAttribute("async",async);document.body.appendChild(scriptEle);scriptEle.addEventListener("load",()=>{});scriptEle.addEventListener("error",(ev)=>{});}
setTimeout(function(){loadJS('assets/js/theme-settings.js',true);},1000);

$(function(){
    $('.sidebar-body a').click(function(){
        $('.sidebar-filter').removeClass('opened');
        $('.sidebar-settings').removeClass('show-settings');
    })
})