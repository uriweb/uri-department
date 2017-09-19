function onYouTubePlayerAPIReady(){uriCreateYouTubePlayers()}!function(){"use strict";function e(){t(),n(),i()}function t(){for(var e=document.querySelectorAll(".cl-hero .dynamic"),t=0;t<e.length;t++)e[t].style.backgroundPositionX="100%",e[t].style.backgroundPositionY=0}function n(){function e(){var e=window.pageYOffset,t=n.offsetHeight+r,i=Math.min(e/t*a,a);n.style.webkitBackdropFilter="blur("+i+"px)"}var t=document.getElementById("hero");if(t){var n=t.querySelector(".overlay"),i=window.pageYOffset,r=n.getBoundingClientRect().top+i,a=50;e(),window.addEventListener("scroll",function(){e()})}}function i(){var e=document.querySelectorAll(".cl-hero .poster");window.addEventListener("resize",function(){var t;if(window.innerWidth<750)for(t=0;t<e.length;t++)e[t].classList.remove("unveil");else for(t=0;t<e.length;t++)e[t].classList.add("unveil")})}window.addEventListener("load",e,!1)}(),function(){"use strict";function e(){var e,t=document.querySelectorAll(".cl-menu ul");for(e=0;e<t.length;e++)t[e].style.display="none";var n=document.querySelectorAll(".cl-menu span");for(e=0;e<n.length;e++){var i=n[e];i.addEventListener("click",function(){var e=this.parentNode.querySelector("ul"),t=this.querySelector(".arrow");e.style.display="none"===e.style.display?"block":"none",t.classList.contains("on")?t.classList.remove("on"):t.classList.add("on")});var r=document.createElement("div");r.className="arrow",i.appendChild(r)}}window.addEventListener("load",e,!1)}(),function(){"use strict";function e(){var e,n;e=document.querySelectorAll(".cl-wave"),n=window.pageYOffset,window.addEventListener("scroll",function(){t(e,n)})}function t(e,t){var n,i,r,a,o;for(n=window.pageYOffset,i=n-t,a=0;a<e.length;a++)o=e[a],r=o.firstElementChild.style.backgroundPositionX.split("px")[0],r+=i,o.firstElementChild.style.backgroundPositionX=i+"px",o.lastElementChild.style.backgroundPositionX=i+"px"}window.addEventListener("load",e,!1)}();var uriCreateYouTubePlayers;!function(){"use strict";function e(){var e,i=!1,r=t(),a=document.querySelectorAll(".cl-hero .poster");if(r)for(e=0;e<a.length;e++){var o=a[e],s=o.getAttribute("id"),l=o.parentNode,d=o.getAttribute("data-start"),c=o.getAttribute("data-end");u[s]={poster:o,parent:l,w:l.offsetWidth,h:l.offsetHeight,start:d||0,end:c||-1},o.removeAttribute("id");var p=document.createElement("div");p.id=s,l.appendChild(p),i=!0}var g=document.querySelectorAll(".cl-video img");for(e=0;e<g.length;e++){var o=g[e],s=o.getAttribute("id"),l=o.parentNode,y=16/9;o.getAttribute("data-aspect")&&(y=o.getAttribute("data-aspect").split(":"),y=y[0]/y[1]),f[s]={poster:o,parent:l,aspect:y},i=!0}i&&n()}function t(){var e=!0,t=navigator.userAgent,n=t.indexOf("MSIE "),i=t.indexOf("Trident/");return("Microsoft Internet Explorer"==navigator.appName||n>0||i>0)&&(e=!1),e}function n(){var e=document.createElement("script");e.src="https://www.youtube.com/player_api";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)}function i(e,t){var n=t.offsetWidth,i=t.offsetHeight;n/i>16/9?(e.style.height=9*n/16+"px",e.style.width="100%",e.style.left=0,e.style.top=(i-9*n/16)/2+"px",e.style.marginLeft=0):(n=16*i/9,e.style.height="100%",e.style.width=n+"px",e.style.left=0-n/2+"px",e.style.top=0,e.style.marginLeft="50%")}function r(e,t,n){t.style.height=n.offsetWidth/f[e].aspect+"px"}function a(e,t){var n=window.innerHeight,i=window.pageYOffset,r=t.offsetHeight,a=t.getBoundingClientRect().top+i;n+i<a||i>a+r?e.target.pauseVideo():e.target.playVideo()}function o(e){e.target.mute();var t=e.target.getIframe(),n=u[e.target.a.id].parent;window.addEventListener("resize",function(){i(t,n)}),i(t,n),window.addEventListener("scroll",function(){n.classList.contains("paused")||a(e,n)}),a(e,n);var r=n.querySelector(".overlay"),o=document.createElement("div");o.className="motionswitch",o.title="Pause",o.addEventListener("click",function(){l(e,n,this)}),r.appendChild(o)}function s(e){var t=e.target.getIframe(),n=e.target.a.id,i=f[n].parent;window.addEventListener("resize",function(){r(n,t,i)}),r(n,t,i)}function l(e,t,n){switch(e.target.getPlayerState()){default:case 1:e.target.pauseVideo(),t.classList.add("paused"),n.setAttribute("title","Play");break;case 2:e.target.playVideo(),t.classList.remove("paused"),n.setAttribute("title","Pause")}}function d(e){switch(e.target.getPlayerState()){case 0:e.target.playVideo();break;case-1:case 1:window.innerWidth>750&&u[e.target.a.id].poster.classList.add("unveil")}}function c(e){u[e.target.a.id].poster.classList.remove("unveil"),u[e.target.a.id].parent.querySelector(".motionswitch").style.display="none"}var u={},f={};window.addEventListener("load",e,!1),uriCreateYouTubePlayers=function(){var e;for(e in u)u[e].player=new YT.Player(e,{width:e.w,height:e.h,videoId:e,playerVars:{autoplay:1,controls:0,showinfo:0,start:e.start,end:e.end,modestbranding:1,iv_load_policy:3,rel:0},events:{onReady:o,onStateChange:d,onError:c}});for(e in f)f[e].player=new YT.Player(e,{videoId:e,playerVars:{autoplay:0,controls:1,showinfo:0,color:"white",modestbranding:1,iv_load_policy:3},events:{onReady:s}})}}();