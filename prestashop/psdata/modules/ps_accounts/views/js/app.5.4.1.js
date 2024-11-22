function Er(e, t) {
  const n = /* @__PURE__ */ Object.create(null), r = e.split(",");
  for (let l = 0; l < r.length; l++)
    n[r[l]] = !0;
  return t ? (l) => !!n[l.toLowerCase()] : (l) => !!n[l];
}
function Lr(e) {
  if (j(e)) {
    const t = {};
    for (let n = 0; n < e.length; n++) {
      const r = e[n], l = ge(r) ? ya(r) : Lr(r);
      if (l)
        for (const s in l)
          t[s] = l[s];
    }
    return t;
  } else {
    if (ge(e))
      return e;
    if (le(e))
      return e;
  }
}
const La = /;(?![^(]*\))/g, Ta = /:([^]+)/, Ia = /\/\*.*?\*\//gs;
function ya(e) {
  const t = {};
  return e.replace(Ia, "").split(La).forEach((n) => {
    if (n) {
      const r = n.split(Ta);
      r.length > 1 && (t[r[0].trim()] = r[1].trim());
    }
  }), t;
}
function Tr(e) {
  let t = "";
  if (ge(e))
    t = e;
  else if (j(e))
    for (let n = 0; n < e.length; n++) {
      const r = Tr(e[n]);
      r && (t += r + " ");
    }
  else if (le(e))
    for (const n in e)
      e[n] && (t += n + " ");
  return t.trim();
}
const Ca = "itemscope,allowfullscreen,formnovalidate,ismap,nomodule,novalidate,readonly", Na = /* @__PURE__ */ Er(Ca);
function el(e) {
  return !!e || e === "";
}
const va = (e) => ge(e) ? e : e == null ? "" : j(e) || le(e) && (e.toString === sl || !B(e.toString)) ? JSON.stringify(e, tl, 2) : String(e), tl = (e, t) => t && t.__v_isRef ? tl(e, t.value) : wt(t) ? {
  [`Map(${t.size})`]: [...t.entries()].reduce((n, [r, l]) => (n[`${r} =>`] = l, n), {})
} : nl(t) ? {
  [`Set(${t.size})`]: [...t.values()]
} : le(t) && !j(t) && !ll(t) ? String(t) : t, se = {}, Mt = [], Ve = () => {
}, Oa = () => !1, Aa = /^on[^a-z]/, Cn = (e) => Aa.test(e), Ir = (e) => e.startsWith("onUpdate:"), Ee = Object.assign, yr = (e, t) => {
  const n = e.indexOf(t);
  n > -1 && e.splice(n, 1);
}, Fa = Object.prototype.hasOwnProperty, q = (e, t) => Fa.call(e, t), j = Array.isArray, wt = (e) => Nn(e) === "[object Map]", nl = (e) => Nn(e) === "[object Set]", B = (e) => typeof e == "function", ge = (e) => typeof e == "string", Cr = (e) => typeof e == "symbol", le = (e) => e !== null && typeof e == "object", rl = (e) => le(e) && B(e.then) && B(e.catch), sl = Object.prototype.toString, Nn = (e) => sl.call(e), Pa = (e) => Nn(e).slice(8, -1), ll = (e) => Nn(e) === "[object Object]", Nr = (e) => ge(e) && e !== "NaN" && e[0] !== "-" && "" + parseInt(e, 10) === e, pn = /* @__PURE__ */ Er(
  ",key,ref,ref_for,ref_key,onVnodeBeforeMount,onVnodeMounted,onVnodeBeforeUpdate,onVnodeUpdated,onVnodeBeforeUnmount,onVnodeUnmounted"
), vn = (e) => {
  const t = /* @__PURE__ */ Object.create(null);
  return (n) => t[n] || (t[n] = e(n));
}, ka = /-(\w)/g, et = vn((e) => e.replace(ka, (t, n) => n ? n.toUpperCase() : "")), Ra = /\B([A-Z])/g, Vt = vn((e) => e.replace(Ra, "-$1").toLowerCase()), On = vn((e) => e.charAt(0).toUpperCase() + e.slice(1)), $n = vn((e) => e ? `on${On(e)}` : ""), en = (e, t) => !Object.is(e, t), Hn = (e, t) => {
  for (let n = 0; n < e.length; n++)
    e[n](t);
}, Ln = (e, t, n) => {
  Object.defineProperty(e, t, {
    configurable: !0,
    enumerable: !1,
    value: n
  });
}, Sa = (e) => {
  const t = parseFloat(e);
  return isNaN(t) ? e : t;
};
let Qr;
const Ma = () => Qr || (Qr = typeof globalThis < "u" ? globalThis : typeof self < "u" ? self : typeof window < "u" ? window : typeof global < "u" ? global : {});
let Ue;
class al {
  constructor(t = !1) {
    this.detached = t, this._active = !0, this.effects = [], this.cleanups = [], this.parent = Ue, !t && Ue && (this.index = (Ue.scopes || (Ue.scopes = [])).push(this) - 1);
  }
  get active() {
    return this._active;
  }
  run(t) {
    if (this._active) {
      const n = Ue;
      try {
        return Ue = this, t();
      } finally {
        Ue = n;
      }
    }
  }
  on() {
    Ue = this;
  }
  off() {
    Ue = this.parent;
  }
  stop(t) {
    if (this._active) {
      let n, r;
      for (n = 0, r = this.effects.length; n < r; n++)
        this.effects[n].stop();
      for (n = 0, r = this.cleanups.length; n < r; n++)
        this.cleanups[n]();
      if (this.scopes)
        for (n = 0, r = this.scopes.length; n < r; n++)
          this.scopes[n].stop(!0);
      if (!this.detached && this.parent && !t) {
        const l = this.parent.scopes.pop();
        l && l !== this && (this.parent.scopes[this.index] = l, l.index = this.index);
      }
      this.parent = void 0, this._active = !1;
    }
  }
}
function wa(e) {
  return new al(e);
}
function xa(e, t = Ue) {
  t && t.active && t.effects.push(e);
}
function Da() {
  return Ue;
}
const vr = (e) => {
  const t = new Set(e);
  return t.w = 0, t.n = 0, t;
}, il = (e) => (e.w & gt) > 0, ol = (e) => (e.n & gt) > 0, Ua = ({ deps: e }) => {
  if (e.length)
    for (let t = 0; t < e.length; t++)
      e[t].w |= gt;
}, Wa = (e) => {
  const { deps: t } = e;
  if (t.length) {
    let n = 0;
    for (let r = 0; r < t.length; r++) {
      const l = t[r];
      il(l) && !ol(l) ? l.delete(e) : t[n++] = l, l.w &= ~gt, l.n &= ~gt;
    }
    t.length = n;
  }
}, Jn = /* @__PURE__ */ new WeakMap();
let Gt = 0, gt = 1;
const qn = 30;
let $e;
const At = Symbol(""), Qn = Symbol("");
class Or {
  constructor(t, n = null, r) {
    this.fn = t, this.scheduler = n, this.active = !0, this.deps = [], this.parent = void 0, xa(this, r);
  }
  run() {
    if (!this.active)
      return this.fn();
    let t = $e, n = mt;
    for (; t; ) {
      if (t === this)
        return;
      t = t.parent;
    }
    try {
      return this.parent = $e, $e = this, mt = !0, gt = 1 << ++Gt, Gt <= qn ? Ua(this) : Zr(this), this.fn();
    } finally {
      Gt <= qn && Wa(this), gt = 1 << --Gt, $e = this.parent, mt = n, this.parent = void 0, this.deferStop && this.stop();
    }
  }
  stop() {
    $e === this ? this.deferStop = !0 : this.active && (Zr(this), this.onStop && this.onStop(), this.active = !1);
  }
}
function Zr(e) {
  const { deps: t } = e;
  if (t.length) {
    for (let n = 0; n < t.length; n++)
      t[n].delete(e);
    t.length = 0;
  }
}
let mt = !0;
const cl = [];
function Bt() {
  cl.push(mt), mt = !1;
}
function Kt() {
  const e = cl.pop();
  mt = e === void 0 ? !0 : e;
}
function Ae(e, t, n) {
  if (mt && $e) {
    let r = Jn.get(e);
    r || Jn.set(e, r = /* @__PURE__ */ new Map());
    let l = r.get(n);
    l || r.set(n, l = vr()), ul(l);
  }
}
function ul(e, t) {
  let n = !1;
  Gt <= qn ? ol(e) || (e.n |= gt, n = !il(e)) : n = !e.has($e), n && (e.add($e), $e.deps.push(e));
}
function at(e, t, n, r, l, s) {
  const a = Jn.get(e);
  if (!a)
    return;
  let c = [];
  if (t === "clear")
    c = [...a.values()];
  else if (n === "length" && j(e)) {
    const u = Number(r);
    a.forEach((d, _) => {
      (_ === "length" || _ >= u) && c.push(d);
    });
  } else
    switch (n !== void 0 && c.push(a.get(n)), t) {
      case "add":
        j(e) ? Nr(n) && c.push(a.get("length")) : (c.push(a.get(At)), wt(e) && c.push(a.get(Qn)));
        break;
      case "delete":
        j(e) || (c.push(a.get(At)), wt(e) && c.push(a.get(Qn)));
        break;
      case "set":
        wt(e) && c.push(a.get(At));
        break;
    }
  if (c.length === 1)
    c[0] && Zn(c[0]);
  else {
    const u = [];
    for (const d of c)
      d && u.push(...d);
    Zn(vr(u));
  }
}
function Zn(e, t) {
  const n = j(e) ? e : [...e];
  for (const r of n)
    r.computed && zr(r);
  for (const r of n)
    r.computed || zr(r);
}
function zr(e, t) {
  (e !== $e || e.allowRecurse) && (e.scheduler ? e.scheduler() : e.run());
}
const $a = /* @__PURE__ */ Er("__proto__,__v_isRef,__isVue"), fl = new Set(
  /* @__PURE__ */ Object.getOwnPropertyNames(Symbol).filter((e) => e !== "arguments" && e !== "caller").map((e) => Symbol[e]).filter(Cr)
), Ha = /* @__PURE__ */ Ar(), ja = /* @__PURE__ */ Ar(!1, !0), Va = /* @__PURE__ */ Ar(!0), es = /* @__PURE__ */ Ba();
function Ba() {
  const e = {};
  return ["includes", "indexOf", "lastIndexOf"].forEach((t) => {
    e[t] = function(...n) {
      const r = Z(this);
      for (let s = 0, a = this.length; s < a; s++)
        Ae(r, "get", s + "");
      const l = r[t](...n);
      return l === -1 || l === !1 ? r[t](...n.map(Z)) : l;
    };
  }), ["push", "pop", "shift", "unshift", "splice"].forEach((t) => {
    e[t] = function(...n) {
      Bt();
      const r = Z(this)[t].apply(this, n);
      return Kt(), r;
    };
  }), e;
}
function Ka(e) {
  const t = Z(this);
  return Ae(t, "has", e), t.hasOwnProperty(e);
}
function Ar(e = !1, t = !1) {
  return function(r, l, s) {
    if (l === "__v_isReactive")
      return !e;
    if (l === "__v_isReadonly")
      return e;
    if (l === "__v_isShallow")
      return t;
    if (l === "__v_raw" && s === (e ? t ? ii : hl : t ? gl : _l).get(r))
      return r;
    const a = j(r);
    if (!e) {
      if (a && q(es, l))
        return Reflect.get(es, l, s);
      if (l === "hasOwnProperty")
        return Ka;
    }
    const c = Reflect.get(r, l, s);
    return (Cr(l) ? fl.has(l) : $a(l)) || (e || Ae(r, "get", l), t) ? c : he(c) ? a && Nr(l) ? c : c.value : le(c) ? e ? pl(c) : kr(c) : c;
  };
}
const Ya = /* @__PURE__ */ dl(), Xa = /* @__PURE__ */ dl(!0);
function dl(e = !1) {
  return function(n, r, l, s) {
    let a = n[r];
    if (Wt(a) && he(a) && !he(l))
      return !1;
    if (!e && (!Tn(l) && !Wt(l) && (a = Z(a), l = Z(l)), !j(n) && he(a) && !he(l)))
      return a.value = l, !0;
    const c = j(n) && Nr(r) ? Number(r) < n.length : q(n, r), u = Reflect.set(n, r, l, s);
    return n === Z(s) && (c ? en(l, a) && at(n, "set", r, l) : at(n, "add", r, l)), u;
  };
}
function Ga(e, t) {
  const n = q(e, t);
  e[t];
  const r = Reflect.deleteProperty(e, t);
  return r && n && at(e, "delete", t, void 0), r;
}
function Ja(e, t) {
  const n = Reflect.has(e, t);
  return (!Cr(t) || !fl.has(t)) && Ae(e, "has", t), n;
}
function qa(e) {
  return Ae(e, "iterate", j(e) ? "length" : At), Reflect.ownKeys(e);
}
const ml = {
  get: Ha,
  set: Ya,
  deleteProperty: Ga,
  has: Ja,
  ownKeys: qa
}, Qa = {
  get: Va,
  set(e, t) {
    return !0;
  },
  deleteProperty(e, t) {
    return !0;
  }
}, Za = /* @__PURE__ */ Ee({}, ml, {
  get: ja,
  set: Xa
}), Fr = (e) => e, An = (e) => Reflect.getPrototypeOf(e);
function un(e, t, n = !1, r = !1) {
  e = e.__v_raw;
  const l = Z(e), s = Z(t);
  n || (t !== s && Ae(l, "get", t), Ae(l, "get", s));
  const { has: a } = An(l), c = r ? Fr : n ? Sr : tn;
  if (a.call(l, t))
    return c(e.get(t));
  if (a.call(l, s))
    return c(e.get(s));
  e !== l && e.get(t);
}
function fn(e, t = !1) {
  const n = this.__v_raw, r = Z(n), l = Z(e);
  return t || (e !== l && Ae(r, "has", e), Ae(r, "has", l)), e === l ? n.has(e) : n.has(e) || n.has(l);
}
function dn(e, t = !1) {
  return e = e.__v_raw, !t && Ae(Z(e), "iterate", At), Reflect.get(e, "size", e);
}
function ts(e) {
  e = Z(e);
  const t = Z(this);
  return An(t).has.call(t, e) || (t.add(e), at(t, "add", e, e)), this;
}
function ns(e, t) {
  t = Z(t);
  const n = Z(this), { has: r, get: l } = An(n);
  let s = r.call(n, e);
  s || (e = Z(e), s = r.call(n, e));
  const a = l.call(n, e);
  return n.set(e, t), s ? en(t, a) && at(n, "set", e, t) : at(n, "add", e, t), this;
}
function rs(e) {
  const t = Z(this), { has: n, get: r } = An(t);
  let l = n.call(t, e);
  l || (e = Z(e), l = n.call(t, e)), r && r.call(t, e);
  const s = t.delete(e);
  return l && at(t, "delete", e, void 0), s;
}
function ss() {
  const e = Z(this), t = e.size !== 0, n = e.clear();
  return t && at(e, "clear", void 0, void 0), n;
}
function mn(e, t) {
  return function(r, l) {
    const s = this, a = s.__v_raw, c = Z(a), u = t ? Fr : e ? Sr : tn;
    return !e && Ae(c, "iterate", At), a.forEach((d, _) => r.call(l, u(d), u(_), s));
  };
}
function _n(e, t, n) {
  return function(...r) {
    const l = this.__v_raw, s = Z(l), a = wt(s), c = e === "entries" || e === Symbol.iterator && a, u = e === "keys" && a, d = l[e](...r), _ = n ? Fr : t ? Sr : tn;
    return !t && Ae(s, "iterate", u ? Qn : At), {
      next() {
        const { value: E, done: b } = d.next();
        return b ? { value: E, done: b } : {
          value: c ? [_(E[0]), _(E[1])] : _(E),
          done: b
        };
      },
      [Symbol.iterator]() {
        return this;
      }
    };
  };
}
function ut(e) {
  return function(...t) {
    return e === "delete" ? !1 : this;
  };
}
function za() {
  const e = {
    get(s) {
      return un(this, s);
    },
    get size() {
      return dn(this);
    },
    has: fn,
    add: ts,
    set: ns,
    delete: rs,
    clear: ss,
    forEach: mn(!1, !1)
  }, t = {
    get(s) {
      return un(this, s, !1, !0);
    },
    get size() {
      return dn(this);
    },
    has: fn,
    add: ts,
    set: ns,
    delete: rs,
    clear: ss,
    forEach: mn(!1, !0)
  }, n = {
    get(s) {
      return un(this, s, !0);
    },
    get size() {
      return dn(this, !0);
    },
    has(s) {
      return fn.call(this, s, !0);
    },
    add: ut("add"),
    set: ut("set"),
    delete: ut("delete"),
    clear: ut("clear"),
    forEach: mn(!0, !1)
  }, r = {
    get(s) {
      return un(this, s, !0, !0);
    },
    get size() {
      return dn(this, !0);
    },
    has(s) {
      return fn.call(this, s, !0);
    },
    add: ut("add"),
    set: ut("set"),
    delete: ut("delete"),
    clear: ut("clear"),
    forEach: mn(!0, !0)
  };
  return ["keys", "values", "entries", Symbol.iterator].forEach((s) => {
    e[s] = _n(s, !1, !1), n[s] = _n(s, !0, !1), t[s] = _n(s, !1, !0), r[s] = _n(s, !0, !0);
  }), [
    e,
    n,
    t,
    r
  ];
}
const [ei, ti, ni, ri] = /* @__PURE__ */ za();
function Pr(e, t) {
  const n = t ? e ? ri : ni : e ? ti : ei;
  return (r, l, s) => l === "__v_isReactive" ? !e : l === "__v_isReadonly" ? e : l === "__v_raw" ? r : Reflect.get(q(n, l) && l in r ? n : r, l, s);
}
const si = {
  get: /* @__PURE__ */ Pr(!1, !1)
}, li = {
  get: /* @__PURE__ */ Pr(!1, !0)
}, ai = {
  get: /* @__PURE__ */ Pr(!0, !1)
}, _l = /* @__PURE__ */ new WeakMap(), gl = /* @__PURE__ */ new WeakMap(), hl = /* @__PURE__ */ new WeakMap(), ii = /* @__PURE__ */ new WeakMap();
function oi(e) {
  switch (e) {
    case "Object":
    case "Array":
      return 1;
    case "Map":
    case "Set":
    case "WeakMap":
    case "WeakSet":
      return 2;
    default:
      return 0;
  }
}
function ci(e) {
  return e.__v_skip || !Object.isExtensible(e) ? 0 : oi(Pa(e));
}
function kr(e) {
  return Wt(e) ? e : Rr(e, !1, ml, si, _l);
}
function ui(e) {
  return Rr(e, !1, Za, li, gl);
}
function pl(e) {
  return Rr(e, !0, Qa, ai, hl);
}
function Rr(e, t, n, r, l) {
  if (!le(e) || e.__v_raw && !(t && e.__v_isReactive))
    return e;
  const s = l.get(e);
  if (s)
    return s;
  const a = ci(e);
  if (a === 0)
    return e;
  const c = new Proxy(e, a === 2 ? r : n);
  return l.set(e, c), c;
}
function xt(e) {
  return Wt(e) ? xt(e.__v_raw) : !!(e && e.__v_isReactive);
}
function Wt(e) {
  return !!(e && e.__v_isReadonly);
}
function Tn(e) {
  return !!(e && e.__v_isShallow);
}
function bl(e) {
  return xt(e) || Wt(e);
}
function Z(e) {
  const t = e && e.__v_raw;
  return t ? Z(t) : e;
}
function El(e) {
  return Ln(e, "__v_skip", !0), e;
}
const tn = (e) => le(e) ? kr(e) : e, Sr = (e) => le(e) ? pl(e) : e;
function Ll(e) {
  mt && $e && (e = Z(e), ul(e.dep || (e.dep = vr())));
}
function Tl(e, t) {
  e = Z(e);
  const n = e.dep;
  n && Zn(n);
}
function he(e) {
  return !!(e && e.__v_isRef === !0);
}
function Ze(e) {
  return Il(e, !1);
}
function fi(e) {
  return Il(e, !0);
}
function Il(e, t) {
  return he(e) ? e : new di(e, t);
}
class di {
  constructor(t, n) {
    this.__v_isShallow = n, this.dep = void 0, this.__v_isRef = !0, this._rawValue = n ? t : Z(t), this._value = n ? t : tn(t);
  }
  get value() {
    return Ll(this), this._value;
  }
  set value(t) {
    const n = this.__v_isShallow || Tn(t) || Wt(t);
    t = n ? t : Z(t), en(t, this._rawValue) && (this._rawValue = t, this._value = n ? t : tn(t), Tl(this));
  }
}
function mi(e) {
  return he(e) ? e.value : e;
}
const _i = {
  get: (e, t, n) => mi(Reflect.get(e, t, n)),
  set: (e, t, n, r) => {
    const l = e[t];
    return he(l) && !he(n) ? (l.value = n, !0) : Reflect.set(e, t, n, r);
  }
};
function yl(e) {
  return xt(e) ? e : new Proxy(e, _i);
}
var Cl;
class gi {
  constructor(t, n, r, l) {
    this._setter = n, this.dep = void 0, this.__v_isRef = !0, this[Cl] = !1, this._dirty = !0, this.effect = new Or(t, () => {
      this._dirty || (this._dirty = !0, Tl(this));
    }), this.effect.computed = this, this.effect.active = this._cacheable = !l, this.__v_isReadonly = r;
  }
  get value() {
    const t = Z(this);
    return Ll(t), (t._dirty || !t._cacheable) && (t._dirty = !1, t._value = t.effect.run()), t._value;
  }
  set value(t) {
    this._setter(t);
  }
}
Cl = "__v_isReadonly";
function hi(e, t, n = !1) {
  let r, l;
  const s = B(e);
  return s ? (r = e, l = Ve) : (r = e.get, l = e.set), new gi(r, l, s || !l, n);
}
function _t(e, t, n, r) {
  let l;
  try {
    l = r ? e(...r) : e();
  } catch (s) {
    Fn(s, t, n);
  }
  return l;
}
function xe(e, t, n, r) {
  if (B(e)) {
    const s = _t(e, t, n, r);
    return s && rl(s) && s.catch((a) => {
      Fn(a, t, n);
    }), s;
  }
  const l = [];
  for (let s = 0; s < e.length; s++)
    l.push(xe(e[s], t, n, r));
  return l;
}
function Fn(e, t, n, r = !0) {
  const l = t ? t.vnode : null;
  if (t) {
    let s = t.parent;
    const a = t.proxy, c = n;
    for (; s; ) {
      const d = s.ec;
      if (d) {
        for (let _ = 0; _ < d.length; _++)
          if (d[_](e, a, c) === !1)
            return;
      }
      s = s.parent;
    }
    const u = t.appContext.config.errorHandler;
    if (u) {
      _t(u, null, 10, [e, a, c]);
      return;
    }
  }
  pi(e, n, l, r);
}
function pi(e, t, n, r = !0) {
  console.error(e);
}
let nn = !1, zn = !1;
const be = [];
let ze = 0;
const Dt = [];
let nt = null, Nt = 0;
const Nl = /* @__PURE__ */ Promise.resolve();
let Mr = null;
function bi(e) {
  const t = Mr || Nl;
  return e ? t.then(this ? e.bind(this) : e) : t;
}
function Ei(e) {
  let t = ze + 1, n = be.length;
  for (; t < n; ) {
    const r = t + n >>> 1;
    rn(be[r]) < e ? t = r + 1 : n = r;
  }
  return t;
}
function wr(e) {
  (!be.length || !be.includes(e, nn && e.allowRecurse ? ze + 1 : ze)) && (e.id == null ? be.push(e) : be.splice(Ei(e.id), 0, e), vl());
}
function vl() {
  !nn && !zn && (zn = !0, Mr = Nl.then(Al));
}
function Li(e) {
  const t = be.indexOf(e);
  t > ze && be.splice(t, 1);
}
function Ti(e) {
  j(e) ? Dt.push(...e) : (!nt || !nt.includes(e, e.allowRecurse ? Nt + 1 : Nt)) && Dt.push(e), vl();
}
function ls(e, t = nn ? ze + 1 : 0) {
  for (; t < be.length; t++) {
    const n = be[t];
    n && n.pre && (be.splice(t, 1), t--, n());
  }
}
function Ol(e) {
  if (Dt.length) {
    const t = [...new Set(Dt)];
    if (Dt.length = 0, nt) {
      nt.push(...t);
      return;
    }
    for (nt = t, nt.sort((n, r) => rn(n) - rn(r)), Nt = 0; Nt < nt.length; Nt++)
      nt[Nt]();
    nt = null, Nt = 0;
  }
}
const rn = (e) => e.id == null ? 1 / 0 : e.id, Ii = (e, t) => {
  const n = rn(e) - rn(t);
  if (n === 0) {
    if (e.pre && !t.pre)
      return -1;
    if (t.pre && !e.pre)
      return 1;
  }
  return n;
};
function Al(e) {
  zn = !1, nn = !0, be.sort(Ii);
  const t = Ve;
  try {
    for (ze = 0; ze < be.length; ze++) {
      const n = be[ze];
      n && n.active !== !1 && _t(n, null, 14);
    }
  } finally {
    ze = 0, be.length = 0, Ol(), nn = !1, Mr = null, (be.length || Dt.length) && Al();
  }
}
function yi(e, t, ...n) {
  if (e.isUnmounted)
    return;
  const r = e.vnode.props || se;
  let l = n;
  const s = t.startsWith("update:"), a = s && t.slice(7);
  if (a && a in r) {
    const _ = `${a === "modelValue" ? "model" : a}Modifiers`, { number: E, trim: b } = r[_] || se;
    b && (l = n.map((v) => ge(v) ? v.trim() : v)), E && (l = n.map(Sa));
  }
  let c, u = r[c = $n(t)] || r[c = $n(et(t))];
  !u && s && (u = r[c = $n(Vt(t))]), u && xe(u, e, 6, l);
  const d = r[c + "Once"];
  if (d) {
    if (!e.emitted)
      e.emitted = {};
    else if (e.emitted[c])
      return;
    e.emitted[c] = !0, xe(d, e, 6, l);
  }
}
function Fl(e, t, n = !1) {
  const r = t.emitsCache, l = r.get(e);
  if (l !== void 0)
    return l;
  const s = e.emits;
  let a = {}, c = !1;
  if (!B(e)) {
    const u = (d) => {
      const _ = Fl(d, t, !0);
      _ && (c = !0, Ee(a, _));
    };
    !n && t.mixins.length && t.mixins.forEach(u), e.extends && u(e.extends), e.mixins && e.mixins.forEach(u);
  }
  return !s && !c ? (le(e) && r.set(e, null), null) : (j(s) ? s.forEach((u) => a[u] = null) : Ee(a, s), le(e) && r.set(e, a), a);
}
function Pn(e, t) {
  return !e || !Cn(t) ? !1 : (t = t.slice(2).replace(/Once$/, ""), q(e, t[0].toLowerCase() + t.slice(1)) || q(e, Vt(t)) || q(e, t));
}
let we = null, kn = null;
function In(e) {
  const t = we;
  return we = e, kn = e && e.type.__scopeId || null, t;
}
function Ci(e) {
  kn = e;
}
function Ni() {
  kn = null;
}
function vi(e, t = we, n) {
  if (!t || e._n)
    return e;
  const r = (...l) => {
    r._d && gs(-1);
    const s = In(t);
    let a;
    try {
      a = e(...l);
    } finally {
      In(s), r._d && gs(1);
    }
    return a;
  };
  return r._n = !0, r._c = !0, r._d = !0, r;
}
function jn(e) {
  const { type: t, vnode: n, proxy: r, withProxy: l, props: s, propsOptions: [a], slots: c, attrs: u, emit: d, render: _, renderCache: E, data: b, setupState: v, ctx: R, inheritAttrs: A } = e;
  let S, h;
  const O = In(e);
  try {
    if (n.shapeFlag & 4) {
      const T = l || r;
      S = qe(_.call(T, T, E, s, v, b, R)), h = u;
    } else {
      const T = t;
      S = qe(T.length > 1 ? T(s, { attrs: u, slots: c, emit: d }) : T(s, null)), h = t.props ? u : Oi(u);
    }
  } catch (T) {
    Qt.length = 0, Fn(T, e, 1), S = Oe(st);
  }
  let C = S;
  if (h && A !== !1) {
    const T = Object.keys(h), { shapeFlag: y } = C;
    T.length && y & 7 && (a && T.some(Ir) && (h = Ai(h, a)), C = ht(C, h));
  }
  return n.dirs && (C = ht(C), C.dirs = C.dirs ? C.dirs.concat(n.dirs) : n.dirs), n.transition && (C.transition = n.transition), S = C, In(O), S;
}
const Oi = (e) => {
  let t;
  for (const n in e)
    (n === "class" || n === "style" || Cn(n)) && ((t || (t = {}))[n] = e[n]);
  return t;
}, Ai = (e, t) => {
  const n = {};
  for (const r in e)
    (!Ir(r) || !(r.slice(9) in t)) && (n[r] = e[r]);
  return n;
};
function Fi(e, t, n) {
  const { props: r, children: l, component: s } = e, { props: a, children: c, patchFlag: u } = t, d = s.emitsOptions;
  if (t.dirs || t.transition)
    return !0;
  if (n && u >= 0) {
    if (u & 1024)
      return !0;
    if (u & 16)
      return r ? as(r, a, d) : !!a;
    if (u & 8) {
      const _ = t.dynamicProps;
      for (let E = 0; E < _.length; E++) {
        const b = _[E];
        if (a[b] !== r[b] && !Pn(d, b))
          return !0;
      }
    }
  } else
    return (l || c) && (!c || !c.$stable) ? !0 : r === a ? !1 : r ? a ? as(r, a, d) : !0 : !!a;
  return !1;
}
function as(e, t, n) {
  const r = Object.keys(t);
  if (r.length !== Object.keys(e).length)
    return !0;
  for (let l = 0; l < r.length; l++) {
    const s = r[l];
    if (t[s] !== e[s] && !Pn(n, s))
      return !0;
  }
  return !1;
}
function Pi({ vnode: e, parent: t }, n) {
  for (; t && t.subTree === e; )
    (e = t.vnode).el = n, t = t.parent;
}
const ki = (e) => e.__isSuspense;
function Ri(e, t) {
  t && t.pendingBranch ? j(e) ? t.effects.push(...e) : t.effects.push(e) : Ti(e);
}
function Si(e, t) {
  if (ue) {
    let n = ue.provides;
    const r = ue.parent && ue.parent.provides;
    r === n && (n = ue.provides = Object.create(r)), n[e] = t;
  }
}
function Jt(e, t, n = !1) {
  const r = ue || we;
  if (r) {
    const l = r.parent == null ? r.vnode.appContext && r.vnode.appContext.provides : r.parent.provides;
    if (l && e in l)
      return l[e];
    if (arguments.length > 1)
      return n && B(t) ? t.call(r.proxy) : t;
  }
}
const gn = {};
function Ut(e, t, n) {
  return Pl(e, t, n);
}
function Pl(e, t, { immediate: n, deep: r, flush: l, onTrack: s, onTrigger: a } = se) {
  const c = Da() === (ue == null ? void 0 : ue.scope) ? ue : null;
  let u, d = !1, _ = !1;
  if (he(e) ? (u = () => e.value, d = Tn(e)) : xt(e) ? (u = () => e, r = !0) : j(e) ? (_ = !0, d = e.some((C) => xt(C) || Tn(C)), u = () => e.map((C) => {
    if (he(C))
      return C.value;
    if (xt(C))
      return kt(C);
    if (B(C))
      return _t(C, c, 2);
  })) : B(e) ? t ? u = () => _t(e, c, 2) : u = () => {
    if (!(c && c.isUnmounted))
      return E && E(), xe(e, c, 3, [b]);
  } : u = Ve, t && r) {
    const C = u;
    u = () => kt(C());
  }
  let E, b = (C) => {
    E = h.onStop = () => {
      _t(C, c, 4);
    };
  }, v;
  if (ln)
    if (b = Ve, t ? n && xe(t, c, 3, [
      u(),
      _ ? [] : void 0,
      b
    ]) : u(), l === "sync") {
      const C = ko();
      v = C.__watcherHandles || (C.__watcherHandles = []);
    } else
      return Ve;
  let R = _ ? new Array(e.length).fill(gn) : gn;
  const A = () => {
    if (!!h.active)
      if (t) {
        const C = h.run();
        (r || d || (_ ? C.some((T, y) => en(T, R[y])) : en(C, R))) && (E && E(), xe(t, c, 3, [
          C,
          R === gn ? void 0 : _ && R[0] === gn ? [] : R,
          b
        ]), R = C);
      } else
        h.run();
  };
  A.allowRecurse = !!t;
  let S;
  l === "sync" ? S = A : l === "post" ? S = () => ve(A, c && c.suspense) : (A.pre = !0, c && (A.id = c.uid), S = () => wr(A));
  const h = new Or(u, S);
  t ? n ? A() : R = h.run() : l === "post" ? ve(h.run.bind(h), c && c.suspense) : h.run();
  const O = () => {
    h.stop(), c && c.scope && yr(c.scope.effects, h);
  };
  return v && v.push(O), O;
}
function Mi(e, t, n) {
  const r = this.proxy, l = ge(e) ? e.includes(".") ? kl(r, e) : () => r[e] : e.bind(r, r);
  let s;
  B(t) ? s = t : (s = t.handler, n = t);
  const a = ue;
  Ht(this);
  const c = Pl(l, s.bind(r), n);
  return a ? Ht(a) : Ft(), c;
}
function kl(e, t) {
  const n = t.split(".");
  return () => {
    let r = e;
    for (let l = 0; l < n.length && r; l++)
      r = r[n[l]];
    return r;
  };
}
function kt(e, t) {
  if (!le(e) || e.__v_skip || (t = t || /* @__PURE__ */ new Set(), t.has(e)))
    return e;
  if (t.add(e), he(e))
    kt(e.value, t);
  else if (j(e))
    for (let n = 0; n < e.length; n++)
      kt(e[n], t);
  else if (nl(e) || wt(e))
    e.forEach((n) => {
      kt(n, t);
    });
  else if (ll(e))
    for (const n in e)
      kt(e[n], t);
  return e;
}
function wi() {
  const e = {
    isMounted: !1,
    isLeaving: !1,
    isUnmounting: !1,
    leavingVNodes: /* @__PURE__ */ new Map()
  };
  return Mn(() => {
    e.isMounted = !0;
  }), xl(() => {
    e.isUnmounting = !0;
  }), e;
}
const Me = [Function, Array], xi = {
  name: "BaseTransition",
  props: {
    mode: String,
    appear: Boolean,
    persisted: Boolean,
    onBeforeEnter: Me,
    onEnter: Me,
    onAfterEnter: Me,
    onEnterCancelled: Me,
    onBeforeLeave: Me,
    onLeave: Me,
    onAfterLeave: Me,
    onLeaveCancelled: Me,
    onBeforeAppear: Me,
    onAppear: Me,
    onAfterAppear: Me,
    onAppearCancelled: Me
  },
  setup(e, { slots: t }) {
    const n = $t(), r = wi();
    let l;
    return () => {
      const s = t.default && Sl(t.default(), !0);
      if (!s || !s.length)
        return;
      let a = s[0];
      if (s.length > 1) {
        for (const A of s)
          if (A.type !== st) {
            a = A;
            break;
          }
      }
      const c = Z(e), { mode: u } = c;
      if (r.isLeaving)
        return Vn(a);
      const d = is(a);
      if (!d)
        return Vn(a);
      const _ = er(d, c, r, n);
      tr(d, _);
      const E = n.subTree, b = E && is(E);
      let v = !1;
      const { getTransitionKey: R } = d.type;
      if (R) {
        const A = R();
        l === void 0 ? l = A : A !== l && (l = A, v = !0);
      }
      if (b && b.type !== st && (!vt(d, b) || v)) {
        const A = er(b, c, r, n);
        if (tr(b, A), u === "out-in")
          return r.isLeaving = !0, A.afterLeave = () => {
            r.isLeaving = !1, n.update.active !== !1 && n.update();
          }, Vn(a);
        u === "in-out" && d.type !== st && (A.delayLeave = (S, h, O) => {
          const C = Rl(r, b);
          C[String(b.key)] = b, S._leaveCb = () => {
            h(), S._leaveCb = void 0, delete _.delayedLeave;
          }, _.delayedLeave = O;
        });
      }
      return a;
    };
  }
}, Di = xi;
function Rl(e, t) {
  const { leavingVNodes: n } = e;
  let r = n.get(t.type);
  return r || (r = /* @__PURE__ */ Object.create(null), n.set(t.type, r)), r;
}
function er(e, t, n, r) {
  const { appear: l, mode: s, persisted: a = !1, onBeforeEnter: c, onEnter: u, onAfterEnter: d, onEnterCancelled: _, onBeforeLeave: E, onLeave: b, onAfterLeave: v, onLeaveCancelled: R, onBeforeAppear: A, onAppear: S, onAfterAppear: h, onAppearCancelled: O } = t, C = String(e.key), T = Rl(n, e), y = (W, $) => {
    W && xe(W, r, 9, $);
  }, w = (W, $) => {
    const K = $[1];
    y(W, $), j(W) ? W.every((ee) => ee.length <= 1) && K() : W.length <= 1 && K();
  }, x = {
    mode: s,
    persisted: a,
    beforeEnter(W) {
      let $ = c;
      if (!n.isMounted)
        if (l)
          $ = A || c;
        else
          return;
      W._leaveCb && W._leaveCb(!0);
      const K = T[C];
      K && vt(e, K) && K.el._leaveCb && K.el._leaveCb(), y($, [W]);
    },
    enter(W) {
      let $ = u, K = d, ee = _;
      if (!n.isMounted)
        if (l)
          $ = S || u, K = h || d, ee = O || _;
        else
          return;
      let oe = !1;
      const ae = W._enterCb = (ke) => {
        oe || (oe = !0, ke ? y(ee, [W]) : y(K, [W]), x.delayedLeave && x.delayedLeave(), W._enterCb = void 0);
      };
      $ ? w($, [W, ae]) : ae();
    },
    leave(W, $) {
      const K = String(e.key);
      if (W._enterCb && W._enterCb(!0), n.isUnmounting)
        return $();
      y(E, [W]);
      let ee = !1;
      const oe = W._leaveCb = (ae) => {
        ee || (ee = !0, $(), ae ? y(R, [W]) : y(v, [W]), W._leaveCb = void 0, T[K] === e && delete T[K]);
      };
      T[K] = e, b ? w(b, [W, oe]) : oe();
    },
    clone(W) {
      return er(W, t, n, r);
    }
  };
  return x;
}
function Vn(e) {
  if (Rn(e))
    return e = ht(e), e.children = null, e;
}
function is(e) {
  return Rn(e) ? e.children ? e.children[0] : void 0 : e;
}
function tr(e, t) {
  e.shapeFlag & 6 && e.component ? tr(e.component.subTree, t) : e.shapeFlag & 128 ? (e.ssContent.transition = t.clone(e.ssContent), e.ssFallback.transition = t.clone(e.ssFallback)) : e.transition = t;
}
function Sl(e, t = !1, n) {
  let r = [], l = 0;
  for (let s = 0; s < e.length; s++) {
    let a = e[s];
    const c = n == null ? a.key : String(n) + String(a.key != null ? a.key : s);
    a.type === We ? (a.patchFlag & 128 && l++, r = r.concat(Sl(a.children, t, c))) : (t || a.type !== st) && r.push(c != null ? ht(a, { key: c }) : a);
  }
  if (l > 1)
    for (let s = 0; s < r.length; s++)
      r[s].patchFlag = -2;
  return r;
}
function Ui(e) {
  return B(e) ? { setup: e, name: e.name } : e;
}
const bn = (e) => !!e.type.__asyncLoader, Rn = (e) => e.type.__isKeepAlive;
function Wi(e, t) {
  Ml(e, "a", t);
}
function $i(e, t) {
  Ml(e, "da", t);
}
function Ml(e, t, n = ue) {
  const r = e.__wdc || (e.__wdc = () => {
    let l = n;
    for (; l; ) {
      if (l.isDeactivated)
        return;
      l = l.parent;
    }
    return e();
  });
  if (Sn(t, r, n), n) {
    let l = n.parent;
    for (; l && l.parent; )
      Rn(l.parent.vnode) && Hi(r, t, n, l), l = l.parent;
  }
}
function Hi(e, t, n, r) {
  const l = Sn(t, e, r, !0);
  xr(() => {
    yr(r[t], l);
  }, n);
}
function Sn(e, t, n = ue, r = !1) {
  if (n) {
    const l = n[e] || (n[e] = []), s = t.__weh || (t.__weh = (...a) => {
      if (n.isUnmounted)
        return;
      Bt(), Ht(n);
      const c = xe(t, n, e, a);
      return Ft(), Kt(), c;
    });
    return r ? l.unshift(s) : l.push(s), s;
  }
}
const it = (e) => (t, n = ue) => (!ln || e === "sp") && Sn(e, (...r) => t(...r), n), wl = it("bm"), Mn = it("m"), ji = it("bu"), Vi = it("u"), xl = it("bum"), xr = it("um"), Bi = it("sp"), Ki = it("rtg"), Yi = it("rtc");
function Xi(e, t = ue) {
  Sn("ec", e, t);
}
function It(e, t, n, r) {
  const l = e.dirs, s = t && t.dirs;
  for (let a = 0; a < l.length; a++) {
    const c = l[a];
    s && (c.oldValue = s[a].value);
    let u = c.dir[r];
    u && (Bt(), xe(u, n, 8, [
      e.el,
      c,
      e,
      t
    ]), Kt());
  }
}
const Dl = "components";
function Gi(e, t) {
  return qi(Dl, e, !0, t) || e;
}
const Ji = Symbol();
function qi(e, t, n = !0, r = !1) {
  const l = we || ue;
  if (l) {
    const s = l.type;
    if (e === Dl) {
      const c = Ao(s, !1);
      if (c && (c === t || c === et(t) || c === On(et(t))))
        return s;
    }
    const a = os(l[e] || s[e], t) || os(l.appContext[e], t);
    return !a && r ? s : a;
  }
}
function os(e, t) {
  return e && (e[t] || e[et(t)] || e[On(et(t))]);
}
const nr = (e) => e ? Jl(e) ? $r(e) || e.proxy : nr(e.parent) : null, qt = /* @__PURE__ */ Ee(/* @__PURE__ */ Object.create(null), {
  $: (e) => e,
  $el: (e) => e.vnode.el,
  $data: (e) => e.data,
  $props: (e) => e.props,
  $attrs: (e) => e.attrs,
  $slots: (e) => e.slots,
  $refs: (e) => e.refs,
  $parent: (e) => nr(e.parent),
  $root: (e) => nr(e.root),
  $emit: (e) => e.emit,
  $options: (e) => Dr(e),
  $forceUpdate: (e) => e.f || (e.f = () => wr(e.update)),
  $nextTick: (e) => e.n || (e.n = bi.bind(e.proxy)),
  $watch: (e) => Mi.bind(e)
}), Bn = (e, t) => e !== se && !e.__isScriptSetup && q(e, t), Qi = {
  get({ _: e }, t) {
    const { ctx: n, setupState: r, data: l, props: s, accessCache: a, type: c, appContext: u } = e;
    let d;
    if (t[0] !== "$") {
      const v = a[t];
      if (v !== void 0)
        switch (v) {
          case 1:
            return r[t];
          case 2:
            return l[t];
          case 4:
            return n[t];
          case 3:
            return s[t];
        }
      else {
        if (Bn(r, t))
          return a[t] = 1, r[t];
        if (l !== se && q(l, t))
          return a[t] = 2, l[t];
        if ((d = e.propsOptions[0]) && q(d, t))
          return a[t] = 3, s[t];
        if (n !== se && q(n, t))
          return a[t] = 4, n[t];
        rr && (a[t] = 0);
      }
    }
    const _ = qt[t];
    let E, b;
    if (_)
      return t === "$attrs" && Ae(e, "get", t), _(e);
    if ((E = c.__cssModules) && (E = E[t]))
      return E;
    if (n !== se && q(n, t))
      return a[t] = 4, n[t];
    if (b = u.config.globalProperties, q(b, t))
      return b[t];
  },
  set({ _: e }, t, n) {
    const { data: r, setupState: l, ctx: s } = e;
    return Bn(l, t) ? (l[t] = n, !0) : r !== se && q(r, t) ? (r[t] = n, !0) : q(e.props, t) || t[0] === "$" && t.slice(1) in e ? !1 : (s[t] = n, !0);
  },
  has({ _: { data: e, setupState: t, accessCache: n, ctx: r, appContext: l, propsOptions: s } }, a) {
    let c;
    return !!n[a] || e !== se && q(e, a) || Bn(t, a) || (c = s[0]) && q(c, a) || q(r, a) || q(qt, a) || q(l.config.globalProperties, a);
  },
  defineProperty(e, t, n) {
    return n.get != null ? e._.accessCache[t] = 0 : q(n, "value") && this.set(e, t, n.value, null), Reflect.defineProperty(e, t, n);
  }
};
let rr = !0;
function Zi(e) {
  const t = Dr(e), n = e.proxy, r = e.ctx;
  rr = !1, t.beforeCreate && cs(t.beforeCreate, e, "bc");
  const {
    data: l,
    computed: s,
    methods: a,
    watch: c,
    provide: u,
    inject: d,
    created: _,
    beforeMount: E,
    mounted: b,
    beforeUpdate: v,
    updated: R,
    activated: A,
    deactivated: S,
    beforeDestroy: h,
    beforeUnmount: O,
    destroyed: C,
    unmounted: T,
    render: y,
    renderTracked: w,
    renderTriggered: x,
    errorCaptured: W,
    serverPrefetch: $,
    expose: K,
    inheritAttrs: ee,
    components: oe,
    directives: ae,
    filters: ke
  } = t;
  if (d && zi(d, r, null, e.appContext.config.unwrapInjectedRef), a)
    for (const G in a) {
      const J = a[G];
      B(J) && (r[G] = J.bind(n));
    }
  if (l) {
    const G = l.call(n, n);
    le(G) && (e.data = kr(G));
  }
  if (rr = !0, s)
    for (const G in s) {
      const J = s[G], ye = B(J) ? J.bind(n, n) : B(J.get) ? J.get.bind(n, n) : Ve, Be = !B(J) && B(J.set) ? J.set.bind(n) : Ve, Fe = He({
        get: ye,
        set: Be
      });
      Object.defineProperty(r, G, {
        enumerable: !0,
        configurable: !0,
        get: () => Fe.value,
        set: (pe) => Fe.value = pe
      });
    }
  if (c)
    for (const G in c)
      Ul(c[G], r, n, G);
  if (u) {
    const G = B(u) ? u.call(n) : u;
    Reflect.ownKeys(G).forEach((J) => {
      Si(J, G[J]);
    });
  }
  _ && cs(_, e, "c");
  function te(G, J) {
    j(J) ? J.forEach((ye) => G(ye.bind(n))) : J && G(J.bind(n));
  }
  if (te(wl, E), te(Mn, b), te(ji, v), te(Vi, R), te(Wi, A), te($i, S), te(Xi, W), te(Yi, w), te(Ki, x), te(xl, O), te(xr, T), te(Bi, $), j(K))
    if (K.length) {
      const G = e.exposed || (e.exposed = {});
      K.forEach((J) => {
        Object.defineProperty(G, J, {
          get: () => n[J],
          set: (ye) => n[J] = ye
        });
      });
    } else
      e.exposed || (e.exposed = {});
  y && e.render === Ve && (e.render = y), ee != null && (e.inheritAttrs = ee), oe && (e.components = oe), ae && (e.directives = ae);
}
function zi(e, t, n = Ve, r = !1) {
  j(e) && (e = sr(e));
  for (const l in e) {
    const s = e[l];
    let a;
    le(s) ? "default" in s ? a = Jt(s.from || l, s.default, !0) : a = Jt(s.from || l) : a = Jt(s), he(a) && r ? Object.defineProperty(t, l, {
      enumerable: !0,
      configurable: !0,
      get: () => a.value,
      set: (c) => a.value = c
    }) : t[l] = a;
  }
}
function cs(e, t, n) {
  xe(j(e) ? e.map((r) => r.bind(t.proxy)) : e.bind(t.proxy), t, n);
}
function Ul(e, t, n, r) {
  const l = r.includes(".") ? kl(n, r) : () => n[r];
  if (ge(e)) {
    const s = t[e];
    B(s) && Ut(l, s);
  } else if (B(e))
    Ut(l, e.bind(n));
  else if (le(e))
    if (j(e))
      e.forEach((s) => Ul(s, t, n, r));
    else {
      const s = B(e.handler) ? e.handler.bind(n) : t[e.handler];
      B(s) && Ut(l, s, e);
    }
}
function Dr(e) {
  const t = e.type, { mixins: n, extends: r } = t, { mixins: l, optionsCache: s, config: { optionMergeStrategies: a } } = e.appContext, c = s.get(t);
  let u;
  return c ? u = c : !l.length && !n && !r ? u = t : (u = {}, l.length && l.forEach((d) => yn(u, d, a, !0)), yn(u, t, a)), le(t) && s.set(t, u), u;
}
function yn(e, t, n, r = !1) {
  const { mixins: l, extends: s } = t;
  s && yn(e, s, n, !0), l && l.forEach((a) => yn(e, a, n, !0));
  for (const a in t)
    if (!(r && a === "expose")) {
      const c = eo[a] || n && n[a];
      e[a] = c ? c(e[a], t[a]) : t[a];
    }
  return e;
}
const eo = {
  data: us,
  props: Ct,
  emits: Ct,
  methods: Ct,
  computed: Ct,
  beforeCreate: Te,
  created: Te,
  beforeMount: Te,
  mounted: Te,
  beforeUpdate: Te,
  updated: Te,
  beforeDestroy: Te,
  beforeUnmount: Te,
  destroyed: Te,
  unmounted: Te,
  activated: Te,
  deactivated: Te,
  errorCaptured: Te,
  serverPrefetch: Te,
  components: Ct,
  directives: Ct,
  watch: no,
  provide: us,
  inject: to
};
function us(e, t) {
  return t ? e ? function() {
    return Ee(B(e) ? e.call(this, this) : e, B(t) ? t.call(this, this) : t);
  } : t : e;
}
function to(e, t) {
  return Ct(sr(e), sr(t));
}
function sr(e) {
  if (j(e)) {
    const t = {};
    for (let n = 0; n < e.length; n++)
      t[e[n]] = e[n];
    return t;
  }
  return e;
}
function Te(e, t) {
  return e ? [...new Set([].concat(e, t))] : t;
}
function Ct(e, t) {
  return e ? Ee(Ee(/* @__PURE__ */ Object.create(null), e), t) : t;
}
function no(e, t) {
  if (!e)
    return t;
  if (!t)
    return e;
  const n = Ee(/* @__PURE__ */ Object.create(null), e);
  for (const r in t)
    n[r] = Te(e[r], t[r]);
  return n;
}
function ro(e, t, n, r = !1) {
  const l = {}, s = {};
  Ln(s, wn, 1), e.propsDefaults = /* @__PURE__ */ Object.create(null), Wl(e, t, l, s);
  for (const a in e.propsOptions[0])
    a in l || (l[a] = void 0);
  n ? e.props = r ? l : ui(l) : e.type.props ? e.props = l : e.props = s, e.attrs = s;
}
function so(e, t, n, r) {
  const { props: l, attrs: s, vnode: { patchFlag: a } } = e, c = Z(l), [u] = e.propsOptions;
  let d = !1;
  if ((r || a > 0) && !(a & 16)) {
    if (a & 8) {
      const _ = e.vnode.dynamicProps;
      for (let E = 0; E < _.length; E++) {
        let b = _[E];
        if (Pn(e.emitsOptions, b))
          continue;
        const v = t[b];
        if (u)
          if (q(s, b))
            v !== s[b] && (s[b] = v, d = !0);
          else {
            const R = et(b);
            l[R] = lr(u, c, R, v, e, !1);
          }
        else
          v !== s[b] && (s[b] = v, d = !0);
      }
    }
  } else {
    Wl(e, t, l, s) && (d = !0);
    let _;
    for (const E in c)
      (!t || !q(t, E) && ((_ = Vt(E)) === E || !q(t, _))) && (u ? n && (n[E] !== void 0 || n[_] !== void 0) && (l[E] = lr(u, c, E, void 0, e, !0)) : delete l[E]);
    if (s !== c)
      for (const E in s)
        (!t || !q(t, E) && !0) && (delete s[E], d = !0);
  }
  d && at(e, "set", "$attrs");
}
function Wl(e, t, n, r) {
  const [l, s] = e.propsOptions;
  let a = !1, c;
  if (t)
    for (let u in t) {
      if (pn(u))
        continue;
      const d = t[u];
      let _;
      l && q(l, _ = et(u)) ? !s || !s.includes(_) ? n[_] = d : (c || (c = {}))[_] = d : Pn(e.emitsOptions, u) || (!(u in r) || d !== r[u]) && (r[u] = d, a = !0);
    }
  if (s) {
    const u = Z(n), d = c || se;
    for (let _ = 0; _ < s.length; _++) {
      const E = s[_];
      n[E] = lr(l, u, E, d[E], e, !q(d, E));
    }
  }
  return a;
}
function lr(e, t, n, r, l, s) {
  const a = e[n];
  if (a != null) {
    const c = q(a, "default");
    if (c && r === void 0) {
      const u = a.default;
      if (a.type !== Function && B(u)) {
        const { propsDefaults: d } = l;
        n in d ? r = d[n] : (Ht(l), r = d[n] = u.call(null, t), Ft());
      } else
        r = u;
    }
    a[0] && (s && !c ? r = !1 : a[1] && (r === "" || r === Vt(n)) && (r = !0));
  }
  return r;
}
function $l(e, t, n = !1) {
  const r = t.propsCache, l = r.get(e);
  if (l)
    return l;
  const s = e.props, a = {}, c = [];
  let u = !1;
  if (!B(e)) {
    const _ = (E) => {
      u = !0;
      const [b, v] = $l(E, t, !0);
      Ee(a, b), v && c.push(...v);
    };
    !n && t.mixins.length && t.mixins.forEach(_), e.extends && _(e.extends), e.mixins && e.mixins.forEach(_);
  }
  if (!s && !u)
    return le(e) && r.set(e, Mt), Mt;
  if (j(s))
    for (let _ = 0; _ < s.length; _++) {
      const E = et(s[_]);
      fs(E) && (a[E] = se);
    }
  else if (s)
    for (const _ in s) {
      const E = et(_);
      if (fs(E)) {
        const b = s[_], v = a[E] = j(b) || B(b) ? { type: b } : Object.assign({}, b);
        if (v) {
          const R = _s(Boolean, v.type), A = _s(String, v.type);
          v[0] = R > -1, v[1] = A < 0 || R < A, (R > -1 || q(v, "default")) && c.push(E);
        }
      }
    }
  const d = [a, c];
  return le(e) && r.set(e, d), d;
}
function fs(e) {
  return e[0] !== "$";
}
function ds(e) {
  const t = e && e.toString().match(/^\s*(function|class) (\w+)/);
  return t ? t[2] : e === null ? "null" : "";
}
function ms(e, t) {
  return ds(e) === ds(t);
}
function _s(e, t) {
  return j(t) ? t.findIndex((n) => ms(n, e)) : B(t) && ms(t, e) ? 0 : -1;
}
const Hl = (e) => e[0] === "_" || e === "$stable", Ur = (e) => j(e) ? e.map(qe) : [qe(e)], lo = (e, t, n) => {
  if (t._n)
    return t;
  const r = vi((...l) => Ur(t(...l)), n);
  return r._c = !1, r;
}, jl = (e, t, n) => {
  const r = e._ctx;
  for (const l in e) {
    if (Hl(l))
      continue;
    const s = e[l];
    if (B(s))
      t[l] = lo(l, s, r);
    else if (s != null) {
      const a = Ur(s);
      t[l] = () => a;
    }
  }
}, Vl = (e, t) => {
  const n = Ur(t);
  e.slots.default = () => n;
}, ao = (e, t) => {
  if (e.vnode.shapeFlag & 32) {
    const n = t._;
    n ? (e.slots = Z(t), Ln(t, "_", n)) : jl(t, e.slots = {});
  } else
    e.slots = {}, t && Vl(e, t);
  Ln(e.slots, wn, 1);
}, io = (e, t, n) => {
  const { vnode: r, slots: l } = e;
  let s = !0, a = se;
  if (r.shapeFlag & 32) {
    const c = t._;
    c ? n && c === 1 ? s = !1 : (Ee(l, t), !n && c === 1 && delete l._) : (s = !t.$stable, jl(t, l)), a = t;
  } else
    t && (Vl(e, t), a = { default: 1 });
  if (s)
    for (const c in l)
      !Hl(c) && !(c in a) && delete l[c];
};
function Bl() {
  return {
    app: null,
    config: {
      isNativeTag: Oa,
      performance: !1,
      globalProperties: {},
      optionMergeStrategies: {},
      errorHandler: void 0,
      warnHandler: void 0,
      compilerOptions: {}
    },
    mixins: [],
    components: {},
    directives: {},
    provides: /* @__PURE__ */ Object.create(null),
    optionsCache: /* @__PURE__ */ new WeakMap(),
    propsCache: /* @__PURE__ */ new WeakMap(),
    emitsCache: /* @__PURE__ */ new WeakMap()
  };
}
let oo = 0;
function co(e, t) {
  return function(r, l = null) {
    B(r) || (r = Object.assign({}, r)), l != null && !le(l) && (l = null);
    const s = Bl(), a = /* @__PURE__ */ new Set();
    let c = !1;
    const u = s.app = {
      _uid: oo++,
      _component: r,
      _props: l,
      _container: null,
      _context: s,
      _instance: null,
      version: Ro,
      get config() {
        return s.config;
      },
      set config(d) {
      },
      use(d, ..._) {
        return a.has(d) || (d && B(d.install) ? (a.add(d), d.install(u, ..._)) : B(d) && (a.add(d), d(u, ..._))), u;
      },
      mixin(d) {
        return s.mixins.includes(d) || s.mixins.push(d), u;
      },
      component(d, _) {
        return _ ? (s.components[d] = _, u) : s.components[d];
      },
      directive(d, _) {
        return _ ? (s.directives[d] = _, u) : s.directives[d];
      },
      mount(d, _, E) {
        if (!c) {
          const b = Oe(r, l);
          return b.appContext = s, _ && t ? t(b, d) : e(b, d, E), c = !0, u._container = d, d.__vue_app__ = u, $r(b.component) || b.component.proxy;
        }
      },
      unmount() {
        c && (e(null, u._container), delete u._container.__vue_app__);
      },
      provide(d, _) {
        return s.provides[d] = _, u;
      }
    };
    return u;
  };
}
function ar(e, t, n, r, l = !1) {
  if (j(e)) {
    e.forEach((b, v) => ar(b, t && (j(t) ? t[v] : t), n, r, l));
    return;
  }
  if (bn(r) && !l)
    return;
  const s = r.shapeFlag & 4 ? $r(r.component) || r.component.proxy : r.el, a = l ? null : s, { i: c, r: u } = e, d = t && t.r, _ = c.refs === se ? c.refs = {} : c.refs, E = c.setupState;
  if (d != null && d !== u && (ge(d) ? (_[d] = null, q(E, d) && (E[d] = null)) : he(d) && (d.value = null)), B(u))
    _t(u, c, 12, [a, _]);
  else {
    const b = ge(u), v = he(u);
    if (b || v) {
      const R = () => {
        if (e.f) {
          const A = b ? q(E, u) ? E[u] : _[u] : u.value;
          l ? j(A) && yr(A, s) : j(A) ? A.includes(s) || A.push(s) : b ? (_[u] = [s], q(E, u) && (E[u] = _[u])) : (u.value = [s], e.k && (_[e.k] = u.value));
        } else
          b ? (_[u] = a, q(E, u) && (E[u] = a)) : v && (u.value = a, e.k && (_[e.k] = a));
      };
      a ? (R.id = -1, ve(R, n)) : R();
    }
  }
}
const ve = Ri;
function uo(e) {
  return fo(e);
}
function fo(e, t) {
  const n = Ma();
  n.__VUE__ = !0;
  const { insert: r, remove: l, patchProp: s, createElement: a, createText: c, createComment: u, setText: d, setElementText: _, parentNode: E, nextSibling: b, setScopeId: v = Ve, insertStaticContent: R } = e, A = (m, i, o, f = null, g = null, I = null, F = !1, P = null, k = !!i.dynamicChildren) => {
    if (m === i)
      return;
    m && !vt(m, i) && (f = Ke(m), pe(m, g, I, !0), m = null), i.patchFlag === -2 && (k = !1, i.dynamicChildren = null);
    const { type: N, ref: p, shapeFlag: L } = i;
    switch (N) {
      case on:
        S(m, i, o, f);
        break;
      case st:
        h(m, i, o, f);
        break;
      case Kn:
        m == null && O(i, o, f, F);
        break;
      case We:
        oe(m, i, o, f, g, I, F, P, k);
        break;
      default:
        L & 1 ? y(m, i, o, f, g, I, F, P, k) : L & 6 ? ae(m, i, o, f, g, I, F, P, k) : (L & 64 || L & 128) && N.process(m, i, o, f, g, I, F, P, k, Ce);
    }
    p != null && g && ar(p, m && m.ref, I, i || m, !i);
  }, S = (m, i, o, f) => {
    if (m == null)
      r(i.el = c(i.children), o, f);
    else {
      const g = i.el = m.el;
      i.children !== m.children && d(g, i.children);
    }
  }, h = (m, i, o, f) => {
    m == null ? r(i.el = u(i.children || ""), o, f) : i.el = m.el;
  }, O = (m, i, o, f) => {
    [m.el, m.anchor] = R(m.children, i, o, f, m.el, m.anchor);
  }, C = ({ el: m, anchor: i }, o, f) => {
    let g;
    for (; m && m !== i; )
      g = b(m), r(m, o, f), m = g;
    r(i, o, f);
  }, T = ({ el: m, anchor: i }) => {
    let o;
    for (; m && m !== i; )
      o = b(m), l(m), m = o;
    l(i);
  }, y = (m, i, o, f, g, I, F, P, k) => {
    F = F || i.type === "svg", m == null ? w(i, o, f, g, I, F, P, k) : $(m, i, g, I, F, P, k);
  }, w = (m, i, o, f, g, I, F, P) => {
    let k, N;
    const { type: p, props: L, shapeFlag: D, transition: U, dirs: V } = m;
    if (k = m.el = a(m.type, I, L && L.is, L), D & 8 ? _(k, m.children) : D & 16 && W(m.children, k, null, f, g, I && p !== "foreignObject", F, P), V && It(m, null, f, "created"), x(k, m, m.scopeId, F, f), L) {
      for (const Y in L)
        Y !== "value" && !pn(Y) && s(k, Y, null, L[Y], I, m.children, f, g, Le);
      "value" in L && s(k, "value", null, L.value), (N = L.onVnodeBeforeMount) && Ge(N, f, m);
    }
    V && It(m, null, f, "beforeMount");
    const z = (!g || g && !g.pendingBranch) && U && !U.persisted;
    z && U.beforeEnter(k), r(k, i, o), ((N = L && L.onVnodeMounted) || z || V) && ve(() => {
      N && Ge(N, f, m), z && U.enter(k), V && It(m, null, f, "mounted");
    }, g);
  }, x = (m, i, o, f, g) => {
    if (o && v(m, o), f)
      for (let I = 0; I < f.length; I++)
        v(m, f[I]);
    if (g) {
      let I = g.subTree;
      if (i === I) {
        const F = g.vnode;
        x(m, F, F.scopeId, F.slotScopeIds, g.parent);
      }
    }
  }, W = (m, i, o, f, g, I, F, P, k = 0) => {
    for (let N = k; N < m.length; N++) {
      const p = m[N] = P ? dt(m[N]) : qe(m[N]);
      A(null, p, i, o, f, g, I, F, P);
    }
  }, $ = (m, i, o, f, g, I, F) => {
    const P = i.el = m.el;
    let { patchFlag: k, dynamicChildren: N, dirs: p } = i;
    k |= m.patchFlag & 16;
    const L = m.props || se, D = i.props || se;
    let U;
    o && yt(o, !1), (U = D.onVnodeBeforeUpdate) && Ge(U, o, i, m), p && It(i, m, o, "beforeUpdate"), o && yt(o, !0);
    const V = g && i.type !== "foreignObject";
    if (N ? K(m.dynamicChildren, N, P, o, f, V, I) : F || J(m, i, P, null, o, f, V, I, !1), k > 0) {
      if (k & 16)
        ee(P, i, L, D, o, f, g);
      else if (k & 2 && L.class !== D.class && s(P, "class", null, D.class, g), k & 4 && s(P, "style", L.style, D.style, g), k & 8) {
        const z = i.dynamicProps;
        for (let Y = 0; Y < z.length; Y++) {
          const ie = z[Y], Se = L[ie], Pt = D[ie];
          (Pt !== Se || ie === "value") && s(P, ie, Se, Pt, g, m.children, o, f, Le);
        }
      }
      k & 1 && m.children !== i.children && _(P, i.children);
    } else
      !F && N == null && ee(P, i, L, D, o, f, g);
    ((U = D.onVnodeUpdated) || p) && ve(() => {
      U && Ge(U, o, i, m), p && It(i, m, o, "updated");
    }, f);
  }, K = (m, i, o, f, g, I, F) => {
    for (let P = 0; P < i.length; P++) {
      const k = m[P], N = i[P], p = k.el && (k.type === We || !vt(k, N) || k.shapeFlag & 70) ? E(k.el) : o;
      A(k, N, p, null, f, g, I, F, !0);
    }
  }, ee = (m, i, o, f, g, I, F) => {
    if (o !== f) {
      if (o !== se)
        for (const P in o)
          !pn(P) && !(P in f) && s(m, P, o[P], null, F, i.children, g, I, Le);
      for (const P in f) {
        if (pn(P))
          continue;
        const k = f[P], N = o[P];
        k !== N && P !== "value" && s(m, P, N, k, F, i.children, g, I, Le);
      }
      "value" in f && s(m, "value", o.value, f.value);
    }
  }, oe = (m, i, o, f, g, I, F, P, k) => {
    const N = i.el = m ? m.el : c(""), p = i.anchor = m ? m.anchor : c("");
    let { patchFlag: L, dynamicChildren: D, slotScopeIds: U } = i;
    U && (P = P ? P.concat(U) : U), m == null ? (r(N, o, f), r(p, o, f), W(i.children, o, p, g, I, F, P, k)) : L > 0 && L & 64 && D && m.dynamicChildren ? (K(m.dynamicChildren, D, o, g, I, F, P), (i.key != null || g && i === g.subTree) && Kl(m, i, !0)) : J(m, i, o, p, g, I, F, P, k);
  }, ae = (m, i, o, f, g, I, F, P, k) => {
    i.slotScopeIds = P, m == null ? i.shapeFlag & 512 ? g.ctx.activate(i, o, f, F, k) : ke(i, o, f, g, I, F, k) : ot(m, i, k);
  }, ke = (m, i, o, f, g, I, F) => {
    const P = m.component = yo(m, f, g);
    if (Rn(m) && (P.ctx.renderer = Ce), Co(P), P.asyncDep) {
      if (g && g.registerDep(P, te), !m.el) {
        const k = P.subTree = Oe(st);
        h(null, k, i, o);
      }
      return;
    }
    te(P, m, i, o, g, I, F);
  }, ot = (m, i, o) => {
    const f = i.component = m.component;
    if (Fi(m, i, o))
      if (f.asyncDep && !f.asyncResolved) {
        G(f, i, o);
        return;
      } else
        f.next = i, Li(f.update), f.update();
    else
      i.el = m.el, f.vnode = i;
  }, te = (m, i, o, f, g, I, F) => {
    const P = () => {
      if (m.isMounted) {
        let { next: p, bu: L, u: D, parent: U, vnode: V } = m, z = p, Y;
        yt(m, !1), p ? (p.el = V.el, G(m, p, F)) : p = V, L && Hn(L), (Y = p.props && p.props.onVnodeBeforeUpdate) && Ge(Y, U, p, V), yt(m, !0);
        const ie = jn(m), Se = m.subTree;
        m.subTree = ie, A(
          Se,
          ie,
          E(Se.el),
          Ke(Se),
          m,
          g,
          I
        ), p.el = ie.el, z === null && Pi(m, ie.el), D && ve(D, g), (Y = p.props && p.props.onVnodeUpdated) && ve(() => Ge(Y, U, p, V), g);
      } else {
        let p;
        const { el: L, props: D } = i, { bm: U, m: V, parent: z } = m, Y = bn(i);
        if (yt(m, !1), U && Hn(U), !Y && (p = D && D.onVnodeBeforeMount) && Ge(p, z, i), yt(m, !0), L && De) {
          const ie = () => {
            m.subTree = jn(m), De(L, m.subTree, m, g, null);
          };
          Y ? i.type.__asyncLoader().then(
            () => !m.isUnmounted && ie()
          ) : ie();
        } else {
          const ie = m.subTree = jn(m);
          A(null, ie, o, f, m, g, I), i.el = ie.el;
        }
        if (V && ve(V, g), !Y && (p = D && D.onVnodeMounted)) {
          const ie = i;
          ve(() => Ge(p, z, ie), g);
        }
        (i.shapeFlag & 256 || z && bn(z.vnode) && z.vnode.shapeFlag & 256) && m.a && ve(m.a, g), m.isMounted = !0, i = o = f = null;
      }
    }, k = m.effect = new Or(
      P,
      () => wr(N),
      m.scope
    ), N = m.update = () => k.run();
    N.id = m.uid, yt(m, !0), N();
  }, G = (m, i, o) => {
    i.component = m;
    const f = m.vnode.props;
    m.vnode = i, m.next = null, so(m, i.props, f, o), io(m, i.children, o), Bt(), ls(), Kt();
  }, J = (m, i, o, f, g, I, F, P, k = !1) => {
    const N = m && m.children, p = m ? m.shapeFlag : 0, L = i.children, { patchFlag: D, shapeFlag: U } = i;
    if (D > 0) {
      if (D & 128) {
        Be(N, L, o, f, g, I, F, P, k);
        return;
      } else if (D & 256) {
        ye(N, L, o, f, g, I, F, P, k);
        return;
      }
    }
    U & 8 ? (p & 16 && Le(N, g, I), L !== N && _(o, L)) : p & 16 ? U & 16 ? Be(N, L, o, f, g, I, F, P, k) : Le(N, g, I, !0) : (p & 8 && _(o, ""), U & 16 && W(L, o, f, g, I, F, P, k));
  }, ye = (m, i, o, f, g, I, F, P, k) => {
    m = m || Mt, i = i || Mt;
    const N = m.length, p = i.length, L = Math.min(N, p);
    let D;
    for (D = 0; D < L; D++) {
      const U = i[D] = k ? dt(i[D]) : qe(i[D]);
      A(m[D], U, o, null, g, I, F, P, k);
    }
    N > p ? Le(m, g, I, !0, !1, L) : W(i, o, f, g, I, F, P, k, L);
  }, Be = (m, i, o, f, g, I, F, P, k) => {
    let N = 0;
    const p = i.length;
    let L = m.length - 1, D = p - 1;
    for (; N <= L && N <= D; ) {
      const U = m[N], V = i[N] = k ? dt(i[N]) : qe(i[N]);
      if (vt(U, V))
        A(U, V, o, null, g, I, F, P, k);
      else
        break;
      N++;
    }
    for (; N <= L && N <= D; ) {
      const U = m[L], V = i[D] = k ? dt(i[D]) : qe(i[D]);
      if (vt(U, V))
        A(U, V, o, null, g, I, F, P, k);
      else
        break;
      L--, D--;
    }
    if (N > L) {
      if (N <= D) {
        const U = D + 1, V = U < p ? i[U].el : f;
        for (; N <= D; )
          A(null, i[N] = k ? dt(i[N]) : qe(i[N]), o, V, g, I, F, P, k), N++;
      }
    } else if (N > D)
      for (; N <= L; )
        pe(m[N], g, I, !0), N++;
    else {
      const U = N, V = N, z = /* @__PURE__ */ new Map();
      for (N = V; N <= D; N++) {
        const Pe = i[N] = k ? dt(i[N]) : qe(i[N]);
        Pe.key != null && z.set(Pe.key, N);
      }
      let Y, ie = 0;
      const Se = D - V + 1;
      let Pt = !1, Gr = 0;
      const Yt = new Array(Se);
      for (N = 0; N < Se; N++)
        Yt[N] = 0;
      for (N = U; N <= L; N++) {
        const Pe = m[N];
        if (ie >= Se) {
          pe(Pe, g, I, !0);
          continue;
        }
        let Xe;
        if (Pe.key != null)
          Xe = z.get(Pe.key);
        else
          for (Y = V; Y <= D; Y++)
            if (Yt[Y - V] === 0 && vt(Pe, i[Y])) {
              Xe = Y;
              break;
            }
        Xe === void 0 ? pe(Pe, g, I, !0) : (Yt[Xe - V] = N + 1, Xe >= Gr ? Gr = Xe : Pt = !0, A(Pe, i[Xe], o, null, g, I, F, P, k), ie++);
      }
      const Jr = Pt ? mo(Yt) : Mt;
      for (Y = Jr.length - 1, N = Se - 1; N >= 0; N--) {
        const Pe = V + N, Xe = i[Pe], qr = Pe + 1 < p ? i[Pe + 1].el : f;
        Yt[N] === 0 ? A(null, Xe, o, qr, g, I, F, P, k) : Pt && (Y < 0 || N !== Jr[Y] ? Fe(Xe, o, qr, 2) : Y--);
      }
    }
  }, Fe = (m, i, o, f, g = null) => {
    const { el: I, type: F, transition: P, children: k, shapeFlag: N } = m;
    if (N & 6) {
      Fe(m.component.subTree, i, o, f);
      return;
    }
    if (N & 128) {
      m.suspense.move(i, o, f);
      return;
    }
    if (N & 64) {
      F.move(m, i, o, Ce);
      return;
    }
    if (F === We) {
      r(I, i, o);
      for (let L = 0; L < k.length; L++)
        Fe(k[L], i, o, f);
      r(m.anchor, i, o);
      return;
    }
    if (F === Kn) {
      C(m, i, o);
      return;
    }
    if (f !== 2 && N & 1 && P)
      if (f === 0)
        P.beforeEnter(I), r(I, i, o), ve(() => P.enter(I), g);
      else {
        const { leave: L, delayLeave: D, afterLeave: U } = P, V = () => r(I, i, o), z = () => {
          L(I, () => {
            V(), U && U();
          });
        };
        D ? D(I, V, z) : z();
      }
    else
      r(I, i, o);
  }, pe = (m, i, o, f = !1, g = !1) => {
    const { type: I, props: F, ref: P, children: k, dynamicChildren: N, shapeFlag: p, patchFlag: L, dirs: D } = m;
    if (P != null && ar(P, null, o, m, !0), p & 256) {
      i.ctx.deactivate(m);
      return;
    }
    const U = p & 1 && D, V = !bn(m);
    let z;
    if (V && (z = F && F.onVnodeBeforeUnmount) && Ge(z, i, m), p & 6)
      Tt(m.component, o, f);
    else {
      if (p & 128) {
        m.suspense.unmount(o, f);
        return;
      }
      U && It(m, null, i, "beforeUnmount"), p & 64 ? m.type.remove(m, i, o, g, Ce, f) : N && (I !== We || L > 0 && L & 64) ? Le(N, i, o, !1, !0) : (I === We && L & 384 || !g && p & 16) && Le(k, i, o), f && Lt(m);
    }
    (V && (z = F && F.onVnodeUnmounted) || U) && ve(() => {
      z && Ge(z, i, m), U && It(m, null, i, "unmounted");
    }, o);
  }, Lt = (m) => {
    const { type: i, el: o, anchor: f, transition: g } = m;
    if (i === We) {
      ct(o, f);
      return;
    }
    if (i === Kn) {
      T(m);
      return;
    }
    const I = () => {
      l(o), g && !g.persisted && g.afterLeave && g.afterLeave();
    };
    if (m.shapeFlag & 1 && g && !g.persisted) {
      const { leave: F, delayLeave: P } = g, k = () => F(o, I);
      P ? P(m.el, I, k) : k();
    } else
      I();
  }, ct = (m, i) => {
    let o;
    for (; m !== i; )
      o = b(m), l(m), m = o;
    l(i);
  }, Tt = (m, i, o) => {
    const { bum: f, scope: g, update: I, subTree: F, um: P } = m;
    f && Hn(f), g.stop(), I && (I.active = !1, pe(F, m, i, o)), P && ve(P, i), ve(() => {
      m.isUnmounted = !0;
    }, i), i && i.pendingBranch && !i.isUnmounted && m.asyncDep && !m.asyncResolved && m.suspenseId === i.pendingId && (i.deps--, i.deps === 0 && i.resolve());
  }, Le = (m, i, o, f = !1, g = !1, I = 0) => {
    for (let F = I; F < m.length; F++)
      pe(m[F], i, o, f, g);
  }, Ke = (m) => m.shapeFlag & 6 ? Ke(m.component.subTree) : m.shapeFlag & 128 ? m.suspense.next() : b(m.anchor || m.el), Ye = (m, i, o) => {
    m == null ? i._vnode && pe(i._vnode, null, null, !0) : A(i._vnode || null, m, i, null, null, null, o), ls(), Ol(), i._vnode = m;
  }, Ce = {
    p: A,
    um: pe,
    m: Fe,
    r: Lt,
    mt: ke,
    mc: W,
    pc: J,
    pbc: K,
    n: Ke,
    o: e
  };
  let Re, De;
  return t && ([Re, De] = t(Ce)), {
    render: Ye,
    hydrate: Re,
    createApp: co(Ye, Re)
  };
}
function yt({ effect: e, update: t }, n) {
  e.allowRecurse = t.allowRecurse = n;
}
function Kl(e, t, n = !1) {
  const r = e.children, l = t.children;
  if (j(r) && j(l))
    for (let s = 0; s < r.length; s++) {
      const a = r[s];
      let c = l[s];
      c.shapeFlag & 1 && !c.dynamicChildren && ((c.patchFlag <= 0 || c.patchFlag === 32) && (c = l[s] = dt(l[s]), c.el = a.el), n || Kl(a, c)), c.type === on && (c.el = a.el);
    }
}
function mo(e) {
  const t = e.slice(), n = [0];
  let r, l, s, a, c;
  const u = e.length;
  for (r = 0; r < u; r++) {
    const d = e[r];
    if (d !== 0) {
      if (l = n[n.length - 1], e[l] < d) {
        t[r] = l, n.push(r);
        continue;
      }
      for (s = 0, a = n.length - 1; s < a; )
        c = s + a >> 1, e[n[c]] < d ? s = c + 1 : a = c;
      d < e[n[s]] && (s > 0 && (t[r] = n[s - 1]), n[s] = r);
    }
  }
  for (s = n.length, a = n[s - 1]; s-- > 0; )
    n[s] = a, a = t[a];
  return n;
}
const _o = (e) => e.__isTeleport, We = Symbol(void 0), on = Symbol(void 0), st = Symbol(void 0), Kn = Symbol(void 0), Qt = [];
let je = null;
function Yl(e = !1) {
  Qt.push(je = e ? null : []);
}
function go() {
  Qt.pop(), je = Qt[Qt.length - 1] || null;
}
let sn = 1;
function gs(e) {
  sn += e;
}
function ho(e) {
  return e.dynamicChildren = sn > 0 ? je || Mt : null, go(), sn > 0 && je && je.push(e), e;
}
function Xl(e, t, n, r, l, s) {
  return ho(lt(e, t, n, r, l, s, !0));
}
function ir(e) {
  return e ? e.__v_isVNode === !0 : !1;
}
function vt(e, t) {
  return e.type === t.type && e.key === t.key;
}
const wn = "__vInternal", Gl = ({ key: e }) => e != null ? e : null, En = ({ ref: e, ref_key: t, ref_for: n }) => e != null ? ge(e) || he(e) || B(e) ? { i: we, r: e, k: t, f: !!n } : e : null;
function lt(e, t = null, n = null, r = 0, l = null, s = e === We ? 0 : 1, a = !1, c = !1) {
  const u = {
    __v_isVNode: !0,
    __v_skip: !0,
    type: e,
    props: t,
    key: t && Gl(t),
    ref: t && En(t),
    scopeId: kn,
    slotScopeIds: null,
    children: n,
    component: null,
    suspense: null,
    ssContent: null,
    ssFallback: null,
    dirs: null,
    transition: null,
    el: null,
    anchor: null,
    target: null,
    targetAnchor: null,
    staticCount: 0,
    shapeFlag: s,
    patchFlag: r,
    dynamicProps: l,
    dynamicChildren: null,
    appContext: null,
    ctx: we
  };
  return c ? (Wr(u, n), s & 128 && e.normalize(u)) : n && (u.shapeFlag |= ge(n) ? 8 : 16), sn > 0 && !a && je && (u.patchFlag > 0 || s & 6) && u.patchFlag !== 32 && je.push(u), u;
}
const Oe = po;
function po(e, t = null, n = null, r = 0, l = null, s = !1) {
  if ((!e || e === Ji) && (e = st), ir(e)) {
    const c = ht(e, t, !0);
    return n && Wr(c, n), sn > 0 && !s && je && (c.shapeFlag & 6 ? je[je.indexOf(e)] = c : je.push(c)), c.patchFlag |= -2, c;
  }
  if (Fo(e) && (e = e.__vccOpts), t) {
    t = bo(t);
    let { class: c, style: u } = t;
    c && !ge(c) && (t.class = Tr(c)), le(u) && (bl(u) && !j(u) && (u = Ee({}, u)), t.style = Lr(u));
  }
  const a = ge(e) ? 1 : ki(e) ? 128 : _o(e) ? 64 : le(e) ? 4 : B(e) ? 2 : 0;
  return lt(e, t, n, r, l, a, s, !0);
}
function bo(e) {
  return e ? bl(e) || wn in e ? Ee({}, e) : e : null;
}
function ht(e, t, n = !1) {
  const { props: r, ref: l, patchFlag: s, children: a } = e, c = t ? Lo(r || {}, t) : r;
  return {
    __v_isVNode: !0,
    __v_skip: !0,
    type: e.type,
    props: c,
    key: c && Gl(c),
    ref: t && t.ref ? n && l ? j(l) ? l.concat(En(t)) : [l, En(t)] : En(t) : l,
    scopeId: e.scopeId,
    slotScopeIds: e.slotScopeIds,
    children: a,
    target: e.target,
    targetAnchor: e.targetAnchor,
    staticCount: e.staticCount,
    shapeFlag: e.shapeFlag,
    patchFlag: t && e.type !== We ? s === -1 ? 16 : s | 16 : s,
    dynamicProps: e.dynamicProps,
    dynamicChildren: e.dynamicChildren,
    appContext: e.appContext,
    dirs: e.dirs,
    transition: e.transition,
    component: e.component,
    suspense: e.suspense,
    ssContent: e.ssContent && ht(e.ssContent),
    ssFallback: e.ssFallback && ht(e.ssFallback),
    el: e.el,
    anchor: e.anchor,
    ctx: e.ctx,
    ce: e.ce
  };
}
function Eo(e = " ", t = 0) {
  return Oe(on, null, e, t);
}
function qe(e) {
  return e == null || typeof e == "boolean" ? Oe(st) : j(e) ? Oe(
    We,
    null,
    e.slice()
  ) : typeof e == "object" ? dt(e) : Oe(on, null, String(e));
}
function dt(e) {
  return e.el === null && e.patchFlag !== -1 || e.memo ? e : ht(e);
}
function Wr(e, t) {
  let n = 0;
  const { shapeFlag: r } = e;
  if (t == null)
    t = null;
  else if (j(t))
    n = 16;
  else if (typeof t == "object")
    if (r & 65) {
      const l = t.default;
      l && (l._c && (l._d = !1), Wr(e, l()), l._c && (l._d = !0));
      return;
    } else {
      n = 32;
      const l = t._;
      !l && !(wn in t) ? t._ctx = we : l === 3 && we && (we.slots._ === 1 ? t._ = 1 : (t._ = 2, e.patchFlag |= 1024));
    }
  else
    B(t) ? (t = { default: t, _ctx: we }, n = 32) : (t = String(t), r & 64 ? (n = 16, t = [Eo(t)]) : n = 8);
  e.children = t, e.shapeFlag |= n;
}
function Lo(...e) {
  const t = {};
  for (let n = 0; n < e.length; n++) {
    const r = e[n];
    for (const l in r)
      if (l === "class")
        t.class !== r.class && (t.class = Tr([t.class, r.class]));
      else if (l === "style")
        t.style = Lr([t.style, r.style]);
      else if (Cn(l)) {
        const s = t[l], a = r[l];
        a && s !== a && !(j(s) && s.includes(a)) && (t[l] = s ? [].concat(s, a) : a);
      } else
        l !== "" && (t[l] = r[l]);
  }
  return t;
}
function Ge(e, t, n, r = null) {
  xe(e, t, 7, [
    n,
    r
  ]);
}
const To = Bl();
let Io = 0;
function yo(e, t, n) {
  const r = e.type, l = (t ? t.appContext : e.appContext) || To, s = {
    uid: Io++,
    vnode: e,
    type: r,
    parent: t,
    appContext: l,
    root: null,
    next: null,
    subTree: null,
    effect: null,
    update: null,
    scope: new al(!0),
    render: null,
    proxy: null,
    exposed: null,
    exposeProxy: null,
    withProxy: null,
    provides: t ? t.provides : Object.create(l.provides),
    accessCache: null,
    renderCache: [],
    components: null,
    directives: null,
    propsOptions: $l(r, l),
    emitsOptions: Fl(r, l),
    emit: null,
    emitted: null,
    propsDefaults: se,
    inheritAttrs: r.inheritAttrs,
    ctx: se,
    data: se,
    props: se,
    attrs: se,
    slots: se,
    refs: se,
    setupState: se,
    setupContext: null,
    suspense: n,
    suspenseId: n ? n.pendingId : 0,
    asyncDep: null,
    asyncResolved: !1,
    isMounted: !1,
    isUnmounted: !1,
    isDeactivated: !1,
    bc: null,
    c: null,
    bm: null,
    m: null,
    bu: null,
    u: null,
    um: null,
    bum: null,
    da: null,
    a: null,
    rtg: null,
    rtc: null,
    ec: null,
    sp: null
  };
  return s.ctx = { _: s }, s.root = t ? t.root : s, s.emit = yi.bind(null, s), e.ce && e.ce(s), s;
}
let ue = null;
const $t = () => ue || we, Ht = (e) => {
  ue = e, e.scope.on();
}, Ft = () => {
  ue && ue.scope.off(), ue = null;
};
function Jl(e) {
  return e.vnode.shapeFlag & 4;
}
let ln = !1;
function Co(e, t = !1) {
  ln = t;
  const { props: n, children: r } = e.vnode, l = Jl(e);
  ro(e, n, l, t), ao(e, r);
  const s = l ? No(e, t) : void 0;
  return ln = !1, s;
}
function No(e, t) {
  const n = e.type;
  e.accessCache = /* @__PURE__ */ Object.create(null), e.proxy = El(new Proxy(e.ctx, Qi));
  const { setup: r } = n;
  if (r) {
    const l = e.setupContext = r.length > 1 ? Oo(e) : null;
    Ht(e), Bt();
    const s = _t(r, e, 0, [e.props, l]);
    if (Kt(), Ft(), rl(s)) {
      if (s.then(Ft, Ft), t)
        return s.then((a) => {
          hs(e, a, t);
        }).catch((a) => {
          Fn(a, e, 0);
        });
      e.asyncDep = s;
    } else
      hs(e, s, t);
  } else
    ql(e, t);
}
function hs(e, t, n) {
  B(t) ? e.type.__ssrInlineRender ? e.ssrRender = t : e.render = t : le(t) && (e.setupState = yl(t)), ql(e, n);
}
let ps;
function ql(e, t, n) {
  const r = e.type;
  if (!e.render) {
    if (!t && ps && !r.render) {
      const l = r.template || Dr(e).template;
      if (l) {
        const { isCustomElement: s, compilerOptions: a } = e.appContext.config, { delimiters: c, compilerOptions: u } = r, d = Ee(Ee({
          isCustomElement: s,
          delimiters: c
        }, a), u);
        r.render = ps(l, d);
      }
    }
    e.render = r.render || Ve;
  }
  Ht(e), Bt(), Zi(e), Kt(), Ft();
}
function vo(e) {
  return new Proxy(e.attrs, {
    get(t, n) {
      return Ae(e, "get", "$attrs"), t[n];
    }
  });
}
function Oo(e) {
  const t = (r) => {
    e.exposed = r || {};
  };
  let n;
  return {
    get attrs() {
      return n || (n = vo(e));
    },
    slots: e.slots,
    emit: e.emit,
    expose: t
  };
}
function $r(e) {
  if (e.exposed)
    return e.exposeProxy || (e.exposeProxy = new Proxy(yl(El(e.exposed)), {
      get(t, n) {
        if (n in t)
          return t[n];
        if (n in qt)
          return qt[n](e);
      },
      has(t, n) {
        return n in t || n in qt;
      }
    }));
}
function Ao(e, t = !0) {
  return B(e) ? e.displayName || e.name : e.name || t && e.__name;
}
function Fo(e) {
  return B(e) && "__vccOpts" in e;
}
const He = (e, t) => hi(e, t, ln);
function Ql(e, t, n) {
  const r = arguments.length;
  return r === 2 ? le(t) && !j(t) ? ir(t) ? Oe(e, null, [t]) : Oe(e, t) : Oe(e, null, t) : (r > 3 ? n = Array.prototype.slice.call(arguments, 2) : r === 3 && ir(n) && (n = [n]), Oe(e, t, n));
}
const Po = Symbol(""), ko = () => Jt(Po), Ro = "3.2.47", So = "http://www.w3.org/2000/svg", Ot = typeof document < "u" ? document : null, bs = Ot && /* @__PURE__ */ Ot.createElement("template"), Mo = {
  insert: (e, t, n) => {
    t.insertBefore(e, n || null);
  },
  remove: (e) => {
    const t = e.parentNode;
    t && t.removeChild(e);
  },
  createElement: (e, t, n, r) => {
    const l = t ? Ot.createElementNS(So, e) : Ot.createElement(e, n ? { is: n } : void 0);
    return e === "select" && r && r.multiple != null && l.setAttribute("multiple", r.multiple), l;
  },
  createText: (e) => Ot.createTextNode(e),
  createComment: (e) => Ot.createComment(e),
  setText: (e, t) => {
    e.nodeValue = t;
  },
  setElementText: (e, t) => {
    e.textContent = t;
  },
  parentNode: (e) => e.parentNode,
  nextSibling: (e) => e.nextSibling,
  querySelector: (e) => Ot.querySelector(e),
  setScopeId(e, t) {
    e.setAttribute(t, "");
  },
  insertStaticContent(e, t, n, r, l, s) {
    const a = n ? n.previousSibling : t.lastChild;
    if (l && (l === s || l.nextSibling))
      for (; t.insertBefore(l.cloneNode(!0), n), !(l === s || !(l = l.nextSibling)); )
        ;
    else {
      bs.innerHTML = r ? `<svg>${e}</svg>` : e;
      const c = bs.content;
      if (r) {
        const u = c.firstChild;
        for (; u.firstChild; )
          c.appendChild(u.firstChild);
        c.removeChild(u);
      }
      t.insertBefore(c, n);
    }
    return [
      a ? a.nextSibling : t.firstChild,
      n ? n.previousSibling : t.lastChild
    ];
  }
};
function wo(e, t, n) {
  const r = e._vtc;
  r && (t = (t ? [t, ...r] : [...r]).join(" ")), t == null ? e.removeAttribute("class") : n ? e.setAttribute("class", t) : e.className = t;
}
function xo(e, t, n) {
  const r = e.style, l = ge(n);
  if (n && !l) {
    if (t && !ge(t))
      for (const s in t)
        n[s] == null && or(r, s, "");
    for (const s in n)
      or(r, s, n[s]);
  } else {
    const s = r.display;
    l ? t !== n && (r.cssText = n) : t && e.removeAttribute("style"), "_vod" in e && (r.display = s);
  }
}
const Es = /\s*!important$/;
function or(e, t, n) {
  if (j(n))
    n.forEach((r) => or(e, t, r));
  else if (n == null && (n = ""), t.startsWith("--"))
    e.setProperty(t, n);
  else {
    const r = Do(e, t);
    Es.test(n) ? e.setProperty(Vt(r), n.replace(Es, ""), "important") : e[r] = n;
  }
}
const Ls = ["Webkit", "Moz", "ms"], Yn = {};
function Do(e, t) {
  const n = Yn[t];
  if (n)
    return n;
  let r = et(t);
  if (r !== "filter" && r in e)
    return Yn[t] = r;
  r = On(r);
  for (let l = 0; l < Ls.length; l++) {
    const s = Ls[l] + r;
    if (s in e)
      return Yn[t] = s;
  }
  return t;
}
const Ts = "http://www.w3.org/1999/xlink";
function Uo(e, t, n, r, l) {
  if (r && t.startsWith("xlink:"))
    n == null ? e.removeAttributeNS(Ts, t.slice(6, t.length)) : e.setAttributeNS(Ts, t, n);
  else {
    const s = Na(t);
    n == null || s && !el(n) ? e.removeAttribute(t) : e.setAttribute(t, s ? "" : n);
  }
}
function Wo(e, t, n, r, l, s, a) {
  if (t === "innerHTML" || t === "textContent") {
    r && a(r, l, s), e[t] = n == null ? "" : n;
    return;
  }
  if (t === "value" && e.tagName !== "PROGRESS" && !e.tagName.includes("-")) {
    e._value = n;
    const u = n == null ? "" : n;
    (e.value !== u || e.tagName === "OPTION") && (e.value = u), n == null && e.removeAttribute(t);
    return;
  }
  let c = !1;
  if (n === "" || n == null) {
    const u = typeof e[t];
    u === "boolean" ? n = el(n) : n == null && u === "string" ? (n = "", c = !0) : u === "number" && (n = 0, c = !0);
  }
  try {
    e[t] = n;
  } catch {
  }
  c && e.removeAttribute(t);
}
function $o(e, t, n, r) {
  e.addEventListener(t, n, r);
}
function Ho(e, t, n, r) {
  e.removeEventListener(t, n, r);
}
function jo(e, t, n, r, l = null) {
  const s = e._vei || (e._vei = {}), a = s[t];
  if (r && a)
    a.value = r;
  else {
    const [c, u] = Vo(t);
    if (r) {
      const d = s[t] = Yo(r, l);
      $o(e, c, d, u);
    } else
      a && (Ho(e, c, a, u), s[t] = void 0);
  }
}
const Is = /(?:Once|Passive|Capture)$/;
function Vo(e) {
  let t;
  if (Is.test(e)) {
    t = {};
    let r;
    for (; r = e.match(Is); )
      e = e.slice(0, e.length - r[0].length), t[r[0].toLowerCase()] = !0;
  }
  return [e[2] === ":" ? e.slice(3) : Vt(e.slice(2)), t];
}
let Xn = 0;
const Bo = /* @__PURE__ */ Promise.resolve(), Ko = () => Xn || (Bo.then(() => Xn = 0), Xn = Date.now());
function Yo(e, t) {
  const n = (r) => {
    if (!r._vts)
      r._vts = Date.now();
    else if (r._vts <= n.attached)
      return;
    xe(Xo(r, n.value), t, 5, [r]);
  };
  return n.value = e, n.attached = Ko(), n;
}
function Xo(e, t) {
  if (j(t)) {
    const n = e.stopImmediatePropagation;
    return e.stopImmediatePropagation = () => {
      n.call(e), e._stopped = !0;
    }, t.map((r) => (l) => !l._stopped && r && r(l));
  } else
    return t;
}
const ys = /^on[a-z]/, Go = (e, t, n, r, l = !1, s, a, c, u) => {
  t === "class" ? wo(e, r, l) : t === "style" ? xo(e, n, r) : Cn(t) ? Ir(t) || jo(e, t, n, r, a) : (t[0] === "." ? (t = t.slice(1), !0) : t[0] === "^" ? (t = t.slice(1), !1) : Jo(e, t, r, l)) ? Wo(e, t, r, s, a, c, u) : (t === "true-value" ? e._trueValue = r : t === "false-value" && (e._falseValue = r), Uo(e, t, r, l));
};
function Jo(e, t, n, r) {
  return r ? !!(t === "innerHTML" || t === "textContent" || t in e && ys.test(t) && B(n)) : t === "spellcheck" || t === "draggable" || t === "translate" || t === "form" || t === "list" && e.tagName === "INPUT" || t === "type" && e.tagName === "TEXTAREA" || ys.test(t) && ge(n) ? !1 : t in e;
}
const qo = {
  name: String,
  type: String,
  css: {
    type: Boolean,
    default: !0
  },
  duration: [String, Number, Object],
  enterFromClass: String,
  enterActiveClass: String,
  enterToClass: String,
  appearFromClass: String,
  appearActiveClass: String,
  appearToClass: String,
  leaveFromClass: String,
  leaveActiveClass: String,
  leaveToClass: String
};
Di.props;
const Qo = /* @__PURE__ */ Ee({ patchProp: Go }, Mo);
let Cs;
function Zo() {
  return Cs || (Cs = uo(Qo));
}
const zo = (...e) => {
  const t = Zo().createApp(...e), { mount: n } = t;
  return t.mount = (r) => {
    const l = ec(r);
    if (!l)
      return;
    const s = t._component;
    !B(s) && !s.render && !s.template && (s.template = l.innerHTML), l.innerHTML = "";
    const a = n(l, !1, l instanceof SVGElement);
    return l instanceof Element && (l.removeAttribute("v-cloak"), l.setAttribute("data-v-app", "")), a;
  }, t;
};
function ec(e) {
  return ge(e) ? document.querySelector(e) : e;
}
/*!
  * shared v9.2.2
  * (c) 2022 kazuya kawaguchi
  * Released under the MIT License.
  */
const cr = typeof window < "u", tc = typeof Symbol == "function" && typeof Symbol.toStringTag == "symbol", bt = (e) => tc ? Symbol(e) : e, nc = (e, t, n) => rc({ l: e, k: t, s: n }), rc = (e) => JSON.stringify(e).replace(/\u2028/g, "\\u2028").replace(/\u2029/g, "\\u2029").replace(/\u0027/g, "\\u0027"), de = (e) => typeof e == "number" && isFinite(e), sc = (e) => jr(e) === "[object Date]", pt = (e) => jr(e) === "[object RegExp]", xn = (e) => H(e) && Object.keys(e).length === 0;
function lc(e, t) {
  typeof console < "u" && (console.warn("[intlify] " + e), t && console.warn(t.stack));
}
const _e = Object.assign;
let Ns;
const Zt = () => Ns || (Ns = typeof globalThis < "u" ? globalThis : typeof self < "u" ? self : typeof window < "u" ? window : typeof global < "u" ? global : {});
function vs(e) {
  return e.replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&apos;");
}
const ac = Object.prototype.hasOwnProperty;
function Hr(e, t) {
  return ac.call(e, t);
}
const ne = Array.isArray, ce = (e) => typeof e == "function", M = (e) => typeof e == "string", X = (e) => typeof e == "boolean", re = (e) => e !== null && typeof e == "object", Zl = Object.prototype.toString, jr = (e) => Zl.call(e), H = (e) => jr(e) === "[object Object]", ic = (e) => e == null ? "" : ne(e) || H(e) && e.toString === Zl ? JSON.stringify(e, null, 2) : String(e);
/*!
  * message-compiler v9.2.2
  * (c) 2022 kazuya kawaguchi
  * Released under the MIT License.
  */
const Q = {
  EXPECTED_TOKEN: 1,
  INVALID_TOKEN_IN_PLACEHOLDER: 2,
  UNTERMINATED_SINGLE_QUOTE_IN_PLACEHOLDER: 3,
  UNKNOWN_ESCAPE_SEQUENCE: 4,
  INVALID_UNICODE_ESCAPE_SEQUENCE: 5,
  UNBALANCED_CLOSING_BRACE: 6,
  UNTERMINATED_CLOSING_BRACE: 7,
  EMPTY_PLACEHOLDER: 8,
  NOT_ALLOW_NEST_PLACEHOLDER: 9,
  INVALID_LINKED_FORMAT: 10,
  MUST_HAVE_MESSAGES_IN_PLURAL: 11,
  UNEXPECTED_EMPTY_LINKED_MODIFIER: 12,
  UNEXPECTED_EMPTY_LINKED_KEY: 13,
  UNEXPECTED_LEXICAL_ANALYSIS: 14,
  __EXTEND_POINT__: 15
};
function Dn(e, t, n = {}) {
  const { domain: r, messages: l, args: s } = n, a = e, c = new SyntaxError(String(a));
  return c.code = e, t && (c.location = t), c.domain = r, c;
}
function oc(e) {
  throw e;
}
function cc(e, t, n) {
  return { line: e, column: t, offset: n };
}
function ur(e, t, n) {
  const r = { start: e, end: t };
  return n != null && (r.source = n), r;
}
const tt = " ", uc = "\r", Ie = `
`, fc = String.fromCharCode(8232), dc = String.fromCharCode(8233);
function mc(e) {
  const t = e;
  let n = 0, r = 1, l = 1, s = 0;
  const a = (x) => t[x] === uc && t[x + 1] === Ie, c = (x) => t[x] === Ie, u = (x) => t[x] === dc, d = (x) => t[x] === fc, _ = (x) => a(x) || c(x) || u(x) || d(x), E = () => n, b = () => r, v = () => l, R = () => s, A = (x) => a(x) || u(x) || d(x) ? Ie : t[x], S = () => A(n), h = () => A(n + s);
  function O() {
    return s = 0, _(n) && (r++, l = 0), a(n) && n++, n++, l++, t[n];
  }
  function C() {
    return a(n + s) && s++, s++, t[n + s];
  }
  function T() {
    n = 0, r = 1, l = 1, s = 0;
  }
  function y(x = 0) {
    s = x;
  }
  function w() {
    const x = n + s;
    for (; x !== n; )
      O();
    s = 0;
  }
  return {
    index: E,
    line: b,
    column: v,
    peekOffset: R,
    charAt: A,
    currentChar: S,
    currentPeek: h,
    next: O,
    peek: C,
    reset: T,
    resetPeek: y,
    skipToPeek: w
  };
}
const ft = void 0, Os = "'", _c = "tokenizer";
function gc(e, t = {}) {
  const n = t.location !== !1, r = mc(e), l = () => r.index(), s = () => cc(r.line(), r.column(), r.index()), a = s(), c = l(), u = {
    currentType: 14,
    offset: c,
    startLoc: a,
    endLoc: a,
    lastType: 14,
    lastOffset: c,
    lastStartLoc: a,
    lastEndLoc: a,
    braceNest: 0,
    inLinked: !1,
    text: ""
  }, d = () => u, { onError: _ } = t;
  function E(i, o, f, ...g) {
    const I = d();
    if (o.column += f, o.offset += f, _) {
      const F = ur(I.startLoc, o), P = Dn(i, F, {
        domain: _c,
        args: g
      });
      _(P);
    }
  }
  function b(i, o, f) {
    i.endLoc = s(), i.currentType = o;
    const g = { type: o };
    return n && (g.loc = ur(i.startLoc, i.endLoc)), f != null && (g.value = f), g;
  }
  const v = (i) => b(i, 14);
  function R(i, o) {
    return i.currentChar() === o ? (i.next(), o) : (E(Q.EXPECTED_TOKEN, s(), 0, o), "");
  }
  function A(i) {
    let o = "";
    for (; i.currentPeek() === tt || i.currentPeek() === Ie; )
      o += i.currentPeek(), i.peek();
    return o;
  }
  function S(i) {
    const o = A(i);
    return i.skipToPeek(), o;
  }
  function h(i) {
    if (i === ft)
      return !1;
    const o = i.charCodeAt(0);
    return o >= 97 && o <= 122 || o >= 65 && o <= 90 || o === 95;
  }
  function O(i) {
    if (i === ft)
      return !1;
    const o = i.charCodeAt(0);
    return o >= 48 && o <= 57;
  }
  function C(i, o) {
    const { currentType: f } = o;
    if (f !== 2)
      return !1;
    A(i);
    const g = h(i.currentPeek());
    return i.resetPeek(), g;
  }
  function T(i, o) {
    const { currentType: f } = o;
    if (f !== 2)
      return !1;
    A(i);
    const g = i.currentPeek() === "-" ? i.peek() : i.currentPeek(), I = O(g);
    return i.resetPeek(), I;
  }
  function y(i, o) {
    const { currentType: f } = o;
    if (f !== 2)
      return !1;
    A(i);
    const g = i.currentPeek() === Os;
    return i.resetPeek(), g;
  }
  function w(i, o) {
    const { currentType: f } = o;
    if (f !== 8)
      return !1;
    A(i);
    const g = i.currentPeek() === ".";
    return i.resetPeek(), g;
  }
  function x(i, o) {
    const { currentType: f } = o;
    if (f !== 9)
      return !1;
    A(i);
    const g = h(i.currentPeek());
    return i.resetPeek(), g;
  }
  function W(i, o) {
    const { currentType: f } = o;
    if (!(f === 8 || f === 12))
      return !1;
    A(i);
    const g = i.currentPeek() === ":";
    return i.resetPeek(), g;
  }
  function $(i, o) {
    const { currentType: f } = o;
    if (f !== 10)
      return !1;
    const g = () => {
      const F = i.currentPeek();
      return F === "{" ? h(i.peek()) : F === "@" || F === "%" || F === "|" || F === ":" || F === "." || F === tt || !F ? !1 : F === Ie ? (i.peek(), g()) : h(F);
    }, I = g();
    return i.resetPeek(), I;
  }
  function K(i) {
    A(i);
    const o = i.currentPeek() === "|";
    return i.resetPeek(), o;
  }
  function ee(i) {
    const o = A(i), f = i.currentPeek() === "%" && i.peek() === "{";
    return i.resetPeek(), {
      isModulo: f,
      hasSpace: o.length > 0
    };
  }
  function oe(i, o = !0) {
    const f = (I = !1, F = "", P = !1) => {
      const k = i.currentPeek();
      return k === "{" ? F === "%" ? !1 : I : k === "@" || !k ? F === "%" ? !0 : I : k === "%" ? (i.peek(), f(I, "%", !0)) : k === "|" ? F === "%" || P ? !0 : !(F === tt || F === Ie) : k === tt ? (i.peek(), f(!0, tt, P)) : k === Ie ? (i.peek(), f(!0, Ie, P)) : !0;
    }, g = f();
    return o && i.resetPeek(), g;
  }
  function ae(i, o) {
    const f = i.currentChar();
    return f === ft ? ft : o(f) ? (i.next(), f) : null;
  }
  function ke(i) {
    return ae(i, (f) => {
      const g = f.charCodeAt(0);
      return g >= 97 && g <= 122 || g >= 65 && g <= 90 || g >= 48 && g <= 57 || g === 95 || g === 36;
    });
  }
  function ot(i) {
    return ae(i, (f) => {
      const g = f.charCodeAt(0);
      return g >= 48 && g <= 57;
    });
  }
  function te(i) {
    return ae(i, (f) => {
      const g = f.charCodeAt(0);
      return g >= 48 && g <= 57 || g >= 65 && g <= 70 || g >= 97 && g <= 102;
    });
  }
  function G(i) {
    let o = "", f = "";
    for (; o = ot(i); )
      f += o;
    return f;
  }
  function J(i) {
    S(i);
    const o = i.currentChar();
    return o !== "%" && E(Q.EXPECTED_TOKEN, s(), 0, o), i.next(), "%";
  }
  function ye(i) {
    let o = "";
    for (; ; ) {
      const f = i.currentChar();
      if (f === "{" || f === "}" || f === "@" || f === "|" || !f)
        break;
      if (f === "%")
        if (oe(i))
          o += f, i.next();
        else
          break;
      else if (f === tt || f === Ie)
        if (oe(i))
          o += f, i.next();
        else {
          if (K(i))
            break;
          o += f, i.next();
        }
      else
        o += f, i.next();
    }
    return o;
  }
  function Be(i) {
    S(i);
    let o = "", f = "";
    for (; o = ke(i); )
      f += o;
    return i.currentChar() === ft && E(Q.UNTERMINATED_CLOSING_BRACE, s(), 0), f;
  }
  function Fe(i) {
    S(i);
    let o = "";
    return i.currentChar() === "-" ? (i.next(), o += `-${G(i)}`) : o += G(i), i.currentChar() === ft && E(Q.UNTERMINATED_CLOSING_BRACE, s(), 0), o;
  }
  function pe(i) {
    S(i), R(i, "'");
    let o = "", f = "";
    const g = (F) => F !== Os && F !== Ie;
    for (; o = ae(i, g); )
      o === "\\" ? f += Lt(i) : f += o;
    const I = i.currentChar();
    return I === Ie || I === ft ? (E(Q.UNTERMINATED_SINGLE_QUOTE_IN_PLACEHOLDER, s(), 0), I === Ie && (i.next(), R(i, "'")), f) : (R(i, "'"), f);
  }
  function Lt(i) {
    const o = i.currentChar();
    switch (o) {
      case "\\":
      case "'":
        return i.next(), `\\${o}`;
      case "u":
        return ct(i, o, 4);
      case "U":
        return ct(i, o, 6);
      default:
        return E(Q.UNKNOWN_ESCAPE_SEQUENCE, s(), 0, o), "";
    }
  }
  function ct(i, o, f) {
    R(i, o);
    let g = "";
    for (let I = 0; I < f; I++) {
      const F = te(i);
      if (!F) {
        E(Q.INVALID_UNICODE_ESCAPE_SEQUENCE, s(), 0, `\\${o}${g}${i.currentChar()}`);
        break;
      }
      g += F;
    }
    return `\\${o}${g}`;
  }
  function Tt(i) {
    S(i);
    let o = "", f = "";
    const g = (I) => I !== "{" && I !== "}" && I !== tt && I !== Ie;
    for (; o = ae(i, g); )
      f += o;
    return f;
  }
  function Le(i) {
    let o = "", f = "";
    for (; o = ke(i); )
      f += o;
    return f;
  }
  function Ke(i) {
    const o = (f = !1, g) => {
      const I = i.currentChar();
      return I === "{" || I === "%" || I === "@" || I === "|" || !I || I === tt ? g : I === Ie ? (g += I, i.next(), o(f, g)) : (g += I, i.next(), o(!0, g));
    };
    return o(!1, "");
  }
  function Ye(i) {
    S(i);
    const o = R(i, "|");
    return S(i), o;
  }
  function Ce(i, o) {
    let f = null;
    switch (i.currentChar()) {
      case "{":
        return o.braceNest >= 1 && E(Q.NOT_ALLOW_NEST_PLACEHOLDER, s(), 0), i.next(), f = b(o, 2, "{"), S(i), o.braceNest++, f;
      case "}":
        return o.braceNest > 0 && o.currentType === 2 && E(Q.EMPTY_PLACEHOLDER, s(), 0), i.next(), f = b(o, 3, "}"), o.braceNest--, o.braceNest > 0 && S(i), o.inLinked && o.braceNest === 0 && (o.inLinked = !1), f;
      case "@":
        return o.braceNest > 0 && E(Q.UNTERMINATED_CLOSING_BRACE, s(), 0), f = Re(i, o) || v(o), o.braceNest = 0, f;
      default:
        let I = !0, F = !0, P = !0;
        if (K(i))
          return o.braceNest > 0 && E(Q.UNTERMINATED_CLOSING_BRACE, s(), 0), f = b(o, 1, Ye(i)), o.braceNest = 0, o.inLinked = !1, f;
        if (o.braceNest > 0 && (o.currentType === 5 || o.currentType === 6 || o.currentType === 7))
          return E(Q.UNTERMINATED_CLOSING_BRACE, s(), 0), o.braceNest = 0, De(i, o);
        if (I = C(i, o))
          return f = b(o, 5, Be(i)), S(i), f;
        if (F = T(i, o))
          return f = b(o, 6, Fe(i)), S(i), f;
        if (P = y(i, o))
          return f = b(o, 7, pe(i)), S(i), f;
        if (!I && !F && !P)
          return f = b(o, 13, Tt(i)), E(Q.INVALID_TOKEN_IN_PLACEHOLDER, s(), 0, f.value), S(i), f;
        break;
    }
    return f;
  }
  function Re(i, o) {
    const { currentType: f } = o;
    let g = null;
    const I = i.currentChar();
    switch ((f === 8 || f === 9 || f === 12 || f === 10) && (I === Ie || I === tt) && E(Q.INVALID_LINKED_FORMAT, s(), 0), I) {
      case "@":
        return i.next(), g = b(o, 8, "@"), o.inLinked = !0, g;
      case ".":
        return S(i), i.next(), b(o, 9, ".");
      case ":":
        return S(i), i.next(), b(o, 10, ":");
      default:
        return K(i) ? (g = b(o, 1, Ye(i)), o.braceNest = 0, o.inLinked = !1, g) : w(i, o) || W(i, o) ? (S(i), Re(i, o)) : x(i, o) ? (S(i), b(o, 12, Le(i))) : $(i, o) ? (S(i), I === "{" ? Ce(i, o) || g : b(o, 11, Ke(i))) : (f === 8 && E(Q.INVALID_LINKED_FORMAT, s(), 0), o.braceNest = 0, o.inLinked = !1, De(i, o));
    }
  }
  function De(i, o) {
    let f = { type: 14 };
    if (o.braceNest > 0)
      return Ce(i, o) || v(o);
    if (o.inLinked)
      return Re(i, o) || v(o);
    switch (i.currentChar()) {
      case "{":
        return Ce(i, o) || v(o);
      case "}":
        return E(Q.UNBALANCED_CLOSING_BRACE, s(), 0), i.next(), b(o, 3, "}");
      case "@":
        return Re(i, o) || v(o);
      default:
        if (K(i))
          return f = b(o, 1, Ye(i)), o.braceNest = 0, o.inLinked = !1, f;
        const { isModulo: I, hasSpace: F } = ee(i);
        if (I)
          return F ? b(o, 0, ye(i)) : b(o, 4, J(i));
        if (oe(i))
          return b(o, 0, ye(i));
        break;
    }
    return f;
  }
  function m() {
    const { currentType: i, offset: o, startLoc: f, endLoc: g } = u;
    return u.lastType = i, u.lastOffset = o, u.lastStartLoc = f, u.lastEndLoc = g, u.offset = l(), u.startLoc = s(), r.currentChar() === ft ? b(u, 14) : De(r, u);
  }
  return {
    nextToken: m,
    currentOffset: l,
    currentPosition: s,
    context: d
  };
}
const hc = "parser", pc = /(?:\\\\|\\'|\\u([0-9a-fA-F]{4})|\\U([0-9a-fA-F]{6}))/g;
function bc(e, t, n) {
  switch (e) {
    case "\\\\":
      return "\\";
    case "\\'":
      return "'";
    default: {
      const r = parseInt(t || n, 16);
      return r <= 55295 || r >= 57344 ? String.fromCodePoint(r) : "\uFFFD";
    }
  }
}
function Ec(e = {}) {
  const t = e.location !== !1, { onError: n } = e;
  function r(h, O, C, T, ...y) {
    const w = h.currentPosition();
    if (w.offset += T, w.column += T, n) {
      const x = ur(C, w), W = Dn(O, x, {
        domain: hc,
        args: y
      });
      n(W);
    }
  }
  function l(h, O, C) {
    const T = {
      type: h,
      start: O,
      end: O
    };
    return t && (T.loc = { start: C, end: C }), T;
  }
  function s(h, O, C, T) {
    h.end = O, T && (h.type = T), t && h.loc && (h.loc.end = C);
  }
  function a(h, O) {
    const C = h.context(), T = l(3, C.offset, C.startLoc);
    return T.value = O, s(T, h.currentOffset(), h.currentPosition()), T;
  }
  function c(h, O) {
    const C = h.context(), { lastOffset: T, lastStartLoc: y } = C, w = l(5, T, y);
    return w.index = parseInt(O, 10), h.nextToken(), s(w, h.currentOffset(), h.currentPosition()), w;
  }
  function u(h, O) {
    const C = h.context(), { lastOffset: T, lastStartLoc: y } = C, w = l(4, T, y);
    return w.key = O, h.nextToken(), s(w, h.currentOffset(), h.currentPosition()), w;
  }
  function d(h, O) {
    const C = h.context(), { lastOffset: T, lastStartLoc: y } = C, w = l(9, T, y);
    return w.value = O.replace(pc, bc), h.nextToken(), s(w, h.currentOffset(), h.currentPosition()), w;
  }
  function _(h) {
    const O = h.nextToken(), C = h.context(), { lastOffset: T, lastStartLoc: y } = C, w = l(8, T, y);
    return O.type !== 12 ? (r(h, Q.UNEXPECTED_EMPTY_LINKED_MODIFIER, C.lastStartLoc, 0), w.value = "", s(w, T, y), {
      nextConsumeToken: O,
      node: w
    }) : (O.value == null && r(h, Q.UNEXPECTED_LEXICAL_ANALYSIS, C.lastStartLoc, 0, Je(O)), w.value = O.value || "", s(w, h.currentOffset(), h.currentPosition()), {
      node: w
    });
  }
  function E(h, O) {
    const C = h.context(), T = l(7, C.offset, C.startLoc);
    return T.value = O, s(T, h.currentOffset(), h.currentPosition()), T;
  }
  function b(h) {
    const O = h.context(), C = l(6, O.offset, O.startLoc);
    let T = h.nextToken();
    if (T.type === 9) {
      const y = _(h);
      C.modifier = y.node, T = y.nextConsumeToken || h.nextToken();
    }
    switch (T.type !== 10 && r(h, Q.UNEXPECTED_LEXICAL_ANALYSIS, O.lastStartLoc, 0, Je(T)), T = h.nextToken(), T.type === 2 && (T = h.nextToken()), T.type) {
      case 11:
        T.value == null && r(h, Q.UNEXPECTED_LEXICAL_ANALYSIS, O.lastStartLoc, 0, Je(T)), C.key = E(h, T.value || "");
        break;
      case 5:
        T.value == null && r(h, Q.UNEXPECTED_LEXICAL_ANALYSIS, O.lastStartLoc, 0, Je(T)), C.key = u(h, T.value || "");
        break;
      case 6:
        T.value == null && r(h, Q.UNEXPECTED_LEXICAL_ANALYSIS, O.lastStartLoc, 0, Je(T)), C.key = c(h, T.value || "");
        break;
      case 7:
        T.value == null && r(h, Q.UNEXPECTED_LEXICAL_ANALYSIS, O.lastStartLoc, 0, Je(T)), C.key = d(h, T.value || "");
        break;
      default:
        r(h, Q.UNEXPECTED_EMPTY_LINKED_KEY, O.lastStartLoc, 0);
        const y = h.context(), w = l(7, y.offset, y.startLoc);
        return w.value = "", s(w, y.offset, y.startLoc), C.key = w, s(C, y.offset, y.startLoc), {
          nextConsumeToken: T,
          node: C
        };
    }
    return s(C, h.currentOffset(), h.currentPosition()), {
      node: C
    };
  }
  function v(h) {
    const O = h.context(), C = O.currentType === 1 ? h.currentOffset() : O.offset, T = O.currentType === 1 ? O.endLoc : O.startLoc, y = l(2, C, T);
    y.items = [];
    let w = null;
    do {
      const $ = w || h.nextToken();
      switch (w = null, $.type) {
        case 0:
          $.value == null && r(h, Q.UNEXPECTED_LEXICAL_ANALYSIS, O.lastStartLoc, 0, Je($)), y.items.push(a(h, $.value || ""));
          break;
        case 6:
          $.value == null && r(h, Q.UNEXPECTED_LEXICAL_ANALYSIS, O.lastStartLoc, 0, Je($)), y.items.push(c(h, $.value || ""));
          break;
        case 5:
          $.value == null && r(h, Q.UNEXPECTED_LEXICAL_ANALYSIS, O.lastStartLoc, 0, Je($)), y.items.push(u(h, $.value || ""));
          break;
        case 7:
          $.value == null && r(h, Q.UNEXPECTED_LEXICAL_ANALYSIS, O.lastStartLoc, 0, Je($)), y.items.push(d(h, $.value || ""));
          break;
        case 8:
          const K = b(h);
          y.items.push(K.node), w = K.nextConsumeToken || null;
          break;
      }
    } while (O.currentType !== 14 && O.currentType !== 1);
    const x = O.currentType === 1 ? O.lastOffset : h.currentOffset(), W = O.currentType === 1 ? O.lastEndLoc : h.currentPosition();
    return s(y, x, W), y;
  }
  function R(h, O, C, T) {
    const y = h.context();
    let w = T.items.length === 0;
    const x = l(1, O, C);
    x.cases = [], x.cases.push(T);
    do {
      const W = v(h);
      w || (w = W.items.length === 0), x.cases.push(W);
    } while (y.currentType !== 14);
    return w && r(h, Q.MUST_HAVE_MESSAGES_IN_PLURAL, C, 0), s(x, h.currentOffset(), h.currentPosition()), x;
  }
  function A(h) {
    const O = h.context(), { offset: C, startLoc: T } = O, y = v(h);
    return O.currentType === 14 ? y : R(h, C, T, y);
  }
  function S(h) {
    const O = gc(h, _e({}, e)), C = O.context(), T = l(0, C.offset, C.startLoc);
    return t && T.loc && (T.loc.source = h), T.body = A(O), C.currentType !== 14 && r(O, Q.UNEXPECTED_LEXICAL_ANALYSIS, C.lastStartLoc, 0, h[C.offset] || ""), s(T, O.currentOffset(), O.currentPosition()), T;
  }
  return { parse: S };
}
function Je(e) {
  if (e.type === 14)
    return "EOF";
  const t = (e.value || "").replace(/\r?\n/gu, "\\n");
  return t.length > 10 ? t.slice(0, 9) + "\u2026" : t;
}
function Lc(e, t = {}) {
  const n = {
    ast: e,
    helpers: /* @__PURE__ */ new Set()
  };
  return { context: () => n, helper: (s) => (n.helpers.add(s), s) };
}
function As(e, t) {
  for (let n = 0; n < e.length; n++)
    Vr(e[n], t);
}
function Vr(e, t) {
  switch (e.type) {
    case 1:
      As(e.cases, t), t.helper("plural");
      break;
    case 2:
      As(e.items, t);
      break;
    case 6:
      Vr(e.key, t), t.helper("linked"), t.helper("type");
      break;
    case 5:
      t.helper("interpolate"), t.helper("list");
      break;
    case 4:
      t.helper("interpolate"), t.helper("named");
      break;
  }
}
function Tc(e, t = {}) {
  const n = Lc(e);
  n.helper("normalize"), e.body && Vr(e.body, n);
  const r = n.context();
  e.helpers = Array.from(r.helpers);
}
function Ic(e, t) {
  const { sourceMap: n, filename: r, breakLineCode: l, needIndent: s } = t, a = {
    source: e.loc.source,
    filename: r,
    code: "",
    column: 1,
    line: 1,
    offset: 0,
    map: void 0,
    breakLineCode: l,
    needIndent: s,
    indentLevel: 0
  }, c = () => a;
  function u(A, S) {
    a.code += A;
  }
  function d(A, S = !0) {
    const h = S ? l : "";
    u(s ? h + "  ".repeat(A) : h);
  }
  function _(A = !0) {
    const S = ++a.indentLevel;
    A && d(S);
  }
  function E(A = !0) {
    const S = --a.indentLevel;
    A && d(S);
  }
  function b() {
    d(a.indentLevel);
  }
  return {
    context: c,
    push: u,
    indent: _,
    deindent: E,
    newline: b,
    helper: (A) => `_${A}`,
    needIndent: () => a.needIndent
  };
}
function yc(e, t) {
  const { helper: n } = e;
  e.push(`${n("linked")}(`), jt(e, t.key), t.modifier ? (e.push(", "), jt(e, t.modifier), e.push(", _type")) : e.push(", undefined, _type"), e.push(")");
}
function Cc(e, t) {
  const { helper: n, needIndent: r } = e;
  e.push(`${n("normalize")}([`), e.indent(r());
  const l = t.items.length;
  for (let s = 0; s < l && (jt(e, t.items[s]), s !== l - 1); s++)
    e.push(", ");
  e.deindent(r()), e.push("])");
}
function Nc(e, t) {
  const { helper: n, needIndent: r } = e;
  if (t.cases.length > 1) {
    e.push(`${n("plural")}([`), e.indent(r());
    const l = t.cases.length;
    for (let s = 0; s < l && (jt(e, t.cases[s]), s !== l - 1); s++)
      e.push(", ");
    e.deindent(r()), e.push("])");
  }
}
function vc(e, t) {
  t.body ? jt(e, t.body) : e.push("null");
}
function jt(e, t) {
  const { helper: n } = e;
  switch (t.type) {
    case 0:
      vc(e, t);
      break;
    case 1:
      Nc(e, t);
      break;
    case 2:
      Cc(e, t);
      break;
    case 6:
      yc(e, t);
      break;
    case 8:
      e.push(JSON.stringify(t.value), t);
      break;
    case 7:
      e.push(JSON.stringify(t.value), t);
      break;
    case 5:
      e.push(`${n("interpolate")}(${n("list")}(${t.index}))`, t);
      break;
    case 4:
      e.push(`${n("interpolate")}(${n("named")}(${JSON.stringify(t.key)}))`, t);
      break;
    case 9:
      e.push(JSON.stringify(t.value), t);
      break;
    case 3:
      e.push(JSON.stringify(t.value), t);
      break;
  }
}
const Oc = (e, t = {}) => {
  const n = M(t.mode) ? t.mode : "normal", r = M(t.filename) ? t.filename : "message.intl", l = !!t.sourceMap, s = t.breakLineCode != null ? t.breakLineCode : n === "arrow" ? ";" : `
`, a = t.needIndent ? t.needIndent : n !== "arrow", c = e.helpers || [], u = Ic(e, {
    mode: n,
    filename: r,
    sourceMap: l,
    breakLineCode: s,
    needIndent: a
  });
  u.push(n === "normal" ? "function __msg__ (ctx) {" : "(ctx) => {"), u.indent(a), c.length > 0 && (u.push(`const { ${c.map((E) => `${E}: _${E}`).join(", ")} } = ctx`), u.newline()), u.push("return "), jt(u, e), u.deindent(a), u.push("}");
  const { code: d, map: _ } = u.context();
  return {
    ast: e,
    code: d,
    map: _ ? _.toJSON() : void 0
  };
};
function Ac(e, t = {}) {
  const n = _e({}, t), l = Ec(n).parse(e);
  return Tc(l, n), Oc(l, n);
}
/*!
  * devtools-if v9.2.2
  * (c) 2022 kazuya kawaguchi
  * Released under the MIT License.
  */
const zl = {
  I18nInit: "i18n:init",
  FunctionTranslate: "function:translate"
};
/*!
  * core-base v9.2.2
  * (c) 2022 kazuya kawaguchi
  * Released under the MIT License.
  */
const Et = [];
Et[0] = {
  w: [0],
  i: [3, 0],
  ["["]: [4],
  o: [7]
};
Et[1] = {
  w: [1],
  ["."]: [2],
  ["["]: [4],
  o: [7]
};
Et[2] = {
  w: [2],
  i: [3, 0],
  [0]: [3, 0]
};
Et[3] = {
  i: [3, 0],
  [0]: [3, 0],
  w: [1, 1],
  ["."]: [2, 1],
  ["["]: [4, 1],
  o: [7, 1]
};
Et[4] = {
  ["'"]: [5, 0],
  ['"']: [6, 0],
  ["["]: [
    4,
    2
  ],
  ["]"]: [1, 3],
  o: 8,
  l: [4, 0]
};
Et[5] = {
  ["'"]: [4, 0],
  o: 8,
  l: [5, 0]
};
Et[6] = {
  ['"']: [4, 0],
  o: 8,
  l: [6, 0]
};
const Fc = /^\s?(?:true|false|-?[\d.]+|'[^']*'|"[^"]*")\s?$/;
function Pc(e) {
  return Fc.test(e);
}
function kc(e) {
  const t = e.charCodeAt(0), n = e.charCodeAt(e.length - 1);
  return t === n && (t === 34 || t === 39) ? e.slice(1, -1) : e;
}
function Rc(e) {
  if (e == null)
    return "o";
  switch (e.charCodeAt(0)) {
    case 91:
    case 93:
    case 46:
    case 34:
    case 39:
      return e;
    case 95:
    case 36:
    case 45:
      return "i";
    case 9:
    case 10:
    case 13:
    case 160:
    case 65279:
    case 8232:
    case 8233:
      return "w";
  }
  return "i";
}
function Sc(e) {
  const t = e.trim();
  return e.charAt(0) === "0" && isNaN(parseInt(e)) ? !1 : Pc(t) ? kc(t) : "*" + t;
}
function Mc(e) {
  const t = [];
  let n = -1, r = 0, l = 0, s, a, c, u, d, _, E;
  const b = [];
  b[0] = () => {
    a === void 0 ? a = c : a += c;
  }, b[1] = () => {
    a !== void 0 && (t.push(a), a = void 0);
  }, b[2] = () => {
    b[0](), l++;
  }, b[3] = () => {
    if (l > 0)
      l--, r = 4, b[0]();
    else {
      if (l = 0, a === void 0 || (a = Sc(a), a === !1))
        return !1;
      b[1]();
    }
  };
  function v() {
    const R = e[n + 1];
    if (r === 5 && R === "'" || r === 6 && R === '"')
      return n++, c = "\\" + R, b[0](), !0;
  }
  for (; r !== null; )
    if (n++, s = e[n], !(s === "\\" && v())) {
      if (u = Rc(s), E = Et[r], d = E[u] || E.l || 8, d === 8 || (r = d[0], d[1] !== void 0 && (_ = b[d[1]], _ && (c = s, _() === !1))))
        return;
      if (r === 7)
        return t;
    }
}
const Fs = /* @__PURE__ */ new Map();
function wc(e, t) {
  return re(e) ? e[t] : null;
}
function xc(e, t) {
  if (!re(e))
    return null;
  let n = Fs.get(t);
  if (n || (n = Mc(t), n && Fs.set(t, n)), !n)
    return null;
  const r = n.length;
  let l = e, s = 0;
  for (; s < r; ) {
    const a = l[n[s]];
    if (a === void 0)
      return null;
    l = a, s++;
  }
  return l;
}
const Dc = (e) => e, Uc = (e) => "", Wc = "text", $c = (e) => e.length === 0 ? "" : e.join(""), Hc = ic;
function Ps(e, t) {
  return e = Math.abs(e), t === 2 ? e ? e > 1 ? 1 : 0 : 1 : e ? Math.min(e, 2) : 0;
}
function jc(e) {
  const t = de(e.pluralIndex) ? e.pluralIndex : -1;
  return e.named && (de(e.named.count) || de(e.named.n)) ? de(e.named.count) ? e.named.count : de(e.named.n) ? e.named.n : t : t;
}
function Vc(e, t) {
  t.count || (t.count = e), t.n || (t.n = e);
}
function Bc(e = {}) {
  const t = e.locale, n = jc(e), r = re(e.pluralRules) && M(t) && ce(e.pluralRules[t]) ? e.pluralRules[t] : Ps, l = re(e.pluralRules) && M(t) && ce(e.pluralRules[t]) ? Ps : void 0, s = (h) => h[r(n, h.length, l)], a = e.list || [], c = (h) => a[h], u = e.named || {};
  de(e.pluralIndex) && Vc(n, u);
  const d = (h) => u[h];
  function _(h) {
    const O = ce(e.messages) ? e.messages(h) : re(e.messages) ? e.messages[h] : !1;
    return O || (e.parent ? e.parent.message(h) : Uc);
  }
  const E = (h) => e.modifiers ? e.modifiers[h] : Dc, b = H(e.processor) && ce(e.processor.normalize) ? e.processor.normalize : $c, v = H(e.processor) && ce(e.processor.interpolate) ? e.processor.interpolate : Hc, R = H(e.processor) && M(e.processor.type) ? e.processor.type : Wc, S = {
    list: c,
    named: d,
    plural: s,
    linked: (h, ...O) => {
      const [C, T] = O;
      let y = "text", w = "";
      O.length === 1 ? re(C) ? (w = C.modifier || w, y = C.type || y) : M(C) && (w = C || w) : O.length === 2 && (M(C) && (w = C || w), M(T) && (y = T || y));
      let x = _(h)(S);
      return y === "vnode" && ne(x) && w && (x = x[0]), w ? E(w)(x, y) : x;
    },
    message: _,
    type: R,
    interpolate: v,
    normalize: b
  };
  return S;
}
let an = null;
function Kc(e) {
  an = e;
}
function Yc(e, t, n) {
  an && an.emit(zl.I18nInit, {
    timestamp: Date.now(),
    i18n: e,
    version: t,
    meta: n
  });
}
const Xc = /* @__PURE__ */ Gc(zl.FunctionTranslate);
function Gc(e) {
  return (t) => an && an.emit(e, t);
}
const Jc = {
  NOT_FOUND_KEY: 1,
  FALLBACK_TO_TRANSLATE: 2,
  CANNOT_FORMAT_NUMBER: 3,
  FALLBACK_TO_NUMBER_FORMAT: 4,
  CANNOT_FORMAT_DATE: 5,
  FALLBACK_TO_DATE_FORMAT: 6,
  __EXTEND_POINT__: 7
};
function qc(e, t, n) {
  return [.../* @__PURE__ */ new Set([
    n,
    ...ne(t) ? t : re(t) ? Object.keys(t) : M(t) ? [t] : [n]
  ])];
}
function ea(e, t, n) {
  const r = M(n) ? n : cn, l = e;
  l.__localeChainCache || (l.__localeChainCache = /* @__PURE__ */ new Map());
  let s = l.__localeChainCache.get(r);
  if (!s) {
    s = [];
    let a = [n];
    for (; ne(a); )
      a = ks(s, a, t);
    const c = ne(t) || !H(t) ? t : t.default ? t.default : null;
    a = M(c) ? [c] : c, ne(a) && ks(s, a, !1), l.__localeChainCache.set(r, s);
  }
  return s;
}
function ks(e, t, n) {
  let r = !0;
  for (let l = 0; l < t.length && X(r); l++) {
    const s = t[l];
    M(s) && (r = Qc(e, t[l], n));
  }
  return r;
}
function Qc(e, t, n) {
  let r;
  const l = t.split("-");
  do {
    const s = l.join("-");
    r = Zc(e, s, n), l.splice(-1, 1);
  } while (l.length && r === !0);
  return r;
}
function Zc(e, t, n) {
  let r = !1;
  if (!e.includes(t) && (r = !0, t)) {
    r = t[t.length - 1] !== "!";
    const l = t.replace(/!/g, "");
    e.push(l), (ne(n) || H(n)) && n[l] && (r = n[l]);
  }
  return r;
}
const zc = "9.2.2", Un = -1, cn = "en-US", Rs = "", Ss = (e) => `${e.charAt(0).toLocaleUpperCase()}${e.substr(1)}`;
function eu() {
  return {
    upper: (e, t) => t === "text" && M(e) ? e.toUpperCase() : t === "vnode" && re(e) && "__v_isVNode" in e ? e.children.toUpperCase() : e,
    lower: (e, t) => t === "text" && M(e) ? e.toLowerCase() : t === "vnode" && re(e) && "__v_isVNode" in e ? e.children.toLowerCase() : e,
    capitalize: (e, t) => t === "text" && M(e) ? Ss(e) : t === "vnode" && re(e) && "__v_isVNode" in e ? Ss(e.children) : e
  };
}
let ta;
function tu(e) {
  ta = e;
}
let na;
function nu(e) {
  na = e;
}
let ra;
function ru(e) {
  ra = e;
}
let sa = null;
const Ms = (e) => {
  sa = e;
}, su = () => sa;
let la = null;
const ws = (e) => {
  la = e;
}, lu = () => la;
let xs = 0;
function au(e = {}) {
  const t = M(e.version) ? e.version : zc, n = M(e.locale) ? e.locale : cn, r = ne(e.fallbackLocale) || H(e.fallbackLocale) || M(e.fallbackLocale) || e.fallbackLocale === !1 ? e.fallbackLocale : n, l = H(e.messages) ? e.messages : { [n]: {} }, s = H(e.datetimeFormats) ? e.datetimeFormats : { [n]: {} }, a = H(e.numberFormats) ? e.numberFormats : { [n]: {} }, c = _e({}, e.modifiers || {}, eu()), u = e.pluralRules || {}, d = ce(e.missing) ? e.missing : null, _ = X(e.missingWarn) || pt(e.missingWarn) ? e.missingWarn : !0, E = X(e.fallbackWarn) || pt(e.fallbackWarn) ? e.fallbackWarn : !0, b = !!e.fallbackFormat, v = !!e.unresolving, R = ce(e.postTranslation) ? e.postTranslation : null, A = H(e.processor) ? e.processor : null, S = X(e.warnHtmlMessage) ? e.warnHtmlMessage : !0, h = !!e.escapeParameter, O = ce(e.messageCompiler) ? e.messageCompiler : ta, C = ce(e.messageResolver) ? e.messageResolver : na || wc, T = ce(e.localeFallbacker) ? e.localeFallbacker : ra || qc, y = re(e.fallbackContext) ? e.fallbackContext : void 0, w = ce(e.onWarn) ? e.onWarn : lc, x = e, W = re(x.__datetimeFormatters) ? x.__datetimeFormatters : /* @__PURE__ */ new Map(), $ = re(x.__numberFormatters) ? x.__numberFormatters : /* @__PURE__ */ new Map(), K = re(x.__meta) ? x.__meta : {};
  xs++;
  const ee = {
    version: t,
    cid: xs,
    locale: n,
    fallbackLocale: r,
    messages: l,
    modifiers: c,
    pluralRules: u,
    missing: d,
    missingWarn: _,
    fallbackWarn: E,
    fallbackFormat: b,
    unresolving: v,
    postTranslation: R,
    processor: A,
    warnHtmlMessage: S,
    escapeParameter: h,
    messageCompiler: O,
    messageResolver: C,
    localeFallbacker: T,
    fallbackContext: y,
    onWarn: w,
    __meta: K
  };
  return ee.datetimeFormats = s, ee.numberFormats = a, ee.__datetimeFormatters = W, ee.__numberFormatters = $, __INTLIFY_PROD_DEVTOOLS__ && Yc(ee, t, K), ee;
}
function Br(e, t, n, r, l) {
  const { missing: s, onWarn: a } = e;
  if (s !== null) {
    const c = s(e, n, t, l);
    return M(c) ? c : t;
  } else
    return t;
}
function Xt(e, t, n) {
  const r = e;
  r.__localeChainCache = /* @__PURE__ */ new Map(), e.localeFallbacker(e, n, t);
}
const iu = (e) => e;
let Ds = /* @__PURE__ */ Object.create(null);
function ou(e, t = {}) {
  {
    const r = (t.onCacheKey || iu)(e), l = Ds[r];
    if (l)
      return l;
    let s = !1;
    const a = t.onError || oc;
    t.onError = (d) => {
      s = !0, a(d);
    };
    const { code: c } = Ac(e, t), u = new Function(`return ${c}`)();
    return s ? u : Ds[r] = u;
  }
}
let aa = Q.__EXTEND_POINT__;
const Gn = () => ++aa, Rt = {
  INVALID_ARGUMENT: aa,
  INVALID_DATE_ARGUMENT: Gn(),
  INVALID_ISO_DATE_ARGUMENT: Gn(),
  __EXTEND_POINT__: Gn()
};
function St(e) {
  return Dn(e, null, void 0);
}
const Us = () => "", Qe = (e) => ce(e);
function Ws(e, ...t) {
  const { fallbackFormat: n, postTranslation: r, unresolving: l, messageCompiler: s, fallbackLocale: a, messages: c } = e, [u, d] = fr(...t), _ = X(d.missingWarn) ? d.missingWarn : e.missingWarn, E = X(d.fallbackWarn) ? d.fallbackWarn : e.fallbackWarn, b = X(d.escapeParameter) ? d.escapeParameter : e.escapeParameter, v = !!d.resolvedMessage, R = M(d.default) || X(d.default) ? X(d.default) ? s ? u : () => u : d.default : n ? s ? u : () => u : "", A = n || R !== "", S = M(d.locale) ? d.locale : e.locale;
  b && cu(d);
  let [h, O, C] = v ? [
    u,
    S,
    c[S] || {}
  ] : ia(e, u, S, a, E, _), T = h, y = u;
  if (!v && !(M(T) || Qe(T)) && A && (T = R, y = T), !v && (!(M(T) || Qe(T)) || !M(O)))
    return l ? Un : u;
  let w = !1;
  const x = () => {
    w = !0;
  }, W = Qe(T) ? T : oa(e, u, O, T, y, x);
  if (w)
    return T;
  const $ = du(e, O, C, d), K = Bc($), ee = uu(e, W, K), oe = r ? r(ee, u) : ee;
  if (__INTLIFY_PROD_DEVTOOLS__) {
    const ae = {
      timestamp: Date.now(),
      key: M(u) ? u : Qe(T) ? T.key : "",
      locale: O || (Qe(T) ? T.locale : ""),
      format: M(T) ? T : Qe(T) ? T.source : "",
      message: oe
    };
    ae.meta = _e({}, e.__meta, su() || {}), Xc(ae);
  }
  return oe;
}
function cu(e) {
  ne(e.list) ? e.list = e.list.map((t) => M(t) ? vs(t) : t) : re(e.named) && Object.keys(e.named).forEach((t) => {
    M(e.named[t]) && (e.named[t] = vs(e.named[t]));
  });
}
function ia(e, t, n, r, l, s) {
  const { messages: a, onWarn: c, messageResolver: u, localeFallbacker: d } = e, _ = d(e, r, n);
  let E = {}, b, v = null;
  const R = "translate";
  for (let A = 0; A < _.length && (b = _[A], E = a[b] || {}, (v = u(E, t)) === null && (v = E[t]), !(M(v) || ce(v))); A++) {
    const S = Br(
      e,
      t,
      b,
      s,
      R
    );
    S !== t && (v = S);
  }
  return [v, b, E];
}
function oa(e, t, n, r, l, s) {
  const { messageCompiler: a, warnHtmlMessage: c } = e;
  if (Qe(r)) {
    const d = r;
    return d.locale = d.locale || n, d.key = d.key || t, d;
  }
  if (a == null) {
    const d = () => r;
    return d.locale = n, d.key = t, d;
  }
  const u = a(r, fu(e, n, l, r, c, s));
  return u.locale = n, u.key = t, u.source = r, u;
}
function uu(e, t, n) {
  return t(n);
}
function fr(...e) {
  const [t, n, r] = e, l = {};
  if (!M(t) && !de(t) && !Qe(t))
    throw St(Rt.INVALID_ARGUMENT);
  const s = de(t) ? String(t) : (Qe(t), t);
  return de(n) ? l.plural = n : M(n) ? l.default = n : H(n) && !xn(n) ? l.named = n : ne(n) && (l.list = n), de(r) ? l.plural = r : M(r) ? l.default = r : H(r) && _e(l, r), [s, l];
}
function fu(e, t, n, r, l, s) {
  return {
    warnHtmlMessage: l,
    onError: (a) => {
      throw s && s(a), a;
    },
    onCacheKey: (a) => nc(t, n, a)
  };
}
function du(e, t, n, r) {
  const { modifiers: l, pluralRules: s, messageResolver: a, fallbackLocale: c, fallbackWarn: u, missingWarn: d, fallbackContext: _ } = e, b = {
    locale: t,
    modifiers: l,
    pluralRules: s,
    messages: (v) => {
      let R = a(n, v);
      if (R == null && _) {
        const [, , A] = ia(_, v, t, c, u, d);
        R = a(A, v);
      }
      if (M(R)) {
        let A = !1;
        const h = oa(e, v, t, R, v, () => {
          A = !0;
        });
        return A ? Us : h;
      } else
        return Qe(R) ? R : Us;
    }
  };
  return e.processor && (b.processor = e.processor), r.list && (b.list = r.list), r.named && (b.named = r.named), de(r.plural) && (b.pluralIndex = r.plural), b;
}
function $s(e, ...t) {
  const { datetimeFormats: n, unresolving: r, fallbackLocale: l, onWarn: s, localeFallbacker: a } = e, { __datetimeFormatters: c } = e, [u, d, _, E] = dr(...t), b = X(_.missingWarn) ? _.missingWarn : e.missingWarn;
  X(_.fallbackWarn) ? _.fallbackWarn : e.fallbackWarn;
  const v = !!_.part, R = M(_.locale) ? _.locale : e.locale, A = a(
    e,
    l,
    R
  );
  if (!M(u) || u === "")
    return new Intl.DateTimeFormat(R, E).format(d);
  let S = {}, h, O = null;
  const C = "datetime format";
  for (let w = 0; w < A.length && (h = A[w], S = n[h] || {}, O = S[u], !H(O)); w++)
    Br(e, u, h, b, C);
  if (!H(O) || !M(h))
    return r ? Un : u;
  let T = `${h}__${u}`;
  xn(E) || (T = `${T}__${JSON.stringify(E)}`);
  let y = c.get(T);
  return y || (y = new Intl.DateTimeFormat(h, _e({}, O, E)), c.set(T, y)), v ? y.formatToParts(d) : y.format(d);
}
const ca = [
  "localeMatcher",
  "weekday",
  "era",
  "year",
  "month",
  "day",
  "hour",
  "minute",
  "second",
  "timeZoneName",
  "formatMatcher",
  "hour12",
  "timeZone",
  "dateStyle",
  "timeStyle",
  "calendar",
  "dayPeriod",
  "numberingSystem",
  "hourCycle",
  "fractionalSecondDigits"
];
function dr(...e) {
  const [t, n, r, l] = e, s = {};
  let a = {}, c;
  if (M(t)) {
    const u = t.match(/(\d{4}-\d{2}-\d{2})(T|\s)?(.*)/);
    if (!u)
      throw St(Rt.INVALID_ISO_DATE_ARGUMENT);
    const d = u[3] ? u[3].trim().startsWith("T") ? `${u[1].trim()}${u[3].trim()}` : `${u[1].trim()}T${u[3].trim()}` : u[1].trim();
    c = new Date(d);
    try {
      c.toISOString();
    } catch {
      throw St(Rt.INVALID_ISO_DATE_ARGUMENT);
    }
  } else if (sc(t)) {
    if (isNaN(t.getTime()))
      throw St(Rt.INVALID_DATE_ARGUMENT);
    c = t;
  } else if (de(t))
    c = t;
  else
    throw St(Rt.INVALID_ARGUMENT);
  return M(n) ? s.key = n : H(n) && Object.keys(n).forEach((u) => {
    ca.includes(u) ? a[u] = n[u] : s[u] = n[u];
  }), M(r) ? s.locale = r : H(r) && (a = r), H(l) && (a = l), [s.key || "", c, s, a];
}
function Hs(e, t, n) {
  const r = e;
  for (const l in n) {
    const s = `${t}__${l}`;
    !r.__datetimeFormatters.has(s) || r.__datetimeFormatters.delete(s);
  }
}
function js(e, ...t) {
  const { numberFormats: n, unresolving: r, fallbackLocale: l, onWarn: s, localeFallbacker: a } = e, { __numberFormatters: c } = e, [u, d, _, E] = mr(...t), b = X(_.missingWarn) ? _.missingWarn : e.missingWarn;
  X(_.fallbackWarn) ? _.fallbackWarn : e.fallbackWarn;
  const v = !!_.part, R = M(_.locale) ? _.locale : e.locale, A = a(
    e,
    l,
    R
  );
  if (!M(u) || u === "")
    return new Intl.NumberFormat(R, E).format(d);
  let S = {}, h, O = null;
  const C = "number format";
  for (let w = 0; w < A.length && (h = A[w], S = n[h] || {}, O = S[u], !H(O)); w++)
    Br(e, u, h, b, C);
  if (!H(O) || !M(h))
    return r ? Un : u;
  let T = `${h}__${u}`;
  xn(E) || (T = `${T}__${JSON.stringify(E)}`);
  let y = c.get(T);
  return y || (y = new Intl.NumberFormat(h, _e({}, O, E)), c.set(T, y)), v ? y.formatToParts(d) : y.format(d);
}
const ua = [
  "localeMatcher",
  "style",
  "currency",
  "currencyDisplay",
  "currencySign",
  "useGrouping",
  "minimumIntegerDigits",
  "minimumFractionDigits",
  "maximumFractionDigits",
  "minimumSignificantDigits",
  "maximumSignificantDigits",
  "compactDisplay",
  "notation",
  "signDisplay",
  "unit",
  "unitDisplay",
  "roundingMode",
  "roundingPriority",
  "roundingIncrement",
  "trailingZeroDisplay"
];
function mr(...e) {
  const [t, n, r, l] = e, s = {};
  let a = {};
  if (!de(t))
    throw St(Rt.INVALID_ARGUMENT);
  const c = t;
  return M(n) ? s.key = n : H(n) && Object.keys(n).forEach((u) => {
    ua.includes(u) ? a[u] = n[u] : s[u] = n[u];
  }), M(r) ? s.locale = r : H(r) && (a = r), H(l) && (a = l), [s.key || "", c, s, a];
}
function Vs(e, t, n) {
  const r = e;
  for (const l in n) {
    const s = `${t}__${l}`;
    !r.__numberFormatters.has(s) || r.__numberFormatters.delete(s);
  }
}
typeof __INTLIFY_PROD_DEVTOOLS__ != "boolean" && (Zt().__INTLIFY_PROD_DEVTOOLS__ = !1);
/*!
  * vue-i18n v9.2.2
  * (c) 2022 kazuya kawaguchi
  * Released under the MIT License.
  */
const mu = "9.2.2";
function _u() {
  typeof __VUE_I18N_FULL_INSTALL__ != "boolean" && (Zt().__VUE_I18N_FULL_INSTALL__ = !0), typeof __VUE_I18N_LEGACY_API__ != "boolean" && (Zt().__VUE_I18N_LEGACY_API__ = !0), typeof __INTLIFY_PROD_DEVTOOLS__ != "boolean" && (Zt().__INTLIFY_PROD_DEVTOOLS__ = !1);
}
Jc.__EXTEND_POINT__;
let fa = Q.__EXTEND_POINT__;
const Ne = () => ++fa, fe = {
  UNEXPECTED_RETURN_TYPE: fa,
  INVALID_ARGUMENT: Ne(),
  MUST_BE_CALL_SETUP_TOP: Ne(),
  NOT_INSLALLED: Ne(),
  NOT_AVAILABLE_IN_LEGACY_MODE: Ne(),
  REQUIRED_VALUE: Ne(),
  INVALID_VALUE: Ne(),
  CANNOT_SETUP_VUE_DEVTOOLS_PLUGIN: Ne(),
  NOT_INSLALLED_WITH_PROVIDE: Ne(),
  UNEXPECTED_ERROR: Ne(),
  NOT_COMPATIBLE_LEGACY_VUE_I18N: Ne(),
  BRIDGE_SUPPORT_VUE_2_ONLY: Ne(),
  MUST_DEFINE_I18N_OPTION_IN_ALLOW_COMPOSITION: Ne(),
  NOT_AVAILABLE_COMPOSITION_IN_LEGACY: Ne(),
  __EXTEND_POINT__: Ne()
};
function me(e, ...t) {
  return Dn(e, null, void 0);
}
const _r = /* @__PURE__ */ bt("__transrateVNode"), gr = /* @__PURE__ */ bt("__datetimeParts"), hr = /* @__PURE__ */ bt("__numberParts"), da = bt("__setPluralRules");
bt("__intlifyMeta");
const ma = /* @__PURE__ */ bt("__injectWithOption");
function pr(e) {
  if (!re(e))
    return e;
  for (const t in e)
    if (!!Hr(e, t))
      if (!t.includes("."))
        re(e[t]) && pr(e[t]);
      else {
        const n = t.split("."), r = n.length - 1;
        let l = e;
        for (let s = 0; s < r; s++)
          n[s] in l || (l[n[s]] = {}), l = l[n[s]];
        l[n[r]] = e[t], delete e[t], re(l[n[r]]) && pr(l[n[r]]);
      }
  return e;
}
function Wn(e, t) {
  const { messages: n, __i18n: r, messageResolver: l, flatJson: s } = t, a = H(n) ? n : ne(r) ? {} : { [e]: {} };
  if (ne(r) && r.forEach((c) => {
    if ("locale" in c && "resource" in c) {
      const { locale: u, resource: d } = c;
      u ? (a[u] = a[u] || {}, zt(d, a[u])) : zt(d, a);
    } else
      M(c) && zt(JSON.parse(c), a);
  }), l == null && s)
    for (const c in a)
      Hr(a, c) && pr(a[c]);
  return a;
}
const hn = (e) => !re(e) || ne(e);
function zt(e, t) {
  if (hn(e) || hn(t))
    throw me(fe.INVALID_VALUE);
  for (const n in e)
    Hr(e, n) && (hn(e[n]) || hn(t[n]) ? t[n] = e[n] : zt(e[n], t[n]));
}
function _a(e) {
  return e.type;
}
function ga(e, t, n) {
  let r = re(t.messages) ? t.messages : {};
  "__i18nGlobal" in n && (r = Wn(e.locale.value, {
    messages: r,
    __i18n: n.__i18nGlobal
  }));
  const l = Object.keys(r);
  l.length && l.forEach((s) => {
    e.mergeLocaleMessage(s, r[s]);
  });
  {
    if (re(t.datetimeFormats)) {
      const s = Object.keys(t.datetimeFormats);
      s.length && s.forEach((a) => {
        e.mergeDateTimeFormat(a, t.datetimeFormats[a]);
      });
    }
    if (re(t.numberFormats)) {
      const s = Object.keys(t.numberFormats);
      s.length && s.forEach((a) => {
        e.mergeNumberFormat(a, t.numberFormats[a]);
      });
    }
  }
}
function Bs(e) {
  return Oe(on, null, e, 0);
}
const Ks = "__INTLIFY_META__";
let Ys = 0;
function Xs(e) {
  return (t, n, r, l) => e(n, r, $t() || void 0, l);
}
const gu = () => {
  const e = $t();
  let t = null;
  return e && (t = _a(e)[Ks]) ? { [Ks]: t } : null;
};
function Kr(e = {}, t) {
  const { __root: n } = e, r = n === void 0;
  let l = X(e.inheritLocale) ? e.inheritLocale : !0;
  const s = Ze(
    n && l ? n.locale.value : M(e.locale) ? e.locale : cn
  ), a = Ze(
    n && l ? n.fallbackLocale.value : M(e.fallbackLocale) || ne(e.fallbackLocale) || H(e.fallbackLocale) || e.fallbackLocale === !1 ? e.fallbackLocale : s.value
  ), c = Ze(Wn(s.value, e)), u = Ze(H(e.datetimeFormats) ? e.datetimeFormats : { [s.value]: {} }), d = Ze(H(e.numberFormats) ? e.numberFormats : { [s.value]: {} });
  let _ = n ? n.missingWarn : X(e.missingWarn) || pt(e.missingWarn) ? e.missingWarn : !0, E = n ? n.fallbackWarn : X(e.fallbackWarn) || pt(e.fallbackWarn) ? e.fallbackWarn : !0, b = n ? n.fallbackRoot : X(e.fallbackRoot) ? e.fallbackRoot : !0, v = !!e.fallbackFormat, R = ce(e.missing) ? e.missing : null, A = ce(e.missing) ? Xs(e.missing) : null, S = ce(e.postTranslation) ? e.postTranslation : null, h = n ? n.warnHtmlMessage : X(e.warnHtmlMessage) ? e.warnHtmlMessage : !0, O = !!e.escapeParameter;
  const C = n ? n.modifiers : H(e.modifiers) ? e.modifiers : {};
  let T = e.pluralRules || n && n.pluralRules, y;
  y = (() => {
    r && ws(null);
    const p = {
      version: mu,
      locale: s.value,
      fallbackLocale: a.value,
      messages: c.value,
      modifiers: C,
      pluralRules: T,
      missing: A === null ? void 0 : A,
      missingWarn: _,
      fallbackWarn: E,
      fallbackFormat: v,
      unresolving: !0,
      postTranslation: S === null ? void 0 : S,
      warnHtmlMessage: h,
      escapeParameter: O,
      messageResolver: e.messageResolver,
      __meta: { framework: "vue" }
    };
    p.datetimeFormats = u.value, p.numberFormats = d.value, p.__datetimeFormatters = H(y) ? y.__datetimeFormatters : void 0, p.__numberFormatters = H(y) ? y.__numberFormatters : void 0;
    const L = au(p);
    return r && ws(L), L;
  })(), Xt(y, s.value, a.value);
  function x() {
    return [
      s.value,
      a.value,
      c.value,
      u.value,
      d.value
    ];
  }
  const W = He({
    get: () => s.value,
    set: (p) => {
      s.value = p, y.locale = s.value;
    }
  }), $ = He({
    get: () => a.value,
    set: (p) => {
      a.value = p, y.fallbackLocale = a.value, Xt(y, s.value, p);
    }
  }), K = He(() => c.value), ee = /* @__PURE__ */ He(() => u.value), oe = /* @__PURE__ */ He(() => d.value);
  function ae() {
    return ce(S) ? S : null;
  }
  function ke(p) {
    S = p, y.postTranslation = p;
  }
  function ot() {
    return R;
  }
  function te(p) {
    p !== null && (A = Xs(p)), R = p, y.missing = A;
  }
  const G = (p, L, D, U, V, z) => {
    x();
    let Y;
    if (__INTLIFY_PROD_DEVTOOLS__)
      try {
        Ms(gu()), r || (y.fallbackContext = n ? lu() : void 0), Y = p(y);
      } finally {
        Ms(null), r || (y.fallbackContext = void 0);
      }
    else
      Y = p(y);
    if (de(Y) && Y === Un) {
      const [ie, Se] = L();
      return n && b ? U(n) : V(ie);
    } else {
      if (z(Y))
        return Y;
      throw me(fe.UNEXPECTED_RETURN_TYPE);
    }
  };
  function J(...p) {
    return G((L) => Reflect.apply(Ws, null, [L, ...p]), () => fr(...p), "translate", (L) => Reflect.apply(L.t, L, [...p]), (L) => L, (L) => M(L));
  }
  function ye(...p) {
    const [L, D, U] = p;
    if (U && !re(U))
      throw me(fe.INVALID_ARGUMENT);
    return J(L, D, _e({ resolvedMessage: !0 }, U || {}));
  }
  function Be(...p) {
    return G((L) => Reflect.apply($s, null, [L, ...p]), () => dr(...p), "datetime format", (L) => Reflect.apply(L.d, L, [...p]), () => Rs, (L) => M(L));
  }
  function Fe(...p) {
    return G((L) => Reflect.apply(js, null, [L, ...p]), () => mr(...p), "number format", (L) => Reflect.apply(L.n, L, [...p]), () => Rs, (L) => M(L));
  }
  function pe(p) {
    return p.map((L) => M(L) || de(L) || X(L) ? Bs(String(L)) : L);
  }
  const ct = {
    normalize: pe,
    interpolate: (p) => p,
    type: "vnode"
  };
  function Tt(...p) {
    return G(
      (L) => {
        let D;
        const U = L;
        try {
          U.processor = ct, D = Reflect.apply(Ws, null, [U, ...p]);
        } finally {
          U.processor = null;
        }
        return D;
      },
      () => fr(...p),
      "translate",
      (L) => L[_r](...p),
      (L) => [Bs(L)],
      (L) => ne(L)
    );
  }
  function Le(...p) {
    return G(
      (L) => Reflect.apply(js, null, [L, ...p]),
      () => mr(...p),
      "number format",
      (L) => L[hr](...p),
      () => [],
      (L) => M(L) || ne(L)
    );
  }
  function Ke(...p) {
    return G(
      (L) => Reflect.apply($s, null, [L, ...p]),
      () => dr(...p),
      "datetime format",
      (L) => L[gr](...p),
      () => [],
      (L) => M(L) || ne(L)
    );
  }
  function Ye(p) {
    T = p, y.pluralRules = T;
  }
  function Ce(p, L) {
    const D = M(L) ? L : s.value, U = m(D);
    return y.messageResolver(U, p) !== null;
  }
  function Re(p) {
    let L = null;
    const D = ea(y, a.value, s.value);
    for (let U = 0; U < D.length; U++) {
      const V = c.value[D[U]] || {}, z = y.messageResolver(V, p);
      if (z != null) {
        L = z;
        break;
      }
    }
    return L;
  }
  function De(p) {
    const L = Re(p);
    return L != null ? L : n ? n.tm(p) || {} : {};
  }
  function m(p) {
    return c.value[p] || {};
  }
  function i(p, L) {
    c.value[p] = L, y.messages = c.value;
  }
  function o(p, L) {
    c.value[p] = c.value[p] || {}, zt(L, c.value[p]), y.messages = c.value;
  }
  function f(p) {
    return u.value[p] || {};
  }
  function g(p, L) {
    u.value[p] = L, y.datetimeFormats = u.value, Hs(y, p, L);
  }
  function I(p, L) {
    u.value[p] = _e(u.value[p] || {}, L), y.datetimeFormats = u.value, Hs(y, p, L);
  }
  function F(p) {
    return d.value[p] || {};
  }
  function P(p, L) {
    d.value[p] = L, y.numberFormats = d.value, Vs(y, p, L);
  }
  function k(p, L) {
    d.value[p] = _e(d.value[p] || {}, L), y.numberFormats = d.value, Vs(y, p, L);
  }
  Ys++, n && cr && (Ut(n.locale, (p) => {
    l && (s.value = p, y.locale = p, Xt(y, s.value, a.value));
  }), Ut(n.fallbackLocale, (p) => {
    l && (a.value = p, y.fallbackLocale = p, Xt(y, s.value, a.value));
  }));
  const N = {
    id: Ys,
    locale: W,
    fallbackLocale: $,
    get inheritLocale() {
      return l;
    },
    set inheritLocale(p) {
      l = p, p && n && (s.value = n.locale.value, a.value = n.fallbackLocale.value, Xt(y, s.value, a.value));
    },
    get availableLocales() {
      return Object.keys(c.value).sort();
    },
    messages: K,
    get modifiers() {
      return C;
    },
    get pluralRules() {
      return T || {};
    },
    get isGlobal() {
      return r;
    },
    get missingWarn() {
      return _;
    },
    set missingWarn(p) {
      _ = p, y.missingWarn = _;
    },
    get fallbackWarn() {
      return E;
    },
    set fallbackWarn(p) {
      E = p, y.fallbackWarn = E;
    },
    get fallbackRoot() {
      return b;
    },
    set fallbackRoot(p) {
      b = p;
    },
    get fallbackFormat() {
      return v;
    },
    set fallbackFormat(p) {
      v = p, y.fallbackFormat = v;
    },
    get warnHtmlMessage() {
      return h;
    },
    set warnHtmlMessage(p) {
      h = p, y.warnHtmlMessage = p;
    },
    get escapeParameter() {
      return O;
    },
    set escapeParameter(p) {
      O = p, y.escapeParameter = p;
    },
    t: J,
    getLocaleMessage: m,
    setLocaleMessage: i,
    mergeLocaleMessage: o,
    getPostTranslationHandler: ae,
    setPostTranslationHandler: ke,
    getMissingHandler: ot,
    setMissingHandler: te,
    [da]: Ye
  };
  return N.datetimeFormats = ee, N.numberFormats = oe, N.rt = ye, N.te = Ce, N.tm = De, N.d = Be, N.n = Fe, N.getDateTimeFormat = f, N.setDateTimeFormat = g, N.mergeDateTimeFormat = I, N.getNumberFormat = F, N.setNumberFormat = P, N.mergeNumberFormat = k, N[ma] = e.__injectWithOption, N[_r] = Tt, N[gr] = Ke, N[hr] = Le, N;
}
function hu(e) {
  const t = M(e.locale) ? e.locale : cn, n = M(e.fallbackLocale) || ne(e.fallbackLocale) || H(e.fallbackLocale) || e.fallbackLocale === !1 ? e.fallbackLocale : t, r = ce(e.missing) ? e.missing : void 0, l = X(e.silentTranslationWarn) || pt(e.silentTranslationWarn) ? !e.silentTranslationWarn : !0, s = X(e.silentFallbackWarn) || pt(e.silentFallbackWarn) ? !e.silentFallbackWarn : !0, a = X(e.fallbackRoot) ? e.fallbackRoot : !0, c = !!e.formatFallbackMessages, u = H(e.modifiers) ? e.modifiers : {}, d = e.pluralizationRules, _ = ce(e.postTranslation) ? e.postTranslation : void 0, E = M(e.warnHtmlInMessage) ? e.warnHtmlInMessage !== "off" : !0, b = !!e.escapeParameterHtml, v = X(e.sync) ? e.sync : !0;
  let R = e.messages;
  if (H(e.sharedMessages)) {
    const y = e.sharedMessages;
    R = Object.keys(y).reduce((x, W) => {
      const $ = x[W] || (x[W] = {});
      return _e($, y[W]), x;
    }, R || {});
  }
  const { __i18n: A, __root: S, __injectWithOption: h } = e, O = e.datetimeFormats, C = e.numberFormats, T = e.flatJson;
  return {
    locale: t,
    fallbackLocale: n,
    messages: R,
    flatJson: T,
    datetimeFormats: O,
    numberFormats: C,
    missing: r,
    missingWarn: l,
    fallbackWarn: s,
    fallbackRoot: a,
    fallbackFormat: c,
    modifiers: u,
    pluralRules: d,
    postTranslation: _,
    warnHtmlMessage: E,
    escapeParameter: b,
    messageResolver: e.messageResolver,
    inheritLocale: v,
    __i18n: A,
    __root: S,
    __injectWithOption: h
  };
}
function br(e = {}, t) {
  {
    const n = Kr(hu(e)), r = {
      id: n.id,
      get locale() {
        return n.locale.value;
      },
      set locale(l) {
        n.locale.value = l;
      },
      get fallbackLocale() {
        return n.fallbackLocale.value;
      },
      set fallbackLocale(l) {
        n.fallbackLocale.value = l;
      },
      get messages() {
        return n.messages.value;
      },
      get datetimeFormats() {
        return n.datetimeFormats.value;
      },
      get numberFormats() {
        return n.numberFormats.value;
      },
      get availableLocales() {
        return n.availableLocales;
      },
      get formatter() {
        return {
          interpolate() {
            return [];
          }
        };
      },
      set formatter(l) {
      },
      get missing() {
        return n.getMissingHandler();
      },
      set missing(l) {
        n.setMissingHandler(l);
      },
      get silentTranslationWarn() {
        return X(n.missingWarn) ? !n.missingWarn : n.missingWarn;
      },
      set silentTranslationWarn(l) {
        n.missingWarn = X(l) ? !l : l;
      },
      get silentFallbackWarn() {
        return X(n.fallbackWarn) ? !n.fallbackWarn : n.fallbackWarn;
      },
      set silentFallbackWarn(l) {
        n.fallbackWarn = X(l) ? !l : l;
      },
      get modifiers() {
        return n.modifiers;
      },
      get formatFallbackMessages() {
        return n.fallbackFormat;
      },
      set formatFallbackMessages(l) {
        n.fallbackFormat = l;
      },
      get postTranslation() {
        return n.getPostTranslationHandler();
      },
      set postTranslation(l) {
        n.setPostTranslationHandler(l);
      },
      get sync() {
        return n.inheritLocale;
      },
      set sync(l) {
        n.inheritLocale = l;
      },
      get warnHtmlInMessage() {
        return n.warnHtmlMessage ? "warn" : "off";
      },
      set warnHtmlInMessage(l) {
        n.warnHtmlMessage = l !== "off";
      },
      get escapeParameterHtml() {
        return n.escapeParameter;
      },
      set escapeParameterHtml(l) {
        n.escapeParameter = l;
      },
      get preserveDirectiveContent() {
        return !0;
      },
      set preserveDirectiveContent(l) {
      },
      get pluralizationRules() {
        return n.pluralRules || {};
      },
      __composer: n,
      t(...l) {
        const [s, a, c] = l, u = {};
        let d = null, _ = null;
        if (!M(s))
          throw me(fe.INVALID_ARGUMENT);
        const E = s;
        return M(a) ? u.locale = a : ne(a) ? d = a : H(a) && (_ = a), ne(c) ? d = c : H(c) && (_ = c), Reflect.apply(n.t, n, [
          E,
          d || _ || {},
          u
        ]);
      },
      rt(...l) {
        return Reflect.apply(n.rt, n, [...l]);
      },
      tc(...l) {
        const [s, a, c] = l, u = { plural: 1 };
        let d = null, _ = null;
        if (!M(s))
          throw me(fe.INVALID_ARGUMENT);
        const E = s;
        return M(a) ? u.locale = a : de(a) ? u.plural = a : ne(a) ? d = a : H(a) && (_ = a), M(c) ? u.locale = c : ne(c) ? d = c : H(c) && (_ = c), Reflect.apply(n.t, n, [
          E,
          d || _ || {},
          u
        ]);
      },
      te(l, s) {
        return n.te(l, s);
      },
      tm(l) {
        return n.tm(l);
      },
      getLocaleMessage(l) {
        return n.getLocaleMessage(l);
      },
      setLocaleMessage(l, s) {
        n.setLocaleMessage(l, s);
      },
      mergeLocaleMessage(l, s) {
        n.mergeLocaleMessage(l, s);
      },
      d(...l) {
        return Reflect.apply(n.d, n, [...l]);
      },
      getDateTimeFormat(l) {
        return n.getDateTimeFormat(l);
      },
      setDateTimeFormat(l, s) {
        n.setDateTimeFormat(l, s);
      },
      mergeDateTimeFormat(l, s) {
        n.mergeDateTimeFormat(l, s);
      },
      n(...l) {
        return Reflect.apply(n.n, n, [...l]);
      },
      getNumberFormat(l) {
        return n.getNumberFormat(l);
      },
      setNumberFormat(l, s) {
        n.setNumberFormat(l, s);
      },
      mergeNumberFormat(l, s) {
        n.mergeNumberFormat(l, s);
      },
      getChoiceIndex(l, s) {
        return -1;
      },
      __onComponentInstanceCreated(l) {
        const { componentInstanceCreatedListener: s } = e;
        s && s(l, r);
      }
    };
    return r;
  }
}
const Yr = {
  tag: {
    type: [String, Object]
  },
  locale: {
    type: String
  },
  scope: {
    type: String,
    validator: (e) => e === "parent" || e === "global",
    default: "parent"
  },
  i18n: {
    type: Object
  }
};
function pu({ slots: e }, t) {
  return t.length === 1 && t[0] === "default" ? (e.default ? e.default() : []).reduce((r, l) => r = [
    ...r,
    ...ne(l.children) ? l.children : [l]
  ], []) : t.reduce((n, r) => {
    const l = e[r];
    return l && (n[r] = l()), n;
  }, {});
}
function ha(e) {
  return We;
}
const Gs = {
  name: "i18n-t",
  props: _e({
    keypath: {
      type: String,
      required: !0
    },
    plural: {
      type: [Number, String],
      validator: (e) => de(e) || !isNaN(e)
    }
  }, Yr),
  setup(e, t) {
    const { slots: n, attrs: r } = t, l = e.i18n || Xr({
      useScope: e.scope,
      __useComponent: !0
    });
    return () => {
      const s = Object.keys(n).filter((E) => E !== "_"), a = {};
      e.locale && (a.locale = e.locale), e.plural !== void 0 && (a.plural = M(e.plural) ? +e.plural : e.plural);
      const c = pu(t, s), u = l[_r](e.keypath, c, a), d = _e({}, r), _ = M(e.tag) || re(e.tag) ? e.tag : ha();
      return Ql(_, d, u);
    };
  }
};
function bu(e) {
  return ne(e) && !M(e[0]);
}
function pa(e, t, n, r) {
  const { slots: l, attrs: s } = t;
  return () => {
    const a = { part: !0 };
    let c = {};
    e.locale && (a.locale = e.locale), M(e.format) ? a.key = e.format : re(e.format) && (M(e.format.key) && (a.key = e.format.key), c = Object.keys(e.format).reduce((b, v) => n.includes(v) ? _e({}, b, { [v]: e.format[v] }) : b, {}));
    const u = r(e.value, a, c);
    let d = [a.key];
    ne(u) ? d = u.map((b, v) => {
      const R = l[b.type], A = R ? R({ [b.type]: b.value, index: v, parts: u }) : [b.value];
      return bu(A) && (A[0].key = `${b.type}-${v}`), A;
    }) : M(u) && (d = [u]);
    const _ = _e({}, s), E = M(e.tag) || re(e.tag) ? e.tag : ha();
    return Ql(E, _, d);
  };
}
const Js = {
  name: "i18n-n",
  props: _e({
    value: {
      type: Number,
      required: !0
    },
    format: {
      type: [String, Object]
    }
  }, Yr),
  setup(e, t) {
    const n = e.i18n || Xr({ useScope: "parent", __useComponent: !0 });
    return pa(e, t, ua, (...r) => n[hr](...r));
  }
}, qs = {
  name: "i18n-d",
  props: _e({
    value: {
      type: [Number, Date],
      required: !0
    },
    format: {
      type: [String, Object]
    }
  }, Yr),
  setup(e, t) {
    const n = e.i18n || Xr({ useScope: "parent", __useComponent: !0 });
    return pa(e, t, ca, (...r) => n[gr](...r));
  }
};
function Eu(e, t) {
  const n = e;
  if (e.mode === "composition")
    return n.__getInstance(t) || e.global;
  {
    const r = n.__getInstance(t);
    return r != null ? r.__composer : e.global.__composer;
  }
}
function Lu(e) {
  const t = (a) => {
    const { instance: c, modifiers: u, value: d } = a;
    if (!c || !c.$)
      throw me(fe.UNEXPECTED_ERROR);
    const _ = Eu(e, c.$), E = Qs(d);
    return [
      Reflect.apply(_.t, _, [...Zs(E)]),
      _
    ];
  };
  return {
    created: (a, c) => {
      const [u, d] = t(c);
      cr && e.global === d && (a.__i18nWatcher = Ut(d.locale, () => {
        c.instance && c.instance.$forceUpdate();
      })), a.__composer = d, a.textContent = u;
    },
    unmounted: (a) => {
      cr && a.__i18nWatcher && (a.__i18nWatcher(), a.__i18nWatcher = void 0, delete a.__i18nWatcher), a.__composer && (a.__composer = void 0, delete a.__composer);
    },
    beforeUpdate: (a, { value: c }) => {
      if (a.__composer) {
        const u = a.__composer, d = Qs(c);
        a.textContent = Reflect.apply(u.t, u, [
          ...Zs(d)
        ]);
      }
    },
    getSSRProps: (a) => {
      const [c] = t(a);
      return { textContent: c };
    }
  };
}
function Qs(e) {
  if (M(e))
    return { path: e };
  if (H(e)) {
    if (!("path" in e))
      throw me(fe.REQUIRED_VALUE, "path");
    return e;
  } else
    throw me(fe.INVALID_VALUE);
}
function Zs(e) {
  const { path: t, locale: n, args: r, choice: l, plural: s } = e, a = {}, c = r || {};
  return M(n) && (a.locale = n), de(l) && (a.plural = l), de(s) && (a.plural = s), [t, c, a];
}
function Tu(e, t, ...n) {
  const r = H(n[0]) ? n[0] : {}, l = !!r.useI18nComponentName;
  (X(r.globalInstall) ? r.globalInstall : !0) && (e.component(l ? "i18n" : Gs.name, Gs), e.component(Js.name, Js), e.component(qs.name, qs)), e.directive("t", Lu(t));
}
function Iu(e, t, n) {
  return {
    beforeCreate() {
      const r = $t();
      if (!r)
        throw me(fe.UNEXPECTED_ERROR);
      const l = this.$options;
      if (l.i18n) {
        const s = l.i18n;
        l.__i18n && (s.__i18n = l.__i18n), s.__root = t, this === this.$root ? this.$i18n = zs(e, s) : (s.__injectWithOption = !0, this.$i18n = br(s));
      } else
        l.__i18n ? this === this.$root ? this.$i18n = zs(e, l) : this.$i18n = br({
          __i18n: l.__i18n,
          __injectWithOption: !0,
          __root: t
        }) : this.$i18n = e;
      l.__i18nGlobal && ga(t, l, l), e.__onComponentInstanceCreated(this.$i18n), n.__setInstance(r, this.$i18n), this.$t = (...s) => this.$i18n.t(...s), this.$rt = (...s) => this.$i18n.rt(...s), this.$tc = (...s) => this.$i18n.tc(...s), this.$te = (s, a) => this.$i18n.te(s, a), this.$d = (...s) => this.$i18n.d(...s), this.$n = (...s) => this.$i18n.n(...s), this.$tm = (s) => this.$i18n.tm(s);
    },
    mounted() {
    },
    unmounted() {
      const r = $t();
      if (!r)
        throw me(fe.UNEXPECTED_ERROR);
      delete this.$t, delete this.$rt, delete this.$tc, delete this.$te, delete this.$d, delete this.$n, delete this.$tm, n.__deleteInstance(r), delete this.$i18n;
    }
  };
}
function zs(e, t) {
  e.locale = t.locale || e.locale, e.fallbackLocale = t.fallbackLocale || e.fallbackLocale, e.missing = t.missing || e.missing, e.silentTranslationWarn = t.silentTranslationWarn || e.silentFallbackWarn, e.silentFallbackWarn = t.silentFallbackWarn || e.silentFallbackWarn, e.formatFallbackMessages = t.formatFallbackMessages || e.formatFallbackMessages, e.postTranslation = t.postTranslation || e.postTranslation, e.warnHtmlInMessage = t.warnHtmlInMessage || e.warnHtmlInMessage, e.escapeParameterHtml = t.escapeParameterHtml || e.escapeParameterHtml, e.sync = t.sync || e.sync, e.__composer[da](t.pluralizationRules || e.pluralizationRules);
  const n = Wn(e.locale, {
    messages: t.messages,
    __i18n: t.__i18n
  });
  return Object.keys(n).forEach((r) => e.mergeLocaleMessage(r, n[r])), t.datetimeFormats && Object.keys(t.datetimeFormats).forEach((r) => e.mergeDateTimeFormat(r, t.datetimeFormats[r])), t.numberFormats && Object.keys(t.numberFormats).forEach((r) => e.mergeNumberFormat(r, t.numberFormats[r])), e;
}
const yu = /* @__PURE__ */ bt("global-vue-i18n");
function Cu(e = {}, t) {
  const n = __VUE_I18N_LEGACY_API__ && X(e.legacy) ? e.legacy : __VUE_I18N_LEGACY_API__, r = X(e.globalInjection) ? e.globalInjection : !0, l = __VUE_I18N_LEGACY_API__ && n ? !!e.allowComposition : !0, s = /* @__PURE__ */ new Map(), [a, c] = Nu(e, n), u = bt("");
  function d(b) {
    return s.get(b) || null;
  }
  function _(b, v) {
    s.set(b, v);
  }
  function E(b) {
    s.delete(b);
  }
  {
    const b = {
      get mode() {
        return __VUE_I18N_LEGACY_API__ && n ? "legacy" : "composition";
      },
      get allowComposition() {
        return l;
      },
      async install(v, ...R) {
        v.__VUE_I18N_SYMBOL__ = u, v.provide(v.__VUE_I18N_SYMBOL__, b), !n && r && Mu(v, b.global), __VUE_I18N_FULL_INSTALL__ && Tu(v, b, ...R), __VUE_I18N_LEGACY_API__ && n && v.mixin(Iu(c, c.__composer, b));
        const A = v.unmount;
        v.unmount = () => {
          b.dispose(), A();
        };
      },
      get global() {
        return c;
      },
      dispose() {
        a.stop();
      },
      __instances: s,
      __getInstance: d,
      __setInstance: _,
      __deleteInstance: E
    };
    return b;
  }
}
function Xr(e = {}) {
  const t = $t();
  if (t == null)
    throw me(fe.MUST_BE_CALL_SETUP_TOP);
  if (!t.isCE && t.appContext.app != null && !t.appContext.app.__VUE_I18N_SYMBOL__)
    throw me(fe.NOT_INSLALLED);
  const n = vu(t), r = Au(n), l = _a(t), s = Ou(e, l);
  if (__VUE_I18N_LEGACY_API__ && n.mode === "legacy" && !e.__useComponent) {
    if (!n.allowComposition)
      throw me(fe.NOT_AVAILABLE_IN_LEGACY_MODE);
    return ku(t, s, r, e);
  }
  if (s === "global")
    return ga(r, e, l), r;
  if (s === "parent") {
    let u = Fu(n, t, e.__useComponent);
    return u == null && (u = r), u;
  }
  const a = n;
  let c = a.__getInstance(t);
  if (c == null) {
    const u = _e({}, e);
    "__i18n" in l && (u.__i18n = l.__i18n), r && (u.__root = r), c = Kr(u), Pu(a, t), a.__setInstance(t, c);
  }
  return c;
}
function Nu(e, t, n) {
  const r = wa();
  {
    const l = __VUE_I18N_LEGACY_API__ && t ? r.run(() => br(e)) : r.run(() => Kr(e));
    if (l == null)
      throw me(fe.UNEXPECTED_ERROR);
    return [r, l];
  }
}
function vu(e) {
  {
    const t = Jt(e.isCE ? yu : e.appContext.app.__VUE_I18N_SYMBOL__);
    if (!t)
      throw me(e.isCE ? fe.NOT_INSLALLED_WITH_PROVIDE : fe.UNEXPECTED_ERROR);
    return t;
  }
}
function Ou(e, t) {
  return xn(e) ? "__i18n" in t ? "local" : "global" : e.useScope ? e.useScope : "local";
}
function Au(e) {
  return e.mode === "composition" ? e.global : e.global.__composer;
}
function Fu(e, t, n = !1) {
  let r = null;
  const l = t.root;
  let s = t.parent;
  for (; s != null; ) {
    const a = e;
    if (e.mode === "composition")
      r = a.__getInstance(s);
    else if (__VUE_I18N_LEGACY_API__) {
      const c = a.__getInstance(s);
      c != null && (r = c.__composer, n && r && !r[ma] && (r = null));
    }
    if (r != null || l === s)
      break;
    s = s.parent;
  }
  return r;
}
function Pu(e, t, n) {
  Mn(() => {
  }, t), xr(() => {
    e.__deleteInstance(t);
  }, t);
}
function ku(e, t, n, r = {}) {
  const l = t === "local", s = fi(null);
  if (l && e.proxy && !(e.proxy.$options.i18n || e.proxy.$options.__i18n))
    throw me(fe.MUST_DEFINE_I18N_OPTION_IN_ALLOW_COMPOSITION);
  const a = X(r.inheritLocale) ? r.inheritLocale : !0, c = Ze(
    l && a ? n.locale.value : M(r.locale) ? r.locale : cn
  ), u = Ze(
    l && a ? n.fallbackLocale.value : M(r.fallbackLocale) || ne(r.fallbackLocale) || H(r.fallbackLocale) || r.fallbackLocale === !1 ? r.fallbackLocale : c.value
  ), d = Ze(Wn(c.value, r)), _ = Ze(H(r.datetimeFormats) ? r.datetimeFormats : { [c.value]: {} }), E = Ze(H(r.numberFormats) ? r.numberFormats : { [c.value]: {} }), b = l ? n.missingWarn : X(r.missingWarn) || pt(r.missingWarn) ? r.missingWarn : !0, v = l ? n.fallbackWarn : X(r.fallbackWarn) || pt(r.fallbackWarn) ? r.fallbackWarn : !0, R = l ? n.fallbackRoot : X(r.fallbackRoot) ? r.fallbackRoot : !0, A = !!r.fallbackFormat, S = ce(r.missing) ? r.missing : null, h = ce(r.postTranslation) ? r.postTranslation : null, O = l ? n.warnHtmlMessage : X(r.warnHtmlMessage) ? r.warnHtmlMessage : !0, C = !!r.escapeParameter, T = l ? n.modifiers : H(r.modifiers) ? r.modifiers : {}, y = r.pluralRules || l && n.pluralRules;
  function w() {
    return [
      c.value,
      u.value,
      d.value,
      _.value,
      E.value
    ];
  }
  const x = He({
    get: () => s.value ? s.value.locale.value : c.value,
    set: (o) => {
      s.value && (s.value.locale.value = o), c.value = o;
    }
  }), W = He({
    get: () => s.value ? s.value.fallbackLocale.value : u.value,
    set: (o) => {
      s.value && (s.value.fallbackLocale.value = o), u.value = o;
    }
  }), $ = He(() => s.value ? s.value.messages.value : d.value), K = He(() => _.value), ee = He(() => E.value);
  function oe() {
    return s.value ? s.value.getPostTranslationHandler() : h;
  }
  function ae(o) {
    s.value && s.value.setPostTranslationHandler(o);
  }
  function ke() {
    return s.value ? s.value.getMissingHandler() : S;
  }
  function ot(o) {
    s.value && s.value.setMissingHandler(o);
  }
  function te(o) {
    return w(), o();
  }
  function G(...o) {
    return s.value ? te(() => Reflect.apply(s.value.t, null, [...o])) : te(() => "");
  }
  function J(...o) {
    return s.value ? Reflect.apply(s.value.rt, null, [...o]) : "";
  }
  function ye(...o) {
    return s.value ? te(() => Reflect.apply(s.value.d, null, [...o])) : te(() => "");
  }
  function Be(...o) {
    return s.value ? te(() => Reflect.apply(s.value.n, null, [...o])) : te(() => "");
  }
  function Fe(o) {
    return s.value ? s.value.tm(o) : {};
  }
  function pe(o, f) {
    return s.value ? s.value.te(o, f) : !1;
  }
  function Lt(o) {
    return s.value ? s.value.getLocaleMessage(o) : {};
  }
  function ct(o, f) {
    s.value && (s.value.setLocaleMessage(o, f), d.value[o] = f);
  }
  function Tt(o, f) {
    s.value && s.value.mergeLocaleMessage(o, f);
  }
  function Le(o) {
    return s.value ? s.value.getDateTimeFormat(o) : {};
  }
  function Ke(o, f) {
    s.value && (s.value.setDateTimeFormat(o, f), _.value[o] = f);
  }
  function Ye(o, f) {
    s.value && s.value.mergeDateTimeFormat(o, f);
  }
  function Ce(o) {
    return s.value ? s.value.getNumberFormat(o) : {};
  }
  function Re(o, f) {
    s.value && (s.value.setNumberFormat(o, f), E.value[o] = f);
  }
  function De(o, f) {
    s.value && s.value.mergeNumberFormat(o, f);
  }
  const m = {
    get id() {
      return s.value ? s.value.id : -1;
    },
    locale: x,
    fallbackLocale: W,
    messages: $,
    datetimeFormats: K,
    numberFormats: ee,
    get inheritLocale() {
      return s.value ? s.value.inheritLocale : a;
    },
    set inheritLocale(o) {
      s.value && (s.value.inheritLocale = o);
    },
    get availableLocales() {
      return s.value ? s.value.availableLocales : Object.keys(d.value);
    },
    get modifiers() {
      return s.value ? s.value.modifiers : T;
    },
    get pluralRules() {
      return s.value ? s.value.pluralRules : y;
    },
    get isGlobal() {
      return s.value ? s.value.isGlobal : !1;
    },
    get missingWarn() {
      return s.value ? s.value.missingWarn : b;
    },
    set missingWarn(o) {
      s.value && (s.value.missingWarn = o);
    },
    get fallbackWarn() {
      return s.value ? s.value.fallbackWarn : v;
    },
    set fallbackWarn(o) {
      s.value && (s.value.missingWarn = o);
    },
    get fallbackRoot() {
      return s.value ? s.value.fallbackRoot : R;
    },
    set fallbackRoot(o) {
      s.value && (s.value.fallbackRoot = o);
    },
    get fallbackFormat() {
      return s.value ? s.value.fallbackFormat : A;
    },
    set fallbackFormat(o) {
      s.value && (s.value.fallbackFormat = o);
    },
    get warnHtmlMessage() {
      return s.value ? s.value.warnHtmlMessage : O;
    },
    set warnHtmlMessage(o) {
      s.value && (s.value.warnHtmlMessage = o);
    },
    get escapeParameter() {
      return s.value ? s.value.escapeParameter : C;
    },
    set escapeParameter(o) {
      s.value && (s.value.escapeParameter = o);
    },
    t: G,
    getPostTranslationHandler: oe,
    setPostTranslationHandler: ae,
    getMissingHandler: ke,
    setMissingHandler: ot,
    rt: J,
    d: ye,
    n: Be,
    tm: Fe,
    te: pe,
    getLocaleMessage: Lt,
    setLocaleMessage: ct,
    mergeLocaleMessage: Tt,
    getDateTimeFormat: Le,
    setDateTimeFormat: Ke,
    mergeDateTimeFormat: Ye,
    getNumberFormat: Ce,
    setNumberFormat: Re,
    mergeNumberFormat: De
  };
  function i(o) {
    o.locale.value = c.value, o.fallbackLocale.value = u.value, Object.keys(d.value).forEach((f) => {
      o.mergeLocaleMessage(f, d.value[f]);
    }), Object.keys(_.value).forEach((f) => {
      o.mergeDateTimeFormat(f, _.value[f]);
    }), Object.keys(E.value).forEach((f) => {
      o.mergeNumberFormat(f, E.value[f]);
    }), o.escapeParameter = C, o.fallbackFormat = A, o.fallbackRoot = R, o.fallbackWarn = v, o.missingWarn = b, o.warnHtmlMessage = O;
  }
  return wl(() => {
    if (e.proxy == null || e.proxy.$i18n == null)
      throw me(fe.NOT_AVAILABLE_COMPOSITION_IN_LEGACY);
    const o = s.value = e.proxy.$i18n.__composer;
    t === "global" ? (c.value = o.locale.value, u.value = o.fallbackLocale.value, d.value = o.messages.value, _.value = o.datetimeFormats.value, E.value = o.numberFormats.value) : l && i(o);
  }), m;
}
const Ru = [
  "locale",
  "fallbackLocale",
  "availableLocales"
], Su = ["t", "rt", "d", "n", "tm"];
function Mu(e, t) {
  const n = /* @__PURE__ */ Object.create(null);
  Ru.forEach((r) => {
    const l = Object.getOwnPropertyDescriptor(t, r);
    if (!l)
      throw me(fe.UNEXPECTED_ERROR);
    const s = he(l.value) ? {
      get() {
        return l.value.value;
      },
      set(a) {
        l.value.value = a;
      }
    } : {
      get() {
        return l.get && l.get();
      }
    };
    Object.defineProperty(n, r, s);
  }), e.config.globalProperties.$i18n = n, Su.forEach((r) => {
    const l = Object.getOwnPropertyDescriptor(t, r);
    if (!l || !l.value)
      throw me(fe.UNEXPECTED_ERROR);
    Object.defineProperty(e.config.globalProperties, `$${r}`, l);
  });
}
tu(ou);
nu(xc);
ru(ea);
_u();
if (__INTLIFY_PROD_DEVTOOLS__) {
  const e = Zt();
  e.__INTLIFY__ = !0, Kc(e.__INTLIFY_DEVTOOLS_GLOBAL_HOOK__);
}
/**
 * 2007-2020 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
const { storePsAccounts: rt } = window, ba = rt.context.i18n.isoCode ? rt.context.i18n.isoCode : "", wu = Object.assign(
  rt.context.app === "settings" && rt.settings.translations ? rt.settings.translations : {},
  {
    ...rt.context.app === "dashboard" && rt.dashboard.translations ? rt.dashboard.translations : {}
  }
), Ea = {};
Ea[ba] = {
  currency: {
    style: "currency",
    currency: rt.context.i18n.currencyIsoCode
  }
};
const xu = Cu({
  locale: ba,
  numberFormats: Ea,
  messages: wu
});
const Du = (e, t) => {
  const n = e.__vccOpts || e;
  for (const [r, l] of t)
    n[r] = l;
  return n;
}, Uu = {}, Wu = (e) => (Ci("data-v-451aff03"), e = e(), Ni(), e), $u = { class: "config-information" }, Hu = /* @__PURE__ */ Wu(() => /* @__PURE__ */ lt("div", { class: "titleWrapper" }, [
  /* @__PURE__ */ lt("h1", { class: "title" }, " PRESTASHOP ")
], -1)), ju = { class: "description" }, Vu = { class: "text" };
function Bu(e, t) {
  return Yl(), Xl("aside", $u, [
    Hu,
    lt("div", ju, [
      lt("h2", Vu, va(e.$t("configure.incentivePanel.howTo")), 1)
    ])
  ]);
}
const Ku = /* @__PURE__ */ Du(Uu, [["render", Bu], ["__scopeId", "data-v-451aff03"]]), Yu = { id: "settingsApp" }, Xu = { class: "onboarding" }, Gu = { class: "onboarding-header" }, Ju = { class: "onboarding-content" }, qu = /* @__PURE__ */ Ui({
  __name: "App",
  setup(e) {
    return Mn(async () => {
      var n;
      if (window != null && window.psaccountsVue)
        return (n = window == null ? void 0 : window.psaccountsVue) == null ? void 0 : n.init();
      (await import("./chunk-vendors.5.4.1.js").then((r) => r.p)).default.init();
    }), (t, n) => {
      const r = Gi("prestashop-accounts");
      return Yl(), Xl("div", Yu, [
        lt("div", Xu, [
          lt("section", Gu, [
            Oe(Ku)
          ]),
          lt("section", Ju, [
            Oe(r)
          ])
        ])
      ]);
    };
  }
});
/**
 * 2007-2020 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
(async () => {
  const e = zo(qu);
  e.use(xu), e.mount("#app");
})();
