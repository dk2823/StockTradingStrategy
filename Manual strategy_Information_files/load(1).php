var mediaWikiLoadStart=(new Date()).getTime();function isCompatible(ua){if(ua===undefined){ua=navigator.userAgent;}return!((ua.indexOf('MSIE')!==-1&&parseFloat(ua.split('MSIE')[1])<8)||(ua.indexOf('Firefox/')!==-1&&parseFloat(ua.split('Firefox/')[1])<3)||(ua.indexOf('Opera/')!==-1&&(ua.indexOf('Version/')===-1?parseFloat(ua.split('Opera/')[1])<10:parseFloat(ua.split('Version/')[1])<12))||(ua.indexOf('Opera ')!==-1&&parseFloat(ua.split(' Opera ')[1])<10)||ua.match(/BlackBerry[^\/]*\/[1-5]\./)||ua.match(/webOS\/1\.[0-4]/)||ua.match(/PlayStation/i)||ua.match(/SymbianOS|Series60/)||ua.match(/NetFront/)||ua.match(/Opera Mini/)||ua.match(/S40OviBrowser/)||(ua.match(/Glass/)&&ua.match(/Android/)));}var startUp=function(){mw.config=new mw.Map(true);mw.loader.addSource({"local":"/load.php"});mw.loader.register([["site","1484942168",[],"site"],["noscript","1484942168",[],"noscript"],["filepage","1484942168"],["user.groups","1484942168",[],"user"],["user","1484942168",[],"user"],["user.cssprefs",
"1484942168",["mediawiki.user"],"private"],["user.options","1484942168",[],"private"],["user.tokens","1484942168",[],"private"],["mediawiki.language.data","1484942168",["mediawiki.language.init"]],["mediawiki.skinning.elements","1484942168"],["mediawiki.skinning.content","1484942168"],["mediawiki.skinning.interface","1484942168"],["mediawiki.skinning.content.parsoid","1484942168"],["mediawiki.skinning.content.externallinks","1484942168"],["jquery.accessKeyLabel","1484942219",["jquery.client","jquery.mwExtension"]],["jquery.appear","1484942168"],["jquery.arrowSteps","1484942168"],["jquery.async","1484942168"],["jquery.autoEllipsis","1484942168",["jquery.highlightText"]],["jquery.badge","1484942168",["mediawiki.language"]],["jquery.byteLength","1484942168"],["jquery.byteLimit","1484942168",["jquery.byteLength"]],["jquery.checkboxShiftClick","1484942168"],["jquery.chosen","1484942168"],["jquery.client","1484942168"],["jquery.color","1484942168",["jquery.colorUtil"]],["jquery.colorUtil",
"1484942168"],["jquery.confirmable","1484942168",["mediawiki.jqueryMsg"]],["jquery.cookie","1484942168"],["jquery.expandableField","1484942168"],["jquery.farbtastic","1484942168",["jquery.colorUtil"]],["jquery.footHovzer","1484942168"],["jquery.form","1484942168"],["jquery.fullscreen","1484942168"],["jquery.getAttrs","1484942168"],["jquery.hidpi","1484942168"],["jquery.highlightText","1484942168",["jquery.mwExtension"]],["jquery.hoverIntent","1484942168"],["jquery.json","1484942168"],["jquery.localize","1484942168"],["jquery.makeCollapsible","1484942220"],["jquery.mockjax","1484942168"],["jquery.mw-jump","1484942168"],["jquery.mwExtension","1484942168"],["jquery.placeholder","1484942168"],["jquery.qunit","1484942168"],["jquery.qunit.completenessTest","1484942168",["jquery.qunit"]],["jquery.spinner","1484942168"],["jquery.jStorage","1484942168",["json"]],["jquery.suggestions","1484942168",["jquery.highlightText"]],["jquery.tabIndex","1484942168"],["jquery.tablesorter","1484942168",[
"jquery.mwExtension","mediawiki.language.months"]],["jquery.textSelection","1484942168",["jquery.client"]],["jquery.throttle-debounce","1484942168"],["jquery.validate","1484942168"],["jquery.xmldom","1484942168"],["jquery.tipsy","1484942168"],["jquery.ui.core","1484942168",[],"jquery.ui"],["jquery.ui.accordion","1484942168",["jquery.ui.core","jquery.ui.widget"],"jquery.ui"],["jquery.ui.autocomplete","1484942168",["jquery.ui.menu"],"jquery.ui"],["jquery.ui.button","1484942168",["jquery.ui.core","jquery.ui.widget"],"jquery.ui"],["jquery.ui.datepicker","1484942168",["jquery.ui.core"],"jquery.ui"],["jquery.ui.dialog","1484942168",["jquery.ui.button","jquery.ui.draggable","jquery.ui.position","jquery.ui.resizable"],"jquery.ui"],["jquery.ui.draggable","1484942168",["jquery.ui.core","jquery.ui.mouse"],"jquery.ui"],["jquery.ui.droppable","1484942168",["jquery.ui.draggable"],"jquery.ui"],["jquery.ui.menu","1484942168",["jquery.ui.core","jquery.ui.position","jquery.ui.widget"],"jquery.ui"],[
"jquery.ui.mouse","1484942168",["jquery.ui.widget"],"jquery.ui"],["jquery.ui.position","1484942168",[],"jquery.ui"],["jquery.ui.progressbar","1484942168",["jquery.ui.core","jquery.ui.widget"],"jquery.ui"],["jquery.ui.resizable","1484942168",["jquery.ui.core","jquery.ui.mouse"],"jquery.ui"],["jquery.ui.selectable","1484942168",["jquery.ui.core","jquery.ui.mouse"],"jquery.ui"],["jquery.ui.slider","1484942168",["jquery.ui.core","jquery.ui.mouse"],"jquery.ui"],["jquery.ui.sortable","1484942168",["jquery.ui.core","jquery.ui.mouse"],"jquery.ui"],["jquery.ui.spinner","1484942168",["jquery.ui.button"],"jquery.ui"],["jquery.ui.tabs","1484942168",["jquery.ui.core","jquery.ui.widget"],"jquery.ui"],["jquery.ui.tooltip","1484942168",["jquery.ui.core","jquery.ui.position","jquery.ui.widget"],"jquery.ui"],["jquery.ui.widget","1484942168",[],"jquery.ui"],["jquery.effects.core","1484942168",[],"jquery.ui"],["jquery.effects.blind","1484942168",["jquery.effects.core"],"jquery.ui"],[
"jquery.effects.bounce","1484942168",["jquery.effects.core"],"jquery.ui"],["jquery.effects.clip","1484942168",["jquery.effects.core"],"jquery.ui"],["jquery.effects.drop","1484942168",["jquery.effects.core"],"jquery.ui"],["jquery.effects.explode","1484942168",["jquery.effects.core"],"jquery.ui"],["jquery.effects.fade","1484942168",["jquery.effects.core"],"jquery.ui"],["jquery.effects.fold","1484942168",["jquery.effects.core"],"jquery.ui"],["jquery.effects.highlight","1484942168",["jquery.effects.core"],"jquery.ui"],["jquery.effects.pulsate","1484942168",["jquery.effects.core"],"jquery.ui"],["jquery.effects.scale","1484942168",["jquery.effects.core"],"jquery.ui"],["jquery.effects.shake","1484942168",["jquery.effects.core"],"jquery.ui"],["jquery.effects.slide","1484942168",["jquery.effects.core"],"jquery.ui"],["jquery.effects.transfer","1484942168",["jquery.effects.core"],"jquery.ui"],["json","1484942168",[],null,"local",
"return!!(window.JSON\u0026\u0026JSON.stringify\u0026\u0026JSON.parse);"],["moment","1484942168"],["mediawiki.api","1484942168",["mediawiki.util"]],["mediawiki.api.category","1484942168",["mediawiki.Title","mediawiki.api"]],["mediawiki.api.edit","1484942168",["mediawiki.Title","mediawiki.api","user.tokens"]],["mediawiki.api.login","1484942168",["mediawiki.api"]],["mediawiki.api.parse","1484942168",["mediawiki.api"]],["mediawiki.api.watch","1484942168",["mediawiki.api","user.tokens"]],["mediawiki.content.json","1484942168"],["mediawiki.debug","1484942168",["jquery.footHovzer","jquery.tipsy"]],["mediawiki.debug.init","1484942168",["mediawiki.debug"]],["mediawiki.feedback","1484942168",["jquery.ui.dialog","mediawiki.api.edit","mediawiki.jqueryMsg"]],["mediawiki.hidpi","1484942168",["jquery.hidpi"],null,"local","return'srcset'in new Image();"],["mediawiki.hlist","1484942168",["jquery.client"]],["mediawiki.htmlform","1484970790",["jquery.mwExtension"]],["mediawiki.icon","1484942168"],[
"mediawiki.inspect","1484942168",["jquery.byteLength","json"]],["mediawiki.notification","1484942168",["mediawiki.page.startup"]],["mediawiki.notify","1484942168"],["mediawiki.pager.tablePager","1484942168"],["mediawiki.searchSuggest","1484942220",["jquery.placeholder","jquery.suggestions","mediawiki.api"]],["mediawiki.Title","1484942168",["jquery.byteLength","mediawiki.util"]],["mediawiki.toc","1484942304",["jquery.cookie"]],["mediawiki.Uri","1484942168",["mediawiki.util"]],["mediawiki.user","1484942168",["jquery.cookie","mediawiki.api","user.options","user.tokens"]],["mediawiki.util","1484942168",["jquery.accessKeyLabel","mediawiki.notify"]],["mediawiki.cookie","1484942168",["jquery.cookie"]],["mediawiki.action.edit","1484942168",["jquery.byteLimit","jquery.textSelection","mediawiki.action.edit.styles","mediawiki.action.edit.toolbar"]],["mediawiki.action.edit.styles","1484942168"],["mediawiki.action.edit.toolbar","1484942168"],["mediawiki.action.edit.collapsibleFooter","1484942168",[
"jquery.cookie","jquery.makeCollapsible","mediawiki.icon"]],["mediawiki.action.edit.preview","1484942168",["jquery.form","jquery.spinner","mediawiki.action.history.diff"]],["mediawiki.action.history","1484942168",[],"mediawiki.action.history"],["mediawiki.action.history.diff","1484942168",[],"mediawiki.action.history"],["mediawiki.action.view.dblClickEdit","1484942168",["mediawiki.page.startup"]],["mediawiki.action.view.metadata","1484944321"],["mediawiki.action.view.postEdit","1484942220",["mediawiki.cookie","mediawiki.jqueryMsg"]],["mediawiki.action.view.redirect","1484942168",["jquery.client"]],["mediawiki.action.view.redirectPage","1484942168"],["mediawiki.action.view.rightClickEdit","1484942168"],["mediawiki.action.edit.editWarning","1484943133",["jquery.textSelection","mediawiki.jqueryMsg"]],["mediawiki.language","1484942220",["mediawiki.cldr","mediawiki.language.data"]],["mediawiki.cldr","1484942168",["mediawiki.libs.pluralruleparser"]],["mediawiki.libs.pluralruleparser",
"1484942168"],["mediawiki.language.init","1484942168"],["mediawiki.jqueryMsg","1484942168",["mediawiki.language","mediawiki.util"]],["mediawiki.language.months","1484942168",["mediawiki.language"]],["mediawiki.language.names","1484942168",["mediawiki.language.init"]],["mediawiki.libs.jpegmeta","1484942168"],["mediawiki.page.gallery","1484942168"],["mediawiki.page.ready","1484942168",["jquery.accessKeyLabel","jquery.checkboxShiftClick","jquery.makeCollapsible","jquery.mw-jump","jquery.placeholder"]],["mediawiki.page.startup","1484942168",["mediawiki.util"]],["mediawiki.page.patrol.ajax","1539035441",["jquery.spinner","mediawiki.Title","mediawiki.api","mediawiki.page.startup","user.tokens"]],["mediawiki.page.watch.ajax","1484942304",["mediawiki.api.watch","mediawiki.page.startup"]],["mediawiki.page.image.pagination","1484942168",["jquery.spinner","mediawiki.Uri"]],["mediawiki.special","1484942168"],["mediawiki.special.block","1484942168",["mediawiki.util"]],[
"mediawiki.special.changeemail","1484942168",["mediawiki.util"]],["mediawiki.special.changeslist","1484942168"],["mediawiki.special.changeslist.legend","1484942168"],["mediawiki.special.changeslist.legend.js","1484942168",["jquery.cookie","jquery.makeCollapsible"]],["mediawiki.special.changeslist.enhanced","1484942168"],["mediawiki.special.import","1484942168"],["mediawiki.special.movePage","1484942168",["jquery.byteLimit"]],["mediawiki.special.pageLanguage","1484942168"],["mediawiki.special.pagesWithProp","1484942168"],["mediawiki.special.preferences","1485988138",["mediawiki.language"]],["mediawiki.special.recentchanges","1484942168",["mediawiki.special"]],["mediawiki.special.search","1484964047"],["mediawiki.special.undelete","1484942168"],["mediawiki.special.upload","1485457873",["jquery.spinner","mediawiki.Title","mediawiki.api","mediawiki.libs.jpegmeta"]],["mediawiki.special.userlogin.common.styles","1484942168"],["mediawiki.special.userlogin.signup.styles","1484942168"],[
"mediawiki.special.userlogin.login.styles","1484942168"],["mediawiki.special.userlogin.common.js","1484970781"],["mediawiki.special.userlogin.signup.js","1485457778",["jquery.throttle-debounce","mediawiki.api","mediawiki.jqueryMsg"]],["mediawiki.special.unwatchedPages","1484942168",["mediawiki.Title","mediawiki.api.watch"]],["mediawiki.special.javaScriptTest","1484942168",["mediawiki.Uri"]],["mediawiki.special.version","1484942168"],["mediawiki.legacy.config","1484942168"],["mediawiki.legacy.ajax","1484942168",["mediawiki.legacy.wikibits"]],["mediawiki.legacy.commonPrint","1484942168"],["mediawiki.legacy.protect","1539279338",["jquery.byteLimit"]],["mediawiki.legacy.shared","1484942168"],["mediawiki.legacy.oldshared","1484942168"],["mediawiki.legacy.wikibits","1484942168",["mediawiki.util"]],["mediawiki.ui","1484942168"],["mediawiki.ui.checkbox","1484942168"],["mediawiki.ui.anchor","1484942168"],["mediawiki.ui.button","1484942168"],["mediawiki.ui.input","1484942168"],["es5-shim",
"1484942168",[],null,"local","return(function(){'use strict';return!this\u0026\u0026!!Function.prototype.bind;}());"],["oojs","1484942168",["es5-shim","json"]],["oojs-ui","1484942168",["oojs"]],["skins.vector.styles","1484942168"],["skins.vector.js","1484942168",["jquery.tabIndex","jquery.throttle-debounce"]]]);mw.config.set({"wgLoadScript":"/load.php","debug":false,"skin":"vector","stylepath":"/skins","wgUrlProtocols":"bitcoin\\:|ftp\\:\\/\\/|ftps\\:\\/\\/|geo\\:|git\\:\\/\\/|gopher\\:\\/\\/|http\\:\\/\\/|https\\:\\/\\/|irc\\:\\/\\/|ircs\\:\\/\\/|magnet\\:|mailto\\:|mms\\:\\/\\/|news\\:|nntp\\:\\/\\/|redis\\:\\/\\/|sftp\\:\\/\\/|sip\\:|sips\\:|sms\\:|ssh\\:\\/\\/|svn\\:\\/\\/|tel\\:|telnet\\:\\/\\/|urn\\:|worldwind\\:\\/\\/|xmpp\\:|\\/\\/","wgArticlePath":"/$1","wgScriptPath":"","wgScriptExtension":".php","wgScript":"/index.php","wgSearchType":null,"wgVariantArticlePath":false,"wgActionPaths":{},"wgServer":"http://quantsoftware.gatech.edu","wgServerName":"quantsoftware.gatech.edu",
"wgUserLanguage":"en","wgContentLanguage":"en","wgVersion":"1.24.6","wgEnableAPI":true,"wgEnableWriteAPI":true,"wgMainPageTitle":"Main Page","wgFormattedNamespaces":{"-2":"Media","-1":"Special","0":"","1":"Talk","2":"User","3":"User talk","4":"My wiki","5":"My wiki talk","6":"File","7":"File talk","8":"MediaWiki","9":"MediaWiki talk","10":"Template","11":"Template talk","12":"Help","13":"Help talk","14":"Category","15":"Category talk"},"wgNamespaceIds":{"media":-2,"special":-1,"":0,"talk":1,"user":2,"user_talk":3,"my_wiki":4,"my_wiki_talk":5,"file":6,"file_talk":7,"mediawiki":8,"mediawiki_talk":9,"template":10,"template_talk":11,"help":12,"help_talk":13,"category":14,"category_talk":15,"image":6,"image_talk":7,"project":4,"project_talk":5},"wgContentNamespaces":[0],"wgSiteName":"Quantitative Analysis Software Courses","wgFileExtensions":["png","gif","jpg","jpeg","doc","xls","mpp","pdf","ppt","tiff","bmp","docx","xlsx","pptx","ps","odt","ods","odp","odg","zip","csv"],"wgDBname":
"quant_mw1","wgFileCanRotate":true,"wgAvailableSkins":{"vector":"Vector","fallback":"Fallback"},"wgExtensionAssetsPath":"/extensions","wgCookiePrefix":"quant_mw1_mw_","wgCookieDomain":"","wgCookiePath":"/","wgCookieExpiration":15552000,"wgResourceLoaderMaxQueryLength":-1,"wgCaseSensitiveNamespaces":[],"wgLegalTitleChars":" %!\"$\u0026'()*,\\-./0-9:;=?@A-Z\\\\\\^_`a-z~+\\u0080-\\uFFFF","wgResourceLoaderStorageVersion":1,"wgResourceLoaderStorageEnabled":false});};if(isCompatible()){document.write("\u003Cscript src=\"/load.php?debug=false\u0026amp;lang=en\u0026amp;modules=jquery%2Cmediawiki\u0026amp;only=scripts\u0026amp;skin=vector\u0026amp;version=20151222T055646Z\"\u003E\u003C/script\u003E");};
/* cache key: quant_mw1-mw_:resourceloader:filter:minify-js:7:cf2094a72ec658ce542dc6bcfd2f2476 */