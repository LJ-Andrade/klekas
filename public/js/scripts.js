/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 72);
/******/ })
/************************************************************************/
/******/ ({

/***/ 72:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(73);


/***/ }),

/***/ 73:
/***/ (function(module, exports) {

// Loaders
// -------------------------------------------
$(".loader-on-change").on('change', function () {
    $('#full-loader').removeClass('Hidden');
    return true;
});

$(".loader-on-submit").on('submit', function () {
    $('#full-loader').removeClass('Hidden');
    return true;
});

$('.dont-submit-on-enter, .dson').keypress(function (e) {
    console.log("ENTER");
    if (e.which == 13) return false;
    if (e.which == 13) e.preventDefault();
});

// Store Filters
// -------------------------------------------

window.collapseFilter = function (elem) {
    var filter = elem.siblings('ul');
    if (filter.hasClass('collapsed')) {
        filter.removeClass('collapsed');
        filter.show(100);
        elem.html('-');
    } else {
        filter.addClass('collapsed');
        filter.hide(100);
        elem.html('+');
    }
};

// Modify cart item quantity 
// -------------------------------------------
$('.InputBtnQ').on('change keyup', function () {
    //  Original Article Price
    var value = $(this).siblings('.ArticlePrice').val();
    // Quantity
    var quantity = $(this).val();
    // Ner Value
    var newValue = value * quantity;
    // New Price Target
    var newPriceTarget = $(this).parent().parent().parent().siblings('.TotalItemPrice');

    console.log(value, quantity, newValue);
    modifyCartItemQ($(this), newPriceTarget, newValue);
});

function modifyCartItemQ(e, newPriceTarget, newValue) {
    e.siblings('.InputBtnQ').removeClass('Hidden');
    newPriceTarget.html('$ ' + newValue);
}

$('#MainOverlay').click(function () {
    checkoutSidebar('hide');
});

// Checkout sidebar
// -------------------------------------------		
window.checkoutSidebar = function (state) {

    var sidebar = $('.CheckoutCart');
    var wrapper = $('.main-wrapper');

    var show = function show() {
        sidebar.addClass('active');
        wrapper.addClass('allow-sidebar');
    };

    var hide = function hide() {
        sidebar.removeClass('active');
        wrapper.removeClass('allow-sidebar');
    };

    if (state == undefined) {
        if (sidebar.hasClass('active')) {
            hide();
        } else {
            show();
        }
    } else if (state == 'show') {
        show();
        return false;
    } else if (state == 'hide') {
        hide();
        return false;
    }
};

window.openCheckoutDesktop = function () {
    if ($(window).width() > 768) {
        checkoutSidebar('show');
    }
    return false;
};

window.openFilters = function () {
    var filters = $('#SearchFilters');
    var trigger = $('#SearchFiltersTrigger');
    if (filters.hasClass('active')) {
        filters.removeClass('active');
        trigger.show();
    } else {
        filters.addClass('active');
        trigger.hide();
    }
};

/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

window.sumAllItems = function () {
    sum = 0;
    $('.TotalItemPrice').each(function (index) {
        sum += parseInt($(this).html());
    });
    $('.SubTotal').html(sum);
};

// Sum divs text
window.sumDivs = function (origins, target) {
    var sum = 0;
    origins.each(function () {
        sum += parseFloat($(this).text());
    });
    target.text(sum);
};

// Check product variant stock
// -------------------------------------------
window.checkVariantStock = function () {

    var form = $('#AddToCartForm');
    var data = form.serialize();
    var allowSubmit = false;
    var submitButton = $('#AddToCartFormBtn');
    $.ajax({
        url: form.data('route'),
        method: 'GET',
        dataType: 'JSON',
        async: false,
        data: data,
        success: function success(data) {
            console.log(data);
            if (data.response == true) {
                if (data.message == '0') {
                    $('.AvailableStock').html("No hay stock disponible");
                    submitButton.prop('disabled', true);
                } else {
                    console.log(data);
                    $('.AvailableStock').html("Stock disponible: " + data.message);
                    submitButton.prop('disabled', false);
                    allowSubmit = true;
                    console.log("Entro en SUCCESS");
                }
                $('#MaxQuantity').prop("max", data.message);
            } else {
                // console.log(data);
                // $('#Error').html(data.responseText);
                $('.AvailableStock').html(data.message);
                submitButton.prop('disabled', true);
            }
        },
        error: function error(data) {
            $('#Error').html(data.responseText);
            // location.reload();
            allowSubmit = false;
            submitButton.prop('disabled', true);
            console.log(data);
            console.log("Entro en error 2");
        }
    });
    return allowSubmit;
};

// Set cart items JSON
// -------------------------------------------
window.setItemsData = function () {
    itemData = [];

    $('.Item-Data').each(function () {
        var id = $(this).data('id');
        var price = $(this).data('price');
        var variant_id = $(this).data('variant');
        var quantity = $(this).val();

        item = {};
        item['id'] = id;
        item['variant_id'] = variant_id;
        item['price'] = price;
        item['quantity'] = quantity;
        // Update display total item price
        total = price * quantity;
        $('.' + id + '-TotalItemPrice').html(total);

        itemData.push(item);
    });
    // Update Total
    console.info(itemData);
    sumAllItems();
    $('#Items-Data').val(itemData);
};

// Add product to cart
// -------------------------------------------
window.addToCart = function (route, data) {
    $.ajax({
        url: route,
        method: 'POST',
        dataType: 'JSON',
        data: data,
        success: function success(data) {
            // console.log(data);
            if (data.response == 'success') {
                $('.AvailableStock').html("Stock disponible: " + data.newStock);
                toast_success('Ok!', data.message, 'bottomCenter', '', 2500);
                updateTotals();
                setItemsData();
                setTimeout(function () {
                    setItemsData();
                    sumAllItems();
                    // openCheckoutDesktop();
                }, 100);
            } else if (data.response == 'warning') {
                toast_success('Ups!', data.message, 'bottomCenter');
            }
        },
        error: function error(data) {
            $('#Error').html(data.responseText);
            console.log("Error en addtoCart()");
            // location.reload();
            console.log(data);
        }
    });
};

// Remove product from cart
// -------------------------------------------
window.removeFromCart = function (route, cartItemId, variantId, quantity, div, action) {
    $.ajax({
        url: route,
        method: 'POST',
        dataType: 'JSON',
        data: { cartItemId: cartItemId, variantId: variantId, quantity: quantity, action: action, method: 'ajax' },
        success: function success(data) {
            if (data.response == 'cart-removed') {
                // console.log(data);
                updateTotals();
                window.location = window.location.href.split("?")[0];
                setItemsData();
            } else if (data.response == 'success') {
                $(div).hide(100);
                $(div).remove();
                updateTotals();
                setItemsData();
            }
        },
        error: function error(data) {
            //$('#Error').html(data.responseText);
            console.log("Error en removeFromCart()");
            console.log(data);
            // If an error pops when destroying an item, reload and prevent bad magic
            location.reload();
        }
    });
};

function updateTotals() {
    // Live Reloading stuff
    $("#SideContainerItemsFixed").load(window.location.href + " #SideContainerItemsFixed");
    $("#SideContainerItemsFloating").load(window.location.href + " #SideContainerItemsFloating");
    $(".TotalCartItems").load(window.location.href + " .TotalCartItems");
    $(".TotalCartItemsSidebar").load(window.location.href + " .TotalCartItemsSidebar");
    $(".CartSubTotal").load(window.location.href + " .CartSubTotal");
    $(".AvailableStock").load(window.location.href + " .AvailableStock");
}

// Submit Cart Form to Checkout
// -------------------------------------------
window.submitCartToCheckout = function (route, target, data, action) {
    //console.log("Ruta: " + route + " Target: " + target + " Data: " + data + "Action: "+ action);
    $.ajax({
        url: route,
        method: 'POST',
        dataType: 'JSON',
        data: { data: data, action: action },
        success: function success(data) {
            console.log(data);
            if (data.response == 'success') {
                console.log(target);
                if (target == 'reload') {
                    // Refresh page, delete parametters and open checkout sidebar
                    window.location = window.location.href.split("?")[0] + "?checkout-on";
                } else {
                    window.location.href = target;
                }
            } else {
                console.log('Error en submitForm');
                console.log(data);
                toast_error('', data.message, 'bottomCenter', '');
                $('.SideContainerError').html(data.message);
                // $('#Error').html(data.responseText);
            }
            // $('#Error').html(data.responseText);
        },
        error: function error(data) {
            // $('#Error').html(data.responseText);
            console.log("Error en submitForm()");
            location.reload();
            console.log(data);
            // location.reload();
        }
    });
};

// Validate and set coupon
// -------------------------------------------
window.validateAndSetCoupon = function (route, code, cartid) {
    var couponDiv = $('#CouponDiv');
    var couponSet = $('#SettedCoupon');
    console.log(code, cartid);
    $.ajax({
        url: route,
        method: 'POST',
        dataType: 'JSON',
        data: { code: code, cartid: cartid },
        beforeSend: function beforeSend() {
            console.log("Comprobando cupón...");
            $('.CouponLoader').removeClass('Hidden');
        },
        success: function success(data) {
            if (data.response == true) {
                $('#CouponValidationMessage').html("Cupón aceptado !");
                couponDiv.hide(200, function () {
                    couponSet.removeClass('Hidden');
                });
                location.reload();
            } else if (data.response == null) {
                $('#CouponValidationMessage').html(data.message);
            }
        },
        error: function error(data) {
            $('#CouponValidationMessage').html(data.responseText);
            console.log(data);
        },
        complete: function complete() {
            $('.CouponLoader').addClass('Hidden');
        }
    });
};

// Favs
// -------------------------------------------
window.addArticleToFavs = function (route, favid, articleid, action, displayButton) {
    $.ajax({
        url: route,
        method: 'POST',
        dataType: 'JSON',
        data: { fav_id: favid, article_id: articleid },
        success: function success(data) {
            if (data.response == true && data.result == 'added') {
                switch (action) {
                    case 'reload':
                        location.reload();
                        break;
                    case 'show':
                        displayButton.removeClass('fav-icon-nofav');
                        displayButton.addClass('fav-icon-isfav');
                        toast_success('Ok!', 'Producto agregado a favoritos', 'bottomCenter', '', 1000);
                        break;
                    case 'none':
                        console.log('Actualizado - Sin Acción');
                    default:
                        console.log('No hay acción');
                        break;
                }
            } else if (data.response == true && data.result == 'removed') {
                displayButton.addClass('fav-icon-nofav');
                displayButton.removeClass('fav-icon-isfav');
                toast_success('Ok!', 'Producto eliminado de favoritos', 'bottomCenter', '', 1000);
            }
            setFavsTotalIcon(data.favsCount);
        },
        error: function error(data) {
            $('#Error').html(data.responseText);
            console.log(data);
        }
    });
};

function setFavsTotalIcon(favs) {
    if (favs > 0) {
        $('.FavMainIcon').removeClass('far');
        $('.FavMainIcon').addClass('fa');
    } else if (favs == 0) {
        $('.FavMainIcon').removeClass('fa');
        $('.FavMainIcon').addClass('far');
    } else {
        $('.FavMainIcon').removeClass('fa');
        $('.FavMainIcon').removeClass('far');
        $('.FavMainIcon').addClass('fa');
        console.log("Error en setFavsTotalIcon()");
    }
}

window.removeArticleFromFavs = function (route, favid, action) {
    var doaction = action;
    $.ajax({
        url: route,
        method: 'POST',
        dataType: 'JSON',
        data: { fav_id: favid },
        success: function success(data) {
            $('#Error').html(data.responseText);
            console.log(data);
            if (data.response == true) {
                console.log(doaction);
                switch (doaction) {
                    case 'reload':
                        var action = 'reload';
                        toast_success('Ok!', 'Producto eliminado de favoritos', 'bottomCenter', action, 1000);
                        break;
                    default:
                        console.log('No hay acción');
                        break;
                }
            } else {
                //$('#Error').html(data.message['errorInfo']);
                console.log(data);
            }
        },
        error: function error(data) {
            //$('#Error').html(data.responseText);
            console.log(data);
        }
    });
};

window.removeAllArticlesFromFavs = function (route, customerid, action) {
    $.ajax({
        url: route,
        method: 'POST',
        dataType: 'JSON',
        data: { customer_id: customerid },
        success: function success(data) {
            console.log(data);
            //$('#Error').html(data.responseText);
            if (data.response == true) {
                switch (action) {
                    case 'reload':
                        location.reload();
                        break;
                    default:
                        console.log('No hay acción');
                        break;
                }
            } else {
                $('#Error').html(data.message['errorInfo']);
                console.log(data);
            }
        },
        error: function error(data) {
            //$('#Error').html(data.responseText);
            console.log(data);
        }
    });
};

/*
|--------------------------------------------------------------------------
| LOGIN AND REGISTER
|--------------------------------------------------------------------------
*/

$('#ResellerBox').hide();

window.openResellerRegistration = function () {
    $('#IsResellerCheckbox').prop('checked', true);
    $('.IfResellerEnable').prop('disabled', false);
    $('#ResellerBox').show(100);
    $('#ResellerCTA').hide(0);
    $('.NormaClientTitle').hide(0);
    $('.ResellerTitle').show(0);
};

window.closeResellerRegistration = function () {
    $('#IsResellerCheckbox').prop('checked', false);
    $('.IfResellerEnable').prop('disabled', true);
    $('#ResellerBox').hide(0);
    $('#ResellerCTA').show(100);
    $('.NormaClientTitle').show(0);
    $('.ResellerTitle').hide(0);
};

$(document).ready(function () {
    $('.GeoProvSelect').on('change', function () {
        var prov_id = $(this).val();
        getGeoLocs(prov_id);
    });
});

/*
|--------------------------------------------------------------------------
| MIX FUNCTIONS
|--------------------------------------------------------------------------
*/

window.closeElement = function (selector) {
    $(selector).hide(100);
};

window.getParam = function (parameterName) {
    var result = null,
        tmp = [];
    location.search.substr(1).split("&").forEach(function (item) {
        tmp = item.split("=");
        if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
    });
    return result;
};

window.getParams = function (url) {
    var params = {};
    var parser = document.createElement('a');
    parser.href = url;
    var query = parser.search.substring(1);
    var vars = query.split('&');
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        params[pair[0]] = decodeURIComponent(pair[1]);
    }
    return params;
};

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgYzFhZDgxNjg3ODA5N2M5NTY0MWYiLCJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9qcy9zdG9yZS9zY3JpcHRzLmpzIl0sIm5hbWVzIjpbIiQiLCJvbiIsInJlbW92ZUNsYXNzIiwia2V5cHJlc3MiLCJlIiwiY29uc29sZSIsImxvZyIsIndoaWNoIiwicHJldmVudERlZmF1bHQiLCJ3aW5kb3ciLCJjb2xsYXBzZUZpbHRlciIsImVsZW0iLCJmaWx0ZXIiLCJzaWJsaW5ncyIsImhhc0NsYXNzIiwic2hvdyIsImh0bWwiLCJhZGRDbGFzcyIsImhpZGUiLCJ2YWx1ZSIsInZhbCIsInF1YW50aXR5IiwibmV3VmFsdWUiLCJuZXdQcmljZVRhcmdldCIsInBhcmVudCIsIm1vZGlmeUNhcnRJdGVtUSIsImNsaWNrIiwiY2hlY2tvdXRTaWRlYmFyIiwic3RhdGUiLCJzaWRlYmFyIiwid3JhcHBlciIsInVuZGVmaW5lZCIsIm9wZW5DaGVja291dERlc2t0b3AiLCJ3aWR0aCIsIm9wZW5GaWx0ZXJzIiwiZmlsdGVycyIsInRyaWdnZXIiLCJzdW1BbGxJdGVtcyIsInN1bSIsImVhY2giLCJpbmRleCIsInBhcnNlSW50Iiwic3VtRGl2cyIsIm9yaWdpbnMiLCJ0YXJnZXQiLCJwYXJzZUZsb2F0IiwidGV4dCIsImNoZWNrVmFyaWFudFN0b2NrIiwiZm9ybSIsImRhdGEiLCJzZXJpYWxpemUiLCJhbGxvd1N1Ym1pdCIsInN1Ym1pdEJ1dHRvbiIsImFqYXgiLCJ1cmwiLCJtZXRob2QiLCJkYXRhVHlwZSIsImFzeW5jIiwic3VjY2VzcyIsInJlc3BvbnNlIiwibWVzc2FnZSIsInByb3AiLCJlcnJvciIsInJlc3BvbnNlVGV4dCIsInNldEl0ZW1zRGF0YSIsIml0ZW1EYXRhIiwiaWQiLCJwcmljZSIsInZhcmlhbnRfaWQiLCJpdGVtIiwidG90YWwiLCJwdXNoIiwiaW5mbyIsImFkZFRvQ2FydCIsInJvdXRlIiwibmV3U3RvY2siLCJ0b2FzdF9zdWNjZXNzIiwidXBkYXRlVG90YWxzIiwic2V0VGltZW91dCIsInJlbW92ZUZyb21DYXJ0IiwiY2FydEl0ZW1JZCIsInZhcmlhbnRJZCIsImRpdiIsImFjdGlvbiIsImxvY2F0aW9uIiwiaHJlZiIsInNwbGl0IiwicmVtb3ZlIiwicmVsb2FkIiwibG9hZCIsInN1Ym1pdENhcnRUb0NoZWNrb3V0IiwidG9hc3RfZXJyb3IiLCJ2YWxpZGF0ZUFuZFNldENvdXBvbiIsImNvZGUiLCJjYXJ0aWQiLCJjb3Vwb25EaXYiLCJjb3Vwb25TZXQiLCJiZWZvcmVTZW5kIiwiY29tcGxldGUiLCJhZGRBcnRpY2xlVG9GYXZzIiwiZmF2aWQiLCJhcnRpY2xlaWQiLCJkaXNwbGF5QnV0dG9uIiwiZmF2X2lkIiwiYXJ0aWNsZV9pZCIsInJlc3VsdCIsInNldEZhdnNUb3RhbEljb24iLCJmYXZzQ291bnQiLCJmYXZzIiwicmVtb3ZlQXJ0aWNsZUZyb21GYXZzIiwiZG9hY3Rpb24iLCJyZW1vdmVBbGxBcnRpY2xlc0Zyb21GYXZzIiwiY3VzdG9tZXJpZCIsImN1c3RvbWVyX2lkIiwib3BlblJlc2VsbGVyUmVnaXN0cmF0aW9uIiwiY2xvc2VSZXNlbGxlclJlZ2lzdHJhdGlvbiIsImRvY3VtZW50IiwicmVhZHkiLCJwcm92X2lkIiwiZ2V0R2VvTG9jcyIsImNsb3NlRWxlbWVudCIsInNlbGVjdG9yIiwiZ2V0UGFyYW0iLCJwYXJhbWV0ZXJOYW1lIiwidG1wIiwic2VhcmNoIiwic3Vic3RyIiwiZm9yRWFjaCIsImRlY29kZVVSSUNvbXBvbmVudCIsImdldFBhcmFtcyIsInBhcmFtcyIsInBhcnNlciIsImNyZWF0ZUVsZW1lbnQiLCJxdWVyeSIsInN1YnN0cmluZyIsInZhcnMiLCJpIiwibGVuZ3RoIiwicGFpciJdLCJtYXBwaW5ncyI6IjtBQUFBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FB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QUFQLElBQWtCVixtQkFBbUJVLEtBQUssQ0FBTCxDQUFuQixDQUFsQjtBQUNBO0FBQ0QsV0FBT1IsTUFBUDtBQUNBLENBWEQsQyIsImZpbGUiOiIvanMvc2NyaXB0cy5qcyIsInNvdXJjZXNDb250ZW50IjpbIiBcdC8vIFRoZSBtb2R1bGUgY2FjaGVcbiBcdHZhciBpbnN0YWxsZWRNb2R1bGVzID0ge307XG5cbiBcdC8vIFRoZSByZXF1aXJlIGZ1bmN0aW9uXG4gXHRmdW5jdGlvbiBfX3dlYnBhY2tfcmVxdWlyZV9fKG1vZHVsZUlkKSB7XG5cbiBcdFx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG4gXHRcdGlmKGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdKSB7XG4gXHRcdFx0cmV0dXJuIGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdLmV4cG9ydHM7XG4gXHRcdH1cbiBcdFx0Ly8gQ3JlYXRlIGEgbmV3IG1vZHVsZSAoYW5kIHB1dCBpdCBpbnRvIHRoZSBjYWNoZSlcbiBcdFx0dmFyIG1vZHVsZSA9IGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdID0ge1xuIFx0XHRcdGk6IG1vZHVsZUlkLFxuIFx0XHRcdGw6IGZhbHNlLFxuIFx0XHRcdGV4cG9ydHM6IHt9XG4gXHRcdH07XG5cbiBcdFx0Ly8gRXhlY3V0ZSB0aGUgbW9kdWxlIGZ1bmN0aW9uXG4gXHRcdG1vZHVsZXNbbW9kdWxlSWRdLmNhbGwobW9kdWxlLmV4cG9ydHMsIG1vZHVsZSwgbW9kdWxlLmV4cG9ydHMsIF9fd2VicGFja19yZXF1aXJlX18pO1xuXG4gXHRcdC8vIEZsYWcgdGhlIG1vZHVsZSBhcyBsb2FkZWRcbiBcdFx0bW9kdWxlLmwgPSB0cnVlO1xuXG4gXHRcdC8vIFJldHVybiB0aGUgZXhwb3J0cyBvZiB0aGUgbW9kdWxlXG4gXHRcdHJldHVybiBtb2R1bGUuZXhwb3J0cztcbiBcdH1cblxuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZXMgb2JqZWN0IChfX3dlYnBhY2tfbW9kdWxlc19fKVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5tID0gbW9kdWxlcztcblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGUgY2FjaGVcbiBcdF9fd2VicGFja19yZXF1aXJlX18uYyA9IGluc3RhbGxlZE1vZHVsZXM7XG5cbiBcdC8vIGRlZmluZSBnZXR0ZXIgZnVuY3Rpb24gZm9yIGhhcm1vbnkgZXhwb3J0c1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kID0gZnVuY3Rpb24oZXhwb3J0cywgbmFtZSwgZ2V0dGVyKSB7XG4gXHRcdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZXhwb3J0cywgbmFtZSkpIHtcbiBcdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgbmFtZSwge1xuIFx0XHRcdFx0Y29uZmlndXJhYmxlOiBmYWxzZSxcbiBcdFx0XHRcdGVudW1lcmFibGU6IHRydWUsXG4gXHRcdFx0XHRnZXQ6IGdldHRlclxuIFx0XHRcdH0pO1xuIFx0XHR9XG4gXHR9O1xuXG4gXHQvLyBnZXREZWZhdWx0RXhwb3J0IGZ1bmN0aW9uIGZvciBjb21wYXRpYmlsaXR5IHdpdGggbm9uLWhhcm1vbnkgbW9kdWxlc1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5uID0gZnVuY3Rpb24obW9kdWxlKSB7XG4gXHRcdHZhciBnZXR0ZXIgPSBtb2R1bGUgJiYgbW9kdWxlLl9fZXNNb2R1bGUgP1xuIFx0XHRcdGZ1bmN0aW9uIGdldERlZmF1bHQoKSB7IHJldHVybiBtb2R1bGVbJ2RlZmF1bHQnXTsgfSA6XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0TW9kdWxlRXhwb3J0cygpIHsgcmV0dXJuIG1vZHVsZTsgfTtcbiBcdFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kKGdldHRlciwgJ2EnLCBnZXR0ZXIpO1xuIFx0XHRyZXR1cm4gZ2V0dGVyO1xuIFx0fTtcblxuIFx0Ly8gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSBmdW5jdGlvbihvYmplY3QsIHByb3BlcnR5KSB7IHJldHVybiBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwob2JqZWN0LCBwcm9wZXJ0eSk7IH07XG5cbiBcdC8vIF9fd2VicGFja19wdWJsaWNfcGF0aF9fXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLnAgPSBcIi9cIjtcblxuIFx0Ly8gTG9hZCBlbnRyeSBtb2R1bGUgYW5kIHJldHVybiBleHBvcnRzXG4gXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhfX3dlYnBhY2tfcmVxdWlyZV9fLnMgPSA3Mik7XG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gd2VicGFjay9ib290c3RyYXAgYzFhZDgxNjg3ODA5N2M5NTY0MWYiLCIvLyBMb2FkZXJzXG4vLyAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4kKFwiLmxvYWRlci1vbi1jaGFuZ2VcIikub24oJ2NoYW5nZScsIGZ1bmN0aW9uICgpIHtcbiAgICAkKCcjZnVsbC1sb2FkZXInKS5yZW1vdmVDbGFzcygnSGlkZGVuJyk7XG4gICAgcmV0dXJuIHRydWU7XG59KTtcblxuJChcIi5sb2FkZXItb24tc3VibWl0XCIpLm9uKCdzdWJtaXQnLCBmdW5jdGlvbiAoKSB7XG4gICAgJCgnI2Z1bGwtbG9hZGVyJykucmVtb3ZlQ2xhc3MoJ0hpZGRlbicpO1xuICAgIHJldHVybiB0cnVlO1xufSk7XG5cbiQoJy5kb250LXN1Ym1pdC1vbi1lbnRlciwgLmRzb24nKS5rZXlwcmVzcyhmdW5jdGlvbiAoZSkge1xuICAgIGNvbnNvbGUubG9nKFwiRU5URVJcIik7XG4gICAgaWYgKGUud2hpY2ggPT0gMTMpIHJldHVybiBmYWxzZTtcbiAgICBpZiAoZS53aGljaCA9PSAxMykgZS5wcmV2ZW50RGVmYXVsdCgpO1xufSk7XG5cbi8vIFN0b3JlIEZpbHRlcnNcbi8vIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cblxud2luZG93LmNvbGxhcHNlRmlsdGVyID0gZnVuY3Rpb24oZWxlbSkge1xuICAgIGNvbnN0IGZpbHRlciA9IGVsZW0uc2libGluZ3MoJ3VsJyk7XG4gICAgaWYoZmlsdGVyLmhhc0NsYXNzKCdjb2xsYXBzZWQnKSlcbiAgICB7XG4gICAgICAgIGZpbHRlci5yZW1vdmVDbGFzcygnY29sbGFwc2VkJyk7XG4gICAgICAgIGZpbHRlci5zaG93KDEwMCk7XG4gICAgICAgIGVsZW0uaHRtbCgnLScpO1xuICAgIH1cbiAgICBlbHNlXG4gICAge1xuICAgICAgICBmaWx0ZXIuYWRkQ2xhc3MoJ2NvbGxhcHNlZCcpO1xuICAgICAgICBmaWx0ZXIuaGlkZSgxMDApO1xuICAgICAgICBlbGVtLmh0bWwoJysnKTtcbiAgICB9XG59XG5cbi8vIE1vZGlmeSBjYXJ0IGl0ZW0gcXVhbnRpdHkgXG4vLyAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4kKCcuSW5wdXRCdG5RJykub24oJ2NoYW5nZSBrZXl1cCcsIGZ1bmN0aW9uICgpIHtcbiAgICAvLyAgT3JpZ2luYWwgQXJ0aWNsZSBQcmljZVxuICAgIGxldCB2YWx1ZSA9ICQodGhpcykuc2libGluZ3MoJy5BcnRpY2xlUHJpY2UnKS52YWwoKTtcbiAgICAvLyBRdWFudGl0eVxuICAgIGxldCBxdWFudGl0eSA9ICQodGhpcykudmFsKCk7XG4gICAgLy8gTmVyIFZhbHVlXG4gICAgbGV0IG5ld1ZhbHVlID0gKHZhbHVlICogcXVhbnRpdHkpO1xuICAgIC8vIE5ldyBQcmljZSBUYXJnZXRcbiAgICBsZXQgbmV3UHJpY2VUYXJnZXQgPSAkKHRoaXMpLnBhcmVudCgpLnBhcmVudCgpLnBhcmVudCgpLnNpYmxpbmdzKCcuVG90YWxJdGVtUHJpY2UnKTtcblxuICAgIGNvbnNvbGUubG9nKHZhbHVlLCBxdWFudGl0eSwgbmV3VmFsdWUpO1xuICAgIG1vZGlmeUNhcnRJdGVtUSgkKHRoaXMpLCBuZXdQcmljZVRhcmdldCwgbmV3VmFsdWUpO1xufSlcblxuZnVuY3Rpb24gbW9kaWZ5Q2FydEl0ZW1RKGUsIG5ld1ByaWNlVGFyZ2V0LCBuZXdWYWx1ZSkge1xuICAgIGUuc2libGluZ3MoJy5JbnB1dEJ0blEnKS5yZW1vdmVDbGFzcygnSGlkZGVuJyk7XG4gICAgbmV3UHJpY2VUYXJnZXQuaHRtbCgnJCAnICsgbmV3VmFsdWUpO1xufVxuXG4kKCcjTWFpbk92ZXJsYXknKS5jbGljayhmdW5jdGlvbigpe1xuICAgIGNoZWNrb3V0U2lkZWJhcignaGlkZScpO1xufSlcblxuLy8gQ2hlY2tvdXQgc2lkZWJhclxuLy8gLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVx0XHRcbndpbmRvdy5jaGVja291dFNpZGViYXIgPSBmdW5jdGlvbiAoc3RhdGUpIHtcblxuICAgIGNvbnN0IHNpZGViYXIgPSAkKCcuQ2hlY2tvdXRDYXJ0Jyk7XG4gICAgY29uc3Qgd3JhcHBlciA9ICQoJy5tYWluLXdyYXBwZXInKTtcblxuICAgIGNvbnN0IHNob3cgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHNpZGViYXIuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgICAgICB3cmFwcGVyLmFkZENsYXNzKCdhbGxvdy1zaWRlYmFyJyk7XG4gICAgfVxuXG4gICAgY29uc3QgaGlkZSA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgc2lkZWJhci5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG4gICAgICAgIHdyYXBwZXIucmVtb3ZlQ2xhc3MoJ2FsbG93LXNpZGViYXInKTtcbiAgICB9XG5cblxuICAgIGlmIChzdGF0ZSA9PSB1bmRlZmluZWQpIHtcbiAgICAgICAgaWYgKHNpZGViYXIuaGFzQ2xhc3MoJ2FjdGl2ZScpKSB7XG4gICAgICAgICAgICBoaWRlKCk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBzaG93KCk7XG4gICAgICAgIH1cbiAgICB9IGVsc2UgaWYgKHN0YXRlID09ICdzaG93Jykge1xuICAgICAgICBzaG93KCk7XG4gICAgICAgIHJldHVybiBmYWxzZTtcbiAgICB9IGVsc2UgaWYgKHN0YXRlID09ICdoaWRlJykge1xuICAgICAgICBoaWRlKCk7XG4gICAgICAgIHJldHVybiBmYWxzZTtcbiAgICB9XG59XG5cbndpbmRvdy5vcGVuQ2hlY2tvdXREZXNrdG9wID0gZnVuY3Rpb24oKVxue1xuICAgIGlmICgkKHdpbmRvdykud2lkdGgoKSA+IDc2OCkge1xuICAgICAgICBjaGVja291dFNpZGViYXIoJ3Nob3cnKTtcbiAgICB9XG4gICAgcmV0dXJuIGZhbHNlO1xufVxuXG53aW5kb3cub3BlbkZpbHRlcnMgPSBmdW5jdGlvbiAoKSB7XG4gICAgY29uc3QgZmlsdGVycyA9ICQoJyNTZWFyY2hGaWx0ZXJzJyk7XG4gICAgY29uc3QgdHJpZ2dlciA9ICQoJyNTZWFyY2hGaWx0ZXJzVHJpZ2dlcicpO1xuICAgIGlmKGZpbHRlcnMuaGFzQ2xhc3MoJ2FjdGl2ZScpKVxuICAgIHtcbiAgICAgICAgZmlsdGVycy5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG4gICAgICAgIHRyaWdnZXIuc2hvdygpO1xuICAgIH1cbiAgICBlbHNlXG4gICAge1xuICAgICAgICBmaWx0ZXJzLmFkZENsYXNzKCdhY3RpdmUnKTtcbiAgICAgICAgdHJpZ2dlci5oaWRlKCk7XG4gICAgfVxuXG59XG5cbi8qXG58LS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbnwgQ0FSVFxufC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4qL1xuXG5cbndpbmRvdy5zdW1BbGxJdGVtcyA9IGZ1bmN0aW9uICgpIHtcbiAgICBzdW0gPSAwO1xuICAgICQoJy5Ub3RhbEl0ZW1QcmljZScpLmVhY2goZnVuY3Rpb24gKGluZGV4KSB7XG4gICAgICAgIHN1bSArPSBwYXJzZUludCgkKHRoaXMpLmh0bWwoKSk7XG4gICAgfSk7XG4gICAgJCgnLlN1YlRvdGFsJykuaHRtbChzdW0pO1xufVxuXG5cbi8vIFN1bSBkaXZzIHRleHRcbndpbmRvdy5zdW1EaXZzID0gZnVuY3Rpb24gKG9yaWdpbnMsIHRhcmdldCkge1xuICAgIGxldCBzdW0gPSAwO1xuICAgIG9yaWdpbnMuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICAgIHN1bSArPSBwYXJzZUZsb2F0KCQodGhpcykudGV4dCgpKTtcbiAgICB9KTtcbiAgICB0YXJnZXQudGV4dChzdW0pO1xufVxuXG5cbi8vIENoZWNrIHByb2R1Y3QgdmFyaWFudCBzdG9ja1xuLy8gLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxud2luZG93LmNoZWNrVmFyaWFudFN0b2NrID0gZnVuY3Rpb24oKSB7XG4gICAgXG4gICAgbGV0IGZvcm0gPSAkKCcjQWRkVG9DYXJ0Rm9ybScpO1xuICAgIGxldCBkYXRhID0gZm9ybS5zZXJpYWxpemUoKTtcbiAgICBsZXQgYWxsb3dTdWJtaXQgPSBmYWxzZTtcbiAgICBsZXQgc3VibWl0QnV0dG9uID0gICQoJyNBZGRUb0NhcnRGb3JtQnRuJyk7XG4gICAgJC5hamF4KHtcbiAgICAgICAgdXJsOiBmb3JtLmRhdGEoJ3JvdXRlJyksXG4gICAgICAgIG1ldGhvZDogJ0dFVCcsXG4gICAgICAgIGRhdGFUeXBlOiAnSlNPTicsXG4gICAgICAgIGFzeW5jOiBmYWxzZSxcbiAgICAgICAgZGF0YTogZGF0YSxcbiAgICAgICAgc3VjY2VzczogZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xuICAgICAgICAgICAgaWYoZGF0YS5yZXNwb25zZSA9PSB0cnVlKVxuICAgICAgICAgICAge1xuICAgICAgICAgICAgICAgIGlmKGRhdGEubWVzc2FnZSA9PSAnMCcpXG4gICAgICAgICAgICAgICAgICAgIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICQoJy5BdmFpbGFibGVTdG9jaycpLmh0bWwoXCJObyBoYXkgc3RvY2sgZGlzcG9uaWJsZVwiKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIHN1Ym1pdEJ1dHRvbi5wcm9wKCdkaXNhYmxlZCcsIHRydWUpO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIGVsc2VcbiAgICAgICAgICAgICAgICAgICAge1xuICAgICAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coZGF0YSk7XG4gICAgICAgICAgICAgICAgICAgICAgICAkKCcuQXZhaWxhYmxlU3RvY2snKS5odG1sKFwiU3RvY2sgZGlzcG9uaWJsZTogXCIgKyBkYXRhLm1lc3NhZ2UpO1xuICAgICAgICAgICAgICAgICAgICAgICAgc3VibWl0QnV0dG9uLnByb3AoJ2Rpc2FibGVkJywgZmFsc2UpO1xuICAgICAgICAgICAgICAgICAgICAgICAgYWxsb3dTdWJtaXQgPSB0cnVlO1xuICAgICAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coXCJFbnRybyBlbiBTVUNDRVNTXCIpO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgJCgnI01heFF1YW50aXR5JykucHJvcChcIm1heFwiLCBkYXRhLm1lc3NhZ2UpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgZWxzZVxuICAgICAgICAgICAge1xuICAgICAgICAgICAgICAgIC8vIGNvbnNvbGUubG9nKGRhdGEpO1xuICAgICAgICAgICAgICAgIC8vICQoJyNFcnJvcicpLmh0bWwoZGF0YS5yZXNwb25zZVRleHQpO1xuICAgICAgICAgICAgICAgICQoJy5BdmFpbGFibGVTdG9jaycpLmh0bWwoZGF0YS5tZXNzYWdlKTtcbiAgICAgICAgICAgICAgICBzdWJtaXRCdXR0b24ucHJvcCgnZGlzYWJsZWQnLCB0cnVlKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSxcbiAgICAgICAgZXJyb3I6IGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgICAgICAgICAkKCcjRXJyb3InKS5odG1sKGRhdGEucmVzcG9uc2VUZXh0KTtcbiAgICAgICAgICAgIC8vIGxvY2F0aW9uLnJlbG9hZCgpO1xuICAgICAgICAgICAgYWxsb3dTdWJtaXQgPSBmYWxzZTtcbiAgICAgICAgICAgIHN1Ym1pdEJ1dHRvbi5wcm9wKCdkaXNhYmxlZCcsIHRydWUpO1xuICAgICAgICAgICAgY29uc29sZS5sb2coZGF0YSk7XG4gICAgICAgICAgICBjb25zb2xlLmxvZyhcIkVudHJvIGVuIGVycm9yIDJcIik7XG4gICAgICAgIH1cbiAgICB9KTtcbiAgICByZXR1cm4gYWxsb3dTdWJtaXQ7XG59XG5cbi8vIFNldCBjYXJ0IGl0ZW1zIEpTT05cbi8vIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbndpbmRvdy5zZXRJdGVtc0RhdGEgPSBmdW5jdGlvbiAoKSB7XG4gICAgaXRlbURhdGEgPSBbXTtcblxuICAgICQoJy5JdGVtLURhdGEnKS5lYWNoKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgbGV0IGlkID0gJCh0aGlzKS5kYXRhKCdpZCcpO1xuICAgICAgICBsZXQgcHJpY2UgPSAkKHRoaXMpLmRhdGEoJ3ByaWNlJyk7XG4gICAgICAgIGxldCB2YXJpYW50X2lkID0gJCh0aGlzKS5kYXRhKCd2YXJpYW50Jyk7XG4gICAgICAgIGxldCBxdWFudGl0eSA9ICQodGhpcykudmFsKCk7XG5cbiAgICAgICAgaXRlbSA9IHt9XG4gICAgICAgIGl0ZW1bJ2lkJ10gPSBpZDtcbiAgICAgICAgaXRlbVsndmFyaWFudF9pZCddID0gdmFyaWFudF9pZDtcbiAgICAgICAgaXRlbVsncHJpY2UnXSA9IHByaWNlO1xuICAgICAgICBpdGVtWydxdWFudGl0eSddID0gcXVhbnRpdHk7XG4gICAgICAgIC8vIFVwZGF0ZSBkaXNwbGF5IHRvdGFsIGl0ZW0gcHJpY2VcbiAgICAgICAgdG90YWwgPSBwcmljZSAqIHF1YW50aXR5O1xuICAgICAgICAkKCcuJyArIGlkICsgJy1Ub3RhbEl0ZW1QcmljZScpLmh0bWwodG90YWwpO1xuXG4gICAgICAgIGl0ZW1EYXRhLnB1c2goaXRlbSk7XG4gICAgfSk7XG4gICAgLy8gVXBkYXRlIFRvdGFsXG4gICAgY29uc29sZS5pbmZvKGl0ZW1EYXRhKTtcbiAgICBzdW1BbGxJdGVtcygpO1xuICAgICQoJyNJdGVtcy1EYXRhJykudmFsKGl0ZW1EYXRhKTtcbn1cblxuLy8gQWRkIHByb2R1Y3QgdG8gY2FydFxuLy8gLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxud2luZG93LmFkZFRvQ2FydCA9IGZ1bmN0aW9uIChyb3V0ZSwgZGF0YSkge1xuICAgICQuYWpheCh7XG4gICAgICAgIHVybDogcm91dGUsXG4gICAgICAgIG1ldGhvZDogJ1BPU1QnLFxuICAgICAgICBkYXRhVHlwZTogJ0pTT04nLFxuICAgICAgICBkYXRhOiBkYXRhLFxuICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgLy8gY29uc29sZS5sb2coZGF0YSk7XG4gICAgICAgICAgICBpZiAoZGF0YS5yZXNwb25zZSA9PSAnc3VjY2VzcycpIHtcbiAgICAgICAgICAgICAgICAkKCcuQXZhaWxhYmxlU3RvY2snKS5odG1sKFwiU3RvY2sgZGlzcG9uaWJsZTogXCIgKyBkYXRhLm5ld1N0b2NrKTtcbiAgICAgICAgICAgICAgICB0b2FzdF9zdWNjZXNzKCdPayEnLCBkYXRhLm1lc3NhZ2UsICdib3R0b21DZW50ZXInLCAnJywgMjUwMCk7XG4gICAgICAgICAgICAgICAgdXBkYXRlVG90YWxzKCk7XG4gICAgICAgICAgICAgICAgc2V0SXRlbXNEYXRhKCk7XG4gICAgICAgICAgICAgICAgc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgIHNldEl0ZW1zRGF0YSgpO1xuICAgICAgICAgICAgICAgICAgICBzdW1BbGxJdGVtcygpO1xuICAgICAgICAgICAgICAgICAgICAvLyBvcGVuQ2hlY2tvdXREZXNrdG9wKCk7XG4gICAgICAgICAgICAgICAgfSwgMTAwKTtcbiAgICAgICAgICAgIH0gZWxzZSBpZiAoZGF0YS5yZXNwb25zZSA9PSAnd2FybmluZycpIHtcbiAgICAgICAgICAgICAgICB0b2FzdF9zdWNjZXNzKCdVcHMhJywgZGF0YS5tZXNzYWdlLCAnYm90dG9tQ2VudGVyJyk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0sXG4gICAgICAgIGVycm9yOiBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgJCgnI0Vycm9yJykuaHRtbChkYXRhLnJlc3BvbnNlVGV4dCk7XG4gICAgICAgICAgICBjb25zb2xlLmxvZyhcIkVycm9yIGVuIGFkZHRvQ2FydCgpXCIpO1xuICAgICAgICAgICAgLy8gbG9jYXRpb24ucmVsb2FkKCk7XG4gICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhKTtcbiAgICAgICAgfVxuICAgIH0pO1xufVxuXG4gXG5cbi8vIFJlbW92ZSBwcm9kdWN0IGZyb20gY2FydFxuLy8gLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxud2luZG93LnJlbW92ZUZyb21DYXJ0ID0gZnVuY3Rpb24gKHJvdXRlLCBjYXJ0SXRlbUlkLCB2YXJpYW50SWQsIHF1YW50aXR5LCBkaXYsIGFjdGlvbikge1xuICAgICQuYWpheCh7XG4gICAgICAgIHVybDogcm91dGUsXG4gICAgICAgIG1ldGhvZDogJ1BPU1QnLFxuICAgICAgICBkYXRhVHlwZTogJ0pTT04nLFxuICAgICAgICBkYXRhOiB7IGNhcnRJdGVtSWQ6IGNhcnRJdGVtSWQsIHZhcmlhbnRJZDogdmFyaWFudElkLCBxdWFudGl0eTogcXVhbnRpdHksIGFjdGlvbjogYWN0aW9uLCBtZXRob2Q6ICdhamF4JyB9LFxuICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgaWYgKGRhdGEucmVzcG9uc2UgPT0gJ2NhcnQtcmVtb3ZlZCcpIHtcbiAgICAgICAgICAgICAgICAvLyBjb25zb2xlLmxvZyhkYXRhKTtcbiAgICAgICAgICAgICAgICB1cGRhdGVUb3RhbHMoKTtcbiAgICAgICAgICAgICAgICB3aW5kb3cubG9jYXRpb24gPSB3aW5kb3cubG9jYXRpb24uaHJlZi5zcGxpdChcIj9cIilbMF07XG4gICAgICAgICAgICAgICAgc2V0SXRlbXNEYXRhKCk7XG4gICAgICAgICAgICB9IGVsc2UgaWYgKGRhdGEucmVzcG9uc2UgPT0gJ3N1Y2Nlc3MnKSB7XG4gICAgICAgICAgICAgICAgJChkaXYpLmhpZGUoMTAwKTtcbiAgICAgICAgICAgICAgICAkKGRpdikucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgdXBkYXRlVG90YWxzKCk7XG4gICAgICAgICAgICAgICAgc2V0SXRlbXNEYXRhKCk7XG4gICAgICAgICAgICB9ICAgXG4gICAgICAgIH0sXG4gICAgICAgIGVycm9yOiBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgLy8kKCcjRXJyb3InKS5odG1sKGRhdGEucmVzcG9uc2VUZXh0KTtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKFwiRXJyb3IgZW4gcmVtb3ZlRnJvbUNhcnQoKVwiKTtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xuICAgICAgICAgICAgLy8gSWYgYW4gZXJyb3IgcG9wcyB3aGVuIGRlc3Ryb3lpbmcgYW4gaXRlbSwgcmVsb2FkIGFuZCBwcmV2ZW50IGJhZCBtYWdpY1xuICAgICAgICAgICAgbG9jYXRpb24ucmVsb2FkKCk7XG4gICAgICAgIH1cbiAgICB9KTtcbn1cblxuZnVuY3Rpb24gdXBkYXRlVG90YWxzKCkge1xuICAgIC8vIExpdmUgUmVsb2FkaW5nIHN0dWZmXG4gICAgJChcIiNTaWRlQ29udGFpbmVySXRlbXNGaXhlZFwiKS5sb2FkKHdpbmRvdy5sb2NhdGlvbi5ocmVmICsgXCIgI1NpZGVDb250YWluZXJJdGVtc0ZpeGVkXCIpO1xuICAgICQoXCIjU2lkZUNvbnRhaW5lckl0ZW1zRmxvYXRpbmdcIikubG9hZCh3aW5kb3cubG9jYXRpb24uaHJlZiArIFwiICNTaWRlQ29udGFpbmVySXRlbXNGbG9hdGluZ1wiKTtcbiAgICAkKFwiLlRvdGFsQ2FydEl0ZW1zXCIpLmxvYWQod2luZG93LmxvY2F0aW9uLmhyZWYgKyBcIiAuVG90YWxDYXJ0SXRlbXNcIik7XG4gICAgJChcIi5Ub3RhbENhcnRJdGVtc1NpZGViYXJcIikubG9hZCh3aW5kb3cubG9jYXRpb24uaHJlZiArIFwiIC5Ub3RhbENhcnRJdGVtc1NpZGViYXJcIik7XG4gICAgJChcIi5DYXJ0U3ViVG90YWxcIikubG9hZCh3aW5kb3cubG9jYXRpb24uaHJlZiArIFwiIC5DYXJ0U3ViVG90YWxcIik7XG4gICAgJChcIi5BdmFpbGFibGVTdG9ja1wiKS5sb2FkKHdpbmRvdy5sb2NhdGlvbi5ocmVmICsgXCIgLkF2YWlsYWJsZVN0b2NrXCIpO1xufVxuXG4vLyBTdWJtaXQgQ2FydCBGb3JtIHRvIENoZWNrb3V0XG4vLyAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG53aW5kb3cuc3VibWl0Q2FydFRvQ2hlY2tvdXQgPSBmdW5jdGlvbiAocm91dGUsIHRhcmdldCwgZGF0YSwgYWN0aW9uKSB7XG4gICAgLy9jb25zb2xlLmxvZyhcIlJ1dGE6IFwiICsgcm91dGUgKyBcIiBUYXJnZXQ6IFwiICsgdGFyZ2V0ICsgXCIgRGF0YTogXCIgKyBkYXRhICsgXCJBY3Rpb246IFwiKyBhY3Rpb24pO1xuICAgICQuYWpheCh7XG4gICAgICAgIHVybDogcm91dGUsXG4gICAgICAgIG1ldGhvZDogJ1BPU1QnLFxuICAgICAgICBkYXRhVHlwZTogJ0pTT04nLFxuICAgICAgICBkYXRhOiB7IGRhdGEsIGFjdGlvbjogYWN0aW9uIH0sXG4gICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhKTtcbiAgICAgICAgICAgIGlmIChkYXRhLnJlc3BvbnNlID09ICdzdWNjZXNzJykge1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHRhcmdldCk7XG4gICAgICAgICAgICAgICAgaWYgKHRhcmdldCA9PSAncmVsb2FkJykge1xuICAgICAgICAgICAgICAgICAgICAvLyBSZWZyZXNoIHBhZ2UsIGRlbGV0ZSBwYXJhbWV0dGVycyBhbmQgb3BlbiBjaGVja291dCBzaWRlYmFyXG4gICAgICAgICAgICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbiA9IHdpbmRvdy5sb2NhdGlvbi5ocmVmLnNwbGl0KFwiP1wiKVswXSArIFwiP2NoZWNrb3V0LW9uXCI7XG4gICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgd2luZG93LmxvY2F0aW9uLmhyZWYgPSB0YXJnZXQ7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZygnRXJyb3IgZW4gc3VibWl0Rm9ybScpO1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xuICAgICAgICAgICAgICAgIHRvYXN0X2Vycm9yKCcnLCBkYXRhLm1lc3NhZ2UsICdib3R0b21DZW50ZXInLCAnJyk7XG4gICAgICAgICAgICAgICAgJCgnLlNpZGVDb250YWluZXJFcnJvcicpLmh0bWwoZGF0YS5tZXNzYWdlKTtcbiAgICAgICAgICAgICAgICAvLyAkKCcjRXJyb3InKS5odG1sKGRhdGEucmVzcG9uc2VUZXh0KTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIC8vICQoJyNFcnJvcicpLmh0bWwoZGF0YS5yZXNwb25zZVRleHQpO1xuICAgICAgICB9LFxuICAgICAgICBlcnJvcjogZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgIC8vICQoJyNFcnJvcicpLmh0bWwoZGF0YS5yZXNwb25zZVRleHQpO1xuICAgICAgICAgICAgY29uc29sZS5sb2coXCJFcnJvciBlbiBzdWJtaXRGb3JtKClcIik7XG4gICAgICAgICAgICBsb2NhdGlvbi5yZWxvYWQoKTtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xuICAgICAgICAgICAgLy8gbG9jYXRpb24ucmVsb2FkKCk7XG4gICAgICAgIH1cbiAgICB9KTtcbn1cblxuLy8gVmFsaWRhdGUgYW5kIHNldCBjb3Vwb25cbi8vIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbndpbmRvdy52YWxpZGF0ZUFuZFNldENvdXBvbiA9IGZ1bmN0aW9uIChyb3V0ZSwgY29kZSwgY2FydGlkKSB7XG4gICAgbGV0IGNvdXBvbkRpdiA9ICQoJyNDb3Vwb25EaXYnKTtcbiAgICBsZXQgY291cG9uU2V0ID0gJCgnI1NldHRlZENvdXBvbicpO1xuICAgIGNvbnNvbGUubG9nKGNvZGUsIGNhcnRpZCk7XG4gICAgJC5hamF4KHtcbiAgICAgICAgdXJsOiByb3V0ZSxcbiAgICAgICAgbWV0aG9kOiAnUE9TVCcsXG4gICAgICAgIGRhdGFUeXBlOiAnSlNPTicsXG4gICAgICAgIGRhdGE6IHsgY29kZTogY29kZSwgY2FydGlkOiBjYXJ0aWQgfSxcbiAgICAgICAgYmVmb3JlU2VuZDogZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgY29uc29sZS5sb2coXCJDb21wcm9iYW5kbyBjdXDDs24uLi5cIik7XG4gICAgICAgICAgICAkKCcuQ291cG9uTG9hZGVyJykucmVtb3ZlQ2xhc3MoJ0hpZGRlbicpO1xuICAgICAgICB9LFxuICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgaWYgKGRhdGEucmVzcG9uc2UgPT0gdHJ1ZSkge1xuICAgICAgICAgICAgICAgICQoJyNDb3Vwb25WYWxpZGF0aW9uTWVzc2FnZScpLmh0bWwoXCJDdXDDs24gYWNlcHRhZG8gIVwiKTtcbiAgICAgICAgICAgICAgICBjb3Vwb25EaXYuaGlkZSgyMDAsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgY291cG9uU2V0LnJlbW92ZUNsYXNzKCdIaWRkZW4nKTtcbiAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICBsb2NhdGlvbi5yZWxvYWQoKTtcbiAgICAgICAgICAgIH0gZWxzZSBpZiAoZGF0YS5yZXNwb25zZSA9PSBudWxsKSB7XG4gICAgICAgICAgICAgICAgJCgnI0NvdXBvblZhbGlkYXRpb25NZXNzYWdlJykuaHRtbChkYXRhLm1lc3NhZ2UpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9LFxuICAgICAgICBlcnJvcjogZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgICQoJyNDb3Vwb25WYWxpZGF0aW9uTWVzc2FnZScpLmh0bWwoZGF0YS5yZXNwb25zZVRleHQpO1xuICAgICAgICAgICAgY29uc29sZS5sb2coZGF0YSk7XG4gICAgICAgIH0sXG4gICAgICAgIGNvbXBsZXRlOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAkKCcuQ291cG9uTG9hZGVyJykuYWRkQ2xhc3MoJ0hpZGRlbicpO1xuICAgICAgICB9XG4gICAgfSk7XG59XG5cbi8vIEZhdnNcbi8vIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbndpbmRvdy5hZGRBcnRpY2xlVG9GYXZzID0gZnVuY3Rpb24gKHJvdXRlLCBmYXZpZCwgYXJ0aWNsZWlkLCBhY3Rpb24sIGRpc3BsYXlCdXR0b24pIHtcbiAgICAkLmFqYXgoe1xuICAgICAgICB1cmw6IHJvdXRlLFxuICAgICAgICBtZXRob2Q6ICdQT1NUJyxcbiAgICAgICAgZGF0YVR5cGU6ICdKU09OJyxcbiAgICAgICAgZGF0YTogeyBmYXZfaWQ6IGZhdmlkLCBhcnRpY2xlX2lkOiBhcnRpY2xlaWQgfSxcbiAgICAgICAgc3VjY2VzczogZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgIGlmIChkYXRhLnJlc3BvbnNlID09IHRydWUgJiYgZGF0YS5yZXN1bHQgPT0gJ2FkZGVkJykge1xuICAgICAgICAgICAgICAgIHN3aXRjaCAoYWN0aW9uKSB7XG4gICAgICAgICAgICAgICAgICAgIGNhc2UgJ3JlbG9hZCc6XG4gICAgICAgICAgICAgICAgICAgICAgICBsb2NhdGlvbi5yZWxvYWQoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGJyZWFrO1xuICAgICAgICAgICAgICAgICAgICBjYXNlICdzaG93JzpcbiAgICAgICAgICAgICAgICAgICAgICAgIGRpc3BsYXlCdXR0b24ucmVtb3ZlQ2xhc3MoJ2Zhdi1pY29uLW5vZmF2Jyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBkaXNwbGF5QnV0dG9uLmFkZENsYXNzKCdmYXYtaWNvbi1pc2ZhdicpO1xuICAgICAgICAgICAgICAgICAgICAgICAgdG9hc3Rfc3VjY2VzcygnT2shJywgJ1Byb2R1Y3RvIGFncmVnYWRvIGEgZmF2b3JpdG9zJywgJ2JvdHRvbUNlbnRlcicsICcnLCAxMDAwKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGJyZWFrO1xuICAgICAgICAgICAgICAgICAgICBjYXNlICdub25lJzpcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCdBY3R1YWxpemFkbyAtIFNpbiBBY2Npw7NuJyk7XG4gICAgICAgICAgICAgICAgICAgIGRlZmF1bHQ6XG4gICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZygnTm8gaGF5IGFjY2nDs24nKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGJyZWFrO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0gZWxzZSBpZiAoZGF0YS5yZXNwb25zZSA9PSB0cnVlICYmIGRhdGEucmVzdWx0ID09ICdyZW1vdmVkJykge1xuICAgICAgICAgICAgICAgIGRpc3BsYXlCdXR0b24uYWRkQ2xhc3MoJ2Zhdi1pY29uLW5vZmF2Jyk7XG4gICAgICAgICAgICAgICAgZGlzcGxheUJ1dHRvbi5yZW1vdmVDbGFzcygnZmF2LWljb24taXNmYXYnKTtcbiAgICAgICAgICAgICAgICB0b2FzdF9zdWNjZXNzKCdPayEnLCAnUHJvZHVjdG8gZWxpbWluYWRvIGRlIGZhdm9yaXRvcycsICdib3R0b21DZW50ZXInLCAnJywgMTAwMCk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBzZXRGYXZzVG90YWxJY29uKGRhdGEuZmF2c0NvdW50KTtcbiAgICAgICAgfSxcbiAgICAgICAgZXJyb3I6IGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgICAgICAgICAkKCcjRXJyb3InKS5odG1sKGRhdGEucmVzcG9uc2VUZXh0KTtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xuICAgICAgICB9XG4gICAgfSk7XG59XG5cbmZ1bmN0aW9uIHNldEZhdnNUb3RhbEljb24oZmF2cykge1xuICAgIGlmIChmYXZzID4gMCkge1xuICAgICAgICAkKCcuRmF2TWFpbkljb24nKS5yZW1vdmVDbGFzcygnZmFyJyk7XG4gICAgICAgICQoJy5GYXZNYWluSWNvbicpLmFkZENsYXNzKCdmYScpO1xuICAgIH0gZWxzZSBpZiAoZmF2cyA9PSAwKSB7XG4gICAgICAgICQoJy5GYXZNYWluSWNvbicpLnJlbW92ZUNsYXNzKCdmYScpO1xuICAgICAgICAkKCcuRmF2TWFpbkljb24nKS5hZGRDbGFzcygnZmFyJyk7XG4gICAgfSBlbHNlIHtcbiAgICAgICAgJCgnLkZhdk1haW5JY29uJykucmVtb3ZlQ2xhc3MoJ2ZhJyk7XG4gICAgICAgICQoJy5GYXZNYWluSWNvbicpLnJlbW92ZUNsYXNzKCdmYXInKTtcbiAgICAgICAgJCgnLkZhdk1haW5JY29uJykuYWRkQ2xhc3MoJ2ZhJyk7XG4gICAgICAgIGNvbnNvbGUubG9nKFwiRXJyb3IgZW4gc2V0RmF2c1RvdGFsSWNvbigpXCIpO1xuICAgIH1cbn1cblxud2luZG93LnJlbW92ZUFydGljbGVGcm9tRmF2cyA9IGZ1bmN0aW9uIChyb3V0ZSwgZmF2aWQsIGFjdGlvbikge1xuICAgIHZhciBkb2FjdGlvbiA9IGFjdGlvbjtcbiAgICAkLmFqYXgoe1xuICAgICAgICB1cmw6IHJvdXRlLFxuICAgICAgICBtZXRob2Q6ICdQT1NUJyxcbiAgICAgICAgZGF0YVR5cGU6ICdKU09OJyxcbiAgICAgICAgZGF0YTogeyBmYXZfaWQ6IGZhdmlkIH0sXG4gICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgICAgICAgICAkKCcjRXJyb3InKS5odG1sKGRhdGEucmVzcG9uc2VUZXh0KTtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xuICAgICAgICAgICAgaWYgKGRhdGEucmVzcG9uc2UgPT0gdHJ1ZSkge1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGRvYWN0aW9uKTtcbiAgICAgICAgICAgICAgICBzd2l0Y2ggKGRvYWN0aW9uKSB7XG4gICAgICAgICAgICAgICAgICAgIGNhc2UgJ3JlbG9hZCc6XG4gICAgICAgICAgICAgICAgICAgICAgICB2YXIgYWN0aW9uID0gJ3JlbG9hZCc7XG4gICAgICAgICAgICAgICAgICAgICAgICB0b2FzdF9zdWNjZXNzKCdPayEnLCAnUHJvZHVjdG8gZWxpbWluYWRvIGRlIGZhdm9yaXRvcycsICdib3R0b21DZW50ZXInLCBhY3Rpb24sIDEwMDApO1xuICAgICAgICAgICAgICAgICAgICAgICAgYnJlYWs7XG4gICAgICAgICAgICAgICAgICAgIGRlZmF1bHQ6XG4gICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZygnTm8gaGF5IGFjY2nDs24nKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGJyZWFrO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgLy8kKCcjRXJyb3InKS5odG1sKGRhdGEubWVzc2FnZVsnZXJyb3JJbmZvJ10pO1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9LFxuICAgICAgICBlcnJvcjogZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgIC8vJCgnI0Vycm9yJykuaHRtbChkYXRhLnJlc3BvbnNlVGV4dCk7XG4gICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhKTtcbiAgICAgICAgfVxuICAgIH0pO1xufVxuXG53aW5kb3cucmVtb3ZlQWxsQXJ0aWNsZXNGcm9tRmF2cyA9IGZ1bmN0aW9uIChyb3V0ZSwgY3VzdG9tZXJpZCwgYWN0aW9uKSB7XG4gICAgJC5hamF4KHtcbiAgICAgICAgdXJsOiByb3V0ZSxcbiAgICAgICAgbWV0aG9kOiAnUE9TVCcsXG4gICAgICAgIGRhdGFUeXBlOiAnSlNPTicsXG4gICAgICAgIGRhdGE6IHsgY3VzdG9tZXJfaWQ6IGN1c3RvbWVyaWQgfSxcbiAgICAgICAgc3VjY2VzczogZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xuICAgICAgICAgICAgLy8kKCcjRXJyb3InKS5odG1sKGRhdGEucmVzcG9uc2VUZXh0KTtcbiAgICAgICAgICAgIGlmIChkYXRhLnJlc3BvbnNlID09IHRydWUpIHtcbiAgICAgICAgICAgICAgICBzd2l0Y2ggKGFjdGlvbikge1xuICAgICAgICAgICAgICAgICAgICBjYXNlICdyZWxvYWQnOlxuICAgICAgICAgICAgICAgICAgICAgICAgbG9jYXRpb24ucmVsb2FkKCk7XG4gICAgICAgICAgICAgICAgICAgICAgICBicmVhaztcbiAgICAgICAgICAgICAgICAgICAgZGVmYXVsdDpcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCdObyBoYXkgYWNjacOzbicpO1xuICAgICAgICAgICAgICAgICAgICAgICAgYnJlYWs7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAkKCcjRXJyb3InKS5odG1sKGRhdGEubWVzc2FnZVsnZXJyb3JJbmZvJ10pO1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9LFxuICAgICAgICBlcnJvcjogZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgIC8vJCgnI0Vycm9yJykuaHRtbChkYXRhLnJlc3BvbnNlVGV4dCk7XG4gICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhKTtcbiAgICAgICAgfVxuICAgIH0pO1xufVxuXG4vKlxufC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG58IExPR0lOIEFORCBSRUdJU1RFUlxufC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4qL1xuXG4kKCcjUmVzZWxsZXJCb3gnKS5oaWRlKCk7XG5cbndpbmRvdy5vcGVuUmVzZWxsZXJSZWdpc3RyYXRpb24gPSBmdW5jdGlvbigpXG57XG4gICAgJCgnI0lzUmVzZWxsZXJDaGVja2JveCcpLnByb3AoJ2NoZWNrZWQnLCB0cnVlKTtcbiAgICAkKCcuSWZSZXNlbGxlckVuYWJsZScpLnByb3AoJ2Rpc2FibGVkJywgZmFsc2UpO1xuICAgICQoJyNSZXNlbGxlckJveCcpLnNob3coMTAwKTtcbiAgICAkKCcjUmVzZWxsZXJDVEEnKS5oaWRlKDApO1xuICAgICQoJy5Ob3JtYUNsaWVudFRpdGxlJykuaGlkZSgwKTtcbiAgICAkKCcuUmVzZWxsZXJUaXRsZScpLnNob3coMCk7XG59XG5cbndpbmRvdy5jbG9zZVJlc2VsbGVyUmVnaXN0cmF0aW9uID0gZnVuY3Rpb24oKVxue1xuICAgICQoJyNJc1Jlc2VsbGVyQ2hlY2tib3gnKS5wcm9wKCdjaGVja2VkJywgZmFsc2UpO1xuICAgICQoJy5JZlJlc2VsbGVyRW5hYmxlJykucHJvcCgnZGlzYWJsZWQnLCB0cnVlKTtcbiAgICAkKCcjUmVzZWxsZXJCb3gnKS5oaWRlKDApO1xuICAgICQoJyNSZXNlbGxlckNUQScpLnNob3coMTAwKTtcbiAgICAkKCcuTm9ybWFDbGllbnRUaXRsZScpLnNob3coMCk7XG4gICAgJCgnLlJlc2VsbGVyVGl0bGUnKS5oaWRlKDApO1xufVxuXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpe1xuICAgICQoJy5HZW9Qcm92U2VsZWN0Jykub24oJ2NoYW5nZScsIGZ1bmN0aW9uKCl7XG4gICAgICAgIGxldCBwcm92X2lkID0gJCh0aGlzKS52YWwoKTtcbiAgICAgICAgZ2V0R2VvTG9jcyhwcm92X2lkKTtcbiAgICB9KTtcbn0pO1xuXG4vKlxufC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG58IE1JWCBGVU5DVElPTlNcbnwtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuKi9cblxud2luZG93LmNsb3NlRWxlbWVudCA9IGZ1bmN0aW9uKHNlbGVjdG9yKVxue1xuICAgICQoc2VsZWN0b3IpLmhpZGUoMTAwKTtcbn1cblxud2luZG93LmdldFBhcmFtID0gZnVuY3Rpb24ocGFyYW1ldGVyTmFtZSkge1xuICAgIHZhciByZXN1bHQgPSBudWxsLFxuICAgICAgICB0bXAgPSBbXTtcbiAgICBsb2NhdGlvbi5zZWFyY2hcbiAgICAgICAgLnN1YnN0cigxKVxuICAgICAgICAuc3BsaXQoXCImXCIpXG4gICAgICAgIC5mb3JFYWNoKGZ1bmN0aW9uIChpdGVtKSB7XG4gICAgICAgIHRtcCA9IGl0ZW0uc3BsaXQoXCI9XCIpO1xuICAgICAgICBpZiAodG1wWzBdID09PSBwYXJhbWV0ZXJOYW1lKSByZXN1bHQgPSBkZWNvZGVVUklDb21wb25lbnQodG1wWzFdKTtcbiAgICAgICAgfSk7XG4gICAgcmV0dXJuIHJlc3VsdDtcbn1cblxud2luZG93LmdldFBhcmFtcyA9IGZ1bmN0aW9uKHVybCkge1xuICAgIHZhciBwYXJhbXMgPSB7fTtcblx0dmFyIHBhcnNlciA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2EnKTtcblx0cGFyc2VyLmhyZWYgPSB1cmw7XG5cdHZhciBxdWVyeSA9IHBhcnNlci5zZWFyY2guc3Vic3RyaW5nKDEpO1xuXHR2YXIgdmFycyA9IHF1ZXJ5LnNwbGl0KCcmJyk7XG5cdGZvciAodmFyIGkgPSAwOyBpIDwgdmFycy5sZW5ndGg7IGkrKykge1xuXHRcdHZhciBwYWlyID0gdmFyc1tpXS5zcGxpdCgnPScpO1xuXHRcdHBhcmFtc1twYWlyWzBdXSA9IGRlY29kZVVSSUNvbXBvbmVudChwYWlyWzFdKTtcblx0fVxuXHRyZXR1cm4gcGFyYW1zO1xufVxuXG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9yZXNvdXJjZXMvYXNzZXRzL2pzL3N0b3JlL3NjcmlwdHMuanMiXSwic291cmNlUm9vdCI6IiJ9