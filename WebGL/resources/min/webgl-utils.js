"use strict";!function(a,b){if("function"===typeof define&&define.amd)define([],b);else{var c=b.call(a);Object.keys(c).forEach(function(b){a[b]=c[b]})}}(this,function(){function b(b){a.console&&(a.console.error?a.console.error(b):a.console.log&&a.console.log(b))}function c(b){return b=b||a,b!==b.top}function d(a){return'<table style="background-color: #8CE; width: 100%; height: 100%;"><tr><td align="center"><div style="display: table-cell; vertical-align: middle;"><div style="">'+a+"</div></div></td></tr></table>"}function g(a,b){for(var c=["webgl","experimental-webgl"],d=null,e=0;e<c.length;++e){try{d=a.getContext(c[e],b)}catch(f){}if(d)break}return d}function h(b,c){function h(a){var c=b.parentNode;c&&(c.innerHTML=d(a))}if(!a.WebGLRenderingContext)return h(e),null;var i=g(b,c);return i||h(f),i}function i(){c()&&(document.body.className="iframe")}function j(a,b,d){var e=d||{};if(c()){if(i(),!e.dontResize&&e.resize!==!1){var f=a.clientWidth,g=a.clientHeight;a.width=f,a.height=g}}else if(!e.noTitle&&e.title!==!1){var j=document.title,k=document.createElement("h1");k.innerText=j,document.body.insertBefore(k,document.body.children[0])}var l=h(a,b);return l}function k(a,c,d,e){var f=e||b,g=a.createShader(d);a.shaderSource(g,c),a.compileShader(g);var h=a.getShaderParameter(g,a.COMPILE_STATUS);if(!h){var i=a.getShaderInfoLog(g);return f("*** Error compiling shader '"+g+"':"+i),a.deleteShader(g),null}return g}function l(a,c,d,e,f){var g=f||b,h=a.createProgram();c.forEach(function(b){a.attachShader(h,b)}),d&&obj_attrib.forEach(function(b,c){a.bindAttribLocation(h,e?e[c]:c,b)}),a.linkProgram(h);var i=a.getProgramParameter(h,a.LINK_STATUS);if(!i){var j=a.getProgramInfoLog(h);return g("Error in program linking:"+j),a.deleteProgram(h),null}return h}function m(a,b,c,d){var f,e="",g=document.getElementById(b);if(!g)throw"*** Error: unknown script element"+b;if(e=g.text,!c)if("x-shader/x-vertex"===g.type)f=a.VERTEX_SHADER;else if("x-shader/x-fragment"===g.type)f=a.FRAGMENT_SHADER;else if(f!==a.VERTEX_SHADER&&f!==a.FRAGMENT_SHADER)throw"*** Error: unknown shader type";return k(a,e,c?c:f,d)}function o(a,b,c,d,e){for(var f=[],g=0;g<b.length;++g)f.push(m(a,b[g],a[n[g]],e));return l(a,f,c,d,e)}function p(a,b,c,d,e){for(var f=[],g=0;g<b.length;++g)f.push(k(a,b[g],a[n[g]],e));return l(a,f,c,d,e)}function q(a,b){return b===a.SAMPLER_2D?a.TEXTURE_2D:b===a.SAMPLER_CUBE?a.TEXTURE_CUBE_MAP:void 0}function r(a,b){function d(b,d){var e=a.getUniformLocation(b,d.name),f=d.type,g=d.size>1&&"[0]"===d.name.substr(-3);if(f===a.FLOAT&&g)return function(b){a.uniform1fv(e,b)};if(f===a.FLOAT)return function(b){a.uniform1f(e,b)};if(f===a.FLOAT_VEC2)return function(b){a.uniform2fv(e,b)};if(f===a.FLOAT_VEC3)return function(b){a.uniform3fv(e,b)};if(f===a.FLOAT_VEC4)return function(b){a.uniform4fv(e,b)};if(f===a.INT&&g)return function(b){a.uniform1iv(e,b)};if(f===a.INT)return function(b){a.uniform1i(e,b)};if(f===a.INT_VEC2)return function(b){a.uniform2iv(e,b)};if(f===a.INT_VEC3)return function(b){a.uniform3iv(e,b)};if(f===a.INT_VEC4)return function(b){a.uniform4iv(e,b)};if(f===a.BOOL)return function(b){a.uniform1iv(e,b)};if(f===a.BOOL_VEC2)return function(b){a.uniform2iv(e,b)};if(f===a.BOOL_VEC3)return function(b){a.uniform3iv(e,b)};if(f===a.BOOL_VEC4)return function(b){a.uniform4iv(e,b)};if(f===a.FLOAT_MAT2)return function(b){a.uniformMatrix2fv(e,!1,b)};if(f===a.FLOAT_MAT3)return function(b){a.uniformMatrix3fv(e,!1,b)};if(f===a.FLOAT_MAT4)return function(b){a.uniformMatrix4fv(e,!1,b)};if((f===a.SAMPLER_2D||f===a.SAMPLER_CUBE)&&g){for(var h=[],i=0;i<info.size;++i)h.push(c++);return function(b,c){return function(d){a.uniform1iv(e,c),d.forEach(function(d,e){a.activeTexture(a.TEXTURE0+c[e]),a.bindTexture(b,tetxure)})}}(q(a,f),h)}if(f===a.SAMPLER_2D||f===a.SAMPLER_CUBE)return function(b,c){return function(d){a.uniform1i(e,c),a.activeTexture(a.TEXTURE0+c),a.bindTexture(b,d)}}(q(a,f),c++);throw"unknown type: 0x"+f.toString(16)}for(var c=0,e={},f=a.getProgramParameter(b,a.ACTIVE_UNIFORMS),g=0;g<f;++g){var h=a.getActiveUniform(b,g);if(!h)break;var i=h.name;"[0]"===i.substr(-3)&&(i=i.substr(0,i.length-3));var j=d(b,h);e[i]=j}return e}function s(a,b){Object.keys(b).forEach(function(c){var d=a[c];d&&d(b[c])})}function t(a,b){function d(b){return function(c){a.bindBuffer(a.ARRAY_BUFFER,c.buffer),a.enableVertexAttribArray(b),a.vertexAttribPointer(b,c.numComponents||c.size,c.type||a.FLOAT,c.normalize||!1,c.stride||0,c.offset||0)}}for(var c={},e=a.getProgramParameter(b,a.ACTIVE_ATTRIBUTES),f=0;f<e;++f){var g=a.getActiveAttrib(b,f);if(!g)break;var h=a.getAttribLocation(b,g.name);c[g.name]=d(h)}return c}function u(a,b){Object.keys(b).forEach(function(c){var d=a[c];d&&d(b[c])})}function v(a,b,c,d,e){b=b.map(function(a){var b=document.getElementById(a);return b?b.text:a});var f=p(a,b,c,d,e);if(!f)return null;var g=r(a,f),h=t(a,f);return{program:f,uniformSetters:g,attribSetters:h}}function w(a,b,c){u(b,c.attribs),c.indices&&a.bindBuffer(a.ELEMENT_ARRAY_BUFFER,c.indices)}function y(a,b){for(var c=0;c<x.length;++c){var d=x[c]+b,e=a.getExtension(d);if(e)return e}}function z(a){var b=a.clientWidth,c=a.clientHeight;return a.width!==b||a.height!==c?(a.width=b,a.height=c,!0):!1}function A(a){if(c(a))for(var b=a.parent.document.getElementsByTagName("iframe"),d=0;d<b.length;++d){var e=b[d];if(e.contentDocument===a.document)return e}}function B(a){try{var b=A(a);if(!b)return!0;var c=b.getBoundingClientRect(),d=c.top<a.parent.innerHeight&&c.bottom>=0&&c.left<a.parent.innerWidth&&c.right>=0;return d&&B(a.parent)}catch(e){return!0}}function C(b){var c=!0;if(b){var d=b.getBoundingClientRect();c=d.top<a.innerHeight&&d.bottom>=0}return c&&B(a)}function D(a,b){var c=0;return a.push=function(){for(var b=0;b<arguments.length;++b){var d=arguments[b];if(d instanceof Array||d.buffer&&d.buffer instanceof ArrayBuffer)for(var e=0;e<d.length;++e)a[c++]=d[e];else a[c++]=d}},a.reset=function(a){c=a||0},a.numComponents=b,Object.defineProperty(a,"numElements",{get:function(){return this.length/this.numComponents|0}}),a}function E(a,b,c){var d=c||Float32Array;return D(new d(a*b),a)}function F(a,b,c,d){c=c||a.ARRAY_BUFFER;var e=a.createBuffer();return a.bindBuffer(c,e),a.bufferData(c,b,d||a.STATIC_DRAW),e}function G(a){return"indices"!==a}function H(a){var b={};return Object.keys(a).filter(G).forEach(function(a){b["a_"+a]=a}),b}function I(a,b){if(b instanceof Int8Array)return a.BYTE;if(b instanceof Uint8Array)return a.UNSIGNED_BYTE;if(b instanceof Int16Array)return a.SHORT;if(b instanceof Uint16Array)return a.UNSIGNED_SHORT;if(b instanceof Int32Array)return a.INT;if(b instanceof Uint32Array)return a.UNSIGNED_INT;if(b instanceof Float32Array)return a.FLOAT;throw"unsupported typed array type"}function J(a){return a instanceof Int8Array?!0:a instanceof Uint8Array?!0:!1}function K(a){return a.buffer&&a.buffer instanceof ArrayBuffer}function L(a,b){var c;if(c=a.indexOf("coord")>=0?2:a.indexOf("color")>=0?4:3,b%c>0)throw"can not guess numComponents. You should specify it.";return c}function M(a,b){if(K(a))return a;Array.isArray(a)&&(a={data:a}),a.numComponents||(a.numComponents=L(b,a.length));var c=a.type;c||"indices"===b&&(c=Uint16Array);var d=E(a.numComponents,a.data.length/a.numComponents|0,c);return d.push(a.data),d}function N(a,b,c){var d=c||H(b),e={};return Object.keys(d).forEach(function(c){var f=d[c],g=M(b[f],f);e[c]={buffer:F(a,g),numComponents:g.numComponents||L(f),type:I(a,g),normalize:J(g)}}),e}function O(a){var b=Object.keys(a)[0],c=a[b];return K(c)?c.numElements:c.data.length/c.numComponents}function P(a,b,c){var d={attribs:N(a,b,c)},e=b.indices;return e?(e=M(e,"indices"),d.indices=F(a,e,a.ELEMENT_ARRAY_BUFFER),d.numElements=e.length):d.numElements=O(b),d}function Q(a,b){var c={};return Object.keys(b).forEach(function(d){var e="indices"===d?a.ELEMENT_ARRAY_BUFFER:a.ARRAY_BUFFER,f=M(b[d],name);c[d]=F(a,f,e)}),b.indices?c.numElements=b.indices.length:b.position&&(c.numElements=b.position.length/3),c}function R(a,b,c,d,e){var f=c.indices,g=void 0===d?c.numElements:d;e=void 0===e?e:0,f?a.drawElements(b,g,a.UNSIGNED_SHORT,e):a.drawArrays(b,e,g)}function S(a,b){var c=null,d=null;b.forEach(function(b){var e=b.programInfo,f=b.bufferInfo,g=!1;e!==c&&(c=e,a.useProgram(e.program),g=!0),(g||f!==d)&&(d=f,w(a,e.attribSetters,f)),s(e.uniformSetters,b.uniforms),R(a,a.TRIANGLES,f)})}var a=this,e='This page requires a browser that supports WebGL.<br/><a href="http://get.webgl.org">Click here to upgrade your browser.</a>',f='It doesn\'t appear your computer can support WebGL.<br/><a href="http://get.webgl.org/troubleshooting/">Click here for more information.</a>',n=["VERTEX_SHADER","FRAGMENT_SHADER"],x=["","MOZ_","OP_","WEBKIT_"];return a.requestAnimationFrame&&(a.requestAnimationFrame=function(a){return function(b,c){var d=function(){C(c)?a(b,c):a(d,c)};d()}}(a.requestAnimationFrame)),a.requestAnimFrame=a.requestAnimationFrame,a.cancelRequestAnimFrame=a.cancelAnimationFrame,{createAugmentedTypedArray:E,createAttribsFromArrays:N,createBuffersFromArrays:Q,createBufferInfoFromArrays:P,createAttributeSetters:t, createProgram:l,createProgramFromScripts:o,createProgramFromSources:p,createProgramInfo:v,createUniformSetters:r,drawBufferInfo:R, drawObjectList:S, getWebGLContext:j,updateCSSIfInIFrame:i,getExtensionWithKnownPrefixes:y,resizeCanvasToDisplaySize:z,setAttributes:u,setBuffersAndAttributes:w, setUniforms:s,setupWebGL:h}});
