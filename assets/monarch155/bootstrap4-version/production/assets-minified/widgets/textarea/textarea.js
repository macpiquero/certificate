!function(a){var b,c={className:"autosizejs",append:"",callback:!1,resizeDelay:10},d='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',e=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],f=a(d).data("autosize",!0)[0];f.style.lineHeight="99px","99px"===a(f).css("lineHeight")&&e.push("lineHeight"),f.style.lineHeight="",a.fn.autosize=function(d){return d=a.extend({},c,d||{}),f.parentNode!==document.body&&a(document.body).append(f),this.each(function(){function c(){var c={};if(b=l,f.className=d.className,i=parseInt(m.css("maxHeight"),10),a.each(e,function(a,b){c[b]=m.css(b)}),a(f).css(c),"oninput"in l){var g=l.style.width;l.style.width="0px",l.offsetWidth,l.style.width=g}}function g(){var e,g,h,k;b!==l&&c(),f.value=l.value+d.append,f.style.overflowY=l.style.overflowY,g=parseInt(l.style.height,10),"getComputedStyle"in window?(k=window.getComputedStyle(l),h=l.getBoundingClientRect().width,a.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(a,b){h-=parseInt(k[b],10)}),f.style.width=h+"px"):f.style.width=Math.max(m.width(),0)+"px",f.scrollTop=0,f.scrollTop=9e4,e=f.scrollTop,i&&e>i?(l.style.overflowY="scroll",e=i):(l.style.overflowY="hidden",j>e&&(e=j)),e+=n,g!==e&&(l.style.height=e+"px",o&&d.callback.call(l,l))}function h(){clearTimeout(k),k=setTimeout(function(){m.width()!==q&&g()},parseInt(d.resizeDelay,10))}var i,j,k,l=this,m=a(l),n=0,o=a.isFunction(d.callback),p={height:l.style.height,overflow:l.style.overflow,overflowY:l.style.overflowY,wordWrap:l.style.wordWrap,resize:l.style.resize},q=m.width();m.data("autosize")||(m.data("autosize",!0),("border-box"===m.css("box-sizing")||"border-box"===m.css("-moz-box-sizing")||"border-box"===m.css("-webkit-box-sizing"))&&(n=m.outerHeight()-m.height()),j=Math.max(parseInt(m.css("minHeight"),10)-n||0,m.height()),m.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===m.css("resize")||"vertical"===m.css("resize")?"none":"horizontal"}),"onpropertychange"in l?"oninput"in l?m.on("input.autosize keyup.autosize",g):m.on("propertychange.autosize",function(){"value"===event.propertyName&&g()}):m.on("input.autosize",g),d.resizeDelay!==!1&&a(window).on("resize.autosize",h),m.on("autosize.resize",g),m.on("autosize.resizeIncludeStyle",function(){b=null,g()}),m.on("autosize.destroy",function(){b=null,clearTimeout(k),a(window).off("resize",h),m.off("autosize").off(".autosize").css(p).removeData("autosize")}),g())})}}(window.jQuery||window.Zepto),$(function(){$(".textarea-counter").keyup(function(){var a=125,b=$(this).val().length;if(b>=a)$(".character-remaining").text(" you have reached the limit");else{var c=a-b;$(".character-remaining").text(c+" characters left")}})});