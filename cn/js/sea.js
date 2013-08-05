/*! Sea.js 2.0.0 | seajs.org/LICENSE.md
 //@ sourceMappingURL=sea.js.map
 */(function(v,s){function y(a){return function(c){return Object.prototype.toString.call(c)==="[object "+a+"]"}}function S(a){a=a.replace(ka,"/");for(a=a.replace(la,"$1/");a.match(T);)a=a.replace(T,"/");return a}function U(a){a=S(a);ma.test(a)?a=a.slice(0,-1):na.test(a)||(a+=".js");return a.replace(":80/","/")}function V(a,c){return oa.test(a)?a:pa.test(a)?(c||w).match(I)[0]+a:qa.test(a)?(w.match(ra)||["/"])[0]+a.substring(1):j.base+a}function J(a,c){if(!a)return"";var b=a,d=j.alias,b=a=d&&K(d[b])?d[b]:
    b,d=j.paths,f;if(d&&(f=b.match(sa))&&K(d[f[1]]))b=d[f[1]]+f[2];f=b;var e=j.vars;e&&-1<f.indexOf("{")&&(f=f.replace(ta,function(a,b){return K(e[b])?e[b]:a}));a=V(f,c);f=a=U(a);var b=j.map,n=f;if(b)for(d=0;d<b.length&&!(n=b[d],n=z(n)?n(f)||f:f.replace(n[0],n[1]),n!==f);d++);return n}function W(a,c){var b=a.sheet,d;if(X)b&&(d=!0);else if(b)try{b.cssRules&&(d=!0)}catch(f){"NS_ERROR_DOM_SECURITY_ERR"===f.name&&(d=!0)}setTimeout(function(){d?c():W(a,c)},20)}function ua(){if(A)return A;if(B&&"interactive"===
    B.readyState)return B;for(var a=x.getElementsByTagName("script"),c=a.length-1;0<=c;c--){var b=a[c];if("interactive"===b.readyState)return B=b}}function C(a){this.uri=a;this.dependencies=[];this.exports=null;this.status=0}function t(a,c){if(D(a)){for(var b=[],d=0;d<a.length;d++)b[d]=t(a[d],c);return b}b={id:a,refUri:c};p("resolve",b);return b.uri||J(b.id,c)}function E(a,c){D(a)||(a=[a]);Y(a,function(){for(var b=[],d=0;d<a.length;d++)b[d]=Z(l[a[d]]);c&&c.apply(v,b)})}function Y(a,c){var b=$(a);if(0===
    b.length)c();else{p("load",b);for(var d=b.length,f=d,e=0;e<d;e++)(function(a){function b(c){c||(c=d);var f=$(e.dependencies);0===f.length?c():aa(e)?(f=q,f.push(f[0]),ba("Circular dependencies: "+f.join(" -> ")),q.length=0,c(!0)):(ca[a]=f,Y(f,c))}function d(a){!a&&e.status<L&&(e.status=L);0===--f&&c()}var e=l[a];e.dependencies.length?b(function(b){function c(){d(b)}e.status<F?da(a,c):c()}):e.status<F?da(a,b):d()})(b[e])}}function da(a,c){function b(){delete M[f];N[f]=!0;G&&(ea(a,G),G=s);var b,c=H[f];
    for(delete H[f];b=c.shift();)b()}l[a].status=va;var d={uri:a};p("fetch",d);var f=d.requestUri||a;if(N[f])c();else if(M[f])H[f].push(c);else{M[f]=!0;H[f]=[c];var e=j.charset;p("request",d={uri:a,requestUri:f,callback:b,charset:e});if(!d.requested){var d=d.requestUri,h=fa.test(d),g=r.createElement(h?"link":"script");if(e&&(e=z(e)?e(d):e))g.charset=e;var k=g;h&&(X||!("onload"in k))?setTimeout(function(){W(k,b)},1):k.onload=k.onerror=k.onreadystatechange=function(){wa.test(k.readyState)&&(k.onload=k.onerror=
    k.onreadystatechange=null,!h&&!j.debug&&x.removeChild(k),k=s,b())};h?(g.rel="stylesheet",g.href=d):(g.async=!0,g.src=d);A=g;ga?x.insertBefore(g,ga):x.appendChild(g);A=s}}}function xa(a,c,b){1===arguments.length&&(b=a,a=s);if(!D(c)&&z(b)){var d=[];b.toString().replace(ya,"").replace(za,function(a,b,c){c&&d.push(c)});c=d}var f={id:a,uri:t(a),deps:c,factory:b};if(!f.uri&&r.attachEvent){var e=ua();e?f.uri=e.src:ba("Failed to derive: "+b)}p("define",f);f.uri?ea(f.uri,f):G=f}function ea(a,c){var b=l[a]||
    (l[a]=new C(a));b.status<F&&(b.id=c.id||a,b.dependencies=t(c.deps||[],a),b.factory=c.factory,b.factory!==s&&(b.status=F))}function Aa(a){function c(b){return t(b,a.uri)}function b(a){return Z(l[c(a)])}if(!a)return null;if(a.status>=ha)return a.exports;a.status=ha;b.resolve=c;b.async=function(a,d){E(c(a),d);return b};var d=a.factory,d=z(d)?d(b,a.exports={},a):d;a.exports=d===s?a.exports:d;a.status=Ba;return a.exports}function $(a){for(var c=[],b=0;b<a.length;b++){var d=a[b];d&&(l[d]||(l[d]=new C(d))).status<
    L&&c.push(d)}return c}function Z(a){var c=Aa(a);null===c&&(!a||!fa.test(a.uri))&&p("error",a);return c}function aa(a){var c=ca[a.uri]||[];if(0===c.length)return!1;q.push(a.uri);a:{for(a=0;a<c.length;a++)for(var b=0;b<q.length;b++)if(q[b]===c[a]){a=!0;break a}a=!1}if(a){a=q[0];for(b=c.length-1;0<=b;b--)if(c[b]===a){c.splice(b,1);break}return!0}for(a=0;a<c.length;a++)if(aa(l[c[a]]))return!0;q.pop();return!1}function ia(a){var c=j.preload,b=c.length;b?E(t(c),function(){c.splice(0,b);ia(a)}):a()}function O(a){for(var c in a){var b=
    a[c];if(b&&"plugins"===c){c="preload";for(var d=[],f=void 0;f=b.shift();)d.push(P+"plugin-"+f);b=d}if((d=j[c])&&Ca(d))for(var g in b)d[g]=b[g];else D(d)?b=d.concat(b):"base"===c&&(b=U(V(b+"/"))),j[c]=b}p("config",a);return e}var m=v.seajs;if(!m||!m.version){var e=v.seajs={version:"2.0.0"},Ca=y("Object"),K=y("String"),D=Array.isArray||y("Array"),z=y("Function"),ba=e.log=function(a,c){v.console&&(c||j.debug)&&console[c||(c="log")]&&console[c](a)},u=e.events={};e.on=function(a,c){if(!c)return e;(u[a]||
    (u[a]=[])).push(c);return e};e.off=function(a,c){if(!a&&!c)return e.events=u={},e;var b=u[a];if(b)if(c)for(var d=b.length-1;0<=d;d--)b[d]===c&&b.splice(d,1);else delete u[a];return e};var p=e.emit=function(a,c){var b=u[a],d;if(b)for(b=b.slice();d=b.shift();)d(c);return e},I=/[^?#]*\//,ka=/\/\.\//g,la=/([^:\/])\/\/+/g,T=/\/[^/]+\/\.\.\//,na=/\?|\.(?:css|js)$|\/$/,ma=/#$/,sa=/^([^/:]+)(\/.+)$/,ta=/{([^{]+)}/g,oa=/^\/\/.|:\//,pa=/^\./,qa=/^\//,ra=/^.*?\/\/.*?\//,r=document,h=location,w=h.href.match(I)[0],
    g=r.getElementsByTagName("script"),g=r.getElementById("seajsnode")||g[g.length-1],P=(g.hasAttribute?g.src:g.getAttribute("src",4)).match(I)[0]||w;e.cwd=function(a){return a?w=S(a+"/"):w};e.dir=P;var x=r.getElementsByTagName("head")[0]||r.documentElement,ga=x.getElementsByTagName("base")[0],fa=/\.css(?:\?|$)/i,wa=/^(?:loaded|complete|undefined)$/,A,B,X=536>1*navigator.userAgent.replace(/.*AppleWebKit\/(\d+)\..*/,"$1"),za=/"(?:\\"|[^"])*"|'(?:\\'|[^'])*'|\/\*[\S\s]*?\*\/|\/(?:\\\/|[^/\r\n])+\/(?=[^\/])|\/\/.*|\.\s*require|(?:^|[^$])\brequire\s*\(\s*(["'])(.+?)\1\s*\)/g,
    ya=/\\\\/g,l=e.cache={},G,M={},N={},H={},ca={},va=1,F=2,L=3,ha=4,Ba=5;C.prototype.destroy=function(){delete l[this.uri];delete N[this.uri]};var q=[];e.use=function(a,c){ia(function(){E(t(a),c)});return e};C.load=E;e.resolve=J;v.define=xa;e.require=function(a){return(l[J(a)]||{}).exports};var Q=P,ja=Q.match(/^(.+?\/)(?:seajs\/)+(?:\d[^/]+\/)?$/);ja&&(Q=ja[1]);var j=O.data={base:Q,charset:"utf-8",preload:[]};e.config=O;var R,h=h.search.replace(/(seajs-\w+)(&|$)/g,"$1=1$2"),h=h+(" "+r.cookie);h.replace(/seajs-(\w+)=1/g,
    function(a,c){(R||(R=[])).push(c)});O({plugins:R});h=g.getAttribute("data-config");g=g.getAttribute("data-main");h&&j.preload.push(h);g&&e.use(g);if(m&&m.args){g=["define","config","use"];m=m.args;for(h=0;h<m.length;h+=2)e[g[m[h]]].apply(e,m[h+1])}}})(this);

seajs.config({
    alias: {
        'jquery': 'plugin/jquery.min'
    },
    preload: ["jquery"]
});