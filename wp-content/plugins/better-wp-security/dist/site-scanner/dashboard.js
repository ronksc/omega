this.itsec=this.itsec||{},this.itsec["site-scanner"]=this.itsec["site-scanner"]||{},this.itsec["site-scanner"].dashboard=(window.itsecWebpackJsonP=window.itsecWebpackJsonP||[]).push([[25],{"1ZqX":function(e,t){!function(){e.exports=this.wp.data}()},FqII:function(e,t){!function(){e.exports=this.wp.date}()},GRId:function(e,t){!function(){e.exports=this.wp.element}()},K9lf:function(e,t){!function(){e.exports=this.wp.compose}()},Mmq9:function(e,t){!function(){e.exports=this.wp.url}()},RxS6:function(e,t){!function(){e.exports=this.wp.keycodes}()},Tqx9:function(e,t){!function(){e.exports=this.wp.primitives}()},TvNi:function(e,t){!function(){e.exports=this.wp.plugins}()},YLtl:function(e,t){!function(){e.exports=this.lodash}()},cDcd:function(e,t){!function(){e.exports=this.React}()},faye:function(e,t){!function(){e.exports=this.ReactDOM}()},gf1k:function(e,t){!function(){e.exports=this.itsec.dashboard.dashboard}()},l3Sj:function(e,t){!function(){e.exports=this.wp.i18n}()},lsLH:function(e,t,c){},rl8x:function(e,t){!function(){e.exports=this.wp.isShallowEqual}()},"tI+e":function(e,t){!function(){e.exports=this.wp.components}()},x154:function(e,t,c){"use strict";c.r(t);var n=c("GRId"),a=c("l3Sj"),s=c("TvNi"),r=c("1ZqX"),i=c("ppSj"),o=c("J4zp"),l=c.n(o),u=c("TSYQ"),d=c.n(u),b=c("4eJC"),m=c.n(b),O=c("FqII"),p=c("tI+e"),f=c("K9lf"),j=c("49++"),h=c("gf1k");var w=Object(f.compose)([Object(f.withState)({scanResults:void 0})])((function(e){var t=e.card,c=e.config,s=e.scanResults,r=e.setState;return Object(n.createElement)("div",{className:"itsec-card--type-malware-scan itsec-card--type-malware--scan-only"},Object(n.createElement)(h.CardHeader,null,Object(n.createElement)(h.CardHeaderTitle,{card:t,config:c})),Object(n.createElement)("section",{className:"itsec-card-malware-scan__description"},Object(n.createElement)("p",null,Object(n.createInterpolateElement)(Object(a.__)("This <a>site scan is powered by iThemes</a>. We use several datapoints to check for known malware, blocklist status, website errors and out-of-date software. These datapoints are not 100% accurate, but we try our best to provide thorough results.","better-wp-security"),{a:Object(n.createElement)("a",{href:"https://help.ithemes.com/hc/en-us/articles/360046334433"})})),Object(n.createElement)("p",null,Object(a.__)("Enable Database Logging to see a history of completed Site Scans.","better-wp-security"))),Object(n.createElement)(h.CardFooterSchemaActions,{card:t,onComplete:function(e,t){return e.endsWith("/scan")&&r({scanResults:t})}}),s&&Object(n.createElement)(p.Modal,{title:Object(a.__)("Scan Results","better-wp-security"),onRequestClose:function(){return r({scanResults:void 0})}},Object(n.createElement)(j.s,{results:s,showSiteUrl:!1})))})),E=(c("lsLH"),m()((function(e,t){return String(e).replace(/https?:\/\//,"")===String(t).replace(/https?:\/\//,"")})));function _(e){var t=e.card,c=e.config,s=Object(f.useInstanceId)(_),i=Object(r.useSelect)((function(e){return{siteInfo:e("ithemes-security/core").getSiteInfo()}})).siteInfo,o=Object(n.useState)(0),u=l()(o,2),b=u[0],m=u[1],w=Object(n.useState)(void 0),I=l()(w,2),S=I[0],v=I[1],g=Object(n.useState)(!1),x=l()(g,2),N=x[0],y=x[1];return Object(n.createElement)("div",{className:"itsec-card--type-malware-scan"},Object(n.createElement)(h.CardHeader,null,Object(n.createElement)(h.CardHeaderTitle,{card:t,config:c}),Object(n.createElement)(h.CardHeaderDate,{card:t,config:c})),Object(n.createElement)("section",{className:"itsec-card-malware-scan__scans-section"},Object(n.createElement)("table",{className:"itsec-card-malware-scan__scans"},Object(n.createElement)("thead",null,Object(n.createElement)("tr",null,Object(n.createElement)("th",null,Object(a.__)("Time","better-wp-security")),Object(n.createElement)("th",null,Object(a.__)("Status","better-wp-security")),Object(n.createElement)("th",null,Object(n.createElement)("span",{className:"screen-reader-text"},Object(a.__)("Actions","better-wp-security"))))),Object(n.createElement)("tbody",null,t.data.scans.map((function(e){var t=e.id,c=e.status,r=e.description;return Object(n.createElement)("tr",{key:t},Object(n.createElement)("th",{scope:"row"},Object(O.dateI18n)("M d, Y g:i A",e.time)),Object(n.createElement)("td",null,Object(n.createElement)("span",{className:d()("itsec-card-malware-scan__scan-status","itsec-card-malware-scan__scan-status--".concat(c))},r)),Object(n.createElement)("td",null,Object(n.createElement)(p.Button,{isLink:!0,"aria-pressed":b===t,onClick:function(){return m(t)}},Object(a.__)("View","better-wp-security")),b===t&&Object(n.createElement)(p.Modal,{title:Object(a.sprintf)(Object(a.__)("View Scan Details for %s","better-wp-security"),Object(O.dateI18n)("M d, Y g:i A",e.time)),onRequestClose:function(){m(0),y(!1)}},Object(n.createElement)(j.s,{results:e,showSiteUrl:!E(e.url,null==i?void 0:i.url)}),Object(n.createElement)(p.Button,{className:"itsec-card-malware-scan__raw-details-toggle",isLink:!0,onClick:function(){return y(!N)},"aria-expanded":N,"aria-controls":"itsec-card-malware-scan__raw-details--".concat(s)},N?Object(a.__)("Hide Raw Details","better-wp-security"):Object(a.__)("Show Raw Details","better-wp-security")),Object(n.createElement)("div",{id:"itsec-card-malware-scan__raw-details--".concat(s),style:{visibility:N?"visible":"hidden"}},N&&Object(n.createElement)(j.q,{json:e})))))}))))),Object(n.createElement)(h.CardFooterSchemaActions,{card:t,onComplete:function(e,t){return e.endsWith("/scan")&&v(t)}}),S&&Object(n.createElement)(p.Modal,{title:Object(a.__)("Scan Results","better-wp-security"),onRequestClose:function(){return v(void 0)}},Object(n.createElement)(j.s,{results:S,showSiteUrl:!1})))}var I={render:function(e){var t;return"file"===(null===(t=e.card)||void 0===t?void 0:t.data.log_type)?Object(n.createElement)(w,e):Object(n.createElement)(_,e)}};function S(){var e=Object(r.useDispatch)("ithemes-security/dashboard").registerCard;return Object(i.f)(S,(function(){return e("malware-scan",I)})),null}c.p=window.itsecWebpackPublicPath,Object(a.setLocaleData)({"":{}},"ithemes-security-pro"),Object(s.registerPlugin)("itsec-site-scanner-dashboard",{render:function(){return Object(n.createElement)(S,null)}})},ywyh:function(e,t){!function(){e.exports=this.wp.apiFetch}()}},[["x154",0,5,1,4,2,3]]]);