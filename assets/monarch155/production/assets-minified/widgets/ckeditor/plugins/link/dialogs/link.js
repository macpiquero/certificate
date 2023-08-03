!function(){CKEDITOR.dialog.add("link",function(a){var b,c=CKEDITOR.plugins.link,d=function(){var b=this.getDialog(),c=b.getContentElement("target","popupFeatures"),b=b.getContentElement("target","linkTargetName"),d=this.getValue();if(c&&b)switch(c=c.getElement(),c.hide(),b.setValue(""),d){case"frame":b.setLabel(a.lang.link.targetFrameName),b.getElement().show();break;case"popup":c.show(),b.setLabel(a.lang.link.targetPopupName),b.getElement().show();break;default:b.setValue(d),b.getElement().hide()}},e=function(a){a.target&&this.setValue(a.target[this.id]||"")},f=function(a){a.advanced&&this.setValue(a.advanced[this.id]||"")},g=function(a){a.target||(a.target={}),a.target[this.id]=this.getValue()||""},h=function(a){a.advanced||(a.advanced={}),a.advanced[this.id]=this.getValue()||""},i=a.lang.common,j=a.lang.link;return{title:j.title,minWidth:350,minHeight:230,contents:[{id:"info",label:j.info,title:j.info,elements:[{id:"linkType",type:"select",label:j.type,default:"url",items:[[j.toUrl,"url"],[j.toAnchor,"anchor"],[j.toEmail,"email"]],onChange:function(){var b=this.getDialog(),c=["urlOptions","anchorOptions","emailOptions"],d=this.getValue(),e=b.definition.getContents("upload"),e=e&&e.hidden;for("url"==d?(a.config.linkShowTargetTab&&b.showPage("target"),e||b.showPage("upload")):(b.hidePage("target"),e||b.hidePage("upload")),e=0;e<c.length;e++){var f=b.getContentElement("info",c[e]);f&&(f=f.getElement().getParent().getParent(),c[e]==d+"Options"?f.show():f.hide())}b.layout()},setup:function(a){this.setValue(a.type||"url")},commit:function(a){a.type=this.getValue()}},{type:"vbox",id:"urlOptions",children:[{type:"hbox",widths:["25%","75%"],children:[{id:"protocol",type:"select",label:i.protocol,default:"http://",items:[["http://‎","http://"],["https://‎","https://"],["ftp://‎","ftp://"],["news://‎","news://"],[j.other,""]],setup:function(a){a.url&&this.setValue(a.url.protocol||"")},commit:function(a){a.url||(a.url={}),a.url.protocol=this.getValue()}},{type:"text",id:"url",label:i.url,required:!0,onLoad:function(){this.allowOnChange=!0},onKeyUp:function(){this.allowOnChange=!1;var a=this.getDialog().getContentElement("info","protocol"),b=this.getValue(),c=/^((javascript:)|[#\/\.\?])/i,d=/^(http|https|ftp|news):\/\/(?=.)/i.exec(b);d?(this.setValue(b.substr(d[0].length)),a.setValue(d[0].toLowerCase())):c.test(b)&&a.setValue(""),this.allowOnChange=!0},onChange:function(){this.allowOnChange&&this.onKeyUp()},validate:function(){var b=this.getDialog();return!(!b.getContentElement("info","linkType")||"url"==b.getValueOf("info","linkType"))||(!a.config.linkJavaScriptLinksAllowed&&/javascript\:/.test(this.getValue())?(alert(i.invalidValue),!1):!!this.getDialog().fakeObj||CKEDITOR.dialog.validate.notEmpty(j.noUrl).apply(this))},setup:function(a){this.allowOnChange=!1,a.url&&this.setValue(a.url.url),this.allowOnChange=!0},commit:function(a){this.onChange(),a.url||(a.url={}),a.url.url=this.getValue(),this.allowOnChange=!1}}],setup:function(){this.getDialog().getContentElement("info","linkType")||this.getElement().show()}},{type:"button",id:"browse",hidden:"true",filebrowser:"info:url",label:i.browseServer}]},{type:"vbox",id:"anchorOptions",width:260,align:"center",padding:0,children:[{type:"fieldset",id:"selectAnchorText",label:j.selectAnchor,setup:function(){b=c.getEditorAnchors(a),this.getElement()[b&&b.length?"show":"hide"]()},children:[{type:"hbox",id:"selectAnchor",children:[{type:"select",id:"anchorName",default:"",label:j.anchorName,style:"width: 100%;",items:[[""]],setup:function(a){if(this.clear(),this.add(""),b)for(var c=0;c<b.length;c++)b[c].name&&this.add(b[c].name);a.anchor&&this.setValue(a.anchor.name),(a=this.getDialog().getContentElement("info","linkType"))&&"email"==a.getValue()&&this.focus()},commit:function(a){a.anchor||(a.anchor={}),a.anchor.name=this.getValue()}},{type:"select",id:"anchorId",default:"",label:j.anchorId,style:"width: 100%;",items:[[""]],setup:function(a){if(this.clear(),this.add(""),b)for(var c=0;c<b.length;c++)b[c].id&&this.add(b[c].id);a.anchor&&this.setValue(a.anchor.id)},commit:function(a){a.anchor||(a.anchor={}),a.anchor.id=this.getValue()}}],setup:function(){this.getElement()[b&&b.length?"show":"hide"]()}}]},{type:"html",id:"noAnchors",style:"text-align: center;",html:'<div role="note" tabIndex="-1">'+CKEDITOR.tools.htmlEncode(j.noAnchors)+"</div>",focus:!0,setup:function(){this.getElement()[b&&b.length?"hide":"show"]()}}],setup:function(){this.getDialog().getContentElement("info","linkType")||this.getElement().hide()}},{type:"vbox",id:"emailOptions",padding:1,children:[{type:"text",id:"emailAddress",label:j.emailAddress,required:!0,validate:function(){var a=this.getDialog();return!a.getContentElement("info","linkType")||"email"!=a.getValueOf("info","linkType")||CKEDITOR.dialog.validate.notEmpty(j.noEmail).apply(this)},setup:function(a){a.email&&this.setValue(a.email.address),(a=this.getDialog().getContentElement("info","linkType"))&&"email"==a.getValue()&&this.select()},commit:function(a){a.email||(a.email={}),a.email.address=this.getValue()}},{type:"text",id:"emailSubject",label:j.emailSubject,setup:function(a){a.email&&this.setValue(a.email.subject)},commit:function(a){a.email||(a.email={}),a.email.subject=this.getValue()}},{type:"textarea",id:"emailBody",label:j.emailBody,rows:3,default:"",setup:function(a){a.email&&this.setValue(a.email.body)},commit:function(a){a.email||(a.email={}),a.email.body=this.getValue()}}],setup:function(){this.getDialog().getContentElement("info","linkType")||this.getElement().hide()}}]},{id:"target",requiredContent:"a[target]",label:j.target,title:j.target,elements:[{type:"hbox",widths:["50%","50%"],children:[{type:"select",id:"linkTargetType",label:i.target,default:"notSet",style:"width : 100%;",items:[[i.notSet,"notSet"],[j.targetFrame,"frame"],[j.targetPopup,"popup"],[i.targetNew,"_blank"],[i.targetTop,"_top"],[i.targetSelf,"_self"],[i.targetParent,"_parent"]],onChange:d,setup:function(a){a.target&&this.setValue(a.target.type||"notSet"),d.call(this)},commit:function(a){a.target||(a.target={}),a.target.type=this.getValue()}},{type:"text",id:"linkTargetName",label:j.targetFrameName,default:"",setup:function(a){a.target&&this.setValue(a.target.name)},commit:function(a){a.target||(a.target={}),a.target.name=this.getValue().replace(/\W/gi,"")}}]},{type:"vbox",width:"100%",align:"center",padding:2,id:"popupFeatures",children:[{type:"fieldset",label:j.popupFeatures,children:[{type:"hbox",children:[{type:"checkbox",id:"resizable",label:j.popupResizable,setup:e,commit:g},{type:"checkbox",id:"status",label:j.popupStatusBar,setup:e,commit:g}]},{type:"hbox",children:[{type:"checkbox",id:"location",label:j.popupLocationBar,setup:e,commit:g},{type:"checkbox",id:"toolbar",label:j.popupToolbar,setup:e,commit:g}]},{type:"hbox",children:[{type:"checkbox",id:"menubar",label:j.popupMenuBar,setup:e,commit:g},{type:"checkbox",id:"fullscreen",label:j.popupFullScreen,setup:e,commit:g}]},{type:"hbox",children:[{type:"checkbox",id:"scrollbars",label:j.popupScrollBars,setup:e,commit:g},{type:"checkbox",id:"dependent",label:j.popupDependent,setup:e,commit:g}]},{type:"hbox",children:[{type:"text",widths:["50%","50%"],labelLayout:"horizontal",label:i.width,id:"width",setup:e,commit:g},{type:"text",labelLayout:"horizontal",widths:["50%","50%"],label:j.popupLeft,id:"left",setup:e,commit:g}]},{type:"hbox",children:[{type:"text",labelLayout:"horizontal",widths:["50%","50%"],label:i.height,id:"height",setup:e,commit:g},{type:"text",labelLayout:"horizontal",label:j.popupTop,widths:["50%","50%"],id:"top",setup:e,commit:g}]}]}]}]},{id:"upload",label:j.upload,title:j.upload,hidden:!0,filebrowser:"uploadButton",elements:[{type:"file",id:"upload",label:i.upload,style:"height:40px",size:29},{type:"fileButton",id:"uploadButton",label:i.uploadSubmit,filebrowser:"info:url",for:["upload","upload"]}]},{id:"advanced",label:j.advanced,title:j.advanced,elements:[{type:"vbox",padding:1,children:[{type:"hbox",widths:["45%","35%","20%"],children:[{type:"text",id:"advId",requiredContent:"a[id]",label:j.id,setup:f,commit:h},{type:"select",id:"advLangDir",requiredContent:"a[dir]",label:j.langDir,default:"",style:"width:110px",items:[[i.notSet,""],[j.langDirLTR,"ltr"],[j.langDirRTL,"rtl"]],setup:f,commit:h},{type:"text",id:"advAccessKey",requiredContent:"a[accesskey]",width:"80px",label:j.acccessKey,maxLength:1,setup:f,commit:h}]},{type:"hbox",widths:["45%","35%","20%"],children:[{type:"text",label:j.name,id:"advName",requiredContent:"a[name]",setup:f,commit:h},{type:"text",label:j.langCode,id:"advLangCode",requiredContent:"a[lang]",width:"110px",default:"",setup:f,commit:h},{type:"text",label:j.tabIndex,id:"advTabIndex",requiredContent:"a[tabindex]",width:"80px",maxLength:5,setup:f,commit:h}]}]},{type:"vbox",padding:1,children:[{type:"hbox",widths:["45%","55%"],children:[{type:"text",label:j.advisoryTitle,requiredContent:"a[title]",default:"",id:"advTitle",setup:f,commit:h},{type:"text",label:j.advisoryContentType,requiredContent:"a[type]",default:"",id:"advContentType",setup:f,commit:h}]},{type:"hbox",widths:["45%","55%"],children:[{type:"text",label:j.cssClasses,requiredContent:"a(cke-xyz)",default:"",id:"advCSSClasses",setup:f,commit:h},{type:"text",label:j.charset,requiredContent:"a[charset]",default:"",id:"advCharset",setup:f,commit:h}]},{type:"hbox",widths:["45%","55%"],children:[{type:"text",label:j.rel,requiredContent:"a[rel]",default:"",id:"advRel",setup:f,commit:h},{type:"text",label:j.styles,requiredContent:"a{cke-xyz}",default:"",id:"advStyles",validate:CKEDITOR.dialog.validate.inlineStyle(a.lang.common.invalidInlineStyle),setup:f,commit:h}]}]}]}],onShow:function(){var a=this.getParentEditor(),b=a.getSelection(),d=null;(d=c.getSelectedLink(a))&&d.hasAttribute("href")?b.getSelectedElement()||b.selectElement(d):d=null,a=c.parseLinkAttributes(a,d),this._.selectedElement=d,this.setupContent(a)},onOk:function(){var b={};this.commitContent(b);var d=a.getSelection(),e=c.getLinkAttributes(a,b);if(this._.selectedElement){var f=this._.selectedElement,g=f.data("cke-saved-href"),h=f.getHtml();f.setAttributes(e.set),f.removeAttributes(e.removed),(g==h||"email"==b.type&&-1!=h.indexOf("@"))&&(f.setHtml("email"==b.type?b.email.address:e.set["data-cke-saved-href"]),d.selectElement(f)),delete this._.selectedElement}else d=d.getRanges()[0],d.collapsed&&(b=new CKEDITOR.dom.text("email"==b.type?b.email.address:e.set["data-cke-saved-href"],a.document),d.insertNode(b),d.selectNodeContents(b)),e=new CKEDITOR.style({element:"a",attributes:e.set}),e.type=CKEDITOR.STYLE_INLINE,e.applyToRange(d,a),d.select()},onLoad:function(){a.config.linkShowAdvancedTab||this.hidePage("advanced"),a.config.linkShowTargetTab||this.hidePage("target")},onFocus:function(){var a=this.getContentElement("info","linkType");a&&"url"==a.getValue()&&(a=this.getContentElement("info","url"),a.select())}}})}();