CKEDITOR.dialog.add("a11yHelp",function(a){var b=a.lang.a11yhelp,c=CKEDITOR.tools.getNextId(),d={8:b.backspace,9:b.tab,13:b.enter,16:b.shift,17:b.ctrl,18:b.alt,19:b.pause,20:b.capslock,27:b.escape,33:b.pageUp,34:b.pageDown,35:b.end,36:b.home,37:b.leftArrow,38:b.upArrow,39:b.rightArrow,40:b.downArrow,45:b.insert,46:b.delete,91:b.leftWindowKey,92:b.rightWindowKey,93:b.selectKey,96:b.numpad0,97:b.numpad1,98:b.numpad2,99:b.numpad3,100:b.numpad4,101:b.numpad5,102:b.numpad6,103:b.numpad7,104:b.numpad8,105:b.numpad9,106:b.multiply,107:b.add,109:b.subtract,110:b.decimalPoint,111:b.divide,112:b.f1,113:b.f2,114:b.f3,115:b.f4,116:b.f5,117:b.f6,118:b.f7,119:b.f8,120:b.f9,121:b.f10,122:b.f11,123:b.f12,144:b.numLock,145:b.scrollLock,186:b.semiColon,187:b.equalSign,188:b.comma,189:b.dash,190:b.period,191:b.forwardSlash,192:b.graveAccent,219:b.openBracket,220:b.backSlash,221:b.closeBracket,222:b.singleQuote};d[CKEDITOR.ALT]=b.alt,d[CKEDITOR.SHIFT]=b.shift,d[CKEDITOR.CTRL]=b.ctrl;var e=[CKEDITOR.ALT,CKEDITOR.SHIFT,CKEDITOR.CTRL],f=/\$\{(.*?)\}/g,g=function(){var b,c=a.keystrokeHandler.keystrokes,f={};for(b in c)f[c[b]]=b;return function(a,b){var c;if(f[b]){c=f[b];for(var g,h,i=[],j=0;j<e.length;j++)h=e[j],1<(g=c/e[j])&&2>=g&&(c-=h,i.push(d[h]));i.push(d[c]||String.fromCharCode(c)),c=i.join("+")}else c=a;return c}}();return{title:b.title,minWidth:600,minHeight:400,contents:[{id:"info",label:a.lang.common.generalTab,expand:!0,elements:[{type:"html",id:"legends",style:"white-space:normal;",focus:function(){this.getElement().focus()},html:function(){for(var a='<div class="cke_accessibility_legend" role="document" aria-labelledby="'+c+'_arialbl" tabIndex="-1">%1</div><span id="'+c+'_arialbl" class="cke_voice_label">'+b.contents+" </span>",d=[],e=b.legend,h=e.length,i=0;i<h;i++){for(var j=e[i],k=[],l=j.items,m=l.length,n=0;n<m;n++){var o=l[n],p=o.legend.replace(f,g);p.match(f)||k.push("<dt>%1</dt><dd>%2</dd>".replace("%1",o.name).replace("%2",p))}d.push("<h1>%1</h1><dl>%2</dl>".replace("%1",j.name).replace("%2",k.join("")))}return a.replace("%1",d.join(""))}()+'<style type="text/css">.cke_accessibility_legend{width:600px;height:400px;padding-right:5px;overflow-y:auto;overflow-x:hidden;}.cke_browser_quirks .cke_accessibility_legend,{height:390px}.cke_accessibility_legend *{white-space:normal;}.cke_accessibility_legend h1{font-size: 20px;border-bottom: 1px solid #AAA;margin: 5px 0px 15px;}.cke_accessibility_legend dl{margin-left: 5px;}.cke_accessibility_legend dt{font-size: 13px;font-weight: bold;}.cke_accessibility_legend dd{margin:10px}</style>'}]}],buttons:[CKEDITOR.dialog.cancelButton]}});