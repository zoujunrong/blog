var userDetails = localStorage.getItem('userDetails')
if (userDetails && userDetails != 'undefined') {
    userDetails = JSON.parse(userDetails)
} else {
    userDetails = null
}
// 清空书签路径访问记录
localStorage.removeItem('bookmarks-openArr')
localStorage.removeItem('bookmarks-open')

createMenu()
// 监听标签新增页面
chrome.tabs.onCreated.addListener(function(tab){
    setTimeout(function(){
    	chrome.tabs.get(tab.id, function(tab){
		    // 重新加载icon信息
		    if (tab.status == 'complete' || tab.favIconUrl) {
		    	setIcons(tab.url, tab.favIconUrl)
		    }
		})
    }, 5000)
})

// 监听注入页面事件
chrome.runtime.onMessage.addListener(function(message, sender, sendResponse){
    if (message.type == 'getContentConfig') {
    	var systemConfig = localStorage.getItem('we-systemConfig')
        sendResponse(systemConfig)
    } else if (message.type == 'refreshSystemConfig') {
    	createMenu()
    } else if (message.type == 'goodEvent') {
    	
    } else if (message.type == 'editEvent') {
    	screenshot.init();
    } else if (message.type == 'userDetails') {
    	checkIsRelogin(function() {
    		sendResponse(userDetails)
    	})
    }
})


// 设置icon信息
function setIcons(url, iconUrl) {
	var re = /^(https?:\/\/)?([\w-_.]+(com|com\.cn|net|org|info|mobi|cn))+(:[0-9]+)?(\/[\w-_.\?=&%#:]+)*\/?$/g
	var res = re.exec(url)
	localStorage.setItem('icon:'+res[2], iconUrl)
}

// 创建菜单栏
function createMenu() {
	chrome.contextMenus.removeAll()
	var systemConfig = localStorage.getItem('we-systemConfig')
	systemConfig = JSON.parse(systemConfig)
	if (systemConfig) {
		var contextmenu = systemConfig.contextmenu
		for (var i in contextmenu) {
			switch (contextmenu[i]) {
				case 'bookmark':
					chrome.contextMenus.create({
					    type: 'normal',
					    title: '保存书签',
					    id: contextmenu[i]
					})
					break
				case 'translate':
					var callback = baiduTranslate
					if (systemConfig[contextmenu[i]] == 'google') {
						callback = googleTranslate
					}
					chrome.contextMenus.create({
					    type: 'normal',
					    title: '使用'+systemConfig[contextmenu[i]]+'翻译...',
					    id: contextmenu[i],
					    contexts: ['selection', 'page'],
					    onclick: callback
					})
					break
				case 'search':
					var callback = baiduSearch
					if (systemConfig[contextmenu[i]] == 'google') {
						callback = googleSearch
					} else if (systemConfig[contextmenu[i]] == 'sogou') {
						callback = sogouSearch
					} else if (systemConfig[contextmenu[i]] == 'so') {
						callback = soSearch
					} else if (systemConfig[contextmenu[i]] == 'bing') {
						callback = bingSearch
					}
					chrome.contextMenus.create({
					    type: 'normal',
					    title: '使用'+systemConfig[contextmenu[i]]+'搜索...',
					    id: contextmenu[i],
					    contexts: ['selection', 'page'],
					    onclick: callback
					})
					break
				case 'quote':
					chrome.contextMenus.create({
					    type: 'normal',
					    title: '添加引用...',
					    id: contextmenu[i],
					    contexts: ['selection', 'page'],
					    onclick: quoteAction
					})
					break
			}
		}
	}
}


function baiduTranslate(info, tab){
	var text = info.selectionText ? info.selectionText : ''
    var url = 'http://fanyi.baidu.com/#auto/auto/'+text;
    window.open(url, '_blank');
}
function googleTranslate(info, tab){
	var text = info.selectionText ? info.selectionText : ''
    var url = 'https://translate.google.cn//#auto/auto/'+text;
    window.open(url, '_blank');
}
function baiduSearch(info, tab){
	var text = info.selectionText ? info.selectionText : ''
    var url = 'https://www.baidu.com/s?ie=utf-8&wd='+text;
    window.open(url, '_blank');
}
function bingSearch(info, tab){
	var text = info.selectionText ? info.selectionText : ''
    var url = 'https://cn.bing.com/search?&ie=utf-8&q='+text;
    window.open(url, '_blank');
}
function sogouSearch(info, tab){
	var text = info.selectionText ? info.selectionText : ''
    var url = 'https://www.sogou.com/web?ie=utf8&query='+text;
    window.open(url, '_blank');
}
function soSearch(info, tab){
	var text = info.selectionText ? info.selectionText : ''
    var url = 'https://www.so.com/s?ie=utf-8&q='+text;
    window.open(url, '_blank');
}
function googleSearch(info, tab){
	var text = info.selectionText ? info.selectionText : ''
    var url = 'https://www.google.com.hk/search?ie=UTF-8&q='+text;
    window.open(url, '_blank');
}
function quoteAction(info, tab) {

}

// 编辑事件的处理
function editEvent() {

}

var screenshot = {
	content : document.createElement("canvas"),
	data : '',

	init : function() {
		this.initEvents();
	},
	
	saveScreenshot : function(x, y, width, height) {
		var image = new Image();
		image.onload = function() {
			var canvas = screenshot.content;
			canvas.width = width ? width : image.width;
			canvas.height = height ? height : image.height;
			x = x ? x : 0;
			y = y ? y : 0;
			var context = canvas.getContext("2d");
			context.drawImage(image, x, y, canvas.width, canvas.height, 0, 0, canvas.width, canvas.height);

			// save the image
			var link = document.createElement('a')
			link.download = "download.png"
			link.href = screenshot.content.toDataURL()
			link.click()
			screenshot.data = ''
		}
		image.src = screenshot.data
	},
	
	initEvents : function() {
		chrome.tabs.captureVisibleTab(null, {
			format : "png",
			quality : 20
		}, function(data) {
			window.open(data, 'tabCapture');
			screenshot.data = data;
			
			// send an alert message to webpage
			chrome.tabs.query({
				active : true,
				currentWindow : true
			}, function(tabs) {
				chrome.tabs.sendMessage(tabs[0].id, {ready : "ready"}, function(response) {
					if (response.download === "download") {
						screenshot.saveScreenshot(0, 0, 0, 0);
					} else {
						screenshot.data = '';
					}
				});
			}); 

		});
	}
};

function getNodeParents(bookmarkArr, callback) {
	chrome.bookmarks.get(bookmarkArr[0]['parentId'], function(BookmarkArray) {
		BookmarkArray[0]['children'] = bookmarkArr
		if (parseInt(BookmarkArray[0]['id']) > 0) {
			getNodeParents(BookmarkArray, callback)
		} else {
			callback(BookmarkArray)
		}
	})
}

initBookmarks()
// 每5min钟同步一次
setInterval(function() {
	initBookmarks()
}, 5000)

/** 
 * 初始化标签
 */
function initBookmarks() {
	if (userDetails) {
		checkIsRelogin()
		var synctime = localStorage.getItem('bookmark.synctime')
		var updatetime = localStorage.getItem('bookmark.updatetime')
		// 如果从来都没有同步过
		if (!synctime || userDetails.bookmark_updatetime < synctime) {	// 初始化操作
			// 获取书签
			getBookmarks()
			// 同步书签
			syncBookmarks()
		} else if (userDetails.bookmark_updatetime > synctime ) {	// 服务器已经更新，本地还未更新
			getBookmarks(1)
		} else if (updatetime > synctime) {		// 本地更新 还未同步至服务器
			syncBookmarks()
		}
	}
}

/**
 * 获取书签
 */
function getBookmarks(isFull) {
	var data = {
    	'token': userDetails.token,
    	'uid': userDetails.id,
    	'fid': 0
    }

	weupingRequest('/api/getbookmarks', data, function(ret) {
		if (ret.hasOwnProperty('code') && ret.code == 0) {
	    	rebuildBookmarks(ret.data[0], '0', isFull, '0')
	    	localStorage.setItem('bookmark.synctime', userDetails.bookmark_updatetime)
		}
    })
}

/**
 * 同步书签
 */
function syncBookmarks() {
	chrome.bookmarks.getSubTree('0', function(bookmarkArray) {
		var timestamp = String(Date.parse(new Date())).substr(0, 10)
	    var data = {
	    	'token': userDetails.token,
	    	'uid': userDetails.id,
	    	'bookmarks': JSON.stringify(bookmarkArray),
	    	'updatetime': timestamp
	    }
	    weupingRequest('/api/syncbookmarks', data, function(ret) {
	    	if (ret.hasOwnProperty('code') && ret.code == 0) {
	    		userDetails.bookmark_updatetime = timestamp
	    		localStorage.setItem('userDetails', JSON.stringify(userDetails))
	    		localStorage.setItem('bookmark.synctime', timestamp)
	    	}
	    })

	})
}

/**
 * 重建书签
 */
function rebuildBookmarks(bookmarkTree, fid, isFull, path) {
	if (bookmarkTree.is_folder && bookmarkTree.childrens > 0) {
		chrome.bookmarks.getChildren(fid, function(bookmarkArray){
	    	for (var i in bookmarkTree.children) {
	    		var childrenData = bookmarkTree.children[i]
	    		// 删除子节点
	    		var saveLocalData = {
	    			'id': childrenData.id,
	    			'parent_path': childrenData.parent_path,
	    			'desc': childrenData.desc,
	    			'open_status': childrenData.open_status
	    		}

	    		var isExist = false
	    		if (bookmarkArray.length > 0) {
		    		for (var k in bookmarkArray) {
		    			if (!isExist && childrenData.title == bookmarkArray[k]['title']) {
		    				isExist = bookmarkArray[k]['id'];
		    				// 建立本地书签和服务器端书签的对应关系表
		    				var saveLocalDataFull = {}
		    				saveLocalDataFull[isExist] = saveLocalData
		    				chrome.storage.local.set(saveLocalDataFull);
		    				delete(bookmarkArray[k])
		    			}
		    		}
	    		}

	    		if (!isExist) {
	    			var addData = {
					    parentId: fid,
					    index: childrenData.sortid,
					    title: childrenData.title,
					    url: childrenData.url
					}
	    			chrome.bookmarks.create(addData, function(bookmark) {
	    				if (bookmark) {
	    					// 建立本地书签和服务器端书签的对应关系表
	    					var saveLocalDataFull = {}
		    				saveLocalDataFull[bookmark.id] = saveLocalData
		    				chrome.storage.local.set(saveLocalDataFull);
							rebuildBookmarks(childrenData, bookmark.id, isFull, path+'-'+bookmark.id)
	    				}
					})
	    		} else if (bookmarkTree.childrens) {
					rebuildBookmarks(childrenData, isExist, isFull, path+'-'+isExist)
	    		}
	    	}

	    	// 如果是完全同步， 那么需要删除已经不存在的书签
	    	if (isFull && bookmarkArray.length > 0) {
	    		for (var j in bookmarkArray) {
	    			chrome.bookmarks.removeTree(bookmarkArray[j]['id'])
	    		}
	    	}

		});
		
	}
}

// 创建书签事件
chrome.bookmarks.onCreated.addListener(function(id) {
    // 获取激活窗口
    chrome.tabs.query({
	    active: true
	}, function(tabs) {
    	for (i in tabs) {
		    if (tabs[i].status == 'complete' || tabs[i].favIconUrl) {
		    	setIcons(tabs[i].url, tabs[i].favIconUrl)
		    } else {}
    	}
	})
	var timestamp = String(Date.parse(new Date())).substr(0, 10)
    localStorage.setItem('bookmark.updatetime', timestamp)

})

// 监控书签的移除行为
chrome.bookmarks.onRemoved.addListener(function(id, removeInfo) {
	var timestamp = String(Date.parse(new Date())).substr(0, 10)
    localStorage.setItem('bookmark.updatetime', timestamp)

})

// 监控书签的更新行为
chrome.bookmarks.onChanged.addListener(function(id, changeInfo) {
    var timestamp = String(Date.parse(new Date())).substr(0, 10)
    localStorage.setItem('bookmark.updatetime', timestamp)
})

// 监控书签的移动行为
chrome.bookmarks.onMoved.addListener(function(id, moveInfo){
    var timestamp = String(Date.parse(new Date())).substr(0, 10)
    localStorage.setItem('bookmark.updatetime', timestamp)
})

// 监控一个书签分组下的更改子节点顺序的行为
chrome.bookmarks.onChildrenReordered.addListener(function(id, reorderInfo){
    var timestamp = String(Date.parse(new Date())).substr(0, 10)
    localStorage.setItem('bookmark.updatetime', timestamp)
})

// 监控导入书签结束的行为
chrome.bookmarks.onImportEnded.addListener(function(){
    var timestamp = String(Date.parse(new Date())).substr(0, 10)
    localStorage.setItem('bookmark.updatetime', timestamp)
})
