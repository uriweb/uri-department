function onYouTubePlayerAPIReady(){uriCreateYouTubePlayers()}!function(){"use strict";function e(){t(),n()}function t(){document.querySelectorAll(".cl-hero .dynamic").forEach(function(e){var t=e.getAttribute("data-zoom"),n=t||1.25;e.style.width=100*n+"%",e.style.top=100*(1-n)/4+"%",e.style.left=100*(1-n)/8+"%"})}function n(){function e(){var e=window.pageYOffset,t=n.offsetHeight+o,a=Math.min(e/t*i,i);n.style.webkitBackdropFilter="blur("+a+"px)"}var t=document.getElementById("hero");if(t){var n=t.querySelector(".overlay"),a=window.pageYOffset,o=n.getBoundingClientRect().top+a,i=50;console.log("overlay",n),e(),window.addEventListener("scroll",function(){e()})}}window.addEventListener("load",e,!1)}(),function(){"use strict";function e(){document.querySelectorAll(".cl-menu ul").forEach(function(e){e.style.display="none"}),document.querySelectorAll(".cl-menu span").forEach(function(e){e.addEventListener("click",function(){var e=this.parentNode.querySelector("ul"),t=this.querySelector(".arrow");e.style.display="none"===e.style.display?"block":"none",t.classList.contains("on")?t.classList.remove("on"):t.classList.add("on")});var t=document.createElement("div");t.className="arrow",e.appendChild(t)})}window.addEventListener("load",e,!1)}(),function(){"use strict";function e(){var e,n;e=document.querySelectorAll(".cl-wave"),n=window.pageYOffset,window.addEventListener("scroll",function(){t(e,n)})}function t(e,t){var n,a,o;n=window.pageYOffset,a=n-t,e.forEach(function(e){o=e.firstElementChild.style.backgroundPositionX.split("px")[0],o+=a,e.firstElementChild.style.backgroundPositionX=a+"px",e.lastElementChild.style.backgroundPositionX=a+"px"})}window.addEventListener("load",e,!1)}();var uriCreateYouTubePlayers;!function(){"use strict";function e(){document.querySelectorAll(".cl-hero .poster").forEach(function(e){var t=e.getAttribute("id"),n=e.parentNode,a=e.getAttribute("data-start"),o=e.getAttribute("data-end");u[t]={poster:e,parent:n,w:n.offsetWidth,h:n.offsetHeight,start:a||0,end:o||-1},e.removeAttribute("id");var i=document.createElement("div");i.id=t,n.appendChild(i),c=!0}),document.querySelectorAll(".cl-video img").forEach(function(e){var t=16/9;e.getAttribute("data-aspect")&&(t=e.getAttribute("data-aspect").split(":"),t=t[0]/t[1]);var n=e.getAttribute("id"),a=e.parentNode;f[n]={poster:e,parent:a,aspect:t},c=!0}),c&&t()}function t(){var e=document.createElement("script");e.src="https://www.youtube.com/player_api";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)}function n(e,t){var n=t.offsetWidth,a=t.offsetHeight;n/a>16/9?(e.style.height=9*n/16+"px",e.style.width="100%",e.style.left=0,e.style.top=(a-9*n/16)/2+"px",e.style.marginLeft=0):(n=16*a/9,e.style.height="100%",e.style.width=n+"px",e.style.left=0-n/2+"px",e.style.top=0,e.style.marginLeft="50%")}function a(e,t,n){t.style.height=n.offsetWidth/f[e].aspect+"px"}function o(e,t){var n=window.innerHeight,a=window.pageYOffset,o=t.offsetHeight,i=t.getBoundingClientRect().top+a;n+a<i||a>i+o?e.target.pauseVideo():e.target.playVideo()}function i(e){e.target.mute();var t=e.target.getIframe(),a=u[e.target.a.id].parent;window.addEventListener("resize",function(){n(t,a)}),n(t,a),window.addEventListener("scroll",function(){a.classList.contains("paused")||o(e,a)}),o(e,a);var i=a.querySelector(".overlay"),r=document.createElement("div");r.className="motionswitch",r.title="Pause",r.addEventListener("click",function(){s(e,a,this)}),i.appendChild(r)}function r(e){var t=e.target.getIframe(),n=e.target.a.id,o=f[n].parent;window.addEventListener("resize",function(){a(n,t,o)}),a(n,t,o)}function s(e,t,n){switch(e.target.getPlayerState()){default:case 1:e.target.pauseVideo(),t.classList.add("paused"),n.setAttribute("title","Play");break;case 2:e.target.playVideo(),t.classList.remove("paused"),n.setAttribute("title","Pause")}}function l(e){switch(e.target.getPlayerState()){case 0:e.target.playVideo();break;case-1:case 1:u[e.target.a.id].poster.style.display="none"}}function d(e){u[e.target.a.id].poster.style.display="block",u[e.target.a.id].parent.querySelector(".motionswitch").style.display="none"}var c,u={},f={};window.addEventListener("load",e,!1),uriCreateYouTubePlayers=function(){var e;for(e in u)u[e].player=new YT.Player(e,{width:e.w,height:e.h,videoId:e,playerVars:{autoplay:1,controls:0,showinfo:0,start:e.start,end:e.end,modestbranding:1,iv_load_policy:3,rel:0},events:{onReady:i,onStateChange:l,onError:d}});for(e in f)f[e].player=new YT.Player(e,{videoId:e,playerVars:{autoplay:0,controls:1,showinfo:0,color:"white",modestbranding:1,iv_load_policy:3},events:{onReady:r}})}}();