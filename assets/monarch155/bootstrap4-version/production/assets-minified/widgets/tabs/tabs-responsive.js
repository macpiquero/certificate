!function(a){var b=function(){var b,c=[],d=!1,e=function(a){clearTimeout(b),b=setTimeout(f,100)},f=function(){for(var a=0,b=c.length;a<b;a++)c[a].apply()};return{register:function(b){c.push(b),d===!1&&(a(window).bind("resize",e),d=!0)},unregister:function(a){for(var b=0,d=c.length;b<d;b++)if(c[b]==a){delete c[b];break}}}}(),c=function(c,d){this.element=a(c),this.dropdown=a('<li class="dropdown hide pull-right tabdrop"><a class="dropdown-toggle" data-toggle="dropdown" href="#">'+d.text+' <b class="caret"></b></a><ul class="dropdown-menu"></ul></li>').prependTo(this.element),this.element.parent().is(".tabs-below")&&this.dropdown.addClass("dropup"),b.register(a.proxy(this.layout,this)),this.layout()};c.prototype={constructor:c,layout:function(){var b=[];this.dropdown.removeClass("hide"),this.element.append(this.dropdown.find("li")).find(">li").not(".tabdrop").each(function(){this.offsetTop>0&&b.push(this)}),b.length>0?(b=a(b),this.dropdown.find("ul").empty().append(b),1==this.dropdown.find(".active").length?this.dropdown.addClass("active"):this.dropdown.removeClass("active")):this.dropdown.addClass("hide")}},a.fn.tabdrop=function(b){return this.each(function(){var d=a(this),e=d.data("tabdrop"),f="object"==typeof b&&b;e||d.data("tabdrop",e=new c(this,a.extend({},a.fn.tabdrop.defaults,f))),"string"==typeof b&&e[b]()})},a.fn.tabdrop.defaults={text:'<i class="glyph-icon icon-align-justify"></i>'},a.fn.tabdrop.Constructor=c}(window.jQuery);