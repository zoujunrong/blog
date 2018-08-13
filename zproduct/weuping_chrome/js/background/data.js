function getBaiduTranslateResultV1(text, callback) {
    // 获取选中文本
    var from = "auto";
    var to = "auto";
    var q = text;
    var url = "http://fanyi.baidu.com/transapi";

    var reg = new RegExp("[\\u4E00-\\u9FFF]+","g");
    if(reg.test(text)){     
           from = 'zh'
           to = 'en'  
    }

    var datas = {from: from, to: to, query: q, source: 'txt'}
    httpPost(url, datas, function(response) {
        var content = '<div style="width:300px;padding:5px;"><p><img style="margin:2px;width:60px;" alt="百度翻译" src="https://fanyi.bdstatic.com/static/translation/img/header/logo_cbfea26.png"><input id="wp_translateInput" value="'+text+'" type="text" style="width:100%;" class="wp_form-control"></p>'
        var datas = response
        console.log(datas)
        if (datas) {
            if (datas.type == 1) {
                var result = JSON.parse(datas.result)
                var res = result.content
                for (var i in res) {
                    var phonic = res[i]['phonic'] ? ' 【'+res[i]['phonic']+'】' : ''
                    content += '<p class="wp_h4" style="">'+result.src+phonic+'</p>'
                    var mean = res[i]['mean']
                    for (var j in mean) {
                        var cont = mean[j]['cont']
                        content += '<p>'
                        for (var k in cont) {
                            content += k+'; '
                        }
                        content += '</p>'
                    }
                }
            } else if (datas.type == 2) {
                var data = datas.data
                if (data.length > 0) {
                    for (var i in data) {
                        content += '<p>'+data[i].dst+'</p>'
                    }
                }
            }
        }

        content += '</div>'

        callback(content)
        return
    })

}
// 百度翻译
function getBaiduTranslateResult(text, callback) {
    // 获取选中文本
    var from = "auto";
    var to = "auto";
    var q = text;
    var token = "1c5fec019689a73726d461db8dba7fe4";
    var gtk = "320305.131321201";
    var url = "http://fanyi.baidu.com/v2transapi";
    var sign = createToken(q, gtk);

    var reg = new RegExp("[\\u4E00-\\u9FFF]+","g");
    if(reg.test(text)){     
           from = 'zh'
           to = 'en'  
    }
    var datas = {from: from, to: to, query: q, token: token, transtype: 'translang', simple_means_flag: '3', sign: sign}

    httpPost(url, datas, function(response) {
        var content = '<div style="width:300px;padding:5px;"><p><img width="60" alt="百度翻译" src="https://fanyi.bdstatic.com/static/translation/img/header/logo_cbfea26.png"><input id="wp_translateInput" value="'+text+'" type="text" style="width:100%;" class="wp_form-control"></p>'
        var datas = response
        if (datas.trans_result && datas.trans_result.hasOwnProperty('data')) {
            var data = datas.trans_result.data            
            if (data.length > 0) {
                for (var i in data) {
                    content += '<p class="wp_h4 wp_blue">'+data[i]['dst']+'</p>'
                }
            }
        }

        if (datas.dict_result && datas.dict_result.hasOwnProperty('simple_means')) {
            var simple_means = datas.dict_result.simple_means
            var symbols = simple_means.symbols
            if (symbols.length > 0) {
                content += '<hr class="wp_hr"/>'
                for (var j in symbols) {
                    var word_symbol = symbols[j].hasOwnProperty(word_symbol) ? ' ['+symbols[j]['word_symbol']+']' : ''
                    content += '<p class="wp_h4">'+simple_means.word_name+word_symbol+'</p>'

                    var parts = symbols[j]['parts']
                    for (var k in parts) {
                        var means = parts[k]['means']

                        for (var l in means) {
                            if (means[l]['has_mean'] == 1) {
                                var meansStr = means[l]['means'] ? means[l]['means'].join(';') : ''
                                content += '<a href="#" title="">'+means[l]['text']+'</a> ('+meansStr+') <br/>'
                            }
                        }
                    }
                }
            }
        }

        if (datas.dict_result && datas.dict_result.hasOwnProperty('zdict')) {
            var zdict = datas.dict_result.zdict
            var detail = zdict && zdict.hasOwnProperty('detail') ? zdict.detail : []
            var simple = zdict && zdict.hasOwnProperty('simple') ? zdict.simple : []

            content += '<hr class="wp_hr"/><h3 class="wp_h4">汉语词典</h3>';
            var means = detail && detail.hasOwnProperty('means') ? detail.means : []
            if (means.length > 0) {
                for (var i in means) {
                    content += '<p class="wp_h4" style="">'+datas.dict_result.zdict.word+' 【'+means[i]['pinyin']+'】</p>'
                    var exp = means[i]['exp']
                    for (var j in exp) {
                        var des = exp[j]['des']
                        for (var k in des) {
                            content += '<p class="wp_gray">'+des[k]['main']+'<br/>'
                            content += des[k]['sub']+'</p>'
                        }
                    }
                    
                }
            }
            // 中中释义
            var means = simple && simple.hasOwnProperty('means') ? simple.means : []
            if (means.length > 0) {
                for (var i in means) {
                    content += '<p class="wp_h4" style="">'+datas.dict_result.zdict.word+' 【'+means[i]['pinyin']+'】</p>'
                    var exp = means[i]['exp']
                    for (var j in exp) {
                        var des = exp[j]['des']
                        for (var k in des) {
                            content += '<p class="wp_gray">'+des[k]['main']+'<br/>'
                            content += des[k]['sub']+'</p>'
                        }
                    }
                    
                }
            }

        }

        if (datas.dict_result && datas.dict_result.hasOwnProperty('synthesize_means')) {
            var synthesize_means = datas.dict_result.synthesize_means
            var symbols = synthesize_means.hasOwnProperty('symbols') ? synthesize_means.symbols : []
            if (symbols.length > 0) {
                content += '<hr class="wp_hr"/><h3 class="wp_h4">汉英词典</h3>'
                for (var i in symbols) {
                    var cys = symbols[i]['cys']
                    for (var j in cys) {
                        var means = cys[j]['means']
                        for (var k in means) {
                            if (means[k]['word_mean']) {
                                content += '<p class="wp_blue">'+means[k]['word_mean']+'</p>'
                            }
                            var ljs = means[k]['ljs']
                            for (var l in ljs) {
                                content += '<p class="wp_gray">'+ljs[l]['ly']+'<br/>'
                                content += ljs[l]['ls']+'</p>'
                            }
                        }
                    }
                }
            }
            
        }

        // 网络释义
        if (datas.dict_result && datas.dict_result.hasOwnProperty('netdata')) {
            var netdata = datas.dict_result.netdata
            var types = netdata && netdata['types'] ? netdata['types'] : []
            if (types.length > 0) {
                content += '<hr class="wp_hr"/><h3 class="wp_h4">网络释义</h3>'
                for (var i in types) {
                    content += '<p>'+types[i]['type']+': '+types[i]['trans']+'</p>'
                    content += '<p class="wp_gray">'+types[i]['define']+'</p>'
                }
            }
        }

        content += '</div>'

        callback(content)
        return
    })
}

function a(r, o) {
    for (var t = 0; t < o.length - 2; t += 3) {
        var a = o.charAt(t + 2);
        a = a >= "a" ? a.charCodeAt(0) - 87 : Number(a),
        a = "+" === o.charAt(t + 1) ? r >>> a: r << a,
        r = "+" === o.charAt(t) ? r + a & 4294967295 : r ^ a
    }
    return r
}
var C = null;
function createToken (r, _gtk) {
    var o = r.length;
    o > 30 && (r = "" + r.substr(0, 10) + r.substr(Math.floor(o / 2) - 5, 10) + r.substring(r.length, r.length - 10));
    var t = void 0,
    t = null !== C ? C: (C = _gtk || "") || "";
    for (var e = t.split("."), h = Number(e[0]) || 0, i = Number(e[1]) || 0, d = [], f = 0, g = 0; g < r.length; g++) {
        var m = r.charCodeAt(g);
        128 > m ? d[f++] = m: (2048 > m ? d[f++] = m >> 6 | 192 : (55296 === (64512 & m) && g + 1 < r.length && 56320 === (64512 & r.charCodeAt(g + 1)) ? (m = 65536 + ((1023 & m) << 10) + (1023 & r.charCodeAt(++g)), d[f++] = m >> 18 | 240, d[f++] = m >> 12 & 63 | 128) : d[f++] = m >> 12 | 224, d[f++] = m >> 6 & 63 | 128), d[f++] = 63 & m | 128)
    }
    for (var S = h,
    u = "+-a^+6",
    l = "+-3^+b+-f",
    s = 0; s < d.length; s++) S += d[s],
    S = a(S, u);

    return S = a(S, l),
    S ^= i,
    0 > S && (S = (2147483647 & S) + 2147483648),
    S %= 1e6,
    S.toString() + "." + (S ^ h)
}

function getBaiduSearchResult(text, callback) {
    var systemConfig = localStorage.getItem('we-systemConfig')
    systemConfig = JSON.parse(systemConfig)

    var url = text ? searchConfig[systemConfig['search']] + text : searchConfig[systemConfig['search']]
    var iframe = '<iframe id="weupingIframe" style="border:none;width:100%;height:100%;overflow-x:hidden;" src="'+url+'" />'

    callback(iframe)
}