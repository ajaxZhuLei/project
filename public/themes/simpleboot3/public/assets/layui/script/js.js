fontSize();
$(window).resize(function () {
    fontSize();
});

function fontSize() {
    var size;
    var winW = $(window).width();
    if (winW <= 1400 && winW > 800) {
        size = Math.round(winW / 14);
    } else if (winW <= 800) {
        size = Math.round(winW / 7.5);
        if (size > 65) {
            size = 65;
        }
    } else {
        size = 100;
    }
    $('html').css({
        'font-size': size + 'px'
    })
}

$(function () {
    //--
    setTimeout(function () {
        $('body').addClass('show');
    }, 500);
    new WOW().init();
    //--
    $('.navA').click(function () {
        if ($('body').hasClass('navShow')) {
            $('body').removeClass('navShow')
        } else {
            $('body').addClass('navShow')
        }
    });
    $('.nav').find('li').each(function () {
        var _ = $(this);
        if ($(this).find('.list').length > 0) {
            _.find('a.name').click(function () {
                if ($(window).width() > 800) return;
                if (_.hasClass('on')) {
                    _.removeClass('on');
                    _.find('.list').hide();
                } else {
                    _.addClass('on');
                    _.find('.list').show();
                }
                return false;
            })
        }
    });
    //--选项卡
    $('.tabContentDiv').find('.tabContent:first').show();
    $('.tab').each(function (i) {
        var _this = $(this);
        var tabContentDiv = $('.tabContentDiv').eq(i).find('.tabContent');
        $(this).find('li').each(function (ii) {
            $(this).click(
                function () {
                    _this.find('li').removeClass('on');
                    $(this).addClass('on');
                    tabContentDiv.hide();
                    tabContentDiv.eq(ii).show();
                }
            )
        })
    });
    //--返回顶部
    $('.topA').click(function () {
        $('body,html').stop(true, true).animate({scrollTop: 0}, 300);
    });
    $(window).scroll(function () {
        if($(window).scrollTop() > $(window).height()){
            $('.topA').addClass('show')
        }else{
            $('.topA').removeClass('show')
        }
    });
    //--js下拉选择框
    $('.select').each(function () {
        var _this = $(this);
        _this.find('select').change(function () {
            _this.find('span').html($(this).find("option:selected").text());
        })
    })

});
