/**
 * Created by vatia13 on 2/8/16.
 */
//Authentication position
$(function(){
    //Authentication frame position top

    var AuthTop = ($(window).height() - $('.auth').height()) / 2;
    $('.auth').css('margin-top',AuthTop+'px');

    //End Auth position


    //Authentication input left line
    $('.auth input[type="email"]').focus().parent('div').parent('div').find('.col-sm-2 .focus').fadeIn(400);
    $('.auth input[type="email"],.auth input[type="password"]').on('focus',function(){
        $('.auth .focus').fadeOut(300);
        $(this).parent('div').parent('div').find('.col-sm-2 .focus').fadeIn(400);
    });

});

// Cookies
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(name) {
    var cookie = " " + document.cookie;
    var search = " " + name + "=";
    var setStr = null;
    var offset = 0;
    var end = 0;
    if (cookie.length > 0) {
        offset = cookie.indexOf(search);
        if (offset != -1) {
            offset += search.length;
            end = cookie.indexOf(";", offset)
            if (end == -1) {
                end = cookie.length;
            }
            setStr = unescape(cookie.substring(offset, end));
        }
    }
    return(setStr);
}

function delCookie(name) {
    document.cookie = name + "=" + "; expires=Thu, 01 Jan 1970 00:00:01 GMT";
}



//menu
$('.leftSide .block-list').css({position:'relative',height:($(document).height() + 68)+'px'});
$('input[name="active_top_slide"]').click(function(){
    if(this.checked){
        $('.leftSide').toggle('slide',{direction:'left'},500,function(){
            $(this).addClass('topSide').removeClass('leftSide');
            $('.rightSide').addClass('middleSide').removeClass('rightSide');
            $('.topSide .block-list').css({position:'relative',height:'auto'});
            $('.topSide').slideDown(500);
            $('.nav_bars > i').addClass('glyphicon-arrow-up').removeClass('glyphicon-arrow-left');
        });
        setCookie("nav_bar", 1, 360);
    }else{
        $('.topSide').slideUp(500,function(){
            $('.topSide .block-list').css({position:'relative',height:($(document).height() + 68)+'px'});
            $(this).addClass('leftSide').removeClass('topSide');
            $('.middleSide').addClass('rightSide').removeClass('middleSide');
            $('.leftSide').toggle('slide',{direction:'left'},500,function(){
                $('.nav_bars > i').addClass('glyphicon-arrow-left').removeClass('glyphicon-arrow-up');
            });
        });
        delCookie("nav_bar");
    }
});


// Mouse Click Chose File
function ListClick(c){
    $(c+' ul li:last-child input').click();
};


function getPosterView(e){
        var button = $(e).parent('li').parent('ul').parent('div').find('div');
        var preview = $(e).parent('li').find('span');
        var file    = e.files[0];
        var reader  = new FileReader();
        reader.addEventListener("load", function () {
            preview.html('<img src="'+reader.result+'" width="166"/>');
            button.attr('onClick',"ListClick('.files.poster')");
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
};

function getSliderView(e){
    var button = $(e).parent('li').parent('ul').parent('div').find('div');
    var preview = $(e).parent('li').find('span');
    var file    = e.files[0];
    var reader  = new FileReader();
    reader.addEventListener("load", function () {
        preview.html('<img src="'+reader.result+'" width="166"/>');
        button.attr('onClick',"ListClick('.files.slider')");
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
};



var image_num = 1;
//chose Image File
function getImageView(e){
    image_num++;
    if(countSize($('.files.images input[type="file"]')) > 20){
        var message = $('.files.images').data('size');
        $("#error_popup span").html(message);
        $("#error_popup").popup('show');
        $(e).val('');
    }else{
        var button = $(e).parent('li').parent('ul').parent('div').find('div');
        var preview = $(e).parent('li').find('span');
        var file    = e.files[0];
        var reader  = new FileReader();
        reader.addEventListener("load", function () {
            preview.html('<i class="glyphicon glyphicon-remove" onClick="removeItem($(this))"></i><img src="'+reader.result+'" width="166"/>');
            $(e).parent('li').parent('ul').append('<li><span></span><input class="img_'+image_num+'" accept="image/*" onchange="getImageView(this)" name="still['+image_num+']" type="file"></li>');
            button.attr('onClick',"ListClick('.files.images')");
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

};

var screening_num = 1;
//chose Screening
function getScreeningView(e){
    screening_num = screening_num + 1;
    if($(e).parent('li').parent('ul').find('li').length > 3){
        var message = $('.files.screenings').data('num');
        $("#error_popup span").html(message);
        $("#error_popup").popup('show');
        $(e).val('');
    }else if(countSize($('.files.screenings input[type="file"]')) > 300){
        var message = $('.files.screenings').data('size');
        $("#error_popup span").html(message);
        $("#error_popup").popup('show');
        $(e).val('');
    }else{
        var button = $(e).parent('li').parent('ul').parent('div').find('div');
        var preview = $(e).parent('li').find('span');
        preview.html('<i class="glyphicon glyphicon-remove" onClick="removeItem($(this))"></i><div><i class="glyphicon glyphicon-film"></i><small>'+e.files[0].name+'</small></div>');
        $(e).parent('li').parent('ul').append('<li><span></span><input class="screening_'+screening_num+'" accept="video/*" onchange="getScreeningView(this)" name="screening['+screening_num+']" type="file"></li>');
        button.attr('onClick',"ListClick('.files.screenings')");
    }
};


var trailer_num = 1;
// chose trailers
function getTrailerView(e){
    trailer_num = trailer_num + 1;

    if($(e).parent('li').parent('ul').find('li').length > 3){
        var message = $('.files.trailers').data('num');
        $("#error_popup span").html(message);
        $("#error_popup").popup('show');
        $(e).val('');
    }else if(countSize($('.files.trailers input[type="file"]')) > 300){
        var message = $('.files.trailers').data('size');
        $("#error_popup span").html(message);
        $("#error_popup").popup('show');
        $(e).val('');
    }else{
        var button = $(e).parent('li').parent('ul').parent('div').find('div');
        var preview = $(e).parent('li').find('span');
        preview.html('<i class="glyphicon glyphicon-remove" onClick="removeItem($(this))"></i><div><i class="glyphicon glyphicon-film"></i><small>'+e.files[0].name+'</small></div>');
        $(e).parent('li').parent('ul').append('<li><span></span><input class="trailer_'+trailer_num+'" accept="video/*" onchange="getTrailerView(this)" name="trailer['+trailer_num+']" type="file"></li>');
        button.attr('onClick',"ListClick('.files.trailers')");
    }
};
//remove files
function removeItem(e){
    e.parent('span').parent('li').remove();
};

//count size
function  countSize(input){
    var length = input.length;
    var sum = 0;
    if(length > 0){
        for(var i = 0; i<length;i++){
            sum += input[i].files[0].size;
        }
    }
    return sum / 1000000;
};


function escapeSpecialChars(jsonString) {

    return jsonString.replace(/\n/g, "\\n")
        .replace(/\r/g, "\\r")
        .replace(/\t/g, "\\t")
        .replace(/\f/g, "\\f");

}

////RIGHTSIDE DATA
//$(function(){
//    $('.rightSide').css('width',($('.rightSide').width() - $('#rightSideData > div').width() + 200) + 'px');
//});


function getFieldValue(name,url,seconds){
    $('#'+name).val("");
   var interval = setInterval(function(){
       var value = $('#'+name).val();
       if(value != ""){
           $('.'+name+' > div').html('<img src="'+ url + value + '" width="100%"/>');
           clearInterval(interval);
       };
   },seconds);
}



$.fn.Fields = function(html,options){
    var settings = $.extend({
        del:'del_detail',
        appendClass: 'content',
        tag: 'div'
    },options);

    //hide delete button if there is 1 detail
    $('#'+settings.del).hide();

    //add detail fields
    $(this).on('click',function(){
        var num = $('.'+settings.appendClass+' > '+settings.tag).length;
        html = html.replace(/\[]/g,'['+num+']');
        var pattern = new RegExp(settings.chosen_prefix, 'g');
        $('.'+settings.appendClass).append(html.replace(pattern,settings.chosen_prefix+num));
        if($('.'+settings.appendClass+' > '+settings.tag).length > 1){
            $('.'+settings.chosen_prefix).addClass(settings.chosen_prefix+num).removeClass(settings.chosen_prefix);
            $('.'+settings.chosen_prefix+num).show();
            $('#'+settings.del).show();
            addCustomTextToChosen(settings.chosen_prefix+num,'დეტალი არ არის სიაში,დააჭირეთ Enter-ს ამ დეტალის დასამატებლად:');
        }
    });

    if($('.'+settings.appendClass+' > '+settings.tag).length > 1){
        $('#'+settings.del).show();
    }

    //del detail fields
    $('#'+settings.del).on('click',function(){
        if($('.'+settings.appendClass+' > '+settings.tag).length > 1){
            $('.'+settings.appendClass+' > '+settings.tag+':last-child').remove();
        }
        if($('.'+settings.appendClass+' > '+settings.tag).length < 2) {
            $('#'+settings.del).hide();
        }
    });
};

function addCustomTextToChosen(cl,text){
    var select, chosen;

// Cache the select element as we'll be using it a few times
    select = $("."+cl);

// Init the chosen plugin
    select.chosen({
        allow_single_deselect: true,
        scroll_on_hover: false,
        no_results_text: text
    });

// Get the chosen object
    chosen = select.data('chosen');

// Bind the keyup event to the search box input
    chosen.dropdown.find('input').on('keyup', function(e)
    {
        // If we hit Enter and the results list is empty (no matches) add the option
        if (e.which == 13 && chosen.dropdown.find('li.no-results').length > 0)
        {
            var option = $("<option>").val(this.value).text(this.value);
            if(this.value != ""){
                $.ajax({
                    url:select.data('action'),
                    type:'POST',
                    data:{_method:'POST',_token:select.data('token'),action:select.data('type'),type:select.data('type'),value:this.value}
                });
            }
            // Add the new option
            select.prepend(option);
            // Automatically select it
            select.find(option).prop('selected', true);
            // Trigger the update
            select.trigger("chosen:updated");
        }
    });
}


function countSum(input){
    var input = $(input);
    var element = input.parent('div').parent('div');
    var num = element.find('.d_num');
    var price = element.find('.d_price');
    var sum = element.find('.d_sum');

    if(num.val() > 0 && price.val() > 0){
        sum.val(num.val() * price.val());
    }
}

//REMOVE IMAGES
function removeImage(button){
    $(button).parent('div').remove();
}