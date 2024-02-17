/**
 * Highstock JS v11.3.0 (2024-01-10)
 *
 * Indicator series type for Highcharts Stock
 *
 * (c) 2010-2024 Kacper Madej
 *
 * License: www.highcharts.com/license
 */!function(t){"object"==typeof module&&module.exports?(t.default=t,module.exports=t):"function"==typeof define&&define.amd?define("highcharts/indicators/roc",["highcharts","highcharts/modules/stock"],function(e){return t(e),t.Highcharts=e,t}):t("undefined"!=typeof Highcharts?Highcharts:void 0)}(function(t){"use strict";var e=t?t._modules:{};function n(t,e,n,o){t.hasOwnProperty(e)||(t[e]=o.apply(null,n),"function"==typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:e,module:t[e]}})))}n(e,"Stock/Indicators/ROC/ROCIndicator.js",[e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(t,e){var n,o=this&&this.__extends||(n=function(t,e){return(n=Object.setPrototypeOf||({__proto__:[]})instanceof Array&&function(t,e){t.__proto__=e}||function(t,e){for(var n in e)Object.prototype.hasOwnProperty.call(e,n)&&(t[n]=e[n])})(t,e)},function(t,e){if("function"!=typeof e&&null!==e)throw TypeError("Class extends value "+String(e)+" is not a constructor or null");function o(){this.constructor=t}n(t,e),t.prototype=null===e?Object.create(e):(o.prototype=e.prototype,new o)}),r=t.seriesTypes.sma,i=e.isArray,s=e.merge,a=e.extend,u=function(t){function e(){return null!==t&&t.apply(this,arguments)||this}return o(e,t),e.prototype.getValues=function(t,e){var n,o,r=e.period,s=t.xData,a=t.yData,u=a?a.length:0,c=[],p=[],f=[],l=-1;if(!(s.length<=r)){for(i(a[0])&&(l=e.index),n=r;n<u;n++)o=function(t,e,n,o,r){var i,s;return s=r<0?(i=e[n-o])?(e[n]-i)/i*100:null:(i=e[n-o][r])?(e[n][r]-i)/i*100:null,[t[n],s]}(s,a,n,r,l),c.push(o),p.push(o[0]),f.push(o[1]);return{values:c,xData:p,yData:f}}},e.defaultOptions=s(r.defaultOptions,{params:{index:3,period:9}}),e}(r);return a(u.prototype,{nameBase:"Rate of Change"}),t.registerSeriesType("roc",u),u}),n(e,"masters/indicators/roc.src.js",[],function(){})});