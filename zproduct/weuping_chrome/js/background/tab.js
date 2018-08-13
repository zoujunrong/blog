var userTabs = []
reFlashTabs()

function reFlashTabs() {
	// 获取标签
	chrome.tabs.query({}, function(tabArray) {
		userTabs = tabArray
	})
}

function getUserTabs() {
	return userTabs
}


// 获取tabs
function getTabContent(protocol) {
    var tabStr = '<div style="height:40px;background:rgb(253,246,238);"><span style="line-height:40px;margin:0 10px"><svg style="width: 1.2em; height: 1.2em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="457"><path d="M532.526499 904.817574L139.506311 511.797385 532.526499 118.777197c12.258185-12.258185 12.432147-32.892131-0.187265-45.51052-12.707416-12.707416-32.995485-12.703323-45.511543-0.187265L75.166957 484.739123c-7.120165 7.120165-10.163477 17.065677-8.990768 26.624381-1.500167 9.755178 1.5104 20.010753 8.990768 27.491121l411.660734 411.660734c12.258185 12.258185 32.892131 12.432147 45.511543-0.187265 12.707416-12.707416 12.7023-32.995485 0.187265-45.51052z" p-id="458"></path></svg><svg style="width: 1.2em; height: 1.2em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="477"><path d="M492.675886 904.817574L885.696074 511.797385 492.675886 118.777197c-12.258185-12.258185-12.432147-32.892131 0.187265-45.51052 12.707416-12.707416 32.995485-12.703323 45.511543-0.187265l411.660734 411.660734c7.120165 7.120165 10.163477 17.065677 8.990768 26.624381 1.500167 9.755178-1.5104 20.010753-8.990768 27.491121L538.374694 950.515359c-12.258185 12.258185-32.892131 12.432147-45.511543-0.187265-12.707416-12.707416-12.703323-32.995485-0.187265-45.51052z" p-id="478"></path></svg></span></div>'

    tabStr += '<div class="wp_list-group">'

    var defaultTab = '<svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="974"><path d="M128 832.042667c0 17.002667 4.906667 20.309333 20.629333 14.016l15.36-6.144c75.733333-30.293333 193.578667-30.293333 269.354667 0l94.506667 37.802666h-31.701334l94.506667-37.802666c75.733333-30.293333 193.578667-30.293333 269.354667 0l15.36 6.144c15.658667 6.272 20.629333 2.901333 20.629333-14.016V255.957333c0-29.738667-24.746667-66.304-52.309333-77.333333l-15.36-6.144c-55.424-22.165333-150.549333-22.186667-205.973334 0l-94.506666 37.802667-15.850667 6.336-15.850667-6.336-94.506666-37.802667c-55.402667-22.165333-150.528-22.186667-205.952 0l-15.36 6.144C152.810667 189.610667 128 226.304 128 255.957333v576.085334zM164.48 139.008l15.36-6.144c65.621333-26.24 172.117333-26.218667 237.653333 0L512 170.666667l94.506667-37.802667c65.621333-26.24 172.117333-26.218667 237.653333 0l15.36 6.144c43.733333 17.493333 79.146667 69.717333 79.146667 116.949333v576.085334c0 47.104-35.477333 71.104-79.146667 53.632l-15.36-6.144c-65.621333-26.24-172.117333-26.218667-237.653333 0L512 917.333333l-94.506667-37.802666c-65.621333-26.24-172.117333-26.218667-237.653333 0l-15.36 6.144c-43.733333 17.493333-79.146667-6.4-79.146667-53.632V255.957333C85.333333 208.853333 120.810667 156.48 164.48 139.008zM490.666667 213.397333a21.333333 21.333333 0 1 1 42.666666 0v511.872a21.333333 21.333333 0 1 1-42.666666 0V213.397333z" fill="#3D3D3D" p-id="975"></path></svg>'
    for (var i in userTabs) {
        var iconUrl = userTabs[i]['favIconUrl']
        var img = iconUrl ? '<img src="'+iconUrl+'" /> ' : defaultTab
        console.log(iconUrl)
        if (protocol == 'https:' && iconUrl) {
            if (iconUrl.indexOf(protocol) === false) {
                img = defaultTab
            }
        }
        tabStr += '<a title="有100人正在访问" class="wp_list-group-item '+(userTabs[i]['active'] ? 'active' : '')+'" wp-tab-id="'+userTabs[i]['id']+'" wp-prev-tab-id="'+userTabs[i]['openerTabId']+'">'+img+userTabs[i]['title']
        tabStr += '<span style="position:absolute;right:5px;"><i>100</i><svg style="display:none;width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="447"><path d="M512 456.310154L94.247385 38.557538a39.542154 39.542154 0 0 0-55.689847 0 39.266462 39.266462 0 0 0 0 55.689847L456.310154 512 38.557538 929.752615a39.542154 39.542154 0 0 0 0 55.689847 39.266462 39.266462 0 0 0 55.689847 0L512 567.689846l417.752615 417.752616c15.163077 15.163077 40.290462 15.36 55.689847 0a39.266462 39.266462 0 0 0 0-55.689847L567.689846 512 985.442462 94.247385a39.542154 39.542154 0 0 0 0-55.689847 39.266462 39.266462 0 0 0-55.689847 0L512 456.310154z" p-id="448"></path></svg></span><a>'
    }
    tabStr += '</div>'
    return tabStr
}

function activeTab(tabId) {
	chrome.tabs.update(parseInt(tabId), {
	    active: true
	}, function(tab) {
	})
}

function deleteTab(tabId) {
    chrome.tabs.remove(parseInt(tabId), function() {
    })
}

chrome.tabs.onCreated.addListener(function(tab){
    reFlashTabs()
})

chrome.tabs.onUpdated.addListener(function(tabId, changeInfo, tab) {
    reFlashTabs()
})

chrome.tabs.onMoved.addListener(function(tabId, moveInfo) {
    reFlashTabs()
})

chrome.tabs.onRemoved.addListener(function(addedTabId, removedTabId) {
    reFlashTabs()
})

chrome.tabs.onActivated.addListener(function (selectInfo) {
	reFlashTabs()
})