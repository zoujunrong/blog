$(function() {
    showSystemSettings()
    settingsEvent()
})

// ======================= 系统设置事件 =================================
function showSystemSettings() {
    var systemConfig = JSON.parse(localStorage.getItem('we-systemConfig'))
    for (var i in systemConfig) {
        $('[name='+i+']').val(systemConfig[i])
    }
}

function settingsEvent() {
    $('#saveSettings').on('click', function() {
        var pages = []
        var contextmenu = []
        var shows = []
        var search = null
        var translate = null
        $(this).parents('form').find('[name=pages]:checked').each(function() {
            pages.push($(this).val())
        })
        $(this).parents('form').find('[name=contextmenu]:checked').each(function() {
            contextmenu.push($(this).val())
        })
        $(this).parents('form').find('[name=shows]:checked').each(function() {
            shows.push($(this).val())
        })
        search = $(this).parents('form').find('[name=search]').val()
        translate = $(this).parents('form').find('[name=translate]').val()
        systemConfig = {'pages': pages, 'contextmenu': contextmenu, 'shows': shows, 'search': search, 'translate': translate}
        localStorage.setItem('we-systemConfig', JSON.stringify(systemConfig))
        chrome.runtime.sendMessage({'type': 'refreshSystemConfig'})
        location.reload()
    })
    $('#resetSettings').on('click', function() {
        localStorage.setItem('we-systemConfig', '')
        showSystemSettings()
        chrome.runtime.sendMessage({'type': 'refreshSystemConfig'})
        location.reload()
    })
}

// ======================= // 系统设置事件 =================================
