
<!doctype html>

<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!--<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","errorBeacon":"bam.nr-data.net","licenseKey":"7118777056","applicationID":"201869","transactionName":"dAwPQxFfCVoAE01cW1QWDFINRBYZEhMLTFFF","queueTime":0,"applicationTime":97,"agent":""}</script>
<script type="text/javascript">(window.NREUM||(NREUM={})).loader_config={xpid:"UgcCV1VACgMBXFdb"};window.NREUM||(NREUM={}),__nr_require=function(t,e,n){function r(n){if(!e[n]){var o=e[n]={exports:{}};t[n][0].call(o.exports,function(e){var o=t[n][1][e];return r(o||e)},o,o.exports)}return e[n].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<n.length;o++)r(n[o]);return r}({1:[function(t,e,n){function r(t){try{c.console&&console.log(t)}catch(e){}}var o,i=t("ee"),a=t(12),c={};try{o=localStorage.getItem("__nr_flags").split(","),console&&"function"==typeof console.log&&(c.console=!0,o.indexOf("dev")!==-1&&(c.dev=!0),o.indexOf("nr_dev")!==-1&&(c.nrDev=!0))}catch(s){}c.nrDev&&i.on("internal-error",function(t){r(t.stack)}),c.dev&&i.on("fn-err",function(t,e,n){r(n.stack)}),c.dev&&(r("NR AGENT IN DEVELOPMENT MODE"),r("flags: "+a(c,function(t,e){return t}).join(", ")))},{}],2:[function(t,e,n){function r(t,e,n,r,o){try{d?d-=1:i("err",[o||new UncaughtException(t,e,n)])}catch(c){try{i("ierr",[c,s.now(),!0])}catch(u){}}return"function"==typeof f&&f.apply(this,a(arguments))}function UncaughtException(t,e,n){this.message=t||"Uncaught error with no additional information",this.sourceURL=e,this.line=n}function o(t){i("err",[t,s.now()])}var i=t("handle"),a=t(13),c=t("ee"),s=t("loader"),f=window.onerror,u=!1,d=0;s.features.err=!0,t(1),window.onerror=r;try{throw new Error}catch(l){"stack"in l&&(t(5),t(4),"addEventListener"in window&&t(3),s.xhrWrappable&&t(6),u=!0)}c.on("fn-start",function(t,e,n){u&&(d+=1)}),c.on("fn-err",function(t,e,n){u&&(this.thrown=!0,o(n))}),c.on("fn-end",function(){u&&!this.thrown&&d>0&&(d-=1)}),c.on("internal-error",function(t){i("ierr",[t,s.now(),!0])})},{}],3:[function(t,e,n){function r(t){for(var e=t;e&&!e.hasOwnProperty(u);)e=Object.getPrototypeOf(e);e&&o(e)}function o(t){c.inPlace(t,[u,d],"-",i)}function i(t,e){return t[1]}var a=t("ee").get("events"),c=t(15)(a,!0),s=t("gos"),f=XMLHttpRequest,u="addEventListener",d="removeEventListener";e.exports=a,"getPrototypeOf"in Object?(r(document),r(window),r(f.prototype)):f.prototype.hasOwnProperty(u)&&(o(window),o(f.prototype)),a.on(u+"-start",function(t,e){var n=t[1],r=s(n,"nr@wrapped",function(){function t(){if("function"==typeof n.handleEvent)return n.handleEvent.apply(n,arguments)}var e={object:t,"function":n}[typeof n];return e?c(e,"fn-",null,e.name||"anonymous"):n});this.wrapped=t[1]=r}),a.on(d+"-start",function(t){t[1]=this.wrapped||t[1]})},{}],4:[function(t,e,n){var r=t("ee").get("raf"),o=t(15)(r),i="equestAnimationFrame";e.exports=r,o.inPlace(window,["r"+i,"mozR"+i,"webkitR"+i,"msR"+i],"raf-"),r.on("raf-start",function(t){t[0]=o(t[0],"fn-")})},{}],5:[function(t,e,n){function r(t,e,n){t[0]=a(t[0],"fn-",null,n)}function o(t,e,n){this.method=n,this.timerDuration=isNaN(t[1])?0:+t[1],t[0]=a(t[0],"fn-",this,n)}var i=t("ee").get("timer"),a=t(15)(i),c="setTimeout",s="setInterval",f="clearTimeout",u="-start",d="-";e.exports=i,a.inPlace(window,[c,"setImmediate"],c+d),a.inPlace(window,[s],s+d),a.inPlace(window,[f,"clearImmediate"],f+d),i.on(s+u,r),i.on(c+u,o)},{}],6:[function(t,e,n){function r(t,e){d.inPlace(e,["onreadystatechange"],"fn-",c)}function o(){var t=this,e=u.context(t);t.readyState>3&&!e.resolved&&(e.resolved=!0,u.emit("xhr-resolved",[],t)),d.inPlace(t,w,"fn-",c)}function i(t){g.push(t),h&&(b?b.then(a):v?v(a):(E=-E,O.data=E))}function a(){for(var t=0;t<g.length;t++)r([],g[t]);g.length&&(g=[])}function c(t,e){return e}function s(t,e){for(var n in t)e[n]=t[n];return e}t(3);var f=t("ee"),u=f.get("xhr"),d=t(15)(u),l=NREUM.o,p=l.XHR,h=l.MO,m=l.PR,v=l.SI,y="readystatechange",w=["onload","onerror","onabort","onloadstart","onloadend","onprogress","ontimeout"],g=[];e.exports=u;var x=window.XMLHttpRequest=function(t){var e=new p(t);try{u.emit("new-xhr",[e],e),e.addEventListener(y,o,!1)}catch(n){try{u.emit("internal-error",[n])}catch(r){}}return e};if(s(p,x),x.prototype=p.prototype,d.inPlace(x.prototype,["open","send"],"-xhr-",c),u.on("send-xhr-start",function(t,e){r(t,e),i(e)}),u.on("open-xhr-start",r),h){var b=m&&m.resolve();if(!v&&!m){var E=1,O=document.createTextNode(E);new h(a).observe(O,{characterData:!0})}}else f.on("fn-end",function(t){t[0]&&t[0].type===y||a()})},{}],7:[function(t,e,n){function r(t){var e=this.params,n=this.metrics;if(!this.ended){this.ended=!0;for(var r=0;r<d;r++)t.removeEventListener(u[r],this.listener,!1);if(!e.aborted){if(n.duration=a.now()-this.startTime,4===t.readyState){e.status=t.status;var i=o(t,this.lastSize);if(i&&(n.rxSize=i),this.sameOrigin){var s=t.getResponseHeader("X-NewRelic-App-Data");s&&(e.cat=s.split(", ").pop())}}else e.status=0;n.cbTime=this.cbTime,f.emit("xhr-done",[t],t),c("xhr",[e,n,this.startTime])}}}function o(t,e){var n=t.responseType;if("json"===n&&null!==e)return e;var r="arraybuffer"===n||"blob"===n||"json"===n?t.response:t.responseText;return h(r)}function i(t,e){var n=s(e),r=t.params;r.host=n.hostname+":"+n.port,r.pathname=n.pathname,t.sameOrigin=n.sameOrigin}var a=t("loader");if(a.xhrWrappable){var c=t("handle"),s=t(8),f=t("ee"),u=["load","error","abort","timeout"],d=u.length,l=t("id"),p=t(11),h=t(10),m=window.XMLHttpRequest;a.features.xhr=!0,t(6),f.on("new-xhr",function(t){var e=this;e.totalCbs=0,e.called=0,e.cbTime=0,e.end=r,e.ended=!1,e.xhrGuids={},e.lastSize=null,p&&(p>34||p<10)||window.opera||t.addEventListener("progress",function(t){e.lastSize=t.loaded},!1)}),f.on("open-xhr-start",function(t){this.params={method:t[0]},i(this,t[1]),this.metrics={}}),f.on("open-xhr-end",function(t,e){"loader_config"in NREUM&&"xpid"in NREUM.loader_config&&this.sameOrigin&&e.setRequestHeader("X-NewRelic-ID",NREUM.loader_config.xpid)}),f.on("send-xhr-start",function(t,e){var n=this.metrics,r=t[0],o=this;if(n&&r){var i=h(r);i&&(n.txSize=i)}this.startTime=a.now(),this.listener=function(t){try{"abort"===t.type&&(o.params.aborted=!0),("load"!==t.type||o.called===o.totalCbs&&(o.onloadCalled||"function"!=typeof e.onload))&&o.end(e)}catch(n){try{f.emit("internal-error",[n])}catch(r){}}};for(var c=0;c<d;c++)e.addEventListener(u[c],this.listener,!1)}),f.on("xhr-cb-time",function(t,e,n){this.cbTime+=t,e?this.onloadCalled=!0:this.called+=1,this.called!==this.totalCbs||!this.onloadCalled&&"function"==typeof n.onload||this.end(n)}),f.on("xhr-load-added",function(t,e){var n=""+l(t)+!!e;this.xhrGuids&&!this.xhrGuids[n]&&(this.xhrGuids[n]=!0,this.totalCbs+=1)}),f.on("xhr-load-removed",function(t,e){var n=""+l(t)+!!e;this.xhrGuids&&this.xhrGuids[n]&&(delete this.xhrGuids[n],this.totalCbs-=1)}),f.on("addEventListener-end",function(t,e){e instanceof m&&"load"===t[0]&&f.emit("xhr-load-added",[t[1],t[2]],e)}),f.on("removeEventListener-end",function(t,e){e instanceof m&&"load"===t[0]&&f.emit("xhr-load-removed",[t[1],t[2]],e)}),f.on("fn-start",function(t,e,n){e instanceof m&&("onload"===n&&(this.onload=!0),("load"===(t[0]&&t[0].type)||this.onload)&&(this.xhrCbStart=a.now()))}),f.on("fn-end",function(t,e){this.xhrCbStart&&f.emit("xhr-cb-time",[a.now()-this.xhrCbStart,this.onload,e],e)})}},{}],8:[function(t,e,n){e.exports=function(t){var e=document.createElement("a"),n=window.location,r={};e.href=t,r.port=e.port;var o=e.href.split("://");!r.port&&o[1]&&(r.port=o[1].split("/")[0].split("@").pop().split(":")[1]),r.port&&"0"!==r.port||(r.port="https"===o[0]?"443":"80"),r.hostname=e.hostname||n.hostname,r.pathname=e.pathname,r.protocol=o[0],"/"!==r.pathname.charAt(0)&&(r.pathname="/"+r.pathname);var i=!e.protocol||":"===e.protocol||e.protocol===n.protocol,a=e.hostname===document.domain&&e.port===n.port;return r.sameOrigin=i&&(!e.hostname||a),r}},{}],9:[function(t,e,n){function r(){}function o(t,e,n){return function(){return i(t,[f.now()].concat(c(arguments)),e?null:this,n),e?void 0:this}}var i=t("handle"),a=t(12),c=t(13),s=t("ee").get("tracer"),f=t("loader"),u=NREUM;"undefined"==typeof window.newrelic&&(newrelic=u);var d=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],l="api-",p=l+"ixn-";a(d,function(t,e){u[e]=o(l+e,!0,"api")}),u.addPageAction=o(l+"addPageAction",!0),u.setCurrentRouteName=o(l+"routeName",!0),e.exports=newrelic,u.interaction=function(){return(new r).get()};var h=r.prototype={createTracer:function(t,e){var n={},r=this,o="function"==typeof e;return i(p+"tracer",[f.now(),t,n],r),function(){if(s.emit((o?"":"no-")+"fn-start",[f.now(),r,o],n),o)try{return e.apply(this,arguments)}finally{s.emit("fn-end",[f.now()],n)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(t,e){h[e]=o(p+e)}),newrelic.noticeError=function(t){"string"==typeof t&&(t=new Error(t)),i("err",[t,f.now()])}},{}],10:[function(t,e,n){e.exports=function(t){if("string"==typeof t&&t.length)return t.length;if("object"==typeof t){if("undefined"!=typeof ArrayBuffer&&t instanceof ArrayBuffer&&t.byteLength)return t.byteLength;if("undefined"!=typeof Blob&&t instanceof Blob&&t.size)return t.size;if(!("undefined"!=typeof FormData&&t instanceof FormData))try{return JSON.stringify(t).length}catch(e){return}}}},{}],11:[function(t,e,n){var r=0,o=navigator.userAgent.match(/Firefox[\/\s](\d+\.\d+)/);o&&(r=+o[1]),e.exports=r},{}],12:[function(t,e,n){function r(t,e){var n=[],r="",i=0;for(r in t)o.call(t,r)&&(n[i]=e(r,t[r]),i+=1);return n}var o=Object.prototype.hasOwnProperty;e.exports=r},{}],13:[function(t,e,n){function r(t,e,n){e||(e=0),"undefined"==typeof n&&(n=t?t.length:0);for(var r=-1,o=n-e||0,i=Array(o<0?0:o);++r<o;)i[r]=t[e+r];return i}e.exports=r},{}],14:[function(t,e,n){e.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],15:[function(t,e,n){function r(t){return!(t&&t instanceof Function&&t.apply&&!t[a])}var o=t("ee"),i=t(13),a="nr@original",c=Object.prototype.hasOwnProperty,s=!1;e.exports=function(t,e){function n(t,e,n,o){function nrWrapper(){var r,a,c,s;try{a=this,r=i(arguments),c="function"==typeof n?n(r,a):n||{}}catch(f){l([f,"",[r,a,o],c])}u(e+"start",[r,a,o],c);try{return s=t.apply(a,r)}catch(d){throw u(e+"err",[r,a,d],c),d}finally{u(e+"end",[r,a,s],c)}}return r(t)?t:(e||(e=""),nrWrapper[a]=t,d(t,nrWrapper),nrWrapper)}function f(t,e,o,i){o||(o="");var a,c,s,f="-"===o.charAt(0);for(s=0;s<e.length;s++)c=e[s],a=t[c],r(a)||(t[c]=n(a,f?c+o:o,i,c))}function u(n,r,o){if(!s||e){var i=s;s=!0;try{t.emit(n,r,o,e)}catch(a){l([a,n,r,o])}s=i}}function d(t,e){if(Object.defineProperty&&Object.keys)try{var n=Object.keys(t);return n.forEach(function(n){Object.defineProperty(e,n,{get:function(){return t[n]},set:function(e){return t[n]=e,e}})}),e}catch(r){l([r])}for(var o in t)c.call(t,o)&&(e[o]=t[o]);return e}function l(e){try{t.emit("internal-error",e)}catch(n){}}return t||(t=o),n.inPlace=f,n.flag=a,n}},{}],ee:[function(t,e,n){function r(){}function o(t){function e(t){return t&&t instanceof r?t:t?s(t,c,i):i()}function n(n,r,o,i){if(!l.aborted||i){t&&t(n,r,o);for(var a=e(o),c=h(n),s=c.length,f=0;f<s;f++)c[f].apply(a,r);var d=u[w[n]];return d&&d.push([g,n,r,a]),a}}function p(t,e){y[t]=h(t).concat(e)}function h(t){return y[t]||[]}function m(t){return d[t]=d[t]||o(n)}function v(t,e){f(t,function(t,n){e=e||"feature",w[n]=e,e in u||(u[e]=[])})}var y={},w={},g={on:p,emit:n,get:m,listeners:h,context:e,buffer:v,abort:a,aborted:!1};return g}function i(){return new r}function a(){(u.api||u.feature)&&(l.aborted=!0,u=l.backlog={})}var c="nr@context",s=t("gos"),f=t(12),u={},d={},l=e.exports=o();l.backlog=u},{}],gos:[function(t,e,n){function r(t,e,n){if(o.call(t,e))return t[e];var r=n();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(t,e,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return t[e]=r,r}var o=Object.prototype.hasOwnProperty;e.exports=r},{}],handle:[function(t,e,n){function r(t,e,n,r){o.buffer([t],r),o.emit(t,e,n)}var o=t("ee").get("handle");e.exports=r,r.ee=o},{}],id:[function(t,e,n){function r(t){var e=typeof t;return!t||"object"!==e&&"function"!==e?-1:t===window?0:a(t,i,function(){return o++})}var o=1,i="nr@id",a=t("gos");e.exports=r},{}],loader:[function(t,e,n){function r(){if(!b++){var t=x.info=NREUM.info,e=l.getElementsByTagName("script")[0];if(setTimeout(u.abort,3e4),!(t&&t.licenseKey&&t.applicationID&&e))return u.abort();f(w,function(e,n){t[e]||(t[e]=n)}),s("mark",["onload",a()+x.offset],null,"api");var n=l.createElement("script");n.src="https://"+t.agent,e.parentNode.insertBefore(n,e)}}function o(){"complete"===l.readyState&&i()}function i(){s("mark",["domContent",a()+x.offset],null,"api")}function a(){return E.exists&&performance.now?Math.round(performance.now()):(c=Math.max((new Date).getTime(),c))-x.offset}var c=(new Date).getTime(),s=t("handle"),f=t(12),u=t("ee"),d=window,l=d.document,p="addEventListener",h="attachEvent",m=d.XMLHttpRequest,v=m&&m.prototype;NREUM.o={ST:setTimeout,SI:d.setImmediate,CT:clearTimeout,XHR:m,REQ:d.Request,EV:d.Event,PR:d.Promise,MO:d.MutationObserver};var y=""+location,w={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1039.min.js"},g=m&&v&&v[p]&&!/CriOS/.test(navigator.userAgent),x=e.exports={offset:c,now:a,origin:y,features:{},xhrWrappable:g};t(9),l[p]?(l[p]("DOMContentLoaded",i,!1),d[p]("load",r,!1)):(l[h]("onreadystatechange",o),d[h]("onload",r)),s("mark",["firstbyte",c],null,"api");var b=0,E=t(14)},{}]},{},["loader",2,7]);</script>
   -->
<meta name="robots" content="noindex">

  <title>
      Document Assembly - MyCase
  </title>


  <meta name="viewport" content="width=1100" />
  <meta name="csrf-param" content="authenticity_token" />
<meta name="csrf-token" content="m2/HLBlp5v+41r9kgnKL0naKp9TLs/K9cCWAdOMM+L4S4l86U1LKfeNcfH3D8dvRg/YgYfn4FOgfmWADKYkT7g==" />
<script src="http://cdn.ckeditor.com/4.7.0/standard-all/ckeditor.js"></script>
	<link href="http://sdk.ckeditor.com/theme/css/sdk-inline.css" rel="stylesheet">

<!--  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
  <script type="text/javascript">
    if (!window.jQuery) {
      document.write(unescape("%3Cscript src='https://assets.mycase.com/assets/libs/jquery-1.7.1.min-97d0bc651385b481e1433351e421ec5e8fba4b1e2bd450c09101b0ee9aaf7d07.js' type='text/javascript'%3E%3C/script%3E"));
    }
  </script>

  <link rel="stylesheet" media="screen" href="https://assets.mycase.com/assets/application-f75f1b391309fc6e99dbf97cd7d0001fbc88018ad146d8bb6865e1cdfd360ce5.css" />
  <link rel="stylesheet" media="screen" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
  <script src="https://assets.mycase.com/assets/babel_external_helpers-c0a6e837cdf99f46fa88ef67d5339eec4acd068286f45e6d427c72b1495809f7.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.11/moment-timezone.min.js"></script>
  <script src="https://assets.mycase.com/assets/time_zone_data_loaders/asia_almaty-c4a946a9d60d0c2880b229aca1e4686698bd796051f06844ac8dd198e9be4ef6.js"></script>

  <script src="https://assets.mycase.com/assets/common_render_blocking_scripts-0116c71da7fcd2d503ba44d658f10ec623213ea8d4734bcc9577270b0806f0ff.js"></script>
  <script src="https://assets.mycase.com/assets/application-63baa66d9d645d3e381294e80cabb5da6f74f661a47c0acab532fe2b5106c8f1.js"></script>
    <body class='clean'>
        <div id='main_content' style="width: 1260px;">
<link rel="stylesheet" media="screen" href="https://assets.mycase.com/assets/documents/writer-4da6af86978552ab3af6b93a299254d700a619ff37290575b0b055ba584e4c6b.css" />

  <div id='top_menus'>
    <input type="hidden" name="id" id="document_id" value="34061168" class="writer" />
    <input type="hidden" name="document[writer_html]" id="document_writer_html" class="writer" />
    <div id='document_name_text'>
      <input type="text" name="document[name]" id="document_name" value="Untitled Document" class="writer writer_document_name" />
    </div>

    <div id='autosave_text'>
    </div>

    <ul class='menubar'>
  <li class='menubar_item'>
    <a href="#" onclick="; return false;">File</a>
    <div class='menu'>
      <div class='menu_file'>
        <div class='menu_overlay'>
          File
        </div>
      </div>

      <a href="#" onclick="hide_active_menu();var new_win = window.open(&#39;https://rs-software4.mycase.com/documents/writer&#39;);new_win.opener = window.opener;; return false;"><span>New</span></a>

      <div id='menu_save_document' style='display: none;'>
        <a href="#" onclick="hide_active_menu();fieldsDirty=true;writer_autosave(save_existing);; return false;"><span>Save</span></a>
        <a href="#" onclick="MyCase.LoadingSpinner.show(&#39;Saving&#39;);hide_active_menu();fieldsDirty=true;writer_autosave(function() {save_existing(true)});; return false;"><span>Save and Close</span></a>
      </div>
      <div id='menu_save_draft' style=''>
        <a id="menu_save_as_document" href="#" data-toggle="modal" data-target="#myModal11" onclick="newmodal()"><span>Save as Document...</span></a>
        <a id="menu_save_as_template" href="#" onclick="hide_active_menu();fieldsDirty=true;writer_autosave(save_as_template);; return false;"><span>Save as Template...</span></a>
      </div>
    

      
      
      
      
      
      
      <hr/>
      <a href="#" onclick="print_preview(); return false;"><span>Print Preview</span></a>
      <a href="#" onclick="export_pdf(); return false;"><span>Export as PDF</span></a>
      <hr/>
      <a href="#" onclick="check_writer_close(); return false;"><span>Close</span></a>
    </div>
  </li>
  <li class='menubar_item'>
    <a href="#" onclick="; return false;">Edit</a>
    <div class='menu'>
      <div style='position: relative;'>
        <div class='menu_overlay'>
          Edit
        </div>
      </div>

      <a id="undo_button" href="#" onclick="editor.getCommand(&#39;undo&#39;).exec();; return false;"><span>Undo</span></a>
      <a id="redo_button" href="#" onclick="editor.getCommand(&#39;redo&#39;).exec();; return false;"><span>Redo</span></a>
      <hr/>
      <a id="paste_button" href="#" onclick="editor.getCommand(&#39;paste&#39;).exec();; return false;"><span>Paste</span></a>
      <a href="#" onclick="editor.getCommand(&#39;pastetext&#39;).exec();; return false;"><span>Paste as text</span></a>
      <a href="#" onclick="editor.getCommand(&#39;pastefromword&#39;).exec();; return false;"><span>Paste from Word</span></a>
      <hr/>
      <a href="#" onclick="editor.getCommand(&#39;find&#39;).exec();; return false;"><span>Find and Replace...</span></a>
    </div>
  </li>
  <li class='menubar_item'>
    <a href="#" onclick="; return false;">Insert</a>
    <div class='menu'>
      <div style='position: relative;'>
        <div class='menu_overlay'>
          Insert
        </div>
      </div>
        
      <a href="#" onclick="editor.getCommand(&#39;numberedlist&#39;).exec();; return false;"><span>Numbered List</span></a>
      <a href="#" onclick="editor.getCommand(&#39;bulletedlist&#39;).exec();; return false;"><span>Bulleted List</span></a>
      <a href="#" onclick="editor.getCommand(&#39;blockquote&#39;).exec();; return false;"><span>Block Quote</span></a>
      <a href="#" onclick="editor.getCommand(&#39;specialchar&#39;).exec();; return false;"><span>Special Character...</span></a>
      <hr/>
      <a href="#" onclick="editor.getCommand(&#39;table&#39;).exec();; return false;"><span>Table...</span></a>
      <hr/>
      <a href="#" onclick="editor.getCommand(&#39;pagebreak&#39;).exec();; return false;"><span>Page Break</span></a>
    </div>
  </li>
  <li class='menubar_item'>
    <a href="#" onclick="; return false;">Format</a>
    <div class='menu'>
      <div style='position: relative;'>
        <div class='menu_overlay'>
          Format
        </div>
      </div>

      <a href="#" onclick="hide_active_menu();jQuery(&#39;#writer_margins_dialog&#39;).dialog(&#39;open&#39;);; return false;"><span>Page Margins</span></a>
      <a href="#" onclick="hide_active_menu();jQuery(&#39;#line_spacing_dialog&#39;).dialog(&#39;open&#39;);; return false;"><span>Line Spacing</span></a>
      <hr/>
      <a href="#" onclick="editor.getCommand(&#39;bold&#39;).exec();; return false;"><span>Bold</span></a>
      <a href="#" onclick="editor.getCommand(&#39;italic&#39;).exec();; return false;"><span>Italic</span></a>
      <a href="#" onclick="editor.getCommand(&#39;underline&#39;).exec();; return false;"><span>Underline</span></a>
      <a href="#" onclick="editor.getCommand(&#39;strike&#39;).exec();; return false;"><span>Strikethrough</span></a>

    </div>
  </li>
</ul>

<div id='download_container' style='width: 0px; height: 0px; overflow: hidden;'></div>

<script type="text/javascript" charset="utf-8">
//<![CDATA[
  var previewWindow;

  function line_spacing(type) {
    if (type == 'single') {
      jQuery('ul#double_line').removeClass('graybox').addClass('graybox_off');
      jQuery('ul#single_line').removeClass('graybox_off').addClass('graybox');
    }
    else {
      jQuery('ul#double_line').removeClass('graybox_off').addClass('graybox');
      jQuery('ul#single_line').removeClass('graybox').addClass('graybox_off');
    }
  }

  function hide_active_menu() {
    jQuery('ul.menubar a.selected').removeClass('selected');
    jQuery('div.menu').hide();
    jQuery(document).off("click.mycase");
    jQuery('iframe').contents().off("click.mycase");
    jQuery('div.menu_overlay').off('click.mycase');
    jQuery('ul.menubar > li > a').off('hover.mycase');
  }

  function show_menu(link) {
    link.addClass('selected');
    link.next('div').show();
    link.next('div').find('div.menu_overlay').on('click.mycase', hide_active_menu);
    jQuery(document).on('click.mycase', function(event) {
      hide_active_menu();
    });
    jQuery('iframe').contents().on('click.mycase', function(event) {
      hide_active_menu();
    });
    jQuery('ul.menubar > li > a').on('hover.mycase', function() {
      if (!jQuery(this).hasClass('selected')) {
        hide_active_menu();
        show_menu(jQuery(this));
      }
    });
  }

  function check_writer_close() {
    if (editor.checkDirty() || fieldsDirty || unsavedDraft) {
      MyCase.confirm({
        title: "Discard Changes",
        message: "You currently have unsaved changes to this document.  Are you sure you want to close and discard your changes?",
        confirmButton: "Discard Changes",
        onConfirm: function() {
          skipCloseUnload = true;
          close_writer();
        }
      })
    }
    else {
      close_writer();
    }
  }

  function save_as_document(skip_merge) {
    if (check_for_merge_fields()) {
      MyCase.confirm({
        title: "Save as Template",
        message: "<p>This draft contains merge fields, so you have to save it as a template.</p>",
        confirmButton: "Save as Template",
        onConfirm: save_as_template
      });
    }
    else {
      jQuery.facebox({ajax: 'https://rs-software4.mycase.com/documents/new?draft=34061168'});
    }
  }

  function save_as_template() {
    jQuery.facebox({ajax: 'https://rs-software4.mycase.com/documents/new?template=34061168'});
  }

  function save_existing(close_on_save) {
    jQuery.post('https://rs-software4.mycase.com/documents/writer_save', {'id': jQuery('#document_id').val()}, function(data) {
      if (data.hasOwnProperty('error_dialog')) {
        showErrorDialog(data.error_dialog);
      } else {
        jQuery('#autosave_text').html('<span style="font-weight: bold; color: black;">Document Saved</span>');
        if(data.hasOwnProperty('new_doc_id')) {
          jQuery('#document_id').val(data.new_doc_id);
        }
      }
      unsavedDraft = false;
      if (close_on_save) close_writer();
    });
  }

  function print_preview() {
    fieldsDirty = true;
    hide_active_menu();
    previewWindow = window.open('https://rs-software4.mycase.com/documents/pending_writer');

    writer_autosave(function() {
      var url = '/documents/34061168/view.pdf';
      previewWindow.location.href = url;
    });
  }

  function export_pdf() {
    fieldsDirty = true;
    hide_active_menu();
    MyCase.LoadingSpinner.show('Building PDF');
    writer_autosave(function() {
      MyCase.LoadingSpinner.hide();
      var url = '/documents/34061168/download.pdf/';
      jQuery("div#download_container").html('<iframe width="0" height="0" frameborder="0" src="' + url + '"></iframe>');
    });
  }

  jQuery(function() {
    jQuery('ul.menubar > li > a').click(function(event){
      event.stopPropagation();
      show_menu(jQuery(this));
    });
    jQuery('ul.menubar > li > a').bind('mouseover', function() {
      var link = jQuery(this);
    })

  });

//]]>
</script>

  </div>

    <div id='merge_bar'>
  <table class='merge_bar_table'>
    <tr>
      <td class='merge_bar_cell merge_bar_cell_header'>
        Insert Merge Field:
      </td>
      <td class='merge_bar_cell'>
        <select name="merge_type" id="merge_type" class="styled select_normal select_invoice_150 merge_bar_select merge_bar_select_short"><option value="general">General Fields</option>
<option value="contact">Contact Fields</option>
<option value="company">Company Fields</option>
<option value="case">Case Fields</option>
<option value="firm_user">Firm User Fields</option>
<option value="firm">Firm Fields</option></select>
      </td>
      <td class='merge_bar_cell'>
          <div id='merge_options_general' class='merge_options'>
            <select name="merge_field_general" id="merge_field_general" class="styled select_normal select_invoice_250 merge_bar_select_long"><option value="current_date_long">Current Date (Long)</option>
<option value="current_date_short">Current Date (dd/mm/yyyy)</option>
<option value="current_time">Current Time</option></select>
          </div>
          <div id='merge_options_contact' class='merge_options'>
            <select name="merge_field_contact" id="merge_field_contact" class="styled select_normal select_invoice_250 merge_bar_select_long"><option value="address.single_line">Address (Full, Single Line)</option>
<option value="address.street">Address (Street)</option>
<option value="address.street2">Address (Street2)</option>
<option value="address.city">Address (City)</option>
<option value="address.state">Address (State)</option>
<option value="address.zip_code">Address (Postal Code)</option>
<option value="address.country">Address (Country)</option>
<option value="birthday_string">Birthday</option>
<option value="company.name">Company Name</option>
<option value="email">Email</option>
<option value="contact_group.name">Group</option>
<option value="job_title">Job Title</option>
<option value="license_number">License (Number)</option>
<option value="license_state">License (State)</option>
<option value="first_name">Name (First)</option>
<option value="full_name">Name (Full)</option>
<option value="last_name">Name (Last)</option>
<option value="middle_initial">Name (Middle)</option>
<option value="cell_phone">Phone (Cell)</option>
<option value="fax_phone">Phone (Fax)</option>
<option value="home_phone">Phone (Home)</option>
<option value="work_phone">Phone (Work)</option>
<option value="currency_trust_balance">Trust Balance</option>
<option value="website">Website</option></select>
          </div>
          <div id='merge_options_company' class='merge_options'>
            <select name="merge_field_company" id="merge_field_company" class="styled select_normal select_invoice_250 merge_bar_select_long"><option value="address.single_line">Address (Full, Single Line)</option>
<option value="address.street">Address (Street)</option>
<option value="address.street2">Address (Street2)</option>
<option value="address.city">Address (City)</option>
<option value="address.state">Address (State)</option>
<option value="address.zip_code">Address (Postal Code)</option>
<option value="address.country">Address (Country)</option>
<option value="name">Company Name</option>
<option value="email">Email</option>
<option value="fax_phone">Phone (Fax)</option>
<option value="work_phone">Phone (Main)</option>
<option value="currency_trust_balance">Trust Balance</option>
<option value="website">Website</option></select>
          </div>
          <div id='merge_options_case' class='merge_options'>
            <select name="merge_field_case" id="merge_field_case" class="styled select_normal select_invoice_250 merge_bar_select_long"><option value="billing_user.full_name">Billing Contact (full name)</option>
<option value="name">Case Name</option>
<option value="case_number">Case Number</option>
<option value="date_closed">Date Closed</option>
<option value="date_opened">Date Opened</option>
<option value="description">Description</option>
<option value="billing_type_formatted">Fee Structure</option>
<option value="currency_flat_fee">Flat Fee Amount</option>
<option value="practice_area.name">Practice Area</option></select>
          </div>
          <div id='merge_options_firm_user' class='merge_options'>
            <select name="merge_field_firm_user" id="merge_field_firm_user" class="styled select_normal select_invoice_250 merge_bar_select_long"><option value="address.single_line">Address (Full, Single Line)</option>
<option value="address.street">Address (Street)</option>
<option value="address.street2">Address (Street2)</option>
<option value="address.city">Address (City)</option>
<option value="address.state">Address (State)</option>
<option value="address.zip_code">Address (Postal Code)</option>
<option value="address.country">Address (Country)</option>
<option value="currency_default_rate">Default Rate</option>
<option value="email">Email</option>
<option value="first_name">Name (First)</option>
<option value="full_name">Name (Full)</option>
<option value="last_name">Name (Last)</option>
<option value="middle_initial">Name (Middle)</option>
<option value="cell_phone">Phone (Cell)</option>
<option value="home_phone">Phone (Home)</option>
<option value="work_phone">Phone (Work)</option>
<option value="access_level">User Type</option></select>
          </div>
          <div id='merge_options_firm' class='merge_options'>
            <select name="merge_field_firm" id="merge_field_firm" class="styled select_normal select_invoice_250 merge_bar_select_long"><option value="address.single_line">Address (Full, Single Line)</option>
<option value="address.street">Address (Street)</option>
<option value="address.street2">Address (Street2)</option>
<option value="address.city">Address (City)</option>
<option value="address.state">Address (State)</option>
<option value="address.zip_code">Address (Postal Code)</option>
<option value="address.country">Address (Country)</option>
<option value="name">Firm Name</option>
<option value="fax_phone">Phone (Fax)</option>
<option value="main_phone">Phone (Main)</option></select>
          </div>
      </td>
      <td class='merge_bar_cell'>
        <a class="gray_button_dark" href="#" onclick="insert_merge(); return false;">Insert Field</a>
      </td>
    </tr>
  </table>
</div>

<script type="text/javascript" charset="utf-8">
//<![CDATA[
  var field_hash = {
    'general|current_date_long':'current_date_long','general|current_date_short':'current_date_short','general|current_time':'current_time','contact|address.single_line':'address_single_line','contact|address.street':'address_street','contact|address.street2':'address_street2','contact|address.city':'address_city','contact|address.state':'address_state','contact|address.zip_code':'address_postal_code','contact|address.country':'address_country','contact|birthday_string':'birthday','contact|company.name':'company_name','contact|email':'email','contact|contact_group.name':'group','contact|job_title':'job_title','contact|license_number':'license_number','contact|license_state':'license_state','contact|first_name':'first_name','contact|full_name':'full_name','contact|last_name':'last_name','contact|middle_initial':'middle_name','contact|cell_phone':'cell_phone','contact|fax_phone':'fax_phone','contact|home_phone':'home_phone','contact|work_phone':'work_phone','contact|currency_trust_balance':'trust_balance','contact|website':'website','company|address.single_line':'address_single_line','company|address.street':'address_street','company|address.street2':'address_street2','company|address.city':'address_city','company|address.state':'address_state','company|address.zip_code':'address_postal_code','company|address.country':'address_country','company|name':'company_name','company|email':'email','company|fax_phone':'fax_phone','company|work_phone':'main_phone','company|currency_trust_balance':'trust_balance','company|website':'website','case|billing_user.full_name':'billing_contact','case|name':'case_name','case|case_number':'case_number','case|date_closed':'date_closed','case|date_opened':'date_opened','case|description':'description','case|billing_type_formatted':'fee_structure','case|currency_flat_fee':'flat_fee_amount','case|practice_area.name':'practice_area','firm_user|address.single_line':'address_single_line','firm_user|address.street':'address_street','firm_user|address.street2':'address_street2','firm_user|address.city':'address_city','firm_user|address.state':'address_state','firm_user|address.zip_code':'address_postal_code','firm_user|address.country':'address_country','firm_user|currency_default_rate':'default_rate','firm_user|email':'email','firm_user|first_name':'first_name','firm_user|full_name':'full_name','firm_user|last_name':'last_name','firm_user|middle_initial':'middle_name','firm_user|cell_phone':'cell_phone','firm_user|home_phone':'home_phone','firm_user|work_phone':'work_phone','firm_user|access_level':'user_type','firm|address.single_line':'address_single_line','firm|address.street':'address_street','firm|address.street2':'address_street2','firm|address.city':'address_city','firm|address.state':'address_state','firm|address.zip_code':'address_postal_code','firm|address.country':'address_country','firm|name':'firm_name','firm|fax_phone':'fax_phone','firm|main_phone':'main_phone'
  }

  function change_merge_type() {
    jQuery('div.merge_options').hide();
    var merge_type = jQuery('#merge_type').val();
    jQuery('div#merge_options_' + merge_type).show();
  }

  function insert_merge() {
    var merge_type = jQuery('#merge_type').val();
    var merge_field = jQuery('#merge_field_' + merge_type).val();

    var field = merge_type + "." + field_hash[merge_type + "|" + merge_field];

    var element = CKEDITOR.dom.element.createFromHtml( '<span class="merge_field" contenteditable="false" merge_key="' + merge_type + "|" + merge_field + '">' + field + '</span>' );
    editor.insertElement( element );
  }

  var mergeRegex = /<span class="merge_field".*?>/
  // Checks if there are any merge fields in the document.
  // Returns true if there are, false if there are not any.
  function check_for_merge_fields() {
    return mergeRegex.test(editor.getData());
  }

  jQuery(function() {
    Custom.create_select($('merge_type'));
     Custom.create_select($('merge_field_general'));
     Custom.create_select($('merge_field_contact'));
     Custom.create_select($('merge_field_company'));
     Custom.create_select($('merge_field_case'));
     Custom.create_select($('merge_field_firm_user'));
     Custom.create_select($('merge_field_firm'));

    change_merge_type();
    jQuery('#merge_type').change(change_merge_type);
  });

//]]>
</script>


  <div id='editor_wrapper'>
    <div id='toolbar_div'>
    </div>

    <div id='gutter' class='gutter'>
      <table class='page_break' style='width: 850px; border-collapse: collapse;  margin: 15px auto; border-spacing: 0px;'>
        <tr>
          <td style='width: 100.0px;' class='margin left_margin'>
            &nbsp;
          </td>
          <td style='width: 650.0px; padding-top: 100.0px; padding-bottom: 100.0px;' class='center'>
            <div id='editor_div' class='editor_area'>
            </div>
          </td>
          <td style='width: 100.0px;' class='margin right_margin'>
          </td>
        </tr>
      </table>
    </div>

    <div id='bottom_div'>
    </div>
  </div>

  
<div id='writer_margins_dialog' style='display: none;'>
  <table>
    <tr>
      <td>Left:</td>
      <td><input type="text" name="document[writer][margins][left]" id="document_writer_margins_left" value="1.0" style="width: 75px; text-align: right;" class="writer" />&nbsp;&nbsp;inches</td>
    </tr>
    <tr>
      <td>Right:</td>
      <td><input type="text" name="document[writer][margins][right]" id="document_writer_margins_right" value="1.0" style="width: 75px; text-align: right;" class="writer" />&nbsp;&nbsp;inches</td>
    </tr>
    <tr>
      <td>Top:</td>
      <td><input type="text" name="document[writer][margins][top]" id="document_writer_margins_top" value="1.0" style="width: 75px; text-align: right;" class="writer" />&nbsp;&nbsp;inches</td>
    </tr>
    <tr>
      <td>Bottom:</td>
      <td><input type="text" name="document[writer][margins][bottom]" id="document_writer_margins_bottom" value="1.0" style="width: 75px; text-align: right;" class="writer" />&nbsp;&nbsp;inches</td>
    </tr>
  </table>
</div>

<div id='line_spacing_dialog' style='display: none;'>
  <input type="hidden" name="document[writer][line_spacing]" id="document_writer_line_spacing" class="writer" />
  <table>
    <tr>
      <td><input type="radio" name="line_spacing" id="line_spacing_1" value="1" class="line_spacing_radio" checked="checked" /></td>
      <td style='height: 26px;'><label for="line_spacing_1">Single</label></td>
    </tr>
    <tr>
      <td><input type="radio" name="line_spacing" id="line_spacing_2" value="2" class="line_spacing_radio" /></td>
      <td style='height: 26px;'><label for="line_spacing_2">Double</label></td>
    </tr>
    <tr>
      <td><input type="radio" name="line_spacing" id="line_spacing_custom_radio" value="custom" class="line_spacing_radio" /></td>
      <td style='height: 26px;'>
        <label for="line_spacing_custom_radio">Custom</label>
        <span style='display: none;' id='line_spacing_custom'>
          <input type="text" name="line_spacing_custom" id="line_spacing_custom" value="" style="width: 75px; text-align: right;" />
          lines
        </span>
      </td>
    </tr>
  </table>
</div>












<div id="dialog" title="Basic dialog">
  <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>
 

<div id='choose_save_type' style='dispaly: none;'>
  <p>Would you like to save this draft as a Document or a Template?</p>
</div>
<div id='choose_save_typee' style='dispaly: none;'>
  <p>Would you like to save this draft as a Document or a Template?</p>
</div>
<script type="text/javascript" charset="utf-8">
//<![CDATA[
  jQuery(function() {
    jQuery('#writer_margins_dialog').dialog({
      autoOpen: false,
      title: "Margins",
      modal: true,
      resize: false,
      width: 250,
      open: function () {
        original_values['margins'] = {};
        original_values['margins']['left'] = jQuery('#document_writer_margins_left').val();
        original_values['margins']['right'] = jQuery('#document_writer_margins_right').val();
        original_values['margins']['top'] = jQuery('#document_writer_margins_top').val();
        original_values['margins']['bottom'] = jQuery('#document_writer_margins_bottom').val();
      },
      buttons: [
        {
          text: "Cancel",
          click: function() {
            jQuery(this).dialog('close');
            jQuery('#document_writer_margins_left').val(original_values['margins']['left']);
            jQuery('#document_writer_margins_right').val(original_values['margins']['right']);
            jQuery('#document_writer_margins_top').val(original_values['margins']['top']);
            jQuery('#document_writer_margins_bottom').val(original_values['margins']['bottom']);
          }
        },
        {
          text: "OK",
          click: function() {
            var lmargin = parseFloat(jQuery('#document_writer_margins_left').val());
            var rmargin = parseFloat(jQuery('#document_writer_margins_right').val());
            var tmargin = parseFloat(jQuery('#document_writer_margins_top').val());
            var bmargin = parseFloat(jQuery('#document_writer_margins_bottom').val());

            if (isNaN(lmargin)) {
              lmargin = 1.0;
              jQuery('#document_writer_margins_left').val('1.0');
            }
            if (isNaN(rmargin)) {
              rmargin = 1.0;
              jQuery('#document_writer_margins_right').val('1.0');
            }
            if (isNaN(tmargin)) {
              tmargin = 1.0;
              jQuery('#document_writer_margins_top').val('1.0');
            }
            if (isNaN(bmargin)) {
              bmargin = 1.0;
              jQuery('#document_writer_margins_bottom').val('1.0');
            }

            jQuery('td.left_margin').css('width', lmargin * 100 + 'px');
            jQuery('td.right_margin').css('width', rmargin * 100 + 'px');
            jQuery('td.center').css({
              'width': (850 - ((lmargin + rmargin) * 100)) + 'px',
              'padding-top': (tmargin * 100) + 'px',
              'padding-bottom': (bmargin * 100) + 'px'
            });

            scrollThreshold = (100 * bmargin) + 200;

            fieldsDirty = true;

            if (editor != null) {
              editor.resize('100%', jQuery('span#cke_editor_div').height());
            }

            jQuery(this).dialog('close');
          }
        }
      ]
    });

    jQuery('#line_spacing_dialog').dialog({
      autoOpen: false,
      title: "Line Spacing",
      modal: true,
      resize: false,
      width: 300,
      open: function () {
        original_values['line_spacing'] = jQuery('#document_writer_line_spacing').val();
        jQuery('span#line_spacing_custom').hide();
        jQuery('input#line_spacing_custom').val('');

        if (original_values['line_spacing'] == '1') {
          jQuery('#line_spacing_1').attr('checked', true);
        }
        else if (original_values['line_spacing'] == '2') {
          jQuery('#line_spacing_2').attr('checked', true);
        }
        else  {
          jQuery('#line_spacing_custom_radio').attr('checked', true);
          jQuery('span#line_spacing_custom').show();
          jQuery('input#line_spacing_custom').val(original_values['line_spacing']);
        }
      },
      buttons: [
        {
          text: "Cancel",
          click: function() {
            jQuery('#document_writer_line_spacing').val(original_values['line_spacing']);
            jQuery(this).dialog('close');
          }
        },
        {
          text: "OK",
          click: function() {
            fieldsDirty = true;

            var spacing = '1';
            if (jQuery('#line_spacing_1').is(':checked')) {
              spacing = '1'
            }
            else if (jQuery('#line_spacing_2').is(':checked')) {
              spacing = '2'
            }
            else {
              spacing = parseFloat(jQuery('input#line_spacing_custom').val());
              if (isNaN(spacing)) {
                spacing = '1';
              }
            }
            jQuery('#document_writer_line_spacing').val(spacing);

            editorIframe.contents().find("body.mycase_writer p").css("line-height", spacing);
            editorIframe.contents().find("body.mycase_writer li").css("line-height", spacing);
            check_height();
            jQuery(this).dialog('close');
          }
        }
      ]
    });

    jQuery('input.line_spacing_radio').change(function() {
      if (jQuery('input#line_spacing_custom_radio').is(':checked')) {
        jQuery('span#line_spacing_custom').show();
      }
      else {
        jQuery('span#line_spacing_custom').hide();
      }
    });

    jQuery('#choose_save_type').dialog({
      autoOpen: false,
      title: "Save Draft As",
      modal: true,
      resize: false,
      width: 500,
      buttons: [
        {
          text: "Cancel",
          click: function() {
            jQuery(this).dialog('close');
          }
        },
        {
          text: "Save as Document",
          click: function() {
            fieldsDirty = true;
            jQuery(this).dialog('close');
            
            
            

          }
        },
        {
          text: "Save as Template",
          click: function() {
            fieldsDirty = true;
            jQuery(this).dialog('close');
            writer_autosave(save_as_template);
          }
        }
      ]
    });

  });
//]]>
</script>



  <script type="text/javascript" charset="utf-8">
  //<![CDATA[
    var editor = null;
    var original_values = {};
    var fieldsDirty = false;
    var unsavedDraft = true;
    var skipCloseUnload = false;
    var closeInProgress = false;
    var editorIframe = null;
    var oldHeight = 0;
    var heightPerPage = ((1100.0) - 200.0) * 1.0;

    function set_height() {
      div_height = jQuery(window).height();
      if (jQuery('#merge_bar').is(':visible')) {
        div_height = div_height - jQuery('#merge_bar').height();;
      }

      div_height -= jQuery('#toolbar_div').height();
      div_height -= jQuery('#top_menus').height();

//      jQuery('#editor_wrapper').height(div_height);
      try {
        jQuery('#gutter').css('height', (div_height - 21) + 'px');

        // if (editor != null) {
        //   //editor.resize('100%', ((11.0 - tmargin - bmargin) * 100));
        // }
      }
      catch(err) {
      }
    }

//    function writer_autosave(callback_fn) {
//      if (editor.checkDirty() || fieldsDirty) {
//        editor.resetDirty();
//        fieldsDirty = false;
//        unsavedDraft = true;
//        skipCloseUnload = false;
//        jQuery('#autosave_text').html('Saving...');
//        jQuery('#document_writer_html').val(editor.getData());
//        jQuery.post('https://rs-software4.mycase.com/documents/autosave', jQuery('.writer').serialize(), function(data) {
//          jQuery('#autosave_text').html(data);
//          if (callback_fn != undefined) {
//            callback_fn();
//          }
//        });
//        if (check_for_merge_fields()) {
//          jQuery('#menu_save_as_document').hide();
//        }
//        else {
//          jQuery('#menu_save_as_document').show();
//        }
//      }
//    }

    function close_writer() {
      MyCase.LoadingSpinner.show("Closing");
      closeInProgress = true;

      jQuery.ajax(
        'https://rs-software4.mycase.com/documents/writer_close',
        { 'type': 'DELETE',
          'data': {
            'id': jQuery('#document_id').val()
          }
        }
      ).done(function() {
        if (window.opener) {
          try {
            window.opener.refresh_page();
          }
          catch (err) {
            // Ignore it
          }
          try {
            window.opener.setEditingStatus(false);
          }
          catch (err) {
            // Ignore it
          }
        }

        window.close();
      });
    }

//    function lock_document() {
//      jQuery.post('https://rs-software4.mycase.com/documents/writer_lock', {'_method': 'PUT', 'id': jQuery('#document_id').val()})
//        .fail(function(data){ 
//          if (data.hasOwnProperty('error')) {
//            showErrorDialog(data.error);
//          } else {
//            showErrorDialog('Something went wrong. Please try again later.');
//          }
//        });
//
//      // Prevent the auto logout in the parent window
//      try {
//        window.opener.setEditingStatus(true);
//      }
//      catch (err) {
//        // Ignore it
//      }
//    }

    function check_height() {
      if (editorIframe == null) {
        editorIframe = jQuery('div#editor_wrapper iframe');
      }

      if (editorIframe) {
        var newHeight = editorIframe.contents().find("html").height();
        if (newHeight != oldHeight) {
          oldHeight = newHeight;

          var pages = Math.ceil(newHeight / heightPerPage);

          editor.resize('100%', (pages * heightPerPage));
        }
      }
    }

    // Looks at the approrpriate way to save this document and does that, prompting
    // with a dialog if necessary
    function mycase_save(do_close) {
        if (check_for_merge_fields()) {
          fieldsDirty = true;
          writer_autosave(save_as_template);
        }
        else {
          jQuery('#choose_save_type').dialog('open');
        }
    }


    jQuery(function() {
      window.onbeforeunload = function() {
        if (!skipCloseUnload && !closeInProgress) {
          skipCloseUnload = false;
          if (editor.checkDirty() || fieldsDirty || unsavedDraft) {
            return 'You have unsaved changes to this document.'
          }
        }
      }

      MyCase.CKEDITOR.Helper.initialize().then(function (setupData) {
        editor = CKEDITOR.replace( 'editor_div', {
          customConfig : setupData.configUrls.documents,
        });

        editor.on('instanceReady', function() {
          set_height();
          check_height();
          editor.focus();

        });
        jQuery(window).resize(set_height);

        jQuery('#document_name').autoResize({extraSpace: 30, maxWidth: 1024});
        jQuery('#document_name').change(function() {
          fieldsDirty = true;
        });
        jQuery('#document_name').focus(function() {
          if (this.value == 'Untitled Document') {
            this.select();
          }
        });
        jQuery('#document_name').mouseup(function(e) { e.preventDefault(); });

       // window.setInterval(writer_autosave, 30000);

        window.setInterval(check_height, 5000);

       // window.setTimeout(lock_document, 2000);
      //  window.setInterval(lock_document, 15000);

        if (window.opener) {
          try {
            window.opener.writer_open_callback();
          }
          catch (err) {
            // Ignore it
          }
        }
      });
    });
  //]]>
  </script>


  </div>


  <div id='flash_container' style='display: none;'>
    <div id='flash_message' style='display: none;'>
      <div id='flash_content'></div>
    </div>
  </div>


  

  <!-- confirmation dialog -->

<div id='mycase_confirmation_dialog' style='display: none;'>
  <p id='mycase_confirmation_dialog_message' style='color: black;'><br><br>
    <form id='mycase_confirmation_dialog_form' style='display: none;'><input id='mycase_confirmation_dialog_checkbox' type="checkbox" value="true">
      <span id='mycase_confirmation_dialog_checkbox_label'></span><br>
    </form>
  </p>
</div>

<div id='mycase_error_dialog' style='display: none;'>
  <p id='mycase_error_dialog_message' style='color: black;'>
  </p>
</div>

<div id='mycase_message_dialog' style='display: none;'>
  <p id='mycase_message_dialog_message' style='color: black;'>
  </p>
</div>



  <div id='quickadd_shadow' style='display: none;'>
  </div>

  <div id='gear_menu'  style='top: -5000px; left: -5000px;'>
    
  </div>

  <div id='page_loading' class='visuallyhidden'>
    <!-- nothing here for now -->
  </div>

  <!-- JavaScript at the bottom for fast page loading -->

  <!-- end scripts -->

    <div class="ckeditor-setup-data" data-setup="{&quot;plugin_urls&quot;:{&quot;mycasesave&quot;:&quot;https://assets.mycase.com/assets/ckeditor_plugins/mycasesave/plugin-82255c49dc9069459a9cbeca3717ba104774976dc5a60d8e5859e6bc52093843.js&quot;,&quot;pdfprint&quot;:&quot;https://assets.mycase.com/assets/ckeditor_plugins/pdfprint/plugin-40ec179b8c96a8291688eb0dd32f9f61dd2df37f5cb0bf8161669ebf32983ca7.js&quot;,&quot;sharedspace&quot;:&quot;https://assets.mycase.com/assets/ckeditor_plugins/sharedspace/plugin-2f6756a491643cfaf8fd65a3f24a545c57eab8ea5b98c5620a82f045955a75c0.js&quot;,&quot;blockimagepaste&quot;:&quot;https://assets.mycase.com/assets/ckeditor_plugins/blockimagepaste/plugin-290774ea0631ddd0914931f3dded957211c0f854540edffec5e6a34179028034.js&quot;},&quot;config_urls&quot;:{&quot;messages_comments_notes&quot;:&quot;https://assets.mycase.com/assets/ckeditor_config/messages_comments_notes_config-f5e1952831d8c11d723c9381452d0707438623e44b574d615ee62cb1b2bff7a8.js&quot;,&quot;documents&quot;:&quot;https://assets.mycase.com/assets/ckeditor_config/documents_config-5747385db08b889444aaa824a0113f46ada000d3e97c0379269730666a551bee.js&quot;},&quot;plugin_images&quot;:{&quot;mycasesave&quot;:{&quot;save&quot;:&quot;https://assets.mycase.com/assets/ckeditor_plugins/mycasesave/save-af6048f5d4a0e1f6d1b5ede082e3df409658c89eaf2830295c2c2c7ccb5fa070.png&quot;},&quot;pdfprint&quot;:{&quot;print&quot;:&quot;https://assets.mycase.com/assets/ckeditor_plugins/pdfprint/print-f2373c2ca063f71b5201054ea820a1a98aa82cc6678ff0f937f11d2c277f1713.png&quot;}},&quot;contents_css_urls&quot;:{&quot;documents&quot;:&quot;https://assets.mycase.com/assets/ckeditor/documents-8e770c713ce203d46fa22f4c14c75a9d5bbd42baf4917532bcc4b61422fa599b.css&quot;}}">
</div>

  <script src="https://assets.mycase.com/assets/common_bottom_window_libraries-e2596a91c6b8223b16de32b54be74c64c3dc28943669ab051c581dff1b3e758b.js"></script>
  <script src="https://assets.mycase.com/assets/documents/writer-e9aa1e59c11a6c7b413b5e5a579343bafe90bbecd257ca2290f5439259396364.js"></script>

    <!-- Google Analytics include -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-11505406-2', 'auto');
    ga('set', 'dimension1',
      'firm user'
    );
  ga('send', 'pageview');
</script>
<!-- End Google Analytics -->



  <script type='text/javascript'>
    window.optimizely = window.optimizely || [];

      window.optimizely_data = {}
      window.optimizely.push(["setUserId", "c73f1dbd862d9129bd3d73abb3fd39fe"]);
  </script>

  <script async src="//cdn.optimizely.com/js/2652930014.js"></script>


  <!-- Pendo analytics include -->
<script>
  (function(p,e,n,d,o){var v,w,x,y,z;o=p[d]=p[d]||{};o._q=[];
  v=['initialize','identify','updateOptions','pageLoad'];for(w=0,x=v.length;w<x;++w)(function(m){
  o[m]=o[m]||function(){o._q[m===v[0]?'unshift':'push']([m].concat([].slice.call(arguments,0)));};})(v[w]);
  y=e.createElement(n);y.async=!0;
  y.src='https://cdn.pendo.io/agent/static/5010aef9-55b2-4b47-66ee-2557af3ca866/pendo.js';
  z=e.getElementsByTagName(n)[0];z.parentNode.insertBefore(y,z);})(window,document,'script','pendo');

  pendo.initialize({
    apiKey: '5010aef9-55b2-4b47-66ee-2557af3ca866',
    visitor: {
        id: '7288208',
        role: 'Attorney',
    },
    account: {
        id: '86930',
        name: 'rs-software4',
        creationDate: '1495616920',
        converted: 'false',
    }
  });
</script>

<div id="top2">
		<!-- This div will handle all toolbars. -->
	</div>
	<div id="inline1" contenteditable="true">
<!--		<h1><img alt="Saturn V carrying Apollo 11" style="float:right;margin:10px" src="http://sdk.ckeditor.com/samples/assets/sample.jpg"> Apollo 11</h1>

		<p><strong>Apollo 11</strong> was the spaceflight that landed the first humans, Americans <a href="http://en.wikipedia.org/wiki/Neil_Armstrong">Neil Armstrong</a> and
			<a href="http://en.wikipedia.org/wiki/Buzz_Aldrin">Buzz Aldrin</a>, on the Moon on July 20, 1969, at 20:18 UTC. Armstrong became the first to step onto the lunar surface 6 hours later on July 21 at 02:56 UTC.</p>-->

		
	</div>
	<div id="bottom2">
		
	</div>

	<script>
		// Turn off automatic editor creation first.
		CKEDITOR.disableAutoInline = true;

		CKEDITOR.inline( 'inline1', {
		
			extraPlugins: 'sharedspace,sourcedialog',
			removePlugins: 'floatingspace,maximize,resize',
			sharedSpaces: {
				top: 'top2',
				bottom: 'bottom2'
			}
		} );
              
	</script>
        <script>
            function print_preview() {
    fieldsDirty = true;
    hide_active_menu();
    previewWindow = window.open('https://rs-software4.mycase.com/documents/pending_writer');

    writer_autosave(function() {
      var url = '/documents/34061168/view.pdf';
      previewWindow.location.href = url;
    });
  }

  function export_pdf() {
    fieldsDirty = true;
    hide_active_menu();
    MyCase.LoadingSpinner.show('Building PDF');
    writer_autosave(function() {
      MyCase.LoadingSpinner.hide();
      var url = '/documents/34061168/download.pdf/';
      jQuery("div#download_container").html('<iframe width="0" height="0" frameborder="0" src="' + url + '"></iframe>');
    });
  }


        </script>
       
</body>
</html>



