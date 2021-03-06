function changeStylesheetRule(s, selector, property, value){
    // Make these strings lowercase
    selector = selector.toLowerCase();
    value    = value.toLowerCase();

    // Delete it if it exists
    for(var i = 0; i < s.cssRules.length; i++){
        var rule = s.cssRules[i];
        if(rule.selectorText === selector){
            s.deleteRule(i);
            break;
        }
    }

    // Convert camelCase to hyphenated-case
    property = property.replace(/([a-z])([A-Z])/g, '$1-$2').toLowerCase();
    s.insertRule(selector + " { " + property + ": " + value + "; }", 0);
}

// Function to select random array element
// Used within the setInterval()
function randomValue(arr){
    // console.log(arr[Math.floor(Math.random() * arr.length)]);
    return arr[Math.floor(Math.random() * arr.length)];
}

jQuery.easing['jswing'] = jQuery.easing['swing'];
jQuery.extend(jQuery.easing, {
    def: 'easeOutQuad',
    swing: function (x, t, b, c, d){
        return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
    },
    easeOutQuad: function (x, t, b, c, d){
        return -c * (t /= d) * (t - 2) + b;
    },
});

$(document).ready(function(){
    var perc = 30;
    var s = document.styleSheets[0];
    // Define a size array, this will be used to vary bubble sizes
    var sArray = [];

    setTimeout(function(){
        updateBattery(perc, s);
        $('.percentage').text(perc);
        $('.units').text('%');
        $('.battery-text').css('opacity', 1);
        $('.slider input').animate({ value: perc }, 500, 'easeOutQuad');

        setTimeout(function(){
            $('.liquid').show();
        }, 500);
    }, 500);
    // get value for tank


    function updateBattery(perc, s){
        if(perc === 100){
            sArray = [];
        } else if(sArray.length === 0){
            sArray = [4, 6, 8, 10];
        }

        changeStylesheetRule(s, '.battery', 'backgroundPosition', '0 -' + (100 - perc) + '% !important');
        changeStylesheetRule(s, '.battery-text', 'backgroundPosition', '0 -' + (100 - perc) + '%');
        changeStylesheetRule(s, '.liquid', 'top', (100 - perc) + '%');
        if(perc === 100){
            changeStylesheetRule(s, '.liquid-bg-color', 'backgroundColor', '#00fa57');
        } else {
            changeStylesheetRule(s, '.liquid-bg-color', 'backgroundColor', '#444');
        }
    }

    // setInterval function used to create new bubble every 350 milliseconds
    setInterval(function(){
        if(sArray.length > 0){
            // Get a random size, defined as variable so it can be used for both width and height
            var size = randomValue(sArray);

            var largestSize = Math.max.apply(Math, sArray);
            var offset = largestSize / 2; // half to get the largest bubble radius
            offset += 5; // 5px for border-right

            // New bubble appended to div with it's size and left position being set inline
            $('.bubbles').each(function(){
                var bArray = new Array(parseInt($(this).width()) - offset)
                                 .join()
                                 .split(',')
                                 .map(function(item, index){ return ++index; });

                $(this).append('<div class="individual-bubble" style="left: ' + randomValue(bArray) + 'px; width: ' + size + 'px; height: ' + size + 'px"></div>');
            });

            // Animate each bubble to the top (bottom 100%) and reduce opacity as it moves
            // Callback function used to remove finished animations from the page
            $('.individual-bubble').animate({
                'top': 0,
                'bottom': '100%',
                'opacity' : '-=0.7',
            }, 3000, function(){
                $(this).remove();
            });
        }
    }, 350);

   function getval(){
            $.get("http://192.168.10.4/proj/public/water/value", function(data, status){
             console.log(data);
updateBattery(data, s);
$('.percentage').text(data);
            });
          }
          setInterval(getval,7000);
    $('.slider input').on('input', function(){
        $(this).stop(); // Terminate any running animation
        var original = this.value;
        // Set slider back to its starting value so we can animate the change
        this.value = perc;
        perc = parseInt(original);
        $(this).animate({ value: perc }, 500, 'easeOutQuad');
        $('.percentage').text(perc);
    }).on('mouseup', function(){
        // We need to manually call this to make sure things bubble up to the change event
        $(this).trigger('change');
    }).on('change', function(){
        updateBattery(perc, s);
    });
});
