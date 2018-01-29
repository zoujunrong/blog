var userDetails = localStorage.getItem('userDetails')
if (userDetails && userDetails != 'undefined') {
    userDetails = JSON.parse(userDetails)
} else {
    userDetails = null
}

$(function(){
	// =============================== 初始化系统 =============================================
	initSystem()

	//================================ 响应切换搜索功能 =======================================
	searchMain()

	//================================ 书签 ======================================
	pannelControllerMain()

	// 监听一些消息
	chrome.runtime.onMessage.addListener(function(message, sender, sendResponse) {
		if (message.type == 'refresh') {
			sendResponse('ok')
			location.reload()
		}
	})

});

/**
 * 左侧栏
 */
function pannelControllerMain() {
	var activePannel = getQueryString('pannel')
	activePannel = activePannel ? activePannel : 'bookmarks'
	showPannel(activePannel)

	// 点击事件监听
	$('button[left-button]').on('click', function() {
		location.href = $(this).attr('left-button')+'.html?pannel='+$(this).attr('left-button')
	})
}


function showPannel(activePannel) {
	$('button[left-button]').removeClass('active')
	$('button[left-button='+activePannel+']').addClass('active')
}

/**
 * 初始化操作
 */
function initSystem() {
	// 初始化登录操作
	if (userDetails) {
		$('ul[login-status]').addClass('hide')
		$('ul[login-status=yes]').removeClass('hide').find('status').text(userDetails.name)
	}
	// 注销事件
	$('#singout').on('click', function() {
		singout()
		location.reload()
	})

}

/**
 * 搜索操作 主方法
 */
function searchMain() {
	if (localStorage.getItem('newtab.searchType')) {
		$('#searchType').attr('role-url', localStorage.getItem('newtab.searchUrl')).html(localStorage.getItem('newtab.searchType'));
	}
	$('ul[role-search] li').on('click', function() {
		var aHtml = $($(this).find('a').prop("outerHTML"))
		aHtml.find('ii').remove()
		aHtml = aHtml.html()
		localStorage.setItem('newtab.searchType', aHtml)
		localStorage.setItem('newtab.searchUrl', $(this).find('a').attr('role-href'))
		$('#searchType').attr('role-url', $(this).find('a').attr('role-href')).html(aHtml);
	})
	
	$('#startSearch').on('click', function() {
		var roleUrl = $('#searchType').attr('role-url')
		if (roleUrl == 'bookmark' || roleUrl == 'history') {
			if ($('.dropdownSearch').find('li:eq('+index+')').text()) {
				window.open($('.dropdownSearch').find('li:eq('+index+')').find('a').attr('href'))
			}
		} else if ($.trim($('#searchText').val())) {
			// 记录搜索关键词
			window.open(roleUrl + $.trim($('#searchText').val()))
		}
	})

	$('body').on('keyup', function(e) {
		console.log(e.keyCode)
		if (e.keyCode == 18 && e.keyCode == 49) {
			$('#searchType').parent().click()
		}
	})

	var index = -1
	$('#searchText').on('keyup', function(e){
		var roleUrl = $('#searchType').attr('role-url')
		var searchText = $.trim($('#searchText').val())
		if (searchText) {
			if (e.keyCode == 13) {
				$("#startSearch").click()
			} else if (e.keyCode == 40) {
				index++
				$('.dropdownSearch').find('li').css('background-color', '#fff');
				$('.dropdownSearch').find('li:eq('+index+')').css('background-color', '#eee');
				$('#searchText').val($('.dropdownSearch').find('li:eq('+index+')').text());
			} else if (e.keyCode == 38) {
				index--
				$('.dropdownSearch').find('li').css('background-color', '#fff');
				$('.dropdownSearch').find('li:eq('+index+')').css('background-color', '#eee');
				$('#searchText').val($('.dropdownSearch').find('li:eq('+index+')').text());
			} else {
				index = -1
				if (roleUrl == 'history') {
					searchHistory(searchText)
				} else if (roleUrl == 'bookmark') {
					searchBookmark(searchText)
				} else {
					getSearchRecommend(
						'https://sp0.baidu.com/5a1Fazu8AA54nxGko9WTAnF6hhy/su?json=1',
						{wd : searchText}
					)
				}
				
			}
		}

	}).on('blur', function() {
		setTimeout(function(){
			$('.dropdownSearch').hide();
		}, 300);
	}).on('focus', function() {
		index = -1
		if ($.trim($('#searchText').val())) {
			$('.dropdownSearch').find('li').css('background-color', '#fff');
			$('.dropdownSearch').css({'left': $('#searchText').position().left, 'top': $('#searchText').position().top + 45, 'width': $('#searchText').width()+34}).show();
		} else {
			var roleUrl = $('#searchType').attr('role-url')
			if (roleUrl == 'history') {
				searchHistory('')
			} else if (roleUrl == 'bookmark') {
				getRecentBookmark()
			}
		}
	})
}

/**
 * 获取搜索推荐词
 * @param  {[type]} url  [description]
 * @param  {[type]} data [description]
 * @return {[type]}      [description]
 */
function getSearchRecommend(url, data) {
	$.ajax({
		async: true,
		url: url,
		type: 'GET',
		dataType: 'text',
		jsonp: 'cb',
		data: data,
		timeout: 5000,
		success: function(dataTxt) {
			dataTxt = dataTxt.replace('window.baidu.sug(', '')
			dataTxt = dataTxt.replace(');', '')
			json = $.parseJSON(dataTxt)
			var liStr = ''
			for (i in json.s) {
				liStr += '<li><span>'+ json['s'][i] +'</span></li>'
			}
			$('.dropdownSearch').css({'left': $('#searchText').position().left, 'top': $('#searchText').position().top + 45, 'width': $('#searchText').width()+34}).show().html(liStr)

			$('.dropdownSearch').find('li').on('click', function() {
				$('#searchText').val($(this).text());
				 $("#startSearch").click();
			});
		}
	});
}

function searchHistory(text) {
	var config = {
		text: text,
		startTime: new Date().getTime()-24*3600*1000,
	    endTime: new Date().getTime(),
	    maxResults: 40
	}
	chrome.history.search(config, function(historyItemArray) {
		var existKeys = {}
		var liStr = ''
		var nums = 0
	    for (i in historyItemArray) {
	    	if (historyItemArray[i]['title']  && nums < 20 && !existKeys.hasOwnProperty(historyItemArray[i]['title'])) {
				liStr += '<li><a target="_blank" href="'+ historyItemArray[i]['url'] +'">'+ historyItemArray[i]['title'] +'</a></li>'
				existKeys[historyItemArray[i]['title']] = historyItemArray[i]['url']
				nums++
	    	}
		}
		$('.dropdownSearch').css({'left': $('#searchText').position().left, 'top': $('#searchText').position().top + 45, 'width': $('#searchText').width()+34}).show().html(liStr)
	});
}

function searchBookmark(text) {
	chrome.bookmarks.search(text, function(bookmarkArray) {
		var existKeys = {}
		var liStr = ''
		var nums = 0
	    for (i in bookmarkArray) {
	    	if (bookmarkArray[i]['title'] && nums < 20 && !existKeys.hasOwnProperty(bookmarkArray[i]['url'])) {
				liStr += '<li><a target="_blank" href="'+ bookmarkArray[i]['url'] +'">'+ bookmarkArray[i]['title'] +'</a></li>'
				existKeys[bookmarkArray[i]['url']] = bookmarkArray[i]['title']
				nums++
	    	}
		}
		$('.dropdownSearch').css({'left': $('#searchText').position().left, 'top': $('#searchText').position().top + 45, 'width': $('#searchText').width()+34}).show().html(liStr)
	});
}

function getRecentBookmark() {
	chrome.bookmarks.getRecent(40, function(bookmarkArray) {
		var existKeys = {}
		var liStr = ''
		var nums = 0
	    for (i in bookmarkArray) {
	    	if (bookmarkArray[i]['title'] && nums < 20 && !existKeys.hasOwnProperty(bookmarkArray[i]['url'])) {
				liStr += '<li><a target="_blank" href="'+ bookmarkArray[i]['url'] +'">'+ bookmarkArray[i]['title'] +'</a></li>'
				existKeys[bookmarkArray[i]['url']] = bookmarkArray[i]['title']
				nums++
	    	}
		}
		$('.dropdownSearch').css({'left': $('#searchText').position().left, 'top': $('#searchText').position().top + 45, 'width': $('#searchText').width()+34}).show().html(liStr)
	});
}

/**
 * 确定弹框
 */
function weConfirm(title, msg, confirm_callback=null, cancel_callback=null) {
    $('#dialog').modal('show')
    $('#dialog h4[dialog-title]').html(title)
    $('#dialog div[dialog-body]').html(msg)
    if (confirm_callback) $('#dialog button[dialog-confirm]').off('click').on('click', confirm_callback)
    if (cancel_callback) $('#dialog button[dialog-close]').off('click').on('click', cancel_callback)
}
/**
 * 关闭弹窗
 */
function weClose() {
    $('#dialog').modal('hide')
}

/**
 * 警告框
 */
function weAlert(title, msg) {
    weConfirm(title, '<div style="font-size:14px;padding:30px 10px;text-align:center;color:red;"><h3>' + msg + '</h3></div>')
}

/**
 * 获取地址栏参数
 * @param {[type]} name [description]
 */
function getQueryString(name)
{
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)")
     var r = window.location.search.substr(1).match(reg)
     if(r != null) {
     	return unescape(r[2])
     }
     return null;
}