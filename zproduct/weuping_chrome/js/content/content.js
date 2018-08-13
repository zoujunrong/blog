$(function(){
    chrome.runtime.sendMessage({'type': 'getContentConfig'}, function(datas){
        var pages = datas ? datas.pages : null
        var contentDiv = '';
        if (pages && pages.length > 0 ) {
            var title = ''
            for (var i in pages) {
                var svg = ''
                var tips = ''
                if (pages[i] == 'bookmark') {
                    title = '标签'
                    tips = '<i tip>12</i>'
                    svg = '<svg t="1510758157310" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3363" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><style type="text/css"></style></defs><path fill="#fff" d="M471.86368 72.097804C485.674955 41.934476 493.044868 42.004821 506.088062 72.343455L619.745431 336.711942C625.163575 349.314613 639.967742 355.221257 652.81146 349.9048 665.655179 344.588341 671.674797 330.062018 666.256653 317.459345L552.599283 53.090859C522.392994-17.169354 457.679046-17.787043 425.817282 51.79791L306.603706 312.156098C300.890827 324.632819 306.56746 339.291488 319.282822 344.89715 331.998182 350.50281 346.937225 344.932715 352.650101 332.455991L471.86368 72.097804ZM946.32909 396.483296C979.832725 400.051098 982.041973 406.950494 956.666908 428.497651L735.550581 616.257899C725.009777 625.208591 723.85952 640.849199 732.981408 651.192177 742.103296 661.535153 758.043057 662.663823 768.583861 653.713133L989.700188 465.952885C1048.465438 416.052555 1029.066423 355.470148 951.775584 347.23945L662.585148 316.443567C648.726743 314.967787 636.273047 324.79504 634.769039 338.393355 633.265033 351.991667 643.28025 364.211635 657.138652 365.687415L946.32909 396.483296ZM789.29175 946.034577C796.186861 978.402929 790.182336 982.596644 761.456491 965.574886L511.141715 817.248614C499.208996 810.177775 483.693933 813.937557 476.487851 825.646327 469.281769 837.355095 473.113466 852.578978 485.046185 859.649818L735.36096 1007.97609C801.886172 1047.396203 854.610867 1010.571904 838.704265 935.9001L779.188324 656.509011C776.336237 643.120205 762.962797 634.535115 749.317907 637.333673 735.673018 640.132233 726.923723 653.254684 729.775808 666.643488L789.29175 946.034577ZM232.773805 963.365201C203.531582 979.802142 197.611334 975.494605 205.23285 943.427422L271.646138 663.996497C274.812115 650.675787 266.373538 637.358852 252.798046 634.252292 239.222554 631.145732 225.65091 639.425937 222.484932 652.746647L156.071644 932.177572C138.421236 1006.440873 190.405906 1044.264612 257.865924 1006.345598L510.273487 864.46829C522.369205 857.669333 526.55766 842.536203 519.628661 830.667492 512.699663 818.798784 497.277084 814.688939 485.181367 821.487893L232.773805 963.365201ZM129.994101 501.287629C82.102458 458.686274 82.102458 458.686274 42.192755 423.185148 31.865104 413.998327 15.903056 414.766027 6.540523 424.899851-2.82201 435.033675-2.039628 450.696151 8.288022 459.88297 48.197725 495.384098 48.197725 495.384098 96.089368 537.985451L223.800416 651.58906C234.128066 660.775881 250.090114 660.008181 259.452649 649.874357 268.815181 639.740533 268.0328 624.078057 257.705148 614.891236 225.777387 586.490334 225.777387 586.490334 129.994101 501.287629ZM180.395462 382.262878C190.366845 381.267631 200.661419 380.210295 211.223313 379.09885 236.673773 376.420659 262.52381 373.552395 287.435772 370.684164 296.155283 369.680247 304.136079 368.747883 311.210485 367.910867 315.461207 367.40794 318.460849 367.049069 320.067674 366.854942 333.902965 365.183369 343.73769 352.823061 342.034144 339.247426 340.330596 325.671791 327.733879 316.021643 313.898586 317.693216 312.350014 317.880324 309.374861 318.236267 305.16739 318.734078 298.144806 319.56496 290.21721 320.49111 281.552922 321.48867 256.796887 324.338946 231.109284 327.189188 205.840444 329.848269 195.367057 330.950398 185.163505 331.998385 175.286984 332.984164 154.745362 335.034432 135.924256 336.785406 119.20766 338.183706 105.318259 339.345517 95.018524 351.33562 96.202557 364.964348 97.386591 378.593077 109.606024 388.699509 123.495425 387.537698 140.511074 386.114383 159.598349 384.338647 180.395462 382.262878Z" p-id="3364"></path></svg>'
                } else if (pages[i] == 'comment') {
                    title = '添加/显示评论'
                    svg = '<svg t="1510758000789" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3246" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><style type="text/css"></style></defs><path fill="#fff" d="M131.253515 789.333333C87.810305 789.333333 52.51282 753.473975 52.51282 709.41763L52.51282 69.333333 26.25641 96 892.853331 96C936.231586 96 971.487179 131.853286 971.487179 175.915703L971.487179 816 997.74359 789.333333 525.128205 789.333333 517.234323 789.333333 510.649171 793.754413 285.912493 944.636066C273.815607 952.757562 270.491629 969.301024 278.488179 981.586923 286.484727 993.872821 302.773675 997.248736 314.87056 989.127241L539.607238 838.245587 525.128205 842.666667 997.74359 842.666667 1024 842.666667 1024 816 1024 175.915703C1024 102.41369 965.24899 42.666667 892.853331 42.666667L26.25641 42.666667 0 42.666667 0 69.333333 0 709.41763C0 782.925715 58.804881 842.666667 131.253515 842.666667L268.117303 842.666667C282.618319 842.666667 294.373713 830.727593 294.373713 816 294.373713 801.272407 282.618319 789.333333 268.117303 789.333333L131.253515 789.333333Z" p-id="3247"></path><path fill="#fff" d="M367.589743 442.666667C367.589743 383.756294 320.568162 336 262.564102 336 204.560043 336 157.538461 383.756294 157.538461 442.666667 157.538461 501.577039 204.560043 549.333333 262.564102 549.333333 320.568162 549.333333 367.589743 501.577039 367.589743 442.666667ZM210.051282 442.666667C210.051282 413.211479 233.562074 389.333333 262.564102 389.333333 291.566133 389.333333 315.076924 413.211479 315.076924 442.666667 315.076924 472.121854 291.566133 496 262.564102 496 233.562074 496 210.051282 472.121854 210.051282 442.666667Z" p-id="3248"></path><path fill="#fff" d="M630.153845 442.666667C630.153845 383.756294 583.132265 336 525.128205 336 467.124145 336 420.102564 383.756294 420.102564 442.666667 420.102564 501.577039 467.124145 549.333333 525.128205 549.333333 583.132265 549.333333 630.153845 501.577039 630.153845 442.666667ZM472.615386 442.666667C472.615386 413.211479 496.126176 389.333333 525.128205 389.333333 554.130236 389.333333 577.641026 413.211479 577.641026 442.666667 577.641026 472.121854 554.130236 496 525.128205 496 496.126176 496 472.615386 472.121854 472.615386 442.666667Z" p-id="3249"></path><path fill="#fff" d="M892.717948 442.666667C892.717948 383.756294 845.696367 336 787.692307 336 729.688247 336 682.666667 383.756294 682.666667 442.666667 682.666667 501.577039 729.688247 549.333333 787.692307 549.333333 845.696367 549.333333 892.717948 501.577039 892.717948 442.666667ZM735.179488 442.666667C735.179488 413.211479 758.690278 389.333333 787.692307 389.333333 816.694338 389.333333 840.205129 413.211479 840.205129 442.666667 840.205129 472.121854 816.694338 496 787.692307 496 758.690278 496 735.179488 472.121854 735.179488 442.666667Z" p-id="3250"></path></svg>'
                } else if (pages[i] == 'good') {
                    title = '赞'
                    svg = '<svg t="1510757632992" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2901" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><style type="text/css"></style></defs><path fill="#fff" d="M743.328 985.536l-316.704 0c-12.896 0-23.392-10.368-23.392-23.104s10.496-23.072 23.392-23.072l316.704 0c67.296 0 99.808-36.512 115.168-67.136 0.768-1.856 1.024-3.552 1.408-5.568 2.912-14.624 7.84-39.168 40.192-77.92 23.328-27.968 19.328-57.664 14.624-92.032-1.472-10.912-2.944-21.76-3.552-32.512-2.688-45.856 9.344-65.664 26.048-93.12 3.04-4.928 6.304-10.304 9.792-16.32 15.328-26.432 14.464-59.232-2.304-87.712-20.48-34.816-59.008-55.648-103.008-55.648-77.952 0-167.808 2.656-168.672 2.656-7.776 0.288-13.888-2.72-18.464-8-4.64-5.28-6.528-12.352-5.28-19.2 0.32-1.6 29.664-160.48 29.664-230.304 0-71.616-54.336-79.328-77.632-79.328-36.832 0-66.784 39.2-66.784 87.424 0 59.936 0 80.16-31.68 123.904-43.712 60.352-126.24 161.632-188.416 161.632L275.04 450.176l0 512.224c0 12.768-10.496 23.104-23.392 23.104L117.76 985.504c-49.056 0-88.992-39.392-88.992-87.808L28.768 491.808c0-48.384 39.904-87.776 88.992-87.776l196.704 0c27.84 0 89.696-58.496 150.304-142.272 22.976-31.712 22.976-39.168 22.976-97.088 0-74.944 49.856-133.6 113.536-133.6 57.408 0 124.448 32.896 124.448 125.504 0 56.128-16.8 160.576-25.44 210.656 33.184-0.8 89.856-1.952 141.408-1.952 60.864 0 114.56 29.376 143.488 78.624 25.216 42.88 26.144 92.928 2.464 133.792-3.68 6.336-7.104 11.968-10.272 17.184-15.52 25.472-21.344 35.008-19.488 66.656 0.576 9.568 1.952 19.296 3.232 29.024 5.088 37.408 11.424 83.968-24.896 127.488-24.832 29.792-28.192 46.496-30.432 57.536-1.056 5.28-2.176 10.752-4.928 16.256C870.336 952.544 814.56 985.536 743.328 985.536L743.328 985.536zM117.76 450.208c-23.232 0-42.176 18.656-42.176 41.6l0 405.952c0 22.976 18.944 41.632 42.176 41.632l110.496 0L228.256 450.208 117.76 450.208 117.76 450.208zM117.76 450.208" p-id="2902"></path></svg>'
                } else if (pages[i] == 'edit') {
                    title = '编辑网页'
                    svg = '<svg t="1510757868179" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3130" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><style type="text/css"></style></defs><path fill="#fff" d="M34.155089 230.940227 9.17948 230.940227 9.17948 256.203386 9.17948 854.158012C9.17948 923.769568 65.248004 980.289737 134.081773 980.289737L927.938515 980.289737 952.914125 980.289737 952.914125 955.026579 952.914125 471.100561C952.914125 457.148105 941.732164 445.837402 927.938515 445.837402 914.144868 445.837402 902.962906 457.148105 902.962906 471.100561L902.962906 955.026579 927.938515 929.76342 134.081773 929.76342C92.797081 929.76342 59.130699 895.825847 59.130699 854.158012L59.130699 256.203386 34.155089 281.466543 598.93821 281.466543C612.731859 281.466543 623.91382 270.155842 623.91382 256.203386 623.91382 242.250928 612.731859 230.940227 598.93821 230.940227L34.155089 230.940227Z" p-id="3131"></path><path fill="#fff" d="M437.016339 593.503789 431.876019 600.104892 431.668623 608.505214 427.984924 757.709741 427.077935 794.446421 461.312335 782.146455 605.005395 730.519447 611.980762 728.013291 616.479561 722.067243 1003.181673 210.964228 1018.529978 190.678421 998.306108 175.379305 869.49174 77.932781 849.985487 63.176536 834.913446 82.53177 437.016339 593.503789ZM839.575373 118.395018 968.389739 215.841542 963.514174 180.256619 576.81206 691.359633 588.286225 682.907428 444.593165 734.534436 477.920574 758.971151 481.604275 609.766622 476.256559 624.768047 874.153664 113.79603 839.575373 118.395018Z" p-id="3132"></path><path fill="#fff" d="M891.217762 310.505713 920.474916 269.553252 808.309143 187.564266 779.051989 228.516725 891.217762 310.505713Z" p-id="3133"></path></svg>'
                } else if (pages[i] == 'tab') {
                    title = '标签'
                    svg = '<svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="974"><path d="M128 832.042667c0 17.002667 4.906667 20.309333 20.629333 14.016l15.36-6.144c75.733333-30.293333 193.578667-30.293333 269.354667 0l94.506667 37.802666h-31.701334l94.506667-37.802666c75.733333-30.293333 193.578667-30.293333 269.354667 0l15.36 6.144c15.658667 6.272 20.629333 2.901333 20.629333-14.016V255.957333c0-29.738667-24.746667-66.304-52.309333-77.333333l-15.36-6.144c-55.424-22.165333-150.549333-22.186667-205.973334 0l-94.506666 37.802667-15.850667 6.336-15.850667-6.336-94.506666-37.802667c-55.402667-22.165333-150.528-22.186667-205.952 0l-15.36 6.144C152.810667 189.610667 128 226.304 128 255.957333v576.085334zM164.48 139.008l15.36-6.144c65.621333-26.24 172.117333-26.218667 237.653333 0L512 170.666667l94.506667-37.802667c65.621333-26.24 172.117333-26.218667 237.653333 0l15.36 6.144c43.733333 17.493333 79.146667 69.717333 79.146667 116.949333v576.085334c0 47.104-35.477333 71.104-79.146667 53.632l-15.36-6.144c-65.621333-26.24-172.117333-26.218667-237.653333 0L512 917.333333l-94.506667-37.802666c-65.621333-26.24-172.117333-26.218667-237.653333 0l-15.36 6.144c-43.733333 17.493333-79.146667-6.4-79.146667-53.632V255.957333C85.333333 208.853333 120.810667 156.48 164.48 139.008zM490.666667 213.397333a21.333333 21.333333 0 1 1 42.666666 0v511.872a21.333333 21.333333 0 1 1-42.666666 0V213.397333z" fill="#fff" p-id="975"></path></svg>'
                }
                contentDiv += '<div title="'+title+'" weuping-button="'+pages[i]+'">'+tips+svg+'</div>';
            }
            contentDiv += '<div id="weuping-close"><svg t="1510757767738" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3015" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="200"><defs><style type="text/css"></style></defs><path fill="#fff" d="M176.661601 817.172881C168.472798 825.644055 168.701706 839.149636 177.172881 847.338438 185.644056 855.527241 199.149636 855.298332 207.338438 846.827157L826.005105 206.827157C834.193907 198.355983 833.964998 184.850403 825.493824 176.661601 817.02265 168.472798 803.517069 168.701706 795.328267 177.172881L176.661601 817.172881Z" p-id="3016"></path><path fill="#fff" d="M795.328267 846.827157C803.517069 855.298332 817.02265 855.527241 825.493824 847.338438 833.964998 839.149636 834.193907 825.644055 826.005105 817.172881L207.338438 177.172881C199.149636 168.701706 185.644056 168.472798 177.172881 176.661601 168.701706 184.850403 168.472798 198.355983 176.661601 206.827157L795.328267 846.827157Z" p-id="3017"></path></svg></div>';
            contentDiv = '<div class="weuping-content" style="display:none;">'+contentDiv+'</div>'
            contentDiv += '<div class="weuping-tips weuping-hide"><em></em><span></span><div class="weuping-tip-content scrollbar"></div></div>'
            contentDiv += '<div class="weuping-edit-selection" draggable="true"></div>'
            $('body').append(contentDiv)
        }

        // 翻译输入框重新输入时触发重新翻译
        $(document).on('blur', '#wp_translateInput', function() {
            createTranslateDiv($.trim($(this).val()))
        })

        // 监听快捷键按钮
        var pressCount = 0
        var settimeout = null
        $(document).on('keyup', function(e) {
            // ctrl + Q
            if (81 == e.keyCode && e.ctrlKey) {
                console.log($(window.getSelection()).parent('td').text())
                var selection = window.getSelection().toString()
                createTranslateDiv(selection)
                pressCount = 0
            }
            // escape
            else if (e.keyCode == 27) {
                hideWeupingTips()
            }
            // 多次触发ctrl键
            else if (e.keyCode == 17) {
                window.clearTimeout(settimeout)
                pressCount++
                settimeout = setTimeout(function() {
                    switch (pressCount) {
                        case 2:
                            var selection = window.getSelection().toString()
                            chrome.runtime.sendMessage({'type': 'getSearchResult', 'text' : selection}, function(content) {
                                content = content == undefined ? '<p class="h4">未获取到搜索结果</p>' : content
                                showWeupingTips(null, content, 'margin-left:10px;width:700px;')
                            })
                            
                        break
                        case 3:

                        break
                    }
                    pressCount = 0
                }, 300)
            }
        })

/*
        chrome.fileSystem.chooseEntry({}, function(fileEntry){
            console.log(fileEntry);
            //do something with fileEntry
        });
*/  
        $(document).on('mousemove', function(e) {
            if (e.clientX > 60) {
                $('.weuping-content').hide()
            } else if (e.clientX == 0) {
                $('.weuping-content').show()
            }
        })
        
        // 点击删除按钮时
        $(document).on('click', '#weuping-close', function() {
            $(this).parents('.weuping-content').remove()
            $('.weuping-tips').remove();
        })

        // 点击评论按钮时
        $(document).on('click', 'div[weuping-button]', function(e) {
            switch ($(this).attr('weuping-button')) {
                case 'comment':
                    showWeupingTips(this, getComment())
                    break
                case 'good':
                    goodEvent()
                    break
                case 'bookmark':
                    chrome.runtime.sendMessage({'type': 'getBookmarks'}, function(content) {
                        content = content == undefined ? '<p class="h4">未获取到搜索结果</p>' : content
                        var iframe = '<iframe id="weupingIframe" style="border:none;width:100%;height:100%;overflow-x:hidden;" src="" />'
                        showWeupingTips(null, iframe, 'margin-left:10px;width:700px;')
                        $('#weupingIframe').contents().find('body').html($(content).html());
                    })
                    showWeupingTips(this, 'bookmark')
                    break
                case 'edit':
                    editEvent()
                    break
                case 'tab':
                    var tabObj = this
                    // 在触发获取
                    sendMessage({'type': 'getTabs', 'protocol': document.location.protocol}, function(content) {
                        var style = 'margin-left:8px;'
                        showWeupingTips(tabObj, content, style)
                        // 处理滚动条位置
                        var container = $(document).find('.weuping-tip-content'),
                        scrollTo = $(document).find('.wp_list-group .active')
                        container.scrollTop(0)
                        container.scrollTop(
                            scrollTo.offset().top - container.offset().top + container.scrollTop() - 13
                        )

                        $(document).find('a.wp_list-group-item').off('mousemove').on('mousemove', function(e) {
                            $(this).siblings().find('span svg').hide()
                            $(this).siblings().find('span i').show()
                            $(this).find('span svg').show()
                            $(this).find('span i').hide()
                        }).on('mouseout', function() {
                            $(this).find('span i').show()
                            $(this).find('span svg').hide()
                        })
                    })
                    break
                default:
                    break
            }
            e.stopPropagation()
        })
        // 响应点击标签事件
        $(document).on('click', '.weuping-tips,a[wp-tab-id]', function(e){
            if ($(this).attr('wp-tab-id') != undefined) {
                hideWeupingTips()
                sendMessage({'type': 'activeTab', 'tabId': $(this).attr('wp-tab-id')}, function(content) {
                })
            }
            e.stopPropagation()
        })
        // 响应点击标签的删除动作
        $(document).on('click', '.wp_list-group-item span', function(e){
            e.stopPropagation()
            var pa = $(this).parents('a.wp_list-group-item')
            chrome.runtime.sendMessage({'type': 'deleteTab', 'tabId': pa.attr('wp-tab-id')}, function() {
            })
            pa.remove()
        })
        
        $(document).on('click', 'body', function(){
            hideWeupingTips()
        })

    })

    refrashToken()

})

function sendMessage(message, callback) {
    chrome.runtime.sendMessage(message, function(content) {
        callback(content)
    })
}

function showWeupingTips(obj, content, style='') {
    var domObj = $(document).find('.weuping-tips[tip='+$(obj).attr('weuping-button')+']')
    if (domObj.attr('tip') == undefined) {
        var contentDiv = '<div class="weuping-tips weuping-hide" tip="'+$(obj).attr('weuping-button')+'"><em></em><span></span><div class="weuping-tip-content scrollbar">'+content+'</div></div>'
        $('body').append(contentDiv);
    } else {
        domObj.find('.weuping-tip-content').html(content)
    }
    $(document).find('.weuping-tips').addClass('weuping-hide')
    $(document).find('.weuping-tips').attr('style', style)
    $(document).find('.weuping-tips[tip='+$(obj).attr('weuping-button')+']').removeClass('weuping-hide')

    var Y = obj ? $(obj).offset().top - $(document).scrollTop() - 6 : 6
    $(document).find('.weuping-tips[tip='+$(obj).attr('weuping-button')+'] > em').css('top', Y)
    $(document).find('.weuping-tips[tip='+$(obj).attr('weuping-button')+'] > span').css('top', Y)
}

function hideWeupingTips() {
    $('.weuping-tips').addClass('weuping-hide')
}

// 获取评论内容
function getComment() {
    var content = '<div><div></div></div>'
    return content
}

// 点赞事件
function goodEvent() {
    var data = {
        url: window.location.href
    }
    chrome.runtime.sendMessage({'type': 'goodEvent', 'data': data}, function(response){
    })
}

// 收藏动作
function storageAction() {
    chrome.runtime.sendMessage({'type': 'getContentConfig'}, function(response){
    })
}

// 编辑动作
function editEvent() {
    $('.weuping-edit-selection').addClass('weuping-hide')
    $('.weuping-content').addClass('weuping-hide')
    $('.weuping-tips').addClass('weuping-hide')
    $(document).on('mouseenter', '*', function(e) {
        var width = $(this).outerWidth()
        var height = $(this).outerHeight()
        var left = $(this).offset().left
        var top = $(this).offset().top
            $('.weuping-edit-selection').removeClass('weuping-hide')
            $('.weuping-edit-selection').css({'top': top, 'left': left, 'width': width, 'height': height})
        e.stopPropagation()
    })
    $(document).on('click', '*', function() {
        $(document).off('mouseenter', '*')
        $('.weuping-edit-selection').addClass('weuping-hide')
    })
/*
    chrome.runtime.sendMessage({'type': 'editEvent', data: 'download'}, function(response){
        console.log(response)
    })
    */
}

function refrashToken() {
    if ($('input[name=token]').val()) {
        setInterval(function() {
            chrome.runtime.sendMessage({'type': 'userDetails'}, function(response) {
                console.log(response)
                $('input[name=token]').val(response.token)
                $('input[name=uid]').val(response.id)
            })
        }, 300000)
        
    }
}

chrome.extension.onMessage.addListener(function(msg, sender, sendResponse) {
    console.log(msg)
    if (msg.type === "getTabs") {
        showWeupingTips(null, msg.data)
    }

})

function createTranslateDiv(selection) {
    var style = 'margin-left:10px;width:327px;height:auto;max-height:95%;overflow:auto;'
    if (selection) {
        chrome.runtime.sendMessage({'type': 'getTranslateResult', 'text' : selection}, function(content) {
            content = content == undefined ? '<p class="h4">未获取到翻译结果</p>' : content
            showWeupingTips(null, content, style)
        })
    } else {
        showWeupingTips(null, '<p class="h4">请选择内容</p>', style)
    }
}
