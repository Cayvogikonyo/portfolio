(()=>{"use strict";function e(e){var t=e.getBoundingClientRect();return{width:t.width,height:t.height,top:t.top,right:t.right,bottom:t.bottom,left:t.left,x:t.left,y:t.top}}function t(e){if("[object Window]"!==e.toString()){var t=e.ownerDocument;return t&&t.defaultView||window}return e}function n(e){var n=t(e);return{scrollLeft:n.pageXOffset,scrollTop:n.pageYOffset}}function o(e){return e instanceof t(e).Element||e instanceof Element}function r(e){return e instanceof t(e).HTMLElement||e instanceof HTMLElement}function i(e){return e?(e.nodeName||"").toLowerCase():null}function a(e){return((o(e)?e.ownerDocument:e.document)||window.document).documentElement}function s(t){return e(a(t)).left+n(t).scrollLeft}function c(e){return t(e).getComputedStyle(e)}function f(e){var t=c(e),n=t.overflow,o=t.overflowX,r=t.overflowY;return/auto|scroll|overlay|hidden/.test(n+r+o)}function d(o,c,d){void 0===d&&(d=!1);var l,u,p=a(c),m=e(o),h=r(c),g={scrollLeft:0,scrollTop:0},v={x:0,y:0};return(h||!h&&!d)&&(("body"!==i(c)||f(p))&&(g=(l=c)!==t(l)&&r(l)?{scrollLeft:(u=l).scrollLeft,scrollTop:u.scrollTop}:n(l)),r(c)?((v=e(c)).x+=c.clientLeft,v.y+=c.clientTop):p&&(v.x=s(p))),{x:m.left+g.scrollLeft-v.x,y:m.top+g.scrollTop-v.y,width:m.width,height:m.height}}function l(e){return{x:e.offsetLeft,y:e.offsetTop,width:e.offsetWidth,height:e.offsetHeight}}function u(e){return"html"===i(e)?e:e.assignedSlot||e.parentNode||e.host||a(e)}function p(e){return["html","body","#document"].indexOf(i(e))>=0?e.ownerDocument.body:r(e)&&f(e)?e:p(u(e))}function m(e,n){void 0===n&&(n=[]);var o=p(e),r="body"===i(o),a=t(o),s=r?[a].concat(a.visualViewport||[],f(o)?o:[]):o,c=n.concat(s);return r?c:c.concat(m(u(s)))}function h(e){return["table","td","th"].indexOf(i(e))>=0}function g(e){if(!r(e)||"fixed"===c(e).position)return null;var t=e.offsetParent;if(t){var n=a(t);if("body"===i(t)&&"static"===c(t).position&&"static"!==c(n).position)return n}return t}function v(e){for(var n=t(e),o=g(e);o&&h(o)&&"static"===c(o).position;)o=g(o);return o&&"body"===i(o)&&"static"===c(o).position?n:o||function(e){for(var t=u(e);r(t)&&["html","body"].indexOf(i(t))<0;){var n=c(t);if("none"!==n.transform||"none"!==n.perspective||n.willChange&&"auto"!==n.willChange)return t;t=t.parentNode}return null}(e)||n}var y="top",b="bottom",w="right",O="left",x="auto",E=[y,b,w,O],j="start",L="end",B="viewport",D="popper",k=E.reduce((function(e,t){return e.concat([t+"-"+j,t+"-"+L])}),[]),M=[].concat(E,[x]).reduce((function(e,t){return e.concat([t,t+"-"+j,t+"-"+L])}),[]),I=["beforeRead","read","afterRead","beforeMain","main","afterMain","beforeWrite","write","afterWrite"];function A(e){var t=new Map,n=new Set,o=[];function r(e){n.add(e.name),[].concat(e.requires||[],e.requiresIfExists||[]).forEach((function(e){if(!n.has(e)){var o=t.get(e);o&&r(o)}})),o.push(e)}return e.forEach((function(e){t.set(e.name,e)})),e.forEach((function(e){n.has(e.name)||r(e)})),o}var P={placement:"bottom",modifiers:[],strategy:"absolute"};function S(){for(var e=arguments.length,t=new Array(e),n=0;n<e;n++)t[n]=arguments[n];return!t.some((function(e){return!(e&&"function"==typeof e.getBoundingClientRect)}))}function T(e){void 0===e&&(e={});var t=e,n=t.defaultModifiers,r=void 0===n?[]:n,i=t.defaultOptions,a=void 0===i?P:i;return function(e,t,n){void 0===n&&(n=a);var i,s,c={placement:"bottom",orderedModifiers:[],options:Object.assign(Object.assign({},P),a),modifiersData:{},elements:{reference:e,popper:t},attributes:{},styles:{}},f=[],u=!1,p={state:c,setOptions:function(n){h(),c.options=Object.assign(Object.assign(Object.assign({},a),c.options),n),c.scrollParents={reference:o(e)?m(e):e.contextElement?m(e.contextElement):[],popper:m(t)};var i=function(e){var t=A(e);return I.reduce((function(e,n){return e.concat(t.filter((function(e){return e.phase===n})))}),[])}(function(e){var t=e.reduce((function(e,t){var n=e[t.name];return e[t.name]=n?Object.assign(Object.assign(Object.assign({},n),t),{},{options:Object.assign(Object.assign({},n.options),t.options),data:Object.assign(Object.assign({},n.data),t.data)}):t,e}),{});return Object.keys(t).map((function(e){return t[e]}))}([].concat(r,c.options.modifiers)));return c.orderedModifiers=i.filter((function(e){return e.enabled})),c.orderedModifiers.forEach((function(e){var t=e.name,n=e.options,o=void 0===n?{}:n,r=e.effect;if("function"==typeof r){var i=r({state:c,name:t,instance:p,options:o}),a=function(){};f.push(i||a)}})),p.update()},forceUpdate:function(){if(!u){var e=c.elements,t=e.reference,n=e.popper;if(S(t,n)){c.rects={reference:d(t,v(n),"fixed"===c.options.strategy),popper:l(n)},c.reset=!1,c.placement=c.options.placement,c.orderedModifiers.forEach((function(e){return c.modifiersData[e.name]=Object.assign({},e.data)}));for(var o=0;o<c.orderedModifiers.length;o++)if(!0!==c.reset){var r=c.orderedModifiers[o],i=r.fn,a=r.options,s=void 0===a?{}:a,f=r.name;"function"==typeof i&&(c=i({state:c,options:s,name:f,instance:p})||c)}else c.reset=!1,o=-1}}},update:(i=function(){return new Promise((function(e){p.forceUpdate(),e(c)}))},function(){return s||(s=new Promise((function(e){Promise.resolve().then((function(){s=void 0,e(i())}))}))),s}),destroy:function(){h(),u=!0}};if(!S(e,t))return p;function h(){f.forEach((function(e){return e()})),f=[]}return p.setOptions(n).then((function(e){!u&&n.onFirstUpdate&&n.onFirstUpdate(e)})),p}}var W={passive:!0};function C(e){return e.split("-")[0]}function H(e){return e.split("-")[1]}function R(e){return["top","bottom"].indexOf(e)>=0?"x":"y"}function N(e){var t,n=e.reference,o=e.element,r=e.placement,i=r?C(r):null,a=r?H(r):null,s=n.x+n.width/2-o.width/2,c=n.y+n.height/2-o.height/2;switch(i){case y:t={x:s,y:n.y-o.height};break;case b:t={x:s,y:n.y+n.height};break;case w:t={x:n.x+n.width,y:c};break;case O:t={x:n.x-o.width,y:c};break;default:t={x:n.x,y:n.y}}var f=i?R(i):null;if(null!=f){var d="y"===f?"height":"width";switch(a){case j:t[f]=t[f]-(n[d]/2-o[d]/2);break;case L:t[f]=t[f]+(n[d]/2-o[d]/2)}}return t}var q={top:"auto",right:"auto",bottom:"auto",left:"auto"};function V(e){var n,o=e.popper,r=e.popperRect,i=e.placement,s=e.offsets,c=e.position,f=e.gpuAcceleration,d=e.adaptive,l=e.roundOffsets?function(e){var t=e.x,n=e.y,o=window.devicePixelRatio||1;return{x:Math.round(t*o)/o||0,y:Math.round(n*o)/o||0}}(s):s,u=l.x,p=void 0===u?0:u,m=l.y,h=void 0===m?0:m,g=s.hasOwnProperty("x"),x=s.hasOwnProperty("y"),E=O,j=y,L=window;if(d){var B=v(o);B===t(o)&&(B=a(o)),i===y&&(j=b,h-=B.clientHeight-r.height,h*=f?1:-1),i===O&&(E=w,p-=B.clientWidth-r.width,p*=f?1:-1)}var D,k=Object.assign({position:c},d&&q);return f?Object.assign(Object.assign({},k),{},((D={})[j]=x?"0":"",D[E]=g?"0":"",D.transform=(L.devicePixelRatio||1)<2?"translate("+p+"px, "+h+"px)":"translate3d("+p+"px, "+h+"px, 0)",D)):Object.assign(Object.assign({},k),{},((n={})[j]=x?h+"px":"",n[E]=g?p+"px":"",n.transform="",n))}var z={left:"right",right:"left",bottom:"top",top:"bottom"};function U(e){return e.replace(/left|right|bottom|top/g,(function(e){return z[e]}))}var Y={start:"end",end:"start"};function _(e){return e.replace(/start|end/g,(function(e){return Y[e]}))}function F(e,n){var o,r=n.getRootNode&&n.getRootNode();if(e.contains(n))return!0;if(r&&((o=r)instanceof t(o).ShadowRoot||o instanceof ShadowRoot)){var i=n;do{if(i&&e.isSameNode(i))return!0;i=i.parentNode||i.host}while(i)}return!1}function X(e){return Object.assign(Object.assign({},e),{},{left:e.x,top:e.y,right:e.x+e.width,bottom:e.y+e.height})}function G(o,i){return i===B?X(function(e){var n=t(e),o=a(e),r=n.visualViewport,i=o.clientWidth,c=o.clientHeight,f=0,d=0;return r&&(i=r.width,c=r.height,/^((?!chrome|android).)*safari/i.test(navigator.userAgent)||(f=r.offsetLeft,d=r.offsetTop)),{width:i,height:c,x:f+s(e),y:d}}(o)):r(i)?function(t){var n=e(t);return n.top=n.top+t.clientTop,n.left=n.left+t.clientLeft,n.bottom=n.top+t.clientHeight,n.right=n.left+t.clientWidth,n.width=t.clientWidth,n.height=t.clientHeight,n.x=n.left,n.y=n.top,n}(i):X(function(e){var t=a(e),o=n(e),r=e.ownerDocument.body,i=Math.max(t.scrollWidth,t.clientWidth,r?r.scrollWidth:0,r?r.clientWidth:0),f=Math.max(t.scrollHeight,t.clientHeight,r?r.scrollHeight:0,r?r.clientHeight:0),d=-o.scrollLeft+s(e),l=-o.scrollTop;return"rtl"===c(r||t).direction&&(d+=Math.max(t.clientWidth,r?r.clientWidth:0)-i),{width:i,height:f,x:d,y:l}}(a(o)))}function J(e,t,n){var a="clippingParents"===t?function(e){var t=m(u(e)),n=["absolute","fixed"].indexOf(c(e).position)>=0&&r(e)?v(e):e;return o(n)?t.filter((function(e){return o(e)&&F(e,n)&&"body"!==i(e)})):[]}(e):[].concat(t),s=[].concat(a,[n]),f=s[0],d=s.reduce((function(t,n){var o=G(e,n);return t.top=Math.max(o.top,t.top),t.right=Math.min(o.right,t.right),t.bottom=Math.min(o.bottom,t.bottom),t.left=Math.max(o.left,t.left),t}),G(e,f));return d.width=d.right-d.left,d.height=d.bottom-d.top,d.x=d.left,d.y=d.top,d}function K(e){return Object.assign(Object.assign({},{top:0,right:0,bottom:0,left:0}),e)}function Q(e,t){return t.reduce((function(t,n){return t[n]=e,t}),{})}function Z(t,n){void 0===n&&(n={});var r=n,i=r.placement,s=void 0===i?t.placement:i,c=r.boundary,f=void 0===c?"clippingParents":c,d=r.rootBoundary,l=void 0===d?B:d,u=r.elementContext,p=void 0===u?D:u,m=r.altBoundary,h=void 0!==m&&m,g=r.padding,v=void 0===g?0:g,O=K("number"!=typeof v?v:Q(v,E)),x=p===D?"reference":D,j=t.elements.reference,L=t.rects.popper,k=t.elements[h?x:p],M=J(o(k)?k:k.contextElement||a(t.elements.popper),f,l),I=e(j),A=N({reference:I,element:L,strategy:"absolute",placement:s}),P=X(Object.assign(Object.assign({},L),A)),S=p===D?P:I,T={top:M.top-S.top+O.top,bottom:S.bottom-M.bottom+O.bottom,left:M.left-S.left+O.left,right:S.right-M.right+O.right},W=t.modifiersData.offset;if(p===D&&W){var C=W[s];Object.keys(T).forEach((function(e){var t=[w,b].indexOf(e)>=0?1:-1,n=[y,b].indexOf(e)>=0?"y":"x";T[e]+=C[n]*t}))}return T}function $(e,t,n){return Math.max(e,Math.min(t,n))}function ee(e,t,n){return void 0===n&&(n={x:0,y:0}),{top:e.top-t.height-n.y,right:e.right-t.width+n.x,bottom:e.bottom-t.height+n.y,left:e.left-t.width-n.x}}function te(e){return[y,w,b,O].some((function(t){return e[t]>=0}))}var ne=T({defaultModifiers:[{name:"eventListeners",enabled:!0,phase:"write",fn:function(){},effect:function(e){var n=e.state,o=e.instance,r=e.options,i=r.scroll,a=void 0===i||i,s=r.resize,c=void 0===s||s,f=t(n.elements.popper),d=[].concat(n.scrollParents.reference,n.scrollParents.popper);return a&&d.forEach((function(e){e.addEventListener("scroll",o.update,W)})),c&&f.addEventListener("resize",o.update,W),function(){a&&d.forEach((function(e){e.removeEventListener("scroll",o.update,W)})),c&&f.removeEventListener("resize",o.update,W)}},data:{}},{name:"popperOffsets",enabled:!0,phase:"read",fn:function(e){var t=e.state,n=e.name;t.modifiersData[n]=N({reference:t.rects.reference,element:t.rects.popper,strategy:"absolute",placement:t.placement})},data:{}},{name:"computeStyles",enabled:!0,phase:"beforeWrite",fn:function(e){var t=e.state,n=e.options,o=n.gpuAcceleration,r=void 0===o||o,i=n.adaptive,a=void 0===i||i,s=n.roundOffsets,c=void 0===s||s,f={placement:C(t.placement),popper:t.elements.popper,popperRect:t.rects.popper,gpuAcceleration:r};null!=t.modifiersData.popperOffsets&&(t.styles.popper=Object.assign(Object.assign({},t.styles.popper),V(Object.assign(Object.assign({},f),{},{offsets:t.modifiersData.popperOffsets,position:t.options.strategy,adaptive:a,roundOffsets:c})))),null!=t.modifiersData.arrow&&(t.styles.arrow=Object.assign(Object.assign({},t.styles.arrow),V(Object.assign(Object.assign({},f),{},{offsets:t.modifiersData.arrow,position:"absolute",adaptive:!1,roundOffsets:c})))),t.attributes.popper=Object.assign(Object.assign({},t.attributes.popper),{},{"data-popper-placement":t.placement})},data:{}},{name:"applyStyles",enabled:!0,phase:"write",fn:function(e){var t=e.state;Object.keys(t.elements).forEach((function(e){var n=t.styles[e]||{},o=t.attributes[e]||{},a=t.elements[e];r(a)&&i(a)&&(Object.assign(a.style,n),Object.keys(o).forEach((function(e){var t=o[e];!1===t?a.removeAttribute(e):a.setAttribute(e,!0===t?"":t)})))}))},effect:function(e){var t=e.state,n={popper:{position:t.options.strategy,left:"0",top:"0",margin:"0"},arrow:{position:"absolute"},reference:{}};return Object.assign(t.elements.popper.style,n.popper),t.elements.arrow&&Object.assign(t.elements.arrow.style,n.arrow),function(){Object.keys(t.elements).forEach((function(e){var o=t.elements[e],a=t.attributes[e]||{},s=Object.keys(t.styles.hasOwnProperty(e)?t.styles[e]:n[e]).reduce((function(e,t){return e[t]="",e}),{});r(o)&&i(o)&&(Object.assign(o.style,s),Object.keys(a).forEach((function(e){o.removeAttribute(e)})))}))}},requires:["computeStyles"]},{name:"offset",enabled:!0,phase:"main",requires:["popperOffsets"],fn:function(e){var t=e.state,n=e.options,o=e.name,r=n.offset,i=void 0===r?[0,0]:r,a=M.reduce((function(e,n){return e[n]=function(e,t,n){var o=C(e),r=[O,y].indexOf(o)>=0?-1:1,i="function"==typeof n?n(Object.assign(Object.assign({},t),{},{placement:e})):n,a=i[0],s=i[1];return a=a||0,s=(s||0)*r,[O,w].indexOf(o)>=0?{x:s,y:a}:{x:a,y:s}}(n,t.rects,i),e}),{}),s=a[t.placement],c=s.x,f=s.y;null!=t.modifiersData.popperOffsets&&(t.modifiersData.popperOffsets.x+=c,t.modifiersData.popperOffsets.y+=f),t.modifiersData[o]=a}},{name:"flip",enabled:!0,phase:"main",fn:function(e){var t=e.state,n=e.options,o=e.name;if(!t.modifiersData[o]._skip){for(var r=n.mainAxis,i=void 0===r||r,a=n.altAxis,s=void 0===a||a,c=n.fallbackPlacements,f=n.padding,d=n.boundary,l=n.rootBoundary,u=n.altBoundary,p=n.flipVariations,m=void 0===p||p,h=n.allowedAutoPlacements,g=t.options.placement,v=C(g),L=c||(v===g||!m?[U(g)]:function(e){if(C(e)===x)return[];var t=U(e);return[_(e),t,_(t)]}(g)),B=[g].concat(L).reduce((function(e,n){return e.concat(C(n)===x?function(e,t){void 0===t&&(t={});var n=t,o=n.placement,r=n.boundary,i=n.rootBoundary,a=n.padding,s=n.flipVariations,c=n.allowedAutoPlacements,f=void 0===c?M:c,d=H(o),l=d?s?k:k.filter((function(e){return H(e)===d})):E,u=l.filter((function(e){return f.indexOf(e)>=0}));0===u.length&&(u=l);var p=u.reduce((function(t,n){return t[n]=Z(e,{placement:n,boundary:r,rootBoundary:i,padding:a})[C(n)],t}),{});return Object.keys(p).sort((function(e,t){return p[e]-p[t]}))}(t,{placement:n,boundary:d,rootBoundary:l,padding:f,flipVariations:m,allowedAutoPlacements:h}):n)}),[]),D=t.rects.reference,I=t.rects.popper,A=new Map,P=!0,S=B[0],T=0;T<B.length;T++){var W=B[T],R=C(W),N=H(W)===j,q=[y,b].indexOf(R)>=0,V=q?"width":"height",z=Z(t,{placement:W,boundary:d,rootBoundary:l,altBoundary:u,padding:f}),Y=q?N?w:O:N?b:y;D[V]>I[V]&&(Y=U(Y));var F=U(Y),X=[];if(i&&X.push(z[R]<=0),s&&X.push(z[Y]<=0,z[F]<=0),X.every((function(e){return e}))){S=W,P=!1;break}A.set(W,X)}if(P)for(var G=function(e){var t=B.find((function(t){var n=A.get(t);if(n)return n.slice(0,e).every((function(e){return e}))}));if(t)return S=t,"break"},J=m?3:1;J>0;J--){if("break"===G(J))break}t.placement!==S&&(t.modifiersData[o]._skip=!0,t.placement=S,t.reset=!0)}},requiresIfExists:["offset"],data:{_skip:!1}},{name:"preventOverflow",enabled:!0,phase:"main",fn:function(e){var t=e.state,n=e.options,o=e.name,r=n.mainAxis,i=void 0===r||r,a=n.altAxis,s=void 0!==a&&a,c=n.boundary,f=n.rootBoundary,d=n.altBoundary,u=n.padding,p=n.tether,m=void 0===p||p,h=n.tetherOffset,g=void 0===h?0:h,x=Z(t,{boundary:c,rootBoundary:f,padding:u,altBoundary:d}),E=C(t.placement),L=H(t.placement),B=!L,D=R(E),k="x"===D?"y":"x",M=t.modifiersData.popperOffsets,I=t.rects.reference,A=t.rects.popper,P="function"==typeof g?g(Object.assign(Object.assign({},t.rects),{},{placement:t.placement})):g,S={x:0,y:0};if(M){if(i){var T="y"===D?y:O,W="y"===D?b:w,N="y"===D?"height":"width",q=M[D],V=M[D]+x[T],z=M[D]-x[W],U=m?-A[N]/2:0,Y=L===j?I[N]:A[N],_=L===j?-A[N]:-I[N],F=t.elements.arrow,X=m&&F?l(F):{width:0,height:0},G=t.modifiersData["arrow#persistent"]?t.modifiersData["arrow#persistent"].padding:{top:0,right:0,bottom:0,left:0},J=G[T],K=G[W],Q=$(0,I[N],X[N]),ee=B?I[N]/2-U-Q-J-P:Y-Q-J-P,te=B?-I[N]/2+U+Q+K+P:_+Q+K+P,ne=t.elements.arrow&&v(t.elements.arrow),oe=ne?"y"===D?ne.clientTop||0:ne.clientLeft||0:0,re=t.modifiersData.offset?t.modifiersData.offset[t.placement][D]:0,ie=M[D]+ee-re-oe,ae=M[D]+te-re,se=$(m?Math.min(V,ie):V,q,m?Math.max(z,ae):z);M[D]=se,S[D]=se-q}if(s){var ce="x"===D?y:O,fe="x"===D?b:w,de=M[k],le=$(de+x[ce],de,de-x[fe]);M[k]=le,S[k]=le-de}t.modifiersData[o]=S}},requiresIfExists:["offset"]},{name:"arrow",enabled:!0,phase:"main",fn:function(e){var t,n=e.state,o=e.name,r=n.elements.arrow,i=n.modifiersData.popperOffsets,a=C(n.placement),s=R(a),c=[O,w].indexOf(a)>=0?"height":"width";if(r&&i){var f=n.modifiersData[o+"#persistent"].padding,d=l(r),u="y"===s?y:O,p="y"===s?b:w,m=n.rects.reference[c]+n.rects.reference[s]-i[s]-n.rects.popper[c],h=i[s]-n.rects.reference[s],g=v(r),x=g?"y"===s?g.clientHeight||0:g.clientWidth||0:0,E=m/2-h/2,j=f[u],L=x-d[c]-f[p],B=x/2-d[c]/2+E,D=$(j,B,L),k=s;n.modifiersData[o]=((t={})[k]=D,t.centerOffset=D-B,t)}},effect:function(e){var t=e.state,n=e.options,o=e.name,r=n.element,i=void 0===r?"[data-popper-arrow]":r,a=n.padding,s=void 0===a?0:a;null!=i&&("string"!=typeof i||(i=t.elements.popper.querySelector(i)))&&F(t.elements.popper,i)&&(t.elements.arrow=i,t.modifiersData[o+"#persistent"]={padding:K("number"!=typeof s?s:Q(s,E))})},requires:["popperOffsets"],requiresIfExists:["preventOverflow"]},{name:"hide",enabled:!0,phase:"main",requiresIfExists:["preventOverflow"],fn:function(e){var t=e.state,n=e.name,o=t.rects.reference,r=t.rects.popper,i=t.modifiersData.preventOverflow,a=Z(t,{elementContext:"reference"}),s=Z(t,{altBoundary:!0}),c=ee(a,o),f=ee(s,r,i),d=te(c),l=te(f);t.modifiersData[n]={referenceClippingOffsets:c,popperEscapeOffsets:f,isReferenceHidden:d,hasPopperEscaped:l},t.attributes.popper=Object.assign(Object.assign({},t.attributes.popper),{},{"data-popper-reference-hidden":d,"data-popper-escaped":l})}}]});document.addEventListener("DOMContentLoaded",(function(){setTimeout((function(){document.getElementsByTagName("BODY")[0].classList.add("loaded"),document.getElementById("section-left")&&document.getElementById("section-left").classList.add("-translate-x-full"),document.getElementById("section-right")&&document.getElementById("section-right").classList.add("translate-x-full"),document.getElementById("loader")&&document.getElementById("loader").classList.add("hidden"),setTimeout((function(){document.getElementById("loader-wrapper")&&document.getElementById("loader-wrapper").classList.add("hidden","translate-y-full","z-0")}),500),document.getElementById("content")&&(document.getElementById("content").classList.remove("hidden","opacity-0"),document.getElementById("content").classList.add("opacity-100"))}),700);var e=document.getElementsByClassName("themeIcon");"dark"===localStorage.theme||!("theme"in localStorage)&&window.matchMedia("(prefers-color-scheme: dark)").matches?(document.documentElement.classList.add("dark"),e&&[].forEach.call(e,(function(e){e.classList.remove("fa-moon","text-gray-900"),e.classList.add("fa-sun","text-yellow-600")}))):(document.documentElement.classList.remove("dark"),e&&[].forEach.call(e,(function(e){e.classList.remove("fa-sun","text-yellow-600"),e.classList.add("fa-moon","text-gray-900")})))}),!1);var oe=document.getElementById("scrollBounce");oe&&oe.addEventListener("click",(function(){document.getElementById("sectioncontent").scrollIntoView({behavior:"smooth"})}));for(var re=document.getElementsByClassName("themebtn"),ie=document.getElementsByClassName("themeIcon"),ae=0;ae<re.length;ae++)re[ae].addEventListener("click",se);function se(){"dark"===localStorage.theme?(localStorage.theme="light",document.documentElement.classList.remove("dark"),[].forEach.call(ie,(function(e){e.classList.remove("fa-sun","text-yellow-600"),e.classList.add("fa-moon","text-gray-900")}))):(localStorage.theme="dark",document.documentElement.classList.add("dark"),[].forEach.call(ie,(function(e){e.classList.remove("fa-moon","text-gray-900"),e.classList.add("fa-sun","text-yellow-600")})))}var ce=document.getElementsByClassName("pop-prop"),fe=null,de=null,le=null;function ue(){var e=(de=this).getAttribute("data-uid");(fe=document.getElementById("tooltip"+e)).setAttribute("data-show",""),function(){if(null!==de){var e=de.getAttribute("data-placement")?de.getAttribute("data-placement"):"right-start";le=ne(de,fe,{placement:e,modifiers:[{name:"offset",options:{offset:[0,8]}}]})}}()}function pe(){var e=(de=this).getAttribute("data-uid");(fe=document.getElementById("tooltip"+e)).removeAttribute("data-show"),le&&(le.destroy(),le=null)}["mouseenter","focus"].forEach((function(e){for(var t=0;t<ce.length;t++)ce[t].addEventListener(e,ue)})),["mouseleave","blur"].forEach((function(e){for(var t=0;t<ce.length;t++)ce[t].addEventListener(e,pe)}))})();