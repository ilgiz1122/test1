(() => {
  var __webpack_modules__ = {
      282: () => {
        "use strict";
        function _typeof(e) {
          return (
            (_typeof =
              "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
                ? function (e) {
                    return typeof e;
                  }
                : function (e) {
                    return e &&
                      "function" == typeof Symbol &&
                      e.constructor === Symbol &&
                      e !== Symbol.prototype
                      ? "symbol"
                      : typeof e;
                  }),
            _typeof(e)
          );
        }
        var md5,
          __WEBPACK_DEFAULT_EXPORT__ = md5;
        (function () {
          var HxOverrides = function () {};
          (HxOverrides.__name__ = !0),
            (HxOverrides.dateStr = function (e) {
              var t = e.getMonth() + 1,
                n = e.getDate(),
                i = e.getHours(),
                r = e.getMinutes(),
                a = e.getSeconds();
              return (
                e.getFullYear() +
                "-" +
                (t < 10 ? "0" + t : "" + t) +
                "-" +
                (n < 10 ? "0" + n : "" + n) +
                " " +
                (i < 10 ? "0" + i : "" + i) +
                ":" +
                (r < 10 ? "0" + r : "" + r) +
                ":" +
                (a < 10 ? "0" + a : "" + a)
              );
            }),
            (HxOverrides.strDate = function (e) {
              switch (e.length) {
                case 8:
                  var t = e.split(":"),
                    n = new Date();
                  return (
                    n.setTime(0),
                    n.setUTCHours(t[0]),
                    n.setUTCMinutes(t[1]),
                    n.setUTCSeconds(t[2]),
                    n
                  );
                case 10:
                  t = e.split("-");
                  return new Date(t[0], t[1] - 1, t[2], 0, 0, 0);
                case 19:
                  var i = (t = e.split(" "))[0].split("-"),
                    r = t[1].split(":");
                  return new Date(i[0], i[1] - 1, i[2], r[0], r[1], r[2]);
                default:
                  throw "Invalid date format : " + e;
              }
            }),
            (HxOverrides.cca = function (e, t) {
              var n = e.charCodeAt(t);
              if (n == n) return n;
            }),
            (HxOverrides.substr = function (e, t, n) {
              return null != t && 0 != t && null != n && n < 0
                ? ""
                : (null == n && (n = e.length),
                  t < 0
                    ? (t = e.length + t) < 0 && (t = 0)
                    : n < 0 && (n = e.length + n - t),
                  e.substr(t, n));
            }),
            (HxOverrides.remove = function (e, t) {
              for (var n = 0, i = e.length; n < i; ) {
                if (e[n] == t) return e.splice(n, 1), !0;
                n++;
              }
              return !1;
            }),
            (HxOverrides.iter = function (e) {
              return {
                cur: 0,
                arr: e,
                hasNext: function () {
                  return this.cur < this.arr.length;
                },
                next: function () {
                  return this.arr[this.cur++];
                },
              };
            });
          var IntIter = function (e, t) {
            (this.min = e), (this.max = t);
          };
          (IntIter.__name__ = !0),
            (IntIter.prototype = {
              next: function () {
                return this.min++;
              },
              hasNext: function () {
                return this.min < this.max;
              },
              __class__: IntIter,
            });
          var Std = function () {};
          (Std.__name__ = !0),
            (Std.is = function (e, t) {
              return js.Boot.__instanceof(e, t);
            }),
            (Std.string = function (e) {
              return js.Boot.__string_rec(e, "");
            }),
            (Std.int = function (e) {
              return 0 | e;
            }),
            (Std.parseInt = function (e) {
              var t = parseInt(e, 10);
              return (
                0 != t ||
                  (120 != HxOverrides.cca(e, 1) &&
                    88 != HxOverrides.cca(e, 1)) ||
                  (t = parseInt(e)),
                isNaN(t) ? null : t
              );
            }),
            (Std.parseFloat = function (e) {
              return parseFloat(e);
            }),
            (Std.random = function (e) {
              return Math.floor(Math.random() * e);
            });
          var com = com || {};
          com.wiris || (com.wiris = {}),
            com.wiris.js || (com.wiris.js = {}),
            (com.wiris.js.JsPluginTools = function () {
              this.tryReady();
            }),
            (com.wiris.js.JsPluginTools.__name__ = !0),
            (com.wiris.js.JsPluginTools.main = function () {
              var e;
              (e = com.wiris.js.JsPluginTools.getInstance()),
                haxe.Timer.delay($bind(e, e.tryReady), 100);
            }),
            (com.wiris.js.JsPluginTools.getInstance = function () {
              return (
                null == com.wiris.js.JsPluginTools.instance &&
                  (com.wiris.js.JsPluginTools.instance =
                    new com.wiris.js.JsPluginTools()),
                com.wiris.js.JsPluginTools.instance
              );
            }),
            (com.wiris.js.JsPluginTools.bypassEncapsulation = function () {
              null == window.com && (window.com = {}),
                null == window.com.wiris && (window.com.wiris = {}),
                null == window.com.wiris.js && (window.com.wiris.js = {}),
                null == window.com.wiris.js.JsPluginTools &&
                  (window.com.wiris.js.JsPluginTools =
                    com.wiris.js.JsPluginTools.getInstance());
            }),
            (com.wiris.js.JsPluginTools.prototype = {
              md5encode: function (e) {
                return haxe.Md5.encode(e);
              },
              doLoad: function () {
                (this.ready = !0),
                  (com.wiris.js.JsPluginTools.instance = this),
                  com.wiris.js.JsPluginTools.bypassEncapsulation();
              },
              tryReady: function () {
                (this.ready = !1),
                  js.Lib.document.readyState &&
                    (this.doLoad(), (this.ready = !0)),
                  this.ready ||
                    haxe.Timer.delay($bind(this, this.tryReady), 100);
              },
              __class__: com.wiris.js.JsPluginTools,
            });
          var haxe = haxe || {};
          (haxe.Log = function () {}),
            (haxe.Log.__name__ = !0),
            (haxe.Log.trace = function (e, t) {
              js.Boot.__trace(e, t);
            }),
            (haxe.Log.clear = function () {
              js.Boot.__clear_trace();
            }),
            (haxe.Md5 = function () {}),
            (haxe.Md5.__name__ = !0),
            (haxe.Md5.encode = function (e) {
              return new haxe.Md5().doEncode(e);
            }),
            (haxe.Md5.prototype = {
              doEncode: function (e) {
                for (
                  var t = this.str2blks(e),
                    n = 1732584193,
                    i = -271733879,
                    r = -1732584194,
                    a = 271733878,
                    o = 0;
                  o < t.length;

                ) {
                  var s = n,
                    l = i,
                    c = r,
                    u = a;
                  0,
                    (n = this.ff(n, i, r, a, t[o], 7, -680876936)),
                    (a = this.ff(a, n, i, r, t[o + 1], 12, -389564586)),
                    (r = this.ff(r, a, n, i, t[o + 2], 17, 606105819)),
                    (i = this.ff(i, r, a, n, t[o + 3], 22, -1044525330)),
                    (n = this.ff(n, i, r, a, t[o + 4], 7, -176418897)),
                    (a = this.ff(a, n, i, r, t[o + 5], 12, 1200080426)),
                    (r = this.ff(r, a, n, i, t[o + 6], 17, -1473231341)),
                    (i = this.ff(i, r, a, n, t[o + 7], 22, -45705983)),
                    (n = this.ff(n, i, r, a, t[o + 8], 7, 1770035416)),
                    (a = this.ff(a, n, i, r, t[o + 9], 12, -1958414417)),
                    (r = this.ff(r, a, n, i, t[o + 10], 17, -42063)),
                    (i = this.ff(i, r, a, n, t[o + 11], 22, -1990404162)),
                    (n = this.ff(n, i, r, a, t[o + 12], 7, 1804603682)),
                    (a = this.ff(a, n, i, r, t[o + 13], 12, -40341101)),
                    (r = this.ff(r, a, n, i, t[o + 14], 17, -1502002290)),
                    (i = this.ff(i, r, a, n, t[o + 15], 22, 1236535329)),
                    (n = this.gg(n, i, r, a, t[o + 1], 5, -165796510)),
                    (a = this.gg(a, n, i, r, t[o + 6], 9, -1069501632)),
                    (r = this.gg(r, a, n, i, t[o + 11], 14, 643717713)),
                    (i = this.gg(i, r, a, n, t[o], 20, -373897302)),
                    (n = this.gg(n, i, r, a, t[o + 5], 5, -701558691)),
                    (a = this.gg(a, n, i, r, t[o + 10], 9, 38016083)),
                    (r = this.gg(r, a, n, i, t[o + 15], 14, -660478335)),
                    (i = this.gg(i, r, a, n, t[o + 4], 20, -405537848)),
                    (n = this.gg(n, i, r, a, t[o + 9], 5, 568446438)),
                    (a = this.gg(a, n, i, r, t[o + 14], 9, -1019803690)),
                    (r = this.gg(r, a, n, i, t[o + 3], 14, -187363961)),
                    (i = this.gg(i, r, a, n, t[o + 8], 20, 1163531501)),
                    (n = this.gg(n, i, r, a, t[o + 13], 5, -1444681467)),
                    (a = this.gg(a, n, i, r, t[o + 2], 9, -51403784)),
                    (r = this.gg(r, a, n, i, t[o + 7], 14, 1735328473)),
                    (i = this.gg(i, r, a, n, t[o + 12], 20, -1926607734)),
                    (n = this.hh(n, i, r, a, t[o + 5], 4, -378558)),
                    (a = this.hh(a, n, i, r, t[o + 8], 11, -2022574463)),
                    (r = this.hh(r, a, n, i, t[o + 11], 16, 1839030562)),
                    (i = this.hh(i, r, a, n, t[o + 14], 23, -35309556)),
                    (n = this.hh(n, i, r, a, t[o + 1], 4, -1530992060)),
                    (a = this.hh(a, n, i, r, t[o + 4], 11, 1272893353)),
                    (r = this.hh(r, a, n, i, t[o + 7], 16, -155497632)),
                    (i = this.hh(i, r, a, n, t[o + 10], 23, -1094730640)),
                    (n = this.hh(n, i, r, a, t[o + 13], 4, 681279174)),
                    (a = this.hh(a, n, i, r, t[o], 11, -358537222)),
                    (r = this.hh(r, a, n, i, t[o + 3], 16, -722521979)),
                    (i = this.hh(i, r, a, n, t[o + 6], 23, 76029189)),
                    (n = this.hh(n, i, r, a, t[o + 9], 4, -640364487)),
                    (a = this.hh(a, n, i, r, t[o + 12], 11, -421815835)),
                    (r = this.hh(r, a, n, i, t[o + 15], 16, 530742520)),
                    (i = this.hh(i, r, a, n, t[o + 2], 23, -995338651)),
                    (n = this.ii(n, i, r, a, t[o], 6, -198630844)),
                    (a = this.ii(a, n, i, r, t[o + 7], 10, 1126891415)),
                    (r = this.ii(r, a, n, i, t[o + 14], 15, -1416354905)),
                    (i = this.ii(i, r, a, n, t[o + 5], 21, -57434055)),
                    (n = this.ii(n, i, r, a, t[o + 12], 6, 1700485571)),
                    (a = this.ii(a, n, i, r, t[o + 3], 10, -1894986606)),
                    (r = this.ii(r, a, n, i, t[o + 10], 15, -1051523)),
                    (i = this.ii(i, r, a, n, t[o + 1], 21, -2054922799)),
                    (n = this.ii(n, i, r, a, t[o + 8], 6, 1873313359)),
                    (a = this.ii(a, n, i, r, t[o + 15], 10, -30611744)),
                    (r = this.ii(r, a, n, i, t[o + 6], 15, -1560198380)),
                    (i = this.ii(i, r, a, n, t[o + 13], 21, 1309151649)),
                    (n = this.ii(n, i, r, a, t[o + 4], 6, -145523070)),
                    (a = this.ii(a, n, i, r, t[o + 11], 10, -1120210379)),
                    (r = this.ii(r, a, n, i, t[o + 2], 15, 718787259)),
                    (i = this.ii(i, r, a, n, t[o + 9], 21, -343485551)),
                    (n = this.addme(n, s)),
                    (i = this.addme(i, l)),
                    (r = this.addme(r, c)),
                    (a = this.addme(a, u)),
                    (o += 16);
                }
                return (
                  this.rhex(n) + this.rhex(i) + this.rhex(r) + this.rhex(a)
                );
              },
              ii: function (e, t, n, i, r, a, o) {
                return this.cmn(
                  this.bitXOR(n, this.bitOR(t, ~i)),
                  e,
                  t,
                  r,
                  a,
                  o
                );
              },
              hh: function (e, t, n, i, r, a, o) {
                return this.cmn(
                  this.bitXOR(this.bitXOR(t, n), i),
                  e,
                  t,
                  r,
                  a,
                  o
                );
              },
              gg: function (e, t, n, i, r, a, o) {
                return this.cmn(
                  this.bitOR(this.bitAND(t, i), this.bitAND(n, ~i)),
                  e,
                  t,
                  r,
                  a,
                  o
                );
              },
              ff: function (e, t, n, i, r, a, o) {
                return this.cmn(
                  this.bitOR(this.bitAND(t, n), this.bitAND(~t, i)),
                  e,
                  t,
                  r,
                  a,
                  o
                );
              },
              cmn: function (e, t, n, i, r, a) {
                return this.addme(
                  this.rol(this.addme(this.addme(t, e), this.addme(i, a)), r),
                  n
                );
              },
              rol: function (e, t) {
                return (e << t) | (e >>> (32 - t));
              },
              str2blks: function (e) {
                for (
                  var t = 1 + ((e.length + 8) >> 6),
                    n = new Array(),
                    i = 0,
                    r = 16 * t;
                  i < r;

                ) {
                  n[(a = i++)] = 0;
                }
                for (var a = 0; a < e.length; )
                  (n[a >> 2] |=
                    HxOverrides.cca(e, a) << (((8 * e.length + a) % 4) * 8)),
                    a++;
                n[a >> 2] |= 128 << (((8 * e.length + a) % 4) * 8);
                var o = 8 * e.length,
                  s = 16 * t - 2;
                return (
                  (n[s] = 255 & o),
                  (n[s] |= ((o >>> 8) & 255) << 8),
                  (n[s] |= ((o >>> 16) & 255) << 16),
                  (n[s] |= ((o >>> 24) & 255) << 24),
                  n
                );
              },
              rhex: function (e) {
                for (var t = "", n = "0123456789abcdef", i = 0; i < 4; ) {
                  var r = i++;
                  t +=
                    n.charAt((e >> (8 * r + 4)) & 15) +
                    n.charAt((e >> (8 * r)) & 15);
                }
                return t;
              },
              addme: function (e, t) {
                var n = (65535 & e) + (65535 & t);
                return (
                  (((e >> 16) + (t >> 16) + (n >> 16)) << 16) | (65535 & n)
                );
              },
              bitAND: function (e, t) {
                return (((e >>> 1) & (t >>> 1)) << 1) | (1 & e & t);
              },
              bitXOR: function (e, t) {
                return (((e >>> 1) ^ (t >>> 1)) << 1) | ((1 & e) ^ (1 & t));
              },
              bitOR: function (e, t) {
                return (((e >>> 1) | (t >>> 1)) << 1) | ((1 & e) | (1 & t));
              },
              __class__: haxe.Md5,
            }),
            (haxe.Timer = function (e) {
              var t = this;
              this.id = window.setInterval(function () {
                t.run();
              }, e);
            }),
            (haxe.Timer.__name__ = !0),
            (haxe.Timer.delay = function (e, t) {
              var n = new haxe.Timer(t);
              return (
                (n.run = function () {
                  n.stop(), e();
                }),
                n
              );
            }),
            (haxe.Timer.measure = function (e, t) {
              var n = haxe.Timer.stamp(),
                i = e();
              return haxe.Log.trace(haxe.Timer.stamp() - n + "s", t), i;
            }),
            (haxe.Timer.stamp = function () {
              return new Date().getTime() / 1e3;
            }),
            (haxe.Timer.prototype = {
              run: function () {},
              stop: function () {
                null != this.id &&
                  (window.clearInterval(this.id), (this.id = null));
              },
              __class__: haxe.Timer,
            });
          var js = js || {},
            $_;
          function $bind(e, t) {
            var n = function e() {
              return e.method.apply(e.scope, arguments);
            };
            return (n.scope = e), (n.method = t), n;
          }
          (js.Boot = function () {}),
            (js.Boot.__name__ = !0),
            (js.Boot.__unhtml = function (e) {
              return e
                .split("&")
                .join("&amp;")
                .split("<")
                .join("&lt;")
                .split(">")
                .join("&gt;");
            }),
            (js.Boot.__trace = function (e, t) {
              var n,
                i = null != t ? t.fileName + ":" + t.lineNumber + ": " : "";
              (i += js.Boot.__string_rec(e, "")),
                "undefined" != typeof document &&
                null != (n = document.getElementById("haxe:trace"))
                  ? (n.innerHTML += js.Boot.__unhtml(i) + "<br/>")
                  : "undefined" != typeof console &&
                    null != console.log &&
                    console.log(i);
            }),
            (js.Boot.__clear_trace = function () {
              var e = document.getElementById("haxe:trace");
              null != e && (e.innerHTML = "");
            }),
            (js.Boot.isClass = function (e) {
              return e.__name__;
            }),
            (js.Boot.isEnum = function (e) {
              return e.__ename__;
            }),
            (js.Boot.getClass = function (e) {
              return e.__class__;
            }),
            (js.Boot.__string_rec = function (e, t) {
              if (null == e) return "null";
              if (t.length >= 5) return "<...>";
              var n = _typeof(e);
              switch (
                ("function" == n &&
                  (e.__name__ || e.__ename__) &&
                  (n = "object"),
                n)
              ) {
                case "object":
                  if (e instanceof Array) {
                    if (e.__enum__) {
                      if (2 == e.length) return e[0];
                      var i = e[0] + "(";
                      t += "\t";
                      for (var r = 2, a = e.length; r < a; ) {
                        i +=
                          2 != (o = r++)
                            ? "," + js.Boot.__string_rec(e[o], t)
                            : js.Boot.__string_rec(e[o], t);
                      }
                      return i + ")";
                    }
                    var o,
                      s = e.length;
                    i = "[";
                    t += "\t";
                    for (a = 0; a < s; ) {
                      var l = a++;
                      i += (l > 0 ? "," : "") + js.Boot.__string_rec(e[l], t);
                    }
                    return (i += "]");
                  }
                  var c;
                  try {
                    c = e.toString;
                  } catch (e) {
                    return "???";
                  }
                  if (null != c && c != Object.toString) {
                    var u = e.toString();
                    if ("[object Object]" != u) return u;
                  }
                  var d = null;
                  i = "{\n";
                  t += "\t";
                  var m = null != e.hasOwnProperty;
                  for (var d in e)
                    (m && !e.hasOwnProperty(d)) ||
                      ("prototype" != d &&
                        "__class__" != d &&
                        "__super__" != d &&
                        "__interfaces__" != d &&
                        "__properties__" != d &&
                        (2 != i.length && (i += ", \n"),
                        (i += t + d + " : " + js.Boot.__string_rec(e[d], t))));
                  return (i += "\n" + (t = t.substring(1)) + "}");
                case "function":
                  return "<function>";
                case "string":
                  return e;
                default:
                  return String(e);
              }
            }),
            (js.Boot.__interfLoop = function (e, t) {
              if (null == e) return !1;
              if (e == t) return !0;
              var n = e.__interfaces__;
              if (null != n)
                for (var i = 0, r = n.length; i < r; ) {
                  var a = n[i++];
                  if (a == t || js.Boot.__interfLoop(a, t)) return !0;
                }
              return js.Boot.__interfLoop(e.__super__, t);
            }),
            (js.Boot.__instanceof = function (e, t) {
              try {
                if (e instanceof t) return t != Array || null == e.__enum__;
                if (js.Boot.__interfLoop(e.__class__, t)) return !0;
              } catch (e) {
                if (null == t) return !1;
              }
              switch (t) {
                case Int:
                  return Math.ceil(e % 2147483648) === e;
                case Float:
                  return "number" == typeof e;
                case Bool:
                  return !0 === e || !1 === e;
                case String:
                  return "string" == typeof e;
                case Dynamic:
                  return !0;
                default:
                  return (
                    null != e &&
                    ((t == Class && null != e.__name__) ||
                      (t == Enum && null != e.__ename__) ||
                      e.__enum__ == t)
                  );
              }
            }),
            (js.Boot.__cast = function (e, t) {
              if (js.Boot.__instanceof(e, t)) return e;
              throw "Cannot cast " + Std.string(e) + " to " + Std.string(t);
            }),
            (js.Lib = function () {}),
            (js.Lib.__name__ = !0),
            (js.Lib.debug = function () {}),
            (js.Lib.alert = function (e) {
              alert(js.Boot.__string_rec(e, ""));
            }),
            (js.Lib.eval = function (code) {
              return eval(code);
            }),
            (js.Lib.setErrorHandler = function (e) {
              js.Lib.onerror = e;
            }),
            Array.prototype.indexOf &&
              (HxOverrides.remove = function (e, t) {
                var n = e.indexOf(t);
                return -1 != n && (e.splice(n, 1), !0);
              }),
            (Math.__name__ = ["Math"]),
            (Math.NaN = Number.NaN),
            (Math.NEGATIVE_INFINITY = Number.NEGATIVE_INFINITY),
            (Math.POSITIVE_INFINITY = Number.POSITIVE_INFINITY),
            (Math.isFinite = function (e) {
              return isFinite(e);
            }),
            (Math.isNaN = function (e) {
              return isNaN(e);
            }),
            (String.prototype.__class__ = String),
            (String.__name__ = !0),
            (Array.prototype.__class__ = Array),
            (Array.__name__ = !0),
            (Date.prototype.__class__ = Date),
            (Date.__name__ = ["Date"]);
          var Int = { __name__: ["Int"] },
            Dynamic = { __name__: ["Dynamic"] },
            Float = Number;
          Float.__name__ = ["Float"];
          var Bool = Boolean;
          Bool.__ename__ = ["Bool"];
          var Class = { __name__: ["Class"] },
            Enum = {},
            Void = { __ename__: ["Void"] };
          "undefined" != typeof document && (js.Lib.document = document),
            "undefined" != typeof window &&
              ((js.Lib.window = window),
              (js.Lib.window.onerror = function (e, t, n) {
                var i = js.Lib.onerror;
                return null != i && i(e, [t + ":" + n]);
              })),
            com.wiris.js.JsPluginTools.main(),
            delete Array.prototype.__class__;
        })(),
          (function () {
            var HxOverrides = function () {};
            (HxOverrides.__name__ = !0),
              (HxOverrides.dateStr = function (e) {
                var t = e.getMonth() + 1,
                  n = e.getDate(),
                  i = e.getHours(),
                  r = e.getMinutes(),
                  a = e.getSeconds();
                return (
                  e.getFullYear() +
                  "-" +
                  (t < 10 ? "0" + t : "" + t) +
                  "-" +
                  (n < 10 ? "0" + n : "" + n) +
                  " " +
                  (i < 10 ? "0" + i : "" + i) +
                  ":" +
                  (r < 10 ? "0" + r : "" + r) +
                  ":" +
                  (a < 10 ? "0" + a : "" + a)
                );
              }),
              (HxOverrides.strDate = function (e) {
                switch (e.length) {
                  case 8:
                    var t = e.split(":"),
                      n = new Date();
                    return (
                      n.setTime(0),
                      n.setUTCHours(t[0]),
                      n.setUTCMinutes(t[1]),
                      n.setUTCSeconds(t[2]),
                      n
                    );
                  case 10:
                    t = e.split("-");
                    return new Date(t[0], t[1] - 1, t[2], 0, 0, 0);
                  case 19:
                    var i = (t = e.split(" "))[0].split("-"),
                      r = t[1].split(":");
                    return new Date(i[0], i[1] - 1, i[2], r[0], r[1], r[2]);
                  default:
                    throw "Invalid date format : " + e;
                }
              }),
              (HxOverrides.cca = function (e, t) {
                var n = e.charCodeAt(t);
                if (n == n) return n;
              }),
              (HxOverrides.substr = function (e, t, n) {
                return null != t && 0 != t && null != n && n < 0
                  ? ""
                  : (null == n && (n = e.length),
                    t < 0
                      ? (t = e.length + t) < 0 && (t = 0)
                      : n < 0 && (n = e.length + n - t),
                    e.substr(t, n));
              }),
              (HxOverrides.remove = function (e, t) {
                for (var n = 0, i = e.length; n < i; ) {
                  if (e[n] == t) return e.splice(n, 1), !0;
                  n++;
                }
                return !1;
              }),
              (HxOverrides.iter = function (e) {
                return {
                  cur: 0,
                  arr: e,
                  hasNext: function () {
                    return this.cur < this.arr.length;
                  },
                  next: function () {
                    return this.arr[this.cur++];
                  },
                };
              });
            var IntIter = function (e, t) {
              (this.min = e), (this.max = t);
            };
            (IntIter.__name__ = !0),
              (IntIter.prototype = {
                next: function () {
                  return this.min++;
                },
                hasNext: function () {
                  return this.min < this.max;
                },
                __class__: IntIter,
              });
            var Std = function () {};
            (Std.__name__ = !0),
              (Std.is = function (e, t) {
                return js.Boot.__instanceof(e, t);
              }),
              (Std.string = function (e) {
                return js.Boot.__string_rec(e, "");
              }),
              (Std.int = function (e) {
                return 0 | e;
              }),
              (Std.parseInt = function (e) {
                var t = parseInt(e, 10);
                return (
                  0 != t ||
                    (120 != HxOverrides.cca(e, 1) &&
                      88 != HxOverrides.cca(e, 1)) ||
                    (t = parseInt(e)),
                  isNaN(t) ? null : t
                );
              }),
              (Std.parseFloat = function (e) {
                return parseFloat(e);
              }),
              (Std.random = function (e) {
                return Math.floor(Math.random() * e);
              });
            var com = com || {};
            com.wiris || (com.wiris = {}),
              com.wiris.js || (com.wiris.js = {}),
              (com.wiris.js.JsPluginTools = function () {
                this.tryReady();
              }),
              (com.wiris.js.JsPluginTools.__name__ = !0),
              (com.wiris.js.JsPluginTools.main = function () {
                var e;
                (e = com.wiris.js.JsPluginTools.getInstance()),
                  haxe.Timer.delay($bind(e, e.tryReady), 100);
              }),
              (com.wiris.js.JsPluginTools.getInstance = function () {
                return (
                  null == com.wiris.js.JsPluginTools.instance &&
                    (com.wiris.js.JsPluginTools.instance =
                      new com.wiris.js.JsPluginTools()),
                  com.wiris.js.JsPluginTools.instance
                );
              }),
              (com.wiris.js.JsPluginTools.bypassEncapsulation = function () {
                null == window.com && (window.com = {}),
                  null == window.com.wiris && (window.com.wiris = {}),
                  null == window.com.wiris.js && (window.com.wiris.js = {}),
                  null == window.com.wiris.js.JsPluginTools &&
                    (window.com.wiris.js.JsPluginTools =
                      com.wiris.js.JsPluginTools.getInstance());
              }),
              (com.wiris.js.JsPluginTools.prototype = {
                md5encode: function (e) {
                  return haxe.Md5.encode(e);
                },
                doLoad: function () {
                  (this.ready = !0),
                    (com.wiris.js.JsPluginTools.instance = this),
                    com.wiris.js.JsPluginTools.bypassEncapsulation();
                },
                tryReady: function () {
                  (this.ready = !1),
                    js.Lib.document.readyState &&
                      (this.doLoad(), (this.ready = !0)),
                    this.ready ||
                      haxe.Timer.delay($bind(this, this.tryReady), 100);
                },
                __class__: com.wiris.js.JsPluginTools,
              });
            var haxe = haxe || {};
            (haxe.Log = function () {}),
              (haxe.Log.__name__ = !0),
              (haxe.Log.trace = function (e, t) {
                js.Boot.__trace(e, t);
              }),
              (haxe.Log.clear = function () {
                js.Boot.__clear_trace();
              }),
              (haxe.Md5 = function () {}),
              (haxe.Md5.__name__ = !0),
              (haxe.Md5.encode = function (e) {
                return new haxe.Md5().doEncode(e);
              }),
              (haxe.Md5.prototype = {
                doEncode: function (e) {
                  for (
                    var t = this.str2blks(e),
                      n = 1732584193,
                      i = -271733879,
                      r = -1732584194,
                      a = 271733878,
                      o = 0;
                    o < t.length;

                  ) {
                    var s = n,
                      l = i,
                      c = r,
                      u = a;
                    0,
                      (n = this.ff(n, i, r, a, t[o], 7, -680876936)),
                      (a = this.ff(a, n, i, r, t[o + 1], 12, -389564586)),
                      (r = this.ff(r, a, n, i, t[o + 2], 17, 606105819)),
                      (i = this.ff(i, r, a, n, t[o + 3], 22, -1044525330)),
                      (n = this.ff(n, i, r, a, t[o + 4], 7, -176418897)),
                      (a = this.ff(a, n, i, r, t[o + 5], 12, 1200080426)),
                      (r = this.ff(r, a, n, i, t[o + 6], 17, -1473231341)),
                      (i = this.ff(i, r, a, n, t[o + 7], 22, -45705983)),
                      (n = this.ff(n, i, r, a, t[o + 8], 7, 1770035416)),
                      (a = this.ff(a, n, i, r, t[o + 9], 12, -1958414417)),
                      (r = this.ff(r, a, n, i, t[o + 10], 17, -42063)),
                      (i = this.ff(i, r, a, n, t[o + 11], 22, -1990404162)),
                      (n = this.ff(n, i, r, a, t[o + 12], 7, 1804603682)),
                      (a = this.ff(a, n, i, r, t[o + 13], 12, -40341101)),
                      (r = this.ff(r, a, n, i, t[o + 14], 17, -1502002290)),
                      (i = this.ff(i, r, a, n, t[o + 15], 22, 1236535329)),
                      (n = this.gg(n, i, r, a, t[o + 1], 5, -165796510)),
                      (a = this.gg(a, n, i, r, t[o + 6], 9, -1069501632)),
                      (r = this.gg(r, a, n, i, t[o + 11], 14, 643717713)),
                      (i = this.gg(i, r, a, n, t[o], 20, -373897302)),
                      (n = this.gg(n, i, r, a, t[o + 5], 5, -701558691)),
                      (a = this.gg(a, n, i, r, t[o + 10], 9, 38016083)),
                      (r = this.gg(r, a, n, i, t[o + 15], 14, -660478335)),
                      (i = this.gg(i, r, a, n, t[o + 4], 20, -405537848)),
                      (n = this.gg(n, i, r, a, t[o + 9], 5, 568446438)),
                      (a = this.gg(a, n, i, r, t[o + 14], 9, -1019803690)),
                      (r = this.gg(r, a, n, i, t[o + 3], 14, -187363961)),
                      (i = this.gg(i, r, a, n, t[o + 8], 20, 1163531501)),
                      (n = this.gg(n, i, r, a, t[o + 13], 5, -1444681467)),
                      (a = this.gg(a, n, i, r, t[o + 2], 9, -51403784)),
                      (r = this.gg(r, a, n, i, t[o + 7], 14, 1735328473)),
                      (i = this.gg(i, r, a, n, t[o + 12], 20, -1926607734)),
                      (n = this.hh(n, i, r, a, t[o + 5], 4, -378558)),
                      (a = this.hh(a, n, i, r, t[o + 8], 11, -2022574463)),
                      (r = this.hh(r, a, n, i, t[o + 11], 16, 1839030562)),
                      (i = this.hh(i, r, a, n, t[o + 14], 23, -35309556)),
                      (n = this.hh(n, i, r, a, t[o + 1], 4, -1530992060)),
                      (a = this.hh(a, n, i, r, t[o + 4], 11, 1272893353)),
                      (r = this.hh(r, a, n, i, t[o + 7], 16, -155497632)),
                      (i = this.hh(i, r, a, n, t[o + 10], 23, -1094730640)),
                      (n = this.hh(n, i, r, a, t[o + 13], 4, 681279174)),
                      (a = this.hh(a, n, i, r, t[o], 11, -358537222)),
                      (r = this.hh(r, a, n, i, t[o + 3], 16, -722521979)),
                      (i = this.hh(i, r, a, n, t[o + 6], 23, 76029189)),
                      (n = this.hh(n, i, r, a, t[o + 9], 4, -640364487)),
                      (a = this.hh(a, n, i, r, t[o + 12], 11, -421815835)),
                      (r = this.hh(r, a, n, i, t[o + 15], 16, 530742520)),
                      (i = this.hh(i, r, a, n, t[o + 2], 23, -995338651)),
                      (n = this.ii(n, i, r, a, t[o], 6, -198630844)),
                      (a = this.ii(a, n, i, r, t[o + 7], 10, 1126891415)),
                      (r = this.ii(r, a, n, i, t[o + 14], 15, -1416354905)),
                      (i = this.ii(i, r, a, n, t[o + 5], 21, -57434055)),
                      (n = this.ii(n, i, r, a, t[o + 12], 6, 1700485571)),
                      (a = this.ii(a, n, i, r, t[o + 3], 10, -1894986606)),
                      (r = this.ii(r, a, n, i, t[o + 10], 15, -1051523)),
                      (i = this.ii(i, r, a, n, t[o + 1], 21, -2054922799)),
                      (n = this.ii(n, i, r, a, t[o + 8], 6, 1873313359)),
                      (a = this.ii(a, n, i, r, t[o + 15], 10, -30611744)),
                      (r = this.ii(r, a, n, i, t[o + 6], 15, -1560198380)),
                      (i = this.ii(i, r, a, n, t[o + 13], 21, 1309151649)),
                      (n = this.ii(n, i, r, a, t[o + 4], 6, -145523070)),
                      (a = this.ii(a, n, i, r, t[o + 11], 10, -1120210379)),
                      (r = this.ii(r, a, n, i, t[o + 2], 15, 718787259)),
                      (i = this.ii(i, r, a, n, t[o + 9], 21, -343485551)),
                      (n = this.addme(n, s)),
                      (i = this.addme(i, l)),
                      (r = this.addme(r, c)),
                      (a = this.addme(a, u)),
                      (o += 16);
                  }
                  return (
                    this.rhex(n) + this.rhex(i) + this.rhex(r) + this.rhex(a)
                  );
                },
                ii: function (e, t, n, i, r, a, o) {
                  return this.cmn(
                    this.bitXOR(n, this.bitOR(t, ~i)),
                    e,
                    t,
                    r,
                    a,
                    o
                  );
                },
                hh: function (e, t, n, i, r, a, o) {
                  return this.cmn(
                    this.bitXOR(this.bitXOR(t, n), i),
                    e,
                    t,
                    r,
                    a,
                    o
                  );
                },
                gg: function (e, t, n, i, r, a, o) {
                  return this.cmn(
                    this.bitOR(this.bitAND(t, i), this.bitAND(n, ~i)),
                    e,
                    t,
                    r,
                    a,
                    o
                  );
                },
                ff: function (e, t, n, i, r, a, o) {
                  return this.cmn(
                    this.bitOR(this.bitAND(t, n), this.bitAND(~t, i)),
                    e,
                    t,
                    r,
                    a,
                    o
                  );
                },
                cmn: function (e, t, n, i, r, a) {
                  return this.addme(
                    this.rol(this.addme(this.addme(t, e), this.addme(i, a)), r),
                    n
                  );
                },
                rol: function (e, t) {
                  return (e << t) | (e >>> (32 - t));
                },
                str2blks: function (e) {
                  for (
                    var t = 1 + ((e.length + 8) >> 6),
                      n = new Array(),
                      i = 0,
                      r = 16 * t;
                    i < r;

                  ) {
                    n[(a = i++)] = 0;
                  }
                  for (var a = 0; a < e.length; )
                    (n[a >> 2] |=
                      HxOverrides.cca(e, a) << (((8 * e.length + a) % 4) * 8)),
                      a++;
                  n[a >> 2] |= 128 << (((8 * e.length + a) % 4) * 8);
                  var o = 8 * e.length,
                    s = 16 * t - 2;
                  return (
                    (n[s] = 255 & o),
                    (n[s] |= ((o >>> 8) & 255) << 8),
                    (n[s] |= ((o >>> 16) & 255) << 16),
                    (n[s] |= ((o >>> 24) & 255) << 24),
                    n
                  );
                },
                rhex: function (e) {
                  for (var t = "", n = "0123456789abcdef", i = 0; i < 4; ) {
                    var r = i++;
                    t +=
                      n.charAt((e >> (8 * r + 4)) & 15) +
                      n.charAt((e >> (8 * r)) & 15);
                  }
                  return t;
                },
                addme: function (e, t) {
                  var n = (65535 & e) + (65535 & t);
                  return (
                    (((e >> 16) + (t >> 16) + (n >> 16)) << 16) | (65535 & n)
                  );
                },
                bitAND: function (e, t) {
                  return (((e >>> 1) & (t >>> 1)) << 1) | (1 & e & t);
                },
                bitXOR: function (e, t) {
                  return (((e >>> 1) ^ (t >>> 1)) << 1) | ((1 & e) ^ (1 & t));
                },
                bitOR: function (e, t) {
                  return (((e >>> 1) | (t >>> 1)) << 1) | ((1 & e) | (1 & t));
                },
                __class__: haxe.Md5,
              }),
              (haxe.Timer = function (e) {
                var t = this;
                this.id = window.setInterval(function () {
                  t.run();
                }, e);
              }),
              (haxe.Timer.__name__ = !0),
              (haxe.Timer.delay = function (e, t) {
                var n = new haxe.Timer(t);
                return (
                  (n.run = function () {
                    n.stop(), e();
                  }),
                  n
                );
              }),
              (haxe.Timer.measure = function (e, t) {
                var n = haxe.Timer.stamp(),
                  i = e();
                return haxe.Log.trace(haxe.Timer.stamp() - n + "s", t), i;
              }),
              (haxe.Timer.stamp = function () {
                return new Date().getTime() / 1e3;
              }),
              (haxe.Timer.prototype = {
                run: function () {},
                stop: function () {
                  null != this.id &&
                    (window.clearInterval(this.id), (this.id = null));
                },
                __class__: haxe.Timer,
              });
            var js = js || {},
              $_;
            function $bind(e, t) {
              var n = function e() {
                return e.method.apply(e.scope, arguments);
              };
              return (n.scope = e), (n.method = t), n;
            }
            (js.Boot = function () {}),
              (js.Boot.__name__ = !0),
              (js.Boot.__unhtml = function (e) {
                return e
                  .split("&")
                  .join("&amp;")
                  .split("<")
                  .join("&lt;")
                  .split(">")
                  .join("&gt;");
              }),
              (js.Boot.__trace = function (e, t) {
                var n,
                  i = null != t ? t.fileName + ":" + t.lineNumber + ": " : "";
                (i += js.Boot.__string_rec(e, "")),
                  "undefined" != typeof document &&
                  null != (n = document.getElementById("haxe:trace"))
                    ? (n.innerHTML += js.Boot.__unhtml(i) + "<br/>")
                    : "undefined" != typeof console &&
                      null != console.log &&
                      console.log(i);
              }),
              (js.Boot.__clear_trace = function () {
                var e = document.getElementById("haxe:trace");
                null != e && (e.innerHTML = "");
              }),
              (js.Boot.isClass = function (e) {
                return e.__name__;
              }),
              (js.Boot.isEnum = function (e) {
                return e.__ename__;
              }),
              (js.Boot.getClass = function (e) {
                return e.__class__;
              }),
              (js.Boot.__string_rec = function (e, t) {
                if (null == e) return "null";
                if (t.length >= 5) return "<...>";
                var n = _typeof(e);
                switch (
                  ("function" == n &&
                    (e.__name__ || e.__ename__) &&
                    (n = "object"),
                  n)
                ) {
                  case "object":
                    if (e instanceof Array) {
                      if (e.__enum__) {
                        if (2 == e.length) return e[0];
                        var i = e[0] + "(";
                        t += "\t";
                        for (var r = 2, a = e.length; r < a; ) {
                          i +=
                            2 != (o = r++)
                              ? "," + js.Boot.__string_rec(e[o], t)
                              : js.Boot.__string_rec(e[o], t);
                        }
                        return i + ")";
                      }
                      var o,
                        s = e.length;
                      i = "[";
                      t += "\t";
                      for (a = 0; a < s; ) {
                        var l = a++;
                        i += (l > 0 ? "," : "") + js.Boot.__string_rec(e[l], t);
                      }
                      return (i += "]");
                    }
                    var c;
                    try {
                      c = e.toString;
                    } catch (e) {
                      return "???";
                    }
                    if (null != c && c != Object.toString) {
                      var u = e.toString();
                      if ("[object Object]" != u) return u;
                    }
                    var d = null;
                    i = "{\n";
                    t += "\t";
                    var m = null != e.hasOwnProperty;
                    for (var d in e)
                      (m && !e.hasOwnProperty(d)) ||
                        ("prototype" != d &&
                          "__class__" != d &&
                          "__super__" != d &&
                          "__interfaces__" != d &&
                          "__properties__" != d &&
                          (2 != i.length && (i += ", \n"),
                          (i +=
                            t + d + " : " + js.Boot.__string_rec(e[d], t))));
                    return (i += "\n" + (t = t.substring(1)) + "}");
                  case "function":
                    return "<function>";
                  case "string":
                    return e;
                  default:
                    return String(e);
                }
              }),
              (js.Boot.__interfLoop = function (e, t) {
                if (null == e) return !1;
                if (e == t) return !0;
                var n = e.__interfaces__;
                if (null != n)
                  for (var i = 0, r = n.length; i < r; ) {
                    var a = n[i++];
                    if (a == t || js.Boot.__interfLoop(a, t)) return !0;
                  }
                return js.Boot.__interfLoop(e.__super__, t);
              }),
              (js.Boot.__instanceof = function (e, t) {
                try {
                  if (e instanceof t) return t != Array || null == e.__enum__;
                  if (js.Boot.__interfLoop(e.__class__, t)) return !0;
                } catch (e) {
                  if (null == t) return !1;
                }
                switch (t) {
                  case Int:
                    return Math.ceil(e % 2147483648) === e;
                  case Float:
                    return "number" == typeof e;
                  case Bool:
                    return !0 === e || !1 === e;
                  case String:
                    return "string" == typeof e;
                  case Dynamic:
                    return !0;
                  default:
                    return (
                      null != e &&
                      ((t == Class && null != e.__name__) ||
                        (t == Enum && null != e.__ename__) ||
                        e.__enum__ == t)
                    );
                }
              }),
              (js.Boot.__cast = function (e, t) {
                if (js.Boot.__instanceof(e, t)) return e;
                throw "Cannot cast " + Std.string(e) + " to " + Std.string(t);
              }),
              (js.Lib = function () {}),
              (js.Lib.__name__ = !0),
              (js.Lib.debug = function () {}),
              (js.Lib.alert = function (e) {
                alert(js.Boot.__string_rec(e, ""));
              }),
              (js.Lib.eval = function (code) {
                return eval(code);
              }),
              (js.Lib.setErrorHandler = function (e) {
                js.Lib.onerror = e;
              }),
              Array.prototype.indexOf &&
                (HxOverrides.remove = function (e, t) {
                  var n = e.indexOf(t);
                  return -1 != n && (e.splice(n, 1), !0);
                }),
              (Math.__name__ = ["Math"]),
              (Math.NaN = Number.NaN),
              (Math.NEGATIVE_INFINITY = Number.NEGATIVE_INFINITY),
              (Math.POSITIVE_INFINITY = Number.POSITIVE_INFINITY),
              (Math.isFinite = function (e) {
                return isFinite(e);
              }),
              (Math.isNaN = function (e) {
                return isNaN(e);
              }),
              (String.prototype.__class__ = String),
              (String.__name__ = !0),
              (Array.prototype.__class__ = Array),
              (Array.__name__ = !0),
              (Date.prototype.__class__ = Date),
              (Date.__name__ = ["Date"]);
            var Int = { __name__: ["Int"] },
              Dynamic = { __name__: ["Dynamic"] },
              Float = Number;
            Float.__name__ = ["Float"];
            var Bool = Boolean;
            Bool.__ename__ = ["Bool"];
            var Class = { __name__: ["Class"] },
              Enum = {},
              Void = { __ename__: ["Void"] };
            "undefined" != typeof document && (js.Lib.document = document),
              "undefined" != typeof window &&
                ((js.Lib.window = window),
                (js.Lib.window.onerror = function (e, t, n) {
                  var i = js.Lib.onerror;
                  return null != i && i(e, [t + ":" + n]);
                })),
              com.wiris.js.JsPluginTools.main();
          })(),
          delete Array.prototype.__class__;
      },
      789: (e, t, n) => {
        "use strict";
        n.d(t, { Z: () => a });
        var i = n(609),
          r = n.n(i)()(function (e) {
            return e[1];
          });
        r.push([
          e.id,
          ".wrs_modal_overlay {\n  position: fixed;\n  font-family: arial, sans-serif;\n  top: 0;\n  right: 0;\n  left: 0;\n  bottom: 0;\n  background: rgba(0, 0, 0, 0.8);\n  z-index: 999998;\n  opacity: 0.65;\n  pointer-events: auto;\n}\n\n.wrs_modal_overlay.wrs_modal_ios {\n  visibility: hidden;\n  display: none;\n}\n\n.wrs_modal_overlay.wrs_modal_android {\n  visibility: hidden;\n  display: none;\n}\n\n.wrs_modal_overlay.wrs_modal_ios.moodle {\n  position: fixed;\n}\n\n.wrs_modal_overlay.wrs_modal_desktop.wrs_stack {\n  background: rgba(0, 0, 0, 0);\n  display: none;\n}\n\n.wrs_modal_overlay.wrs_modal_desktop.wrs_maximized {\n  background: rgba(0, 0, 0, 0.8);\n}\n\n.wrs_modal_overlay.wrs_modal_desktop.wrs_minimized {\n  background: rgba(0, 0, 0, 0);\n  display: none;\n}\n\n.wrs_modal_overlay.wrs_modal_desktop.wrs_closed {\n  background: rgba(0, 0, 0, 0);\n  display: none;\n}\n\n.wrs_modal_title {\n  color: #fff;\n  padding: 5px 0 5px 10px;\n  -moz-user-select: none;\n  -webkit-user-select: none;\n  -ms-user-select: none;\n  user-select: none;\n  text-align: left;\n}\n\n.wrs_modal_close_button {\n  float: right;\n  cursor: pointer;\n  color: #fff;\n  padding: 5px 10px 5px 0;\n  margin: 10px 7px 0 0;\n  background-repeat: no-repeat;\n}\n\n.wrs_modal_minimize_button {\n  float: right;\n  cursor: pointer;\n  color: #fff;\n  padding: 5px 10px 5px 0;\n  top: inherit;\n  margin: 10px 7px 0 0;\n}\n\n.wrs_modal_stack_button {\n  float: right;\n  cursor: pointer;\n  color: #fff;\n  margin: 10px 7px 0 0;\n  padding: 5px 10px 5px 0;\n  top: inherit;\n}\n\n.wrs_modal_stack_button.wrs_stack {\n  visibility: hidden;\n  margin: 0;\n  padding: 0;\n}\n\n.wrs_modal_stack_button.wrs_minimized {\n  visibility: hidden;\n  margin: 0;\n  padding: 0;\n}\n\n.wrs_modal_maximize_button {\n  float: right;\n  cursor: pointer;\n  color: #fff;\n  margin: 10px 7px 0 0;\n  padding: 5px 10px 5px 0;\n  top: inherit;\n}\n\n.wrs_modal_maximize_button.wrs_maximized {\n  visibility: hidden;\n  margin: 0;\n  padding: 0;\n}\n\n.wrs_modal_title_bar {\n  display: block;\n  background-color: #778e9a;\n}\n\n.wrs_modal_dialogContainer {\n  border: none;\n  background: #fafafa;\n  z-index: 999999;\n}\n\n.wrs_modal_dialogContainer.wrs_modal_desktop {\n  font-size: 14px;\n}\n\n.wrs_modal_dialogContainer.wrs_modal_desktop.wrs_maximized {\n  position: fixed;\n}\n\n.wrs_modal_dialogContainer.wrs_modal_desktop.wrs_minimized {\n  position: fixed;\n  top: inherit;\n  margin: 0;\n  margin-right: 10px;\n}\n\n.wrs_modal_dialogContainer.wrs_closed {\n  visibility: hidden;\n  display: none;\n  opacity: 0;\n}\n\n/* Class that exists but hasn't got css properties defined\n.wrs_modal_dialogContainer.wrs_modal_desktop.wrs_minimized.wrs_drag {} */\n\n.wrs_modal_dialogContainer.wrs_modal_desktop.wrs_stack {\n  position: fixed;\n  bottom: 0;\n  right: 0;\n  box-shadow: rgba(0, 0, 0, 0.5) 0 2px 8px;\n}\n\n.wrs_modal_dialogContainer.wrs_drag {\n  box-shadow: rgba(0, 0, 0, 0.5) 0 2px 8px;\n}\n\n.wrs_modal_dialogContainer.wrs_modal_desktop.wrs_drag {\n  box-shadow: rgba(0, 0, 0, 0.5) 0 2px 8px;\n}\n\n.wrs_modal_dialogContainer.wrs_modal_android {\n  margin: auto;\n  position: fixed;\n  width: 99%;\n  height: 99%;\n  overflow: hidden;\n  transform: translate(50%, -50%);\n  top: 50%;\n  right: 50% !important;\n}\n\n.wrs_modal_dialogContainer.wrs_modal_ios {\n  margin: auto;\n  position: fixed;\n  width: 100%;\n  height: 100%;\n  overflow: hidden;\n  transform: translate(50%, -50%);\n  top: 50%;\n  right: 50% !important;\n}\n\n/* Class that exists but hasn't got css properties defined\n.wrs_content_container.wrs_maximized {} */\n\n.wrs_content_container.wrs_minimized {\n  display: none;\n}\n\n/* .wrs_editor {\n    flex-grow: 1;\n} */\n\n.wrs_content_container.wrs_modal_android {\n  width: 100%;\n  height: 0%;\n  flex-grow: 1;\n  display: flex;\n  flex-direction: column;\n}\n\n.wrs_content_container.wrs_modal_android > div:first-child {\n  flex-grow: 1;\n}\n\n.wrs_content_container.wrs_modal_ios > div:first-child {\n  flex-grow: 1;\n}\n\n.wrs_content_container.wrs_modal_desktop > div:first-child {\n  flex-grow: 1;\n}\n\n.wrs_modal_wrapper.wrs_modal_android {\n  margin: auto;\n  display: flex;\n  flex-direction: column;\n  height: 100%;\n  width: 100%;\n}\n\n.wrs_content_container.wrs_modal_desktop {\n  width: 100%;\n  flex-grow: 1;\n  display: flex;\n  flex-direction: column;\n}\n\n.wrs_content_container.wrs_modal_ios {\n  width: 100%;\n  height: 0%;\n  flex-grow: 1;\n  display: flex;\n  flex-direction: column;\n}\n\n.wrs_modal_wrapper.wrs_modal_ios {\n  margin: auto;\n  display: flex;\n  flex-direction: column;\n  height: 100%;\n  width: 100%;\n}\n\n.wrs_virtual_keyboard {\n  height: 100%;\n  width: 100%;\n  top: 0;\n  left: 50%;\n  transform: translate(-50%, 0%);\n}\n\n@media all and (orientation: portrait) {\n  .wrs_modal_dialogContainer.wrs_modal_mobile {\n    width: 100vmin;\n    height: 100vmin;\n    margin: auto;\n    border-width: 0;\n  }\n\n  .wrs_modal_wrapper.wrs_modal_mobile {\n    width: 100vmin;\n    height: 100vmin;\n    margin: auto;\n  }\n}\n\n@media all and (orientation: landscape) {\n  .wrs_modal_dialogContainer.wrs_modal_mobile {\n    width: 100vmin;\n    height: 100vmin;\n    margin: auto;\n    border-width: 0;\n  }\n\n  .wrs_modal_wrapper.wrs_modal_mobile {\n    width: 100vmin;\n    height: 100vmin;\n    margin: auto;\n  }\n}\n\n.wrs_modal_dialogContainer.wrs_modal_badStock {\n  width: 100%;\n  height: 280px;\n  margin: 0 auto;\n  border-width: 0;\n}\n\n.wrs_modal_wrapper.wrs_modal_badStock {\n  width: 100%;\n  height: 280px;\n  margin: 0 auto;\n  border-width: 0;\n}\n\n.wrs_noselect {\n  -moz-user-select: none;\n  -khtml-user-select: none;\n  -webkit-user-select: none;\n  -ms-user-select: none;\n  user-select: none;\n}\n\n.wrs_bottom_right_resizer {\n  width: 10px;\n  height: 10px;\n  color: #778e9a;\n  position: absolute;\n  right: 4px;\n  bottom: 8px;\n  cursor: se-resize;\n  -moz-user-select: none;\n  -webkit-user-select: none;\n  -ms-user-select: none;\n  user-select: none;\n}\n\n.wrs_bottom_left_resizer {\n  width: 15px;\n  height: 15px;\n  color: #778e9a;\n  position: absolute;\n  left: 0;\n  top: 0;\n  cursor: se-resize;\n}\n\n.wrs_modal_controls {\n  height: 42px;\n  margin: 3px 0;\n  overflow: hidden;\n  line-height: normal;\n}\n\n.wrs_modal_links {\n  margin: 10px auto;\n  margin-bottom: 0;\n  font-family: arial, sans-serif;\n  padding: 6px;\n  display: inline;\n  float: right;\n  text-align: right;\n}\n\n.wrs_modal_links > a {\n  text-decoration: none;\n  color: #778e9a;\n  font-size: 16px;\n}\n\n.wrs_modal_button_cancel,\n.wrs_modal_button_cancel:hover,\n.wrs_modal_button_cancel:visited,\n.wrs_modal_button_cancel:active,\n.wrs_modal_button_cancel:focus {\n  min-width: 80px;\n  font-size: 14px;\n  border-radius: 3px;\n  border: 1px solid #778e9a;\n  padding: 6px 8px;\n  margin: 10px auto;\n  margin-left: 5px;\n  margin-bottom: 0;\n  cursor: pointer;\n  font-family: arial, sans-serif;\n  background-color: #ddd;\n  height: 32px;\n}\n\n.wrs_modal_button_accept,\n.wrs_modal_button_accept:hover,\n.wrs_modal_button_accept:visited,\n.wrs_modal_button_accept:active,\n.wrs_modal_button_accept:focus {\n  min-width: 80px;\n  font-size: 14px;\n  border-radius: 3px;\n  border: 1px solid #778e9a;\n  padding: 6px 8px;\n  margin: 10px auto;\n  margin-right: 5px;\n  margin-bottom: 0;\n  color: #fff;\n  background: #778e9a;\n  cursor: pointer;\n  font-family: arial, sans-serif;\n  height: 32px;\n}\n\n.wrs_editor_vertical_bar {\n  height: 20px;\n  float: right;\n  background: none;\n  width: 20px;\n  cursor: pointer;\n}\n\n.wrs_modal_buttons_container {\n  display: inline;\n  float: left;\n}\n\n.wrs_modal_buttons_container.wrs_modalAndroid {\n  padding-left: 6px;\n}\n\n.wrs_modal_buttons_container.wrs_modalDesktop {\n  padding-left: 0;\n}\n\n.wrs_modal_buttons_container > button {\n  line-height: normal;\n  background-image: none;\n}\n\n.wrs_modal_wrapper {\n  margin: 6px;\n  display: flex;\n  flex-direction: column;\n}\n\n.wrs_modal_wrapper.wrs_modal_desktop.wrs_minimized {\n  display: none;\n}\n\n@media only screen and (max-device-width: 480px) and (orientation: portrait) {\n  #wrs_modal_wrapper {\n    width: 140%;\n  }\n}\n\n.wrs_popupmessage_overlay_envolture {\n  display: none;\n  width: 100%;\n}\n\n.wrs_popupmessage_overlay {\n  position: absolute;\n  width: 100%;\n  height: 100%;\n  top: 0;\n  left: 0;\n  right: 0;\n  bottom: 0;\n  background-color: rgba(0, 0, 0, 0.5);\n  z-index: 4;\n  cursor: pointer;\n}\n\n.wrs_popupmessage_panel {\n  top: 50%;\n  left: 50%;\n  transform: translate(-50%, -50%);\n  position: absolute;\n  background: white;\n  max-width: 500px;\n  width: 75%;\n  border-radius: 2px;\n  padding: 20px;\n  font-family: sans-serif;\n  font-size: 15px;\n  text-align: left;\n  color: #2e2e2e;\n  z-index: 5;\n  max-height: 75%;\n  overflow: auto;\n}\n\n.wrs_popupmessage_button_area {\n  margin: 10px 0 0 0;\n}\n\n.wrs_panelContainer * {\n  border: 0;\n}\n\n.wrs_button_cancel,\n.wrs_button_cancel:hover,\n.wrs_button_cancel:visited,\n.wrs_button_cancel:active,\n.wrs_button_cancel:focus {\n  min-width: 80px;\n  font-size: 14px;\n  border-radius: 3px;\n  border: 1px solid #778e9a;\n  padding: 6px 8px;\n  margin: 10px auto;\n  margin-left: 5px;\n  margin-bottom: 0;\n  cursor: pointer;\n  font-family: arial, sans-serif;\n  background-color: #ddd;\n  background-image: none;\n  height: 32px;\n}\n\n.wrs_button_accept,\n.wrs_button_accept:hover,\n.wrs_button_accept:visited,\n.wrs_button_accept:active,\n.wrs_button_accept:focus {\n  min-width: 80px;\n  font-size: 14px;\n  border-radius: 3px;\n  border: 1px solid #778e9a;\n  padding: 6px 8px;\n  margin: 10px auto;\n  margin-right: 5px;\n  margin-bottom: 0;\n  color: #fff;\n  background: #778e9a;\n  cursor: pointer;\n  font-family: arial, sans-serif;\n  height: 32px;\n}\n\n.wrs_editor button {\n  box-shadow: none;\n}\n\n.wrs_editor .wrs_header button {\n  border-bottom: none;\n  border-bottom-left-radius: 0;\n  border-bottom-right-radius: 0;\n}\n\n.wrs_modal_overlay.wrs_modal_desktop.wrs_stack.wrs_overlay_active {\n  display: block;\n}\n\n/* Fix selection in drupal style */\n.wrs_toolbar tr:focus {\n  background: none;\n}\n\n.wrs_toolbar tr:hover {\n  background: none;\n}\n\n/* End of fix drupal */\n.wrs_modal_rtl .wrs_modal_button_cancel {\n  margin-right: 5px;\n  margin-left: 0;\n}\n\n.wrs_modal_rtl .wrs_modal_button_accept {\n  margin-right: 0;\n  margin-left: 5px;\n}\n\n.wrs_modal_rtl .wrs_button_cancel {\n  margin-right: 5px;\n  margin-left: 0;\n}\n\n.wrs_modal_rtl .wrs_button_accept {\n  margin-right: 0;\n  margin-left: 5px;\n}\n",
          "",
        ]);
        const a = r;
      },
      609: (e) => {
        "use strict";
        e.exports = function (e) {
          var t = [];
          return (
            (t.toString = function () {
              return this.map(function (t) {
                var n = e(t);
                return t[2] ? "@media ".concat(t[2], " {").concat(n, "}") : n;
              }).join("");
            }),
            (t.i = function (e, n, i) {
              "string" == typeof e && (e = [[null, e, ""]]);
              var r = {};
              if (i)
                for (var a = 0; a < this.length; a++) {
                  var o = this[a][0];
                  null != o && (r[o] = !0);
                }
              for (var s = 0; s < e.length; s++) {
                var l = [].concat(e[s]);
                (i && r[l[0]]) ||
                  (n &&
                    (l[2]
                      ? (l[2] = "".concat(n, " and ").concat(l[2]))
                      : (l[2] = n)),
                  t.push(l));
              }
            }),
            t
          );
        };
      },
      368: function (e) {
        e.exports = (function () {
          "use strict";
          function e(t) {
            return (
              (e =
                "function" == typeof Symbol &&
                "symbol" == typeof Symbol.iterator
                  ? function (e) {
                      return typeof e;
                    }
                  : function (e) {
                      return e &&
                        "function" == typeof Symbol &&
                        e.constructor === Symbol &&
                        e !== Symbol.prototype
                        ? "symbol"
                        : typeof e;
                    }),
              e(t)
            );
          }
          function t(e, n) {
            return (
              (t =
                Object.setPrototypeOf ||
                function (e, t) {
                  return (e.__proto__ = t), e;
                }),
              t(e, n)
            );
          }
          function n() {
            if ("undefined" == typeof Reflect || !Reflect.construct) return !1;
            if (Reflect.construct.sham) return !1;
            if ("function" == typeof Proxy) return !0;
            try {
              return (
                Boolean.prototype.valueOf.call(
                  Reflect.construct(Boolean, [], function () {})
                ),
                !0
              );
            } catch (e) {
              return !1;
            }
          }
          function i(e, r, a) {
            return (
              (i = n()
                ? Reflect.construct
                : function (e, n, i) {
                    var r = [null];
                    r.push.apply(r, n);
                    var a = new (Function.bind.apply(e, r))();
                    return i && t(a, i.prototype), a;
                  }),
              i.apply(null, arguments)
            );
          }
          function r(e) {
            return a(e) || o(e) || s(e) || c();
          }
          function a(e) {
            if (Array.isArray(e)) return l(e);
          }
          function o(e) {
            if (
              ("undefined" != typeof Symbol && null != e[Symbol.iterator]) ||
              null != e["@@iterator"]
            )
              return Array.from(e);
          }
          function s(e, t) {
            if (e) {
              if ("string" == typeof e) return l(e, t);
              var n = Object.prototype.toString.call(e).slice(8, -1);
              return (
                "Object" === n && e.constructor && (n = e.constructor.name),
                "Map" === n || "Set" === n
                  ? Array.from(e)
                  : "Arguments" === n ||
                    /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)
                  ? l(e, t)
                  : void 0
              );
            }
          }
          function l(e, t) {
            (null == t || t > e.length) && (t = e.length);
            for (var n = 0, i = new Array(t); n < t; n++) i[n] = e[n];
            return i;
          }
          function c() {
            throw new TypeError(
              "Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
            );
          }
          var u = Object.hasOwnProperty,
            d = Object.setPrototypeOf,
            m = Object.isFrozen,
            h = Object.getPrototypeOf,
            p = Object.getOwnPropertyDescriptor,
            g = Object.freeze,
            f = Object.seal,
            _ = Object.create,
            v = "undefined" != typeof Reflect && Reflect,
            b = v.apply,
            y = v.construct;
          b ||
            (b = function (e, t, n) {
              return e.apply(t, n);
            }),
            g ||
              (g = function (e) {
                return e;
              }),
            f ||
              (f = function (e) {
                return e;
              }),
            y ||
              (y = function (e, t) {
                return i(e, r(t));
              });
          var w = S(Array.prototype.forEach),
            x = S(Array.prototype.pop),
            k = S(Array.prototype.push),
            A = S(String.prototype.toLowerCase),
            C = S(String.prototype.match),
            M = S(String.prototype.replace),
            T = S(String.prototype.indexOf),
            E = S(String.prototype.trim),
            j = S(RegExp.prototype.test),
            O = P(TypeError);
          function S(e) {
            return function (t) {
              for (
                var n = arguments.length,
                  i = new Array(n > 1 ? n - 1 : 0),
                  r = 1;
                r < n;
                r++
              )
                i[r - 1] = arguments[r];
              return b(e, t, i);
            };
          }
          function P(e) {
            return function () {
              for (
                var t = arguments.length, n = new Array(t), i = 0;
                i < t;
                i++
              )
                n[i] = arguments[i];
              return y(e, n);
            };
          }
          function I(e, t, n) {
            (n = n || A), d && d(e, null);
            for (var i = t.length; i--; ) {
              var r = t[i];
              if ("string" == typeof r) {
                var a = n(r);
                a !== r && (m(t) || (t[i] = a), (r = a));
              }
              e[r] = !0;
            }
            return e;
          }
          function z(e) {
            var t,
              n = _(null);
            for (t in e) b(u, e, [t]) && (n[t] = e[t]);
            return n;
          }
          function L(e, t) {
            for (; null !== e; ) {
              var n = p(e, t);
              if (n) {
                if (n.get) return S(n.get);
                if ("function" == typeof n.value) return S(n.value);
              }
              e = h(e);
            }
            function i(e) {
              return console.warn("fallback value for", e), null;
            }
            return i;
          }
          var N = g([
              "a",
              "abbr",
              "acronym",
              "address",
              "area",
              "article",
              "aside",
              "audio",
              "b",
              "bdi",
              "bdo",
              "big",
              "blink",
              "blockquote",
              "body",
              "br",
              "button",
              "canvas",
              "caption",
              "center",
              "cite",
              "code",
              "col",
              "colgroup",
              "content",
              "data",
              "datalist",
              "dd",
              "decorator",
              "del",
              "details",
              "dfn",
              "dialog",
              "dir",
              "div",
              "dl",
              "dt",
              "element",
              "em",
              "fieldset",
              "figcaption",
              "figure",
              "font",
              "footer",
              "form",
              "h1",
              "h2",
              "h3",
              "h4",
              "h5",
              "h6",
              "head",
              "header",
              "hgroup",
              "hr",
              "html",
              "i",
              "img",
              "input",
              "ins",
              "kbd",
              "label",
              "legend",
              "li",
              "main",
              "map",
              "mark",
              "marquee",
              "menu",
              "menuitem",
              "meter",
              "nav",
              "nobr",
              "ol",
              "optgroup",
              "option",
              "output",
              "p",
              "picture",
              "pre",
              "progress",
              "q",
              "rp",
              "rt",
              "ruby",
              "s",
              "samp",
              "section",
              "select",
              "shadow",
              "small",
              "source",
              "spacer",
              "span",
              "strike",
              "strong",
              "style",
              "sub",
              "summary",
              "sup",
              "table",
              "tbody",
              "td",
              "template",
              "textarea",
              "tfoot",
              "th",
              "thead",
              "time",
              "tr",
              "track",
              "tt",
              "u",
              "ul",
              "var",
              "video",
              "wbr",
            ]),
            D = g([
              "svg",
              "a",
              "altglyph",
              "altglyphdef",
              "altglyphitem",
              "animatecolor",
              "animatemotion",
              "animatetransform",
              "circle",
              "clippath",
              "defs",
              "desc",
              "ellipse",
              "filter",
              "font",
              "g",
              "glyph",
              "glyphref",
              "hkern",
              "image",
              "line",
              "lineargradient",
              "marker",
              "mask",
              "metadata",
              "mpath",
              "path",
              "pattern",
              "polygon",
              "polyline",
              "radialgradient",
              "rect",
              "stop",
              "style",
              "switch",
              "symbol",
              "text",
              "textpath",
              "title",
              "tref",
              "tspan",
              "view",
              "vkern",
            ]),
            B = g([
              "feBlend",
              "feColorMatrix",
              "feComponentTransfer",
              "feComposite",
              "feConvolveMatrix",
              "feDiffuseLighting",
              "feDisplacementMap",
              "feDistantLight",
              "feFlood",
              "feFuncA",
              "feFuncB",
              "feFuncG",
              "feFuncR",
              "feGaussianBlur",
              "feImage",
              "feMerge",
              "feMergeNode",
              "feMorphology",
              "feOffset",
              "fePointLight",
              "feSpecularLighting",
              "feSpotLight",
              "feTile",
              "feTurbulence",
            ]),
            R = g([
              "animate",
              "color-profile",
              "cursor",
              "discard",
              "fedropshadow",
              "font-face",
              "font-face-format",
              "font-face-name",
              "font-face-src",
              "font-face-uri",
              "foreignobject",
              "hatch",
              "hatchpath",
              "mesh",
              "meshgradient",
              "meshpatch",
              "meshrow",
              "missing-glyph",
              "script",
              "set",
              "solidcolor",
              "unknown",
              "use",
            ]),
            F = g([
              "math",
              "menclose",
              "merror",
              "mfenced",
              "mfrac",
              "mglyph",
              "mi",
              "mlabeledtr",
              "mmultiscripts",
              "mn",
              "mo",
              "mover",
              "mpadded",
              "mphantom",
              "mroot",
              "mrow",
              "ms",
              "mspace",
              "msqrt",
              "mstyle",
              "msub",
              "msup",
              "msubsup",
              "mtable",
              "mtd",
              "mtext",
              "mtr",
              "munder",
              "munderover",
            ]),
            H = g([
              "maction",
              "maligngroup",
              "malignmark",
              "mlongdiv",
              "mscarries",
              "mscarry",
              "msgroup",
              "mstack",
              "msline",
              "msrow",
              "semantics",
              "annotation",
              "annotation-xml",
              "mprescripts",
              "none",
            ]),
            U = g(["#text"]),
            W = g([
              "accept",
              "action",
              "align",
              "alt",
              "autocapitalize",
              "autocomplete",
              "autopictureinpicture",
              "autoplay",
              "background",
              "bgcolor",
              "border",
              "capture",
              "cellpadding",
              "cellspacing",
              "checked",
              "cite",
              "class",
              "clear",
              "color",
              "cols",
              "colspan",
              "controls",
              "controlslist",
              "coords",
              "crossorigin",
              "datetime",
              "decoding",
              "default",
              "dir",
              "disabled",
              "disablepictureinpicture",
              "disableremoteplayback",
              "download",
              "draggable",
              "enctype",
              "enterkeyhint",
              "face",
              "for",
              "headers",
              "height",
              "hidden",
              "high",
              "href",
              "hreflang",
              "id",
              "inputmode",
              "integrity",
              "ismap",
              "kind",
              "label",
              "lang",
              "list",
              "loading",
              "loop",
              "low",
              "max",
              "maxlength",
              "media",
              "method",
              "min",
              "minlength",
              "multiple",
              "muted",
              "name",
              "nonce",
              "noshade",
              "novalidate",
              "nowrap",
              "open",
              "optimum",
              "pattern",
              "placeholder",
              "playsinline",
              "poster",
              "preload",
              "pubdate",
              "radiogroup",
              "readonly",
              "rel",
              "required",
              "rev",
              "reversed",
              "role",
              "rows",
              "rowspan",
              "spellcheck",
              "scope",
              "selected",
              "shape",
              "size",
              "sizes",
              "span",
              "srclang",
              "start",
              "src",
              "srcset",
              "step",
              "style",
              "summary",
              "tabindex",
              "title",
              "translate",
              "type",
              "usemap",
              "valign",
              "value",
              "width",
              "xmlns",
              "slot",
            ]),
            X = g([
              "accent-height",
              "accumulate",
              "additive",
              "alignment-baseline",
              "ascent",
              "attributename",
              "attributetype",
              "azimuth",
              "basefrequency",
              "baseline-shift",
              "begin",
              "bias",
              "by",
              "class",
              "clip",
              "clippathunits",
              "clip-path",
              "clip-rule",
              "color",
              "color-interpolation",
              "color-interpolation-filters",
              "color-profile",
              "color-rendering",
              "cx",
              "cy",
              "d",
              "dx",
              "dy",
              "diffuseconstant",
              "direction",
              "display",
              "divisor",
              "dur",
              "edgemode",
              "elevation",
              "end",
              "fill",
              "fill-opacity",
              "fill-rule",
              "filter",
              "filterunits",
              "flood-color",
              "flood-opacity",
              "font-family",
              "font-size",
              "font-size-adjust",
              "font-stretch",
              "font-style",
              "font-variant",
              "font-weight",
              "fx",
              "fy",
              "g1",
              "g2",
              "glyph-name",
              "glyphref",
              "gradientunits",
              "gradienttransform",
              "height",
              "href",
              "id",
              "image-rendering",
              "in",
              "in2",
              "k",
              "k1",
              "k2",
              "k3",
              "k4",
              "kerning",
              "keypoints",
              "keysplines",
              "keytimes",
              "lang",
              "lengthadjust",
              "letter-spacing",
              "kernelmatrix",
              "kernelunitlength",
              "lighting-color",
              "local",
              "marker-end",
              "marker-mid",
              "marker-start",
              "markerheight",
              "markerunits",
              "markerwidth",
              "maskcontentunits",
              "maskunits",
              "max",
              "mask",
              "media",
              "method",
              "mode",
              "min",
              "name",
              "numoctaves",
              "offset",
              "operator",
              "opacity",
              "order",
              "orient",
              "orientation",
              "origin",
              "overflow",
              "paint-order",
              "path",
              "pathlength",
              "patterncontentunits",
              "patterntransform",
              "patternunits",
              "points",
              "preservealpha",
              "preserveaspectratio",
              "primitiveunits",
              "r",
              "rx",
              "ry",
              "radius",
              "refx",
              "refy",
              "repeatcount",
              "repeatdur",
              "restart",
              "result",
              "rotate",
              "scale",
              "seed",
              "shape-rendering",
              "specularconstant",
              "specularexponent",
              "spreadmethod",
              "startoffset",
              "stddeviation",
              "stitchtiles",
              "stop-color",
              "stop-opacity",
              "stroke-dasharray",
              "stroke-dashoffset",
              "stroke-linecap",
              "stroke-linejoin",
              "stroke-miterlimit",
              "stroke-opacity",
              "stroke",
              "stroke-width",
              "style",
              "surfacescale",
              "systemlanguage",
              "tabindex",
              "targetx",
              "targety",
              "transform",
              "transform-origin",
              "text-anchor",
              "text-decoration",
              "text-rendering",
              "textlength",
              "type",
              "u1",
              "u2",
              "unicode",
              "values",
              "viewbox",
              "visibility",
              "version",
              "vert-adv-y",
              "vert-origin-x",
              "vert-origin-y",
              "width",
              "word-spacing",
              "wrap",
              "writing-mode",
              "xchannelselector",
              "ychannelselector",
              "x",
              "x1",
              "x2",
              "xmlns",
              "y",
              "y1",
              "y2",
              "z",
              "zoomandpan",
            ]),
            V = g([
              "accent",
              "accentunder",
              "align",
              "bevelled",
              "close",
              "columnsalign",
              "columnlines",
              "columnspan",
              "denomalign",
              "depth",
              "dir",
              "display",
              "displaystyle",
              "encoding",
              "fence",
              "frame",
              "height",
              "href",
              "id",
              "largeop",
              "length",
              "linethickness",
              "lspace",
              "lquote",
              "mathbackground",
              "mathcolor",
              "mathsize",
              "mathvariant",
              "maxsize",
              "minsize",
              "movablelimits",
              "notation",
              "numalign",
              "open",
              "rowalign",
              "rowlines",
              "rowspacing",
              "rowspan",
              "rspace",
              "rquote",
              "scriptlevel",
              "scriptminsize",
              "scriptsizemultiplier",
              "selection",
              "separator",
              "separators",
              "stretchy",
              "subscriptshift",
              "supscriptshift",
              "symmetric",
              "voffset",
              "width",
              "xmlns",
            ]),
            J = g([
              "xlink:href",
              "xml:id",
              "xlink:title",
              "xml:space",
              "xmlns:xlink",
            ]),
            K = f(/\{\{[\w\W]*|[\w\W]*\}\}/gm),
            q = f(/<%[\w\W]*|[\w\W]*%>/gm),
            Y = f(/^data-[\-\w.\u00B7-\uFFFF]/),
            Q = f(/^aria-[\-\w]+$/),
            G = f(
              /^(?:(?:(?:f|ht)tps?|mailto|tel|callto|cid|xmpp):|[^a-z]|[a-z+.\-]+(?:[^a-z+.\-:]|$))/i
            ),
            Z = f(/^(?:\w+script|data):/i),
            $ = f(
              /[\u0000-\u0020\u00A0\u1680\u180E\u2000-\u2029\u205F\u3000]/g
            ),
            ee = f(/^html$/i),
            te = function () {
              return "undefined" == typeof window ? null : window;
            },
            ne = function (t, n) {
              if ("object" !== e(t) || "function" != typeof t.createPolicy)
                return null;
              var i = null,
                r = "data-tt-policy-suffix";
              n.currentScript &&
                n.currentScript.hasAttribute(r) &&
                (i = n.currentScript.getAttribute(r));
              var a = "dompurify" + (i ? "#" + i : "");
              try {
                return t.createPolicy(a, {
                  createHTML: function (e) {
                    return e;
                  },
                  createScriptURL: function (e) {
                    return e;
                  },
                });
              } catch (e) {
                return (
                  console.warn(
                    "TrustedTypes policy " + a + " could not be created."
                  ),
                  null
                );
              }
            };
          function ie() {
            var t =
                arguments.length > 0 && void 0 !== arguments[0]
                  ? arguments[0]
                  : te(),
              n = function (e) {
                return ie(e);
              };
            if (
              ((n.version = "2.4.0"),
              (n.removed = []),
              !t || !t.document || 9 !== t.document.nodeType)
            )
              return (n.isSupported = !1), n;
            var i = t.document,
              a = t.document,
              o = t.DocumentFragment,
              s = t.HTMLTemplateElement,
              l = t.Node,
              c = t.Element,
              u = t.NodeFilter,
              d = t.NamedNodeMap,
              m = void 0 === d ? t.NamedNodeMap || t.MozNamedAttrMap : d,
              h = t.HTMLFormElement,
              p = t.DOMParser,
              f = t.trustedTypes,
              _ = c.prototype,
              v = L(_, "cloneNode"),
              b = L(_, "nextSibling"),
              y = L(_, "childNodes"),
              S = L(_, "parentNode");
            if ("function" == typeof s) {
              var P = a.createElement("template");
              P.content &&
                P.content.ownerDocument &&
                (a = P.content.ownerDocument);
            }
            var re = ne(f, i),
              ae = re ? re.createHTML("") : "",
              oe = a,
              se = oe.implementation,
              le = oe.createNodeIterator,
              ce = oe.createDocumentFragment,
              ue = oe.getElementsByTagName,
              de = i.importNode,
              me = {};
            try {
              me = z(a).documentMode ? a.documentMode : {};
            } catch (e) {}
            var he = {};
            n.isSupported =
              "function" == typeof S &&
              se &&
              void 0 !== se.createHTMLDocument &&
              9 !== me;
            var pe,
              ge,
              fe = K,
              _e = q,
              ve = Y,
              be = Q,
              ye = Z,
              we = $,
              xe = G,
              ke = null,
              Ae = I({}, [].concat(r(N), r(D), r(B), r(F), r(U))),
              Ce = null,
              Me = I({}, [].concat(r(W), r(X), r(V), r(J))),
              Te = Object.seal(
                Object.create(null, {
                  tagNameCheck: {
                    writable: !0,
                    configurable: !1,
                    enumerable: !0,
                    value: null,
                  },
                  attributeNameCheck: {
                    writable: !0,
                    configurable: !1,
                    enumerable: !0,
                    value: null,
                  },
                  allowCustomizedBuiltInElements: {
                    writable: !0,
                    configurable: !1,
                    enumerable: !0,
                    value: !1,
                  },
                })
              ),
              Ee = null,
              je = null,
              Oe = !0,
              Se = !0,
              Pe = !1,
              Ie = !1,
              ze = !1,
              Le = !1,
              Ne = !1,
              De = !1,
              Be = !1,
              Re = !1,
              Fe = !0,
              He = !1,
              Ue = "user-content-",
              We = !0,
              Xe = !1,
              Ve = {},
              Je = null,
              Ke = I({}, [
                "annotation-xml",
                "audio",
                "colgroup",
                "desc",
                "foreignobject",
                "head",
                "iframe",
                "math",
                "mi",
                "mn",
                "mo",
                "ms",
                "mtext",
                "noembed",
                "noframes",
                "noscript",
                "plaintext",
                "script",
                "style",
                "svg",
                "template",
                "thead",
                "title",
                "video",
                "xmp",
              ]),
              qe = null,
              Ye = I({}, ["audio", "video", "img", "source", "image", "track"]),
              Qe = null,
              Ge = I({}, [
                "alt",
                "class",
                "for",
                "id",
                "label",
                "name",
                "pattern",
                "placeholder",
                "role",
                "summary",
                "title",
                "value",
                "style",
                "xmlns",
              ]),
              Ze = "http://www.w3.org/1998/Math/MathML",
              $e = "http://www.w3.org/2000/svg",
              et = "http://www.w3.org/1999/xhtml",
              tt = et,
              nt = !1,
              it = ["application/xhtml+xml", "text/html"],
              rt = "text/html",
              at = null,
              ot = a.createElement("form"),
              st = function (e) {
                return e instanceof RegExp || e instanceof Function;
              },
              lt = function (t) {
                (at && at === t) ||
                  ((t && "object" === e(t)) || (t = {}),
                  (t = z(t)),
                  (pe = pe =
                    -1 === it.indexOf(t.PARSER_MEDIA_TYPE)
                      ? rt
                      : t.PARSER_MEDIA_TYPE),
                  (ge =
                    "application/xhtml+xml" === pe
                      ? function (e) {
                          return e;
                        }
                      : A),
                  (ke = "ALLOWED_TAGS" in t ? I({}, t.ALLOWED_TAGS, ge) : Ae),
                  (Ce = "ALLOWED_ATTR" in t ? I({}, t.ALLOWED_ATTR, ge) : Me),
                  (Qe =
                    "ADD_URI_SAFE_ATTR" in t
                      ? I(z(Ge), t.ADD_URI_SAFE_ATTR, ge)
                      : Ge),
                  (qe =
                    "ADD_DATA_URI_TAGS" in t
                      ? I(z(Ye), t.ADD_DATA_URI_TAGS, ge)
                      : Ye),
                  (Je =
                    "FORBID_CONTENTS" in t ? I({}, t.FORBID_CONTENTS, ge) : Ke),
                  (Ee = "FORBID_TAGS" in t ? I({}, t.FORBID_TAGS, ge) : {}),
                  (je = "FORBID_ATTR" in t ? I({}, t.FORBID_ATTR, ge) : {}),
                  (Ve = "USE_PROFILES" in t && t.USE_PROFILES),
                  (Oe = !1 !== t.ALLOW_ARIA_ATTR),
                  (Se = !1 !== t.ALLOW_DATA_ATTR),
                  (Pe = t.ALLOW_UNKNOWN_PROTOCOLS || !1),
                  (Ie = t.SAFE_FOR_TEMPLATES || !1),
                  (ze = t.WHOLE_DOCUMENT || !1),
                  (De = t.RETURN_DOM || !1),
                  (Be = t.RETURN_DOM_FRAGMENT || !1),
                  (Re = t.RETURN_TRUSTED_TYPE || !1),
                  (Ne = t.FORCE_BODY || !1),
                  (Fe = !1 !== t.SANITIZE_DOM),
                  (He = t.SANITIZE_NAMED_PROPS || !1),
                  (We = !1 !== t.KEEP_CONTENT),
                  (Xe = t.IN_PLACE || !1),
                  (xe = t.ALLOWED_URI_REGEXP || xe),
                  (tt = t.NAMESPACE || et),
                  t.CUSTOM_ELEMENT_HANDLING &&
                    st(t.CUSTOM_ELEMENT_HANDLING.tagNameCheck) &&
                    (Te.tagNameCheck = t.CUSTOM_ELEMENT_HANDLING.tagNameCheck),
                  t.CUSTOM_ELEMENT_HANDLING &&
                    st(t.CUSTOM_ELEMENT_HANDLING.attributeNameCheck) &&
                    (Te.attributeNameCheck =
                      t.CUSTOM_ELEMENT_HANDLING.attributeNameCheck),
                  t.CUSTOM_ELEMENT_HANDLING &&
                    "boolean" ==
                      typeof t.CUSTOM_ELEMENT_HANDLING
                        .allowCustomizedBuiltInElements &&
                    (Te.allowCustomizedBuiltInElements =
                      t.CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements),
                  Ie && (Se = !1),
                  Be && (De = !0),
                  Ve &&
                    ((ke = I({}, r(U))),
                    (Ce = []),
                    !0 === Ve.html && (I(ke, N), I(Ce, W)),
                    !0 === Ve.svg && (I(ke, D), I(Ce, X), I(Ce, J)),
                    !0 === Ve.svgFilters && (I(ke, B), I(Ce, X), I(Ce, J)),
                    !0 === Ve.mathMl && (I(ke, F), I(Ce, V), I(Ce, J))),
                  t.ADD_TAGS &&
                    (ke === Ae && (ke = z(ke)), I(ke, t.ADD_TAGS, ge)),
                  t.ADD_ATTR &&
                    (Ce === Me && (Ce = z(Ce)), I(Ce, t.ADD_ATTR, ge)),
                  t.ADD_URI_SAFE_ATTR && I(Qe, t.ADD_URI_SAFE_ATTR, ge),
                  t.FORBID_CONTENTS &&
                    (Je === Ke && (Je = z(Je)), I(Je, t.FORBID_CONTENTS, ge)),
                  We && (ke["#text"] = !0),
                  ze && I(ke, ["html", "head", "body"]),
                  ke.table && (I(ke, ["tbody"]), delete Ee.tbody),
                  g && g(t),
                  (at = t));
              },
              ct = I({}, ["mi", "mo", "mn", "ms", "mtext"]),
              ut = I({}, ["foreignobject", "desc", "title", "annotation-xml"]),
              dt = I({}, ["title", "style", "font", "a", "script"]),
              mt = I({}, D);
            I(mt, B), I(mt, R);
            var ht = I({}, F);
            I(ht, H);
            var pt = function (e) {
                var t = S(e);
                (t && t.tagName) ||
                  (t = { namespaceURI: et, tagName: "template" });
                var n = A(e.tagName),
                  i = A(t.tagName);
                return e.namespaceURI === $e
                  ? t.namespaceURI === et
                    ? "svg" === n
                    : t.namespaceURI === Ze
                    ? "svg" === n && ("annotation-xml" === i || ct[i])
                    : Boolean(mt[n])
                  : e.namespaceURI === Ze
                  ? t.namespaceURI === et
                    ? "math" === n
                    : t.namespaceURI === $e
                    ? "math" === n && ut[i]
                    : Boolean(ht[n])
                  : e.namespaceURI === et &&
                    !(t.namespaceURI === $e && !ut[i]) &&
                    !(t.namespaceURI === Ze && !ct[i]) &&
                    !ht[n] &&
                    (dt[n] || !mt[n]);
              },
              gt = function (e) {
                k(n.removed, { element: e });
                try {
                  e.parentNode.removeChild(e);
                } catch (t) {
                  try {
                    e.outerHTML = ae;
                  } catch (t) {
                    e.remove();
                  }
                }
              },
              ft = function (e, t) {
                try {
                  k(n.removed, { attribute: t.getAttributeNode(e), from: t });
                } catch (e) {
                  k(n.removed, { attribute: null, from: t });
                }
                if ((t.removeAttribute(e), "is" === e && !Ce[e]))
                  if (De || Be)
                    try {
                      gt(t);
                    } catch (e) {}
                  else
                    try {
                      t.setAttribute(e, "");
                    } catch (e) {}
              },
              _t = function (e) {
                var t, n;
                if (Ne) e = "<remove></remove>" + e;
                else {
                  var i = C(e, /^[\r\n\t ]+/);
                  n = i && i[0];
                }
                "application/xhtml+xml" === pe &&
                  (e =
                    '<html xmlns="http://www.w3.org/1999/xhtml"><head></head><body>' +
                    e +
                    "</body></html>");
                var r = re ? re.createHTML(e) : e;
                if (tt === et)
                  try {
                    t = new p().parseFromString(r, pe);
                  } catch (e) {}
                if (!t || !t.documentElement) {
                  t = se.createDocument(tt, "template", null);
                  try {
                    t.documentElement.innerHTML = nt ? "" : r;
                  } catch (e) {}
                }
                var o = t.body || t.documentElement;
                return (
                  e &&
                    n &&
                    o.insertBefore(
                      a.createTextNode(n),
                      o.childNodes[0] || null
                    ),
                  tt === et
                    ? ue.call(t, ze ? "html" : "body")[0]
                    : ze
                    ? t.documentElement
                    : o
                );
              },
              vt = function (e) {
                return le.call(
                  e.ownerDocument || e,
                  e,
                  u.SHOW_ELEMENT | u.SHOW_COMMENT | u.SHOW_TEXT,
                  null,
                  !1
                );
              },
              bt = function (e) {
                return (
                  e instanceof h &&
                  ("string" != typeof e.nodeName ||
                    "string" != typeof e.textContent ||
                    "function" != typeof e.removeChild ||
                    !(e.attributes instanceof m) ||
                    "function" != typeof e.removeAttribute ||
                    "function" != typeof e.setAttribute ||
                    "string" != typeof e.namespaceURI ||
                    "function" != typeof e.insertBefore)
                );
              },
              yt = function (t) {
                return "object" === e(l)
                  ? t instanceof l
                  : t &&
                      "object" === e(t) &&
                      "number" == typeof t.nodeType &&
                      "string" == typeof t.nodeName;
              },
              wt = function (e, t, i) {
                he[e] &&
                  w(he[e], function (e) {
                    e.call(n, t, i, at);
                  });
              },
              xt = function (e) {
                var t;
                if ((wt("beforeSanitizeElements", e, null), bt(e)))
                  return gt(e), !0;
                if (j(/[\u0080-\uFFFF]/, e.nodeName)) return gt(e), !0;
                var i = ge(e.nodeName);
                if (
                  (wt("uponSanitizeElement", e, {
                    tagName: i,
                    allowedTags: ke,
                  }),
                  e.hasChildNodes() &&
                    !yt(e.firstElementChild) &&
                    (!yt(e.content) || !yt(e.content.firstElementChild)) &&
                    j(/<[/\w]/g, e.innerHTML) &&
                    j(/<[/\w]/g, e.textContent))
                )
                  return gt(e), !0;
                if ("select" === i && j(/<template/i, e.innerHTML))
                  return gt(e), !0;
                if (!ke[i] || Ee[i]) {
                  if (!Ee[i] && At(i)) {
                    if (
                      Te.tagNameCheck instanceof RegExp &&
                      j(Te.tagNameCheck, i)
                    )
                      return !1;
                    if (
                      Te.tagNameCheck instanceof Function &&
                      Te.tagNameCheck(i)
                    )
                      return !1;
                  }
                  if (We && !Je[i]) {
                    var r = S(e) || e.parentNode,
                      a = y(e) || e.childNodes;
                    if (a && r)
                      for (var o = a.length - 1; o >= 0; --o)
                        r.insertBefore(v(a[o], !0), b(e));
                  }
                  return gt(e), !0;
                }
                return e instanceof c && !pt(e)
                  ? (gt(e), !0)
                  : ("noscript" !== i && "noembed" !== i) ||
                    !j(/<\/no(script|embed)/i, e.innerHTML)
                  ? (Ie &&
                      3 === e.nodeType &&
                      ((t = e.textContent),
                      (t = M(t, fe, " ")),
                      (t = M(t, _e, " ")),
                      e.textContent !== t &&
                        (k(n.removed, { element: e.cloneNode() }),
                        (e.textContent = t))),
                    wt("afterSanitizeElements", e, null),
                    !1)
                  : (gt(e), !0);
              },
              kt = function (e, t, n) {
                if (Fe && ("id" === t || "name" === t) && (n in a || n in ot))
                  return !1;
                if (Se && !je[t] && j(ve, t));
                else if (Oe && j(be, t));
                else if (!Ce[t] || je[t]) {
                  if (
                    !(
                      (At(e) &&
                        ((Te.tagNameCheck instanceof RegExp &&
                          j(Te.tagNameCheck, e)) ||
                          (Te.tagNameCheck instanceof Function &&
                            Te.tagNameCheck(e))) &&
                        ((Te.attributeNameCheck instanceof RegExp &&
                          j(Te.attributeNameCheck, t)) ||
                          (Te.attributeNameCheck instanceof Function &&
                            Te.attributeNameCheck(t)))) ||
                      ("is" === t &&
                        Te.allowCustomizedBuiltInElements &&
                        ((Te.tagNameCheck instanceof RegExp &&
                          j(Te.tagNameCheck, n)) ||
                          (Te.tagNameCheck instanceof Function &&
                            Te.tagNameCheck(n))))
                    )
                  )
                    return !1;
                } else if (Qe[t]);
                else if (j(xe, M(n, we, "")));
                else if (
                  ("src" !== t && "xlink:href" !== t && "href" !== t) ||
                  "script" === e ||
                  0 !== T(n, "data:") ||
                  !qe[e]
                )
                  if (Pe && !j(ye, M(n, we, "")));
                  else if (n) return !1;
                return !0;
              },
              At = function (e) {
                return e.indexOf("-") > 0;
              },
              Ct = function (t) {
                var i, r, a, o;
                wt("beforeSanitizeAttributes", t, null);
                var s = t.attributes;
                if (s) {
                  var l = {
                    attrName: "",
                    attrValue: "",
                    keepAttr: !0,
                    allowedAttributes: Ce,
                  };
                  for (o = s.length; o--; ) {
                    var c = (i = s[o]),
                      u = c.name,
                      d = c.namespaceURI;
                    if (
                      ((r = "value" === u ? i.value : E(i.value)),
                      (a = ge(u)),
                      (l.attrName = a),
                      (l.attrValue = r),
                      (l.keepAttr = !0),
                      (l.forceKeepAttr = void 0),
                      wt("uponSanitizeAttribute", t, l),
                      (r = l.attrValue),
                      !l.forceKeepAttr && (ft(u, t), l.keepAttr))
                    )
                      if (j(/\/>/i, r)) ft(u, t);
                      else {
                        Ie && ((r = M(r, fe, " ")), (r = M(r, _e, " ")));
                        var m = ge(t.nodeName);
                        if (kt(m, a, r)) {
                          if (
                            (!He ||
                              ("id" !== a && "name" !== a) ||
                              (ft(u, t), (r = Ue + r)),
                            re &&
                              "object" === e(f) &&
                              "function" == typeof f.getAttributeType)
                          )
                            if (d);
                            else
                              switch (f.getAttributeType(m, a)) {
                                case "TrustedHTML":
                                  r = re.createHTML(r);
                                  break;
                                case "TrustedScriptURL":
                                  r = re.createScriptURL(r);
                              }
                          try {
                            d
                              ? t.setAttributeNS(d, u, r)
                              : t.setAttribute(u, r),
                              x(n.removed);
                          } catch (e) {}
                        }
                      }
                  }
                  wt("afterSanitizeAttributes", t, null);
                }
              },
              Mt = function e(t) {
                var n,
                  i = vt(t);
                for (
                  wt("beforeSanitizeShadowDOM", t, null);
                  (n = i.nextNode());

                )
                  wt("uponSanitizeShadowNode", n, null),
                    xt(n) || (n.content instanceof o && e(n.content), Ct(n));
                wt("afterSanitizeShadowDOM", t, null);
              };
            return (
              (n.sanitize = function (r) {
                var a,
                  s,
                  c,
                  u,
                  d,
                  m =
                    arguments.length > 1 && void 0 !== arguments[1]
                      ? arguments[1]
                      : {};
                if (
                  ((nt = !r) && (r = "\x3c!--\x3e"),
                  "string" != typeof r && !yt(r))
                ) {
                  if ("function" != typeof r.toString)
                    throw O("toString is not a function");
                  if ("string" != typeof (r = r.toString()))
                    throw O("dirty is not a string, aborting");
                }
                if (!n.isSupported) {
                  if (
                    "object" === e(t.toStaticHTML) ||
                    "function" == typeof t.toStaticHTML
                  ) {
                    if ("string" == typeof r) return t.toStaticHTML(r);
                    if (yt(r)) return t.toStaticHTML(r.outerHTML);
                  }
                  return r;
                }
                if (
                  (Le || lt(m),
                  (n.removed = []),
                  "string" == typeof r && (Xe = !1),
                  Xe)
                ) {
                  if (r.nodeName) {
                    var h = ge(r.nodeName);
                    if (!ke[h] || Ee[h])
                      throw O(
                        "root node is forbidden and cannot be sanitized in-place"
                      );
                  }
                } else if (r instanceof l)
                  (1 ===
                    (s = (a = _t("\x3c!----\x3e")).ownerDocument.importNode(
                      r,
                      !0
                    )).nodeType &&
                    "BODY" === s.nodeName) ||
                  "HTML" === s.nodeName
                    ? (a = s)
                    : a.appendChild(s);
                else {
                  if (!De && !Ie && !ze && -1 === r.indexOf("<"))
                    return re && Re ? re.createHTML(r) : r;
                  if (!(a = _t(r))) return De ? null : Re ? ae : "";
                }
                a && Ne && gt(a.firstChild);
                for (var p = vt(Xe ? r : a); (c = p.nextNode()); )
                  (3 === c.nodeType && c === u) ||
                    xt(c) ||
                    (c.content instanceof o && Mt(c.content), Ct(c), (u = c));
                if (((u = null), Xe)) return r;
                if (De) {
                  if (Be)
                    for (d = ce.call(a.ownerDocument); a.firstChild; )
                      d.appendChild(a.firstChild);
                  else d = a;
                  return Ce.shadowroot && (d = de.call(i, d, !0)), d;
                }
                var g = ze ? a.outerHTML : a.innerHTML;
                return (
                  ze &&
                    ke["!doctype"] &&
                    a.ownerDocument &&
                    a.ownerDocument.doctype &&
                    a.ownerDocument.doctype.name &&
                    j(ee, a.ownerDocument.doctype.name) &&
                    (g =
                      "<!DOCTYPE " + a.ownerDocument.doctype.name + ">\n" + g),
                  Ie && ((g = M(g, fe, " ")), (g = M(g, _e, " "))),
                  re && Re ? re.createHTML(g) : g
                );
              }),
              (n.setConfig = function (e) {
                lt(e), (Le = !0);
              }),
              (n.clearConfig = function () {
                (at = null), (Le = !1);
              }),
              (n.isValidAttribute = function (e, t, n) {
                at || lt({});
                var i = ge(e),
                  r = ge(t);
                return kt(i, r, n);
              }),
              (n.addHook = function (e, t) {
                "function" == typeof t && ((he[e] = he[e] || []), k(he[e], t));
              }),
              (n.removeHook = function (e) {
                if (he[e]) return x(he[e]);
              }),
              (n.removeHooks = function (e) {
                he[e] && (he[e] = []);
              }),
              (n.removeAllHooks = function () {
                he = {};
              }),
              n
            );
          }
          return ie();
        })();
      },
      62: (e) => {
        "use strict";
        var t = [];
        function n(e) {
          for (var n = -1, i = 0; i < t.length; i++)
            if (t[i].identifier === e) {
              n = i;
              break;
            }
          return n;
        }
        function i(e, i) {
          for (var a = {}, o = [], s = 0; s < e.length; s++) {
            var l = e[s],
              c = i.base ? l[0] + i.base : l[0],
              u = a[c] || 0,
              d = "".concat(c, " ").concat(u);
            a[c] = u + 1;
            var m = n(d),
              h = {
                css: l[1],
                media: l[2],
                sourceMap: l[3],
                supports: l[4],
                layer: l[5],
              };
            if (-1 !== m) t[m].references++, t[m].updater(h);
            else {
              var p = r(h, i);
              (i.byIndex = s),
                t.splice(s, 0, { identifier: d, updater: p, references: 1 });
            }
            o.push(d);
          }
          return o;
        }
        function r(e, t) {
          var n = t.domAPI(t);
          n.update(e);
          return function (t) {
            if (t) {
              if (
                t.css === e.css &&
                t.media === e.media &&
                t.sourceMap === e.sourceMap &&
                t.supports === e.supports &&
                t.layer === e.layer
              )
                return;
              n.update((e = t));
            } else n.remove();
          };
        }
        e.exports = function (e, r) {
          var a = i((e = e || []), (r = r || {}));
          return function (e) {
            e = e || [];
            for (var o = 0; o < a.length; o++) {
              var s = n(a[o]);
              t[s].references--;
            }
            for (var l = i(e, r), c = 0; c < a.length; c++) {
              var u = n(a[c]);
              0 === t[u].references && (t[u].updater(), t.splice(u, 1));
            }
            a = l;
          };
        };
      },
      793: (e) => {
        "use strict";
        var t = {};
        e.exports = function (e, n) {
          var i = (function (e) {
            if (void 0 === t[e]) {
              var n = document.querySelector(e);
              if (
                window.HTMLIFrameElement &&
                n instanceof window.HTMLIFrameElement
              )
                try {
                  n = n.contentDocument.head;
                } catch (e) {
                  n = null;
                }
              t[e] = n;
            }
            return t[e];
          })(e);
          if (!i)
            throw new Error(
              "Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid."
            );
          i.appendChild(n);
        };
      },
      173: (e) => {
        "use strict";
        e.exports = function (e) {
          var t = document.createElement("style");
          return e.setAttributes(t, e.attributes), e.insert(t, e.options), t;
        };
      },
      892: (e, t, n) => {
        "use strict";
        e.exports = function (e) {
          var t = n.nc;
          t && e.setAttribute("nonce", t);
        };
      },
      36: (e) => {
        "use strict";
        e.exports = function (e) {
          var t = e.insertStyleElement(e);
          return {
            update: function (n) {
              !(function (e, t, n) {
                var i = "";
                n.supports && (i += "@supports (".concat(n.supports, ") {")),
                  n.media && (i += "@media ".concat(n.media, " {"));
                var r = void 0 !== n.layer;
                r &&
                  (i += "@layer".concat(
                    n.layer.length > 0 ? " ".concat(n.layer) : "",
                    " {"
                  )),
                  (i += n.css),
                  r && (i += "}"),
                  n.media && (i += "}"),
                  n.supports && (i += "}");
                var a = n.sourceMap;
                a &&
                  "undefined" != typeof btoa &&
                  (i +=
                    "\n/*# sourceMappingURL=data:application/json;base64,".concat(
                      btoa(unescape(encodeURIComponent(JSON.stringify(a)))),
                      " */"
                    )),
                  t.styleTagTransform(i, e, t.options);
              })(t, e, n);
            },
            remove: function () {
              !(function (e) {
                if (null === e.parentNode) return !1;
                e.parentNode.removeChild(e);
              })(t);
            },
          };
        };
      },
      464: (e) => {
        "use strict";
        e.exports = function (e, t) {
          if (t.styleSheet) t.styleSheet.cssText = e;
          else {
            for (; t.firstChild; ) t.removeChild(t.firstChild);
            t.appendChild(document.createTextNode(e));
          }
        };
      },
    },
    __webpack_module_cache__ = {};
  function __webpack_require__(e) {
    var t = __webpack_module_cache__[e];
    if (void 0 !== t) return t.exports;
    var n = (__webpack_module_cache__[e] = { id: e, exports: {} });
    return (
      __webpack_modules__[e].call(n.exports, n, n.exports, __webpack_require__),
      n.exports
    );
  }
  (__webpack_require__.n = (e) => {
    var t = e && e.__esModule ? () => e.default : () => e;
    return __webpack_require__.d(t, { a: t }), t;
  }),
    (__webpack_require__.d = (e, t) => {
      for (var n in t)
        __webpack_require__.o(t, n) &&
          !__webpack_require__.o(e, n) &&
          Object.defineProperty(e, n, { enumerable: !0, get: t[n] });
    }),
    (__webpack_require__.o = (e, t) =>
      Object.prototype.hasOwnProperty.call(e, t)),
    (__webpack_require__.nc = void 0);
  var __webpack_exports__ = {};
  (() => {
    "use strict";
    var e = __webpack_require__(368),
      t = __webpack_require__.n(e);
    function n(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var i = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e);
      }
      var t, i, r;
      return (
        (t = e),
        (r = [
          {
            key: "safeXmlCharactersEntities",
            get: function () {
              return {
                tagOpener: "&laquo;",
                tagCloser: "&raquo;",
                doubleQuote: "&uml;",
                realDoubleQuote: "&quot;",
              };
            },
          },
          {
            key: "safeBadBlackboardCharacters",
            get: function () {
              return {
                ltElement: "«mo»<«/mo»",
                gtElement: "«mo»>«/mo»",
                ampElement: "«mo»&«/mo»",
              };
            },
          },
          {
            key: "safeGoodBlackboardCharacters",
            get: function () {
              return {
                ltElement: "«mo»§lt;«/mo»",
                gtElement: "«mo»§gt;«/mo»",
                ampElement: "«mo»§amp;«/mo»",
              };
            },
          },
          {
            key: "xmlCharacters",
            get: function () {
              return {
                id: "xmlCharacters",
                tagOpener: "<",
                tagCloser: ">",
                doubleQuote: '"',
                ampersand: "&",
                quote: "'",
              };
            },
          },
          {
            key: "safeXmlCharacters",
            get: function () {
              return {
                id: "safeXmlCharacters",
                tagOpener: "«",
                tagCloser: "»",
                doubleQuote: "¨",
                ampersand: "§",
                quote: "`",
                realDoubleQuote: "¨",
              };
            },
          },
        ]),
        (i = null) && n(t.prototype, i),
        r && n(t, r),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    function r(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var a = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e);
      }
      var t, n, a;
      return (
        (t = e),
        (a = [
          {
            key: "isMathmlInAttribute",
            value: function (e, t) {
              var n = "[\\s]*(".concat(
                  "\"[^\"]*\"|'[^']*'",
                  ")[\\s]*=[\\s]*[\\w-]+[\\s]*"
                ),
                i = "('".concat(n, "')*"),
                r = "^"
                  .concat("['\"][\\s]*=[\\s]*[\\w-]+")
                  .concat(i, "[\\s]+gmi<"),
                a = new RegExp(r),
                o = e.substring(0, t).split("").reverse().join("");
              return a.test(o);
            },
          },
          {
            key: "safeXmlDecode",
            value: function (e) {
              var t = i.safeXmlCharactersEntities.tagOpener,
                n = i.safeXmlCharactersEntities.tagCloser,
                r = i.safeXmlCharactersEntities.doubleQuote,
                a = i.safeXmlCharactersEntities.realDoubleQuote;
              e = (e = (e = (e = e.split(t).join(i.safeXmlCharacters.tagOpener))
                .split(n)
                .join(i.safeXmlCharacters.tagCloser))
                .split(r)
                .join(i.safeXmlCharacters.doubleQuote))
                .split(a)
                .join(i.safeXmlCharacters.realDoubleQuote);
              var o = i.safeBadBlackboardCharacters.ltElement,
                s = i.safeBadBlackboardCharacters.gtElement,
                l = i.safeBadBlackboardCharacters.ampElement;
              "_wrs_blackboard" in window &&
                window._wrs_blackboard &&
                (e = (e = (e = e
                  .split(o)
                  .join(i.safeGoodBlackboardCharacters.ltElement))
                  .split(s)
                  .join(i.safeGoodBlackboardCharacters.gtElement))
                  .split(l)
                  .join(i.safeGoodBlackboardCharacters.ampElement)),
                (t = i.safeXmlCharacters.tagOpener),
                (n = i.safeXmlCharacters.tagCloser),
                (r = i.safeXmlCharacters.doubleQuote),
                (a = i.safeXmlCharacters.realDoubleQuote);
              var c = i.safeXmlCharacters.ampersand,
                u = i.safeXmlCharacters.quote;
              e = (e = (e = (e = (e = e
                .split(t)
                .join(i.xmlCharacters.tagOpener))
                .split(n)
                .join(i.xmlCharacters.tagCloser))
                .split(r)
                .join(i.xmlCharacters.doubleQuote))
                .split(c)
                .join(i.xmlCharacters.ampersand))
                .split(u)
                .join(i.xmlCharacters.quote);
              for (var d = "", m = null, h = 0; h < e.length; h += 1) {
                var p = e.charAt(h);
                null == m
                  ? "$" === p
                    ? (m = "")
                    : (d += p)
                  : ";" === p
                  ? ((d += "&".concat(m)), (m = null))
                  : p.match(/([a-zA-Z0-9#._-] | '-')/)
                  ? (m += p)
                  : ((d += "$".concat(m)), (m = null), (h -= 1));
              }
              return d;
            },
          },
          {
            key: "safeXmlEncode",
            value: function (e) {
              var t = i.xmlCharacters.tagOpener,
                n = i.xmlCharacters.tagCloser,
                r = i.xmlCharacters.doubleQuote,
                a = i.xmlCharacters.ampersand,
                o = i.xmlCharacters.quote;
              return (e = (e = (e = (e = (e = e
                .split(t)
                .join(i.safeXmlCharacters.tagOpener))
                .split(n)
                .join(i.safeXmlCharacters.tagCloser))
                .split(r)
                .join(i.safeXmlCharacters.doubleQuote))
                .split(a)
                .join(i.safeXmlCharacters.ampersand))
                .split(o)
                .join(i.safeXmlCharacters.quote));
            },
          },
          {
            key: "mathMLEntities",
            value: function (e) {
              for (var t = "", n = 0; n < e.length; n += 1) {
                var i = e.charAt(n);
                if (e.codePointAt(n) > 128)
                  (t += "&#".concat(e.codePointAt(n), ";")),
                    e.codePointAt(n) > 65535 && (n += 1);
                else if ("&" === i) {
                  var r = e.indexOf(";", n + 1);
                  if (r >= 0) {
                    var a = document.createElement("span");
                    (a.innerHTML = e.substring(n, r + 1)),
                      (t += "&#".concat(
                        y.fixedCharCodeAt(a.textContent || a.innerText, 0),
                        ";"
                      )),
                      (n = r);
                  } else t += i;
                } else t += i;
              }
              return t;
            },
          },
          {
            key: "addCustomEditorClassAttribute",
            value: function (e, t) {
              var n = "",
                i = e.indexOf("<math");
              if (0 === i) {
                var r = e.indexOf(">");
                if (-1 === e.indexOf("class"))
                  return (
                    (n = ""
                      .concat(e.substr(i, r), ' class="wrs_')
                      .concat(t, '">')),
                    (n += e.substr(r + 1, e.length))
                  );
              }
              return e;
            },
          },
          {
            key: "removeCustomEditorClassAttribute",
            value: function (e, t) {
              return -1 === e.indexOf("class") ||
                -1 === e.indexOf("wrs_".concat(t))
                ? e
                : -1 !== e.indexOf('class="wrs_'.concat(t, '"'))
                ? e.replace('class="wrs_'.concat(t, '"'), "")
                : e.replace("wrs_".concat(t), "");
            },
          },
          {
            key: "addAnnotation",
            value: function (t, n, i) {
              var r = "";
              if (-1 !== t.indexOf("<annotation")) {
                var a = t.indexOf("</semantics>");
                r = ""
                  .concat(t.substring(0, a), '<annotation encoding="')
                  .concat(i, '">')
                  .concat(n, "</annotation>")
                  .concat(t.substring(a));
              } else if (e.isEmpty(t)) {
                var o = t.indexOf("/>"),
                  s = t.indexOf(">"),
                  l = s === o ? o : s;
                r = ""
                  .concat(
                    t.substring(0, l),
                    '><semantics><annotation encoding="'
                  )
                  .concat(i, '">')
                  .concat(n, "</annotation></semantics></math>");
              } else {
                var c = t.indexOf(">") + 1,
                  u = t.lastIndexOf("</math>"),
                  d = t.substring(c, u);
                r = ""
                  .concat(t.substring(0, c), "<semantics><mrow>")
                  .concat(d, '</mrow><annotation encoding="')
                  .concat(i, '">')
                  .concat(n, "</annotation></semantics></math>");
              }
              return r;
            },
          },
          {
            key: "removeAnnotation",
            value: function (t, n) {
              var i = t,
                r = '<annotation encoding="'.concat(n, '">'),
                a = "</annotation>",
                o = t.indexOf(r);
              if (-1 !== o) {
                for (var s = !1, l = t.indexOf("<annotation"); -1 !== l; )
                  l !== o && (s = !0), (l = t.indexOf("<annotation", l + 1));
                if (s) {
                  var c = t.indexOf(a, o) + a.length;
                  i = t.substring(0, o) + t.substring(c);
                } else i = e.removeSemantics(t);
              }
              return i;
            },
          },
          {
            key: "removeSemantics",
            value: function (e) {
              var t = "<semantics>",
                n = e,
                i = e.indexOf(t);
              if (-1 !== i) {
                var r = e.indexOf("<annotation", i + t.length);
                -1 !== r &&
                  (n =
                    e.substring(0, i) +
                    e.substring(i + t.length, r) +
                    "</math>");
              }
              return n;
            },
          },
          {
            key: "removeSemanticsOcurrences",
            value: function (e) {
              for (
                var t =
                    arguments.length > 1 && void 0 !== arguments[1]
                      ? arguments[1]
                      : i.xmlCharacters,
                  n = "".concat(t.tagOpener, "math"),
                  r = "".concat(t.tagOpener, "/math").concat(t.tagCloser),
                  a = "/".concat(t.tagCloser),
                  o = t.tagCloser,
                  s = "".concat(t.tagOpener, "semantics").concat(t.tagCloser),
                  l = "".concat(t.tagOpener, "annotation encoding="),
                  c = "",
                  u = e.indexOf(n),
                  d = 0;
                -1 !== u;

              ) {
                c += e.substring(d, u);
                var m = e.indexOf(r, u),
                  h = e.indexOf(a, u),
                  p = e.indexOf(o, u);
                -1 !== m ? (d = m) : h === p - 1 && (d = h);
                var g = e.indexOf(s, u);
                if (-1 !== g) {
                  var f = e.substring(u, g),
                    _ = e.indexOf(l, u);
                  if (-1 !== _) {
                    var v = g + s.length,
                      b = e.substring(v, _);
                    (c += f + b + r),
                      (u = e.indexOf(n, u + n.length)),
                      (d += r.length);
                  } else (d = u), (u = e.indexOf(n, u + n.length));
                } else (d = u), (u = e.indexOf(n, u + n.length));
              }
              return (c += e.substring(d, e.length));
            },
          },
          {
            key: "containClass",
            value: function (e, t) {
              var n = e.indexOf("class");
              if (-1 === n) return !1;
              var i = e.indexOf(">", n);
              return -1 !== e.substring(n, i).indexOf(t);
            },
          },
          {
            key: "isEmpty",
            value: function (e) {
              var t = e.indexOf(">"),
                n = e.indexOf("/>"),
                i = !1;
              if ((-1 !== n && n === t - 1 && (i = !0), !i)) {
                var r = new RegExp("</(.+:)?math>").exec(e);
                r && (i = t + 1 === r.index);
              }
              return i;
            },
          },
          {
            key: "encodeProperties",
            value: function (e) {
              return e.replace(/\w+=".*?"/g, function (e) {
                var t = e.indexOf('"'),
                  n = e.substring(t + 1, e.length - 1),
                  i = y.htmlEntities(n);
                return "".concat(e.substring(0, t + 1)).concat(i, '"');
              });
            },
          },
        ]),
        (n = null) && r(t.prototype, n),
        a && r(t, a),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    function o(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var s = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e);
      }
      var t, n, i;
      return (
        (t = e),
        (i = [
          {
            key: "addConfiguration",
            value: function (t) {
              Object.assign(e.properties, t);
            },
          },
          {
            key: "properties",
            get: function () {
              return e._properties;
            },
            set: function (t) {
              e._properties = t;
            },
          },
          {
            key: "get",
            value: function (t) {
              return Object.prototype.hasOwnProperty.call(e.properties, t)
                ? e.properties[t]
                : !!Object.prototype.hasOwnProperty.call(
                    e.properties,
                    "_wrs_conf_"
                  ) && e.properties["_wrs_conf_".concat(t)];
            },
          },
          {
            key: "set",
            value: function (t, n) {
              e.properties[t] = n;
            },
          },
          {
            key: "update",
            value: function (t, n) {
              if (e.get(t)) {
                var i = Object.assign(e.get(t), n);
                e.set(t, i);
              } else e.set(t, n);
            },
          },
        ]),
        (n = null) && o(t.prototype, n),
        i && o(t, i),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    function l(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    s._properties = {};
    var c = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e),
          (this.cache = []);
      }
      var t, n, i;
      return (
        (t = e),
        (n = [
          {
            key: "populate",
            value: function (e, t) {
              this.cache[e] = t;
            },
          },
          {
            key: "get",
            value: function (e) {
              return (
                !!Object.prototype.hasOwnProperty.call(this.cache, e) &&
                this.cache[e]
              );
            },
          },
        ]) && l(t.prototype, n),
        i && l(t, i),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    function u(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var d = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e),
          (this.listeners = []);
      }
      var t, n, i;
      return (
        (t = e),
        (n = [
          {
            key: "add",
            value: function (e) {
              this.listeners.push(e);
            },
          },
          {
            key: "fire",
            value: function (e, t) {
              for (var n = 0; n < this.listeners.length && !t.cancelled; n += 1)
                this.listeners[n].eventName === e &&
                  this.listeners[n].callback(t);
              return t.defaultPrevented;
            },
          },
        ]),
        (i = [
          {
            key: "newListener",
            value: function (e, t) {
              var n = {};
              return (n.eventName = e), (n.callback = t), n;
            },
          },
        ]),
        n && u(t.prototype, n),
        i && u(t, i),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    function m(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var h = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e);
      }
      var t, n, i;
      return (
        (t = e),
        (i = [
          {
            key: "listeners",
            get: function () {
              return e._listeners;
            },
          },
          {
            key: "addListener",
            value: function (t) {
              e.listeners.add(t);
            },
          },
          {
            key: "fireEvent",
            value: function (t, n) {
              e.listeners.fire(t, n);
            },
          },
          {
            key: "parameters",
            get: function () {
              return e._parameters;
            },
            set: function (t) {
              e._parameters = t;
            },
          },
          {
            key: "servicePaths",
            get: function () {
              return e._servicePaths;
            },
            set: function (t) {
              e._servicePaths = t;
            },
          },
          {
            key: "setServicePath",
            value: function (t, n) {
              e.servicePaths[t] = n;
            },
          },
          {
            key: "getServicePath",
            value: function (t) {
              return e.servicePaths[t];
            },
          },
          {
            key: "integrationPath",
            get: function () {
              return e._integrationPath;
            },
            set: function (t) {
              e._integrationPath = t;
            },
          },
          {
            key: "getServerURL",
            value: function () {
              var e = window.location.href.split("/");
              return "".concat(e[0], "//").concat(e[2]);
            },
          },
          {
            key: "init",
            value: function (t) {
              e.parameters = t;
              var n = e.createServiceURI("configurationjs"),
                i = e.createServiceURI("createimage"),
                r = e.createServiceURI("showimage"),
                a = e.createServiceURI("getmathml"),
                o = e.createServiceURI("service");
              if (0 === e.parameters.URI.indexOf("/")) {
                var s = e.getServerURL();
                (n = s + n), (r = s + r), (i = s + i), (a = s + a), (o = s + o);
              }
              e.setServicePath("configurationjs", n),
                e.setServicePath("showimage", r),
                e.setServicePath("createimage", i),
                e.setServicePath("service", o),
                e.setServicePath("getmathml", a),
                e.setServicePath("configurationjs", n),
                e.listeners.fire("onInit", {});
            },
          },
          {
            key: "getUrl",
            value: function (e, t) {
              var n = window.location
                  .toString()
                  .substr(0, window.location.toString().lastIndexOf("/") + 1),
                i = y.createHttpRequest();
              return i
                ? (void 0 === t || void 0 === t
                    ? i.open("GET", e, !1)
                    : "/" === e.substr(0, 1) ||
                      "http://" === e.substr(0, 7) ||
                      "https://" === e.substr(0, 8)
                    ? i.open("POST", e, !1)
                    : i.open("POST", n + e, !1),
                  void 0 !== t && t
                    ? (i.setRequestHeader(
                        "Content-type",
                        "application/x-www-form-urlencoded; charset=UTF-8"
                      ),
                      i.send(y.httpBuildQuery(t)))
                    : i.send(null),
                  i.responseText)
                : "";
            },
          },
          {
            key: "getService",
            value: function (t, n, i) {
              var r;
              if (!0 === i) {
                var a = n ? "?".concat(n) : "",
                  o = "".concat(e.getServicePath(t)).concat(a);
                r = e.getUrl(o);
              } else {
                var s = e.getServicePath(t);
                r = e.getUrl(s, n);
              }
              return r;
            },
          },
          {
            key: "getServerLanguageFromService",
            value: function (e) {
              return -1 !== e.indexOf(".php")
                ? "php"
                : -1 !== e.indexOf(".aspx")
                ? "aspx"
                : -1 !== e.indexOf("wirispluginengine")
                ? "ruby"
                : "java";
            },
          },
          {
            key: "createServiceURI",
            value: function (t) {
              var n = e.serverExtension();
              return y.concatenateUrl(e.parameters.URI, t) + n;
            },
          },
          {
            key: "serverExtension",
            value: function () {
              return -1 !== e.parameters.server.indexOf("php")
                ? ".php"
                : -1 !== e.parameters.server.indexOf("aspx")
                ? ".aspx"
                : "";
            },
          },
        ]),
        (n = null) && m(t.prototype, n),
        i && m(t, i),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    function p(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    (h._servicePaths = {}),
      (h._integrationPath = ""),
      (h._listeners = new d()),
      (h._parameters = {});
    var g = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e);
      }
      var t, n, r;
      return (
        (t = e),
        (r = [
          {
            key: "cache",
            get: function () {
              return e._cache;
            },
            set: function (t) {
              e._cache = t;
            },
          },
          {
            key: "getLatexFromMathML",
            value: function (t) {
              var n = a.removeSemantics(t),
                i = e.cache,
                r = { service: "mathml2latex", mml: n },
                o = JSON.parse(h.getService("service", r)),
                s = "";
              if ("ok" === o.status) {
                s = o.result.text;
                var l = y.htmlEntities(s),
                  c = a.addAnnotation(t, l, "LaTeX");
                i.populate(s, c);
              }
              return s;
            },
          },
          {
            key: "getMathMLFromLatex",
            value: function (t, n) {
              var i = e.cache;
              if (e.cache.get(t)) return e.cache.get(t);
              var r = { service: "latex2mathml", latex: t };
              n && (r.saveLatex = "");
              var o,
                s = JSON.parse(h.getService("service", r));
              if ("ok" === s.status) {
                var l = s.result.text;
                if (
                  -1 ===
                    (l = l.split("\r").join("").split("\n").join(" ")).indexOf(
                      "semantics"
                    ) &&
                  -1 === l.indexOf("annotation")
                ) {
                  var c = y.htmlEntities(t);
                  o = l = a.addAnnotation(l, c, "LaTeX");
                } else o = l;
                i.get(t) || i.populate(t, l);
              } else o = "$$".concat(t, "$$");
              return o;
            },
          },
          {
            key: "parseMathmlToLatex",
            value: function (t, n) {
              for (
                var r,
                  o,
                  s,
                  l = "",
                  c = "".concat(n.tagOpener, "math"),
                  u = "".concat(n.tagOpener, "/math").concat(n.tagCloser),
                  d = ""
                    .concat(n.tagOpener, "annotation encoding=")
                    .concat(n.doubleQuote, "LaTeX")
                    .concat(n.doubleQuote)
                    .concat(n.tagCloser),
                  m = "".concat(n.tagOpener, "/annotation").concat(n.tagCloser),
                  h = t.indexOf(c),
                  p = 0;
                -1 !== h;

              ) {
                if (
                  ((l += t.substring(p, h)),
                  -1 === (p = t.indexOf(u, h))
                    ? (p = t.length - 1)
                    : (p += u.length),
                  -1 !== (o = (r = t.substring(h, p)).indexOf(d)))
                ) {
                  (o += d.length), (s = r.indexOf(m));
                  var g = r.substring(o, s);
                  n === i.safeXmlCharacters && (g = a.safeXmlDecode(g)),
                    (l += "$$".concat(g, "$$")),
                    e.cache.populate(g, r);
                } else l += r;
                h = t.indexOf(c, p);
              }
              return (l += t.substring(p, t.length));
            },
          },
          {
            key: "getLatexFromTextNode",
            value: function (e, t, n) {
              (void 0 !== n && null != n) || (n = { open: "$$", close: "$$" });
              for (
                var i, r = e;
                r.previousSibling && 3 === r.previousSibling.nodeType;

              )
                r = r.previousSibling;
              function a(e, t, i) {
                for (var r = e.nodeValue.indexOf(i, t); -1 === r; ) {
                  if (!(e = e.nextSibling)) return null;
                  r = e.nodeValue ? e.nodeValue.indexOf(n.close) : -1;
                }
                return { node: e, position: r };
              }
              function o(e, t, n, i) {
                if (e === n) return t <= i;
                for (; e && e !== n; ) e = e.nextSibling;
                return e === n;
              }
              var s,
                l = { node: r, position: 0 },
                c = n.open.length;
              do {
                if (
                  null == (i = a(l.node, l.position, n.open)) ||
                  o(e, t, i.node, i.position)
                )
                  return null;
                if (null == (l = a(i.node, i.position + c, n.close)))
                  return null;
                l.position += c;
              } while (o(l.node, l.position, e, t));
              if (i.node === l.node)
                s = i.node.nodeValue.substring(i.position + c, l.position - c);
              else {
                var u = i.position + c;
                s = i.node.nodeValue.substring(u, i.node.nodeValue.length);
                var d = i.node;
                do {
                  (d = d.nextSibling) === l.node
                    ? (s += l.node.nodeValue.substring(0, l.position - c))
                    : (s += d.nodeValue ? d.nodeValue : "");
                } while (d !== l.node);
              }
              return {
                latex: s,
                startNode: i.node,
                startPosition: i.position,
                endNode: l.node,
                endPosition: l.position,
              };
            },
          },
        ]),
        (n = null) && p(t.prototype, n),
        r && p(t, r),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    g._cache = new c();
    const f = JSON.parse(
      '{"ar":{"latex":"LaTeX","cancel":"إلغاء","accept":"إدراج","manual":"الدليل","insert_math":"إدراج صيغة رياضية - MathType","insert_chem":"إدراج صيغة كيميائية - ChemType","minimize":"تصغير","maximize":"تكبير","fullscreen":"ملء الشاشة","exit_fullscreen":"الخروج من ملء الشاشة","close":"إغلاق","mathtype":"MathType","title_modalwindow":"نافذة MathType مشروطة","close_modal_warning":"هل تريد المغادرة بالتأكيد؟ ستُفقد التغييرات التي أجريتها.","latex_name_label":"صيغة Latex","browser_no_compatible":"المستعرض غير متوافق مع تقنية AJAX. الرجاء استخدام أحدث إصدار من Mozilla Firefox.","error_convert_accessibility":"حدث خطأ أثناء التحويل من MathML إلى نص قابل للاستخدام.","exception_cross_site":"البرمجة النصية للمواقع المشتركة مسموح بها لـ HTTP فقط.","exception_high_surrogate":"المركّب المرتفع غير متبوع بمركّب منخفض في fixedCharCodeAt()‎","exception_string_length":"سلسلة غير صالحة. يجب أن يكون الطول من مضاعفات العدد 4","exception_key_nonobject":"Object.keys مستدعاة على غير كائن","exception_null_or_undefined":" هذا فارغ أو غير محدد","exception_not_function":" ليست دالة","exception_invalid_date_format":"تنسيق تاريخ غير صالح: ","exception_casting":"لا يمكن الصياغة ","exception_casting_to":" إلى "},"ca":{"latex":"LaTeX","cancel":"Cancel·lar","accept":"Inserir","manual":"Manual","insert_math":"Inserir fórmula matemàtica - MathType","insert_chem":"Inserir fórmula química - ChemType","minimize":"Minimitza","maximize":"Maximitza","fullscreen":"Pantalla completa","exit_fullscreen":"Sortir de la pantalla complera","close":"Tanca","mathtype":"MathType","title_modalwindow":" Finestra modal de MathType","close_modal_warning":"N\'estàs segur que vols sortir? Es perdran els canvis que has fet.","latex_name_label":"Fórmula en Latex","browser_no_compatible":"El teu navegador no és compatible amb AJAX. Si us plau, usa la darrera versió de Mozilla Firefox.","error_convert_accessibility":"Error en convertir de MathML a text accessible.","exception_cross_site":"Els scripts de llocs creuats només estan permesos per HTTP.","exception_high_surrogate":"Subrogat alt no seguit de subrogat baix a fixedCharCodeAt()","exception_string_length":"Cadena invàlida. La longitud ha de ser un múltiple de 4","exception_key_nonobject":"Object.keys anomenat a non-object","exception_null_or_undefined":" això és null o no definit","exception_not_function":" no és una funció","exception_invalid_date_format":"Format de data invàlid : ","exception_casting":"No es pot emetre ","exception_casting_to":" a "},"cs":{"latex":"LaTeX","cancel":"Storno","accept":"Vložit","manual":"Příručka","insert_math":"Vložit matematický vzorec - MathType","insert_chem":"Vložení chemického vzorce – ChemType","minimize":"Minimalizovat","maximize":"Maximalizovat","fullscreen":"Celá obrazovka","exit_fullscreen":"Opustit režim celé obrazovky","close":"Zavřít","mathtype":"MathType","title_modalwindow":"Modální okno MathType","close_modal_warning":"Opravdu chcete okno zavřít? Provedené změny budou ztraceny.","latex_name_label":"Vzorec v LaTeXu","browser_no_compatible":"Váš prohlížeč nepodporuje technologii AJAX. Použijte nejnovější verzi prohlížeče Mozilla Firefox.","error_convert_accessibility":"Při převodu kódu MathML na čitelný text došlo k chybě.","exception_cross_site":"Skriptování mezi více servery je povoleno jen v HTTP.","exception_high_surrogate":"Ve funkci fixedCharCodeAt() nenásleduje po první části kódu znaku druhá část","exception_string_length":"Neplatný řetězec. Délka musí být násobkem 4.","exception_key_nonobject":"Funkce Object.keys byla použita pro prvek, který není objektem","exception_null_or_undefined":" hodnota je null nebo není definovaná","exception_not_function":" není funkce","exception_invalid_date_format":"Neplatný formát data: ","exception_casting":"Nelze přetypovat ","exception_casting_to":" na "},"da":{"latex":"LaTeX","cancel":"Annuller","accept":"Indsæt","manual":"Brugervejledning","insert_math":"Indsæt matematisk formel - MathType","insert_chem":"Indsæt en kemisk formel - ChemType","minimize":"Minimer","maximize":"Maksimer","fullscreen":"Fuld skærm","exit_fullscreen":"Afslut Fuld skærm","close":"Luk","mathtype":"MathType","title_modalwindow":"MathType-modalvindue","close_modal_warning":"Er du sikker på, du vil lukke? Dine ændringer går tabt.","latex_name_label":"LaTex-formel","browser_no_compatible":"Din browser er ikke kompatibel med AJAX-teknologi. Brug den nyeste version af Mozilla Firefox.","error_convert_accessibility":"Fejl under konvertering fra MathML til tilgængelig tekst.","exception_cross_site":"Scripts på tværs af websteder er kun tilladt for HTTP.","exception_high_surrogate":"Et højt erstatningstegn er ikke fulgt af et lavt erstatningstegn i fixedCharCodeAt()","exception_string_length":"Ugyldig streng. Længden skal være et multiplum af 4","exception_key_nonobject":"Object.keys kaldet ved ikke-objekt","exception_null_or_undefined":" dette er nul eller ikke defineret","exception_not_function":" er ikke en funktion","exception_invalid_date_format":"Ugyldigt datoformat: ","exception_casting":"Kan ikke beregne ","exception_casting_to":" til "},"de":{"latex":"LaTeX","cancel":"Abbrechen","accept":"Einfügen","manual":"Handbuch","insert_math":"Mathematische Formel einfügen - MathType","insert_chem":"Eine chemische Formel einfügen – ChemType","minimize":"Verkleinern","maximize":"Vergrößern","fullscreen":"Vollbild","exit_fullscreen":"Vollbild schließen","close":"Schließen","mathtype":"MathType","title_modalwindow":"Modales MathType-Fenster","close_modal_warning":"Bist du sicher, dass du das Programm verlassen willst? Alle vorgenommenen Änderungen gehen damit verloren.","latex_name_label":"Latex-Formel","browser_no_compatible":"Dein Browser ist nicht mit der AJAX-Technologie kompatibel. Verwende bitte die neueste Version von Mozilla Firefox.","error_convert_accessibility":"Fehler beim Konvertieren von MathML in barrierefreien Text.","exception_cross_site":"Cross-Site-Scripting ist nur bei HTTP zulässig.","exception_high_surrogate":"Hoher Ersatz bei bei festerZeichenkodierungbei() nicht von niedrigem Ersatz befolgt.","exception_string_length":"Ungültige Zeichenfolge. Länge muss ein Vielfaches von 4 sein.","exception_key_nonobject":"Object.keys wurde für ein Nicht-Objekt aufgerufen.","exception_null_or_undefined":" Das ist Null oder nicht definiert.","exception_not_function":" ist keine Funktion","exception_invalid_date_format":"Ungültiges Datumsformat: ","exception_casting":"Umwandlung nicht möglich ","exception_casting_to":" zu "},"el":{"latex":"LaTeX","cancel":"Άκυρο","accept":"Εισαγωγή","manual":"Χειροκίνητα","insert_math":"Εισαγωγή μαθηματικού τύπου - MathType","insert_chem":"Εισαγωγή χημικού τύπου - ChemType","minimize":"Ελαχιστοποίηση","maximize":"Μεγιστοποίηση","fullscreen":"Πλήρης οθόνη","exit_fullscreen":"Έξοδος από πλήρη οθόνη","close":"Κλείσιμο","mathtype":"MathType","title_modalwindow":"Τροπικό παράθυρο MathType","close_modal_warning":"Επιθυμείτε σίγουρα αποχώρηση; Θα χαθούν οι αλλαγές που έχετε κάνει.","latex_name_label":"Τύπος LaTeX","browser_no_compatible":"Το πρόγραμμα περιήγησής σας δεν είναι συμβατό με την τεχνολογία AJAX. Χρησιμοποιήστε την πιο πρόσφατη έκδοση του Mozilla Firefox.","error_convert_accessibility":"Σφάλμα κατά τη μετατροπή από MathML σε προσβάσιμο κείμενο.","exception_cross_site":"Το XSS (Cross site scripting) επιτρέπεται μόνο για HTTP.","exception_high_surrogate":"Το υψηλό υποκατάστατο δεν ακολουθείται από χαμηλό υποκατάστατο στο fixedCharCodeAt()","exception_string_length":"Μη έγκυρη συμβολοσειρά. Το μήκος πρέπει να είναι πολλαπλάσιο του 4","exception_key_nonobject":"Έγινε κλήση του Object.keys σε μη αντικείμενο","exception_null_or_undefined":" αυτό είναι μηδενικό ή δεν έχει οριστεί","exception_not_function":" δεν είναι συνάρτηση","exception_invalid_date_format":"Μη έγκυρη μορφή ημερομηνίας: ","exception_casting":"Δεν είναι δυνατή η μετατροπή ","exception_casting_to":" σε "},"en":{"latex":"LaTeX","cancel":"Cancel","accept":"Insert","manual":"Manual","insert_math":"Insert a math equation - MathType","insert_chem":"Insert a chemistry formula - ChemType","minimize":"Minimize","maximize":"Maximize","fullscreen":"Full-screen","exit_fullscreen":"Exit full-screen","close":"Close","mathtype":"MathType","title_modalwindow":"MathType modal window","close_modal_warning":"Are you sure you want to leave? The changes you made will be lost.","latex_name_label":"Latex Formula","browser_no_compatible":"Your browser is not compatible with AJAX technology. Please, use the latest version of Mozilla Firefox.","error_convert_accessibility":"Error converting from MathML to accessible text.","exception_cross_site":"Cross site scripting is only allowed for HTTP.","exception_high_surrogate":"High surrogate not followed by low surrogate in fixedCharCodeAt()","exception_string_length":"Invalid string. Length must be a multiple of 4","exception_key_nonobject":"Object.keys called on non-object","exception_null_or_undefined":" this is null or not defined","exception_not_function":" is not a function","exception_invalid_date_format":"Invalid date format : ","exception_casting":"Cannot cast ","exception_casting_to":" to "},"es":{"latex":"LaTeX","cancel":"Cancelar","accept":"Insertar","manual":"Manual","insert_math":"Insertar fórmula matemática - MathType","insert_chem":"Insertar fórmula química - ChemType","minimize":"Minimizar","maximize":"Maximizar","fullscreen":"Pantalla completa","exit_fullscreen":"Salir de pantalla completa","close":"Cerrar","mathtype":"MathType","title_modalwindow":"Ventana modal de MathType","close_modal_warning":"Seguro que quieres cerrar? Los cambios que has hecho se perderán","latex_name_label":"Formula en Latex","browser_no_compatible":"Tu navegador no es complatible con AJAX. Por favor, usa la última version de Mozilla Firefox.","error_convert_accessibility":"Error conviertiendo una fórmula MathML a texto accesible.","exception_cross_site":"Cross site scripting solo está permitido para HTTP.","exception_high_surrogate":"Subrogado alto no seguido por subrogado bajo en fixedCharCodeAt()","exception_string_length":"Cadena no válida. La longitud debe ser múltiplo de 4","exception_key_nonobject":"Object.keys called on non-object","exception_null_or_undefined":" esto es null o no definido","exception_not_function":" no es una función","exception_invalid_date_format":"Formato de fecha inválido: ","exception_casting":"No se puede emitir","exception_casting_to":" a "},"et":{"latex":"LaTeX","cancel":"Loobu","accept":"Lisa","manual":"Käsiraamat","insert_math":"Lisa matemaatiline valem – WIRIS","insert_chem":"Lisa keemiline valem – ChemType","minimize":"Minimeeri","maximize":"Maksimeeri","fullscreen":"Täiskuva","exit_fullscreen":"Välju täiskuvalt","close":"Sule","mathtype":"MathType","title_modalwindow":"MathType\'i modaalaken","close_modal_warning":"Kas soovite kindlasti lahkuda? Tehtud muudatused lähevad kaduma.","latex_name_label":"Latexi valem","browser_no_compatible":"Teie brauser ei ühildu AJAXi tehnoloogiaga. Palun kasutage Mozilla Firefoxi uusimat versiooni.","error_convert_accessibility":"Tõrge teisendamisel MathML-ist muudetavaks tekstiks.","exception_cross_site":"Ristskriptimine on lubatud ainult HTTP kasutamisel.","exception_high_surrogate":"Funktsioonis fixedCharCodeAt() ei järgne kõrgemale asendusliikmele madalam asendusliige.","exception_string_length":"Vigane string. Pikkus peab olema 4 kordne.","exception_key_nonobject":"Protseduur Object.keys kutsuti mitteobjekti korral.","exception_null_or_undefined":" see on null või määramata","exception_not_function":" ei ole funktsioon","exception_invalid_date_format":"Sobimatu kuupäeva kuju: ","exception_casting":"Esitamine ei õnnestu ","exception_casting_to":" – "},"eu":{"latex":"LaTeX","cancel":"Ezeztatu","accept":"Txertatu","manual":"Gida","insert_math":"Txertatu matematikako formula - MathType","insert_chem":"Txertatu formula kimiko bat - ChemType","minimize":"Ikonotu","maximize":"Maximizatu","fullscreen":"Pantaila osoa","exit_fullscreen":"Irten pantaila osotik","close":"Itxi","mathtype":"MathType","title_modalwindow":"MathType leiho modala","close_modal_warning":"Ziur irten nahi duzula? Egiten dituzun aldaketak galdu egingo dira.","latex_name_label":"LaTex Formula","browser_no_compatible":"Zure arakatzailea ez da bateragarria AJAX teknologiarekin. Erabili Mozilla Firefoxen azken bertsioa.","error_convert_accessibility":"Errorea MathMLtik testu irisgarrira bihurtzean.","exception_cross_site":"Gune arteko scriptak HTTPrako soilik onartzen dira.","exception_high_surrogate":"Ordezko baxuak ez dio ordezko altuari jarraitzen, hemen: fixedCharCodeAt()","exception_string_length":"Kate baliogabea. Luzerak 4ren multiploa izan behar du","exception_key_nonobject":"Object.keys deitu zaio objektua ez den zerbaiti","exception_null_or_undefined":" nulua edo definitu gabea da","exception_not_function":" ez da funtzio bat","exception_invalid_date_format":"Data-formatu baliogabea : ","exception_casting":"Ezin da igorri ","exception_casting_to":" honi "},"fi":{"latex":"LaTeX","cancel":"Peruuta","accept":"Lisää","manual":"Manual","insert_math":"Liitä matemaattinen kaava - MathType","insert_chem":"Lisää kemian kaava - ChemType","minimize":"Pienennä","maximize":"Suurenna","fullscreen":"Koko ruutu","exit_fullscreen":"Poistu koko ruudun tilasta","close":"Sulje","mathtype":"MathType","title_modalwindow":"MathTypen modaalinen ikkuna","close_modal_warning":"Oletko varma, että haluat poistua? Menetät tekemäsi muutokset.","latex_name_label":"Latex-kaava","browser_no_compatible":"Selaimesi ei tue AJAX-tekniikkaa. Ole hyvä ja käytä uusinta Firefox-versiota.","error_convert_accessibility":"Virhe muunnettaessa MathML:stä tekstiksi.","exception_cross_site":"Cross site scripting sallitaan vain HTTP:llä.","exception_high_surrogate":"fixedCharCodeAt(): yläsijaismerkkiä ei seurannut alasijaismerkki","exception_string_length":"Epäkelpo merkkijono. Pituuden on oltava 4:n kerrannainen","exception_key_nonobject":"Object.keys kutsui muuta kuin oliota","exception_null_or_undefined":" tämä on null tai ei määritelty","exception_not_function":" ei ole funktio","exception_invalid_date_format":"Virheellinen päivämäärämuoto : ","exception_casting":"Ei voida muuntaa tyyppiä ","exception_casting_to":" tyyppiin "},"fr":{"latex":"LaTeX","cancel":"Annuler","accept":"Insérer","manual":"Manuel","insert_math":"Insérer une formule mathématique - MathType","insert_chem":"Insérer une formule chimique - ChemType","minimize":"Minimiser","maximize":"Maximiser","fullscreen":"Plein écran","exit_fullscreen":"Quitter le plein écran","close":"Fermer","mathtype":"MathType","title_modalwindow":"Fenêtre modale MathType","close_modal_warning":"Confirmez-vous vouloir fermer ? Les changements effectués seront perdus.","latex_name_label":"Formule LaTeX","browser_no_compatible":"Votre navigateur n’est pas compatible avec la technologie AJAX. Veuillez utiliser la dernière version de Mozilla Firefox.","error_convert_accessibility":"Une erreur de conversion du format MathML en texte accessible est survenue.","exception_cross_site":"Le cross-site scripting n’est autorisé que pour HTTP.","exception_high_surrogate":"Substitut élevé non suivi d’un substitut inférieur dans fixedCharCodeAt()","exception_string_length":"Chaîne non valide. Longueur limitée aux multiples de 4","exception_key_nonobject":"Object.keys appelé sur un non-objet","exception_null_or_undefined":" nul ou non défini","exception_not_function":" n’est pas une fonction","exception_invalid_date_format":"Format de date non valide : ","exception_casting":"Impossible de convertir ","exception_casting_to":" sur "},"gl":{"latex":"LaTeX","cancel":"Cancelar","accept":"Inserir","manual":"Manual","insert_math":"Inserir unha fórmula matemática - MathType","insert_chem":"Inserir unha fórmula química - ChemType","minimize":"Minimizar","maximize":"Maximizar","fullscreen":"Pantalla completa","exit_fullscreen":"Saír da pantalla completa","close":"Pechar","mathtype":"MathType","title_modalwindow":"Ventá modal de MathType","close_modal_warning":"Seguro que quere saír? Perderanse os cambios realizados.","latex_name_label":"Fórmula Latex","browser_no_compatible":"O seu explorador non é compatible coa tecnoloxía AJAX. Use a versión máis recente de Mozilla Firefox.","error_convert_accessibility":"Erro ao converter de MathML a texto accesible.","exception_cross_site":"Os scripts de sitios só se permiten para HTTP.","exception_high_surrogate":"Suplente superior non seguido por suplente inferior en fixedCharCodeAt()","exception_string_length":"Cadea non válida. A lonxitude debe ser un múltiplo de 4","exception_key_nonobject":"Claves de obxecto chamadas en non obxecto","exception_null_or_undefined":" nulo ou non definido","exception_not_function":" non é unha función","exception_invalid_date_format":"Formato de data non válido: ","exception_casting":"Non se pode converter ","exception_casting_to":" a "},"he":{"latex":"LaTeX","cancel":"ביטול","accept":"עדכון","manual":"ידני","insert_math":"הוספת נוסחה מתמטית - MathType","insert_chem":"הוספת כתיבה כימית - ChemType","minimize":"מזערי","maximize":"מרבי","fullscreen":"מסך מלא","exit_fullscreen":"יציאה ממצב מסך מלא","close":"סגירה","mathtype":"MathType","title_modalwindow":"חלון מודאלי של MathType","close_modal_warning":"האם לצאת? שינויים אשר בוצעו ימחקו.","latex_name_label":"נוסחת Latex","browser_no_compatible":"הדפדפן שלך אינו תואם לטכנולוגיית AJAX. יש להשתמש בגרסה העדכנית ביותר של Mozilla Firefox.","error_convert_accessibility":"שגיאה בהמרה מ-MathML לטקסט נגיש.","exception_cross_site":"סקריפטינג חוצה-אתרים מורשה עבור HTTP בלבד.","exception_high_surrogate":"ערך ממלא מקום גבוה אינו מופיע אחרי ערך ממלא מקום נמוך ב-fixedCharCodeAt()‎","exception_string_length":"מחרוזת לא חוקית. האורך חייב להיות כפולה של 4","exception_key_nonobject":"בוצעה קריאה אל Object.keys ברכיב שאינו אובייקט","exception_null_or_undefined":" הוא Null או לא מוגדר","exception_not_function":"איננה פונקציה","exception_invalid_date_format":"תסדיר תאריך אינו תקין : ","exception_casting":"לא ניתן להמיר ","exception_casting_to":" ל "},"hr":{"latex":"LaTeX","cancel":"Poništi","accept":"Umetni","manual":"Priručnik","insert_math":"Umetnite matematičku formulu - MathType","insert_chem":"Umetnite kemijsku formulu - ChemType","minimize":"Minimiziraj","maximize":"Maksimiziraj","fullscreen":"Cijeli zaslon","exit_fullscreen":"Izlaz iz prikaza na cijelom zaslonu","close":"Zatvori","mathtype":"MathType","title_modalwindow":"MathType modalni prozor","close_modal_warning":"Sigurno želite zatvoriti? Izgubit će se unesene promjene.","latex_name_label":"Latex formula","browser_no_compatible":"Vaš preglednik nije kompatibilan s AJAX tehnologijom. Upotrijebite najnoviju verziju Mozilla Firefoxa.","error_convert_accessibility":"Pogreška konverzije iz MathML-a u dostupni tekst.","exception_cross_site":"Skriptiranje na različitim web-mjestima dopušteno je samo za HTTP.","exception_high_surrogate":"Iza visoke zamjene ne slijedi niska zamjena u fixedCharCodeAt()","exception_string_length":"Nevažeći niz. Duljina mora biti višekratnik broja 4","exception_key_nonobject":"Object.keys pozvano na ne-objekt","exception_null_or_undefined":" ovo je nula ili nije definirano","exception_not_function":" nije funkcija","exception_invalid_date_format":"Nevažeći format datuma : ","exception_casting":"Ne može se poslati ","exception_casting_to":" na "},"hu":{"latex":"LaTeX","cancel":"Mégsem","accept":"Beszúrás","manual":"Kézikönyv","insert_math":"Matematikai képlet beszúrása - MathType","insert_chem":"Kémiai képet beillesztése - ChemType","minimize":"Kis méret","maximize":"Nagy méret","fullscreen":"Teljes képernyő","exit_fullscreen":"Teljes képernyő elhagyása","close":"Bezárás","mathtype":"MathType","title_modalwindow":"MathType modális ablak","close_modal_warning":"Biztosan kilép? A módosítások el fognak veszni.","latex_name_label":"Latex képlet","browser_no_compatible":"A böngészője nem kompatibilis az AJAX technológiával. Használja a Mozilla Firefox legújabb verzióját.","error_convert_accessibility":"Hiba lépett fel a MathML szöveggé történő konvertálása során.","exception_cross_site":"Az oldalak közti scriptelés csak HTTP esetén engedélyezett.","exception_high_surrogate":"A magas helyettesítő karaktert nem alacsony helyettesítő karakter követi a fixedCharCodeAt() esetében","exception_string_length":"Érvénytelen karakterlánc. A hossznak a 4 többszörösének kell lennie","exception_key_nonobject":"Az Object.keys egy nem objektumra került meghívásra","exception_null_or_undefined":" null vagy nem definiált","exception_not_function":" nem függvény","exception_invalid_date_format":"Érvénytelen dátumformátum: ","exception_casting":"Nem alkalmazható ","exception_casting_to":" erre "},"id":{"latex":"LaTeX","cancel":"Membatalkan","accept":"Masukkan","manual":"Manual","insert_math":"Masukkan rumus matematika - MathType","insert_chem":"Masukkan rumus kimia - ChemType","minimize":"Minikan","maximize":"Perbesar","fullscreen":"Layar penuh","exit_fullscreen":"Keluar layar penuh","close":"Tutup","mathtype":"MathType","title_modalwindow":"Jendela modal MathType","close_modal_warning":"Anda yakin ingin keluar? Anda akan kehilangan perubahan yang Anda buat.","latex_name_label":"Rumus Latex","browser_no_compatible":"Penjelajah Anda tidak kompatibel dengan teknologi AJAX. Harap gunakan Mozilla Firefox versi terbaru.","error_convert_accessibility":"Kesalahan konversi dari MathML menjadi teks yang dapat diakses.","exception_cross_site":"Skrip lintas situs hanya diizinkan untuk HTTP.","exception_high_surrogate":"Pengganti tinggi tidak diikuti oleh pengganti rendah di fixedCharCodeAt()","exception_string_length":"String tidak valid. Panjang harus kelipatan 4","exception_key_nonobject":"Object.keys meminta nonobjek","exception_null_or_undefined":" ini tidak berlaku atau tidak didefinisikan","exception_not_function":" bukan sebuah fungsi","exception_invalid_date_format":"Format tanggal tidak valid : ","exception_casting":"Tidak dapat mentransmisikan ","exception_casting_to":" untuk "},"it":{"latex":"LaTeX","cancel":"Annulla","accept":"Inserisci","manual":"Manuale","insert_math":"Inserisci una formula matematica - MathType","insert_chem":"Inserisci una formula chimica - ChemType","minimize":"Riduci a icona","maximize":"Ingrandisci","fullscreen":"Schermo intero","exit_fullscreen":"Esci da schermo intero","close":"Chiudi","mathtype":"MathType","title_modalwindow":"Finestra modale di MathType","close_modal_warning":"Confermi di voler uscire? Le modifiche effettuate andranno perse.","latex_name_label":"Formula LaTeX","browser_no_compatible":"Il tuo browser non è compatibile con la tecnologia AJAX. Utilizza la versione più recente di Mozilla Firefox.","error_convert_accessibility":"Errore durante la conversione da MathML in testo accessibile.","exception_cross_site":"Lo scripting tra siti è consentito solo per HTTP.","exception_high_surrogate":"Surrogato alto non seguito da surrogato basso in fixedCharCodeAt()","exception_string_length":"Stringa non valida. La lunghezza deve essere un multiplo di 4","exception_key_nonobject":"Metodo Object.keys richiamato in un elemento non oggetto","exception_null_or_undefined":" questo è un valore null o non definito","exception_not_function":" non è una funzione","exception_invalid_date_format":"Formato di data non valido: ","exception_casting":"Impossibile eseguire il cast ","exception_casting_to":" a "},"ja":{"latex":"LaTeX","cancel":"キャンセル","accept":"挿入","manual":"マニュアル","insert_math":"数式を挿入 - MathType","insert_chem":"化学式を挿入 - ChemType","minimize":"最小化","maximize":"最大化","fullscreen":"全画面表示","exit_fullscreen":"全画面表示を解除","close":"閉じる","mathtype":"MathType","title_modalwindow":"MathType モードウィンドウ","close_modal_warning":"このページから移動してもよろしいですか？変更内容は失われます。","latex_name_label":"LaTeX 数式","browser_no_compatible":"お使いのブラウザは、AJAX 技術と互換性がありません。Mozilla Firefox の最新バージョンをご使用ください。","error_convert_accessibility":"MathML からアクセシブルなテキストへの変換中にエラーが発生しました。","exception_cross_site":"クロスサイトスクリプティングは、HTTP のみに許可されています。","exception_high_surrogate":"fixedCharCodeAt（）で上位サロゲートの後に下位サロゲートがありません","exception_string_length":"無効な文字列です。長さは4の倍数である必要があります","exception_key_nonobject":"Object.keys が非オブジェクトで呼び出されました","exception_null_or_undefined":" null であるか、定義されていません","exception_not_function":" は関数ではありません","exception_invalid_date_format":"無効な日付形式: ","exception_casting":"次にキャスト ","exception_casting_to":" できません "},"ko":{"latex":"LaTeX","cancel":"취소","accept":"삽입","manual":"설명서","insert_math":"수학 공식 삽입 - MathType","insert_chem":"화학 공식 입력하기 - ChemType","minimize":"최소화","maximize":"최대화","fullscreen":"전체 화면","exit_fullscreen":"전체 화면 나가기","close":"닫기","mathtype":"MathType","title_modalwindow":"MathType 모달 창","close_modal_warning":"정말로 나가시겠습니까? 변경 사항이 손실됩니다.","latex_name_label":"Latex 공식","browser_no_compatible":"사용자의 브라우저는 AJAX 기술과 호환되지 않습니다. Mozilla Firefox 최신 버전을 사용하십시오.","error_convert_accessibility":"MathML로부터 접근 가능한 텍스트로 오류 변환.","exception_cross_site":"사이트 교차 스크립팅은 HTTP 환경에서만 사용할 수 있습니다.","exception_high_surrogate":"fixedCharCodeAt()에서는 상위 서러게이트 뒤에 하위 서러게이트가 붙지 않습니다","exception_string_length":"유효하지 않은 스트링입니다. 길이는 4의 배수여야 합니다","exception_key_nonobject":"Object.keys가 non-object를 요청하였습니다","exception_null_or_undefined":" Null값이거나 정의되지 않았습니다","exception_not_function":" 함수가 아닙니다","exception_invalid_date_format":"유효하지 않은 날짜 포맷 : ","exception_casting":"캐스팅할 수 없습니다 ","exception_casting_to":" (으)로 "},"nl":{"latex":"LaTeX","cancel":"Annuleren","insert_chem":"Een scheikundige formule invoegen - ChemType","minimize":"Minimaliseer","maximize":"Maximaliseer","fullscreen":"Schermvullend","exit_fullscreen":"Verlaat volledig scherm","close":"Sluit","mathtype":"MathType","title_modalwindow":"Modaal venster MathType","close_modal_warning":"Weet je zeker dat je de app wilt sluiten? De gemaakte wijzigingen gaan verloren.","latex_name_label":"LaTeX-formule","browser_no_compatible":"Je browser is niet compatibel met AJAX-technologie. Gebruik de meest recente versie van Mozilla Firefox.","error_convert_accessibility":"Fout bij conversie van MathML naar toegankelijke tekst.","exception_cross_site":"Cross-site scripting is alleen toegestaan voor HTTP.","exception_high_surrogate":"Hoog surrogaat niet gevolgd door laag surrogaat in fixedCharCodeAt()","exception_string_length":"Ongeldige tekenreeks. Lengte moet een veelvoud van 4 zijn","exception_key_nonobject":"Object.keys opgeroepen voor niet-object","exception_null_or_undefined":" dit is nul of niet gedefinieerd","exception_not_function":" is geen functie","exception_invalid_date_format":"Ongeldige datumnotatie: ","exception_casting":"Kan niet weergeven ","exception_casting_to":" op "},"no":{"latex":"LaTeX","cancel":"Avbryt","accept":"Set inn","manual":"Håndbok","insert_math":"Sett inn matematikkformel - MathType","insert_chem":"Set inn ein kjemisk formel – ChemType","minimize":"Minimer","maximize":"Maksimer","fullscreen":"Fullskjerm","exit_fullscreen":"Avslutt fullskjerm","close":"Lukk","mathtype":"MathType","title_modalwindow":"Modalt MathType-vindu","close_modal_warning":"Er du sikker på at du vil gå ut? Endringane du har gjort, vil gå tapt.","latex_name_label":"LaTeX-formel","browser_no_compatible":"Nettlesaren er ikkje kompatibel med AJAX-teknologien. Bruk den nyaste versjonen av Mozilla Firefox.","error_convert_accessibility":"Feil under konvertering frå MathML til tilgjengeleg tekst.","exception_cross_site":"Skripting på tvers av nettstadar er bere tillaten med HTTP.","exception_high_surrogate":"Høgt surrogat er ikkje etterfølgt av lågt surrogat i fixedCharCodeAt()","exception_string_length":"Ugyldig streng. Lengda må vera deleleg på 4","exception_key_nonobject":"Object.keys kalla på eit ikkje-objekt","exception_null_or_undefined":" dette er null eller ikkje definert","exception_not_function":" er ikkje ein funksjon","exception_invalid_date_format":"Ugyldig datoformat: ","exception_casting":"Kan ikkje bruka casting ","exception_casting_to":" til "},"nb":{"latex":"LaTeX","cancel":"Avbryt","accept":"Insert","manual":"Håndbok","insert_math":"Sett inn matematikkformel - MathType","insert_chem":"Sett inn en kjemisk formel – ChemType","minimize":"Minimer","maximize":"Maksimer","fullscreen":"Fullskjerm","exit_fullscreen":"Avslutt fullskjerm","close":"Lukk","mathtype":"MathType","title_modalwindow":"Modalt MathType-vindu","close_modal_warning":"Er du sikker på at du vil gå ut? Endringene du har gjort, vil gå tapt.","latex_name_label":"LaTeX-formel","browser_no_compatible":"Nettleseren er ikke kompatibel med AJAX-teknologien. Bruk den nyeste versjonen av Mozilla Firefox.","error_convert_accessibility":"Feil under konvertering fra MathML til tilgjengelig tekst.","exception_cross_site":"Skripting på tvers av nettsteder er bare tillatt med HTTP.","exception_high_surrogate":"Høyt surrogat etterfølges ikke av lavt surrogat i fixedCharCodeAt()","exception_string_length":"Ugyldig streng. Lengden må være delelig på 4","exception_key_nonobject":"Object.keys kalte på et ikke-objekt","exception_null_or_undefined":" dette er null eller ikke definert","exception_not_function":" er ikke en funksjon","exception_invalid_date_format":"Ugyldig datoformat: ","exception_casting":"Kan ikke bruke casting ","exception_casting_to":" til "},"nn":{"latex":"LaTeX","cancel":"Avbryt","accept":"Set inn","manual":"Håndbok","insert_math":"Sett inn matematikkformel - MathType","insert_chem":"Set inn ein kjemisk formel – ChemType","minimize":"Minimer","maximize":"Maksimer","fullscreen":"Fullskjerm","exit_fullscreen":"Avslutt fullskjerm","close":"Lukk","mathtype":"MathType","title_modalwindow":"Modalt MathType-vindu","close_modal_warning":"Er du sikker på at du vil gå ut? Endringane du har gjort, vil gå tapt.","latex_name_label":"LaTeX-formel","browser_no_compatible":"Nettlesaren er ikkje kompatibel med AJAX-teknologien. Bruk den nyaste versjonen av Mozilla Firefox.","error_convert_accessibility":"Feil under konvertering frå MathML til tilgjengeleg tekst.","exception_cross_site":"Skripting på tvers av nettstadar er bere tillaten med HTTP.","exception_high_surrogate":"Høgt surrogat er ikkje etterfølgt av lågt surrogat i fixedCharCodeAt()","exception_string_length":"Ugyldig streng. Lengda må vera deleleg på 4","exception_key_nonobject":"Object.keys kalla på eit ikkje-objekt","exception_null_or_undefined":" dette er null eller ikkje definert","exception_not_function":" er ikkje ein funksjon","exception_invalid_date_format":"Ugyldig datoformat: ","exception_casting":"Kan ikkje bruka casting ","exception_casting_to":" til "},"pl":{"latex":"LaTeX","cancel":"Anuluj","accept":"Wstaw","manual":"Instrukcja","insert_math":"Wstaw formułę matematyczną - MathType","insert_chem":"Wstaw wzór chemiczny — ChemType","minimize":"Minimalizuj","maximize":"Maksymalizuj","fullscreen":"Pełny ekran","exit_fullscreen":"Opuść tryb pełnoekranowy","close":"Zamknij","mathtype":"MathType","title_modalwindow":"Okno modalne MathType","close_modal_warning":"Czy na pewno chcesz zamknąć? Wprowadzone zmiany zostaną utracone.","latex_name_label":"Wzór Latex","browser_no_compatible":"Twoja przeglądarka jest niezgodna z technologią AJAX Użyj najnowszej wersji Mozilla Firefox.","error_convert_accessibility":"Błąd podczas konwertowania z formatu MathML na dostępny tekst.","exception_cross_site":"Krzyżowanie skryptów witryny jest dozwolone tylko dla HTTP.","exception_high_surrogate":"Brak niskiego surogatu po wysokim surogacie w fixedCharCodeAt()","exception_string_length":"Niewłaściwy ciąg znaków. Długość musi być wielokrotnością liczby 4.","exception_key_nonobject":"Argumentem wywołanej funkcji Object.key nie jest obiekt.","exception_null_or_undefined":" jest zerowy lub niezdefiniowany","exception_not_function":" nie jest funkcją","exception_invalid_date_format":"Nieprawidłowy format daty: ","exception_casting":"Nie można rzutować ","exception_casting_to":" na "},"pt":{"latex":"LaTeX","cancel":"Cancelar","accept":"Inserir","manual":"Manual","insert_math":"Inserir fórmula matemática - MathType","insert_chem":"Inserir uma fórmula química - ChemType","minimize":"Minimizar","maximize":"Maximizar","fullscreen":"Ecrã completo","exit_fullscreen":"Sair do ecrã completo","close":"Fechar","mathtype":"MathType","title_modalwindow":"Janela modal do MathType","close_modal_warning":"Pretende sair? As alterações efetuadas serão perdidas.","latex_name_label":"Fórmula Latex","browser_no_compatible":"O seu navegador não é compatível com a tecnologia AJAX. Utilize a versão mais recente do Mozilla Firefox.","error_convert_accessibility":"Erro ao converter de MathML para texto acessível.","exception_cross_site":"O processamento de scripts em vários sites só é permitido para HTTP.","exception_high_surrogate":"Substituto alto não seguido por um substituto baixo em fixedCharCodeAt()","exception_string_length":"Cadeia inválida. O comprimento tem de ser um múltiplo de 4","exception_key_nonobject":"Object.keys chamou um não-objeto","exception_null_or_undefined":" é nulo ou não está definido","exception_not_function":" não é uma função","exception_invalid_date_format":"Formato de data inválido: ","exception_casting":"Não é possível adicionar ","exception_casting_to":" até "},"pt_br":{"latex":"LaTeX","cancel":"Cancelar","accept":"Inserir","manual":"Manual","insert_math":"Inserir fórmula matemática - MathType","insert_chem":"Insira uma fórmula química - ChemType","minimize":"Minimizar","maximize":"Maximizar","fullscreen":"Tela cheia","exit_fullscreen":"Sair de tela cheia","close":"Fechar","mathtype":"MathType","title_modalwindow":"Janela modal do MathType","close_modal_warning":"Tem certeza de que deseja sair? Todas as alterações serão perdidas.","latex_name_label":"Fórmula LaTeX","browser_no_compatible":"O navegador não é compatível com a tecnologia AJAX. Use a versão mais recente do Mozilla Firefox.","error_convert_accessibility":"Erro ao converter de MathML para texto acessível.","exception_cross_site":"O uso de scripts entre sites só é permitido para HTTP.","exception_high_surrogate":"High surrogate não seguido de low surrogate em fixedCharCodeAt()","exception_string_length":"String inválida. O comprimento deve ser um múltiplo de 4","exception_key_nonobject":"Object.keys chamados em não objeto","exception_null_or_undefined":" isto é nulo ou não definido","exception_not_function":" não é uma função","exception_invalid_date_format":"Formato de data inválido: ","exception_casting":"Não é possível transmitir ","exception_casting_to":" para "},"ro":{"latex":"LaTeX","cancel":"Anulare","accept":"Inserați","manual":"Ghid","insert_math":"Inserați o formulă matematică - MathType","insert_chem":"Inserați o formulă chimică - ChemType","minimize":"Minimizați","maximize":"Maximizați","fullscreen":"Afișați pe tot ecranul","exit_fullscreen":"Opriți afișarea pe tot ecranul","close":"Închideți","mathtype":"MathType","title_modalwindow":"Fereastră modală MathType","close_modal_warning":"Sigur doriți să ieșiți? Modificările realizate se vor pierde.","latex_name_label":"Formulă Latex","browser_no_compatible":"Browserul dvs. nu este compatibil cu tehnologia AJAX. Utilizați cea mai recentă versiune de Mozilla Firefox.","error_convert_accessibility":"Eroare la convertirea din MathML în text accesibil.","exception_cross_site":"Scriptarea între site‑uri este permisă doar pentru HTTP.","exception_high_surrogate":"Surogatul superior nu este urmat de un surogat inferior în fixedCharCodeAt()","exception_string_length":"Șir nevalid. Lungimea trebuie să fie multiplu de 4","exception_key_nonobject":"Object.keys a apelat un non-obiect","exception_null_or_undefined":" este null sau nu este definit","exception_not_function":" nu este funcție","exception_invalid_date_format":"Format de dată nevalid: ","exception_casting":"nu se poate difuza ","exception_casting_to":" către "},"ru":{"latex":"LaTeX","cancel":"отмена","accept":"Вставка","manual":"вручную","insert_math":"Вставить математическую формулу: WIRIS","insert_chem":"Вставить химическую формулу — ChemType","minimize":"Свернуть","maximize":"Развернуть","fullscreen":"На весь экран","exit_fullscreen":"Выйти из полноэкранного режима","close":"Закрыть","mathtype":"MathType","title_modalwindow":"Режимное окно MathType","close_modal_warning":"Вы уверены, что хотите выйти? Все внесенные изменения будут утрачены.","latex_name_label":"Формула Latex","browser_no_compatible":"Ваш браузер несовместим с технологией AJAX. Используйте последнюю версию Mozilla Firefox.","error_convert_accessibility":"При преобразовании формулы в текст допустимого формата произошла ошибка.","exception_cross_site":"Межсайтовые сценарии доступны только для HTTP.","exception_high_surrogate":"Младший символ-заместитель не сопровождает старший символ-заместитель в исправленном методе CharCodeAt()","exception_string_length":"Недопустимая строка. Длинна должна быть кратной 4.","exception_key_nonobject":"Метод Object.keys вызван не для объекта","exception_null_or_undefined":" значение пустое или не определено","exception_not_function":" не функция","exception_invalid_date_format":"Недопустимый формат даты: ","exception_casting":"Не удается привести ","exception_casting_to":" к "},"sv":{"latex":"LaTeX","cancel":"Avbryt","accept":"Infoga","manual":"Bruksanvisning","insert_math":"Infoga matematisk formel - MathType","insert_chem":"Infoga en kemiformel – ChemType","minimize":"Minimera","maximize":"Maximera","fullscreen":"Helskärm","exit_fullscreen":"Stäng helskärm","close":"Stäng","mathtype":"MathType","title_modalwindow":"MathType modulfönster","close_modal_warning":"Vill du avsluta? Inga ändringar kommer att sparas.","latex_name_label":"Latex-formel","browser_no_compatible":"Din webbläsare är inte kompatibel med AJAX-teknik. Använd den senaste versionen av Mozilla Firefox.","error_convert_accessibility":"Det uppstod ett fel vid konvertering från MathML till åtkomlig text.","exception_cross_site":"Skriptkörning över flera sajter är endast tillåtet för HTTP.","exception_high_surrogate":"Hög surrogat följs inte av låg surrogat i fixedCharCodeAt()","exception_string_length":"Ogiltig sträng. Längden måste vara en multipel av 4","exception_key_nonobject":"Object.keys anropade icke-objekt","exception_null_or_undefined":" det är null eller inte definierat","exception_not_function":" är inte en funktion","exception_invalid_date_format":"Ogiltigt datumformat: ","exception_casting":"Går inte att konvertera ","exception_casting_to":" till "},"tr":{"latex":"LaTeX","cancel":"Vazgeç","accept":"Ekle","manual":"Kılavuz","insert_math":"Matematik formülü ekle - MathType","insert_chem":"Kimya formülü ekleyin - ChemType","minimize":"Simge Durumuna Küçült","maximize":"Ekranı Kapla","fullscreen":"Tam Ekran","exit_fullscreen":"Tam Ekrandan Çık","close":"Kapat","mathtype":"MathType","title_modalwindow":"MathType kalıcı penceresi","close_modal_warning":"Çıkmak istediğinizden emin misiniz? Yaptığınız değişiklikler kaybolacak.","latex_name_label":"Latex Formülü","browser_no_compatible":"Tarayıcınız AJAX teknolojisiyle uyumlu değil. Lütfen en güncel Mozilla Firefox sürümünü kullanın.","error_convert_accessibility":"MathML biçiminden erişilebilir metne dönüştürme hatası.","exception_cross_site":"Siteler arası komut dosyası yazma işlemine yalnızca HTTP için izin verilir.","exception_high_surrogate":"fixedCharCodeAt() fonksiyonunda üst vekilin ardından alt vekil gelmiyor","exception_string_length":"Geçersiz dizgi. Uzunluk, 4\'ün katlarından biri olmalıdır","exception_key_nonobject":"Nesne olmayan öğe üzerinde Object.keys çağrıldı","exception_null_or_undefined":" bu değer boş veya tanımlanmamış","exception_not_function":" bir fonksiyon değil","exception_invalid_date_format":"Geçersiz tarih biçimi: ","exception_casting":"Tür dönüştürülemiyor ","exception_casting_to":" hedef: "},"zh":{"latex":"LaTeX","cancel":"取消","accept":"插入","manual":"手册","insert_math":"插入数学公式 - MathType","insert_chem":"插入化学分子式 - ChemType","minimize":"最小化","maximize":"最大化","fullscreen":"全屏幕","exit_fullscreen":"退出全屏幕","close":"关闭","mathtype":"MathType","title_modalwindow":"MathType 模式窗口","close_modal_warning":"您确定要离开吗？您所做的修改将丢失。","latex_name_label":"Latex 分子式","browser_no_compatible":"您的浏览器不兼容 AJAX 技术。请使用最新版 Mozilla Firefox。","error_convert_accessibility":"将 MathML 转换为可访问文本时出错。","exception_cross_site":"仅 HTTP 允许跨站脚本。","exception_high_surrogate":"fixedCharCodeAt() 中的高位代理之后未跟随低位代理","exception_string_length":"无效字符串。长度必须是 4 的倍数","exception_key_nonobject":"非对象调用了 Object.keys","exception_null_or_undefined":" 该值为空或未定义","exception_not_function":" 不是一个函数","exception_invalid_date_format":"无效日期格式： ","exception_casting":"无法转换 ","exception_casting_to":" 为 "},"":{}}'
    );
    function _(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var v = (function () {
      function e() {
        throw (
          ((function (e, t) {
            if (!(e instanceof t))
              throw new TypeError("Cannot call a class as a function");
          })(this, e),
          new Error("Static class StringManager can not be instantiated."))
        );
      }
      var t, n, i;
      return (
        (t = e),
        (i = [
          {
            key: "get",
            value: function (e) {
              var t = this.language;
              return (
                t && t.length > 2 && (t = t.slice(0, 2)),
                this.strings.hasOwnProperty(t) ||
                  (console.warn(
                    "Unknown language ".concat(t, " set in StringManager.")
                  ),
                  (t = "en")),
                this.strings[t].hasOwnProperty(e)
                  ? this.strings[t][e]
                  : (console.warn(
                      "Unknown key "
                        .concat(e, " for language ")
                        .concat(t, " in StringManager.")
                    ),
                    e)
              );
            },
          },
        ]),
        (n = null) && _(t.prototype, n),
        i && _(t, i),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    function b(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    (v.strings = f), (v.language = "en");
    var y = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e);
      }
      var n, i, r;
      return (
        (n = e),
        (r = [
          {
            key: "fireEvent",
            value: function (e, t) {
              if (document.createEvent) {
                var n = document.createEvent("HTMLEvents");
                return n.initEvent(t, !0, !0), !e.dispatchEvent(n);
              }
              var i = document.createEventObject();
              return e.fireEvent("on".concat(t), i);
            },
          },
          {
            key: "addEvent",
            value: function (e, t, n) {
              e.addEventListener
                ? e.addEventListener(t, n, !0)
                : e.attachEvent && e.attachEvent("on".concat(t), n);
            },
          },
          {
            key: "removeEvent",
            value: function (e, t, n) {
              e.removeEventListener
                ? e.removeEventListener(t, n, !0)
                : e.detachEvent && e.detachEvent("on".concat(t), n);
            },
          },
          {
            key: "addElementEvents",
            value: function (t, n, i, r) {
              n &&
                ((this.callbackDblclick = function (e) {
                  var t = e || window.event,
                    i = t.srcElement ? t.srcElement : t.target;
                  n(i, t);
                }),
                e.addEvent(t, "dblclick", this.callbackDblclick)),
                i &&
                  ((this.callbackMousedown = function (e) {
                    var t = e || window.event,
                      n = t.srcElement ? t.srcElement : t.target;
                    i(n, t);
                  }),
                  e.addEvent(t, "mousedown", this.callbackMousedown)),
                r &&
                  ((this.callbackMouseup = function (e) {
                    var t = e || window.event,
                      n = t.srcElement ? t.srcElement : t.target;
                    r(n, t);
                  }),
                  e.addEvent(document, "mouseup", this.callbackMouseup),
                  e.addEvent(t, "mouseup", this.callbackMouseup));
            },
          },
          {
            key: "removeElementEvents",
            value: function (t) {
              e.removeEvent(t, "dblclick", this.callbackDblclick),
                e.removeEvent(t, "mousedown", this.callbackMousedown),
                e.removeEvent(document, "mouseup", this.callbackMouseup),
                e.removeEvent(t, "mouseup", this.callbackMouseup);
            },
          },
          {
            key: "addClass",
            value: function (t, n) {
              e.containsClass(t, n) || (t.className += " ".concat(n));
            },
          },
          {
            key: "containsClass",
            value: function (e, t) {
              if (null == e || !("className" in e)) return !1;
              for (
                var n = e.className.split(" "), i = n.length - 1;
                i >= 0;
                i -= 1
              )
                if (n[i] === t) return !0;
              return !1;
            },
          },
          {
            key: "removeClass",
            value: function (e, t) {
              for (
                var n = "", i = e.className.split(" "), r = 0;
                r < i.length;
                r += 1
              )
                i[r] !== t && (n += "".concat(i[r], " "));
              e.className = n.trim();
            },
          },
          {
            key: "convertOldXmlinitialtextAttribute",
            value: function (e) {
              var t = "value=",
                n = e.indexOf("xmlinitialtext"),
                i = e.indexOf(t, n),
                r = e.charAt(i + t.length),
                a = i + t.length + 1,
                o = e.indexOf(r, a),
                s = e.substring(a, o),
                l = s.split("«").join("§lt;");
              return (
                (l = (l = (l = l.split("»").join("§gt;")).split("&").join("§"))
                  .split("¨")
                  .join("§quot;")),
                (e = e.split(s).join(l))
              );
            },
          },
          {
            key: "createElement",
            value: function (t, n, i) {
              var r;
              void 0 === n && (n = {}), void 0 === i && (i = document);
              try {
                var a = "<".concat(t);
                Object.keys(n).forEach(function (t) {
                  a += " ".concat(t, '="').concat(e.htmlEntities(n[t]), '"');
                }),
                  (a += ">"),
                  (r = i.createElement(a));
              } catch (e) {
                (r = i.createElement(t)),
                  Object.keys(n).forEach(function (e) {
                    r.setAttribute(e, n[e]);
                  });
              }
              return r;
            },
          },
          {
            key: "createObject",
            value: function (t, n) {
              void 0 === n && (n = document),
                (t = (t = (t = (t = t
                  .split("<applet ")
                  .join('<span wirisObject="WirisApplet" ')
                  .split("<APPLET ")
                  .join('<span wirisObject="WirisApplet" '))
                  .split("</applet>")
                  .join("</span>")
                  .split("</APPLET>")
                  .join("</span>"))
                  .split("<param ")
                  .join('<br wirisObject="WirisParam" ')
                  .split("<PARAM ")
                  .join('<br wirisObject="WirisParam" '))
                  .split("</param>")
                  .join("</br>")
                  .split("</PARAM>")
                  .join("</br>"));
              var i = e.createElement("div", {}, n);
              return (
                (i.innerHTML = t),
                (function t(i) {
                  if (
                    i.getAttribute &&
                    "WirisParam" === i.getAttribute("wirisObject")
                  ) {
                    for (var r = {}, a = 0; a < i.attributes.length; a += 1)
                      null !== i.attributes[a].nodeValue &&
                        (r[i.attributes[a].nodeName] =
                          i.attributes[a].nodeValue);
                    var o = e.createElement("param", r, n);
                    o.NAME && ((o.name = o.NAME), (o.value = o.VALUE)),
                      o.removeAttribute("wirisObject"),
                      i.parentNode.replaceChild(o, i);
                  } else if (
                    i.getAttribute &&
                    "WirisApplet" === i.getAttribute("wirisObject")
                  ) {
                    for (var s = {}, l = 0; l < i.attributes.length; l += 1)
                      null !== i.attributes[l].nodeValue &&
                        (s[i.attributes[l].nodeName] =
                          i.attributes[l].nodeValue);
                    var c = e.createElement("applet", s, n);
                    c.removeAttribute("wirisObject");
                    for (var u = 0; u < i.childNodes.length; u += 1)
                      t(i.childNodes[u]),
                        "param" === i.childNodes[u].nodeName.toLowerCase() &&
                          (c.appendChild(i.childNodes[u]), (u -= 1));
                    i.parentNode.replaceChild(c, i);
                  } else
                    for (var d = 0; d < i.childNodes.length; d += 1)
                      t(i.childNodes[d]);
                })(i),
                i.firstChild
              );
            },
          },
          {
            key: "createObjectCode",
            value: function (t) {
              if (null == t) return null;
              if (1 === t.nodeType) {
                for (
                  var n = "<".concat(t.tagName), i = 0;
                  i < t.attributes.length;
                  i += 1
                )
                  t.attributes[i].specified &&
                    (n += " "
                      .concat(t.attributes[i].name, '="')
                      .concat(e.htmlEntities(t.attributes[i].value), '"'));
                if (t.childNodes.length > 0) {
                  n += ">";
                  for (var r = 0; r < t.childNodes.length; r += 1)
                    n += e.createObject(t.childNodes[r]);
                  n += "</".concat(t.tagName, ">");
                } else
                  "DIV" === t.nodeName || "SCRIPT" === t.nodeName
                    ? (n += "></".concat(t.tagName, ">"))
                    : (n += "/>");
                return n;
              }
              return 3 === t.nodeType ? e.htmlEntities(t.nodeValue) : "";
            },
          },
          {
            key: "concatenateUrl",
            value: function (e, t) {
              var n = "";
              return (
                e.indexOf("/") !== e.length &&
                  0 !== t.indexOf("/") &&
                  (n = "/"),
                (e + n + t).replace(/([^:]\/)\/+/g, "$1")
              );
            },
          },
          {
            key: "htmlEntities",
            value: function (e) {
              return e
                .split("&")
                .join("&amp;")
                .split("<")
                .join("&lt;")
                .split(">")
                .join("&gt;")
                .split('"')
                .join("&quot;");
            },
          },
          {
            key: "htmlSanitize",
            value: function (e) {
              return t().sanitize(e);
            },
          },
          {
            key: "containsXSS",
            value: function (e) {
              return !(t().sanitize(e) === e);
            },
          },
          {
            key: "htmlEntitiesDecode",
            value: function (e) {
              var t = document.createElement("textarea");
              return (t.innerHTML = e), t.value;
            },
          },
          {
            key: "createHttpRequest",
            value: function () {
              if (
                "file://" ===
                window.location
                  .toString()
                  .substr(0, window.location.toString().lastIndexOf("/") + 1)
                  .substr(0, 7)
              )
                throw v.get("exception_cross_site");
              if ("undefined" != typeof XMLHttpRequest)
                return new XMLHttpRequest();
              try {
                return new ActiveXObject("Msxml2.XMLHTTP");
              } catch (e) {
                try {
                  return new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                  return null;
                }
              }
            },
          },
          {
            key: "httpBuildQuery",
            value: function (t) {
              var n = "";
              return (
                Object.keys(t).forEach(function (i) {
                  null != t[i] &&
                    (n += ""
                      .concat(e.urlEncode(i), "=")
                      .concat(e.urlEncode(t[i]), "&"));
                }),
                "&" === n.substring(n.length - 1) &&
                  (n = n.substring(0, n.length - 1)),
                n
              );
            },
          },
          {
            key: "propertiesToString",
            value: function (t) {
              var n = [];
              Object.keys(t).forEach(function (e) {
                Object.prototype.hasOwnProperty.call(t, e) && n.push(e);
              });
              for (var i = n.length, r = 0; r < i; r += 1)
                for (var a = r + 1; a < i; a += 1) {
                  var o = n[r],
                    s = n[a];
                  e.compareStrings(o, s) > 0 && ((n[r] = s), (n[a] = o));
                }
              for (var l = "", c = 0; c < i; c += 1) {
                var u = n[c];
                (l += u), (l += "=");
                var d = t[u];
                (l += d =
                  (d = (d = (d = d.replace("\\", "\\\\")).replace(
                    "\n",
                    "\\n"
                  )).replace("\r", "\\r")).replace("\t", "\\t")),
                  (l += "\n");
              }
              return l;
            },
          },
          {
            key: "compareStrings",
            value: function (t, n) {
              var i,
                r = t.length,
                a = n.length,
                o = r > a ? a : r;
              for (i = 0; i < o; i += 1) {
                var s = e.fixedCharCodeAt(t, i) - e.fixedCharCodeAt(n, i);
                if (0 !== s) return s;
              }
              return t.length - n.length;
            },
          },
          {
            key: "fixedCharCodeAt",
            value: function (e, t) {
              t = t || 0;
              var n,
                i,
                r = e.charCodeAt(t);
              if (r >= 55296 && r <= 56319) {
                if (((n = r), (i = e.charCodeAt(t + 1)), Number.isNaN(i)))
                  throw v.get("exception_high_surrogate");
                return 1024 * (n - 55296) + (i - 56320) + 65536;
              }
              return !(r >= 56320 && r <= 57343) && r;
            },
          },
          {
            key: "urlToAssArray",
            value: function (e) {
              var t;
              if ((t = e.indexOf("?")) > 0) {
                var n = e.substring(t + 1).split("&"),
                  i = {};
                for (t = 0; t < n.length; t += 1) {
                  var r = n[t].split("=");
                  r.length > 1 &&
                    (i[r[0]] = decodeURIComponent(r[1].replace(/\+/g, " ")));
                }
                return i;
              }
              return {};
            },
          },
          {
            key: "urlEncode",
            value: function (e) {
              return encodeURIComponent(e);
            },
          },
          {
            key: "getWIRISImageOutput",
            value: function (t, n, i) {
              var r = e.createObject(t);
              if (
                r &&
                (r.className === s.get("imageClassName") ||
                  r.getAttribute(s.get("imageMathmlAttribute")))
              ) {
                if (!n) return t;
                var o = r.getAttribute(s.get("imageMathmlAttribute")),
                  l = a.safeXmlDecode(o);
                return (
                  s.get("saveHandTraces") ||
                    (l = a.removeAnnotation(l, "application/json")),
                  null == l && (l = r.getAttribute("alt")),
                  i ? a.safeXmlEncode(l) : l
                );
              }
              return t;
            },
          },
          {
            key: "getNodeLength",
            value: function (t) {
              if (3 === t.nodeType) return t.nodeValue.length;
              if (1 === t.nodeType) {
                var n = { IMG: 1, BR: 1 }[t.nodeName.toUpperCase()];
                void 0 === n && (n = 0);
                for (var i = 0; i < t.childNodes.length; i += 1)
                  n += e.getNodeLength(t.childNodes[i]);
                return n;
              }
              return 0;
            },
          },
          {
            key: "getSelectedItem",
            value: function (t, n, i) {
              var r;
              if (
                (n ? (r = t.contentWindow).focus() : ((r = window), t.focus()),
                document.selection && !i)
              ) {
                var a = r.document.selection.createRange();
                if (a.parentElement) {
                  if (a.htmlText.length > 0)
                    return 0 === a.text.length
                      ? e.getSelectedItem(t, n, !0)
                      : null;
                  r.document.execCommand("InsertImage", !1, "#");
                  var o,
                    s,
                    l = a.parentElement();
                  return (
                    "IMG" !== l.nodeName.toUpperCase() &&
                      (a.pasteHTML(
                        '<span id="wrs_openEditorWindow_temporalObject"></span>'
                      ),
                      (l = r.document.getElementById(
                        "wrs_openEditorWindow_temporalObject"
                      ))),
                    l.nextSibling && 3 === l.nextSibling.nodeType
                      ? ((o = l.nextSibling), (s = 0))
                      : l.previousSibling && 3 === l.previousSibling.nodeType
                      ? (s = (o = l.previousSibling).nodeValue.length)
                      : ((o = r.document.createTextNode("")),
                        l.parentNode.insertBefore(o, l),
                        (s = 0)),
                    l.parentNode.removeChild(l),
                    { node: o, caretPosition: s }
                  );
                }
                return a.length > 1 ? null : { node: a.item(0) };
              }
              if (r.getSelection) {
                var c,
                  u = r.getSelection();
                try {
                  c = u.getRangeAt(0);
                } catch (e) {
                  c = r.document.createRange();
                }
                var d = c.startContainer;
                if (3 === d.nodeType)
                  return { node: d, caretPosition: c.startOffset };
                if (d !== c.endContainer) return null;
                if (1 === d.nodeType) {
                  var m = c.startOffset;
                  if (d.childNodes[m]) return { node: d.childNodes[m] };
                }
              }
              return null;
            },
          },
          {
            key: "getSelectedItemOnTextarea",
            value: function (e) {
              var t = document.createTextNode(e.value),
                n = g.getLatexFromTextNode(t, e.selectionStart);
              return null === n
                ? null
                : {
                    node: t,
                    caretPosition: e.selectionStart,
                    startPosition: n.startPosition,
                    endPosition: n.endPosition,
                  };
            },
          },
          {
            key: "getElementsByNameFromString",
            value: function (e, t, n) {
              var i = [];
              (e = e.toLowerCase()), (t = t.toLowerCase());
              for (var r = e.indexOf("<".concat(t, " ")); -1 !== r; ) {
                var a = void 0;
                a = n ? ">" : "</".concat(t, ">");
                var o = e.indexOf(a, r);
                -1 !== o
                  ? ((o += a.length), i.push({ start: r, end: o }))
                  : (o = r + 1),
                  (r = e.indexOf("<".concat(t, " "), o));
              }
              return i;
            },
          },
          {
            key: "decode64",
            value: function (e) {
              var t = "+".charCodeAt(0),
                n = "/".charCodeAt(0),
                i = "0".charCodeAt(0),
                r = "a".charCodeAt(0),
                a = "A".charCodeAt(0),
                o = "-".charCodeAt(0),
                s = "_".charCodeAt(0),
                l = e.charCodeAt(0);
              return l === t || l === o
                ? 62
                : l === n || l === s
                ? 63
                : l < i
                ? -1
                : l < i + 10
                ? l - i + 26 + 26
                : l < a + 26
                ? l - a
                : l < r + 26
                ? l - r + 26
                : null;
            },
          },
          {
            key: "b64ToByteArray",
            value: function (t, n) {
              var i;
              if (t.length % 4 > 0)
                throw new Error(
                  "Invalid string. Length must be a multiple of 4"
                );
              var r,
                a,
                o,
                s = [];
              for (
                r =
                  n ||
                  ((a =
                    "=" === t.charAt(t.length - 2)
                      ? 2
                      : "=" === t.charAt(t.length - 1)
                      ? 1
                      : 0) > 0
                    ? t.length - 4
                    : t.length),
                  o = 0;
                o < r;
                o += 4
              )
                (i =
                  (e.decode64(t.charAt(o)) << 18) |
                  (e.decode64(t.charAt(o + 1)) << 12) |
                  (e.decode64(t.charAt(o + 2)) << 6) |
                  e.decode64(t.charAt(o + 3))),
                  s.push((i >> 16) & 255),
                  s.push((i >> 8) & 255),
                  s.push(255 & i);
              return (
                a &&
                  (2 === a
                    ? ((i =
                        (e.decode64(t.charAt(o)) << 2) |
                        (e.decode64(t.charAt(o + 1)) >> 4)),
                      s.push(255 & i))
                    : 1 === a &&
                      ((i =
                        (e.decode64(t.charAt(o)) << 10) |
                        (e.decode64(t.charAt(o + 1)) << 4) |
                        (e.decode64(t.charAt(o + 2)) >> 2)),
                      s.push((i >> 8) & 255),
                      s.push(255 & i))),
                s
              );
            },
          },
          {
            key: "readInt32",
            value: function (e) {
              if (e.length < 4) return !1;
              var t = e.splice(0, 4);
              return (t[0] << 24) | (t[1] << 16) | (t[2] << 8) | (t[3] << 0);
            },
          },
          {
            key: "readByte",
            value: function (e) {
              return e.shift() << 0;
            },
          },
          {
            key: "readBytes",
            value: function (e, t, n) {
              return e.splice(t, n);
            },
          },
          {
            key: "updateTextArea",
            value: function (e, t) {
              if (e && t)
                if ((e.focus(), null != e.selectionStart)) {
                  var n = e.selectionEnd,
                    i = e.value.substring(0, e.selectionStart),
                    r = e.value.substring(n, e.value.length);
                  (e.value = i + t + r), (e.selectionEnd = n + t.length);
                } else document.selection.createRange().text = t;
            },
          },
          {
            key: "updateExistingTextOnTextarea",
            value: function (e, t, n, i) {
              e.focus();
              var r = e.value.substring(0, n);
              (e.value = r + t + e.value.substring(i, e.value.length)),
                (e.selectionEnd = n + t.length);
            },
          },
          {
            key: "addArgument",
            value: function (e, t, n) {
              var i;
              return (
                (i = e.indexOf("?") > 0 ? "&" : "?"),
                "".concat(e + i + t, "=").concat(n)
              );
            },
          },
        ]),
        (i = null) && b(n.prototype, i),
        r && b(n, r),
        Object.defineProperty(n, "prototype", { writable: !1 }),
        e
      );
    })();
    function w(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var x = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e);
      }
      var t, n, i;
      return (
        (t = e),
        (i = [
          {
            key: "removeImgDataAttributes",
            value: function (e) {
              var t = [],
                n = e.attributes;
              Object.keys(n).forEach(function (e) {
                var i = n[e];
                void 0 !== i &&
                  void 0 !== i.name &&
                  0 === i.name.indexOf("data-") &&
                  t.push(i.name);
              }),
                t.forEach(function (t) {
                  e.removeAttribute(t);
                });
            },
          },
          {
            key: "clone",
            value: function (e, t) {
              var n = s.get("imageCustomEditorName");
              e.hasAttribute(n) || t.removeAttribute(n),
                [
                  s.get("imageMathmlAttribute"),
                  n,
                  "alt",
                  "height",
                  "width",
                  "style",
                  "src",
                  "role",
                ].forEach(function (n) {
                  var i = e.getAttribute(n);
                  i && t.setAttribute(n, i);
                });
            },
          },
          {
            key: "setImgSize",
            value: function (t, n, i) {
              var r, a, o, l;
              if (i)
                if ("svg" === s.get("imageFormat"))
                  if ("base64" !== s.get("saveMode"))
                    r = e.getMetricsFromSvgString(n);
                  else {
                    (a = t.src.substr(
                      t.src.indexOf("base64,") + 7,
                      t.src.length
                    )),
                      (l = ""),
                      (o = y.b64ToByteArray(a, a.length));
                    for (var c = 0; c < o.length; c += 1)
                      l += String.fromCharCode(o[c]);
                    r = e.getMetricsFromSvgString(l);
                  }
                else
                  (a = t.src.substr(
                    t.src.indexOf("base64,") + 7,
                    t.src.length
                  )),
                    (o = y.b64ToByteArray(a, 88)),
                    (r = e.getMetricsFromBytes(o));
              else r = y.urlToAssArray(n);
              var u = r.cw;
              if (u) {
                var d = r.ch,
                  m = r.cb,
                  h = r.dpi;
                h &&
                  ((u = (96 * u) / h), (d = (96 * d) / h), (m = (96 * m) / h)),
                  (t.width = u),
                  (t.height = d),
                  (t.style.verticalAlign = "-".concat(d - m, "px"));
              }
            },
          },
          {
            key: "fixAfterResize",
            value: function (t) {
              if (
                (t.removeAttribute("style"),
                t.removeAttribute("width"),
                t.removeAttribute("height"),
                (t.style.maxWidth = "none"),
                -1 !== t.src.indexOf("data:image"))
              )
                if ("svg" === s.get("imageFormat")) {
                  var n = decodeURIComponent(t.src.substring(32, t.src.length));
                  e.setImgSize(t, n, !0);
                } else {
                  var i = t.src.substring(22, t.src.length);
                  e.setImgSize(t, i, !0);
                }
              else e.setImgSize(t, t.src);
            },
          },
          {
            key: "getMetricsFromSvgString",
            value: function (e) {
              var t = e.indexOf('height="'),
                n = e.indexOf('"', t + 8, e.length),
                i = e.substring(t + 8, n);
              (t = e.indexOf('width="')), (n = e.indexOf('"', t + 7, e.length));
              var r = e.substring(t + 7, n);
              (t = e.indexOf('wrs:baseline="')),
                (n = e.indexOf('"', t + 14, e.length));
              var a = e.substring(t + 14, n);
              if (void 0 !== r) {
                var o = [];
                return (o.cw = r), (o.ch = i), void 0 !== a && (o.cb = a), o;
              }
              return [];
            },
          },
          {
            key: "getMetricsFromBytes",
            value: function (e) {
              var t, n, i, r, a;
              for (y.readBytes(e, 0, 8); e.length >= 4; )
                1229472850 === (i = y.readInt32(e))
                  ? ((t = y.readInt32(e)),
                    (n = y.readInt32(e)),
                    y.readInt32(e),
                    y.readByte(e))
                  : 1650545477 === i
                  ? (r = y.readInt32(e))
                  : 1883789683 === i &&
                    ((a = y.readInt32(e)),
                    (a = Math.round(a / 39.37)),
                    y.readInt32(e),
                    y.readByte(e)),
                  y.readInt32(e);
              if (void 0 !== t) {
                var o = [];
                return (o.cw = t), (o.ch = n), (o.dpi = a), r && (o.cb = r), o;
              }
              return [];
            },
          },
        ]),
        (n = null) && w(t.prototype, n),
        i && w(t, i),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    function k(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var A = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e);
      }
      var t, n, i;
      return (
        (t = e),
        (i = [
          {
            key: "cache",
            get: function () {
              return e._cache;
            },
            set: function (t) {
              e._cache = t;
            },
          },
          {
            key: "mathMLToAccessible",
            value: function (t, n, i) {
              void 0 === n && (n = "en"),
                a.containClass(t, "wrs_chemistry") && (i.mode = "chemistry"),
                (i.ignoreStyles = !0);
              var r = "";
              if (e.cache.get(t)) r = e.cache.get(t);
              else {
                (i.service = "mathml2accessible"), (i.lang = n);
                var o = JSON.parse(h.getService("service", i));
                "error" !== o.status
                  ? ((r = o.result.text), e.cache.populate(t, r))
                  : (r = v.get("error_convert_accessibility"));
              }
              return r;
            },
          },
        ]),
        (n = null) && k(t.prototype, n),
        i && k(t, i),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    A._cache = new c();
    __webpack_require__(282);
    function C(e, t) {
      var n = Object.keys(e);
      if (Object.getOwnPropertySymbols) {
        var i = Object.getOwnPropertySymbols(e);
        t &&
          (i = i.filter(function (t) {
            return Object.getOwnPropertyDescriptor(e, t).enumerable;
          })),
          n.push.apply(n, i);
      }
      return n;
    }
    function M(e) {
      for (var t = 1; t < arguments.length; t++) {
        var n = null != arguments[t] ? arguments[t] : {};
        t % 2
          ? C(Object(n), !0).forEach(function (t) {
              T(e, t, n[t]);
            })
          : Object.getOwnPropertyDescriptors
          ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n))
          : C(Object(n)).forEach(function (t) {
              Object.defineProperty(
                e,
                t,
                Object.getOwnPropertyDescriptor(n, t)
              );
            });
      }
      return e;
    }
    function T(e, t, n) {
      return (
        t in e
          ? Object.defineProperty(e, t, {
              value: n,
              enumerable: !0,
              configurable: !0,
              writable: !0,
            })
          : (e[t] = n),
        e
      );
    }
    function E(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var j = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e);
      }
      var t, n, r;
      return (
        (t = e),
        (r = [
          {
            key: "mathmlToImgObject",
            value: function (t, n, i, r) {
              var o = t.createElement("img");
              (o.align = "middle"), (o.style.maxWidth = "none");
              var l = i || {};
              if (
                (((l = M(M({}, s.get("editorParameters")), l)).mml = n),
                (l.lang = r),
                (l.metrics = "true"),
                (l.centerbaseline = "false"),
                "base64" === s.get("saveMode") &&
                  "default" === s.get("base64savemode") &&
                  (l.base64 = !0),
                (o.className = s.get("imageClassName")),
                -1 !== n.indexOf('class="'))
              ) {
                var c = n.substring(
                  n.indexOf('class="') + 'class="'.length,
                  n.length
                );
                (c = (c = c.substring(0, c.indexOf('"'))).substring(
                  4,
                  c.length
                )),
                  o.setAttribute(s.get("imageCustomEditorName"), c);
              }
              if (
                !s.get("wirisPluginPerformance") ||
                ("xml" !== s.get("saveMode") && "safeXml" !== s.get("saveMode"))
              ) {
                var u = e.createImageSrc(n, l);
                o.setAttribute(
                  s.get("imageMathmlAttribute"),
                  a.safeXmlEncode(n)
                ),
                  (o.src = u),
                  x.setImgSize(
                    o,
                    u,
                    "base64" === s.get("saveMode") &&
                      "default" === s.get("base64savemode")
                  ),
                  s.get("enableAccessibility") &&
                    (o.alt = A.mathMLToAccessible(n, r, l));
              } else {
                var d = JSON.parse(e.createShowImageSrc(l, r));
                if ("warning" === d.status)
                  try {
                    d = JSON.parse(h.getService("showimage", l));
                  } catch (e) {
                    return null;
                  }
                "png" === (d = d.result).format
                  ? (o.src = "data:image/png;base64,".concat(d.content))
                  : (o.src = "data:image/svg+xml;charset=utf8,".concat(
                      y.urlEncode(d.content)
                    )),
                  o.setAttribute(
                    s.get("imageMathmlAttribute"),
                    a.safeXmlEncode(n)
                  ),
                  x.setImgSize(o, d.content, !0),
                  s.get("enableAccessibility") &&
                    (void 0 === d.alt
                      ? (o.alt = A.mathMLToAccessible(n, r, l))
                      : (o.alt = d.alt));
              }
              return (
                void 0 !== e.observer && e.observer.observe(o),
                o.setAttribute("role", "math"),
                o
              );
            },
          },
          {
            key: "createImageSrc",
            value: function (e, t) {
              "base64" === s.get("saveMode") &&
                "default" === s.get("base64savemode") &&
                (t.base64 = !0);
              var n = h.getService("createimage", t);
              if (-1 !== n.indexOf("@BASE@")) {
                var i = h.getServicePath("createimage").split("/");
                i.pop(), (n = n.split("@BASE@").join(i.join("/")));
              }
              return n;
            },
          },
          {
            key: "initParse",
            value: function (t, n) {
              return (t = e.initParseSaveMode(t, n)), e.initParseEditMode(t);
            },
          },
          {
            key: "initParseSaveMode",
            value: function (t, n) {
              return (
                s.get("saveMode") &&
                  ((t = g.parseMathmlToLatex(t, i.safeXmlCharacters)),
                  (t = g.parseMathmlToLatex(t, i.xmlCharacters)),
                  (t = e.parseMathmlToImg(t, i.safeXmlCharacters, n)),
                  (t = e.parseMathmlToImg(t, i.xmlCharacters, n)),
                  "base64" === s.get("saveMode") &&
                    "image" === s.get("base64savemode") &&
                    (t = e.codeImgTransform(t, "base642showimage"))),
                t
              );
            },
          },
          {
            key: "initParseEditMode",
            value: function (e) {
              if (-1 !== s.get("parseModes").indexOf("latex"))
                for (
                  var t = y.getElementsByNameFromString(e, "img", !0),
                    n = 'encoding="LaTeX">',
                    i = 0,
                    r = 0;
                  r < t.length;
                  r += 1
                ) {
                  var o = e.substring(t[r].start + i, t[r].end + i);
                  if (
                    -1 !==
                    o.indexOf(' class="'.concat(s.get("imageClassName"), '"'))
                  ) {
                    var l = " ".concat(s.get("imageMathmlAttribute"), '="'),
                      c = o.indexOf(l);
                    if (
                      (-1 === c && ((l = ' alt="'), (c = o.indexOf(l))),
                      -1 !== c)
                    ) {
                      c += l.length;
                      var u = o.indexOf('"', c),
                        d = y.htmlSanitize(a.safeXmlDecode(o.substring(c, u))),
                        m = d.indexOf(n);
                      if (-1 !== m) {
                        m += n.length;
                        var h = d.indexOf("</annotation>", m),
                          p = d.substring(m, h),
                          g = "$$".concat(y.htmlEntitiesDecode(p), "$$"),
                          f = e.substring(0, t[r].start + i),
                          _ = e.substring(t[r].end + i);
                        (e = f + g + _),
                          (i += g.length - (t[r].end - t[r].start));
                      }
                    }
                  }
                }
              return e;
            },
          },
          {
            key: "endParse",
            value: function (t) {
              var n = e.endParseEditMode(t);
              return e.endParseSaveMode(n);
            },
          },
          {
            key: "endParseEditMode",
            value: function (e) {
              if (-1 !== s.get("parseModes").indexOf("latex")) {
                for (var t = "", n = 0, i = e.indexOf("$$"); -1 !== i; ) {
                  if (
                    ((t += e.substring(n, i)),
                    -1 !== (n = e.indexOf("$$", i + 2)))
                  ) {
                    var r = e.substring(i + 2, n),
                      o = y.htmlEntitiesDecode(r),
                      l = y.htmlSanitize(g.getMathMLFromLatex(o, !0));
                    s.get("saveHandTraces") ||
                      (l = a.removeAnnotation(l, "application/json")),
                      (t += l),
                      (n += 2);
                  } else (t += "$$"), (n = i + 2);
                  i = e.indexOf("$$", n);
                }
                (t += e.substring(n, e.length)), (e = t);
              }
              return e;
            },
          },
          {
            key: "endParseSaveMode",
            value: function (t) {
              return (
                s.get("saveMode") &&
                  ("safeXml" === s.get("saveMode") ||
                  "xml" === s.get("saveMode")
                    ? (t = e.codeImgTransform(t, "img2mathml"))
                    : "base64" === s.get("saveMode") &&
                      "image" === s.get("base64savemode") &&
                      (t = e.codeImgTransform(t, "img264"))),
                t
              );
            },
          },
          {
            key: "createShowImageSrc",
            value: function (e, t) {
              var n = {};
              [
                "mml",
                "color",
                "centerbaseline",
                "zoom",
                "dpi",
                "fontSize",
                "fontFamily",
                "defaultStretchy",
                "backgroundColor",
                "format",
              ].forEach(function (t) {
                void 0 !== e[t] && (n[t] = e[t]);
              });
              var i = {};
              return (
                Object.keys(e).forEach(function (t) {
                  "mml" !== t && (i[t] = e[t]);
                }),
                (i.formula = com.wiris.js.JsPluginTools.md5encode(
                  y.propertiesToString(n)
                )),
                (i.lang = void 0 === t ? "en" : t),
                (i.version = s.get("version")),
                h.getService("showimage", y.httpBuildQuery(i), !0)
              );
            },
          },
          {
            key: "codeImgTransform",
            value: function (t, n) {
              for (
                var i = "", r = 0, o = /<img/gi, l = o.source.length;
                o.test(t);

              ) {
                var c = o.lastIndex - l;
                i += t.substring(r, c);
                for (var u = c + 1; u < t.length && r <= c; ) {
                  var d = t.charAt(u);
                  if ('"' === d || "'" === d) {
                    var m = t.indexOf(d, u + 1);
                    u = -1 === m ? t.length : m;
                  } else ">" === d && (r = u + 1);
                  u += 1;
                }
                if (r < c) return (i += t.substring(c, t.length));
                var h = t.substring(c, r),
                  p = y.createObject(h),
                  g = p.getAttribute(s.get("imageMathmlAttribute")),
                  f = void 0,
                  _ = void 0;
                if ("base642showimage" === n)
                  null == g && (g = p.getAttribute("alt")),
                    (g = a.safeXmlDecode(g)),
                    (h = e.mathmlToImgObject(document, g, null, null)),
                    (i += y.createObjectCode(h));
                else if ("img2mathml" === n)
                  s.get("saveMode") &&
                    ("safeXml" === s.get("saveMode")
                      ? ((f = !0), (_ = !0))
                      : "xml" === s.get("saveMode") && ((f = !0), (_ = !1))),
                    (i += y.getWIRISImageOutput(h, f, _));
                else if ("img264" === n) {
                  null === g && (g = p.getAttribute("alt")),
                    (g = a.safeXmlDecode(g));
                  var v = { base64: "true" };
                  (h = e.mathmlToImgObject(document, g, v, null)),
                    x.setImgSize(h, h.src, !0),
                    (i += y.createObjectCode(h));
                }
              }
              return (i += t.substring(r, t.length));
            },
          },
          {
            key: "parseMathmlToImg",
            value: function (t, n, r) {
              for (
                var o = "",
                  l = "".concat(n.tagOpener, "math"),
                  c = "".concat(n.tagOpener, "/math").concat(n.tagCloser),
                  u = t.indexOf(l),
                  d = 0;
                -1 !== u;

              ) {
                o += t.substring(d, u);
                var m = t.indexOf(s.get("imageMathmlAttribute"));
                if (
                  (-1 === (d = t.indexOf(c, u))
                    ? (d = t.length - 1)
                    : (d += -1 !== m ? t.indexOf("/>", u) : c.length),
                  a.isMathmlInAttribute(t, u) || -1 !== m)
                )
                  o += t.substring(u, d);
                else {
                  var h = t.substring(u, d);
                  (h =
                    n.id === i.safeXmlCharacters.id
                      ? a.safeXmlDecode(h)
                      : a.mathMLEntities(h)),
                    (o += y.createObjectCode(
                      e.mathmlToImgObject(document, h, null, r)
                    ));
                }
                u = t.indexOf(l, d);
              }
              return (o += t.substring(d, t.length));
            },
          },
        ]),
        (n = null) && E(t.prototype, n),
        r && E(t, r),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    if ("undefined" != typeof MutationObserver) {
      var O = new MutationObserver(function (e) {
        e.forEach(function (e) {
          e.oldValue === s.get("imageClassName") &&
            "class" === e.attributeName &&
            -1 === e.target.className.indexOf(s.get("imageClassName")) &&
            (e.target.className = s.get("imageClassName"));
        });
      });
      (j.observer = Object.create(O)),
        (j.observer.Config = { attributes: !0, attributeOldValue: !0 }),
        (j.observer.observe = function (e) {
          Object.getPrototypeOf(this).observe(e, this.Config);
        });
    }
    function S(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var P = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e),
          (this.isContentChanged = !1),
          (this.waitingForChanges = !1);
      }
      var t, n, i;
      return (
        (t = e),
        (n = [
          {
            key: "setIsContentChanged",
            value: function (e) {
              this.isContentChanged = e;
            },
          },
          {
            key: "getIsContentChanged",
            value: function () {
              return this.isContentChanged;
            },
          },
          {
            key: "setWaitingForChanges",
            value: function (e) {
              this.waitingForChanges = e;
            },
          },
          { key: "caretPositionChanged", value: function (e) {} },
          { key: "clipboardChanged", value: function (e) {} },
          {
            key: "contentChanged",
            value: function (e) {
              !0 === this.waitingForChanges &&
                !1 === this.isContentChanged &&
                (this.isContentChanged = !0);
            },
          },
          { key: "styleChanged", value: function (e) {} },
          { key: "transformationReceived", value: function (e) {} },
        ]) && S(t.prototype, n),
        i && S(t, i),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    function I(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var z = (function () {
      function e(t) {
        if (
          ((function (e, t) {
            if (!(e instanceof t))
              throw new TypeError("Cannot call a class as a function");
          })(this, e),
          (this.editorAttributes = {}),
          !("editorAttributes" in t))
        )
          throw new Error(
            "ContentManager constructor error: editorAttributes property missed."
          );
        if (
          ((this.editorAttributes = t.editorAttributes),
          (this.customEditors = null),
          "customEditors" in t && (this.customEditors = t.customEditors),
          (this.environment = {}),
          !("environment" in t))
        )
          throw new Error(
            "ContentManager constructor error: environment property missed"
          );
        if (
          ((this.environment = t.environment),
          (this.language = ""),
          !("language" in t))
        )
          throw new Error(
            "ContentManager constructor error: language property missed"
          );
        (this.language = t.language),
          (this.editorListener = new P()),
          (this.editor = null),
          (this.ua = navigator.userAgent.toLowerCase()),
          (this.deviceProperties = {}),
          (this.deviceProperties.isAndroid = this.ua.indexOf("android") > -1),
          (this.deviceProperties.isIOS = e.isIOS()),
          (this.toolbar = null),
          (this.modalDialogInstance = null),
          (this.listeners = new d()),
          (this.mathML = null),
          (this.isNewElement = !0),
          (this.integrationModel = null);
      }
      var t, n, i;
      return (
        (t = e),
        (i = [
          {
            key: "setHrefToAnchorElement",
            value: function (e, t) {
              e.href = t;
            },
          },
          {
            key: "setProtocolToAnchorElement",
            value: function (e) {
              0 === window.location.href.indexOf("https://") &&
                "http:" === e.protocol &&
                (e.protocol = "https:");
            },
          },
          {
            key: "getURLFromAnchorElement",
            value: function (e) {
              var t = "80" === e.port || "443" === e.port || "" === e.port;
              return ""
                .concat(e.protocol, "//")
                .concat(e.hostname)
                .concat(t ? "" : ":".concat(e.port))
                .concat(
                  e.pathname.startsWith("/")
                    ? e.pathname
                    : "/".concat(e.pathname)
                );
            },
          },
          {
            key: "isIOS",
            value: function () {
              return (
                [
                  "iPad Simulator",
                  "iPhone Simulator",
                  "iPod Simulator",
                  "iPad",
                  "iPhone",
                  "iPod",
                ].includes(navigator.platform) ||
                (navigator.userAgent.includes("Mac") &&
                  "ontouchend" in document)
              );
            },
          },
          {
            key: "isEditorLoaded",
            value: function () {
              return (
                window.com &&
                window.com.wiris &&
                window.com.wiris.jsEditor &&
                window.com.wiris.jsEditor.JsEditor &&
                window.com.wiris.jsEditor.JsEditor.newInstance
              );
            },
          },
        ]),
        (n = [
          {
            key: "addListener",
            value: function (e) {
              this.listeners.add(e);
            },
          },
          {
            key: "setIntegrationModel",
            value: function (e) {
              this.integrationModel = e;
            },
          },
          {
            key: "setModalDialogInstance",
            value: function (e) {
              this.modalDialogInstance = e;
            },
          },
          {
            key: "insert",
            value: function () {
              this.updateTitle(this.modalDialogInstance),
                this.insertEditor(this.modalDialogInstance);
            },
          },
          {
            key: "insertEditor",
            value: function () {
              if (e.isEditorLoaded()) {
                if (
                  ((this.editor =
                    window.com.wiris.jsEditor.JsEditor.newInstance(
                      this.editorAttributes
                    )),
                  this.editor.insertInto(
                    this.modalDialogInstance.contentContainer
                  ),
                  this.editor.focus(),
                  this.modalDialogInstance.rtl && this.editor.action("rtl"),
                  this.editor.getEditorModel().isRTL() &&
                    (this.editor.element.style.direction = "rtl"),
                  this.editor
                    .getEditorModel()
                    .addEditorListener(this.editorListener),
                  this.modalDialogInstance.deviceProperties.isIOS)
                ) {
                  setTimeout(function () {
                    this.hasOwnProperty("modalDialogInstance") &&
                      this.modalDialogInstance.hideKeyboard();
                  }, 400);
                  var t =
                    document.getElementsByClassName("wrs_formulaDisplay")[0];
                  y.addEvent(
                    t,
                    "focus",
                    this.modalDialogInstance.handleOpenedIosSoftkeyboard
                  ),
                    y.addEvent(
                      t,
                      "blur",
                      this.modalDialogInstance.handleClosedIosSoftkeyboard
                    );
                }
                this.listeners.fire("onLoad", {});
              } else setTimeout(e.prototype.insertEditor.bind(this), 100);
            },
          },
          {
            key: "init",
            value: function () {
              e.isEditorLoaded() || this.addEditorAsExternalDependency();
            },
          },
          {
            key: "addEditorAsExternalDependency",
            value: function () {
              var t = document.createElement("script");
              t.type = "text/javascript";
              var n = s.get("editorUrl"),
                i = document.createElement("a");
              e.setHrefToAnchorElement(i, n),
                e.setProtocolToAnchorElement(i),
                (n = e.getURLFromAnchorElement(i));
              var r = this.getEditorStats();
              (t.src = ""
                .concat(n, "?lang=")
                .concat(this.language, "&stats-editor=")
                .concat(r.editor, "&stats-mode=")
                .concat(r.mode, "&stats-version=")
                .concat(r.version)),
                document.getElementsByTagName("head")[0].appendChild(t);
            },
          },
          {
            key: "getEditorStats",
            value: function () {
              var e = {};
              return (
                "editor" in this.environment
                  ? (e.editor = this.environment.editor)
                  : (e.editor = "unknown"),
                "mode" in this.environment
                  ? (e.mode = this.environment.mode)
                  : (e.mode = s.get("saveMode")),
                "version" in this.environment
                  ? (e.version = this.environment.version)
                  : (e.version = s.get("version")),
                e
              );
            },
          },
          {
            key: "setInitialContent",
            value: function () {
              this.isNewElement || this.setMathML(this.mathML);
            },
          },
          {
            key: "setMathML",
            value: function (e, t) {
              var n = this;
              void 0 === t && (t = !1),
                this.editor.setMathMLWithCallback(e, function () {
                  n.editorListener.setWaitingForChanges(!0);
                }),
                setTimeout(function () {
                  n.editorListener.setIsContentChanged(!1);
                }, 500),
                t || this.onFocus();
            },
          },
          {
            key: "onFocus",
            value: function () {
              void 0 !== this.editor &&
                null != this.editor &&
                this.editor.focus();
            },
          },
          {
            key: "submitAction",
            value: function () {
              if (this.editor.isFormulaEmpty())
                this.integrationModel.updateFormula(null);
              else {
                var e = this.editor.getMathMLWithSemantics();
                if (null !== this.customEditors.getActiveEditor()) {
                  var t = this.customEditors.getActiveEditor().toolbar;
                  e = a.addCustomEditorClassAttribute(e, t);
                } else
                  Object.keys(this.customEditors.editors).forEach(function (t) {
                    e = a.removeCustomEditorClassAttribute(e, t);
                  });
                var n = a.mathMLEntities(e);
                this.integrationModel.updateFormula(n);
              }
              this.customEditors.disable(),
                this.integrationModel.notifyWindowClosed(),
                this.setEmptyMathML(),
                this.customEditors.disable();
            },
          },
          {
            key: "setEmptyMathML",
            value: function () {
              this.deviceProperties.isAndroid || this.deviceProperties.isIOS
                ? this.editor.getEditorModel().isRTL()
                  ? this.setMathML(
                      '<math dir="rtl"><semantics><annotation encoding="application/json">[]</annotation></semantics></math>',
                      !0
                    )
                  : this.setMathML(
                      '<math><semantics><annotation encoding="application/json">[]</annotation></semantics></math>',
                      !0
                    )
                : this.editor.getEditorModel().isRTL()
                ? this.setMathML('<math dir="rtl"/>', !0)
                : this.setMathML("<math/>", !0);
            },
          },
          {
            key: "onOpen",
            value: function () {
              this.isNewElement
                ? this.setEmptyMathML()
                : this.setMathML(this.mathML),
                this.updateToolbar(),
                this.onFocus(),
                this.deviceProperties.isIOS &&
                  1 !=
                    document.documentElement.clientWidth / window.innerWidth &&
                  this.setKeyboardMode();
            },
          },
          {
            key: "setKeyboardMode",
            value: function () {
              var t = document.getElementsByClassName(
                "wrs_handOpen wrs_disablePalette"
              )[0];
              t
                ? (t.classList.remove("wrs_handOpen"),
                  t.classList.remove("wrs_disablePalette"))
                : setTimeout(e.prototype.setKeyboardMode.bind(this), 100);
            },
          },
          {
            key: "updateToolbar",
            value: function () {
              this.updateTitle(this.modalDialogInstance);
              var e = this.customEditors.getActiveEditor();
              if (e) {
                var t = e.toolbar
                  ? e.toolbar
                  : _wrs_int_wirisProperties.toolbar;
                (null != this.toolbar && this.toolbar === t) ||
                  this.setToolbar(t);
              } else {
                var n = this.getToolbar();
                (null != this.toolbar && this.toolbar === n) ||
                  (this.setToolbar(n), this.customEditors.disable());
              }
            },
          },
          {
            key: "updateTitle",
            value: function () {
              var e = this.customEditors.getActiveEditor();
              e
                ? this.modalDialogInstance.setTitle(e.title)
                : this.modalDialogInstance.setTitle("MathType");
            },
          },
          {
            key: "getToolbar",
            value: function () {
              var e = "general";
              return (
                "toolbar" in this.editorAttributes &&
                  (e = this.editorAttributes.toolbar),
                "general" === e &&
                  (e =
                    "undefined" == typeof _wrs_int_wirisProperties ||
                    void 0 === _wrs_int_wirisProperties.toolbar
                      ? "general"
                      : _wrs_int_wirisProperties.toolbar),
                e
              );
            },
          },
          {
            key: "setToolbar",
            value: function (e) {
              (this.toolbar = e),
                this.editor.setParams({ toolbar: this.toolbar });
            },
          },
          {
            key: "hasChanges",
            value: function () {
              return (
                !this.editor.isFormulaEmpty() &&
                this.editorListener.getIsContentChanged()
              );
            },
          },
          {
            key: "onKeyDown",
            value: function (e) {
              if (void 0 !== e.key && !1 === e.repeat)
                if ("Escape" === e.key || "Esc" === e.key) {
                  var t = document.getElementsByClassName(
                    "wrs_expandButton wrs_expandButtonFor3RowsLayout wrs_pressed"
                  );
                  0 === t.length &&
                    0 ===
                      (t = document.getElementsByClassName(
                        "wrs_expandButton wrs_expandButtonFor2RowsLayout wrs_pressed"
                      )).length &&
                    0 ===
                      (t = document.getElementsByClassName(
                        "wrs_select wrs_pressed"
                      )).length &&
                    (this.modalDialogInstance.cancelAction(),
                    e.stopPropagation(),
                    e.preventDefault());
                } else if (e.shiftKey && "Tab" === e.key)
                  if (
                    document.activeElement ===
                    this.modalDialogInstance.submitButton
                  )
                    this.editor.focus(),
                      e.stopPropagation(),
                      e.preventDefault();
                  else {
                    var n = document.querySelector('[title="Manual"]');
                    document.activeElement === n &&
                      (this.modalDialogInstance.cancelButton.focus(),
                      e.stopPropagation(),
                      e.preventDefault());
                  }
                else
                  "Tab" === e.key &&
                    (document.activeElement ===
                    this.modalDialogInstance.cancelButton
                      ? (document.querySelector('[title="Manual"]').focus(),
                        e.stopPropagation(),
                        e.preventDefault())
                      : "wrs_formulaDisplay wrs_focused" ===
                          document
                            .getElementsByClassName("wrs_formulaDisplay")[0]
                            .getAttribute("class") &&
                        (this.modalDialogInstance.submitButton.focus(),
                        e.stopPropagation(),
                        e.preventDefault()));
            },
          },
        ]) && I(t.prototype, n),
        i && I(t, i),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    function L(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var N = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e),
          (this.editors = []),
          (this.activeEditor = "default");
      }
      var t, n, i;
      return (
        (t = e),
        (n = [
          {
            key: "addEditor",
            value: function (e, t) {
              var n = {};
              (n.name = t.name),
                (n.toolbar = t.toolbar),
                (n.icon = t.icon),
                (n.confVariable = t.confVariable),
                (n.title = t.title),
                (n.tooltip = t.tooltip),
                (this.editors[e] = n);
            },
          },
          {
            key: "enable",
            value: function (e) {
              this.activeEditor = e;
            },
          },
          {
            key: "disable",
            value: function () {
              this.activeEditor = "default";
            },
          },
          {
            key: "getActiveEditor",
            value: function () {
              return "default" !== this.activeEditor
                ? this.editors[this.activeEditor]
                : null;
            },
          },
        ]) && L(t.prototype, n),
        i && L(t, i),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    const D = {
      imageCustomEditorName: "data-custom-editor",
      imageClassName: "Wirisformula",
      CASClassName: "Wiriscas",
    };
    function B(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var R = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e),
          (this.cancelled = !1),
          (this.defaultPrevented = !1);
      }
      var t, n, i;
      return (
        (t = e),
        (n = [
          {
            key: "cancel",
            value: function () {
              this.cancelled = !0;
            },
          },
          {
            key: "preventDefault",
            value: function () {
              this.defaultPrevented = !0;
            },
          },
        ]) && B(t.prototype, n),
        i && B(t, i),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    function F(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var H = (function () {
      function e(t) {
        var n = this;
        if (
          ((function (e, t) {
            if (!(e instanceof t))
              throw new TypeError("Cannot call a class as a function");
          })(this, e),
          (this.language = "en"),
          (this.serviceProviderProperties = {}),
          "serviceProviderProperties" in t &&
            (this.serviceProviderProperties = t.serviceProviderProperties),
          (this.configurationService = ""),
          "configurationService" in t &&
            ((this.serviceProviderProperties.URI = t.configurationService),
            console.warn(
              "Deprecated property configurationService. Use serviceParameters on instead.",
              [t.configurationService]
            )),
          (this.version = "version" in t ? t.version : ""),
          (this.target = null),
          !("target" in t))
        )
          throw new Error(
            "IntegrationModel constructor error: target property missed."
          );
        (this.target = t.target),
          "scriptName" in t && (this.scriptName = t.scriptName),
          (this.callbackMethodArguments = {}),
          "callbackMethodArguments" in t &&
            (this.callbackMethodArguments = t.callbackMethodArguments),
          (this.environment = {}),
          "environment" in t && (this.environment = t.environment),
          (this.isIframe = !1),
          null != this.target &&
            (this.isIframe = "IFRAME" === this.target.tagName.toUpperCase()),
          (this.editorObject = null),
          "editorObject" in t && (this.editorObject = t.editorObject),
          (this.rtl = !1),
          "rtl" in t && (this.rtl = t.rtl),
          (this.managesLanguage = !1),
          "managesLanguage" in t && (this.managesLanguage = t.managesLanguage),
          (this.temporalImageResizing = !1),
          (this.core = null),
          (this.listeners = new d()),
          "integrationParameters" in t &&
            e.integrationParameters.forEach(function (e) {
              if (e in t.integrationParameters) {
                var i = t.integrationParameters[e];
                0 !== Object.keys(i).length && (n[e] = i);
              }
            });
      }
      var t, n, i;
      return (
        (t = e),
        (n = [
          {
            key: "init",
            value: function () {
              var e = this;
              this.language = this.getLanguage();
              var t = d.newListener("onLoad", function () {
                e.callbackFunction(e.callbackMethodArguments);
              });
              if (
                -1 !==
                this.serviceProviderProperties.URI.indexOf("configuration")
              ) {
                var n = this.serviceProviderProperties.URI,
                  i = h.getServerLanguageFromService(n);
                this.serviceProviderProperties.server = i;
                var r =
                    this.serviceProviderProperties.URI.indexOf("configuration"),
                  a = this.serviceProviderProperties.URI.substring(0, r);
                this.serviceProviderProperties.URI = a;
              }
              var o = this.serviceProviderProperties.URI;
              (o =
                0 === o.indexOf("/") || 0 === o.indexOf("http")
                  ? o
                  : y.concatenateUrl(this.getPath(), o)),
                (this.serviceProviderProperties.URI = o);
              var s = {};
              (s.serviceProviderProperties = this.serviceProviderProperties),
                this.setCore(new Te(s)),
                this.core.addListener(t),
                (this.core.language = this.language),
                this.core.init(),
                this.core.setEnvironment(this.environment);
            },
          },
          {
            key: "getPath",
            value: function () {
              if (void 0 === this.scriptName)
                throw new Error("scriptName property needed for getPath.");
              for (
                var e = document.getElementsByTagName("script"), t = "", n = 0;
                n < e.length;
                n += 1
              ) {
                var i = e[n].src.lastIndexOf(this.scriptName);
                i >= 0 && (t = e[n].src.substr(0, i - 1));
              }
              return t;
            },
          },
          {
            key: "getVersion",
            value: function () {
              return this.version;
            },
          },
          {
            key: "setLanguage",
            value: function (e) {
              this.language = e;
            },
          },
          {
            key: "setCore",
            value: function (e) {
              (this.core = e), e.setIntegrationModel(this);
            },
          },
          {
            key: "getCore",
            value: function () {
              return this.core;
            },
          },
          {
            key: "setTarget",
            value: function (e) {
              (this.target = e),
                (this.isIframe =
                  "IFRAME" === this.target.tagName.toUpperCase());
            },
          },
          {
            key: "setEditorObject",
            value: function (e) {
              this.editorObject = e;
            },
          },
          {
            key: "openNewFormulaEditor",
            value: function () {
              (this.core.editionProperties.isNewElement = !0),
                this.core.openModalDialog(this.target, this.isIframe);
            },
          },
          {
            key: "openExistingFormulaEditor",
            value: function () {
              (this.core.editionProperties.isNewElement = !1),
                this.core.openModalDialog(this.target, this.isIframe);
            },
          },
          {
            key: "updateFormula",
            value: function (e) {
              var t, n;
              this.editorParameters &&
                (e = com.wiris.editor.util.EditorUtils.addAnnotation(
                  e,
                  "application/vnd.wiris.mtweb-params+json",
                  JSON.stringify(this.editorParameters)
                )),
                this.isIframe
                  ? ((t = this.target.contentWindow),
                    (n = this.target.contentWindow))
                  : ((t = this.target), (n = window));
              var i = this.core.beforeUpdateFormula(e, null);
              return i &&
                (i = this.insertFormula(t, n, i.mathml, i.wirisProperties))
                ? this.core.afterUpdateFormula(
                    i.focusElement,
                    i.windowTarget,
                    i.node,
                    i.latex
                  )
                : "";
            },
          },
          {
            key: "insertFormula",
            value: function (e, t, n, i) {
              return this.core.insertFormula(e, t, n, i);
            },
          },
          {
            key: "getSelection",
            value: function () {
              return this.isIframe
                ? (this.target.contentWindow.focus(),
                  this.target.contentWindow.getSelection())
                : (this.target.focus(), window.getSelection());
            },
          },
          {
            key: "addEvents",
            value: function () {
              var e = this,
                t = this.isIframe
                  ? this.target.contentWindow.document
                  : this.target;
              y.addElementEvents(
                t,
                function (t, n) {
                  e.doubleClickHandler(t, n);
                },
                function (t, n) {
                  e.mousedownHandler(t, n);
                },
                function (t, n) {
                  e.mouseupHandler(t, n);
                }
              );
            },
          },
          {
            key: "removeEvents",
            value: function () {
              var e = this.isIframe
                ? this.target.contentWindow.document
                : this.target;
              y.removeElementEvents(e);
            },
          },
          {
            key: "doubleClickHandler",
            value: function (e) {
              if ("img" === e.nodeName.toLowerCase()) {
                this.core.getCustomEditors().disable();
                var t = s.get("imageCustomEditorName");
                if (e.hasAttribute(t)) {
                  var n = e.getAttribute(t);
                  this.core.getCustomEditors().enable(n);
                }
                y.containsClass(e, s.get("imageClassName")) &&
                  ((this.core.editionProperties.temporalImage = e),
                  (this.core.editionProperties.isNewElement = !0),
                  this.openExistingFormulaEditor());
              }
            },
          },
          {
            key: "mouseupHandler",
            value: function () {
              var e = this;
              this.temporalImageResizing &&
                setTimeout(function () {
                  x.fixAfterResize(e.temporalImageResizing);
                }, 10);
            },
          },
          {
            key: "mousedownHandler",
            value: function (e) {
              "img" === e.nodeName.toLowerCase() &&
                y.containsClass(e, s.get("imageClassName")) &&
                (this.temporalImageResizing = e);
            },
          },
          {
            key: "getLanguage",
            value: function () {
              return this.getBrowserLanguage();
            },
          },
          {
            key: "getBrowserLanguage",
            value: function () {
              return navigator.userLanguage
                ? navigator.userLanguage.substring(0, 2)
                : navigator.language
                ? navigator.language.substring(0, 2)
                : "en";
            },
          },
          {
            key: "callbackFunction",
            value: function () {
              var e = this,
                t = d.newListener("onTargetReady", function () {
                  e.addEvents(e.target);
                });
              this.listeners.add(t);
            },
          },
          { key: "notifyWindowClosed", value: function () {} },
          { key: "getMathmlFromTextNode", value: function (e, t) {} },
          { key: "fillNonLatexNode", value: function (e, t, n) {} },
          { key: "getSelectedItem", value: function (e, t) {} },
        ]),
        (i = [
          {
            key: "setActionsOnCancelButtons",
            value: function () {
              WirisPlugin.currentInstance &&
                (WirisPlugin.currentInstance.core.editionProperties.temporalImage =
                  null);
              var e = WirisPlugin.currentInstance,
                t = e.getSelection();
              if ((t.removeAllRanges(), e.core.editionProperties.range)) {
                var n = e.core.editionProperties.range;
                (e.core.editionProperties.range = null), t.addRange(n);
              }
            },
          },
        ]),
        n && F(t.prototype, n),
        i && F(t, i),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    function U(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    (H.prototype.getMathmlFromTextNode = void 0),
      (H.prototype.fillNonLatexNode = void 0),
      (H.prototype.getSelectedItem = void 0),
      (H.integrationParameters = [
        "serviceProviderProperties",
        "editorParameters",
      ]);
    var W,
      X = (function () {
        function e(t) {
          !(function (e, t) {
            if (!(e instanceof t))
              throw new TypeError("Cannot call a class as a function");
          })(this, e),
            (this.overlayElement = t.overlayElement),
            (this.callbacks = t.callbacks),
            (this.overlayWrapper = this.overlayElement.appendChild(
              document.createElement("div")
            )),
            this.overlayWrapper.setAttribute(
              "class",
              "wrs_popupmessage_overlay_envolture"
            ),
            (this.message = this.overlayWrapper.appendChild(
              document.createElement("div")
            )),
            (this.message.id = "wrs_popupmessage"),
            this.message.setAttribute("class", "wrs_popupmessage_panel"),
            this.message.setAttribute("role", "dialog"),
            this.message.setAttribute("aria-describedby", "description_txt");
          var n = document.createElement("p"),
            i = document.createTextNode(t.strings.message);
          n.appendChild(i),
            (n.id = "description_txt"),
            this.message.appendChild(n);
          var r = this.overlayWrapper.appendChild(
            document.createElement("div")
          );
          r.setAttribute("class", "wrs_popupmessage_overlay"),
            r.addEventListener("click", this.cancelAction.bind(this)),
            (this.buttonArea = this.message.appendChild(
              document.createElement("div")
            )),
            this.buttonArea.setAttribute(
              "class",
              "wrs_popupmessage_button_area"
            ),
            (this.buttonArea.id = "wrs_popup_button_area");
          var a = {
            class: "wrs_button_accept",
            innerHTML: t.strings.submitString,
            id: "wrs_popup_accept_button",
          };
          (this.closeButton = this.createButton(
            a,
            this.closeAction.bind(this)
          )),
            this.buttonArea.appendChild(this.closeButton);
          var o = {
            class: "wrs_button_cancel",
            innerHTML: t.strings.cancelString,
            id: "wrs_popup_cancel_button",
          };
          (this.cancelButton = this.createButton(
            o,
            this.cancelAction.bind(this)
          )),
            this.buttonArea.appendChild(this.cancelButton);
        }
        var t, n, i;
        return (
          (t = e),
          (n = [
            {
              key: "createButton",
              value: function (e, t) {
                var n = {};
                return (
                  (n = document.createElement("button")).setAttribute(
                    "id",
                    e.id
                  ),
                  n.setAttribute("class", e.class),
                  (n.innerHTML = e.innerHTML),
                  n.addEventListener("click", t),
                  n
                );
              },
            },
            {
              key: "show",
              value: function () {
                "block" !== this.overlayWrapper.style.display
                  ? (document.activeElement.blur(),
                    (this.overlayWrapper.style.display = "block"),
                    this.closeButton.focus())
                  : (this.overlayWrapper.style.display = "none");
              },
            },
            {
              key: "cancelAction",
              value: function () {
                (this.overlayWrapper.style.display = "none"),
                  void 0 !== this.callbacks.cancelCallback &&
                    (this.callbacks.cancelCallback(),
                    H.setActionsOnCancelButtons());
              },
            },
            {
              key: "closeAction",
              value: function () {
                this.cancelAction(),
                  void 0 !== this.callbacks.closeCallback &&
                    this.callbacks.closeCallback();
              },
            },
            {
              key: "onKeyDown",
              value: function (e) {
                void 0 !== e.key &&
                  ("Escape" === e.key || "Esc" === e.key
                    ? (this.cancelAction(),
                      e.stopPropagation(),
                      e.preventDefault())
                    : "Tab" === e.key &&
                      (document.activeElement === this.closeButton
                        ? this.cancelButton.focus()
                        : this.closeButton.focus(),
                      e.stopPropagation(),
                      e.preventDefault()));
              },
            },
          ]) && U(t.prototype, n),
          i && U(t, i),
          Object.defineProperty(t, "prototype", { writable: !1 }),
          e
        );
      })(),
      V = new Uint8Array(16);
    function J() {
      if (
        !W &&
        !(W =
          ("undefined" != typeof crypto &&
            crypto.getRandomValues &&
            crypto.getRandomValues.bind(crypto)) ||
          ("undefined" != typeof msCrypto &&
            "function" == typeof msCrypto.getRandomValues &&
            msCrypto.getRandomValues.bind(msCrypto)))
      )
        throw new Error(
          "crypto.getRandomValues() not supported. See https://github.com/uuidjs/uuid#getrandomvalues-not-supported"
        );
      return W(V);
    }
    const K =
      /^(?:[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}|00000000-0000-0000-0000-000000000000)$/i;
    const q = function (e) {
      return "string" == typeof e && K.test(e);
    };
    for (var Y = [], Q = 0; Q < 256; ++Q)
      Y.push((Q + 256).toString(16).substr(1));
    const G = function (e) {
      var t =
          arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 0,
        n = (
          Y[e[t + 0]] +
          Y[e[t + 1]] +
          Y[e[t + 2]] +
          Y[e[t + 3]] +
          "-" +
          Y[e[t + 4]] +
          Y[e[t + 5]] +
          "-" +
          Y[e[t + 6]] +
          Y[e[t + 7]] +
          "-" +
          Y[e[t + 8]] +
          Y[e[t + 9]] +
          "-" +
          Y[e[t + 10]] +
          Y[e[t + 11]] +
          Y[e[t + 12]] +
          Y[e[t + 13]] +
          Y[e[t + 14]] +
          Y[e[t + 15]]
        ).toLowerCase();
      if (!q(n)) throw TypeError("Stringified UUID is invalid");
      return n;
    };
    const Z = function (e, t, n) {
      var i = (e = e || {}).random || (e.rng || J)();
      if (((i[6] = (15 & i[6]) | 64), (i[8] = (63 & i[8]) | 128), t)) {
        n = n || 0;
        for (var r = 0; r < 16; ++r) t[n + r] = i[r];
        return t;
      }
      return G(i);
    };
    function $(e, t) {
      return (
        (function (e) {
          if (Array.isArray(e)) return e;
        })(e) ||
        (function (e, t) {
          var n =
            null == e
              ? null
              : ("undefined" != typeof Symbol && e[Symbol.iterator]) ||
                e["@@iterator"];
          if (null == n) return;
          var i,
            r,
            a = [],
            o = !0,
            s = !1;
          try {
            for (
              n = n.call(e);
              !(o = (i = n.next()).done) &&
              (a.push(i.value), !t || a.length !== t);
              o = !0
            );
          } catch (e) {
            (s = !0), (r = e);
          } finally {
            try {
              o || null == n.return || n.return();
            } finally {
              if (s) throw r;
            }
          }
          return a;
        })(e, t) ||
        ee(e, t) ||
        (function () {
          throw new TypeError(
            "Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
          );
        })()
      );
    }
    function ee(e, t) {
      if (e) {
        if ("string" == typeof e) return te(e, t);
        var n = Object.prototype.toString.call(e).slice(8, -1);
        return (
          "Object" === n && e.constructor && (n = e.constructor.name),
          "Map" === n || "Set" === n
            ? Array.from(e)
            : "Arguments" === n ||
              /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)
            ? te(e, t)
            : void 0
        );
      }
    }
    function te(e, t) {
      (null == t || t > e.length) && (t = e.length);
      for (var n = 0, i = new Array(t); n < t; n++) i[n] = e[n];
      return i;
    }
    function ne(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var ie = "wiris_telemetry_mathtype_web_senderid",
      re = (function () {
        function e() {
          throw (
            ((function (e, t) {
              if (!(e instanceof t))
                throw new TypeError("Cannot call a class as a function");
            })(this, e),
            new Error("Static class StringManager can not be instantiated."))
          );
        }
        var t, n, i;
        return (
          (t = e),
          (i = [
            {
              key: "senderId",
              get: function () {
                if (!this._senderId) {
                  var t,
                    n = (function (e, t) {
                      var n =
                        ("undefined" != typeof Symbol && e[Symbol.iterator]) ||
                        e["@@iterator"];
                      if (!n) {
                        if (
                          Array.isArray(e) ||
                          (n = ee(e)) ||
                          (t && e && "number" == typeof e.length)
                        ) {
                          n && (e = n);
                          var i = 0,
                            r = function () {};
                          return {
                            s: r,
                            n: function () {
                              return i >= e.length
                                ? { done: !0 }
                                : { done: !1, value: e[i++] };
                            },
                            e: function (e) {
                              throw e;
                            },
                            f: r,
                          };
                        }
                        throw new TypeError(
                          "Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
                        );
                      }
                      var a,
                        o = !0,
                        s = !1;
                      return {
                        s: function () {
                          n = n.call(e);
                        },
                        n: function () {
                          var e = n.next();
                          return (o = e.done), e;
                        },
                        e: function (e) {
                          (s = !0), (a = e);
                        },
                        f: function () {
                          try {
                            o || null == n.return || n.return();
                          } finally {
                            if (s) throw a;
                          }
                        },
                      };
                    })(
                      document.cookie.split(";").map(function (e) {
                        return e.trim().split("=");
                      })
                    );
                  try {
                    for (n.s(); !(t = n.n()).done; ) {
                      var i = $(t.value, 2),
                        r = i[0],
                        a = i[1];
                      if (r === ie) {
                        this._senderId = a;
                        break;
                      }
                    }
                  } catch (e) {
                    n.e(e);
                  } finally {
                    n.f();
                  }
                  this._senderId ||
                    ((this._senderId = e.composeUUID()),
                    (document.cookie = this.composeCookie(
                      ie,
                      this._senderId,
                      31536e4
                    )));
                }
                return this._senderId;
              },
            },
            {
              key: "sessionId",
              get: function () {
                return (
                  this._sessionId || (this._sessionId = e.composeUUID()),
                  this._sessionId
                );
              },
            },
            {
              key: "send",
              value: function (t) {
                var n = {
                  method: "POST",
                  cache: "no-cache",
                  headers: {
                    "Content-Type": "application/json",
                    "X-Api-Key": "CK20op1pOx2LAUjPFP7kB2UPveHZRidG51UJE26m",
                    "Accept-Version": "1",
                  },
                  body: JSON.stringify(e.composeBody(t)),
                };
                return fetch(e.endpoint, n)
                  .then(function (e) {
                    return e;
                  })
                  .catch(function (e) {
                    console.warn(e);
                  });
              },
            },
            {
              key: "session",
              get: function () {
                return { id: e.sessionId, page: 0 };
              },
            },
            {
              key: "sender",
              get: function () {
                return {
                  id: e.senderId,
                  os: navigator.oscpu,
                  user_agent: window.navigator.userAgent,
                  domain: window.location.hostname,
                  deployment: e.deployment,
                  editor_version: WirisPlugin.currentInstance.environment
                    .editorVersion
                    ? WirisPlugin.currentInstance.environment.editorVersion
                    : "",
                  language: WirisPlugin.currentInstance.language,
                  product_version: WirisPlugin.currentInstance.version,
                  backend: WirisPlugin.currentInstance.serviceProviderProperties
                    .server
                    ? WirisPlugin.currentInstance.serviceProviderProperties
                        .server
                    : "",
                };
              },
            },
            {
              key: "deployment",
              get: function () {
                var e = WirisPlugin.currentInstance.environment.editor,
                  t = "";
                return (
                  /Generic/.test(e)
                    ? (t = "generic")
                    : /Froala/.test(e)
                    ? (t = "froala")
                    : /CKEditor/.test(e)
                    ? (t = "ckeditor")
                    : /TinyMCE/.test(e) && (t = "tinymce"),
                  "".concat("mathtype-web-plugin-").concat(t)
                );
              },
            },
            {
              key: "composeBody",
              value: function (t) {
                return { messages: t, sender: e.sender, session: e.session };
              },
            },
            {
              key: "composeUUID",
              value: function () {
                return Z();
              },
            },
            {
              key: "composeSenderUUID",
              value: function () {
                return this.composeUUID();
              },
            },
            {
              key: "composeCookie",
              value: function (e, t, n) {
                var i = null == n ? "" : "; max-age=".concat(n);
                return "".concat(e, "=").concat(t).concat(i);
              },
            },
          ]),
          (n = null) && ne(t.prototype, n),
          i && ne(t, i),
          Object.defineProperty(t, "prototype", { writable: !1 }),
          e
        );
      })();
    (re.endpoint = "https://telemetry.wiris.net"),
      (re._senderId = ""),
      (re._sessionId = "");
    const ae =
        '<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n<svg\n   xmlns:dc="http://purl.org/dc/elements/1.1/"\n   xmlns:cc="http://creativecommons.org/ns#"\n   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"\n   xmlns:svg="http://www.w3.org/2000/svg"\n   xmlns="http://www.w3.org/2000/svg"\n   xmlns:xlink="http://www.w3.org/1999/xlink"\n   viewBox="0 0 13.76 13.76"\n   height="13.76"\n   width="13.76"\n   id="svg3813"\n   version="1.1">\n  <metadata\n     id="metadata3819">\n    <rdf:RDF>\n      <cc:Work\n         rdf:about="">\n        <dc:format>image/svg+xml</dc:format>\n        <dc:type\n           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />\n        <dc:title></dc:title>\n      </cc:Work>\n    </rdf:RDF>\n  </metadata>\n  <defs\n     id="defs3817" />\n  <image\n     y="0"\n     x="0"\n     id="image3821"\n     xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAArCAYAAADhXXHAAAAACXBIWXMAAC4jAAAuIwF4pT92AAAA\nnUlEQVRYw+3Z0QnCMBSF4T/FATqCG1g3cISO0NE6iiPoCE5gneD40ohPvgkJ/AcC9/EjHELgliT0\nkoGOIlasWLFixYoVK1asWLFixYoVK1bsjxy+5hlYgLEx47ofSEKSJW1nTUJJMgLPDlpwHoCpk8rO\nvgZixf4Zu3Vi3cq+WroBp4ahL+BYa3AB7o1CH7vvc7M1U4N/g2sdSk8bxjfDaMNdr+hmAQAAAABJ\nRU5ErkJggg==\n"\n     style="image-rendering:optimizeQuality"\n     preserveAspectRatio="none"\n     height="13.76"\n     width="13.76" />\n</svg>\n',
      oe =
        '<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n<svg\n   xmlns:dc="http://purl.org/dc/elements/1.1/"\n   xmlns:cc="http://creativecommons.org/ns#"\n   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"\n   xmlns:svg="http://www.w3.org/2000/svg"\n   xmlns="http://www.w3.org/2000/svg"\n   xmlns:xlink="http://www.w3.org/1999/xlink"\n   viewBox="0 0 13.76 13.76"\n   height="13.76"\n   width="13.76"\n   id="svg32"\n   version="1.1">\n  <metadata\n     id="metadata38">\n    <rdf:RDF>\n      <cc:Work\n         rdf:about="">\n        <dc:format>image/svg+xml</dc:format>\n        <dc:type\n           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />\n        <dc:title></dc:title>\n      </cc:Work>\n    </rdf:RDF>\n  </metadata>\n  <defs\n     id="defs36" />\n  <image\n     y="0"\n     x="0"\n     id="image40"\n     xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAArCAYAAADhXXHAAAAACXBIWXMAAC4jAAAuIwF4pT92AAAA\npklEQVRYw+3ZLQ4CMRCG4bcbFOvXg99T7FG4BafAw1VALx7dWyy2mIoGgSOZJu/n6p70ZybppFIK\nvWSgo4gVK1asWLFixYoVK1asWLFixYoV+yO7r/UMHIAxiO8FZGBrsUfgDEwBN/QNXIA11S/PW1Bo\nCz4N9ein4Nd1Dyw9PbDR0iVW7J+xudax6HkOtZVdg0MfQE7N0G4GlmANYgNW4A6QepowfgDMXB26\nb1V6LAAAAABJRU5ErkJggg==\n"\n     style="image-rendering:optimizeQuality"\n     preserveAspectRatio="none"\n     height="13.76"\n     width="13.76" />\n</svg>\n';
    function se(e, t) {
      if (!(e instanceof t))
        throw new TypeError("Cannot call a class as a function");
    }
    function le(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    function ce(e, t, n) {
      return (
        t && le(e.prototype, t),
        n && le(e, n),
        Object.defineProperty(e, "prototype", { writable: !1 }),
        e
      );
    }
    var ue = (function () {
      function e(t) {
        var n = this;
        se(this, e), (this.attributes = t);
        var i = navigator.userAgent.toLowerCase(),
          r = i.indexOf("android") > -1,
          a = z.isIOS();
        (this.iosSoftkeyboardOpened = !1),
          (this.iosMeasureUnit = -1 === i.indexOf("crios") ? "%" : "vh"),
          (this.iosDivHeight = "100%".concat(this.iosMeasureUnit));
        var o = window.outerWidth,
          s = window.outerHeight,
          l = o > s,
          c = o < s,
          u = l && this.attributes.height > s,
          d = c && this.attributes.width > o,
          m = u || d;
        (this.instanceId = document.getElementsByClassName(
          "wrs_modal_dialogContainer"
        ).length),
          (this.deviceProperties = {
            orientation: l ? "landscape" : "portait",
            isAndroid: r,
            isIOS: a,
            isMobile: m,
            isDesktop: !m && !a && !r,
          }),
          (this.properties = {
            created: !1,
            state: "",
            previousState: "",
            position: { bottom: 0, right: 10 },
            size: { height: 338, width: 580 },
          }),
          (this.websiteBeforeLockParameters = null);
        var h = { class: "wrs_modal_overlay" };
        (h.id = this.getElementId(h.class)),
          (this.overlay = y.createElement("div", h)),
          ((h = {}).class = "wrs_modal_title_bar"),
          (h.id = this.getElementId(h.class)),
          (this.titleBar = y.createElement("div", h)),
          ((h = {}).class = "wrs_modal_title"),
          (h.id = this.getElementId(h.class)),
          (this.title = y.createElement("div", h)),
          (this.title.innerHTML = ""),
          ((h = {}).class = "wrs_modal_close_button"),
          (h.id = this.getElementId(h.class)),
          (h.title = v.get("close")),
          (h.style = {}),
          (this.closeDiv = y.createElement("a", h)),
          this.closeDiv.setAttribute("role", "button");
        var p =
            "background-size: 10px; background-image: url(data:image/svg+xml;base64,".concat(
              window.btoa(
                '<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n<svg\n   xmlns:dc="http://purl.org/dc/elements/1.1/"\n   xmlns:cc="http://creativecommons.org/ns#"\n   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"\n   xmlns:svg="http://www.w3.org/2000/svg"\n   xmlns="http://www.w3.org/2000/svg"\n   xmlns:xlink="http://www.w3.org/1999/xlink"\n   viewBox="0 0 13.76 13.76"\n   height="13.76"\n   width="13.76"\n   id="svg3783"\n   version="1.1">\n  <metadata\n     id="metadata3789">\n    <rdf:RDF>\n      <cc:Work\n         rdf:about="">\n        <dc:format>image/svg+xml</dc:format>\n        <dc:type\n           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />\n        <dc:title></dc:title>\n      </cc:Work>\n    </rdf:RDF>\n  </metadata>\n  <defs\n     id="defs3787" />\n  <image\n     y="0"\n     x="0"\n     id="image3791"\n     xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAArCAYAAADhXXHAAAAACXBIWXMAAC4jAAAuIwF4pT92AAAB\nvklEQVRYw83Z23GDMBAF0AsNhBIowSVQgjuISnAJKSEdZNOBS6CDOBUkqSC4gs2PyGhAQg92se4M\n4w8bccYW2hVumBmRdAB6ADfopQcw2SOYNoIkAL8APgB8AzgLI0/2S/iy1xkt3B9m9h0dM9/YHxM4\nJ/c4MfPkGX+y763OyYVKgUPQTXAJdC84Bg2CS6Gl4FSoF7wHmgvOhbrgzsW+8L4YJegccrEj749R\ngs7ZXGdz8wbAeNbREcDTzrHvblEgBbAUFACuy6JALJeL0E/P9sbvmBnNojcgAM+oJ58AhrlnWM5Z\nA+C9RmiokakBvIJuNTLSc7hojqY0Mo8EB6Ep2CPBm9BU7BHgKDQHqwlOguZiNcDJ0JLe4FV4iaLY\nJjF16dLqnoob+EdDs8A1QJPBtUCTwDVBo+DaoJvgNvBIR6rDl9wirbA1QIPgVgl6VwHb+dAr7Jkk\nS/Pg3mCkVOslxxV9yBFqSqTA/3N2Utkzye3pftw5OxzQ5tHeddcdzGj3o4VgClUwowgtAVOs3BpF\naA6YUnsDowhNAVNu12UUoVtgCn2+ifxp1wO42Ner4KPR5dJ2tsse2ZLvTQxbVf4AmC2z7WnSvpIA\nAAAASUVORK5CYII=\n"\n     style="image-rendering:optimizeQuality"\n     preserveAspectRatio="none"\n     height="13.76"\n     width="13.76" />\n</svg>\n'
              ),
              ")"
            ),
          g =
            "background-size: 10px; background-image: url(data:image/svg+xml;base64,".concat(
              window.btoa(
                '<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n<svg\n   xmlns:dc="http://purl.org/dc/elements/1.1/"\n   xmlns:cc="http://creativecommons.org/ns#"\n   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"\n   xmlns:svg="http://www.w3.org/2000/svg"\n   xmlns="http://www.w3.org/2000/svg"\n   xmlns:xlink="http://www.w3.org/1999/xlink"\n   viewBox="0 0 13.76 13.76"\n   height="13.76"\n   width="13.76"\n   id="svg2"\n   version="1.1">\n  <metadata\n     id="metadata8">\n    <rdf:RDF>\n      <cc:Work\n         rdf:about="">\n        <dc:format>image/svg+xml</dc:format>\n        <dc:type\n           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />\n        <dc:title></dc:title>\n      </cc:Work>\n    </rdf:RDF>\n  </metadata>\n  <defs\n     id="defs6" />\n  <image\n     y="0"\n     x="0"\n     id="image10"\n     xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAArCAYAAADhXXHAAAAACXBIWXMAAC4jAAAuIwF4pT92AAAB\n2ElEQVRYw9XZoXPCMBTH8S+5KfDzQ29606CH3/SmQTO96aGHHn/F0Himh8eDZSblQknSJH2F0DtE\nQw8+12vyfulr7XY7LuW4qvj+DugD18AC+AE2woa+/mz07y9cF7Y8d7YPDEtjK2AsCB4BvdLYHPi0\nXawioAA3wAfQaQiKHhuFYl1QSbAL6gWrSKgEuArqBKsEaB1wKNQKVsasHybcpRhwLNQED0zsoMbz\nFwJOhWL6Cmzd2e0D14Wi1/k9di2wFNnAEtBifd9jv4GtIPgaeBOCAkzLFayr/6idWSSY6DJ8sHT9\n6VK6zRFqKwo5gQ+grnKbA/gI6gsy5wRboT7sucBOaBX21GAvNAR7KnAlNBTbNDgIGoMtwO/C0Gko\nNBZbN525tk+dJrAj4F4YGxXgVQS019DkCgarM0OjwCoDaDBYZQINAquMoJVglRnUC1YZQp1g1RB0\nJryn65jYJ0HoRGPHguDX8hsZ6VAiGX4eUrJBbHqSArdN7LLBmCcBnpvYWfHWo6E8Wge8Ar7Kj8E4\nARwcnBPBB20BE7uJBMdAU8BH/YvyBAsFp0BjwNZGi201qALXgYaAnR0hX2upAzwDj/p8raFL5I4u\n8ALc6vNfvc+ztq5al9Rh/AfwZZ/LmlMllAAAAABJRU5ErkJggg==\n"\n     style="image-rendering:optimizeQuality"\n     preserveAspectRatio="none"\n     height="13.76"\n     width="13.76" />\n</svg>\n'
              ),
              ")"
            );
        this.closeDiv.setAttribute("style", p),
          this.closeDiv.setAttribute(
            "onmouseover",
            'this.style = "'.concat(g, '";')
          ),
          this.closeDiv.setAttribute(
            "onmouseout",
            'this.style = "'.concat(p, '";')
          ),
          ((h = {}).class = "wrs_modal_stack_button"),
          (h.id = this.getElementId(h.class)),
          (h.title = v.get("exit_fullscreen")),
          (this.stackDiv = y.createElement("a", h)),
          this.stackDiv.setAttribute("role", "button"),
          (p =
            "background-size: 10px; background-image: url(data:image/svg+xml;base64,".concat(
              window.btoa(
                '<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n<svg\n   xmlns:dc="http://purl.org/dc/elements/1.1/"\n   xmlns:cc="http://creativecommons.org/ns#"\n   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"\n   xmlns:svg="http://www.w3.org/2000/svg"\n   xmlns="http://www.w3.org/2000/svg"\n   xmlns:xlink="http://www.w3.org/1999/xlink"\n   viewBox="0 0 13.76 13.76"\n   height="13.76"\n   width="13.76"\n   id="svg3823"\n   version="1.1">\n  <metadata\n     id="metadata3829">\n    <rdf:RDF>\n      <cc:Work\n         rdf:about="">\n        <dc:format>image/svg+xml</dc:format>\n        <dc:type\n           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />\n        <dc:title></dc:title>\n      </cc:Work>\n    </rdf:RDF>\n  </metadata>\n  <defs\n     id="defs3827" />\n  <image\n     y="0"\n     x="0"\n     id="image3831"\n     xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAArCAYAAADhXXHAAAAAAXNSR0IArs4c6QAAAARnQU1BAACx\njwv8YQUAAAAJcEhZcwAALiMAAC4jAXilP3YAAAHOSURBVFhH1ZiLUcMwEEQNDcQl0AEuISVABZhO\nUkroICVAB6ECoINQgdmVfR5FlmQrkZzjzezEzsc8NPqcdNd1XfVfuB9ec3NAmv4yiRo5ImzBlm+c\nwZYtEHJCGsT3eSgHxKZFxs/tL+aMkCK8R3yMwu4PcsVmiXBIVDDCvh/miEtMeE5UaEsNMJcN8o64\ng26PvPSXs9S+/zRHQtgtvLRFCb9blZpnYw/9Rb6RR3M3zxtiprFbyKYwipK1+uwlnIkSrbITUaJR\n1itKtMkGRYk2WRZAQbTNBpzWtggrrwnaWja00hk0DrCgsEZZ4hXWKksmwjLAHobkgOv+V3+ZhXHQ\niWxKqXYLKNyILDdqbPKlldASPhA+Mxc7uwatkSOSix1iP//q2APshLBvfJo7hbizgQj/mDtl+KYu\nCj8h7NSqCM2zXJvZwqqEY4uCOuGYLKEwJ3kVzMlyscg5915FTFbdqhaSVbn8+mTV1gmurOqCxpZN\nEeUu9BlZd1obioTkQ7IhPGTjYZuPIoUMK/GUFrX39asuHJTlH3w1d3FCBxCrCUufZX+NCUdPSsAq\nwu4A8wnPiQrFhW1Z4govFRWKCoeOjzjoZF92CdwpZy6AquoPvJRHJxB8bJ8AAAAASUVORK5CYII=\n"\n     style="image-rendering:optimizeQuality"\n     preserveAspectRatio="none"\n     height="13.76"\n     width="13.76" />\n</svg>\n'
              ),
              ")"
            )),
          (g =
            "background-size: 10px; background-image: url(data:image/svg+xml;base64,".concat(
              window.btoa(
                '<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n<svg\n   xmlns:dc="http://purl.org/dc/elements/1.1/"\n   xmlns:cc="http://creativecommons.org/ns#"\n   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"\n   xmlns:svg="http://www.w3.org/2000/svg"\n   xmlns="http://www.w3.org/2000/svg"\n   xmlns:xlink="http://www.w3.org/1999/xlink"\n   viewBox="0 0 13.76 13.76"\n   height="13.76"\n   width="13.76"\n   id="svg42"\n   version="1.1">\n  <metadata\n     id="metadata48">\n    <rdf:RDF>\n      <cc:Work\n         rdf:about="">\n        <dc:format>image/svg+xml</dc:format>\n        <dc:type\n           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />\n        <dc:title></dc:title>\n      </cc:Work>\n    </rdf:RDF>\n  </metadata>\n  <defs\n     id="defs46" />\n  <image\n     y="0"\n     x="0"\n     id="image50"\n     xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAArCAYAAADhXXHAAAAAAXNSR0IArs4c6QAAAARnQU1BAACx\njwv8YQUAAAAJcEhZcwAALiMAAC4jAXilP3YAAAG/SURBVFhH1ZgxUsMwEEUNJRyAGmp6qKGn5xRQ\nQ08NNfRQQw11DpAaanIAWrMv8WaELSlexhLLm/mRnImiF48jr7zVtm3zX9ju2ik5llxLdpdHNg4k\nT5I7yWB8Cdl9yZHkRmIRRpQxOxK+YzC+hKwSnTBBKKoMxpeUBSbkksgRE1V+CJeWhUPJ5ao7ICeq\nrIVryMKJpC88RlTZk1SThVDYIvoluZIsSqyz511SfEg4UxbRdw5qnlmFa9AsCn8hO4aBKHiUjYqC\nN9mkKHiSzYqCJ9lPSVIUPMmySqTudEu8XbOxO90ab7KQFPYoC1Fhr7IwENbagMLCUtXnoCTM1QZW\n3iS3dFT2mRfHvEjuVfZUckFnQh67dgqo1GYqC1MLn3XtZIR/sFcJW2C39FcD18KxpcutcGqddSmc\nuykg/LDq+iAnC/OudUFOVrfLbkjJWvb11YjJuhSFvqxbUQhlXYuCylpE2YXy2SkLlVEgaxVluzyT\nIEutWQ1kKZYtouF2maK4mjCyFN6bJsw9gKgmrNdsbsKNT0qEKsIqC7EJx4gqxYVDWQgntIgqRYXD\nbY3CLpcVgmdPC974BYy3/MgRNM03hR9ubFTHT48AAAAASUVORK5CYII=\n"\n     style="image-rendering:optimizeQuality"\n     preserveAspectRatio="none"\n     height="13.76"\n     width="13.76" />\n</svg>\n'
              ),
              ")"
            )),
          this.stackDiv.setAttribute("style", p),
          this.stackDiv.setAttribute(
            "onmouseover",
            'this.style = "'.concat(g, '";')
          ),
          this.stackDiv.setAttribute(
            "onmouseout",
            'this.style = "'.concat(p, '";')
          ),
          ((h = {}).class = "wrs_modal_maximize_button"),
          (h.id = this.getElementId(h.class)),
          (h.title = v.get("fullscreen")),
          (this.maximizeDiv = y.createElement("a", h)),
          this.maximizeDiv.setAttribute("role", "button"),
          (p =
            "background-size: 10px; background-repeat: no-repeat; background-image: url(data:image/svg+xml;base64,".concat(
              window.btoa(
                '<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n<svg\n   xmlns:dc="http://purl.org/dc/elements/1.1/"\n   xmlns:cc="http://creativecommons.org/ns#"\n   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"\n   xmlns:svg="http://www.w3.org/2000/svg"\n   xmlns="http://www.w3.org/2000/svg"\n   xmlns:xlink="http://www.w3.org/1999/xlink"\n   viewBox="0 0 13.76 13.76"\n   height="13.76"\n   width="13.76"\n   id="svg3793"\n   version="1.1">\n  <metadata\n     id="metadata3799">\n    <rdf:RDF>\n      <cc:Work\n         rdf:about="">\n        <dc:format>image/svg+xml</dc:format>\n        <dc:type\n           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />\n        <dc:title></dc:title>\n      </cc:Work>\n    </rdf:RDF>\n  </metadata>\n  <defs\n     id="defs3797" />\n  <image\n     y="0"\n     x="0"\n     id="image3801"\n     xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAArCAYAAADhXXHAAAAAAXNSR0IArs4c6QAAAARnQU1BAACx\njwv8YQUAAAAJcEhZcwAALiMAAC4jAXilP3YAAAG4SURBVFhHvZnhUYNAEEbRBkwH2oGUkA40FWgJ\nKSEdaAmxA0vQDmIHKSFWgPuAHZkEAnd8y5v5kuNHMm+WY1mSm6qqCiGlZdUspXzxopY9Wu6bpZQf\nSxlRWapwVx9p2dy2CxUHy9ryWx9pKdWyECYcIQshwlGyIBeOlAWpcLQsyISXkAWEX5tlPkvJwnP7\nns1SsnvLS7PMZwlZiShEy8pEIVJWKgpRsnJRiJBNFf2wbCzjfZgRUZi9JYWDxT9bWk6WIXbKym4t\nKRVloObO5oze6ZClWX9a5jyOcOrfmuUkXPRUH/1zVRhZpvsnCxN+jnDqHh0SdQaFu9vg0ZIqrBZ1\neoXP92yKcJSocyHcd4FNEY4WdbrCR1rGrukMF9BWVhZvLZ7U9rS2nH9HVvoq63iFu+RUlOpIuCYL\nCCPIqVjq1A9j5R3aBnMY2kKzMlbZHPQVbVHLhomCUjZUFFSy35ZQUVDIMo+Gi4JCltFwERSy75Y5\n4+VkFLLcKHLHyyRUF1jOeJmMShbChZWy0Df8yFDLgg8/cpCN6I9cdHJhZHmy7X2anAnCtDUZ/j/Y\ng2X2j709MHhTDAFF8QdK9SRpUl2yFgAAAABJRU5ErkJggg==\n"\n     style="image-rendering:optimizeQuality"\n     preserveAspectRatio="none"\n     height="13.76"\n     width="13.76" />\n</svg>\n'
              ),
              ")"
            )),
          (g =
            "background-size: 10px; background-repeat: no-repeat; background-image: url(data:image/svg+xml;base64,".concat(
              window.btoa(
                '<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n<svg\n   xmlns:dc="http://purl.org/dc/elements/1.1/"\n   xmlns:cc="http://creativecommons.org/ns#"\n   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"\n   xmlns:svg="http://www.w3.org/2000/svg"\n   xmlns="http://www.w3.org/2000/svg"\n   xmlns:xlink="http://www.w3.org/1999/xlink"\n   viewBox="0 0 13.76 13.76"\n   height="13.76"\n   width="13.76"\n   id="svg12"\n   version="1.1">\n  <metadata\n     id="metadata18">\n    <rdf:RDF>\n      <cc:Work\n         rdf:about="">\n        <dc:format>image/svg+xml</dc:format>\n        <dc:type\n           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />\n        <dc:title></dc:title>\n      </cc:Work>\n    </rdf:RDF>\n  </metadata>\n  <defs\n     id="defs16" />\n  <image\n     y="0"\n     x="0"\n     id="image20"\n     xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAArCAYAAADhXXHAAAAAAXNSR0IArs4c6QAAAARnQU1BAACx\njwv8YQUAAAAJcEhZcwAALiMAAC4jAXilP3YAAAGMSURBVFhHvdk7TsNAFIVhQ0l6elLDJqCGngXQ\nU7MA6rALahZATQ81C6APrXP/jEaKHD/i8TnzS1eaICF/2I4f4qxt20bYOmaVlrK2Mb8s1Nj3mIu0\nlPYZszlPa1kvMf9pKe02Zq3Gcrhc4JUaSzawA0sWsAtLcrATS1KwG0sycA0sAd6kZXm1sNzVHtOy\nvBpYoK8xV/tPC3JjZVByYqVQcmHlUHJgLVBSY0ugPP7xO5PXYSW2FMr19ytm8sahxD7ElEBzk3c6\nsFysn/afymKPvsXMueh3oblRMNibmPuYZ34wsyWHfqhB8OFpwKvDHLADmusFd8/ZU8FOaO4I3PcF\nmwLXgOYOwVtexdnwdUy3vg2UQPnD2eji+vZsrruHS/eoBEpjWMpgrhi1Dv1gY6fBkuRQmtqzJVmg\npMbaoKTEWqGkwtqhpMBWgZICWwVKCuwpzxKSFNi5T2vFqb5gVcAqLNnBSixZwWos2cBg/9JSmgUM\n9iMt5QFe8tZ8VP6n3WXMHQtxPzHfabm0ptkBwWhpthzMp7YAAAAASUVORK5CYII=\n"\n     style="image-rendering:optimizeQuality"\n     preserveAspectRatio="none"\n     height="13.76"\n     width="13.76" />\n</svg>\n'
              ),
              ")"
            )),
          this.maximizeDiv.setAttribute("style", p),
          this.maximizeDiv.setAttribute(
            "onmouseover",
            'this.style = "'.concat(g, '";')
          ),
          this.maximizeDiv.setAttribute(
            "onmouseout",
            'this.style = "'.concat(p, '";')
          ),
          ((h = {}).class = "wrs_modal_minimize_button"),
          (h.id = this.getElementId(h.class)),
          (h.title = v.get("minimize")),
          (this.minimizeDiv = y.createElement("a", h)),
          this.minimizeDiv.setAttribute("role", "button"),
          (p =
            "background-size: 10px; background-repeat: no-repeat; background-image: url(data:image/svg+xml;base64,".concat(
              window.btoa(ae),
              ")"
            )),
          (g =
            "background-size: 10px; background-repeat: no-repeat; background-image: url(data:image/svg+xml;base64,".concat(
              window.btoa(oe),
              ")"
            )),
          this.minimizeDiv.setAttribute("style", p),
          this.minimizeDiv.setAttribute(
            "onmouseover",
            'this.style = "'.concat(g, '";')
          ),
          this.minimizeDiv.setAttribute(
            "onmouseout",
            'this.style = "'.concat(p, '";')
          ),
          ((h = {}).class = "wrs_modal_dialogContainer"),
          (h.id = this.getElementId(h.class)),
          (h.role = "dialog"),
          (this.container = y.createElement("div", h)),
          this.container.setAttribute("aria-labeledby", "wrs_modal_title[0]"),
          ((h = {}).class = "wrs_modal_wrapper"),
          (h.id = this.getElementId(h.class)),
          (this.wrapper = y.createElement("div", h)),
          ((h = {}).class = "wrs_content_container"),
          (h.id = this.getElementId(h.class)),
          (this.contentContainer = y.createElement("div", h)),
          ((h = {}).class = "wrs_modal_controls"),
          (h.id = this.getElementId(h.class)),
          (this.controls = y.createElement("div", h)),
          ((h = {}).class = "wrs_modal_buttons_container"),
          (h.id = this.getElementId(h.class)),
          (this.buttonContainer = y.createElement("div", h)),
          (this.submitButton = this.createSubmitButton(
            {
              id: this.getElementId("wrs_modal_button_accept"),
              class: "wrs_modal_button_accept",
              innerHTML: v.get("accept"),
            },
            this.submitAction.bind(this)
          )),
          (this.cancelButton = this.createSubmitButton(
            {
              id: this.getElementId("wrs_modal_button_cancel"),
              class: "wrs_modal_button_cancel",
              innerHTML: v.get("cancel"),
            },
            this.cancelAction.bind(this)
          )),
          (this.contentManager = null);
        var f = {
            cancelString: v.get("cancel"),
            submitString: v.get("close"),
            message: v.get("close_modal_warning"),
          },
          _ = {
            closeCallback: function () {
              n.close();
            },
            cancelCallback: function () {
              n.focus();
            },
          },
          b = { overlayElement: this.container, callbacks: _, strings: f };
        (this.popup = new X(b)),
          (this.rtl = !1),
          "rtl" in this.attributes && (this.rtl = this.attributes.rtl),
          (this.handleOpenedIosSoftkeyboard =
            this.handleOpenedIosSoftkeyboard.bind(this)),
          (this.handleClosedIosSoftkeyboard =
            this.handleClosedIosSoftkeyboard.bind(this));
      }
      return (
        ce(e, [
          {
            key: "setContentManager",
            value: function (e) {
              this.contentManager = e;
            },
          },
          {
            key: "getContentManager",
            value: function () {
              return this.contentManager;
            },
          },
          {
            key: "submitAction",
            value: function () {
              void 0 !== this.contentManager.submitAction &&
                this.contentManager.submitAction(),
                this.close();
            },
          },
          {
            key: "cancelAction",
            value: function () {
              void 0 === this.contentManager.hasChanges
                ? (H.setActionsOnCancelButtons(), this.close())
                : this.contentManager.hasChanges()
                ? this.showPopUpMessage()
                : (H.setActionsOnCancelButtons(), this.close());
            },
          },
          {
            key: "createSubmitButton",
            value: function (e, t) {
              return new ((function () {
                function n() {
                  se(this, n),
                    (this.element = document.createElement("button")),
                    (this.element.id = e.id),
                    (this.element.className = e.class),
                    (this.element.innerHTML = e.innerHTML),
                    y.addEvent(this.element, "click", t);
                }
                return (
                  ce(n, [
                    {
                      key: "getElement",
                      value: function () {
                        return this.element;
                      },
                    },
                  ]),
                  n
                );
              })())(e, t).getElement();
            },
          },
          {
            key: "create",
            value: function () {
              this.titleBar.appendChild(this.closeDiv),
                this.titleBar.appendChild(this.stackDiv),
                this.titleBar.appendChild(this.maximizeDiv),
                this.titleBar.appendChild(this.minimizeDiv),
                this.titleBar.appendChild(this.title),
                this.deviceProperties.isDesktop &&
                  this.container.appendChild(this.titleBar),
                this.wrapper.appendChild(this.contentContainer),
                this.wrapper.appendChild(this.controls),
                this.controls.appendChild(this.buttonContainer),
                this.buttonContainer.appendChild(this.submitButton),
                this.buttonContainer.appendChild(this.cancelButton),
                this.container.appendChild(this.wrapper),
                this.recalculateScrollBar(),
                document.body.appendChild(this.container),
                document.body.appendChild(this.overlay),
                this.deviceProperties.isDesktop
                  ? (this.createModalWindowDesktop(),
                    this.createResizeButtons(),
                    this.addListeners(),
                    s.get("modalWindowFullScreen") && this.maximize())
                  : this.deviceProperties.isAndroid
                  ? this.createModalWindowAndroid()
                  : this.deviceProperties.isIOS && this.createModalWindowIos(),
                null != this.contentManager && this.contentManager.insert(this),
                (this.properties.open = !0),
                (this.properties.created = !0),
                this.isRTL() &&
                  ((this.container.style.right = "".concat(
                    window.innerWidth -
                      this.scrollbarWidth -
                      this.container.offsetWidth,
                    "px"
                  )),
                  (this.container.className += " wrs_modal_rtl"));
            },
          },
          {
            key: "createResizeButtons",
            value: function () {
              (this.resizerBR = document.createElement("div")),
                (this.resizerBR.className = "wrs_bottom_right_resizer"),
                (this.resizerBR.innerHTML = "◢"),
                (this.resizerTL = document.createElement("div")),
                (this.resizerTL.className = "wrs_bottom_left_resizer"),
                this.container.appendChild(this.resizerBR),
                this.titleBar.appendChild(this.resizerTL),
                y.addEvent(
                  this.resizerBR,
                  "mousedown",
                  this.activateResizeStateBR.bind(this)
                ),
                y.addEvent(
                  this.resizerTL,
                  "mousedown",
                  this.activateResizeStateTL.bind(this)
                );
            },
          },
          {
            key: "activateResizeStateBR",
            value: function (e) {
              this.initializeResizeProperties(e, !1);
            },
          },
          {
            key: "activateResizeStateTL",
            value: function (e) {
              this.initializeResizeProperties(e, !0);
            },
          },
          {
            key: "initializeResizeProperties",
            value: function (e, t) {
              y.addClass(document.body, "wrs_noselect"),
                y.addClass(this.overlay, "wrs_overlay_active"),
                (this.resizeDataObject = {
                  x: this.eventClient(e).X,
                  y: this.eventClient(e).Y,
                }),
                (this.initialWidth = parseInt(this.container.style.width, 10)),
                (this.initialHeight = parseInt(
                  this.container.style.height,
                  10
                )),
                t
                  ? (this.leftScale = !0)
                  : ((this.initialRight = parseInt(
                      this.container.style.right,
                      10
                    )),
                    (this.initialBottom = parseInt(
                      this.container.style.bottom,
                      10
                    ))),
                this.initialRight || (this.initialRight = 0),
                this.initialBottom || (this.initialBottom = 0),
                (document.body.style["user-select"] = "none");
            },
          },
          {
            key: "open",
            value: function () {
              var e = this;
              try {
                re.send([
                  {
                    timestamp: new Date().toJSON(),
                    topic: "0",
                    level: "info",
                    message: "HELO telemetry.wiris.net",
                  },
                ]).then(function (e) {});
              } catch (e) {}
              this.removeClass("wrs_closed");
              var t = this.deviceProperties.isIOS,
                n = this.deviceProperties.isAndroid,
                i = this.deviceProperties.isMobile;
              if (
                ((t || n || i) &&
                  (this.restoreWebsiteScale(),
                  this.lockWebsiteScroll(),
                  setTimeout(function () {
                    e.hideKeyboard();
                  }, 400)),
                this.properties.created
                  ? (this.properties.open ||
                      ((this.properties.open = !0),
                      this.deviceProperties.isAndroid ||
                        this.deviceProperties.isIOS ||
                        this.restoreState()),
                    this.deviceProperties.isDesktop &&
                      s.get("modalWindowFullScreen") &&
                      this.maximize(),
                    this.deviceProperties.isIOS &&
                      ((this.iosSoftkeyboardOpened = !1),
                      this.setContainerHeight(
                        "".concat(100 + this.iosMeasureUnit)
                      )))
                  : this.create(),
                z.isEditorLoaded())
              )
                this.contentManager.onOpen(this);
              else {
                var r = d.newListener("onLoad", function () {
                  e.contentManager.onOpen(e);
                });
                this.contentManager.addListener(r);
              }
            },
          },
          {
            key: "close",
            value: function () {
              this.removeClass("wrs_maximized"),
                this.removeClass("wrs_minimized"),
                this.removeClass("wrs_stack"),
                this.addClass("wrs_closed"),
                this.saveModalProperties(),
                this.unlockWebsiteScroll(),
                (this.properties.open = !1);
            },
          },
          {
            key: "restoreWebsiteScale",
            value: function () {
              var e = document.querySelector("meta[name=viewport]"),
                t = ["initial-scale=", "minimum-scale=", "maximum-scale="],
                n = ["1.0", "1.0", "1.0"],
                i = function (e, t) {
                  var i = e.getAttribute("content");
                  if (i) {
                    for (
                      var r = i.split(","), a = "", o = [], s = 0;
                      s < r.length;
                      s += 1
                    ) {
                      for (var l = !1, c = 0; !l && c < t.length; )
                        r[s].indexOf(t[c]) && (l = !0), (c += 1);
                      l || o.push(r[s]);
                    }
                    for (var u = 0; u < t.length; u += 1) {
                      var d = t[u] + n[u];
                      a += 0 === u ? d : ",".concat(d);
                    }
                    for (var m = 0; m < o.length; m += 1) a += ",".concat(o[m]);
                    e.setAttribute("content", a),
                      e.setAttribute("content", ""),
                      e.setAttribute("content", i);
                  } else
                    e.setAttribute(
                      "content",
                      "initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"
                    ),
                      e.removeAttribute("content");
                };
              e
                ? i(e, t)
                : ((e = document.createElement("meta")),
                  document.getElementsByTagName("head")[0].appendChild(e),
                  i(e, t),
                  e.remove());
            },
          },
          {
            key: "lockWebsiteScroll",
            value: function () {
              this.websiteBeforeLockParameters = {
                bodyStylePosition: document.body.style.position
                  ? document.body.style.position
                  : "",
                bodyStyleOverflow: document.body.style.overflow
                  ? document.body.style.overflow
                  : "",
                htmlStyleOverflow: document.documentElement.style.overflow
                  ? document.documentElement.style.overflow
                  : "",
                windowScrollX: window.scrollX,
                windowScrollY: window.scrollY,
              };
            },
          },
          {
            key: "unlockWebsiteScroll",
            value: function () {
              if (this.websiteBeforeLockParameters) {
                (document.body.style.position =
                  this.websiteBeforeLockParameters.bodyStylePosition),
                  (document.body.style.overflow =
                    this.websiteBeforeLockParameters.bodyStyleOverflow),
                  (document.documentElement.style.overflow =
                    this.websiteBeforeLockParameters.htmlStyleOverflow);
                var e = this.websiteBeforeLockParameters.windowScrollX,
                  t = this.websiteBeforeLockParameters.windowScrollY;
                window.scrollTo(e, t),
                  (this.websiteBeforeLockParameters = null);
              }
            },
          },
          {
            key: "isIE11",
            value: function () {
              return (
                navigator.userAgent.search("Msie/") >= 0 ||
                navigator.userAgent.search("Trident/") >= 0 ||
                navigator.userAgent.search("Edge/") >= 0
              );
            },
          },
          {
            key: "isRTL",
            value: function () {
              return (
                "ar" === this.attributes.language ||
                "he" === this.attributes.language ||
                this.rtl
              );
            },
          },
          {
            key: "addClass",
            value: function (e) {
              y.addClass(this.overlay, e),
                y.addClass(this.titleBar, e),
                y.addClass(this.overlay, e),
                y.addClass(this.container, e),
                y.addClass(this.contentContainer, e),
                y.addClass(this.stackDiv, e),
                y.addClass(this.minimizeDiv, e),
                y.addClass(this.maximizeDiv, e),
                y.addClass(this.wrapper, e);
            },
          },
          {
            key: "removeClass",
            value: function (e) {
              y.removeClass(this.overlay, e),
                y.removeClass(this.titleBar, e),
                y.removeClass(this.overlay, e),
                y.removeClass(this.container, e),
                y.removeClass(this.contentContainer, e),
                y.removeClass(this.stackDiv, e),
                y.removeClass(this.minimizeDiv, e),
                y.removeClass(this.maximizeDiv, e),
                y.removeClass(this.wrapper, e);
            },
          },
          {
            key: "createModalWindowDesktop",
            value: function () {
              this.addClass("wrs_modal_desktop"), this.stack();
            },
          },
          {
            key: "createModalWindowAndroid",
            value: function () {
              this.addClass("wrs_modal_android"),
                window.addEventListener(
                  "resize",
                  this.orientationChangeAndroidSoftkeyboard.bind(this)
                );
            },
          },
          {
            key: "createModalWindowIos",
            value: function () {
              this.addClass("wrs_modal_ios"),
                window.addEventListener(
                  "resize",
                  this.orientationChangeIosSoftkeyboard.bind(this)
                );
            },
          },
          {
            key: "restoreState",
            value: function () {
              "maximized" === this.properties.state
                ? this.maximize()
                : "minimized" === this.properties.state
                ? ((this.properties.state = this.properties.previousState),
                  (this.properties.previousState = ""),
                  this.minimize())
                : this.stack();
            },
          },
          {
            key: "stack",
            value: function () {
              (this.properties.previousState = this.properties.state),
                (this.properties.state = "stack"),
                this.removeClass("wrs_maximized"),
                (this.minimizeDiv.title = v.get("minimize")),
                this.removeClass("wrs_minimized"),
                this.addClass("wrs_stack");
              var e =
                  "background-size: 10px; background-repeat: no-repeat; background-image: url(data:image/svg+xml;base64,".concat(
                    window.btoa(ae),
                    ")"
                  ),
                t =
                  "background-size: 10px; background-repeat: no-repeat; background-image: url(data:image/svg+xml;base64,".concat(
                    window.btoa(oe),
                    ")"
                  );
              this.minimizeDiv.setAttribute("style", e),
                this.minimizeDiv.setAttribute(
                  "onmouseover",
                  'this.style = "'.concat(t, '";')
                ),
                this.minimizeDiv.setAttribute(
                  "onmouseout",
                  'this.style = "'.concat(e, '";')
                ),
                this.restoreModalProperties(),
                void 0 !== this.resizerBR &&
                  void 0 !== this.resizerTL &&
                  this.setResizeButtonsVisibility(),
                this.recalculateScrollBar(),
                this.recalculatePosition(),
                this.recalculateScale(),
                this.focus();
            },
          },
          {
            key: "minimize",
            value: function () {
              if (
                (this.saveModalProperties(),
                (this.title.style.cursor = "pointer"),
                "minimized" === this.properties.state &&
                  "stack" === this.properties.previousState)
              )
                this.stack();
              else if (
                "minimized" === this.properties.state &&
                "maximized" === this.properties.previousState
              )
                this.maximize();
              else {
                (this.container.style.height = "30px"),
                  (this.container.style.width = "250px"),
                  (this.container.style.bottom = "0px"),
                  (this.container.style.right = "10px"),
                  this.removeListeners(),
                  (this.properties.previousState = this.properties.state),
                  (this.properties.state = "minimized"),
                  this.setResizeButtonsVisibility(),
                  (this.minimizeDiv.title = v.get("maximize")),
                  y.containsClass(this.overlay, "wrs_stack")
                    ? this.removeClass("wrs_stack")
                    : this.removeClass("wrs_maximized"),
                  this.addClass("wrs_minimized");
                var e =
                    "background-size: 10px; background-repeat: no-repeat; background-image: url(data:image/svg+xml;base64,".concat(
                      window.btoa(
                        '<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n<svg\n   xmlns:dc="http://purl.org/dc/elements/1.1/"\n   xmlns:cc="http://creativecommons.org/ns#"\n   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"\n   xmlns:svg="http://www.w3.org/2000/svg"\n   xmlns="http://www.w3.org/2000/svg"\n   xmlns:xlink="http://www.w3.org/1999/xlink"\n   viewBox="0 0 13.44 13.76"\n   height="13.76"\n   width="13.44"\n   id="svg3803"\n   version="1.1">\n  <metadata\n     id="metadata3809">\n    <rdf:RDF>\n      <cc:Work\n         rdf:about="">\n        <dc:format>image/svg+xml</dc:format>\n        <dc:type\n           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />\n        <dc:title></dc:title>\n      </cc:Work>\n    </rdf:RDF>\n  </metadata>\n  <defs\n     id="defs3807" />\n  <image\n     y="0"\n     x="0"\n     id="image3811"\n     xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAArCAYAAAAOnxr+AAAACXBIWXMAAC4jAAAuIwF4pT92AAAA\nvElEQVRYw+3ZSw0CMRSF4b8T9iAFB4wDkDAWcICEkTA4GAeAA3AADurgsCkbAgsSMrmFczZNd1/a\n3vSVJFFDGipJNdBZaRdAB2wC2TIwAgNAkrQEjsA86GBegDZJGoF18JnfJtVR9idXvaGGGmrod/b6\nV9kD14k9LbD6FDqUM8CU2b2Deo0aaqihhhpqqKGGGhr1hH/wiP469FaBMzflEhc9PZKQ1CtmsqRO\nEunpHbeNNN3A+dFJ/mf6V+gduGPIoUgKLbAAAAAASUVORK5CYII=\n"\n     style="image-rendering:optimizeQuality"\n     preserveAspectRatio="none"\n     height="13.76"\n     width="13.44" />\n</svg>\n'
                      ),
                      ")"
                    ),
                  t =
                    "background-size: 10px; background-repeat: no-repeat; background-image: url(data:image/svg+xml;base64,".concat(
                      window.btoa(
                        '<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n<svg\n   xmlns:dc="http://purl.org/dc/elements/1.1/"\n   xmlns:cc="http://creativecommons.org/ns#"\n   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"\n   xmlns:svg="http://www.w3.org/2000/svg"\n   xmlns="http://www.w3.org/2000/svg"\n   xmlns:xlink="http://www.w3.org/1999/xlink"\n   viewBox="0 0 13.44 13.76"\n   height="13.76"\n   width="13.44"\n   id="svg22"\n   version="1.1">\n  <metadata\n     id="metadata28">\n    <rdf:RDF>\n      <cc:Work\n         rdf:about="">\n        <dc:format>image/svg+xml</dc:format>\n        <dc:type\n           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />\n        <dc:title></dc:title>\n      </cc:Work>\n    </rdf:RDF>\n  </metadata>\n  <defs\n     id="defs26" />\n  <image\n     y="0"\n     x="0"\n     id="image30"\n     xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAArCAYAAAAOnxr+AAAACXBIWXMAAC4jAAAuIwF4pT92AAAA\nvUlEQVRYw+3ZsQ3CMBCF4d8WFekZgBqWIDUDZACmYBQWYIn0pGYAegZIexROERHRIBTdhXeVy08+\nyT4/JzMjQmWCVBjoarSugK0z3/0degKODjeyBy5Am8ysARrnnT8nM7sCa+fQLgdAAlQ6ngQVVFBB\nfzeUTK6t8VAwU328ztV6QQUVVFBBBRVUUEG9Ds41sJvZs/8GelDrlw7tAjhvmZLo9o6RD4bEGUp+\nX1My/I0T4HN4rrcASf9M/wp9ASNzIKYYz2hAAAAAAElFTkSuQmCC\n"\n     style="image-rendering:optimizeQuality"\n     preserveAspectRatio="none"\n     height="13.76"\n     width="13.44" />\n</svg>\n'
                      ),
                      ")"
                    );
                this.minimizeDiv.setAttribute("style", e),
                  this.minimizeDiv.setAttribute(
                    "onmouseover",
                    'this.style = "'.concat(t, '";')
                  ),
                  this.minimizeDiv.setAttribute(
                    "onmouseout",
                    'this.style = "'.concat(e, '";')
                  );
              }
            },
          },
          {
            key: "maximize",
            value: function () {
              this.saveModalProperties(),
                "maximized" !== this.properties.state &&
                  ((this.properties.previousState = this.properties.state),
                  (this.properties.state = "maximized")),
                this.setResizeButtonsVisibility(),
                y.containsClass(this.overlay, "wrs_minimized")
                  ? ((this.minimizeDiv.title = v.get("minimize")),
                    this.removeClass("wrs_minimized"))
                  : y.containsClass(this.overlay, "wrs_stack") &&
                    ((this.container.style.left = null),
                    (this.container.style.top = null),
                    this.removeClass("wrs_stack")),
                this.addClass("wrs_maximized");
              var e =
                  "background-size: 10px; background-repeat: no-repeat; background-image: url(data:image/svg+xml;base64,".concat(
                    window.btoa(ae),
                    ")"
                  ),
                t =
                  "background-size: 10px; background-repeat: no-repeat; background-image: url(data:image/svg+xml;base64,".concat(
                    window.btoa(oe),
                    ")"
                  );
              this.minimizeDiv.setAttribute("style", e),
                this.minimizeDiv.setAttribute(
                  "onmouseover",
                  'this.style = "'.concat(t, '";')
                ),
                this.minimizeDiv.setAttribute(
                  "onmouseout",
                  'this.style = "'.concat(e, '";')
                ),
                this.setSize(
                  parseInt(0.8 * window.innerHeight, 10),
                  parseInt(0.8 * window.innerWidth, 10)
                ),
                this.container.clientHeight > 700 &&
                  (this.container.style.height = "700px"),
                this.container.clientWidth > 1200 &&
                  (this.container.style.width = "1200px");
              var n = window.innerHeight,
                i = window.innerWidth,
                r = n / 2 - this.container.offsetHeight / 2,
                a = i / 2 - this.container.offsetWidth / 2;
              this.setPosition(r, a),
                this.recalculateScale(),
                this.recalculatePosition(),
                this.recalculateSize(),
                this.focus();
            },
          },
          {
            key: "reExpand",
            value: function () {
              "minimized" === this.properties.state &&
                ("maximized" === this.properties.previousState
                  ? this.maximize()
                  : this.stack(),
                (this.title.style.cursor = ""));
            },
          },
          {
            key: "setSize",
            value: function (e, t) {
              (this.container.style.height = "".concat(e, "px")),
                (this.container.style.width = "".concat(t, "px")),
                this.recalculateSize();
            },
          },
          {
            key: "setPosition",
            value: function (e, t) {
              (this.container.style.bottom = "".concat(e, "px")),
                (this.container.style.right = "".concat(t, "px"));
            },
          },
          {
            key: "saveModalProperties",
            value: function () {
              "stack" === this.properties.state &&
                ((this.properties.position.bottom = parseInt(
                  this.container.style.bottom,
                  10
                )),
                (this.properties.position.right = parseInt(
                  this.container.style.right,
                  10
                )),
                (this.properties.size.width = parseInt(
                  this.container.style.width,
                  10
                )),
                (this.properties.size.height = parseInt(
                  this.container.style.height,
                  10
                )));
            },
          },
          {
            key: "restoreModalProperties",
            value: function () {
              "stack" === this.properties.state &&
                (this.setPosition(
                  this.properties.position.bottom,
                  this.properties.position.right
                ),
                this.setSize(
                  this.properties.size.height,
                  this.properties.size.width
                ));
            },
          },
          {
            key: "recalculateSize",
            value: function () {
              (this.wrapper.style.width = "".concat(
                this.container.clientWidth - 12,
                "px"
              )),
                (this.wrapper.style.height = "".concat(
                  this.container.clientHeight - 38,
                  "px"
                )),
                (this.contentContainer.style.height = "".concat(
                  parseInt(this.wrapper.offsetHeight - 50, 10),
                  "px"
                ));
            },
          },
          {
            key: "setResizeButtonsVisibility",
            value: function () {
              "stack" === this.properties.state
                ? ((this.resizerTL.style.visibility = "visible"),
                  (this.resizerBR.style.visibility = "visible"))
                : ((this.resizerTL.style.visibility = "hidden"),
                  (this.resizerBR.style.visibility = "hidden"));
            },
          },
          {
            key: "addListeners",
            value: function () {
              this.maximizeDiv.addEventListener(
                "click",
                this.maximize.bind(this),
                !0
              ),
                this.stackDiv.addEventListener(
                  "click",
                  this.stack.bind(this),
                  !0
                ),
                this.minimizeDiv.addEventListener(
                  "click",
                  this.minimize.bind(this),
                  !0
                ),
                this.closeDiv.addEventListener(
                  "click",
                  this.cancelAction.bind(this)
                ),
                this.title.addEventListener("click", this.reExpand.bind(this)),
                this.overlay.addEventListener(
                  "click",
                  this.cancelAction.bind(this)
                ),
                y.addEvent(window, "mousedown", this.startDrag.bind(this)),
                y.addEvent(window, "mouseup", this.stopDrag.bind(this)),
                y.addEvent(window, "mousemove", this.drag.bind(this)),
                y.addEvent(window, "resize", this.onWindowResize.bind(this)),
                y.addEvent(
                  this.container,
                  "keydown",
                  this.onKeyDown.bind(this)
                );
            },
          },
          {
            key: "removeListeners",
            value: function () {
              y.removeEvent(window, "mousedown", this.startDrag),
                y.removeEvent(window, "mouseup", this.stopDrag),
                y.removeEvent(window, "mousemove", this.drag),
                y.removeEvent(window, "resize", this.onWindowResize),
                y.removeEvent(this.container, "keydown", this.onKeyDown);
            },
          },
          {
            key: "eventClient",
            value: function (e) {
              return void 0 === e.clientX && e.changedTouches
                ? {
                    X: e.changedTouches[0].clientX,
                    Y: e.changedTouches[0].clientY,
                  }
                : { X: e.clientX, Y: e.clientY };
            },
          },
          {
            key: "startDrag",
            value: function (e) {
              "minimized" !== this.properties.state &&
                e.target === this.title &&
                ((void 0 !== this.dragDataObject &&
                  null !== this.dragDataObject) ||
                  ((this.dragDataObject = {
                    x: this.eventClient(e).X,
                    y: this.eventClient(e).Y,
                  }),
                  (this.lastDrag = { x: "0px", y: "0px" }),
                  "" === this.container.style.right &&
                    (this.container.style.right = "0px"),
                  "" === this.container.style.bottom &&
                    (this.container.style.bottom = "0px"),
                  this.isIE11(),
                  y.addClass(document.body, "wrs_noselect"),
                  y.addClass(this.overlay, "wrs_overlay_active"),
                  (this.limitWindow = this.getLimitWindow())));
            },
          },
          {
            key: "drag",
            value: function (e) {
              if (this.dragDataObject) {
                e.preventDefault();
                var t = Math.min(
                  this.eventClient(e).Y,
                  this.limitWindow.minPointer.y
                );
                t = Math.max(this.limitWindow.maxPointer.y, t);
                var n = Math.min(
                  this.eventClient(e).X,
                  this.limitWindow.minPointer.x
                );
                n = Math.max(this.limitWindow.maxPointer.x, n);
                var i = "".concat(n - this.dragDataObject.x, "px"),
                  r = "".concat(t - this.dragDataObject.y, "px");
                (this.lastDrag = { x: i, y: r }),
                  (this.container.style.transform = "translate3d("
                    .concat(i, ",")
                    .concat(r, ",0)"));
              }
              if (this.resizeDataObject) {
                var a,
                  o = window.innerWidth,
                  s = window.innerHeight,
                  l = Math.min(
                    this.eventClient(e).X,
                    o - this.scrollbarWidth - 7
                  ),
                  c = Math.min(this.eventClient(e).Y, s - 7);
                l < 0 && (l = 0),
                  c < 0 && (c = 0),
                  (a = this.leftScale ? -1 : 1),
                  (this.container.style.width = "".concat(
                    this.initialWidth + a * (l - this.resizeDataObject.x),
                    "px"
                  )),
                  (this.container.style.height = "".concat(
                    this.initialHeight + a * (c - this.resizeDataObject.y),
                    "px"
                  )),
                  this.leftScale ||
                    (this.resizeDataObject.x - l - this.initialWidth < -580
                      ? (this.container.style.right = "".concat(
                          this.initialRight - (l - this.resizeDataObject.x),
                          "px"
                        ))
                      : ((this.container.style.right = "".concat(
                          this.initialRight + this.initialWidth - 580,
                          "px"
                        )),
                        (this.container.style.width = "580px")),
                    this.resizeDataObject.y - c < this.initialHeight - 338
                      ? (this.container.style.bottom = "".concat(
                          this.initialBottom - (c - this.resizeDataObject.y),
                          "px"
                        ))
                      : ((this.container.style.bottom = "".concat(
                          this.initialBottom + this.initialHeight - 338,
                          "px"
                        )),
                        (this.container.style.height = "338px"))),
                  this.recalculateScale(),
                  this.recalculatePosition();
              }
            },
          },
          {
            key: "getLimitWindow",
            value: function () {
              var e = window.innerWidth,
                t = window.innerHeight,
                n = this.container.offsetHeight,
                i = parseInt(this.container.style.bottom, 10),
                r = parseInt(this.container.style.right, 10),
                a = window.pageXOffset,
                o = this.dragDataObject.y,
                s = this.dragDataObject.x,
                l = n + i - (t - (o - a)),
                c = e - this.scrollbarWidth - (s - a) - r,
                u = t - this.container.offsetHeight + l,
                d = this.title.offsetHeight - (this.title.offsetHeight - l);
              return {
                minPointer: { x: e - c - this.scrollbarWidth, y: u },
                maxPointer: { x: this.container.offsetWidth - c, y: d },
              };
            },
          },
          {
            key: "getScrollBarWidth",
            value: function () {
              var e = document.createElement("p");
              (e.style.width = "100%"), (e.style.height = "200px");
              var t = document.createElement("div");
              (t.style.position = "absolute"),
                (t.style.top = "0px"),
                (t.style.left = "0px"),
                (t.style.visibility = "hidden"),
                (t.style.width = "200px"),
                (t.style.height = "150px"),
                (t.style.overflow = "hidden"),
                t.appendChild(e),
                document.body.appendChild(t);
              var n = e.offsetWidth;
              t.style.overflow = "scroll";
              var i = e.offsetWidth;
              return (
                n === i && (i = t.clientWidth),
                document.body.removeChild(t),
                n - i
              );
            },
          },
          {
            key: "stopDrag",
            value: function () {
              (this.dragDataObject || this.resizeDataObject) &&
                ((this.container.style.transform = ""),
                this.dragDataObject &&
                  ((this.container.style.right = "".concat(
                    parseInt(this.container.style.right, 10) -
                      parseInt(this.lastDrag.x, 10),
                    "px"
                  )),
                  (this.container.style.bottom = "".concat(
                    parseInt(this.container.style.bottom, 10) -
                      parseInt(this.lastDrag.y, 10),
                    "px"
                  ))),
                this.focus(),
                (document.body.style["user-select"] = ""),
                this.isIE11(),
                y.removeClass(document.body, "wrs_noselect"),
                y.removeClass(this.overlay, "wrs_overlay_active")),
                (this.dragDataObject = null),
                (this.resizeDataObject = null),
                (this.initialWidth = null),
                (this.leftScale = null);
            },
          },
          {
            key: "onWindowResize",
            value: function () {
              this.recalculateScrollBar(),
                this.recalculatePosition(),
                this.recalculateScale();
            },
          },
          {
            key: "onKeyDown",
            value: function (e) {
              void 0 !== e.key &&
                ("block" !== this.popup.overlayWrapper.style.display
                  ? "Escape" === e.key || "Esc" === e.key
                    ? this.properties.open && this.contentManager.onKeyDown(e)
                    : e.shiftKey && "Tab" === e.key
                    ? document.activeElement === this.cancelButton
                      ? (this.submitButton.focus(),
                        e.stopPropagation(),
                        e.preventDefault())
                      : this.contentManager.onKeyDown(e)
                    : "Tab" === e.key &&
                      (document.activeElement === this.submitButton
                        ? (this.cancelButton.focus(),
                          e.stopPropagation(),
                          e.preventDefault())
                        : this.contentManager.onKeyDown(e))
                  : this.popup.onKeyDown(e));
            },
          },
          {
            key: "recalculatePosition",
            value: function () {
              (this.container.style.right = "".concat(
                Math.min(
                  parseInt(this.container.style.right, 10),
                  window.innerWidth -
                    this.scrollbarWidth -
                    this.container.offsetWidth
                ),
                "px"
              )),
                parseInt(this.container.style.right, 10) < 0 &&
                  (this.container.style.right = "0px"),
                (this.container.style.bottom = "".concat(
                  Math.min(
                    parseInt(this.container.style.bottom, 10),
                    window.innerHeight - this.container.offsetHeight
                  ),
                  "px"
                )),
                parseInt(this.container.style.bottom, 10) < 0 &&
                  (this.container.style.bottom = "0px");
            },
          },
          {
            key: "recalculateScale",
            value: function () {
              var e = !1;
              parseInt(this.container.style.width, 10) > 580
                ? ((this.container.style.width = "".concat(
                    Math.min(
                      parseInt(this.container.style.width, 10),
                      window.innerWidth - this.scrollbarWidth
                    ),
                    "px"
                  )),
                  (e = !0))
                : ((this.container.style.width = "580px"), (e = !0)),
                parseInt(this.container.style.height, 10) > 338
                  ? ((this.container.style.height = "".concat(
                      Math.min(
                        parseInt(this.container.style.height, 10),
                        window.innerHeight
                      ),
                      "px"
                    )),
                    (e = !0))
                  : ((this.container.style.height = "338px"), (e = !0)),
                e && this.recalculateSize();
            },
          },
          {
            key: "recalculateScrollBar",
            value: function () {
              (this.hasScrollBar =
                window.innerWidth > document.documentElement.clientWidth),
                this.hasScrollBar
                  ? (this.scrollbarWidth = this.getScrollBarWidth())
                  : (this.scrollbarWidth = 0);
            },
          },
          {
            key: "hideKeyboard",
            value: function () {
              var e = document.createElement("input");
              this.container.appendChild(e), e.focus(), e.blur(), e.remove();
            },
          },
          {
            key: "focus",
            value: function () {
              null != this.contentManager &&
                void 0 !== this.contentManager.onFocus &&
                this.contentManager.onFocus();
            },
          },
          {
            key: "portraitMode",
            value: function () {
              return window.innerHeight > window.innerWidth;
            },
          },
          {
            key: "handleOpenedIosSoftkeyboard",
            value: function () {
              this.iosSoftkeyboardOpened ||
                null == this.iosDivHeight ||
                this.iosDivHeight !== "100".concat(this.iosMeasureUnit) ||
                (this.portraitMode()
                  ? this.setContainerHeight("63".concat(this.iosMeasureUnit))
                  : this.setContainerHeight("40".concat(this.iosMeasureUnit))),
                (this.iosSoftkeyboardOpened = !0);
            },
          },
          {
            key: "handleClosedIosSoftkeyboard",
            value: function () {
              (this.iosSoftkeyboardOpened = !1),
                this.setContainerHeight("100".concat(this.iosMeasureUnit));
            },
          },
          {
            key: "orientationChangeIosSoftkeyboard",
            value: function () {
              this.iosSoftkeyboardOpened
                ? this.portraitMode()
                  ? this.setContainerHeight("63".concat(this.iosMeasureUnit))
                  : this.setContainerHeight("40".concat(this.iosMeasureUnit))
                : this.setContainerHeight("100".concat(this.iosMeasureUnit));
            },
          },
          {
            key: "orientationChangeAndroidSoftkeyboard",
            value: function () {
              this.setContainerHeight("100%");
            },
          },
          {
            key: "setContainerHeight",
            value: function (e) {
              (this.iosDivHeight = e), (this.wrapper.style.height = e);
            },
          },
          {
            key: "showPopUpMessage",
            value: function () {
              "minimized" === this.properties.state && this.stack(),
                this.popup.show();
            },
          },
          {
            key: "setTitle",
            value: function (e) {
              this.title.innerHTML = e;
            },
          },
          {
            key: "getElementId",
            value: function (e) {
              return "".concat(e, "[").concat(this.instanceId, "]");
            },
          },
        ]),
        e
      );
    })();
    var de;
    String.prototype.codePointAt ||
      ((de = function (e) {
        if (null == this) throw TypeError();
        var t = String(this),
          n = t.length,
          i = e ? Number(e) : 0;
        if ((i != i && (i = 0), !(i < 0 || i >= n))) {
          var r,
            a = t.charCodeAt(i);
          return a >= 55296 &&
            a <= 56319 &&
            n > i + 1 &&
            (r = t.charCodeAt(i + 1)) >= 56320 &&
            r <= 57343
            ? 1024 * (a - 55296) + r - 56320 + 65536
            : a;
        }
      }),
      Object.defineProperty
        ? Object.defineProperty(String.prototype, "codePointAt", {
            value: de,
            configurable: !0,
            writable: !0,
          })
        : (String.prototype.codePointAt = de)),
      "function" != typeof Object.assign &&
        Object.defineProperty(Object, "assign", {
          value: function (e, t) {
            if (null == e)
              throw new TypeError("Cannot convert undefined or null to object");
            for (var n = Object(e), i = 1; i < arguments.length; i++) {
              var r = arguments[i];
              if (null != r)
                for (var a in r)
                  Object.prototype.hasOwnProperty.call(r, a) && (n[a] = r[a]);
            }
            return n;
          },
          writable: !0,
          configurable: !0,
        }),
      Array.prototype.includes ||
        Object.defineProperty(Array.prototype, "includes", {
          value: function (e, t) {
            if (null == this)
              throw new TypeError('"this" s null or is not defined');
            var n = Object(this),
              i = n.length >>> 0;
            if (0 === i) return !1;
            var r,
              a,
              o = 0 | t,
              s = Math.max(o >= 0 ? o : i - Math.abs(o), 0);
            for (; s < i; ) {
              if (
                (r = n[s]) === (a = e) ||
                ("number" == typeof r &&
                  "number" == typeof a &&
                  isNaN(r) &&
                  isNaN(a))
              )
                return !0;
              s++;
            }
            return !1;
          },
        }),
      String.prototype.includes ||
        (String.prototype.includes = function (e, t) {
          if (e instanceof RegExp)
            throw TypeError("first argument must not be a RegExp");
          return void 0 === t && (t = 0), -1 !== this.indexOf(e, t);
        }),
      String.prototype.startsWith ||
        Object.defineProperty(String.prototype, "startsWith", {
          value: function (e, t) {
            var n = t > 0 ? 0 | t : 0;
            return this.substring(n, n + e.length) === e;
          },
        });
    var me = __webpack_require__(62),
      he = __webpack_require__.n(me),
      pe = __webpack_require__(36),
      ge = __webpack_require__.n(pe),
      fe = __webpack_require__(793),
      _e = __webpack_require__.n(fe),
      ve = __webpack_require__(892),
      be = __webpack_require__.n(ve),
      ye = __webpack_require__(173),
      we = __webpack_require__.n(ye),
      xe = __webpack_require__(464),
      ke = __webpack_require__.n(xe),
      Ae = __webpack_require__(789),
      Ce = {};
    (Ce.styleTagTransform = ke()),
      (Ce.setAttributes = be()),
      (Ce.insert = _e().bind(null, "head")),
      (Ce.domAPI = ge()),
      (Ce.insertStyleElement = we());
    he()(Ae.Z, Ce);
    Ae.Z && Ae.Z.locals && Ae.Z.locals;
    function Me(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    var Te = (function () {
      function e(t) {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e),
          (this.language = "en"),
          (this.editMode = "images"),
          (this.modalDialog = null),
          (this.customEditors = new N());
        var n, i;
        if (
          (this.customEditors.addEditor("chemistry", {
            name: "Chemistry",
            toolbar: "chemistry",
            icon: "chem.png",
            confVariable: "chemEnabled",
            title: "ChemType",
            tooltip: "Insert a chemistry formula - ChemType",
          }),
          (this.environment = {}),
          (this.editionProperties = {}),
          (this.editionProperties.isNewElement = !0),
          (this.editionProperties.temporalImage = null),
          (this.editionProperties.latexRange = null),
          (this.editionProperties.range = null),
          (this.integrationModel = null),
          (this.contentManager = null),
          (this.browser =
            ((n = navigator.userAgent),
            (i = "none"),
            n.search("Edge/") >= 0
              ? (i = "EDGE")
              : n.search("Chrome/") >= 0
              ? (i = "CHROME")
              : n.search("Trident/") >= 0
              ? (i = "IE")
              : n.search("Firefox/") >= 0
              ? (i = "FIREFOX")
              : n.search("Safari/") >= 0 && (i = "SAFARI"),
            i)),
          (this.listeners = new d()),
          (this.serviceProviderProperties = {}),
          !("serviceProviderProperties" in t))
        )
          throw new Error("serviceProviderProperties property missing.");
        this.serviceProviderProperties = t.serviceProviderProperties;
      }
      var t, n, i;
      return (
        (t = e),
        (n = [
          {
            key: "setIntegrationModel",
            value: function (e) {
              this.integrationModel = e;
            },
          },
          {
            key: "setEnvironment",
            value: function (e) {
              "editor" in e && (this.environment.editor = e.editor),
                "mode" in e && (this.environment.mode = e.mode),
                "version" in e && (this.environment.version = e.version);
            },
          },
          {
            key: "getModalDialog",
            value: function () {
              return this.modalDialog;
            },
          },
          {
            key: "init",
            value: function () {
              var t = this;
              if (e.initialized) this.listeners.fire("onLoad", {});
              else {
                var n = d.newListener("onInit", function () {
                  var e = h.getService("configurationjs", "", "get"),
                    n = JSON.parse(e);
                  s.addConfiguration(n),
                    s.addConfiguration(D),
                    (v.language = t.language),
                    t.listeners.fire("onLoad", {});
                });
                h.addListener(n),
                  h.init(this.serviceProviderProperties),
                  (e.initialized = !0);
              }
            },
          },
          {
            key: "addListener",
            value: function (e) {
              this.listeners.add(e);
            },
          },
          {
            key: "beforeUpdateFormula",
            value: function (t, n) {
              var i = new R();
              return (
                (i.mathml = t),
                (i.wirisProperties = {}),
                null != n &&
                  Object.keys(n).forEach(function (e) {
                    i.wirisProperties[e] = n[e];
                  }),
                (i.language = this.language),
                (i.editMode = this.editMode),
                this.listeners.fire("onBeforeFormulaInsertion", i) ||
                e.globalListeners.fire("onBeforeFormulaInsertion", i)
                  ? {}
                  : { mathml: i.mathml, wirisProperties: i.wirisProperties }
              );
            },
          },
          {
            key: "insertFormula",
            value: function (e, t, n, i) {
              var r = {};
              if (n)
                if ("latex" === this.editMode) {
                  if (
                    ((r.latex = g.getLatexFromMathML(n)),
                    this.integrationModel.fillNonLatexNode && !r.latex)
                  ) {
                    var a = new R();
                    (a.editMode = this.editMode),
                      (a.windowTarget = t),
                      (a.focusElement = e),
                      (a.latex = r.latex),
                      this.integrationModel.fillNonLatexNode(a, t, n);
                  } else
                    r.node = t.document.createTextNode(
                      "$$".concat(r.latex, "$$")
                    );
                  this.insertElementOnSelection(r.node, e, t);
                } else
                  (r.node = j.mathmlToImgObject(
                    t.document,
                    n,
                    i,
                    this.language
                  )),
                    this.insertElementOnSelection(r.node, e, t);
              else this.insertElementOnSelection(null, e, t);
              return r;
            },
          },
          {
            key: "afterUpdateFormula",
            value: function (t, n, i, r) {
              var a = new R();
              return (
                (a.editMode = this.editMode),
                (a.windowTarget = n),
                (a.focusElement = t),
                (a.node = i),
                (a.latex = r),
                this.listeners.fire("onAfterFormulaInsertion", a) ||
                  e.globalListeners.fire("onAfterFormulaInsertion", a),
                {}
              );
            },
          },
          {
            key: "placeCaretAfterNode",
            value: function (e) {
              this.integrationModel.getSelection();
              var t = e.ownerDocument;
              if (void 0 !== t.getSelection && e.parentElement) {
                var n = t.createRange();
                n.setStartAfter(e), n.collapse(!0);
                var i = t.getSelection();
                i.removeAllRanges(), i.addRange(n), t.body.focus();
              }
            },
          },
          {
            key: "insertElementOnSelection",
            value: function (e, t, n) {
              if (this.editionProperties.isNewElement)
                if (e)
                  if ("textarea" === t.type) y.updateTextArea(t, e.textContent);
                  else if (document.selection && 0 === document.getSelection) {
                    var i = n.document.selection.createRange();
                    if (
                      (n.document.execCommand("InsertImage", !1, e.src),
                      "parentElement" in i ||
                        (n.document.execCommand("delete", !1),
                        (i = n.document.selection.createRange()),
                        n.document.execCommand("InsertImage", !1, e.src)),
                      "parentElement" in i)
                    ) {
                      var r = i.parentElement();
                      "IMG" === r.nodeName.toUpperCase()
                        ? r.parentNode.replaceChild(e, r)
                        : i.pasteHTML(y.createObjectCode(e));
                    }
                  } else {
                    var a = this.integrationModel.getSelection(),
                      o = null;
                    this.editionProperties.range
                      ? ((o = this.editionProperties.range),
                        (this.editionProperties.range = null))
                      : (o = a.getRangeAt(0)),
                      o.deleteContents();
                    var s = o.startContainer,
                      l = o.startOffset;
                    3 === s.nodeType
                      ? (s = s.splitText(l)).parentNode.insertBefore(e, s)
                      : 1 === s.nodeType && s.insertBefore(e, s.childNodes[l]),
                      this.placeCaretAfterNode(e);
                  }
                else if ("textarea" === t.type) t.focus();
                else {
                  var c = this.integrationModel.getSelection();
                  if ((c.removeAllRanges(), this.editionProperties.range)) {
                    var u = this.editionProperties.range;
                    (this.editionProperties.range = null), c.addRange(u);
                  }
                }
              else if (this.editionProperties.latexRange)
                document.selection && 0 === document.getSelection
                  ? ((this.editionProperties.isNewElement = !0),
                    this.editionProperties.latexRange.select(),
                    this.insertElementOnSelection(e, t, n))
                  : (this.editionProperties.latexRange.deleteContents(),
                    this.editionProperties.latexRange.insertNode(e),
                    this.placeCaretAfterNode(e));
              else if ("textarea" === t.type) {
                var d;
                (d =
                  void 0 !== this.integrationModel.getSelectedItem
                    ? this.integrationModel.getSelectedItem(t, !1)
                    : y.getSelectedItemOnTextarea(t)),
                  y.updateExistingTextOnTextarea(
                    t,
                    e.textContent,
                    d.startPosition,
                    d.endPosition
                  );
              } else
                e && "img" === e.nodeName.toLowerCase()
                  ? (x.removeImgDataAttributes(
                      this.editionProperties.temporalImage
                    ),
                    x.clone(e, this.editionProperties.temporalImage))
                  : this.editionProperties.temporalImage.remove(),
                  this.placeCaretAfterNode(
                    this.editionProperties.temporalImage
                  );
            },
          },
          {
            key: "openModalDialog",
            value: function (e, t) {
              var n,
                i = this;
              this.editMode = "images";
              try {
                if (t) {
                  e.contentWindow.focus();
                  var r = e.contentWindow.getSelection();
                  this.editionProperties.range = r.getRangeAt(0);
                } else {
                  e.focus();
                  var o = getSelection();
                  this.editionProperties.range = o.getRangeAt(0);
                }
              } catch (e) {
                this.editionProperties.range = null;
              }
              if (
                (void 0 === t && (t = !0),
                (this.editionProperties.latexRange = null),
                e)
              )
                if (
                  (n =
                    void 0 !== this.integrationModel.getSelectedItem
                      ? this.integrationModel.getSelectedItem(e, t)
                      : y.getSelectedItem(e, t))
                ) {
                  if (
                    !n.caretPosition &&
                    y.containsClass(n.node, s.get("imageClassName"))
                  )
                    (this.editionProperties.temporalImage = n.node),
                      (this.editionProperties.isNewElement = !1);
                  else if (3 === n.node.nodeType)
                    if (this.integrationModel.getMathmlFromTextNode) {
                      var l = this.integrationModel.getMathmlFromTextNode(
                        n.node,
                        n.caretPosition
                      );
                      l &&
                        ((this.editMode = "latex"),
                        (this.editionProperties.isNewElement = !1),
                        (this.editionProperties.temporalImage =
                          document.createElement("img")),
                        this.editionProperties.temporalImage.setAttribute(
                          s.get("imageMathmlAttribute"),
                          a.safeXmlEncode(l)
                        ));
                    } else {
                      var c = g.getLatexFromTextNode(n.node, n.caretPosition);
                      if (c) {
                        var u = g.getMathMLFromLatex(c.latex);
                        (this.editMode = "latex"),
                          (this.editionProperties.isNewElement = !1),
                          (this.editionProperties.temporalImage =
                            document.createElement("img")),
                          this.editionProperties.temporalImage.setAttribute(
                            s.get("imageMathmlAttribute"),
                            a.safeXmlEncode(u)
                          );
                        var m = t ? e.contentWindow : window;
                        if ("textarea" !== e.tagName.toLowerCase())
                          if (document.selection) {
                            for (
                              var h = 0, p = c.startNode.previousSibling;
                              p;

                            )
                              (h += y.getNodeLength(p)),
                                (p = p.previousSibling);
                            (this.editionProperties.latexRange =
                              m.document.selection.createRange()),
                              this.editionProperties.latexRange.moveToElementText(
                                c.startNode.parentNode
                              ),
                              this.editionProperties.latexRange.move(
                                "character",
                                h + c.startPosition
                              ),
                              this.editionProperties.latexRange.moveEnd(
                                "character",
                                c.latex.length + 4
                              );
                          } else
                            (this.editionProperties.latexRange =
                              m.document.createRange()),
                              this.editionProperties.latexRange.setStart(
                                c.startNode,
                                c.startPosition
                              ),
                              this.editionProperties.latexRange.setEnd(
                                c.endNode,
                                c.endPosition
                              );
                      }
                    }
                } else
                  "textarea" === e.tagName.toLowerCase() &&
                    (this.editMode = "latex");
              for (
                var f = s.get("editorAttributes").split(", "),
                  _ = {},
                  v = 0,
                  b = f.length;
                v < b;
                v += 1
              ) {
                var w = f[v].split("="),
                  x = w[0],
                  k = w[1];
                _[x] = k;
              }
              var A = {},
                C = s.get("editorParameters"),
                M = this.integrationModel.editorParameters;
              Object.assign(A, _, C),
                Object.assign(A, _, M),
                (A.language = this.language),
                (A.rtl = this.integrationModel.rtl);
              var T = {};
              if (
                ((T.editorAttributes = A),
                (T.language = this.language),
                (T.customEditors = this.customEditors),
                (T.environment = this.environment),
                null == this.modalDialog)
              ) {
                (this.modalDialog = new ue(A)),
                  (this.contentManager = new z(T));
                var E = d.newListener("onLoad", function () {
                  if (
                    ((i.contentManager.isNewElement =
                      i.editionProperties.isNewElement),
                    null != i.editionProperties.temporalImage)
                  ) {
                    var e = a.safeXmlDecode(
                      i.editionProperties.temporalImage.getAttribute(
                        s.get("imageMathmlAttribute")
                      )
                    );
                    i.contentManager.mathML = e;
                  }
                });
                this.contentManager.addListener(E),
                  this.contentManager.init(),
                  this.modalDialog.setContentManager(this.contentManager),
                  this.contentManager.setModalDialogInstance(this.modalDialog);
              } else if (
                ((this.contentManager.isNewElement =
                  this.editionProperties.isNewElement),
                null != this.editionProperties.temporalImage)
              ) {
                var j = a.safeXmlDecode(
                  this.editionProperties.temporalImage.getAttribute(
                    s.get("imageMathmlAttribute")
                  )
                );
                this.contentManager.mathML = j;
              }
              this.contentManager.setIntegrationModel(this.integrationModel),
                this.modalDialog.open();
            },
          },
          {
            key: "getCustomEditors",
            value: function () {
              return this.customEditors;
            },
          },
        ]),
        (i = [
          {
            key: "globalListeners",
            get: function () {
              return e._globalListeners;
            },
            set: function (t) {
              e._globalListeners = t;
            },
          },
          {
            key: "initialized",
            get: function () {
              return e._initialized;
            },
            set: function (t) {
              e._initialized = t;
            },
          },
          {
            key: "addGlobalListener",
            value: function (t) {
              e.globalListeners.add(t);
            },
          },
        ]),
        n && Me(t.prototype, n),
        i && Me(t, i),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    (Te._globalListeners = new d()), (Te._initialized = !1);
    function Ee(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    (window.wrs_addPluginListener = function (e) {
      var t, n;
      console.warn("Deprecated method"), (n = e[(t = Object.keys(e)[0])]);
      var i = d.newListener(t, n);
      Te.addGlobalListener(i);
    }),
      (window.wrs_initParse = function (e, t) {
        return (
          console.warn("Deprecated method. Use Parser.endParse instead."),
          j.initParse(e, t)
        );
      }),
      (window.wrs_endParse = function (e, t, n) {
        return (
          console.warn("Deprecated method. Use Parser.endParse instead."),
          j.endParse(e, t, n)
        );
      });
    var je = (function () {
      function e() {
        !(function (e, t) {
          if (!(e instanceof t))
            throw new TypeError("Cannot call a class as a function");
        })(this, e);
      }
      var t, n, i;
      return (
        (t = e),
        (i = [
          {
            key: "init",
            value: function () {
              e.testServices();
            },
          },
          {
            key: "testServices",
            value: function () {
              var e;
              console.log("Testing configuration service..."),
                console.log(h.getService("configurationjs", "", "get")),
                console.log("Testing showimage service..."),
                ((e = []).mml =
                  '<math xmlns="http://www.w3.org/1998/Math/MathML"><msup><mi>x</mi><mn>2</mn></msup></math>'),
                console.log(h.getService("showimage", e)),
                console.log("Testing createimage service..."),
                ((e = []).mml =
                  '<math xmlns="http://www.w3.org/1998/Math/MathML"><msup><mi>x</mi><mn>2</mn></msup></math>'),
                console.log(h.getService("createimage", e, "post")),
                console.log("Testing MathML2Latex service..."),
                ((e = []).service = "mathml2latex"),
                (e.mml =
                  '<math xmlns="http://www.w3.org/1998/Math/MathML"><msup><mi>x</mi><mn>2</mn></msup></math>'),
                console.log(h.getService("service", e)),
                console.log("Testing Latex2MathML service..."),
                ((e = []).service = "latex2mathml"),
                (e.latex = "x^2"),
                console.log(h.getService("service", e)),
                console.log("Testing Mathml2Accesible service..."),
                ((e = []).service = "mathml2accessible"),
                (e.mml =
                  '<math xmlns="http://www.w3.org/1998/Math/MathML"><msup><mi>x</mi><mn>2</mn></msup></math>'),
                console.log(h.getService("service", e));
            },
          },
        ]),
        (n = null) && Ee(t.prototype, n),
        i && Ee(t, i),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        e
      );
    })();
    const Oe = "8.0.0";
    function Se(e) {
      return (
        (Se =
          "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
            ? function (e) {
                return typeof e;
              }
            : function (e) {
                return e &&
                  "function" == typeof Symbol &&
                  e.constructor === Symbol &&
                  e !== Symbol.prototype
                  ? "symbol"
                  : typeof e;
              }),
        Se(e)
      );
    }
    function Pe(e, t) {
      for (var n = 0; n < t.length; n++) {
        var i = t[n];
        (i.enumerable = i.enumerable || !1),
          (i.configurable = !0),
          "value" in i && (i.writable = !0),
          Object.defineProperty(e, i.key, i);
      }
    }
    function Ie() {
      return (
        (Ie =
          "undefined" != typeof Reflect && Reflect.get
            ? Reflect.get.bind()
            : function (e, t, n) {
                var i = ze(e, t);
                if (i) {
                  var r = Object.getOwnPropertyDescriptor(i, t);
                  return r.get
                    ? r.get.call(arguments.length < 3 ? e : n)
                    : r.value;
                }
              }),
        Ie.apply(this, arguments)
      );
    }
    function ze(e, t) {
      for (
        ;
        !Object.prototype.hasOwnProperty.call(e, t) && null !== (e = Be(e));

      );
      return e;
    }
    function Le(e, t) {
      return (
        (Le = Object.setPrototypeOf
          ? Object.setPrototypeOf.bind()
          : function (e, t) {
              return (e.__proto__ = t), e;
            }),
        Le(e, t)
      );
    }
    function Ne(e) {
      var t = (function () {
        if ("undefined" == typeof Reflect || !Reflect.construct) return !1;
        if (Reflect.construct.sham) return !1;
        if ("function" == typeof Proxy) return !0;
        try {
          return (
            Boolean.prototype.valueOf.call(
              Reflect.construct(Boolean, [], function () {})
            ),
            !0
          );
        } catch (e) {
          return !1;
        }
      })();
      return function () {
        var n,
          i = Be(e);
        if (t) {
          var r = Be(this).constructor;
          n = Reflect.construct(i, arguments, r);
        } else n = i.apply(this, arguments);
        return De(this, n);
      };
    }
    function De(e, t) {
      if (t && ("object" === Se(t) || "function" == typeof t)) return t;
      if (void 0 !== t)
        throw new TypeError(
          "Derived constructors may only return object or undefined"
        );
      return (function (e) {
        if (void 0 === e)
          throw new ReferenceError(
            "this hasn't been initialised - super() hasn't been called"
          );
        return e;
      })(e);
    }
    function Be(e) {
      return (
        (Be = Object.setPrototypeOf
          ? Object.getPrototypeOf.bind()
          : function (e) {
              return e.__proto__ || Object.getPrototypeOf(e);
            }),
        Be(e)
      );
    }
    var Re = (function (e) {
      !(function (e, t) {
        if ("function" != typeof t && null !== t)
          throw new TypeError(
            "Super expression must either be null or a function"
          );
        (e.prototype = Object.create(t && t.prototype, {
          constructor: { value: e, writable: !0, configurable: !0 },
        })),
          Object.defineProperty(e, "prototype", { writable: !1 }),
          t && Le(e, t);
      })(a, e);
      var t,
        n,
        i,
        r = Ne(a);
      function a(e) {
        var t;
        return (
          (function (e, t) {
            if (!(e instanceof t))
              throw new TypeError("Cannot call a class as a function");
          })(this, a),
          ((t = r.call(this, e)).integrationFolderName = "ckeditor_wiris"),
          t
        );
      }
      return (
        (t = a),
        (n = [
          {
            key: "init",
            value: function () {
              Ie(Be(a.prototype), "init", this).call(this);
              var e = this.editorObject;
              "wiriseditorparameters" in e.config &&
                s.update("editorParameters", e.config.wiriseditorparameters),
                s.get("editorEnabled") ||
                  (document.getElementsByClassName(
                    "cke_button__ckeditor_wiris_formulaeditor"
                  )[0].style.display = "none"),
                s.get("chemEnabled") ||
                  (document.getElementsByClassName(
                    "cke_button__ckeditor_wiris_formulaeditorchemistry"
                  )[0].style.display = "none");
            },
          },
          {
            key: "getLanguage",
            value: function () {
              try {
                return this.editorParameters.language;
              } catch (e) {
                console.error();
              }
              return null != this.editorObject.langCode
                ? this.editorObject.langCode
                : Ie(Be(a.prototype), "getLanguage", this).call(this);
            },
          },
          {
            key: "getPath",
            value: function () {
              return this.editorObject.plugins.ckeditor_wiris.path;
            },
          },
          {
            key: "addEditorListeners",
            value: function () {
              var e = this,
                t = this.editorObject;
              void 0 !== t.config.wirislistenersdisabled &&
              t.config.wirislistenersdisabled
                ? (t.on("instanceReady", function (t) {
                    e.checkElement();
                  }),
                  t.resetDirty())
                : (t.setData(j.initParse(t.getData())),
                  t.on("focus", function (e) {
                    WirisPlugin.currentInstance =
                      WirisPlugin.instances[e.editor.name];
                  }),
                  t.on("contentDom", function () {
                    t.on("doubleclick", function (e) {
                      (("img" === e.data.element.$.nodeName.toLowerCase() &&
                        y.containsClass(
                          e.data.element.$,
                          s.get("imageClassName")
                        )) ||
                        y.containsClass(
                          e.data.element.$,
                          s.get("CASClassName")
                        )) &&
                        (e.data.dialog = null);
                    }),
                      e.addEvents();
                  }),
                  t.on("setData", function (e) {
                    e.data.dataValue = j.initParse(e.data.dataValue || "");
                  }),
                  t.on("afterSetData", function (e) {
                    void 0 !== j.observer &&
                      Array.prototype.forEach.call(
                        document.getElementsByClassName("Wirisformula"),
                        function (e) {
                          j.observer.observe(e);
                        }
                      );
                  }),
                  t.on("getData", function (e) {
                    e.data.dataValue = j.endParse(e.data.dataValue || "");
                  }),
                  t.on("mode", function (t) {
                    e.checkElement();
                  }),
                  this.checkElement());
            },
          },
          {
            key: "checkElement",
            value: function () {
              var e,
                t = this.editorObject,
                n = document.getElementById("cke_contents_".concat(t.name))
                  ? document.getElementById("cke_contents_".concat(t.name))
                  : document.getElementById("cke_".concat(t.name)),
                i = !1;
              if (
                !(e =
                  t.elementMode === CKEDITOR.ELEMENT_MODE_INLINE
                    ? t.container.$
                    : n.getElementsByTagName("iframe")[0])
              ) {
                var r;
                for (var a in n.classList) {
                  var o = n.classList[a];
                  if (-1 !== o.search("cke_\\d")) {
                    r = o;
                    break;
                  }
                }
                r &&
                  ((i = !0),
                  ((e = document.getElementById(
                    "".concat(r, "_contents")
                  )).wirisActive = !1));
              }
              if (!e.wirisActive)
                if (t.elementMode === CKEDITOR.ELEMENT_MODE_INLINE) {
                  if ("TEXTAREA" === e.tagName) {
                    var s = document.getElementsByClassName(
                      "cke_textarea_inline"
                    );
                    Array.prototype.forEach.call(s, function (e) {
                      this.setTarget(e), this.addEvents();
                    });
                  } else this.setTarget(e), this.addEvents();
                  e.wirisActive = !0;
                } else
                  (e.contentWindow || i) &&
                    (this.setTarget(e), this.addEvents(), (e.wirisActive = !0));
            },
          },
          {
            key: "doubleClickHandler",
            value: function (e, t) {
              if (
                "img" === e.nodeName.toLowerCase() &&
                y.containsClass(e, s.get("imageClassName"))
              ) {
                void 0 !== t.stopPropagation
                  ? t.stopPropagation()
                  : (t.returnValue = !1),
                  this.core.getCustomEditors().disable();
                var n = e.getAttribute(s.get("imageCustomEditorName"));
                n && this.core.getCustomEditors().enable(n),
                  (this.core.editionProperties.temporalImage = e),
                  this.openExistingFormulaEditor();
              }
            },
          },
          {
            key: "insertFormula",
            value: function (e, t, n, i) {
              var r = Ie(Be(a.prototype), "insertFormula", this).call(
                this,
                e,
                t,
                n,
                i
              );
              return this.editorObject.fire("change"), r;
            },
          },
          {
            key: "getCorePath",
            value: function () {
              return CKEDITOR.plugins.getPath(this.integrationFolderName);
            },
          },
          {
            key: "getSelection",
            value: function () {
              return (
                this.editorObject.editable().$.focus(),
                this.editorObject.getSelection().getNative()
              );
            },
          },
          {
            key: "callbackFunction",
            value: function () {
              Ie(Be(a.prototype), "callbackFunction", this).call(this),
                this.addEditorListeners();
            },
          },
        ]) && Pe(t.prototype, n),
        i && Pe(t, i),
        Object.defineProperty(t, "prototype", { writable: !1 }),
        a
      );
    })(H);
    CKEDITOR.plugins.add("ckeditor_wiris", {
      init: function (e) {
        e.ui.addButton("ckeditor_wiris_formulaEditor", {
          label: "Insert a math equation - MathType",
          command: "ckeditor_wiris_openFormulaEditor",
          icon: "".concat(
            CKEDITOR.plugins.getPath("ckeditor_wiris"),
            "./icons/formula.png"
          ),
        }),
          e.ui.addButton("ckeditor_wiris_formulaEditorChemistry", {
            label: "Insert a chemistry formula - ChemType",
            command: "ckeditor_wiris_openFormulaEditorChemistry",
            icon: "".concat(
              CKEDITOR.plugins.getPath("ckeditor_wiris"),
              "./icons/chem.png"
            ),
          });
        var t = "img[align,";
        (t += s.get("imageMathmlAttribute")),
          (t += ",src,alt](!Wirisformula)"),
          e.addCommand("ckeditor_wiris_openFormulaEditor", {
            async: !1,
            canUndo: !0,
            editorFocus: !0,
            allowedContent: t,
            requiredContent: t,
            exec: function (e) {
              var t = WirisPlugin.instances[e.name];
              t.core.getCustomEditors().disable(), t.openNewFormulaEditor();
            },
          }),
          e.addCommand("ckeditor_wiris_openFormulaEditorChemistry", {
            async: !1,
            canUndo: !0,
            editorFocus: !0,
            allowedContent: t,
            requiredContent: t,
            exec: function (e) {
              var t = WirisPlugin.instances[e.name];
              t.core.getCustomEditors().enable("chemistry"),
                t.openNewFormulaEditor();
            },
          }),
          e.on("instanceReady", function () {
            var t = {};
            (t.editorObject = e),
              (t.target = e.container.$.querySelector("*[class^=cke_wysiwyg]")),
              (t.serviceProviderProperties = {
                URI: "integration",
                server: "php",
              }),
              (t.version = Oe),
              (t.scriptName = "plugin.js"),
              (t.environment = {}),
              (t.environment.editor = "CKEditor4"),
              (t.environment.editorVersion = "4.x"),
              "wiriscontextpath" in e.config &&
                ((t.configurationService =
                  e.config.wiriscontextpath + t.configurationService),
                console.warn(
                  "Deprecated property wiriscontextpath. Use mathTypeParameters on instead.",
                  e.config.wiriscontextpath
                )),
              "mathTypeParameters" in e.config &&
                (t.integrationParameters = e.config.mathTypeParameters);
            var n = new Re(t);
            n.init(),
              n.listeners.fire("onTargetReady", {}),
              (WirisPlugin.instances[e.name] = n),
              (WirisPlugin.currentInstance = n);
          });
      },
    }),
      (window.WirisPlugin = {
        Core: Te,
        Parser: j,
        Image: x,
        Util: y,
        Configuration: s,
        Listeners: d,
        IntegrationModel: H,
        currentInstance: null,
        instances: {},
        CKEditor4Integration: Re,
        Latex: g,
        Test: je,
      });
  })();
})();
